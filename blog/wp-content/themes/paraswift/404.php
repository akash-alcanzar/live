<?php
/**
 * The template for displaying 404 error page.
 * @package Paraswift
 * @since 1.0.0
 */

get_header(); ?>
<div class="row paraswift-innerpage" >
    <div class="col-md-12">
        <section id="content-area"  class="parawift-content" role="main">
            <div class="container">
                <div class="entry-content">
    			    <header class="page-header">
                        <h1><?php _e( 'Not Found', 'paraswift' ); ?></h1>
                    </header>
    		         <h2><?php _e( 'Page Not Found', 'paraswift' ); ?></h2>
    				<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'paraswift' ); ?></p>
                 <div class="input-group-box">
                    <?php get_search_form(); ?>
                </div>
    		    </div><!-- page-content -->
                                
    		</div>
    	</div><!-- #main -->
    </div><!-- #primary -->
</section>


<?php
get_footer();