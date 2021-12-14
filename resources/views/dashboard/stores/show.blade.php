@extends('dashboard.layouts.master')

@section('page_content')

<section class="content-main">
    <div class="content-header">
        <div>
            {{-- <h2 class="content-title card-title">Stores</h2> --}}
        </div>
        <div>
            {{-- <a href="{{ route('stores.create') }}" class="btn btn-primary btn-sm rounded">Add new Admin</a> --}}
        </div>
    </div>
    @include('dashboard.layouts.messages')
    <div class="card mb-4">
        <div class="bg-primary" style="height:300px">
            <img src="{{ $store->banner_path }}" height= "300px" width="100%">
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-xl col-lg flex-grow-0" style="flex-basis:230px">
                    <div class="img-thumbnail shadow w-100 bg-white position-relative text-center rounded-circle" style="height:200px;margin-top:-120px">
                        <img src="{{ $store->logo_path }}" class="img-fluid rounded-circle" alt="Store Logo">
                    </div>
                </div> <!--  col.// -->
                <div class="col-xl col-lg">
                    <h3> {{ $store->name }} </h3>
                    <p>{{ $store->bio }}</p>
                </div> <!--  col.// -->
                <div class="col-xl-4 text-md-end">
                    <a href="{{ route('store.seller',$store->id) }}" target="_blank" class="btn btn-primary"> View Store <i class="material-icons md-launch"></i> </a>
                </div>
                <select class="form-select w-auto d-inline-block" id="storeActive">
                    <option data-value="1" data-id="{{ $store->id }}" {{ $store->active == 1 ? 'selected' : '' }}>@lang('seller.Active')</option>
                    <option data-value="0" data-id="{{ $store->id }}" {{ $store->active == 0 ? 'selected' : '' }}>@lang('seller.Inactive')</option>
                </select> <!--  col.// -->
            </div> <!-- card-body.// -->
            <hr class="my-4">
            <div class="row g-4">
                <div class="col-md-12 col-lg-4 col-xl-2">
                    <article class="box">
                        <p class="mb-0 text-muted">Total Product:</p>
                        <h5 class="text-success"> {{ $store->product->count() }} </h5>

                        <p class="mb-0 text-muted">Total sales:</p>
                        <h5 class="text-success">0 LE</h5>
                        <p class="mb-0 text-muted">Revenue:</p>
                        <h5 class="text-success mb-0">0 LE </h5>
                    </article>
                </div> <!--  col.// -->


            </div> <!--  row.// -->
        </div> <!--  card-body.// -->
    </div> <!--  card.// -->
    <div class="card mb-4">
        <div class="card-body">
            <h5 class="card-title">Products by seller</h5>
            <div class="row">

               @foreach ($store->product as $product)
                   <div class="col-xl-3 col-lg-3 col-md-6">
                    <div class="card card-product-grid">
                        <a href="{{ route('product.details' ,$product->id) }}" target="_blank" class="img-wrap"> <img src="{{ $product->image_path }}" alt="Product"> </a>
                        <div class="info-wrap">
                          <a href="{{ route('product.details' ,$product->id) }}" target="_blank"  class="title">{{ $product->title }}</a>
                          <form action="{{ route('sellers.destroy.product', $product->id) }}" method="post" style="display: inline-block; float:right">
                            {{ csrf_field() }}
                            {{ method_field('delete') }}
                            <a href="#" class="btn btn-sm font-sm btn-light rounded delete">
                              <i class="fas fa-trash"></i>
                            </a>
                          </form>
                            <div class="price mt-2">{{ $product->price }} {{ app()->getLocale() == 'ar' ? 'ج م' : 'LE'}}</div> <!-- price.// -->
                            <div class="price mt-1" style="color:green"> {{ $product->selling_price }}  {{ app()->getLocale() == 'ar' ? 'ج م' : 'LE'}}

                            </div> <!-- price-wrap.// -->

                        </div>
                    </div> <!-- card-product  end// -->
                </div> <!-- col.// -->
               @endforeach


            </div> <!-- row.// -->
        </div> <!--  card-body.// -->
    </div> <!--  card.// -->
{{--     <div class="pagination-area mt-30 mb-50">
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-start">
                <li class="page-item active"><a class="page-link" href="#">01</a></li>
                <li class="page-item"><a class="page-link" href="#">02</a></li>
                <li class="page-item"><a class="page-link" href="#">03</a></li>
                <li class="page-item"><a class="page-link dot" href="#">...</a></li>
                <li class="page-item"><a class="page-link" href="#">16</a></li>
                <li class="page-item"><a class="page-link" href="#"><i class="material-icons md-chevron_right"></i></a></li>
            </ul>
        </nav>
    </div> --}}

</section>


</section> <!-- content-main end// -->
@endsection


@section('scripts')


@endsection
