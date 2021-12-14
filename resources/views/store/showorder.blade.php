@extends('store.layouts.master')
@php
$lang = LaravelLocalization::getCurrentLocale();
@endphp

@section('page_title')
@lang('title.Order Details')
@endsection

@section('page_content')
        <section class="content-main">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-50 mt-20 order-info-wrap">
                        <div class="col-md-4">
                            <article class="icontext align-items-start">
                                <span class="icon icon-sm rounded-circle bg-primary-light">
                                    <i class="text-primary material-icons md-person"></i>
                                </span>
                                <div class="text">
                                    <h6 class="mb-1">Customer</h6>
                                    <p class="mb-1">
                                        {{$orders->name}}<br>{{$orders->phone}}  <br>
                                    </p>
                                </div>
                            </article>
                        </div> <!-- col// -->
                        <div class="col-md-4">
                            <article class="icontext align-items-start">
                                <span class="icon icon-sm rounded-circle bg-primary-light">
                                    <i class="text-primary material-icons md-local_shipping"></i>
                                </span>
                                <div class="text">
                                    <h6 class="mb-1">Order info</h6>
                                    <p class="mb-1">
                                    Notes : {{ $orders->notes }}
                                    </p>
                                </div>
                            </article>
                        </div> <!-- col// -->
                        <div class="col-md-4">
                            <article class="icontext align-items-start">
                                <span class="icon icon-sm rounded-circle bg-primary-light">
                                    <i class="text-primary material-icons md-place"></i>
                                </span>
                                <div class="text">
                                    <h6 class="mb-1">Deliver to Address</h6>
                                    <p class="mb-1">
                                    {{$orders->government}}<br>{{$orders->address}}

                                </p>
                            </div>
                            </article>
                        </div> <!-- col// -->
                    </div> <!-- row // -->
                    <div class="row ">
                        <div class="col-lg-8">
                            <div class="table-responsive">
                                <td>
                                        <div id="result">
                                            <!-- Result will appear be here -->
                                        </div>
                                </td>
                                <table class="table" id="print-order-list">
                                    <thead>
                                    @php
                                        $total = 0;
                                        @endphp

                                        <tr>
                                            <th width="40%">Product</th>
                                            <th width="20%">Unit Price</th>
                                            <th width="20%">Quantity</th>
                                            <th width="20%">color</th>
                                            <th width="20%">size</th>
                                            <th width="20%" class="text-end">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            @foreach ($orders->product_order as $item)
                                            <td>
                                                <a class="itemside" href="#">
                                                    <div class="left">
                                                        <img src="{{ $item->SellerProduct->image }}" class="order-image-download" width="70" height="70" alt="Item">
                                                    </div>
                                                </a>
                                            </td>

                                            <td>{{ $item->price }}</td>


                                            <td>{{ $item->quantity }}</td>

                                            <td>
                                            <div class="col-lg-2 col-sm-2 col-4 col-status">
                                                        <span class="btn btn-sm p-3 color-front b-radius"
                                                        data-id="" style="background-color: {{ $item->color }};"></span>
                                                    </div>

                                            </td>
                                            <td>
                                            {{ $item->size }}
                                            </td>
                                            <td class="text-end">
                                            {{ number_format($item->price * $item->quantity) }}
                                            </td>
                                                                                    </tr>
                                        @endforeach
                                        <tr>
                                            <td colspan="4">

                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="col-lg-4">
                          <article >
                              <dl class="dlist">
                                  <dt>Subtotal:</dt>
                                  <dd> {{$orders->total_price}}</dd>
                              </dl>
                              <dl class="dlist">
                                  <dt>Shipping cost:</dt>
                                  <dd>{{$orders->shipping}}</dd>
                              </dl>
                              <dl class="dlist">
                                  <dt>Grand total:</dt>
                                  <dd> <b class="h5">{{number_format($orders->total_price+$orders->shipping)}}</b> </dd>
                              </dl>
                              <dl class="dlist">
                                  <dt>your profit:</dt>
                                  <dd> <b class="h5">{{$orders->profit}}</b> </dd>
                              </dl>
                              <dl class="dlist">
                                  <dt>Status</dt>
                                  <dd>{{$orders->status}}</dd>
                              </dl>
                              <dl class="dlist">
                                  <dt>Message</dt>
                                  <dd>{{$orders->message}}</dd>
                              </dl>

                          </article>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@stop
