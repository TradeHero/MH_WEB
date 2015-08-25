<?php
/**
 * [th_slider type="video" autoplay="3000"]
 * @since TradeHero 2.0
 */
function tradehero_slider_shortcode( $atts, $content = null ) {
    $a = shortcode_atts( array(
    	'type'		=> 'desktop',
    	'autoplay'	=> 3000
    ), $atts );

    $html = '';

    switch( $a['type'] ) {
    	case 'video':
    		$html .= '<div class="slider desktop-slider video-slider" data-autoplay="' . $a['autoplay'] . '"><figure>';
    		$html .= do_shortcode( $content );
    		$html .= '</figure></div>';
    		break;
    	default:
    		$html .= '<div class="slider desktop-slider" data-autoplay="' . $a['autoplay'] . '"><figure>';
    		$html .= do_shortcode( $content );
    		$html .= '</figure></div>';
    }

    return $html;
}
add_shortcode( 'th_slider', 'tradehero_slider_shortcode' );
?>