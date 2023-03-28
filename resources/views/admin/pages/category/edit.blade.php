@extends('admin.layouts.app')

@section('title', 'Category')

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
                <h4 class="text-themecolor">Edit Category</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <a href="{{ route('admin.category.index') }}" class="btn btn-danger d-none d-lg-block m-l-15"><i class="fas fa-arrow-left"></i>
                        Back</a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form class="mt-4" method="post" action="{{ route('admin.category.update', $category->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="exampleInputEmail1">Category Name</label>
                                <input type="text" name="name" value="{{ $category->name }}" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" placeholder="Enter Category Name">
                                @if ($errors->has('name'))
                                    <div class="error">{{ $errors->first('name') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="description" class="form-control" rows="5" placeholder="Category Description">{{ $category->description }}</textarea>
                                @if ($errors->has('description'))
                                    <div class="error">{{ $errors->first('description') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>upload Image</label>

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" name="image" class="custom-file-input"
                                            id="inputGroupFile01">
                                        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                    </div>
                                </div>
                                <div class="my-3">
                                    @if ($category->image)
                                        <img src="{{ asset('uploads/images/category/'.$category->image) }}" alt="" width="120" height="100" class="rounded">
                                    @endif
                                </div>

                            </div>
                            <div class="custom-control custom-checkbox mr-sm-2 mb-3">
                                <input type="checkbox" name="status" {{ $category->status == true ? 'checked' : '' }} class="custom-control-input" id="checkbox0"
                                    value="check">
                                <label class="custom-control-label" for="checkbox0">Status</label>
                            </div>
                            <div class="custom-control custom-checkbox mr-sm-2 mb-3">
                                <input type="checkbox" name="popular" {{ $category->popular == true ? 'checked' : '' }} class="custom-control-input" id="checkbox1"
                                    value="check">
                                <label class="custom-control-label" for="checkbox1">Popular</label>
                            </div>
                            <hr>
                            <p class="label label-success">SEO TAGS</p>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Meta Title</label>
                                <input type="text" name="meta_title" value="{{ $category->meta_title }}" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" placeholder="Enter Meta Title">
                                    @if ($errors->has('meta_title'))
                                        <div class="error">{{ $errors->first('meta_title') }}</div>
                                     @endif
                            </div>
                            <div class="form-group">
                                <label>Meta Keyword</label>
                                <textarea name="meta_keyword" class="form-control" rows="5" placeholder="Meta Description">{{ $category->meta_keyword }}</textarea>
                                @if ($errors->has('meta_keyword'))
                                     <div class="error">{{ $errors->first('meta_keyword') }}</div>
                                 @endif
                            </div>
                            <div class="form-group">
                                <label>Meta Description</label>
                                <textarea name="meta_description" class="form-control" rows="5" placeholder="Meta Description">{{ $category->meta_description }}</textarea>
                                @if ($errors->has('meta_description'))
                                     <div class="error">{{ $errors->first('meta_description') }}</div>
                                @endif
                            </div>

                            <button type="submit" class="btn btn-primary">Update</button>
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




