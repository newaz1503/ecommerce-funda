@extends('front.layouts.app')

@section('title')
    product Details
@endsection

@push('css')
    <style>
        .login{
            font-size: 16px;
            color: blue;
            font-weight: 600;
            text-decoration: underline;
        }
        /* rating */
.rating-css div {
    color: #ffe400;
    font-size: 30px;
    font-family: sans-serif;
    font-weight: 800;
    text-align: center;
    text-transform: uppercase;
    padding: 20px 0;
  }
  .rating-css input {
    display: none;
  }
  .rating-css input + label {
    font-size: 60px;
    text-shadow: 1px 1px 0 #8f8420;
    cursor: pointer;
  }
  .rating-css input:checked + label ~ label {
    color: #b4afaf;
  }
  .rating-css label:active {
    transform: scale(0.8);
    transition: 0.3s ease;
  }

/* End of Star Rating */
    </style>
@endpush

@section('content')

       <!-- product details section -->
 <section id="product_details">
    <div class="container product_details_box">
        @if(Session::has('message'))
        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }} <a href="{{ route('login') }}" class="login">Login</a> </p>
        @endif
        @if(Session::has('msg'))
        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('msg') }}</p>
        @endif
        <div class="row ">
            <div class="col-12 col-md-6 col-lg-6">
                <div class="product_details_image">
                    @if($product->productImages)
                    <div class="exzoom" id="exzoom">
                        <!-- Images -->
                        <div class="exzoom_img_box">
                          <ul class='exzoom_img_ul'>
                            @foreach ( $product->productImages as $itemImg)
                                <li><img src="{{ asset('uploads/images/product/'.$itemImg->image) }}"  /></li>
                            @endforeach
                          </ul>
                        </div>

                        <div class="exzoom_nav"></div>

                        <p class="exzoom_btn">
                            <a href="javascript:void(0);" class="exzoom_prev_btn"> < </a>
                            <a href="javascript:void(0);" class="exzoom_next_btn"> > </a>
                        </p>
                      </div>
                    @else
                        <div>No image Available</div>
                    @endif

                    {{-- <img src="{{ asset('uploads/images/product/'.$product->productImages[0]->image) }}" alt="Product Details Image" class="big_image w-100">
                    <div class="more_image_box d-flex gap-3 my-3">
                        <div class="small_img">
                            <img src="./images/xproduct_1.png.pagespeed.ic.DvPBG5vxas.png" alt="small img" class="small_image" onclick="changeImage(this.src)">
                        </div>
                        <div class="small_img">
                            <img src="./images/xproduct_3.png.pagespeed.ic.jCfub0gA7s.png" alt="small img" class="small_image" onclick="changeImage(this.src)">
                        </div>
                        <div class="small_img">
                            <img src="./images/xproduct_7.png.pagespeed.ic.9nA45gs3KX.png" alt="small img" class="small_image" onclick="changeImage(this.src)">
                        </div>
                        <div class="small_img">
                            <img src="./images/xproduct_9.png.pagespeed.ic.I5FJ0ewNHX.png" alt="small img" class="small_image" onclick="changeImage(this.src)">
                        </div>
                        <div class="small_img">
                            <img src="./images/xproduct_10.png.pagespeed.ic.69mYA3FDZH.png" alt="small img" class="small_image" onclick="changeImage(this.src)">
                        </div>
                    </div> --}}
                </div>
            </div>
            @php
               $rating_number = number_format($rating_count);
            @endphp
            <div class="col-12 col-md-6 col-lg-6">
                <div class="product_details_content">
                    <span class="badge text-bg-secondary">{{ $category->name ?? '' }}</span>
                    <h1 class="product_name">{{ $product->name ?? '' }}</h1>
                    <p class="py-1">Small Description: {!! $product->small_description !!}</p>
                    <div class="ratings_box d-flex gap-1">
                        @for($i = 1; $i <= $rating_number; $i++)
                            <div class="rating">
                                <i class="fas fa-star checked"></i>
                            </div>
                        @endfor
                        @for($j=$rating_number+1; $j <= 5; $j++)
                            <div class="rating">
                                <i class="fas fa-star"></i>
                            </div>
                        @endfor

                        <div class="ps-1">
                            @if($rating_number > 0)
                                <span class="rating_count">{{ number_format($rating_number) ?? '' }} Ratings</span>
                            @else
                                <span class="rating_count">No Ratings</span>
                            @endif
                        </div>
                    </div>
                    <h6 class="product_brand">Product Brand: <a href="#">{{ $product->brand->name ?? '' }}</a></h6>
                    {{-- <h6 class="product_code">Product Code: D-332-4233</h6> --}}
                    <hr>
                    <h2 class="product_price fs-3">৳ {{ number_format($product->selling_price ?? '',2) }}</h2>

                     {{-- <div class="size mt-3">
                        <label for="size" class="size_text">Size: </label>
                        <select name="size" id="size" class="w-25 size_input">
                            <option value="" selected disabled class="text-muted">Select Size</option>
                            <option value="small">Small</option>
                            <option value="medium">Medium</option>
                            <option value="large">Large</option>
                        </select>
                    </div> --}}
                    @if($product->productColors->count() > 0)
                        <div class="colors d-flex gap-2 mt-2 align-items-center fs-6 ">
                            <label for="" class="color_text">Color : </label>
                            <select name="coloroptions" id="" class="form-control" style="width: 200px">
                                <option value="" selected disabled>Select Color</option>
                                @if($product->productColors)
                                    @forelse ($product->productColors as $colorItem)
                                        <option value="{{ $colorItem->id }}" >{{ $colorItem->color->name }}</option>
                                    @empty
                                        <option value="" disabled >No Color Available</option>
                                    @endforelse

                                @endif
                            </select>
                        </div>
                    @else
                        @if($product->quantity > 0)
                            <p class="fs-6">Availability : <span class="badge text-bg-success">Instock</span></p>
                        @else
                            <p class="fs-6">Availability : <span class="badge text-bg-danger">Out of stock</span></p>
                        @endif

                     @endif
                     <input type="hidden" name="product_id" class="product_id" value="{{ $product->id }}">
                     @if($product->quantity > 0)
                        <div class="quantity d-flex align-items-baseline mt-4">
                            <label for="" class="qty_text">Quantity : </label>
                            <div class="d-flex">
                                <input type="number" class="form-control qty" name="qty" value="1" min="1" style="width: 70px">
                            </div>
                        </div>
                    @endif
                    @if($product->quantity > 0)
                        <div class="product_btn d-flex gap-3 mt-3">
                            <div class="cart_btn_box">
                                <button  class="btn cart_btn addToCart"><i class="fas fa-shopping-basket me-1"></i> Add To Cart</button>
                            </div>
                            <div class="wishlist_btn_box">
                                <a href="{{ route('product.wishlist',$product->id) }}" class="btn wishlist_btn"><i class="far fa-heart me-1"></i> Add To Wishlist</a>
                            </div>
                    </div>
                    @endif

                </div>
            </div>
        </div>
        <hr>
        <!-- extra options -->
        <div class="row py-4">
            <div class="col-12">
                <div class="review_descriptiobn_box border p-3">
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                          <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-description" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Description</button>
                        </li>
                        <li class="nav-item" role="presentation">
                          <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-reviews" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Reviews({{ $reviews->count() ?? '' }})</button>
                        </li>

                      </ul>
                      <hr>
                      <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-description" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
                            <div class="description_box px-1 py-3">
                                <p class="px-2 pb-2 text-muted">{{$product->description ?? ''  }}</p>
                            </div>
                            <div class="rating_modal_btn">
                                <button type="button" class="btn btn-link" data-bs-toggle="modal" data-bs-target="#rateProduct">
                                    Rate this product
                                  </button>
                            </div>
                            <!-- Rating Modal -->
                            <div class="modal fade" id="rateProduct" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form action="{{ route('rating.store') }}" method="post">
                                            @csrf
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">{{ $product->name ?? '' }}</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                            <div class="modal-body">
                                                <div class="rating-css">
                                                    <div class="star-icon">
                                                    @if($user_rating)
                                                        @for($i = 1; $i <= $user_rating->star_rated; $i++)
                                                        <input type="radio" value="{{$i}}" name="product_rating" checked id="rating{{$i}}">
                                                        <label for="rating{{$i}}" class="fa fa-star"></label>
                                                    @endfor
                                                    @for($j=$user_rating->star_rated+1; $j <= 5; $j++)
                                                        <input type="radio" value="{{$j}}" name="product_rating" id="rating{{$j}}">
                                                        <label for="rating{{$j}}" class="fa fa-star"></label>
                                                    @endfor

                                                    @else
                                                        <input type="radio" value="1" name="product_rating" checked id="rating1">
                                                        <label for="rating1" class="fa fa-star"></label>
                                                        <input type="radio" value="2" name="product_rating" id="rating2">
                                                        <label for="rating2" class="fa fa-star"></label>
                                                        <input type="radio" value="3" name="product_rating" id="rating3">
                                                        <label for="rating3" class="fa fa-star"></label>
                                                        <input type="radio" value="4" name="product_rating" id="rating4">
                                                        <label for="rating4" class="fa fa-star"></label>
                                                        <input type="radio" value="5" name="product_rating" id="rating5">
                                                        <label for="rating5" class="fa fa-star"></label>
                                                    @endif

                                                    </div>
                                                    @if($errors->has('product_rating'))
                                                        <div class="error">{{ $errors->first('product_rating') }}</div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-reviews" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
                            <div class="review_wrap">
                                @if ($verified_check->count() > 0)
                                    <h5 class="review_text">Write Your Review for {{ $product->name ?? '' }}</h5>
                                    <hr>
                                    <form action="{{ route('store.review') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{$product->id  }}">
                                    <div class="input-group mb-4">
                                        <span class="text-danger">*</span>
                                        <textarea name="review" rows="5" class=" d-block form-control py-1 ps-2 ms-1" placeholder="Message"></textarea>

                                    </div>
                                    @if($errors->has('review'))
                                     <div class="error text-danger">{{ $errors->first('review') }}</div>
                                    @endif
                                    <div class="input-group ms-1">
                                        <button type="submit" class="btn btn_review">Add Review</button>
                                    </div>
                                </form>
                                @else
                                    <div class="alert alert-danger rounded p-3">
                                        <h5>You are not eligible to review this product</h5>
                                        <p>Only those customers who purchased the product can write a review about the product</p>
                                        <p class="pt-2 pb-3"></p>
                                        <a href="{{ route('front') }}" class="btn btn-primary btn-sm">Got to home</a>
                                    </div>
                                @endif
                            </div>
                            <div class="row">
                                <div class="col-12">

                                     <div class="review_wrap">
                                        @foreach ($reviews as $review)
                                            <div class="user_review mb-3">
                                                <label for="">{{ $review->user->name ?? '' }}</label>
                                                @if($review->user_id == Auth::id())
                                                     {{-- <a href="" class="btn btn-link">Edit</a> --}}
                                                @endif

                                                <div class="ratings_box d-flex gap-1">
                                                    @php
                                                        $rating = App\Models\Rating::where('product_id', $product->id)->where('user_id', $review->user->id)->first();
                                                    @endphp
                                                    @if($rating)
                                                        @php
                                                            $user_rating_len = $rating->star_rated;

                                                        @endphp
                                                        @for($i = 1; $i <= $user_rating_len; $i++)
                                                            <i class="fas fa-star checked"></i>
                                                        @endfor
                                                        @for($j=$user_rating_len+1; $j <= 5; $j++)
                                                            <i class="fas fa-star"></i>
                                                        @endfor
                                                    @endif
                                                    <small class="text-muted">Reviewed On: {{ $review->created_at->diffForHumans() }}</small>
                                                </div>
                                                <p class="py-1 text-muted">{{ $review->review ?? '' }}</p>
                                            </div>
                                        @endforeach

                                     </div>
                                </div>
                            </div>
                        </div>
                      </div>
                </div>
            </div>

        </div>
    </div>
