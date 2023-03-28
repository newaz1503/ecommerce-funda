@extends('admin.layouts.app')

@section('title', 'brand')

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
                <h4 class="text-themecolor">Create New Brand</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <a href="{{ route('admin.brand.index') }}" class="btn btn-danger d-none d-lg-block m-l-15"><i class="fas fa-arrow-left"></i>
                        Back</a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form class="mt-4" method="post" action="{{ route('admin.brand.store') }}">
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
                                <label for="exampleInputEmail1">Brand Name</label>
                                <input type="text" name="name" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" placeholder="Enter Brand Name">
                                @if ($errors->has('name'))
                                    <div class="error">{{ $errors->first('name') }}</div>
                                @endif
                            </div>
                            <div class="custom-control custom-checkbox mr-sm-2 mb-3">
                                <input type="checkbox" name="status" class="custom-control-input" id="checkbox0"
                                    value="check">
                                <label class="custom-control-label" for="checkbox0">Status</label>
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
