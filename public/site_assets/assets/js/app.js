$(document).ready(function() {
	
    $(document).on('change','#select-governorate',function(e) {
        e.preventDefault();

        var $option      = $(this).find(":selected");
        var id           = $option.data('id');
        var method       = 'get';
        var url          = 'governorate_shipping/'+id;

        $.ajax({
            url: url,
            method: method,
            success: function (data) {
                
                $('.shipping-price').empty('');
                
                if ($('#loca').text() == 'ar') {

                    name = 'ج م';

                } else {

                    name = 'LE';
                }

                if (data.length < 0) {

                    $('.shipping-price').html('0');

                } else {
                    $('.cart-subtotal').html(data.total_price + ' ' + name);

                    $('.shipping-price').html(data.price);

                }//end of if

            }//end of success
        });//end of ajax

    });//end of

});//end of document redy function