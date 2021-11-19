@extends('site.layouts.master')

@section('page_content')

<main class="main">
    {{-- <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="index.html" rel="nofollow">Home</a>
                <span></span> Shop
                <span></span> Your Cart
            </div>
        </div>
    </div> --}}
    <section class="mt-50 mb-50">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table shopping-summery text-center clean">
                            <thead>
                                <tr class="main-heading">
                                    <th scope="col">Image</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">colors</th>
                                    <th scope="col">sizes</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Subtotal</th>
                                    <th scope="col">Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (Cart::content() as $products)
                                    
                                    <tr class="delete-product-{{ $products->id }}">
                                        <td class="image product-thumbnail">
                                            <img src="{{ $products->model->defult_image }}" alt="#">
                                        </td>
                                        <td class="product-des product-name">
                                            <h5 class="product-name">
                                                <a href="{{ route('product.details',$products->id) }}">{{ $products->model->title }}</a>
                                            </h5>
                                        </td>
                                        <td class="product-des product-name">
                                            <ul class="list-filter color-filter">
                                                @if (session()->has('cart_color'))
                                                    @foreach (session()->get('cart_color') as $color)

                                                        @if ($color['product_id'] == $products->model->id)
                                                            
                                                            <li>
                                                                <a href="#" data-color="Red">
                                                                    <span class="product-color-red" 
                                                                    style="background-color: {{ $color['color'] }}"></span>
                                                                </a>
                                                            </li>

                                                        @endif
                                                        
                                                    @endforeach
                                                @endif
                                            </ul>
                                        </td>
                                        <td class="product-des product-name">
                                            @if (session()->has('cart_size'))
                                                @foreach (session()->get('cart_size') as $size)

                                                    @if ($size['product_id'] == $products->model->id)
                                                        
                                                        {{ $size['size'] }}
                                                        
                                                    @endif
                                                    
                                                @endforeach
                                            @endif
                                        </td>
                                           <td class="price" data-title="Price"><span>{{ $products->price }}</span></td>
                                           <td class="text-center" data-title="Stock">
                                            <div class="detail-qty border radius  m-auto">
                                                <a href="#" class="qty-down product-quntty-down" data-rowid="{{ $products->rowId }}" data-id="{{ $products->id }}">
                                                    <i class="fi-rs-angle-small-down"></i>
                                                </a>
                                                <span class="qty-val" id="product-quntty-{{ $products->id }}">{{ $products->qty }}</span>
                                                <a href="#" class="qty-up product-quntty-up" data-rowid="{{ $products->rowId }}" data-id="{{ $products->id }}">
                                                    <i class="fi-rs-angle-small-up"></i>
                                                </a>
                                            </div>
                                        </td>
                                        <td class="text-right" data-title="Cart">
                                            <span id="subtotal-{{ $products->id }}" class="new-price">
                                                @if (session()->has('coupon_value'))
                                                    
                                                    {{ number_format(preg_replace('/,/', '', $products->qty * $products->price) - session()->get('coupon_value'),2) }}

                                                @else

                                                    {{ number_format($products->qty * $products->price,2) }}

                                                @endif
                                            </span>
                                        </td>
                                        <td class="action" data-title="Remove">
                                            <a href="#" class="text-muted removal-product" data-id="{{ $products->id }}" data-rowid="{{ $products->rowId }}">
                                                <i class="fi-rs-trash"></i>
                                            </a>
                                        </td>
                                    </tr>

                                @endforeach

                            </tbody>
                        </table>
                    </div>
                <div class="cart-action text-end">
                    @auth('seller')
                        
                        <a href="{{ route('checkout.index') }}" class="btn"> 
                            <i class="fi-rs-box-alt mr-10"></i> Proceed To CheckOut
                        </a>

                    @else

                        <a href="{{ route('user.login_form') }}" class="btn"> 
                            <i class="fi-rs-box-alt mr-10"></i> Login
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
                                        <h4>Cart coupon</h4>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td class="cart_total_label">coupon name</td>
                                                    <td class="cart_total_amount">
                                                        <span class="font-lg fw-900 text-brand" id="">{{ session()->get('coupon_name') }}</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="cart_total_label">Coupon value</td>
                                                    <td class="cart_total_amount">
                                                        <i class="ti-gift mr-5"></i>
                                                        {{ session()->get('coupon_value') }} 
                                                        {{ app()->getLocale() == 'ar' ? 'ج م' : 'LE'}}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="cart_total_label">Coupon end</td>
                                                    <td class="cart_total_amount">
                                                        <strong>
                                                            <span class="font-xl fw-900 text-brand">{{ session()->get('end') }}</span>
                                                        </strong>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <a href="#" class="btn btn-danger delete-coupon" style="background-color: red"> <i class="fa fa-trash mr-10"></i> Coupon delete</a>
                                </div>
                            </div>  

                            @else

                            <div class="mb-30 mt-50">
                                <div class="heading_s1 mb-3">
                                    <h4>Apply Coupon</h4>
                                </div>
                                <div class="total-amount">
                                    <div class="left">
                                        <div class="coupon">
                                            <form action="#" target="_blank">
                                                <div class="form-row row justify-content-center">
                                                    <div class="form-group col-lg-6">
                                                        <input class="font-medium" name="coupon" id="product-coupon" placeholder="Enter Your Coupon">
                                                    </div>
                                                    <div class="form-group col-lg-6">
                                                        <button class="btn  btn-sm coupon-product"><i class="fi-rs-label mr-10"></i>Apply</button>
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
                                    <h4>Cart Totals</h4>
                                </div>
                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                @if (!session()->has('coupon_value'))

                                                    <td class="cart_total_label">Cart Subtotal</td>
                                                    <td class="cart_total_amount">
                                                        <span class="font-lg fw-900 text-brand" id="cart-subtotal">
                                                            {{ Cart::subtotal() }} {{ app()->getLocale() == 'ar' ? 'ج م' : 'LE'}}
                                                        </span>
                                                    </td>
                                                    
                                                @else

                                                    <td class="cart_total_label">Cart Subtotal</td>
                                                    <td class="cart_total_amount">
                                                        <span class="font-lg fw-900 text-brand" id="cart-subtotal">
                                                            {{ number_format(preg_replace('/,/', '', Cart::subtotal()) - session()->get('coupon_value'),2) }}
                                                            {{ app()->getLocale() == 'ar' ? 'ج م' : 'LE'}}
                                                        </span>
                                                    </td>

                                                @endif
                                            </tr>
                                            <tr>
                                                <td class="cart_total_label">Coupon discount</td>
                                                <td class="cart_total_amount"> <i class="ti-gift mr-5"></i> 0 </td>
                                            </tr>
                                            <tr>
                                                <td class="cart_total_label">Total</td>
                                                <td class="cart_total_amount">
                                                    <strong>
                                                        <span class="font-xl fw-900 text-brand">
                                                            {{ Cart::subtotal() }} {{ app()->getLocale() == 'ar' ? 'ج م' : 'LE'}}
                                                        </span>
                                                    </strong>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                @auth('seller')
                                    
                                    <a href="{{ route('checkout.index') }}" class="btn"> 
                                        <i class="fi-rs-box-alt mr-10"></i> Proceed To CheckOut
                                    </a>

                                @else

                                    <a href="{{ route('user.login_form') }}" class="btn"> 
                                        <i class="fi-rs-box-alt mr-10"></i> Login
                                    </a>

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