/**
 * @file popup.js
 */

var TH = (function( TH, $ ) {
	TH.popup = function() {
		return {
			init: function( ) {
				if( $('.popup').length > 0 ) {
					$('.popup').magnificPopup({
						removalDelay: 500,
						callbacks: {
							beforeOpen: function() {
							   this.st.mainClass = this.st.el.attr('data-effect');
							}
						},
						midClick: true
					});

				}
				if( $('.popup-ajax').length > 0 ) {
					$('.popup-ajax').magnificPopup({
						type: 'ajax',
						overflowY: 'scroll',
						removalDelay: 500,
						callbacks: {
							beforeOpen: function() {
							   this.st.mainClass = this.st.el.attr('data-effect');
							}
						},
						midClick: true
					});

				} else if( $('.popup-youtube').length > 0 ) {
					$('.popup-youtube').magnificPopup({
						disableOn: 700,
						type: 'iframe',
						mainClass: 'mfp-fade',
						removalDelay: 160,
						preloader: false,
						fixedContentPos: false,
						callbacks: {
							beforeOpen: function() {
							   this.st.mainClass = this.st.el.attr('data-effect');
							},
							open: function() {
								// Force https protocal (temporary for no web server environment)
								var $iframe = this.content.find('iframe');
								$iframe.attr('src', $iframe.attr('src').replace(/^\/\//, 'https://'));
							}
						}
					});
				}
				return this;
			},
			loading: function () {
				$.magnificPopup.open({
					items: {
						src: '<div class="loading"></div>',
						type: 'inline'
					}
				});
			},
			message: function( message ) {
				$.magnificPopup.open({
					items: {
						src: '<div class="popup-message">' + message + '</div>',
						type: 'inline'
					}
				});
			}
		};
	};

	return TH;
})( window.TH || {}, jQuery );