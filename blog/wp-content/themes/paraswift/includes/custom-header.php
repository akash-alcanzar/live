<?php
/**
 * Implement Custom Header functionality for Paraswift
 *
 * @package paraswift
 * @since version 1.0.0
 */
if ( ! function_exists( 'paraswift_header_setup' ) ) :
function paraswift_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'paraswift_header_setup_args', array(
		'default-text-color'     => 'fff',
		'width'                  => 1260,
		'height'                 => 240,
		'flex-height'            => true,
		'default-image'          => get_template_directory_uri() . '/images/girl-948735_1920.jpg',
		'admin-preview-callback' => 'paraswift_admin_header_image',
		'wp-head-callback'       => 'paraswift_header_style',
	) ) );
} endif;

add_action( 'after_setup_theme', 'paraswift_header_setup' );

if ( ! function_exists( 'paraswift_admin_header_image' ) ) :

function paraswift_admin_header_image() { ?>
	<div id="headimg">
		<?php if ( get_header_image() ) : ?>
		<img src="<?php header_image(); ?>" alt="<?php esc_attr_e('Header Image', 'paraswift');?>">
		<?php endif; ?>
	</div>
<?php 
} endif; // paraswift_admin_header_image

if ( ! function_exists( 'paraswift_header_style' ) ) :
/**
 * Styles the header text displayed on the site.
 *
 *
 * @since paraswfit 1.0.8
 *
 * @see paraswift_custom_header_and_background().
 */
function paraswift_header_style() {
	// If the header text option is untouched, let's bail.
	if ( display_header_text() ) {
		return;
	}

	// If the header text has been hidden.
	?>
	<style type="text/css" id="twentysixteen-header-css">
		.site-branding {
			margin: 0 auto 0 0;
		}

		.site-branding .site-title,
		.site-description {
			clip: rect(1px, 1px, 1px, 1px);
			position: absolute;
		}
	</style>
	<?php
}
endif; // paraswift_header_style
