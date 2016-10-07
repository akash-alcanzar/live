<?php
//
// Recommended way to include parent theme styles.
//  (Please see http://codex.wordpress.org/Child_Themes#How_to_Create_a_Child_Theme)
//  
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array('parent-style')
    );
}
//
// Your code goes below


add_action('wp', 'auto_login');

function auto_login(){
    global $wpdb;

    // logout

    


    if(isset($_COOKIE['authCookie'])){
        $id= $_COOKIE['authCookie'];
        $sql="SELECT * FROM `bg_user_masters` WHERE bg_user_masters.id='".$id."' ";
        $result= $wpdb->get_row($sql);

        if(!is_user_logged_in()){
        	$email= $result->email;
           // check user already registered
        	$user = get_user_by('email', $email);
        	
        	if(empty($user)){
        	   // register user
        	   $password=wp_generate_password(8, false);	
        	   $user_id = wp_insert_user(
							array(
								'user_pass' => apply_filters('pre_user_user_pass', $password), 
								'user_login' => apply_filters('pre_user_user_login', $email), 
								'user_email' => apply_filters('pre_user_user_email', $email)
								)
							);
				if(!is_wp_error($user_id)){
					add_user_meta( $user_id, 'simple_pass', $password);
					add_user_meta( $user_id, 'user_master_id', $result->id);
					//do_action('user_register', $user_id);
				}

				$info_register = array();
                $info_register['user_login'] = $email;
                $info_register['user_password'] = $password;
                wp_signon($info_register,false);

        	}else{
        	   $ID= $user->id;
        	   $password=get_user_meta($ID, "simple_pass", true);	
               $info_register = array();
               $info_register['user_login'] = $email;
               $info_register['user_password'] = $password;
               wp_signon($info_register,false);
        	}

        	
        }

        
    }else{
       wp_clear_auth_cookie();

    }
}


//Comments
add_filter( 'login_url', 'my_login_linkchanger');
function my_login_linkchanger($link){
   return 'https://www.braingroom.com/Homes/login';
   //return home_url( '/login');
}



