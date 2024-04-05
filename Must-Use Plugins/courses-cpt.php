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
      'capability_type' => 'post',
      'show_in_rest' => true,
    );
    register_post_type('wpss_course', $args);

  }
  add_action('init', 'wpss_create_courses_cpt', 0);

}

class StriveSA_MetaBox_CourseInfo
{
  private $screen = array('wpss_course');

  private $meta_fields = array(
    array(
      'label' => 'Featured Image',
      'id' => 'wpss_course_featured_image',
      'type' => 'media',
      'returnvalue' => 'url',
    ),
    array(
      'label' => 'Start Date',
      'id' => 'wpss_course_start_date',
      'type' => 'date',
      'default' => '',
    ),
    array(
      'label' => 'End Date',
      'id' => 'wpss_course_end_date',
      'type' => 'date',
      'default' => '',
    ),
    array(
      'label' => 'Summary',
      'id' => 'wpss_course_summary',
      'type' => 'text',
      'default' => '',
    ),
    array(
      'label' => 'Methodology',
      'id' => 'wpss_course_methodology',
      'type' => 'select',
      'options' => array('Remote', 'Hybrid', 'In-Person'),
    ),
    array(
      'label' => 'Methodology Icon',
      'id' => 'wpss_course_methodology_icon',
      'type' => 'media',
      'returnvalue' => 'url', // Change from 'ID' to 'url'
    ),
    array(
      'label' => 'Price',
      'id' => 'wpss_course_price',
      'type' => 'text',
      'default' => '99',
    ),
    array(
      'label' => 'Border Style',
      'id' => 'wpss_course_style',
      'type' => 'select',
      'options' => array('Rounded', 'Square')
    ),
    array(
      'label' => 'Duration Style',
      'id' => 'wpss_course_duration_style',
      'type' => 'select',
      'options' => array('Absolute', 'Relative')
    )
  );

  public function __construct()
  {
    add_action('add_meta_boxes', array($this, 'add_meta_boxes'));
    add_action('admin_footer', array($this, 'media_fields'));
    add_action('save_post', array($this, 'save_fields'));
  }

  public function add_meta_boxes()
  {
    foreach ($this->screen as $single_screen) {
      add_meta_box(
        'CourseInfo',
        __('Course Info', 'text-domain'),
        array($this, 'meta_box_callback'),
        $single_screen,
        'normal',
      );
    }
  }

  public function meta_box_callback($post)
  {
    wp_nonce_field('CourseInfo_data', 'courseinfo_nonce');
    echo 'Information relating to this course.';
    $this->field_generator($post);
  }

  public function media_fields()
  { ?>
        <script> jQuery(document).ready(function ($) {
            if (typeof wp.media !== 'undefined') {
              let _custom_media = true,
                _orig_send_attachment = wp.media.editor.send.attachment;

              $('.new-media').click(function (e) {
                let send_attachment_bkp = wp.media.editor.send.attachment;
                let button = $(this);
                let id = button.attr('id').replace('_button', '');
                _custom_media = true;

                wp.media.editor.send.attachment = function (props, attachment) {
                  if (_custom_media) {
                    if ($('input#' + id).data('return') == 'url') $('input#' + id).val(attachment.url);
                    else $('input#' + id).val(attachment.id);

                    $('div#preview' + id).css('background-image', 'url(' + attachment.url + ')');
                  } else return _orig_send_attachment.apply(this, [props, attachment]);

                }
                wp.media.editor.open(button);

                return false;
              });

              $('.add_media').on('click', function () {
                _custom_media = false;
              });

              $('.remove-media').on('click', function () {
                let parent = $(this).parents('td');

                parent.find('input[type="text"]').val('');
                parent.find('div').css('background-image', 'url()');
              });
            }
          });
        </script>
        <?php
  }

