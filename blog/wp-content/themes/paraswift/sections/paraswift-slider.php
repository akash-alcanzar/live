<?php
/**
 * Slider for Paraswift
 *
 * @package paraswift
 * @since version 1.0.0
 */
	if(is_active_sidebar('home-slider')){?>
		<aside class="paraswift-slider" style="min-height:600px; background-attachment: fixed; background-size:100% 100%;">
			<div id="secondary" class="widget-area" role="complementary">
				<?php dynamic_sidebar( 'home-slider' ); ?>
			</div><!-- #secondary -->
		</aside>
	<?php } else{
		do_action('ps_demo_slider','paraswift');
	}?>