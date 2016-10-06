<?php
/**
 * CTA for Paraswift
 *
 * @package paraswift
 * @since version 1.0.0
 */
	$current_cta_status = esc_attr(get_theme_mod('cta_status'));
	if($current_cta_status){?>
		<aside class="paraswift-cta">
			<div class="row">
				<div class="col-md-12">
					<?php 
						echo '<h2>'. esc_attr(get_theme_mod('cta_title')) .'</h2>';
						if ( get_theme_mod('cta_content') ) :
							echo '<p>' .esc_attr(get_theme_mod('cta_content')) .'</p>';
						endif; ?>
						<?php $button_links = esc_attr(get_theme_mod('cta_button_link','#')); ?>
						<?php if ( get_theme_mod('cta_button_text') ) : ?>
					<a href="<?php echo $button_links; ?>" target="_self" class="btn-lg paraswift-btn-one">
								<?php echo esc_attr(get_theme_mod('cta_button_text'));?>
							</a>
					<?php endif;?>
				</div>
			</div>
		</aside>
	<?php } ?>