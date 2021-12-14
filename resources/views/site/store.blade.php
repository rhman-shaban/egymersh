@extends('site.layouts.master')

@section('page_title')
{{ $store->name }}
@endsection

@section('page_content')

<section class="banner-2 section-padding pb-0">
    <div class="container">
        <div class="banner-img banner-big wow fadeIn animated f-none animated animated" style="visibility: visible;">
            <div class="card mb-4">
                <img src="{{ asset('storage/'.$store->banner)  }}" style="height:300px" width="100%">
                <div class="card-body">
                    <div class="d-flex justify-content-center mt-5">
                        <div class="col-xl col-lg flex-grow-0 d-block" style="flex-basis:230px;">
                            <div class="img-thumbnail shadow w-100 bg-white position-relative text-center rounded-circle" style="margin-top:-70px;">
                                <img src="{{ asset('storage/'.$store->logo) }}" class="center-xy img-fluid rounded-circle" alt="Store Logo" style="vertical-align:middle;">
                            </div>
                        </div> <!--  col.// -->
                    </div> <!-- card-body.// -->
                  <!-- name and verification -->
                    <div class="col-xl col-lg d-flex justify-content-center">
                        <div class="desc pl-5" style="text-align: center;">
                            <div class="d-flex mt-4 pl-5 text-center">
                                <span class="text-brand mb-10" style="font-size: 30px;">{{ $store->name }}</span>
                            </div>

                            <!-- <div class="d-flex pl-5 text-center">
                                <div class="product-badges product-badges-position product-badges-mrg text-center">
                                    <span class="best text-primary text-center">
                                        <i class="fas fa-check-circle"></i> @lang('store.Verified Store')
                                    </span>
                                </div>
                            </div> -->

                            <!-- store rating -->
                            <!-- <div class="product-rate d-inline-block pl-5 text-center">
                                <div class="product-rating" style="width:90%l">
                                </div>
                            </div> -->

                        </div>
                    </div> <!--  col.// -->

                </div> <!--  card-body.// -->
            </div>
        </div>
    </div>
</section>


  <!-- Store categories -->
  <!-- <section class="container my-4">
    <div class="row">
        <div class="col-md-4" style="width: 100%">
            <div class="tags w-sm-100 d-flex justify-content-center">

                <a href="blog-category-big.html" rel="tag" class="hover-up btn btn-sm btn-rounded mr-10">@lang('store.All Categories')</a>

                @foreach (App\Models\Category::all() as $category)

                    <a href="blog-category-big.html" rel="tag" class="hover-up btn btn-sm btn-rounded mr-10">{{ $category->name }}</a>

                @endforeach
            </div>
        </div>
    </div>
  </section> -->


<section class="mb-50">
    <div class="container">
        <div class="row">

                <div class="row product-grid-3">

                    @foreach ($products as $product)

                        <div class="col-lg-3 col-md-4">

                            <div class="product-cart-wrap mb-30">
                                <div class="product-img-action-wrap">
                                    <div class="product-img product-img-zoom">
                                        <a href="{{ route('product.details',$product->id ) }}" class="img-wrap">
                                            <img src="{{ $product->image_path }}">
                                        </a>
                                    </div>
                                </div>

                                <div class="product-content-wrap">
                                    <div class="product-category">
                                        {{ $product->category->name }}
                                    </div>
                                    <h2>
                                        <a href="{{ route('product.details' ,$product->id) }}">
                                            {{ $product->title }}
                                        </a>
                                    </h2>
                                    <div class="product-price">
                                        <span> {{ number_format($product->price,2) }} {{ app()->getLocale() == 'ar' ? 'ج م' : 'LE'}}</span>
                                    </div>
                                    <div class="product-action-1 show">
                                        <a aria-label="Quick view" href="{{ route('product.details' ,$product->id) }}" class="action-btn hover-up quickViewProduct"
                                            data-modal_name='#quickViewModal{{ $product->id }}' data-product_id="{{ $product->id }}">
                                            <i class="fi-rs-shopping-bag-add"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @endforeach

                </div>
                <!--pagination-->

            </div>
        </div>
    </div>
</section>

@endsection
