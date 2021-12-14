        <?php
        $rr=Auth::guard('admin')->user()->role;
        
        
        ?>
<aside class="navbar-aside" id="offcanvas_aside">
    <div class="aside-top">
        <a class="brand-wrap" href="{{ url('/') }}" target="_blank">
            <img src="{{ asset('site_assets/assets/imgs/main-logo.png') }}" alt="Egymerch logo" class="logo">
        </a>
        <div>
            <button class="btn btn-icon btn-aside-minimize"> <i class="text-muted material-icons md-menu_open"></i> </button>
        </div>
    </div>
    <nav>
        @php

        $dashboard = $slides = $admins = $users = $about = $product_sizes = $product_colors =  $messages = $categories = $products = $pages =
        $offers = $coupons = $governorates = $shipping_companies =   $orders = $stores  = '';

        $active = Request::segment(3);


        switch ($active) {
            case null:
            $dashboard = 'active';
            break;
            case 'slides':
            $slides = 'active';
            break;
            case 'admins':
            $admins = 'active';
            break;
            case 'about':
            $about = 'active';
            break;
            case 'messages':
            $messages = 'active';
            break;
            case 'categories':
            $categories = 'active';
            break;
            case 'products':
            $products = 'active';
            break;
            case 'pages':
            $pages = 'active';
            break;
            case 'offers':
            $slides = 'active';
            break;
            case 'coupons':
            $slides = 'active';
            break;
            case 'users':
            $users = 'active';
            break;
            case 'stores':
            $stores = 'active';
            break;
            case 'product_colors':
            $products = 'active';
            break;
            case 'product_sizes':
            $products = 'active';
            break;
            case 'orders':
            $orders = 'active';
            break;
            case 'governorates':
            $orders = 'active';
            break;
            case 'shipping_companies':
            $orders = 'active';
            break;

            default:
                    // code...
            break;
        }

        @endphp
        <ul class="menu-aside ">
            @if (Auth::guard('admin')->user()->role == 0)
            <li class="menu-item">
                <a class="menu-link" href="{{ route('static.admins.index') }}"> <i class="icon material-icons md-home"></i>
                    <span class="text">Statistics</span>
                </a>
            </li>
            @endif

            <li class="menu-item  {{ $messages }}">
              <a class="menu-link" href="{{ route('messages.index') }}"> <i class="icon material-icons md-home"></i>
                <span class="text">Contact Us</span>
              </a>
            </li>
            @if (Auth::guard('admin')->user()->role == 0)
            <li class="menu-item has-submenu {{ $admins }}">
              <a class="menu-link" href="{{ route('admins.index') }}">
                <i class=" icon material-icons md-supervised_user_circle">  </i>
                <span class="text">Admins</span>
              </a>
              <div class="submenu">
                <a href="{{ route('admins.index') }}">Admins</a>
                <a href="{{ route('admins.create') }}">Add New Admin</a>
              </div>
            </li>
            

            <hr>

            <div class="d-flex justify-content-center" style="margin-top:-1.75rem">
              Customer
            </div>
            @endif
            <li class="menu-item has-submenu {{ $orders }} ">
              <a class="menu-link" href="{{ route('orders.index') }}">
                <i class=" icon material-icons md-supervised_user_circle">  </i>
                <span class="text">Orders</span>
              </a>
              
              <div class="submenu">
                <a href="{{ route('orders.index') }}">Orders</a>
                <a href="{{ route('manual.order') }}">Manual Orders</a>
                @if (Auth::guard('admin')->user()->role == 0)
                {{-- <a href="{{ route('orders.sellers') }}">Sellers Orders</a> --}}
                
                <a href="{{ route('governorates.index') }}">Governorates</a>
                <a href="{{ route('governorates.create') }}">Add new Governorate</a>
                <a href="{{ route('shipping_companies.index') }}">Shipping Companies</a>
                <a href="{{ route('shipping_companies.create') }}">Add new Company</a>
                @endif
              </div>
            </li>

            @if (Auth::guard('admin')->user()->role == 0)
            <li class="menu-item {{ $users }}">
              <a class="menu-link" href="{{ route('users.index') }}"> <i class="icon material-icons md-home"></i>
                <span class="text">Customers</span>
              </a>
            </li>

            <hr>
            <div class="d-flex justify-content-center" style="margin-top:-1.75rem">
              Sellers
            </div>
              <li class="menu-item has-submenu ">
                <a class="menu-link" href="page-sellers-cards.html"> <i class="icon material-icons md-store"></i>
                    <span class="text">Sellers</span>
                </a>
                <div class="submenu">
                    <a href="{{ route('sellering.index') }}">Applications</a>
                    <a href="{{ route('seller.prfile') }}">Sellers</a>
                </div>
            </li>
            @endif

            <li class="menu-item">
              <a class="menu-link" href="{{ route('requset.confirm') }}"> <i class="icon material-icons md-home"></i>
                <span class="text">Withdraw Requests</span>
              </a>
            </li>
            @if (Auth::guard('admin')->user()->role == 0)
            <li class="menu-item">
              <a class="menu-link" href="{{ route('product_seller.index') }}"> <i class="icon material-icons md-home"></i>
                <span class="text">All Products</span>
              </a>
            </li>

            <li class="menu-item ">
              <a class="menu-link" href="{{ route('notifications.index') }}"> <i class="icon material-icons md-home"></i>
                <span class="text">Notifications</span>
              </a>
            </li>
            
            <li class="menu-item">
              <a class="menu-link" href="{{ route('news') }}"> <i class="icon material-icons md-home"></i>
                <span class="text">News & Tips</span>
              </a>
            </li>
            
            <li class="menu-item has-submenu {{ $stores }} ">
                <a class="menu-link" href="{{ route('stores.index') }}">
                    <i class=" icon material-icons md-supervised_user_circle">  </i>
                    <span class="text">Stores</span>
                </a>
                <div class="submenu">
                    <a href="{{ route('stores.index') }}">Stores</a>
                </div>
            </li>


            <hr>
            <div class="d-flex justify-content-center" style="margin-top:-1.75rem">
              Basic Products
            </div>
            <li class="menu-item has-submenu {{ $categories }} ">
                <a class="menu-link" href="{{ route('categories.index') }}">
                    <i class=" icon material-icons md-supervised_user_circle">  </i>
                    <span class="text">Categories</span>
                </a>
                <div class="submenu">
                    <a href="{{ route('categories.index') }}">Categories</a>
                    <a href="{{ route('categories.create') }}">Add New Category</a>
                </div>
            </li>

            <li class="menu-item has-submenu {{ $products }}">
                <a class="menu-link" href="{{ route('products.index') }}">
                    <i class=" icon material-icons md-supervised_user_circle">  </i>
                    <span class="text">Basic Products</span>
                </a>
                <div class="submenu">
                    <a href="{{ route('products.index') }}">Basic Products </a>
                    <a href="{{ route('products.create') }}">Add New Product</a>
                </div>
            </li>

             <hr>
             <div class="d-flex justify-content-center" style="margin-top:-1.75rem">
               Site
             </div>
            <li class="menu-item has-submenu {{ $slides }}">
                <a class="menu-link" href="{{ route('slides.index') }}">
                    <i class=" icon material-icons md-supervised_user_circle">  </i>
                    <span class="text"> Promotions </span>
                </a>
                <div class="submenu">
                    <a href="{{ route('slides.index') }}"> Sliders </a>
                    <a href="{{ route('slides.create') }}">Add new slider</a>
                    <a href="{{ route('offers.index') }}"> Top offers</a>
                    <a href="{{ route('offers.create') }}">Add new top offer</a>
                    <a href="{{ route('coupons.index') }}"> Coupons </a>
                    <a href="{{ route('coupons.create') }}">Add new coupon</a>
                </div>
            </li>

            <li class="menu-item has-submenu {{ $pages }}">
                <a class="menu-link" href="{{ route('pages.index') }}">
                    <i class=" icon material-icons md-supervised_user_circle">  </i>
                    <span class="text">Footer Pages </span>
                </a>
                <div class="submenu">
                    <a href="{{ route('pages.index') }}"> Pages </a>
                    <a href="{{ route('pages.create') }}">Add New Page</a>
                </div>
            </li>
            

            <li class="menu-item {{ $about }}">
              <a class="menu-link" href="{{ route('about.edit') }}"> <i class="icon material-icons md-home"></i>
                <span class="text">About Us</span>
              </a>
            </li>
            @endif

            </ul>

            <hr>

            <ul class="menu-aside">
                <li class="menu-item">
                    <a class="menu-link" onclick="event.preventDefault();document.getElementById('logout-admin-form').submit();">
                        <i class="icon material-icons md-exit_to_app"></i>
                        <span class="text"> Logout </span>
                    </a>
                    <form id="logout-admin-form" action="{{ route('admin.logout') }}" method="POST">
                        @csrf
                    </form>
                </li>

            </ul>
            <br>
            <br>
        </nav>
    </aside>
