@php
    $lang = LaravelLocalization::getCurrentLocale();
@endphp
<header class="header-area header-style-1 header-height-2">
    <div class="header-top header-top-ptb-1 d-none d-lg-block">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-3 col-lg-4">
                    </div>
                    <div class="col-xl-6 col-lg-4">
                        <div class="text-center">
                            <div id="news-flash" class="d-inline-block">
                                <ul>
                                    @foreach (App\Models\Offer::all() as $offer)

                                        <li>{!! $offer->name !!}</li>

                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4">
                        <div class="header-info header-info-right">
                            <ul>
                                <li>
                                    <a class="language-dropdown-active" href="#">
                                        <i class="fi-rs-world"></i>
                                        @lang('header.language')
                                        <i class="fi-rs-angle-small-down"></i>
                                    </a>
                                    <ul class="language-dropdown">
                                        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                        <li>
                                            <a hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"><img src="{{ asset('site_assets/assets/imgs/lang') }}/{{ $properties['native'] == 'English' ? 'en.png' : 'egy.png' }}" alt="English">
                                                {{ $properties['native'] }}
                                            </a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </li>
                                {{-- Auth::guard('seller')->check() --}}
                                @if(Auth::guard('seller')->check())
                                <li>
                                    <a class="language-dropdown-active" href="{{ url('/account') }}">
                                        <img src="{{ Auth::guard('seller')->user()->image_path }}" class="mx-1" width="20" style="border-radius: 50%">@lang('header.my_acount')
                                    </a>
                                    <ul class="language-dropdown">
                                        @if (auth()->guard('seller')->user()->seller == '1')
                                            <li><a href="{{ route('store.index') }}">@lang('header.Dashboard')</a></li>
                                        @endif
                                        <li>
                                            <a href="{{ route('user.account') }}">@lang('header.My Profile')</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('user.account.logout') }}">@lang('header.Logout')</a>
                                        </li>
                                    </ul>
                                </li>
                                @else

                                <li>
                                    <i class="fi-rs-user"></i>
                                    <a style="font-weight:502;font-size:17px" href="{{ route('user.login_form') }}">
                                        @lang('header.login')
                                    </a>
                                </li>
                                <li>
                                    <i class="fi-rs-user"></i>
                                    <a style="font-weight:502;font-size:17px" href="{{ route('users.register') }}">
                                        @lang('header.sign_up')
                                    </a>
                                </li>
                                @endauth

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       <!-- end of top part -->

        <div class="header-middle header-middle-ptb-1 d-none d-lg-block">
            <div class="container">
                <div class="d-flex justify-content-between header-wrap">
                    <div class="logo logo-width-1 d-flex justify-content-end ">
                        <a href="{{ url('/') }}"><img src="{{ asset('site_assets/assets/imgs/main-logo.png') }}" alt="Egymerch logo"></a>
                    </div>
                    <div class="header-right">
                        <div class="search-style-2">
                            <form action="{{ url('search') }}">
                                <select name='category_id' class="select-active">
                                    <option value="all" >
                                        @lang('header.all_categories')
                                    </option>
                                    @foreach (App\Models\Category::where('active' , 1)->with('categories')->where('parent_id' ,'=' , null)->get() as $one_category)
                                        <option value="{{ $one_category->id }}"> {{ $one_category['name_'.$lang] }} </option>
                                    @endforeach
                                </select>
                                <input type="text" name='keywords' value="{{ request()->keywords }}" placeholder="@lang('header.search_for_items')">
                            </form>
                        </div>
                        <div class="header-action-right">
                            <div class="header-action-2">
                                @if (Auth::guard('seller')->check())
                                   <div class="header-action-icon-2">
                                    {{-- @auth('seller') --}}
                                        <!-- <a href="{{ route('user.account.wishlist') }}">

                                            <img class="svgInject" alt="Evara" src="{{ asset('site_assets/assets/imgs/theme/icons/icon-heart.svg') }}">
                                            <span class="pro-count blue"> {{ Auth::guard('seller')->user()->wishlist()->count() }} </span>

                                        </a> -->
                                    {{-- @endauth --}}
                                </div>
                                @endif
                                <div class="header-action-icon-2">
                                    <a class="mini-cart-icon" href="{{ route('cart.index') }}">

                                        @php
                                        $count = 0;
                                        if (session()->has('cart_color')) {

                                            foreach (session()->get('cart_color') as  $date) {

                                                $count += $date['quantity'];
                                            }
                                        }
                                        @endphp

                                        <img alt="Evara" src="{{ asset('site_assets/assets/imgs/theme/icons/icon-cart.svg') }}">
                                        <span class="pro-count blue cart-count">{{ $count }}</span>
                                    </a>
                                    <div class="cart-dropdown-wrap cart-dropdown-hm2" style="right: {{ app()->getLocale() == 'ar' ? '-275px' : '' }};">
                                        <ul id="add-cart-product">
                                            @foreach (Cart::content() as $products)

                                            <li class="delete-product-{{ $products->id }}">
                                                <div class="shopping-cart-img m-2">
                                                    <a href="{{ route('product.details',$products->id) }}">
                                                         <img src="{{ $products->model->image_path }}" alt="Product" style="margin: -15px;">
                                                         {{-- <img src="{{ $products->product_seller_image[0]->image }}" alt="Product"> --}}
                                                    </a>
                                                </div>
                                                <div class="shopping-cart-title">
                                                    <h4><a href="{{ route('product.details',$products->model->id) }}">{{ $products->model->title }}</a></h4>
                                                    <h4>
                                                        <span class="product-qty-{{ $products->id }}">

                                                            @if (app()->getLocale() == 'ar')

                                                            @else

                                                                @if (session()->has('cart_color'))
                                                                    @php
                                                                        $qntty = 0;
                                                                        foreach (session()->get('cart_color') as $colorr) {
                                                                            if ($products->model->id == $colorr['product_id']) {

                                                                                {{ $qntty += $colorr['quantity']; }}
                                                                            }
                                                                        }
                                                                    @endphp
                                                                @endif

                                                                    {{ $qntty }} X
                                                            @endif

                                                            {{ number_format($products->price * $products->qty,2) }} {{ app()->getLocale() == 'ar' ? 'ج م' : 'LE'}}

                                                        </span>
                                                    </h4>
                                                </div>
                                                <div class="shopping-cart-delete">
                                                    <a href="#" class="removal-product" data-id="{{ $products->id }}" data-rowid="{{ $products->rowId }}">
                                                        <i class="fi-rs-cross-small"></i>
                                                    </a>
                                                </div>
                                            </li>

                                            @endforeach
                                        </ul>

                                        <div class="shopping-cart-footer">
                                            <div class="shopping-cart-total">
                                                <h4 class="mb-20"> <span class="float-none mb-2 text-style-1">@lang('header.total')</span> </h4>
                                                <h4>
                                                    {{-- @if (session()->has('coupon_value'))


                                                        <span class="d-block cart-totle">

                                                        <span id="cart-totle" class="d-block mb-20">

                                                            {{ number_format(preg_replace('/,/', '', Cart::subtotal()) - session()->get('coupon_value'),2) }}
                                                            {{ app()->getLocale() == 'ar' ? 'ج م' : 'LE'}}
                                                        </span>

                                                    @else --}}

                                                        <span class="d-block cart-totle mb-20">
                                                            {{ preg_replace('/,/', '', Cart::subtotal()); }}
                                                            {{ app()->getLocale() == 'ar' ? 'ج م' : 'LE'}}
                                                        </span>

                                                    {{-- @endif --}}
                                                </h4>
                                            </div>
                                            <div class="shopping-cart-button mt-5">
                                                <a href="{{ route('cart.index') }}" class="outline">@lang('header.View Cart')</a>
                                                @auth('seller')

                                                    <a href="{{ route('checkout.index') }}">@lang('header.Checkout')</a>

                                                @else

                                                    <a href="{{ route('user.login_form') }}" class="btn">
                                                        @lang('header.login')
                                                    </a>

                                                @endauth
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-bottom header-bottom-bg-color sticky-bar">
            <div class="container">
                <div class="header-wrap header-space-between position-relative">
                    <div class="logo logo-width-1 d-block d-lg-none">
                        <a href="{{ url('/') }}"><img src="{{ asset('site_assets/assets/imgs/main-logo.png') }}" alt="Egymerch logo"></a>
                    </div>
                    <div class="header-nav d-none d-lg-flex">

                        <div class="main-categori-wrap d-none d-lg-block">

                        </div>

                        <div class="main-categori-wrap d-none d-lg-block">

                        </div>


                        <div class="main-categori-wrap d-none d-lg-block">

                        </div>


                        <div class="main-categori-wrap d-none d-lg-block">

                        </div>

                        <div class="main-menu main-menu-padding-1 main-menu-lh-2 d-none d-lg-block">
                            <nav>
                                <ul>

                                    <li class="position-static" ><a href="{{ url('/') }}"> @lang('header.Home') </a>

                                    <li class="position-static"><a href="#">@lang('header.Categories') <i class="fi-rs-angle-down"></i></a>

                                        <ul class="mega-menu">


                                            @foreach (App\Models\Category::where('active' , 1)->with('categories')->where('parent_id' ,'=' , null)->get() as $category)
                                                <li class="sub-mega-menu sub-mega-menu-width-22">
                                                <a class="menu-title" href="#"> {{ $category['name_'.$lang] }} </a>
                                                <ul>
                                                    @foreach ($category->categories as $one)
                                                       <li><a href="{{ url('/shop') }}">{{ $one['name_'.$lang] }}</a></li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </li>

                                    <li class="position-static" ><a href="{{ url('/shop?sort_by=best_selling') }}" style="color:red"> @lang('header.BestSeller') </a>
                                    <li class="position-static" ><a href="{{ url('/shop?sort_by=date') }}" style="color:orange"> @lang('header.New Arrivals') </a>

                                     <li class="position-static" ><a href="{{ url('/shop') }}"> @lang('header.Shop') </a>

                                    <!-- <li>
                                        <a style="color:red;" href="{{ url('/') }}">@lang('header.sale')</a>
                                    </li> -->

                                    <li>
                                        <a href="{{ url('/about') }}">@lang('header.about_us')</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/contact') }}">@lang('header.contact') <i style="color:#088178; font-size:10px" class="fas fa-heart"></i> </a>
                                    </li>
                                </ul>
                            </nav>


                        </div>
                    </div>

                    <div class="header-action-right d-block d-lg-none">
                        <div class="header-action-2">
                            <!-- <div class="header-action-icon-2">
                                <a href="{{ route('user.account.wishlist') }}">
                                    <img alt="Evara" src="{{ asset('site_assets/assets/imgs/theme/icons/icon-heart.svg') }}">
                                    <span class="pro-count white">4</span>
                                </a>
                            </div> -->
                            <div class="header-action-icon-2">
                                <a class="mini-cart-icon" href="{{ route('cart.index') }}">
                                    <img alt="Evara" src="{{ asset('site_assets/assets/imgs/theme/icons/icon-cart.svg') }}">
                                    <span class="pro-count white">2</span>
                                </a>
                                <div class="cart-dropdown-wrap cart-dropdown-hm2">
                                    <ul>
                                        @foreach (Cart::content() as $products)
                                            <li>
                                                <div class="shopping-cart-img">
                                                    <a href="shop-product-right.html">
                                                        <img alt="Evara" src="{{ $products->model->image_path }}">
                                                    </a>
                                                </div>
                                                <div class="shopping-cart-title">
                                                    <h4>
                                                        <a href="{{ route('product.details',$products->model->id) }}">{{ $products->model->title }}</a>
                                                    </h4>
                                                    <h3>
                                                    <span class="product-qty-{{ $products->id }}">
                                                            {{ $products->qty }} X
                                                            {{ number_format($products->price * $products->qty,2) }} {{ app()->getLocale() == 'ar' ? 'ج م' : 'LE'}}
                                                    </span>
                                                    </h3>
                                                </div>
                                                <div class="shopping-cart-delete">
                                                    <a href="#" class="removal-product" data-id="{{ $products->id }}" data-rowid="{{ $products->rowId }}">
                                                        <i class="fi-rs-cross-small"></i>
                                                    </a>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                    <div class="shopping-cart-footer">
                                        <div class="shopping-cart-total">
                                            <h4>Total
                                                @if (session()->has('coupon_value'))

                                                    <span class="d-block cart-totle">
                                                        {{ number_format(preg_replace('/,/', '', Cart::subtotal()) - session()->get('coupon_value'),2) }}
                                                        {{ app()->getLocale() == 'ar' ? 'ج م' : 'LE'}}
                                                    </span>

                                                @else

                                                    <span class="d-block cart-totle">
                                                        {{ Cart::subtotal(); }}
                                                        {{ app()->getLocale() == 'ar' ? 'ج م' : 'LE'}}
                                                    </span>

                                                @endif
                                            </h4>
                                        </div>
                                        <div class="shopping-cart-button">
                                            <a href="{{ route('cart.index') }}" class="outline">@lang('header.View Cart')</a>
                                            <a href="shop-checkout.html">@lang('header.Checkout')</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="header-action-icon-2 d-block d-lg-none">
                                <div class="burger-icon burger-icon-white">
                                    <span class="burger-icon-top"></span>
                                    <span class="burger-icon-mid"></span>
                                    <span class="burger-icon-bottom"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

