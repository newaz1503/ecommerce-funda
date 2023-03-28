<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\InvoiceOrderMail;
use App\Models\Order;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Exception;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function index(Request $request){
        $formated_today_date = Carbon::now()->format('Y-m-d');
        $orders = Order::when($request->date != Null, function ($q) use ($request) {
            $q->whereDate('created_at', $request->date);
        }, function ($q) use ($formated_today_date) {
            $q->whereDate('created_at', $formated_today_date);
        })

        ->when($request->status != Null, function ($q) use ($request) {
            $q->where('status', $request->status);
        })
        ->get();
        // $orders = Order::whereDate('created_at', $formated_today_date);
        return view('admin.pages.order.index', compact('orders'));
    }
    public function order_details($id){
        $order = Order::where('id', $id)->first();
        if($order){
            return view('admin.pages.order.order_details', compact('order'));
        }else{
            Toastr::info('You have no order details', 'Info');
            return back();
        }

    }
    public function order_update(Request $request, int $id){
        $order = Order::findOrFail($id);
        $order->status = $request->order_status;
        $order->update();
        Toastr::success('Order Status Updated Successfully', 'Success');
        return redirect()->route('admin.orders.index');
    }
    public function order_history(){
        $orders = Order::where('status', 1)->latest()->get();
        return view('admin.pages.order.history', compact('orders'));
    }
    public function invoice_view($id){
        $order = Order::find($id);
        if($order){
            return view('admin.pages.invoice.view', compact('order'));
        }else{
            Toastr::error('Invoice not available', 'Error');
            return back();
        }
    }
    public function invoice_generate($id){
        $order = Order::find($id);
        $data = ['order' => $order];
        $pdf = Pdf::loadView('admin.pages.invoice.view', $data);
        $formated_data = Carbon::now()->format('d-m-Y');
        return $pdf->download('invoice-'.$order->id.'-'.$formated_data.'.pdf');
    }

    public function invoice_mail($id){
        try{
            $order = Order::findOrFail($id);
            Mail::to($order->email)->send(new InvoiceOrderMail($order));
            Toastr::success('Mail sent successfully to '.$order->email, 'Success');
            return back();
        }catch(Exception $e){
            Toastr::error($e->getMessage(), 'Error');
            return back();
        }


    }

}
