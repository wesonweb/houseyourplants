<?php

/*****************************
 *
 *  register custom taxonomies and posts
 *
 ***********************************/
//first taxonomy = room = hierarchical

add_action('init', 'create_room_taxonomy_for_plant', 0);

//create function to add custom taxonomies
function create_room_taxonomy_for_plant()
{

	//create taxonomy name
	$taxonomy = 'room';
	//set post type taxonomy will be attached to
	$object_type = 'plant';
	//names associated with taxonomy
	$labels = array(
		'name'				=> 'Category: rooms',
		'singular-name' 	=> 'Category: room',
		'search_items'		=> 'Search all room plants',
		'all_items'			=> 'All rooms',
		'parent_item'		=> 'Parent room',
		'parent_item_colon'	=> 'Parent room:',
		'update_item'		=> 'Update rooms',
		'edit_item'			=> 'Edit rooms',
		'add_new_item'		=> 'Add new room',
		'new_item_name'		=> 'New room name',
		'menu_name'			=> 'rooms'
	);

	//define arguments -$args- to be used

	$args = array(
		'labels'			=>	$labels,
		'hierarchical'		=>	true,
		'show_ui'			=>	true,
		'show_in_nav_menus'	=>	true,
		'public'			=>	true,
		'show_admin_column'	=>	true,
		'query_var'			=>	true,
		'rewrite'			=> 	array('slug' => 'room')

	);

	flush_rewrite_rules(true);

	//call the registered taxonomy
	register_taxonomy($taxonomy, $object_type, $args);
}


//second taxonomy = position = hierarchical


add_action('init', 'create_position_taxonomy_for_plant', 0);

//create function to add custom taxonomies
function create_position_taxonomy_for_plant()
{

	//create taxonomy name
	$taxonomy = 'position';
	//set post type taxonomy will be attached to
	$object_type = 'plant';
	//names associated with taxonomy
	$labels = array(
		'name'				=> 'Category: positions',
		'singular-name' 	=> 'Category: position',
		'search_items'		=> 'Search all positions',
		'all_items'			=> 'All positions',
		'parent_item'		=> 'Parent position',
		'parent_item_colon'	=> 'Parent position:',
		'update_item'		=> 'Update positions',
		'edit_item'			=> 'Edit positions',
		'add_new_item'		=> 'Add new position',
		'new_item_name'		=> 'New position name',
		'menu_name'			=> 'positions'
	);

	//define arguments -$args- to be used

	$args = array(
		'labels'			=>	$labels,
		'hierarchical'		=>	true,
		'show_ui'			=>	true,
		'show_in_nav_menus'	=>	true,
		'public'			=>	true,
		'show_admin_column'	=>	true,
		'query_var'			=>	true,
		'rewrite'			=> 	array('slug' => 'position')

	);

	flush_rewrite_rules(true);

	//call the registered taxonomy
	register_taxonomy($taxonomy, $object_type, $args);
}

//third taxonomy = care_level = hierarchical

add_action('init', 'create_carelevel_taxonomy_for_plant', 0);

//create function to add custom taxonomies
function create_carelevel_taxonomy_for_plant()
{

	//create taxonomy name
	$taxonomy = 'care_level';
	//set post type taxonomy will be attached to
	$object_type = 'plant';
	//names associated with taxonomy
	$labels = array(
		'name'				=> 'Category: care level',
		'singular-name' 	=> 'Category: care level',
		'search_items'		=> 'Search all care levels',
		'all_items'			=> 'All care levels',
		'parent_item'		=> 'Parent care level',
		'parent_item_colon'	=> 'Parent care level:',
		'update_item'		=> 'Update care levels',
		'edit_item'			=> 'Edit care levels',
		'add_new_item'		=> 'Add new care level',
		'new_item_name'		=> 'New care level name',
		'menu_name'			=> 'Care levels'
	);

	//define arguments -$args- to be used

	$args = array(
		'labels'			=>	$labels,
		'hierarchical'		=>	true,
		'show_ui'			=>	true,
		'show_in_nav_menus'	=>	true,
		'public'			=>	true,
		'show_admin_column'	=>	true,
		'query_var'			=>	true,
		'rewrite'			=> 	array('slug' => 'care-level')

	);

	flush_rewrite_rules(true);

	//call the registered taxonomy
	register_taxonomy($taxonomy, $object_type, $args);
}

/****************************************************************************
 *register plant post type - this is for individual plant posts
 ****************************************************************************/

add_action('init', 'plants_init');

