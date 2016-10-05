<?php 

//echo "<pre>"; 
//print_r($catalog_class);die;
?>
<section class="" id="feature"> 
<div class="col-xs-12 col-sm-12 blink hidden-xs " style="position: absolute; z-index: 50000; line-height: 21px; margin-top: 66px; font-weight: bold;">
     
        <blink style="" class="sr_16_07_bling">
            <center>"We are rigorously working to get you the best classes & activities in your city. We are going live on October 1st. Thanks for your patience"<br>For vendor registrations, please contact 9962084477 / 9962584477</center>
        </blink>
    </div>

    <div class="col-xs-12 col-sm-12 blink hidden-sm hidden-md hidden-lg sr_18_07_bling_div01">
        <blink style="" class="sr_16_07_bling">
            <center>"We are going live on October 1st.<br>For vendor registrations, please contact 9962084477 / 9962584477</center>
        </blink>
    </div>
    <div align="center">
      <h1>Arrange a <span class="sp_color"> Catalogue Class </span>at your place!</h1>
    </div>
   
    <div class="howitworkbg">
    
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <!-- Start welcome area -->
            <div class="welcome-area">
             
            </div>
            <div class="welcome-content">
              <ul class="wc-table">
                <li>
                  <div style="visibility: visible; animation-name: fadeInUp;" class="single-wc-content wow fadeInUp">
                    <span class="#"><img src="<?php echo HTTP_ROOT;?>/img/arrange_class/search1.png"></span>
                    <h4 class="wc-tittle">1</h4>
                    <p>Brouse Through<br> programme offered by <br>different tutors </p>
                  </div>
                </li>
                <li>
                  <div style="visibility: visible; animation-name: fadeInUp;" class="single-wc-content wow fadeInUp">
                    <span class="#"><img src="<?php echo HTTP_ROOT;?>/img/arrange_class/how -icon-2.png"></span>
                    <h4 class="wc-tittle">2</h4>
                    <p>Choose a Listed<br> programme/Request a<br> custom programme </p>
                  </div>
                </li>
                <li>
                  <div style="visibility: visible; animation-name: fadeInUp;" class="single-wc-content wow fadeInUp">
                    <span class="#"><img src="<?php echo HTTP_ROOT;?>/img/arrange_class/how-icon3.png"></span>
                    <h4 class="wc-tittle">3</h4>
                    <p>Enter Specifications<br> and Receive a quote<br> from the tutor </p>
                  </div>
                </li>
                <li>
                  <div style="visibility: visible; animation-name: fadeInUp;" class="single-wc-content wow fadeInUp">
                    <span class="#"><img src="<?php echo HTTP_ROOT;?>/img/arrange_class/how-icon4.png"></span>
                    <h4 class="wc-tittle">4</h4>
                    <p> Pay for the chosen programme  chosen Throw   Escrow  </p>
                  </div>
                </li>
                <li>
                  <div style="visibility: visible; animation-name: fadeInUp;" class="single-wc-content wow fadeInUp">
                    <span class="#"><img src="<?php echo HTTP_ROOT;?>/img/arrange_class/how-icon5.png"></span>
                    <h4 class="wc-tittle">5</h4>
                    <p>Organize class at<br> preferred<br> Location/web conference </p>
                  </div>
                </li>
              </ul>
            </div>
          </div>
          
          <!-- End welcome area -->
        </div>
      </div>
    </div>
