<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package paraswift
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	

	<div class="entry-content">
		<div class="paraswift-feature-image"><?php if ( has_post_thumbnail() ) {
			the_post_thumbnail(); } ?>
		</div>
		<header class="entry-header">
	
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		<?php if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->
		<?php paraswift_posted_on(); ?>
		<?php
			the_content( sprintf(
				wp_kses( __( 'Continue Reading %s <span class="meta-nav">&rarr;</span>', 'paraswift' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );
		?>

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