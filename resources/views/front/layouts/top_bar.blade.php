<section id="topBar" class="mb-3">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 col-md-6 col-lg-6">
                <div class="info_box text-white d-flex justify-content-start gap-3">
                    <div class="contact_box">
                        <i class="fas fa-phone-alt"></i>
                        <span class="phone_number">+8801743658736</span>
                    </div>
                    <div class="email_box">
                        <i class="fas fa-envelope"></i>
                        <span class="phone_number">demo@gmail.com</span>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-6">
                <div class="login_register text-white d-flex justify-content-end align-items-baseline align-middle gap-3">
                    @guest
                        <div class="login_box">
                            <a href="{{ route('login') }}">
                                <span class="login_text">Login</span>
                            </a>
                        </div>
                        <div class="register_box">
                            <a href="{{ route('register') }}">
                                <span class="register_text">Register</span>
                            </a>
                        </div>
                       @else
                       <div>
                            <ul>
                                <li class="nav-item dropdown ">
                                    <a class="nav-link dropdown-toggle pt-3" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        {{ Auth::user()->name }}
                                    </a>
                                    <ul class="dropdown-menu">
                                    <li class="border-bottom"><a class="dropdown-item text-dark" href="{{ route('profile') }}">Profile</a></li>
                                    <li class="border-bottom"><a class="dropdown-item text-dark" href="{{ route('my.order') }}">My Order</a></li>
                                    <li class="border-bottom"><a class="dropdown-item text-dark" href="{{ route('cart') }}">My Cart</a></li>
                                    <li class="border-bottom"><a class="dropdown-item text-dark" href="{{ route('product.wishlist_view') }}">My Wishlist</a></li>
                                    <li>
                                        <a class="dropdown-item text-dark" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                    </li>

                                    </ul>
                                </li>
                            </ul>
                       </div>


                    @endguest

                </div>
            </div>
        </div>
    </div>
</section>
