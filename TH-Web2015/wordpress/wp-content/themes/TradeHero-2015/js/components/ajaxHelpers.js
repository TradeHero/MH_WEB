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

					var $loader = $('<div class="loading"/>').insertBefore($this);
					promise = $.get(request).done(function( response ) {
						if( !response ) { return; }
						if( typeof(response) === 'string' ) { 
							response = JSON.parse(response); 
						}
						if( Array.isArray(response) ) { 
							response = {
								data: response
							};
						}
						var templateSrc = $this.html();
						var html = template.compile(templateSrc)(response);
						var $inserted;
						$inserted = $(html).insertAfter( $this );
						$this.data('appended', $inserted);
					}).fail(function(){
						// Fail handler
					}).always(function() {
						$loader.remove();
					});
					$this.data('promise', promise);
				});
				return this;
			}
		};
	};

	return TH;
})( window.TH || {}, jQuery );