  public function field_generator($post)
  {
    $output = '';

    foreach ($this->meta_fields as $meta_field) {
      $label = '<label for="' . $meta_field['id'] . '">' . $meta_field['label'] . '</label>';

      $meta_value = get_post_meta($post->ID, $meta_field['id'], true);

      if (empty($meta_value) && isset($meta_field['default'])) {
        $meta_value = $meta_field['default'];
      }

      switch ($meta_field['type']) {

        case 'media':
          $meta_type = '';
          if ($meta_value && isset($meta_field['returnvalue'])) {
            if ($meta_field['returnvalue'] == 'ID') {
              $meta_type = $meta_value;
            } else {
              $meta_type = $meta_value; // Just use the URL directly
            }
          }

          $input_hidden = sprintf(
            '<input style="display:none;" id="%s" name="%s" type="text" value="%s" data-return="%s">',
            $meta_field['id'],
            $meta_field['id'],
            $meta_value,
            isset($meta_field['returnvalue']) ? $meta_field['returnvalue'] : ''
          );

          $preview_div = sprintf(
            '<div id="preview%s" style="margin-right:10px;border:1px solid #e2e4e7;background-color:#fafafa;display:inline-block;width: 100px;height:100px;background-image:url(%s);background-size:cover;background-repeat:no-repeat;background-position:center;"></div>',
            $meta_field['id'],
            $meta_type
          );

          $button_select = sprintf(
            '<input style="width: 3rem;margin-right:5px;" class="button new-media" id="%s_button" name="%s_button" type="button" value="Select" />',
            $meta_field['id'],
            $meta_field['id']
          );

          $button_clear = sprintf(
            '<input style="width: 3rem;" class="button remove-media" id="%s_buttonremove" name="%s_buttonremove" type="button" value="Clear" />',
            $meta_field['id'],
            $meta_field['id']
          );


          $input = $input_hidden . $preview_div . $button_select . $button_clear;
          break;

        case 'select':
          $input = sprintf(
            '<select id="%s" name="%s">',
            $meta_field['id'],
            $meta_field['id']
          );
          foreach ($meta_field['options'] as $key => $value) {
            $meta_field_value = !is_numeric($key) ? $key : $value;
            $input .= sprintf(
              '<option %s value="%s">%s</option>',
              $meta_value === $meta_field_value ? 'selected' : '',
              $meta_field_value,
              $value
            );
          }
          $input .= '</select>';
          break;

        default:
          $input = sprintf(
            '<input %s id="%s" name="%s" type="%s" value="%s">',
            $meta_field['type'] !== 'color' ? 'style="width: 100%"' : '',
            $meta_field['id'],
            $meta_field['id'],
            $meta_field['type'],
            $meta_value
          );

      }
      $output .= $this->format_rows($label, $input);
    }
    echo '<table class="form-table"><tbody>' . $output . '</tbody></table>';
  }

  public function format_rows($label, $input)
  {
    return '<tr><th>' . $label . '</th><td>' . $input . '</td></tr>';
  }

  public function save_fields($post_id)
  {
    if (!isset($_POST['courseinfo_nonce']))
      return $post_id;

    $nonce = $_POST['courseinfo_nonce'];

    // if (!wp_verify_nonce($nonce, 'courseinfo_nonce'))
    //   return $post_id;

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
      return $post_id;

    foreach ($this->meta_fields as $meta_field) {
      if (isset($_POST[$meta_field['id']])) {
        if ($meta_field['type'] == 'email')
          $_POST[$meta_field['id']] = sanitize_email($_POST[$meta_field['id']]);
        else // 'text' type
          $_POST[$meta_field['id']] = sanitize_text_field($_POST[$meta_field['id']]);

        update_post_meta($post_id, $meta_field['id'], $_POST[$meta_field['id']]);
      } elseif ($meta_field['type'] === 'checkbox') {

        update_post_meta($post_id, $meta_field['id'], '0');
      }
    }
  }
}

if (class_exists('StriveSA_MetaBox_CourseInfo'))
  new StriveSA_MetaBox_CourseInfo;
