@php
$lang = LaravelLocalization::getCurrentLocale();
@endphp
<div>


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
                        <select wire:model="rows" class="form-control" >
                            <option value="2">2 item per page </option>
                            <option value="10">10 item per page </option>
                            <option value="50">50 item per page </option>
                            <option value="100">100 item per page </option>
                            <option value="150">150 item per page </option>
                            <option value="200">200 item per page </option>
                        </select>
                    </div>
                    <div class="sort-by-cover">
                        <select wire:model="sort_by" class="form-control" >
                            <option value=""> Sort By </option>
                            <option value="price_low_to_high">Price: Low to High  </option>
                            <option value="price_high_to_low">Price: High to Low  </option>
                            <option value="date">Release Date  </option>
                            <option value="rating">Avg. Rating  </option>
                            <option value="best_selling"> Best Selling </option>
                        </select>   
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
                               @foreach ($all_sizes as $size)
                                    <li>
                                       <label for="">
                                            <input value='{{ $size->id }}' type="checkbox" wire:model='sizes'>
                                        {{ $size['name'] }}
                                       </label>
                                    </li>
                               @endforeach
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
                                <a href="{{ route('product.details' , ['id' => $product->id ] ) }}">
                                    <img class="default-img" src="{{ Storage::url('seller_products/'.$product->image) }}" alt="">
                                    <img class="hover-img" src="{{ Storage::url('products/'.optional($product->product)->image) }}" alt="">
                                </a>
                            </div>
                            <div class="product-action-1">
                                <a aria-label="Quick view" class="action-btn hover-up quickViewProduct" data-modal_name='#quickViewModal{{ $product->id }}' data-product_id="{{ $product->id }}" >
                                    <i class="fi-rs-search"></i></a>
                                    <a aria-label="Add To Wishlist" data-product_id="{{ $product->id }}" class="action-btn hover-up add_to_wishlist" ><i class="fi-rs-heart"></i></a>

                                </div>
                                <div class="product-badges product-badges-position product-badges-mrg">
                                    <span class="best">Best Sell</span>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <div class="product-category">
                                    <a href="shop-grid-right.html">{{ optional(optional($product->product)->category)['name_'.$lang] }}</a>
                                </div>
                                <h2><a href="{{ route('product.details' , ['id' => $product->id ] ) }}">{{ $product->title }}</a></h2>

                                <div class="product-price">
                                    <span> {{ $product->price }} LE </span>
                                    {{-- <span class="old-price">$445.8</span> --}}
                                </div>
                               {{--  <div class="product-action-1 show">
                                    <a aria-label="Add To Cart" class="action-btn hover-up" href="shop-cart.html"><i class="fi-rs-shopping-bag-add"></i></a>
                                </div> --}}
                                <div class="product-category">
                                    <a href="{{ url('store/'.$product->sotre_id) }}">store name </a>
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