<!-- mobile view -->
    <div class="mobile-header-active mobile-header-wrapper-style">
        <div class="mobile-header-wrapper-inner">
            <div class="mobile-header-top">
                <div class="mobile-header-logo">
                    <a href="{{ url('/') }}"><img src="{{ asset('site_assets/assets/imgs/main-logo.png') }}" alt="Egymerch logo"></a>
                </div>

                <div class="mobile-menu-close close-style-wrap close-style-position-inherit">
                    <button class="close-style search-close">
                        <i class="icon-top"></i>
                        <i class="icon-bottom"></i>
                    </button>
                </div>
            </div>
            <div class="mobile-header-content-area">
                <div class="mobile-search search-style-3 mobile-header-border">
                    <form action="{{ url('/search') }}">
                        <input type="text" name="keywords" value="{{ request()->keywords }}" placeholder="@lang('header.search_for_items')">
                        <button type="submit"><i class="fi-rs-search"></i></button>
                    </form>
                </div>
                <div class="mobile-menu-wrap mobile-header-border">
                    <div class="main-categori-wrap mobile-header-border">
                        <a class="categori-button-active-2" href="#">
                            <span class="fi-rs-apps"></span> @lang('header.Categories')
                        </a>
                        <div class="categori-dropdown-wrap categori-dropdown-active-small">

                          @foreach (App\Models\Category::where('active' , 1)->with('categories')->where('parent_id' ,'=' , null)->get() as $one_category)

                            <ul>
                                <ul>
                                    <li>
                                        <a class="fw-bold" href="#">{{ $one_category['name_'.$lang] }}</a>
                                    </li>
                                    @foreach ($one_category->categories as $one)
                                        <li class="mx-3">
                                            <a href="">{{ $one['name_'.$lang] }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </ul>

                          @endforeach

                        </div>
                    </div>

                    <!-- mobile menu start -->
                    <nav>
                        <ul class="mobile-menu">

                            <li class="menu-item-has-children">
                                <span class="menu-expand"></span>
                                <a href="{{ url('/') }}"> @lang('header.Home') </a>
                            </li>
                            <li class="menu-item-has-children">
                              <span class="menu-expand"></span>
                              <a href="{{ url('/shop') }}"> @lang('header.Shop') </a>
                            </li>
                            <li class="menu-item-has-children">
                              <span class="menu-expand"></span>
                              <a href="{{ url('/shop?sort_by=best_selling') }}" style="color:red"> @lang('header.BestSeller') </a>
                            </li>
                            <li class="menu-item-has-children">
                              <span class="menu-expand"></span>
                              <a href="{{ url('/shop?sort_by=date') }}" style="color:orange"> @lang('header.New Arrivals') </a>
                            </li>

                           <!-- <li class="menu-item-has-children">
                              <span class="menu-expand"></span>
                              <a style="color:red;" href="{{ url('/') }}"> @lang('header.sale') </a>
                            </li> -->

                            <br>
                            <br>

                            @if(Auth::guard('seller')->check())
                                <li class="menu-item-has-children">
                                    <span class="menu-expand"></span>
                                    <a href="#">
                                        <img src="{{ Auth::guard('seller')->user()->image_path }}"
                                            class="mx-2" width="20" style="border-radius: 50%">@lang('header.my_acount')
                                    </a>
                                      <ul class="dropdown">
                                          @if (auth()->guard('seller')->user()->seller == '1')
                                              <li><a href="{{ route('store.index') }}">@lang('header.Dashboard')</a></li>
                                          @endif
                                          <li>
                                              <a href="{{ route('user.account') }}">@lang('header.My Profile')</a>
                                          </li>
                                          <li>
                                              <a href="{{ route('user.account.logout') }}">@lang('header.Logout')</a>
                                          </li>
                                      </ul>
                                </li>
                            @else
                                <li>
                                    <i class="fi-rs-user"></i>
                                    <a style="font-weight:502;font-size:17px" href="{{ route('user.login_form') }}">
                                        @lang('header.login')
                                    </a>
                                </li>
                                <li>
                                    <i class="fi-rs-user"></i>
                                    <a style="font-weight:502;font-size:17px" href="{{ route('users.register') }}">
                                        @lang('header.sign_up')
                                    </a>
                                </li>
                            @endauth

                            <li class="menu-item-has-children"><span class="menu-expand"></span><a href="#">@lang('header.language')</a>
                                <ul class="dropdown">
                                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                    <li>
                                        <a hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"><img width="10px" src="{{ asset('site_assets/assets/imgs/lang') }}/{{ $properties['native'] == 'English' ? 'en.png' : 'egy.png' }}" alt="English">
                                            {{ $properties['native'] }}
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                            </li>
                        </ul>
                    </nav>
                    <!-- mobile menu end -->
                </div>
                <div class="mobile-header-info-wrap mobile-header-border">

                    <!-- <div class="single-mobile-header-info mt-30">
                        <a  href="page-contact.html">@lang('header.our_location')</a>
                    </div> -->

               </div>
                <div class="mobile-social-icon">
                    <h5 class="mb-15 text-grey-4">@lang('header.Follow Us')</h5>
                    <a href="#"><img src="{{ asset('site_assets/assets/imgs/theme/icons/icon-facebook.svg') }}" alt=""></a>
                    <a href="#"><img src="{{ asset('site_assets/assets/imgs/theme/icons/icon-twitter.svg') }}" alt=""></a>
                    <a href="#"><img src="{{ asset('site_assets/assets/imgs/theme/icons/icon-instagram.svg') }}" alt=""></a>
                    <a href="#"><img src="{{ asset('site_assets/assets/imgs/theme/icons/icon-pinterest.svg') }}" alt=""></a>
                    <a href="#"><img src="{{ asset('site_assets/assets/imgs/theme/icons/icon-youtube.svg') }}" alt=""></a>
                </div>
            </div>
        </div>
    </div>
