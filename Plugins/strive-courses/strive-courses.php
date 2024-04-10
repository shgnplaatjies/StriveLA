<?php
/*
Plugin Name: Strive Courses
Description: Plugin that allows you to display a custom post type called courses and use it as a post on the front end.
Version: 0.1
Author: Shagan Plaatjies
*/

// Exit if accessed directly.
if (!defined('ABSPATH'))
  exit;

// Include the class for registering custom post type
require_once plugin_dir_path(__FILE__) . 'includes/class-course-cpt.php';

// Include the class for handling meta boxes
require_once plugin_dir_path(__FILE__) . 'includes/class-course-meta.php';

// Include the shortcodes
require_once plugin_dir_path(__FILE__) . 'includes/shortcodes.php';

// Include template functions
require_once plugin_dir_path(__FILE__) . 'includes/templates.php';
