/**
 * @file shuffleExtends.js
 */

var TH = (function( TH, $ ) {
	TH.shuffleExtends = function() {
		return {
			ajaxInit: function( selector ) {
				var $element = $(selector || '.ajax-get-helper');
				if( $element.length<1 ) { return this; }
				$element.each(function() {
					var $this = $(this);
					var promise = $this.data('promise');
					if( !promise ) { return; }

					var $shuffleContainer = $this.parent('.grid-items');
					if( $shuffleContainer.length < 1 ) { return; }

					promise.done(function( ) {
						var $newItems = $this.data('appended');
						if( !$newItems || $newItems.length < 1 ) { return; }

						$shuffleContainer.shuffle( 'destroy' );
						$shuffleContainer.shuffle({
	                        itemSelector: '.item',
	                        sizer: $shuffleContainer.find('.shuffle-sizer'),
	                        speed: 500,
	                        easing: 'ease-out',
	                    });
	                    $newItems.find('img').hide()
	                    .one('load', function() {
	                    	$(this).show();
	                    	$shuffleContainer.shuffle('layout');
	                    })
	                    .each(function() {
	                    	if( this.complete ) {
	                    		$(this).trigger('load');
	                    	}
	                    });
					});
				});
				return this;
			},
			fbReload: function() {
				if( $('#fb-root').length<1 ) { return this; }
				var timeout;
				var reload = function() {
					if( typeof(FB) === 'undefined' ) {
						clearTimeout(timeout);
						timeout = setTimeout( function() {
							reload();
						}, 500); 
					} else {
						FB.XFBML.parse();

						var $fbItems = $('.fb-like, .fb-follow');
						$fbItems.parents('.shuffle').shuffle('layout');
					}
				}
				reload();
				return this;
			}
		};
	};

	return TH;
})( window.TH || {}, jQuery );