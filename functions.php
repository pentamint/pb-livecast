<?php
/**
 * Pentamint WP Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Pentamint_WP_Theme
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$pentamint_wp_theme_includes = array(
	'/setup.php',							// Theme setup and custom theme supports.
	// '/post-types.php',                      // Setup post type & register custom post types
	'/menus.php',                           // Register custom menus.
	'/widgets.php',                         // Register widget area.
	'/enqueue.php',                         // Enqueue scripts and styles.
	'/template-tags.php',                   // Custom template tags for this theme.
	// '/pagination.php',                      // Custom pagination for this theme.
	// '/hooks.php',                           // Custom hooks.
	'/extras.php',                          // Custom functions that act independently of the theme templates.
	'/customizer.php',                      // Customizer additions.
	'/custom-comments.php',                 // Custom Comments file.
	'/jetpack.php',                         // Load Jetpack compatibility file.
	'/class-wp-bootstrap-navwalker.php',    // Load custom WordPress nav walker.
	// '/woocommerce.php',                     // Load WooCommerce functions.
	// '/editor.php',                          // Load Editor functions.
	// '/deprecated.php',                      // Load deprecated functions.
	// '/module-ajax-filter.php'				// Load AJAX filter module.
);

foreach ( $pentamint_wp_theme_includes as $file ) {
	$filepath = locate_template( 'inc' . $file );
	if ( ! $filepath ) {
		trigger_error( sprintf( 'Error locating /inc%s for inclusion', $file ), E_USER_ERROR );
	}
	require_once $filepath;
}
