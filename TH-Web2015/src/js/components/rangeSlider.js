/**
 * @file rangeSlider.js
 */

var TH = (function( TH, $ ) {
	TH.rangeSlider = function(selector) {
		var $element = $(selector || '.range-slider');
		if( $element.length<1 ) { return this; }

		$element.each(function() {
			var $output = $(this).find('.range-slider-output');
			var $ui = $(this).find('.range-slider-ui');
			var sliderType = $ui.data('sliderType'),
				min = $ui.data('sliderMin'),
				max = $ui.data('sliderMax'),
				init = $ui.data('sliderInit');

			if ( !/^min$|^max$/.test(sliderType) ) {
				sliderType = !!sliderType;
			}

			$ui.slider({
				range: sliderType,
				min: min,
				max: max,
				animate: true,
				slide: function( event, ui ) {
					if( sliderType === true ) {
		    			$output.text( ui.values[0] + ' - ' + ui.values[1] );
		    		} else {
		    			$output.text( ui.value );
		    		}
				}
	    	});
	    	$ui.slider('option', sliderType === true ? 'values' : 'value', init);
	    	if( sliderType === true ) {
		    	$output.text( $ui.slider('values', 0) + ' - ' + $ui.slider('values', 1) );
		    } else {
		    	$output.text( init );
		    }
		});
		return this;
	};

	return TH;
})( window.TH || {}, jQuery );