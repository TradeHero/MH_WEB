/**
 * @file phoneScreen.js
 */

var TH = (function( TH, $ ) {
	TH.phoneScreen = function() {
		return {
			init: function() {
				$('.phone-screen-sections').each(function(){
		    		var $children = $(this).children();
		    		var childrenLen = $children.length;
		    		$(this).css({
		    			'position': 'relative',
		    			'height': (childrenLen*100).toString() + '%'
		    		});
		    		$children.css( 'height', (100/childrenLen).toString() + '%' );
		    	});
		    	return this;
			}
		};
	};

	return TH;
})( window.TH || {}, jQuery );