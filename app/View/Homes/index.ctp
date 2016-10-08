<style>
#marker-tooltip {
   
    position:absolute;
    width: 300px;
    height: 200px;
    background-color: #ccc;
    margin: 15px;
    overflow-y: auto;
    z-index: 500000;
}
.nbs-flexisel-nav-left{
	margin-top:250px !important;	
}
.nbs-flexisel-nav-right{
	margin-top:250px !important;	
}
.nopadding {
   padding-left: 0 !important;
   padding-right: 0 !important;
   margin: 0 !important;
}
  .myprflbrd {
    border: 1px solid #30AFA8 !important;
    margin-bottom: 20px;
  }
.snr {
    padding-top: 3px;
}
.edit-bg {
    color: rgb(255, 255, 255);
    font-size: 21px;
}
.edit-photo{
  color: #FFF;
  font-family: 'os_bold';
  font-size: 14px;
  cursor: pointer;
}
.image_price12{
    background-color: #00CDC6;
    height: 30px;
    margin-right: 5px;
    border-radius: 25px;
    width: 70px;
    padding: 5px 13px;
    position: relative;
    bottom:152px;
}
.ccc{
    /*bottom: -10px;*/
    font-size: 17px;
    /*padding-left: 32px;
    padding-top: 20px;
    position: relative; */
}
.fa-camera-br {
    color: white;
    font-size: 24px;
    position: relative;
    right: 21px;
    top: 57px;
}
#hideimge{
display:none;
}
.user765 {
    position: relative;
    bottom: 90px;
    left: 155px;
}
.najm1 {
    /*position: relative;*/
    /*bottom: 50px;*/
    /*right: -5px;*/
}
.pimgtop{padding: 5px;
}
.booking{
background-color:#00477B;
color:#fff;
border-radius:30%;
}
.clrdash123 {
    background-color: #00CDC6;
    padding: 10px 0px;
}
@media (max-width: 767px) and (min-width: 550px){
  .fa-camera-br {right: -47px;top: -12px;}
}
@media (max-width: 549px) and (min-width: 300px){
  
}

.main-slider .single-slide {
      display: none;
    }
    .main-slider .single-slide:first-child {
      display: block;
    }
    .main-slider.slick-initialized .single-slide {
      display: block;
    }
</style>
<?php  $image_location = "img/category_image/optimizedsliderimage";  ?>
  

 <!-- banner slider -->
    <section id="slider">
        <div class="main-slider">    
            <div class="single-slide">
                <a href="<?php echo HTTP_ROOT;?>/fun-and-recreation">
                    <img src="<?php echo HTTP_ROOT;?>/<?php echo $image_location;?>/fun and recreation.jpg" title="fun and recreation" class="img-responsive sr_28_07_slider_img" alt="img" width="1024" height="199">
                  <?php /*?>  <?php
													echo $this->Image->resize('category_image/fun and recreation.jpg','1024','199', array('class' => 'img-responsive sr_28_07_slider_img'));
													?><?php */?>
                </a>
            </div>       
            <div class="single-slide">
                <a href="<?php echo HTTP_ROOT;?>/educational-and-skill-development">
                    <img src="<?php echo HTTP_ROOT;?>/<?php echo $image_location;?>/education and skills development.jpg" title="education and skills development" class="img-responsive sr_28_07_slider_img" alt="img" width="1024" height="199">
                   <?php /*?> <?php
													echo $this->Image->resize('category_image/education and skills development.jpg','1024','199', array('class' => 'img-responsive sr_28_07_slider_img'));
													?><?php */?>
                </a>  
            </div>
            <div class="single-slide">
                <a href="<?php echo HTTP_ROOT;?>/kids-and-teens">
                    <img src="<?php echo HTTP_ROOT;?>/<?php echo $image_location;?>/kids and teens.jpg" title="kids and teens" class="img-responsive sr_28_07_slider_img" alt="img" width="1024" height="199">
                   <?php /*?>  <?php
													echo $this->Image->resize('category_image/kids and teens.jpg','1024','199', array('class' => 'img-responsive sr_28_07_slider_img'));
													?><?php */?>
                </a>       
            </div>
            <div class="single-slide">
                <a href="<?php echo HTTP_ROOT;?>/health-and-fitness">
                    <img src="<?php echo HTTP_ROOT;?>/<?php echo $image_location;?>/health and wellness.jpg" title="health and wellness" class="img-responsive sr_28_07_slider_img" alt="img" width="1024" height="199">
                     <?php /*?><?php
													echo $this->Image->resize('category_image/health and wellness.jpg','1024','199', array('class' => 'img-responsive sr_28_07_slider_img'));
													?><?php */?>
                </a>
            </div>
            <div class="single-slide">
                <a href="<?php echo HTTP_ROOT;?>/informative-and-motivational">
                    <img src="<?php echo HTTP_ROOT;?>/<?php echo $image_location;?>/informative and motivational.jpg" title="informative and motivational" class="img-responsive sr_28_07_slider_img" alt="img" width="1024" height="199">
                     <?php /*?> <?php
													echo $this->Image->resize('category_image/informative and motivational.jpg','1024','199', array('class' => 'img-responsive sr_28_07_slider_img'));
													?><?php */?>
                </a>
            </div>
            <div class="single-slide">
                <a href="<?php echo HTTP_ROOT;?>/home-maintenance">
                    <img src="<?php echo HTTP_ROOT;?>/<?php echo $image_location;?>/home maintenance.jpg" title="home maintenance" class="img-responsive sr_28_07_slider_img" alt="img" width="1024" height="199">
                </a>
            </div>
            <div class="single-slide">
                <a href="<?php echo HTTP_ROOT;?>">
                    <img src="<?php echo HTTP_ROOT;?>/<?php echo $image_location;?>/braingroom_group.jpg" title="Braingroom" class="img-responsive sr_28_07_slider_img" alt="img" width="1024" height="199">
                </a>
            </div>
        </div> 
    </section>
<!-- banner slider /-->

