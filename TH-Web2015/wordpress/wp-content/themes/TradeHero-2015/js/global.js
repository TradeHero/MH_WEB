/*!
 * global.js
 */
(function($) {
	
	$(function() {
		TH.ajaxHelpers().get();
		TH.phoneScreen().init();
		TH.templateExtends();
		TH.fullpage();
		TH.toggle().group('.tabs-title', 'a').group('.calendar-vertical', 'li>a');
		TH.rangeSlider();
		TH.popup().init();
		TH.leaderboard().init();
		TH.youtube().videoInit();
		TH.formValidate();
		TH.shuffleExtends().ajaxInit().fbReload();
		TH.owlCarouselExtends().init('.video-slider').deepLink();
		TH.cloud();

		$('select').selectmenu();
		// $('.calendar-vertical').accordion();
		
	});

})(jQuery);