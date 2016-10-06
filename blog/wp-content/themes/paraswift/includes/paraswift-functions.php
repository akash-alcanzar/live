<?php
	if ( ! function_exists( 'paraswift_menu_group' ) ) :
	function paraswift_menu_group(){?>
		<nav id="site-navigation" class="main-navigation" role="navigation">
			<div class="responsive-menu">
				<button class="btn" data-toggle="collapse" data-target="#demo">
				<?php esc_attr_e('Navigation', 'paraswift');?> <i class="fa fa-bars"></i> </button>
					<div id="demo" class="collapse">
						<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'pararesponsive-menu' ) ); ?>
					</div>
				</div>
			<div id="full-menu">
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'para-nav', 'fallback_cb' => 'paraswift_default_menu') ); ?>
			</div>
		</nav><!-- #site-navigation -->
	<?php }  
	endif;
	add_action('paraswift_menu','paraswift_menu_group');
	

	if ( ! function_exists( 'paraswift_default_menu' ) ) :

	function paraswift_default_menu(){
		wp_page_menu( array('menu_class' => 'default-menu', 'container' => 'div', 'depth' => 1));  
	}
	endif;