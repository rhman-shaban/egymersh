  $(function() {

  
   	 // $("#image-logo").draggable();
   	 $('#image-logo').draggable().resizable({
		start: function(event, ui) {
		
			console.log($('#image-logo').width() + ' ' + $('#image-logo').height());

			// $('#image-logo-w').html($('#image-logo').width());
			// $('#image-logo-h').html($('#image-logo').height());
		
		},
		stop: function(event, ui) {
		
			console.log($('#image-logo').width() + ' ' + $('#image-logo').height());

			$('#image-logo-w').html($('#image-logo').width());
			$('#image-logo-h').html($('#image-logo').height());
		
		}	
	});

 //   	  $("img").resizable({ handles: "all", ghost: true, autoHide: true,containment: "#app" }).parent().draggable({containment: "#app"});

 //     $('#test').resizable({
	// 	start: function(event, ui) {
		
	// 		console.log($('#test').width() + ' ' + $('#test').height());
		
	// 	},
	// 	stop: function(event, ui) {
		
	// 		console.log($('#test').width() + ' ' + $('#test').height());
		
	// 	}	
	// });

  });