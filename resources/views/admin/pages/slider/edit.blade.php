@extends('admin.layouts.app')

@section('title', 'Slider')

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
                <h4 class="text-themecolor">Create New Slider</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <a href="{{ route('admin.slider.index') }}" class="btn btn-danger d-none d-lg-block m-l-15"><i class="fas fa-arrow-left"></i>
                        Back</a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form class="mt-4" method="post" action="{{ route('admin.slider.update',$slider->id ) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="exampleInputEmail1">Slider Titler</label>
                                <input type="text" name="title" value="{{ $slider->title }}"  class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" placeholder="Enter Slider Titler">
                                @if ($errors->has('titler'))
                                    <div class="error">{{ $errors->first('titler') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="description" class="form-control" rows="5" placeholder="Slider Description">{{ $slider->description }}</textarea>
                                @if ($errors->has('description'))
                                    <div class="error">{{ $errors->first('description') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>upload Image</label>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" name="image" class="custom-file-input"
                                            id="inputGroupFile01">
                                        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                    </div>

                                </div>
                                <img src="{{ asset('uploads/images/slider/'.$slider['image']) }}" alt="{{ $slider['name'] }}" width="120" >
                            </div>
                            <div class="custom-control custom-checkbox mr-sm-2 mb-3">
                                <input type="checkbox" name="status" class="custom-control-input" id="checkbox0"
                                    {{ $slider->status == true ? 'checked' : '' }} >
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
