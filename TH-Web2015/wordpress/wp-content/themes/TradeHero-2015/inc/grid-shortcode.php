<?php
/**
 * Shortcode of responsive grid systems
 * @since TradeHero 2.0
 * [th_row]
 * 	[th_col tiny="3" medium="4" last="tiny,medium"]
 * [/th_row]
 */

function tradehero_row_shortcode( $attr, $content = null ) {
    $compiled = '<div class="row">';
    $compiled .= do_shortcode( $content );
    $compiled .= '</div>';
    return $compiled;
}
add_shortcode( 'th_row', 'tradehero_row_shortcode' );

function tradehero_column_shortcode( $attr, $content = null ) {
	$a = shortcode_atts( array(
		'all'		=> null,
		'tiny'		=> null,
		'small'		=> null,
		'medium'	=> null,
		'large'		=> null,
		'huge'		=> null,
		'extra'		=> null,
		'right'		=> false,
		'last'		=> false
    ), $attr );

	$medias = ['tiny', 'small', 'medium', 'large', 'huge', 'extra'];
    $compiled = '<div class="column';
    if( !empty( $a['all'] ) ) { 
    	$compiled .= ' ' . tradehero_column_class( null, $a['all'] ); 
    }
    foreach( $medias as $media ) {
		if( !empty( $a[$media] ) ) { 
			$compiled .= ' ' . tradehero_column_class( $media, $a[$media] ); 
		}
	}
	if( !empty( $a['right'] ) ) {
		$compiled .= ' right'; 
	}
	if( !empty( $a['last'] ) ) {
		$last_medias = explode( ',', $a['last'] );
		foreach( $last_medias as $last_media ) {
			$media_name = trim( $last_media );
			if( $media_name == 'all' ) {
				$compiled .= ' last';
			} else {
				$compiled .= ' ' . $media_name . '-last';
			}
		}
	}
    $compiled .= '">';
    $compiled .= do_shortcode( $content );
    $compiled .= '</div>';
    return $compiled;
}
add_shortcode( 'th_col', 'tradehero_column_shortcode' );

function tradehero_column_class( $media = null, $col = null ) {
	$col_name = null;
	switch( $col ) {
		case 1: $col_name = 'one'; break;
		case 2: $col_name = 'two'; break;
		case 3: $col_name = 'three'; break;
		case 4: $col_name = 'four'; break;
		case 5: $col_name = 'five'; break;
		case 6: $col_name = 'six'; break;
		case 7: $col_name = 'seven'; break;
		case 8: $col_name = 'eight'; break;
		case 9: $col_name = 'nine'; break;
		case 10: $col_name = 'ten'; break;
		case 11: $col_name = 'eleven'; break;
		case 12: $col_name = 'twelve'; break;
	}
	return !empty( $col_name ) ? !empty( $media ) ? $media.'-'.$col_name : $col_name : null;
}
?>