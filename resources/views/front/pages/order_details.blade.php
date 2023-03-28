@extends('layouts.app')

@section('title', 'Order Details')

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
                    @if($order->count() > 0)
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="mb-0 pb-0">Order Details</h5>
                            <a href="{{ route('my.order') }}" class="btn btn-info">Back</a>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-6">
                                    <h6 class="mb-2">Shipping Details</h6>
                                    <hr>
                                    <label for=""><b>Name</b></label>
                                    <div class="form-control p-2 mb-2">{{ $order->name ?? '' }}</div>
                                    <label for=""><b>Email</b></label>
                                    <div class="form-control p-2 mb-2">{{ $order->email ?? '' }}</div>
                                    <label for=""><b>Phone</b></label>
                                    <div class="form-control p-2 mb-2">{{ $order->phone ?? '' }}</div>
                                    <label for=""><b>Shipping Address</b></label>
                                    <div class="form-control p-2 border mb-2">
                                        <p class="mb-1">Address1: <span>{{  $order->address1 ?? '' }}</span></p>
                                        <p class="mb-1">Address2: <span> {{  $order->address2 ?? ''}}</span></p>
                                        <p class="mb-1">City:<span>{{  $order->city ?? ''}}</span></p>
                                        <p class="mb-1">State:<span>{{  $order->state ?? ''}}</span></p>
                                        <p class="mb-1">Country:<span>{{  $order->country ?? ''}}</span></p>
                                    </div>
                                    <label for=""><b>Pin Code</b></label>
                                    <div class="form-control p-2">{{ $order->pin_code ?? '' }}</div>
                                    <label for=""><b>Order Status</b></label>
                                    <div class="form-control p-2">
                                        @if($order->status == 0)
                                        <span class="btn btn-warning btn-sm">Pending</span>
                                        @else
                                        <span class="btn btn-success btn-sm">Completed</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-6">
                                    <h6 class="mb-3 border-b">Order Details</h6>
                                    <hr>
                                    <table class="table table-bordered">
                                        <thead>
                                          <tr>
                                            <th>SI</th>
                                            <th>Product</th>
                                            <th>Price</th>
                                            <th>Qty</th>
                                            <th>Image</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ( $order->orderDetails as $key=>$item)
                                              <tr>
                                                    <td>{{ $key+1 }}</td>
                                                    <td>{{ $item->product->name ?? '' }}</td>
                                                    <td>{{ $item->price ?? '' }}</td>
                                                    <td>{{ $item->qty ?? '' }}</td>
                                                    <td>
                                                        @if($item->product->productImages)
                                                        <img src="{{ asset('uploads/images/product/'.$item->product->productImages[0]->image) }}" class="card-img-top" alt="product Image" style="object-fit: contain; width: 60px; height: 40px">
                                                        @endif
                                                    </td>
                                              </tr>
                                            @empty
                                              <p class="bg-warning text-center p-2">No Order Yet !!</p>
                                            @endforelse

                                        </tbody>
                                      </table>
                                      <div class="bg-warning d-flex justify-content-between align-items-center px-3 rounded p-2 text-white">
                                            <p class="mb-0">Grand Total</p>
                                            <p class="mb-0">{{number_format($order->total_price ?? 0.00, 2) }}</p>
                                      </div>
                                </div>
                            </div>



                        </div>
                    </div>

                    @else
                    <div class="w-75 m-auto">
                        <div class="shadow bg-warning text-white rounded mt-3">
                            <p class="text-center p-2 "><strong>No Order Yet !!</strong></p>
                        </div>
                        <a href="{{ route('all.product') }}" class="btn btn-primary">Continue Shopping</a>
                    </div>



                    @endif

                </div>
            </div>

    </div>
@endsection

@push('script')

@endpush
