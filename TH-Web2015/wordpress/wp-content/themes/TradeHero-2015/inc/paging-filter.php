<?php
/**
 * @since TradeHero 2.0
 */

add_filter( 'next_posts_link_attributes', 'tradehero_posts_link_attributes' );
add_filter( 'previous_posts_link_attributes', 'tradehero_posts_link_attributes' );
function tradehero_posts_link_attributes() {
    return 'class="button blue"';
}

add_filter( 'next_post_link', 'tradehero_post_link', 10, 2 );
add_filter( 'previous_post_link', 'tradehero_post_link', 10, 2 );
function tradehero_post_link( $format, $link ) {
	if( preg_match( '/<a[^>]*class="/', $format ) ) {
		$format = str_replace( 'class="', 'class="button blue ', $format );
	}
	else {
		$format = str_replace( '<a', '<a class="button blue"', $format );
	}
	return $format;
}
?>