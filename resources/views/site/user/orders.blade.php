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
                                        <h5>Your Orders</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Order</th>
                                                        <th>Date</th>
                                                        <th>Status</th>
                                                        <th>Total</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($orders as $order)
                                                    <tr>
                                                        <td>{{ $order->order_number }}</td>
                                                        <td> {{ $order->created_at->toFormattedDateString() }} </td>
                                                        <td>
                                                            <span class='badge' style='background-color:{{ optional($order->status)->color }};' >
                                                                {{ optional($order->status)['name_'.$lang] }}
                                                            </span>
                                                        </td>
                                                        <td> {{ $order->total_price }} LE  for {{ $order->items()->count() }} item</td>
                                                        <td><a href="{{ route('user.orders.show' , ['id'  => $order->order_number] ) }}" class="btn-small d-block">Details</a></td>
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

