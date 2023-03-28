<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function checkout(){
        $old_cartItems = Cart::where('user_id', Auth::id())->get();
        foreach($old_cartItems as $cartitem){
            if(!Product::where('id', $cartitem->product_id)->where('quantity', '>=', $cartitem->qty)->exists()){
                $removeItem = Cart::where('user_id', Auth::id())->where('product_id', $cartitem->product_id)->first();
                $removeItem->delete();
            }
        }
        $cartItems = Cart::where('user_id', Auth::id())->get();

        return view('front.pages.checkout', compact('cartItems'));
    }
}
