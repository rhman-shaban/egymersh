@extends('store.layouts.master')

@section('page_content')
<section class="content-main">
    <div class="row">
        <div class="col-12">
            <div class="content-header">
                <h2 class="content-title">Edit Store</h2>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header">
                    <h4>Basic</h4>
                </div>
                <div class="card-body">
                    <form id="sellerStore" action="{{ route('stores.update',$store->id) }}" method="post" enctype="multipart/form-data">
                        
                        @csrf
                        @method('put')

                        <div class="mb-4">
                            <label class="form-label"> Store Name </label>
                            <input type="text" name="name" value="{{ $store->name }}" placeholder="Type here" class="form-control @error('name') is-invalid @enderror" id="store-name">
                            <span class="text-danger" id="name-error"></span>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="product_name" class="form-label"> Logo </label>
                            <input type="file" name="logo" placeholder="Type here" class="form-control @error('logo') is-invalid @enderror" id="store-logo">
                            <span class="text-danger" id="logo-error"></span>
                            @error('logo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="product_name" class="form-label"> Banner </label>
                            <input type="file" name="banner" placeholder="Type here" class="form-control @error('banner') is-invalid @enderror" id="store-banner">
                            <span class="text-danger" id="bio-error"></span>
                            @error('banner')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-sm-12 mb-3">
                            <label class="form-label"> Activation </label>
                            <select class="form-select" name="active" id="store-active">
                                <option value="1" {{ $store->active == 1 ? 'selected' : ''}}>active</option>
                                <option value="0" {{ $store->active == 0 ? 'selected' : ''}}>unactive</option>
                            </select>
                            <span class="text-danger" id="active-error"></span>
                        </div>

                        <div class="mb-4">
                            <label class="form-label"> Add Store Bio </label>
                            <textarea name="bio" class="form-control @error('bio') is-invalid @enderror" cols="30" rows="10">{{ $store->bio }}</textarea>
                            @error('bio')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <button class="btn btn-md rounded font-sm hover-up">Publich</button>

                    </form>
                </div>
            </div> <!-- card end// -->
        </div>
    </div>
</section> <!-- content-main end// -->
@endsection


@section('scripts')
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $( function() {
        $( "#sortable" ).sortable();

    });

    $(document).ready(function() {

        $(document).on('submit', '#sellerSto', function(e) {
            e.preventDefault();

            var formData = new FormData(this);
            var url      = $(this).attr('action');
            var method   = $(this).attr('method');
            var items    = $(this).serializeArray();

            
            $.each(items, function(index,item) {
                
                $('#store-' + item.name).removeClass('is-invalid');
                $('#' + item.name + '-error').text('');

            });//end of each

            $.ajax({    
                url: url,
                method: method,
                data: formData,
                contentType: false,
                processData: false,
                success: function(data) {
                    
                    if (data.success == 'true') {

                        location.reload();

                    }

                }, error: function(data) {

                    $.each(data.responseJSON.errors, function(name,message) {

                        $('#store-' + name).addClass('is-invalid');
                        $('#' + name + '-error').text(message);
                        
                    });//end of each
                },
            });//end of ajax

        });//end of add-product submit
          
    });
</script>

@endsection