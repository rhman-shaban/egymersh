/**
 * Created by Mohamed Abou-abda on 27-Jun-20.
 */

 function post_ajax (  form_id  , process_name   )
 {
 
     var form = $(form_id).serializeArray();
     var url  = $(form_id).attr('action');
 
     return $.ajax({
         url: url,
         dataType: 'json',
         data: $.param(form),
         type: 'post',
 
         beforeSend :function() {
             $(form_id).each(function () {
                 $(this).find(':input').css({"border-color": ""}); //<-- Should return all input elements in that specific form.
             });
             $(".msg_validate").empty();
 
         },
         success : function( data ) {
             if (data.status === true) {
 
                 //toastr.success(data.msg, user_response);
 
                 if (process_name == 'create') {
                     clear_input_value(form_id);
                 }
             } else {
 
                // toastr.error(data.msg, user_response);
             }
         },
         error : function( error_data , exception ) {
             if (exception == 'error') {
                 //toastr.error(error_data.responseJSON.message, user_response );
 
                 $.each(error_data.responseJSON.errors, function (kError, vError) {
                     $("#" + kError).css({"border-color": "red"});
                     $("#msg_validate_" + kError).css({"color": "red"});
                     $("#msg_validate_" + kError).html(vError);
                 });
             }
         }
 
     });
 
     return false;
 }
 