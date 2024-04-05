<?php

// Exit if accessed directly.
if (!defined('ABSPATH'))
  exit;

if (!function_exists('wpss_create_courses_cpt')) {
  function wpss_create_courses_cpt()
  {

    $labels = array(
      'name' => _x('Courses', 'Post Type General Name', 'text_domain'),
      'singular_name' => _x('Course', 'Post Type Singular Name', 'text_domain'),
      'menu_name' => __('Courses', 'text_domain'),
      'all_items' => __('All Courses', 'text_domain'),
      'add_new_item' => __('Add New Course', 'text_domain'),
      'edit_item' => __('Edit Course', 'text_domain'),
      'update_item' => __('Update Course', 'text_domain'),
      'view_item' => __('View Course', 'text_domain'),
      'search_items' => __('Search Courses', 'text_domain'),
      'not_found' => __('No courses found', 'text_domain'),
      'not_found_in_trash' => __('No courses found in Trash', 'text_domain'),
      'featured_image' => __('Featured Image', 'text_domain'),
      'set_featured_image' => __('Set featured image', 'text_domain'),
      'remove_featured_image' => __('Remove featured image', 'text_domain'),
      'use_featured_image' => __('Use as featured image', 'text_domain'),
      'insert_into_item' => __('Insert into course', 'text_domain'),
      'uploaded_to_this_item' => __('Uploaded to this course', 'text_domain'),
      'items_list' => __('Courses list', 'text_domain'),
      'items_list_navigation' => __('Courses list navigation', 'text_domain'),
      'filter_items_list' => __('Filter courses list', 'text_domain'),
    );
    $rewrite = array(
      'slug' => 'courses',
    );
    $args = array(
      'label' => __('Course', 'text_domain'),
      'description' => __('Courses offered by StriveSA', 'text_domain'),
      'labels' => $labels,
      'supports' => array('title', 'editor', 'custom-fields'),
      'taxonomies' => array('category', 'post_tag'),
      'public' => true,
      'show_ui' => true,
      'show_in_menu' => true,
      'menu_position' => 5,
      'menu_icon' => 'dashicons-book',
      'show_in_admin_bar' => true,
      'show_in_nav_menus' => true,
      'has_archive' => 'courses',
      'rewrite' => $rewrite,
      'capability_type' => 'page',
      'show_in_rest' => true,
    );
    register_post_type('wpss_course', $args);

  }
  add_action('init', 'wpss_create_courses_cpt', 0);

}
