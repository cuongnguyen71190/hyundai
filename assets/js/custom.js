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

    // slider product related
    $('#related-product-carousel').owlCarousel({
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

    $('#related-product-carousel').find('.owl-nav').removeClass('disabled');
    $('#related-product-carousel').on('changed.owl.carousel', function(event) {
        $(this).find('.owl-nav').removeClass('disabled');
    });

    // slider related image
    var owl = $('#image-related-slider');
    owl.addClass('owl-theme');
    owl.owlCarousel({
        autoplay: false,
        autoplayTimeout: 5000,
        autoplayHoverPause: true,
        loop: true,
        autoWidth: false,
        margin: 20,
        responsiveClass: true,
        nav: true,
        loop: true,
        dots: true,
        thumbs: true,
        thumbsPrerendered: true,
        responsive: {
            0: {
                items: 1
            },
            568: {
                items: 1
            },
            600: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    });

    // 1) ASSIGN EACH 'DOT' A NUMBER
    var dotcount = 1;
    var slidecount = 1;
    $('#image-related-slider .owl-dot').each(function() {
      $(this).addClass('dotnumber' + dotcount);
      $(this).attr('data-info', dotcount);
      dotcount = dotcount + 1;
    });

    // 2) ASSIGN EACH 'SLIDE' A NUMBER
    $('#image-related-slider .owl-item').not('.cloned').each(function() {
      $(this).addClass('slidenumber' + slidecount);
      var _src = $(this).find('img').attr('src');
      $(this).find('.expand').attr('data-src', _src);
      slidecount = slidecount + 1;
    });

    // SYNC THE SLIDE NUMBER IMG TO ITS DOT COUNTERPART (E.G SLIDE 1 IMG TO DOT 1 BACKGROUND-IMAGE)
    $('#image-related-slider .owl-dot').each(function() {
        var grab = $(this).data('info');
        var slidegrab = $('.slidenumber' + grab + ' img').attr('src');
        $(this).css("background-image", "url(" + slidegrab + ")");
        $(this).css("background-size", "cover");

    });
    // THIS FINAL BIT CAN BE REMOVED AND OVERRIDEN WITH YOUR OWN CSS OR FUNCTION, I JUST HAVE IT
    // TO MAKE IT ALL NEAT
    var amount = $('#image-related-slider .owl-dot').length;
    var imgHeight = $('#image-related-slider .active').height();
    var newwidth = $('#image-related-slider .owl-dot').width();
    $('#image-related-slider .owl-dot').css("width", "20%");
    $('#image-related-slider .owl-dot').css("height", newwidth + "px");
    $('#image-related-slider .owl-dot span').css("display", "none");
    $('#image-related-slider .owl-nav button').css("top", (imgHeight/2 - 24) + "px");

    // zoom image
    var modal = document.getElementById('pro-modal');
    var img = document.getElementsByClassName('pro-img');
    var modalImg = document.getElementById("pro-modal-img");

    $('.expand').on('click', function() {
        modal.style.display = "block";
        modalImg.src = $(this).attr('data-src');
    })

    var span = document.getElementsByClassName("close")[0];
    if (span) {
        span.onclick = function() {
            modal.style.display = "none";
        }
    }

    $('body').click(function (event) {
        if ($(event.target).closest('#pro-modal').length && $(event.target).is('#pro-modal')) {
            modal.style.display = "none";
        }
    });
});

jQuery(window).load(function () {
    'use strict'
    // slider featured product
    jQuery('#featured-product-slider').owlCarousel({
        autoplay: false,
        autoplayTimeout: 5000,
        autoplayHoverPause: true,
        loop: true,
        margin: 20,
        responsiveClass: true,
        nav: true,
        dots: false,
        loop: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            840: {
                items: 3
            }
        }
    });
})