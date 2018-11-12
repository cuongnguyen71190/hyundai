jQuery(document).ready(function($){
  'use strict'
	$('li.menu-item-has-children').hover(
		function(){ $(this).addClass('current-dropdown') },
		function(){ $(this).removeClass('current-dropdown') }
	);

	$(window).scroll(function() {
	    var height = $(window).scrollTop();
	    $('#top-link').css('opacity', 0);
	    if (height > 350) {
	        $('#top-link').css('opacity', 1);
	    }
	});

	$("#top-link").click(function () {
	   $("html, body").animate({scrollTop: 0}, 1000);
	});

	$("#menu-mobile-menu li i").click(function() {
    	$(this).parent().find('.nav-dropdown').toggle();
	});

	$(window).on('resize load',function(){
		$('.mfp-wrap.mfp-ready').css({height: $(this).height()});
    });

	$('.icon-menu').on('click', function (e) {
		e.preventDefault();
		$('.mfp-container').addClass('show');
		$('.mfp-wrap').toggle('display');
    	$('.mfp-bg').toggle('display');
	});

    $('.bt-close').click(function () {
    	var px = '-270';
    	$('.mfp-container').removeClass('show');
    	$('.mfp-wrap').hide();
    	$('.mfp-bg').hide();
    });

    $('#menu-main-menu li a').on('click', function() {
    	var _href = $(this).attr('href');
    	window.location.replace(_href);
    });

    $('#comment #submit').click(function (e) {
    	var form = $(this).closest(".comment-form");
    	var validate  = true;
    	form.find(".form-control").each(function() {
    		var value = $(this).val();
    		if (value == '') {
    			$(this).prev().html('vui lòng nhập trường này!');
    			validate = false;
    		}
    	});

    	if (!validate) {
			e.preventDefault();
    	}

    	form.submit();
    });

    $('.wpb_single_image .vc_single_image-wrapper img').hover(function() {
        $(this).addClass('transition');

    }, function() {
        $(this).removeClass('transition');
    });
});