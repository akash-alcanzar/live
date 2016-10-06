<?php
/**
 * Template Name: Left Sidebar Page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package paraswift
 * @since 1.0.0
 */

get_header(); ?>
<div class="row paraswift-innerpage">
	<div class="col-md-12">
	<div class="col-md-3" id="paraswift-sidebar">
				<?php get_sidebar(); ?>
			</div>
		<div class="col-md-9" role="main">
				<div id="primary" class="content-area">
					<main id="main" class="site-main" role="main">
		

						<?php while ( have_posts() ) : the_post(); ?>

							<?php get_template_part( 'content', 'page' ); ?>
							<?php
								// If comments are open or we have at least one comment, load up the comment template.
								if ( comments_open() || get_comments_number() ) :
									comments_template();
								endif;
							?>

						<?php endwhile; // End of the loop. ?>
					</main><!-- #main -->
				</div>
				</div>
			
		</div>
	</div>
		
<?php get_footer(); ?>
