<?php
/**
 * The template for displaying posts in the Image post format
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package paraswift
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php
		if ( has_post_thumbnail()) {
			echo '<div class="post_type_image">';
            the_post_thumbnail();
            echo '</div>';
            
		}?>
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
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php paraswift_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->