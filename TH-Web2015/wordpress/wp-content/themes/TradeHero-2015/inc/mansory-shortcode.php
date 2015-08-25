<?php
/**
 * Shortcode of mansory
 * @since TradeHero 2.0
 */

function tradehero_mansory_shortcode( $attr, $content = null ) {
	$a = shortcode_atts( array(
		'sizer' => '25%'
    ), $atts );
    $compiled = '<div class="grid-items preload">';
    $compiled .= '<div class="shuffle-sizer" style="width:' . $a['sizer'] . ';"></div>';
    $compiled .= do_shortcode( $content );
    $compiled .= '</div>';
    return $compiled;
}
add_shortcode( 'th_mansory', 'tradehero_mansory_shortcode' );
?>