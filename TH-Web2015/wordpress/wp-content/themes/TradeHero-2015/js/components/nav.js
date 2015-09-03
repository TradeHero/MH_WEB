/**
 * @file nav.js
 */

var TH = (function( TH, $ ) {
	TH.nav = function() {
		return {
			initSectionNavs: function(sectionSelector, navSelector) {
				var $nav = $(navSelector || '#menu li');
				if( $nav.length < 1 ) { return this; }

				$(sectionSelector || '.section').onScreen({
					tolerance: 100,
					toggleClass: 'active',
					doIn: function() {
						var id = $(this).attr('id');
						if( !id ) { return; }
						var $activeNav = $nav.filter('[data-menuanchor=' + id + ']');
						$nav.not( $activeNav ).removeClass('active');
						$activeNav.addClass('active');
					}
				});
		    	return this;
			}
		};
	};

	return TH;
})( window.TH || {}, jQuery );