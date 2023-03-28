
@extends('front.layouts.app')

@section('title', 'Cart')

@push('css')

@endpush

@section('content')
     <!-- cart section -->
     <section id="cart">
        @php
            $cart = App\Models\Cart::where('user_id', Auth::id())->get();
         @endphp
        <div class="container-fluid py-3 pb-5 ">
            @if($cart->count() > 0)
            <h1 class="title mb-3 text-center">Shopping Cart</h1>

            <div class="row ">

                <div class="col-12 col-md-6 col-lg-9 m-auto">
                    <div class="row pt-4">
                        <div class="col-12">
                            <div class="cart_box cart_item_div">
                                <table class="table table-hover table-bordered table-striped">

                                        <thead class="table-light">
                                            <tr class="text-center">
                                                <th>product</th>
                                                <th>Image</th>
                                                <th>Price</th>
                                                <th>Quantity</th>
                                                <th>Total</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                    <tbody>
                                        <div class="">
                                            @php
                                            $total = 0;

                                            @endphp
                                            @forelse ($carts as $key=>$cart)

                                                <tr class="text-center cart_wrap">
                                                    <td class="name"><a href="{{ url('product-details'.'/'.$cart->products->category->slug.'/'.$cart->products->slug) }}">{{ $cart->products->name ?? ''}}</a> </td>
                                                    <td>
                                                        <div class="product_img">
                                                            @if($cart->products->productImages)
                                                                <img src="{{ asset('uploads/images/product/'.$cart->products->productImages[0]->image) }}" alt="Product Details Image" style="width: 80px; height: 60px" class="rounded" >
                                                            @endif

                                                        </div>
                                                    </td>
                                                    <input type="hidden" class="pro_id" value="{{ $cart->product_id }}">
                                                    <td class="price">৳{{ number_format($cart->products->selling_price, 2) }}</td>

                                                        <td class="quantity d-flex align-items-center justify-content-center">

                                                            <button class="py-1 px-2 border cart_decrement_btn changeQty" >-</button>
                                                                <input type="text" class="py-1 text-center cart_qty_input" value="{{ $cart->qty ?? 0}}" min="1">
                                                            <button class="py-1 px-2 border cart_increment_btn changeQty">+</button>

                                                        </td>
                                                    <td class="total">৳{{ number_format(($cart->products->selling_price * $cart->qty), 2) }}</td>
                                                    @php
                                                        $total += ($cart->products->selling_price * $cart->qty);
                                                    @endphp
                                                    <td>
                                                        <a href="{{ route('cart.destroy',$cart->id) }}"><i class="fas fa-trash text-danger cart_delete"></i></a>
                                                    </td>
                                                    {{-- <input type="text" name="product_id" value="{{ $cart->product_id }}"> --}}
                                                </tr>

                                            @empty
                                                <div class="bg-warning py-1 text-center">Cart is empty</div>
                                            @endforelse
                                        </div>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row py-4">
                        <div class="col-12 text-start">
                            <div class="btn_group">
                                <a href="{{ route('all.product') }}" class="btn me-3 continue_shop_btn">
                                    &#x2190; Continue Shopping
                                </a>
                                <a href="{{ route('front') }}" class="btn back_home_btn">
                                    <i class="fas fa-home"></i>
                                    <span>Back to Home</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row mt-4">
                        <div class="col-12 col-md-6 col-lg-8">
                            {{-- <div class="coupon">
                                <h3 class="coupon_title">Apply Cupon Code</h3>
                                <div class="coupon_input d-flex">
                                    <input type="text" class="form-control" placeholder="Enter Coupon Code">
                                    <button type="submit" class="btn apply_btn">Apply</button>
                                </div>
                            </div> --}}
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="cart_amount">
                                <h3 class="total_title mb-3">Cart totals</h3>
                                <div class="amount_info mt-4">
                                    <div class="cart_total_box d-flex justify-content-between mb-2">
                                        <h6 class="subtotal_text">Total: </h6>
                                        <p class="subtotal_amount" style="font-size: 20px">৳ {{ number_format($total, 2) }}</p>
                                    </div>

                                </div>
                                <div class="mt-3 proceed_checkout pt-4">
                                    <a href="{{ route('checkout') }}" class="btn checkout_btn">Proceed to Checkout</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            @else
                <div class="text-center shadow py-4 w-75 m-auto">
                    <h5 class="pb-3">Cart is empty </h5>
                    <a href="{{ route('all.product') }}" class="btn btn-warning btn-md">Shop Now</a>
                </div>
            @endif


        </div>
        <hr>
    </section>


@endsection


@push('script')

@endpush
