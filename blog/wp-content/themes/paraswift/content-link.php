 <?php
/**
 * The template for displaying posts in the Aside post format
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package paraswift
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-content post-format-link">
		<div class="paraswift-post-meta">
			<?php paraswift_posted_on(); ?>
		</div>
	    <?php the_content(); ?>
	    <i class="fa fa-link" aria-hidden="true"></i> 
	    <a target="_blank" href="<?php echo esc_url( paraswift_get_link_url() ); ?>"><?php the_title(); ?></a>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php paraswift_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->