<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function profile(){
        return view('front.pages.profile');
    }
    public function profile_store(Request $request){
        $request->validate([
            'name' => 'required|string',
            'phone' => 'required',
            'pin_code' => 'required',
            'email' => 'required|email|unique:users,email,'.Auth::id(),
            'city' => 'required|string',
            'country' => 'required|string',
            'state' => 'required|string',
            'address1' => 'required|string',
            'address2' => 'required|string'
        ]);
        $user = User::find(Auth::id());
        // $user = new User();
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->pin_code = $request->pin_code;
        $user->city = $request->city;
        $user->state = $request->state;
        $user->country = $request->country;
        $user->address1 = $request->address1;
        $user->address2 = $request->address2;
        $user->update();
        Toastr::success('Your profile has been changed', 'Success');
        return back();
    }
    public function user_password(){
        return view('front.pages.user_password');
    }
    public function user_password_change(Request $request){
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|confirmed',
        ]);
        $old_password_check = Hash::check($request->current_password, Auth::user()->password);
        if($old_password_check){
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->update();
            Toastr::success('Your password has been changed', 'Success');
            Auth::logout();
            return redirect('/login');
        }else{
            Toastr::error('Your Current password does not match old password', 'Error');
            return back();
        }

    }
}
