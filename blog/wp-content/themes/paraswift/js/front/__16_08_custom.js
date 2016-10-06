/**	
	* Template Name: Intensely
	* Version: 1.0	
	* Template Scripts
	* Author: MarkUps
	* Author URI: http://www.markups.io/

	Custom JS
	
	1. SEARCH BOX SLIDE
	2. HOVER DROPDOWN MENU
	3. BOOTSTRAP ACCORDION
	4. SKILL PROGRESS BAR
	5. MIXIT SLIDER
	6. FANCYBOX
	7. MAIN SLIDER (SLICK SLIDER)
	8. LOGIN MODAL WINDOW
	9. COUNTER
	10. TESTIMONIAL SLIDER (SLICK SLIDER)
	11. CLIENTS BRAND SLIDER (SLICK SLIDER) 
	12. SCROLL TOP BUTTON
	13. PRELOADER 
	14. WOW ANIMATION	
	
**/
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
jQuery(function($){

	/* ----------------------------------------------------------- */
	/*  1. SEARCH BOX SLIDE
	/* ----------------------------------------------------------- */ 

	$('#search-icon').click(function(e){
		e.preventDefault();
     	$('.header-top').slideToggle(500);     
  	});
	
			
	/* ----------------------------------------------------------- */
	/*  2. HOVER DROPDOWN MENU
	/* ----------------------------------------------------------- */ 
	
	// for hover dropdown menu
  	$('ul.nav li.dropdown').hover(function() {
      $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(200);
    }, function() {
      $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(200);
    });

  	/* ----------------------------------------------------------- */
	/*  3. BOOTSTRAP ACCORDION
	/* ----------------------------------------------------------- */ 
	
	$('#accordion .panel-collapse').on('shown.bs.collapse', function () {
	$(this).prev().find(".fa").removeClass("fa-plus-square").addClass("fa-minus-square");
	});
	
	//The reverse of the above on hidden event:
	
	$('#accordion .panel-collapse').on('hidden.bs.collapse', function () {
	$(this).prev().find(".fa").removeClass("fa-minus-square").addClass("fa-plus-square");
	});	

	/* ----------------------------------------------------------- */
	/*  4. SKILL PROGRESS BAR
	/* ----------------------------------------------------------- */ 

	$('.progress .progress-bar').progressbar({
		display_text: 'center', percent_format: function(p) {return p + ' %';}});

	/* ----------------------------------------------------------- */
	/*  5. MIXIT SLIDER
	/* ----------------------------------------------------------- */  	

	jQuery(function(){
	    $('#mixit-container').mixItUp();
	});
		
	/* ----------------------------------------------------------- */
	/*  6. FANCYBOX 
	/* ----------------------------------------------------------- */

	jQuery(document).ready(function() {
		$(".fancybox").fancybox();
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
		$('.menu-icon').click(function() {
		$('#navbar').toggleClass('left');
		});
		$('.menu-close').click(function() {
		$('#navbar').removeClass('left');
		});
		$('.chosen-select').chosen();
       $('.chosen-select-deselect').chosen({ allow_single_deselect: true });
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
	});	 
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
	$("#curtain").cycle({fx:'scrollDown'});
	jQuery("marquee").hover(function(){
            this.stop();

        }, function() {
            this.start();
        });
	/* ----------------------------------------------------------- */
	/*  7. MAIN SLIDER (SLICK SLIDER)
	/* ----------------------------------------------------------- */

	jQuery('.main-slider').slick({
		dots: true,
		infinite: true,
		speed: 500,
		autoplay: true,
		accessibility: false,
		fade: true,
		cssEase: 'linear'
	});

	/* ----------------------------------------------------------- */
	/*  8. LOGIN MODAL WINDOW
	/* ----------------------------------------------------------- */

	$("#signup-btn").on('click', function(e){
		$('#signup-content').show();
		$('#login-content').hide();
		e.preventDefault();		
	});

	$("#login-btn").on('click', function(e){
		$('#login-content').show();
		$('#signup-content').hide();
		e.preventDefault();
				
	});

	/* ----------------------------------------------------------- */
	/*  9. COUNTER
	/* ----------------------------------------------------------- */ 

	  jQuery('.counter').counterUp({
            delay: 10,
            time: 1000
        });

	/* ----------------------------------------------------------- */
	/*  10. TESTIMONIAL SLIDER (SLICK SLIDER)
	/* ----------------------------------------------------------- */   

	jQuery('.testimonial-slider').slick({
		dots: true,
		infinite: true,
		speed: 500,
		autoplay: true,		
		cssEase: 'linear'
	});


	/* ----------------------------------------------------------- */
	/*  11. CLIENTS BRAND SLIDER (SLICK SLIDER)
	/* ----------------------------------------------------------- */   

	$('.clients-brand-slide').slick({
	  dots: false,
	  infinite: false,
	  speed: 300,
	  slidesToShow: 4,
	  slidesToScroll: 4,
	  autoplay: true,	
	  responsive: [
	    {
	      breakpoint: 1024,
	      settings: {
	        slidesToShow: 3,
	        slidesToScroll: 3,
	        infinite: true,
	        dots: true
	      }
	    },
	    {
	      breakpoint: 600,
	      settings: {
	        slidesToShow: 2,
	        slidesToScroll: 2
	      }
	    },
	    {
	      breakpoint: 480,
	      settings: {
	        slidesToShow: 1,
	        slidesToScroll: 1
	      }
	    }
	    // You can unslick at a given breakpoint now by adding:
	    // settings: "unslick"
	    // instead of a settings object
	  ]
	});

	/* ----------------------------------------------------------- */
	/*  12. SCROLL TOP BUTTON
	/* ----------------------------------------------------------- */

	//Check to see if the window is top if not then display button

	$(window).scroll(function(){
	    if ($(this).scrollTop() > 300) {
	      $('.scrollToTop').fadeIn();
	    } else {
	      $('.scrollToTop').fadeOut();
	    }
	});	   
	   
	//Click event to scroll to top

	$('.scrollToTop').click(function(){
	    $('html, body').animate({scrollTop : 0},800);
	    return false;
	});

	/* ----------------------------------------------------------- */
	/*  13. PRELOADER 
	/* ----------------------------------------------------------- */ 
	
	jQuery(window).load(function() { // makes sure the whole site is loaded
      $('#status').fadeOut(); // will first fade out the loading animation
      $('#preloader').delay(100).fadeOut('slow'); // will fade out the white DIV that covers the website.
      $('body').delay(100).css({'overflow':'visible'});
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
    })

   
	/* ----------------------------------------------------------- */
	/*  14. WOW ANIMATION
	/* ----------------------------------------------------------- */ 

	wow = new WOW(
      {
        animateClass: 'animated',
        offset:       100,
        live:         true,
        callback:     function(box) {
          console.log("WOW: animating <" + box.tagName.toLowerCase() + ">")
        }
      }
    );
    wow.init(); 
	
});