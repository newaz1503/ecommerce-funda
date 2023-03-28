<?php

namespace App\Http\Controllers\Front;

use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\PlaceOrderMail;
use App\Models\Cart;
use App\Models\OrderDetails;
use App\Models\Product;
use Brian2694\Toastr\Facades\Toastr;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function place_order(Request $request){
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:255',
            'address1' => 'required|string|max:255',
            'address2' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'pin_code' => 'required|string|max:255',
        ]);

        $order = new Order();
        $order->user_id = Auth::id();
        $order->name = $request->input('name');
        $order->email = $request->input('email');
        $order->phone = $request->input('phone');
        $order->address1 = $request->input('address1');
        $order->address2 = $request->input('address2');
        $order->city = $request->input('city');
        $order->state = $request->input('state');
        $order->country = $request->input('country');
        $order->pin_code = $request->input('pin_code');
        $order->tracking_no = 'newaz' . Str::random(10);
        $order->payment_method = 'Cash on Delivery';
        $total = 0;
        $cart_totals = Cart::where('user_id', Auth::user()->id)->get();
        foreach($cart_totals as $cart_total){
            $total += $cart_total->products->selling_price;
        }
        $order->total_price = $total;

        $order->save();

        $carts = Cart::where('user_id', Auth::user()->id)->get();

        foreach($carts as $cart){
            $cartOrder = new OrderDetails();
            $cartOrder->order_id = $order->id;
            $cartOrder->product_id = $cart->products->id;
            $cartOrder->qty = $cart->qty;
            $cartOrder->price = $cart->products->selling_price;
            $cartOrder->save();

            $product = Product::where('id', $cart->product_id)->first();
            $product->quantity = $product->quantity - $cart->qty;
            $product->update();
        }
        if(Auth::user()->address1 == Null){
            $user = User::where('id', Auth::id())->first();
            $user->phone = $request->input('phone');
            $user->address1 = $request->input('address1');
            $user->address2 = $request->input('address2');
            $user->city = $request->input('city');
            $user->state = $request->input('state');
            $user->country = $request->input('country');
            $user->pin_code = $request->input('pin_code');
            $user->update();
        }
        $cartItems = Cart::where('user_id', Auth::user()->id)->get();
        Cart::destroy($cartItems);
        try{
            $order = Order::findOrFail($order->id);
            Mail::to($order->email)->send(new PlaceOrderMail($order));
        }catch(Exception $e){
            Toastr::error('Something Went Wrong', 'Error');
        }
        Toastr::success('Order placed Successfully', 'Success');
        return redirect()->route('thank_you');
    }
}
