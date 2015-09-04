<?php
/**
 * [th_member name="" photo="http://"]
 * @since TradeHero 2.0
 */
function tradehero_member_shortcode( $atts, $content = null ) {
    $a = shortcode_atts( array(
    	'photo'		=> null,
    	'name'		=> null,
    	'position'	=> null,
    	'linkedin'	=> null,
    	'facebook'	=> null,
    	'twitter'	=> null
    ), $atts );

    $name = $a['name'];

    $social_medias = '<ul class="inline">';
    if( !empty( $a['linkedin'] ) ) {
        $social_medias .= '<li><a href="' . $a['linkedin'] . '" title="' . $name . '"" class="linkedin-share border-box"><i class="fa fa-linkedin fa-lg"></i></a></li>';
    }
    if( !empty( $a['facebook'] ) ) {
        $social_medias .= '<li><a href="' . $a['facebook'] . '" title="' . $name . '"" class="facebook-share border-box"><i class="fa fa-facebook fa-lg"></i></a></li>';
    }
    if( !empty( $a['twitter'] ) ) {
        $social_medias .= '<li><a href="' . $a['twitter'] . '" title="' . $name . '"" class="twitter-share border-box"><i class="fa fa-twitter fa-lg"></i></a></li>';
    }
    $social_medias .= '</ul>';


    $compiled = '<figure class="about-us">';
    $compiled .= '<div class="member-avatar">';
    $compiled .= '<img src="' . $a['photo'] . '" alt="' . $name . '">';
    $compiled .= '<div class="meta-social mobile-hide">' . $social_medias . '</div>';
    $compiled .= '</div>';
    $compiled .= '<figcaption>';
    $compiled .= '<h4 class="member-name">' . $name . '</h4>';
    $compiled .= '<h5 class="member-position">' . $a['position'] . '</h5>';
    $compiled .= '<div class="meta-social desktop-hide">';
    $compiled .= $social_medias;
    $compiled .= '</div>';
    $compiled .= '<div class="member-summary">' . $content . '</div>';
    $compiled .= '</figcaption>';
    return $compiled;
}
add_shortcode( 'th_member', 'tradehero_member_shortcode' );
?>