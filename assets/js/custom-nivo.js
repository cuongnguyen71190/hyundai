jQuery(document).ready(function ($) {
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
		prevText: '',
		nextText: '',
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
	if (span) {
		span.onclick = function() {
		    modal.style.display = "none";
		}
	}
})