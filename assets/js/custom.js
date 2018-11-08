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

    $('#slider').nivoSlider({
    	effect: 'random',
		slices: 1,
		boxCols: 1,
		boxRows: 1,
		animSpeed: 500,
		pauseTime: 3000,
		startSlide: 0,
		controlNav: true,
		controlNavThumbs: true,
		pauseOnHover: true,
		manualAdvance: false,
		prevText: 'Prev',
		nextText: 'Next',
		randomStart: false,
    });

    var modal = document.getElementById('pro-modal');
	var img = document.getElementsByClassName('nivo-main-image');
	var modalImg = document.getElementById("pro-modal-img");

	$('.nivo-main-image').on('click', function() {
	    modal.style.display = "block";
	    modalImg.src = this.src;
	})

	var span = document.getElementsByClassName("close")[0];
	span.onclick = function() {
	    modal.style.display = "none";
	}
});