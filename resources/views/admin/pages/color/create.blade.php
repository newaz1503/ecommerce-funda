@extends('admin.layouts.app')

@section('title', 'Color')

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
                <h4 class="text-themecolor">Create New Color</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <a href="{{ route('admin.color.index') }}" class="btn btn-danger d-none d-lg-block m-l-15"><i class="fas fa-arrow-left"></i>
                        Back</a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form class="mt-4" method="post" action="{{ route('admin.color.store') }}">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">color Name</label>
                                <input type="text" name="name" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" placeholder="Enter Color Name">
                                @if ($errors->has('name'))
                                    <div class="error">{{ $errors->first('name') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">color Code</label>
                                <input type="text" name="code" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" placeholder="Enter Color Code">
                                @if ($errors->has('code'))
                                    <div class="error">{{ $errors->first('code') }}</div>
                                @endif
                            </div>
                            <div class="custom-control custom-checkbox mr-sm-2 mb-3">
                                <input type="checkbox" name="status" class="custom-control-input" id="checkbox0"
                                    value="1">
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
