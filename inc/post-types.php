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
        add_action('init', 'pm_change_post_cat_object');
        add_action('init', 'pm_change_post_tag_object');
        function pm_change_post_label()
        {
            global $menu;
            global $submenu;
            $menu[5][0] = '캐스팅 매장';
            $submenu['edit.php'][5][0] = '모든 매장'; // All Items
            $submenu['edit.php'][10][0] = '신규매장 추가'; // Add New
            $submenu['edit.php'][15][0] = '매장 지역'; // Categories
            $submenu['edit.php'][16][0] = '매장 특성'; // Tags
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
            $labels->menu_name = '캐스팅 매장';
            $labels->name_admin_bar = '캐스팅 매장';
        }
        function pm_change_post_cat_object() {
            global $wp_taxonomies;
            $labels = &$wp_taxonomies['category']->labels;
            $labels->name = '지역';
            $labels->singular_name = '지역';
            $labels->add_new = '신규 지역 등록';
            $labels->add_new_item = '지역 등록하기';
            $labels->edit_item = '지역 수정';
            $labels->new_item = '신규 지역';
            $labels->view_item = '지역 보기';
            $labels->search_items = '지역 검색';
            $labels->not_found = '찾는 지역이 없습니다.';
            $labels->not_found_in_trash = '찾는 지역이 휴지통에 없습니다.';
            $labels->all_items = '전체 지역';
            $labels->menu_name = '매장 지역';
            $labels->name_admin_bar = '매장 지역';
        }
        function pm_change_post_tag_object() {
            global $wp_taxonomies;
            $labels = &$wp_taxonomies['post_tag']->labels;
            $labels->name = '특성';
            $labels->singular_name = '특성';
            $labels->add_new = '신규 특성 등록';
            $labels->add_new_item = '특성 등록하기';
            $labels->edit_item = '특성 수정';
            $labels->new_item = '신규 특성';
            $labels->view_item = '특성 보기';
            $labels->search_items = '특성 검색';
            $labels->not_found = '찾는 특성이 없습니다.';
            $labels->not_found_in_trash = '찾는 특성이 휴지통에 없습니다.';
            $labels->all_items = '전체 특성';
            $labels->menu_name = '매장 특성';
            $labels->name_admin_bar = '매장 특성';
        }
    }
endif;
