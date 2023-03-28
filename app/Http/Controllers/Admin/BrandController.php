<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Requests\BrandFormRequest;

class BrandController extends Controller
{
    public function index(){
        $brands = Brand::latest()->get();
        return view('admin.pages.brand.index', compact('brands'));
    }
    public function create(){
        $categories = Category::where('status', 1)->get();
        return view('admin.pages.brand.create', compact('categories'));
    }
    public function store(BrandFormRequest $request){
        $validateddata = $request->validated();
        $Brand = new Brand();
        $Brand->category_id =  $validateddata['category_id'];
        $Brand->name =  $validateddata['name'];
        $Brand->slug = Str::slug($validateddata['name']);
        $Brand->save();
        Toastr::success('Brand Store Successfully', 'Success');
        return redirect()->route('admin.brand.index');
    }
    public function edit($id){
        $brand = Brand::findOrFail($id);
        $categories = Category::where('status', 1)->get();
        return view('admin.pages.brand.edit', compact('brand', 'categories'));
    }
    public function update(BrandFormRequest $request, $id){
        $validateddata = $request->validated();
        $Brand = Brand::findOrFail($id);
        $Brand->category_id =  $validateddata['category_id'];
        $Brand->name =  $validateddata['name'];
        $Brand->slug = Str::slug($validateddata['name']);
        $Brand->status = $request->input('status') ? 1 : 0;
        $Brand->update();
        Toastr::success('Brand Updated Successfully', 'Success');
        return redirect()->route('admin.brand.index');
    }
    public function destroy($id){
        $Brand = Brand::findOrFail($id);
        $Brand->delete();
        Toastr::success('Brand Deletd Successfully', 'Success');
        return back();

    }
}
