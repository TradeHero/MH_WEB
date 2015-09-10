/**
 * @file toggle.js
 */

var TH = (function( TH, $ ) {
	TH.toggle = function() {
		var item = function( $element ) {
			if( $element.length < 1 ) { return this; }

			var activeClass = 'active';
			$element.each(function() {
				var selector = $(this).attr('href');
				var $obj = $(selector);
				var isActive = !$(this).is('.' + activeClass);
				$(this).toggleClass(activeClass);
				$obj.toggleClass(activeClass, isActive);
			});
			return this;
		};
		var group = function( selector, linksSelector ) {
			var $elements = $(selector || '.tabs-title');
			if( $elements.length < 1 ) { return this; }

			var activeClass = 'active';

			$elements.each(function() {
				var $group = $(this);
				var $links = $group.find(linksSelector);
				var init = function() {
					var	$activeLinks = $links.filter('.' + activeClass);
					if( $activeLinks.length>1 ) {
						item( $activeLinks.not(':first') );
					} else {
						item( $links.first() );
					}
				}

				$links.on('click', function(e) {
					e.preventDefault();
					var $this = $(this);
					item( $group.find(linksSelector +'.' + activeClass).not($this) );
					item( $this );
				});
				init();
			});

			return this;
		};
		return {
			item: item,
			group: group
		};
	};

	return TH;
})( window.TH || {}, jQuery );