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
            <ul class="menu-aside">
                <li class="menu-item active">
                    <a class="menu-link" href="{{ url('/myStore') }}"> <i class="icon material-icons md-home"></i>
                        <span class="text">@lang('seller.Dashboard')</span>
                    </a>
                </li>
                <li class="menu-item has-submenu">
                    <a class="menu-link" href="page-products-list.html"> <i class="icon material-icons md-shopping_bag"></i>
                        <span class="text">@lang('seller.Products')</span>
                    </a>
                    <div class="submenu">
                      <a href="{{ route('add-product-seller') }}">@lang('seller.Create New Product')</a>
                        <a href="{{ route('product.index') }}">@lang('seller.Products List')</a>
                    </div>
                </li>
                <li class="menu-item has-submenu">
                    <a class="menu-link" href="page-sellers-cards.html"> <i class="icon material-icons md-store"></i>
                        <span class="text">@lang('seller.Stores')</span>
                    </a>
                    <div class="submenu">

                        <a href="{{ route('stores.create') }}">@lang('seller.Create New Store')</a>

                        @foreach (App\Models\Store::all() as $store)

                            <a href="{{ route('stores.show',$store->id) }}">{{ $store->name }}</a>

                        @endforeach

                    </div>
                </li>

                <li class="menu-item has-submenu">
                    <a class="menu-link" href="page-products-list.html"> <i class="icon material-icons md-shopping_cart"></i>
                        <span class="text">@lang('seller.Orders')</span>
                    </a>
                    <div class="submenu">
                        {{--<a href="{{ route('product.create') }}">Place new order</a>--}}
                        <a href="{{ route('order.seller.index') }}">@lang('seller.Create New Order')</a>
                    </div>
                </li>

                <li class="menu-item">
                    <a class="menu-link" href="{{ route('static') }}"> <i class="icon material-icons md-pie_chart"></i>
                        <span class="text">@lang('seller.Statistics')</span>
                    </a>
                </li>

                <li class="menu-item">
                    <a class="menu-link" href="{{ route('notification.index') }}"> <i class="icon material-icons md-notifications"></i>
                        <span class="text">@lang('seller.Notifications')</span>
                    </a>
                </li>


                <li class="menu-item">
                    <a class="menu-link" href="{{ url('/myStore/wallet') }}"> <i class="icon material-icons md-monetization_on"></i>
                        <span class="text">@lang('seller.Wallet')</span>
                    </a>
                </li>
                <li class="menu-item">
                    <a class="menu-link" href="{{ url('/myStore/settings') }}"> <i class="icon material-icons md-settings"></i>
                        <span class="text">@lang('seller.Settings')</span>
                    </a>
                </li>
            </ul>
            <hr>

            <ul class="menu-aside">
                <!-- <li class="menu-item">
                    <a class="menu-link" href="{{ url('/') }}"> <i class="icon material-icons md-local_offer"></i>
                        <span class="text"> Egymerch </span>
                    </a>
                </li> -->

                <li class="menu-item">
                    <a class="menu-link" onclick="event.preventDefault();document.getElementById('logout-seller-form').submit();">
                        <i class="icon material-icons md-exit_to_app"></i>
                        <span class="text">@lang('seller.Logout') </span>
                    </a>
                    <form id="logout-seller-form" action="{{ route('seller.logout') }}" method="POST">
                        @csrf
                    </form>
                </li>
            </ul>
        </nav>
    </aside>

    @if (app()->getLocale() == 'ar')

    <style media="screen">

    /* any screen except desktop */
    @media only screen and (min-width:250px) and (max-width:991px){
      .navbar-aside{
        webkit-transform: translateX(100%);
             transform: translateX(100%);
        }
      }
    </style>
    @else

    @endif
