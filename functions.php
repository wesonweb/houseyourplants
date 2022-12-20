<?php
/**
 * vanilla theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package vanilla_theme
 */

if ( ! function_exists( 'vanilla_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function vanilla_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on vanilla theme, use a find and replace
	 * to change 'vanilla' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'vanilla', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	//add additional image sizes
	add_image_size( 'sidebar-thumb', 120, 120, true ); // Hard Crop Mode
	add_image_size( 'homepage-thumb', 220, 180 ); // Soft Crop Mode
	add_image_size( 'singlepost-thumb', 590, 9999 ); // Unlimited Height Mode
	// add html5 shim
	function add_ie_html5_shim () {
	    echo '<!--[if lt IE 9]>';
	    echo '<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>';
	    echo '<![endif]-->';
	}
	add_action('wp_head', 'add_ie_html5_shim');


// change the title of the featured image meta box

	function replace_featured_image_box()
{
    remove_meta_box( 'postimagediv', 'XXX put the post type here XXX', 'side' );
    add_meta_box('postimagediv', __('Add the message you want to be put here - change in functions file'), 'post_thumbnail_meta_box', 'XXX post type XXX', 'side', 'low');
}

	//allow upload of svg
	function my_myme_types($mime_types){
	$mime_types['svg'] = 'image/svg+xml';
	return $mime_types;
	}
	add_filter('upload_mimes', 'my_myme_types', 1, 1);



	// deregister default jQuery included with Wordpress
		wp_deregister_script( 'jquery' );

		$jquery_cdn = '//ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js';
		wp_enqueue_script( 'jquery', $jquery_cdn, array(), '2.2.4', true );

	// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
		'menu-1' => esc_html__( 'Primary', 'vanilla' ),
		'menu-2' => esc_html__( 'Footer', 'vanilla' )
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'vanilla_custom_background_args', array(
		'default-color' => '000000',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support( 'custom-logo', array(
		'height'      => 250,
		'width'       => 250,
		'flex-width'  => true,
		'flex-height' => true,
	) );
}
endif;
add_action( 'after_setup_theme', 'vanilla_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function vanilla_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'vanilla_content_width', 640 );
}
add_action( 'after_setup_theme', 'vanilla_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function vanilla_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'underscores' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'underscores' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'vanilla_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
// function vanilla_scripts() {

// 	// wp_enqueue_style( 'normalise', get_template_directory_uri() . '/css/normalise.css' );

// 	wp_enqueue_style( 'vanilla-style', get_stylesheet_uri() );




// 	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
// 		wp_enqueue_script( 'comment-reply' );
// 	}
// }
// add_action( 'wp_enqueue_scripts', 'vanilla_scripts' );


function vanilla_register_styles(){
	$version = wp_get_theme()->get( 'Version' );
	wp_enqueue_style( 'reset', get_template_directory_uri() . '/css/normalise.css', array(), $version, 'all' );
	wp_enqueue_style( 'nubsli-styles', get_template_directory_uri() . '/style.css', array(), $version, 'all' );
	wp_enqueue_script( 'vanilla-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	wp_enqueue_script( 'vanilla-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
	wp_enqueue_style('fontawesome', "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css", array(), false, false);
	}
	add_action( 'wp_enqueue_scripts', 'vanilla_register_styles' );


//load google fonts


	function load_fonts() {
						wp_register_style('googleFonts', 'https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic|Rosario:700,400' );
						wp_enqueue_style( 'googleFonts');
				}

		add_action('wp_print_styles', 'load_fonts');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load wp login page styling.
 */
require(get_template_directory().'/function-templates/login-functions.php');

/**
 * Load custom post types.
 */
require(get_template_directory().'/function-templates/custom-post.php');

/**
 * Load dynamic sidebars.
 */
require(get_template_directory().'/function-templates/dynamic-sidebars.php');

/**
 * admin area functions.
 */
require(get_template_directory().'/function-templates/admin-area.php');

/**
 * navigation (add arrows to submenu and tidy up nav ids and classes)
 */
require(get_template_directory().'/function-templates/navigation.php');

/**
 * add ACF Gutenberg blocks
 */
require(get_template_directory().'/inc/acf-gutenberg.php');


	/*************************************************************************
Copyright for footer: automatically updates every year
************************************************************************/

function theme_copyright() {
global $wpdb;
$copyright_dates = $wpdb->get_results("
SELECT
YEAR(min(post_date_gmt)) AS firstdate,
YEAR(max(post_date_gmt)) AS lastdate
FROM
$wpdb->posts
WHERE
post_status = 'publish'
");
$output = '';
if($copyright_dates) {
$copyright = "&copy; " . $copyright_dates[0]->firstdate;
if($copyright_dates[0]->firstdate != $copyright_dates[0]->lastdate) {
$copyright .= '-' . $copyright_dates[0]->lastdate;
}
$output = $copyright;
}
return $output;
}

/****************************************
* If more than one page exists, return TRUE.
*********************************************/
function show_posts_nav() {
global $wp_query;
return ($wp_query->max_num_pages > 1);
}

// change the length of the excerpt
function custom_excerpt_length( $length ) {
  return 20;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