</section>
 <!-- product details section end-->

 <!-- releted category product section-->
 <section id="related_product">
    <div class="container">
        <h1 class="title">Related {{ $category ?  $category->name : '' }} category Product</h1>
        <div class="row row-cols-1 row-cols-md-5 g-2 pt-4">
            @foreach ($category->related_product as $related_product)
            <div class="col h-100">
                <div class="product">
                    <div class="card text-center product_details_box">
                        {{-- <div class="tag">
                            <a href="" class="tag_info">-15%</a>
                        </div> --}}
                        <a href="{{ url('product-details'.'/'.$related_product->category->slug.'/'.$related_product->slug) }}" style="height: 200px">
                            <img src="{{ asset('uploads/images/product/'.$related_product->productImages[0]->image) }}" class="card-img-top" alt="product Image" style="object-fit: contain; height: 100%">
                          </a>

                            <div class="card-body">
                                <a href="{{ url('product-details'.'/'.$related_product->category->slug.'/'.$related_product->slug) }}">
                                    <h5 class="card-title">{{ $related_product->name ?? '' }}</h5>
                                </a>
                                <div class="price mb-3 d-flex gap-3 justify-content-center">
                                    <span class="original_price">${{ $related_product->selling_price ?? '' }}</span>
                                    <span class="old_price"><del>${{ $related_product->original_price ?? '' }}</del></span>
                                </div>
                            </div>

                            <input type="hidden" class="product_id" value="{{ $related_product->id }}">
                            <input type="hidden" class="qty" value="{{ $related_product->quantity }}">

                        {{-- <a href="javascript:void(0)" class="btn btn-primary addToCart">Add to Cart</a> --}}
                        {{-- <div class="icon_group d-flex flex-column gap-2">
                            <div class="view_icon_box">
                                <a href="{{ url('product-details'.'/'.$related_product->category->slug.'/'.$related_product->slug) }}">
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
                                <a href="{{ route('product.wishlist',$related_product->id) }}">
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
    </div>
 </section>
  <!-- releted category product section end-->

   <!-- releted brand product section -->
 <section id="related_product">
    <div class="container">
        <h1 class="title">Related {{ $product->brand ?  $product->brand->name : '' }} brand Product</h1>
        <div class="row row-cols-1 row-cols-md-5 g-2 pt-4">
            @foreach ($category->related_product as $related_product)
                @if($related_product->brand->name == $product->brand->name)
                <div class="col h-100">
                    <div class="product">
                        <div class="card text-center product_details_box">
                            {{-- <div class="tag">
                                <a href="" class="tag_info">-15%</a>
                            </div> --}}
                            <a href="{{ url('product-details'.'/'.$related_product->category->slug.'/'.$related_product->slug) }}" style="height: 200px">
                                <img src="{{ asset('uploads/images/product/'.$related_product->productImages[0]->image) }}" class="card-img-top" alt="product Image" style="object-fit: contain; height: 100%">
                            </a>

                                <div class="card-body">
                                    <a href="{{ url('product-details'.'/'.$related_product->category->slug.'/'.$related_product->slug) }}">
                                        <h5 class="card-title">{{ $related_product->name ?? '' }}</h5>
                                    </a>
                                    <div class="price mb-3 d-flex gap-3 justify-content-center">
                                        <span class="original_price">${{ $related_product->selling_price ?? '' }}</span>
                                        <span class="old_price"><del>${{ $related_product->original_price ?? '' }}</del></span>
                                    </div>
                                </div>

                                <input type="hidden" class="product_id" value="{{ $related_product->id }}">
                                <input type="hidden" class="qty" value="{{ $related_product->quantity }}">

                            {{-- <a href="javascript:void(0)" class="btn btn-primary addToCart">Add to Cart</a> --}}
                            {{-- <div class="icon_group d-flex flex-column gap-2">
                                <div class="view_icon_box">
                                    <a href="{{ url('product-details'.'/'.$related_product->category->slug.'/'.$related_product->slug) }}">
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
                                    <a href="{{ route('product.wishlist',$related_product->id) }}">
                                        <div class="product_cart" title="Add to wishlist">
                                        <i class="far fa-heart icon wishlist_icon text-white"></i>
                                        </div>
                                    </a>
                                </div>

                            </div> --}}
                        </div>
                    </div>
                </div>
             @endif
           @endforeach

        </div>
    </div>
 </section>
  <!-- releted brand product section-->

@endsection


@push('script')
        <script>
            $(function(){

$("#exzoom").exzoom({

  // thumbnail nav options
  "navWidth": 60,
  "navHeight": 60,
  "navItemNum": 5,
  "navItemMargin": 7,
  "navBorder": 1,

  // autoplay
  "autoPlay": true,

  // autoplay interval in milliseconds
  "autoPlayTimeout": 2000

});

});
        </script>
@endpush