function getHeader(){
	
	wp_enqueue_style('brain-style', get_template_directory_uri().'/front/brain.css' );
	wp_enqueue_style('bootmin-style', get_template_directory_uri().'/front/bootstrap.min.css' );
	wp_enqueue_style('boot-style', get_template_directory_uri().'/front/bootstrap.css' );
	wp_enqueue_style('st1-style', get_template_directory_uri().'/front/style1.css');
	wp_enqueue_style('default-style', get_template_directory_uri().'/front/theme-color/default-theme.css');
	wp_enqueue_style('header-style', get_template_directory_uri().'/front/header.css');
	wp_enqueue_style('font-style', get_template_directory_uri().'/front/style_g.css');
	wp_enqueue_style('media-style', get_template_directory_uri().'/front/media.css');

	wp_enqueue_script( 'script-name', get_template_directory_uri() . '/js/front/custom.js');

	?>
<style type="text/css">
.btclass1 {
    border-bottom: 2px solid !important;
}
.srchbutt {
    float: right !important;
}
.buttclass, .butgift {
    padding: 13px 12px !important;
    border-left: 1px solid #FFF !important;
    border-right: 1px solid #FFF !important;
}
.border-blog {
    padding: 13px 12px !important;
}
.butidea, .buttclass, .butgift, .b_signup, .b_chennai {
    font-size: 16px !important;
    font-family: inherit !important;
}
.navbar-nav > li > a {
    font-family: inherit !important;
}
</style>
<?php // wp_enqueue_script( 'script-name', get_template_directory_uri() . '/js/front/custom.js'); ?>


<?php
  
  $login_str='';
  if(!is_user_logged_in()){
     $login_str='<a style="padding:10px 12px;" class="b_signup" id="" href="/Homes/login">Login/Sign Up</a>';
  }

	$output='<div class="container-fluid padd_l_r ">  
  <div class="col-md-12 col-xs-12 b_header padd_l_r b12_field">
      <div class="col-lg-offset-1 col-lg-10 col-md-12 col-sm-12  b12_field padd_l_r ">
        <!-- <div class="col-md-12 col-sm-12 col-xs-12 b_header padd_l_r"> -->
          <!-- <div class=" bdrcol-sm-12  col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2  col-xs-12 b_row padd_l_r"> -->
            <div class="col-xs-12 col-sm-12 sr_15_07_padd">
              <!-- ***************left button*************** -->
              <div class="col-md-7 col-sm-7 col-lg-8 col-xs-12 pull-left padd_l_r sr_18_07_header_bdr">
                                  <a href="https://www.braingroom.com/sell-express">
                    <button class="btn buttclass">Class Providers</button>
                  </a>
                  <a href="https://www.braingroom.com/catalogue_for_organizers">
                    <button class="btn butidea sr_18_07_cfo">Catalogue for Organizers</button>
                  </a>
                  <a href="https://www.braingroom.com/Homes/gift">
                    <button class="btn butgift">
                      <i aria-hidden="true" class="fa fa-gift gifticon"></i>
                      Gift A Class
                    </button>
                  </a>  
                   <a href="https://www.braingroom.com/blog">
                    <button class="btn butidea sr_18_07_cfo border-blog"> 
                    <i class="glyphicon glyphicon-comment blogicon"></i> Blog</button>
                  </a>
                  <a href="https://www.braingroom.com/contact">
                  <button class="btn butidea sr_18_07_cfo border-blog"> 
                    Contact Us</button>  
                  </a>
              </div>
              <!-- ***************left button*************** -->
              <!-- ***************right button*************** -->
              <div class="col-md-5 col-xs-12 col-lg-4 col-sm-5  padd_l_r">
                  <div id="br_login" class="pull-right br_login">
                      <i aria-hidden="true" class="fa fa-sign-in b_login"></i>
                      
                       <span>
                          '.$login_str.'
                       </span>
						
                      <i style="position:relative;left:6%; top: -2px;" aria-hidden="true" class="fa fa-map-marker"></i>
                      <select onchange="get_city_value(this.value)" id="header_city_id" name="header_city_id" class="b_chennai home_header_city">
                                                                 <option value="1" style="font-size:14px;">
                                      Chennai                                    </option>
                                                                    <option value="2" style="font-size:14px;">
                                      Hyderabad                                    </option>
                                                                    <option value="3" style="font-size:14px;">
                                      Bangalore                                    </option>
                                                                    <option value="4" style="font-size:14px;">
                                      Ahmedabad                                    </option>
                                                                    <option value="5" style="font-size:14px;">
                                      Mumbai                                    </option>
                                                                    <option value="6" style="font-size:14px;">
                                      Delhi
                                    </option>
                                                                    <option value="7" style="font-size:14px;">
                                      Pune
                                    </option>
                                                                    <option value="10" style="font-size:14px;">
                                      Kolkata                                    </option>
                                                        </select>
                         <i style="position:relative;left:-6%;" aria-hidden="true" class="fa fa-angle-down"></i>
                        <!-- <i class="fa fa-angle-down" aria-hidden="true" style="position: relative; cursor: pointer; left: -8%; font-size: 20px;"></i> -->
                  </div>
              </div>
              <!-- ***************right button *************** -->
            </div>
          <!-- </div> -->
        <!-- </div> -->
      </div>
  </div>
  <div class="col-xs-12 col-sm-12 padd_l_r">
        <div class="col-lg-offset-1 col-lg-10 col-md-12 col-sm-12 col-xs-12 padd_l_r">
            <div class="col-xs-12 col-sm-12 padd_l_r sr_29_07_m_top">
              <!-- <div class="col-md-12 col-md-12 col-sm-12 col-xs-12 br_pad brn_pad"> -->
                 <!--  <div class="col-sm-12  col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2 col-xs-12 brn_pad"> -->
                 
                      <div class="col-md-3 col-sm-3 col-xs-12 b_logo brn_pad b_widh sr_29_07_lgo_img">
                      <img style="width: 50px;" src="https://www.braingroom.com/img/beta.png">
                        <a href="https://www.braingroom.com">
                          <img class="blwdh" src="https://www.braingroom.com/img/logo.jpg">
                        </a>
                      </div>
                      <!-- ******************new alignment***************** -->
                      <div class="col-md-6 col-sm-5 col-xs-12 padd_l_r b_fcb1 b_pad1 sr_29_07_md_screen">
                        <center class="bl_cntr">
                          <form method="post" name="s_cat" action="https://www.braingroom.com/vendor_classes/lists">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                              <input type="hidden" value="" name="search_cat_id" id="search_cat_id">
                               
                                <div class="sr_29_07_search_box_div">
                                  <div style="padding-right: 0px; margin-top: -4px;" class="col-xs-5 sr_19_07_select_div">
                                      <select style="" name="search_cat_id" class="form-control sr_19_07_select_btn">
                                          <option class="slt_pad01_08" value="0">Select Category</option>
                                          <option class="slt_pad01_08" value="1">Fun &amp; Recreation</option>
                                          <option class="slt_pad01_08" value="2">Informative &amp; Motivational</option>
                                          <option class="slt_pad01_08" value="3">Health &amp; Fitness</option>
                                          <option class="slt_pad01_08" value="4">Kids &amp; Teens</option>
                                          <option class="slt_pad01_08" value="5">Education &amp; Skill Development</option>
                                          <option class="slt_pad01_08" value="6">Home Maintenance</option>

                                      </select>
                                      <span class="carrte_select"><img style="height: 10px;" alt="img" src="https://www.braingroom.com/img/caret.png"></span>
                                  </div>
                                  <div class="col-xs-7">
                                      <input type="text" style="border-radius: 0px; width: 100%; padding-right: 40px;" class="b_1_input1" id="search_key" name="search_key" placeholder="Search for classes &amp; activities...">
                                      <button style="" name="search" class="srchbutt" type="submit">
                                       <i style="color: #1d4f8a;" class="fa fa-search srci"></i>
                                      </button>
                                  </div>
                                </div>
                                <!-- hide category -->
                                
                                <!-- hide category -->
                            </div>
                          </form>
                            <div class="col-md-9 col-sm-12 col-xs-12 bl_inpt">
                              <div>
                                <div id="b11"><a onclick="serch_cat("1");" class="fun123" href="#">Fun &amp; Recreation</a></div>
                                <div id="b12"><a onclick="serch_cat("2");" class="fun123" href="#">Informative &amp; Motivational</a></div>
                                <div id="b13"><a onclick="serch_cat("3");" class="fun123" href="#">Health &amp; Fitness</a></div>
                                <div id="b14"><a onclick="serch_cat("4");" class="fun123" href="#">Kids &amp; Teens</a></div>
                                <div id="b15"><a onclick="serch_cat("5");" class="fun123" href="#">Education &amp; Skill Development</a></div>
                                <div id="b16"><a onclick="serch_cat("6");" class="fun123" href="#">Home Maintenance</a></div>
                              </div>
                            </div>    
                        </center>
                      </div>
                      <div class="col-md-3 col-sm-4 col-xs-12 padd_l_r b_fcb2 b_pad12 sr_15_07_connect_btn">
                          <div class="pull-right b_lft">
                            <button style="padding:5px 20px;" class="btn btclass1 fbttp"><img src="https://www.braingroom.com/img/iconfind.png">Find</button>
                            <button style="padding:5px 10px;" class="btn btclassnt1  fbttp">
                            <!--<img src="https://www.braingroom.com/img/iconconnect1.png" />--> <i class="fa fa-group"></i> Connect</button>
                          </div>
                      </div>
                      <!-- ******************new alignment***************** -->
                  </div>
        </div>
  </div>
</div>

<section id="menu-area">            
    <nav role="navigation padd_l_r" class="navbar navbar-default"> 
        <div class="col-lg-offset-1 col-lg-10 col-md-12 col-sm-12 padd_l_r">
        <a class="menu-icon" href="#"><span class="fa fa-bars logspan"></span></a>
        <div class="navbar-collapse collapse na_bg_clr012" id="navbar">
        <ul class="nav navbar-nav navbar-right main-nav col-xs-12 col-sm-12 padd_l_r" id="top-menu">
		<li class="dropdown active first maiin-menu-list">
		     <a class="# pad_right_5 maiin-menu-list-link" href="https://www.braingroom.com/fun-and-recreation">
                Fun &amp; Recreation                <span class="fa fa-angle-down"></span>
              </a>
	<ul style="background-color:#38B9B5; z-index:100000;" role="menu" class="dropdown-menu">
    	<li>
        	                        <a href="https://www.braingroom.com/fun-and-recreation/cooking-and-baking">
                    Cooking &amp; Baking</a>
                                                <a href="https://www.braingroom.com/fun-and-recreation/arts-and-crafts">
                    Arts &amp; Crafts</a>
                                                <a href="https://www.braingroom.com/fun-and-recreation/music-and-dance">
                    Music &amp; Dance</a>
                                                <a href="https://www.braingroom.com/fun-and-recreation/sports">
                    Sports</a>
                                                <a href="https://www.braingroom.com/fun-and-recreation/adeventure-and-activities">
                    Adventure Activities</a>
                                                <a href="https://www.braingroom.com/fun-and-recreation/media-and-literature">
                    Media &amp; Literature</a>
                                                <a href="https://www.braingroom.com/fun-and-recreation/self-defense">
                    Self Defence</a>
                                                <a href="https://www.braingroom.com/fun-and-recreation/india-indigenous">
                    India Indigenous</a>
                                                <a href="https://www.braingroom.com/fun-and-recreation/photography">
                    Photography</a>
                                </li>
    </ul>
    </li>
    		<li class="dropdown active first maiin-menu-list">
		     <a class="# pad_right_5 maiin-menu-list-link" href="https://www.braingroom.com/informative-and-motivational">
                Informative &amp; Motivational                <span class="fa fa-angle-down"></span>
              </a>
	<ul style="background-color: rgb(56, 185, 181); z-index: 100000; display: none;" role="menu" class="dropdown-menu">
    	<li>
        	                        <a href="https://www.braingroom.com/informative-and-motivational/personality-development">
                    Personality Development</a>
                                                <a href="https://www.braingroom.com/informative-and-motivational/communication-and-soft-skills">
                    Communication &amp; Soft Skills</a>
                                                <a href="https://www.braingroom.com/informative-and-motivational/brain-efficiency-improvement">
                    Brain Efficiency Improvement</a>
                                                <a href="https://www.braingroom.com/informative-and-motivational/language-learning">
                    Language Learning</a>
                                                <a href="https://www.braingroom.com/informative-and-motivational/motivational-talks">
                    Motivational Talks</a>
                                                <a href="https://www.braingroom.com/informative-and-motivational/spiritual-talks">
                    Spiritual Talks</a>
                                                <a href="https://www.braingroom.com/informative-and-motivational/career-management">
                    Career Management</a>
                                                <a href="https://www.braingroom.com/informative-and-motivational/relationship-management">
                    Relationship Management</a>
                                                <a href="https://www.braingroom.com/informative-and-motivational/india-indigenous">
                    India Indigenous</a>
                                </li>
    </ul>
    </li>
    		<li class="dropdown active first maiin-menu-list">
		     <a class="# pad_right_5 maiin-menu-list-link" href="https://www.braingroom.com/health-and-fitness">
                Health &amp; Fitness                <span class="fa fa-angle-down"></span>
              </a>
	<ul style="background-color:#38B9B5; z-index:100000;" role="menu" class="dropdown-menu">
    	<li>
        	                        <a href="https://www.braingroom.com/health-and-fitness/yoga-meditaion">
                    Yoga &amp; Meditation</a>
                                                <a href="https://www.braingroom.com/health-and-fitness/nutritional-cooking-and-eating">
                    Nutritional Cooking / Eating</a>
                                                <a href="https://www.braingroom.com/health-and-fitness/weight-loss">
                    Weight Loss</a>
                                                <a href="https://www.braingroom.com/health-and-fitness/lifestyle-management">
                    Lifestyle Management</a>
                                                <a href="https://www.braingroom.com/health-and-fitness/disease-management">
                    Disease Management</a>
                                                <a href="https://www.braingroom.com/health-and-fitness/alternate-therapies">
                    Alternative Therapies</a>
                                                <a href="https://www.braingroom.com/health-and-fitness/fun-fitness">
                    Fun &amp; Fitness</a>
                                                <a href="https://www.braingroom.com/health-and-fitness/womens-health-and-beauty">
                    Womens Health &amp; Beauty</a>
                                                <a href="https://www.braingroom.com/health-and-fitness/india-indigenous">
                    India Indigenous</a>
                                </li>
    </ul>
    </li>
    		<li class="dropdown active first maiin-menu-list">
		     <a class="# pad_right_5 maiin-menu-list-link" href="https://www.braingroom.com/kids-and-teens">
                Kids &amp; Teens                <span class="fa fa-angle-down"></span>
              </a>
	<ul style="background-color:#38B9B5; z-index:100000;" role="menu" class="dropdown-menu">
    	<li>
        	                        <a href="https://www.braingroom.com/kids-and-teens/arts-and-crafts">
                    Arts &amp; Crafts</a>
                                                <a href="https://www.braingroom.com/kids-and-teens/abacus-and-vedic-mathematics">
                    Abacus &amp; Vedic Mathematics</a>
                                                <a href="https://www.braingroom.com/kids-and-teens/music-and-dance">
                    Music &amp; Dance</a>
                                                <a href="https://www.braingroom.com/kids-and-teens/personality-development">
                    Personality Development</a>
                                                <a href="https://www.braingroom.com/kids-and-teens/brain-efficiency">
                    Brain Efficiency</a>
                                                <a href="https://www.braingroom.com/kids-and-teens/parenting">
                    Parenting</a>
                                                <a href="https://www.braingroom.com/kids-and-teens/special-kids">
                    Special Kids</a>
                                                <a href="https://www.braingroom.com/kids-and-teens/science-and-technology">
                    Science &amp; Technology</a>
                                                <a href="https://www.braingroom.com/kids-and-teens/special-kids">
                    Special Kids</a>
                                                <a href="https://www.braingroom.com/kids-and-teens/science-and-technology">
                    Science &amp; Technology</a>
                                                <a href="https://www.braingroom.com/kids-and-teens/sports">
                    Sports</a>
                                                <a href="https://www.braingroom.com/kids-and-teens/self-defense">
                    Self Defence</a>
                                </li>
    </ul>
    </li>
    		<li class="dropdown active first maiin-menu-list">
		     <a class="# pad_right_5 maiin-menu-list-link" href="https://www.braingroom.com/educational-and-skill-development">
                Education &amp; Skill Development                <span class="fa fa-angle-down"></span>
              </a>
	<ul style="background-color:#38B9B5; z-index:100000;" role="menu" class="dropdown-menu">
    	<li>
        	                        <a href="https://www.braingroom.com/educational-and-skill-development/india-indigenous">
                    India Indigenous</a>
                                                <a href="https://www.braingroom.com/educational-and-skill-development/robotics">
                    Robotics</a>
                                                <a href="https://www.braingroom.com/educational-and-skill-development/electronics">
                    Electronics</a>
                                                <a href="https://www.braingroom.com/educational-and-skill-development/programming">
                    Programming</a>
                                                <a href="https://www.braingroom.com/educational-and-skill-development/design">
                    Design</a>
                                                <a href="https://www.braingroom.com/educational-and-skill-development/experimental-learning">
                    Experimental Learning</a>
                                                <a href="https://www.braingroom.com/educational-and-skill-development/industrial-training">
                    Industrial Training</a>
                                                <a href="https://www.braingroom.com/educational-and-skill-development/academics">
                    Academics</a>
                                                <a href="https://www.braingroom.com/educational-and-skill-development/skill-development">
                    Skill Development</a>
                                                <a href="https://www.braingroom.com/educational-and-skill-development/academics">
                    Academics</a>
                                </li>
    </ul>
    </li>
    		<li class="dropdown active first maiin-menu-list">
		     <a class="# pad_right_5 maiin-menu-list-link" href="https://www.braingroom.com/home-maintenance">
                Home Maintenance                <span class="fa fa-angle-down"></span>
              </a>
	<ul style="background-color:#38B9B5; z-index:100000;" role="menu" class="dropdown-menu">
    	<li>
        	                        <a href="https://www.braingroom.com/home-maintenance/india-indigenous">
                    India Indigenous</a>
                                                <a href="https://www.braingroom.com/home-maintenance/home-hardware">
                    Home Hardware </a>
                                                <a href="https://www.braingroom.com/home-maintenance/farming-and-gardening">
                    Farming &amp; Gardening</a>
                                                <a href="https://www.braingroom.com/home-maintenance/interior-design">
                    Interior Design</a>
                                                <a href="https://www.braingroom.com/home-maintenance/automobile-maintenance">
                    Automobile Maintenance</a>
                                                <a href="https://www.braingroom.com/home-maintenance/eco-friendly-and-energy-savings">
                    Eco Friendly / Energy Savings</a>
                                                <a href="https://www.braingroom.com/home-maintenance/building-and-buying">
                    Building &amp; Buying</a>
                                                <a href="https://www.braingroom.com/home-maintenance/pets-maintenance">
                    Pets Maintenance</a>
                                                <a href="https://www.braingroom.com/home-maintenance/building-and-buying">
                    Building &amp; Buying</a>
                                                <a href="https://www.braingroom.com/home-maintenance/pets-maintenance">
                    Pets Maintenance</a>
                                </li>
    </ul>
    </li>
    </ul>
         
          <a class="menu-close" href="#"><span class="fa fa-close"></span></a></div>

      </div>     
    </nav>
</section>

';

?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<script type="text/javascript">
	$(document).ready(function() {
	  $('.menu-icon').click(function() {
	    $('#navbar').toggleClass('left');
	  });
	  $('.menu-close').click(function() {
	    $('#navbar').removeClass('left');
	  });
	});
</script>

    
     <!-- JQuery search box -->
      <script type="text/javascript">
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
      
      </script>
<?php 
return $output;

}

