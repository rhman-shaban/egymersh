@extends('dashboard.layouts.master')

@section('page_content')

<section class="content-main">
    <div class="content-header">
        <div>
            <h2 class="content-title card-title">Product detilse</h2>
        </div>
        <div>
            <a href="{{ route('product_seller.index') }}" class="btn btn-primary">All Product</a>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                    <img src="{{ $product->image_path }}">
                </div>
                <div class="col-md-9">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Name store</th>
                                    <th>Name Seller</th>
                                    <th>product Admin</th>
                                    <th>category</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><a href="{{ route('seller.products',$product->store->id) }}">{{ $product->store->name }}</a></td>
                                    <td><a href="{{ route('seller.stores',$product->seller->id) }}">{{ $product->seller->name }}</a></td>
                                    <td>{{ $product->product->name }}</td>
                                    <td>{{ $product->category->name }}</td>
                                </tr>
                            </tbody>
                        </table>
                        <hr>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Price</th>
                                    <th>selling price</th>
                                    <th>tag</th>
                                    <th>created at</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $product->title }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td>{{ $product->selling_price }}</td>
                                    <td>{{ $product->tag }}</td>
                                    <td>{{ $product->created_at }}</td>
                                </tr>
                            </tbody>
                        </table>
                        <hr>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Product Color</th>
                                    <th>product Size</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                    	@foreach ($product_color as $color)
                                    		<div class="btn" style="background-color: {{ $size->product_color->color }}"></div>
                                    	@endforeach
                                    </td>
                                    <td>
                                    	@foreach ($product_size as $size)
                                    		{{ $size->size->name }}
                                    	@endforeach
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <hr>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Order Count</th>
                                    <th>Totle Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $product->count_order }}</td>
                                    <td>{{ $product->sub_totle }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div> <!-- .col// -->
            </div> <!-- .row // -->
        </div> <!-- card body .// -->
    </div> <!-- card .// -->
</section>

@endsection