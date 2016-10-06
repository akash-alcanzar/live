<?php
/**
 * Footer for paraswift
 *
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package paraswift
 * @since 1.0.0
 */

?>

</div><!-- #content -->

	<div class=" row paraswift-footer-widget">
	<div class="col-md-12">
		<?php get_template_part('sections/paraswift-bottom');?>
	</div>
</div>

<?php echo getFooter(); ?>

<?php /*
<footer id="colophon" class="site-footer" role="contentinfo">
	<div class="row">
		<div class="col-md-6">
		
			<div class="site-info">
			<?php if ( get_theme_mod('copyright_text') ) : ?>
				<?php esc_attr_e('Copyright&copy;','paraswift');?> <?php echo esc_attr(get_theme_mod('copyright_text'));
				else: ?>
				<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'paraswift' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'paraswift' ), 'WordPress' ); ?></a>
				<span class="sep"> | </span>
				<?php esc_attr_e( 'Paraswift theme by', 'paraswift'); ?>
				<a href="<?php echo esc_url( __('https://intotheme.com','paraswift'));?>">
				<?php esc_attr_e('INTOTheme','paraswift');?></a>
			<?php endif; ?>
			</div><!-- .site-info -->
		</div>
		<div class="col-md-6" id="paraswift-socials">
			<?php get_template_part( 'sections/paraswift-social' ); ?>
		</div>
		</div>
	</footer><!-- #colophon -->
*/ ?>


</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>
