<?php

namespace App\Http\Controllers\Front;

use App\Models\Brand;
use App\Models\Order;
use App\Models\Rating;
use App\Models\Slider;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Review;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;

class FrontController extends Controller
{
    public function home(){
        $sliders = Slider::where('status', 1)->get();
        $categories = Category::where('status', 1)->get();
        $latest_products = Product::latest()->where('status', 1)->take(10)->get();
        $featured_products = Product::where('featured', 1)->where('status', 1)->take(8)->get();
        $trending_products = Product::where('trending', 1)->where('status', 1)->take(8)->get();
        return view('front.pages.index', compact('sliders','categories', 'latest_products', 'featured_products', 'trending_products'));
    }
    public function product_by_category($slug){
        $categories = Category::where('status', 1)->get();
        $brands = Brand::where('status', 1)->get();
        $category_product = Category::where('slug', $slug)->first();
        // $products =  $category_product->products()->get();
        return view('front.pages.product_by_category',compact('category_product', 'categories','brands'));
    }
    public function product_by_brand($slug){
        $categories = Category::where('status', 1)->get();
        $brands = Brand::where('status', 1)->get();
        $brand_product = Brand::where('slug', $slug)->first();
        // $products =  $category_product->products()->get();
        return view('front.pages.product_by_brand',compact('brand_product', 'categories','brands'));
    }

    public function product_by_price_high_to_low(){
        $categories = Category::where('status', 1)->get();
        $brands = Brand::where('status', 1)->get();
        $products = Product::orderBy('selling_price', 'desc')->get();
        // $products =  $category_product->products()->get();
        return view('front.pages.product_by_price_high_low',compact('products', 'categories','brands'));
    }
    public function product_by_price_low_to_high(){
        $categories = Category::where('status', 1)->get();
        $brands = Brand::where('status', 1)->get();
        $products = Product::orderBy('selling_price', 'asc')->get();
        // $products =  $category_product->products()->get();
        return view('front.pages.product_by_price_low_high',compact('products', 'categories','brands'));
    }

    public function product_details($category_slug, $product_slug){
      $category = Category::where('slug', $category_slug)->where('status', 1)->first();
      if($category){
         $product = Product::where('slug',$product_slug)->where('status', 1)->first();
         if($product){
                $ratings = Rating::where('product_id', $product->id)->get();
                $total_rating = Rating::where('product_id', $product->id)->sum('star_rated');
                $user_rating = Rating::where('product_id', $product->id)->where('user_id', Auth::id())->first();
                if($ratings->count() > 0){
                    $rating_count = $total_rating / $ratings->count();
                }else{
                    $rating_count = 0;
                }
                $verified_check = Order::where('orders.user_id', Auth::id())
                ->join('order_details', 'orders.id', 'order_details.order_id')
                ->where('order_details.product_id', $product->id)->get();
                $reviews = Review::where('product_id', $product->id)->get();
            return view('front.pages.product_details', compact('product', 'category', 'ratings', 'rating_count', 'user_rating', 'verified_check', 'reviews'));
         }else{
            Toastr::error('Product Not Found', 'Error');
            return back();
        }
      }else{
         Toastr::error('Category Not Found', 'Error');
         return back();
      }
    }
    //all product
    public function all_product(){
        $categories = Category::where('status', 1)->get();
        $brands = Brand::where('status', 1)->get();
        $products = Product::where('status', 1)->get();
        // $category_product = Category::where('slug', $slug)->first();
        return view('front.pages.shop', compact('products', 'categories', 'brands'));
    }
    //search
    public function search(Request $request){
        $name = $request->name;
        $products = Product::where('name', 'LIKE', "%$name%")->latest()->get();
        return view('front.pages.search', compact('products'));
    }


}
