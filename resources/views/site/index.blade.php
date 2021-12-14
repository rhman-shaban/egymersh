@extends('site.layouts.master')

@php
$lang = LaravelLocalization::getCurrentLocale();
@endphp

@section('page_title')
@lang('title.Home')
@endsection

@section('page_content')
<section class="home-slider position-relative pt-50">
	<div class="hero-slider-1 dot-style-1 dot-style-1-position-1">
		@foreach ($slides as $slide)
		<div class="single-hero-slider single-animation-wrap">
			<div class="container">
				<div class="row align-items-center slider-animated-1">
					<div class="col-lg-6 col-md-6">
						<div class="hero-slider-content-2">
							<h4 class="animated">{{ $slide['title_'.$lang] }}</h4>
							<h2 class="animated fw-900">{{ $slide['sub_title_'.$lang] }}</h2>
							<h1 class="animated fw-900 text-brand mb-4"> {{ $slide['big_title_'.$lang] }} </h1>
							{{-- 							<p class="animated">Save more with coupons & up to 70% off</p> --}}
							<a class="animated btn btn-brush btn-brush-3" href="{{ $slide->link }}"> {{ $slide['button_text_'.$lang] }} </a>
						</div>
					</div>
					<div class="col-lg-6 col-md-6">
						<div class="single-slider-img single-slider-img-1 d-flex justify-content-center align-items-center 	">
							<img class="img-responsive animated p-20" src="{{ Storage::disk('s3')->url('slides/'.$slide->image) }}" alt="EgyMerch Slider" >
						</div>
					</div>
				</div>
			</div>
		</div>
		@endforeach

	</div>
	<div class="slider-arrow hero-slider-1-arrow"></div>
</section>
<section class="bg-grey-9 section-padding">
	<div class="container pt-15 pb-25">
		<div class="tab-header">
			<ul class="nav nav-tabs" id="myTab" role="tablist">
				<li class="nav-item" role="presentation">
					<button class="nav-link active" type="button" >@lang('home.Best Selling')</button>
				</li>
			</ul>
			<a href="{{ url('/shop?sort_by=best_selling') }}" class="view-more d-none d-md-flex">@lang('home.View More')
				<i class="fi-rs-angle-double-small-{{ app()->getLocale() == 'ar' ? 'left' : 'right'}}"></i>
			</a>
		</div>
		<div class="row">
			<div class="col-lg-12 col-md-12">
				<div class="tab-content wow fadeIn animated" id="myTabContent-1">
					<div class="tab-pane fade show active" id="tab-one-1" role="tabpanel" aria-labelledby="tab-one-1">
						<div class="carausel-4-columns-cover arrow-center position-relative">
							<div class="slider-arrow slider-arrow-2 carausel-4-columns-arrow" id="carausel-4-columns-arrows"></div>
							<div class="carausel-4-columns carausel-arrow-center" id="carausel-4-columns">



									@foreach ($best_selling as $product)
									<div class="product-cart-wrap">
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
									@endforeach

								</div>
							</div>
						</div>

					</div>
					<!--End tab-content-->
				</div>
				<!--End Col-lg-9-->
			</div>
		</div>
	</section>



<section class="bg-grey-9 section-padding">
	<div class="container pt-15 pb-25">

		<div class="row">

			<div class="col-lg-12 col-md-12">
				<div class="tab-content wow fadeIn animated" id="myTabContent-1">


					<div class="tab-pane fade show active" id="tab-two-1" role="tabpanel" aria-labelledby="tab-two-1">
						<div class="carausel-4-columns-cover arrow-center position-relative">
							<div class="slider-arrow slider-arrow-2 carausel-4-columns-arrow" id="carausel-4-columns-2-arrows"></div>
							<div class="carausel-4-columns carausel-arrow-center" id="carausel-4-columns-2">
									@foreach ($best_selling as $product)
									<div class="product-cart-wrap">
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
									@endforeach
								</div>
							</div>
						</div>

					</div>

				</div>

			</div>
		</div>
	</section>





