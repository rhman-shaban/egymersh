$(document).ready(function() {

    $("#add-file-pro").change(function () {

      if (this.files && this.files[0]) {
          var reader    = new FileReader();
          reader.onload = imageIsLoaded;
          reader.readAsDataURL(this.files[0]);
        }
        
        function imageIsLoaded(e) {

          $('.logoContainer').append('<img crossorigin="anonymous" class="sellerDesign this-image" id="myimage" src="'+e.target.result+'" width="200" height="200" alt="your image"/>');
          $('#input-logo').val(e.target.result);

          // $('#myImgAA').attr('src', e.target.result);
          $('.sellerDesign').resizable({
            aspectRatio: 1 / 1
          });

          $(".logoContainer").draggable();

          // console.log(e.target.result);
        };//end of function imageIsLoaded

    });//end of change

    $(".sellerDesign").resizable({
      aspectRatio: 1 / 1
    });

    $(".logoContainer").draggable();


    /////////////////////////////////// logo ///////////////////////

    $( function() {
      $( "#sortable" ).sortable();
    });

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
        var app          = $('#getLocale').text();

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

                if (data.length == 0) {

                     $('#sellerProduct').append('<option>No data</option>');

                } else {

                    $('#sellerProduct').append('<option> product</option>');
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
        var url          = 'show_product';
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
                        '<input type="checkbox" value="'+color.id+'" class="color-front color-chang-product-'+color.id+'" hidden name="color[]" data-id="'+color.id+'"></span><span class="btn btn-sm p-3 m-2 color-chang-product color-chang-product-'+color.id+' color-front color-id-'+color.id+' color-toggle-'+color.id+'" " data-id="'+color.id+'" style="background-color:'+color.color+';"></span></label>');

                    $('.product-color-image').append('<label class="input-group"><span class="input-group-addon">'+
                        '</span><span class="all-color-image btn btn-sm color-chang-image-product p-3 m-2 color-front color-id-'+color.id+'" data-id="'+color.id+'" style="background-color:'+color.color+';"></span></label>');
                });

                $('.imageContainer').append('<img class="base-product-image-seller-min" crossorigin="anonymous" width="600" style="min-width:600px" src="'+data.color.image_path+'">');

                $.each(data.colors, function(index, colorImage) {
                  
                $('#product-image-seller').append('<img src="'+colorImage.image_path+'" '+
                            'crossorigin="anonymous" class="img-responsive inline-block p-2 color-image-'+colorImage.id+'" width="600" alt="Responsive image" style="display:none;"/>');

                });//end of foreacch

            }//end success ajax

        });//end of ajax

    });//end fo on change sellerProduct

    $(document).on('click','#add-logo', function(e) {
        e.preventDefault();

        $('.logoContainer').empty('');

        $(this).addClass('d-none');

        $('#clear-logo').removeClass('d-none');


    });//end of click add-logo

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
            $(this).removeClass('b-radius');
            $(this).click();
            $(this).prop('checked',false);
            $(this).prop('disabled',false);

        });//end of each

        $(this).addClass('b-radius');

        $('.color-chang-product-'+id).addClass('b-radius');
        $('.color-chang-product-'+id).click();
        $('.color-chang-product-'+id).prop('disabled',true);
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

    });//end of click color-front


    $('#productPrice').on('change keyup', function (e) {
        e.preventDefault();
        var val    = $(this).val();
        var min    = $(this).attr('min');
        var totle  = val - min;

        $('.new-price').html(totle);
        $('#sellingPrice').val(totle);
        $('#selling_price').val(totle);

    });//end of change productPrice

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

          if (!$("#myimage").hasClass('this-image')) {

                swal('error no logo', {
                    type: "error",
                    icon: "error",
                    buttons: false,
                    timer: 3000,
                });

                return 'error';

          }

          $('.publich-product').addClass('d-none');

          $("body").css("overflow", "hidden");

          swal('Publishing, please wait :)', {
            buttons: false,
          });

          let logo         = document.querySelectorAll(".sellerDesign")[0];
          let imageMainOne = document.querySelectorAll(".base-product-image-seller-min")[0];
          let logoLocat    = document.querySelectorAll(".logoContainer")[0];

          $('#canvas-app').append('<div style="margin-top:500px"></div><canvas id="result-min"></canvas><br>');
          let result1      = document.querySelector("#result-min");
          var finalImage   = result1.getContext("2d");
          

          result1.width    = imageMainOne.naturalWidth;
          result1.height   = imageMainOne.naturalHeight;

           // logo merge location X and Y

          let logo_final_left = (( logoLocat.offsetLeft + 200 + 2) * (10/6))
          let logo_final_top  = (( logoLocat.offsetTop + 150 + 2) * (10/6))

           // logo merge size : width and height
          let logo_final_width = ((1000/3) * (logo.width  / 200))
          let logo_final_height = ((1000/3) * (logo.height / 200))

          finalImage.drawImage(imageMainOne, imageMainOne.offsetLeft, imageMainOne.offsetTop);
          finalImage.drawImage(logo, logo_final_left, logo_final_top, logo_final_width, logo_final_height);

          var oldCanva = document.querySelector("#result-min");

          var newImage = oldCanva.toDataURL("image/png").replace("image/png", "image/octet-stream");

          $('#canvas-app-input').append('<input type="text" value="'+newImage+'" name="defult_image" hidden>');

        calculateTage();

        let logoLocation = document.querySelectorAll(".logoContainer")[0];

        $('.base-product-image-seller').each(function(index) {

            logo       = document.querySelectorAll(".sellerDesign")[0];
            image_main = document.querySelectorAll(".base-product-image-seller-min")[0];
            image      = document.querySelectorAll(".base-product-image-seller")[index];

            $('#canvas-app').append('<div style="margin-top:500px"></div><canvas class="add-w" id="result-'+index+'"></canvas><br>');

            let result1    = document.querySelector("#result-"+index);
            var finalImage = result1.getContext("2d");

            result1.width  = image_main.naturalWidth;
            result1.height = image_main.naturalHeight;

              // logo merge location X and Y

          let logo_final_left = (( logoLocation.offsetLeft + 200 + 2) * (10/6))
          let logo_final_top  = (( logoLocation.offsetTop + 150 + 2) * (10/6))

           // logo merge size : width and height
          let logo_final_width = ((1000/3) * (logo.width  / 200))
          let logo_final_height = ((1000/3) * (logo.height / 200))


          finalImage.drawImage(image, image_main.offsetLeft, image_main.offsetTop);
          finalImage.drawImage(logo, logo_final_left, logo_final_top, logo_final_width, logo_final_height);

          var oldCanva = document.querySelector("#result-"+index);

          var newImage = oldCanva.toDataURL("image/png").replace("image/png", "image/octet-stream");

          $('#canvas-app-input').append('<input type="text" value="'+newImage+'" name="image[]" hidden>');

        });//end of each image

        setTimeout(function(){

            var data     = $('#add-product').serialize();
            var url      = $('#add-product').attr('action');
            var method   = $('#add-product').attr('method');
            var items    = $('#add-product').serializeArray();
            var redircte = "product_index";
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

        }, 40000);

    });//end of add-product submit


});//end of document redy function