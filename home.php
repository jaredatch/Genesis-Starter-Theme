<?php
/**
 * This is the homepage template file.
 *
 * @package  JAGenesisBaseTheme
 * @since    1.0.0
 */

/** Force full width layout */
add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );

genesis();