<section class="bg-grey-9 section-padding">
	<div class="container pt-15 pb-25">
		<div class="tab-header">
			<ul class="nav nav-tabs" id="myTab" role="tablist">
				<li class="nav-item" role="presentation">
					<button class="nav-link active" type="button" >@lang('home.New Arrival')  </button>
				</li>
			</ul>
			<a href="{{ url('/shop?sort_by=date') }}" class="view-more d-none d-md-flex">@lang('home.View More')
				<i class="fi-rs-angle-double-small-{{ app()->getLocale() == 'ar' ? 'left' : 'right'}}"></i>
			</a>
		</div>


	<div class="row">

		<div class="col-lg-12 col-md-12">
			<div class="tab-content wow fadeIn animated" id="myTabContent-1">

				<div class="tab-pane fade show active" id="tab-three-1" role="tabpanel" aria-labelledby="tab-three-1">
					<div class="carausel-4-columns-cover arrow-center position-relative">
						<div class="slider-arrow slider-arrow-2 carausel-4-columns-arrow" id="carausel-4-columns-3-arrows"></div>
						<div class="carausel-4-columns carausel-arrow-center" id="carausel-4-columns-3">

								@foreach ($new_products as $product)
								<div class="product-cart-wrap">
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

								@endforeach

							</div>
						</div>
					</div>
				</div>

			</div>

		</div>
	</div>
</section>

<section class="popular-categories section-padding mt-15 mb-25">
	<div class="container wow fadeIn animated">
		<h3 class="section-title mb-20"><span class="text-style-1">@lang('home.Featured Stores')</span></h3>
		<div class="carausel-6-columns-cover position-relative">
			<div class="slider-arrow slider-arrow-2 carausel-6-columns-arrow" id="carausel-6-columns-arrows"></div>
			<div class="carausel-6-columns" id="carausel-6-columns">
				@foreach ($stores as $store)
				<div class="card-1">
					<figure class=" img-hover-scale overflow-hidden">
						<a href="{{ url('store/'.$store->id) }}">
							<img src="{{ $store->logo_path }}" class="img-fluid rounded-circle" alt="Store Logo">
						</a>
					</figure>
					<h5><a href="{{ url('store/'.$store->id) }}">{{ $store->name }}</a></h5>
					<h6 class="mb-2 text-muted">@lang('home.Products') <span style="color:#088178">{{ $store->product->count() }}</span></h6>
				</div>
				@endforeach
			</div>
		</div>
	</div>
</section>



<!--
<section id="testimonials" class="section-padding">
	<div class="container pt-25">
		<div class="row mb-50">
			<div class="col-lg-12 col-md-12 text-center">
				<h6 class="mt-0 mb-10 text-uppercase  text-brand font-sm wow fadeIn animated">some facts</h6>
				<h2 class="mb-15 text-grey-1 wow fadeIn animated">Take a look what<br> our clients say about us</h2>
				<p class="w-50 m-auto text-grey-3 wow fadeIn animated">At vero eos et accusamus et iusto odio dignissimos ducimus quiblanditiis praesentium. ebitis nesciunt voluptatum dicta reprehenderit accusamus</p>
			</div>
		</div>
		<div class="row align-items-center">



			@foreach ($reviews as $review)
			<div class="col-md-6 col-lg-4">
				<div class="hero-card box-shadow-outer-6 wow fadeIn animated mb-30 hover-up d-flex">
					<div class="hero-card-icon icon-left-2 hover-up ">
						<img width='100' height="100" class="btn-shadow-brand hover-up border-radius-5 bg-brand-muted" src="{{ asset('site_assets/assets/imgs/2048px-User_icon_2.svg.png') }}" alt="">
					</div>
					<div class="pl-30">
						<h5 class="mb-5 fw-500">
							{{ optional($review->user)->name }}
						</h5>

						<p class="text-grey-3">"{{ $review->comment }}"</p>
					</div>
				</div>
			</div>
			@endforeach
		</div>
	</div>
</section>
-->
@endsection
