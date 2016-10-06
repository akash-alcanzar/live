<?php
/**
 * paraswift functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package paraswift
 */

if ( ! function_exists( 'paraswift_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 */
function paraswift_setup() {
	/*
	 * Make theme available for translation.
	 */
	load_theme_textdomain( 'paraswift', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );
	/*
	 * Adding title-tag support for theme 
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 */
	add_theme_support( 'post-thumbnails');
	add_theme_support('custom-background');

	/*
	 * Enable support for editor style.
	 *
	 *  @since Twenty Sixteen 1.2
	 */

	add_editor_style('css/editor-style.css');

    /*
	 * Enable support for custom logo.
	 *
	 *  @since Paraswift 1.0.8
	 */
	add_theme_support( 'custom-logo', array(
		'height'      => 240,
		'width'       => 240,
		'flex-height' => true,
	) );

    /* 
	 * Let the paraswift add theme menu navigaton
	// This theme uses wp_nav_menu() in one location.
	*/
	register_nav_menus( array(
		'primary' => __( 'Primary Menu',      'paraswift' ),
		'footer-menu' => __( 'Footer Menu',      'paraswift' )
	) );

	/*
	 * Let the paraswift add theme support for core markup
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	/* 
	 * Let the paraswift add theme support for post format
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio'
	) );

	/* Let the paraswift add theme support for custom-background
	// Setup the WordPress core custom background feature.
	*/
	add_theme_support( 'custom-background', apply_filters( 'paraswift_custom_background_args', array(
		'default-color'      => '#ddd',
		'default-attachment' => 'fixed',
	) ) );
}
endif; // paraswift_setup
add_action( 'after_setup_theme', 'paraswift_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
if ( ! function_exists( 'paraswift_content_width' ) ) :
function paraswift_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'paraswift_content_width', 740 );
} endif;
add_action( 'after_setup_theme', 'paraswift_content_width', 0 );
/**
 * Enqueue scripts and styles.
 */
if ( ! function_exists( 'paraswift_scripts' ) ) :
function paraswift_scripts() {
	wp_enqueue_style('paraswift-style', get_stylesheet_uri() );
	wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.css', '3.5.5');
	wp_enqueue_style('paraswift-navigation-layout', get_template_directory_uri() . '/css/paraswift-navigation.css');
	wp_enqueue_style('font-awesome', get_template_directory_uri() . '/css/font-awesome.css', '4.4.0');
	wp_enqueue_style('paraswift-responsive-layout', get_template_directory_uri() . '/css/paraswift-responsive.css');
	wp_enqueue_style('paraswift-animation', get_template_directory_uri() . '/css/paraswift-animation.css');

	wp_enqueue_style( 'paraswift-fonts', '//fonts.googleapis.com/css?family=Open+Sans:400,300,600,700');

	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.js', array('jquery'), '20151007', true );
    wp_enqueue_script( 'paraswift-extras', get_template_directory_uri() . '/js/paraswift-extras.js', array(), '20151007', true );
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
} endif;
add_action( 'wp_enqueue_scripts', 'paraswift_scripts' );

/**
 * Implement the theme widgets in functions
 */
require get_template_directory() . '/includes/theme-widgets.php';
/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/includes/template-tags.php';

/**
Adding parawift demo content for front page *
*/
require get_template_directory() . '/includes/paraswift-demo.php';
/**
* implement the theme customizer function
*/
require get_template_directory() . '/includes/customizer.php';
require get_template_directory() . '/includes/paraswift-functions.php';

require get_template_directory() . '/includes/custom-header.php';

/**
Adding Woocommerce support to the theme paraswift
*/
if ( ! function_exists( 'paraswift_woocommerce_support' ) ) :
function paraswift_woocommerce_support() {
    add_theme_support( 'woocommerce' );
} endif;
add_action( 'after_setup_theme', 'paraswift_woocommerce_support' );

if( ! function_exists('paraswift_archive_title')):
function paraswift_archive_title( $title ) {
	return preg_replace( '#^[\w\d\s]+:\s*#', '', strip_tags( $title ) );
}endif;
add_filter( 'get_the_archive_title', 'paraswift_archive_title' );
/**
 * Adds customizable styles to your <head>
 */
if ( ! function_exists( 'paraswift_customizer_css' ) ) :
function paraswift_customizer_css(){
	get_template_part('includes/paraswift-customizercss');

} endif;
add_action( 'wp_head', 'paraswift_customizer_css');

/**
 * Return the post URL.
 *
 * @uses get_url_in_content() to get the URL in the post meta (if it exists) or
 * the first link found in the post content.
 *
 * Falls back to the post permalink if no URL is found in the post.
 *
 * @since Paraswift 1.0.7
 *
 * @return string The Link format URL.
 */
if(! function_exists('paraswift_get_link_url')):
function paraswift_get_link_url() {
	$content = get_the_content();
	$has_url = get_url_in_content( $content );

	return ( $has_url ) ? $has_url : apply_filters( 'the_permalink', get_permalink() );
} endif;

