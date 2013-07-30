<?php
/**
 * This is the file contains functions and snippets that enable
 * responsivene functionality in the theme.
 *
 * @package  JAGenesisBaseTheme
 * @since    1.5.0
 */

/**
 * Enqueues needed for responsive design
 *
 * In the past we used a lengthy custom walker to create mobile friendly
 * navigation. Now we generate those menus on the fly using javascript via
 * responsive.js.
 *
 * @since 2.0.0
 */
function ja_responsive_js() {
	wp_enqueue_script( 'responsive', CHILD_URL . '/lib/js/responsive.js', array( 'jquery' ), CHILD_THEME_VERSION, false );
}
add_action( 'wp_enqueue_scripts', 'ja_responsive_js' );

/**
 * Set viewport for responsiveness
 *
 * @since 1.5.0
 */
function ja_viewport(){
	echo '<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />' . "\n";
}
add_action( 'wp_head', 'ja_viewport' );