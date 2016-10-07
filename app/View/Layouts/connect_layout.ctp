<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="google-site-verification" content="A1Djb04pKm4SlxWECGicdaoSRCM9DZowxYQbtqsuQTw" />
    <meta name="Keywords" content="">
    <title>Braingroom</title>
     <link rel="shortcut icon" type="image/icon" href="assets/images/favicon-32x32.png"/>
     <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
     	  <?php 

            echo $this->Html->css('front/bootstrap.min'); 
            echo $this->Html->css('front/style_g');
            echo $this->Html->css('front/header'); 
			echo $this->Html->css('front/font-awesome.min'); 
            echo $this->Html->css('front/bootstrap'); 
            echo $this->Html->css('front/brain'); 
            echo $this->Html->css('front/slick'); 
            echo $this->Html->css('front/jquery.fancybox');
            echo $this->Html->css('front/animate'); 
            echo $this->Html->css('front/bootstrap-progressbar-3.3.4'); 
            //echo $this->Html->css('front/brain_new'); 
            echo $this->Html->css('front/theme-color/default-theme');
            echo $this->Html->css('front/pop-up-style-main'); 
            echo $this->Html->css('front/bootstrap-chosen'); 
            echo $this->Html->css('front/style1');
            echo $this->Html->css('front/tabstyles');
            echo $this->Html->css('front/grid-slide-style');
            echo $this->Html->css('front/settings');
            echo $this->Html->css('front/media');
            echo $this->Html->css('front/num');
            echo $this->Html->css('front/newupadted');
            echo $this->Html->css('connect/connect');
	        echo $this->Html->css('connect/owl.carousel');	
            echo $this->Html->css('connect/jquery.mCustomScrollbar');
	        echo $this->Html->css('timepickker/jquery.timepicker');
	        echo $this->Html->css('connect/multiselect/select2.min');	
         
          ?>

         <?php

            echo $this->Html->script('front/jquery.min');
	        echo $this->Html->script('timepickker/jquery.timepicker'); 
            echo $this->Html->script('front/bootstrap');
            echo $this->Html->script('front/jquery.mixitup');
            echo $this->Html->script('front/jquery.fancybox.pack');
            echo $this->Html->script('front/waypoints');
            echo $this->Html->script('front/jquery.counterup');
            echo $this->Html->script('front/wow');
            echo $this->Html->script('front/chosen.jquery');
            echo $this->Html->script('front/slick1');
            echo $this->Html->script('front/bootstrap-progressbar');
            echo $this->Html->script('front/city-popup-main');
            echo $this->Html->script('front/jquery.flexisel');
            echo $this->Html->script('front/cbpFWTabs');
            echo $this->Html->script('front/custom');
            echo $this->Html->script('front/jquery.bxslider');
            echo $this->Html->script('front/top_bottom/cycle-plugin');
	        echo $this->Html->script('connect/owl.carousel'); 	
            echo $this->Html->script('scrll_bar/jquery.mCustomScrollbar.concat.min');
            echo $this->Html->script('connect/multiselect/select2.min');
        ?>
		 <?php echo $scripts_for_layout;?>
         <style>
            th,td {
                border-style: solid;
                border-width: 5px;
                border-color: #BCBCBC;
                word-wrap: break-word;
            }
         </style>
    </head>
    <body>
    	<?php  echo $this->Element('index_header');?>
    	<?php  echo $this->fetch('content'); ?>
      <?php  echo $this->Element('homes_footer');?>
    </body>
</html>
   
