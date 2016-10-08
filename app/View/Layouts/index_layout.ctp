<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="google-site-verification" content="A1Djb04pKm4SlxWECGicdaoSRCM9DZowxYQbtqsuQTw" />
    <meta name="Keywords" content="">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Braingroom</title>
     <link rel="shortcut icon" type="image/icon" href="assets/images/favicon-32x32.png"/>
     <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
	 <?php 
            echo $this->Html->script('front/jquery.min');
       ?>
     <!-- The styles -->
	      <?php 
		     //echo $this->Html->css('front/brain_new'); 
		     /*
            echo $this->Html->css('front/bootstrap.min'); 
           
            echo $this->Html->css('front/style_g');
            echo $this->Html->css('front/header'); 
		    echo $this->Html->css('front/font-awesome.min'); 
            echo $this->Html->css('front/bootstrap'); 
            echo $this->Html->css('front/brain'); 
            echo $this->Html->css('front/slick'); 
            echo $this->Html->css('front/jquery.fancybox');
            echo $this->Html->css('front/animate'); 
            
           
            echo $this->Html->css('front/theme-color/default-theme');
            echo $this->Html->css('front/pop-up-style-main'); 
            echo $this->Html->css('front/bootstrap-chosen'); 
            echo $this->Html->css('front/style1');
            echo $this->Html->css('front/tabstyles');
            echo $this->Html->css('front/grid-slide-style');
            
            echo $this->Html->css('front/media');
            echo $this->Html->css('front/num');
            echo $this->Html->css('front/newupadted');
            echo $this->Html->css('connect/connect');
			*/
			echo $this->Html->css('front/bootstrap-progressbar-3.3.4'); //dh
			echo $this->Html->css('front/settings');//fdsf
			
			
			echo $this->Html->css('front/combine');
            
        ?>
         
		 <?php echo $scripts_for_layout;?>
		 
		 
		 
         <style>
            th,td {
                border-style: solid;
                border-width: 5px;
                border-color: #BCBCBC;
                word-wrap: break-word;
            }
			
			.slider { display: none; }
             .slider.slick-initialized { display: block; }
         </style>
<!-- Start Alexa Certify Javascript -->
<script type="text/javascript">
_atrk_opts = { atrk_acct:"po+Kn1QolK104B", domain:"braingroom.com",dynamic: true};
(function() { var as = document.createElement('script'); as.type = 'text/javascript'; as.async = true; as.src = "https://d31qbv1cthcecs.cloudfront.net/atrk.js"; var s = document.getElementsByTagName('script')[0];s.parentNode.insertBefore(as, s); })();
</script>
<noscript><img src="https://d5nxst8fruw4z.cloudfront.net/atrk.gif?account=po+Kn1QolK104B" style="display:none" height="1" width="1" alt="" /></noscript>
<!-- End Alexa Certify Javascript -->
    </head>
    <body>
    	<?php  echo $this->Element('index_header');?>
    	<?php echo $this->fetch('content'); ?>
       <?php  echo $this->Element('homes_footer');?>
    	
    </body>
</html>

<?php 


 /*
 echo $this->Html->script('front/bootstrap');
  echo $this->Html->script('front/slick1');
 echo $this->Html->script('front/jquery.mixitup');
 
 echo $this->Html->script('front/jquery.fancybox.pack');
 echo $this->Html->script('front/waypoints');
 echo $this->Html->script('front/wow');
 echo $this->Html->script('front/chosen.jquery');
 
 echo $this->Html->script('front/bootstrap-progressbar');
 echo $this->Html->script('front/city-popup-main');
 echo $this->Html->script('front/jquery.flexisel');
 echo $this->Html->script('front/cbpFWTabs');
 echo $this->Html->script('front/custom');
 echo $this->Html->script('front/jquery.bxslider');
 echo $this->Html->script('front/top_bottom/cycle-plugin');
 
echo $this->Html->script('front/jquery.counterup');
*/

echo $this->Html->script('front/target');


//echo $this->Html->script('front/top_bottom/jquery');

?>

<script type="text/javascript">
        
    $(document).ready(function(){
  
      $("#curtain").cycle({fx:'scrollDown'});
		 $('#slideshow1').cycle({ 
        fx:      'turnDown', 
    delay:   -4000 
    }); 
	$('#slideshow2').cycle({ 
        fx:      'turnDown', 
    delay:   -8000 
    }); $('#slideshow3').cycle({ 
       fx:      'turnDown', 
    delay:   -12000 
    }); 
      /*sitaram*/
       $('#cooking').trigger('click');
    });   

