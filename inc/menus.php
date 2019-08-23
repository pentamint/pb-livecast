<?php

/**
 * Register Menus
 *
 * @package Pentamint_WP_Theme
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

add_action('after_setup_theme', 'pentamint_wp_theme_menu_setup');

if (!function_exists('pentamint_wp_theme_menu_setup')) :

    function pentamint_wp_theme_menu_setup()
    {
        // Secondary Header Nav Menu
        register_nav_menus(array(
            'secondary-header-nav' => esc_html__('Secondary Header Nav Menu', 'pentamint_wp_theme'),
        ));
    }
endif;
