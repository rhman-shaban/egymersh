$(document).ready(function() {
	
	//selct store
    $('#store').on('change', function (e) {
        e.preventDefault();

        var $option  = $(this).find(":selected");
        var id       = $option.data('id');
        var url      = $option.data('url');
        var method   = 'get';

        $.ajax({
            url: url,
            method: method,
            success: function(data) {

            	$('#product-order-image').addClass('d-none');

            	$('#product').empty('');
                $('#product-order-color').empty('');
                $('#product-order-size-item').empty('');

                $('#product-order-color-error').empty('');
                $('#input-color').val('');

                $('#product-order-size-error').empty('');
                $('#input-size').val('');

            	$('#price').attr('min','');

            	$('#price').val('');
            	$('#quantity').val('');

                $('#product').append('<option value="">Select product</option>');
			    $.each(data.products, function(index, product) {

            		$('#product').append('<option value="'+product.id+'" data-id="'+product.id+'">'+product.title+'</option>');

                });

            }//end of success

        });//end of ajax

    });//end of change store


    //product
	$(document).on('change','#product',function(e) {
        e.preventDefault();

        var $option  = $(this).find(":selected");
        var id       = $option.data('id');
        var url      = "store/productd/details";
        var method   = 'post';

        $.ajax({
            url: url,
            method: method,
            data:{id:id},
            success: function(data) {

            	$('#product-order-image').removeClass('d-none');
                $('#product-order-image').attr('src',data.product.image_path);

                $('#product-order-color').empty('');
                $('#product-order-size-item').empty('');

                $('#product-order-color-error').empty('');
            	$('#input-color').val('');

                $('#product-order-size-error').empty('');
                $('#input-size').val('');

                $('#price').val(data.product.price);
                $('#price').attr('min',data.product.price);

                $.each(data.colors, function(index, color) {

            		$('#product-order-color').append('<span data-color="'+color.product_color.color+'" data-color-id="'+color.product_color.id+'" class="btn btn-sm p-3 m-2 product-size color-chang product-order-size" style="background-color:'+color.product_color.color+';"></span>');

                });

            }//end of success

        });//end of ajax

    });//end of change product


	//order size
    $(document).on('click','.product-order-size',function(e) {
        e.preventDefault();
        var url     = "chouse/color";
        var id      = $(this).data('color-id');
        var color   = $(this).data('color');
        var method  = 'post';

        $('#product-order-color-error').empty('');
        $('#product-order-size-error').empty('');

        $('.product-order-size').each(function(index) {

        	$(this).removeClass('b-radius');

        });//end of  each

        $(this).addClass('b-radius');
        $('#input-color').val(color);

        $.ajax({
            url: url,
            method: method,
            data:{id:id},
            success: function (data) {

                $('#product-order-size-item').empty('');

                $.each(data, function(index, product) {

                    $('#product-order-size-item').append('<input type="radio" class="product-size" name="size" value="'+product.size.name+'"><label>'+product.size.name+'</label><br>');

                });//end of each

            }//end fof success
        });//endي dof ajax

    });//end of on click

    //product size
    $(document).on('change','.product-size', function(e) {
        e.preventDefault();

            var val = $(this).val();
            var min = $(this).attr('min');

            $('#input-size').val(val);

            if (val < min) {

                    $(this).val(min);               

            } else {

                $(this).val();
            }

    });//end of keyup product size


    //selct price
	$(document).on('click keyup','#price', function(e) {
        e.preventDefault();

	    	var min = $(this).attr('min');
	    	var val = $(this).val();

	    	if (val < min) {

					$(this).val(min);        		

	    	} else {

	    		$(this).val();
	    	}

    });//end of keyup price


	$(document).on('submit','#add-product', function(e) {
        e.preventDefault();
            
        	var data     = $(this).serialize();
            var url      = $('#add-product').attr('action');
            var method   = $('#add-product').attr('method');

            $('#product-order-color-error').empty('');

            if ($('#input-color').val() == '') {

            	$('#product-order-color-error').html('require color');

            }

            if ($('#input-size').val() == '') {
                
            	$('#product-order-size-error').html('require size');

            }

            $.ajax({
                url: url,
                method: method,
                data: data,
                success: function(response) {

                	var data           = response.data;
                	var profitQnt      = $.number(parseInt(data.Profit) * parseInt(data.quantity),2);
                	var profitPrice    = $.number(parseInt(data.price) * parseInt(data.quantity),2);
                	var profit  	   = $.number(parseInt(data.Profit),2);
                	var price  	       = $.number(parseInt(data.price),2);

                    new Noty({
                        layout: 'topRight',
                        text: "added successfully",
                        killer: true,
                        timeout: 2000,
                    }).show();

                	$("#tb-products").append(
		                '<tr id="'+data.productId+'-'+response.keyChild+'">'+
		                    '<td>'+ data.productName +'</td>'+
		                    '<td>'+price+'</td>'+
		                    '<td>'+data.quantity+'</td>'+
		                    '<td>'+
		                        '<span class="btn btn-sm p-3  b-radius"'+
		                            'style="background-color:'+data.color+'">'+
		                        '</span>'+
		                    '</td>'+
		                    '<td>'+data.size+'</td>'+
		                    '<td class="totalPrice">'+profitPrice+'</td>'+
		                    '<td>'+profit+'</td>'+
		                    '<td class="totalProfit">'+profitQnt+'</td>'+
		                    '<td>'+
		                        '<button parenKey="'+data.productId+'" childKey="'+response.keyChild+'" title="Delete Product" class="btn btn-danger btn-xs delete delete-product"> <i class="fas fa-trash-alt" ></i> </button> '+
		                    '</td>'+
		                '</tr>'
		            );

            		document.getElementById("add-product").reset();

	            	$('#product-order-image').addClass('d-none');

	            	$('#product').empty('');
	            	$('#product-order-color').empty('');

	            	$('#product-order-size-item').empty('');
                    $('#product-order-size-error').empty('');
                    $('#input-size').val('');

                    $('#product-order-color-error').empty('');
                    $('#product-order-color-error').empty('');
	            	$('#input-color').empty('');

	            	$('#price').attr('min','');

	            	$('#price').val('');
	            	$('#quantity').val('');

                }, error: function(data) {

                    // $.each(data.responseJSON.errors, function(name,message) {

                    //     if (name == 'price') {

                    //         $('#productPrice').addClass('is-invalid');
                    //     }

                    //     $('#' + name).addClass('is-invalid');
                    //     $('#' + name + '-error').text(message);

                    // });//end of each
                },
            });//end of ajax

    });//end of submit form


    //delete product
    $(document).on('click','.delete-product',function(e) {
        e.preventDefault();

        var parentId  = $(this).attr('parenKey');
        var childKey  = $(this).attr('childKey');
        var method    = "delete";
        var url       = "delete_product";
        
        $.ajax({
            url: 'delete_product',
            method: method,
            data: {'parentId':parentId ,'childKey':childKey},
            success : function(data) {

                $('#' + parentId +'-' + childKey).remove();

            }//end of success
        });//end of ajax

    });//end of delete product


    //selct government
    $(document).on('change','#government',function(e) {
        e.preventDefault();

        var $option  = $(this).find(":selected");
        var url      = $option.data('url');
        var method   = 'post';
        var governme = $(this).val();

        $.ajax({
            url: url,
            method: method,
            data: {'government':governme},
            success: function (data) {
                
                $("#shippingCost").text(data.price);
                $("#shipping_price").text(data.price);

            }//end of success
        });//end of success

    });//end of change government


    $(document).on('click','#add-order-Seller', function(e) {
        e.preventDefault();

            var data     = $('#addOrderSeller').serialize();
            var url      = $('#addOrderSeller').attr('action');
            var method   = $('#addOrderSeller').attr('method');

            $.ajax({
                url: url,
                method: method,
                data: data,
                success: function(data) {

                    if (data.success == false) {

                        new Noty({
                            layout: 'topRight',
                            text: "no cart",
                            killer: true,
                            timeout: 2000,
                        }).show();

                    } else {

                        document.getElementById("addOrderSeller").reset();

                        new Noty({
                            layout: 'topRight',
                            text: "added successfully",
                            killer: true,
                            timeout: 2000,
                        }).show();

                        location.reload();

                    }//end of if

                }, error: function(data) {

                    // $.each(data.responseJSON.errors, function(name,message) {

                    //     if (name == 'price') {

                    //         $('#productPrice').addClass('is-invalid');
                    //     }

                    //     $('#' + name).addClass('is-invalid');
                    //     $('#' + name + '-error').text(message);

                    // });//end of each
                },
            });//end of ajax

    });//end of submit form

    $(window).on("load", function () {

        var totalPrice =0 ;

        $('.totalPrice').each(function(){
            totalPrice += parseFloat($(this).html());
        });
        $("#totalPrice").html(totalPrice);

        var totalProfit = 0;
        $('.totalProfit').each(function(){
            totalProfit += parseFloat($(this).html());
        });
        $("#totalProfit").html(totalProfit);

        shipping = $("#shippingCost").html();
        $("#totalCost").html(parseFloat(totalPrice) + parseFloat(shipping));

    });/*end of loading*/
    

});//end of document ready function