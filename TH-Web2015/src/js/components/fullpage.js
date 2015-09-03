/**
 * @file fullpage.js
 */

var TH = (function( TH, $ ) {
	TH.fullpage = function() {
		if( $('#fullpage').length<1 ) { return this; }

		var that = this;
		var scrollEnabled = true;
		var $fullpage = $('#fullpage');
		var $sections = $fullpage.find('.section');
		var $menus = $('.fullpage-anchor').not('[data-menuanchor]');
		var anchors = [];
		var enabled = false;

		function enable() {
			var $window = $(window);
			return $window.width() >= 1024 && $window.height() >= 720;
		}
		function init() {
			enabled = true;
			$sections.removeAttr('id');
			$fullpage.fullpage({
				anchors: anchors,
				menu: '#menu',
				slidesNavigation: true,
				slidesNavPosition: 'bottom',
			 	navigation: false,
		        showActiveTooltip: false,
		        verticalCentered: true,
		        recordHistory: true,
		        loopHorizontal: true,
		        scrollOverflow: false,
		        fitToSection: true,
		        afterRender: function() {
		        	// Fix: autoplay not work
		        	$('video[autoplay]:visible').each(function() {
		        		this.play();
		        	});
		        },
		        afterResize: function() {
					if( enable() ) { return; }
		        	destroy();
		        }
			});
		}
		function destroy() {
        	$.fn.fullpage.destroy('all');
        	enabled = false;
        	$(window).resize(function() {
        		if( enable() && !enabled ) {
        			init();
        		}
        	});
		}

		$sections.each(function() {
			anchors.push( this.id );
		});

		$menus.each(function() {
			var $link = $(this).find('a[href]');
			var anchor = $link.attr('href').match(/#([\w^#]*)$/);
			if( anchor && anchor[1] ) {
				$(this).attr('data-menuanchor', anchor[1]);
			}
		});

		if( enable() ) {
			init();
		} else {
			$(window).resize(function() {
        		if( enable() && !enabled ) {
        			init();
        		}
        	});
		}

		return this;
	};

	return TH;
})( window.TH || {}, jQuery );