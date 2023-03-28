<?php

namespace App\Http\Controllers\Admin;

use App\Models\slider;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Requests\sliderFormRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;

class sliderController extends Controller
{
    public function index(){
        $sliders = slider::latest()->get();
        return view('admin.pages.slider.index', compact('sliders'));
    }
    public function create(){
        return view('admin.pages.slider.create');
    }
    public function store(Request $request){
       $this->validate($request, [
            'title' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg,gif,webm,svg'
       ]);
        $slider = new Slider();
        $slider->title =  $request->title;
        $slider->description =  $request->description;
        if($request->hasFile('image')){
            $image = $request->file('image');
            $extension = $image->getClientOriginalExtension();
            $image_name = time().'.'.$extension;
            $image->move('uploads/images/slider/',$image_name);
            $slider->image = $image_name;
        }
        $slider->save();
        Toastr::success('slider Store Successfully', 'Success');
        return redirect()->route('admin.slider.index');
    }
    public function edit($id){
        $slider = Slider::findOrFail($id);
        return view('admin.pages.slider.edit', compact('slider'));
    }
    public function update(Request $request, $id){
        $this->validate($request, [
            'title' => 'required',
            'image' => 'mimes:png,jpg,jpeg,gif,webm,svg'
       ]);
        $slider = Slider::findOrFail($id);
        $slider->title =  $request->title;
        $slider->description =  $request->description;
        if($request->hasFile('image')){
            $image = $request->file('image');
            $extension = $image->getClientOriginalExtension();
            $image_name = time().'.'.$extension;
            $image->move('uploads/images/slider/',$image_name);
            $slider->image = $image_name;
        }
        $slider->save();
        Toastr::success('slider Store Successfully', 'Success');
        return redirect()->route('admin.slider.index');
    }
    public function destroy($id){
        $slider = Slider::findOrFail($id);
        $path = 'uploads/images/slider/'.$slider->image;
        if(File::exists($path)){
            File::delete($path);
        }
        $slider->delete();
        Toastr::success('slider Deletd Successfully', 'Success');
        return back();

    }
}
