<?php 

if($user_view['UserMaster']['user_type_id']=='1'){?>
<style>
.funmp1 {
    width: 100%;
  
    background-image: url("<?php echo HTTP_ROOT;?>/img/Vendor/profile/<?php echo $user_view['UserMaster']['background_image'];?>");

    background-repeat: no-repeat;
    background-size: 100% 100%;
    padding-bottom:10px;
}
</style>
<?php } else{?>
<style>
.funmp1 {
    width: 100%;
  
    background-image: url("<?php echo HTTP_ROOT;?>/img/Buyer/profile/<?php echo $user_view['UserMaster']['background_image'];?>");

    background-repeat: no-repeat;
    background-size: 100% 100%;
    padding-bottom:10px;
}
</style>
<?php }?>
<style>
.myprflbrd {
    border: inherit !important;
    margin-bottom: 20px;
}
.snr {
    padding-top: 3px;
}
.edit-bg {
    color: rgb(255, 255, 255);
    font-size: 21px;
}
.myprfdiv{ border: 1px solid #30AFA8 !important;}
.edit-photo{
  color: #FFF;
  font-family: 'os_bold';
  font-size: 14px;
  cursor: pointer;
}
.image_price12{

    background-color: #00CDC6;
    height: 42px;
    margin-right: 5px;
    border-radius: 25px;
    width: 78px;
    padding: 9px 15px;
    position: relative;
    bottom: 239px;
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
</style>
  <?php if($user_view['UserMaster']['user_type_id'] == 1){?>
    <div class="col-md-12 col-sm-12 col-xs-12 ruth6542 ruth654786 profile-fun">  
            <div class="col-md-12 col-sm-12 col-xs-12 tab_head padd_l_r">
              <div class="col-md-2 col-sm-3 col-xs-4 seg seg786 profile-segg" id="profile">Profile</div>
              <div class="col-md-2 col-sm-3 col-xs-4 seg photo-seg" id="video">Photos & Videos</div>
              <div class="col-md-2 col-sm-3 col-xs-4 seg seg2 video-seg" id="sr_class">Classes</div>
              <div class="col-md-2 col-sm-3 col-xs-4 seg review-seg" id="review">Reviews</div>
            </div>

            <!-- *************hide1*************** -->
            <div class="col-md-12 col-sm-12 col-xs-12 padd_l_r" id="profile1" style="">
                <!--<div class="col-md-12 col-sm-12 col-xs-12 vid" id="photo3">
                  <div class="col-md-3 col-sm-4 col-xs-6 photos" id="">My Profile</div>
                </div>-->
                <div style="color:red; font-size:16px; margin-top:52px; margin-bottom:-18px;"><?php  echo $this->Session->flash(); ?></div>
                <div class="col-md-12 col-sm-12 col-xs-12 padd_l_r myprflbrd myprfdiv" id="photo2">
                    <div class="col-md-12 col-sm-12 col-xs-12 bgsec">
                      <div class="col-md-3 col-sm-3 col-xs-6 photos1" id="photo">Basic Information</div>
                      <div class="col-md-9 col-sm-9 col-xs-6 photos1" id="vid">
                        
                      </div>
                      <div class="col-md-9 col-sm-9 col-xs-6 photos1" style="display:none;" id="vid">
                        
                      </div>
                    </div>
                    <!-- *****************Name************** -->
                    <div class="col-md-12 col-sm-12 col-xs-12 detail">
                      <div class="col-md-3 col-sm-6 col-xs-4 br_name">
                        <img src="<?php echo HTTP_ROOT;?>/img/profile_img/name.png">
                        <span>Name:</span>
                      </div>
                      <div class="col-md-9 col-sm-6 col-xs-8 br_name1">
                        <span><?php echo $user_view['UserMaster']['first_name'];?></span>
                      </div>
                    </div>
                    <!-- *****************Name************** -->
                     <!-- *****************locality************** -->
                    <div class="col-md-12 col-sm-12 col-xs-12 detail">
                      <div class="col-md-3 col-sm-6 col-xs-4 br_name">
                        <img src="<?php echo HTTP_ROOT;?>/img/profile_img/locality.png">
                        <span>Locality:</span>
                      </div>
                      <div class="col-md-9 col-sm-6 col-xs-8 br_name1">
                        <span><?php echo $user_view['UserMaster']['locality'];?></span>
                      </div>
                    </div>
                    <!-- *****************locality************** -->
                     <!-- *****************City************** -->
                    <div class="col-md-12 col-sm-12 col-xs-12 detail">
                      <div class="col-md-3 col-sm-6 col-xs-4 br_name">
                        <img src="<?php echo HTTP_ROOT;?>/img/profile_img/map.png">
                        <span>City:</span>
                      </div>
                      <div class="col-md-9 col-sm-6 col-xs-8 br_name1">
                        <span><?php if(!empty($city_name['City']['name'])){
                                      echo $city_name['City']['name'];
                                    }else{
                                      echo "N/A";
                                    }
                                  ?>
                        </span>
                      </div>
                    </div>
                    <!-- *****************City************** -->
                    <!-- *****************Interest************** -->
                    <div class="col-md-12 col-sm-12 col-xs-12 detail">
                      <div class="col-md-3 col-sm-6 col-xs-4 br_name">
                        <img src="<?php echo HTTP_ROOT;?>/img/profile_img/heart.png">
                        <span>Interest:</span>
                      </div>
                      <div class="col-md-9 col-sm-6 col-xs-8 br_name1">
                        <span><?php echo !empty($user_view['UserMaster']['interest'])?$user_view['UserMaster']['interest']:"N/A";?></span>
                      </div>
                    </div>
                     <?php if(($user_view['UserMaster']['user_type_id'])=='1'){?>
                   
                    <!-- *****************Interest************** -->
                    <!-- *****************section 2************* -->
                    <div class="col-md-12 col-sm-12 col-xs-12 bgsec">
                      <div class="col-md-3 col-sm-3 col-xs-6 photos1" id="photo">Individual/Organization profile</div>
                      <div class="col-md-9 col-sm-9 col-xs-6 photos1" id="vid">
                        
                      </div>
                      <div class="col-md-9 col-sm-9 col-xs-6 photos1" style="display:none;" id="vid">
                        
                      </div>
                    </div>
                    <!-- *****************section 2************* -->
                    <!-- *****************Institution************** -->
                    <div class="col-md-12 col-sm-12 col-xs-12 detail">
                      <div class="col-md-3 col-sm-6 col-xs-4 br_name">
                        <img src="<?php echo HTTP_ROOT;?>/img/profile_img/building.png">
                        <span>Institution:</span>
                      </div>
                      <div class="col-md-9 col-sm-6 col-xs-8 br_name1">
                        <span><?php echo !empty($user_view['UserMaster']['institute_name'])?$user_view['UserMaster']['institute_name']:"N/A";?></span>
                      </div>
                    </div>
                    <!-- *****************Institution************** -->
                    <!-- *****************Registration Id************** -->
                    <div class="col-md-12 col-sm-12 col-xs-12 detail">
                      <div class="col-md-3 col-sm-6 col-xs-4 br_name">
                        <img src="<?php echo HTTP_ROOT;?>/img/profile_img/are.png">
                        <span>Registration Id:</span>
                      </div>
                      <div class="col-md-9 col-sm-6 col-xs-8 br_name1">
                        <span><?php echo !empty($user_view['UserMaster']['official_reg_id'])?$user_view['UserMaster']['official_reg_id']:"N/A";?></span>
                      </div>
                    </div>
                    <!-- *****************Registration Id************** -->
                    <!-- *****************Experience Area************** -->
                    <div class="col-md-12 col-sm-12 col-xs-12 detail">
                      <div class="col-md-3 col-sm-6 col-xs-4 br_name b_pad">
                        <i class="fa fa-mobile" aria-hidden="true"></i>
                        <span>Expertise Area:</span>
                      </div>
                      <div class="col-md-9 col-sm-6 col-xs-8 br_name1">
                        <span><?php echo !empty($user_view['UserMaster']['area_of_expertise'])?$user_view['UserMaster']['area_of_expertise']:"N/A";?></span>
                      </div>
                    </div>
                    <!-- *****************Experience Area************** -->
                    <!-- *****************Address************** -->
                    <div class="col-md-12 col-sm-12 col-xs-12 detail">
                      <div class="col-md-3 col-sm-6 col-xs-4 br_name b_pad">
                        <img src="<?php echo HTTP_ROOT;?>/img/profile_img/map_loc.png">
                        <span>Address:</span>
                      </div>
                      <div class="col-md-9 col-sm-6 col-xs-8 br_name1">
                        <span><?php echo !empty($user_view['UserMaster']['address'])?$user_view['UserMaster']['address']:"N/A";?></span>
                      </div>
                    </div>
                    <!-- *****************Address************** -->
                    <!-- *****************Description************** -->
                    <div class="col-md-12 col-sm-12 col-xs-12 detail">
                      <div class="col-md-3 col-sm-6 col-xs-4 br_name b_pad">
                        <img src="<?php echo HTTP_ROOT;?>/img/profile_img/eye.png">
                        <span>Description:</span>
                      </div>
                      <div class="col-md-5 col-sm-6 col-xs-8 br_name1" style="text-align:justify;">
                        <span><?php echo !empty($user_view['UserMaster']['description'])?$user_view['UserMaster']['description']:"N/A";?></span>
                      </div>
                    </div>
                    <!-- *****************Description************** -->
                    <!-- *****************section 3************* -->
                    <div class="col-md-12 col-sm-12 col-xs-12 bgsec">
                      <div class="col-md-3 col-sm-3 col-xs-6 photos1" id="photo">Additional information</div>
                      <div class="col-md-9 col-sm-8 col-xs-6 photos1" id="vid">
                        
                      </div>
                      <div class="col-md-9 col-sm-8 col-xs-6 photos1" style="display:none;" id="vid">
                       
                      </div>
                    </div>
                    <!-- *****************section 3************* -->
                    <!-- *****************Teaching Experience************** -->
                    <div class="col-md-12 col-sm-12 col-xs-12 detail">
                      <div class="col-md-3 col-sm-6 col-xs-4 br_name b_pad">
                        <img src="<?php echo HTTP_ROOT;?>/img/profile_img/experience.png">
                        <span>Teaching Experience:</span>
                      </div>
                      <div class="col-md-9 col-sm-6 col-xs-8 br_name1">
                        <span><?php echo !empty($user_view['UserMaster']['coaching_experience'])?$user_view['UserMaster']['coaching_experience']." Year":"N/A";?></span>
                      </div>
                    </div>
                    <!-- *****************Teaching Experience************** -->
                    <!-- *****************Gender************** -->
                    <div class="col-md-12 col-sm-12 col-xs-12 detail">
                      <div class="col-md-3 col-sm-6 col-xs-4 br_name b_pad">
                        <img src="<?php echo HTTP_ROOT;?>/img/profile_img/gender.png">
                        <span>Gender:</span>
                      </div>
                      <div class="col-md-9 col-sm-6 col-xs-8 br_name1">
                        <span><?php if(($user_view['UserMaster']['gender'])=='1'){
                          echo "Male";
                      }?>
                       <?php if(($user_view['UserMaster']['gender'])=='2'){
                          echo "Female";
                        }if(empty($user_view['UserMaster']['gender'])){
                          echo "N/A";
                        }?></span>
                      </div>
                    </div>
                    <?php }else{?>
                      <!-- *****************Interest************** -->
                    <!-- *****************section 2************* -->
                    <div class="col-md-12 col-sm-12 col-xs-12 bgsec">
                      <div class="col-md-3 col-sm-3 col-xs-6 photos1" id="photo">Section 2</div>
                      <div class="col-md-8 col-sm-8 col-xs-6 photos1" id="vid">
                       
                      </div>
                      <div class="col-md-8 col-sm-8 col-xs-6 photos1" style="display:none;" id="vid">
                       
                      </div>
                    </div>
                    <!-- *****************section 2************* -->
                    <!-- *****************Gender************** -->
                    <div class="col-md-12 col-sm-12 col-xs-12 detail">
                      <div class="col-md-3 col-sm-6 col-xs-4 br_name b_pad">
                        <img src="<?php echo HTTP_ROOT;?>/img/profile_img/gender.png">
                        <span>Gender:</span>
                      </div>
                      <div class="col-md-9 col-sm-6 col-xs-8 br_name1">
                        <span><?php if(($user_view['UserMaster']['gender'])=='1'){
                          echo "Male";
                      }?>
                       <?php if(($user_view['UserMaster']['gender'])=='2'){
                          echo "Female";
                        }if(empty($user_view['UserMaster']['gender'])){
                          echo "N/A";
                        }?></span>
                      </div>
                    </div>
                    <?php }?>
                    <!-- *****************Gender************** -->
                    <!-- *****************Qualification************** -->
                    <!--<div class="col-md-12 col-sm-12 col-xs-12 detail">
                      <div class="col-md-3 col-sm-6 col-xs-4 br_name b_pad">
                        <img src="<?php //echo HTTP_ROOT;?>/img/profile_img/qualification.png">
                        <span>Qualification:</span>
                      </div>class="booking"
                      <div class="col-md-9 col-sm-6 col-xs-8 br_name1">
                        <span>Post Graduation,'O' Level Diploma</span>
                      </div>
                    </div> -->                 <!--<
                    <!-- *****************Qualification************** -->
                    <!-- *****************Achievements************** -->
                     <!-- *****************Achievements************** -->
                </div>
                <!-- ******************hide 1.1************** -->
               
                    
                   
                    <!-- *****************Name************** -->
                   
                    <!-- *****************City************** -->
                     <!-- *****************locality************** -->
                 
                    <!-- *****************locality************** -->
                    <!-- *****************Interest************** -->
                   
                    <?php if(($user_view['UserMaster']['user_type_id'])=='1'){?>
                      
                    <!-- *****************Interest************** -->
                    <!-- *****************section 2************* -->
                    
                    <!-- *****************Description************** -->
                    <!-- *****************section 3************* -->
                   
     
                    <?php }else{?>
                 
                    <!-- *****************section 2************* -->
                    <!-- *****************Institution************** -->
                  
                    
                    <?php }?>
                    <!-- *****************Achievements************** -->
                </div> 
                <!-- ******************hide 1.1************** --> 
              <div class="col-md-12 col-sm-12 col-xs-12 padd_l_r" id="video1" style="display:none;">
                  <div class="col-md-12 col-sm-12 col-xs-12 padd_l_r" id="photo1"> 
                      <div class="col-md-12 col-sm-12 col-xs-12 vid padd_l_r" style="padding: 3px;">
                          <!-- <div class="col-md-2 col-sm-2 col-xs-4 photos sr_photo01" id="sr_photo_g">Photos</div>
                          <div class="col-md-2 col-sm-2 col-xs-4 photos sr_video01" id="vid">Videos</div> -->
                          <div class="col-md-offset-3 col-md-6 col-sm-offset-2 col-sm-8">
                            <center>
                              <div class="btn-group btn-group-justified">
                                <a href="#" class="btn btn-default photos-prf sr_photo01 sr-box-btn" id="sr_photo_g">Photos</a>
                                <a href="#" class="btn btn-default video-butn photos-prf sr-box-btn sr_video01" id="vid">Videos</a>
                            </center>
                          </div>
                      </div>
                      <div class="col-md-12 col-sm-12 col-xs-12 sr_pv_padding_lr myprflbrd" id="sr_photo">

                        <div class="col-md-12 col-sm-12 col-xs-12 vid1">
                            <div class="col-md-12 col-sm-12 col-xs-12 uploadd-btn">
                              <span>Photos</span>
                            </div>

                            <!-- <center>
                              <button type="button" id ="upload-btn" class="btn btn-success uploadd-btn">Upload Video</button> -->
                            <!-- </center> -->
                            <div class="col-md-12 col-sm-12 col-xs-12">
                              <div class="col-md-12 col-sm-12 col-xs-12 march"></div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12 sr_pv_padding_lr01">
                              <!-- image gallery 1 -->
                              <?php if(!empty($galleryimage)){
                                foreach($galleryimage as $result){
                                  $user_id = $result['VendorGalleries']['user_id'];
                                  $image = $result['VendorGalleries']['media_path'];
                                ?>
                                
                                <div class="col-md-3 col-sm-3 col-xs-6 pimgtop"><img class="img-responsive yogaimg" src="<?php echo HTTP_ROOT;?>/img/Vendor/UploadImage_<?php echo $user_id .'/'. $image;?>" style="width:100%;height:200px;border:2px solid black;"></div>
                              <?php }}else{ ?>
                                  <p class="empty-review">No Photos</p>
                              <?php }?>
                            </div>
                        </div> 
                      </div> 
                      <div class="col-md-12 col-sm-12 col-xs-12 sr_pv_padding_lr myprflbrd" id="sr_video" style="display:none;">
                        <div class="col-md-12 col-sm-12 col-xs-12 uploadd-btn uploadd-vid-btn">
                          <span>Videos</span>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12 vid1">
                          <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="col-md-12 col-sm-12 col-xs-12 march"></div>
                          </div>
                          <div class="col-md-12 col-sm-12 col-xs-12 sr_pv_padding_lr01">
                            <!-- image gallery 1 -->
                            <?php if(!empty($galleryvideo)){
                              foreach($galleryvideo as $result){
                                  $user_id = $result['VendorGalleries']['user_id'];
                                  $video   = $result['VendorGalleries']['media_path'];
                                  ?>
                              
                              <div class="col-md-3 col-sm-3 col-xs-6 pimgtop">
                                <!-- <img class="img-responsive yogaimg" src="<?php echo HTTP_ROOT;?>/img/Vendor/UploadVideo_<?php echo $user_id?>/<?php echo $video;?>" style="width:100%;height:200px;border:2px solid black;"> -->
                                <video class="yogaimg" controls style="width:100%;height:200px;border:2px solid black; background-color:#313131;">
                                  <source src="<?php echo HTTP_ROOT;?>/img/Vendor/UploadVideo_<?php echo $user_id .'/'.$video;?>" type="video/mp4">
                                </video>
                              </div>
                            <?php }}else{ ?>
                                <p class="empty-review">No Videos</p>
                            <?php }?>
                          </div>
                        </div>                   
                      </div>
                      <!-- *************hide2*************** -->
                  </div>
                </div>
                
                <div class="col-md-12 col-sm-12 col-xs-12 padd_l_r" id="review1" style="display:none;">
                  <div class="col-md-12 col-sm-12 col-xs-12 padd_l_r" id="review2"> 
                      <div class="col-md-12 col-sm-12 col-xs-12 sr_pv_padding_lr myprflbrd" id="sr_photo">

                        <div class="col-md-12 col-sm-12 col-xs-12 vid1">
                            <div class="col-md-12 col-sm-12 col-xs-12 uploadd-btn">
                              <span>Review</span>
                            </div>

                            <!-- <center>
                              <button type="button" id ="upload-btn" class="btn btn-success uploadd-btn">Upload Video</button> -->
                            <!-- </center> -->
                            <div class="col-md-12 col-sm-12 col-xs-12">
                              <div class="col-md-12 col-sm-12 col-xs-12 march"></div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12 sr_pv_padding_lr01">
                              <p class="empty-review">There are no reviews</p>
                            </div>
                        </div> 
                      </div> 
                      <!-- *************hide2*************** -->
                  </div>
                </div>
              <div class="col-md-12 col-sm-12 col-xs-12 padd_l_r class-vid profile-fun profile-funn-class" id="sr_class1" style="display:none;"> 
                      <div class="col-md-12 col-sm-12 col-xs-12 vid padd_l_r">
                        <div id="xxxx">
                          <div id="cls" class="col-sm-12 col-xs-12 photos btn-box-div" style="text-align: left;">
                            <div class="col-md-offset-3 col-md-6 col-sm-offset-1 col-sm-10">
                              <center>
                                <div class="btn-group btn-group-justified">
                                  <a href="#" class="btn btn-default seg upcomming-class upclass-tab sr-box-btn" id="#">Upcoming Classes</a>
                                  <a href="#" class="btn btn-default seg post-class past-tad-class sr-box-btn sr-box-btn1" id="#">Past Classes</a>
                                </div>
                              </center>
                            </div>
                          </div>
                      </div>
                      <div class="col-md-12 col-sm-12 col-xs-12 padd_l_r" style="margin-top: 3px;">
                            <div class="upcomming-divv panel-group col-xs-12 sr_pv_padding_lr padd_l_r" id="accordion" style="padding-bottom: 3px;">                            
                              <div class="panel-heading col-xs-12 sr_class_acc01">
                                <div class="panel-title">
                                 
                                    <span class="sr_class_acc01 sr_class_acc_text1" style="box-sizing:none;float:left;">Upcoming Classes</span>
                                    
                                  </a>
                                </div>
                              </div>

                              <div id="collapseOne" class="panel-collapse collapse in col-xs-12 sr_pv_padding_lr myprflbrd">
                                <div class="panel-body jstify col-xs-12 sr_pv_padding_lr">
                                  <div class="col-xs-12 col-sm-12 sr_2605_03_padding sr_pv_padding_lr" id="#">
                                      <?php if(!empty($upcoming_class)){
                                        foreach ($upcoming_class as $result) {
                                          
                                        ?>           
                                        <div class="col-sm-12 col-xs-12 sr_260501 sr_pv_padding_lr" style="padding-bottom: 15px; border-bottom: 2px solid #00477b; background:#fff;"> 
                                              <!-- ********images************ -->
                                              <div class="col-md-5 col-sm-12 col-xs-12 padd_l_r1 img-responsive"  style="margin-top: 15px;">
                                                <div class="col-xs-12 col-sm-12 col-md-offset-1 col-md-10">
                                                  
                                                  <?php 
                                                    echo "<span class='flexible-fixed'>";
                                                    echo ($result['VendorClasse']['class_timing_id'] == 2)?'Fixed':'Flexible';
                                                    echo "</span>";
                                                    ?>

                                                 
                                                  <?php if(!empty($result['VendorClasse']['upload_class_photo'])){?>
                                                    <img src="<?php echo HTTP_ROOT;?>/img/Vendor/class_image/<?php 
                                                          echo $result['VendorClasse']['upload_class_photo'];?>" class="img_res img-responsive upcoming_class" id="<?php echo $result['VendorClasse']['id'];?>" style="width:484px;height:253px;border:2px solid black;cursor:pointer">
                                                  <?php }else{?>
                                                    <img src="<?php echo HTTP_ROOT;?>/img/Vendor/class_image/defult_pic.png" class="img_res img-responsive upcoming_class" id="<?php echo $result['VendorClasse']['id'];?>" style="width:484px;height:253px;border:2px solid black;cursor:pointer">
                                                  <?php } ?>    
                                                  <div class="image_price12 pull-right">
                                                    <span class="ccc" style="color:white">
                                                      &#8377;<?php echo $result['VendorClasse']['price_per_head'];?></span>
                                                  </div>
                                                </div>  
                                              </div>
                                              <!-- ********images************ -->
                                             
                                              <div class="col-md-6 col-sm-12 col-xs-12 text_res sr_2605_03_padding status-div" >
                                                 <div class="col-xs-12 col-sm-12 sr_2605_06 sr_2605_06_textLorem021 sr_pv_padding_lr txt_cntnt">
                                                    <div class="hathyga up-com-post col-xs-12 col-sm-12 sr_2605_03_padding upcoming-class-title">
                                                      <?php echo $result['VendorClasse']['class_topic'];?>
                                                    </div>
                                                    <div class="col-xs-12 col-sm-12 sr_2605_03_padding sr_serch_div_l_hite sr_class_acc_div padd_l_r" style="margin-bottom:7px;">

                                                      <div class="row">
                                                        <div class="col-md-2 col-sm-2 col-xs-2 upcom-img-class">
                                                          <img class="img-responsive" style="display: inline; margin-right: 5px;" src="<?php echo HTTP_ROOT;?>/img/fun&refreshment/location.png">
                                                        </div>
                                                        <div class="col-md-10 col-sm-10 col-xs-10 sr_class_acc_text02 upclass-location">
                                                          <?php echo $result['VendorClasse']['location'];?>
                                                        </div>
                                                      </div>
                                                    </div>
                                                    <div class="col-xs-12 col-sm-12 sr_2605_03_padding sr_serch_div_l_hite sr_class_acc_div padd_l_r" style="margin-bottom:7px;">
                                                      <div class="row">
                                                        <div class="col-md-2 col-sm-2 col-xs-2 upcom-img-class">
                                                          <img class="img-responsive" style="display: inline; margin-right: 5px;" src="<?php echo HTTP_ROOT;?>/img/fun&refreshment/user.png">
                                                        </div>
                                                        <div class="col-md-10 col-sm-10 col-xs-10 sr_class_acc_text02 upclass-location">
                                                        <strong> By :</strong> <?php echo ucfirst($result['VendorClasse']['class_by']);?>
                                                        </div>
                                                      </div>
                                                    </div>
                                                    <div class="col-xs-12 col-sm-12 sr_2605_03_padding sr_serch_div_l_hite sr_class_acc_div padd_l_r" style="margin-bottom:7px;">
                                                      <div class="row">
                                                        <div class="col-md-2 col-sm-2 col-xs-2 upcom-img-class">
                                                          <img class="img-responsive" style="display: inline; margin-right: 5px;" src="<?php echo HTTP_ROOT;?>/img/fun&refreshment/session.png">
                                                        </div>
                                                        <div class="col-md-10 col-sm-10 col-xs-10 sr_class_acc_text02 upclass-location">
                                                        <strong><?php echo ucfirst($result['VendorClasse']['no_of_session']);?></strong>&nbsp;Session
                                                        </div>
                                                      </div>
                                                    </div>
                                                    <div class="col-xs-12 col-sm-12 sr_serch_div_l_hite sr_class_acc_div padd_l_r" style="margin-bottom:7px;">
                                                       <div class="row">
                                                        <div class="col-md-2 col-sm-2 col-xs-2 upcom-img-class">
                                                        <img class="img-responsive" style="display: inline; margin-right: 5px;" src="<?php echo HTTP_ROOT;?>/img/fun&refreshment/calander.png"></div>
                                                        <div class="col-md-10 col-sm-10 col-xs-10 upclass-location">
                                                          <?php if($result['VendorClasse']['class_timing_id'] == 1){?>
                                                            <div class="col-md-8 col-sm-8 col-xs-8 sr_class_acc_text02 past-timming-div-first" >
                                                            <?php echo $result['VendorClasse']['class_duration'];?></div>&nbsp;
                                                          <?php }else{?>
                                                          <div class="row">
                                                            <div class="col-md-4 col-sm-4 col-xs-4 sr_class_acc_text02 past-timming-div-first" >
                                                            <?php echo $result['VendorClasse']['starting_month'];?></div>&nbsp;
                                                            <div class="col-md-7 col-sm-7 col-xs-6 past-timmg-div-second">
                                                              <div class="col-md-2 col-sm-2 col-xs-2 upcom-img-class">
                                                                <img class="img-responsive" style="display: inline; margin-right: 5px;" src="<?php echo HTTP_ROOT;?>/img/fun&refreshment/clock.png">
                                                              </div>
                                                              <div class="col-md-10 col-sm-10 col-xs-10 sr_class_acc_text02 upclass-location"><?php echo $result['VendorClasse']['time_of_day'];?></div>
                                                            </div>
                                                          </div>
                                                          <?php }?>
                                                        </div>
                                                      </div>
                                                    </div>
                                                    <div class="col-xs-12 col-sm-12  sr_2605_06_textLorem sr_serch_div_l_hite sr_class_acc_div padd_l_r" style="margin-bottom:7px;">
                                                      <div class="row">
                                                        <div class="col-md-2 col-sm-2 col-xs-2 upcom-img-class">
                                                          <img class="img-responsive" style="display: inline; margin-right: 5px;" src="<?php echo HTTP_ROOT;?>/img/fun&refreshment/information.png">
                                                        </div>
                                                          <div class="col-md-10 col-sm-10 col-xs-10 sr_class_acc_text02 up-com-post-text upclass-location">
                                                            <?php echo substr($result['VendorClasse']['class_summary'], 0, 150),".......";?>
                                                          </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12 col-sm-12 padd_l_r"><img src="<?php echo HTTP_ROOT;?>/img/8.jpg" class="star all-star-img"></div>
                                                    <!-- <a href="<?php echo HTTP_ROOT;?>/Homes/bookClass/"><div class="col-xs-12 col-sm-12" style="text-align: right;padding-right:0px;"><button class="booking">Booking Status</button></div></a> -->
                                                  </div>
                                              </div>        
                                              <!-- ********text************ -->
                                        </div> 
                                      <?php }}else{ ?>
                                            <p class="empty-review">There are no upcomming classes</p>
                                        <?php }?>
                                  </div><!-- tab 1 / -->
                                </div>
                              </div> 
                            </div>
                              <div class="past-tab">
                                <div class="col-xs-12 col-sm-12" style="margin-bottom: 5px; margin-top: 5px; border: 2px solid #00CDC6;"></div>
                                <div class="panel-heading col-xs-12 sr_class_acc01">
                                    <div class="panel-title">
                                      <span class="sr_class_acc01 sr_class_acc_text1" style="box-sizing:none;float:left;">Past Classes
                                      </span>
                                    </div>
                                </div>
                                <div id="collapsetwo" class="panel-collapse col-xs-12 sr_pv_padding_lr myprflbrd">
                                    <div class="panel-body jstify col-xs-12 sr_pv_padding_lr">
                                      <div class="col-xs-12 col-sm-12 sr_2605_03_padding sr_pv_padding_lr" id="#">
                                        <?php if(!empty($past_class)){
                                          foreach ($past_class as $result) {
                                            // $current_date = date('m/d/Y');
                                            // $past_date = $result['VendorClasse']['end_month'];
                                            // //var_dump($current_date > $past_date);
                                            // if($current_date > $past_date){
                                          ?>           
                                          <div class="col-sm-12 col-xs-12 sr_260501 sr_pv_padding_lr" style="padding-bottom: 15px; border-bottom: 2px solid #00477b; background:#fff;"> 
                                                <!-- ********images************ -->
                                                <div class="col-md-5 col-sm-12 col-xs-12 padd_l_r1 img-responsive"  style="margin-top: 15px;">
                                                  <div class="col-xs-12 col-sm-12 col-md-offset-1 col-md-10">
                                                    <?php 
                                                      echo "<span class='flexible-fixed'>";
                                                      echo ($result['VendorClasse']['class_timing_id'] == 2)?'Fixed':'Flexible';
                                                      echo "</span>";
                                                    ?>
                                                    <?php if(!empty($result['VendorClasse']['upload_class_photo'])){?>
                                                      <img src="<?php echo HTTP_ROOT;?>/img/Vendor/class_image/<?php 
                                                            echo $result['VendorClasse']['upload_class_photo'];?>" class="img_res img-responsive upcoming_class" id="<?php echo $result['VendorClasse']['id'];?>" style="width:484px;height:253px;border:2px solid black;cursor:pointer">
                                                    <?php }else{?>
                                                      <img src="<?php echo HTTP_ROOT;?>/img/Vendor/class_image/defult_pic.png" class="img_res img-responsive upcoming_class" id="<?php echo $result['VendorClasse']['id'];?>" style="width:484px;height:253px;border:2px solid black;cursor:pointer">
                                                    <?php } ?>    
                                                    <div class="image_price12 pull-right">
                                                      <span class="ccc" style="color:white">
                                                        &#8377;<?php echo $result['VendorClasse']['price_per_head'];?></span>
                                                    </div>

                                                  </div>  
                                                </div><!-- ********images************ -->
                                                <!-- ********text************ -->
                                                
                                                <div class="col-md-6 col-sm-12 col-xs-12 text_res sr_2605_03_padding status-div">
                                                   <div class="col-xs-12 col-sm-12 sr_2605_06 sr_2605_06_textLorem021 sr_pv_padding_lr txt_cntnt">
                                                      <div class="hathyga up-com-post col-xs-12 col-sm-12 sr_2605_03_padding">
                                                        <?php echo $result['VendorClasse']['class_topic'];?></div>
                                                      <div class="col-xs-12 col-sm-12 col-md-12 sr_2605_03_padding sr_serch_div_l_hite sr_class_acc_div padd_l_r">
                                                        <div class="row">
                                                          <div class="col-md-2 col-sm-2 col-xs-2 upcom-img-class">
                                                            <img class="img-responsive" style="display: inline;margin-right: 5px;" src="<?php echo HTTP_ROOT;?>/img/fun&refreshment/location.png">
                                                          </div>
                                                          <div class="col-md-10 col-sm-10 col-xs-10   sr_class_acc_text02 upclass-location"><?php echo $result['VendorClasse']['location'];?>
                                                          </div>
                                                        </div>
                                                      </div>
                                                      <div class="col-xs-12 col-sm-12 sr_2605_03_padding sr_serch_div_l_hite sr_class_acc_div padd_l_r">
                                                        <div class="row">
                                                          <div class="col-md-2 col-sm-2 col-xs-2 upcom-img-class">
                                                            <img class="img-responsive" style="display: inline; margin-right: 5px;" src="<?php echo HTTP_ROOT;?>/img/fun&refreshment/user.png">
                                                          </div>
                                                          <div class="col-md-10 col-sm-10 col-xs-10 sr_class_acc_text02 upclass-location">
                                                          <strong>Provided By :</strong> <?php echo ucfirst($result['VendorClasse']['class_by']);?>
                                                          </div>
                                                        </div>
                                                      </div>
                                                      <div class="col-xs-12 col-sm-12 sr_2605_03_padding sr_serch_div_l_hite sr_class_acc_div padd_l_r" style="margin-bottom:7px;">
                                                        <div class="row">
                                                          <div class="col-md-2 col-sm-2 col-xs-2 upcom-img-class">
                                                            <img class="img-responsive" style="display: inline; margin-right: 5px;" src="<?php echo HTTP_ROOT;?>/img/fun&refreshment/session.png">
                                                          </div>
                                                          <div class="col-md-10 col-sm-10 col-xs-10 sr_class_acc_text02 upclass-location">
                                                          <strong><?php echo ucfirst($result['VendorClasse']['no_of_session']);?></strong>&nbsp;Session
                                                          </div>
                                                        </div>
                                                      </div>
                                                      <div class="col-xs-12 col-sm-12 col-md-12 sr_serch_div_l_hite sr_class_acc_div padd_l_r">
                                                        <div class="row">
                                                          <div class="col-md-2 col-sm-2 col-xs-2 upcom-img-class">
                                                          <img class="img-responsive" style="display: inline; margin-right: 5px;" src="<?php echo HTTP_ROOT;?>/img/fun&refreshment/calander.png"></div>
                                                          <div class="col-md-10 col-sm-10 col-xs-10 upclass-location">
                                                            <?php if($result['VendorClasse']['class_timing_id'] == 1){?>
                                                            <div class="col-md-8 col-sm-8 col-xs-8 sr_class_acc_text02 past-timming-div-first" >
                                                            <?php echo $result['VendorClasse']['class_duration'];?></div>&nbsp;
                                                          <?php }else{?>
                                                            <div class="row">
                                                              <div class="col-md-4 col-sm-4 col-xs-4 sr_class_acc_text02 past-timming-div-first" >
                                                              <?php echo $result['VendorClasse']['starting_month'];?></div>&nbsp;
                                                              <div class="col-md-7 col-sm-7 col-xs-6 past-timmg-div-second">
                                                                <div class="col-md-2 col-sm-2 col-xs-2 upcom-img-class">
                                                                  <img class="img-responsive" style="display: inline; margin-right: 5px;" src="<?php echo HTTP_ROOT;?>/img/fun&refreshment/clock.png">
                                                                </div>
                                                                <div class="col-md-10 col-sm-10 col-xs-10 sr_class_acc_text02 upclass-location"><?php echo $result['VendorClasse']['time_of_day'];?></div>
                                                              </div>
                                                            </div>
                                                            <?php }?>
                                                          </div>
                                                        </div>
                                                      </div>
                                                      <div class="col-xs-12 col-sm-12 col-md-12 sr_2605_06_textLorem sr_serch_div_l_hite sr_class_acc_div padd_l_r">
                                                        <div class="row">
                                                          <div class="col-md-2 col-sm-2 col-xs-2 upcom-img-class">
                                                            <img class="img-responsive" style="display: inline; margin-right: 5px;" src="<?php echo HTTP_ROOT;?>/img/fun&refreshment/information.png">
                                                          </div>
                                                          <div class="col-md-10 col-sm-10 col-xs-10   sr_class_acc_text02 up-com-post-text upclass-location">
                                                            <?php echo substr($result['VendorClasse']['class_summary'], 0, 100),".......";?>
                                                          </div>
                                                          </div>
                                                      </div>
                                                      <div class="col-xs-12 col-sm-12 padd_l_r"><img src="<?php echo HTTP_ROOT;?>/img/8.jpg" class="star all-star-img"></div>
                                                      <!-- <div class="col-xs-12 col-sm-12" style="text-align: right;padding-right:0px;"><button class="booking">Edit/Repost</button></div> -->
                                                    </div>
                                                </div>        
                                                <!-- ********text************ -->
                                          </div> 
                                        <?php }}else{ ?>
                                            <p class="empty-review">There are no past classes exists</p>
                                        <?php }?>                                    
                                      </div><!-- tab 1 / -->
                                    </div>
                                  </div>
                                </div>
                            <!-- </div> -->
                      </div>
                </div>
                </div> 
           <!--  </div>  -->    
              <!-- *************hide1*************** -->

            <!-- *************hide2*************** -->            
  </div>  
  <!-- ***************navbar******************** -->

<?php 
  }
  if($user_view['UserMaster']['user_type_id'] == 2){
?>
  <div class="col-md-12 col-sm-12 col-xs-12 ruth6542 ruth654786 profile-fun">  
            <div class="col-md-12 col-sm-12 col-xs-12 tab_head padd_l_r">
              <div class="col-md-2 col-sm-3 col-xs-4 seg seg786 profile-segg" id="profile">Profile</div>
              <div class="col-md-2 col-sm-3 col-xs-4 seg seg2 video-seg" id="sr_class">My Classes</div>
            </div>

            <!-- *************hide1*************** -->
            <div class="col-md-12 col-sm-12 col-xs-12 padd_l_r" id="profile1" style="">
                <div class="col-md-12 col-sm-12 col-xs-12 vid" id="photo3">
                  <div class="col-md-3 col-sm-4 col-xs-6 photos" id="">My Profile</div>
                </div>
                <div style="color:red; font-size:16px; margin-top:52px; margin-bottom:-18px;"><?php  echo $this->Session->flash(); ?></div>
                <div class="col-md-12 col-sm-12 col-xs-12 padd_l_r myprflbrd myprfdiv" id="photo2">
                    <div class="col-md-12 col-sm-12 col-xs-12 bgsec">
                      <div class="col-md-3 col-sm-3 col-xs-6 photos1" id="photo">Basic Information</div>
                      <div class="col-md-9 col-sm-9 col-xs-6 photos1" id="vid">
                       
                      </div>
                      <div class="col-md-9 col-sm-9 col-xs-6 photos1" style="display:none;" id="vid">
                        
                      </div>
                    </div>
                    <!-- *****************Name************** -->
                    <div class="col-md-12 col-sm-12 col-xs-12 detail">
                      <div class="col-md-3 col-sm-6 col-xs-4 br_name">
                        <img src="<?php echo HTTP_ROOT;?>/img/profile_img/name.png">
                        <span>Name:</span>
                      </div>
                      <div class="col-md-9 col-sm-6 col-xs-8 br_name1">
                        <span><?php echo $user_view['UserMaster']['first_name'];?></span>
                      </div>
                    </div>
                    <!-- *****************Name************** -->
                     <!-- *****************locality************** -->
                    <div class="col-md-12 col-sm-12 col-xs-12 detail">
                      <div class="col-md-3 col-sm-6 col-xs-4 br_name">
                        <img src="<?php echo HTTP_ROOT;?>/img/profile_img/locality.png">
                        <span>Locality:</span>
                      </div>
                      <div class="col-md-9 col-sm-6 col-xs-8 br_name1">
                        <span><?php echo $user_view['UserMaster']['locality'];?></span>
                      </div>
                    </div>
                    <!-- *****************locality************** -->
                     <!-- *****************City************** -->
                    <div class="col-md-12 col-sm-12 col-xs-12 detail">
                      <div class="col-md-3 col-sm-6 col-xs-4 br_name">
                        <img src="<?php echo HTTP_ROOT;?>/img/profile_img/map.png">
                        <span>City:</span>
                      </div>
                      <div class="col-md-9 col-sm-6 col-xs-8 br_name1">
                        <span>
                          <?php 

                          if(!empty($city_name['City']['name'])){
                                      echo $city_name['City']['name'];
                                    }else{
                                      echo "N/A";
                                    }
                          ?>
                        </span>
                      </div>
                    </div>
                    <!-- *****************City************** -->
                    <!-- *****************Interest************** -->
                    <div class="col-md-12 col-sm-12 col-xs-12 detail">
                      <div class="col-md-3 col-sm-6 col-xs-4 br_name">
                        <img src="<?php echo HTTP_ROOT;?>/img/profile_img/heart.png">
                        <span>Interest:</span>
                      </div>
                      <div class="col-md-9 col-sm-6 col-xs-8 br_name1">
                        <span><?php echo !empty($user_view['UserMaster']['interest'])?$user_view['UserMaster']['interest']:"N/A";?></span>
                      </div>
                    </div>
                     <?php if(($user_view['UserMaster']['user_type_id'])=='1'){?>
                   
                    <!-- *****************Interest************** -->
                    <!-- *****************section 2************* -->
                    <div class="col-md-12 col-sm-12 col-xs-12 bgsec">
                      <div class="col-md-3 col-sm-3 col-xs-6 photos1" id="photo">Individual/Organization profile</div>
                      <div class="col-md-9 col-sm-9 col-xs-6 photos1" id="vid">
                       
                      </div>
                      <div class="col-md-9 col-sm-9 col-xs-6 photos1" style="display:none;" id="vid">
                       
                      </div>
                    </div>
                    <!-- *****************section 2************* -->
                    <!-- *****************Institution************** -->
                    <div class="col-md-12 col-sm-12 col-xs-12 detail">
                      <div class="col-md-3 col-sm-6 col-xs-4 br_name">
                        <img src="<?php echo HTTP_ROOT;?>/img/profile_img/building.png">
                        <span>Institution:</span>
                      </div>
                      <div class="col-md-9 col-sm-6 col-xs-8 br_name1">
                        <span><?php echo !empty($user_view['UserMaster']['institute_name'])?$user_view['UserMaster']['institute_name']:"N/A";?></span>
                      </div>
                    </div>
                    <!-- *****************Institution************** -->
                    <!-- *****************Registration Id************** -->
                    <div class="col-md-12 col-sm-12 col-xs-12 detail">
                      <div class="col-md-3 col-sm-6 col-xs-4 br_name">
                        <img src="<?php echo HTTP_ROOT;?>/img/profile_img/are.png">
                        <span>Registration Id:</span>
                      </div>
                      <div class="col-md-9 col-sm-6 col-xs-8 br_name1">
                        <span><?php echo !empty($user_view['UserMaster']['official_reg_id'])?$user_view['UserMaster']['official_reg_id']:"N/A";?></span>
                      </div>
                    </div>
                    <!-- *****************Registration Id************** -->
                    <!-- *****************Experience Area************** -->
                    <div class="col-md-12 col-sm-12 col-xs-12 detail">
                      <div class="col-md-3 col-sm-6 col-xs-4 br_name b_pad">
                        <i class="fa fa-mobile" aria-hidden="true"></i>
                        <span>Expertise Area:</span>
                      </div>
                      <div class="col-md-9 col-sm-6 col-xs-8 br_name1">
                        <span><?php echo !empty($user_view['UserMaster']['area_of_expertise'])?$user_view['UserMaster']['area_of_expertise']:"N/A";?></span>
                      </div>
                    </div>
                    <!-- *****************Experience Area************** -->
                    <!-- *****************Address************** -->
                    <div class="col-md-12 col-sm-12 col-xs-12 detail">
                      <div class="col-md-3 col-sm-6 col-xs-4 br_name b_pad">
                        <img src="<?php echo HTTP_ROOT;?>/img/profile_img/map_loc.png">
                        <span>Address:</span>
                      </div>
                      <div class="col-md-9 col-sm-6 col-xs-8 br_name1">
                        <span><?php echo !empty($user_view['UserMaster']['address'])?$user_view['UserMaster']['address']:"N/A";?></span>
                      </div>
                    </div>
                    <!-- *****************Address************** -->
                    <!-- *****************Description************** -->
                    <div class="col-md-12 col-sm-12 col-xs-12 detail">
                      <div class="col-md-3 col-sm-6 col-xs-4 br_name b_pad">
                        <img src="<?php echo HTTP_ROOT;?>/img/profile_img/eye.png">
                        <span>Description:</span>
                      </div>
                      <div class="col-md-5 col-sm-6 col-xs-8 br_name1" style="text-align:justify;">
                        <span><?php echo !empty($user_view['UserMaster']['description'])?$user_view['UserMaster']['description']:"N/A";?></span>
                      </div>
                    </div>
                    <!-- *****************Description************** -->
                    <!-- *****************section 3************* -->
                    <div class="col-md-12 col-sm-12 col-xs-12 bgsec">
                      <div class="col-md-3 col-sm-3 col-xs-6 photos1" id="photo">Additional information</div>
                      <div class="col-md-9 col-sm-8 col-xs-6 photos1" id="vid">
                        
                      </div>
                      <div class="col-md-9 col-sm-8 col-xs-6 photos1" style="display:none;" id="vid">
                        
                      </div>
                    </div>
                    <!-- *****************section 3************* -->
                    <!-- *****************Teaching Experience************** -->
                    <div class="col-md-12 col-sm-12 col-xs-12 detail">
                      <div class="col-md-3 col-sm-6 col-xs-4 br_name b_pad">
                        <img src="<?php echo HTTP_ROOT;?>/img/profile_img/experience.png">
                        <span>Teaching Experience:</span>
                      </div>
                      <div class="col-md-9 col-sm-6 col-xs-8 br_name1">
                        <span><?php echo !empty($user_view['UserMaster']['coaching_experience'])?$user_view['UserMaster']['coaching_experience']." Year":"N/A";?></span>
                      </div>
                    </div>
                    <!-- *****************Teaching Experience************** -->
                    <!-- *****************Gender************** -->
                    <div class="col-md-12 col-sm-12 col-xs-12 detail">
                      <div class="col-md-3 col-sm-6 col-xs-4 br_name b_pad">
                        <img src="<?php echo HTTP_ROOT;?>/img/profile_img/gender.png">
                        <span>Gender:</span>
                      </div>
                      <div class="col-md-9 col-sm-6 col-xs-8 br_name1">
                        <span><?php if(($user_view['UserMaster']['gender'])=='1'){
                          echo "Male";
                      }?>
                       <?php if(($user_view['UserMaster']['gender'])=='2'){
                          echo "Female";
                        }if(empty($user_view['UserMaster']['gender'])){
                          echo "N/A";
                        }?></span>
                      </div>
                    </div>
                    <?php }else{?>
                      <!-- *****************Interest************** -->
                    <!-- *****************section 2************* -->
                    <div class="col-md-12 col-sm-12 col-xs-12 bgsec">
                      <div class="col-md-3 col-sm-3 col-xs-6 photos1" id="photo">Individual/Organization profile</div>
                      <div class="col-md-8 col-sm-8 col-xs-6 photos1" id="vid">
                        
                      </div>
                      <div class="col-md-8 col-sm-8 col-xs-6 photos1" style="display:none;" id="vid">
                        
                      </div>
                    </div>
                    <!-- *****************section 2************* -->
                   
                    <!-- *****************Gender************** -->
                    <div class="col-md-12 col-sm-12 col-xs-12 detail">
                      <div class="col-md-3 col-sm-6 col-xs-4 br_name b_pad">
                        <img src="<?php echo HTTP_ROOT;?>/img/profile_img/gender.png">
                        <span>Gender:</span>
                      </div>
                      <div class="col-md-9 col-sm-6 col-xs-8 br_name1">
                        <span><?php if(($user_view['UserMaster']['gender'])=='1'){
                          echo "Male";
                      }?>
                       <?php if(($user_view['UserMaster']['gender'])=='2'){
                          echo "Female";
                        }if(empty($user_view['UserMaster']['gender'])){
                          echo "N/A";
                        }?></span>
                      </div>
                    </div>
                    <?php }?>
                    <!-- *****************Gender************** -->
                   
                     <!-- *****************Achievements************** -->
                </div>
                <!-- ******************hide 1.1************** -->
                <div class="col-md-12 col-sm-12 col-xs-12 padd_l_r myprflbrd" style="display:none;" id="photo1">
                    <div class="col-md-12 col-sm-12 col-xs-12 vid padd_l_r">
                      <div class="col-md-2 col-sm-3 col-xs-6 photos" id="photo4">My Profile</div>
                      <div class="col-md-10 col-sm-9 col-xs-6 photos" id="vid">
                        <i class="fa fa-eye pull-right" aria-hidden="true" id="view"></i>
                      </div>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12 bgsec">
                      <div class="col-md-3 col-sm-3 col-xs-6 photos1" id="photo">Basic Information</div>
                      <div class="col-md-9 col-sm-8 col-xs-6 photos1" id="vid">
                        
                      </div>
                      <div class="col-md-8 col-sm-8 col-xs-6 photos1" style="display:none;" id="vid">
                        
                      </div>
                    </div>
                    <?php echo $this->Form->create('UserMaster');?>
                    
                    <?php if(($user_view['UserMaster']['user_type_id'])=='1'){?>
                      
                    <!-- *****************Interest************** -->
                    <!-- *****************section 2************* -->
                    <?php echo $this->Form->create('UserMaster')?>
                   
                    <!-- *****************section 2************* -->
                    <!-- *****************Institution************** -->
                    
                    <!-- *****************Description************** -->
                    <!-- *****************section 3************* -->
                    
                </div>
                    <?php }else{?>
                    
                    <!-- *****************section 2************* -->
                    <!-- *****************Institution************** -->
                   
                    
                    <?php }?>
                    <!-- *****************Achievements************** -->
                </div> 
                <!-- ******************hide 1.1************** -->
                <div class="col-md-12 col-sm-12 col-xs-12 padd_l_r" id="my-classs" style="display:none;"> 
                  <div class="col-md-12 col-sm-12 col-xs-12 vid padd_l_r">
                    <div id="xxxx">
                      <div id="cls" class="col-sm-12 col-xs-12 photos book-box-btn" style="text-align: left; margin-bottom:-11.5px; margin-top:-8px;">
                        <div class="col-md-offset-3 col-md-6 col-sm-offset-1 col-sm-10">
                          <center>
                            <div class="btn-group btn-group-justified">
                              <a href="#" class="btn btn-default seg upcomming-class book-class sr-box-btn" id="#">My Booked Classes</a>
                              <a href="#" class="btn btn-default seg post-class past-to-class sr-box-btn" id="#">Past Classes</a>
                            </div>
                          </center>
                        </div>
                      </div>
                  </div> 
                <div class="col-md-12 col-sm-12 col-xs-12 padd_l_r lernr-class" style="margin-top: 3px;">
                  <div class="upcomming-divv upcomming-divv1 panel-group col-xs-12 sr_pv_padding_lr padd_l_r" id="accordion1" style="">                            
                    <div class="panel-heading col-xs-12 sr_class_acc01">
                      <div class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion1" href="#collapsethree"  style="padding: 0px;">
                          <span class="sr_class_acc01 sr_class_acc_text1" style="box-sizing:none;float:left;">My Booked Classes</span>
                          <span class="sr_class_acc_icon"><i class="fa fa-plus" aria-hidden="true" style="float:right">&nbsp;</i></span>
                        </a>
                      </div>
                    </div>

                    <div id="collapsethree" class="panel-collapse collapse in col-xs-12 sr_pv_padding_lr myprflbrd">
                      <div class="panel-body jstify col-xs-12 sr_pv_padding_lr">
                        <div class="col-xs-12 col-sm-12 sr_2605_03_padding sr_pv_padding_lr" id="#">
                            <?php if(!empty($upcoming_class)){
                              foreach ($upcoming_class as $result) {

                              ?>           
                              <div class="col-sm-12 col-xs-12 sr_260501 sr_pv_padding_lr" style="padding-bottom: 15px; border-bottom: 2px solid #00477b; background:#fff;"> 
                                    <!-- ********images************ -->
                                    <div class="col-md-5 col-sm-12 col-xs-12 padd_l_r1 img-responsive"  style="margin-top: 15px;">
                                      <div class="col-xs-12 col-sm-12 col-md-offset-1 col-md-10">
                                        <!-- <a href="<?php echo HTTP_ROOT;?>/Homes/classDetail/<?php echo $result['VendorClasse']['id'];?>" >
                                          <img src="<?php echo HTTP_ROOT;?>/img/Vendor/class_image/<?php 
                                          echo $result['VendorClasse']['upload_class_photo'];?>" class="img_res img-responsive" style="width:484px;height:253px;border:2px solid black;">
                                        </a>   -->
                                       <?php 
                                          echo "<span class='flexible-fixed'>";
                                          echo ($result['VendorClasse']['class_timing_id'] == 2)?'Fixed':'Flexible';
                                          echo "</span>";
                                        ?>
                                        <?php //if($result['status']){?>
                                        <!-- <div class="image_price12 pull-right">
                                          <span class="ccc" style="color:white">
                                            $&nbsp;<?php echo $result['VendorClasse']['price_per_head'];?></span>
                                        </div> -->
                                        <?php if(!empty($result['VendorClasse']['upload_class_photo'])){?>
                                          <img src="<?php echo HTTP_ROOT;?>/img/Vendor/class_image/<?php 
                                                echo $result['VendorClasse']['upload_class_photo'];?>" class="img_res img-responsive upcoming_class" id="<?php echo $result['VendorClasse']['id'];?>" style="width:484px;height:253px;border:2px solid black;cursor:pointer">
                                        <?php } else{?>
                                            <img src="<?php echo HTTP_ROOT;?>/img/Vendor/class_image/defult_pic.png" class="img_res img-responsive upcoming_class" id="<?php echo $result['VendorClasse']['id'];?>" style="width:484px;height:253px;border:2px solid black;cursor:pointer">
                                        <?php } ?>
                                              
                                        <div class="image_price12 pull-right">
                                          <span class="ccc" style="color:white">
                                            &#8377;<?php echo $result['VendorClasse']['price_per_head'];?></span>
                                        </div>
                                      </div>  
                                    </div>
                                    <!-- ********images************ -->
                                    <!-- ********text************ -->
                                    
                                    <div class="col-md-6 col-sm-12 col-xs-12 text_res sr_2605_03_padding status-div">
                                       <div class="col-xs-12 col-sm-12 sr_2605_06 sr_2605_06_textLorem021 sr_pv_padding_lr txt_cntnt">
                                          <div class="hathyga up-com-post col-xs-12 col-sm-12 sr_2605_03_padding upcoming-class-title">
                                            <?php echo $result['VendorClasse']['class_topic'];?></div>
                                          <div class="col-xs-12 col-sm-12 col-md-12 sr_2605_03_padding sr_serch_div_l_hite sr_class_acc_div padd_l_r">
                                            <div class="row">
                                              <div class="col-md-2 col-sm-2 col-xs-2 upcom-img-class">
                                              <img class="img-responsive" style="display: inline; margin-right: 5px;" src="<?php echo HTTP_ROOT;?>/img/fun&refreshment/location.png">
                                              </div>
                                              <div class="col-md-10 col-sm-10 col-xs-10   sr_class_acc_text02 upclass-location"><?php echo $result['VendorClasse']['location']?></div>
                                            </div>
                                          </div>
                                          <div class="col-xs-12 col-sm-12 sr_2605_03_padding sr_serch_div_l_hite sr_class_acc_div padd_l_r" style="margin-bottom:7px;">
                                            <div class="row">
                                              <div class="col-md-2 col-sm-2 col-xs-2 upcom-img-class">
                                                <img class="img-responsive" style="display: inline; margin-right: 5px;" src="<?php echo HTTP_ROOT;?>/img/fun&refreshment/user.png">
                                              </div>
                                              <div class="col-md-10 col-sm-10 col-xs-10 sr_class_acc_text02 upclass-location">
                                              <strong> By :</strong> <?php echo ucfirst($result['VendorClasse']['class_by']);?>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="col-xs-12 col-sm-12 sr_2605_03_padding sr_serch_div_l_hite sr_class_acc_div padd_l_r" style="margin-bottom:7px;">
                                            <div class="row">
                                              <div class="col-md-2 col-sm-2 col-xs-2 upcom-img-class">
                                                <img class="img-responsive" style="display: inline; margin-right: 5px;" src="<?php echo HTTP_ROOT;?>/img/fun&refreshment/session.png">
                                              </div>
                                              <div class="col-md-10 col-sm-10 col-xs-10 sr_class_acc_text02 upclass-location">
                                              <strong><?php echo ucfirst($result['VendorClasse']['no_of_session']);?></strong>&nbsp;Session
                                              </div>
                                            </div>
                                          </div>
                                          <div class="col-xs-12 col-sm-12 col-md-12 sr_serch_div_l_hite sr_class_acc_div padd_l_r">
                                            <div class="row">
                                              <div class="col-md-2 col-sm-2 col-xs-2 upcom-img-class">
                                              <img class="img-responsive" style="display: inline; margin-right: 5px;" src="<?php echo HTTP_ROOT;?>/img/fun&refreshment/calander.png"></div>
                                              <div class="col-md-10 col-sm-10 col-xs-10 upclass-location">
                                                 <?php if($result['VendorClasse']['class_timing_id'] == 1){?>
                                                  <div class="col-md-8 col-sm-8 col-xs-8 sr_class_acc_text02 past-timming-div-first" >
                                                    <?php echo $result['VendorClasse']['class_duration'];?></div>&nbsp;
                                                  <?php }else{?>
                                                <div class="row">
                                                  <div class="col-md-4 col-sm-4 col-xs-4 sr_class_acc_text02 past-timming-div-first" >
                                                  <?php echo $result['VendorClasse']['starting_month'];?></div>&nbsp;
                                                  <div class="col-md-7 col-sm-7 col-xs-6 past-timmg-div-second">
                                                    <div class="col-md-2 col-sm-2 col-xs-2 upcom-img-class">
                                                      <img class="img-responsive" style="display: inline; margin-right: 5px;" src="<?php echo HTTP_ROOT;?>/img/fun&refreshment/clock.png">
                                                    </div>
                                                    <div class="col-md-10 col-sm-10 col-xs-10 sr_class_acc_text02 upclass-location"><?php echo $result['VendorClasse']['time_of_day'];?></div>
                                                  </div>
                                                </div>
                                                <?php }?>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="col-xs-12 col-sm-12 col-md-12 sr_2605_06_textLorem sr_serch_div_l_hite sr_class_acc_div padd_l_r">
                                            <div class="row">
                                              <div class="col-md-2 col-sm-2 col-xs-2 upcom-img-class">
                                                <img class="img-responsive" style="display: inline; margin-right: 5px;" src="<?php echo HTTP_ROOT;?>/img/fun&refreshment/information.png">
                                              </div>
                                              <div class="col-md-10 col-sm-10 col-xs-10   sr_class_acc_text02 upclass-location up-com-post-text">
                                              <?php echo substr($result['VendorClasse']['class_summary'], 0, 100),".......";?>
                                              </div>
                                            </div>
                                          </div>
                                         <!--  <div class="col-xs-12 col-sm-12 padd_l_r"><img src="<?php echo HTTP_ROOT;?>/img/8.jpg" class="star all-star-img"></div>
                                          <div class="col-xs-12 col-sm-12" style="text-align: right;padding-right:0px;"><button class="booking">Edit/Repost</button></div> -->
                                        </div>
                                    </div>        
                                    <!-- ********text************ -->
                              </div> 
                            <?php } }else{ ?>
                                <p class="empty-review"> There are no upcomming classes exists</p>
                            <?php }?>
                        </div><!-- tab 1 / -->
                      </div>
                    </div> 
                  </div>
                    <div class="past-tab">
                      <div class="col-xs-12 col-sm-12" style="margin-bottom: 5px; margin-top: 5px; border: 2px solid #00CDC6;"></div>
                      <div class="panel-heading col-xs-12 sr_class_acc01">
                          <div class="panel-title">
                            <span class="sr_class_acc01 sr_class_acc_text1" style="box-sizing:none;float:left;">Past Classes</span>
                          </div>
                      </div>
                      <div id="collapsefour" class="col-xs-12 sr_pv_padding_lr myprflbrd">
                          <div class="panel-body jstify col-xs-12 sr_pv_padding_lr">
                            <div class="col-xs-12 col-sm-12 sr_2605_03_padding sr_pv_padding_lr" id="#">
                              <?php if(!empty($past_class)){
                                foreach ($past_class as $result) {

                                ?>           
                               
                               <div class="col-md-6 col-sm-12 col-xs-12 text_res sr_2605_03_padding status-div">
                                         <div class="col-xs-12 col-sm-12 sr_2605_06 sr_2605_06_textLorem021 sr_pv_padding_lr txt_cntnt">
                                            <div class="hathyga up-com-post col-xs-12 col-sm-12 sr_2605_03_padding">
                                              <?php echo $result['VendorClasse']['class_topic'];?></div>
                                            <div class="col-xs-12 col-sm-12 col-md-12 sr_2605_03_padding sr_serch_div_l_hite sr_class_acc_div padd_l_r">
                                              <div class="row">
                                                <div class="col-md-2 col-sm-2 col-xs-2 upcom-img-class">
                                                  <img class="img-responsive" style="display: inline; margin-right: 5px;" src="<?php echo HTTP_ROOT;?>/img/fun&refreshment/location.png">
                                                </div>
                                                <div class="col-md-10 col-sm-10 col-xs-10   sr_class_acc_text02 upclass-location"><?php echo $result['VendorClasse']['location']?></div>
                                              </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 sr_2605_03_padding sr_serch_div_l_hite sr_class_acc_div padd_l_r" style="margin-bottom:7px;">
                                            <div class="row">
                                              <div class="col-md-2 col-sm-2 col-xs-2 upcom-img-class">
                                                <img class="img-responsive" style="display: inline; margin-right: 5px;" src="<?php echo HTTP_ROOT;?>/img/fun&refreshment/user.png">
                                              </div>
                                              <div class="col-md-10 col-sm-10 col-xs-10 sr_class_acc_text02 upclass-location">
                                              <strong> By :</strong> <?php echo ucfirst($result['VendorClasse']['class_by']);?>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="col-xs-12 col-sm-12 sr_2605_03_padding sr_serch_div_l_hite sr_class_acc_div padd_l_r" style="margin-bottom:7px;">
                                            <div class="row">
                                              <div class="col-md-2 col-sm-2 col-xs-2 upcom-img-class">
                                                <img class="img-responsive" style="display: inline; margin-right: 5px;" src="<?php echo HTTP_ROOT;?>/img/fun&refreshment/session.png">
                                              </div>
                                              <div class="col-md-10 col-sm-10 col-xs-10 sr_class_acc_text02 upclass-location">
                                              <strong><?php echo ucfirst($result['VendorClasse']['no_of_session']);?></strong>&nbsp;Session
                                              </div>
                                            </div>
                                          </div>
                                            <div class="col-xs-12 col-sm-12 col-md-12 sr_serch_div_l_hite sr_class_acc_div padd_l_r">
                                              <div class="row">
                                                <div class="col-md-2 col-sm-2 col-xs-2 upcom-img-class">
                                                <img class="img-responsive" style="display: inline; margin-right: 5px;" src="<?php echo HTTP_ROOT;?>/img/fun&refreshment/calander.png"></div>
                                                <div class="col-md-10 col-sm-10 col-xs-10 upclass-location">
                                                  <?php if($result['VendorClasse']['class_timing_id'] == 1){?>
                                                  <div class="col-md-8 col-sm-8 col-xs-8 sr_class_acc_text02 past-timming-div-first" >
                                                    <?php echo $result['VendorClasse']['class_duration'];?></div>&nbsp;
                                                  <?php }else{?>
                                                  <div class="row">
                                                    <div class="col-md-4 col-sm-4 col-xs-4 sr_class_acc_text02 past-timming-div-first" >
                                                    <?php echo $result['VendorClasse']['starting_month'];?></div>&nbsp;
                                                    <div class="col-md-7 col-sm-7 col-xs-6 past-timmg-div-second">
                                                      <div class="col-md-2 col-sm-2 col-xs-2 upcom-img-class">
                                                        <img class="img-responsive" style="display: inline; margin-right: 5px;" src="<?php echo HTTP_ROOT;?>/img/fun&refreshment/clock.png">
                                                      </div>
                                                      <div class="col-md-10 col-sm-10 col-xs-10 sr_class_acc_text02 upclass-location"><?php echo $result['VendorClasse']['time_of_day'];?></div>
                                                    </div>
                                                  </div>
                                                  <?php }?>
                                                </div>
                                              </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-12 sr_2605_06_textLorem sr_serch_div_l_hite sr_class_acc_div padd_l_r">
                                              <div class="row">
                                                <div class="col-md-2 col-sm-2 col-xs-2 upcom-img-class">
                                                  <img class="img-responsive" style="display: inline; margin-top: -12px; margin-right: 5px;" src="<?php echo HTTP_ROOT;?>/img/fun&refreshment/information.png">
                                                </div>
                                                <div class="col-md-10 col-sm-10 col-xs-10 sr_class_acc_text02 upclass-location up-com-post-text">
                                                <?php echo substr($result['VendorClasse']['class_summary'], 0, 100),".......";?>
                                                </div>
                                              </div>
                                            </div>
                                           
                                          </div>
                                      </div>  

                              <?php } }else{ ?>
                                  <p class="empty-review"> There are no past classes exists</p>
                              <?php }?>                                    
                            </div><!-- tab 1 / -->
                          </div>
                        </div>
                      </div>
                  </div>
                </div>
            </div>   
          </div>
          </div>
      </div>
    </div> 
                  
  </div> 
<?php }?>

 <script>
function ClickUpload() {
$("#FileUpload").trigger('click');
}
function ClickUpload1() {
$("#FileUpload1").trigger('click');
}
$(document).ready(function(){
  $('.upcoming_class').click(function(){
    var id=$(this).attr('id');
    window.location.href="<?php echo HTTP_ROOT;?>/Homes/classDetail/"+btoa(id);
  });
  $('.past_class').click(function(){
    var id=$(this).attr('id');
    window.location.href="<?php echo HTTP_ROOT;?>/Homes/classDetail/"+btoa(id);
  });
  

    $('.uploadbox').change(function() {
           user_id=$('.customer').val();
           $('.loader').show();
           var front=1;
          //alert(user_id);
          //e.preventDefault();
          var formData = $(this).serializeArray();
          var WEBURL ="<?php echo Router::url( '/', true )?>Homes/imageUpload/"+btoa(user_id)+"/"+front;
          //alert(formData);
          $.ajax({ 
            type: 'POST',
            url: WEBURL,
            data: new FormData($('#pro_pic')[0]),
            processData: false,
            contentType: false,  
            success: function(res){ 
            var e=jQuery.parseJSON(res);
            $('.loader').hide();
            console.log(e);
            $('.rth321').attr('src',"<?php echo HTTP_ROOT;?>/"+e.res_img);           
            $('.rth654').attr('src',"<?php echo HTTP_ROOT;?>/"+e.res_img);           
            $('.georgeimg').attr('src',"<?php echo HTTP_ROOT;?>/"+e.res_img);           
             
            },
          });
    });
});
$(document).ready(function(){

$('.uploadbox1').change(function() {
 user_id=$('.customer').val();
 $('.loader').show();
 var front1=2;
//alert(user_id);
//e.preventDefault();
var formData = $(this).serializeArray();
var WEBURL ="<?php echo Router::url( '/', true )?>Homes/imageUpload/"+btoa(user_id)+"/"+front1;
//alert(formData);
$.ajax({ 
type: 'POST',
url: WEBURL,
data: new FormData($('#pro_pic1')[0]),
processData: false,
contentType: false,  
success: function(res){ 
var e=jQuery.parseJSON(res);
$('.loader').hide();
console.log(e);
imageUrl='<?php echo HTTP_ROOT;?>/'+e.res_img;
//alert(imageUrl);
$('.funmp1').css('background-image', 'url(' + imageUrl + ')');           

 
},
});
});
});
</script>
<script type="text/javascript">
  $(document).ready(function(){
    $('.upcomming-class').click(function(){
      $('.upcomming-divv').show();
      $('.past-tab').hide();
      $('.upcomming-class').css('background-color','#00CDC6');
      $('.upcomming-class').css('color','#fff');
      $('.post-class').css('background','#fff');
      $('.post-class').css('color','#00CDC6');
    });
    $('.post-class').click(function(){
      $('.upcomming-divv').hide();
      $('.past-tab').show();
      $('.post-class').css('background','#00CDC6');
      $('.post-class').css('color','#fff');
      $('.upcomming-class').css('background-color','#fff');
      $('.upcomming-class').css('color','#00CDC6');
    });
    $('#vndr1').click(function(){
      $('.my-clas-seg').hide();
      $('.wish-seg').hide();
      $('.photo-seg').show();
      $('.video-seg').show();
      
    })
    $('#buyer1').click(function(){
      $('.my-clas-seg').show();
      $('.wish-seg').show();
      $('.photo-seg').hide();
      $('.video-seg').hide();
      
    });
    $('.past-tad-class').click(function(){
      $('.btn-box-div').css('margin-bottom','-5.5px');
    });
    $('.upclass-tab').click(function(){
      $('.btn-box-div').css('margin-bottom','0px');
    });
    $('.past-to-class').click(function(){
       $('.book-box-btn').css('margin-bottom','-16px');
    });
    $('.book-class').click(function(){
      $('.book-box-btn').css('margin-bottom','0px');
    });
   
    $('.profile-segg').click(function(){
      $('.profile-segg').css('background-color','#00CDC6');
      $('.profile-segg').css('color','#fff');
      $('.my-clas-seg').css('background-color','#fff');
      $('.my-clas-seg').css('color','#00CDC6');
      $('.wish-seg').css('background-color','#fff');
      $('.wish-seg').css('color','#00CDC6');
      $('.past-tab').hide();
      $('.sr_class1').hide();
      $('#my-classs').fadeOut();
    });
    $('.my-clas-seg').click(function(){
      $('.profile-segg').css('background-color','#fff');
      $('.profile-segg').css('color','#00CDC6');
      $('.my-clas-seg').css('background-color','#00CDC6');
      $('.my-clas-seg').css('color','#fff');
      $('.wish-seg').css('background-color','#fff');
      $('.wish-seg').css('color','#00CDC6');
      $('#profile1').hide();
      $('#my-classs').show();
      $('#wishlistt').hide();
    });
    $('.wish-seg').click(function(){
      $('.profile-segg').css('background-color','#fff');
      $('.profile-segg').css('color','#00CDC6');
      $('.my-clas-seg').css('background-color','#fff');
      $('.my-clas-seg').css('color','#00CDC6');
      $('.wish-seg').css('background-color','#00CDC6');
      $('.wish-seg').css('color','#fff');
      $('#wishlistt').show();
      $('#my-classs').fadeOut();
      $('#profile1').hide();
     
    });
    $('#upload-btn').click(function(){
      $('#myModal').modal();
    });
    $('#upload-btn1').click(function(){
      $('#myModal1').modal();
    });
    jQuery("#photos").on('change ',function(){
      var fileExtension = ['jpeg', 'jpg', 'png', 'gif', 'bmp'];
      if(jQuery.inArray(jQuery(this).val().split('.').pop().toLowerCase(), fileExtension) == -1){
        jQuery("#msg1").html("Invalid image please upload only bmp,jpg,jpeg,gif,png.");
        return false;
      }else{
        jQuery("#msg1").html("");
        return true;
      }
    });
    jQuery("#videos").on('change ',function(){
      var fileExtension = ['3gp','mp4'];
      if(jQuery.inArray(jQuery(this).val().split('.').pop().toLowerCase(), fileExtension) == -1){
        jQuery("#msg2").html("Invalid video format please upload only 3gp,mp4.");
        return false;
      }else{
        jQuery("#msg2").html("");
        return true;
      }
    });
  });
</script> 

<script type="text/javascript">
$(document).ready(function() {

$('#interest').multiselect({
      nonSelectedText: 'Select Interest Areas',
      
    });


}); 
</script>
<script type="text/javascript">
var last_valid_selection = null;
      $('#interest').change(function(event) {
        if ($(this).val().length > 2) {
            $("input[type=checkbox]:not(:checked)").attr("disabled", "disabled")
          alert('you can choose atmost 3');
          $(this).val(last_valid_selection);
        } else {

            $("input[type=checkbox]:not(:checked)").attr("disabled", false)
          last_valid_selection = $(this).val();
        }
      });
</script>

 <script type="text/javascript">
 function city(){
        var valdataget = document.getElementById('city_id');
        var message = document.getElementById('f6');
        if(valdataget.value==''){
          message.innerHTML = "Please select city";
        }else{
           message.innerHTML = "&nbsp;";
          }
   }

    $(window).load(function() {
      $("#grid-contant-slider1").flexisel();
      $("#grid-contant-slider2").flexisel();
      $("#grid-contant-slider3").flexisel({
        visibleItems: 4,
        enableResponsiveBreakpoints: true,
        responsiveBreakpoints: { 
            portrait: { 
                changePoint:480,
                visibleItems: 1
            }, 
            landscape: { 
                changePoint:640,
                visibleItems: 3
            },
            tablet: { 
                changePoint:768,
                visibleItems: 2
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
    jQuery(function($) {
       $('.chosen-select').chosen();
       $('.chosen-select-deselect').chosen({ allow_single_deselect: true });
     })(jQuery);
   </script>
<!--End 1st slide script-->

        <script src="main.js"></script>
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
        </script>
         <!-- JQuery search box -->
      <script type="text/javascript">
        $(document).ready(function() {
            $("#profile1").show();
        });

        /* sitaram 30.05.2016*/
              /* section 2nd photo & video code */
              $(".sr_photo01").css('background','#00CDC6');
              $(".sr_photo01").css('color','#fff !important');

              $(".sr_photo01").click(function(){
                    $(".sr_video01").css('background','#fff');
                    $(".sr_video01").css('color','#00CDC6');
                    $(".sr_photo01").css('background','#00CDC6');
                    $(".sr_photo01").css('color','#fff');
                    $(".video-butn:hover ").css('color','#00CDC6');
                    // alert("hii");
                    $("#sr_photo").fadeIn();
                    $("#sr_video").hide();
              });

              $(".sr_video01").click(function(){
                    $(".sr_video01").css('background','#00CDC6');
                    $(".sr_photo01").css('background','#fff');
                    $(".sr_photo01").css('color','#00CDC6');
                    $(".sr_video01").css('color','#fff');
                    $("#sr_class1").hide();
                    $(".video-butn:hover ").css('color','#fff !important');
                    $("#sr_video").fadeIn();
                    $("#sr_photo").hide();
               });
              /* section 2nd photo & video code / */

              /* section 3rd classes code */
              $('#sr_class').click(function(){
                    $('#xxxx').show();
                    $('#accordion').show();
              
                    $("#sr_class1").fadeIn();
                    $("#profile1").hide();
                    $("#video1").hide();
                    $('#my-classs').hide();

                    $("#sr_class").css('background','#00CDC6');
                    $("#sr_class").css('color','#fff');

                    $("#video").css('background','#fff');
                    $("#video").css('color','#00CDC6');

                    $("#profile").css('color','#00CDC6');
                    $("#profile").css('background-color','#fff');
                    $('.class-vid').show();
                    $('.review-seg').css('background-color','#fff');
                    $('.review-seg').css('color','#00CDC6');
                    $('#review1').fadeOut();
                    $('#my-classs').fadeIn();
              });
              /* section 3rd classes code / */

        /* sitaram 30.05.2016 /*/


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
          // **********div hide***********// 
          $("#pls").click(function(){
              $("#dis").fadeIn();
              $("#min").show();
              $("#pls").hide();
              $("#dis1").fadeOut();
              $("#min1").hide();
              $("#pls1").show();
          });

          $("#min").click(function(){
              $("#dis").fadeOut();
              $("#pls").show();
              $("#min").hide();
          });
          // ***********2nd*************
           $("#pls1").click(function(){
              $("#dis1").fadeIn();
              $("#min1").show();
              $("#pls1").hide();
              $("#dis").fadeOut();
              $("#min").hide();
              $("#pls").show();
          });

          $("#min1").click(function(){
              $("#dis1").fadeOut();
              $("#pls1").show();
              $("#min1").hide();
          });
           $("#profile").click(function(){
              $('#xxxx').hide();
              $('#accordion').hide();
              $("#profile1").fadeIn();
              $("#profile").css('background','#00CDC6');
              $("#profile").css('color','#FFF');
              $("#video").css('background','#FFF');
              $("#profile").removeClass('seg786');
              $("#video").css('color','#00CDC6');
              $("#video1").fadeOut();
              $("#sr_class").css('background','#fff');
              $("#sr_class").css('color','#00CDC6');
              $('.review-seg').css('background-color','#fff');
              $('.review-seg').css('color','#00CDC6');
              $('#review1').fadeOut();
              $('#sr_class1').hide();
          });
           $("#video").click(function(){
              $('#xxxx').hide();
              $('#accordion').hide();
              $("#video1").show();
              $("#video").css('background','#00CDC6');
              $("#video").css('color','#FFF');
              $("#profile1").fadeOut();
              $("#profile").css('background','#FFF');
              $("#profile").css('color','#00CDC6');
              $("#profile").removeClass('seg786');
              $("#sr_class").css('background','#fff');
              $("#sr_class").css('color','#00CDC6');
              $('.class-vid').hide();
              $('.review-seg').css('background-color','#fff');
              $('.review-seg').css('color','#00CDC6');
              $('#review1').fadeOut();
          });
           
            $("#review").click(function(){
              $('.review-seg').css('background-color','#00CDC6');
              $('.review-seg').css('color','#fff');
              $('.video-seg').css('background-color','#fff');
              $('.video-seg').css('color','#00CDC6');
              $('.photo-seg').css('background-color','#fff');
              $('.photo-seg').css('color','#00CDC6');
              $('.profile-segg').css('background-color','#fff');
              $('.profile-segg').css('color','#00CDC6');
              $('#profile1').fadeOut();
              $('#video1').fadeOut();
              $('#sr_class1').fadeOut();
              $('#review1').fadeIn();
            });
            $("#open").click(function(){
              $("#close").fadeIn();
              $("#open12").removeClass('hidden-xs');
              $("#open12").fadeIn();
              $("#open").fadeOut();
          });
            $("#close").click(function(){
              $("#open").fadeIn();
              $("#open12").fadeOut();
              $("#open12").removeClass('hidden-xs');
              $("#close").fadeOut();
          });
         
           $("#view").click(function(){              
            $("#photo1").show();
            $("#photo2").show();
            $("#photo3").show();

                $("#photo1").hide();              
              //  $("#vndr").hide();
              //  $("#work").hide();
              //  $("#work1").show();
              // $("#buyer1").css('background','#008079');
              // $("#vndr1").css('background','#00B9AF');
          });




          // *******vendor lside
          // ***********2nd*************
          // **********div hide***********//
      </script>       
      <script>
    function initialize() {
  var mapProp = {
    center:new google.maps.LatLng(51.508742,-0.120850),
    zoom:5,
    mapTypeId:google.maps.MapTypeId.ROADMAP
  };
  var map=new google.maps.Map(document.getElementById("googleMap"), mapProp);
}
google.maps.event.addDomListener(window, 'load', initialize);
</script>
<script>

  $("#file-upload_4_2").on('change',function(){
        var a = $(this).val();
      
        $('#upload_photo_4_2').val(a);
    });

    $("#img_click_4_2").on('click',function(){
      //alert("hgfhgfhg");
        $('#file-upload_4_2').click();
    });
</script>
<script type="text/javascript">
    function chk_frm(){
        var img = $('#photos').val(); 
        // var filExtension = ['mp4','wmv','avi'];  
        // alert(filExtension);    
        if(img == ""){
            $('#msg1').html('Please browse the image.');  
            return false;
        }else{
            return true;
        }
    }

    function chk_vid(){
      var video = $('#videos').val();
      if( video == ""){
          $('#msg2').html('Please browse the video.');  
          return false;
        }else{
            return true;
        }
    }
   //$('.gallery-controls').hide();

</script>