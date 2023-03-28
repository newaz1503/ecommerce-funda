@extends('front.layouts.app')

@section('title', 'Welcome to Home')

@push('css')

@endpush

@section('content')
<section id="slider">
    <div class="container">
        <div class="row">
            <!-- slider left  -->
            <div class="col-12 col-md-12 col-lg-12">
                <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @foreach ( $sliders as $key=>$slider)
                            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                @if($slider->image)
                                    <img src="{{ asset('uploads/images/slider/'.$slider->image) }}" class="d-block w-100" alt="Slider Img">
                                @endif
                                <div class="carousel-caption d-none d-md-block px-2">
                                    <h3 class="caption_title pt-2">{!! $slider->title ?? '' !!}</h3>
                                    <p class="caption_desc py-3">{!! $slider->description ?? '' !!}</p>
                                    <a href="{{ route('all.product') }}" class="btn caption_btn">Shop Now</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- slider section end -->

<!-- product category -->
<div id="category">
    <div class="container">
        <h1 class="title">Our Product Categories</h1>
        <div class="owl-carousel owl-theme text-center product_category">
            @forelse ( $categories as $key=>$category)
                <div class="item">
                    <a href="{{ route('category.product', $category->slug) }}">
                        <div class="category_img">
                            <img src="{{ asset('uploads/images/category/'.$category->image) }}" alt="{{ $category->name }}">
                        </div>

                        <h5 class="pt-3">{!! $category->name ?? '' !!}</h5>
                    </a>
                </div>
            @empty
                <p class="bg-danger p-2 text-white text-center">Category Not Found</p>
            @endforelse


        </div>
    </div>
</div>
<!-- product category end-->

 <!--Trending product-->
 <section id="today_spacial">
    <div class="container product_details_box">
        <div class="today_title_box">
            <h1 class="title">Trending Product</h1>
        </div>
        <div class="owl-carousel today_special_collection owl-theme">
            @foreach ( $trending_products as $product)
                <div class="item">
                    <div class="card text-center product_details_box">
                        <a href="{{ url('product-details'.'/'.$product->category->slug.'/'.$product->slug) }}" style="height: 200px">
                          <img src="{{ asset('uploads/images/product/'.$product->productImages[0]->image) }}" class="card-img-top" alt="product Image" style="object-fit: contain; height: 100%">
                        </a>
                        <div class="card-body">
                            <a href="{{ url('product-details'.'/'.$product->category->slug.'/'.$product->slug) }}">
                                <h5 class="card-title">{{ $product->name ?? '' }}</h5>
                                </a>
                            <div class="price mb-2 d-flex gap-3 justify-content-center px-3" style="font-size: 20px">
                                <span class="original_price">${{ $product->selling_price ?? '' }}</span>
                                <span class="old_price"><del>${{ $product->original_price ?? '' }}</del></span>
                            </div>
                        </div>
                        <input type="hidden" class="product_id" value="{{ $product->id }}">
                        <input type="hidden" class="qty" value="{{ $product->quantity }}">

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
            @endforeach

        </div>
    </div>
</section>
<!--Trending product end-->

 <!--New Arrival-->
 <section id="today_spacial">
        <div class="container product_details_box">
            <div class="today_title_box">
                <h1 class="title">New Arrival Product</h1>
            </div>
            <div class="owl-carousel today_special_collection owl-theme">
                @foreach ( $latest_products as $lproduct)
                    <div class="item">
                        <div class="card text-center product_details_box">
                            <a href="{{ url('product-details'.'/'.$lproduct->category->slug.'/'.$lproduct->slug) }}" style="height: 200px">
                              <img src="{{ asset('uploads/images/product/'.$lproduct->productImages[0]->image) }}" class="card-img-top" alt="product Image" style="object-fit: contain; height: 100%">
                            </a>
                            <div class="card-body">
                                <a href="{{ url('product-details'.'/'.$lproduct->category->slug.'/'.$lproduct->slug) }}">
                                    <h5 class="card-title">{{ $lproduct->name ?? '' }}</h5>
                                    </a>
                                <div class="price mb-2 d-flex gap-3 justify-content-center px-3" style="font-size: 20px">
                                    <span class="original_price">${{ $lproduct->selling_price ?? '' }}</span>
                                    <span class="old_price"><del>${{ $lproduct->original_price ?? '' }}</del></span>
                                </div>
                            </div>
                            <input type="hidden" class="product_id" value="{{ $lproduct->id }}">
                            <input type="hidden" class="qty" value="{{ $lproduct->quantity }}">

                            {{-- <a href="javascript:void(0)" class="btn btn-primary addToCart">Add to Cart</a> --}}
                            {{-- <div class="icon_group d-flex flex-column gap-2">
                                <div class="view_icon_box">
                                    <a href="{{ url('product-details'.'/'.$lproduct->category->slug.'/'.$lproduct->slug) }}">
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
                                    <a href="{{ route('product.wishlist',$lproduct->id) }}">
                                        <div class="product_cart" title="Add to wishlist">
                                          <i class="far fa-heart icon wishlist_icon text-white"></i>
                                        </div>
                                    </a>
                                </div>

                            </div> --}}


                        </div>
                    </div>
                @endforeach

            </div>
        </div>
 </section>
 <!--New Arrival end-->

<!-- featured product -->
<section id="featuredProduct">
    <div class="container product_details_box">
        <h1 class="title mb-3">Featured Products</h1>
        <div class="row row-cols-1 row-cols-md-5 g-2 pt-3">
            @foreach ($featured_products as $product)
                <div class="col h-100">
                    <div class="product">
                        <div class="card text-center product_details_box">
                            {{-- <div class="tag">
                                <a href="" class="tag_info">-15%</a>
                            </div> --}}
                            <a href="{{ url('product-details'.'/'.$product->category->slug.'/'.$product->slug) }}" style="height: 200px">
                                <img src="{{ asset('uploads/images/product/'.$product->productImages[0]->image) }}" class="card-img-top" alt="product Image" style="object-fit: contain; height: 100%">
                              </a>

                                <div class="card-body">
                                    <a href="{{ url('product-details'.'/'.$product->category->slug.'/'.$product->slug) }}">
                                        <h5 class="card-title">{{ $product->name ?? '' }}</h5>
                                    </a>
                                    <div class="price mb-3 d-flex gap-3 justify-content-center">
                                        <span class="original_price">${{ $product->selling_price ?? '' }}</span>
                                        <span class="old_price"><del>${{ $product->original_price ?? '' }}</del></span>
                                    </div>
                                </div>

                                <input type="hidden" class="product_id" value="{{ $product->id }}">
                                <input type="hidden" class="qty" value="{{ $product->quantity }}">

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
            @endforeach


        </div>

        <div class="load_more text-center">
            <a href="{{ route('all.product') }}" class="load_more_btn" sty>Load More</a>
        </div>
    </div>
</section>
<!-- featured product end-->
@endsection


@push('script')

@endpush
