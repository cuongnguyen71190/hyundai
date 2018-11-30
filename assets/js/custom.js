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

    $('body').click(function (event) {
        if ($(event.target).closest('.mfp-wrap').length && $(event.target).is('.mfp-container')) {
            var px = '-270';
            $('.mfp-container').removeClass('show');
            $('.mfp-wrap').hide();
            $('.mfp-bg').hide();
        }
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

    // owl-carousel
    $('.owl-carousel').owlCarousel({
        autoplay: false,
        autoplayTimeout: 5000,
        autoplayHoverPause: true,
        loop: true,
        margin: 20,
        responsiveClass: true,
        nav: true,
        loop: true,
        responsive: {
            0: {
                items: 1
            },
            568: {
                items: 2
            },
            600: {
                items: 3
            },
            1000: {
                items: 4
            }
        }
    });

    $('.owl-carousel').find('.owl-nav').removeClass('disabled');
    $('.owl-carousel').on('changed.owl.carousel', function(event) {
        $(this).find('.owl-nav').removeClass('disabled');
    });
});