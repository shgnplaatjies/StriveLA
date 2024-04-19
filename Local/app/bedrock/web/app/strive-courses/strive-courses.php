<?php
/*
Plugin Name: Strive Courses
Description: Plugin that allows you to display a custom post type called courses and use it as a post on the front end.
Version: 0.1
Author: Shagan Plaatjies
*/

if (!defined('ABSPATH'))
  exit;

require_once plugin_dir_path(__FILE__) . 'includes/class-course-cpt.php';

require_once plugin_dir_path(__FILE__) . 'includes/class-course-meta.php';

require_once plugin_dir_path(__FILE__) . 'includes/shortcodes.php';

require_once plugin_dir_path(__FILE__) . 'includes/templates.php';
