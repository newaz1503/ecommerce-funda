@extends('front.layouts.app')

@section('title', 'Checkout')

@push('css')

@endpush

@section('content')
    <!-- checkout section -->
    <section id="checkout">
        <div class="container pt-4 pb-5">
            <!-- <h1 class="title mb-3">Checkout</h1> -->
                @php
                    $cart = App\Models\Cart::where('user_id', Auth::id())->get();
                @endphp
                @if(!empty($cart))
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-7">
                        <div class="personal_info">
                            <h1 class="personal_title">Personal Details</h1>
                            <form class="row g-3 py-3" method="post" action="{{ route('place.order') }}">
                                @csrf
                                <div class="col-md-6">
                                    <label for="inputEmail4" class="form-label">Name <span>*</span></label>
                                    <input type="text" name="name" value="{{ Auth::user()->name ?? ''}}" class="form-control" id="inputEmail4" placeholder="Name">
                                    @if($errors->has('name'))
                                        <div class="error text-danger" style="font-size: 12px">{{ $errors->first('name') }}</div>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <label for="inputEmail4" class="form-label">Email Address <span>*</span></label>
                                    <input type="email"  name="email" value="{{ Auth::user()->email ?? ''}}"  class="form-control" id="inputEmail4" placeholder="Email">
                                    @if($errors->has('email'))
                                        <div class="error text-danger" style="font-size: 12px">{{ $errors->first('email') }}</div>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <label for="inputEmail4" class="form-label">Phone Number <span>*</span></label>
                                    <input type="text" name="phone" value="{{ Auth::user()->phone ?? ''}}" class="form-control" id="inputEmail4" placeholder="Phone Number">
                                    @if($errors->has('phone'))
                                        <div class="error text-danger" style="font-size: 12px">{{ $errors->first('phone') }}</div>
                                    @endif
                                    </div>

                                    <div class="col-6">
                                        <label for="inputAddress" class="form-label">Address 1<span>*</span></label>
                                        <input type="text" class="form-control" value="{{ Auth::user()->address1 ?? ''}}" name="address1" id="inputAddress" placeholder="Address 1">
                                        @if($errors->has('address1'))
                                            <div class="error text-danger" style="font-size: 12px">{{ $errors->first('address1') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-6">
                                        <label for="inputAddress" class="form-label">Address 2<span>*</span></label>
                                        <input type="text" class="form-control" value="{{ Auth::user()->address2 ?? ''}}" name="address2" id="inputAddress" placeholder="Address 2">
                                        @if($errors->has('address2'))
                                            <div class="error text-danger" style="font-size: 12px">{{ $errors->first('address2') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputPassword4" class="form-label">City <span>*</span></label>
                                        <input type="text" class="form-control" value="{{ Auth::user()->city ?? ''}}" name="city" id="inputPassword4" placeholder="City">
                                        @if($errors->has('city'))
                                            <div class="error text-danger" style="font-size: 12px">{{ $errors->first('city') }}</div>
                                        @endif

                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputPassword4" class="form-label">State <span>*</span></label>
                                        <input type="text" class="form-control" name="state" value="{{ Auth::user()->state ?? ''}}" id="inputPassword4" placeholder="State">
                                        @if($errors->has('state'))
                                            <div class="error text-danger" style="font-size: 12px">{{ $errors->first('state') }}</div>
                                        @endif

                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputPassword4" class="form-label">Country <span>*</span></label>
                                        <input type="text" class="form-control" name="country" value="{{ Auth::user()->country ?? ''}}" id="inputPassword4" placeholder="Country">
                                        @if($errors->has('country'))
                                            <div class="error text-danger" style="font-size: 12px">{{ $errors->first('country') }}</div>
                                        @endif

                                    </div>
                                <div class="col-md-6">
                                    <label for="inputPassword4" class="form-label">Pin Code <span>*</span></label>
                                    <input type="text" class="form-control" name="pin_code" value="{{ Auth::user()->pin_code ?? ''}}" id="inputPassword4" placeholder="Pin Code">
                                    @if($errors->has('pin_code'))
                                            <div class="error text-danger" style="font-size: 12px">{{ $errors->first('pin_code') }}</div>
                                        @endif
                                </div>

                                {{-- <div class="col-12">
                                    <div class="form-check">
                                    <input class="form-check-input account_check" type="checkbox" id="gridCheck" onclick="checkFunction()">
                                    <label class="form-check-label" for="gridCheck">
                                        Create an account?
                                    </label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <input type="password" name="password" class="form-control hidden_password" id="inputEmail4" placeholder="Password">
                                </div> --}}

                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-5">
                        <div class="order_info">
                            <h3 class="order_title">Your Order Details</h3>
                            <div class="order_summery_box">
                                <div class="amount_summery">
                                    <table class="table table-bordered table-condensed">
                                        <thead>
                                            <tr>
                                                <td><b>SI</b></td>
                                                <td><b>Product</b></td>
                                                <td><b>Qty</b></td>
                                                <td><b>Price</b></td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $total = 0;
                                            @endphp

                                                @forelse ( $cartItems as $key=>$cart)
                                                <tr>
                                                    <td class="pb-2">{{ $key+1 }}</td>
                                                    <td class="pb-2">{{ $cart->products->name ?? '' }}</td>
                                                    <td class="pb-2">{{ $cart->qty ?? '' }}</td>
                                                    <td class="pb-2">{{ $cart->products->selling_price ?? '' }}</td>
                                                </tr>
                                                @php
                                                        $total += ($cart->products->selling_price * $cart->qty);
                                                    @endphp
                                                @empty
                                                    <p class="text-center bg-warning p-2">Order is empty</p>
                                                @endforelse

                                        </tbody>
                                    </table>
                                </div>
                                <div class="total d-flex justify-content-between align-items-center">
                                    <h6>Total</h6>
                                    <p>BDT {{ number_format($total, 2) }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="proceed_to_checkout mt-5">
                            <button type="submit" class="btn btn-success w-100 mb-2">Place Order | COD</button>
                            <button type="button" class="btn btn-primary w-100">Bkash</button>
                        </div>

                    </form>
                    </div>
                </div>
                @else
                <div class="text-center shadow p-3">
                    <h5 class="pb-3">No items in cart to checkout </h5>
                    <a href="{{ route('all.product') }}" class="btn btn-warning btn-md">Show Now</a>
                </div>

                @endif


        </div>
    </section>
     <!-- checkout section end-->
@endsection


@push('script')

@endpush
