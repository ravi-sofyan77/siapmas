$(document).ready(function(){
	$('.c-banner--dimiss').on('click',function(){
		if ($('.c-banner').length > 0) {
			$('.c-banner').css('display','none');
		}
	});
});
