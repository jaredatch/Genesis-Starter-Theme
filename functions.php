<?php
/** Start the engine */
require_once( get_template_directory() . '/lib/init.php' );

/** Add support for custom background */
add_custom_background();

/** Add support for custom header */
add_theme_support( 'genesis-custom-header', array( 'width' => 960, 'height' => 90 ) );

/** Add support for 3-column footer widgets */
add_theme_support( 'genesis-footer-widgets', 3 );

/** Add support for structural wraps */
add_theme_support( 'genesis-structural-wraps', array( 'header', 'nav', 'subnav', 'inner', 'footer-widgets', 'footer' ) );

/** Add support for ditor stylesheet */
add_editor_style( 'editor-style.css' );

/** Add support for additional image sizes **/
//add_image_size( 'mini', 50, 50, true );

/** Define site URL to be easily accessed later in the theme */
$site_url = get_bloginfo( 'url' );

/** Register additional sidebar */
//genesis_register_sidebar( array( 'id' => 'sidebar-extra', 'name' => 'Extra Sidebar', 'description'	=> 'Placeholder' ) );

/** Register navigation menu for footer area */
register_nav_menu( 'footer', 'Footer Navigation Menu' );

/**
 * Add navigation menu to the footer ( above return to top/credits )
 */
function ja_footer_navigation(){
	if ( has_nav_menu( 'footer' ) ) {
		$footer_menu_args = array(
			'theme_location' => 'footer',
			'container_id' => 'footernav',
			'depth' => 1
		);
		wp_nav_menu(  $footer_menu_args );
	}
}
add_action( 'genesis_footer', 'ja_footer_navigation', 5 );

/**
 * Global javascript. Enqueue it we will.
 */
function ja_global_js() {
	// Register Scripts
	wp_register_script( 'js-global', CHILD_URL . '/lib/js/global.js', array ( 'jquery' ), '', true );
	// Enqueue Scripts
	wp_enqueue_script( 'js-global' );
}
add_action( 'wp_enqueue_scripts', 'ja_global_js' );

/**
 * Don't Update Theme
 * If there is a theme in the repo with the same name, 
 * this prevents WP from prompting an update.
 *
 * @link http://markjaquith.wordpress.com/2009/12/14/excluding-your-plugin-or-theme-from-update-checks/
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