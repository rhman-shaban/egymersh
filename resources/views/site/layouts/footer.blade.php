@php
    $lang = $lang = LaravelLocalization::getCurrentLocale();
@endphp
<footer class="main">
    <section class="newsletter p-30 text-white wow fadeIn animated">
        <div class="container">
            <div class="row align-items-center">

              <!-- remove this div and replace it with the nexe commented ones -->
              <div class="col my-12 d-flex justify-content-center">
                  <h5 class="font-size-15 ">@lang('footer.newsletter temp msg')</h5>
              </div>

                <!--
                 <div class="col-lg-7 mb-md-3 mb-lg-0">
                    <div class="row align-items-center">
                        <div class="col flex-horizontal-center">
                            <img class="icon-email" src="{{ asset('site_assets/assets/imgs/theme/icons/icon-email.svg') }}" alt="">
                            <h4 class="font-size-20 mb-0 ml-3">@lang('footer.Sign up to our Newsletter')</h4>
                        </div>
                        <div class="col my-4 my-md-0 des">
                            <h5 class="font-size-15 ml-4 mb-0">@lang('footer.catch our Deals & Discounts.')</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <form class="form-subcriber d-flex wow fadeIn animated">
                        <input type="email" class="form-control bg-white font-small" placeholder="@lang('footer.Enter your email')">
                        <button class="btn bg-dark text-white subscribe " type="submit">@lang('footer.Subscribe')</button>
                    </form>
                </div>
                 -->

            </div>
        </div>
    </section>
    <section class="section-padding footer-mid">
        <div class="container pt-15 pb-20">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="widget-about font-md mb-md-5 mb-lg-0">
                        <div class="logo logo-width-1 wow fadeIn animated">
                            <a href="index.html"><img src="{{ asset('site_assets/assets/imgs/main-logo.png') }}" alt="Egymerch logo"></a>
                        </div>
                        <p class="wow fadeIn animated">
                         @lang('footer.footer logo msg')
                     </p>

                     <h5 class="mb-10 mt-30 fw-600 text-grey-4 wow fadeIn animated">@lang('footer.Follow Us')</h5>
                     <div class="mobile-social-icon wow fadeIn animated mb-sm-5 mb-md-0">
                        <a href="#"><img src="{{ asset('site_assets/assets/imgs/theme/icons/icon-facebook.svg') }}" alt=""></a>
                        <a href="#"><img src="{{ asset('site_assets/assets/imgs/theme/icons/icon-twitter.svg') }}" alt=""></a>
                        <a href="#"><img src="{{ asset('site_assets/assets/imgs/theme/icons/icon-instagram.svg') }}" alt=""></a>
                        <a href="#"><img src="{{ asset('site_assets/assets/imgs/theme/icons/icon-pinterest.svg') }}" alt=""></a>
                        <a href="#"><img src="{{ asset('site_assets/assets/imgs/theme/icons/icon-youtube.svg') }}" alt=""></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3">
                <h5 class="widget-title wow fadeIn animated">@lang('footer.Quick Links')</h5>
                <ul class="footer-list wow fadeIn animated mb-sm-5 mb-md-0">
                    <li><a href="{{ url('about') }}">@lang('footer.About Us')</a></li>
                    <li><a href="{{ url('/contact') }}">@lang('footer.contact')</a></li>

                    @foreach (App\Models\Page::where('active' , 1)->latest()->get() as $page)

                        <li><a href="{{ url('/pages/'.$page->id.'-'.$page['title_'.$lang]) }}">{{ $page['title_'.$lang]  }}</a></li>

                    @endforeach
                </ul>
            </div>
            <div class="col-lg-3  col-md-3">
                <h5 class="widget-title wow fadeIn animated">@lang('footer.My Account')</h5>
                <ul class="footer-list wow fadeIn animated">
                    @auth

                        <li><a href="{{ route('user.login_form') }}">@lang('footer.Login In')</a></li>

                        <!-- <li><a href="{{ route('user.account.wishlist') }}">@lang('footer.My Wishlist')</a></li> -->

                    @endauth
                    <li><a href="{{ route('cart.index') }}">@lang('footer.View Cart')</a></li>

                </ul>
            </div>

            <!-- hide seller register part -->
            <!-- <div class="col-lg-4">
                <h5 class="widget-title wow fadeIn animated">@lang('footer.Sell on EgyMerch')</h5>
                <div class="row">
                    <div class="col-md-8 col-lg-12">
                        <p class="wow fadeIn animated">
                          @lang('footer.sell msg1')
                            <br>
                          @lang('footer.sell msg2')
                            <br>
                          @lang('footer.sell msg3')
                        </p>

                    </div>

                    @if (!Auth::guard('seller')->check())

                        <a href="{{ route('sellers.index') }}" class="text-brand hover-up btn-lg mx-auto">
                             <strong class=" text-style-1">
                               @lang('footer.Apply Now')
                            </strong>
                        </a>

                    @endif
                    @auth('seller')
                        @if (auth()->guard('seller')->user()->seller == '0')

                            <a href="{{ route('user_to_sellers.index') }}" class="text-brand hover-up mx-auto btn-lg">
                              <strong class=" text-style-1">
                                @lang('footer.Apply Now')
                             </strong>
                         </a>

                        @endif
                    @endauth

                </div>
            </div> -->
        </div>
    </div>
</section>
<div class="container pb-20 wow fadeIn animated">
    <div class="row">
        <div class="col-12 mb-20">
            <div class="footer-bottom"></div>
        </div>
        <div class="col-lg-11 d-flex justify-content-end ">
            <p class="float-md-left font-sm text-muted mb-0">&copy; 2022, <strong class="text-brand">@lang('footer.EgyMerch')</strong> @lang('footer.All rights reserved') </p>
        </div>

    </div>
</div>
</footer>
