<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- User Profile-->
        <div class="user-profile">
            <div class="user-pro-body">
                <div><img src="{{asset('assets/admin')}}/images/users/2.jpg" alt="user-img" class="img-circle"></div>
                <div class="dropdown">
                    <a href="javascript:void(0)" class="dropdown-toggle u-dropdown link hide-menu" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">@auth {{Auth::user()->name}}  @endauth <span class="caret"></span></a>
                    <div class="dropdown-menu animated flipInY">
                        <!-- text-->
                        <a href="javascript:void(0)" class="dropdown-item"><i class="ti-user"></i> My Profile</a>

                        <!-- text-->
                        <div class="dropdown-divider"></div>
                        <!-- text-->
                        <a href="javascript:void(0)" class="dropdown-item"><i class="ti-settings"></i> Account Setting</a>
                        <!-- text-->
                        <div class="dropdown-divider"></div>
                        <!-- text-->
                        <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                            <i class="fas fa-power-off text-danger"></i>
                            <span class="hide-menu text-danger">Log Out</span>
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>

                    </div>
                </div>
            </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="nav-small-cap">--- PERSONAL</li>
                <li>
                    <a class="waves-effect waves-dark" href="{{route('admin.dashboard')}}" aria-expanded="false">
                         <i class="fas fa-th"></i>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a class="waves-effect waves-dark" href="{{ route('admin.category.index') }}" aria-expanded="false">
                        <i class="fas fa-vector-square"></i>
                        <span class="hide-menu">Category</span>
                    </a>
                </li>
                <li>
                    <a class="waves-effect waves-dark" href="{{ route('admin.brand.index') }}" aria-expanded="false">
                        <i class="fas fa-vector-square"></i>
                        <span class="hide-menu">Brand</span>
                    </a>
                </li>
                <li>
                    <a class="waves-effect waves-dark" href="{{ route('admin.product.index') }}" aria-expanded="false">
                        <i class="fas fa-vector-square"></i>
                        <span class="hide-menu">Product</span>
                    </a>
                </li>

                <li>
                    <a class="waves-effect waves-dark" href="{{ route('admin.color.index') }}" aria-expanded="false">
                        <i class="fas fa-vector-square"></i>
                        <span class="hide-menu">Color</span>
                    </a>
                </li>
                <li>
                    <a class="waves-effect waves-dark" href="{{ route('admin.slider.index') }}" aria-expanded="false">
                        <i class="fas fa-vector-square"></i>
                        <span class="hide-menu">Slider</span>
                    </a>
                </li>
                <li>
                    <a class="waves-effect waves-dark" href="{{ route('admin.orders.index') }}" aria-expanded="false">
                        <i class="fas fa-vector-square"></i>
                        <span class="hide-menu">Orders</span>
                    </a>
                </li>
                <li>
                    <a class="waves-effect waves-dark" href="{{ route('admin.users') }}" aria-expanded="false">
                        <i class="fas fa-users"></i>
                        <span class="hide-menu">Users</span>
                    </a>
                </li>
                <li class="nav-small-cap">--- SYSTEM</li>

                <li>
                    <a class="waves-effect waves-dark" href="{{ route('admin.setting.index') }}" aria-expanded="false">
                        <i class="fas fa-cog"></i>
                        <span class="hide-menu">Settings</span>
                    </a>
                </li>
                <li>
                    <a class="waves-effect waves-dark" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                         <i class="fas fa-sign-out-alt text-danger"></i>
                         <span class="hide-menu">Log Out</span>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>

            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
