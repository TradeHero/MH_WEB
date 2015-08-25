/**
 * @file formValidate.js
 */

var TH = (function( TH, $ ) {
	TH.formValidate = function() {
		$('form.ajax-form').validate({
			submitHandler: function( form, e ) {
				var message = 'Failed to submit form! Please try again.';
				var $form = $(form);
				$form.ajaxSubmit({
					url: $form.attr('action'),
					dataType: 'text',
					beforeSubmit: function() {
						$form.find('input:submit')
						.attr('disabled', 'disabled')
						.addClass('grey');
						TH().popupLoading();
					},
					success: function( response ) {
						message = response;
					},
					complete: function () {
						TH().popupMessage( message );
						$form.find('input:submit')
						.removeAttr('disabled')
						.removeClass('grey');
					}
				});
				return false;
			}
		});
		return this;
	};

	return TH;
})( window.TH || {}, jQuery );