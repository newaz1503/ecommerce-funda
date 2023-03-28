<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function dashboard(){
        $data['total_product'] = Product::count();
        $data['total_category'] = Category::count();
        $data['total_brand'] = Brand::count();
        $data['all_user'] = User::count();
        $data['total_user'] = User::where('role_as', 0)->count();
        $data['total_admin'] = User::where('role_as', 1)->count();
        $data['total_order'] = Order::count();
        $data['today_order'] = Order::whereDate('created_at', Carbon::now()->format('Y-m-d'))->count();
        $data['monthly_order'] = Order::whereMonth('created_at', Carbon::now()->format('m'))->count();
        $data['yearly_order'] = Order::whereYear('created_at', Carbon::now()->format('Y'))->count();
        return view('admin.pages.dashboard', compact('data'));
    }
    public function users(){
        $users = User::latest()->get();
        return view('admin.pages.user.index', compact('users'));
    }
    public function user_details($id){
        $user = User::where('id', $id)->first();
        return view('admin.pages.user.user_details', compact('user'));
    }
    public function user_create(){
        return view('admin.pages.user.create');
    }
    public function user_store(Request $request){
        $this->validate($request,[
            'role' => 'required',
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required'
        ]);
        $user = new User();
        $user->role_as = $request->role;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        Toastr::success('User Stored Successfully', 'Success');
        return redirect()->route('admin.users');
    }

    public function user_destroy($id){
        $user = User::find($id);
        $user->delete();
        Toastr::success('User Deleted Successfully', 'Success');
        return back();
    }
    public function user_edit($id){
        $user = User::find($id);
        return view('admin.pages.user.edit', compact('user'));
    }

    public function user_update(Request $request, $id){
        $user = User::find($id);
        $this->validate($request,[
            'role' => 'required',
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$user->id,
        ]);

        $user->role_as = $request->role;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        Toastr::success('User Update Successfully', 'Success');
        return redirect()->route('admin.users');
    }

}
