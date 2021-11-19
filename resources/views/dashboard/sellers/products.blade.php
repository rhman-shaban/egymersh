@extends('dashboard.layouts.master')

@section('page_content')

<section class="content-main">
    <div class="content-header">
        <div>
            <h2 class="content-title card-title">Products grid</h2>
        </div>
    </div>
    <div class="card mb-4">
        <header class="card-header">
            <div class="row gx-3">
                <div class="col-lg-4 col-md-6 me-auto">
                    <input type="text" placeholder="Search..." class="form-control">
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
        </header> <!-- card-header end// -->
        <div class="card-body">
            <div class="row gx-3 row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-xl-4 row-cols-xxl-5">
                
                @if ($products->count() > 0)
                        
                        @foreach ($products as $product)

                        <div class="col">
                            <div class="card card-product-grid">
                                <a href="#" class="img-wrap"> <img src="{{ $product->image_path }}" alt="Product"> </a>
                                <div class="info-wrap">
                                    <a href="#" class="title text-truncate">{{ $product->title }}</a>
                                    <div class="price mb-2">{{ $product->price }} {{ app()->getLocale() == 'ar' ? 'ج م' : 'LE'}}</div> <!-- price.// -->
                                    <form action="{{ route('sellers.destroy.product', $product->id) }}" method="post" style="display: inline-block">
                                        @csrf
                                        @method('delete')
                                        <a href="#" class="btn btn-sm font-sm btn-light rounded delete col-12 d-block" style="width: 200px;"> 
                                            <i class="material-icons md-delete_forever"></i> Delete
                                        </a>                    
                                    </form><!-- end of form -->
                                </div>
                            </div> <!-- card-product  end// -->
                        </div>
                            {{-- expr --}}
                        @endforeach

                    @else

                        <h2>@lang('dashboard.no_data_found')</h2>
                        
                    @endif
                
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