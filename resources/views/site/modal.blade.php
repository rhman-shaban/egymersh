    <div class="modal fade custom-modal" id="quickViewModal{{ $product->id }}" tabindex="-1" aria-labelledby="quickViewModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">              
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>       
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="detail-gallery">
                                <span class="zoom-icon"><i class="fi-rs-search"></i></span>
                                <!-- MAIN SLIDES -->
                                <div class="product-image-slider">
                                    <figure class="border-radius-10">
                                        <img src="{{ Storage::url('seller_products/'.$product->image) }}" alt="product image">
                                    </figure>
                          {{--           <figure class="border-radius-10">
                                        <img src="{{ asset('site_assets/assets/imgs/shop/product-16-1.jpg') }}" alt="product image">
                                    </figure>
                                    <figure class="border-radius-10">
                                        <img src="{{ asset('site_assets/assets/imgs/shop/product-16-3.jpg') }}" alt="product image">
                                    </figure>
                                    <figure class="border-radius-10">
                                        <img src="{{ asset('site_assets/assets/imgs/shop/product-16-4.jpg') }}" alt="product image">
                                    </figure>
                                    <figure class="border-radius-10">
                                        <img src="{{ asset('site_assets/assets/imgs/shop/product-16-5.jpg') }}" alt="product image">
                                    </figure>
                                    <figure class="border-radius-10">
                                        <img src="{{ asset('site_assets/assets/imgs/shop/product-16-6.jpg') }}" alt="product image">
                                    </figure>
                                    <figure class="border-radius-10">
                                        <img src="{{ asset('site_assets/assets/imgs/shop/product-16-7.jpg') }}" alt="product image">
                                    </figure> --}}
                                </div>
                                <!-- THUMBNAILS -->
                                <div class="slider-nav-thumbnails pl-15 pr-15">
                                    {{-- <div><img src="{{ asset('site_assets/assets/imgs/shop/thumbnail-3.jpg') }}" alt="product image"></div>
                                    <div><img src="{{ asset('site_assets/assets/imgs/shop/thumbnail-4.jpg') }}" alt="product image"></div>
                                    <div><img src="{{ asset('site_assets/assets/imgs/shop/thumbnail-5.jpg') }}" alt="product image"></div>
                                    <div><img src="{{ asset('site_assets/assets/imgs/shop/thumbnail-6.jpg') }}" alt="product image"></div>
                                    <div><img src="{{ asset('site_assets/assets/imgs/shop/thumbnail-7.jpg') }}" alt="product image"></div>
                                    <div><img src="{{ asset('site_assets/assets/imgs/shop/thumbnail-8.jpg') }}" alt="product image"></div>
                                    <div><img src="{{ asset('site_assets/assets/imgs/shop/thumbnail-9.jpg') }}" alt="product image"></div> --}}
                                </div>
                            </div>
                            <!-- End Gallery -->
                            <div class="social-icons single-share">
                                <ul class="text-grey-5 d-inline-block">
                                    <li><strong class="mr-10">Share this:</strong></li>
                                    <li class="social-facebook"><a href="#"><img src="{{ asset('site_assets/assets/imgs/theme/icons/icon-facebook.svg') }}" alt=""></a></li>
                                    <li class="social-twitter"> <a href="#"><img src="{{ asset('site_assets/assets/imgs/theme/icons/icon-twitter.svg') }}" alt=""></a></li>
                                    <li class="social-instagram"><a href="#"><img src="{{ asset('site_assets/assets/imgs/theme/icons/icon-instagram.svg') }}" alt=""></a></li>
                                    <li class="social-linkedin"><a href="#"><img src="{{ asset('site_assets/assets/imgs/theme/icons/icon-pinterest.svg') }}" alt=""></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="detail-info">
                                <h3 class="title-detail mt-30">{{ $product->title }}</h3>
                                <div class="product-detail-rating">
                                    <div class="pro-details-brand">
                                        <span> Shop: <a href="{{ url('store/'.$product->store_id) }}"> {{ optional($product->store)->name }} </a></span>
                                    </div>
                                </div>
                                <div class="clearfix product-price-cover">
                                    <div class="product-price primary-color float-left">
                                        <ins><span class="text-brand"> {{ $product->price }} LE </span></ins>
                                       {{--  <ins><span class="old-price font-md ml-15">$200.00</span></ins>
                                        <span class="save-price  font-md color3 ml-15">25% Off</span> --}}
                                    </div>
                                </div>
                                <div class="bt-1 border-color-1 mt-15 mb-15"></div>
                                <div class="short-desc mb-30">
                                    <p class="font-sm">{{ $product->description }}</p>
                                </div>
                                
                                <div class="attr-detail attr-color mb-15">
                                    <strong class="mr-10">Color</strong>
                                    <ul class="list-filter color-filter">
                                        <li><a href="#" data-color="Red"><span class="product-color-red"></span></a></li>
                                        <li><a href="#" data-color="Yellow"><span class="product-color-yellow"></span></a></li>
                                        <li class="active"><a href="#" data-color="White"><span class="product-color-white"></span></a></li>
                                        <li><a href="#" data-color="Orange"><span class="product-color-orange"></span></a></li>
                                        <li><a href="#" data-color="Cyan"><span class="product-color-cyan"></span></a></li>
                                        <li><a href="#" data-color="Green"><span class="product-color-green"></span></a></li>
                                        <li><a href="#" data-color="Purple"><span class="product-color-purple"></span></a></li>
                                    </ul>
                                </div>
                                <div class="attr-detail attr-size">
                                    <strong class="mr-10">Size</strong>
                                    <ul class="list-filter size-filter font-small">
                                        <li><a href="#">S</a></li>
                                        <li class="active"><a href="#">M</a></li>
                                        <li><a href="#">L</a></li>
                                        <li><a href="#">XL</a></li>
                                        <li><a href="#">XXL</a></li>
                                    </ul>
                                </div>
                                <div class="bt-1 border-color-1 mt-30 mb-30"></div>
                                <div class="detail-extralink">
                                     <a href='{{ url('product/'.$product->id) }}' class="btn btn-primary">Details</a>
                                    <div class="product-extra-link2">
                                       
                                    </div>
                                </div>
                                <ul class="product-meta font-xs color-grey mt-50">
                                    <li class="mb-5">Tags: <a href="#" rel="tag">Cloth</a>, <a href="#" rel="tag">Women</a>, <a href="#" rel="tag">Dress</a> </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>        
            </div>
        </div>
    </div>
