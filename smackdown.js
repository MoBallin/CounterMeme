$(document).ready( function() {
	
    	$(document).on('change', '.btn-file :file', function() {
		var input = $(this),
			label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
		input.trigger('fileselect', [label]);
		});

		$('.btn-file :file').on('fileselect', function(event, label) {
		    
		    var input = $(this).parents('.input-group').find(':text'),
		        log = label;
		    
		    if( input.length ) {
		        input.val(log);
		    } else {
		        if( log ) alert(log);
		    }
	    
		});
	
		function readURL(input) {
		    // Preview image before upload
            function readURL(input, name){
                if(input.files && input.files[0]){
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $(name).attr('src',e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }
			

//		$("#imgInpMain").change(function(){
//		    readURL(this);
//		}); 
//		$("#imgInpGrey").change(function(){
//		    readURL(this);
//		}); 
//		$("#imgInpOrange").change(function(){
//		    readURL(this);
//		}); 
	});