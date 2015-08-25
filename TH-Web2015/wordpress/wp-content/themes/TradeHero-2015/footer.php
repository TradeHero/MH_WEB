<?php 
/**
 * @package WordPress
 * @subpackage TradeHero-2015
 * @since TradeHero 2.0
 */
?>
<?php get_template_part( 'widget', 'footer' ); ?>

	<script src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>		
	<script	src="https://www.youtube.com/iframe_api"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/js/plugins.min.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/js/beetle.min.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/js/global.min.js"></script>
	
	<!-- Go to www.addthis.com/dashboard to customize your tools -->
	<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-55d18bc40f882c1a" async="async"></script>
	<!-- Google analytics -->
	<script id="google-analytics">
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		ga('create', '<?php the_field('google_analytics_id', 'option'); ?>', 'auto');
		ga('send', 'pageview');
	</script>
	<!-- Facebook js sdk -->
	<div id="fb-root"></div>
	<script id="fb-sdk">(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.0&appId=431745923529834";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>

<?php wp_footer(); ?>
</body>

</html>