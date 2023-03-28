<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Requests\CategoryFormRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::latest()->get();
        return view('admin.pages.category.index', compact('categories'));
    }
    public function create(){
        return view('admin.pages.category.create');
    }
    public function store(CategoryFormRequest $request){
        $validateddata = $request->validated();
        $category = new Category();
        $category->name =  $validateddata['name'];
        $category->slug = Str::slug($validateddata['name']);
        $category->description = $validateddata['description'];
        if($request->hasFile('image')){
            $image = $request->file('image');
            $extension = $image->getClientOriginalExtension();
            $image_name = time().'.'.$extension;
            $image->move('uploads/images/category/',$image_name);
            $category->image = $image_name;
        }
        $category->meta_title = $validateddata['meta_title'];
        $category->meta_keyword = $validateddata['meta_keyword'];
        $category->meta_description = $validateddata['meta_description'];
        $category->popular = $request->input('popular') ? 1 : 0;
        $category->save();
        Toastr::success('Category Store Successfully', 'Success');
        return redirect()->route('admin.category.index');
    }
    public function edit($id){
        $category = category::findOrFail($id);
        return view('admin.pages.category.edit', compact('category'));
    }
    public function update(CategoryFormRequest $request, $id){
        $validateddata = $request->validated();
        $category = category::findOrFail($id);
        if($request->hasFile('image')){
            $path = 'uploads/images/category/'.$category->image;
            if(File::exists($path)){
                File::delete($path);
            }
            $image = $request->file('image');
            $extension = $image->getClientOriginalExtension();
            $image_name = time().'.'.$extension;
            $image->move('uploads/images/category/',$image_name);
            $category->image = $image_name;

        }
        $category->name =  $validateddata['name'];
        $category->slug = Str::slug($validateddata['name']);
        $category->description = $validateddata['description'];
        $category->meta_title = $validateddata['meta_title'];
        $category->meta_keyword = $validateddata['meta_keyword'];
        $category->meta_description = $validateddata['meta_description'];
        $category->status = $request->input('status') ? 1 : 0;
        $category->popular = $request->input('popular') ? 1 : 0;
        $category->update();
        Toastr::success('Category Updated Successfully', 'Success');
        return redirect()->route('admin.category.index');
    }
    public function destroy($id){
        $category = category::findOrFail($id);
        $path = 'uploads/images/category/'.$category->image;
        if(File::exists($path)){
            File::delete($path);
        }
        $category->delete();
        Toastr::success('Category Deletd Successfully', 'Success');
        return back();

    }
}
