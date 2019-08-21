<?php

/**
 * Setup theme post type & register custom post types
 *
 * @package Pentamint_WP_Theme
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

add_action('after_setup_theme', 'pentamint_wp_theme_post_type_setup');

if (!function_exists('pentamint_wp_theme_post_type_setup')) :

    function pentamint_wp_theme_post_type_setup()
    {
        /**
         * Customize default post type
         */
        // Change default post labels
        add_action('admin_menu', 'pm_change_post_label');
        add_action('init', 'pm_change_post_object');
        function pm_change_post_label()
        {
            global $menu;
            global $submenu;
            $menu[5][0] = 'B2B 블로그';
            $submenu['edit.php'][5][0] = '모든 글'; // All Items
            $submenu['edit.php'][10][0] = '새로 추가'; // Add New
            $submenu['edit.php'][15][0] = '카테고리'; // Categories
            $submenu['edit.php'][16][0] = '태그'; // Tags
        }
        function pm_change_post_object()
        {
            global $wp_post_types;
            $labels = &$wp_post_types['post']->labels;
            $labels->name = '글';
            $labels->singular_name = '글';
            $labels->add_new = '글 쓰기';
            $labels->add_new_item = '글 쓰기';
            $labels->edit_item = '글 수정하기';
            $labels->new_item = '새로운 글';
            $labels->view_item = '글 보기';
            $labels->search_items = '글 검색하기';
            $labels->not_found = '찾는 글이 없습니다.';
            $labels->not_found_in_trash = '찾는 글이 휴지통에 없습니다.';
            $labels->all_items = '전체 글';
            $labels->menu_name = 'B2B 블로그';
            $labels->name_admin_bar = 'B2B 블로그';
        }
    }
endif;