<!-- Start middle container -->
<?php $thmb ="thumbnail";  ?>
    <section> 
        <div class="col-lg-offset-1 col-lg-10 col-md-12 col-sm-12 col-xs-12  sr_16_07_div_padding">

            <!-- step 1 google map code & explode code -->
            <div class="col-xs-12 col-sm-12 pad_all">

                <div class="">&nbsp;</div>
                <div class="col-xs-12 col-sm-12 pad_all">
                    <center>
                        <span class="learning01">YOUR NEW LEARNING COMMUNITY</span>
                    </center>
                </div>
      
                <div class="col-xs-12 col-sm-12 ">
                    <center>
                        <img src="<?php echo HTTP_ROOT;?>/img/img/underline.png" alt="images not found" width="641" height="31" class="b_img_line img-responsive">
                        <?php
						//echo $this->Image->resize('img/underline.png','308','15', array('class' => 'b_img_line img-responsive'));
						?>
                    </center>
                </div>
                <div class="">&nbsp;</div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 pad_all hidden-xs padding-60">
                        <div class="img-align-1 img-absolute">
                            <a href="<?php echo HTTP_ROOT;?>/homes/explore">
                                <img src="<?php echo HTTP_ROOT;?>/img/home-map/find-classes.png" />
                            </a>
                        </div>
                        <div class="img-align-2 img-absolute">
                            <a href="<?php echo HTTP_ROOT;?>/homes/explore">
                                <img src="<?php echo HTTP_ROOT;?>/img/home-map/find-groups.png" />
                            </a>
                        </div>
                        <div class="img-align-3 img-absolute">
                            <a href="<?php echo HTTP_ROOT;?>/homes/explore">
                                <img src="<?php echo HTTP_ROOT;?>/img/home-map/find-people.png" />
                            </a>
                        </div>
                        <div class="img-align-4 img-absolute">
                            <a href="<?php echo HTTP_ROOT;?>/homes/explore">
                                <img src="<?php echo HTTP_ROOT;?>/img/home-map/explore.png" />
                            </a>
                            </div>
                            <div class="border-wrapper row">
                                <div class="col-xs-12 col-sm-12 col-md-12 pad_all">
                                    <script src="https://maps.googleapis.com/maps/api/js"></script>
                                    
                                    <div class="map_hite01" style="overflow:hidden;width:100%;">
                                        <div id="googleMap" style="width:95%;" class="map_hite01"></div>
                                            <div id="marker-tooltip" style="display:none;"></div>
                                        <style>#gmap_canvas img{max-width:none!important;background:none!important}</style>
                                    </div>
                                  
                                </div>
                            </div>
                    </div>
                </div>
                <!--<div class="col-xs-12 col-sm-12">
                    <div class="col-xs-12 col-sm-6 pad_all bg_clr01 sr_11_08_explode_div">
                        <div class="sr_16_07_hiddden">&nbsp;</div>
                        <div class="hidden-sm">&nbsp;</div>
                        <div class="col-xs-12 col-sm-12 pad_all">
                             <center class="index_map_12">
                               <?php /*?> <img src="<?php echo HTTP_ROOT;?>/img/img/mapicon_1.png" alt="images not found" class="b_1map img-responsive"><?php */?>
                                 <?php
						echo $this->Image->resize('img/mapicon_1.png','55','55', array('class' => 'b_1map img-responsive'));
						?>
                            </center>
                        </div>
                        <div class="col-xs-12 col-sm-12 sr_16_07_context_map">
                            <center >
                                <span class="find_new01_updated">Find new classes & related <br/>interest groups / clubs <br/>in your locality!</span>
                            </center>
                        </div>
                        <div class="">&nbsp;</div>
                        <div class="col-xs-12 col-sm-12 pad_all">
                            <center>
                                <a href="<?php echo HTTP_ROOT;?>/homes/explore">
                                    <button type="button" id="explore" class=" index_map_1212 btn btn-primary btn_clr01">Explore&nbsp;
                                       <?php /*?> <img src="<?php echo HTTP_ROOT;?>/img/img/mapicon_2.png" alt="img not found" class="map_ex img-responsive" style="display: inline;"><?php */?>
                                           <?php
						echo $this->Image->resize('img/mapicon_2.png','32','46', array('class' => 'b_1map img-responsive','style' => 'display: inline;'));
						?>
                                    </button>
                                </a>  
                            </center>
                        </div>
                        <div class="sr_16_07_hiddden">&nbsp;</div>
                        <div class="hidden-sm">&nbsp;</div>
                    </div>
                    
                </div>
                <div class="">&nbsp;</div>
            </div>--> <!-- step 1 google map code & explode code /-->

                        <!-- step 2, 4circle images slider code -->
            <div class="col-xs-12 col-sm-12 pad_all">            
                <div class="col-xs-12 col-sm-12 pad_all">
                    <center>
                        <span class="learning01" id="target_community">DISCOVER THE JOY OF LEARNING IN GROUPS</span>
                    </center>
                </div>        
                <div class="col-xs-12 col-sm-12 ">
                    <center>
                        <img src="<?php echo HTTP_ROOT;?>/img/img/underline.png" alt="images not found" width="641" height="31" class="img-responsive b_img_line">
                        <?php
						//echo $this->Image->resize('img/underline.png','308','15', array('class' => 'img-responsive b_img_line'));
						?>
                    </center>
                </div>
                <div class="">&nbsp;</div><div class="">&nbsp;</div>
                <div class="row">
                	<div class="col-xs-12 col-sm-12 col-md-12 pad_all">
                        <div class="img_sad_div_w">
                            <a href="<?php echo HTTP_ROOT;?>/Homes/community/1">
                                <img src="<?php echo HTTP_ROOT;?>/img/community-groups/Parents & Kids.png" alt="Parents & Kids"  class="community1">									                      
                            </a>

                            <a href="<?php echo HTTP_ROOT;?>/Homes/community/2">
                                <img src="<?php echo HTTP_ROOT;?>/img/community-groups/Study Groups.png" alt="Study Groups"  class="community">
                            </a>

                            <a href="<?php echo HTTP_ROOT;?>/Homes/community/3">
                                <img src="<?php echo HTTP_ROOT;?>/img/community-groups/Hobby Groups.png" alt="Hobby Groups"  class="community">
                            </a>
                            <a href="<?php echo HTTP_ROOT;?>/Homes/community/4">
                                <img src="<?php echo HTTP_ROOT;?>/img/community-groups/Fitness Groups.png" alt="Fitness Groups" class="community xx" >
                            </a>
                            <a href="<?php echo HTTP_ROOT;?>/Homes/community/9">
                                <img src="<?php echo HTTP_ROOT;?>/img/community-groups/Residential Community.png" alt="Residential Community" class="community "></a>
                            <a href="<?php echo HTTP_ROOT;?>/Homes/community/10">
                                <img src="<?php echo HTTP_ROOT;?>/img/community-groups/Senior Citizens.png" alt="Senior Citizens" class="community">
                            </a>
                            <a href="<?php echo HTTP_ROOT;?>/Homes/community/11">
                                <img src="<?php echo HTTP_ROOT;?>/img/community-groups/Kids Gangs.png" alt="Kids Gangs"  class="community2">
                            </a>
                            <a href="<?php echo HTTP_ROOT;?>/Homes/community/12">
                                <img src="<?php echo HTTP_ROOT;?>/img/community-groups/Peers & Colleagues.png" alt="Peers & Colleagues" class="community aa1"></a>
                            <a href="<?php echo HTTP_ROOT;?>/Homes/community/5">
                                <img src="<?php echo HTTP_ROOT;?>/img/community-groups/Ladies Club.png" alt="Ladies Club" class="community">
                            </a>
                            <a href="<?php echo HTTP_ROOT;?>/Homes/community/6">
                                <img src="<?php echo HTTP_ROOT;?>/img/community-groups/Pack of Men.png" alt="Pack of Men" class="community">
                            </a>
                            <a href="<?php echo HTTP_ROOT;?>/Homes/community/7">
                                <img src="<?php echo HTTP_ROOT;?>/img/community-groups/Friends Gangs.png" alt="Friends Gangs" class="community">
                            </a>
                            <a href="<?php echo HTTP_ROOT;?>/Homes/community/8">
                                <img src="<?php echo HTTP_ROOT;?>/img/community-groups/Couples.png" alt="Couples" class="community">
                            </a>
                        </div>
                    </div>
                    	
                    </div>
                    <!--<img class="img-full" src="img/classeslist-home.png" />-->
                </div>

                <!-- <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
                    <div class="row slide2_row12 " >
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div id="testimonials" class="container-fluid sr_16_07_circle_slider_padding_container">
                                <center>
                                    <div class="row curtain slider_sr_hite01" id="curtain" style="float-left;">
                                        <div class="col-xs-12 col-sm-12 sr_16_07_circle_slider_padding_container" id="trns">
                                            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 rad_br sr_16_07_circle_slider_padding">
                                                <center>
                                                    <img src="<?php echo HTTP_ROOT;?>/img/img/slider_icon1.png"  class="img-responsive img_br" alt="Image" width="260" height="260"/>
                                                    <?php
													//echo $this->Image->resize('img/slider_icon1.png/','130','130', array('class' => 'img-responsive img_br'));
													?>
                                                    <br>
                                                    <div class="slide2_text col-xs-12  padd_l_r sr_16_07_line_hite">Parents & kids</div>
                                                </center>
                                            </div> 

                                            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 rad_br sr_16_07_circle_slider_padding">
                                                <center>
                                               
                                                    <?php
													echo $this->Image->resize('img/slider_icon2.png/','130','130', array('class' => 'img-responsive img_br'));
													?>
                                                    <br>
                                                    <div class="slide2_text col-xs-12  padd_l_r sr_16_07_line_hite">Study Groups</div>
                                                </center>
                                            </div>                         
                                            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 hbygrp rad_br sr_16_07_circle_slider_padding">
                                                <center>
                                      
                                                <?php
													echo $this->Image->resize('img/slider_icon3.png/','130','130', array('class' => 'img-responsive img_br'));
													?>    
                                                    <br>
                                                    <div class="slide2_text col-xs-12  padd_l_r sr_16_07_line_hite">Hobby Groups</div>
                                                </center>
                                            </div>                         
                                            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 hbygrp rad_br sr_16_07_circle_slider_padding">
                                                <center>
                 
                                             <?php
													echo $this->Image->resize('img/slider_icon9.png/','130','130', array('class' => 'img-responsive img_br'));
													?>       
                                                    <br>
                                                    <div class="slide2_text col-xs-12  padd_l_r sr_16_07_line_hite">Fitness Groups </div>
                                                </center>
                                            </div>
                                        </div>

                                        <div class="row" id="pdcmnty">
                                            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 rad_br sr_16_07_circle_slider_padding">
                                                <center>
                                                   <?php
													echo $this->Image->resize('img/slider_icon10.png/','130','130', array('class' => 'img-responsive img_br'));
													?>
                                                    <br/>
                                                    <div class="slide2_text col-xs-12  padd_l_r sr_16_07_line_hite"><span> Ladies Club </span></div>
                                                </center>
                                            </div>
                                            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 rad_br sr_16_07_circle_slider_padding">
                                                <center>
                                            
                                            <?php
													echo $this->Image->resize('img/slider_icon11.png/','130','130', array('class' => 'img-responsive img_br'));
													?>        
                                                    <br>
                                                    <div class="slide2_text col-xs-12  padd_l_r sr_16_07_line_hite"><span> Pack of Men </span></div>
                                                </center>
                                            </div>
                                            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 rad_br sr_16_07_circle_slider_padding">
                                                <center>
                                                  
                                                    <?php
													echo $this->Image->resize('img/slider_icon4.png/','130','130', array('class' => 'img-responsive img_br'));
													?>
                                                    <br>
                                                    <div class="slide2_text col-xs-12  padd_l_r sr_16_07_line_hite"><span> Friends Gangs </span></div>
                                                </center>
                                            </div>
                                            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 rad_br sr_16_07_circle_slider_padding">
                                                <center>
                                                  
                                                <?php
													echo $this->Image->resize('img/slider_icon12.png/','130','130', array('class' => 'img-responsive img_br'));
													?>    
                                                    <br>
                                                    <div class="slide2_text col-xs-12  padd_l_r sr_16_07_line_hite"><span> Couples </span></div>
                                                </center>
                                            </div>
                                        </div>

                                        <div class="row " id="pdcmnty1">    
                                            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 rad_br sr_16_07_circle_slider_padding">
                                                <center>
                                                  
                                                   <?php
													echo $this->Image->resize('img/slider_icon5.png/','130','130', array('class' => 'img-responsive img_br'));
													?> 
                                                    <br>
                                                    <div class="slide2_text col-xs-12  padd_l_r sr_16_07_line_hite"> Community Groups </div>
                                                </center>
                                            </div>
                                            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 rad_br sr_16_07_circle_slider_padding">
                                                <center>
                                           
                                                    <?php
													echo $this->Image->resize('img/slider_icon6.png/','130','130', array('class' => 'img-responsive img_br'));
													?>
                                                    <br>
                                                    <div class="slide2_text col-xs-12  padd_l_r sr_16_07_line_hite"> Senior Citizens </div>
                                                </center>
                                            </div>
                                            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 rad_br sr_16_07_circle_slider_padding">
                                                <center>
                                                  
                                           <?php
													echo $this->Image->resize('img/slider_icon7.png/','130','130', array('class' => 'img-responsive img_br'));
													?>         
                                                    <br>
                                                    <div class="slide2_text col-xs-12  padd_l_r sr_16_07_line_hite"> Kids Gangs </div>
                                                </center>
                                            </div>
                                            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 rad_br sr_16_07_circle_slider_padding">
                                                <center>
                                                  
                                                   <?php
													echo $this->Image->resize('img/slider_icon8.png/','130','130', array('class' => 'img-responsive img_br'));
													?> 
                                                    <br>
                                                    <div class="slide2_text col-xs-12  padd_l_r sr_16_07_line_hite"> Peers & colleagues </div>
                                                </center>
                                            </div>
                                        </div> 
                                    </div> 
                                </center>  
                            </div>   
                        </div>
                    </div>
                </div>           
            </div>--> <!-- step 2, 4circle images slider code /-->

            <div class="col-xs-12 col-sm-12 pad_all">      
                <div class="">&nbsp;</div>       
                <div class="col-xs-12 col-sm-12 pad_all">
                    <center>
                        <span class="learning01">TRENDING CLASSES & ACTIVITIES</span>
                    </center>
                 </div>
      
                <div class="col-xs-12 col-sm-12 ">
                    <center>
                        <img src="<?php echo HTTP_ROOT;?>/img/underline.png" alt="images not found" width="641" height="31" class="b_img_line img-responsive">
                         <?php
						//echo $this->Image->resize('img/underline.png','308','15', array('class' => 'img-responsive b_img_line'));
						?>
                    </center>
                </div> 
                <div class="">&nbsp;</div>
                
                <div class=" col-md-12 col-sm-12 col-xs-12 pad_all funsld">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
                    <div class="row slide3_row1">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div id="testimonials" class="container-fluid">
                                <div class="row">
                                  <div class="C_17_num flex-index-slider">
                                    <div id="grid-contant-slider1" class="b_sld">
                                    <?php 
                                    foreach ($trending_class as $result) { 
										if(!empty($result['VendorClasse']['segment_id'])):
											$seg_pic = explode(',',$result['VendorClasse']['segment_id']);
										endif;
									 	$class_id = base64_encode($result['VendorClasse']['id']);
                                    ?>
                                    <div class="item b_1_crs featured" id="<?php echo $result['VendorClasse']['id'];?>">
                                    <li>
                                     <a href="<?php echo HTTP_ROOT?>/classes/<?php echo $result['VendorClasse']['class_topic']; ?>" >
                                    <div class="grid1 gridfreeclassesbg grid-slider-image">
                                    <div class="view3 view-first">
                                    <div class="index_img">
                                    <?php 
                                    echo "<span class='flexible-fixed flexible-fixed-index'>";
                                    echo ($result['VendorClasse']['class_timing_id'] == 2)?'Fixed':'Flexible';
                                    echo "</span>";
                                    ?>
                                   <?php 
											if(!empty($result['VendorClasse']['upload_class_photo'])){
											?>
											
											<?php
											
											echo $this->Image->resize('Vendor/class_image/'.$result['VendorClasse']['upload_class_photo'].'.jpg','305','148', array('class' => 'imgresponsive img-thumbnail'));
											?>
											
											<?php  }else{
											$seg_pic = explode(',',$result['VendorClasse']['segment_id']);
											?>	  
											<?php
											echo $this->Html->image('Vendor/'.$result['VendorClasse']['category_id'].'/'.$seg_pic[0].'/defult_pic.jpg', array('class' => 'imgresponsive img-thumbnail'));
											?>
											
									<?php } ?>
                                    <div class="image_price12 pull-right image_price-index">
                                    <span class="ccc" style="color:white">
                                    &#8377;<?php 
									if(!empty($result['VendorClasseLevelDetail'])): 
										echo $result['VendorClasseLevelDetail'][0]['price'];
									endif;
									?></span>
                                    </div>
                                    </div>                
                                    </div>                
                                    <div class="golden home-tumb-slide">
                                    
                                    <div class="slider-topic12">
                                    <?php 
									if(!empty($result['VendorClasse'])):
										//echo substr($result['VendorClasse']['class_topic'],0,25);
										echo $result['VendorClasse']['class_topic'];
									endif;
									?>
                                    </div>
                                    <div class="provider-by" style="color:black !important; margin-bottom:2px !important;">
                                    <strong>By:</strong>
                                    <?php 
									if(!empty($result['User'])):
										if($result['User']['vendor_type_id'] ==1):
											echo $result['User']['institute_name'];
										else:
											echo $result['User']['first_name'].' '.$result['User']['last_name'];
										endif;
									endif;
									?>
                                    </div>
                                    <div class="indx-address">Place :<?php 
									if(!empty($result['VendorClasseLocationDetail'])):
										echo $result['VendorClasseLocationDetail'][0]['Locality']['name'];
									else:
										echo 'NA';
									endif;
									?></div>
                                    <h5>No of Sessions:&nbsp;<?php 
									if(!empty($result['VendorClasse']['no_of_session'])):
									echo $result['VendorClasse']['no_of_session'];
									endif; ?> </h5>
                                    <h5>Total Duration:&nbsp;<?php 
									if(!empty($result['VendorClasse']['class_duration'])):
									echo $result['VendorClasse']['class_duration'].' '.'Hours';
									endif; ?> </h5>
                                    </div>
                                    </div>
                                    </a>
                                    </li>

                                    </div>
                                    <?php } ?>
                                    </div>                                       
                                  </div>
                                </div>
                            </div>        
                       </div>
                    </div>
                </div> 
          </div>
          
             <?php /*?>   <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="row" id="slideshow1"> <div>
                            <?php 
                               $x = 1;
	                           foreach($trending_class as $result) { ?>
	                           <?php
				                    $class_topic = $result['VendorClasse']['class_topic'];
                                    $featured_status = $result['VendorClasse']['featured_status'];
						            $class_id = base64_encode($result['VendorClasse']['id']);
				                    if ($x % 4 == 0) {
				                    echo "</div><div>";
			                    }
                            ?>
                            
                  <div class="col-xs-6 col-sm-3">
<div class="grid1 gridworkshopsbg1 grid-slider-image">
                                            <div class="view1 view-first">
                                              <div class="index_img">
                                              <?php 
                                              echo "<span class='flexible-fixed flexible-fixed-index'>";
                                              echo ($result['VendorClasse']['class_timing_id'] == 2)?'Fixed':'Flexible';
                                              echo "</span>";
                                              ?>
                                             
                                                 <?php 
												if(!empty($result['VendorClasse']['upload_class_photo'])){
													
echo $this->Html->link($this->Html->image('Vendor/class_image/'.$result['VendorClasse']['upload_class_photo'].'.jpg', array('class' => 'imgresponsive img-thumbnail')),array('controller'=>'Vendor_classes','action'=>'classes',$class_id),array('escape' => false));
                                                     
                                                 }
			else{
												$seg_pic = explode(',',$result['VendorClasse']['segment_id']);
echo $this->Html->link($this->Html->image('Vendor/'.$result['VendorClasse']['category_id'].'/'.$seg_pic[0].'/defult_pic.jpg', array('class' => 'imgresponsive img-thumbnail')), array('controller'=>'Vendor_classes','action'=>'classes',$class_id), array('escape' => false));
			}
			
 ?>
                                                <div class="image_price12 pull-right image_price-index">
                                                <span class="ccc" style="color:white">
                                                &#8377;<?php echo $result['VendorClasseLevelDetail'][0]['price'];?></span>
                                                </div>
                                                </div>
                                            </div> 
                                            
                                            
                                             <div class="golden home-tumb-slide">
                                              <div class="slider-topic12">
                                              <?php echo $class_topic;?>
                                              </div>
                                              <div class="provider-by slider1_text_div" style="color:black !important; margin-bottom:10px !important;">
                                              <strong>By:</strong>
                                              <?php 
                                              if($result['User']['vendor_type_id'] ==2):
                                              		echo $result['User']['first_name'].' '.$result['User']['last_name'];
                                              	else:
                                              		echo $result['User']['institute_name'];
                                              	endif;
                                              ?>
                                              </div>
                                              <div class="indx-address slider1_text_div">PLACE :<?php echo $result['VendorClasseLocationDetail'][0]['Locality']['name'];?></div>
                                              
                                              <h5 class="slider1_text_div">No of session:&nbsp;<?php echo $result['VendorClasse']['no_of_session'];?> </h5>
                                              
                                              <h5 class="slider1_text_div">Duration:&nbsp;<?php echo $result['VendorClasse']['class_duration'];?> </h5>
                                              </div>
                                           
                                          </div>
</div>
<?php
   $x++;
}
?>
</div>
</div>      
      </div>
  </div>
  
</div><?php */?>
    <div class="col-xs-12 col-sm-12 pad_all">
           
      <div class="col-xs-12 col-sm-12 pad_all sr_11_08_featured_div_mar">
          <center>
          <span class="learning01">FEATURED CLASSES & ACTIVITIES</span>
          </center>
      </div>
      
      <div class="col-xs-12 col-sm-12 ">
          <center>
              <img src="<?php echo HTTP_ROOT;?>/img/underline.png" alt="images not found" width="641" height="31" class="b_img_line img-responsive">
               <?php
						//echo $this->Image->resize('img/underline.png','308','15', array('class' => 'img-responsive b_img_line'));
						?>
          </center>
      </div>            
      <div class="">&nbsp;</div> 
      <?php /*?><div class="container">
  <div class="row">
    <div class="col-sm-12">
      <div class="row" id="slideshow2">
    		<div>
      <?php 
	  $x = 1;
	  foreach($featured_class as $result) { ?>
		<?php
						$class_topic = $result['VendorClasse']['class_topic'];
                          $featured_status = $result['VendorClasse']['featured_status'];
						  $class_id = base64_encode($result['VendorClasse']['id']);
				 if ($x % 4 == 0) {
				      echo "</div><div>";
				}
?>
<div class="col-xs-6 col-sm-3">
<div class="grid1 gridworkshopsbg1 grid-slider-image">
                                            <div class="view1 view-first">
                                              <div class="index_img">
                                              <?php 
                                              echo "<span class='flexible-fixed flexible-fixed-index'>";
                                              echo ($result['VendorClasse']['class_timing_id'] == 2)?'Fixed':'Flexible';
                                              echo "</span>";
                                              ?>
                                             
                                                 <?php 
												if(!empty($result['VendorClasse']['upload_class_photo'])){
													
echo $this->Html->link($this->Html->image('Vendor/class_image/'.$result['VendorClasse']['upload_class_photo'].'.jpg', array('class' => 'imgresponsive img-thumbnail')),array('controller'=>'Vendor_classes','action'=>'classes',$class_id),array('escape' => false));
                                                     
                                                 }
			else{
												$seg_pic = explode(',',$result['VendorClasse']['segment_id']);
echo $this->Html->link($this->Html->image('Vendor/'.$result['VendorClasse']['category_id'].'/'.$seg_pic[0].'/defult_pic.jpg', array('class' => 'imgresponsive img-thumbnail')), array('controller'=>'Vendor_classes','action'=>'classes',$class_id), array('escape' => false));
			}
			
 ?>
                                                <div class="image_price12 pull-right image_price-index">
                                                <span class="ccc" style="color:white">
                                                &#8377;<?php echo $result['VendorClasseLevelDetail'][0]['price'];?></span>
                                                </div>
                                                </div>
                                            </div> 
                                            
                                            
                                            <div class="golden home-tumb-slide">
                                                    <div class="slider-topic12">
                                                        <?php echo $class_topic;?>
                                                    </div>
                                                    <div class="provider-by slider1_text_div" style="color:black !important; margin-bottom:10px !important;">
                                                        <strong>By:</strong>
                                                        <?php 
                                                            if($result['User']['vendor_type_id'] ==2):
                                                  		        echo $result['User']['first_name'].' '.$result['User']['last_name'];
                                                  	        else:
                                                  		        echo $result['User']['institute_name'];
                                                  	         endif;
                                                        ?>
                                                    </div>
                                                    <div class="indx-address slider1_text_div">PLACE :<?php echo $result['VendorClasseLocationDetail'][0]['Locality']['name'];?>
                                                    </div>
                                                   
                                                        <h5 class="slider1_text_div">No of session:&nbsp;<?php echo $result['VendorClasse']['no_of_session'];?> </h5>
                                                    
                                                    
                                                        <h5 class="slider1_text_div">Duration:&nbsp;<?php echo $result['VendorClasse']['class_duration'];?> </h5>
                                                    
                                              </div>
                                           
                                          </div>
</div>
<?php
   $x++;
}
?>
</div>
</div>      
      </div>
  </div>
  
</div><?php */?>

