/**
 * @file toggle.js
 */

var TH = (function( TH, $ ) {
	TH.toggle = function() {
		return {
			item: function( $element ) {
				if( $element.length < 1 ) { return this; }

				var activeClass = 'active';
				$element.each(function() {
					var selector = $(this).attr('href');
					var $obj = $(selector);
					var isActive = !$(this).is('.' + activeClass);
					$(this).toggleClass(activeClass);
					$obj.toggleClass(activeClass, isActive);
					// $element[(isActive ? 'add' : 'remove') + 'Class'](activeClass);
				});
				return this;
			},
			group: function( selector, linksSelector ) {
				var $elements = $(selector || '.tabs-title');
				var that = this;
				if( $elements.length < 1 || !this.item ) { return this; }

				var activeClass = 'active';

				$elements.each(function() {
					var $links = $(this).find(linksSelector);
					var	$activeLinks = $links.filter('.' + activeClass);
					if( $activeLinks.length>1 ) {
						that.item( $activeLinks.not(':first') );
					} else {
						that.item( $links.first() );
					}

					$links.on('click', function(e) {
						e.preventDefault();
						var $this = $(this);
						that.item( $links.filter('.' + activeClass).not($this) );
						that.item( $this );
					});
				});

				return this;
			}
		};
	};

	return TH;
})( window.TH || {}, jQuery );