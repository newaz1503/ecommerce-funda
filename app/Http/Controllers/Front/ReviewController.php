<?php

namespace App\Http\Controllers\Front;

use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function store_review(Request $request){
        $this->validate($request,[
            'review' => 'required|string|max:255'
        ]);
        $product_id = $request->input('product_id');
        $product = Product::where('id', $product_id)->where('status', 1)->first();
        if($product){
            $review = new Review();
            $review->user_id = Auth::id();
            $review->product_id = $product_id;
            $review->review = $request->review;
            $review->save();
            Toastr::success('Thank you for reviewing this product', 'Success');
            return back();
        }else{
            Toastr::error('Product not found', 'Error');
            return back();
        }
    }
}