$(window).load(function() {
		  $("#grid-contant-slider1").flexisel({
    visibleItems: 4,
    itemsToScroll: 3,
    animationSpeed: 400,
    infinite: true,
    navigationTargetSelector: null,
    autoPlay: {
      enable: false,
      interval: 5000,
      pauseOnHover: true
    },
    responsiveBreakpoints: { 
      portrait: { 
        changePoint:480,
        visibleItems: 1,
        itemsToScroll: 1
      }, 
        landscape: { 
        changePoint:640,
        visibleItems: 2,
        itemsToScroll: 2
      },
        tablet: { 
        changePoint:768,
        visibleItems: 3,
        itemsToScroll: 3
      }
    }
  });
  		  $("#grid-contant-slider2").flexisel({
    visibleItems: 4,
    itemsToScroll: 3,
    animationSpeed: 400,
    infinite: true,
    navigationTargetSelector: null,
    autoPlay: {
      enable: false,
      interval: 5000,
      pauseOnHover: true
    },
    responsiveBreakpoints: { 
      portrait: { 
        changePoint:480,
        visibleItems: 1,
        itemsToScroll: 1
      }, 
        landscape: { 
        changePoint:640,
        visibleItems: 2,
        itemsToScroll: 2
      },
        tablet: { 
        changePoint:768,
        visibleItems: 3,
        itemsToScroll: 3
      }
    }
  });
  $("#grid-contant-slider3").flexisel({
    visibleItems: 4,
    itemsToScroll: 3,
    animationSpeed: 400,
    infinite: true,
    navigationTargetSelector: null,
    autoPlay: {
      enable: false,
      interval: 5000,
      pauseOnHover: true
    },
    responsiveBreakpoints: { 
      portrait: { 
        changePoint:480,
        visibleItems: 1,
        itemsToScroll: 1
      }, 
        landscape: { 
        changePoint:640,
        visibleItems: 2,
        itemsToScroll: 2
      },
        tablet: { 
        changePoint:768,
        visibleItems: 3,
        itemsToScroll: 3
      }
    }
  });
});
$(document).ready(function() {
  $('.menu-icon').click(function() {
    $('#navbar').toggleClass('left');
  });
  $('.menu-close').click(function() {
    $('#navbar').removeClass('left');
  });
});

    </script>
    
    <script>
    $(document).ready(function($) {
       $('.chosen-select').chosen();
       $('.chosen-select-deselect').chosen({ allow_single_deselect: true });
     });
   </script>
<!--End 1st slide script-->

        <script>
                    $(document).ready(function() {
                      var owl = $('.owl-carousel');
                      owl.owlCarousel({
                        rtl: true,
                        margin: 10,
                        nav: true,
                        loop: true,
                        responsive: {
                          0: {
                            items: 1
                          },
                          600: {
                            items: 3
                          },
                          1000: {
                            items: 5
                          }
                        }
                      })
                    })
       
     <!-- JQuery search box -->
     
         $("#m_search").click(function(){
          // Holds the product ID of the clicked element
          $('.bl_inpt').toggle();
        });
        // **********first id***********//
          $("#b11").click(function(){
            var val=$('#b11').text();
            $("#search").val(val);
            $('.bl_inpt').hide();
        });
          // **********first id***********//
          // **********second id***********//
          $("#b12").click(function(){
            var val=$('#b12').text();
            $("#search").val(val);
            $('.bl_inpt').hide();
        });
          // **********second id***********//
          // **********third id***********//
          $("#b13").click(function(){
            var val=$('#b13').text();
            $("#search").val(val);
            $('.bl_inpt').hide();
        });
          // **********third id***********//
          // **********four id***********//
          $("#b14").click(function(){
            var val=$('#b14').text();
            $("#search").val(val);
            $('.bl_inpt').hide();
        });
          // **********four id***********//
          // **********fifth id***********//
          $("#b15").click(function(){
            var val=$('#b15').text();
            $("#search").val(val);
            $('.bl_inpt').hide();
        });
          // **********fifth id***********//
          // **********sixth id***********//
          $("#b16").click(function(){
            var val=$('#b16').text();
            $("#search").val(val);
            $('.bl_inpt').hide();
        });
          // **********sixth id***********//
          $(document).ready(function(){
        
        $("#curtain").cycle({fx:'scrollDown'});
        });
     
	 
    jQuery(document).ready(function(){
        jQuery("marquee").hover(function(){
            this.stop();

        }, function() {
            this.start();
        });
    });

  function blink() {
      var blinks = document.getElementsByTagName('blink');
      for (var i = blinks.length - 1; i >= 0; i--) {
          var s = blinks[i];
          s.style.visibility = (s.style.visibility === 'visible') ? 'hidden' : 'visible';
      }
      window.setTimeout(blink, 2000);
  }
  if (document.addEventListener) document.addEventListener("DOMContentLoaded", blink, false);
  else if (window.addEventListener) window.addEventListener("load", blink, false);
  else if (window.attachEvent) window.attachEvent("onload", blink);
  else window.onload = blink;
</script>		  
      
  </body>
</html>
<!--1st slide script-->
<!--<script> 
  // jQuery(function() {
  //     blinkeffect('#blnk');
  // });
  // function blinkeffect(selector) {
  //   jQuery(selector).fadeOut('slow', function() {
  //     jQuery(this).fadeIn('slow', function() {
  //       blinkeffect(this);
  //     });
  //   });
  // }
</script>--> 
