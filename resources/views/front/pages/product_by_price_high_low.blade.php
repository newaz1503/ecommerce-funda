@extends('front.layouts.app')

@section('title')
    Product By Price
@endsection

@push('css')

@endpush

@section('content')
<section id="shop">
    <div class="container-fluid">
        <h1 class="title mb-5 text-center p-3">Sorted Product by Price (High to Low)</h1>

        <div class="row">
            <div class="col-12 col-mg-6 col-lg-3">
                <div class="left_sidebar">
                    <!-- categories -->
                    <div class="category">
                        <h3 class="shop_sidebar_title">Product Category</h3>
                        <div class="category_items">
                            <ul>
                                @forelse ($categories as $category)
                                    <li class="catgory_item">
                                        <a href="{{ route('category.product', $category->slug) }}">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <h6>{{ $category->name ?? '' }}</h6>

                                            </div>
                                        </a>
                                    </li>
                                @empty
                                    <div class="bg-danger p-2 text-center text-white">Product Not Found</div>
                                @endforelse

                            </ul>
                        </div>

                    </div>
                    <!-- brands -->
                    <div class="brand">
                        <h3 class="shop_sidebar_title">Brands</h3>
                        <div class="brands_items">
                            <ul>
                                @forelse ($brands as $brand)
                                <li class="brand_item">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="d-flex align-items-center">
                                            <a href="{{ route('brand.product', $brand->slug) }}">
                                                <label for="brand" class="ms-1">{{ $brand->name ?? '' }}</label>
                                            </a>
                                        </div>
                                        <div>
                                            <p class="justify-content-end">({{$brand->products->count() ?? 0 }})</p>
                                        </div>
                                    </div>
                                </li>
                                @empty
                                    <div class="bg-danger text-white text-center p-2 text-xs">Brands Not Found For This Category</div>
                                @endforelse

                            </ul>
                        </div>
                    </div>
                    <!-- price -->
                    <div class="price">
                        <h3 class="shop_sidebar_title">By Price</h3>
                        <div class="price_range">
                            <ul>
                                <li><a href="{{ route('product.price.high-to-low') }}">High to Low</a></li>
                                <li><a href="{{ route('product.price.low-to-high') }}">Low to High </a></li>
                            </ul>
                            {{-- <div class="range-slider">
                                <span class="rangeValues"></span>
                                <input value="0" min="0" max="50000" step="1" type="range">
                                <input value="50000" min="0" max="50000" step="1" type="range">
                            </div> --}}
                        </div>
                    </div>
                    <!-- colors -->
                    {{-- <div class="colors">
                        <h3 class="shop_sidebar_title">By Colors</h3>
                        <div class="colors_items">
                            <ul class="d-flex gap-2">
                                <li>
                                    <div class="color_item">
                                        <label>
                                            <input type="checkbox" class="form-control color_input">
                                            <span class="color_box black"></span>
                                        </label>
                                    </div>
                                </li>
                                <li>
                                    <div class="color_item">
                                        <label>
                                            <input type="checkbox" class="form-control color_input">
                                            <span class="color_box teal"></span>
                                        </label>
                                    </div>
                                </li>
                                <li>
                                    <div class="color_item">
                                        <label>
                                            <input type="checkbox" class="form-control color_input">
                                            <span class="color_box crimson"></span>
                                        </label>
                                    </div>
                                </li>
                                <li>
                                    <div class="color_item">
                                        <label>
                                            <input type="checkbox" class="form-control color_input">
                                            <span class="color_box blue"></span>
                                        </label>
                                    </div>
                                </li>
                                <li>
                                    <div class="color_item">
                                        <label>
                                            <input type="checkbox" class="form-control color_input">
                                            <span class="color_box pink"></span>
                                        </label>
                                    </div>
                                </li>
                            </ul>
                        </div>

                    </div> --}}
                </div>
            </div>

            <div class="col-12 col-mg-6 col-lg-9">
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
                             <div class="bg-danger text-white text-center p-2 w-75 m-auto rounded">No Product Available</div>
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
