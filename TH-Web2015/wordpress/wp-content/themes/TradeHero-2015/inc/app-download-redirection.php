<?php
/**
 * App download Redirection
 * @since TradeHero 2.0
 */

$android =  stripos( $_SERVER['HTTP_USER_AGENT'], "Android" );
$ipod = stripos( $_SERVER['HTTP_USER_AGENT'],"iPod" );
$iphone = stripos($_SERVER['HTTP_USER_AGENT'],"iPhone");
$ipad    = stripos($_SERVER['HTTP_USER_AGENT'],"iPad");

function redirect($url, $permanent = false)
{
    header('Location: ' . $url, true, $permanent ? 301 : 302);
    exit();
}

if( isset( $_GET['action'] ) && $_GET['action'] == 'download' ) {

	$download_link_ios = get_field('download_link_ios');
	$download_link_andriod = get_field('download_link_andriod');

	if ( !empty( $download_link_andriod ) && $android ) {
		redirect( $download_link_andriod );
	}
	if ( !empty( $download_link_ios ) && ( $ipod || $iphone || $ipad ) ) {
		redirect( $download_link_ios );
	}
}
?>