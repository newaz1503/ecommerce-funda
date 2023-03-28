@extends('front.layouts.app')

@section('title', 'Serach Product')

@push('css')

@endpush

@section('content')
<section id="shop">
    <div class="container">
        <h1 class="title mb-5 text-center p-3">Search Result</h1>

        <div class="row">
            <div class="col-12 col-mg-12 col-lg-12">

                <div class="shop_product">
                    <div class="row row-cols-1 row-cols-md-4 g-2 pt-3">
                        @forelse($products as $product)
                            <div class="col h-100">
                                <div class="product">
                                    <div class="card product_details_box">
                                        <div class="tag text-white">
                                            @if($product->quantity > 0)
                                                <label class="bg-success px-1" style="font-size: 0.1rem">In Stock</label>
                                              @else
                                              <label class="bg-danger px-1" style="font-size: 0.1rem">Out of Stock</label>
                                            @endif

                                        </div>
                                        @if($product->productImages->count() > 0)
                                            <a href="{{ url('product-details'.'/'.$product->category->slug.'/'.$product->slug) }}">
                                                <img src="{{ asset('uploads/images/product/'.$product->productImages[0]->image) }}" class="card-img-top" alt="product Image">
                                            </a>
                                        @endif

                                        <input type="hidden" name="product_id" class="product_id" value="{{ $product->id }}">
                                        <input type="hidden" name="product_id" class="qty" value="{{ $product->quantity }}">
                                            <div class="card-body pt-2">
                                                <div class="brand text-muted text-left" style="font-size: 12px">{{ $product->brand->name ?? ''}}</div>
                                                <a href="{{ url('product-details'.'/'.$product->category->slug.'/'.$product->slug) }}">
                                                    <h5 class="text-center card-title pb-3">{{ $product->name ?? '' }}</h5>
                                                </a>
                                                <div class="price mb-3 d-flex gap-3 justify-content-center">
                                                    <span class=" original_price">${{ $product->selling_price ?? '' }}</span>
                                                    <span class="old_price"><del>${{ $product->original_price ?? '' }}</del></span>

                                                </div>
                                            </div>

                                            {{-- <a href="javascript:void(0)" class="btn btn-primary addToCart">Add to Cart</a> --}}
                                        {{-- <div class="icon_group d-flex flex-column gap-2">
                                            <div class="view_icon_box">
                                                <a href="{{ url('product-details'.'/'.$product->category->slug.'/'.$product->slug) }}">
                                                    <div class="product_view" title="Quick view">
                                                        <i class="far fa-eye icon view_icon text-white"></i>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="cart_icon_box">
                                                <a href="javascript:void(0)" class="addToCart">
                                                    <div class="product_cart" title="Add to cart">
                                                    <i class="fas fa-shopping-cart cart_icon text-white"></i>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="cart_icon_box">
                                                <a href="{{ route('product.wishlist',$product->id) }}">
                                                    <div class="product_cart" title="Add to wishlist">
                                                      <i class="far fa-heart icon wishlist_icon text-white"></i>
                                                    </div>
                                                </a>
                                            </div>

                                        </div> --}}

                                    </div>
                                </div>
                            </div>
                        @empty

                                <div class="bg-danger text-white text-center p-2 w-75 m-auto rounded m-auto">No Product Available</div>


                        @endforelse


                    </div>

                </div>

            </div>
        </div>
    </div>
</section>
@endsection


@push('script')

@endpush
