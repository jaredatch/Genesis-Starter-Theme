<?php
/**
 * This is the primary functions file for the Genesis Base Theme.
 *
 * @package  JAGenesisBaseTheme
 * @since    1.0.0
 * @link     https://github.com/jaredatch/Genesis-Starter-Theme
 */

// Start the engine!
require_once( get_template_directory() . '/lib/init.php' ); // Start Genesis

// Child theme constants
define( 'CHILD_THEME_NAME',    'Genesis Starter Theme'                              );
define( 'CHILD_THEME_URL',     'https://github.com/jaredatch/Genesis-Starter-Theme' );
define( 'CHILD_THEME_VERSION', '2.0.0'                                              );

// Add support for Genesis footer widgets
add_theme_support( 'genesis-footer-widgets', 3 );

// Add support for custom background
add_theme_support( 'custom-background', array( 'default-color' => 'f9f9f9' ) );

// Add except to pages
add_post_type_support( 'page', 'excerpt' );

// Add support for editor stylesheet
add_editor_style( 'style-editor.css' );

// Add additional image sizes - below is simply a placeholder
add_image_size( 'mini', 50, 50, true );

// Run all the things
require_once( CHILD_DIR . '/lib/init.php' );