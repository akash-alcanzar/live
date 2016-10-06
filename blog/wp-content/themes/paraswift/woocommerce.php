<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package paraswift
 */

get_header(); ?>

	<div class="row paraswift-innerpage">
		<div class="col-md-12">
			<div class="col-md-9" role="main">
				<div id="primary" class="content-area">
					<main id="main" class="site-main" role="main">
						<?php woocommerce_content(); ?>
					</main><!-- #main -->
				</div>
			</div>
			<div class="col-md-3" id="paraswift-sidebar">
				<?php get_sidebar(); ?>
			</div>
		</div>
	</div>

<?php get_footer(); ?>
