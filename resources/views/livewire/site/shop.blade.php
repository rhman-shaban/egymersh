@php
$lang = LaravelLocalization::getCurrentLocale();
@endphp
<div>


    <div class="row">
        <div class="col-lg-12">
            <div class="shop-product-fillter">
                <div class="totall-product">
                    <p>@lang('shop.We found') <strong class="text-brand"> {{ $products->total() }} </strong>@lang('shop.items for you!')</p>

                </div>
                <div class="sort-by-product-area">

                    <div class="sort-by-cover mx-2">
                        <select wire:model="rows" class="form-control" >
                            {{-- <option value="2">@lang('shop.item per page')</option> --}}
                            <option value="10">10 @lang('shop.item per page')</option>
                            <option value="50">50 @lang('shop.item per page')</option>
                            <option value="100">100 @lang('shop.item per page')</option>
                            <option value="200">200 @lang('shop.item per page')</option>
                        </select>
                    </div>
                    <div class="sort-by-cover">
                        <select wire:model="sort_by" class="form-control" >
                            <option value="">@lang('shop.Sort By') </option>
                            <option value="price_low_to_high">@lang('shop.Price: Low to High')  </option>
                            <option value="price_high_to_low">@lang('shop.Price: High to Low')  </option>
                            <option value="date">@lang('shop.Newest')</option>
                            <!-- <option value="rating">Avg. Rating  </option> -->
                            <option value="best_selling">@lang('shop.Best Selling')  </option>
                        </select>
                    </div>
                </div>
            </div>


            <div class="row product-grid-3">

                    @foreach ($products as $product)

                    <div class="col-lg-3 col-md-4">
                        <div class="product-cart-wrap mb-30">
                            <div class="product-img-action-wrap">
                                <div class="product-img product-img-zoom">
                                    <a href="{{ route('product.details' , ['id' => $product->id ] ) }}">
                                        <img class="default-img" src="{{ $product->image_path }}" alt="">
                                        <img class="hover-img" src="{{ $product->image_path }}" alt="">
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
                                    <span>{{ number_format($product->price,2) }} {{ app()->getLocale() == 'ar' ? 'ج م' : 'LE'}}</span>
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

                <div class="pagination-area mt-15 mb-sm-5 mb-lg-0">
                    {{ $products->links() }}
                </div>

            </div>

        </div>
    </div>
