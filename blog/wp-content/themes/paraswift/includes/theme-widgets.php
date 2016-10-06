<?php

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
add_action( 'widgets_init', 'paraswift_widgets_init' );
if ( ! function_exists( 'paraswift_widgets_init' ) ) :
function paraswift_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'paraswift' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar(array(
		'name'          => __( 'Home Slider', 'paraswift' ),
		'id'            => 'home-slider',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	));
	register_sidebar(array(
		'name'          => __( 'Footer Widget 1', 'paraswift' ),
		'id'            => 'footer-widget-1',
		'description'   => __('Content sidebar for Footer Widget 1', 'paraswift'),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	));
	register_sidebar(array(
		'name'          => __( 'Footer Widget 2', 'paraswift' ),
		'id'            => 'footer-widget-2',
		'description'   => __('Content sidebar for Footer Widget 2', 'paraswift'),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	));
	register_sidebar(array(
		'name'          => __( 'Footer Widget 3', 'paraswift' ),
		'id'            => 'footer-widget-3',
		'description'   => __('Content sidebar for Footer Widget 3', 'paraswift'),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	));
	register_sidebar(array(
		'name'          => __( 'Footer Widget 4', 'paraswift' ),
		'id'            => 'footer-widget-4',
		'description'   => __('Content sidebar for Footer Widget 4', 'paraswift'),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	));
} endif;