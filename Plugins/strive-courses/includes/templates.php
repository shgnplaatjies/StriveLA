<?php

function wpss_load_custom_course_template($template)
{
  global $post;

  if ($post && $post->post_type == 'wpss_course') {
    if (is_archive('wpss_course')) {
      $archive_template = plugin_dir_path(__FILE__) . 'templates/archive-wpss_course.php';

      if (file_exists($archive_template)) {
        return $archive_template;
      }
    } elseif (is_singular('wpss_course')) {
      $single_template = plugin_dir_path(__FILE__) . 'templates/single-wpss_course.php';

      if (file_exists($single_template)) {
        return $single_template;
      }
    }
  }

  return $template;
}
add_filter('template_include', 'wpss_load_custom_course_template');
