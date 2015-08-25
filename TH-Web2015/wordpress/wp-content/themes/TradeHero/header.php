<!doctype html>

<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

	<head>
		<meta charset="utf-8">

		<!-- Google Chrome Frame for IE -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title><?php wp_title(''); ?></title>

		<!-- mobile meta (hooray!) -->
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

		<!-- icons & favicons (for more: http://www.jonathantneal.com/blog/understand-the-favicon/) -->
		<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/library/images/apple-icon-touch.png">
		<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
		<!--[if IE]>
			<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
		<![endif]-->
		<!-- or, set /favicon.ico for IE10 win -->
		<meta name="msapplication-TileColor" content="#f01d4f">
		<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/library/images/win8-tile-icon.png">

		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

		<!-- Google Web Fonts -->

		<!-- wordpress head functions -->
		<?php wp_head(); ?>
		<!-- ClickTale Top part -->
			<script type="text/javascript">
			var WRInitTime=(new Date()).getTime();
			</script>
		<!-- ClickTale end of Top part -->
		<!-- end of wordpress head -->
		<script type="text/javascript">
		var _tsq = _tsq || [];
		_tsq.push(["setAccountName", "tradehero"]);
		_tsq.push(["fireHit", "tapstream_tracker", []]);

		(function() {
		    function z(){
		        var s = document.createElement("script");
		        s.type = "text/javascript";
		        s.async = "async";
		        s.src = window.location.protocol + "//cdn.tapstream.com/static/js/tapstream.js";
		        var x = document.getElementsByTagName("script")[0];
		        x.parentNode.insertBefore(s, x);
		    }
		    if (window.attachEvent)
		        window.attachEvent("onload", z);
		    else
		        window.addEventListener("load", z, false);
		})();
		</script>
		
		<!-- drop Google Analytics Here -->
		<!-- end analytics -->

	</head>

	<body <?php body_class(); ?>><noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-5GHJQ8"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-5GHJQ8');</script>
		<div id="outer-wrap">
			<nav id="nav" role="navigation">

				<div class="block">
					<a class="close-btn" id="nav-close-btn" href="#top">x</a>
					<?php bones_main_nav(); ?>
				</div>

	    	</nav>
			<div id="inner-wrap">
				<div id="container">
					<!--[if IE]><header class="header IEalpha25" role="banner" ><![endif]-->
					<header class="header" role="banner" >

				
					<div id="inner-header" class="wrap clearfix">
						<div class="brand-strip">
							<a class="nav-btn" id="nav-open-btn" href="#nav" style="float:left;">Site Navigation</a>
							<!-- to use a image just replace the bloginfo('name') with your img src and remove the surrounding <p> -->
							<p id="logo"><a href="<?php echo home_url(); ?>" rel="nofollow"><img src="<?php echo get_template_directory_uri(); ?>/library/images/th-logo-web.png" /></a></p>
						</div>
						<!-- if you'd like to use the site description you can un-comment it below -->
						<?php // bloginfo('description'); ?>
						<nav id="nav-top" role="navigation">
					        <div class="block">
					            <?php bones_main_nav(); ?>
					        </div>
					        <a class="close-btn" id="nav-close-btn" href="#top">x</a>
	    				</nav>
    				</div> <!-- end #inner-header -->

					</header> <!-- end header -->
