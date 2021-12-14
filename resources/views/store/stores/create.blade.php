@extends('store.layouts.master')

@section('page_title')
@lang('title.Create New Store')
@endsection


@section('page_content')
<section class="content-main">
    <div class="row">
        <div class="col-12">
            <div class="content-header">
                <h2 class="content-title">@lang('seller.Create New Store')</h2>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header">
                    <h4>@lang('seller.Store information')</h4>
                </div>
                <div class="row flex-row-reverse card-body">

                  <div class="col-lg-6">
                    <img src="{{ asset('store_assets\assets\imgs\seller-dashboard/create-store.png')}}" alt="Create Store" class="img-responsive">
                  </div>
                    <div class="col-lg-6">
                      <form id="sellerStore" action="{{ route('stores.store') }}" method="post" enctype="multipart/form-data">

                        @csrf
                        @method('post')

                        <div class="mb-4">
                            <label class="form-label">@lang('seller.Name')</label>
                            <input type="text" name="name" placeholder="@lang('seller.Type here')" class="form-control @error('name') is-invalid @enderror" id="store-name" value="{{ old('name') }}">
                            <span class="text-danger" id="name-error"></span>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="product_name" class="form-label">@lang('seller.Logo')</label>
                            <input type="file" name="logo" placeholder="@lang('seller.Type here')" class="form-control @error('logo') is-invalid @enderror" id="store-logo" value="{{ old('logo') }}">
                            <span class="text-danger" id="logo-error"></span>
                            @error('logo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="product_name" class="form-label">@lang('seller.Banner')</label>
                            <input type="file" name="banner"  class="form-control @error('banner') is-invalid @enderror" id="store-banner" value="{{ old('banner') }}">
                            <span class="text-danger" id="bio-error"></span>
                            @error('banner')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-sm-12 mb-3">
                            <label class="form-label">@lang('seller.State')</label>
                            <select class="form-select" name="active" id="store-active">
                                <option value="1">@lang('seller.Active')</option>
                                <option value="0">@lang('seller.Inactive') </option>
                            </select>
                            <span class="text-danger" id="active-error"></span>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">@lang('seller.Bio')</label>
                            <textarea name="bio" placeholder="@lang('seller.store bio plc')" class="form-control @error('bio') is-invalid @enderror" cols="30" rows="10">{{ old('bio') }}</textarea>
                            @error('bio')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        @php
                            $count_store = App\Models\Store::count();
                        @endphp
                        <div class="text-end">

                        @if ($count_store >= 3)
                            <a href="" class="btn btn-primary btn-sm rounded">@lang('seller.store max msg')</a>
                        @else
                            <button class="btn btn-md rounded font-sm hover-up">@lang('seller.Create')</button>
                        @endif
                      </div>


                    </form>
                    </div>
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

        $(document).on('submit', '#sellerStor', function(e) {
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