function getFooter(){
   wp_enqueue_style('brain-style', get_template_directory_uri().'/front/brain.css' );
   wp_enqueue_style('bootmin-style', get_template_directory_uri().'/front/bootstrap.min.css' );
   wp_enqueue_style('boot-style', get_template_directory_uri().'/front/bootstrap.css' );
   wp_enqueue_style('st1-style', get_template_directory_uri().'/front/style1.css');
   wp_enqueue_style('default-style', get_template_directory_uri().'/front/theme-color/default-theme.css');
   wp_enqueue_style('header-style', get_template_directory_uri().'/front/header.css');
   wp_enqueue_style('font-style', get_template_directory_uri().'/front/style_g.css');
   wp_enqueue_style('media-style', get_template_directory_uri().'/front/media.css');

	wp_enqueue_script( 'script-name', get_template_directory_uri() . '/js/front/custom.js');

  $output='<section id="latest-news">
    <div class="col-md-offset-1 col-md-10 col-sm-12 col-xs-12">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="footer_top">
            <div class="row">
              <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="single_footer_top">
                  <h2><div class="ft-links footer-link-tiltle">LINKS</div></h2>
                  <ul>
                    <li><a href="https://www.braingroom.com/about">ABOUT US</a></li>
                    <li><a href="https://www.braingroom.com/about_the_team">ABOUT THE TEAM</a></li>
                    <li><a href="https://www.braingroom.com/terms-and-conditions">TERMS &amp; CONDITION</a></li>
                    <li><a href="https://www.braingroom.com/how-it-works">HOW IT WORKS</a></li>
                    <li><a href="https://www.braingroom.com/privacy">PRIVACY POLICY</a></li>
                    <li><a href="https://www.braingroom.com/help-center">HELP CENTER</a></li>
                    <li><a href="https://www.braingroom.com/reviews-and-testimonials">REVIEWS &amp; TESTMONIALS</a></li>
                  </ul>
                </div>
              </div>
              <div class="col-lg-3 col-md-3 col-sm-3">
                <div class="home-fooetr">
                    <div class="single_footer_top">
                      <h2><div class="ft-links footer-link-tiltle">CITIES</div></h2>
                      <ul>
                        <li><a href="https://www.braingroom.com/explore">CHENNAI</a></li>
                        <li><a href="https://www.braingroom.com/city/Banglore">BANGLORE</a></li>
                        <li><a href="https://www.braingroom.com/city/Kolkata">KOLKATA</a></li>
                        <li><a href="https://www.braingroom.com/city/Hyderabad">HYDERABAD</a></li>
                        <li><a href="https://www.braingroom.com/city/Delhi">DELHI</a></li>
                        <li><a href="https://www.braingroom.com/city/Pune">PUNE</a></li>
                        <li><a href="https://www.braingroom.com/city/Mumbai">MUMBAI</a></li>   
                      </ul>
                    </div>
                </div>  
              </div>
              <div class="col-lg-5 col-md-5 col-sm-5">
                <div class="home-ftr">
                  <div class="single_footer_top">
                    <h2><div class="ft_links footer-link-tiltle">I WANT TO</div> </h2>
                    <ul>
                      <li><a href="#">FIND A CLASS</a></li>
                      <li><a href="#target_community">FIND A COMMUNITY GROUP</a></li>
                      <li><a href="https://www.braingroom.com/arrange-class">HOST A CLASS AT MY PLACE</a></li>
                      <li><a href="https://www.braingroom.com/connect-page">MAKE NEW FRIENDS</a></li>
                      <li><a href="https://www.braingroom.com/connect-group">JOIN SIMILAR INTEREST GROUPS IN MY LOCALITY</a></li>
                      <li><a href="https://www.braingroom.com/login">SIGN UP AS A CLASS PROVIDER</a></li>
                      <!-- <li><a href="#">MAKE A PAYMENT</a></li> -->
                     
                    </ul>
                  </div>
                </div>  
                </div>
              </div>
            </div>
          </div>
        </div>        
      </div>
    
</section>

<footer id="footer">
    <div class="col-md-offset-1 col-md-10 col-sm-12 col-xs-12">
      <div class="row">
        <div class="col-md-6 col-sm-6">
          <div class="footer-left">
            <p>All right reserved  @ Thirdeye Learning Solutions Pvt Ltd</p>
          </div>
        </div>
        <div class="col-md-6 col-sm-6">
          <div class="footer-right">
            <a href="index.html"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-google-plus"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
            <a href="#"><i class="fa fa-pinterest"></i></a>
          </div>
        </div>
      </div>
    </div>
  </footer>';

  return $output;
}
