@extends('site.layouts.master')
@section('page_title')
@lang('title.Checkout')
@endsection
@section('page_content')

<main class="main">
    <section class="mt-50 mb-50">
        <div class="container">

            <div class="row">
                <div class="col-12">
                    <div class="divider mt-50 mb-50"></div>
                </div>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <div class="row">
                    <div class="col-md-6 order_review">
                        <div class="mb-25">
                            <h4>@lang('checkout.Shipping Details')</h4>
                        </div>
                        <form action="{{ route('checkout.store') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <input type="text" required="required" class="form-control" name="full_name" value="{{ auth()->guard('seller')->user()->name }}" placeholder="@lang('checkout.Full Name')">
                            </div>
                            <div class="row">

                                <div class="form-group col-6">
                                    <input type="number" class="form-control" required name="phone" value="{{ auth()->guard('seller')->user()->phone }}" placeholder="@lang('checkout.Phone Number')">
                                </div>

                                <div class="form-group col-6">
                                    <select name="address_id" class="form-control" class="form-control" id="select-governorate" required>
                                        <option value="">@lang('checkout.Governorate')</option>
                                        @foreach (App\Models\Governorate::all() as $data)
                                            @if (session()->has('governorate_price'))

                                            <option value="{{ $data->id }}"
                                                data-id="{{ $data->id }}"
                                                {{ session()->get('governorate_id') == $data->id ? 'selected' : ''}}>{{ $data->name }}</option>

                                            @else

                                            <option value="{{ $data->id }}" data-id="{{ $data->id }}">{{ $data->name }}</option>
                                            @endif

                                        @endforeach
                                    </select>
                                </div>

                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" required name="addres" value="{{ auth()->guard('seller')->user()->address }}" placeholder="@lang('checkout.Full Address')">
                            </div>

                            <!-- <div class="form-group">
                                <input type="text" class="form-control" required name="notes" placeholder="@lang('checkout.Order Notes')">
                            </div> -->

                            @if (Cart::count() > 0)

                                <div class="form-group text-{{ app()->getLocale() == 'ar' ? 'start' : 'end'}}">
                                    <button class="btn btn-fill-out btn-block mt-30">@lang('checkout.Confirm Order')</button>
                                </div>

                            @endif
                        </form>
                    </div>
                <div class="col-md-6">
                    <div class="order_review">
                        <div class="mb-20">
                            <h4>@lang('checkout.Order Summary')</h4>
                        </div>
                        @if (Cart::count() > 0)

                        <div class="table-responsive order_table text-center">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th colspan="2">@lang('checkout.Product')</th>
                                        <th>@lang('checkout.Color')</th>
                                        <th>@lang('checkout.Size')</th>
                                        <th>@lang('checkout.Subtotal')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                       $ttole = 0;
                                    @endphp
                                    @foreach (session()->get('cart_color') as $color)
                                    @foreach (Cart::content() as $products)
                                        @if ($color['product_id'] == $products->model->id)
                                        <tr>
                                            <td class="image product-thumbnail">
                                                <img src="{{ $products->model->image_path }}" alt="#">
                                            </td>
                                            <td>
                                                <h5><a href="{{ route('product.details',$products->model->id) }}">
                                                    {{ $products->model->title }}</a></h5>
                                                        <span class="product-qty">@lang('checkout.Quantity') {{ $color['quantity'] }}</span>
                                            </td>
                                            <td>
                                                @if (session()->has('cart_color'))
                                                    @foreach (session()->get('cart_color') as $colorr)

                                                        @if ($color['rand'] == $colorr['rand'])

                                                            <a href="#" data-color="Red">
                                                                <span class="btn bg-border" style="background-color: {{ $colorr['color'] }}"></span>
                                                            </a>

                                                        @endif

                                                    @endforeach
                                                @endif
                                            </td>
                                            <td>
                                                @if (session()->has('cart_size'))
                                                    @foreach (session()->get('cart_size') as $size)

                                                        @if ($size['rand_color'] == $color['rand'])

                                                            {{ $size['size'] }}

                                                        @endif

                                                    @endforeach
                                                @endif
                                            </td>
                                            <td>{{ number_format($products->price * $color['quantity'],2) }}</td>

                                            <div class="d-none">
                                                {{ $ttole += $color['quantity'] * $products->price }}
                                            </div>
                                        </tr>
                                        @endif
                                    @endforeach
                                    @endforeach

                                    @if (session()->has('coupon_value'))

                                        <tr>
                                            <th colspan="3">@lang('checkout.Subtotal')</th>
                                            <td class="product-subtotal" colspan="2">
                                                {{ number_format(preg_replace('/,/', '', $ttole),2) }}
                                                {{ app()->getLocale() == 'ar' ? 'ج م' : 'LE'}}
                                            </td>
                                        </tr>

                                    @else

                                        <tr>
                                            <th colspan="3">@lang('checkout.Subtotal')</th>
                                            <td class="product-subtotal" colspan="2">
                                                {{ number_format(preg_replace('/,/', '', $ttole),2) }}
                                                {{ app()->getLocale() == 'ar' ? 'ج م' : 'LE'}}
                                            </td>
                                        </tr>

                                    @endif
                                    <tr>
                                        <th colspan="3">@lang('checkout.Coupon discount')</th>
                                        <td class="product-subtotal" colspan="2">
                                            @if (session()->has('coupon_value'))
                                                {{ session()->get('coupon_value') }}
                                                {{ app()->getLocale() == 'ar' ? 'ج م' : 'LE'}}
                                            @else
                                                @lang('cart.No coupon applied')
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th colspan="3">@lang('checkout.Shipping')</th>
                                        <td colspan="2">
                                            @if (session()->has('governorate_price'))

                                                <em class="shipping-price">{{ session()->get('governorate_price') }}</em> {{ app()->getLocale() == 'ar' ? 'ج م' : 'LE'}}

                                            @else

                                                <em class="shipping-price">@lang('checkout.Choose Governorate')</em>

                                            @endif
                                        </td>
                                    </tr>
                                    <!-- <tr>
                                        <th colspan="3">@lang('checkout.Shipping time')Shipping time</th>
                                        <td colspan="2"><em>@lang('checkout.shipping time msg')</em></td>
                                    </tr> -->
                                    <tr>
                                        <th colspan="3">@lang('checkout.Total')</th>
                                        <td colspan="2" class="product-subtotal">
                                            <span class="font-xl text-brand fw-900">
                                                @if (session()->has('coupon_value'))

                                                    <span class="cart-coupon cart-subtotal">
                                                        @if (session()->has('governorate_price'))

                                                            {{ number_format(preg_replace('/,/', '', $ttole) - session()->get('coupon_value') + session()->get('governorate_price'),2) }}

                                                        @else

                                                            {{ number_format(preg_replace('/,/', '', $ttole) - session()->get('coupon_value'),2) }}

                                                        @endif
                                                    </span>

                                                @else

                                                    <span class="cart-subtotal">
                                                        @if (session()->has('governorate_price'))

                                                            {{ number_format(preg_replace('/,/', '', $ttole) + session()->get('governorate_price'),2) }}

                                                        @else

                                                            {{ number_format(preg_replace('/,/', '', $ttole),2) }}

                                                        @endif

                                                    </span>

                                                @endif
                                            </span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="bt-1 border-color-1 mt-30 mb-30"></div>

                            @if (session()->has('coupon_value'))

                            <div class="col-lg-12 col-md-12">
                                    <div class="border p-md-4 p-30 border-radius cart-totals">
                                        <div class="heading_s1 mb-3">
                                            <h4>@lang('checkout.Discount Coupon')</h4>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                        <td class="cart_total_label">@lang('checkout.Coupon name')</td>
                                                        <td class="cart_total_amount">
                                                            <span class="font-lg fw-900 text-brand" id="">{{ session()->get('coupon_name') }}</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="cart_total_label">@lang('checkout.Discount')</td>
                                                        <td class="cart_total_amount">
                                                            <i class="ti-gift mx-1"></i>
                                                            {{ session()->get('coupon_value') }}
                                                            {{ app()->getLocale() == 'ar' ? 'ج م' : 'LE'}}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="cart_total_label">@lang('checkout.End date')</td>
                                                        <td class="cart_total_amount">
                                                            <strong>
                                                                <span class="font-xl fw-900 text-brand">{{ session()->get('end') }}</span>
                                                            </strong>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="text-end">
                                            <a href="#" class=" mx-4 col-4 col-lg-4 delete-coupon" >
                                                <span class="text-style-1"><i class="fa fa-trash mx-2"></i>@lang('cart.Remove')</span>
                                            </a>
                                        </div>
                                   </div>
                                </div>

                            @else

                                <div class="col-lg-12">
                                    <div class="toggle_info" style="margin-bottom: 27px;">
                                        <span class="text-{{ app()->getLocale() == 'ar' ? 'start' : 'end'}}">
                                            <i class="fi-rs-label mx-2 b-10 "></i>
                                            <span class="text-muted text-{{ app()->getLocale() == 'ar' ? 'start' : 'end'}}">@lang('checkout.Have a coupon?')</span>
                                            <a href="#coupon" data-bs-toggle="collapse" class="collapsed text-{{ app()->getLocale() == 'ar' ? 'start' : 'end'}}" aria-expanded="false">
                                                @lang('checkout.Click here')
                                            </a>
                                        </span>
                                    </div>
                                    <div class="panel-collapse collapse coupon_form" id="coupon">
                                        <div class="panel-body">
                                            <p class="mb-30 font-sm">@lang('checkout.Apply your coupon below!')</p>
                                            <form method="post">
                                                <div class="form-group">
                                                    <input class="font-medium" name="coupon" id="product-coupon" placeholder="@lang('checkout.Enter coupon name')">
                                                </div>
                                                <div class="form-group text-{{ app()->getLocale() == 'ar' ? 'start' : 'end'}}">
                                                    <button class="btn  btn-sm coupon-product"><i class="fi-rs-label mx-2"></i>@lang('checkout.Apply')</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                            @endif
                            {{-- end of coupon_value --}}

                        @else
                        <h2><a href="{{ url('/shop?sort_by=best_selling') }}" >@lang('checkout.Pick Some Awesome Products!')</a></h2>
                        @endif


                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