function plants_init()
{
	$labels = array(
		'name'               => _x('Plant Posts', 'post type general name', 'your-plugin-textdomain'),
		'singular_name'      => _x('Plant Post', 'post type singular name', 'your-plugin-textdomain'),
		'menu_name'          => _x('Plant Posts', 'admin menu', 'your-plugin-textdomain'),
		'name_admin_bar'     => _x('Plant Posts', 'add new on admin bar', 'your-plugin-textdomain'),
		'add_new'            => _x('Add New', 'Plant post', 'your-plugin-textdomain'),
		'add_new_item'       => __('Add New Plant post', 'your-plugin-textdomain'),
		'new_item'           => __('New Plant Post', 'your-plugin-textdomain'),
		'edit_item'          => __('Edit Plant Post', 'your-plugin-textdomain'),
		'view_item'          => __('View Plant Post', 'your-plugin-textdomain'),
		'all_items'          => __('All Plant Posts', 'your-plugin-textdomain'),
		'search_items'       => __('Search Plant Post', 'your-plugin-textdomain'),
		'parent_item_colon'  => __('Parent Plant Post:', 'your-plugin-textdomain'),
		'not_found'          => __('No Plant Post found.', 'your-plugin-textdomain'),
		'not_found_in_trash' => __('No Plant page found in Trash.', 'your-plugin-textdomain')
	);

	$args = array(
		'labels'             => $labels,
		'description'        => __('Description.', 'your-plugin-textdomain'),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array('slug' => 'plants'),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => true,
		'menu_position'      => 2,
		'show_in_rest'		 =>	true,
		'supports'           => array('title', 'author', 'thumbnail', 'excerpt', 'comments', 'page-attributes', 'editor'),
	);

	flush_rewrite_rules(true);

	register_post_type('plant', $args);
}

/***************************************************************
 *register plant post type - this is for featured plant posts
 ***************************************************************/

add_action('init', 'featured_plants_init');

function featured_plants_init()
{
	$labels = array(
		'name'               => _x('Featured Plant Posts', 'post type general name', 'your-plugin-textdomain'),
		'singular_name'      => _x('Featured Plant Post', 'post type singular name', 'your-plugin-textdomain'),
		'menu_name'          => _x('Featured Plant Posts', 'admin menu', 'your-plugin-textdomain'),
		'name_admin_bar'     => _x('Featured Plant Posts', 'add new on admin bar', 'your-plugin-textdomain'),
		'add_new'            => _x('Add New', 'Featured Plant', 'your-plugin-textdomain'),
		'add_new_item'       => __('Add New Featured Plant page', 'your-plugin-textdomain'),
		'new_item'           => __('New Featured Plant', 'your-plugin-textdomain'),
		'edit_item'          => __('Edit Featured Plant', 'your-plugin-textdomain'),
		'view_item'          => __('View Featured Plants', 'your-plugin-textdomain'),
		'all_items'          => __('All Featured Plant Posts', 'your-plugin-textdomain'),
		'search_items'       => __('Search Featured Plants', 'your-plugin-textdomain'),
		'parent_item_colon'  => __('Parent Plant page:', 'your-plugin-textdomain'),
		'not_found'          => __('No Featured Plants found.', 'your-plugin-textdomain'),
		'not_found_in_trash' => __('No Featured Plants found in Trash.', 'your-plugin-textdomain')
	);

	$args = array(
		'labels'             => $labels,
		'description'        => __('Description.', 'your-plugin-textdomain'),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array('slug' => 'featured-plants'),
		'capability_type'    => 'post',
		'has_archive'        => false,
		'hierarchical'       => true,
		'menu_position'      => 3,
		'show_in_rest'		 => true,
		'supports'           => array('title', 'author', 'thumbnail', 'excerpt', 'editor', 'page-attributes')
	);

	flush_rewrite_rules(true);

	register_post_type('featured_plants', $args);
}

/*************************************************************
 * DISQUS
 *****************************************************************/
function disqus_embed($disqus_shortname)
{
	global $post;
	wp_enqueue_script('disqus_embed', 'http://' . $disqus_shortname . '.disqus.com/embed.js');
	echo '<div id="disqus_thread"></div>
    <script type="text/javascript">
        var disqus_shortname = "' . $disqus_shortname . '";
        var disqus_title = "' . $post->post_title . '";
        var disqus_url = "' . get_permalink($post->ID) . '";
        var disqus_identifier = "' . $disqus_shortname . '-' . $post->ID . '";
    </script>';
}
