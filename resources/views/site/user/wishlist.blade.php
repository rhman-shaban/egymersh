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

                    <div class="col-md-12">
                        @include('dashboard.layouts.messages')

                        <div class="tab-content dashboard-content">
                            <div class="tab-pane fade active show" id="account-detail" role="tabpanel" aria-labelledby="account-detail-tab">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Your Orders</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="col-12">
                                            <div class="table-responsive">
                                                <table class="table shopping-summery text-center">
                                                    <thead>
                                                        <tr class="main-heading">
                                                            <th scope="col" colspan="2">Product</th>
                                                            <th scope="col">Price</th>
                                                            <th scope="col">Stock Status</th>
                                                            <th scope="col">Action</th>
                                                            <th scope="col">Remove</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                        @foreach ($products as $product)

                                                        <tr>
                                                            <td class="image product-thumbnail"><img src="{{ $product->defult_image }}" alt="#"></td>
                                                            <td class="product-des product-name">
                                                                <h5 class="product-name"><a href="shop-product-right.html"> {{ $product->title }} </a></h5>
                                                            </td>
                                                            <td class="price" data-title="Price"><span> {{ optional($product->product)->price }} LE</span></td>

                                                            <td class="text-center" data-title="Stock">
                                                                <span class="color3 font-weight-bold">In Stock</span>
                                                            </td>
                                                          
                                                            <td class="text-right" data-title="Cart">
                                                                <button class="btn btn-sm"><i class="fi-rs-shopping-bag mr-5"></i>Add to cart</button>
                                                            </td>
                                                            <td class="action" data-title="Remove"  >
                                                                <form method='POST' action="{{ route('user.account.wishlist.destroy'  , ['id' => $product->id ] ) }}">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button class='btn btn-sm '> <i class="fi-rs-trash"></i> Remove </button>
                                                                </form>
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
        </div>
    </section>
    @endsection

