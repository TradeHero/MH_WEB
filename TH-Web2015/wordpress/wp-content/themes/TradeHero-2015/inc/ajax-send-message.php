<?php
/**
 * Send feedback to support
 * @since TradeHero 2.0
 */
add_action( 'wp_ajax_message', 'tradehero_message' );
add_action( 'wp_ajax_nopriv_message', 'tradehero_message' );

function tradehero_message() {
	function tradehero_send_message( $to, $subject, $message ) {		
		// Build header
		$headers[] = 'Content-Type: text/html; charset=UTF-8';

		if( wp_mail( $to, $subject, $message, $headers ) ) {
			echo 'Your message has been sent successfully!';
		}
		else {
			$admin_email = get_option( 'admin_email' );
			$support_subject = '[ ERROR ] Sending message by tradehero_message failed';
			$support_message = '<p>Domain: ' . $_SERVER['SERVER_NAME'] . '</p>';
			$support_message .= '<p>Source: tradehero_message</p>';
			$support_message .= '<p>To: ' . $to . '</p>';
			$support_message .= '<p>Content: </p>' . $message;
			if( !wp_mail( $admin_email, $support_subject, $support_message, $headers ) )  {
				echo 'Server error! Please report to admin ' . $admin_email . ' mannually. Sorry for the inconvinience.';
			}
		}
	}

	// Form validation
	if( !empty( $_POST ) ) {
		
		$postNameArr = array('to', 'subject', 'message');
	    $exists = 0;
	        
	    foreach ($postNameArr as $postName) {
	        if (array_key_exists($postName, $_POST)){
	             $exists++;
	        }
	    }

	    if( $exists === count( $postNameArr ) ) {
			$to = $_POST['to'];
			$message = $_POST['message'];
			$subject = $_POST['subject'];

			if( !filter_var( $to, FILTER_VALIDATE_EMAIL ) ) {
				echo 'The format of your email address is wrong.';
			} 
			else {
				$message_formated = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
									<html xmlns="http://www.w3.org/1999/xhtml">
									 <head>
									  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
									  <title>Message from TradeHero</title>
									  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
									</head>';
				$message_formated .= '<body style="margin: 0; padding: 0;">';
				$message_formated .= $message;
				$message_formated .= '</body></html>';
				// Send message
				tradehero_send_message( $to, $subject, $message );
			}
		} 
		else {
			echo 'Required fields are not completed.';
		}
	}
	die();
}
?>