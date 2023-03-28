<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function my_order(){
        $orders = Order::where('user_id', Auth::id())->orderBy('created_at', 'DESC')->paginate(10);
        return view('front.pages.my-order', compact('orders'));
    }
    public function order_details(int $id){
        $order = Order::where('id', $id)->where('user_id', Auth::id())->first();
        return view('front.pages.order_details', compact('order'));
    }
    public function thank_you(){
        return view('front.pages.thank-you');
    }


}