</section>
<!-- ***************start part 2**************** -->
<section id="pricing-table1">
  <h1><center>Where can I arrange a <span class="sp_color">Catalogue Class?</span></center></h1><br>
          <div class="container">
              
                 <div class="col-xs-12 col-sm-12 padd_l_r">
                <div class="col-xs-12 col-sm-12 padd_l_r">
                    <!-- img 1 -->
                    
                    <?php if(!empty($group_detail)){
                           foreach($group_detail as $res1){?>
                    
                    <div class="col-xs-12 col-sm-12 col-md-6 ">
                        <div class="col-xs-12 col-sm-12 sr_03_08_small_box padd_l_r">
                            <div class="col-xs-12" style="padding: 5px 45px;">
                                <a href="<?php echo HTTP_ROOT; ?>/Homes/catalogDetail/<?php echo base64_encode($res1['ConnectGroup']['id']);?>"><span class="sr_03_08_s_text01">
                                    <?php echo strtoupper($res1['ConnectGroup']['group_name']);?></span></a>
                             </div>
                            <div class="col-xs-12 col-sm-6">
                                <a title="" href="<?php echo HTTP_ROOT;?>/Homes/catalogDetail/<?php echo base64_encode($res1['ConnectGroup']['id']);?>">
                                    <center>
                                      <img src="<?php echo HTTP_ROOT;?>/img/arrange_class/<?php echo $res1['ConnectGroup']['group_image']; ?>" class="img-responsive" alt="img">
                                    </center>
                                </a>
                            </div>
                            <div class="col-xs-12 col-sm-6 sr_03_08_pad025">
                                <div class="col-xs-12 col-sm-12 sr_03_08_artical_text03">
                                    <span class="sr_03_08_text_right_02">
                                        <?php echo $res1['ConnectGroup']['description'];?>
                                    </span>
                                </div>
                                
                                <div class="col-xs-12 col-sm-12 padd_l_r">
                                   <a class="button" title="" href="<?php echo HTTP_ROOT; ?>/Homes/catalogDetail/<?php echo base64_encode($res1['ConnectGroup']['id']);?>">Click for more</a>
                                </div>
                            </div>
                            <div class="col-xs-12" style="padding: 7px;">
                                <span class="sr_03_08_s_text01"></span>
                            </div>
                        </div>
                    </div>
                    <?php }}?>

                </div>
            </div>
          </div>
</section>
<!-- ***************start part 3**************** -->
<!--<?php //echo $this->Element('main_menu');?>
  
<section id="slider">
    <div class="main-slider">    
      <div class="single-slide">
        <img src="<?php echo HTTP_ROOT;?>/img/category_image/fun and recreation.jpg" title="fun and recreation" class="img-responsive sr_28_07_slider_img" alt="img">
      </div>       
      <div class="single-slide">
          <img src="<?php echo HTTP_ROOT;?>/img/category_image/education and skills development.jpg" title="education and skills development" class="img-responsive sr_28_07_slider_img" alt="img"> 
      </div>
      <div class="single-slide">
          <img src="<?php echo HTTP_ROOT;?>/img/category_image/kids and teens.jpg" title="kids and teens" class="img-responsive sr_28_07_slider_img" alt="img">  
      </div>
      <div class="single-slide">
          <img src="<?php echo HTTP_ROOT;?>/img/category_image/health and wellness.jpg" title="health and wellness" class="img-responsive sr_28_07_slider_img" alt="img">
      </div>
      <div class="single-slide">
          <img src="<?php echo HTTP_ROOT;?>/img/category_image/informative and motivational.jpg" title="informative and motivational" class="img-responsive sr_28_07_slider_img" alt="img">
      </div>
      <div class="single-slide">
          <img src="<?php echo HTTP_ROOT;?>/img/category_image/home maintenance.jpg" title="home maintenance" class="img-responsive sr_28_07_slider_img" alt="img">
      </div>

    </div> 
  </section>
  <!-- End slider -->
<section>
  	<div class="col-lg-offset-1 col-lg-10 col-md-12 col-sm-12 br_pd123">
	    <div class="col-xs-12 col-sm-12 pad_all">
	            <div class="">&nbsp;</div>
	            <div class="">&nbsp;</div>
	            <div 
	            <div class="col-md-12 col-sm-12 col-xs-12">
	              <h3 class="tittle" style="color:#31708f;">
	                <center>
	                  <a href=""> 
                      <img src="<?php echo HTTP_ROOT;?>/img/arrange_class/popular-img4.png" class="img-responsive">
	                  </a>
	                </center>  
	              </h3>
	            </div>            
	            

	            <div class="">&nbsp;</div>
	            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
	                <div class="row slide3_row1">
	                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

	                        <div id="testimonials" class="container-fluid">
	                            <div class="row">
	                                <div class="C_17_num">
	                                    <div id="grid-contant-slider1" class="b_sld">
	                                        


                                          <?php foreach($catalog_class as $res){?>
	                                            <div class="item b_1_crs">
	                                              <li>
	                                                <div class="grid1 gridworkshopsbg1">
	                                                  <div class="view1 view-first">
	                                                    <div class="index_img">
	                                                      <img src="<?php echo HTTP_ROOT;?>/img/Vendor/class_image/<?php echo $res['VendorClasse']['upload_class_photo'];?>" class="img-responsive" alt=""/>
	                                                    </div>                 
	                                                  </div> 
	                                                  
	                                                  
	                                                    <div class="golden home-tumb-slide">
	                                                        <div class="slider-topic12">
                                                            <?php echo $res['VendorClasse']['class_topic'];?>
                                                          </div>
                                                            <?php if($res['UserMaster']['vendor_type_id']=='1'){?>
	                                                            
                                                              <div style="color:black !important; margin-bottom:2px !important;" 
                                                                class="provider-by">
                                                                 <strong>By:</strong><?php echo $res['UserMaster']['institute_name'];?> 
                                                              </div>
                                                            
                                                            <?php }else{?>
                                                              
                                                              <div style="color:black !important; margin-bottom:2px !important;" 
                                                                class="provider-by">
                                                                <strong>By:</strong>
                                                                <?php echo $res['UserMaster']['first_name'];?> 
                                                              </div>
                                                            <?php }?>
                                                            <div class="indx-address">Place :<?php 
									if(!empty($res['VendorClasseLocationDetail'])):
										echo $res['VendorClasseLocationDetail'][0]['Locality']['name'];
									else:
										echo 'NA';
									endif;
									?></div>
                                                            <h5>No of Session:&nbsp;<?php 
                                                              if(!empty($res['VendorClasse']['no_of_session'])):
                                                              echo $res['VendorClasse']['no_of_session'];
                                                              endif; ?>
                                                            </h5>
	                                                          <h5>Duration : <?php echo $res['VendorClasse']['class_duration'];?> </h5>
	                                                 </div>
	                                                 
	                                                </div>
	                                              </li>
	                                            </div>
	                                          <?php }?>      
	                                      </div>
	           
	                                </div>
	                            </div>
	                        </div>        
	                   </div>
	                </div>
	            </div> 
	    </div>
  	</div>     
</section> 
<!-- start middle container -->
<!-- Start Testimonial section -->
<!--<section id="testimonial">
    <div class="col-lg-offset-1 col-lg-10 col-md-12 col-sm-12">
      <div class="row">
        <div class="col-md-6">
          <div class="row">
            <div class="col-md-12">
              <div class="title-area">
                <h2 class="title">Customer Reviews</h2>
                <span class="line"></span>           
              </div>
            </div>
            <div class="col-md-12">
              <!-- Start testimonial slider -->
              <!--<div class="testimonial-slider">
                <!-- Start single slider -->
                <!--<div class="single-slider">
                  <div class="testimonial-img">
                    <img src="<?php //echo HTTP_ROOT;?>/img/testi1.jpg" alt="testimonial image">
                  </div>
                  <div class="testimonial-content">
                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.</p>
                    <h6>Bernice Neumann, <span>Banglore</span></h6>
                  </div>
                </div>
                <!-- Start single slider -->
                <!--<div class="single-slider">
                  <div class="testimonial-img">
                    <img src="<?php //echo HTTP_ROOT;?>/img/testi3.jpg" alt="testimonial image">
                  </div>
                  <div class="testimonial-content">
                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.</p>
                    <h6>John Dow, <span>CEO</span></h6>
                  </div>
                </div>
                <!-- Start single slider -->
                <!--<div class="single-slider">
                  <div class="testimonial-img">
                    <img src="<?php //echo HTTP_ROOT;?>/img/testi2.jpg" alt="testimonial image">
                  </div>
                  <div class="testimonial-content">
                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.</p>
                    <h6>Michel, <span>chennai</span></h6>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6"></div>        
      </div>
    </div>
</section>-->
<!-- End Testimonial section