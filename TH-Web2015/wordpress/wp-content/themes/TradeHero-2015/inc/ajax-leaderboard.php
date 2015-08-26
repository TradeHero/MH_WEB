<?php
/**
 * Get facebook feed
 */

require get_template_directory() . '/inc/httprequest-helper.php';

add_action( 'wp_ajax_leaderboard', 'tradehero_leaderboard' );
add_action( 'wp_ajax_nopriv_leaderboard', 'tradehero_leaderboard' );

function tradehero_leaderboard() {
	$response = tradehero_request_content('https://www.tradehero.mobi/api/tradehero/web/leaderboards');
	if( $response ) {
		header('Content-Type: application/json');
		echo $response;
	}
	die();
}
?>