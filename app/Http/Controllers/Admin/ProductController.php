<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\File;
use App\Http\Requests\ProductFormRequest;
use App\Models\Color;
use App\Models\ProductColor;
use App\Models\ProductImage;
use Carbon\Carbon;

class ProductController extends Controller
{
    public function index(){
        $products = Product::latest()->get();
        return view('admin.pages.product.index', compact('products'));
    }
    public function create(){
        $categories = Category::where('status', 1)->get();
        $brands = Brand::where('status', 1)->get();
        $colors = Color::where('status', 1)->get();

        return view('admin.pages.product.create', compact('categories','brands','colors'));
    }
    public function store(ProductFormRequest $request){

        $validateddata = $request->validated();
         //check category exist or not
         $category = Category::findOrFail($validateddata['category_id']);
         $product = $category->products()->create([
                'category_id' => $validateddata['category_id'],
                'brand_id' => $validateddata['brand_id'],
                'name' => $validateddata['name'],
                'slug' => Str::slug($validateddata['name']),
                'small_description' => $validateddata['small_description'],
                'description' => $validateddata['description'],
                'original_price' => $validateddata['original_price'],
                'selling_price' => $validateddata['selling_price'],
                'quantity' => $validateddata['quantity'],
                'tax' => $validateddata['tax'],
                'status' => $request->status == true ? 1 : 0,
                'trending' => $request->trending == true ? 1 : 0,
                'featured' => $request->featured == true ? 1 : 0,
                'meta_title' => $validateddata['meta_title'],
                'meta_keyword' => $validateddata['meta_keyword'],
                'meta_description' => $validateddata['meta_description'],

        ]);
        $i = 1;
        if($request->hasFile('image')){
            $images = $request->file('image');
            foreach($images as $imageFile){
                $extension = $imageFile->getClientOriginalExtension();
                $imageName = time().$i++.'.'.$extension;
                $imageFile->move('uploads/images/product/', $imageName);
                $productImage = $imageName;
                $product->productImages()->insert([
                    'product_id' =>$product->id,
                    'image' =>  $productImage,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]);
            }
        }
        //color
        if($request->colors){
            foreach($request->colors as $key=>$color){
                $product->productColors()->create([
                    'product_id' => $product->id,
                    'color_id' =>  $color,
                    'quantity' => $request->qty[$key] ?? 0
                ]);
            }

        }

        Toastr::success('product Store Successfully', 'Success');
        return redirect()->route('admin.product.index');
    }
    public function edit($id){
        $categories = Category::all();
        $brands = Brand::all();
        $product = Product::findOrFail($id);
        $color_id = $product->productColors->pluck('color_id')->toArray();
        $colors = Color::whereNotIn('id', $color_id)->get();
        return view('admin.pages.product.edit', compact('product', 'categories', 'brands', 'colors'));
    }
    public function update(ProductFormRequest $request, $id){
        $validateddata = $request->validated();

        $product =Category::findOrFail($validateddata['category_id'])->products()
                ->where('id', $id)->first();
        if($product){
            $product->update([
                'category_id' => $validateddata['category_id'],
                'brand_id' => $validateddata['brand_id'],
                'name' => $validateddata['name'],
                'slug' => Str::slug($validateddata['name']),
                'small_description' => $validateddata['small_description'],
                'description' => $validateddata['description'],
                'original_price' => $validateddata['original_price'],
                'selling_price' => $validateddata['selling_price'],
                'quantity' => $validateddata['quantity'],
                'tax' => $validateddata['tax'],
                'status' => $request->status == true ? 1 : 0,
                'trending' => $request->trending == true ? 1 : 0,
                'featured' => $request->featured == true ? 1 : 0,
                'meta_title' => $validateddata['meta_title'],
                'meta_keyword' => $validateddata['meta_keyword'],
                'meta_description' => $validateddata['meta_description'],
            ]);
            $i = 1;
            if($request->hasFile('image')){
                $images = $request->file('image');
                foreach($images as $imageFile){
                    $extension = $imageFile->getClientOriginalExtension();
                    $imageName = time().$i++.'.'.$extension;
                    $imageFile->move('uploads/images/product/', $imageName);
                    $productImage = $imageName;
                    $product->productImages()->insert([
                        'product_id' =>$product->id,
                        'image' =>  $productImage,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now()
                    ]);
                }
            }
             //color
        if($request->colors){
            foreach($request->colors as $key=>$color){
                $product->productColors()->create([
                    'product_id' => $product->id,
                    'color_id' =>  $color,
                    'quantity' => $request->qty[$key] ?? 0
                ]);
            }

        }

        }else{
            Toastr::error('product Not Found', 'Error');
            return redirect()->route('admin.product.index');
        }

        Toastr::success('product Update Successfully', 'Success');
        return redirect()->route('admin.product.index');
    }
    public function destroy($id){
        $product = Product::findOrFail($id);
        if($product->productImages){
            foreach($product->productImages as $images){
                if(File::exists('uploads/images/product/'.$images->image)){
                    File::delete('uploads/images/product/'.$images->image);
                }
            }
        }
        $product->delete();
        Toastr::success('Product Deletd Successfully', 'Success');
        return back();
    }
    public function destroy_image($id){
        $product_image = ProductImage::findOrFail($id);
        if($product_image){
            if(File::exists('uploads/images/product/'. $product_image->image)){
                File::delete('uploads/images/product/'. $product_image->image);
            }
        }
        $product_image->delete();
        Toastr::success('Product Image Deletd Successfully', 'Success');
        return back();
    }
    public function edit_color($id){
        $product = Product::findOrFail($id);
        return view('admin.pages.product.update_color', compact('product'));
    }

    public function update_color(Request $request ,$product_color_id){
        $product_color = Product::findOrFail($request->product_id)
                                    ->productColors->where('id', $product_color_id)->first();
            $product_color->update([
                'quantity' => $request->colorQty
            ]);
            return response()->json([
                'message' => 'Color Quantity Updated Successfully'
            ]);
    }

    public function destroy_color($product_color_id){
        $roduct_color = ProductColor::findOrFail($product_color_id);
        $roduct_color->delete();
        return response()->json([
            'message' => 'Product Color Deleted Successfully'
        ]);
    }

}
