@extends('site.layouts.master')
@php
    $lang = LaravelLocalization::getCurrentLocale();
@endphp

@section('page_title')
@lang('title.Search')
@endsection

@section('page_content')
<main class="main">

    <section class="mt-50 mb-50">
        <div class="container">
            <div class="row">

                <div class="row product-grid-3">


                    @foreach ($products as $product)
                    <div class="col-lg-3 col-md-4">
                        <div class="product-cart-wrap mb-30">
                            <div class="product-img-action-wrap">
                                <div class="product-img product-img-zoom">
                                    <a href="shop-product-right.html">
                                        <img class="default-img" src="{{ $product->image_path }}" alt="">
                                        <img class="hover-img" src="{{ $product->image_path }}" alt="">
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
                                        {{ $product->category->name }}
                                    </div>
                                    <h2>
                                        <a href="{{ route('product.details' ,$product->id) }}">
                                            {{ $product->title }}
                                        </a>
                                    </h2>
                                    <div class="product-price">
                                        <span>{{ number_format($product->price,2) }} {{ app()->getLocale() == 'ar' ? 'ج م' : 'LE'}}</span>
                                    </div>
                                    <div class="product-action-1 show">
                                        <a aria-label="Add To Cart" class="action-btn hover-up add-cart"
                                            data-url="{{ route('cart.store',$product->id) }}" data-method="post">
                                            <i class="fi-rs-shopping-bag-add"></i>
                                        </a>
                                    </div>
                                    <div class="product-category">
                                        <a href="{{ url('store/'.$product->store_id) }}"> {{ $product->store->name }} </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @endforeach




                    </div>
                    <!--pagination-->
                    <div class="pagination-area mt-15 mb-sm-5 mb-lg-0">
                        <nav aria-label="Page navigation example">
                            {{-- {{ $products->links() }} --}}
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
