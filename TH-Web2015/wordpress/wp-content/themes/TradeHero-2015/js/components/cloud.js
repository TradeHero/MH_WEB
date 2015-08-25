/**
 * @file cloud.js
 */

var TH = (function( TH, $ ) {
	TH.cloud = function() {
		if( ! $('#myCanvas').tagcanvas({
	     textColour : '#ffffff',
	     outlineThickness : 1,
	     maxSpeed : 0.03,
	     depth : 0.75
	   })) {
	     // TagCanvas failed to load
	     $('#myCanvasContainer').hide();
	   }
	};

	return TH;
})( window.TH || {}, jQuery );