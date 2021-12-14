@php
$lang = LaravelLocalization::getCurrentLocale();
@endphp
<div>
    <div class="card mb-4">
        <header class="card-header">
            <div class="row gx-3">
                <div class="col-lg-4 col-md-6 me-auto">
                    <input type="text" wire:model="search" placeholder="@lang('seller.products search msg')" class="form-control">
                </div>
                <div class="col-md-2 col-6">
                    <div class="custom_select">
                        <select wire:model="rows" class="form-select">
                            <option selected value="1" >10</option>
                            <option value="2" > 15</option>
                            <option value="3" > 20</option>
                            <option value="4" > 30</option>
                        </select>
                    </div>
                </div>
            </div>
        </header>
        <!-- card-header end// -->
        <div class="card-body">
            <div class="row gx-3 row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-xl-4 row-cols-xxl-5">

                @foreach ($products as $product)

                    <div class="col">
                        <div class="card card-product-grid">
                            <a href="#" class="img-wrap"> <img src="{{ $product->image_path }}" alt="Product"> </a>
                            <div class="info-wrap">
                                <a href="#" class="title text-truncate">{{ $product->title }}</a>
                                <div class="price mb-2">{{ $product->price }} {{ app()->getLocale() == 'ar' ? 'ج م' : 'LE'}}</div> <!-- price.// -->
                                <a href="{{ route('sellers.edit.product',$product->id) }}" class="btn btn-sm font-sm rounded btn-brand">
                                    <i class="material-icons md-edit"></i> @lang('seller.Edit')
                                </a>
                                <form action="{{ route('sellers.destroy.product', $product->id) }}" method="post" style="display: inline-block">
                                    {{ csrf_field() }}
                                    {{ method_field('delete') }}
                                    <a href="#" class="btn btn-sm font-sm btn-light rounded delete">
                                        <i class="material-icons md-delete_forever"></i>@lang('seller.Delete')
                                    </a>
                                </form><!-- end of form -->
                                <a href="{{ route('product.details' ,$product->id) }}" target="_blank" class="btn btn-sm font-sm rounded btn-brand">
                                    <i class="material-icons md-edit"></i>@lang('seller.View')
                                </a>
                            </div>
                        </div> <!-- card-product  end// -->
                    </div>

                @endforeach

            </div> <!-- row.// -->
        </div> <!-- card-body end// -->
    </div> <!-- card end// -->
    <div class="pagination-area mt-30 mb-50">
        {{-- {{ $products->links() }} --}}
    </div>
</div>
