$(document).ready(function(){
	$('.btn-submit').on('click', function(){
		$('.frm-pple').submit();
	});

	$('.rqrd').on('keyup', function(){
		if($(this).val().trim() != '') {
			$(this).parent().parent().find('.btn-rqrd').show();
		} else {
			$(this).parent().parent().find('.btn-rqrd').hide();
		}
	});

	$('.btn-frm-pag').on("click", function(){
		$('.ct-loading').show();
		$('.error').hide();
		var step = $(this).attr('step');
		var btn = $(this);
		var data = $('.frm-pple').serialize(); 
		data += '&step=' + $(this).attr('step');

		if(step == 'ignore') {
			$('.ct-loading').hide();
			$('.dv-pg-' + btn.attr('next')).show();
			btn.parent().parent().hide();
			return;
		}
		
		
		$.ajax({
	        headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	        },
	        url: $('.frm-pple').attr('action'),
	        type : 'POST',
	        data : data,
	        success: function (result) {
	            if(result) {
	            	$('.dv-pg-' + btn.attr('next')).show();
					btn.parent().parent().hide();
	            }

	            //console.log(JSON.stringify(result));
	        	$('.ct-loading').hide();

	        },
	        error: function (xhr, status, error) {
	        	if(xhr.status == 422) {
	        		var errors = JSON.parse(xhr.responseText);
	        		var inputs = btn.parent().parent().find('input');
	        		
	        		inputs.each(function(e){
	        			//alert($(this).attr('name'));
	        			var name = $(this).attr('name');

	        			if(errors.errors[name]) {
	        				$(this).parent().append('<p class="error">'+ errors.errors[name] +'</p>');
	        			}
	        			
	        		});
	        	} 

	        	$('.ct-loading').hide();  
	        }
	    });
		/*$('.dv-pg-' + $(this).attr('next')).show();
		$(this).parent().parent().hide();*/
	});	
});
