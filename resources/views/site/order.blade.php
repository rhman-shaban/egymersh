@extends('site.layouts.master')

@section('page_content')

<main class="main">
    {{-- <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="index.html" rel="nofollow">Home</a>
                <span></span> Shop
                <span></span> Checkout
            </div>
        </div>
    </div> --}}
    <section class="mt-50 mb-50">
        <div class="container">
         
            <div class="row">
                <div class="col-12">
                    <div class="divider mt-50 mb-50"></div>
                </div>
            </div>
            <div class="row">
                    <div class="col-md-6 order_review">
                        <div class="mb-25">
                            <h4>Billing Details</h4>
                        </div>
                        <form action="{{ route('checkout.store') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="full_name" value="{{ auth()->guard('seller')->user()->name }}" placeholder="Full name">
                            </div>
                            <div class="row">

                                <div class="form-group col-6">
                                    <input type="phone" name="phone" value="{{ auth()->guard('seller')->user()->phone }}" placeholder="Enter phone">
                                </div>

                                <div class="form-group col-6">    
                                    <select class="form-control" id="select-governorate">
                                        <option>Select Governorate</option>
                                        @foreach (App\Models\Governorate::all() as $data)

                                            <option value="{{ $data->id }}" data-id="{{ $data->id }}">{{ $data->name }}</option>

                                        @endforeach
                                    </select>
                                </div>
                                {{-- <div class="form-group col-6">
                                    <input type="text" name="notes" placeholder="Enter governorate">
                                </div> --}}
                            </div>

                            <div class="form-group">
                                <input type="text" name="addres" value="{{ auth()->guard('seller')->user()->address }}" placeholder="Enter Address">
                            </div>


                            {{-- <div class="form-group">
                                <input type="text" name="order_number" placeholder="Phone *">
                            </div>

                            <div class="form-group">
                                <input type="text" name="full_name" placeholder="Enter full name">
                            </div> --}}


                            {{-- <div class="form-group">
                                <div class="checkbox">
                                    <div class="custome-checkbox">
                                        <input class="form-check-input" type="checkbox" id="createaccount">
                                        <label class="form-check-label label_info" data-bs-toggle="collapse" href="#collapsePassword" data-target="#collapsePassword" aria-controls="collapsePassword" for="createaccount"><span>Create an account?</span></label>
                                    </div>
                                </div>
                            </div> --}}
                            {{-- <div class="toggle_info" style="margin-bottom: 27px;">
                                <span><i class="fi-rs-user mr-10 mb-15"></i><span class="text-muted">Already have an account?</span> <a href="#loginform" data-bs-toggle="collapse" class="collapsed" aria-expanded="false">Click here to login</a></span>
                            </div> --}}
                            <div class="panel-collapse collapse login_form" id="loginform">
                                <div class="panel-body">
                                    <p class="mb-30 font-sm">If you have shopped with us before, please enter your details below. If you are a new customer, please proceed to the Billing &amp; Shipping section.</p>
                                    {{-- <form method="post"  action="{{ route('user.login') }}"> --}}
                                        {{-- @csrf --}}
                                        {{-- @method('post') --}}

                                        <div class="form-group">
                                            {{-- <input type="text" name="email" placeholder="Username Or Email" value="{{ old('email') }}"> --}}
                                            @error('email')
                                                <p class="text-danger" > {{ $message }} </p>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            {{-- <input type="password" name="password" placeholder="Password"> --}}
                                            @error('password')
                                                <p class="text-danger" > {{ $message }} </p>
                                            @enderror
                                        </div>
                                        <div class="login_footer form-group">
                                            <div class="chek-form">
                                                <div class="custome-checkbox">
                                                    <input class="form-check-input" type="checkbox" id="remember" value="">
                                                    <label class="form-check-label" for="remember"><span>Remember me</span></label>
                                                </div>
                                            </div>
                                            <a href="#">Forgot password?</a>
                                        </div>
                                        <div class="form-group">
                                            <button class="btn btn-md">Log in</button>
                                        </div>
                                    {{-- </form> --}}
                                </div>
                            </div>

                            <div id="collapsePassword" class="form-group create-account collapse in">
                                {{-- <input required="" type="password" placeholder="Email" name="Email">
                                <input required="" style="margin-top: 10px;" type="password" placeholder="Password" name="password"> --}}
                            </div>

                            <div class="ship_detail">
                             
                                <div id="collapseAddress" class="different_address collapse in">
                                    <div class="form-group">
                                        {{-- <input type="text" required="" name="fname" placeholder="First name *"> --}}
                                    </div>
                                    <div class="form-group">
                                        {{-- <input type="text" required="" name="lname" placeholder="Last name *"> --}}
                                    </div>
                                    <div class="form-group">
                                        {{-- <input required="" type="text" name="cname" placeholder="Company Name"> --}}
                                    </div>
                                    <div class="form-group">
                                        {{-- <input type="text" name="billing_address" required="" placeholder="Address *"> --}}
                                    </div>
                                    <div class="form-group">
                                        {{-- <input type="text" name="billing_address2" required="" placeholder="Address line2"> --}}
                                    </div>
                                    <div class="form-group">
                                        {{-- <input required="" type="text" name="city" placeholder="City / Town *"> --}}
                                    </div>
                                    <div class="form-group">
                                        {{-- <input required="" type="text" name="state" placeholder="State / County *"> --}}
                                    </div>
                                    <div class="form-group">
                                        {{-- <input required="" type="text" name="zipcode" placeholder="Postcode / ZIP *"> --}}
                                    </div>
                                </div>

                            </div>
                            {{-- <div class="mb-20">
                                <h5>Additional information</h5>
                            </div>
                            <div class="form-group mb-30">
                                <textarea rows="5" name="additional" placeholder="Order notes"></textarea>
                            </div> --}}
                            {{-- <div class="form-group mb-30">
                                <textarea rows="5" placeholder="Order notes"></textarea>
                            </div> --}}
                            {{-- <div class="form-group">
                                <button class="btn btn-md">Submit</button>
                            </div> --}}
                            
                            {{-- <div class="payment_method">
                                <div class="mb-25">
                                    <h5>Payment</h5>
                                </div>
                                <div class="payment_option">
                                    
                                    <div class="custome-radio">
                                        <input class="form-check-input" required="" type="radio" name="payment_option" id="exampleRadios4" checked="">
                                        <label class="form-check-label" for="exampleRadios4" data-bs-toggle="collapse" data-target="#checkPayment" aria-controls="checkPayment">Cach on delivery</label>
                                        <div class="form-group collapse in" id="checkPayment">
                                            <p class="text-muted mt-5">Please send your cheque to Store Name, Store Street, Store Town, Store State / County, Store Postcode. </p>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div> --}}
                            <div class="form-group">
                                <button class="btn btn-fill-out btn-block mt-30">Place Order</button>
                            </div>
                        </form>
                    </div>
                <div class="col-md-6">
                    <div class="order_review">
                        <div class="mb-20">
                            <h4>Your Orders</h4>
                        </div>
                        <div class="table-responsive order_table text-center">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th colspan="2">Product</th>
                                        <th>color</th>
                                        <th>size</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach (Cart::content() as $products)
                                        
                                        <tr>
                                            <td class="image product-thumbnail"><img src="{{ $products->model->defult_image }}" alt="#"></td>
                                            <td>
                                                <h5><a href="{{ route('product.details',$products->model->id) }}">
                                                    {{ $products->model->title }}</a></h5> 
                                                        <span class="product-qty">quntty {{ $products->qty }}</span>
                                            </td>
                                            <td>
                                                @if (session()->has('cart_color'))
                                                    @foreach (session()->get('cart_color') as $color)

                                                        @if ($color['product_id'] == $products->model->id)
                                                            
                                                            <a href="#" data-color="Red">
                                                                <span class="btn bg-border" style="background-color: {{ $color['color'] }}"></span>
                                                            </a>

                                                        @endif
                                                        
                                                    @endforeach
                                                @endif
                                            </td>
                                            <td>
                                                @if (session()->has('cart_size'))
                                                    @foreach (session()->get('cart_size') as $size)

                                                        @if ($size['product_id'] == $products->model->id)
                                                            
                                                            {{ $size['size'] }}
                                                            
                                                        @endif
                                                        
                                                    @endforeach
                                                @endif
                                            </td>
                                            <td>{{ number_format($products->price * $products->qty,2) }}</td>
                                        </tr>

                                    @endforeach

                                    @if (session()->has('coupon_value'))

                                        <tr>
                                            <th>SubTotal</th>
                                            <td class="product-subtotal" colspan="2">
                                                {{ number_format(preg_replace('/,/', '', Cart::subtotal()),2) }}
                                                {{ app()->getLocale() == 'ar' ? 'ج م' : 'LE'}}
                                            </td>
                                        </tr>
                                        
                                    @else

                                        <tr>
                                            <th>Coupon discount</th>
                                            <td class="product-subtotal" colspan="2">
                                                {{ number_format(preg_replace('/,/', '', Cart::subtotal()),2) }}
                                                0 {{ app()->getLocale() == 'ar' ? 'ج م' : 'LE'}}
                                            </td>
                                        </tr>

                                    @endif
                                    @if (session()->has('coupon_value'))
                                        
                                    @else
                                    <tr>
                                        <th>Coupon discount</th>
                                        <td class="product-subtotal" colspan="2">
                                            {{ session()->get('coupon_value') }}
                                            0 {{ app()->getLocale() == 'ar' ? 'ج م' : 'LE'}}
                                        </td>
                                    </tr>
                                    @endif
                                    <tr>
                                        <th>Shipping</th>
                                        <td colspan="2">
                                            @if (session()->has('price'))

                                                <em class="shipping-price">{{ session()->get('price') }}</em>
                                                
                                            @else

                                                <em class="shipping-price">Choose governorate</em>

                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Shipping time</th>
                                        <td colspan="2"><em>4 to 10 business days</em></td>
                                    </tr>
                                    <tr>
                                        <th>Total</th>
                                        <td colspan="2" class="product-subtotal">
                                            <span class="font-xl text-brand fw-900">
                                                @if (session()->has('coupon_value'))

                                                    @if (session()->has('price'))

                                                        {{ number_format(preg_replace('/,/', '', Cart::subtotal()) + session()->get('price') - session()->get('coupon_value'),2) }}

                                                    @else

                                                        {{ number_format(preg_replace('/,/', '', Cart::subtotal()) - session()->get('coupon_value'),2) }}

                                                    @endif

                                                @else

                                                    @if (session()->has('price'))

                                                        {{ number_format(preg_replace('/,/', '', Cart::subtotal()) + session()->get('price'),2) }}

                                                    @else

                                                        {{ number_format(preg_replace('/,/', '', Cart::subtotal()),2) }}

                                                    @endif


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
                        <div class="col-lg-12">
                            <div class="toggle_info" style="margin-bottom: 27px;">
                                <span><i class="fi-rs-label mr-10 b-10 "></i><span class="text-muted">Have a coupon?</span> <a href="#coupon" data-bs-toggle="collapse" class="collapsed" aria-expanded="false">Click here to enter your code</a></span>
                            </div>
                            <div class="panel-collapse collapse coupon_form" id="coupon">
                                <div class="panel-body">
                                    <p class="mb-30 font-sm">If you have a coupon code, please apply it below.</p>
                                    <form method="post">
                                        <div class="form-group">
                                            <input class="font-medium" name="coupon" id="product-coupon" placeholder="Enter Your Coupon">
                                        </div>
                                        <div class="form-group">
                                            <button class="btn  btn-sm coupon-product"><i class="fi-rs-label mr-10"></i>Apply</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection

@push('sellersRegister')

<script type="text/javascript">
    $(document).ready(function() {

        $(document).on('change','#select-governorate',function(e) {
            e.preventDefault();

            var $option      = $(this).find(":selected");
            var id           = $option.data('id');
            var method       = 'get';
            
            $.ajax({
                url: 'governorate_shipping/'+id,
                method: method,
                success: function (data) {

                    $('.shipping-price').empty('');

                    if (data.length < 0) {

                        $('.shipping-price').html('0');

                    } else {

                        $('.shipping-price').html(data.price);
                    }

                }
            });
            
        });//end of 
    
    });//end of document ready function
</script>

@endpush