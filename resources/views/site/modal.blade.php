    <div class="modal fade custom-modal" id="quickViewModal{{ $product->id }}" tabindex="-1" aria-labelledby="quickViewModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">              
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>       
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="detail-gallery">
                                <!-- MAIN SLIDES -->
                                <div class="product-image-slider">
                                    <figure class="border-radius-10">
                                        <img src="{{ $product->image_path }}" alt="product image">
                                    </figure>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="detail-info">
                                <h3 class="title-detail mt-30">{{ $product->title }}</h3>
                                <div class="product-detail-rating">
                                    <div class="pro-details-brand">
                                        <span>@lang('product.Store') : 
                                            <a href="{{ url('store/'.$product->store_id) }}"> {{ optional($product->store)->name }} </a>
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
                                    <p class="font-sm">{{ $product->description }}</p>
                                </div>
                                
                                <div class="attr-detail attr-color mb-15">
                                    <strong class="ml-10 mr-10"> @lang('product.Colors')</strong>

                                    <ul class="list-filter color-filter">
                                        @foreach ($product_color as $colors)

                                            <li class="product-color active-{{ $colors->product_color->id }}">
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
                                    <div class="product-extra-link2">
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
                        </div>
                    </div>
                </div>        
            </div>
        </div>
    </div>
