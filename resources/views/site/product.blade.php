@extends('site.layouts.master')

@section('page_title')
{{ $product->title }}
@endsection

@section('page_content')
    <main class="main">
        {{-- <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="{{ url('/') }}" rel="nofollow">Home</a>
                    <span></span> shop
                    <span></span> {{ $product->title }}
        
                </div>
            </div>
        </div> --}}
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="product-detail accordion-detail">
                            <div class="row mb-50">
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="detail-gallery">
                                        {{-- <span class="zoom-icon"><i class="fi-rs-search"></i></span> --}}
                                        <!-- MAIN SLIDES -->
                                            
                                        <div class="product-image-slider">
                                            <figure class="border-radius-10">
                                                <img src="{{ $product->defult_image }}" alt="product image" style="width: 100%">
                                            </figure>

                                            @foreach ($product->product_seller_image as $data)
                                                
                                                <figure class="border-radius-10">
                                                    <img src="{{ $data->image }}" alt="product image" style="width: 100%">
                                                </figure>

                                            @endforeach
                                        </div>
                                        <!-- THUMBNAILS -->
                                        <div class="slider-nav-thumbnails pl-15 pr-15">
                                            <div>
                                                <img src="{{ $product->defult_image }}" alt="product image">
                                            </div>
                                            @foreach ($product->product_seller_image as $data)
                                                
                                                <div>
                                                    <img src="{{ $data->image }}" alt="product image">
                                                </div>

                                            @endforeach
                                        </div>
                                    </div>
                                    <!-- End Gallery -->
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="detail-info">
                                        <h2 class="title-detail">{{ $product->title }}</h2>
                                        <div class="product-detail-rating">
                                            <div class="pro-details-brand">
                                                <span> Store : <a href="{{ route('store.seller',$product->id) }}">{{ $product->store->name }}</a></span>
                                            </div>
                                            {{-- <div class="product-rate-cover text-end">
                                                <div class="product-rate d-inline-block">
                                                    <div class="product-rating" style="width:90%">
                                                    </div>
                                                </div>
                                                <span class="font-small ml-5 text-muted"> (25 reviews)</span>
                                            </div> --}}
                                        </div>
                                        <div class="clearfix product-price-cover">
                                            <div class="product-price primary-color float-left">
                                                {{-- <ins><span class="old-price font-md ml-15"> {{ app()->getLocale() == 'ar' ? 'ج م' : 'LE'}} {{ number_format($product->price,2) }}</span></ins> --}}
                                                <ins><span class="text-brand">{{ app()->getLocale() == 'ar' ? 'ج م' : 'LE'}} {{ number_format($product->price,2) }}</span></ins>
                                                {{-- <span class="save-price  font-md color3 ml-15">25% Off</span> --}}
                                            </div>
                                        </div>
                                        <div class="bt-1 border-color-1 mt-15 mb-15"></div>
                                        <div class="short-desc mb-30">
                                            <p>{{ $product->description }}</p>
                                        </div>
{{--                                         <div class="product_sort_info font-xs mb-30">
                                            <ul>
                                                <li class="mb-10"><i class="fi-rs-crown mr-5"></i> 1 Year AL Jazeera Brand Warranty</li>
                                                <li class="mb-10"><i class="fi-rs-refresh mr-5"></i> 30 Day Return Policy</li>
                                                <li><i class="fi-rs-credit-card mr-5"></i> Cash on Delivery available</li>
                                            </ul>
                                        </div> --}}
                                        <div class="attr-detail attr-color mb-15">
                                            <strong class="mr-10">Color</strong>
                                            <ul class="list-filter color-filter">
                                                @foreach ($product_color as $colors)

                                                    <li>
                                                        <a href="#" class="add-cart-color" data-url="{{ route('chouse.color',$colors->product_color->id) }}" data-color-id="{{ $colors->product_color->id }}" data-color="{{ $colors->product_color->color }}">
                                                            <span style="background-color: {{ $colors->product_color->color }}"></span>
                                                        </a>
                                                    </li>
                                                        
                                                @endforeach
                                            </ul>
                                        </div>
                                        <div class="attr-detail attr-size d-none" id="size-product-item-none">
                                            <strong class="mr-10">Size</strong>
                                            <ul class="list-filter size-filter font-small" id="size-product-item">
                                                @foreach ($product_size as $sizes)

                                                    <li class="add-cart-size-product">
                                                        <a data-size="{{ $sizes->size->name }}">{{ $sizes->size->name }}</a>
                                                    </li>
                                                
                                                @endforeach
                                            </ul>
                                        </div>
                                        <div class="bt-1 border-color-1 mt-30 mb-30"></div>
                                        <div class="detail-extralink">
{{--                                             <div class="detail-qty border radius">
                                                <a href="#" class="qty-down"><i class="fi-rs-angle-small-down"></i></a>
                                                <span class="qty-val">1</span>
                                                <a href="#" class="qty-up"><i class="fi-rs-angle-small-up"></i></a>
                                            </div> --}}
                                            <input type="number" id="size-product-id" hidden>
                                            <input type="text" id="size-product" hidden>
                                            <input type="number" id="color-product-id" hidden>
                                            <input type="text" id="color-product" hidden>
                                            <div class="product-extra-link2">
                                                <div class="button button-add-to-cart add-cart-size add-cart"
                                                        data-url="{{ route('cart.store',$product->id) }}"
                                                        data-id="{{ $product->id }}"
                                                        data-method="post" >Add to cart
                                                </div>
                                                {{-- <a aria-label="Add To Wishlist" class="action-btn hover-up" href="shop-wishlist.html"><i class="fi-rs-heart"></i></a> --}}
                                                {{-- <a aria-label="Compare" class="action-btn hover-up" href="shop-compare.html"><i class="fi-rs-shuffle"></i></a> --}}
                                            </div>
                                        </div>
                                        <ul class="product-meta font-xs color-grey mt-50">
                                          
                                            <li class="mb-5">
                                                Tags: <a href="#" rel="tag"></a>

                                                @foreach (json_decode($product->tag) as $data)
                                                
                                                    {{-- <a href="#" rel="tag">{{ $data->value }}</a>,  --}}
                                                    {{ $data->value }}

                                                @endforeach
                                            </li>
                                            
                                        </ul>
                                    </div>
                                    <!-- Detail Info -->
                                </div>
                            </div>
                            <div class="row">
                                <div class="tab-style3">
                                <ul class="nav nav-tabs text-uppercase">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="Description-tab" data-bs-toggle="tab" href="#Description">Description</a>
                                    </li>
                                    {{-- <li class="nav-item">
                                        <a class="nav-link" id="Additional-info-tab" data-bs-toggle="tab" href="#Additional-info">Additional info</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="Reviews-tab" data-bs-toggle="tab" href="#Reviews">Reviews (3)</a>
                                    </li> --}}
                                </ul>
                                {{-- <div class="tab-content shop_info_tab entry-main-content"> --}}
                                    <div class="tab-pane fade show active" id="Description">
                                        <div class="">
                                            {{ $product->product->name }}
                                        </div>
                                    </div>
                                    {{-- <div class="tab-pane fade" id="Additional-info">
                                        <table class="font-md">
                                            <tbody>
                                                <tr class="stand-up">
                                                    <th>Stand Up</th>
                                                    <td>
                                                        <p>35″L x 24″W x 37-45″H(front to back wheel)</p>
                                                    </td>
                                                </tr>
                                                <tr class="folded-wo-wheels">
                                                    <th>Folded (w/o wheels)</th>
                                                    <td>
                                                        <p>32.5″L x 18.5″W x 16.5″H</p>
                                                    </td>
                                                </tr>
                                                <tr class="folded-w-wheels">
                                                    <th>Folded (w/ wheels)</th>
                                                    <td>
                                                        <p>32.5″L x 24″W x 18.5″H</p>
                                                    </td>
                                                </tr>
                                                <tr class="door-pass-through">
                                                    <th>Door Pass Through</th>
                                                    <td>
                                                        <p>24</p>
                                                    </td>
                                                </tr>
                                                <tr class="frame">
                                                    <th>Frame</th>
                                                    <td>
                                                        <p>Aluminum</p>
                                                    </td>
                                                </tr>
                                                <tr class="weight-wo-wheels">
                                                    <th>Weight (w/o wheels)</th>
                                                    <td>
                                                        <p>20 LBS</p>
                                                    </td>
                                                </tr>
                                                <tr class="weight-capacity">
                                                    <th>Weight Capacity</th>
                                                    <td>
                                                        <p>60 LBS</p>
                                                    </td>
                                                </tr>
                                                <tr class="width">
                                                    <th>Width</th>
                                                    <td>
                                                        <p>24″</p>
                                                    </td>
                                                </tr>
                                                <tr class="handle-height-ground-to-handle">
                                                    <th>Handle height (ground to handle)</th>
                                                    <td>
                                                        <p>37-45″</p>
                                                    </td>
                                                </tr>
                                                <tr class="wheels">
                                                    <th>Wheels</th>
                                                    <td>
                                                        <p>12″ air / wide track slick tread</p>
                                                    </td>
                                                </tr>
                                                <tr class="seat-back-height">
                                                    <th>Seat back height</th>
                                                    <td>
                                                        <p>21.5″</p>
                                                    </td>
                                                </tr>
                                                <tr class="head-room-inside-canopy">
                                                    <th>Head room (inside canopy)</th>
                                                    <td>
                                                        <p>25″</p>
                                                    </td>
                                                </tr>
                                                <tr class="pa_color">
                                                    <th>Color</th>
                                                    <td>
                                                        <p>Black, Blue, Red, White</p>
                                                    </td>
                                                </tr>
                                                <tr class="pa_size">
                                                    <th>Size</th>
                                                    <td>
                                                        <p>M, S</p>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div> --}}
                                    <div class="tab-pane fade" id="Reviews">
                                        <!--Comments-->
                                        {{-- <div class="comments-area">
                                            <div class="row">
                                                <div class="col-lg-8">
                                                    <h4 class="mb-30">Customer questions & answers</h4>
                                                    <div class="comment-list">
                                                        <div class="single-comment justify-content-between d-flex">
                                                            <div class="user justify-content-between d-flex">
                                                                <div class="thumb text-center">
                                                                    <img src="assets/imgs/page/avatar-6.jpg" alt="">
                                                                    <h6><a href="#">Jacky Chan</a></h6>
                                                                    <p class="font-xxs">Since 2012</p>
                                                                </div>
                                                                <div class="desc">
                                                                    <div class="product-rate d-inline-block">
                                                                        <div class="product-rating" style="width:90%">
                                                                        </div>
                                                                    </div>
                                                                    <p>Thank you very fast shipping from Poland only 3days.</p>
                                                                    <div class="d-flex justify-content-between">
                                                                        <div class="d-flex align-items-center">
                                                                            <p class="font-xs mr-30">December 4, 2020 at 3:12 pm </p>
                                                                            <a href="#" class="text-brand btn-reply">Reply <i class="fi-rs-arrow-right"></i> </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--single-comment -->
                                                        <div class="single-comment justify-content-between d-flex">
                                                            <div class="user justify-content-between d-flex">
                                                                <div class="thumb text-center">
                                                                    <img src="assets/imgs/page/avatar-7.jpg" alt="">
                                                                    <h6><a href="#">Ana Rosie</a></h6>
                                                                    <p class="font-xxs">Since 2008</p>
                                                                </div>
                                                                <div class="desc">
                                                                    <div class="product-rate d-inline-block">
                                                                        <div class="product-rating" style="width:90%">
                                                                        </div>
                                                                    </div>
                                                                    <p>Great low price and works well.</p>
                                                                    <div class="d-flex justify-content-between">
                                                                        <div class="d-flex align-items-center">
                                                                            <p class="font-xs mr-30">December 4, 2020 at 3:12 pm </p>
                                                                            <a href="#" class="text-brand btn-reply">Reply <i class="fi-rs-arrow-right"></i> </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--single-comment -->
                                                        <div class="single-comment justify-content-between d-flex">
                                                            <div class="user justify-content-between d-flex">
                                                                <div class="thumb text-center">
                                                                    <img src="assets/imgs/page/avatar-8.jpg" alt="">
                                                                    <h6><a href="#">Steven Keny</a></h6>
                                                                    <p class="font-xxs">Since 2010</p>
                                                                </div>
                                                                <div class="desc">
                                                                    <div class="product-rate d-inline-block">
                                                                        <div class="product-rating" style="width:90%">
                                                                        </div>
                                                                    </div>
                                                                    <p>Authentic and Beautiful, Love these way more than ever expected They are Great earphones</p>
                                                                    <div class="d-flex justify-content-between">
                                                                        <div class="d-flex align-items-center">
                                                                            <p class="font-xs mr-30">December 4, 2020 at 3:12 pm </p>
                                                                            <a href="#" class="text-brand btn-reply">Reply <i class="fi-rs-arrow-right"></i> </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--single-comment -->
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <h4 class="mb-30">Customer reviews</h4>
                                                    <div class="d-flex mb-30">
                                                        <div class="product-rate d-inline-block mr-15">
                                                            <div class="product-rating" style="width:90%">
                                                            </div>
                                                        </div>
                                                        <h6>4.8 out of 5</h6>
                                                    </div>
                                                    <div class="progress">
                                                        <span>5 star</span>
                                                        <div class="progress-bar" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">50%</div>
                                                    </div>
                                                    <div class="progress">
                                                        <span>4 star</span>
                                                        <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                                                    </div>
                                                    <div class="progress">
                                                        <span>3 star</span>
                                                        <div class="progress-bar" role="progressbar" style="width: 45%;" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100">45%</div>
                                                    </div>
                                                    <div class="progress">
                                                        <span>2 star</span>
                                                        <div class="progress-bar" role="progressbar" style="width: 65%;" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100">65%</div>
                                                    </div>
                                                    <div class="progress mb-30">
                                                        <span>1 star</span>
                                                        <div class="progress-bar" role="progressbar" style="width: 85%;" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">85%</div>
                                                    </div>
                                                    <a href="#" class="font-xs text-muted">How are ratings calculated?</a>
                                                </div>
                                            </div>
                                        </div> --}}
                                        <!--comment form-->
                                        {{-- <div class="comment-form">
                                            <h4 class="mb-15">Add a review</h4>
                                            <div class="product-rate d-inline-block mb-30">
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-8 col-md-12">
                                                    <form class="form-contact comment_form" action="#" id="commentForm">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <textarea class="form-control w-100" name="comment" id="comment" cols="30" rows="9" placeholder="Write Comment"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <input class="form-control" name="name" id="name" type="text" placeholder="Name">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <input class="form-control" name="email" id="email" type="email" placeholder="Email">
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <input class="form-control" name="website" id="website" type="text" placeholder="Website">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <button type="submit" class="button button-contactForm">Submit
                                                                Review</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                            </div>
                            
                           {{--  <div class="banner-img banner-big wow fadeIn f-none animated mt-50">
                                <img class="border-radius-10" src="{{ asset('site_assets/assets/imgs/banner/banner-4.png') }}" alt="">
                                <div class="banner-text">
                                    <h4 class="mb-15 mt-40">Repair Services</h4>
                                    <h2 class="fw-600 mb-20">We're an Apple <br>Authorised Service Provider</h2>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="mb-50">
            <div class="container">
                <div class="row">

                    <div class="col-lg-12">

                        <div class="col-lg-12">

                            <div class="shop-product-fillter-header hide" style="display: none;">
                                <div class="row">
                                    <div class="col-lg-2 col-md-4 mb-lg-0 mb-md-5 mb-sm-5">
                                        <h5 class="mb-20">Categories</h5>
                                        <ul class="categor-list">
                                            <li class="cat-item text-muted"><a href="shop-grid-right.html">T-shirst</a>(125)</li>
                                            <li class="cat-item text-muted"><a href="shop-grid-right.html">Tank tops</a>(68)</li>
                                            <li class="cat-item text-muted"><a href="shop-grid-right.html">Mugs</a>(68)</li>
                                            <li class="cat-item text-muted"><a href="shop-grid-right.html">Tableau</a>(68)</li>

                                        </ul>
                                    </div>
                                    <div class="col-lg-2 col-md-4 mb-lg-0 mb-md-5 mb-sm-5">
                                        <h5 class="mb-20">By Gender</h5>
                                        <ul class="categor-list">
                                            <li class="cat-item text-muted"><a href="shop-grid-right.html">Male</a>(125)</li>
                                            <li class="cat-item text-muted"><a href="shop-grid-right.html">Female</a>(68)</li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-2 col-md-4 mb-lg-0 mb-md-5 mb-sm-5">
                                        <h5 class="mb-20">By Tags</h5>
                                        <ul class="categor-list">
                                            <li class="cat-item text-muted"><a href="shop-grid-right.html">On sale</a>(124)</li>
                                            <li class="cat-item text-muted"><a href="shop-grid-right.html">BestSelling</a>(124)</li>
                                            <li class="cat-item text-muted"><a href="shop-grid-right.html">Trending</a>(1553)</li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-2 col-md-4 mb-lg-0 mb-md-5 mb-sm-5">
                                        <h5 class="mb-20">By Color</h5>
                                        <ul class="list-filter color-filter">
                                            <li><a href="#" data-color="Red"><span class="product-color-red"></span></a></li>
                                            <li><a href="#" data-color="Yellow"><span class="product-color-yellow"></span></a></li>
                                            <li class="active"><a href="#" data-color="White"><span class="product-color-white"></span></a></li>
                                            <li><a href="#" data-color="Orange"><span class="product-color-orange"></span></a></li>
                                            <li><a href="#" data-color="Cyan"><span class="product-color-cyan"></span></a></li>
                                            <li><a href="#" data-color="Green"><span class="product-color-green"></span></a></li>
                                            <li><a href="#" data-color="Purple"><span class="product-color-purple"></span></a></li>
                                        </ul>
                                        <h5 class="mb-15 mt-20">By Size</h5>
                                        <ul class="list-filter size-filter font-small">
                                            <li><a href="#">S</a></li>
                                            <li class="active"><a href="#">M</a></li>
                                            <li><a href="#">L</a></li>
                                            <li><a href="#">XL</a></li>
                                            <li><a href="#">XXL</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-2 col-md-4 mb-lg-0 mb-md-5 mb-sm-5">
                                        <h5 class="mb-20">By Review</h5>
                                        <div class="product-rate-cover">
                                            <div class="product-rate d-inline-block">
                                                <div class="product-rating" style="width:100%">
                                                </div>
                                            </div>
                                            <span class="font-small ml-5 text-muted"> (25)</span>
                                        </div>
                                        <div class="product-rate-cover">
                                            <div class="product-rate d-inline-block">
                                                <div class="product-rating" style="width:80%">
                                                </div>
                                            </div>
                                            <span class="font-small ml-5 text-muted"> (25)</span>
                                        </div>
                                        <div class="product-rate-cover">
                                            <div class="product-rate d-inline-block">
                                                <div class="product-rating" style="width:60%">
                                                </div>
                                            </div>
                                            <span class="font-small ml-5 text-muted"> (25)</span>
                                        </div>
                                        <div class="product-rate-cover">
                                            <div class="product-rate d-inline-block">
                                                <div class="product-rating" style="width:40%">
                                                </div>
                                            </div>
                                            <span class="font-small ml-5 text-muted"> (25)</span>
                                        </div>
                                        <div class="product-rate-cover">
                                            <div class="product-rate d-inline-block">
                                                <div class="product-rating" style="width:20%">
                                                </div>
                                            </div>
                                            <span class="font-small ml-5 text-muted"> (25)</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row product-grid-3">

                            @foreach ($products as $product)
                            
                                <div class="col-lg-3 col-md-4">

                                    <div class="product-cart-wrap mb-30">
                                        <div class="product-img-action-wrap">
                                            <div class="product-img product-img-zoom">
                                                <a href="#" class="img-wrap">
                                                    <img src="{{ $product->defult_image }}">
                                                </a>
                                            </div>
                                            <div class="product-action-1">
                                                <a aria-label="Quick view" class="action-btn hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal">
                                                    <i class="fi-rs-search"></i></a>
                                                    <a aria-label="Add To Wishlist" class="action-btn hover-up" href="shop-wishlist.html"><i class="fi-rs-heart"></i>
                                                </a>
                                            </div>
                                            <div class="product-badges product-badges-position product-badges-mrg">
                                                <span class="best">{{ $product->title }}</span>
                                            </div>
                                        </div>
                                        <div class="product-content-wrap">
                                            <div class="product-category">
                                                <a href="{{ route('product.details',$product->id) }}">details</a>
                                            </div>
                                            <h2><a href="shop-product-right.html"></a></h2>

                                            <div class="product-price">
                                                <span>{{ app()->getLocale() == 'ar' ? 'ج م' : 'LE'}} {{ number_format($product->price,2) }}</span>
                                            </div>
                                            <div class="product-action-1 show">
                                                <a aria-label="Add To Cart" class="action-btn hover-up add-cart" data-url="{{ route('cart.store',$product->id) }}" data-method="post">
                                                     <i class="fi-rs-shopping-bag-add"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            @endforeach

                        </div>

                    </div>
                </div>
            </div>
        </section>

    </main>
@endsection