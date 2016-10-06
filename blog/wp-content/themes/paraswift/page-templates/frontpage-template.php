<?php
/**
 * Template Name: Front Page for Theme
 *
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package paraswift
 */

get_header();
get_template_part('sections/paraswift-slider');
get_template_part('sections/paraswift-cta'); ?>

<?php 

	$service_current_status = esc_attr(get_theme_mod('service_status'));
	if($service_current_status){?>
	<div class="row paraswift-service">
				<div class="col-md-12" role="main">
				<?php if(get_theme_mod('service_header_text')){?>
					<h2><?php echo esc_attr(get_theme_mod('service_header_text')); ?></h2>
					<span class="header-seperator">
						<ul>
							<li></li>
							<li></li>
						</ul>
					</span>
				<?php }?>
					<p class="short-description"><?php echo esc_attr(get_theme_mod('service_header_short')); ?></p>

				<?php $pages = array();
					for ( $count = 1; $count <= 4; $count++ ) {
						$paraswift_mod = get_theme_mod( 'service_page'. $count );
						if ( 'page-none-selected' != $paraswift_mod ) {
							$pages[] = $paraswift_mod;
						}
					}
					$args = array(
						'posts_per_page' => 3,
						'post_type' => 'page',
						'post__in' => $pages
						
					);
					$paraswift_query = new WP_Query( $args );
					if ( $paraswift_query->have_posts() ) :
						$count = 1;
						while ( $paraswift_query->have_posts() ) : $paraswift_query->the_post(); ?>
							<div class="col-md-4">
								<div class="service-box">
								<?php	if ( has_post_thumbnail() ) {
									the_post_thumbnail();
								} ?>
								<h3><?php the_title();?></h3>
								<p><?php the_excerpt(); ?></p>
								<a href="<?php echo the_permalink();?>" class="link-overlay animated fadeIn"> View More
								</a>
							</div>
						</div>
						<?php
						$count++;
						endwhile;
						endif;
						wp_reset_postdata();
						?>
					</div><!--end -->
				</div><!--end of paraswift service-->
				<?php } ?>

<?php
	$current_about_status = esc_attr(get_theme_mod('about_status'));
	if($current_about_status){
	$paraswift_about_mod = get_theme_mod( 'about_page');
	if($paraswift_about_mod){
		if ( 'page-none-selected' != $paraswift_about_mod ) {
				$pages[] = $paraswift_about_mod;
			}
			$args = array(
				'posts_per_page' => 3,
				'post_type' => 'page',
				'post__in' => $pages,
				'orderby' => 'post__in'
			);
			$paraswift_query = new WP_Query( $args );
			if ( $paraswift_query->have_posts() ) :
				$count = 1;
				while ( $paraswift_query->have_posts() ) : $paraswift_query->the_post();
				$thumb_src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 
				array( 5600,1000 ), false, '' );
			?>
			<div class="row paraswift-about-section">
				<div class="col-md-12 paraswift-about-content">
					
					<?php if ( has_post_thumbnail() ) {
							the_post_thumbnail();
						} ?>
						<h1><?php the_title(); ?></h1>
						<p><?php the_content(); ?></p>

						<?php if(get_theme_mod('about_button_link')){
							$button_links = esc_url(get_theme_mod('about_button_link','#')); ?>
							<a href="<?php echo $button_links; ?>" class="paraswift-btn-one btn-lg"> 
						<?php } else{?>
							<a href="<?php echo the_permalink(); ?>" class="paraswift-btn-one btn-lg"> 
							<?php }	?>
						<?php if(get_theme_mod('about_button_text')){
								$about_more_text = esc_attr(get_theme_mod('about_button_text'));
							} else{
								$about_more_text = 'Read More';
							}
							echo $about_more_text;
						?>
					</a>

					
				</div>
			</div><!--end row of about section -->
		<?php
			endwhile;
			endif;
			wp_reset_postdata();
		?>

	
<?php } else {
	do_action('ps_demo_about', 'paraswift');
	} 
}?>
<div class="row paraswift-blog-section">
	<div class="col-md-12 paraswift-recent-post">
	
		<div class="prp-header">
		<?php if(get_theme_mod('blog_title')){?>

		
			<h2><?php echo esc_attr(get_theme_mod('blog_title')); ?></h2>
			<span class="header-seperator">
						<ul>
							<li></li>
							<li></li>
						</ul>
					</span>
			<?php } ?>
			<p class="short-description"><?php echo esc_attr(get_theme_mod('blog_short_desctiption'));?></p>
		</div>
		<?php
		$sticky = get_option( 'sticky_posts' );
		$paraswift_query = new WP_Query( array( 'post_type' => 'post', 'order'=> 'DESC', 'posts_per_page' => 3, 
			'ignore_sticky_posts' => 1,'post__not_in' => $sticky) );
			    while ($paraswift_query->have_posts()) : $paraswift_query->the_post();?>
			    <div class="col-md-4">
			    	<div class="paraswift-recent-post-box">
				  	<?php 
				    	if ( has_post_thumbnail() ) {
							the_post_thumbnail();
						} ?>
						<?php if(has_post_thumbnail()){ ?>
						<div class="content-part">
							<h3><a href="<?php echo the_permalink();?>"><?php  the_title(); ?></a></h3>	
							<?php paraswift_posted_on(); ?>
							<p><?php the_excerpt();?></p>
							
						</div>
						<?php } else{ ?>
							<div class="content-part" style="margin-top: 0">
							<h3><a href="<?php echo the_permalink();?>"><?php  the_title(); ?></a></h3>	
							<?php paraswift_posted_on(); ?>
							<p><?php the_excerpt();?></p>
							
						</div>
						<?php } ?>
					
					</div>
				</div>
				<?php endwhile; 
				wp_reset_postdata(); ?>
			</div>
	</div>
	
<?php get_footer(); ?>
