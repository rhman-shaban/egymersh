@extends('site.layouts.master')
@php
    $lang = LaravelLocalization::getCurrentLocale();
@endphp
@section('page_content')
<main class="main">
    {{-- <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{ url('/') }}" rel="nofollow">Home</a>
                <span></span> Search
            </div>
        </div>
    </div> --}}
    <section class="mt-50 mb-50">
        <div class="container">
            <div class="row">

                <div class="col-lg-12">
                    <div class="shop-product-fillter">
                        <div class="totall-product">
                            <p> We found <strong class="text-brand"> {{ $products->total() }} </strong> items for you!</p>
                        </div>
                        <div class="sort-by-product-area">
                         <div class="sort-by-cover mr-10">
                            <div class="sort-by-product-wrap shop-filter-toogle">
                                <div class="sort-by">
                                    <span><i class="fi-rs-filter"></i>Filters:</span>
                                </div>
                            </div>
                        </div>


                        <div class="sort-by-cover mr-10">
                            <div class="sort-by-product-wrap">
                                <div class="sort-by">
                                    <span><i class="fi-rs-apps"></i>Show:</span>
                                </div>
                                <div class="sort-by-dropdown-wrap">
                                    <span> 50 <i class="fi-rs-angle-small-down"></i></span>
                                </div>
                            </div>
                            <div class="sort-by-dropdown">
                                <ul>
                                    <li><a class="active" href="#">50</a></li>
                                    <li><a href="#">100</a></li>
                                    <li><a href="#">150</a></li>
                                    <li><a href="#">200</a></li>
                                    <li><a href="#">All</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="sort-by-cover">
                            <div class="sort-by-product-wrap">
                                <div class="sort-by">
                                    <span><i class="fi-rs-apps-sort"></i>Sort by:</span>
                                </div>
                                <div class="sort-by-dropdown-wrap">
                                    <span> Featured <i class="fi-rs-angle-small-down"></i></span>
                                </div>
                            </div>
                            <div class="sort-by-dropdown">
                                <ul>
                                    <li><a class="active" href="#">Featured</a></li>
                                    <li><a href="#">Price: Low to High</a></li>
                                    <li><a href="#">Price: High to Low</a></li>
                                    <li><a href="#">Release Date</a></li>
                                    <li><a href="#">Avg. Rating</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

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
                                    <a href="shop-product-right.html">
                                        <img class="default-img" src="{{ asset('site_assets/assets/imgs/shop/product-7-2.jpg') }}" alt="">
                                        <img class="hover-img" src="{{ asset('site_assets/assets/imgs/shop/product-7-1.jpg') }}" alt="">
                                    </a>
                                </div>
                                <div class="product-action-1">
                                    <a aria-label="Quick view" class="action-btn hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal">
                                        <i class="fi-rs-search"></i></a>
                                        <a aria-label="Add To Wishlist" class="action-btn hover-up" href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                    </div>

                                </div>
                                <div class="product-content-wrap">
                                    <div class="product-category">
                                        <a href="shop-grid-right.html">{{ optional(optional($product->product)->category)['name_'.$lang] }}</a>
                                    </div>
                                    <h2><a href="shop-product-right.html">{{ $product->title }}</a></h2>

                                    <div class="product-price">
                                        <span>$338.85 </span>
                                        <span class="old-price">$445.8</span>
                                    </div>
                                    <div class="product-action-1 show">
                                        <a aria-label="Add To Cart" class="action-btn hover-up" href="shop-cart.html"><i class="fi-rs-shopping-bag-add"></i></a>
                                    </div>
                                    <div class="product-category">
                                        <a href="shop-grid-right.html"> {{ optional($product->store)->name }} </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @endforeach




                    </div>
                    <!--pagination-->
                    <div class="pagination-area mt-15 mb-sm-5 mb-lg-0">
                        <nav aria-label="Page navigation example">
                            {{ $products->links() }}
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection