<?php
//remove the 'thank you for creating with WordPress' from bottom of admin area
function remove_footer_admin () {
  echo '<p>House your plants - find the plant that\'s perfect for you.</p>';
}
add_filter('admin_footer_text', 'remove_footer_admin');


// add a custom dashboard logo
function wpb_custom_logo() {
  echo '
  <style type="text/css">
  #wpadminbar #wp-admin-bar-wp-logo > .ab-item .ab-icon:before {
  background-image: url(' . get_bloginfo('stylesheet_directory') . '/images/custom-logo.png) !important;
  background-position: 0 0;
  color:rgba(0, 0, 0, 0);
  }
  #wpadminbar #wp-admin-bar-wp-logo.hover > .ab-item .ab-icon {
  background-position: 0 0;
  }
  </style>
  ';
}
//hook into the administrative header output
add_action('wp_before_admin_bar_render', 'wpb_custom_logo');
