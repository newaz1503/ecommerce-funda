@extends('front.layouts.app')

@section('title', 'Profile')

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
                <a href="{{ route('user.password') }}" class="btn btn-info float-end"><small>Change Password</small> </a>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="row page-titles mb-3 p-0">
            <div class="card col-md-6 m-auto p-0">
                <div class="card-header bg-info justify-content-between">
                    <h5 class="text-themecolor">Profile Settings</h5>
                </div>

            </div>
        </div>

        <div class="row" style="margin-top: -20px">
            <div class="col-md-6 m-auto p-0">
                <div class="card p-3">
                    <div class="card-body">
                        <form class="mt-4" method="post" action="{{ route('profile.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group mb-2">
                                <label for="exampleInputEmail1">Name</label>
                                <input type="text" name="name" value="{{ Auth::user()->name ?? '' }}" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" placeholder="Enter Name">
                                @if ($errors->has('name'))
                                    <div class="error">{{ $errors->first('name') }}</div>
                                @endif
                            </div>
                            <div class="form-group mb-2">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="email" name="email" value="{{ Auth::user()->email ?? '' }}" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" placeholder="Enter Email" readonly>
                               <small class="text-muted">You are not able to change your email</small>
                            </div>
                            <div class="form-group mb-2">
                                <label for="exampleInputEmail1">Password</label>
                                <input type="password" name="password" value="{{ Auth::user()->password ?? '' }}" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" placeholder="Enter Email" readonly>
                               <small class="text-muted">You are not able to change your email</small>
                            </div>
                            <div class="form-group mb-2">
                                <label for="exampleInputEmail1">Phone</label>
                                <input type="text" name="phone" value="{{ Auth::user()->phone ?? '' }}" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" placeholder="Enter Phone Number">
                                @if ($errors->has('phone'))
                                    <div class="error">{{ $errors->first('phone') }}</div>
                                @endif
                            </div>
                            <div class="form-group mb-2">
                                <label for="exampleInputEmail1">Zip/Pin Code</label>
                                <input type="text" name="pin_code" value="{{ Auth::user()->pin_code ?? '' }}" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" placeholder="Enter pin code">
                                @if ($errors->has('pin_code'))
                                    <div class="error">{{ $errors->first('pin_code') }}</div>
                                @endif
                            </div>
                            <div class="form-group mb-2">
                                <label for="exampleInputEmail1">City</label>
                                <input type="text" name="city" value="{{ Auth::user()->city ?? '' }}" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" placeholder="Enter City">
                                @if ($errors->has('city'))
                                    <div class="error">{{ $errors->first('city') }}</div>
                                @endif
                            </div>
                            <div class="form-group mb-2">
                                <label for="exampleInputEmail1">State</label>
                                <input type="text" name="state" value="{{ Auth::user()->state ?? '' }}"  class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" placeholder="Enter state">
                                @if ($errors->has('state'))
                                    <div class="error">{{ $errors->first('state') }}</div>
                                @endif
                            </div>
                            <div class="form-group mb-2">
                                <label for="exampleInputEmail1">Country</label>
                                <input type="text" name="country" value="{{ Auth::user()->country ?? '' }}" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" placeholder="Enter Country">
                                @if ($errors->has('country'))
                                    <div class="error">{{ $errors->first('country') }}</div>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <label for="exampleInputEmail1">Address 1</label>
                                <textarea name="address1" id="" rows="5" class="form-control" placeholder="Address 1">{{ Auth::user()->address1 ?? '' }}</textarea>
                                @if ($errors->has('address1'))
                                    <div class="error">{{ $errors->first('address1') }}</div>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <label for="exampleInputEmail1">Address 2</label>
                                <textarea name="address2" id="" rows="5" class="form-control" placeholder="Address 2">{{ Auth::user()->address2 ?? '' }}</textarea>
                                @if ($errors->has('address2'))
                                    <div class="error">{{ $errors->first('address2') }}</div>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-primary" >Save Change</button>
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
