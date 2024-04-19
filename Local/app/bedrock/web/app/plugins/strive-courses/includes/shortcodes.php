<?php
// Custom shortcode handler for displaying custom fields
function coures_fields_shortcode_handler($atts)
{
  $atts = shortcode_atts(
    array(
      'field' => '',
      'format' => 'text',
    ),
    $atts,
    'coures_field'
  );

  $field_value = get_post_meta(get_the_ID(), $atts['field'], true);

  if ($atts['format'] === 'image') {
    return '<img src="' . esc_url($field_value) . '" alt="Custom Image">';
  } else {
    return $field_value;
  }
}

add_shortcode('coures_field', 'coures_fields_shortcode_handler');
