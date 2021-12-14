@extends('store.layouts.master')

@section('page_title')
{{ $store->name }}
@endsection

@section('page_content')

<section class="content-main">
    <div class="content-header">
        <div>
            <h2 class="content-title card-title">{{ $store->name }}</h2>
        </div>
        <a href="{{ url('myStore/stores/create') }}" class="btn btn-primary btn-sm rounded">
            @lang('seller.Create New Store')
        </a>
    </div>
    <div class="card mb-4">
        <img src="{{ $store->banner_path }}" style="height:300px" width="100%">
        <div class="card-body">
            <div class="row">
                <div class="col-xl col-lg flex-grow-0" style="flex-basis:225px">
                    <div class="img-thumbnail shadow w-100 bg-white position-relative text-center rounded-circle" style="height: 200px; margin-top:-120px">
                        <img src="{{ $store->logo_path }}" class="img-fluid rounded-circle" alt="Store Logo">
                    </div>
                </div> <!--  col.// -->
                <div class="col-xl col-lg">
                    <h3>
                        <a href="{{ route('store.seller',$store->id) }}" target="_blank">
                            {{ $store->name }}
                        </a>
                    </h3>

                    <p class="mb-0 text-muted">@lang('seller.Total products') <span class="text-success">{{ $store->product->count() }}</span></p>
                </div> <!--  col.// -->
                <div class="col-xl col-lg">
                    <a href="{{ route('stores.edit',$store->id) }}" class="btn btn-primary">
                        <i class="fas fa-pen"></i>@lang('seller.Edit')
                    </a>
                    <a href="{{ route('store.seller',$store->id) }}" target="_blank" class="btn btn-primary">
                        <i class="material-icons md-launch"></i>@lang('seller.View')
                    </a>

                    <form action="{{ route('stores.destroy', $store->id) }}" method="post" style="display: inline-block">
                        {{ csrf_field() }}
                        {{ method_field('delete') }}
                        <a href="#" class="btn btn-light delete">
                            <i class="fa fa-trash mx-1"></i>@lang('seller.Delete')
                        </a>
                    </form><!-- end of form -->

                    <select class="form-select w-auto d-inline-block" id="storeActive">
                        <option data-value="1" data-id="{{ $store->id }}" {{ $store->active == 1 ? 'selected' : '' }}>@lang('seller.Active')</option>
                        <option data-value="0" data-id="{{ $store->id }}" {{ $store->active == 0 ? 'selected' : '' }}>@lang('seller.Inactive')</option>
                    </select>
                </div>
            </div> <!-- card-body.// -->
        </div> <!--  card-body.// -->
    </div> <!--  card.// -->
    <div class="card mb-4">
        <header class="card-header">
            <div class="row gx-3">
                <div class="col-lg-4 col-md-6 me-auto">
                    <input type="text" placeholder="@lang('seller.store search msg')" class="form-control">
                </div>
            </div>
        </header> <!-- card-header end// -->
        <div class="card-body">
            <div class="row gx-3 row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-xl-4 row-cols-xxl-5" id="sortable">
                @foreach ($products as $product)

                    <div class="col" style="position: relative;">
                        <div class="card card-product-grid">
                            <a href="{{ route('product.details' ,$product->id) }}" target="_blank" class="img-wrap">
                                <img src="{{ $product->image_path }}" alt="Product">
                            </a>
                            <div class="info-wrap">
                                <a href="{{ route('product.details' ,$product->id) }}" target="_blank"  class="title text-truncate">{{ $product->title }}</a>
                                <div class="price mb-2">{{ $product->price }}  {{ app()->getLocale() == 'ar' ? 'ج م' : 'LE'}}</div> <!-- price.// -->
                                <a href="{{ route('product.details' ,$product->id) }}" target="_blank" class="btn btn-sm font-sm rounded btn-brand">
                                  <i class="fas fa-eye mx-1"></i>@lang('seller.View')
                                </a>
                                <a href="{{ route('sellers.edit.product',$product->id) }}" class="btn btn-sm font-sm rounded btn-brand">
                                    <i class="fas fa-pen"></i> @lang('seller.Edit')
                                </a>
                                <form action="{{ route('sellers.destroy.product', $product->id) }}" method="post" style="display: inline-block">
                                    {{ csrf_field() }}
                                    {{ method_field('delete') }}
                                    <a href="#" class="btn btn-sm font-sm btn-light rounded delete">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </form><!-- end of form -->
                            </div>
                        </div> <!-- card-product  end// -->
                    </div> <!-- col.// -->

                @endforeach
            </div> <!-- row.// -->
        </div> <!-- card-body end// -->
    </div> <!-- card end// -->
</section> <!-- content-main end// -->
@endsection


@section('scripts')
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
  $( function() {
    $( "#sortable" ).sortable();
} );

  $(document).ready(function() {
      $('#storeActive').on('click', function(e) {
          e.preventDefault();

          var $option = $(this).find(":selected");
          var active  = $option.data('value');
          var id      = $option.data('id');
          var url     = "{{ route('update.active') }}";
          var method  = 'post';

          $.ajax({
                url: url,
                method: method,
                data: {
                    id : id,
                    active : active,
                },
                success: function(data) {

                   if (data.success == true) {

                         new Noty({
                            layout: 'topRight',
                            text: "@lang('dashboard.added_successfully')",
                            killer: true,
                            timeout: 2000,
                        }).show();
                   }

                },

            });//end of ajax

      });//end of
  });
</script>

@endsection
