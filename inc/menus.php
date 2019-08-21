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
        // Top Header Left Nav Menu
        register_nav_menus(array(
            'top-header-left' => esc_html__('Top Header Left Menu', 'pentamint_wp_theme'),
        ));

        // Top Header Right Nav Menu
        register_nav_menus(array(
            'top-header-right' => esc_html__('Top Header Right Menu', 'pentamint_wp_theme'),
        ));

        // Footer Nav Menu
        register_nav_menus(array(
            'top-footer' => esc_html__('Top Footer Menu', 'pentamint_wp_theme'),
        ));

        // Colophon Nav Menu
        register_nav_menus(array(
            'colophon' => esc_html__('Colophon Menu', 'pentamint_wp_theme'),
        ));
    }
endif;
