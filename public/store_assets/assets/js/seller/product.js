$(document).ready(function() {

    $("#add-file-pro").change(function () {
      if (this.files && this.files[0]) {
          var reader    = new FileReader();
          reader.onload = imageIsLoaded;
          reader.readAsDataURL(this.files[0]);
        }
        
        function imageIsLoaded(e) {
          $('.logoContainer').append('<img crossorigin="anonymous" class="sellerDesign" src="'+e.target.result+'" width="200" height="200" alt="your image"/>');

          // $('#myImgAA').attr('src', e.target.result);
          $('.sellerDesign').resizable();

          $(".logoContainer").draggable();

          // console.log(e.target.result);
        };//end of function imageIsLoaded

    });//end of change

    $(".logoContainer").draggable();

    $(".sellerDesign").resizable();

    $(document).on('click', '.Btn', function(e) {
        e.preventDefault();
        
           swal('fdfs', {
                type: "success",
                icon: "success",
                buttons: false,
                timer: 3000,
                timer: 15000
            });
    });

});//end of document redy function