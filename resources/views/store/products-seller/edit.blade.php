@extends('store.layouts.master')

@section('page_title')
@lang('title.Edit Product')
@endsection

@section('page_content')
<section class="content-main">
    <div class="row">
        <div class="col-9">
            <div class="content-header">
                <h2 class="content-title">@lang('seller.Edit Product')</h2>
            </div>
        </div>

        <form action="{{ route('sellers.update.product',$product->id) }}" method="post" id="add-product" class="row" enctype="multipart/form-data">
            @csrf
            @method('patch')

            <div class="col-lg-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <h4>@lang('seller.Product Type')</h4>
                    </div>

                    <div class="card-body">

                        <div class="col-sm-12 mb-3">
                            <label class="form-label">@lang('seller.Store')</label>
                            <select id="stores" name="store_id" class="form-select">
                                @foreach (App\Models\Store::all() as $store)

                                    <option value="{{ $store->id }}" {{ $product->store_id == $store->id ? 'selected' : '' }}>
                                            {{ $store->name }}
                                    </option>

                                @endforeach
                            </select>
                        </div>

                        <div class="col-sm-12 mb-3 cat">
                            <label class="form-label">@lang('seller.Category')</label>
                            <select id="Category" name="category_id" class="form-select">
                                @foreach (App\Models\Category::all() as $category)

                                    <option data-url="{{ route('category.product',$category->id) }}"
                                            data-id="{{ $category->id }}"
                                            data-method="get"
                                            value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                            {{ $category->name_ar }}
                                    </option>

                                @endforeach
                            </select>
                        </div>

                        <div class="col-sm-12 mb-3 seller-product">
                            <label class="form-label">@lang('seller.Product')</label>
                            <select id="sellerProduct" name="product_id" class="form-select">
                                @foreach (App\Models\Product::all() as $admin_product)

                                    <option data-url="{{ route('category.product',$admin_product->id) }}"
                                            data-id="{{ $admin_product->id }}"
                                            data-method="get"
                                            value="{{ $admin_product->id }}" {{ $product->product_id == $admin_product->id ? 'selected' : '' }}>
                                            {{ $admin_product->name_ar }}
                                    </option>

                                @endforeach
                            </select>
                        </div>


                        <div class="input-upload d-non">
                            <a class="btn btn-primary btn-sm col-12" id="add-logo" onclick="document.getElementById('add-file-pro').click();">
                                <i class="fas fa-image">@lang('seller.Upload Design')</i>
                            </a>
                            <input type="file" id="add-file-pro" hidden>

                            <a class="btn btn-primary btn-sm col-12 mt-5 pt-5 d-none" id="clear-logo">
                                <i class="fas fa-image"></i>@lang('seller.Clear Design')
                            </a>
                        </div>



                        {{-- <img src="" style="width: 100px" class="img-thumbnail image-preview" alt=""> --}}

                             <div class="mt-4">
                              <strong>@lang('seller.Choose Colors')</strong>
                            </div>
                            <div class="attr-detail attr-color mb-15 my-3">
                            <div class="product-color btn-group">
                                @foreach (App\Models\ProductColor::where('product_id',$product->product_id)->get(); as $element)

                                    <label class="input-group">
                                        <span class="input-group-addon">
                                            <input type="checkbox" value="{{ $element->id }}" class="color-front" hidden name="color[]" data-id="{{ $element->id }}" checked>
                                        </span>
                                        <span class="btn btn-sm p-3 m-2 color-front color-id-{{ $element->id }}
                                         b-radius" data-id="" style="background-color:{{ $element->color }};"></span>
                                    </label>

                                @endforeach
                            </div>
                        </div>

                    </div>
                </div> <!-- card end// -->
            </div>

            <div class="col-lg-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <h4>@lang('seller.Adjust Design')</h4>
                    </div>
                    <div class="card-body">
                    <div class="product-color-image btn-group">

                        @foreach ($product_color as $color)
                            <label class="input-group">

                                <span class="input-group-addon"></span>
                                <span class="all-color-image btn btn-sm color-chang-image-product p-3 m-2 color-front color-id-{{ $color->color }}" data-id="{{ $color->id }}" style="background-color: {{ $color->color }};">

                                </span>
                            </label>

                        @endforeach
                    </div>

                        <div class="containter">
                        <!-- this part is for logos -->
                            <div class="dragContainer" style="width:550px;height: 661px;">
                              <!-- the allowable drag area -->
                              <div class="logoContainer">


                              </div>

                            </div>


                            <!-- this part is for images -->
                            <div class="imageContainer" style="width:100%">

                                <img class="base-product-image-seller-min" crossorigin="anonymous" src="{{ $product->defult_image }}" style="width:100%">

                            </div>

                            <div id="canvas-app-input"></div>

                      </div>

                    </div>
                </div> <!-- card end// -->

            </div>

           <div class="input-hiiding"></div>
           <div id="product-image-seller"></div>
           <div id="product-image-coloe"></div>


           <div class="col-lg-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <h4>@lang('seller.Product Final Info')</h4>
                    </div>
                    <div class="card-body">

                        <div class="row">
                            <div class="mb-4 col-6">
                                <label class="form-label">@lang('seller.Title')</label>
                                <input type="text" value="{{ $product->title }}" id="title" name="title" placeholder="@lang('seller.Type here')" class="form-control">
                                <span class="text-danger" id="title-error"></span>
                            </div>
                            <div class="mb-4 col-6">
                                <label class="form-label">@lang('seller.Price') <span style="color:green">( @lang('seller.Profit'): <span class="new-price">{{ $product->selling_price }}</span>)</span>@lang('seller.price sympol')</label>
                                <div class="row gx-2">
                                    <input placeholder="$" value="{{ $product->price }}" id="productPrice" name="price" min="200" max="" type="number" class="form-control">
                                    <span class="text-danger" id="price-error"></span>
                                    <input name="selling_price" id="sellingPrice" value="{{ $product->selling_price + $product->price }}" type="number" hidden>
                                </div>
                                </div>
                            </div>
                            <div class="mb-4 col-12">
                                <label class="form-label">@lang('seller.Tags')</label><br>
                                <input name='tag' id="tag" placeholder="@lang('seller.tags msg')" class="form-control" value="{{ $product->tag }}">
                                <span class="text-danger" id="tag-error"></span>
                            </div>

                            <div class="mb-4">
                                <label class="form-label">@lang('seller.Description')</label>
                                <textarea placeholder="@lang('seller.product description msg')" id="description" name="description" class="form-control" rows="4">{{ $product->description }}</textarea>
                                <span class="text-danger" id="description-error"></span>
                            </div>

                            <div class="d-flex form-check mb-5 pb-5">
                                  <input class="form-check-input" required type="checkbox" value="" id="defaultCheck1">
                                  <label class="form-check-label" for="defaultCheck1" style="margin-right:30px;margin-left:15px">
                                    @lang('seller.add product msg')
                                  </label>
                            </div>

                            @if (auth()->guard('seller')->user()->status == 'true')


                                <button class="btn btn-md col-1 rounded font-sm hover-up publich-product">@lang('seller.Save')</button>
                                {{-- <button class="btn btn-md col-1 rounded font-sm hover-up publich-product" id="add">add</button> --}}

                            @else

                                <a href="" class="btn btn-primary col-6 btn-sm rounded">@lang('seller.only active seller edit')</a>

                            @endif

                        </div>
                    </div>
                </div> <!-- card end// -->
           </div>
        </form>
    </div> <!-- end of row// -->
