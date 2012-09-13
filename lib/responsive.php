<?php
/**
 * This is the file contains functions and snippets that enable
 * responsiveness in the theme.
 *
 * @package  JAGenesisBaseTheme
 * @since    1.5.0
 */

/**
 * Set viewport for responsiveness
 *
 * @since 1.5.0
 */
function ja_viewport(){
	echo '<meta name="viewport" content="width=device-width, initial-scale=1" />' . "\n";
}
add_action( 'wp_head', 'ja_viewport' );

/**
 * Mobile primary navigation
 *
 * @since 1.5.0
 */
function ja_mobile_menu_primary(){
    if (  has_nav_menu( 'primary') && genesis_get_option( 'nav' ) ){
        wp_nav_menu(
        	array(
        		'theme_location' => 'primary',
        		'walker'         => new ja_Mobile_Menu_Walker(),
        		'items_wrap'     => '<select class="default" id="prim-selector" name="prim-selector">%3$s</select>',
        		'container_id'   => 'mobile-menu-primary',
        	)
        );
    }
}
add_action( 'genesis_after_header', 'ja_mobile_menu_primary' );

/**
 * Mobile menu walker class
 *
 * @since 1.5.0
 * @package JAGenesisBaseTheme
 */
class ja_Mobile_Menu_Walker extends Walker_Nav_Menu{
	
	private $to_depth = -1;

	/**
	 * Start level
	 *
	 * @since 1.0.0
	 * @param string &$output
	 * @param int $depth
	 */
	public function start_lvl( &$output, $depth ){
		$output .= '</option>';
	}

	/**
	 * End level
	 *
	 * @since 1.0.0
	 * @param string &$output
	 * @param  nt $depth
	 */
	public function end_lvl( &$output, $depth ){
		$indent = str_repeat( "\t", $depth );
	}

	/**
	 * Start elements
	 *
	 * @since 1.0.0
	 * @param string &$output 
	 * @param array $item
	 * @param int $depth
	 * @param array $args
	 */
	public function start_el( &$output, $item, $depth, $args ){
		$indent = ( $depth ) ? str_repeat( "&nbsp;", $depth * 4 ) : '';
		$class_names = $value = '';
		$classes = empty( $item->classes ) ? array() : ( array ) $item->classes;
		$classes[] = 'menu-item-' . $item->ID;
		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
		$class_names = ' class="' . esc_attr( $class_names ) . '"';
		$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
		$id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';
		$value = ' value="'. $item->url .'"';
		$output .= '<option' . $id. $value . $class_names . '>';
		$item_output = $args->before;
		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
		$output .= $indent . $item_output;
	}

	/**
	 * End elements
	 *
	 * @since 1.0.0
	 * @param string &$output
	 * @param array $item
	 * @param int $depth
	 */
	public function end_el( &$output, $item, $depth ){
		if ( substr( $output, -9 ) != '</option>')
			$output .= '</option>';
	}

}