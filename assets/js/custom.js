jQuery(document).ready(function($){
  'use strict'
  $('.js-flickity').flickity({
		fullscreen: true,
		cellAlign: "center",
		// imagesLoaded: true,
		// lazyLoad: 1,
		// freeScroll: false,
		// wrapAround: true,
		// // autoPlay: 6000,
		// pauseAutoPlayOnHover : true,
		// prevNextButtons: true,
		// contain : true,
		// adaptiveHeight : true,
		// dragThreshold : 5,
		// percentPosition: true,
		// pageDots: true,
		// rightToLeft: false,
		// draggable: true,
		// selectedAttraction: 0.1,
		// parallax : 0,
		// friction: 0.6
	});

	$('li.menu-item-has-children').hover(
       function(){ $(this).addClass('current-dropdown') },
       function(){ $(this).removeClass('current-dropdown') }
)
});