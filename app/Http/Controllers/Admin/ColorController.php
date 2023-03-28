<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Requests\ColorFormRequest;
use App\Models\Color;

class ColorController extends Controller
{
    public function index(){
        $colors = Color::latest()->get();
        return view('admin.pages.color.index', compact('colors'));
    }
    public function create(){
        return view('admin.pages.color.create');
    }
    public function store(Request $request){
        $this->validate($request, [
            'code' => 'required'
        ]);
        $Color = new Color();
        $Color->name = $request['name'];
        $Color->code = $request['code'];
        $Color->status = 1;
        $Color->save();
        Toastr::success('Color Store Successfully', 'Success');
        return redirect()->route('admin.color.index');
    }
    public function edit($id){
        $color = Color::findOrFail($id);
        return view('admin.pages.color.edit', compact('color'));
    }
    public function update(Request $request, $id){
        $this->validate($request, [
            'code' => 'required'
        ]);
        $Color = Color::findOrFail($id);
        $Color->name = $request['name'];
        $Color->code = $request['code'];
        $Color->status = $request->input('status') ? 1 : 0;
        $Color->update();
        Toastr::success('Color Updated Successfully', 'Success');
        return redirect()->route('admin.color.index');
    }
    public function destroy($id){
        $Color = Color::findOrFail($id);
        $Color->delete();
        Toastr::success('Color Deletd Successfully', 'Success');
        return back();

    }
}
