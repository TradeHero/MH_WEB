<!doctype html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge"><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <title><?php wp_title(); ?> | <?php bloginfo( 'name' ); ?></title>
    <meta name="description" content="TradeHero">
    <meta name="keywords" content="TradeHero">
    <meta name="google-site-verification" content="X9vYAZ-RIy0L_TZVlP0xzMMd_lPqfX-bevQ83zep4GI" />

    <link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/img/favicon.ico">
    <link rel="apple-touch-icon" href="<?php bloginfo('template_directory'); ?>/img/apple-touch-icon.jpg">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php bloginfo('template_directory'); ?>/img/apple-touch-icon-72x72.jpg">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php bloginfo('template_directory'); ?>/img/apple-touch-icon-114x114.jpg">
    <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/bootstrap.min.css" type="text/css" media="all" />
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/font-awesome.min.css" type="text/css" media="all" />
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/font-lineicons.css" type="text/css" media="all" />
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/animate.css" type="text/css" media="all" />
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/toastr.min.css" type="text/css" media="all" />
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/style.css" type="text/css" media="all" />
	<link href="<?php bloginfo('stylesheet_url');?>" type="text/css" rel="stylesheet" media="screen, projection" />
    
    <!--[if lt IE 9]>
        <script src="<?php bloginfo('template_directory'); ?>/js/html5.js"></script>
        <script src="<?php bloginfo('template_directory'); ?>/js/respond.min.js"></script>
    <![endif]-->
	<?php wp_head(); ?>
</head>	
<body id="<?php print(is_front_page()?"landing-page":"page-id-".get_the_ID()); ?>" <?php body_class(); ?>>

    <!-- Preloader -->
    <div id="mask">
        <div id="loader"></div>
    </div>

    <header>
        <nav class="navigation navigation-header">
            <div class="container">
                <div class="navigation-brand">
                    <div class="brand-logo">
                        <a href="<?php echo home_url(); ?>" class="logo">
                                        
                        </a>
                        <span class="sr-only">TradeHero</span>
                    </div>
                    <button class="navigation-toggle visible-xs" type="button" data-toggle="dropdown" data-target=".navigation-navbar">
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                    </button>
                </div>

                <!-- Country Selector -->
                 
					<div class="country-selector">
	                 	<ul>
	                 		<li><a href="http://en.tradehero.mobi">International</a></li>
	                 		<li><a href="http://cn.tradehero.mobi">中国</a></li>
	                 	</ul>
                 </div>	

                <?php wp_nav_menu( array('menu' =>'Header', 'container_class' => 'navigation-navbar', 'menu_class' => 'navigation-bar navigation-bar-right' ) ); ?>

            </div>
        </nav>
    </header>   
        
    




	
    
    
    
    	
    	
