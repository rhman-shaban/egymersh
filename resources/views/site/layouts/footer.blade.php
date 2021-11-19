@php
    $lang = $lang = LaravelLocalization::getCurrentLocale();
@endphp
<footer class="main">
    <section class="newsletter p-30 text-white wow fadeIn animated">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7 mb-md-3 mb-lg-0">
                    <div class="row align-items-center">
                        <div class="col flex-horizontal-center">
                            <img class="icon-email" src="{{ asset('site_assets/assets/imgs/theme/icons/icon-email.svg') }}" alt="">
                            <h4 class="font-size-20 mb-0 ml-3">Sign up to Newsletter</h4>
                        </div>
                        <div class="col my-4 my-md-0 des">
                            <h5 class="font-size-15 ml-4 mb-0">...and receive <strong>$25 coupon for first shopping.</strong></h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <!-- Subscribe Form -->
                    <form class="form-subcriber d-flex wow fadeIn animated">
                        <input type="email" class="form-control bg-white font-small" placeholder="Enter your email">
                        <button class="btn bg-dark text-white subscribe " type="submit">Subscribe</button>
                    </form>
                    <!-- End Subscribe Form -->
                </div>
            </div>
        </div>
    </section>
    <section class="section-padding footer-mid">
        <div class="container pt-15 pb-20">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="widget-about font-md mb-md-5 mb-lg-0">
                        <div class="logo logo-width-1 wow fadeIn animated">
                            <a href="index.html"><img src="{{ asset('site_assets/assets/imgs/theme/logo.svg') }}" alt="logo"></a>
                        </div>
                        <h5 class="mt-20 mb-10 fw-600 text-grey-4 wow fadeIn animated">Contact</h5>
                        <p class="wow fadeIn animated">
                         Lorem ipsum dolor sit amet consectetur adipisicing elit. In dolores quae, omnis earum id! Expedita aperiam placeat quisquam corporis dicta quibusdam quia illo laborum praesentium, architecto tempora quidem iusto mollitia.
                     </p>

                     <h5 class="mb-10 mt-30 fw-600 text-grey-4 wow fadeIn animated">Follow Us</h5>
                     <div class="mobile-social-icon wow fadeIn animated mb-sm-5 mb-md-0">
                        <a href="#"><img src="{{ asset('site_assets/assets/imgs/theme/icons/icon-facebook.svg') }}" alt=""></a>
                        <a href="#"><img src="{{ asset('site_assets/assets/imgs/theme/icons/icon-twitter.svg') }}" alt=""></a>
                        <a href="#"><img src="{{ asset('site_assets/assets/imgs/theme/icons/icon-instagram.svg') }}" alt=""></a>
                        <a href="#"><img src="{{ asset('site_assets/assets/imgs/theme/icons/icon-pinterest.svg') }}" alt=""></a>
                        <a href="#"><img src="{{ asset('site_assets/assets/imgs/theme/icons/icon-youtube.svg') }}" alt=""></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-3">
                <h5 class="widget-title wow fadeIn animated">About</h5>
                <ul class="footer-list wow fadeIn animated mb-sm-5 mb-md-0">
                    <li><a href="{{ url('about') }}">About Us</a></li>
                    @foreach (App\Models\Page::where('active' , 1)->latest()->get() as $page)

                        <li><a href="{{ url('/pages/'.$page->id.'-'.$page['title_'.$lang]) }}">{{ $page['title_'.$lang]  }}</a></li>

                    @endforeach
                </ul>
            </div>
            <div class="col-lg-2  col-md-3">
                <h5 class="widget-title wow fadeIn animated">My Account</h5>
                <ul class="footer-list wow fadeIn animated">
                    <li><a href="#">Sign In</a></li>
                    <li><a href="#">View Cart</a></li>
                    <li><a href="#">My Wishlist</a></li>
                    <li><a href="#">Track My Order</a></li>
                    <li><a href="#">Help</a></li>
                    <li><a href="#">Order</a></li>
                </ul>
            </div>
            <div class="col-lg-4">
                <h5 class="widget-title wow fadeIn animated">Make Money With EgyMerch</h5>
                <div class="row">
                    <div class="col-md-8 col-lg-12">
                        <p class="wow fadeIn animated">
                            Create designs and open a shop for free!
                            <br>
                            No storage needed, we store, print and ship for you .
                            <br>
                            It’s easy and fun and also FREE!

                        </p>

                    </div>
                    
                    @if (!Auth::guard('seller')->check())
                        
                        <a href="{{ route('sellers.index') }}" class="btn btn-brand text-white btn-shadow-brand hover-up btn-lg">Start Selling</a>

                    @endif
                    @auth('seller')
                        @if (auth()->guard('seller')->user()->seller == '0')
                            
                            <a href="{{ route('user_to_sellers.index') }}" class="btn btn-brand text-white btn-shadow-brand hover-up btn-lg">
                                user to Selling
                            </a>

                        @endif
                    @endauth

                    
                </div>
            </div>
        </div>
    </div>
</section>
<div class="container pb-20 wow fadeIn animated">
    <div class="row">
        <div class="col-12 mb-20">
            <div class="footer-bottom"></div>
        </div>
        <div class="col-lg-6">
            <p class="float-md-left font-sm text-muted mb-0">&copy; 2021, <strong class="text-brand">Evara</strong> - HTML Ecommerce Template </p>
        </div>
        <div class="col-lg-6">
            <p class="text-lg-end text-start font-sm text-muted mb-0">
                Designed by <a href="http://ahmedsamidev.com" target="_blank">Ahmed Sami</a>. All rights reserved
            </p>
        </div>
    </div>
</div>
</footer>