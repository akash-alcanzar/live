
<?php
/**
 * Bottom widget for Paraswift
 *
 * @package paraswift
 * @since version 1.0.0
 */
	if(is_active_sidebar('footer-widget-1') 
		&& is_active_sidebar('footer-widget-2')
		&& is_active_sidebar('footer-widget-3')
		&& is_active_sidebar('footer-widget-4')
	){
		$pbw_class ="col-md-3";
	}
	elseif(is_active_sidebar('footer-widget-1') 
		&& is_active_sidebar('footer-widget-2')
		&& is_active_sidebar('footer-widget-3')
	){
		$pbw_class ="col-md-4";
	}
	elseif(is_active_sidebar('footer-widget-1') 
		&& is_active_sidebar('footer-widget-2')
		){
		$pbw_class ="col-md-6";
	}else{
		$pbw_class ="col-md-12";
	}

?>
<?php
if(is_active_sidebar('footer-widget-1') || is_active_sidebar('footer-widget-2') || is_active_sidebar('footer-widget-3') || is_active_sidebar('footer-widget-4')){ ?>
	<div class="col-md-12 paraswift-footer-widget-group">
		<div id="secondary" class="widget-area paraswift-bottom <?php echo $pbw_class; ?>" role="complementary" >
			<?php dynamic_sidebar( 'footer-widget-1' ); ?>
		</div>

		<div id="secondary" class="widget-area paraswift-bottom <?php echo $pbw_class; ?>" role="complementary" >
			<?php dynamic_sidebar( 'footer-widget-2' ); ?>
		</div>
		<div id="secondary" class="widget-area paraswift-bottom <?php echo $pbw_class; ?>" role="complementary" >
			<?php dynamic_sidebar( 'footer-widget-3' ); ?>
		</div>
		<div id="secondary" class="widget-area paraswift-bottom <?php echo $pbw_class; ?>" role="complementary" >
			<?php dynamic_sidebar( 'footer-widget-4' ); ?>
		</div>
	</div>
<?php 
} ?>