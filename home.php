<?php
/**
 * Homepage tweaks
 */
add_action( 'genesis_meta', 'ja_homepage_meta' );
function ja_homepage_meta() {
	// Remove default Genesis loop
	//remove_action( 'genesis_loop', 'genesis_do_loop' );
	
	// Add custom loop for homepage
	//add_action( 'genesis_loop', 'ja_homepage_loop' );
	
	// Force full width layout
	//add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );
}

/**
 * New loop for the homepage, replaces default Genesis loop
 */
function ja_homepage_loop() {
	?>
	<div id="home-top">
		<div class="wrap">
			<?php 
			if ( function_exists( 'wp_cycle' ) ) {
				wp_cycle();	
			}
 			?>
		</div>
	</div><!-- #home-top -->
	<?php	
	echo '<div id="home-bottom"><div class="wrap">';
	if ( is_active_sidebar( 'home-bottom-left' ) ) {
		echo '<div class="home-bottom-left">';
		dynamic_sidebar( 'home-bottom-left' );
		echo '</div>';
	}	
	if ( is_active_sidebar( 'home-bottom-middle' ) ) {
		echo '<div class="home-bottom-middle">';
		dynamic_sidebar( 'home-bottom-middle' );
		echo '</div>';
	}
	if ( is_active_sidebar( 'home-bottom-right' ) ) {
		echo '<div class="home-bottom-right">';
		dynamic_sidebar( 'home-bottom-right' );
		echo '</div>';
	}	
	echo '</div></div><!-- #home-bottom -->';
}

genesis();