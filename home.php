<?php
/**
 * This is the homepage template file.
 *
 * @package  JAGenesisBaseTheme
 * @since    1.0.0
 */

// Force full width layout
add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );

// Remove Genesis default loop
remove_action( 'genesis_loop', 'genesis_do_loop' );

/**
 * Homepage enqueues
 *
 * @since 2.0.0
 */
function ja_homepage_enqueues() {
	// javascript
	wp_enqueue_script( 'global', CHILD_URL . '/lib/js/home.js', array( 'jquery' ), CHILD_THEME_VERSION, false );
}
add_action( 'wp_enqueue_scripts', 'ja_homepage_enqueues' );

/**
 * Content to replace the default loop
 *
 * @since 2.0.0
 */
function ja_homepage_content() {

	echo 'This is the homepage.';

}
add_action( 'genesis_loop', 'ja_homepage_content' );

genesis();