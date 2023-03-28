<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function cart(){
        $carts = Cart::where('user_id', Auth::user()->id)->get();
        return view('front.pages.cart', compact('carts'));
    }
    public function add_cart(Request $request){
        $product_id = $request->input('product_id');
        $product_qty = $request->input('product_qty');
        $product = Product::findOrFail($product_id);
        if(auth()->check()){
            if(!Cart::where('user_id', auth()->user()->id)->where('product_id', $product_id)->exists()){
                if($product->quantity > 0){
                    if($product->quantity > $product_qty){
                        $cart = new Cart();
                        $cart->user_id = Auth::id();
                        $cart->product_id = $product_id;
                        $cart->qty = $product_qty;
                        $cart->save();
                        return response()->json([
                            'status' => 'Cart Added Succesfully'
                        ]);
                    }
                }else{
                    return response()->json([
                        'status' => 'Out of Stock'
                    ]);
                }
            }else{
                return response()->json([
                    'status' => 'This product already exists in your cart'
                ]);

            }
        }else{
            return response()->json([
                'status' => 'You need to login first',
            ]);

        }
    }

    public function court_count()
    {
        if (Auth::check()) {
             $cartCount = Cart::where('user_id', Auth::user()->id)->count();
        }else{
            return false;
        }
        return response()->json([
            'count' => $cartCount
        ]);
    }

    public function cart_delete($id){
        $cart = Cart::where('user_id', Auth::id())->where('id', $id)->first();
        $cart->delete();
        Toastr::success('Cart Product Deleted Successfully', 'Success');
        return back();
    }

    public function cart_update(Request $request){
        $product_id = $request->input('product_id');
        $quantity = $request->input('cartQty');
        if(Cart::where('user_id', Auth::id())->where('product_id', $product_id)->exists()){
            $cart = Cart::where('user_id', Auth::id())->where('product_id', $product_id)->first();
            $cart->qty = $quantity;
            $cart->save();
            return response()->json(['status' => 'Cart Updated Successfully']);
        }

    }

}
