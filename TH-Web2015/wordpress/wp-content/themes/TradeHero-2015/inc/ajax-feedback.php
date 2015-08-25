<?php
/**
 * Send feedback to support
 * @since TradeHero 2.0
 */
add_action( 'wp_ajax_feedback', 'tradehero_feedback' );
add_action( 'wp_ajax_nopriv_feedback', 'tradehero_feedback' );

function tradehero_feedback() {
	function tradehero_send_feedback( $to, $from, $name, $message, $type ) {
		$domain = $_SERVER['SERVER_NAME'];
		$subject = '[ ' . $type . ' ] From ' . $name . ' by ' . $domain;
		// Build header
		$headers[] = 'From: ' . $from;
		$headers[] = 'Content-Type: text/html; charset=UTF-8';
		$headers[] = 'Reply-to: ' . $from . ', ' . $to;

		// Format message
		$message_formated = '<p><strong>Type:</strong> ' . $type . '</p>';
		$message_formated .= '<p><strong>From:</strong> ' . $name . '</p>';
		$message_formated .= '<p><strong>Email:</strong> ' . $from . '</p>';
		$message_formated .= '<p><strong>Domain:</strong> ' . $domain . '</p>';
		$message_formated .= '<p><strong>Content:</strong></p>' .  wpautop( html_entity_decode( strip_tags( $message ) ) );

		if( wp_mail( $to, $subject, $message_formated, $headers ) ) {
			echo 'Your message has been sent successfully!';
		}
		else {
			tradehero_backend_invalid( 'Server error! Please mail to ' . $to . ' manually. Sorry for the inconvenience.' );
		}
	}
	function tradehero_backend_invalid( $error ) {
		echo $error;
	}

	// Form validation
	if( !empty( $_POST ) ) {
		
		$postNameArr = array('to', 'email', 'username', 'message', 'type');
	    $exists = 0;
	        
	    foreach ($postNameArr as $postName) {
	        if (array_key_exists($postName, $_POST)){
	             $exists++;
	        }
	    }

	    if( $exists === count( $postNameArr ) ) {
			$to = $_POST['to'];
			$from = $_POST['email'];
			$name = $_POST['username'];
			$message = $_POST['message'];
			$type = $_POST['type'];

			if( !filter_var( $to, FILTER_VALIDATE_EMAIL ) ) {
				tradehero_backend_invalid( 'The format of TO email address is wrong.' );
			} 
			else if( !filter_var( $from, FILTER_VALIDATE_EMAIL ) ) {
				tradehero_backend_invalid( 'The format of your email address is wrong.' );
			}
			else if( strlen( $name ) < 3) {
				tradehero_backend_invalid( 'Name need to be more than 3 charactors.' );
			} 
			else if( strlen( $message ) < 20 ) {
				tradehero_backend_invalid( 'Message need to be more than 20 charactors.' );
			}  
			else {
				// Send message
				tradehero_send_feedback( $to, $from, $name, $message, $type );
			}
		} 
		else {
			tradehero_backend_invalid( 'Required fields are not completed.' );
		}
	}
	die();
}
?>