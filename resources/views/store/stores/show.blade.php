@extends('store.layouts.master')

@section('page_content')

<section class="content-main">
    <div class="content-header">
        <div>
            <h2 class="content-title card-title">{{ $store->name }}</h2>
        </div>
        <a href="{{ url('myStore/stores/create') }}" class="btn btn-primary btn-sm rounded">
            Create New Store
        </a>
    </div>
    <div class="card mb-4">
        <img src="{{ Storage::url('stores/'.$store->banner) }}" style="height:300px" width="100%">
        <div class="card-body">
            <div class="row">
                <div class="col-xl col-lg flex-grow-0" style="flex-basis:230px">
                    <div class="img-thumbnail shadow w-100 bg-white position-relative text-center" style="height:190px; width:200px; margin-top:-120px">
                        <img src="{{ Storage::url('stores/'.$store->logo) }}" class="center-xy img-fluid" alt="Logo Brand">
                    </div>
                </div> <!--  col.// -->
                <div class="col-xl col-lg">
                    <h3>
                        <a href="{{ route('store.seller',$store->id) }}">
                            {{ $store->name }}
                        </a>
                    </h3>
                    {{-- <a href="{{ route('store.seller',$store->id) }}" class="text-muted">{{ $store->name }}</a> --}}

                    <p class="mb-0 text-muted">Total products: <span class="text-success">{{ $store->product->count() }}</span></p>
                </div> <!--  col.// -->
                <div class="col-xl col-lg">
                    <a href="{{ route('stores.edit',$store->id) }}" class="btn btn-primary"> Edit Store
                        <i class="material-icons md-launch"></i> 
                    </a>
                    <a href="{{ route('store.seller',$store->id) }}" class="btn btn-primary"> View live 
                        <i class="material-icons md-launch"></i> 
                    </a>

                    <form action="{{ route('stores.destroy', $store->id) }}" method="post" style="display: inline-block">
                        {{ csrf_field() }}
                        {{ method_field('delete') }}
                        <a href="#" class="btn btn-danger delete"> Delete Store
                            <i class="fa fa-trash"></i> 
                        </a>                    
                    </form><!-- end of form -->

                    <select class="form-select w-auto d-inline-block" id="storeActive">
                        <option data-value="1" data-id="{{ $store->id }}" {{ $store->active == 1 ? 'selected' : '' }}>active</option>
                        <option data-value="0" data-id="{{ $store->id }}" {{ $store->active == 0 ? 'selected' : '' }}>unactive</option>
                    </select>    
                </div>
            </div> <!-- card-body.// -->
        </div> <!--  card-body.// -->
    </div> <!--  card.// -->
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
            </div>
        </header> <!-- card-header end// -->
        <div class="card-body">
            <div class="row gx-3 row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-xl-4 row-cols-xxl-5" id="sortable">
                @foreach ($products as $product)
                    
                    <div class="col" style="position: relative;">
                        <div class="card card-product-grid">
                            <a href="#" class="img-wrap"> 
                                <img src="{{ $product->image_path }}" alt="Product" style="background-color: {{ $product->default_color }};">
                            </a>
                            <div class="info-wrap">
                                <a href="#" class="title text-truncate">{{ $product->title }}</a>
                                <div class="price mb-2">{{ $product->price }}</div> <!-- price.// -->
                                <a href="{{ route('sellers.edit.product',$product->id) }}" class="btn btn-sm font-sm rounded btn-brand">
                                    <i class="material-icons md-edit"></i> Edit
                                </a>
                                <form action="{{ route('sellers.destroy.product', $product->id) }}" method="post" style="display: inline-block">
                                    {{ csrf_field() }}
                                    {{ method_field('delete') }}
                                    <a href="#" class="btn btn-sm font-sm btn-light rounded delete"> 
                                        <i class="material-icons md-delete_forever"></i> Delete
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