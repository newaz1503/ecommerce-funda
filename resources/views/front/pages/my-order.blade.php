@extends('layouts.app')

@section('title', 'My Order')

@push('css')

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
                    @if($orders->count() > 0)
                    <div class="card">
                        <div class="card-header">
                            <h5>My Order</h5>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                  <tr>
                                    <th>SI</th>
                                    <th>Order Date</th>
                                    <th>Tracking No</th>
                                    <th>Name</th>
                                    <th>Total Price</th>
                                    <th>Payment Mode</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @forelse ( $orders as $key=>$order)
                                      <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ date('d/m/Y', strtotime($order->created_at)) }}</td>
                                        <td>{{ $order->tracking_no ?? '' }}</td>
                                        <td>{{ $order->name ?? '' }}</td>
                                        <td>{{ number_format($order->total_price ?? '', 2) }}</td>
                                        <td class="text-muted"><b>{{ $order->payment_method ?? '' }}</b></td>
                                        <td>
                                            @if($order->status == 0)
                                                <span class="btn btn-warning btn-sm">Pending</span>
                                            @else
                                               <span class="btn btn-success btn-sm">Completed</span>
                                            @endif
                                        </td>

                                        <td>
                                            <a href="{{ route('order.details',$order->id) }}" class="btn btn-primary btn-sm">View</a>
                                        </td>
                                      </tr>
                                    @empty
                                      <p class="bg-warning text-center p-2">No Order Yet !!</p>
                                    @endforelse


                                </tbody>
                              </table>
                              {{ $orders->links() }}
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