</section> <!-- content-main end// -->
<div id="canvas-app"></div>
<div id="canvas-app-input-image"></div>
@endsection


@section('scripts')
{{-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script> --}}
{{-- <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> --}}
<script>

    $( function() {
        $( "#sortable" ).sortable();
    });

    $(document).on('click', '#add', function(e) {
        e.preventDefault();

        swal({
            closeOnClickOutside: false,
            // buttons: false,
            timer: 3000,
        });

    });

    $(document).ready(function() {

        $('#stores').on('change', function (e) {
            e.preventDefault();

            $('.cat').removeClass('d-none');

        });//end fo on change stores


        $('#Category').on('change', function (e) {
            e.preventDefault();

            var $option      = $(this).find(":selected");
            var id           = $option.data('id');
            var url          = $option.data('url');
            var method       = $option.data('method');
            var app          = "{{ app()->getLocale() }}";

            $('#sellerProduct').empty('');
            $('.center-image').empty('');
            $('.product-color').empty('');
            $('.product-color-image').empty('');
            $('.product-image-seller').empty('');
            $('.imageContainer').empty('');
            // $('#productPrice').attr('min').val('');
            $('#productPrice').val('');

            $('.size-logo').addClass('d-none');
            $('.seller-product').addClass('d-none');
            $('.input-upload').addClass('d-none');
            $('.attr-color').addClass('d-none');

            $.ajax({
                url: url,
                method: method,
                success: function(data) {

                    console.log(data);

                    if (data.length == 0) {

                         $('#sellerProduct').append('<option>No data</option>');

                    } else {

                        $('#sellerProduct').append('<option>select product</option>');
                    }

                    $('.seller-product').removeClass('d-none');

                    if (app == 'ar') {

                        $.each(data, function(index, product) {

                             $('#sellerProduct').append('<option value="'+product.id+'" data-id="'+product.id+'">'+product.name_ar+'</option>');
                        });

                    } else {

                        $.each(data, function(index, product) {

                             $('#sellerProduct').append('<option value="'+product.id+'" data-id="'+product.id+'">'+product.name_en+'</option>');
                        });

                    }//end of if


                }//end success ajax

            });//end of ajax

        });//end fo on change Category


        $('#sellerProduct').on('change', function (e) {
            e.preventDefault();

            var $option      = $(this).find(":selected");
            var id           = $option.data('id');
            var url          = "{{ route('show.product') }}";
            var method       = 'post';

            $('.center-image').empty('');
            $('.product-image-seller').empty('');
            $('.product-color-image').empty('');

            $.ajax({
                url: url,
                method: method,
                data: {id : id},
                success: function(data) {
                    $('.seller-product').removeClass('d-none');
                    $('.input-upload').removeClass('d-none');
                    $('.attr-color').removeClass('d-none');
                    $('.size-logo').removeClass('d-none');

                    $('#productPrice').empty('');
                    $('.product-color').empty('');
                    $('.product-color-image').empty('');
                    $('.imageContainer').empty('');
                    $('#productPrice').val(data.product.price);
                    // $('#productPrice').attr('min').val('');
                    $('#productPrice').attr('min',data.product.price);

                    $.each(data.colors, function(index, color) {

                        $('.product-color').append('<label class="input-group"><span class="input-group-addon">'+
                            '<input type="checkbox" value="'+color.id+'" class="color-front" hidden name="color[]" data-id="'+color.id+'"></span><span class="btn btn-sm p-3 m-2 color-chang-product color-chang-product-'+color.id+' color-front color-id-'+color.id+' color-toggle-'+color.id+'" " data-id="'+color.id+'" style="background-color:'+color.color+';"></span></label>');

                        $('.product-color-image').append('<label class="input-group"><span class="input-group-addon">'+
                            '</span><span class="all-color-image btn btn-sm color-chang-image-product p-3 m-2 color-front color-id-'+color.id+'" data-id="'+color.id+'" style="background-color:'+color.color+';"></span></label>');
                    });

                    $('.imageContainer').append('<img class="base-product-image-seller-min" crossorigin="anonymous" src="http://127.0.0.1:8000/storage/products/'+data.color.front_image+'">');

                    $.each(data.colors, function(index, colorImage) {

                    $('#product-image-seller').append('<img src="http://127.0.0.1:8000/storage/products/'+colorImage.front_image+'" '+
                                'crossorigin="anonymous" class="img-responsive inline-block p-2 color-image-'+colorImage.id+'" alt="Responsive image" style="display:none;"/>');

                    });//end of foreacch

                }//end success ajax

            });//end of ajax

        });//end fo on change sellerProduct

        $(document).on('click','#add-logo', function(e) {
            e.preventDefault();

            $('.logoContainer').empty('');

            $(this).addClass('d-none');

            $('#clear-logo').removeClass('d-none');


        });//end of click clear-logo

        $(document).on('click','#clear-logo', function(e) {
            e.preventDefault();

            $('.logoContainer').empty('');

            $('#add-logo').removeClass('d-none');

            $(this).addClass('d-none');

        });//end of click clear-logo

        $(document).on('click','.color-chang-image-product', function(e) {
            e.preventDefault();

            var id = $(this).data('id');

            $('.all-color-image').each(function(index) {

                $(this).removeClass('b-radius');

            });//end of each

            $('.color-chang').each(function(index) {

                $(this).removeClass('color-chang');
                $(this).click();
                $(this).prop('checked',false);

            });//end of each

            $(this).addClass('b-radius');

            $('.color-chang-product-'+id).click();
            $('#product-image-coloe').empty('');
            $('#product-image-coloe').append('<input type="checkbox" checked="true" value="'+id+'" hidden name="color[]">');
            $('.color-chang-product-'+id).addClass('color-chang');

            var image = $('.color-image-' + id).attr('src');

            $('.base-product-image-seller-min').attr('src',image);

        });//end of click olor-chang-image-product


        $(document).on('change','.color-front', function(e) {
            e.preventDefault();

            var id = $(this).data('id');

            $('.color-toggle-' + id).toggleClass('b-radius');
            $('.color-image-' + id).toggleClass('base-product-image-seller');

        });//end of click color-back


        $('#productPrice').on('change', function (e) {
            e.preventDefault();
            var val    = $(this).val();
            var min    = $(this).attr('min');
            var totle  = val - min;

            $('.new-price').html(totle);
            $('#sellingPrice').val(totle);
            $('#selling_price').val(totle);

        });//end of change productPrice


        $(document).on('click', '.back-product', function(e) {
            e.preventDefault();

            $('.path-front').addClass('d-none');
            $('.path-back').removeClass('d-none');

            $('.color-front').addClass('d-none');
            $('.color-back').removeClass('d-none');

            $('#bgImage').val('back');

        });//end of back-product


        $(document).on('click', '.front-product', function(e) {
            e.preventDefault();

            $('.path-back').addClass('d-none');
            $('.path-front').removeClass('d-none');

            $('.color-back').addClass('d-none');
            $('.color-front').removeClass('d-none');

            $('#bgImage').val('front');

        });//end of front-product

            //calculate the tage
        function calculateTage() {

            var tag = '';

            $('.tagify__tag-text').each(function(index) {

                tag += $(this).text() + ',';

                $('#tag').val(tag);

            });//end of tag each

        }//end of calculate tag

        $(document).on('submit', '#add-product',function(e) {
            e.preventDefault();

              $('.publich-product').addClass('d-none');

              $("body").css("overflow", "hidden");

              swal('Publishing, please wait :)', {
                buttons: false,
              });

              let logo         = document.querySelectorAll(".sellerDesign")[0];
              let imageMain    = document.querySelectorAll(".base-product-image-seller-min")[0];
              let imageMainOne = document.querySelectorAll(".base-product-image-seller-min")[0];
              let logoLocat    = document.querySelectorAll(".logoContainer")[0];

              $('#canvas-app').append('<div style="margin-top:500px"></div><canvas class="add-w" id="result-min"></canvas><br>');
              let result1      = document.querySelector("#result-min");
              var finalImage   = result1.getContext("2d");

              result1.width    = imageMainOne.width;
              result1.height   = imageMainOne.height;

              finalImage.drawImage(imageMainOne, imageMainOne.offsetLeft, imageMainOne.offsetTop, imageMainOne.width, imageMainOne.height);
              finalImage.drawImage(logo, logoLocat.offsetLeft, logoLocat.offsetTop, logo.width, logo.height);

              var oldCanva = document.querySelector("#result-min");

              html2canvas(oldCanva).then(oldCanva => {

                var newImage = oldCanva.toDataURL("image/png").replace("image/png", "image/octet-stream");

                $('#canvas-app-input').append('<input type="text" value="'+newImage+'" name="defult_image" hidden>');

              });

            calculateTage();

            let logoLocation = document.querySelectorAll(".logoContainer")[0];

            $('.base-product-image-seller').each(function(index) {

                logo       = document.querySelectorAll(".sellerDesign")[0];
                image_main = document.querySelectorAll(".base-product-image-seller-min")[0];
                image      = document.querySelectorAll(".base-product-image-seller")[index];

                $('#canvas-app').append('<div style="margin-top:500px"></div><canvas class="add-w" id="result-'+index+'"></canvas><br>');

                let result1    = document.querySelector("#result-"+index);
                var finalImage = result1.getContext("2d");

                result1.width  = image_main.width;
                result1.height = image_main.height;

                finalImage.drawImage(image, image_main.offsetLeft, image_main.offsetTop,image_main.width, image_main.height);
                finalImage.drawImage(logo, logoLocation.offsetLeft, logoLocation.offsetTop, logo.width, logo.height);

                var oldCanva = document.querySelector("#result-"+index);

                html2canvas(oldCanva).then(oldCanva => {

                  var newImage = oldCanva.toDataURL("image/png").replace("image/png", "image/octet-stream");

                  $('#canvas-app-input').append('<input type="text" value="'+newImage+'" name="image[]" hidden>');
                  // $('#canvas-app-input-image').append('<img  src="'+newImage+'">');

                });//end of html2canvas

            });//end of each image

            setTimeout(function(){

                var data     = $('#add-product').serialize();
                var url      = $('#add-product').attr('action');
                var method   = $('#add-product').attr('method');
                var items    = $('#add-product').serializeArray();
                var redircte = "{{ route('product.index') }}";
                var input    = ['title','price','tag','title'];

                $.each(input, function(index,item) {

                    if (item == 'price') {

                        $('#productPrice').removeClass('is-invalid');

                    }

                     $('#' + item).removeClass('is-invalid');
                     $('#' + item + '-error').text('');

                });//end of each

                $.ajax({
                    url: url,
                    method: method,
                    data: data,
                    success: function(data) {

                        swal('Publishing, please wait :)', {
                          buttons: false,
                        });

                        location.reload();

                        document.location.href = redircte;

                    }, error: function(data) {

                        $.each(data.responseJSON.errors, function(name,message) {

                            if (name == 'price') {

                                $('#productPrice').addClass('is-invalid');
                            }

                            $('#' + name).addClass('is-invalid');
                            $('#' + name + '-error').text(message);

                        });//end of each
                    },
                });//end of ajax

            }, 20000);

        });//end of add-product submit


    });//end of document redy
</script>

@endsection
