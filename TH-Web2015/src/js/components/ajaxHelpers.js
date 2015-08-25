/**
 * @file ajaxHelpers.js
 */

var TH = (function( TH, $ ) {
	TH.ajaxHelpers = function() {
		return {
			get: function( selector ) {
				var $element = $(selector || '.ajax-get-helper');
				if( $element.length<1 ) { return this; }

				$element.each(function() {
					var $this = $(this);
					var request = $this.data('request');
					var promise;
					if( !request ) { return; }

					promise = $.get(request).done(function( response ) {
						if( !response ) { return; }
						var templateSrc = $this.html();
						var html = template.compile(templateSrc)(response);
						var $inserted;
						$inserted = $(html).insertAfter( $this );
						$this.data('appended', $inserted);
					});
					promise.fail(function(){
						// Fail handler
					});
					$this.data('promise', promise);
				});
				return this;
			}
		};
	};

	return TH;
})( window.TH || {}, jQuery );