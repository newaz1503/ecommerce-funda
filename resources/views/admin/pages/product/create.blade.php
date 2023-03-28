@extends('admin.layouts.app')

@section('title', 'Product')

@push('css')
    <style>
        .error{
            color: red;
        }
    </style>
@endpush

@section('content')
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor">Create New Product</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <a href="{{ route('admin.product.index') }}" class="btn btn-danger d-none d-lg-block m-l-15"><i class="fas fa-arrow-left"></i>
                        Back</a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    @if ($errors->any())
                        <div class="alert alert-warning">
                            @foreach ($errors->all() as $error)
                                <div>{{ $error }}</div>
                            @endforeach
                        </div>
                    @endif
                    <div class="card-body">
                        <form class="mt-4" method="post" action="{{ route('admin.product.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Select Category</label>
                                <select name="category_id" class="custom-select col-12" id="example-month-input2">
                                    <option disabled selected="">Choose Category...</option>
                                    @foreach ($categories as $category )
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach

                                </select>
                                @if ($errors->has('category_id'))
                                    <div class="error">{{ $errors->first('category_id') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Select Brand</label>
                                <select name="brand_id" class="custom-select col-12" id="example-month-input2">
                                    <option disabled selected="">Choose Brand...</option>
                                    @foreach ($brands as $brand )
                                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                    @endforeach

                                </select>
                                @if ($errors->has('brand_id'))
                                    <div class="error">{{ $errors->first('brand_id') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Select Color</label>
                                 <div class="row">
                                    @foreach ($colors as $color )
                                        <div class="border p-1 mr-2">
                                            <div class="col-lg-2 d-flex"style="align-items:baseline" >
                                               <span class="mr-1">Color:</span> <input type="checkbox" name="colors[{{ $color->id }}]" id="Color-{{ $color->id }}" value="{{$color->id }}" />
                                                 <label for="Color-{{ $color->id }}" style="align-self:baseline; margin-left: 5px ">{{ $color->name }}</label>
                                            </div>
                                            <span class="mr-1"> Quantity :</span> <input type="number"min="1" name="qty[{{ $color->id }}]" style="width:80px">
                                        </div>
                                    @endforeach
                                 </div>

                                @if ($errors->has('color_id'))
                                    <div class="error">{{ $errors->first('brand_id') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Product Name</label>
                                <input type="text" name="name" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" placeholder="Enter Product Name">
                                @if ($errors->has('name'))
                                    <div class="error">{{ $errors->first('name') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Short Description</label>
                                <textarea name="small_description" class="form-control" rows="5" placeholder="Product Short Description"></textarea>
                                @if ($errors->has('small_description'))
                                    <div class="error">{{ $errors->first('small_description') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="description" class="form-control" rows="5" placeholder="Product Description"></textarea>
                                @if ($errors->has('description'))
                                    <div class="error">{{ $errors->first('description') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Product Original Price</label>
                                <input type="number" name="original_price" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" placeholder="Enter Product Original Pice">
                                @if ($errors->has('original_price'))
                                    <div class="error">{{ $errors->first('original_price') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Product Selling Price</label>
                                <input type="number" name="selling_price" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" placeholder="Enter Product Original Pice">
                                @if ($errors->has('selling_price'))
                                    <div class="error">{{ $errors->first('selling_price') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Product Quantity</label>
                                <input type="number" name="quantity" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" placeholder="Enter Product Original Pice">
                                @if ($errors->has('quantity'))
                                    <div class="error">{{ $errors->first('quantity') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Product Tax</label>
                                <input type="number" name="tax" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" placeholder="Enter Product Original Pice">
                                @if ($errors->has('tax'))
                                    <div class="error">{{ $errors->first('tax') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>upload Image</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" name="image[]"  class="custom-file-input"
                                            id="inputGroupFile01" multiple>
                                        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                    </div>
                                </div>
                            </div>
                            <div class="custom-control custom-checkbox mr-sm-2 mb-3">
                                <input type="checkbox" name="status" class="custom-control-input" id="checkbox0"
                                    value="check">

                                <label class="custom-control-label" for="checkbox0">Status</label>
                                @if ($errors->has('status'))
                                     <div class="error">{{ $errors->first('status') }}</div>
                                @endif
                            </div>
                            <div class="custom-control custom-checkbox mr-sm-2 mb-3">
                                <input type="checkbox" name="trending" class="custom-control-input" id="checkbox1"
                                    value="check">
                                    @if ($errors->has('trending'))
                                        <div class="error">{{ $errors->first('trending') }}</div>
                                     @endif
                                <label class="custom-control-label" for="checkbox1">Popular</label>
                            </div>
                            <div class="custom-control custom-checkbox mr-sm-2 mb-3">
                                <input type="checkbox" name="featured" class="custom-control-input" id="checkbox2"
                                    value="check">
                                    @if ($errors->has('featured'))
                                        <div class="error">{{ $errors->first('featured') }}</div>
                                     @endif
                                <label class="custom-control-label" for="checkbox2">Featured</label>
                            </div>
                            <hr>
                            <p class="label label-success">SEO TAGS</p>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Meta Title</label>
                                <input type="text" name="meta_title" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" placeholder="Enter Meta Title">
                                    @if ($errors->has('meta_title'))
                                        <div class="error">{{ $errors->first('meta_title') }}</div>
                                     @endif
                            </div>
                            <div class="form-group">
                                <label>Meta Keyword</label>
                                <textarea name="meta_keyword" class="form-control" rows="5" placeholder="Meta Description"></textarea>
                                @if ($errors->has('meta_keyword'))
                                     <div class="error">{{ $errors->first('meta_keyword') }}</div>
                                 @endif
                            </div>
                            <div class="form-group">
                                <label>Meta Description</label>
                                <textarea name="meta_description" class="form-control" rows="5" placeholder="Meta Description"></textarea>
                                @if ($errors->has('meta_description'))
                                     <div class="error">{{ $errors->first('meta_description') }}</div>
                                @endif
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- row -->
    </div>
@endsection

@push('script')
@endpush
