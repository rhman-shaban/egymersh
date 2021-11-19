@extends('site.layouts.master')

@php
    $lang = $lang = LaravelLocalization::getCurrentLocale();
@endphp
@section('page_content')
    <main class="main single-page">
        {{-- <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="index.html" rel="nofollow">Home</a>
                    <span></span> Pages
                    <span></span> About us
                </div>
            </div>
        </div> --}}
        <section class="section-padding">
            <div class="container pt-25">
                <div class="row">
                    <div class="col-lg-12 align-self-center mb-lg-0 mb-4">
                        <h6 class="mt-0 mb-15 text-uppercase font-sm text-brand wow fadeIn animated">About Us</h6>
                        {{-- <h1 class="font-heading mb-40">
                            We are Building The Destination For Getting Things Done
                        </h1>
                        <p>Tempus ultricies augue luctus et ut suscipit. Morbi arcu, ultrices purus dolor erat bibendum sapien metus.</p>
                        <p>Tempus ultricies augue luctus et ut suscipit. Morbi arcu, ultrices purus dolor erat bibendum sapien metus. Sit mi, pharetra, morbi arcu id. Pellentesque dapibus nibh augue senectus. </p> --}}

                        {!! $about['content_'.$lang] !!}
                    </div>
                </div>
            </div>
        </section>
        <section id="team" class="pt-25 wow fadeIn animated">
            <div class="container">
                <div class="row mb-50 align-items-center">
                    <div class="col-md-6">
                        <h6 class="mt-0 mb-15 text-uppercase font-sm text-brand wow fadeIn animated">Our Team</h6>
                        <h2 class="mb-15 wow fadeIn animated">Top team of experts</h2>
                        <p class="text-grey-3 wow fadeIn animated">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione optio perferendis sequi mollitia quis autem ea cupiditate possimus!</p>
                    </div>
                    <div class="col-md-6 text-md-end mt-30">
                        
                    </div>
                </div>
                <div class="position-relative">
                    <div class="row wow fadeIn animated">
                        <div class="col-lg-3 col-md-6">
                            
                        </div>
                        <!--col-->
                        <div class="col-lg-3 col-md-6">
                            <div class="blog-card border-radius-10 overflow-hidden text-center">
                                <img src="{{ asset('site_assets/assets/imgs/page/avatar-2.jpg') }}" alt="" class="border-radius-10 mb-30 hover-up">
                                <h4 class="fw-500 mb-0">Dilan Specter</h4>
                                <p class="fw-400 text-brand mb-10">Head Engineer</p>
                                <div class="mobile-social-icon wow fadeIn animated mb-sm-5 mb-md-0 animated">
                                    <a href="#"><img src="{{ asset('site_assets/assets/imgs/theme/icons/icon-facebook.svg') }}" alt=""></a>
                                    <a href="#"><img src="{{ asset('site_assets/assets/imgs/theme/icons/icon-twitter.svg') }}" alt=""></a>
                                    <a href="#"><img src="{{ asset('site_assets/assets/imgs/theme/icons/icon-instagram.svg') }}" alt=""></a>
                                    <a href="#"><img src="{{ asset('site_assets/assets/imgs/theme/icons/icon-pinterest.svg') }}" alt=""></a>
                                </div>
                            </div>
                        </div>
                        <!--col-->
                        <div class="col-lg-3 col-md-6">
                            <div class="blog-card border-radius-10 overflow-hidden text-center">
                                <img src="{{ asset('site_assets/assets/imgs/page/avatar-3.jpg') }}" alt="" class="border-radius-10 mb-30 hover-up">
                                <h4 class="fw-500 mb-0">Tomas Baker</h4>
                                <p class="fw-400 text-brand mb-10">Senior Planner</p>
                                <div class="mobile-social-icon wow fadeIn animated mb-sm-5 mb-md-0 animated">
                                    <a href="#"><img src="{{ asset('site_assets/assets/imgs/theme/icons/icon-facebook.svg') }}" alt=""></a>
                                    <a href="#"><img src="{{ asset('site_assets/assets/imgs/theme/icons/icon-twitter.svg') }}" alt=""></a>
                                    <a href="#"><img src="{{ asset('site_assets/assets/imgs/theme/icons/icon-instagram.svg') }}" alt=""></a>
                                    <a href="#"><img src="{{ asset('site_assets/assets/imgs/theme/icons/icon-pinterest.svg') }}" alt=""></a>
                                </div>
                            </div>
                        </div>
                        <!--col-->
                        <div class="col-lg-3 col-md-6">
                           
                        </div>
                        <!--col-->
                    </div>
                </div>
            </div>
        </section>
   
    
     
    </main>
@endsection