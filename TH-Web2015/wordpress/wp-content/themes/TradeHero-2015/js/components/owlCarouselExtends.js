/**
 * @file owlCarouselExtends.js
 */

var TH = (function( TH, $ ) {
	TH.owlCarouselExtends = function() {
		return {
			init: function( selector ) {
				var $element = $( selector || '.slider' );
				if( $element.length < 1 ) { return this; }

				var init = function( $el ) {
					var autoplay = $el.data('autoplay');
					$el.owlCarousel({
		                singleItem: true,
		                autoPlay: autoplay || false,
		                stopOnHover: true,
		                responsiveBaseWidth: ".slider",
		                responsiveRefreshRate: 0,
		                addClassActive: true,
		                navigation: true,
		                navigationText: [
		                    "<i class='fa fa-chevron-left'></i>",
		                    "<i class='fa fa-chevron-right'></i>"
		                ],
		                pagination: false,
		                rewindSpeed: 2000,
		                beforeMove: function() {
		                    // Stop YouTube video when the carousel moves
		                    var youtube = this.$elem.find('.youtube-video.playing').data('youtube');
		                    if( youtube && typeof(youtube.stopVideo) === 'function' ) {
		                        youtube.pauseVideo();
		                    }
		                }
		            });
					$el.find('.owl-wrapper-outer').after('<div class="mockup desktop-mockup"></div>');
				};
			
				$element.each(function() {
					var $this = $(this);
					var $ajaxRequest = $this.find('.ajax-get-helper');
					var ajaxRequestLength = $ajaxRequest.length;

					if( ajaxRequestLength > 0 ) {
						var requestDone = 0;
						$ajaxRequest.each(function() {
							var promise = $(this).data('promise');
							if( !promise ) {
								requestDone ++;
							} else {
								promise.done(function() {
									requestDone ++;
									if( requestDone === ajaxRequestLength ) {
										init( $this.find('figure') );
									}
								});
							}
						});
					} else {
						init( $this.find('figure') );
					}
				});
        		return this;
			},
			deepLink: function( selector ) {
				var $element = $( selector || '.owl-deep-link' );
				if( $element.length < 1 ) { return this; }
				var $anchors = $element.find('[data-owl-anchor]');

				$element.on('click', '[data-owl-anchor]', function(e) {
					e.preventDefault();

					var anchor = $(this).data('owlAnchor');
					var $wrapper = $(e.delegateTarget);
					var $owl = $wrapper.find('.owl-carsousel').data('owlCarousel');
					if( !$owl || !/^[0-9]+$/.test(anchor.toString()) ) { return; }

					$wrapper.find('[data-owl-anchor]').removeClass('active');
					$(this).addClass('active');
					$owl.goTo( anchor );
				});
				if( $anchors.filter('.active').length < 1 ) {
					$anchors.first().click();
				}

				return this;
			}
		};
	};

	return TH;
})( window.TH || {}, jQuery );