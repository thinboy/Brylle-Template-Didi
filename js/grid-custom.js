( function( $ ){
	"use strict";
	if($(window).width() >= 700){
	//Masonry blocks
	var $blocks = jQuery.noConflict();
	$blocks = $(".posts");

	$blocks.imagesLoaded(function(){
		$blocks.masonry({
			itemSelector: '.threecolumn, .twocolumn'
		});

		// Fade blocks in after images are ready (prevents jumping and re-rendering)
		$(".threecolumn, .twocolumn").fadeIn();
	});

	$(window).resize(function () {
		$blocks.masonry();
	});
	}
})( jQuery );