<?php




function custom_post_partners(){
  register_post_type ('partners',
    array(
      'labels' => array(
        'name' => ('Partners'),
        'singular_name' => ('Partner'),
        'add_new' => ('Add New partner'),
        'add_new_item' => ('Add New partner'),
        'edit_item' => ('Edit partner'),
        'new_item' => ('New partner'),
        'view_item' => ('View partner'),
        'not_found' => ('Sorry, we cound\'n find the partners you are looking for.'),
      ),
      'menu_icon' => 'dashicons-networking',
      'public' => true,
      'publicly_queryable' => true,
      'exclude_from_search' => false,
      'menu_position' => 7, 
      'has_archive' => true,
      'hierarchial' => true,
      'show_ui' => true,
      'capability_type' => 'post',
      'rewrite'      => ['slug' => 'partners','with_front' => false],
      'supports' => array('title', 'thumbnail', 'editor', 'custom-fields','excerpt'),
      )
    );
    add_theme_support('post-thumbnails');
}

add_action('init', 'custom_post_partners');


// Register Meta Box for Custom Field
function add_partner_custom_text_field() {
  add_meta_box(
      'partner_custom_text_meta',       // Unique ID
      'Partner URL',            // Box Title
      'partner_custom_text_callback',   // Callback function
      'partners',                       // Custom Post Type
      'normal',                         // Context (normal, side, advanced)
      'high'                            // Priority
  );
}
add_action('add_meta_boxes', 'add_partner_custom_text_field');

// Callback Function to Display Input Field
function partner_custom_text_callback($post) {
  // Retrieve current value
  $custom_text = get_post_meta($post->ID, '_partner_custom_text', true);
  wp_nonce_field('save_partner_custom_text', 'partner_custom_text_nonce');
  ?>
  <label for="partner_custom_text">Enter The Partner URL:</label>
  <input type="text" id="partner_custom_text" name="partner_custom_text" value="<?php echo esc_attr($custom_text); ?>" style="width:100%;">
  <?php
}

// Save the Custom Field Value
function save_partner_custom_text($post_id) {
  // Security check
  if (!isset($_POST['partner_custom_text_nonce']) || !wp_verify_nonce($_POST['partner_custom_text_nonce'], 'save_partner_custom_text')) {
      return;
  }

  // Prevent auto-save or quick edit issues
  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
      return;
  }

  // Ensure the user has permission
  if (!current_user_can('edit_post', $post_id)) {
      return;
  }

  // Save or delete the field value
  if (isset($_POST['partner_custom_text'])) {
      update_post_meta($post_id, '_partner_custom_text', sanitize_text_field($_POST['partner_custom_text']));
  } else {
      delete_post_meta($post_id, '_partner_custom_text');
  }
}
add_action('save_post', 'save_partner_custom_text');
