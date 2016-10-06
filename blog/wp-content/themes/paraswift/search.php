<?php
/**
 * The template for displaying search results pages.
 *
 * @package Paraswift
 * @since version 1.0.0
 */

get_header(); ?>
<div class="row paraswift-innerpage" >
    <div class="col-md-12">
	<section id="primary paraswift-content" class="content-area">
		<main id="main" class="site-main" role="main">
			<div class="col-md-9">
				<?php if ( have_posts() ) : ?>
					<header class="page-header">
						<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'paraswift' ), get_search_query() ); ?></h1>
					</header><!-- .page-header -->
				<?php
					while ( have_posts() ) : the_post();
						get_template_part( 'content');
					endwhile;
					paraswift_post_link();

				else :
					get_template_part( 'content', 'none' );

				endif;
				?>
			</div>
			<div class="col-md-3" id="paraswift-sidebar"><?php get_sidebar(); ?></div>
		</div>
	</div>
</main><!-- .site-main -->
	</section><!-- .content-area -->
<?php get_footer(); ?>
