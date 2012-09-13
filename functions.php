<?php
/**
 * This is the primary functions file for the Genesis Base Theme.
 *
 * @package  JAGenesisBaseTheme
 * @since    1.0.0
 * @link     https://github.com/jaredatch/Genesis-Starter-Theme
 */

/** Includes */
require_once( get_template_directory() . '/lib/init.php' ); // Start Genesis
require_once( CHILD_DIR . '/lib/genesis-cleanup.php'     ); // Tweak Genesis functionality
require_once( CHILD_DIR . '/lib/responsive.php'          ); // Add responsive functionality
require_once( CHILD_DIR . '/lib/footer-navigation.php'   ); // Add footer navigation functionality

/** Add theme support for various features */
add_theme_support( 'custom-background',      array( 'default-color' => 'f9f9f9' )    );
add_theme_support( 'genesis-custom-header',  array( 'width' => 960, 'height' => 90 ) );
add_theme_support( 'genesis-footer-widgets', 3                                       );

/** Add support for ditor stylesheet */
add_editor_style( 'style-editor.css' );

/**
 * Set HTML5 doctype
 *
 * @since 1.5.0
 */
function ja_html5_doctype() {
?>
<!doctype html>
<html <?php language_attributes( 'html' ); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<?php
}
remove_action( 'genesis_doctype', 'genesis_do_doctype' );
add_action( 'genesis_doctype', 'ja_html5_doctype' );

/**
 * Global javascript. Enqueue it we will.
 *
 * @since 1.0.0
 */
function ja_global_js() {
	// Register Ssripts
	wp_enqueue_script( 'global', CHILD_URL . '/lib/js/global.js', array( 'jquery' ), '1.0', false );
}
add_action( 'wp_enqueue_scripts', 'ja_global_js' );

/**
 * Don't Update Theme
 * If there is a theme in the repo with the same name, 
 * this prevents WP from prompting an update.
 *
 * @link http://markjaquith.wordpress.com/2009/12/14/excluding-your-plugin-or-theme-from-update-checks/
 * @author Mark Jaquith
 * @since 1.0.0
 */
function ja_prevent_theme_update( $r, $url ) {
	if ( 0 !== strpos( $url, 'http://api.wordpress.org/themes/update-check' ) )
		return $r; // Not a theme update request. Bail immediately.
	$themes = unserialize( $r['body']['themes'] );
	unset( $themes[ get_option( 'template' ) ] );
	unset( $themes[ get_option( 'stylesheet' ) ] );
	$r['body']['themes'] = serialize( $themes );
	return $r;
}
add_filter( 'http_request_args', 'ja_prevent_theme_update', 5, 2 );