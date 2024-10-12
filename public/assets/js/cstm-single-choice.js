$(document).ready(function(){
	$('.cstm-rd-slct').on('click', function(){
		$(this).parent().find('input').val($(this).attr('value'));
	});

	$('.tp-slct').on('click', function(){
		$(this).parent().find('.tp-slct').removeClass('active');
		$(this).addClass('active');
		if($(this).attr('tab-ct')) {
			$('.dv-hr').hide();
			$('.' + $(this).attr('tab-ct')).show();
		}
		
	});
});