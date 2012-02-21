<?php
/**
 * This file removes functionality that is not needed and other general cleanup items
 */

/** Genesis Framework ********************************************************/

/** Remove edit link */
add_filter( 'genesis_edit_post_link', '__return_false' );

/** Remove the post meta */
remove_action( 'genesis_after_post_content', 'genesis_post_meta' );

/** Remove the post info */
remove_action( 'genesis_before_post_content', 'genesis_post_info' );

/** Remove Genesis navigation areas */
add_theme_support( 'genesis-menus', array( 'primary' => 'Primary Navigation Menu' ) ); // Removes secondary

/** Remove unused Genesis profile options */
remove_action( 'show_user_profile', 'genesis_user_options_fields' );
remove_action( 'edit_user_profile', 'genesis_user_options_fields' );
remove_action( 'show_user_profile', 'genesis_user_archive_fields' );
remove_action( 'edit_user_profile', 'genesis_user_archive_fields' );
remove_action( 'show_user_profile', 'genesis_user_seo_fields'     );
remove_action( 'edit_user_profile', 'genesis_user_seo_fields'     );
remove_action( 'show_user_profile', 'genesis_user_layout_fields'  );
remove_action( 'edit_user_profile', 'genesis_user_layout_fields'  );

/** Remove Genesis layouts */
genesis_unregister_layout( 'sidebar-content'         );
genesis_unregister_layout( 'content-sidebar-sidebar' );
genesis_unregister_layout( 'sidebar-sidebar-content' );
genesis_unregister_layout( 'sidebar-content-sidebar' );
// genesis_unregister_layout( 'content-sidebar'         );

/** Remove Genesis sidebars */
unregister_sidebar( 'sidebar-alt'  );
unregister_sidebar( 'header-right' );

/** 
 * Remove extra Genesis widgets
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
 */
function ja_remove_metaboxes( $_genesis_theme_settings_pagehook ) {
	// remove_meta_box( 'genesis-theme-settings-feeds',      $_genesis_theme_settings_pagehook, 'main' );
	// remove_meta_box( 'genesis-theme-settings-nav',        $_genesis_theme_settings_pagehook, 'main' );
	// remove_meta_box( 'genesis-theme-settings-breadcrumb', $_genesis_theme_settings_pagehook, 'main' );
	// remove_meta_box( 'genesis-theme-settings-comments',   $_genesis_theme_settings_pagehook, 'main' );
	// remove_meta_box( 'genesis-theme-settings-blogpage',   $_genesis_theme_settings_pagehook, 'main' );
	// remove_meta_box( 'genesis-theme-settings-scripts',    $_genesis_theme_settings_pagehook, 'main' );
}
add_action( 'genesis_theme_settings_metaboxes', 'ja_remove_metaboxes' );


/** WordPress Core ***********************************************************/

// Ideally some of this would be in your core functionality plugin, if present.

/**
 *  Remove unused user profile fields
 */
function ja_remove_contact_methods( $contactmethods ) {
	unset( $contactmethods['aim']    );
	unset( $contactmethods['yim']    );
	unset( $contactmethods['jabber'] );
	return $contactmethods;
}
add_filter( 'user_contactmethods', 'ja_remove_contact_methods' );

/**
 * Remove default WordPress widgets
 */
function ja_remove_default_wp_widgets() {
	unregister_widget( 'WP_Widget_Pages'           );
	unregister_widget( 'WP_Widget_Calendar'        );
	unregister_widget( 'WP_Widget_Archives'        );
	unregister_widget( 'WP_Widget_Links'           );
	unregister_widget( 'WP_Widget_Meta'            );
	unregister_widget( 'WP_Widget_Recent_Comments' );
	unregister_widget( 'WP_Widget_RSS'             );
	unregister_widget( 'WP_Widget_Tag_Cloud'       );
	// unregister_widget( 'WP_Widget_Search'          );
	// unregister_widget( 'WP_Widget_Text'            );
	// unregister_widget( 'WP_Widget_Categories'      );
	// unregister_widget( 'WP_Widget_Recent_Posts'    );
}
add_action('widgets_init', 'ja_remove_default_wp_widgets', 1);

/**
 * Remove extra dashboard widgets
 */
function ja_remove_dashboard_widgets() {
	remove_meta_box( 'dashboard_incoming_links',  'dashboard', 'core' );  // incoming links
	remove_meta_box( 'dashboard_plugins',         'dashboard', 'core' );  // plugins
	remove_meta_box( 'dashboard_quick_press',     'dashboard', 'core' );  // quick press
	remove_meta_box( 'dashboard_recent_drafts',   'dashboard', 'core' );  // recent drafts
	remove_meta_box( 'dashboard_primary',         'dashboard', 'core' );  // wordpress blog
	remove_meta_box( 'dashboard_secondary',       'dashboard', 'core' );  // other wordpress news
	// remove_meta_box( 'dashboard_right_now',       'dashboard', 'core' );  // right now
	// remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'core' );  // recent comments
}
add_action( 'admin_menu', 'ja_remove_dashboard_widgets' );

/**
 * Remove admin menu items
 */
function ja_remove_admin_menus(){
	remove_menu_page( 'link-manager.php'       ); // Links
	// remove_menu_page( 'edit.php'               ); // Posts
	// remove_menu_page( 'upload.php'             ); // Media
	// remove_menu_page( 'edit-comments.php'      ); // Comments
	// remove_menu_page( 'edit.php?post_type=page'); // Pages
	// remove_menu_page( 'plugins.php'            ); // Plugins
	// remove_menu_page( 'themes.php'             ); // Appearance
	// remove_menu_page( 'users.php'              ); // Users
	// remove_menu_page( 'tools.php'              ); // Tools
	// remove_menu_page( 'options-general.php'    ); // Settings
}
add_action( 'admin_menu', 'ja_remove_admin_menus' );

/**
 * Remove admin bar items
 */
function ja_remove_admin_bar_items() {
	global $wp_admin_bar;
	$wp_admin_bar->remove_menu( 'new-link', 'new-content' );
}
add_action( 'wp_before_admin_bar_render', 'ja_remove_admin_bar_items' );

/**
 * Stop Skype from hijacking phone numbers
 * 
 * Adds a META tag to the HTML document head, that prevents Skype from 
 * hijacking/over-writing phone numbers displayed in the theme.
 * 
 * @link http://www.wpbeginner.com/wp-tutorials/how-to-fix-skype-overwriting-phone-numbers-in-wordpress-themes/ 
 */
function ja_skype_meta() {
    echo '<meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE" />';
}
//add_action( 'wp_head', 'ja_skype_meta' );