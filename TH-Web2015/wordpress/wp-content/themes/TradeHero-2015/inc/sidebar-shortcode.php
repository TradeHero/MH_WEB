<?php
/**
 * [th_sidebar name="sidebar-category"]
 * @since TradeHero 2.0
 */
function tradehero_dynamic_sidebar_shortcode( $atts ) {
    $a = shortcode_atts( array(
    	'name'		=> null
    ), $atts );
    if( is_active_sidebar( $a['name'] ) ) {
    	return dynamic_sidebar( $a['name'] );
	}
}
add_shortcode( 'th_sidebar', 'tradehero_dynamic_sidebar_shortcode' );
?>