<?php

/**
 * Theme basic setup.
 *
 * @package Pentamint_WP_Theme
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

add_action('after_setup_theme', 'pentamint_wp_theme_setup');

if (!function_exists('pentamint_wp_theme_setup')) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function pentamint_wp_theme_setup()
	{
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on pentamint_wp_theme, use a find and replace
		 * to change 'pentamint_wp_theme' to the name of your theme in all the template files.
		 */
		load_theme_textdomain('pentamint_wp_theme', get_template_directory() . '/languages');

		// Add default posts and comments RSS feed links to head.
		add_theme_support('automatic-feed-links');

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support('title-tag');

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support('post-thumbnails');

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(array(
			'primary' => esc_html__('Primary Menu', 'pentamint_wp_theme'),
		));

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support('html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		));

		// Set up the WordPress core custom background feature.
		add_theme_support('custom-background', apply_filters('pentamint_wp_theme_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		)));

		// Add theme support for selective refresh for widgets.
		add_theme_support('customize-selective-refresh-widgets');

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support('custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		));
	}
endif;

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
add_action('after_setup_theme', 'pentamint_wp_theme_content_width', 0);
function pentamint_wp_theme_content_width()
{
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters('pentamint_wp_theme_content_width', 640);
}

/* Set CPT Archive Page as Static Page */
add_action('pre_get_posts','pm_homepage_cpt_filter');
function pm_homepage_cpt_filter($query) {
	if ( !is_admin() && $query->is_main_query() && is_home() ) {
		$query->set('post_type', array('post') );
	}
}