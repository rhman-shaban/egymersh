@extends('site.layouts.master')

@php
    $lang = $lang = LaravelLocalization::getCurrentLocale();
@endphp

@section('page_title')
@lang('title.About Us')
@endsection

@section('page_content')

    <main class="main single-page">

<!-- main section with image -->
      <section class="bg-green">
              <div class="container">
                  <div class="row">

                      <div class="col-md-6 d-flex align-items-center">
                       <img class="img-responsive" src="{{ asset('site_assets/assets/imgs/about/about.png') }}" alt="about Egymerch">
                      </div>

                      <div class="col-md-6 d-flex align-items-center">
                          <div class="text-center pt-50 pb-50">
                              <h4 class="text-brand mb-20">@lang('about.About Us')</h4>
                              <h1 class="mb-20 wow fadeIn animated font-xxl fw-900">
                                  @lang('about.main msg')
                              </h1>
                              <p class="w-50 m-auto mb-50 wow fadeIn animated">@lang('about.sub msg')</p>
                          </div>
                      </div>

                  </div>
              </div>
      </section>

       <!-- What We Want? -->
        <section class="section-padding">
            <div class="container pt-25 pl-100 pr-100">
                <div class="row">
                    <div class="col-lg-12 align-self-center mb-lg-0 mb-4">
                        <h6 class="mt-0 mb-5 text-uppercase font-sm text-brand wow fadeIn animated">@lang('about.What We Want')</h6>
                        <h2 class="mb-15 wow fadeIn animated">
                            @lang('about.heading-1')
                        </h2>
                        <p class="text-grey-3 wow fadeIn animated">@lang('about.sub-text-1')</p>

                        <!-- the next message comes from admin dashboard -->
                        <!-- {!! $about['content_'.$lang] !!} -->
                    </div>
                </div>
            </div>
        </section>

        <!-- Are We Different -->
        <section class="section-padding">
            <div class="container pt-25 pl-100 pr-100">
                <div class="row">
                    <div class="col-lg-12 align-self-center mb-lg-0 mb-4">
                        <h6 class="mt-0 mb-5 text-uppercase font-sm text-brand wow fadeIn animated">@lang('about.Are We Different')</h6>
                        <h2 class="mb-15 wow fadeIn animated">
                            @lang('about.heading-2')
                        </h2>
                        <p class="text-grey-3 wow fadeIn animated">@lang('about.sub-text-2')</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Egymerch Family -->
        <section class="section-padding">
            <div class="container pt-25 pl-100 pr-100">
                <div class="row">
                    <div class="col-lg-12 align-self-center mb-lg-0 mb-4">
                        <h6 class="mt-0 mb-5 text-uppercase font-sm text-brand wow fadeIn animated">@lang('about.Our Team')</h6>
                        <h2 class="mb-15 wow fadeIn animated">@lang('about.heading-3')</h2>
                        <p class="text-grey-3 wow fadeIn animated">@lang('about.sub-text-3')</p>
                    </div>
                </div>

          <!-- images -->
                <!-- <div class="position-relative my-4">
                    <div class="row wow fadeIn animated">
                        <div class="col-lg-6 col-md-6">
                            <div class="blog-card border-radius-10 overflow-hidden text-center">
                                <img src="{{ asset('site_assets/assets/imgs/about/Mahmoud.png') }}" style="max-height:300px" alt="Mahmoud Saad" class="border-radius-10 mb-30 hover-up">
                                <h4 class="fw-500 mb-0">Mahmoud Saad</h4>
                                <p class="fw-400 text-brand mb-10">Founder & CEO</p>
                                <div class="mobile-social-icon wow fadeIn animated mb-sm-5 mb-md-0 animated">
                                    <a href="#"><img src="{{ asset('site_assets/assets/imgs/theme/icons/icon-facebook.svg') }}" alt=""></a>
                                    <a href="#"><img src="{{ asset('site_assets/assets/imgs/theme/icons/icon-twitter.svg') }}" alt=""></a>
                                    <a href="#"><img src="{{ asset('site_assets/assets/imgs/theme/icons/icon-instagram.svg') }}" alt=""></a>
                                    <a href="#"><img src="{{ asset('site_assets/assets/imgs/theme/icons/icon-pinterest.svg') }}" alt=""></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="blog-card border-radius-10 overflow-hidden text-center">
                                <img src="{{ asset('site_assets/assets/imgs/about/Ashraf.png') }}" style="max-height:300px" alt="Muhammed Ashraf" class="border-radius-10 mb-30 hover-up">
                                <h4 class="fw-500 mb-0">Mohamed Ashraf</h4>
                                <p class="fw-400 text-brand mb-10">Co-fonder & COO</p>
                                <div class="mobile-social-icon wow fadeIn animated mb-sm-5 mb-md-0 animated">
                                    <a href="#"><img src="{{ asset('site_assets/assets/imgs/theme/icons/icon-facebook.svg') }}" alt=""></a>
                                    <a href="#"><img src="{{ asset('site_assets/assets/imgs/theme/icons/icon-twitter.svg') }}" alt=""></a>
                                    <a href="#"><img src="{{ asset('site_assets/assets/imgs/theme/icons/icon-instagram.svg') }}" alt=""></a>
                                    <a href="#"><img src="{{ asset('site_assets/assets/imgs/theme/icons/icon-pinterest.svg') }}" alt=""></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->

            </div>
        </section>

       <!-- let's find something that looks like you-->
        <section class="section-padding">
            <div class="container pt-25 pl-100 pr-100">
                <div class="row justify-content-center">
                    <div class="col-lg-12 d-flex flex-column align-items-center mb-4">
                        <h6 class="mt-0 mb-5 text-uppercase font-sm text-brand wow fadeIn animated">@lang('about.Enough About Us')</h6>
                        <h2 class="mb-15 wow fadeIn animated">
                            @lang('about.heading-4')
                        </h2>

                        <a href="{{ url('/shop') }}">
                          <h3 class="mb-15 wow fadeIn animated">
                            @lang('about.Click Me')
                          </h3>
                        </a>

                      </div>


                </div>
            </div>
        </section>

    </main>
@endsection
