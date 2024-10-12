$(document).ready(function(){
	

	$('.a-chk').on('click',function(e){
		e.stopImmediatePropagation();
		e.preventDefault();
		var chk = $(this).find('input');
		if(chk.is(':checked')) {
			chk.prop("checked", false);
		} else {
			chk.prop( "checked", true);
		}
	});
});