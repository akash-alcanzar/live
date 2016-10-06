<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package paraswift
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="paraswift-feature-image">
		<?php 
	    	if ( has_post_thumbnail() ) {
				the_post_thumbnail();
			} ?>
	</div>
	<div class="entry-content">
		<div class="paraswift-post-meta">
			<?php paraswift_posted_on(); ?>
		</div>
			<?php the_content(); ?>
			<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'paraswift' ),
					'after'  => '</div>',
				) );
			?>
	</div>

	<footer class="entry-footer">
		<?php paraswift_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->

