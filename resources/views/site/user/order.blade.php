@extends('site.layouts.master')
@php
$lang = LaravelLocalization::getCurrentLocale();
@endphp
@section('page_content')
<section class="pt-150 pb-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 m-auto">
                <div class="row">
                    <div class="col-md-3">
                        <div class="dashboard-menu">
                            @include('site.user.sidebar')
                        </div>
                    </div>
                    <div class="col-md-9">
                        @include('dashboard.layouts.messages')

                        <div class="tab-content dashboard-content">
                            <div class="tab-pane fade active show" id="account-detail" role="tabpanel" aria-labelledby="account-detail-tab">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Your Order number :  <span class='text-primary'> {{ $order->order_number }} </span> Details</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table shopping-summery text-center">
                                                <tbody>
                                                    <tr>
                                                        <th> Order Number </th>
                                                        <td> {{ $order->order_number }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th> Order Date </th>
                                                        <td> {{ $order->created_at->toFormattedDateString() }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th> Order Status </th>
                                                        <td>  <span class="background-color:{{ optional($order->status)->color }}"> {{ optional($order->status)['name_'.$lang] }} </span> </td>
                                                    </tr>
                                                    <tr>
                                                        <th> Subtotal Price </th>
                                                        <td> {{ $order->total_price }} </td>
                                                    </tr>
                                                    <tr>
                                                        <th> Drlivery  Price </th>
                                                        <td> </td>
                                                    </tr>
                                                     <tr>
                                                        <th> Order Notes </th>
                                                        <td> {{ $order->notes }} </td>
                                                    </tr>
                                                     <tr>
                                                        <th> Drlivery  Address </th>
                                                        <td> {{ optional($order->address)->fullAddress() }} </td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div>

                                        <hr>
                                        <div class="table-responsive">
                                            <table class="table shopping-summery text-center">
                                                <thead>
                                                    <tr class="main-heading">
                                                        <th scope="col"></th>
                                                        <th scope="col">Product</th>
                                                        <th scope="col">Price</th>
                                                        <th scope='col'> Quantity </th>
                                                        <th scope="col">Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    @foreach ($order->items as $item)
                                                    <tr>
                                                        <td class="image product-thumbnail"><img src="{{ Storage::url('seller_products/'.optional($item->product)->image) }}" alt="#"></td>
                                                        <td class="product-des product-name">
                                                            <h5 class="product-name"><a href="shop-product-right.html"> {{ optional($item->product)->title }} </a></h5>
                                                            <p class="font-xs">Maboriosam in a tonto nesciung eget<br> distingy magndapibus.
                                                            </p>
                                                        </td>
                                                        <td class="price" data-title="Price"><span> {{ $item->price }} LE </span></td>
                                                        <td class="price" data-title="Price"><span> {{ $item->quantity }}  </span></td>
                                                        <td class="text-center" data-title="Stock">
                                                            <span class="badge font-weight-bold" style='background-color: {{ optional($order->status)->color }}' > {{ optional($order->status)['name_'.$lang] }} </span>
                                                        </td>
                                                    </tr>
                                                    @endforeach 

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endsection

