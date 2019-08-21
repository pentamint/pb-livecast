<?php
/**
 * Theme enqueue scripts
 *
 * @package Pentamint_WP_Theme
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

add_action( 'wp_enqueue_scripts', 'pentamint_wp_theme_scripts' );

if ( ! function_exists( 'pentamint_wp_theme_scripts' ) ) {
	/**
	 * Load theme's JavaScript and CSS sources.
	 */
	function pentamint_wp_theme_scripts() {
		wp_enqueue_style( 'pentamint_wp_theme-style', get_stylesheet_uri(), array() , time(), false );

		wp_enqueue_script( 'pentamint_wp_theme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	
		wp_enqueue_script( 'pentamint_wp_theme-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
	
		/** Custom Scripts **/
		// Initiate Default Wordpress jQuery
		wp_enqueue_script('jquery');
	
		// Bootstrap Support
		wp_enqueue_script( 'popper.js', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js', array(), null, true );
		wp_enqueue_script( 'bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js', array(), null, true );
	
		// Theme Custom
		wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css?family=Open+Sans:400,700&display=swap', false );
		wp_enqueue_style( 'nanum-fonts-nanumsquareround', 'https://cdn.rawgit.com/innks/NanumSquareRound/master/nanumsquareround.min.css', false );
		wp_enqueue_style( 'animate.css', 'https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css', true );

		wp_enqueue_script( 'slimscroll', 'https://cdnjs.cloudflare.com/ajax/libs/jQuery-slimScroll/1.3.8/jquery.slimscroll.min.js', array(), null, true );	
		wp_enqueue_script( 'ofi-min-js', get_template_directory_uri() . '/js/ofi.min.js', array(), '3.2.4', true );	
		wp_enqueue_script( 'main_js', get_template_directory_uri() . '/js/main.js', array('jquery'),  time(), true );
		/** Custom Scripts End **/
	
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
} // endif function_exists( 'pentamint_wp_theme_scripts' ).