<div class=" col-md-12 col-sm-12 col-xs-12 pad_all funsld">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
                    <div class="row slide3_row1">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div id="testimonials" class="container-fluid">
                                <div class="row">
                                  <div class="C_17_num flex-index-slider">
                                    <div id="grid-contant-slider2" class="b_sld">
                                    <?php 
                                    foreach ($featured_class as $result) { 
										if(!empty($result['VendorClasse']['segment_id'])):
											$seg_pic = explode(',',$result['VendorClasse']['segment_id']);
										endif;
									 	$class_id = base64_encode($result['VendorClasse']['id']);
                                    ?>
                                    <div class="item b_1_crs featured" id="<?php echo $result['VendorClasse']['id'];?>">
                                    <li>
                                    <a href="<?php echo HTTP_ROOT?>/classes/<?php echo $result['VendorClasse']['class_topic']; ?>" >
                                    <div class="grid1 gridfreeclassesbg grid-slider-image">
                                    <div class="view3 view-first">
                                    <div class="index_img">
                                    <?php 
                                    echo "<span class='flexible-fixed flexible-fixed-index'>";
                                    echo ($result['VendorClasse']['class_timing_id'] == 2)?'Fixed':'Flexible';
                                    echo "</span>";
                                    ?>
                                      <?php 
											if(!empty($result['VendorClasse']['upload_class_photo'])){
											?>
											
											<?php	
											echo $this->Image->resize('Vendor/class_image/'.$result['VendorClasse']['upload_class_photo'].'.jpg','305','148', array('class' => 'imgresponsive img-thumbnail'));
											?>
											
											<?php  }else{
											$seg_pic = explode(',',$result['VendorClasse']['segment_id']);
											?>	 
											<?php
											echo $this->Html->image('Vendor/'.$result['VendorClasse']['category_id'].'/'.$seg_pic[0].'/defult_pic.jpg', array('class' => 'imgresponsive img-thumbnail'));
											?>
											
									<?php } ?>
                                    <div class="image_price12 pull-right image_price-index">
                                    <span class="ccc" style="color:white">
                                    &#8377;<?php 
									if(!empty($result['VendorClasseLevelDetail'])): 
										echo $result['VendorClasseLevelDetail'][0]['price'];
									endif;
									?></span>
                                    </div>
                                    </div>                
                                    </div>                
                                    <div class="golden home-tumb-slide">
                                    <div class="slider-topic12">
                                    <?php 
									if(!empty($result['VendorClasse'])):
										//echo substr($result['VendorClasse']['class_topic'],0,25);
										echo $result['VendorClasse']['class_topic'];
									endif;
									?>
                                    </div>
                                    <div class="provider-by" style="color:black !important; margin-bottom:2px !important;">
                                    <strong>By:</strong>
                                    <?php 
									if(!empty($result['User'])):
										if($result['User']['vendor_type_id'] ==1):
											echo $result['User']['institute_name'];
										else:
											echo $result['User']['first_name'].' '.$result['User']['last_name'];
										endif;
									endif;
									?>
                                    </div>
                                    <div class="indx-address">Place :<?php 
									if(!empty($result['VendorClasseLocationDetail'])):
										echo $result['VendorClasseLocationDetail'][0]['Locality']['name'];
									else:
										echo 'NA';
									endif;
									?></div>
                                    <h5>No of Sessions:&nbsp;<?php 
									if(!empty($result['VendorClasse']['no_of_session'])):
									echo $result['VendorClasse']['no_of_session'];
									endif; ?> </h5>
                                    <h5>Total Duration:&nbsp;<?php 
									if(!empty($result['VendorClasse']['class_duration'])):
									echo $result['VendorClasse']['class_duration'].' '.'Hours';
									endif; ?> </h5>
                                    </div>
                                    </div>
</a>
                                    </li>
                                    </div>
                                    <?php } ?>
                                    </div>                                       
                                  </div>
                                </div>
                            </div>        
                       </div>
                    </div>
                </div> 
          </div>
    </div>
    <div class="col-xs-12 col-sm-12 pad_all">
     
      
      <div class="col-xs-12 col-sm-12 pad_all sr_11_08_featured_div_mar">
          <center>
          <span class="learning01">INDIA INDIGENOUS CLASSES</span>
          </center>
      </div>
      
      <div class="col-xs-12 col-sm-12 ">
          <center>
              <img src="<?php echo HTTP_ROOT;?>/img/underline.png" alt="images not found" width="641" height="31" class="b_img_line img-responsive">
               <?php
						//echo $this->Image->resize('img/underline.png','308','15', array('class' => 'img-responsive b_img_line'));
						?>
          </center>
      </div>            
      <div class="">&nbsp;</div>
      
      <?php /*?><div class="container">
  <div class="row">
    <div class="col-sm-12">
      <div class="row" id="slideshow3">
    		<div>
      <?php 
	  $x = 1;
	  foreach($recommended_class as $result) { ?>
		<?php
						$class_topic = $result['VendorClasse']['class_topic'];
                          $featured_status = $result['VendorClasse']['featured_status'];
						  $class_id = base64_encode($result['VendorClasse']['id']);
				 if ($x % 4 == 0) {
				      echo "</div><div>";
				}
?>
<div class="col-xs-6 col-sm-3">
<div class="grid1 gridworkshopsbg1 grid-slider-image">
                                            <div class="view1 view-first">
                                              <div class="index_img">
                                              <?php 
                                              echo "<span class='flexible-fixed flexible-fixed-index'>";
                                              echo ($result['VendorClasse']['class_timing_id'] == 2)?'Fixed':'Flexible';
                                              echo "</span>";
                                              ?>
                                             
                                                 <?php 
												if(!empty($result['VendorClasse']['upload_class_photo'])){
													
echo $this->Html->link($this->Html->image('Vendor/class_image/'.$result['VendorClasse']['upload_class_photo'].'.jpg', array('class' => 'imgresponsive img-thumbnail')),array('controller'=>'Vendor_classes','action'=>'classes',$class_id),array('escape' => false));
                                                     
                                                 }
			else{
												$seg_pic = explode(',',$result['VendorClasse']['segment_id']);
echo $this->Html->link($this->Html->image('Vendor/'.$result['VendorClasse']['category_id'].'/'.$seg_pic[0].'/defult_pic.jpg', array('class' => 'imgresponsive img-thumbnail')), array('controller'=>'Vendor_classes','action'=>'classes',$class_id), array('escape' => false));
			}
			
 ?>
                                                <div class="image_price12 pull-right image_price-index">
                                                <span class="ccc" style="color:white">
                                                &#8377;<?php echo $result['VendorClasseLevelDetail'][0]['price'];?></span>
                                                </div>
                                                </div>
                                            </div> 
                                            
                                            
                                             <div class="golden home-tumb-slide">
                                              <div class="slider-topic12">
                                              <?php echo $class_topic;?>
                                              </div>
                                              <div class="provider-by slider1_text_div" style="color:black !important; margin-bottom:10px !important;">
                                              <strong>By:</strong>
                                              <?php 
                                              if($result['User']['vendor_type_id'] ==2):
                                              		echo $result['User']['first_name'].' '.$result['User']['last_name'];
                                              	else:
                                              		echo $result['User']['institute_name'];
                                              	endif;
                                              ?>
                                              </div>
                                              <div class="indx-address slider1_text_div">PLACE :<?php echo $result['VendorClasseLocationDetail'][0]['Locality']['name'];?></div>
                                              
                                                <h5 class="slider1_text_div">No of session:&nbsp;<?php echo $result['VendorClasse']['no_of_session'];?> </h5>
                                               
                                               
                                                <h5 class="slider1_text_div">Duration:&nbsp;<?php echo $result['VendorClasse']['class_duration'];?> </h5>
                                              </div>
                                           
                                          </div>
</div>
<?php
   $x++;
}
?>
</div>
</div>      
      </div>
  </div>
  
</div><?php */?>
<div class=" col-md-12 col-sm-12 col-xs-12 pad_all funsld">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
                    <div class="row slide3_row1">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div id="testimonials" class="container-fluid">
                                <div class="row">
                                  <div class="C_17_num flex-index-slider">
                                    <div id="grid-contant-slider3" class="b_sld">
                                    <?php 
                                    foreach ($recommended_class as $result) { 
										if(!empty($result['VendorClasse']['segment_id'])):
											$seg_pic = explode(',',$result['VendorClasse']['segment_id']);
										endif;
									 	$class_id = base64_encode($result['VendorClasse']['id']);
                                    ?>
                                    <div class="item b_1_crs featured" id="<?php echo $result['VendorClasse']['id'];?>">
                                    <li>
                                    <div class="grid1 gridfreeclassesbg grid-slider-image">
                                     <a href="<?php echo HTTP_ROOT?>/classes/<?php echo $result['VendorClasse']['class_topic']; ?>" >
                                    <div class="view3 view-first">
                                    <div class="index_img">
                                    <?php 
                                    echo "<span class='flexible-fixed flexible-fixed-index'>";
                                    echo ($result['VendorClasse']['class_timing_id'] == 2)?'Fixed':'Flexible';
                                    echo "</span>";
                                    ?>
                                   <?php 
											if(!empty($result['VendorClasse']['upload_class_photo'])){
											?>
											
											<?php	
											echo $this->Image->resize('Vendor/class_image/'.$result['VendorClasse']['upload_class_photo'].'.jpg','305','148', array('class' => 'imgresponsive img-thumbnail'));
											?>
											
											<?php  }else{
											$seg_pic = explode(',',$result['VendorClasse']['segment_id']);
											?>	 
											<?php
											echo $this->Html->image('Vendor/'.$result['VendorClasse']['category_id'].'/'.$seg_pic[0].'/defult_pic.jpg', array('class' => 'imgresponsive img-thumbnail'));
											?>
											
									<?php } ?>
                                    <div class="image_price12 pull-right image_price-index">
                                    <span class="ccc" style="color:white">
                                    &#8377;<?php 
									if(!empty($result['VendorClasseLevelDetail'])): 
										echo $result['VendorClasseLevelDetail'][0]['price'];
									endif;
									?></span>
                                    </div>
                                    </div>                
                                    </div>                
                                    <div class="golden home-tumb-slide">
                                    <div class="slider-topic12">
                                    <?php 
									if(!empty($result['VendorClasse'])):
										//echo substr($result['VendorClasse']['class_topic'],0,25);
										echo $result['VendorClasse']['class_topic'];
									endif;
									?>
                                    </div>
                                    <div class="provider-by" style="color:black !important; margin-bottom:2px !important;">
                                    <strong>By:</strong>
                                    <?php 
									if(!empty($result['User'])):
										if($result['User']['vendor_type_id'] ==1):
											echo $result['User']['institute_name'];
										else:
											echo $result['User']['first_name'].' '.$result['User']['last_name'];
										endif;
									endif;
									?>
                                    </div>
                                    <div class="indx-address">Place :<?php 
									if(!empty($result['VendorClasseLocationDetail'])):
										echo $result['VendorClasseLocationDetail'][0]['Locality']['name'];
									else:
										echo 'NA';
									endif;
									?></div>
                                    <h5>No of Sessions:&nbsp;<?php 
									if(!empty($result['VendorClasse']['no_of_session'])):
									echo $result['VendorClasse']['no_of_session'];
									endif; ?> </h5>
                                    <h5>Total Duration:&nbsp;<?php 
									if(!empty($result['VendorClasse']['class_duration'])):
									echo $result['VendorClasse']['class_duration'].' '.'Hours';
									endif; ?> </h5>
                                     <input type="hidden" value="0" id="latitude">
                                              <input type="hidden" value="0" id="longitude">
                                    </div>
</a>
                                    </div>
                                    </li>
                                    </div>
                                    <?php } ?>
                                    </div>                                       
                                  </div>
                                </div>
                            </div>        
                       </div>
                    </div>
                </div> 
          </div>
    </div>
    
    <div class="col-xs-12 col-sm-12 pad_all sr_11_08_featured_div_mar">
          <center>
          <span class="learning01">Classes as Gifts - Coupons & Cards</span>
          </center>
      </div>
      
      <div class="col-xs-12 col-sm-12 ">
          <center>
              <img src="<?php echo HTTP_ROOT;?>/img/underline.png" alt="images not found" width="641" height="31" class="b_img_line img-responsive">
               <?php
						//echo $this->Image->resize('img/underline.png','308','15', array('class' => 'img-responsive b_img_line'));
						?>
          </center>
      </div>            
    
    <div class="">&nbsp;</div> 
    <div class="row">
        <div class="col-sm-12 nopadding">
 			<a href="http://www.braingroom.com/gift/#individual"><?php echo $this->Html->image('banner.jpg', array('alt' => 'Gift_for_individuals','class'=>'img-responsive'));?></a>
        </div>
  
  </div>
     <!--Why Braingroom-->
        <div class="">&nbsp;</div> 
        
        <div class="col-xs-12 col-sm-12 pad_all sr_11_08_featured_div_mar">
			 <center><span class="learning01">WHY BRAINGROOM?</span></center>
		</div>
        
        <div class="col-xs-12 col-sm-12 ">
			<center><img src="<?php echo HTTP_ROOT;?>/img/underline.png" alt="images not found" width="641" height="31" class="b_img_line img-responsive"></center>
		</div>  

		<div class="">&nbsp;</div> 
		<div class="container">
			<div class="row">
            	  <div class="col-xs-12 col-sm-12" ><!--pad_all funsld-->
					  
						  <div class="col-xs-1 col-sm-12" id="braingroomsquare"><div class="braingroomff1">Best Microclasses in the city.</div><img class="braingroomimg braingroomimg2" src="<?php echo HTTP_ROOT;?>/img/mark.png" alt="images not found"></img></div>
	 
						  <div class="col-xs-1 col-sm-12" id="braingroomsquare"><div class="braingroomff1">Result-oriented, Time-bound & Quick.</div><img class="braingroomimg braingroomimgss" src="<?php echo HTTP_ROOT;?>/img/mark.png" alt="images not found"></img></div>
	 
						  <div class="col-xs-1 col-sm-12" id="braingroomsquare"><div class="braingroomff1">Verified Quality vendors with detailed profiles & reviews.</div><img class="braingroomimg1" src="<?php echo HTTP_ROOT;?>/img/mark.png" alt="images not found"></img></div>
	 
						  <div class="col-xs-1 col-sm-12" id="braingroomsquare"><div class="braingroomff1">Easy Booking & Payment options.</div><img class="braingroomimg" src="<?php echo HTTP_ROOT;?>/img/mark.png" alt="images not found"></img></div>
	 
						  <div class="col-xs-1 col-sm-12" id="braingroomsquare"><div class="braingroomff1">Community learning & Gifting options.</div><img class="braingroomimg" src="<?php echo HTTP_ROOT;?>/img/mark.png" alt="images not found"></img></div>
                           <div class="">&nbsp;</div> 
                           <div class="col-xs-12 col-sm-12" >
											  
						  <div class="col-xs-4 col-sm-12 css-shapes-preview csp1"><div class="ff tab blink"">120+ CLASS PROVIDERS</div><img class="cicon1" src="<?php echo HTTP_ROOT;?>/img/class provider.png" alt="images not found"></img></div>
					  
						  <div class="col-xs-4 col-sm-12 css-shapes-preview csp"><div class="ff1 tab blink">1000+ CLASSES</div><img class="cicon2" src="<?php echo HTTP_ROOT;?>/img/class.png" alt="images not found"></img></div> 
						  
						  <div class="col-xs-4 col-sm-12 css-shapes-preview csp"><div class="fff tab blink">50+ FUN LEARNING ACTIVITIES</div><img class="cicon3" src="<?php echo HTTP_ROOT;?>/img/fun.png" alt="images not found"></img></div>
		  
            
            </div>
        </div>
          
   <div class="">&nbsp;</div> 
     <div class="col-xs-12 col-sm-12 pad_all sr_11_08_featured_div_mar">
          <center>
          <span class="learning01">Videos</span>
          </center>
      </div>
      
      <div class="col-xs-12 col-sm-12 ">
          <center>
              <img src="<?php echo HTTP_ROOT;?>/img/underline.png" alt="images not found" width="641" height="31" class="b_img_line img-responsive">
          </center>
      </div>  
       <div class="">&nbsp;</div> 
        <script type="text/javascript">
                    $(document).ready(function() {
                      var owl = $('.owl-carousel');
                      owl.owlCarousel({
                        rtl: true,
                        margin: 10,
                        nav: true,
                        loop: true,
                        navText: ["<i class='icon-chevron-left icon-white'><</i>","<i class='icon-chevron-right icon-white'>></i>"],
                        type:false,
                        responsive: {
                          0: {
                            items: 1
                          },
                          600: {
                            items: 3
                          },
                          1000: {
                            items: 4
                          }
                        }
                      })
                    })
        </script>    
		
       <?php $vthumb1 = "thumbnail"; ?>
       <section class="row">
        <div class="owl-carousel">
                <div class="item">
                    <div id="videomodal" onClick="videoClick('<?php echo HTTP_ROOT;?>/video_1.mp4')" >                       
                        <img src="<?php echo HTTP_ROOT;?>/img/video/<?php echo $vthumb1; ?>/1.jpg" class="video-home" />
                    </div> 
                </div>
                <div class="item">
                    <div id="videomodal" onClick="videoClick('<?php echo HTTP_ROOT;?>/video_2.mp4')" >
                        <img src="<?php echo HTTP_ROOT;?>/img/video/<?php echo $vthumb1; ?>/2.jpg" class="video-home" />
                    </div> 
                </div>
                <div class="item">
                    <div id="videomodal" onClick="videoClick('<?php echo HTTP_ROOT;?>/video_3.mp4')" >
                        <img src="<?php echo HTTP_ROOT;?>/img/video/<?php echo $vthumb1; ?>/3.jpg" class="video-home" />
                    </div> 
                </div>
                <div class="item">
                    <div id="videomodal" onClick="videoClick('<?php echo HTTP_ROOT;?>/video_4.mp4')" >
                        <img src="<?php echo HTTP_ROOT;?>/img/video/<?php echo $vthumb1; ?>/4.jpg" class="video-home" />
                    </div> 
                </div>
                      
        </div>
       </section>
     <div class="border row">  
    
  <div class="">&nbsp;</div> 
  </div>
