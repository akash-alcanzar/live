<style>
  
   a:hover{
     text-decoration: none;
   } 

</style>
<?php 
  //echo "<pre>";print_r($galleryimage);
if($user_view['UserMaster']['user_type_id']=='1'){?>
  <?php if(!empty($user_view['UserMaster']['background_image'])){?>
<style>
.funmp1 {
    width: 100%;
  
    background-image: url("<?php echo HTTP_ROOT;?>/img/Vendor/profile/<?php echo $user_view['UserMaster']['background_image'];?>");

    background-repeat: no-repeat;
    background-size: 100% 100%;
    padding-bottom:10px;
}



</style>
<?php }
else{?>
<style>
.funmp1 {
    width: 100%;
  
    background-image: url("<?php echo HTTP_ROOT;?>/img/counter-bg.jpg");

    background-repeat: no-repeat;
    background-size: 100% 100%;
    padding-bottom:10px;
}
</style>

<?php }
} else{?>
<?php if(!empty($user_view['UserMaster']['background_image'])){?>
<style>
.funmp1 {
    width: 100%;
  
    background-image: url("<?php echo HTTP_ROOT;?>/img/Buyer/profile/<?php echo $user_view['UserMaster']['background_image'];?>");

    background-repeat: no-repeat;
    background-size: 100% 100%;
    padding-bottom:10px;
}
</style>
<?php }
else{?>
<style>
.funmp1 {
    width: 100%;
  
    background-image: url("<?php echo HTTP_ROOT;?>/img/counter-bg.jpg");

    background-repeat: no-repeat;
    background-size: 100% 100%;
    padding-bottom:10px;
}
</style>

<?php
}
}?>
<style>
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
<div class="col-md-10 col-sm-9 col-xs-12 ruth6542 ruth654786">
    <div class="col-md-12 col-sm-12 col-xs-12 clrdash123 ruth1">
        <div class="col-md-3 col-sm-3 col-xs-4 bar321 bar786">
          <div><i class="fa fa-bars dshclr12" style="display:none;"></i><img src="<?php echo HTTP_ROOT;?>/img/profile_img/user.png" class="user432 dummy_user"><span class="dashbrd12 prf543">Provider Profile</span></div>
        </div>
        <div class="col-md-9 col-sm-9 col-xs-9 bar321 bar876 snr">
            <div class="pull-right setnote">
                <i class="fa fa-cog dshclr1"></i>
                <span class="dashbrd1 grg">Settings</span>
                <i class="fa fa-bell dshclr1" aria-hidden="true"></i>
                <span class="dashbrd1 grg">Notification</span>
                 <?php 
                       $profile_img=$user_view['UserMaster']['profile_image'];
                      
                       $user_type_id=$user_view['UserMaster']['user_type_id'];
                       //echo $user_type_id;
                       //die;
                       if($profile_img!='' and $user_type_id==1)
                       {
                        ?>
                         <img src="<?php echo HTTP_ROOT;?>/img/Vendor/profile/<?php echo $profile_img; ?>" class="georgeimg prflimg"> 
                         <?php
                     }
                     elseif($profile_img!='' and $user_type_id==2)
                     {
                        ?>
                        <img src="<?php echo HTTP_ROOT;?>/img/Buyer/profile/<?php echo $profile_img; ?>" class="georgeimg prflimg"> 
                        <?php
                    }
                    elseif($profile_img!='' and $user_type_id=='')
                     {
                        ?>
                        <img src="<?php echo $profile_img; ?>" class="georgeimg prflimg"> 
                        <?php
                    }
                 ?>
                <span class="dropdown1">
                    <span class="dashbrd1 grg1"><?php echo $user_view['UserMaster']['first_name'];?></span>
                    <i class="fa fa-caret-down grg1 dshclr1" aria-hidden="true" id="nti"></i>
                    <div class="dropdown-content1 logout">
                        <p><a href="<?php echo HTTP_ROOT."/Homes/myProfile";?>" class="logout_a">Profile</a></p>
                        <p><a href="#" class="logout_a">Change Password</a></p>
                        <p><a href="<?php echo HTTP_ROOT;?>/homes/logout" class="logout_a">Logout</a></p>
                    </div>
                </span>
                <br>
                <!--<span class="vendor">Vendor</span>-->
            </div>
        </div>
    </div> 
           <div class="col-md-12 col-sm-12 col-xs-12 funmp1"> 
            <div class="col-md-offset-1 col-md-10 col-sm-12 col-xs-12">
              <div class="row">
                <div class="col-md-8 col-sm-8 col-xs-8 starruth">
                  <div class="elemnt">
                  <?php   
                       $profile_img=$user_view['UserMaster']['profile_image'];
                      
                       $user_type_id=$user_view['UserMaster']['user_type_id'];
                      $user_pic1 = substr($profile_img,0,4);
                         if($user_pic1 == 'http'){ ?>
                           
                       
                          <img src="<?php echo $profile_img; ?>" class="rth321 prflimg" style="width:123px; height:132px;border-radius:50%;border:2px solid white;"> 

                          <?php } 
                               else if($profile_img!='' and $user_type_id==1) {  ?>
                         <img src="<?php echo HTTP_ROOT;?>/img/Vendor/profile/<?php echo $profile_img; ?>" class="rth321 prflimg" style="width:123px; height:132px;border-radius:50%;border:2px solid white;"> 

                        <?php }elseif($profile_img!='' and $user_type_id==2){  ?>

                        <img src="<?php echo HTTP_ROOT;?>/img/Buyer/profile/<?php echo $profile_img; ?>" class="rth321 prflimg" style="width:123px; height:132px;border-radius:50%;border:2px solid white;"> 
                         <?php }elseif($profile_img!='' and $user_type_id==''){ ?>

                        <img src="<?php echo $profile_img; ?>" class="rth321 prflimg" style="width:123px; height:132px;border-radius:50%;border:2px solid white;"> 
                        <?php
                    }
                   

                 ?>

                    <span class="fa-camera-br" onclick="ClickUpload()">
                      
                        <i class="fa fa-camera " aria-hidden="true" type="button" value="Upload" class="camera" ></i>
                        <span class="edit-photo">Edit</span>
                    </span>
                    
                    <form action="#" method="post" name="pro_pic" id="pro_pic" enctype="multipart/form-data">
                      <div id="hideimge">
                      <input type="file" name="FileUpload" id="FileUpload" class="uploadbox"/>
                      <input type="hidden" class="customer" value="<?php echo $user_view['UserMaster']['id'];?>">
                      </div>
                    </form>

                    <span class="rth321 user765 elemnt">
                      <div class="grg321 elemnt"><?php echo $user_view['UserMaster']['first_name']; ?></div>
                      <div class="tnk321 elemnt"><?php echo $user_view['UserMaster']['email']?></div>
                    </span>
                  </div>
                  <div class="najm1 elemnt">
                    <span ><img src="<?php echo HTTP_ROOT;?>/img/profile_img/star.png" class="star321"></span>
                    <span ><img src="<?php echo HTTP_ROOT;?>/img/profile_img/star.png" class="star321"></span>
                    <span ><img src="<?php echo HTTP_ROOT;?>/img/profile_img/star.png" class="star321"></span>
                    <span><img src="<?php echo HTTP_ROOT;?>/img/profile_img/star.png" class="star321"></span>
                    <span ><img src="<?php echo HTTP_ROOT;?>/img/profile_img/star2.png" class="star321"></span>
                  </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-4 mntop">
                    <div class="pull-right">
                        <img id="notification" src="<?php echo HTTP_ROOT;?>/img/profile_img/notification.png" class="note321">
                        <?php if($user_view['UserMaster']['user_type_id']=='1'){ ?>
<a href="<?php echo HTTP_ROOT;?>/Homes/msgInboxVendor">
<?php if(!empty($ven_msg)){ ?>
<span class="numberCircle12" style="font-size:15px;">&nbsp;<?php echo $ven_msg; ?>&nbsp;</span>
<?php } ?>
<i class="fa fa-envelope-o" style="color:white;font-size:35px;"></i>
</a>  
<?php }else{ ?>
<a href="<?php echo HTTP_ROOT;?>/Homes/msgInboxLearner">
<?php if(!empty($ven_msg)){ ?>
<span class="numberCircle12" style="font-size:15px;">&nbsp;<?php echo $ven_msg; ?>&nbsp;</span>
<?php } ?>
<i class="fa fa-envelope-o" style="color:white;font-size:35px;"></i>
</a>    
<?php } ?>
                       
                    </div>
                </div>
              </div>  
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div style='background-color: rgb(0, 205, 198); border-radius: 5px; float: right; padding-left: 15px; width: 85px;'>
                <span onclick="ClickUpload1()">
                  <i class="fa fa-camera edit-bg" aria-hidden="true"></i>
                  <span class="edit-photo">Edit</span>
                </span>  
              </div>
            </div>
            <form action="#" method="post" name="pro_pic1" id="pro_pic1" enctype="multipart/form-data">
                      <div id="hideimge">
                      <input type="file" name="FileUpload" id="FileUpload1" class="uploadbox1"/>
                      </div>
                    </form>
          </div>  
            <div class="col-md-12 col-sm-12 col-xs-12 tab_head padd_l_r">
              <div class="col-md-2 col-sm-3 col-xs-4 seg seg786 profile-segg" id="profile">Profile</div>
              <div class="col-md-2 col-sm-3 col-xs-4 seg photo-seg" id="video">Photos & Videos</div>
              <div class="col-md-2 col-sm-3 col-xs-4 seg my-clas-seg" id="video">My Classes</div>
              <div class="col-md-2 col-sm-3 col-xs-4 seg seg2 video-seg" id="sr_class">Classes</div>
              <div class="col-md-2 col-sm-3 col-xs-4 seg seg2 wish-seg" id="sr_class">Wishlist</div>
            </div>

            <!-- *************hide1*************** -->
            <div class="col-md-12 col-sm-12 col-xs-12 padd_l_r" id="profile1" style="">
                <div class="col-md-12 col-sm-12 col-xs-12 vid" id="photo3">
                  <div class="col-md-3 col-sm-4 col-xs-6 photos" id="">My Profile</div>
                  <div class="col-md-9 col-sm-8 col-xs-6 photos" id="photo"><i class="fa fa-pencil-square-o pull-right" aria-hidden="true"></i></div>
                </div>
                <div style="color:red; font-size:16px; margin-top:52px; margin-bottom:-18px;" id="success_msg">
                  <?php  echo $this->Session->flash(); ?></div>
                <div class="col-md-12 col-sm-12 col-xs-12 padd_l_r myprflbrd" id="photo2">
                    <div class="col-md-12 col-sm-12 col-xs-12 bgsec">
                      <div class="col-md-3 col-sm-3 col-xs-6 photos1" id="photo">Section 1</div>
                      <div class="col-md-9 col-sm-9 col-xs-6 photos1" id="vid">
                      
                      </div>
                      <div class="col-md-9 col-sm-9 col-xs-6 photos1" style="display:none;" id="vid"><i class="fa fa-plus pull-right" aria-hidden="true"></i></div>
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
                    <!-- *****************Email************** -->
                    <div class="col-md-12 col-sm-12 col-xs-12 detail">
                      <div class="col-md-3 col-sm-6 col-xs-4 br_name">
                        <img src="<?php echo HTTP_ROOT;?>/img/profile_img/message2.png">
                        <span>Email id:</span>
                      </div>
                      <div class="col-md-9 col-sm-6 col-xs-8 br_name1">
                        <span><?php echo $user_view['UserMaster']['email'];?></span>
                      </div>
                    </div>
                    <!-- *****************Email************** -->
                     <!-- *****************contact no************** -->
                    <div class="col-md-12 col-sm-12 col-xs-12 detail">
                      <div class="col-md-3 col-sm-6 col-xs-4 br_name">
                        <img src="<?php echo HTTP_ROOT;?>/img/profile_img/mob.png">
                        <span>Contact No:</span>
                      </div>
                      <div class="col-md-9 col-sm-6 col-xs-8 br_name1">
                        <span><?php echo $user_view['UserMaster']['mobile'];?></span>
                      </div>
                    </div>
                    <!-- *****************contact no************** -->
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
                        <span><?php echo !empty($user_view['UserMaster']['city'])?$user_view['UserMaster']['city']:"N/A";?></span>
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
                    <div id="vendor_data">
                     <?php if(($user_view['UserMaster']['user_type_id'])=='1'){?>
                        <!-- ======== Start of Vendor Profile ========================== -->
                          <!-- *****************Interest************** -->
                          <!-- *****************section 2************* -->
                          <div class="col-md-12 col-sm-12 col-xs-12 bgsec">
                            <div class="col-md-3 col-sm-3 col-xs-6 photos1" id="photo">Section 2</div>
                            <div class="col-md-9 col-sm-9 col-xs-6 photos1" id="vid">
                             
                            </div>
                            <div class="col-md-9 col-sm-9 col-xs-6 photos1" style="display:none;" id="vid"><i class="fa fa-plus pull-right" aria-hidden="true"></i></div>
                          </div>
                          <!-- *****************section 2************* -->
                          <!-- *****************Institution************** -->
                             <div id="type_vendor">
                          <div class="col-md-12 col-sm-12 col-xs-12 detail">
                            <div class="col-md-3 col-sm-6 col-xs-4 br_name">
                              <img src="<?php echo HTTP_ROOT;?>/img/profile_img/building.png">
                              <span>Vendor Type:</span>
                            </div>
                            <div class="col-md-9 col-sm-6 col-xs-8 br_name1">
                              <?php if($user_view['UserMaster']['vendor_type_id']==1){?>
                                <span>Organization</span>
                              <?php }
                              else if($user_view['UserMaster']['vendor_type_id']==2){?>
                               <span>Indivisual</span>
                             <?php }
                              else{?>
                               <span>N/A</span>
                            <?php }?>
                              
                            </div>
                          </div>
                           
                          
                         <?php if($user_view['UserMaster']['vendor_type_id']==2){?>
                       <div class="col-md-12 col-sm-12 col-xs-12 detail">
                            <div class="col-md-3 col-sm-6 col-xs-4 br_name">
                              <img src="<?php echo HTTP_ROOT;?>/img/profile_img/are.png">
                              <span>DOB:</span>
                            </div>
                            <div class="col-md-9 col-sm-6 col-xs-8 br_name1">
                              <span><?php echo !empty($user_view['UserMaster']['d_o_b'])?$user_view['UserMaster']['d_o_b']:"N/A";?></span>
                            </div>
                          </div>
                         <?php }else if($user_view['UserMaster']['vendor_type_id']==2){?>
                          
                         
                           <div class="col-md-12 col-sm-12 col-xs-12 detail">
                            <div class="col-md-3 col-sm-6 col-xs-4 br_name">
                              <img src="<?php echo HTTP_ROOT;?>/img/profile_img/are.png">
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
                          <?php }?>
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
                              <span><?php echo !empty($user_view['UserMaster']['address'])?$user_view['UserMaster']['address']." Year":"N/A";?></span>
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
                        </div>
                          <!-- *****************Description************** -->
                          <!-- *****************section 3************* -->
                          <div class="col-md-12 col-sm-12 col-xs-12 bgsec">
                            <div class="col-md-3 col-sm-3 col-xs-6 photos1" id="photo">Section 3</div>
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
                        
                        <!-- = = ===================End For Vendor Profile==================== = -->

                    <?php }else{?>
                      <!-- *****************Interest************** -->
                    <!-- *****************section 2************* -->
                    <div class="col-md-12 col-sm-12 col-xs-12 bgsec">
                      <div class="col-md-3 col-sm-3 col-xs-6 photos1" id="photo">Section 2</div>
                      <div class="col-md-8 col-sm-8 col-xs-6 photos1" id="vid"><i class="fa fa-minus pull-right" aria-hidden="true"></i></div>
                      <div class="col-md-8 col-sm-8 col-xs-6 photos1" style="display:none;" id="vid"><i class="fa fa-plus pull-right" aria-hidden="true"></i></div>
                    </div>
                    <!-- *****************section 2************* -->
                    <!-- *****************Institution************** -->
                    <!-- *****************Description************** -->
                    <!-- *****************section 3************* -->
                    <!-- *****************section 3************* -->
                    <!-- *****************Teaching Experience************** -->
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
              </div>
              <div id="lerner_data" style="display:none;">
                <div class="col-md-12 col-sm-12 col-xs-12 bgsec">
                      <div class="col-md-3 col-sm-3 col-xs-6 photos1" id="photo">Section 2</div>
                      <div class="col-md-8 col-sm-8 col-xs-6 photos1" id="vid">
                        

                      </div>
                      <div class="col-md-8 col-sm-8 col-xs-6 photos1" style="display:none;" id="vid">
                        

                      </div>
                    </div>
                    <!-- *****************section 2************* -->
                    <!-- *****************Institution************** -->
                    <!-- *****************Description************** -->
                    <!-- *****************section 3************* -->
                    <!-- *****************section 3************* -->
                    <!-- *****************Teaching Experience************** -->
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
                      <div class="col-md-3 col-sm-3 col-xs-6 photos1" id="photo">Section 1</div>
                      <div class="col-md-9 col-sm-8 col-xs-6 photos1" id="vid">
                       
                      </div>
                      <div class="col-md-8 col-sm-8 col-xs-6 photos1" style="display:none;" id="vid">
                       
                      </div>
                    </div>
                    <?php echo $this->Form->create('UserMaster');?>
                    <!-- *****************Name************** -->
                    <div class="col-md-12 col-sm-12 col-xs-12 detail1">
                      <div class="col-md-3 col-sm-4 col-xs-4 br_name naj786 br_name_br12">
                        <img src="<?php echo HTTP_ROOT;?>/img/profile_img/name.png">
                        <span>Name:</span>
                      </div>
                      <div class="col-md-5 col-sm-7 col-xs-8 br_name1">
                        <input type="hidden" value="<?php echo $user_view['UserMaster']['id'];?>" name="data[UserMaster][id]">
                        <?php echo $this->Form->input('first_name',array('type'=>'text','class'=>'form-control reg_input input_text','id'=>'first_name','label'=>false,'div'=>false,'placeholder'=>'Name','value'=>$user_view['UserMaster']['first_name']));?>
                      </div>
                    </div>
                    <!-- *****************Name************** -->
                    <!-- *****************Email************** -->
                    <div class="col-md-12 col-sm-12 col-xs-12 detail1">
                      <div class="col-md-3 col-sm-4 col-xs-4 br_name br_name_br12">
                        <img src="<?php echo HTTP_ROOT;?>/img/profile_img/message2.png">
                        <span>Email id:</span>
                      </div>
                      <div class="col-md-5 col-sm-7 col-xs-8 br_name1">
                        <?php echo $this->Form->input('email',array('type'=>'text','class'=>'form-control reg_input input_text','id'=>'email','label'=>false,'div'=>false,'placeholder'=>'Name','value'=>$user_view['UserMaster']['email'],'readonly'=>true));?>
                      </div>
                    </div>
                    <!-- *****************Email************** -->
                     <!-- *****************contact no************** -->
                    <div class="col-md-12 col-sm-12 col-xs-12 detail1">
                      <div class="col-md-3 col-sm-4 col-xs-4 br_name br_name_br12">
                        <img src="<?php echo HTTP_ROOT;?>/img/profile_img/mob.png">
                        <span>Contact No:</span>
                      </div>
                      <div class="col-md-5 col-sm-7 col-xs-8 br_name1">
                        <?php echo $this->Form->input('contact_no',array('type'=>'text','class'=>'form-control reg_input input_text','id'=>'contact_no','label'=>false,'div'=>false,'placeholder'=>'Contact_number','value'=>$user_view['UserMaster']['contact_no']));?>
                      </div>
                    </div>
                    <!-- *****************contact no************** -->
                    <!-- *****************City************** -->
                    <div class="col-md-12 col-sm-12 col-xs-12 detail1 imp_pad">
                      <div class="col-md-3 col-sm-4 col-xs-4 br_name br_name_br12">
                        <img src="<?php echo HTTP_ROOT;?>/img/profile_img/map.png">
                        <span>City:</span>
                      </div>
                      <div class="col-md-5 col-sm-7 col-xs-8 br_name1">
                        <select class="form-control reg_input input_text" name="data[UserMaster][city_id]" id="city_id" onblur="city(this.value)">
                          <option value="">Select City</option>
                           <option selected value="1">Chennai</option>
                          <?php
                            foreach ($city as $key => $city_value){
                            $id   =$city_value['City']['id'];
                            $name =$city_value['City']['name'];
                            //}
                          ?>
                          <option value="<?php echo $id; ?>" <?php if($id!=1){ echo 'disabled'; } ?>><?php echo $name; ?></option>
                            <?php
                            }
                          ?>
                        </select>
                        <span class="carimg crt_prf "><img src="<?php echo HTTP_ROOT;?>/img/profile_img/caret_prf.png" class="crt786"></span>
                      </div>
                    </div>
                    <!-- *****************City************** -->
                     <!-- *****************locality************** -->
                    <div class="col-md-12 col-sm-12 col-xs-12 detail1">
                      <div class="col-md-3 col-sm-4 col-xs-4 br_name br_name_br12">
                        <img src="<?php echo HTTP_ROOT;?>/img/profile_img/locality.png">
                        <span>Locality:</span>
                      </div>
                      <div class="col-md-5 col-sm-7 col-xs-8 br_name1">
                        <select id="locality_id" name="data[UserMaster][locality_id]" class="form-control reg_input input_text" onblur="locality(this.value)">
                          <option value="">Select Locality</option>
                          <option selected="selected"><?php echo $user_view['UserMaster']['locality'] ?></option>
                          <?php foreach ($localitie as $key => $localitie_value) {
                      
                          $loc_id=$localitie_value['Locality']['id'];
                          $loc_name=$localitie_value['Locality']['name'];
                        
                          ?>
                          <option value="<?php echo $loc_id; ?>"><?php echo $loc_name; ?></option>
                          <?php
                            }
                          ?>                      
                        </select>
                        <span class="carimg crt_prf "><img src="<?php echo HTTP_ROOT;?>/img/profile_img/caret_prf.png" class="crt786"></span>                        
                      </div>
                    </div>
                    <!-- *****************locality************** -->
                    <!-- *****************Interest************** -->
                    <div class="col-md-12 col-sm-12 col-xs-12 detail1 imp_pad1">
                      <div class="col-md-3 col-sm-4 col-xs-4 br_name br_name_br12">
                        <img src="<?php echo HTTP_ROOT;?>/img/profile_img/heart.png">
                        <span>Interest:</span>
                      </div>
                      <div class="col-md-5 col-sm-7 col-xs-8 br_name1">
                        <select class="form-control reg_input input_text" name="data[UserMaster][category_id][]" id="interest" multiple="multiple" value="" data-actions-box="true"  style='overflow:auto' onblur="cat(this.value)">
                          <?php 
                          foreach ($category as $key => $value_category) {

                            $c_cat =$value_category['Category']['category_name'];
                            $c_id  =$value_category['Category']['id'];
                            ?>
                          <option value="<?php echo $c_id; ?>"><?php echo $c_cat; ?></option>
                          
                          <?php
                          }
                          ?>
                        </select>
                        <span class="carimg"><img src="<?php echo HTTP_ROOT;?>/img/caret.png"></span>        
                      </div>
                      <!-- button -->
                      <div class="col-md-8 col-sm-8 col-xs-8 br_butt">
                        <button class="btn pull-right update">Update</button>
                      </div>
                      <?php echo $this->Form->end();?>
                      <!-- button -->
                    </div>

                    <?php if(($user_view['UserMaster']['user_type_id'])=='1'){?>
                    
                    <!-- *****************Interest************** -->
                    <!-- *****************section 2************* -->

                    <?php echo $this->Form->create('UserMaster')?>
                    <div class="col-md-12 col-sm-12 col-xs-12 bgsec">
                      <div class="col-md-2 col-sm-3 col-xs-6 photos1" id="photo">Section 2</div>
                      <div class="col-md-8 col-sm-8 col-xs-6 photos1" id="vid">
                        
                      </div>
                      <div class="col-md-8 col-sm-8 col-xs-6 photos1" style="display:none;" id="vid">
                        
                      </div>
                    </div>
                    <!-- *****************section 2************* -->
                    <!-- *****************Institution************** -->
                   <div class="col-md-12 col-sm-12 col-xs-12 detail1">
                      <div class="col-md-3 col-sm-4 col-xs-4 br_name">
                        <img src="<?php echo HTTP_ROOT;?>/img/profile_img/building.png">
                        <span>Vendor Type:</span>
                      </div>
                      <div class="col-md-5 col-sm-7 col-xs-8 br_name1">
                        <?php echo $this->Form->input('vendor_type_id',array('type'=>'select','class'=>'form-control reg_input input_text','id'=>'vendor_Type','label'=>false,'div'=>false,'placeholder'=>'Vendor Type','selected'=>$user_view['UserMaster']['vendor_type_id'],'options'=>$vendor_type));?>
                       <span class="carimg crt_prf "><img src="<?php echo HTTP_ROOT;?>/img/profile_img/caret_prf.png" class="crt786"></span>                     
                      </div>
                    </div>
                                        <div id="vendor_org">
                    <div class="col-md-12 col-sm-12 col-xs-12 detail1" id="vendor_org1">
                      <div class="col-md-3 col-sm-4 col-xs-4 br_name">
                        <img src="<?php echo HTTP_ROOT;?>/img/profile_img/building.png">
                        <span>Institution:</span>
                      </div>
                      <div class="col-md-5 col-sm-7 col-xs-8 br_name1">
                        <?php echo $this->Form->input('institute_name',array('type'=>'text','class'=>'form-control reg_input input_text','id'=>'institute_name','label'=>false,'div'=>false,'placeholder'=>'Institute_name','value'=>$user_view['UserMaster']['institute_name']));?>
                        <input type="hidden" value="<?php echo $user_view['UserMaster']['id'];?>" name="data[UserMaster][id]">                      
                      </div>
                    </div>
                    <!-- *****************Institution************** -->
                    <!-- *****************Registration Id************** -->
                    
                    <div class="col-md-12 col-sm-12 col-xs-12 detail1" id="vendor_org_reg_id">
                      <div class="col-md-3 col-sm-4 col-xs-4 br_name">
                        <img src="<?php echo HTTP_ROOT;?>/img/profile_img/are.png">
                        <span>Registration Id:</span>
                      </div>
                      <div class="col-md-5 col-sm-7 col-xs-8 br_name1">
                        <?php echo $this->Form->input('official_reg_id',array('type'=>'text','class'=>'form-control reg_input input_text','id'=>'email','label'=>false,'div'=>false,'placeholder'=>'Registration Id','value'=>$user_view['UserMaster']['official_reg_id']));?>
                      </div>
                    </div>
                    </div>
                   
                    <div class="col-md-12 col-sm-12 col-xs-12 detail1" id="vendor_indivisual_dob" style="display:none;">
                      <div class="col-md-3 col-sm-4 col-xs-4 br_name">
                        <img src="<?php echo HTTP_ROOT;?>/img/profile_img/are.png">
                        <span>Date Of Birth:</span>
                      </div>
                      <div class="col-md-5 col-sm-7 col-xs-8 br_name1">
                        <?php echo $this->Form->input('d_o_b',array('type'=>'text','class'=>'form-control reg_input input_text','id'=>'datepicker','label'=>false,'div'=>false,'placeholder'=>'Date Of Birth','value'=>$user_view['UserMaster']['d_o_b']));?>
                      </div>
                    </div>
                    <!-- *****************Registration Id************** -->
                    <!-- *****************Experience Area************** -->
                    <div class="col-md-12 col-sm-12 col-xs-12 detail1">
                      <div class="col-md-3 col-sm-4 col-xs-4 br_name">
                        <img src="<?php echo HTTP_ROOT;?>/img/profile_img/active_user.png">
                        <span>Expertise Area:</span>
                      </div>
                      <div class="col-md-5 col-sm-7 col-xs-8 br_name1">
                        <?php echo $this->Form->input('area_of_expertise',array('type'=>'text','class'=>'form-control reg_input input_text','id'=>'area_of_expertise','label'=>false,'div'=>false,'placeholder'=>' Area of Expertise','value'=>$user_view['UserMaster']['area_of_expertise']));?>
                      </div>
                    </div>
                    <!-- *****************Experience Area************** -->
                    <!-- *****************Address************** -->
                    <div class="col-md-12 col-sm-12 col-xs-12 detail1">
                      <div class="col-md-3 col-sm-4 col-xs-4 br_name">
                        <img src="<?php echo HTTP_ROOT;?>/img/profile_img/map_loc.png">
                        <span>Address:</span>
                      </div>
                      <div class="col-md-5 col-sm-7 col-xs-8 br_name1">
                        <?php echo $this->Form->input('address1',array('type'=>'textarea','class'=>'form-control reg_input input_text','id'=>'address1','label'=>false,'div'=>false,'placeholder'=>' Address','value'=>$user_view['UserMaster']['address']));?>
                      </div>
                    </div>
                    <!-- *****************Address************** -->
                    <!-- *****************Description************** -->
                    <div class="col-md-12 col-sm-12 col-xs-12 detail1">
                      <div class="col-md-3 col-sm-4 col-xs-4 br_name">
                        <img src="<?php echo HTTP_ROOT;?>/img/profile_img/eye.png">
                        <span>Description:</span>
                      </div>
                      <div class="col-md-5 col-sm-7 col-xs-8 br_name1">
                         <?php echo $this->Form->input('description',array('type'=>'textarea','class'=>'form-control reg_input input_text','id'=>'description','label'=>false,'div'=>false,'placeholder'=>'Description',
                         'value'=>$user_view['UserMaster']['description']));?>
                      </div>
                      <!-- ************button********* -->
                      <div class="col-md-8 col-sm-8 col-xs-8 br_butt">
                        <button class="btn pull-right update">Update</button>
                      </div>
                      <!-- ************button********* -->
                    </div>
                    <?php echo $this->Form->end();?>
                    <!-- *****************Description************** -->
                    <!-- *****************section 3************* -->
                    <?php echo $this->Form->create('UserMaster');?>
                     <input type="hidden" value="<?php echo $user_view['UserMaster']['id'];?>" name="data[UserMaster][id]">                     
                    <div class="col-md-12 col-sm-12 col-xs-12 bgsec">
                      <div class="col-md-2 col-sm-3 col-xs-6 photos1" id="photo">Section 3</div>
                      <div class="col-md-8 col-sm-8 col-xs-6 photos1" id="vid">
                        
                      </div>
                      <div class="col-md-8 col-sm-8 col-xs-6 photos1" style="display:none;" id="vid"><i class="fa fa-plus pull-right" aria-hidden="true"></i></div>
                    </div>
                    <!-- *****************section 3************* -->
                    <!-- *****************Teaching Experience************** -->
                    <div class="col-md-12 col-sm-12 col-xs-12 detail1 imp_pad">
                      <div class="col-md-3 col-sm-4 col-xs-4 br_name">
                        <img src="<?php echo HTTP_ROOT;?>/img/profile_img/experience.png">
                        <span>Teaching Experience:</span>
                      </div>
                      <div class="col-md-5 col-sm-7 col-xs-8 br_name1">
                        <select class="form-control reg_input input_text" id="coaching_experience" name="data[UserMaster][coaching_experience]">
                          <option>Select Experience</option>
                          <?php for($i=1;$i<=50;$i++){?>
                          <option value="<?php echo $i;?> Year"><?php echo $i;?> Year</option>
                          <?php }?>
                        </select>
                        <span class="carimg crt_prf"><img src="<?php echo HTTP_ROOT;?>/img/profile_img/caret_prf.png" class="crt786"></span>
                      </div>
                    </div>
                    <!-- *****************Teaching Experience************** -->
                    <!-- *****************Gender************** -->
                    <div class="col-md-12 col-sm-12 col-xs-12 detail1 imp_pad1 imp_pad">
                      <div class="col-md-3 col-sm-4 col-xs-4 br_name">
                        <img src="<?php echo HTTP_ROOT;?>/img/profile_img/gender.png">
                        <span>Gender:</span>
                      </div>
                      <div class="col-md-5 col-sm-7 col-xs-8 br_name1">    
                        <select class="form-control reg_input input_text" id="sel1" name="data[UserMaster][gender]">
                          <option value="">Select Gender</option>
                          <option value="1">Male</option>
                          <option value="2">Female</option>
                        </select>
                        <span class="carimg crt_prf"><img src="<?php echo HTTP_ROOT;?>/img/profile_img/caret_prf.png" class="crt786"></span>
                      </div>
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8 br_butt">
                      <button class="btn pull-right update">Update</button>
                    </div>
                    <?php echo $this->Form->end();?>
                </div>
                    <?php }else{?>
                  <div class="col-md-12 col-sm-12 col-xs-12 bgsec">
                      <div class="col-md-9 col-sm-3 col-xs-6 photos1" id="photo">Section 2</div>
                      <div class="col-md-9 col-sm-9 col-xs-6 photos1" id="vid">
                       
                      </div>
                      <div class="col-md-8 col-sm-8 col-xs-6 photos1" style="display:none;" id="vid">
                        
                      </div>
                    </div>
                    <!-- *****************section 2************* -->
                    <!-- *****************Institution************** -->
                    <?php echo $this->Form->create('UserMaster');?>
                    <div class="col-md-12 col-sm-12 col-xs-12 detail1">
                      <div class="col-md-3 col-sm-4 col-xs-4 br_name">
                        <img src="<?php echo HTTP_ROOT;?>/img/profile_img/gender.png">
                        <span>Gender:</span>
                      </div>
                      <div class="col-md-5 col-sm-7 col-xs-8 br_name1">
                         <input type="hidden" value="<?php echo $user_view['UserMaster']['id'];?>" name="data[UserMaster][id]">
                       
                        <select class="form-control reg_input input_text" id="sel1" name="data[UserMaster][gender]">
                            <option value="">Select Gender</option>
                            <option value="1">Male</option>
                            <option value="2">Female</option>
                          </select>
                           <span class="carimg crt_prf"><img src="<?php echo HTTP_ROOT;?>/img/profile_img/caret_prf.png" class="crt786"></span>
                        
                        
                       </div>
                    </div>
                    
                    <!-- *****************Institution************** -->
                    <!-- *****************Registration Id************** -->
                      <!-- ************button********* -->
                      <div class="col-md-8 col-sm-8 col-xs-8 br_butt">
                        <button class="btn pull-right update">Update</button>
                      </div>
                      <!-- ************button********* -->
                    </div>
                    <?php echo $this->Form->end();?>
                    
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
                              </div>
                            </center>
                          </div>
                      </div>
                      <div class="col-md-12 col-sm-12 col-xs-12 sr_pv_padding_lr myprflbrd" id="sr_photo">

                        <!-- Start Modal -->
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header" style="border-radius:5px 5px 0px 0px; background-color: #00CDC6;" id="shopmodal">
                                            
                                            <button type="button" class="close" data-dismiss="modal">×</button>
                                            <h3 style="padding:0px; margin:0px; color:#fff;">Upload Image</h3>
                                        
                                        </div>
                                        
                                        <?php //echo $this->Form->create('AddDiamond', array('class' => '', 'enctype'=>'multipart/form-data','onSubmit'=>'return chk_frm();'))?> 
                                            <div class="modal-body">                       
                                                <div class="row">&nbsp;</div>
                                                <div class="row"> 
                                                    <div class="col-md-1 col-lg-1  " ></div>
                                                    <div class="col-md-12 col-lg-12  " >                                
                                                       <center>
                                                            <span class="btn btn-default btn-file upload-btn-file">
                                                                Browse Your image to upload <input type="file" name="imagefiles[]" multiple id="photos" class="txtbox" accept="image/*"> 
                                                            </span>
                                                        </center>
                                                        <span style="color:red; text-align:;" id="msg1"></span>            
                                                    </div>
                                                </div>                        
                                                <div class="row">&nbsp;</div>  
                                            </div>
                                            <div class="modal-footer">
                                                <a href="#" class="btn btn-default dismiss-btn" data-dismiss="modal">Close</a>
                                                <input type="submit"  class="btn btn-primary save-image " name="save_img" id='upload_image'  value="Submit" >                        
                                            </div>
                                         
                                    </div>
                                </div>
                            </div>
                        <!-- End Modal -->

                        <div class="col-md-12 col-sm-12 col-xs-12 vid1">
                            <div class="col-md-12 col-sm-12 col-xs-12 uploadd-btn">
                              <span>Photos</span>
                              <span class="pull-right" id ="upload-btn" style="cursor:pointer;">Add Photo</span>
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
                                
                                <div class="col-md-3 col-sm-3 col-xs-6 pimgtop"><img class="img-responsive yogaimg sr_20_gallery_img" src="<?php echo HTTP_ROOT;?>/img/Vendor/UploadImage_<?php echo $user_id .'/'. $image;?>" style=""></div>
                              <?php }} ?>
                            </div>
                        </div> 
                      </div> 
                      <div class="col-md-12 col-sm-12 col-xs-12 sr_pv_padding_lr myprflbrd" id="sr_video" style="display:none;">
                        <!-- Start Modal -->
                            <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header" style="border-radius:5px 5px 0px 0px; background-color: #00CDC6;" id="shopmodal">
                                            
                                            <button type="button" class="close" data-dismiss="modal">×</button>
                                            <h3 style="padding:0px; margin:0px; color:#fff;">Upload Image</h3>
                                        
                                        </div>
                                        <?php echo $this->Form->create('AddVideo', array('class' => '','enctype'=>'multipart/form-data','onSubmit'=>'return chk_vid();'))?>  
                                        <?php //echo $this->Form->create('AddDiamond', array('class' => '', 'enctype'=>'multipart/form-data','onSubmit'=>'return chk_frm();'))?> 
                                            <div class="modal-body">                       
                                                <div class="row">&nbsp;</div>
                                                <div class="row"> 
                                                    <div class="col-md-1 col-lg-1  " ></div>
                                                    <div class="col-md-12 col-lg-12  " >                                
                                                       <center>
                                                            <span class="btn btn-default btn-file upload-btn-file">
                                                                Browse Your Video to upload <input type="file" name="videofiles[]" multiple id="videos" class="txtbox " accept="video/*"> 
                                                            </span>
                                                        </center>
                                                        <span style="color:red; text-align:;" id="msg2"></span>            
                                                    </div>
                                                </div>                        
                                                <div class="row">&nbsp;</div>  
                                            </div>
                                            <div class="modal-footer">
                                                <a href="#" class="btn btn-default dismiss-btn" data-dismiss="modal">Close</a>
                                                <input type="submit"  class="btn btn-primary save-image " name="save_img"  value="Submit" >                        
                                            </div>
                                        <?php echo $this->Form->end(); ?>   
                                    </div>
                                </div>
                            </div>
                        <!-- End Modal -->
                        <div class="col-md-12 col-sm-12 col-xs-12 uploadd-btn uploadd-vid-btn">
                          <span>Videos</span>
                          <span class="pull-right" id="upload-btn1" style="cursor:pointer;">Add Video</span>
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
                              
                              <div class="col-md-4 col-sm-6 col-xs-12 pimgtop col-lg-3">
                                <!-- <img class="img-responsive yogaimg" src="<?php echo HTTP_ROOT;?>/img/Vendor/UploadVideo_<?php echo $user_id?>/<?php echo $video;?>" style="width:100%;height:200px;border:2px solid black;"> -->
                                <video class="yogaimg" controls style="width:100%;height:200px;border:2px solid black; background-color:#313131;">
                                  <source src="<?php echo HTTP_ROOT;?>/img/Vendor/UploadVideo_<?php echo $user_id .'/'.$video;?>" type="video/mp4">
                                </video>
                              </div>
                            <?php }} ?>
                          </div>
                        </div>                   
                      </div>
                      <!-- *************hide2*************** -->
                  </div>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12 padd_l_r" id="sr_class1" style="display:none;"> 
                      <div class="col-md-12 col-sm-12 col-xs-12 vid padd_l_r">
                        <div id="xxxx">
                          <div id="cls" class="col-sm-12 col-xs-12 photos btn-box-div" style="text-align: left;">
                            <div class="col-md-offset-3 col-md-6 col-sm-offset-1 col-sm-10">
                              <center>
                                <div class="btn-group btn-group-justified">
                                  <a href="#" class="btn btn-default seg upcomming-class upclass-tab sr-box-btn" id="#">Upcoming Classes</a>
                                  <a href="#" class="btn btn-default seg post-class c sr-box-btn sr-box-btn1" id="#">Past Classes</a>
                                </div>
                              </center>
                            </div>
                          </div>
                      </div>
                      <div class="col-md-12 col-sm-12 col-xs-12 padd_l_r" style="margin-top: 8px;">
                            <div class="upcomming-divv panel-group col-xs-12 sr_pv_padding_lr padd_l_r" id="accordion" style="padding-bottom: 3px;">                            
                              <div class="panel-heading col-xs-12 sr_class_acc01">
                                <div class="panel-title">
                                  <span class="sr_class_acc01 sr_class_acc_text1" style="box-sizing:none;float:left;">
                                      Upcoming Classes
                                  </span>
                                </div>
                              </div>

                              <div id="accordion" class="panel-collapse  col-xs-12 sr_pv_padding_lr ">
                                <div class="panel-body jstify col-xs-12 sr_pv_padding_lr">
                                  <div class="col-xs-12 col-sm-12 sr_2605_03_padding sr_pv_padding_lr" id="#">
                                      <?php if(!empty($upcoming_class)){
                                        foreach ($upcoming_class as $result) {
                                          // echo "<pre>";
                                          // print_r($result);
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
                                             <!-- ********text************ -->
                                              
                                              <div class="col-md-6 col-sm-6 col-xs-12 text_res sr_2605_03_padding status-div" >
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
                                                    <a href="<?php echo HTTP_ROOT;?>/Homes/bookClass/<?php echo base64_encode($result['VendorClasse']['id']); ?>">   
                                                      <div class="col-xs-12 col-sm-12" style="text-align: right;padding-right:0px;"><button class="booking">Booking Status</button></div></a> 
                                                  </div>
                                              </div>        
                                            <!-- ********text************ -->
                                        </div> 
                                      <?php } }?>
                                  </div><!-- tab 1 / -->
                                </div>
                              </div> 
                            </div>
                              <div class="past-tab">
      
                                <div class="panel-heading col-xs-12 sr_class_acc01" style="margin-top:5px;">
                                    <div class="panel-title">
                                        <span class="sr_class_acc01 sr_class_acc_text1" style="box-sizing:none;float:left;">Past Classes</span>
                                    </div>
                                </div>
                                <div id="" class="panel-collapse  col-xs-12 sr_pv_padding_lr ">
                                    <div class="panel-body jstify col-xs-12 sr_pv_padding_lr">
                                      <div class="col-xs-12 col-sm-12 sr_2605_03_padding sr_pv_padding_lr" id="#">
                                        <?php if(!empty($past_class)){
                                          foreach ($past_class as $result) {

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
                                                
                                                <div class="col-md-6 col-sm-6 col-xs-12 text_res sr_2605_03_padding status-div">
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
                                                      <div class="col-xs-12 col-sm-12" style="text-align: right;padding-right:0px;"><button class="booking" onclick="mypopup();">Edit/Repost</button></div> 
                                                    </div>
                                                </div>        
                                              <!-- ********text************ -->
                                          </div> 
                                        <?php } }?>                                    
                                      </div><!-- tab 1 / -->
                                    </div>
                                  </div>
                                </div>
                            <!-- </div> -->
                      </div>
                </div>
              </div> 
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
                              <div class="panel-heading col-xs-12 sr_class_acc01" style="margin-top: 3px;" >
                                <div class="panel-title">
                                 
                                    <span class="sr_class_acc01 sr_class_acc_text1" style="box-sizing:none;float:left;">
                                      My Booked Classes
                                    </span>
                                    <span class="sr_class_acc_icon">
                                      
                                    </span>
                              
                                </div>
                              </div>

                              <div id="collapsethree" class="panel-collapse col-xs-12 sr_pv_padding_lr ">
                                <div class="panel-body jstify col-xs-12 sr_pv_padding_lr">
                                  <div class="col-xs-12 col-sm-12 sr_2605_03_padding sr_pv_padding_lr" id="#">
                                      <?php if(!empty($my_book_class_data)){
                                        foreach ($my_book_class_data as $result) {

                                        ?>           
                                        <div class="col-sm-12 col-xs-12 sr_260501 sr_pv_padding_lr" style="padding-bottom: 15px; border-bottom: 2px solid #00477b; background:#fff;"> 
                                              <!-- ********images************ -->
                                              <div class="col-md-5 col-sm-12 col-xs-12 padd_l_r1 img-responsive"  style="margin-top: 15px;">
                                                <div class="col-xs-12 col-sm-12 col-md-offset-1 col-md-10">
                                                 
                                                 <?php 
                                                    echo "<span class='flexible-fixed'>";
                                                    echo ($result['vancs']['class_timing_id'] == 2)?'Fixed':'Flexible';
                                                    echo "</span>";
                                                  ?>
                                                 
                                                  <?php if(!empty($result['vancs']['upload_class_photo'])){?>
                                                    <img src="<?php echo HTTP_ROOT;?>/img/Vendor/class_image/<?php 
                                                          echo $result['vancs']['upload_class_photo'];?>" class="img_res img-responsive upcoming_class" id="<?php echo $result['vancs']['id'];?>" 
                                                          style="width:484px;height:253px;border:2px solid black;cursor:pointer">
                                                  <?php } else{?>
                                                      <img src="<?php echo HTTP_ROOT;?>/img/Vendor/class_image/defult_pic.png" class="img_res img-responsive upcoming_class" id="<?php echo $result['vancs']['id'];?>" style="width:484px;height:253px;border:2px solid black;cursor:pointer">
                                                  <?php } ?>
                                                        
                                                  <div class="image_price12 pull-right">
                                                    <span class="ccc" style="color:white">
                                                      &#8377;<?php echo $result['vancs']['price_per_head'];?></span>
                                                  </div>
                                                </div>  
                                              </div>
                                              <!-- ********images************ -->
                                              <!-- ********text************ -->
                                              <div class="col-md-6 col-sm-6 col-xs-12 text_res sr_2605_03_padding status-div" >
                                                 <div class="col-xs-12 col-sm-12 sr_2605_06 sr_2605_06_textLorem021 sr_pv_padding_lr txt_cntnt">
                                                    <div class="hathyga up-com-post col-xs-12 col-sm-12 sr_2605_03_padding upcoming-class-title">
                                                      <?php echo $result['vancs']['class_topic'];?>
                                                    </div>
                                                    <div class="col-xs-12 col-sm-12 sr_2605_03_padding sr_serch_div_l_hite sr_class_acc_div padd_l_r" style="margin-bottom:7px;">

                                                      <div class="row">
                                                        <div class="col-md-2 col-sm-2 col-xs-2 upcom-img-class">
                                                          <img class="img-responsive" style="display: inline; margin-right: 5px;" src="<?php echo HTTP_ROOT;?>/img/fun&refreshment/location.png">
                                                        </div>
                                                        <div class="col-md-10 col-sm-10 col-xs-10 sr_class_acc_text02 upclass-location">
                                                          <?php echo $result['vancs']['location'];?>
                                                        </div>
                                                      </div>
                                                    </div>
                                                    <div class="col-xs-12 col-sm-12 sr_2605_03_padding sr_serch_div_l_hite sr_class_acc_div padd_l_r" style="margin-bottom:7px;">
                                                      <div class="row">
                                                        <div class="col-md-2 col-sm-2 col-xs-2 upcom-img-class">
                                                          <img class="img-responsive" style="display: inline; margin-right: 5px;" src="<?php echo HTTP_ROOT;?>/img/fun&refreshment/user.png">
                                                        </div>
                                                        <div class="col-md-10 col-sm-10 col-xs-10 sr_class_acc_text02 upclass-location">
                                                        <strong> By :</strong> 
                                                          <?php echo ucfirst($result['usermaster']['first_name']);?>
                                                        </div>
                                                      </div>
                                                    </div>
                                                    <div class="col-xs-12 col-sm-12 sr_2605_03_padding sr_serch_div_l_hite sr_class_acc_div padd_l_r" style="margin-bottom:7px;">
                                                      <div class="row">
                                                        <div class="col-md-2 col-sm-2 col-xs-2 upcom-img-class">
                                                          <img class="img-responsive" style="display: inline; margin-right: 5px;" src="<?php echo HTTP_ROOT;?>/img/fun&refreshment/session.png">
                                                        </div>
                                                        <div class="col-md-10 col-sm-10 col-xs-10 sr_class_acc_text02 upclass-location">
                                                        <strong><?php echo ucfirst($result['vancs']['no_of_session']);?></strong>&nbsp;Session
                                                        </div>
                                                      </div>
                                                    </div>
                                                    <div class="col-xs-12 col-sm-12 sr_serch_div_l_hite sr_class_acc_div padd_l_r" style="margin-bottom:7px;">
                                                       <div class="row">
                                                        <div class="col-md-2 col-sm-2 col-xs-2 upcom-img-class">
                                                        <img class="img-responsive" style="display: inline; margin-right: 5px;" src="<?php echo HTTP_ROOT;?>/img/fun&refreshment/calander.png"></div>
                                                        <div class="col-md-10 col-sm-10 col-xs-10 upclass-location">
                                                          <?php if($result['vancs']['class_timing_id'] == 1){?>
                                                            <div class="col-md-8 col-sm-8 col-xs-8 sr_class_acc_text02 past-timming-div-first" >
                                                            <?php echo $result['vancs']['class_duration'];?></div>&nbsp;
                                                          <?php }else{?>
                                                          <div class="row">
                                                            <div class="col-md-4 col-sm-4 col-xs-4 sr_class_acc_text02 past-timming-div-first" >
                                                            <?php echo $result['vancs']['starting_month'];?></div>&nbsp;
                                                            <div class="col-md-7 col-sm-7 col-xs-6 past-timmg-div-second">
                                                              <div class="col-md-2 col-sm-2 col-xs-2 upcom-img-class">
                                                                <img class="img-responsive" style="display: inline; margin-right: 5px;" src="<?php echo HTTP_ROOT;?>/img/fun&refreshment/clock.png">
                                                              </div>
                                                              <div class="col-md-10 col-sm-10 col-xs-10 sr_class_acc_text02 upclass-location"><?php echo $result['vancs']['time_of_day'];?></div>
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
                                                            <?php echo substr($result['vancs']['class_summary'], 0, 150),".......";?>
                                                          </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12 col-sm-12 padd_l_r">
                                                      <img src="<?php echo HTTP_ROOT;?>/img/8.jpg" class="star all-star-img">
                                                    </div>
                                                  </div>
                                              </div>     
                                                     
                                              <!-- ********text************ -->
                                        </div> 
                                      <?php } }?>
                                  </div><!-- tab 1 / -->
                                </div>
                              </div> 
                            </div>
                              <div class="past-tab">
                                <div class="col-xs-12 col-sm-12" style="margin-bottom: 5px; margin-top: 5px; border: 2px solid #00CDC6;"></div>
                                <div class="panel-heading col-xs-12 sr_class_acc01">
                                    <div class="panel-title">
                                     
                                          <span class="sr_class_acc01 sr_class_acc_text1" style="box-sizing:none;float:left;">
                                            Past Classes</span>
                                          <span class="sr_class_acc_icon">
                                            
                                          </span>
                                       
                                    </div>
                                </div>
                                <div id="collapsefour" class=" col-xs-12 sr_pv_padding_lr myprflbrd">
                                    <div class="panel-body jstify col-xs-12 sr_pv_padding_lr">
                                      <div class="col-xs-12 col-sm-12 sr_2605_03_padding sr_pv_padding_lr" id="#">
                                        <?php if(!empty($past_class)){
                                          foreach ($past_class as $result) {

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
                                                  <?php if($result['VendorClasse']['upload_class_photo'] != ""){?>
                                                    <img src="<?php echo HTTP_ROOT;?>/img/Vendor/class_image/<?php 
                                                    echo $result['VendorClasse']['upload_class_photo'];?>" class="img_res img-responsive" style="width:484px;height:253px;border:2px solid black;">
                                                    <?php }else{?>
                                                    <img src="<?php echo HTTP_ROOT;?>/img/Vendor/class_image/defult_pic.png" class="img_res img-responsive" style="width:484px;height:253px;border:2px solid black;">
                                                    <?php } ?>
                                                    <div class="image_price12 pull-right">
                                                      <span class="ccc" style="color:white">
                                                        &#8377;<?php echo $result['VendorClasse']['price_per_head'];?></span>
                                                    </div>

                                                  </div>  
                                                </div><!-- ********images************ -->
                                                  
                                                    <!-- ********text************ -->
                                              
                                              <div class="col-md-6 col-sm-6 col-xs-12 text_res sr_2605_03_padding status-div" >
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
                                                   <!--  <a href="<?php echo HTTP_ROOT;?>/Homes/bookClass/<?php echo base64_encode($result['VendorClasse']['id']); ?>">   
                                                      <div class="col-xs-12 col-sm-12" style="text-align: right;padding-right:0px;"><button class="booking">Booking Status</button></div></a>  -->
                                                  </div>
                                              </div>        
                                            <!-- ********text************ --> 

                                          </div> 
                                        <?php } }?>                                    
                                      </div><!-- tab 1 / -->
                                    </div>
                                  </div>
                                </div>
                            </div>
                          </div>
                      </div>
                      <div id="wishlistt" class="col-xs-12 sr_pv_padding_lr myprflbrd" style="">
                              <div class="panel-body jstify col-xs-12 sr_pv_padding_lr">
                               <!--  <div class="col-md-12 col-sm-12 col-xs-12 vid" id="photo3">
                                  <div class="col-md-3 col-sm-4 col-xs-6 photos" id="">My Wishlist</div>
                                </div> -->
                                <div class="col-xs-12 col-sm-12 sr_2605_03_padding sr_pv_padding_lr" id="#">
                                  <div class="col-md-12 col-sm-12 col-xs-12 bgsec">
                                    <div class="col-md-3 col-sm-3 col-xs-6 photos1" id="photo">My Wishlist</div>
                                  </div>
                                  <?php if(!empty($wishlist_data)){
                                    
                                    foreach ($wishlist_data as $result) {

                                    ?>           
                                    <div class="col-sm-12 col-xs-12 sr_260501 sr_pv_padding_lr" style="padding-bottom: 15px; border-bottom: 2px solid #00477b; background:#fff;"> 
                                          <!-- ********images************ -->
                                          <div class="col-md-5 col-sm-12 col-xs-12 padd_l_r1 img-responsive"  style="margin-top: 15px;">
                                            <div class="col-xs-12 col-sm-12 col-md-offset-1 col-md-10">
                                              <?php 
                                                echo "<span class='flexible-fixed'>";
                                                echo ($result['vancs']['class_timing_id'] == 2)?'Fixed':'Flexible';
                                                echo "</span>";
                                              ?>
                                              <?php if(!empty($result['vancs']['upload_class_photo'])){?>
                                                <img src="<?php echo HTTP_ROOT;?>/img/Vendor/class_image/<?php 
                                                echo $result['vancs']['upload_class_photo'];?>" class="img_res img-responsive" style="width:484px;height:253px;border:2px solid black;">
                                              <?php }else{?>
                                                <img src="<?php echo HTTP_ROOT;?>/img/Vendor/class_image/defult_pic.png" class="img_res img-responsive" style="width:484px;height:253px;border:2px solid black;">
                                              <?php } ?>
                                              <div class="image_price12 pull-right">
                                                <span class="ccc" style="color:white">
                                                  &#8377;<?php echo $result['vancs']['price_per_head'];?></span>
                                              </div>

                                            </div>  
                                          </div><!-- ********images************ -->
                                           
                                            <!-- ********text************ -->
                                              <div class="col-md-6 col-sm-6 col-xs-12 text_res sr_2605_03_padding status-div" >
                                                 <div class="col-xs-12 col-sm-12 sr_2605_06 sr_2605_06_textLorem021 sr_pv_padding_lr txt_cntnt">
                                                    <div class="hathyga up-com-post col-xs-12 col-sm-12 sr_2605_03_padding upcoming-class-title">
                                                      <?php echo $result['vancs']['class_topic'];?>
                                                    </div>
                                                    <div class="col-xs-12 col-sm-12 sr_2605_03_padding sr_serch_div_l_hite sr_class_acc_div padd_l_r" style="margin-bottom:7px;">

                                                      <div class="row">
                                                        <div class="col-md-2 col-sm-2 col-xs-2 upcom-img-class">
                                                          <img class="img-responsive" style="display: inline; margin-right: 5px;" src="<?php echo HTTP_ROOT;?>/img/fun&refreshment/location.png">
                                                        </div>
                                                        <div class="col-md-10 col-sm-10 col-xs-10 sr_class_acc_text02 upclass-location">
                                                          <?php echo $result['vancs']['location'];?>
                                                        </div>
                                                      </div>
                                                    </div>
                                                    <div class="col-xs-12 col-sm-12 sr_2605_03_padding sr_serch_div_l_hite sr_class_acc_div padd_l_r" style="margin-bottom:7px;">
                                                      <div class="row">
                                                        <div class="col-md-2 col-sm-2 col-xs-2 upcom-img-class">
                                                          <img class="img-responsive" style="display: inline; margin-right: 5px;" src="<?php echo HTTP_ROOT;?>/img/fun&refreshment/user.png">
                                                        </div>
                                                        <div class="col-md-10 col-sm-10 col-xs-10 sr_class_acc_text02 upclass-location">
                                                        <strong> By :</strong> 
                                                          <?php echo ucfirst($result['usermaster']['first_name']);?>
                                                        </div>
                                                      </div>
                                                    </div>
                                                    <div class="col-xs-12 col-sm-12 sr_2605_03_padding sr_serch_div_l_hite sr_class_acc_div padd_l_r" style="margin-bottom:7px;">
                                                      <div class="row">
                                                        <div class="col-md-2 col-sm-2 col-xs-2 upcom-img-class">
                                                          <img class="img-responsive" style="display: inline; margin-right: 5px;" src="<?php echo HTTP_ROOT;?>/img/fun&refreshment/session.png">
                                                        </div>
                                                        <div class="col-md-10 col-sm-10 col-xs-10 sr_class_acc_text02 upclass-location">
                                                        <strong><?php echo ucfirst($result['vancs']['no_of_session']);?></strong>&nbsp;Session
                                                        </div>
                                                      </div>
                                                    </div>
                                                    <div class="col-xs-12 col-sm-12 sr_serch_div_l_hite sr_class_acc_div padd_l_r" style="margin-bottom:7px;">
                                                       <div class="row">
                                                        <div class="col-md-2 col-sm-2 col-xs-2 upcom-img-class">
                                                        <img class="img-responsive" style="display: inline; margin-right: 5px;" src="<?php echo HTTP_ROOT;?>/img/fun&refreshment/calander.png"></div>
                                                        <div class="col-md-10 col-sm-10 col-xs-10 upclass-location">
                                                          <?php if($result['vancs']['class_timing_id'] == 1){?>
                                                            <div class="col-md-8 col-sm-8 col-xs-8 sr_class_acc_text02 past-timming-div-first" >
                                                            <?php echo $result['vancs']['class_duration'];?></div>&nbsp;
                                                          <?php }else{?>
                                                          <div class="row">
                                                            <div class="col-md-4 col-sm-4 col-xs-4 sr_class_acc_text02 past-timming-div-first" >
                                                            <?php echo $result['vancs']['starting_month'];?></div>&nbsp;
                                                            <div class="col-md-7 col-sm-7 col-xs-6 past-timmg-div-second">
                                                              <div class="col-md-2 col-sm-2 col-xs-2 upcom-img-class">
                                                                <img class="img-responsive" style="display: inline; margin-right: 5px;" src="<?php echo HTTP_ROOT;?>/img/fun&refreshment/clock.png">
                                                              </div>
                                                              <div class="col-md-10 col-sm-10 col-xs-10 sr_class_acc_text02 upclass-location"><?php echo $result['vancs']['time_of_day'];?></div>
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
                                                            <?php echo substr($result['vancs']['class_summary'], 0, 150),".......";?>
                                                          </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12 col-sm-12 padd_l_r"><img src="<?php echo HTTP_ROOT;?>/img/8.jpg" class="star all-star-img"></div>
                                                 
                                                  </div>
                                              </div>        
                                            <!-- ********text************ --> 

                                    </div> 
                                  <?php }  }else{ ?>

                                      <div class="col-sm-12 col-xs-12 sr_260501 sr_pv_padding_lr" 
                                        style="padding-bottom: 15px; border-bottom: 2px solid #00477b; background:#fff;">
                                        <center>
                                          <span> 
                                             No Record Found ! 
                                          </span>
                                        </center>  
                                      </div>  
                                <?php } ?>                                    
                                </div><!-- tab 1 / -->
                              </div>
                            </div>
                </div>  
           <!--  </div>  -->    
              <!-- *************hide1*************** -->

            <!-- *************hide2*************** -->            
  </div>  
  <!-- ***************navbar******************** -->
  <link  rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
<script>
$(function(){
$("#datepicker").datepicker({

dateFormat: 'dd/mm/yy',

});
});
</script>
 <script>
function ClickUpload() {
$("#FileUpload").trigger('click');
}
function ClickUpload1() {
$("#FileUpload1").trigger('click');
}
$(document).ready(function(){
   $('#success_msg').delay(3000).fadeOut();

  $('.upcoming_class').click(function(){
    var id=$(this).attr('id');
    window.location.href="<?php echo HTTP_ROOT;?>/Homes/classDetail/"+btoa(id);
  });
  $('.past_class').click(function(){
    var id=$(this).attr('id');
    window.location.href="<?php echo HTTP_ROOT;?>/Homes/classDetail/"+btoa(id);
  });
  // $('.upcoming-class-title').click(function(){
  //   var id = $(this'.upcoming_class').attr('id');
  //   //alert(id);
  //   window.location.href = "<?php echo HTTP_ROOT;?>/Homes/classDetail/"+btoa(id);
  // });

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
    $("#editrpost").click(function() {
  //alert('hi');
  var  e_class_id    = $("#e_class_id").val();
  var  e_start_date  = $("#e_start_date").val();
  var  e_end_date    = $("#e_end_date").val();
  
 if(e_start_date==''){
    $('#error_get').html('Please Choose Start Date');
    return false;
  }
  else if(e_end_date==''){
    $('#error_get').html('Please Choose End Date');
    return false;
  }
  else{
  var query = $('#registration_form22').serialize();
        var url = '<?php echo HTTP_ROOT; ?>/Homes/Repost';
              $.post(url, query, function (response) {
              //alert (response);
               if(response==1){
                alert('Update successfully');
                  $("#quote_btn_click").modal('hide');
            }
          });
    }
  });
    $('#notification').on('click',function(){
   alert('Notification Functionality Comming Soon');
});
     var type='<?php echo $user_view['UserMaster']['vendor_type_id'];?>';
     if(type==1){
      $('#vendor_indivisual_dob').hide();
       $('#vendor_org').show();
     }
     if(type==2){
        $('#vendor_indivisual_dob').show();
        $('#vendor_org').hide();
     }
     $('#vendor_Type').on('change',function(){
       var type=$(this).val();
       if(type==1){
        $('#vendor_indivisual_dob').hide();
       $('#vendor_org').show();
       }
       else{
       $('#vendor_indivisual_dob').show();
       $('#vendor_org').hide();
       }

       });
      var page_sct_name = "<?php echo $page_section_name; ?>";
        
        if(page_sct_name == "video"){

              setTimeout(function(){ 
              $("#video").trigger('click'); 
          
            }, 1);
       
        }

        if(page_sct_name == 'pastclass'){

            setTimeout(function(){ 
              $("#sr_class").trigger('click'); 
              $('.post-class').trigger('click');
              
            }, 1);
        }

        if(page_sct_name == 'Wishlist'){

            setTimeout(function(){             
               $('#buyer1').trigger('click');
               $('.wish-seg').trigger('click'); 
            }, 1);
        }

        if(page_sct_name == 'Booking'){

            setTimeout(function(){             
               $('#buyer1').trigger('click');
               $('.my-clas-seg').trigger('click'); 
            }, 1);
        }

        if(page_sct_name == 'lerner'){ 

            setTimeout(function(){             
               
               $('#buyer1').trigger('click');
               $('#profile1').trigger('click');
                
            }, 1);
        }

         if(page_sct_name == 'my_class'){ 

           setTimeout(function(){ 
              $("#sr_class").trigger('click'); 
               
            },1);
        }

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
      // $('.profile-segg').css('background-color','#00CDC6');
      // $('.profile-segg').css('color','#fff');
      // $('.photo-seg').css('background-color','#fff');
      // $('.photo-seg').css('color','#00CDC6');
      // $('.video-seg').css('background-color','#fff');
      // $('.video-seg').css('color','#00CDC6');
    })
    $('#buyer1').click(function(){
      $('.my-clas-seg').show();
      $('.wish-seg').show();
      $('.photo-seg').hide();
      $('.video-seg').hide();
      // $('.profile-segg').css('background-color','#00CDC6');
      // $('.profile-segg').css('color','#fff');
      // $('.my-clas-seg').css('background-color','#fff');
      // $('.my-clas-seg').css('color','#00CDC6');
      // $('.wish-seg').css('background-color','#fff');
      // $('.wish-seg').css('color','#00CDC6');
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
      // $('#my-classs').show();
      // $('.photos').hide();
      // $('.lernr-class').hide();
      //$('#photo1').hide();
    });
    $('#upload_image').click(function(){
     
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
$('#buyer1').click(function(){

$('#vendor_data').hide();
$('#lerner_data').show();


});
$('#vndr1').click(function(){
  
 $('#vendor_data').show();
 $('#lerner_data').hide();

});
$('#interest').multiselect({
      nonSelectedText: 'Select Interest Areas',
      
    });

 //});
/*$("#locality_id").multiselect({
    multiple: false,
    header: true,
    selectedList: 1,
    open: function () {  
        $("#locality_id").multiselect("close");
    }
}); */
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
         <!-- Start Edit and Repost Model Box -->

                      <div class="modal fade" id="quote_btn_click">
                        <div class="modal-dialog">
                          <div class="modal-content col-xs-12 col-sm-12 padd_l_r">
                            <div class="modal-header col-xs-12 col-sm-12" style="background-color:#2bcdc1;">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title cat_mod_title" >Edit/Repost</h4>
                            </div>

                            <div class="modal-body col-xs-12 col-sm-12 padd_l_r">
                              <div id="error_get" class="error-gift"></div>
                              
                              <div class="col-xs-12 col-sm-12 col-md-12">
                              <form id="registration_form22">
                              <input type="hidden" name="class_id" id="class_id" value="<?php echo $c_id; ?>">
                              <input type="hidden" name="catalog_id" id="catalog_id" value="<?php echo $cl_id; ?>">
                              <center><div id="error_get" class="error-gift"></div></center> 
                              <div class="col-xs-12 col-sm-12 col-md-12 popup_m_top_22">
                                <input type="hidden" name="e_class_id" id="e_class_id" value="<?php echo $result['VendorClasse']['id']; ?>">
                                              <div class="col-xs-5 col-sm-5 col-md-5 padd_l_r">
                                                <input type="text" name="e_start_date" placeholder="Start Date" id="e_start_date" class="form-control"></div>
                                                <div class="col-xs-2 col-sm-2 col-md-2 padd_l_r">&nbsp;&nbsp;</div>

                                                <div class="col-xs-5 col-sm-5 col-md-5 padd_l_r">
                                                <input type="text" name="e_end_date" placeholder="End Date" id="e_end_date" class="form-control"></div>
                                              <div class="col-xs-12 col-sm-12 col-md-12 padd_l_r " id="err_22_3">&nbsp;</div>
                                </div>
                                          <div class="">&nbsp;</div>
                                  <div class="col-xs-12 col-sm-12 popup_m_top_22">
                                            <center><button id="editrpost" class="btn btn-primary" type="button" style="background-color:#2bcdc1;">Update</button></center>
                                  </div>
                                 </form>
                                <div class="">&nbsp;</div>
                              </div>
                              
                            </div>
                          </div>
                        </div>
                      </div> 
<!-- End Model Box -->

         <script type="text/javascript">
function mypopup(){ 

$("#quote_btn_click").modal('show');

}

</script>

<script type="text/javascript">
$("#e_start_date").datepicker({yearRange:'1900:2030',minDate:0,changeYear: true, changeMonth: true });
</script>
<script type="text/javascript">
$("#e_end_date").datepicker({yearRange:'1900:2030',minDate:0,changeYear: true, changeMonth: true });
</script>
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
                    $('.past-tab').hide()              
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
              $('#sr_class1').hide();
              $("#profile1").fadeIn();
              $("#profile").css('background','#00CDC6');
              $("#profile").css('color','#FFF');
              $("#video").css('background','#FFF');
              $("#profile").removeClass('seg786');
              $("#video").css('color','#00CDC6');
              $("#video1").fadeOut();
              $("#sr_class").css('background','#fff');
              $("#sr_class").css('color','#00CDC6');
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
          });

            $("#photo").click(function(){
             
              $("#photo1").fadeIn();
              $("#photo2").fadeOut();
              $("#photo3").fadeOut();
              // alert("hii");
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
  $('.booking_repost').click(function(){
   var id=$(this).attr('id');
     });
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
  
</script>

