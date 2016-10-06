<?php if(get_theme_mod('theme_primary_color')){
	$paraswift_primary_customizerbg = esc_attr(get_theme_mod('theme_primary_color'));
} else{
	$paraswift_primary_customizerbg = '#3CB5D0';
} 

if(get_theme_mod('theme_primary_hover_color')){
	$paraswift_primary_hover_customizerbg = esc_attr(get_theme_mod('theme_primary_hover_color'));
} else{
	$paraswift_primary_hover_customizerbg = '#29a9c6';
}
?>
<style type="text/css">
.topbar-section,
.paraswift-cta,
.col-md-6.paraswift-about-content{
	background-color: <?php echo $paraswift_primary_customizerbg;?>;
}
.paraswift-btn,
.continue-reading{
	border-color:<?php echo $paraswift_primary_customizerbg;?>;
}
a{
	color: <?php echo $paraswift_primary_customizerbg;?>;
}
.paraswift-footer-widget h2{
	color:<?php echo $paraswift_primary_customizerbg;?>;
	border-color: <?php echo $paraswift_primary_customizerbg;?>;
	font-size: <?php echo esc_attr(get_theme_mod('pfwt_font_size'));?>px;
}
#paraswift-sidebar h2.widget-title{
	font-size: <?php echo esc_attr(get_theme_mod('pswt_font_size'));?>px;
}
ul#para-nav li li:hover{
	background-color: <?php echo $paraswift_primary_hover_customizerbg;?>;
}
.secondary-border{
	border:3px solid #fff;
}
<?php if(get_theme_mod('about_image')){?>
	.paraswift-about-section{
		background:url("<?php echo esc_attr(get_theme_mod('about_image'));?>");
	}
<?php }

// $current_top = esc_attr(get_theme_mod('topbar_status', '0'));
// if($current_top) {
// 	/*.topbar-section{
// 		display: none !important;
// 	}*/
// <?php }
?>
body,p{
	font-size: <?php echo esc_attr(get_theme_mod('body_font_size'));?>px;
}
h1{
	font-size: <?php echo esc_attr(get_theme_mod('h1_font_size'));?>px;
}
h2{
	font-size: <?php echo esc_attr(get_theme_mod('h2_font_size'));?>px;
}
h2{
	font-size: <?php echo esc_attr(get_theme_mod('h3_font_size'));?>px;
}

</style>