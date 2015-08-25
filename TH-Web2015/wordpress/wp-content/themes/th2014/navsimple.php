<header id="navigation-simple">
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

             <?php wp_nav_menu( array('menu' =>'Header', 'container_class' => 'navigation-navbar', 'menu_class' => 'navigation-bar navigation-bar-right' ) ); ?>
        </div>
    </nav>
</header>   