/**
 * @file cloud.js
 */

var TH = (function( TH, $ ) {
	TH.cloud = function( selector ) {
		var $element = $( selector || '.tag-cloud' );
		if( $element.length < 1 ) { return; }

		$element.each(function(i) {
			var $canvas = $(this).find('canvas'),
				$tags = $(this).find('.tag-cloud-tags');

			if( $canvas.length < 1 || $tags.length < 1 ) { return; }

			var canvasId = 'tag-cloud-canvas-' + i,
				tagsId = 'tag-cloud-tags-' + i;
			$canvas.attr('id', canvasId);
			$tags.attr('id', tagsId);

			$tags.hide();
			$canvas[0].width = $(this).width();

			if( ! $canvas.tagcanvas({
				textColour : '#000',
				outlineThickness : 0,
				outlineMethod: 'block',
				outlineColour: '#eee',
				maxSpeed : 0.05,
				depth : 0.05,
				wheelZoom: false,
				minBrightness: 0.5,
				shadowBlur: 5
		   	}, tagsId) ) {
		   		$canvas.hide();
		   		$tags.show();
			}
		});

		$(window).resize(function() {
			$element.each(function() {
				var $canvas = $(this).find('canvas');
				$canvas.attr('width', $(this).width());
				$canvas.tagcanvas('reload')
			});
		});

		return this;
	};

	return TH;
})( window.TH || {}, jQuery );