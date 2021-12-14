@extends('site.layouts.master')
@section('page_title')
@lang('title.Cart')
@endsection
@section('page_content')

<main class="main">
    <section class="mt-50 mb-50">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table shopping-summery text-center clean">
                            <thead>
                                <tr class="main-heading">
                                    <th scope="col">@lang('cart.Product')</th>
                                    <th scope="col">@lang('cart.Name')</th>
                                    <th scope="col">@lang('cart.Color')</th>
                                    <th scope="col">@lang('cart.Size')</th>
                                    <th scope="col">@lang('cart.Price')</th>
                                    <th scope="col">@lang('cart.Quantity')</th>
                                    <th scope="col">@lang('cart.Subtotal')</th>
                                    <th scope="col" style="color:#088178">@lang('cart.Remove')</th>
                                </tr>
                            </thead>
                            <tbody>

                               @if (session()->has('cart_color'))
                               @php
                                   $ttole = 0;
                               @endphp
                                    @foreach (session()->get('cart_color') as $color)
                                    @foreach (Cart::content() as $products)


                                        @if ($color['product_id'] == $products->model->id)

                                            <tr class="delete-product-{{ $products->id }}">
                                                <td class="image product-thumbnail">
                                                    <img src="{{ $products->model->image_path }}" alt="#">
                                                </td>
                                                <td class="product-des product-name">
                                                    <h5 class="product-name">
                                                        <a href="{{ route('product.details',$products->id) }}">{{ $products->model->title }}</a>
                                                    </h5>
                                                </td>
                                                <td class="product-des product-name">
                                                    <ul class="list-filter color-filter">
                                                        @if (session()->has('cart_color'))
                                                            @foreach (session()->get('cart_color') as $colorr)

                                                                @if ($color['rand'] == $colorr['rand'])

                                                                    <li>
                                                                        <a href="#" data-color="Red">
                                                                            <span class="product-color-red"
                                                                            style="background-color: {{ $colorr['color'] }}"></span>
                                                                        </a>
                                                                    </li>

                                                                @endif

                                                            @endforeach
                                                        @endif
                                                    </ul>
                                                </td>
                                                <td class="product-des product-name">
                                                    @if (session()->has('cart_color'))

                                                        {{ $color['size'] }}

                                                    @endif
                                                </td>
                                                   <td class="price" data-title="Price"><span>{{ $products->price }}</span></td>
                                                   <td class="text-center" data-title="Stock">
                                                    <div class="detail-qty border radius  m-auto">
                                                        <a href="#" class="qty-down product-quntty-down"
                                                           data-rowid="{{ $products->rowId }}"
                                                           data-rand-id="{{ $color['rand'] }}"
                                                           data-id="{{ $products->id }}">
                                                            <i class="fi-rs-angle-small-down"></i>
                                                        </a>
                                                        <span class="qty-val" id="product-quntty-{{ $color['rand'] }}">
                                                            {{ $color['quantity'] }}
                                                        </span>
                                                        <a href="#" class="qty-up product-quntty-up"
                                                           data-rowid="{{ $products->rowId }}"
                                                           data-rand-id="{{ $color['rand'] }}"
                                                           data-id="{{ $products->id }}">
                                                            <i class="fi-rs-angle-small-up"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                                <td class="text-right" data-title="Cart">
                                                    <span id="subtotal-{{ $color['rand'] }}" class="new-price">

                                                        {{ number_format($color['quantity'] * $products->price,2) }}

                                                    </span>
                                                </td>
                                                <td class="action" data-title="Remove">
                                                    <a href="#" class="text-muted removal-product" data-id="{{ $products->id }}" data-rowid="{{ $products->rowId }}">
                                                        <i class="fi-rs-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <div class="d-none">
                                                {{ $ttole += $color['quantity'] * $products->price }}
                                            </div>
                                        @endif

                                    @endforeach
                                    @endforeach
                                @endif

                            </tbody>
                        </table>
                    </div>
                <div class="cart-action text-{{ app()->getLocale() == 'ar' ? 'start' : 'end'}}">
                    @auth('seller')

                        <a href="{{ route('checkout.index') }}" class="btn col-12 col-lg-4">
                            <i class="fi-rs-box-alt mx-2"></i>@lang('cart.Proceed To Checkout')
                        </a>

                    @else

                        <a href="{{ route('user.login_form') }}" class="btn col-12 col-lg-4">
                            <i class="fi-rs-box-alt mx-2"></i> @lang('cart.Login')
                        </a>

                    @endauth
                </div>
                    <div class="divider center_icon mt-50 mb-50"><i class="fi-rs-fingerprint"></i></div>
                    <div class="row mb-50">
                        <div class="col-lg-6 col-md-12">

                            @if (session()->has('coupon_value'))

                            <div class="col-lg-12 col-md-12">
                                <div class="border p-md-4 p-30 border-radius cart-totals">
                                    <div class="heading_s1 mb-3">
                                        <h4>@lang('cart.Discount Coupon')</h4>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td class="cart_total_label">@lang('cart.Coupon name')</td>
                                                    <td class="cart_total_amount">
                                                        <span class="font-lg fw-900 text-brand" id="">{{ session()->get('coupon_name') }}</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="cart_total_label">@lang('cart.Discount')</td>
                                                    <td class="cart_total_amount">
                                                        {{ session()->get('coupon_value') }}
                                                        {{ app()->getLocale() == 'ar' ? 'ج م' : 'LE'}}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="cart_total_label">@lang('cart.End date')</td>
                                                    <td class="cart_total_amount">
                                                            <span class="">{{ session()->get('end') }}</span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="text-end">
                                      <a href="#" class=" mx-4 col-4 col-lg-4 delete-coupon" ><span class="text-style-1"><i class="fa fa-trash mx-2"></i>@lang('cart.Remove')</span> </a>
                                    </div>
                                </div>
                            </div>

                            @else

                            <div class="mb-30 mt-50">
                                <div class="heading_s1 mb-3">
                                    <h4>@lang('cart.Discount Coupon')</h4>
                                </div>
                                <div class="total-amount">
                                    <div class="left">
                                        <div class="coupon">
                                            <form action="#" target="_blank">
                                                <div class="form-row row justify-content-center">
                                                    <div class="form-group col-lg-6">
                                                        <input class="font-medium" name="coupon" id="product-coupon" placeholder="@lang('cart.Enter coupon name')">
                                                    </div>
                                                    <div class="form-group col-lg-6">
                                                        <button class="btn  btn-sm coupon-product"><i class="fi-rs-label mx-2"></i>@lang('cart.Apply')</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @endif

                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="border p-md-4 p-30 border-radius cart-totals">
                                <div class="heading_s1 mb-3">
                                    <h4>@lang('cart.Cart Summary')</h4>
                                </div>
                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td class="cart_total_label">@lang('cart.Subtotal')</td>
                                                <td class="cart_total_amount">
                                                    <span class="font-lg fw-900 text-brand cart-subtotal">
                                                        @if (session()->has('cart_color'))
                                                        {{ number_format(preg_replace('/,/', '', $ttole),2) }} {{ app()->getLocale() == 'ar' ? 'ج م' : 'LE'}}
                                                        @else
                                                        0
                                                        @endif
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="cart_total_label">@lang('cart.Coupon discount')</td>
                                                <td class="cart_total_amount"><i class="ti-gift mx-2"></i>
                                                    @if (session()->has('coupon_value'))

                                                        {{ session()->get('coupon_value') }}
                                                        {{ app()->getLocale() == 'ar' ? 'ج م' : 'LE'}}

                                                    @else

                                                        @lang('cart.No coupon applied')

                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="cart_total_label">@lang('cart.Total')</td>
                                                <td class="cart_total_amount">
                                                    <strong>
                                                        <span class="font-xl fw-900 text-brand cart-coupon">
                                                            @if (session()->has('coupon_value'))

                                                                <span class="cart-coupon">
                                                                    @if (session()->has('cart_color'))
                                                                        {{ number_format(preg_replace('/,/', '', $ttole) - session()->get('coupon_value'),2) }}
                                                                    @else
                                                                        0
                                                                    @endif
                                                                </span>

                                                            @else

                                                                <span class="cart-subtotal">
                                                                    @if (session()->has('cart_color'))
                                                                        {{ number_format(preg_replace('/,/', '', $ttole),2) }}
                                                                    @else
                                                                        0
                                                                    @endif
                                                                </span>

                                                            @endif
                                                            {{ app()->getLocale() == 'ar' ? 'ج م' : 'LE'}}
                                                        </span>
                                                    </strong>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                @auth('seller')

                                    <div class="text-{{ app()->getLocale() == 'ar' ? 'start' : 'end'}}">

                                        <a href="{{ route('checkout.index') }}" class="btn col-12 col-lg-7 ">
                                            <i class="fi-rs-box-alt mx-2"></i>@lang('cart.Proceed To Checkout')
                                        </a>

                                    </div>

                                @else

                                    <div class="text-{{ app()->getLocale() == 'ar' ? 'start' : 'end'}}">

                                        <a href="{{ route('user.login_form') }}" class="btn col-12 col-lg-4">
                                            <i class="fi-rs-box-alt mx-2"></i>@lang('cart.Login')
                                        </a>

                                    </div>

                                @endauth
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