</section>  
<div class="">&nbsp;</div>
<div class="">&nbsp;</div>
<div id="video1" class="modal fade" role="dialog" style="z-index:1000000000">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" id="videoclose">&times;</button>               
      </div>
      <div class="modal-body">
        <div class="embed-responsive embed-responsive-16by9">
            <video controls class="video-home" id="Video-Container" type="video/mp4">
                  <!--<source src="" id="Video-Container" >-->
            </video>
        </div>
      </div>             
    </div>

  </div>
</div>
<script>
$(document).ready(function(){
getLocation();
  showMap();
  /*$('.treding').on('click',function(){
    var id=$(this).attr('id');
    window.location.href="<?php echo HTTP_ROOT;?>/vendor_classes/classes/"+btoa(id);
  
  });
$('.featured').on('click',function(){
 var id=$(this).attr('id');
    window.location.href="<?php echo HTTP_ROOT;?>/vendor_classes/classes/"+btoa(id);
   
})*/
});
</script>
<!-- End middle container -->
<script>
function getLocation() {
      
    if (navigator.geolocation) {
        
        navigator.geolocation.getCurrentPosition(showPosition);
       
    } else { 
         //alert('hii');
        x.innerHTML = "Geolocation is not supported by this browser.";
    }
}
function showPosition(position) {
 
   var latitude =position.coords.latitude;
   var longitude=position.coords.longitude;
   $('#latitude').val(latitude);
   $('#longitude').val(longitude);
   
  showMap();
    
   
    
}
function fromLatLngToPoint(latLng, map) {
    var topRight = map.getProjection().fromLatLngToPoint(map.getBounds().getNorthEast());
    var bottomLeft = map.getProjection().fromLatLngToPoint(map.getBounds().getSouthWest());
    var scale = Math.pow(2, map.getZoom());
    var worldPoint = map.getProjection().fromLatLngToPoint(latLng);
    return new google.maps.Point((worldPoint.x - bottomLeft.x) * scale, (worldPoint.y - topRight.y) * scale);
}
function showMap(){
  var latitude=$('#latitude').val();
  var longitude=$('#longitude').val();
  $.ajax({ 
        url: '<?php echo HTTP_ROOT;?>/Homes/index/'+latitude+'/'+longitude,
        type: 'post',
        
         success: function(output) {
               
               var result=jQuery.parseJSON(output);
              
              locations_str = '';
              locations = new Array();
              $.each(result,function(e,temp_obj){
                         
                var location = [];
                location.push(temp_obj.bg_vendor_classes.class_topic);
                location.push(temp_obj.bg_vendor_classe_location_details.latitude);
                location.push(temp_obj.bg_vendor_classe_location_details.longitude);
                location.push(temp_obj.bg_categories.color_code);
                location.push(temp_obj.bg_vendor_classes.ide);
                locations.push(location);
              
                // locations_str += "['"+temp_obj.bg_vendor_classes.class_topic+"', "+temp_obj.bg_vendor_classes.latitude+", "+temp_obj.bg_vendor_classes.longitude+", "+(++i)+"],";
              });
   var map = new google.maps.Map(document.getElementById('googleMap'), {
      zoom: 10,
      center: new google.maps.LatLng(13.1339078,80.2707),
     
       
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });
    var infowindow = new google.maps.InfoWindow();
    var marker, i;
   var bounds = new google.maps.LatLngBounds();
    for (i = 0; i < locations.length; i++) { 
            
     //bounds.extend(locations[i][1]); 
      var pinColor = locations[i][3];
var pinImage = new google.maps.MarkerImage("http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=%E2%80%A2|" + pinColor,
    new google.maps.Size(21, 34),
    new google.maps.Point(0,0),
    new google.maps.Point(10, 34));
var pinShadow = new google.maps.MarkerImage("http://chart.apis.google.com/chart?chst=d_map_pin_shadow",
    new google.maps.Size(40, 37),
    new google.maps.Point(0, 0),
    new google.maps.Point(12, 35));
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
        map: map,
        map: map,
        icon: pinImage,
        scale: 20,
        shadow: pinShadow,
        url:'<?php echo HTTP_ROOT;?>/Homes/viewclassDetail/'+btoa(locations[i][4]),
        title:locations[i][0]
        
      });
      map.setZoom(11);
  google.maps.event.addListener(marker, 'mouseover', function (event) {
          var latitude = this.position.lat();
    var longitude = this.position.lng();
    var point = fromLatLngToPoint(this.getPosition(),map);
     $('.loader').show();
          $.ajax({ 
        url: '<?php echo HTTP_ROOT;?>/Homes/sameLocationClass/'+latitude.toFixed(6)+'/'+longitude.toFixed(6),
        type: 'post',
         success: function(output) {
         $('.loader').hide();
      if(output=='0'){
              $('#marker-tooltip').hide();
            }
            else{
       $('#marker-tooltip').html(output).css({
            'left': point.x,
                'top': point.y
        }).show();
         }
         }
     });
      
       
    });        
 
    }    
 
            }
        });
}
</script>