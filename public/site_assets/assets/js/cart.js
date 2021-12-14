$(document).ready(function() {

    $(document).on('click', 'a.quickViewProduct', function(e) {
        e.preventDefault();

        var product_id = $(this).attr('data-product_id');
        var modal_name = $(this).attr('data-modal_name');
        
        $.ajax({
            url: '/product_quick_view',
            type: 'GET',
            dataType: 'html',
            data: {product_id:product_id},
        }).done(function(data) {

            $(document).find('body').append(data);
            $(document).find('body').find(modal_name).modal('show');

        });//end of ajax

    });//end of click

    $(document).on('click','.add-cart-color',function(e) {
        e.preventDefault();
        var url     = $(this).data('url');
        var colorId = $(this).data('color-id');
        var color   = $(this).data('color');
        var method   = 'get';

        $('#color-product-id').val(colorId);
        $('#color-product').val(color);
        
        $.ajax({
            url: url,
            method: method,
            success: function (data) {

                $('#size-product-item').empty('');
                $('#size-product-item-none').removeClass('d-none');

                $.each(data, function(index, product) {

                    $('#size-product-item').append('<li><a class="add-cart-size-product" data-size="'+product.size.name+'" data-size-id="'+product.size.id+'">'+product.size.name+'</a></li>');
                     
                });//end of each

                $('.product-color').each(function(index) {
            
                    $(this).removeClass('active');

                });//end of each

                $('.active-'+colorId).addClass('active');

            }//end of success
        });//end of ajax

    });//end of on click

    $(document).on('click','.add-cart-size-product',function(e) {
        e.preventDefault();
        var sizeId  = $(this).data('size-id');
        var size    = $(this).data('size');

        $('#size-product-id').val(sizeId);
        $('#size-product').val(size);
        
        $('.add-cart-size-product').each(function(index) {
            
            $(this).parent().removeClass('active');

        });//end of each

        $(this).parent().addClass('active');

    });//end of on click

    $(document).on('click','.add-cart',function(e){
        e.preventDefault();

        var url     = $(this).data('url');
        var method  = $(this).data('method');
        var id      = $(this).data('id');
        var locale  = $(this).data('locale');
        var sizeId  = $('#size-product-id').val();
        var size    = $('#size-product').val();
        var colorId = $('#color-product-id').val();
        var color   = $('#color-product').val();
        
        if ($('#color-product').val() == '' ) {

            if (locale == 'ar') {

                title = 'يجب اختيار اللون';

            } else {

                title = 'Color must be chosen';

            }//end of getLocale

            swal(title, {
                type: "error",
                icon: "error",
                buttons: false,
                timer: 3000,
                timer: 15000
            });

            return;

        }//end of if has color value

        if ($('#size-product').val() == '' ) {

            if (locale == 'ar') {

                title = 'يجب اختيار الحجم';

            } else {
                
                title = 'Size must be chosen';

            }//end of getLocale

            swal(title, {
                type: "error",
                icon: "error",
                buttons: false,
                timer: 3000,
                timer: 15000
            });

            return;

        }//end of if has size value

        $.ajax({
            url: url,
            method: method,
            data: {
                size_id:sizeId,
                color_id:colorId,
                size:size,
                color:color,
            },
            success: function(data) {

            	if (data.local == 'ar') {

            		var currency = 'ج م';
            		var title    = 'تمت الاضافه بنجاح';

            	} else {

            		var currency = 'LE';
            		var title    = 'add success'

            	}//end of getLocale

		        swal(title, {
		            type: "success",
		            icon: "success",
				  	buttons: false,
				  	timer: 3000,
		            timer: 15000
				});

                $('#size-product-id').val('');
                $('#size-product').val('');

                $('#color-product-id').val('');
                $('#color-product').val('');

                $('#size-product-item').empty('');

            	$('.cart-totle').html(data.total + ' ' + currency);
            	$('.cart-count').html(data.count);

                $('.add-cart-color').each(function(index) {
            
                    $(this).parent().removeClass('active');

                });//end of each

                if (data.product.qty == 1) {

                    if (data.local == 'ar') {

                	var html =
			            `<li class="delete-product-${data.product.id}">
			            	<div class="shopping-cart-img m-2">
			            		<a href="product/${data.product.id}">
                                    <img src="${data.product_model.image_path}" alt="Product" style="margin: -15px;">
			            		</a>
                            </div>
                            <div class="shopping-cart-title">
                                <h4><a href="product/${data.product.id}">${data.product_model.title}</a></h4>
                                <h4><span class="product-qty-${data.product.id}">${data.product.price}  ${currency}</span></h4>
                            </div>
                            <div class="shopping-cart-delete removal-product" data-id="${data.product.id}" data-rowid="${data.product.rowid}">
                                <a href="#"><i class="fi-rs-cross-small"></i></a>
                            </div>
                        </li>`;

                    } else {

                        var html =
                        `<li class="delete-product-${data.product.id}">
                            <div class="shopping-cart-img">
                                <a href="product/${data.product.id}">
                                    <img src="${data.product_model.image_path}" alt="Product">
                                </a>
                            </div>
                            <div class="shopping-cart-title">
                                <h4><a href="product/${data.product.id}">${data.product_model.title}</a></h4>
                                <h4><span class="product-qty-${data.product.id}"> 1 X ${data.product.price}  ${currency}</span></h4>
                            </div>
                            <div class="shopping-cart-delete removal-product" data-id="${data.product.id}" data-rowid="${data.product.rowid}">
                                <a href="#"><i class="fi-rs-cross-small"></i></a>
                            </div>
                        </li>`;

                    }//end of if


                    $('#add-cart-product').append(html);

                } else {

                	var id         = data.product.id;
                    var totalPrice = $.number(data.product.price * data.product.qty ,2);

                	$('.product-qty-'+id).html(data.product.qty + ' ' + 'X' + ' ' + totalPrice + ' ' + currency);

                }//end of if

            }, error: function(data) {
                console.log(data);
            },

        });//end of ajax

    });//end of click

    $('.product-quntty-up').on('click', function(e) {
    	e.preventDefault();

    	var id     = $(this).data('id');
        var rowId  = $(this).data('rowid');
        var rand   = $(this).data('rand-id');
    	var qtyval = parseInt($('#product-quntty-'+ rand).text());
    	var method = 'post';
        var url    = 'cart_update/';

    	qtyvalup   = qtyval + 1;
        $('#product-quntty-'+ rand).text(qtyvalup);

       $.ajax({
			url: url,
	       	method: method,
	       	data:{
	          id:id,
              row_id:rowId,
              quantity:qtyvalup,
	          rand:rand,
	       	},
	       	success: function (data) {

                if (data.app == 'ar') {
                    
                    currency = 'ح م';

                } else {

                    currency = 'LE';
                }

                coupon = data.coupon;

                subTotleProduct = $.number(qtyvalup * data.cart.price,2);
                
                $('.cart-count').html(data.count);

                $('.product-qty-'+id).text(data.countt + ' ' + 'X' + ' ' + subTotleProduct + ' ' + currency);

                $('#subtotal-' + rand).text(subTotleProduct);

                calculateTotal(currency,coupon);

	       	},//end of success

	   	});//this ajax
	
    });//end of product quntty

    $('.product-quntty-down').on('click', function(e) {
    	e.preventDefault();

    	var id     = $(this).data('id');
        var rowId  = $(this).data('rowid');
        var rand   = $(this).data('rand-id');
    	var qtyval = parseInt($('#product-quntty-' + rand).text());
    	var method = 'post';
        var url    = 'cart_update/';
    	qtyvaldown = qtyval - 1;

        if (qtyval > 1) {

            $('#product-quntty-'+ rand).text(qtyvaldown);

            $.ajax({
    			url: url,
    	       	method: method,
    	       	data:{
    	          id:id,
                  row_id:rowId,
                  rand:rand,
    	          quantity:qtyvaldown,
    	       	},
    	       	success: function (data) {


                    if (data.app == 'ar') {
                        
                        currency = 'ح م';

                    } else {

                        currency = 'LE';
                    }

                    coupon = data.coupon;

                    subTotleProduct = $.number(qtyvaldown * data.cart.price,2);

                    $('.cart-count').html(data.count);

                    $('.product-qty-'+id).text(data.countt + ' ' + 'X' + ' ' + subTotleProduct + ' ' + currency);
                    
                    $('#subtotal-' + rand).text(subTotleProduct);

                    calculateTotal(currency,coupon);

    	       	},//end of success

    	   	});//this ajax

        } else {

            qtyval = 1; 

            $('#product-quntty').text(qtyval)

        }//end of ig
    	
    });//end of product quntty

    $('.removal-product').click( function(e) {
        e.preventDefault();

        var id      = $(this).data('id');
        var rowId   = $(this).data('rowid');
        var method  = 'delete';

        swal({
            title: "confirm delete",
            type: "error",
            icon: "warning",
            buttons: {cancel: "no",defeat:"yes"},
            dangerMode: true
        })

        .then((willDelete) => {
        if (willDelete) {
            $.ajax({
                url: 'destroy_cart/'+rowId,
                method: method,
                success: function(data) {

                    $('.delete-product-'+id).remove();

                    $('.cart-count').html(data.count);

                    if (data.app == 'ar') {
                        
                        currency = 'ح م';

                    } else {

                        currency = 'LE';
                    }

                    $('.cart-totle').html(data.total + ' ' + currency);

                    coupon = '0';

                    calculateTotal(currency,coupon);

                    swal({
                        title: "deleted successfully",
                        type: "success",
                        icon: 'success',
                        buttons: false,
                        timer: 15000
                    });//end of swal

                },//end of success

            });//this ajax 

            }; //end of if
        });//then

    });//end of product-removal button

    //calculate the total
    function calculateTotal(currency,coupon) {

        var price = 0;

        $('.new-price').each(function(index) {
            
            price += parseFloat($(this).html().replace(/,/g, ''));

        });//end of product price

        $('.cart-subtotal').html($.number(price, 2) + ' ' + currency);
        $('.cart-totle').html($.number(price, 2) + ' ' + currency);
        $('.cart-coupon').html($.number(price - coupon, 2) + ' ' + currency);

    }//end of calculate total

    $('.coupon-product').click( function(e) {
        e.preventDefault();

        var coupon  = $('#product-coupon').val();
        var method  = 'post';

        $.ajax({
            url: 'coupon_cart',
            method: method,
            data: { coupon:coupon },
            success: function(data) {

                if (data.success == true) {

                    swal('success coupon', {
                        type: "success",
                        icon: "success",
                        buttons: false,
                        timer: 3000,
                    });

                    location.reload();

                } else {

                    swal('error coupon', {
                        type: "error",
                        icon: "error",
                        buttons: false,
                        timer: 3000,
                    });

                }//endof if

            },//end of success

        });//this ajax 

    });//end of coupon product button

    $('.delete-coupon').click( function(e) {
        e.preventDefault();

        var method  = 'get';
        var url     = 'destroy_cart';

        swal({
            title: "confirm delete",
            type: "warning",
            icon: "warning",
            buttons: {cancel: "no",defeat:"yes"},
            dangerMode: true
        })

        .then((willDelete) => {
        if (willDelete) {
            $.ajax({
                url: url,
                method: method,
                success: function(data) {

                    if (data.success == true) {

                        location.reload();

                        swal('deleted successfully', {
                            type: "success",
                            icon: "success",
                            buttons: false,
                            timer: 3000,
                        });
                        
                    }//end of if

                },//end of success

            });//this ajax 

            }; //end of if
        });//then

    });//end of product-removal button

});//end of document redy qtyval