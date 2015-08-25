=== Shortcode Empty Paragraph Fix ===
Contributors: Jonua
Donate link: 
Tags: shortcode,fix
Requires at least: 2.5
Tested up to: 4.1
Stable tag: 0.2
Version: 0.2

Fix known issues when shortcodes are embedded in a block of content that is filtered by wpautop.

== Description ==

Fix <a href="http://core.trac.wordpress.org/ticket/12061">known issues</a> when shortcodes are embedded in a block of content that is filtered by wpautop.

= for Theme Developers =

If you are developing a theme to provide this on a marketplace, you better embed the following code in your functions.php. This code filters only the shortcodes you defined. Otherwise you risk a failed review because the code in the plugin filters content in general which may is not acceptet.
`
function shortcode_empty_paragraph_fix( $content ) {

	// define your shortcodes to filter, '' filters all shortcodes
	$shortcodes = array( 'your_shortcode_1', 'your_shortcode_2' );
	
	foreach ( $shortcodes as $shortcode ) {
		
		$array = array (
			'<p>[' . $shortcode => '[' .$shortcode,
			'<p>[/' . $shortcode => '[/' .$shortcode,
			$shortcode . ']</p>' => $shortcode . ']',
			$shortcode . ']<br />' => $shortcode . ']'
		);

		$content = strtr( $content, $array );
	}

	return $content;
}

add_filter( 'the_content', 'shortcode_empty_paragraph_fix' );
`

Another solution that is acceptet at the envato (themeforest) marketplace comes from [bitfade](https://gist.github.com/bitfade/4555047 "a Gist on Github").

== Installation ==

1. Upload folder `shortcode-empty-paragraph-fix` to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress

or

If you dont want to use a whole plugin to solve that bug, you can copy the code of the plugin file shortcode-empty-paragraph-fix.php into your theme function.php



== Changelog ==

= 0.1 =
* Initial Release
= 0.2 =
* nicer code writing style