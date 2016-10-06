<?php
/**
 * The main template file.
 *
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package paraswift
 */

get_header(); ?>
<div class="row paraswift-innerpage" >
	<div class="col-md-12">
		<div class="col-md-9" role="main">
			<div id="primary" class="content-area">
				<main id="main" class="site-main" role="main">
					<?php while ( have_posts() ) : the_post(); ?>
						<?php get_template_part( 'content', get_post_format() ); ?>
						<?php
							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;
						?>
					<?php endwhile; // End of the loop. 
					paraswift_post_link(); ?>
				</main><!-- #main -->
			</div>
		</div>
		<div class="col-md-3" id="paraswift-sidebar">
			<?php get_sidebar(); ?>
		</div>
	</div>
</div>
	
<?php get_footer(); ?>
