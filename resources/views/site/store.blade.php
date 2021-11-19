@extends('site.layouts.master')

@section('page_content')
{{-- 
<div class="page-header breadcrumb-wrap">
    <section class="hero-2 ">
        <div class="hero-content">
            <div class="container">
                <div class="text-center">
                    <h1 class="mb-20 wow fadeIn animated font-xxl fw-900 animated" style="visibility: visible;">
                        <span class="text-style-1">Store Name Here </span>
                    </h1>
                    <p class="w-50 m-auto mb-50 wow fadeIn animated animated" style="visibility: visible;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum quam eius placeat, a quidem mollitia at accusantium reprehenderit pariatur provident nam ratione incidunt magnam sequi.</p>
                    <p class="wow fadeIn animated animated" style="visibility: visible;">
                    </p>
                </div>
            </div>
        </div>
    </section>
</div>
 --}}

<section class="banner-2 section-padding pb-0">
    <div class="container">
        <div class="banner-img banner-big wow fadeIn animated f-none animated animated" style="visibility: visible;">
            <div class="card">
                <img src="{{ Storage::url('stores/'.$store->banner) }}" style="height:300px" width="100%">
                <div class="card-body">
                    <div class="d-flex justify-content-center mt-5">
                        <div class="col-xl col-lg flex-grow-0 d-block" style="flex-basis:230px;">
                            <div class="img-thumbnail shadow w-100 bg-white position-relative text-center" style="height:153px;width:200px;margin-top:-111px;">
                                <img src="{{ Storage::url('stores/'.$store->logo) }}" class="center-xy img-fluid" alt="Logo Brand">
                            </div>
                        </div> <!--  col.// -->
                    </div> <!-- card-body.// -->
                    <div class="col-xl col-lg d-flex justify-content-center" style="margin-top:50px!important">
                        <div class="desc pl-5" style="text-align: center;">
                            <div class="d-flex mt-4 pl-5 text-center">
                                <span class="text-style-1 text-muted" style="font-size: 27px;">{{ $store->name }}</span>
                            </div>
                            <div class="d-flex pl-5 text-center">
                                <div class="product-badges product-badges-position product-badges-mrg text-center">
                                    <span class="best text-primary text-center">  
                                        <i class="fas fa-user-check"></i> Verified 
                                    </span>
                                </div>
                            </div>
                            <div class="product-rate d-inline-block pl-5 text-center">
                                <div class="product-rating" style="width:90%l">
                                </div>
                            </div>
                        </div>
                    </div> <!--  col.// -->
                </div> <!--  card-body.// -->
            </div>
        </div>
    </div>
</section>




<section class="container my-4">
    <div class="row">
        <div class="col-md-4" style="width: 100%">
            <div class="tags w-sm-100 d-flex justify-content-center">

                <a href="blog-category-big.html" rel="tag" class="hover-up btn btn-sm btn-rounded mr-10">All Category</a>

                @foreach (App\Models\Category::all() as $category)

                    <a href="blog-category-big.html" rel="tag" class="hover-up btn btn-sm btn-rounded mr-10">{{ $category->name }}</a>
                    
                @endforeach
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
                                            <img src="{{ $product->image_path }}">
                                        </a>
                                    </div>
                                    <div class="product-action-1">
                                        <a aria-label="Quick view" class="action-btn hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal">
                                            <i class="fi-rs-search"></i></a>
                                            <a aria-label="Add To Wishlist" class="action-btn hover-up" href="shop-wishlist.html"><i class="fi-rs-heart"></i>
                                        </a>
                                    </div>
                                    <div class="product-badges product-badges-position product-badges-mrg">
                                        <span class="best">Best Sell</span>
                                    </div>
                                </div>
                                <div class="product-content-wrap">
                                    <div class="product-category">
                                        <a href="{{ route('product.details',$product->id) }}">details</a>
                                    </div>
                                    <h2><a href="shop-product-right.html">{{ $product->name }}</a></h2>

                                    <div class="product-price">
                                        <span>{{ $product->price }} {{ app()->getLocale() == 'ar' ? 'ج م' : 'LE'}}</span>
                                        {{-- <span class="old-price">{{ $product->price }}:{{ app()->getLocale() == 'ar' ? 'ج م' : 'LE'}}</span> --}}
                                    </div>
                                    <div class="product-action-1 show">
                                        <a aria-label="Add To Cart" class="action-btn hover-up add-cart"
                                             data-url="{{ route('cart.store',$product->id) }}" data-method="post" >
                                             <i class="fi-rs-shopping-bag-add"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @endforeach

                </div>
                <!--pagination-->
                <div class="pagination-area mt-15 mb-sm-5 mb-lg-0">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-start">
                            <li class="page-item active"><a class="page-link" href="#">01</a></li>
                            <li class="page-item"><a class="page-link" href="#">02</a></li>
                            <li class="page-item"><a class="page-link" href="#">03</a></li>
                            <li class="page-item"><a class="page-link dot" href="#">...</a></li>
                            <li class="page-item"><a class="page-link" href="#">16</a></li>
                            <li class="page-item"><a class="page-link" href="#"><i class="fi-rs-angle-double-small-right"></i></a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection