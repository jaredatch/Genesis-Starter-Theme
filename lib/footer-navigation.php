<?php
/**
 * This file activates a seperate menu to be used in in the site footer.
 *
 * @package  JAGenesisBaseTheme
 * @since    1.0.0
 */

/** Register navigation menu for footer area */
register_nav_menu( 'footer', 'Footer Navigation Menu' );

/**
 * Add navigation menu to the footer ( above return to top/credits ).
 *
 * @since 1.3.0
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
