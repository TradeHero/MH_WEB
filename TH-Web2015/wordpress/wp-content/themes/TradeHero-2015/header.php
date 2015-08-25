<?php
/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <main>
 *
 * @package WordPress
 * @subpackage TradeHero-2015
 * @since TradeHero 2.0
 */
?><!DOCTYPE html>

<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html  <?php language_attributes(); ?> class="no-js"><!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="description" content="The Page Description">
	<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">

	<title><?php wp_title( '|', true, 'right' ); ?></title>

	<style type="text/css">@-ms-viewport{width: device-width;}</style>
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/th2014-src/css/font-lineicons.css" media="screen">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/screen.min.css" media="screen">
	
	<!-- jQuery -->
	<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.min.js"></script>
	
	<!-- GruntIcon -->
	<script src="<?php echo get_template_directory_uri(); ?>/js/grunticon.loader.min.js"></script>
	<script>grunticon(["<?php echo get_template_directory_uri(); ?>/css/icons.svg.min.css", "<?php echo get_template_directory_uri(); ?>/css/icons.png.min.css", "<?php echo get_template_directory_uri(); ?>/css/icons.fallback.min.css"]);</script>
	<noscript><link href="icons.fallback.min.css" rel="stylesheet"></noscript>
	
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,400,700' rel='stylesheet' type='text/css'>

	<!--[if lt IE 9]>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
	<![endif]-->

	<!-- Favicons -->
	<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicons/favicon.ico">
	<link rel="apple-touch-icon" sizes="60x60" href="<?php echo get_template_directory_uri(); ?>/favicons/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/favicons/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="<?php echo get_template_directory_uri(); ?>/favicons/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/favicons/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="<?php echo get_template_directory_uri(); ?>/favicons/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_template_directory_uri(); ?>/favicons/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="<?php echo get_template_directory_uri(); ?>/favicons/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri(); ?>/favicons/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192"  href="<?php echo get_template_directory_uri(); ?>/favicons/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri(); ?>/favicons/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="<?php echo get_template_directory_uri(); ?>/favicons/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri(); ?>/favicons/favicon-16x16.png">
	<link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/favicons/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/favicons/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">
	
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<header role="banner" class="light">
		<div class="row">
			<div class="nav-inner row-content buffer-left buffer-right even clear-after">
				<div id="brand">
					<h1 class="reset"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo bloginfo('name'), ' | ', bloginfo('description'); ?>" class="icon icon-logo"></a></h1>
				</div>

				<?php
					wp_nav_menu( array(
						'theme_location'	=> 'language',
						'container'			=> 'div',
						'container_class'	=> 'mobile-hide breadcrumb language-options',
						'depth'				=> 1
					) );
				?>
				<nav class="keep-right nav" role="navigation">
					<a id="menu-toggle" href="#"><i class="fa fa-bars fa-lg"></i></a>
					<?php
						wp_nav_menu( array(
							'theme_location'	=> 'header_menu',
							'container'			=> false,
							'menu_class'		=> 'reset',
							'menu_id'			=> 'menu',
							'depth'				=> 1
						) );
					?>
					<?php
						wp_nav_menu( array(
							'theme_location'	=> 'language',
							'container'			=> false,
							'menu_class'		=> 'desktop-hide breadcrumb language-options',
							'depth'				=> 1
						) );
					?>
				</nav>
			</div>	
		</div>
	</header>