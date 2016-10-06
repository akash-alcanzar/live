(function($){


$(window).scroll(function() {
    var scroll = $(window).scrollTop();
   if(scroll > 150){
	$('.topbar-section').css({"display": "none"});
	}else{
		$('.topbar-section').css({"display": "block"});
	}
});

$(window).scroll(function() {
    if ($(this).scrollTop() > 1){  
        $('.logo-section').addClass("sticky");
    }
    else{
        $('.logo-section').removeClass("sticky");
    }
});


var amountScrolled = 300;
$(window).scroll(function() {
	if ($(window).scrollTop() > amountScrolled) {
		$('a.back-to-top').fadeIn('slow');
	} else {
		$('a.back-to-top').fadeOut('slow');
	}
});


$('#pararesponsive-menu .sub-menu').hide(); //Hide children by default
$('#pararesponsive-menu > li.menu-item-has-children > a').addClass('para-toggle');
$('#pararesponsive-menu > li.menu-item-has-children > a').click(function() {
        event.preventDefault();
        $(this).siblings('.sub-menu').slideToggle('slow');
    }).dblclick(function() {
        window.location = this.href;
        return false;
    });

$('#pararesponsive-menu .sub-menu ul').hide(); //Hide children by default
$('#pararesponsive-menu > .sub-menu li.menu-item-has-children > a').addClass('para-toggle');
$('#pararesponsive-menu > .sub-menu li.menu-item-has-children > a').click(function() {
        event.preventDefault();
        $(this).siblings('.sub-menu').slideToggle('slow');
    }).dblclick(function() {
        window.location = this.href;
        return false;
    });


$('.add_to_cart_button').removeClass('add_to_cart_button').addClass('paraswift-btn');
$('.paraswift-bottom a').addClass('paraswift-btn');
$('.wpcf7-form-control').removeClass('wpcf7-form-control').addClass('form-control');
$('.wpcf7-submit').removeClass('form-control').addClass('btn-lg');
$('input[type="text"]').addClass('form-control');
$('input[type="email"]').addClass('form-control');
$('input[type="url"]').addClass('form-control');
$('textarea').addClass('form-control');
$('.submit').addClass('btn btn-default');
})(jQuery);