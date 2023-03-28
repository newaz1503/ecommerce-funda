<?php

namespace App\Http\Controllers\Front;

use App\Models\Category;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Front\alertify;

class WishlistController extends Controller
{
    public function wishlist($id){

       if(Auth::check()){
            $product_exists = Wishlist::where('user_id', Auth::id())->where('product_id', $id)->exists();
            if(!$product_exists){
                $wishlist = new Wishlist();
                $wishlist->user_id = Auth::user()->id;
                $wishlist->product_id = $id;
                $wishlist->save();
                Toastr::success('Success', 'Product successfully added in your wishlist');
                return back();
            }else{
                Toastr::info('Info', 'Product Already exists in your wishlist');
                session()->flash('msg', 'Product already exists in your wishlist');
                return back();
            }
       }else{

        //    Toastr::info('Info', 'You need to login first');
            session()->flash('message', 'You need to login first');
            return back();
       }
    }
    public function wishlist_view(){
        $wishlists = Wishlist::where('user_id', Auth::user()->id)->get();
        $categories = Category::where('status', 1)->get();
        return view('front.pages.wishlist', compact('wishlists','categories'));
    }

    public function wishlist_delete(int $productid){
        $lol = Wishlist::find($productid);
        $lol->delete();
        Toastr::success('Success', 'Wishlist Product Remove Successfully');
        return redirect()->back();
    }
}
