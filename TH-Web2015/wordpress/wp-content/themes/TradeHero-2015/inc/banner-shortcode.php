<?php
/**
 * @since TradeHero 2.0
 * [th_banner 
 * autoplay="5000" 
 * navigation="true" 
 * pagination="true" 
 * transition="fade" 
 * strech="false"]
 * [/th_banner]
 */
function tradehero_banner_shortcode( $atts, $content = null ) {
    $a = shortcode_atts( array(
    	'height'		=> 534,
    	'autoplay'		=> 5000,
    	'navigation'	=> true,
    	'pagination'	=> true,
    	'autoheight'	=> false,
    	'transition'	=> 'fade',
    	'stretch'		=> false
    ), $atts );

    if( empty($content) ) { return; }

    $compiled = '<div id="intro-wrap" class="';
    $compiled .= ( $a['autoheight'] ? 'autoheight' : 'fixedheight' );
    $compiled .= ' ' . ( $a['stretch'] ? 'stretch' : 'no-stretch' );
    $compiled .= '" data-height="' . ( $a['height'] / 16 ) . '">';
	$compiled .= '<div id="intro" class="preload"';
	$compiled .= ' data-autoplay="' . tradehero_boolean_to_string( $a['autoplay'] ) . '"';
	$compiled .= ' data-autoheight="' . tradehero_boolean_to_string( $a['autoheight'] ) . '"';
	$compiled .= ' data-navigation="' . tradehero_boolean_to_string( $a['navigation'] ) .'"'; 
	$compiled .= ' data-pagination="' . tradehero_boolean_to_string( $a['pagination'] ) .'"';
	$compiled .= ' data-transition="' . $a['transition'] .'">';
	$compiled .= do_shortcode( $content );
	$compiled .= '</div></div>';
    return $compiled;
}
add_shortcode( 'th_banner', 'tradehero_banner_shortcode' );

function tradehero_banner_item_shortcode( $atts, $content = null ) {
	$a = shortcode_atts( array(
    	'background_color'	=> null,
    	'image'				=> null,
    	'caption'			=> null,
    	'link'				=> null
    ), $atts );
	$has_link = !empty( $a['link'] );

	$compiled = '<div';
	if( $has_link ) {
		$compiled = '<a href="' . $a['link'] . '"';
	}
	$compiled .= ' class="intro-item" style="';
	$compiled .= 'background-image: url(' . $a['image'] . ');';
	$compiled .= 'background-color:' . $a['background_color'] . ';';
	$compiled .= '">';
	if( !empty( $a['caption'] ) ) {
		$compiled .= '<div class="photocaption"><h4>';
		$compiled .= $a['caption'];
		$compiled .= '</h4></div>';
	}
	$compiled .= '<div class="row-content buffer intro-content">';
	$compiled .= do_shortcode( $content );
	$compiled .= '</div>';
	if( $has_link ) {
		$compiled .= '</a>';
	} else {
		$compiled .= '</div>';
	}
	return $compiled;
}
add_shortcode( 'th_banner_item', 'tradehero_banner_item_shortcode' );
?>