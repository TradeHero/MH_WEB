<?php
/**
 * Registration
 * @since TradeHero 2.0
 */
function tradehero_register_category_sidebar () {
	register_sidebar( array(
		'name'			=> __( 'Category Sidebar', 'tradehero' ),
		'id'			=> 'sidebar-category',
		'class'			=> 'category',
		'description'	=> __( 'The main sidebar for category pages', 'tradehero_' ),
		'before_widget' => '<div class="widget">',
		'after_widget'	=> '</div>',
		'before_title'	=> '<h4 class="widget-title"><span class="icon icon-image"></span>',
		'after_title'	=> '</h4>'
	) );
}
add_action( 'widgets_init', 'tradehero_register_category_sidebar' );

?>