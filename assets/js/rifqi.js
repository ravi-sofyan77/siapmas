$(window).scroll(function() {
    if ( $(this).scrollTop() == 0 ) {
        $(".checknavbar").css('box-shadow', 'none');
    }else{
    	$(".checknavbar").css('box-shadow', '0 2px 2px 0 rgba(0,0,0,0.14),0 3px 1px -2px rgba(0,0,0,0.12),0 1px 5px 0 rgba(0,0,0,0.2)');
    }
});