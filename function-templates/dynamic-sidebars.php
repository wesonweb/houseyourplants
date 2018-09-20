<?php
// register sidebar
if (function_exists('register_sidebar')) {
  register_sidebar(array(
    'name' => ' new widget name',
    'id'   => 'widgets',
    'description'   => 'These are lala widgets for the sidebar.',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h2>',
    'after_title'   => '</h2>'
  ));
}

add_action( 'widgets_init', 'my_register_sidebars' );

function my_register_sidebars() {

/* Register dynamic sidebar 'new_sidebar' */
    register_sidebar(
        array(
        'id' => 'new_sidebar',
        'name' => __( 'New Sidebar' ),
        'description' => __( 'A short description of the sidebar.' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>'
    )
    );

    register_sidebar(
        array(
        'id' => 'second_sidebar',
        'name' => __( 'second Sidebar' ),
        'description' => __( 'A short description of the sidebar.' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>'
    )
    );

    register_sidebar(
        array(
        'id' => 'third_sidebar',
        'name' => __( 'Campaign page sidebar' ),
        'description' => __( 'Add widgets to the campaign page.' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>'
    )
    );

/* Repeat the code pattern above for additional sidebars. */

}

?>
