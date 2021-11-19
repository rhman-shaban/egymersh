@extends('dashboard.layouts.master')

@section('page_content')


<section class="content-main">
    <div class="content-header">
        <div>
            <h2 class="content-title card-title">Products grid</h2>
            <p>Lorem ipsum dolor sit amet.</p>
        </div>
    </div>
    <div class="card mb-4">
        <header class="card-header">
            <div class="row gx-3">
                <div class="col-lg-8 col-md-6 me-auto">
                    <form action="{{ route('all_product_seller.index') }}" method="get">

                        <div class="row">

                            <div class="col-md-4">
                                <input type="text" name="search" class="form-control" placeholder="@lang('dashboard.search')" value="{{ request()->search }}">
                            </div>

                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> </button>
                            </div>

                        </div>
                    </form><!-- end of form -->
                </div>
                <div class="col-lg-2 col-6 col-md-3">
                    <select class="form-select">
                        <option>All category</option>
                        <option>Electronics</option>
                        <option>Clothings</option>
                        <option>Something else</option>
                    </select>
                </div>
                <div class="col-lg-2 col-6 col-md-3">
                    <select class="form-select">
                        <option>Latest added</option>
                        <option>Cheap first</option>
                        <option>Most viewed</option>
                    </select>
                </div>
            </div>
        </header>
        <div class="card-body">
            <div class="row gx-3 row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-xl-4 row-cols-xxl-5">

                @foreach ($product_seller as $product)

                    <div class="col">
                        <div class="card card-product-grid">
                            <a href="#" class="img-wrap"> <img src="{{ $product->image_path }}" alt="Product"> </a>
                            <div class="info-wrap">
                                <a href="#" class="title text-truncate">{{ $product->title }}</a>
                                <div class="price mb-2">{{ $product->price }}</div> <!-- price.// -->
                                <a href="#" class="btn btn-sm font-sm rounded btn-brand">
                                    <i class="material-icons md-edit"></i> view
                                </a>
                                <a href="#" class="btn btn-sm font-sm btn-light rounded">
                                    <i class="material-icons md-delete_forever"></i> Delete
                                </a>
                            </div>
                        </div> <!-- card-product  end// -->
                    </div> <!-- col.// -->
                    
                @endforeach

            </div> <!-- row.// -->
        </div> <!-- card-body end// -->
    </div> <!-- card end// -->
    <div class="pagination-area mt-30 mb-50">
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
    </div>
</section>

@endsection

@section('scripts')

@endsection
