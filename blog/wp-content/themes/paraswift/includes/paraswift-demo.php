<?php
/**
 * Demo content for Paraswift
 *
 * @package paraswift
 * @since version 1.0.0
 */
	//DEMO SLIDER IMAGE
	if ( ! function_exists( 'paraswift_demo_slider' ) ) :
	function paraswift_demo_slider() {?>
		<aside class="paraswift-slider" style="min-height:600px; background-attachment: fixed; background-size:100% 100%;">
			<div id="secondary" class="widget-area" role="complementary">
				<img src="<?php header_image(); ?>" />
			</div>
		</aside>
	<?php }
	endif;
	add_action('ps_demo_slider', 'paraswift_demo_slider');


	// Demo content for about section
	if ( ! function_exists( 'paraswift_demo_about' ) ) :
	function paraswift_demo_about(){ ?>
		<div class="row paraswift-about-section">
			<div class="col-md-12 paraswift-about-content">
					<img src="<?php echo get_template_directory_uri();?>/images/woman-690036_1920.jpg" />
					<h2><?php esc_attr_e('Find Out More About Us !', 'paraswift'); ?></h2>
					<p  class="staggered-animation" data-os-animation="fadeInRight" data-os-animation-delay="0.5s"><?php esc_attr_e('Intotheme provides WordPress themes and plugins with great features which are required key for perfect website. We are take care of our customer and their business.', 'paraswift'); ?></p>
					<ul>
						<li><?php esc_attr_e('Intotheme provides WordPress themes', 'paraswift'); ?></li>
						<li><?php esc_attr_e('We are take care of our customer and their business', 'paraswift'); ?></li>
						<li><?php esc_attr_e('Themes and plugins with great features', 'paraswift'); ?></li>
					<li><?php esc_attr_e('We are take care of our customer and their business', 'paraswift'); ?>
					</li>
					</ul>

					<a href="#" class="paraswift-btn-one btn-lg"> <?php esc_attr_e('Learn More', 'paraswift');?> </a>

				
				
			</div>
		</div><!--end row of about section -->
	<?php }
	endif;
	add_action('ps_demo_about', 'paraswift_demo_about');