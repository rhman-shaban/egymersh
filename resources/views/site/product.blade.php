@extends('site.layouts.master')

@section('page_title')
{{ $product->title }}
@endsection

@section('page_content')
    <main class="main">
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="product-detail accordion-detail">
                            <div class="row mb-50">
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="detail-gallery">

                                        <div class="product-image-slider">
                                            <figure class="border-radius-10">
                                                <img src="{{ $product->image_path }}" alt="product image" style="width: 100%">
                                            </figure>

                                            @foreach ($product->product_seller_image as $data)

                                                <figure class="border-radius-10">
                                                    <img src="{{ $data->image_path }}" alt="product image" style="width: 100%">
                                                </figure>

                                            @endforeach
                                        </div>
                                        <!-- THUMBNAILS -->
                                        <div class="slider-nav-thumbnails pl-15 pr-15">
                                            <div>
                                                <img src="{{ $product->image_path }}" alt="product image">
                                            </div>
                                            @foreach ($product->product_seller_image as $data)

                                                <div>
                                                    <img src="{{ $data->image_path }}" alt="product image">
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
                                                <span>@lang('product.Store')
                                                  <a href="{{ url('store/'.$product->store_id) }}"> {{ $product->store->name }} </a>
                                                </span>
                                            </div>

                                        </div>
                                        <div class="clearfix product-price-cover">
                                            <div class="product-price primary-color float-left">
                                                <ins>
                                                    <span class="text-brand">
                                                        {{ number_format($product->price,2) }} {{ app()->getLocale() == 'ar' ? 'ج م' : 'LE'}}
                                                    </span>
                                                </ins>
                                            </div>
                                        </div>
                                        <div class="bt-1 border-color-1 mt-15 mb-15"></div>
                                        <div class="short-desc mb-30">
                                            <span>@lang('product.Design Description')</span>
                                            <p class="col-5">{{ $product->description }}</p>
                                        </div>
                                        <div class="attr-detail attr-color mb-15">

                                            <strong class="ml-10 mr-10"> @lang('product.Colors')</strong>

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


                                            <strong class="ml-10 mr-10">@lang('product.Sizes')</strong>

                                            <ul class="list-filter size-filter font-small" id="size-product-item">
                                                @foreach ($product_size as $sizes)

                                                    <li class="add-cart-size-product">
                                                        <a data-size="{{ $sizes->size->name }}"> {{ $sizes->size->name }} </a>
                                                    </li>

                                                @endforeach
                                            </ul>

                                        </div>
                                        <div class="bt-1 border-color-1 mt-30 mb-30"></div>
                                        <div class="detail-extralink">
                                            <div class="d-flex justify-content-end product-extra-link2">
                                                <div class="button button-add-to-cart add-cart-size add-cart"
                                                        data-url="{{ route('cart.store',$product->id) }}"
                                                        data-id="{{ $product->id }}"
                                                        data-locale="{{ app()->getLocale() }}"
                                                        data-method="post" >
                                                       <i class="fas fa-shopping-cart"></i>
                                                        @lang('product.Add to cart')
                                                </div>
                                            </div>
                                        </div>
                                        <ul class="product-meta font-xs color-grey mt-50">
                                            @if ($product->tag)
                                                <li class="mb-5">
                                                    @lang('seller.tags') : <a href="#" rel="tag"></a>

                                                    @foreach (json_decode($product->tag) as $data)

                                                        , {{ $data->value }}

                                                    @endforeach
                                                </li>

                                            @endif

                                        </ul>
                                    </div>
                                    <!-- Detail Info -->
                                </div>
                            </div>
                            <div class="row">
                                <div class="tab-style3">
                                <ul class="nav nav-tabs text-uppercase">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="Description-tab" data-bs-toggle="tab" href="#Description">@lang('product.Product Description')</a>
                                    </li>
                                </ul>
                                    <div class="tab-pane fade show active" id="Description">
                                        <div class="">
                                            {{ $product->product->name }}
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="Reviews">

                                    </div>
                                </div>
                            </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="mb-50">
            <div class="container">
                <div class="row">

                    <div class="col-lg-12">

                      <ul class="nav nav-tabs text-uppercase">
                          <li class="nav-item">
                              <a class="nav-link active" id="MoreProducts-1" data-bs-toggle="tab" href="#More-Products">@lang('product.Similar Products')</a>
                          </li>
                      </ul>

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
                                            <div class="product-category">
                                                <a href="{{ url('store/'.$product->store_id) }}"> {{ $product->store->name }} </a>
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
