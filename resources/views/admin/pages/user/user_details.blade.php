@extends('layouts.app')

@section('title', 'User Details')

@push('css')
    <style>
        label{
            font-size: 14px;
            opacity: 0.8;
        }
        p{
            font-weight: 600;
        }
    </style>
@endpush

@section('content')
    <div class="container">
        @if(session('message'))
            <div class="alert alert-warning">
                <p>{{ session('message') }}</p>
            </div>
        @endif
            <div class="row">
                <div class="col-12">
                    @if($user->count() > 0)
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="mb-0 pb-0">User Details</h5>
                            <a href="{{ route('admin.users') }}" class="btn btn-info">Back</a>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <label for=""><b>User Role</b></label>
                                    <div class="form-control p-2 mb-2">{{ $user->role_as == 1 ? 'Admin' : 'User'}}</div>
                                    <label for=""><b>Name</b></label>
                                    <div class="form-control p-2 mb-2">{{ $user->name ?? '' }}</div>
                                    <label for=""><b>Email</b></label>
                                    <div class="form-control p-2 mb-2">{{ $user->email ?? '' }}</div>
                                    <label for=""><b>Phone</b></label>
                                    <div class="form-control p-2 mb-2">{{ $user->phone ?? '' }}</div>
                                    <label for=""><b>Shipping Address</b></label>
                                    <div class="form-control p-2 buser mb-2">
                                        <p class="mb-1">Address1: <span>{{  $user->address1 ?? '' }}</span></p>
                                        <p class="mb-1">Address2: <span> {{  $user->address2 ?? ''}}</span></p>
                                        <p class="mb-1">City:<span>{{  $user->city ?? ''}}</span></p>
                                        <p class="mb-1">State:<span>{{  $user->state ?? ''}}</span></p>
                                        <p class="mb-1">Country:<span>{{  $user->country ?? ''}}</span></p>
                                    </div>
                                    <label for=""><b>Pin Code</b></label>
                                    <div class="form-control p-2">{{ $user->pin_code ?? '' }}</div>
                                </div>

                            </div>



                        </div>
                    </div>

                    @else
                    <div class="w-75 m-auto">
                        <div class="shadow bg-warning text-white rounded mt-3">
                            <p class="text-center p-2 "><strong>No User Yet !!</strong></p>
                        </div>

                    </div>
                    @endif

                </div>
            </div>
    </div>
@endsection

@push('script')

@endpush
