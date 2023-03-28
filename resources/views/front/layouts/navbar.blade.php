<section id="navbar">
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container">
            <!--- dropdown category --->
            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle dropdown_text" data-toggle="dropdown"><i class="fas fa-bars me-2"></i> SHOP BY CATEGORIES  <b
                            class="caret"></b>
                        </a>
                    <ul class="dropdown-menu">
                        @forelse($categories as $key=>$category)
                                 <li><a class="dropdown-item" href="{{ route('category.product', $category->slug)}}">{{ $category->name }}</a></li>
                            @empty
                                <li>Category Not Found</li>
                        @endforelse
                        {{-- <li class="dropdown dropdown-submenu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Cloths
                                </a>
                            <ul class="dropdown-menu">
                                <li class="kopie"><a href="#">T-Shirt</a></li>
                                <li><a href="#">Panjabi</a></li>
                                <li><a href="#">Tops</a></li>
                                <li><a href="#">3 Pics</a></li>
                                <li><a href="#">Saree</a></li>
                            </ul>
                        </li>
                        <li class="dropdown dropdown-submenu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Fruits & Vegetables</a>
                            <ul class="dropdown-menu">
                                <li class="kopie"><a href="#">Banana</a></li>
                                <li><a href="#">Melon</a></li>
                                <li><a href="#">Lemon</a></li>
                                <li><a href="#">Grapes</a></li>
                            </ul>
                        </li> --}}
                    </ul>
                </li>
            </ul>
            <!-- /.navbar-collapse -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse ms-2" id="navbarTogglerDemo02">
                <ul class="navbar-nav me-auto mb-lg-0">

                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('front') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ route('all.product') }}">Shop</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="blog.html">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="contact.html">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</section>
