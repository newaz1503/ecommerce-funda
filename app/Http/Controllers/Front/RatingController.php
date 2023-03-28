<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\Rating;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RatingController extends Controller
{
    public function store_rating(Request $request){
        $this->validate($request, [
            'product_rating' => 'required'
        ]);
        $product_id = $request->input('product_id');
        $user_id = Auth::id();
        $product_check = Product::where('id', $product_id)->where('status', 1)->first();
        if($product_check){
             $verified_check = Order::where('orders.user_id', $user_id)
                ->join('order_details', 'orders.id', 'order_details.order_id')
                ->where('order_details.product_id', $product_id)->get();
            if($verified_check->count() > 0){
                $rating_exists = Rating::where('user_id', $user_id)->where('product_id', $product_id)->first();
                if($rating_exists){
                    $rating_exists->star_rated = $request->product_rating;
                    $rating_exists->update();
                    Toastr::success('Success', 'you product rating is Updated');
                    return back();
                }else{
                    $rating = new Rating();
                    $rating->user_id = $user_id;
                    $rating->product_id = $product_id;
                    $rating->star_rated = $request->product_rating;
                    $rating->save();
                    Toastr::success('Success', 'Thank you for rating this product');
                    return back();
                }

            }else{
                Toastr::info('Info', 'You can not rate this product without purchaching');
                return back();
            }
        }else{
            Toastr::error('Error', 'Product not found');
            return back();
        }
    }
}
