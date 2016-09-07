( function( $ ){
	"use strict";
	if($(window).width() >= 700){
	//Masonry blocks
	var $blocks = jQuery.noConflict();
	$blocks = $(".posts");

	$blocks.imagesLoaded(function(){
		$blocks.masonry({
			itemSelector: '.fourcolumn, .threecolumn, .twocolumn, .onecolumn',
			layoutMode : 'masonry'
		});

		// Fade blocks in after images are ready (prevents jumping and re-rendering)
		$(".fourcolumn, .threecolumn, .twocolumn, .onecolumn").fadeIn();
	});

	$(window).resize(function () {
		$blocks.masonry();
	});
	}
})( jQuery );