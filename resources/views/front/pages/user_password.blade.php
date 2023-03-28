@extends('front.layouts.app')

@section('title', 'User Password')

@push('css')
    <style>
        .error{
            color: red;
        }
        label{
            font-size: 14px;
            font-weight: 500;
            color: #222;
        }
    </style>
@endpush

@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-md-6 m-auto mb-3">
                <a href="{{ route('profile') }}" class="btn btn-info float-end"><small>Change Profile</small> </a>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="row page-titles mb-3 p-0">
            <div class="card col-md-6 m-auto p-0">
                <div class="card-header bg-info justify-content-between">
                    <h6 class="text-themecolor">Password Settings</h6>
                </div>

            </div>
        </div>

        <div class="row" style="margin-top: -20px">
            <div class="col-md-6 m-auto p-0">
                <div class="card p-3">
                    <div class="card-body">
                        <form class="mt-4" method="post" action="{{ route('user.password.change') }}">
                            @csrf
                            <div class="form-group mb-2">
                                <label for="exampleInputEmail1">Current Password</label>
                                <input type="password" name="current_password" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" placeholder="Enter Old Password">
                                @if ($errors->has('current_password'))
                                    <div class="error">{{ $errors->first('current_password') }}</div>
                                @endif
                            </div>
                            <div class="form-group mb-2">
                                <label for="exampleInputEmail1">New Password</label>
                                <input type="password" name="password" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" placeholder="Enter New Password">
                                @if ($errors->has('password'))
                                    <div class="error">{{ $errors->first('password') }}</div>
                                @endif
                            </div>
                            <div class="form-group mb-4">
                                <label for="exampleInputEmail1">Confirm Password</label>
                                <input type="password" name="password_confirmation" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" placeholder="Enter Password again">
                                @if ($errors->has('password_confirmation'))
                                    <div class="error">{{ $errors->first('password_confirmation') }}</div>
                                @endif
                            </div>

                            <button type="submit" class="btn btn-primary"><small>Save Change</small></button>
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
