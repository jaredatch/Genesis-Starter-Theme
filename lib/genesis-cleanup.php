<?php
/**
 * This is the tweaks core functionality from the Genesis Framework.
 *
 * These should be removed and adjusted as necessary.
 *
 * @package  JAGenesisBaseTheme
 * @since    1.0.0
 */

// Set the structureal wraps - adjust as needed
add_theme_support( 'genesis-structural-wraps', array( 'header', 'nav', 'subnav', 'inner', 'footer-widgets', 'footer' ) );

// Navigation areas
add_theme_support( 'genesis-menus', array( 'primary' => 'Primary Navigation Menu', 'seconday' => 'Secondary Navigation Menu' ) );

// Remove edit link 
add_filter( 'genesis_edit_post_link', '__return_false' );

// Remove the post meta and post info
remove_action( 'genesis_after_post_content',  'genesis_post_meta' );
remove_action( 'genesis_before_post_content', 'genesis_post_info' );

// Remove Genesis sidebars
unregister_sidebar( 'sidebar-alt'  );
unregister_sidebar( 'header-right' );

// Remove Genesis layouts
genesis_unregister_layout( 'sidebar-content'         );
genesis_unregister_layout( 'content-sidebar-sidebar' );
genesis_unregister_layout( 'sidebar-sidebar-content' );
genesis_unregister_layout( 'sidebar-content-sidebar' );
genesis_unregister_layout( 'content-sidebar'         );
genesis_unregister_layout( 'full-width-content'      );

/**
 * Remove Genesis user profile settings
 *
 * As of 2.0.0 this was moved inside function to execute properly.
 *
 * @since 1.0.0
 */
function ja_remove_genesis_user_settings() {
	remove_action( 'show_user_profile', 'genesis_user_options_fields' );
	remove_action( 'edit_user_profile', 'genesis_user_options_fields' );
	remove_action( 'show_user_profile', 'genesis_user_archive_fields' );
	remove_action( 'edit_user_profile', 'genesis_user_archive_fields' );
	remove_action( 'show_user_profile', 'genesis_user_seo_fields'     );
	remove_action( 'edit_user_profile', 'genesis_user_seo_fields'     );
	remove_action( 'show_user_profile', 'genesis_user_layout_fields'  );
	remove_action( 'edit_user_profile', 'genesis_user_layout_fields'  );
}
add_action( 'admin_init', 'ja_remove_genesis_user_settings' );

/** 
 * Remove Genesis widgets
 *
 * @since 1.0.0
 */
function ja_remove_genesis_widgets() {
    unregister_widget( 'Genesis_eNews_Updates'          );
    unregister_widget( 'Genesis_Featured_Page'          );
    unregister_widget( 'Genesis_User_Profile_Widget'    );
    unregister_widget( 'Genesis_Menu_Pages_Widget'      );
    unregister_widget( 'Genesis_Widget_Menu_Categories' );
    unregister_widget( 'Genesis_Featured_Post'          );
    unregister_widget( 'Genesis_Latest_Tweets_Widget'   );
}
add_action( 'widgets_init', 'ja_remove_genesis_widgets', 20 );

/**
 * Remove Metaboxes
 *
 * @since 1.0.0
 * @param string $_genesis_theme_settings_pagehook
 */
function ja_remove_metaboxes( $_genesis_theme_settings_pagehook ) {
	remove_meta_box( 'genesis-theme-settings-feeds',      $_genesis_theme_settings_pagehook, 'main' );
	remove_meta_box( 'genesis-theme-settings-header',     $_genesis_theme_settings_pagehook, 'main' );
	remove_meta_box( 'genesis-theme-settings-nav',        $_genesis_theme_settings_pagehook, 'main' );
	remove_meta_box( 'genesis-theme-settings-breadcrumb', $_genesis_theme_settings_pagehook, 'main' );
	remove_meta_box( 'genesis-theme-settings-comments',   $_genesis_theme_settings_pagehook, 'main' );
	remove_meta_box( 'genesis-theme-settings-posts',      $_genesis_theme_settings_pagehook, 'main' );
	remove_meta_box( 'genesis-theme-settings-blogpage',   $_genesis_theme_settings_pagehook, 'main' );
	remove_meta_box( 'genesis-theme-settings-scripts',    $_genesis_theme_settings_pagehook, 'main' );
}
add_action( 'genesis_theme_settings_metaboxes', 'ja_remove_metaboxes' );