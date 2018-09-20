<?php
remove_action('welcome_panel', 'wp_welcome_panel');

//remove dashboard widgets

function remove_dashboard_widgets() {
	global $wp_meta_boxes;
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']); // Removes QuickPress
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']); // Incoming Links
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']); // Removes Right Now
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']); // Removes Plugins
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_recent_drafts']); // Removes Recent Drafts
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']); // Removes Recent Comments
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']); // Removes the WordPress Developer Blog
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']); // Removes the WordPress Blog Updates
}
add_action('wp_dashboard_setup', 'remove_dashboard_widgets' );


function disable_dashboard_widgets() {
    global $current_user;
    get_currentuserinfo();

    if($current_user->user_level != 1){
        remove_meta_box('dashboard_right_now', 'dashboard', 'core');
        remove_meta_box('dashboard_recent_comments', 'dashboard', 'core');
        remove_meta_box('dashboard_incoming_links', 'dashboard', 'core');
        remove_meta_box('dashboard_plugins', 'dashboard', 'core');
        remove_meta_box('dashboard_quick_press', 'dashboard', 'core');
        remove_meta_box('dashboard_recent_drafts', 'dashboard', 'core');
				remove_meta_box( 'dashboard_activity', 'dashboard', 'normal');
				remove_action('welcome_panel', 'wp_welcome_panel');
    }
}
add_action('wp_dashboard_setup', 'disable_dashboard_widgets');

// remove items from the admin area

function remove_admin_menu_items() {
    $remove_menu_items = array(__ ('Posts'), ('Comments'), ('')

        );
    global $menu;
    end ($menu);
    while (prev($menu)){
        $item = explode(' ',$menu[key($menu)][0]);
        if(in_array($item[0] != NULL?$item[0]:"" , $remove_menu_items)){
        unset($menu[key($menu)]);}
    }
}

add_action('admin_menu', 'remove_admin_menu_items');


//remove screen options from admin area
add_filter( 'screen_options_show_screen', '__return_false' );


// add custom message to dashboard
  add_action('wp_dashboard_setup', 'my_custom_dashboard_widgets');


  function my_custom_dashboard_widgets() {
  global $wp_meta_boxes;

  wp_add_dashboard_widget('custom_help_widget', 'Title for the help goes here', 'custom_dashboard_help');
  }

  //message to go in custom box
  function custom_dashboard_help() {
  echo '<p>Welcome. Enter any useful information for the website owner here
  Need help? Contact the developer <a href="mailto:wesonweb@gmail.com">here</a></p>';
  }

  //add widgets to dashboard
  function add_custom_dashboard_widgets() {

  	    wp_add_dashboard_widget(
  	                 'wpexplorer_dashboard_widget', // Widget slug.
  	                 'My Custom Dashboard Widget', // Title.
  	                 'custom_dashboard_widget_content' // Display function.
  	        );
  	}

  	add_action( 'wp_dashboard_setup', 'add_custom_dashboard_widgets' );

  	/**
  	 * Create the function to output the contents of your Dashboard Widget.
  	 */

  	function custom_dashboard_widget_content_one() {
  	    // Display whatever it is you want to show.
  	    echo "<p>Hello there, I'm a Dashboard Widget. Edit me!</p>
        <br />";
        echo '<p> Need help? Contact the developer <a href="mailto:wesonweb@gmail.com">here</a></p>'
        ;
      }


//remove 'howdy' replace with Welcome
add_action( 'admin_bar_menu', 'wp_admin_bar_my_custom_account_menu', 11 );

function wp_admin_bar_my_custom_account_menu( $wp_admin_bar ) {
$user_id = get_current_user_id();
$current_user = wp_get_current_user();
$profile_url = get_edit_profile_url( $user_id );

if ( 0 != $user_id ) {
/* Add the "My Account" menu */
$avatar = get_avatar( $user_id, 28 );
$howdy = sprintf( __('Welcome to your admin area, %1$s'), $current_user->display_name );
$class = empty( $avatar ) ? '' : 'with-avatar';

$wp_admin_bar->add_menu( array(
'id' => 'my-account',
'parent' => 'top-secondary',
'title' => $howdy . $avatar,
'href' => $profile_url,
'meta' => array(
'class' => $class,
),
) );

}
}

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

?>
