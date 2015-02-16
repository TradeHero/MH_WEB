<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<meta name="description" content="">
		<style type="text/css">@-ms-viewport{width: device-width;}</style>
		<title>TradeHero - Mobile App for Social Trading</title>
		<link rel="stylesheet" href="<?php bloginfo( 'template_url' ); ?>/assets/css/layers.min.css" media="screen">
		<link rel="stylesheet" href="<?php bloginfo( 'template_url' ); ?>/assets/css/font-awesome.min.css" media="screen"> 
		<link href="<?php bloginfo( 'stylesheet_url' ); ?>" rel="stylesheet" media="all" type="text/css" />
		<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900,200italic,300italic,400italic,600italic,700italic,900italic' rel='stylesheet' type='text/css'>
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
		<![endif]-->
		<link rel="icon" href="favicon.ico">
		<link rel="apple-touch-icon" href="img/apple-touch-icon.png">
		<link rel="apple-touch-icon" sizes="76x76" href="<?php bloginfo( 'template_url' ); ?>/assets/img/apple-touch-icon-76x76.png">
		<link rel="apple-touch-icon" sizes="120x120" href="<?php bloginfo( 'template_url' ); ?>/assets/img/apple-touch-icon-120x120.png">
		<link rel="apple-touch-icon" sizes="152x152" href="<?php bloginfo( 'template_url' ); ?>/assets/img/apple-touch-icon-152x152.png">
		<?php wp_head(); ?>		
	</head>

	<body <?php body_class(); ?>>

		<header role="banner" class="transparent light">
			<div class="row">
				<div class="nav-inner row-content buffer-left buffer-right even clear-after">
					<div id="brand">
						<h1 class="reset"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php bloginfo( 'template_url' ); ?>/assets/img/th-logo-web.png" alt="logo"></a></h1>
					</div><!-- brand -->
					<a id="menu-toggle" href="#"><i class="fa fa-bars fa-lg"></i></a>
					<?php wp_nav_menu( array( 'theme_location' => 'top', 'container' => 'nav', 'menu_class' => 'reset',  ) ); ?>
				</div><!-- row-content -->	
			</div><!-- row -->	
		</header>

		<main role="main">
