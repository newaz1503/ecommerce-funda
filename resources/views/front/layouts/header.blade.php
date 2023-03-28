<header id="header">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 col-md-6 col-lg-3">
                <div class="logo_box">
                    <a href="{{ route('front') }}" class="logo">{{ $site_setting->website_name ?? 'MyShop' }}</a>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-7">
                <div class="search_box">
                    <form action="{{ route('search') }}" method="post">
                        @csrf
                        <div class="input-group mb-3">
                            <input type="search" name="name" value="{{ Request::get('name') ?? ''}} " class="form-control search_input rounded-start"
                                 placeholder="Search Product" required />
                                <button type="submit" class=" search_btn" id="basic-addon2"><i class="fas fa-search"></i></button>

                        </div>
                    </form>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-2">
                <div class="cart_box d-flex justify-content-end align-items-center">
                    {{-- <div class="support_box me-5">
                        <h2 class="support_number">019 974 6392</h2>
                        <span class="support_text text-center">Support 24/7</span>
                    </div> --}}
                    {{-- <div class="compare_box px-3" title="compare product">
                        <a href="#">
                            <img src="./images/compare-01.png" alt="Img" class="compare_img">
                            <span class="count">5</span>
                        </a>
                    </div> --}}
                    @php
                      if(Auth::check()){
                        $wishlist_count = App\models\Wishlist::where('user_id', auth()->user()->id)->count();
                      }
                     @endphp

                    <div class="wishlist_box px-3" title="wishlist">
                        <a href="{{ route('product.wishlist_view') }}">
                            <i class="far fa-heart icon wishlist_icon"></i>
                            <span class="count">{{ $wishlist_count ?? 0}}</span>
                        </a>
                    </div>
                    <div class="cart_box px-3" title="cart" id="headShoppingCartIcon" onclick="destroySideCart()">
                        <a href="{{ route('cart') }}">
                            <i class="fas fa-shopping-bag icon cart_icon"></i>
                            <span class="count cart_count">0</span>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</header>
