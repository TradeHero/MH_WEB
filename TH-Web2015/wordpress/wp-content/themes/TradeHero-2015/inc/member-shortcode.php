<?php
/**
 * [th_member name="" photo="http://"]
 * @since TradeHero 2.0
 */
function tradehero_member_shortcode( $atts ) {
    $a = shortcode_atts( array(
    	'photo'		=> null,
    	'name'		=> null,
    	'position'	=> null,
    	'intro'		=> null,
    	'linkedin'	=> null,
    	'facebook'	=> null,
    	'twitter'	=> null
    ), $atts );

    $name = $a['name'];

    $compiled = '<figure class="about-us">';
    $compiled .= '<div class="member-avatar">';
    $compiled .= '<img src="' . $a['photo'] . '" alt="' . $name . '">';
    $compiled .= '<div class="meta-social"><ul class="inline">';
    if( !empty( $a['linkedin'] ) ) {
    	$compiled .= '<li><a href="' . $a['linkedin'] . '" title="' . $name . '"" class="linkedin-share border-box"><i class="fa fa-linkedin fa-lg"></i></a></li>';
    }
    if( !empty( $a['facebook'] ) ) {
    	$compiled .= '<li><a href="' . $a['facebook'] . '" title="' . $name . '"" class="facebook-share border-box"><i class="fa fa-facebook fa-lg"></i></a></li>';
    }
    if( !empty( $a['twitter'] ) ) {
    	$compiled .= '<li><a href="' . $a['twitter'] . '" title="' . $name . '"" class="twitter-share border-box"><i class="fa fa-twitter fa-lg"></i></a></li>';
    }
    $compiled .= '</ul></div></div>';
    $compiled .= '<figcaption>';
    $compiled .= '<h4 class="member-name">' . $name . '</h4>';
    $compiled .= '<h5 class="member-position">' . $a['position'] . '</h5>';
    $compiled .= '<p class="member-summary">' . $a['intro'] . '</p>';
    $compiled .= '</figcaption>';
    return $compiled;
}
add_shortcode( 'th_member', 'tradehero_member_shortcode' );
?>