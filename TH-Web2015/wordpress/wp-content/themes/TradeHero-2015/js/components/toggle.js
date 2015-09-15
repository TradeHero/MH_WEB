/**
 * @file toggle.js
 */

var TH = (function( TH, $ ) {
	TH.toggle = function() {
		var item = function( $element, isActivate ) {
			if( $element.length < 1 ) { return this; }

			var activeClass = 'active';
			$element.each(function() {
				var selector = $(this).attr('href');
				var $obj = $(selector);
				var isActive = typeof(isActivate) !== 'undefined' ? isActivate : !$(this).is('.' + activeClass);
				$(this).toggleClass(activeClass, isActive);
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
					if( $activeLinks.length>0 ) {
						$activeLinks.removeClass(activeClass);
						item( $activeLinks.first(), true);
					} else {
						item( $links.first(), true );
					}
				}

				$links.on('click', function(e) {
					e.preventDefault();
					var $this = $(this);
					item( $group.find(linksSelector +'.' + activeClass).not($this), false );
					item( $this, true );
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