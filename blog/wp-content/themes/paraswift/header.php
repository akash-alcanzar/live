<?php
/**
 * The header for paraswift
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package paraswift
 * @since 1.0.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div id="page" class="hfeed site">
		<header id="masthead" class="site-header" role="banner">
		<div class="row topbar-section">
			<div class="col-md-12">
				
					<?php 
					$topbar_crr_status = esc_attr(get_theme_mod('topbar_status'));
					if($topbar_crr_status){ ?> 
					<div class="col-md-4">
						<?php if(get_theme_mod('topbar_info')){
							
								echo esc_attr(get_theme_mod('topbar_info'));
							} else {?>
							<i class="fa fa-phone"></i> <?php esc_attr_e('Call Us: 12388303098 |','paraswift');?>  <a href="<?php echo esc_url( __( 'mailto:info@yourtheme.com', 'paraswift' ) ); ?>"><?php esc_attr_e('info@yourtheme.com','paraswift');?> </a>

							<?php } ?>
						</div>
						<div class="col-md-8" id="paraswift-socials">
							<?php get_template_part( 'sections/paraswift-social' ); ?>
						</div>
					<?php	} ?>
					
				
				
			</div>
		</div>
			<div class="row logo-section">
				<div class="col-md-3">
					<div class="site-branding">
					<?php paraswift_custom_logo(); ?>

					
						<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
					<?php

					$description = get_bloginfo( 'description', 'display' );
					if ( $description || is_customize_preview() ) : ?>
						<p class="site-description"><?php echo $description; ?></p>
					<?php endif; ?>
				</div><!-- .site-branding -->
				</div>
				<div class="col-md-9">
					<?php do_action('paraswift_menu', 'paraswift');?>
				</div>
			</div>
		</header><!-- #masthead -->
	</div>
	<?php if(! is_front_page() || is_home()){ ?>
	<div class="row paraswift-page-title">
		<div class="col-md-12">
			
			<?php if(is_search()){
				$paraswift_title= __('Search', 'paraswift');
			}elseif(is_404()){
				$paraswift_title = __('404', 'paraswift');
			}elseif(is_archive()){
				$paraswift_title = the_archive_title();
			}else{
				$paraswift_title = get_the_title();
			}?>
			<h1><?php echo $paraswift_title; ?></h1>
			<?php ?>
		</div>
	</div>
	<div id="content" class="site-content">
<?php }?>