<?php

if (!class_exists('Strive_Courses_Post_Type')) {
  class Strive_Courses_Post_Type
  {
    public function __construct()
    {
      add_action('init', array($this, 'register_course_post_type'));
    }

    public function register_course_post_type()
    {
      $labels = array(
        'name' => _x('Courses', 'Post Type General Name', 'text_domain'),
        'singular_name' => _x('Course', 'Post Type Singular Name', 'text_domain'),
        'menu_name' => __('Courses', 'text_domain'),
        'all_items' => __('All Courses', 'text_domain'),
        'add_new_item' => __('Add New Course', 'text_domain'),
        'edit_item' => __('Edit Course', 'text_domain'),
        'view_item' => __('View Course', 'text_domain'),
        'search_items' => __('Search Courses', 'text_domain'),
        'not_found' => __('No courses found', 'text_domain'),
        'not_found_in_trash' => __('No courses found in Trash', 'text_domain'),
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
        'public' => true,
        'menu_icon' => 'dashicons-book',
        'show_in_rest' => true,
      );
      register_post_type('wpss_course', $args);

    }
  }
  new Strive_Courses_Post_Type();
}
