<?php if($user_view['UserMaster']['user_type_id']=='1'){?>
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
    border: 0px solid #00477B !important;
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

   background-color: #54c0c1;
    border-radius: 40%;
    bottom: 239px;
    height: 48px;
    position: relative;
    width: 90px;
    margin-right:8px;
}
.ccc{
     bottom: -10px;
    font-size: 20px;
    padding-left: 32px;
    padding-top: 20px;
    position: relative; 
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
    position: relative;
    bottom: 50px;
    right: -5px;
}
.pimgtop{padding: 5px;
}
.booking{
background-color:#00477B;
color:#fff;
border-radius:30%;
}
.clrdash123 {
    background-color: #30AFA8;
    padding: 10px 0px;
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
                        <p><a href="#" class="logout_a">Profile</a></p>
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
                   <?php if($user_view['UserMaster']['user_type_id']=='1'){?> 

                    <span><img src="<?php echo HTTP_ROOT;?>/img/Vendor/profile/<?php echo $user_view['UserMaster']['profile_image'];?>" class="rth321 prflimg" style="height:132px;border-radius:50%;border:2px solid white;"></span>
                    
                    <!-- file upload -->
                   
                    <?php }else if($user_view['UserMaster']['user_type_id']=='2'){?>
                     <span><img src="<?php echo HTTP_ROOT;?>/img/Buyer/profile/<?php echo $user_view['UserMaster']['profile_image'];?>" class="rth321" style="width:123px;height:132px;border-radius:50%;border:2px solid white;"></span>
                     
                    <!-- file upload -->
                    
                    <?php }else if($user_view['UserMaster']['user_type_id']==''){?>
                     <span><img src="<?php echo $user_view['UserMaster']['profile_image'];?>" class="rth321 prflimg" style="width:123px; height:132px;border-radius:50%;border:2px solid white;"></span>
                     <!-- file upload -->
                    
                    <?php }else{?>
                    <span><img src="<?php echo HTTP_ROOT;?>/img/profile_img/ruth_img.png" class="rth321 prflimg" style="width:123px; height:132px;border-radius:50%;border:2px solid white;"></span>
                    <!-- file upload -->
                    

                    <?php }?>

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
                        <img src="<?php echo HTTP_ROOT;?>/img/profile_img/notification.png" class="note321">
                        <img src="<?php echo HTTP_ROOT;?>/img/profile_img/message.png" class="msg543">
                    </div>
                </div>
              </div>  
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="pull-right">
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
            <div class="col-md-2 col-sm-2 col-xs-4 seg seg786" id="profile">Profile</div>
            <div class="col-md-2 col-sm-2 col-xs-4 seg" id="video">Photos & Videos</div>
            <div class="col-md-2 col-sm-2 col-xs-4 seg seg2" id="sr_class">Classes</div>
          </div>

              <!-- *************hide1*************** -->
          <div class="col-md-12 col-sm-12 col-xs-12 padd_l_r" id="profile1" style="">
              <div class="col-md-12 col-sm-12 col-xs-12 vid" id="photo3">
                <div class="col-md-3 col-sm-3 col-xs-6 photos" id="">My Profile</div>
                <div class="col-md-9 col-sm-9 col-xs-6 photos" id="photo"><i class="fa fa-pencil-square-o pull-right" aria-hidden="true"></i></div>
              </div>
              <div class="col-md-12 col-sm-12 col-xs-12 padd_l_r myprflbrd" id="photo2">
                  <div class="col-md-12 col-sm-12 col-xs-12 bgsec">
                    <div class="col-md-3 col-sm-3 col-xs-6 photos1" id="photo">Section 1</div>
                    <div class="col-md-8 col-sm-8 col-xs-6 photos1" id="vid"><i class="fa fa-minus pull-right" aria-hidden="true"></i></div>
                    <div class="col-md-8 col-sm-8 col-xs-6 photos1" style="display:none;" id="vid"><i class="fa fa-plus pull-right" aria-hidden="true"></i></div>
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
                      <span><?php echo $user_view['UserMaster']['contact_no'];?></span>
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
                   <?php if(($user_view['UserMaster']['user_type_id'])=='1'){?>
                 
                  <!-- *****************Interest************** -->
                  <!-- *****************section 2************* -->
                  <div class="col-md-12 col-sm-12 col-xs-12 bgsec">
                    <div class="col-md-3 col-sm-3 col-xs-6 photos1" id="photo">Section 2</div>
                    <div class="col-md-8 col-sm-8 col-xs-6 photos1" id="vid"><i class="fa fa-minus pull-right" aria-hidden="true"></i></div>
                    <div class="col-md-8 col-sm-8 col-xs-6 photos1" style="display:none;" id="vid"><i class="fa fa-plus pull-right" aria-hidden="true"></i></div>
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
                    <div class="col-md-3 col-sm-3 col-xs-6 photos1" id="photo">Section 3</div>
                    <div class="col-md-8 col-sm-8 col-xs-6 photos1" id="vid"><i class="fa fa-minus pull-right" aria-hidden="true"></i></div>
                    <div class="col-md-8 col-sm-8 col-xs-6 photos1" style="display:none;" id="vid"><i class="fa fa-plus pull-right" aria-hidden="true"></i></div>
                  </div>
                  <!-- *****************section 3************* -->
                  <!-- *****************Teaching Experience************** -->
                  <div class="col-md-12 col-sm-12 col-xs-12 detail">
                    <div class="col-md-3 col-sm-6 col-xs-4 br_name b_pad">
                      <img src="<?php echo HTTP_ROOT;?>/img/profile_img/experience.png">
                      <span>Teaching Experience:</span>
                    </div>
                    <div class="col-md-9 col-sm-6 col-xs-8 br_name1">
                      <span><?php echo !empty($user_view['UserMaster']['coaching_experience'])?$user_view['UserMaster']['coaching_experience']:"N/A";?></span>
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
              <!-- ******************hide 1.1************** -->
              <div class="col-md-12 col-sm-12 col-xs-12 padd_l_r myprflbrd" style="display:none;" id="photo1">
                  <div class="col-md-12 col-sm-12 col-xs-12 vid padd_l_r">
                    <div class="col-md-2 col-sm-3 col-xs-6 photos" id="photo4">My Profile</div>
                    <div class="col-md-10 col-sm-9 col-xs-6 photos" id="vid">
                      <i class="fa fa-eye pull-right" aria-hidden="true" id="view"></i>
                  </div>
                  </div>
                  <div class="col-md-12 col-sm-12 col-xs-12 bgsec">
                    <div class="col-md-2 col-sm-3 col-xs-6 photos1" id="photo">Section 1</div>
                    <div class="col-md-8 col-sm-8 col-xs-6 photos1" id="vid"><i class="fa fa-minus pull-right" aria-hidden="true"></i></div>
                    <div class="col-md-8 col-sm-8 col-xs-6 photos1" style="display:none;" id="vid"><i class="fa fa-plus pull-right" aria-hidden="true"></i></div>
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
                    <div class="col-md-8 col-sm-8 col-xs-6 photos1" id="vid"><i class="fa fa-minus pull-right" aria-hidden="true"></i></div>
                    <div class="col-md-8 col-sm-8 col-xs-6 photos1" style="display:none;" id="vid"><i class="fa fa-plus pull-right" aria-hidden="true"></i></div>
                  </div>
                  <!-- *****************section 2************* -->
                  <!-- *****************Institution************** -->
                  <div class="col-md-12 col-sm-12 col-xs-12 detail1">
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
                  <div class="col-md-12 col-sm-12 col-xs-12 detail1">
                    <div class="col-md-3 col-sm-4 col-xs-4 br_name">
                      <img src="<?php echo HTTP_ROOT;?>/img/profile_img/are.png">
                      <span>Registration Id:</span>
                    </div>
                    <div class="col-md-5 col-sm-7 col-xs-8 br_name1">
<?php echo $this->Form->input('official_reg_id',array('type'=>'text','class'=>'form-control reg_input input_text','id'=>'email','label'=>false,'div'=>false,'placeholder'=>'Registration Id','value'=>$user_view['UserMaster']['official_reg_id']));?>
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
                       <?php echo $this->Form->input('address',array('type'=>'textarea','class'=>'form-control reg_input input_text','id'=>'address','label'=>false,'div'=>false,'placeholder'=>' Address','value'=>$user_view['UserMaster']['address']));?></div>
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
                       'value'=>$user_view['UserMaster']['description']));?></div>
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
                    <div class="col-md-8 col-sm-8 col-xs-6 photos1" id="vid"><i class="fa fa-minus pull-right" aria-hidden="true"></i></div>
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
                  <!-- *****************Gender************** -->
                  <!-- *****************Qualification************** -->
                    <!-- **************button*************** -->
                    <div class="col-md-8 col-sm-8 col-xs-8 br_butt">
                      <button class="btn pull-right update">Update</button>
                    </div>
                    <?php echo $this->Form->end();?>
                    <!-- **************button*************** -->
                  </div>
                  <?php }else{?>
                <div class="col-md-12 col-sm-12 col-xs-12 bgsec">
                    <div class="col-md-2 col-sm-3 col-xs-6 photos1" id="photo">Section 2</div>
                    <div class="col-md-8 col-sm-8 col-xs-6 photos1" id="vid"><i class="fa fa-minus pull-right" aria-hidden="true"></i></div>
                    <div class="col-md-8 col-sm-8 col-xs-6 photos1" style="display:none;" id="vid"><i class="fa fa-plus pull-right" aria-hidden="true"></i></div>
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
         <!--  </div> -->     
            <!-- *************hide1*************** -->

          <!-- *************hide2*************** -->
          <div class="col-md-12 col-sm-12 col-xs-12 padd_l_r" id="video1" style="display:none;">
            <div class="col-md-12 col-sm-12 col-xs-12 padd_l_r" id="photo1"> 
                <div class="col-md-12 col-sm-12 col-xs-12 vid padd_l_r">
                    <div class="col-md-2 col-sm-2 col-xs-4 photos sr_photo01" id="sr_photo_g">Photos</div>
                    <div class="col-md-2 col-sm-2 col-xs-4 photos sr_video01" id="vid">Videos</div>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12 sr_pv_padding_lr myprflbrd" id="sr_photo">
                  <div class="col-md-12 col-sm-12 col-xs-12 vid1">
                      <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="col-md-12 col-sm-12 col-xs-12 march"></div>
                      </div>
                      <div class="col-md-12 col-sm-12 col-xs-12 sr_pv_padding_lr01">
                        <!-- image gallery 1 -->
                        <?php if(!empty($class_pics)){
                          foreach($class_pics as $result){?>
                          
                          <div class="col-md-3 col-sm-3 col-xs-6 pimgtop"><img class="img-responsive yogaimg" src="<?php echo HTTP_ROOT;?>/img/Vendor/class_image/<?php echo $result['VendorClasse']['upload_class_photo'];?>" style="width:100%;height:200px;border:2px solid black;"></div>
                        <?php }} ?>
                      </div>
                  </div> 
                </div> 
                <div class="col-md-12 col-sm-12 col-xs-12 sr_pv_padding_lr myprflbrd" id="sr_video" style="display:none;">
                  <div class="col-md-12 col-sm-12 col-xs-12 vid1">
                      <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="col-md-12 col-sm-12 col-xs-12 march"></div>
                      </div>
                      <div class="col-md-12 col-sm-12 col-xs-12 sr_pv_padding_lr01">
                        <!-- image gallery 1 -->
                        <?php if(!empty($class_video)){
                          foreach($class_video as $result){
                            if(!empty($result['VendorClasse']['upload_video_name'])){?>
                          
                          <div class="col-md-3 col-sm-3 col-xs-6 pimgtop"><img class="img-responsive yogaimg" src="<?php echo HTTP_ROOT;?>/img/Vendor/class_image/<?php echo $result['VendorClasse']['upload_class_photo'];?>" style="width:100%;height:200px;border:2px solid black;"></div>
                        <?php }}} ?>
                      </div>
                  </div> 
                  
                </div>
              <!-- *************hide2*************** -->
            </div>
          </div>
          <div class="col-md-12 col-sm-12 col-xs-12 padd_l_r" id="sr_class1" style="display:none;"> 
                <div class="col-md-12 col-sm-12 col-xs-12 vid padd_l_r">
                  <div id="xxxx">
                    <div id="cls" class="col-sm-12 col-xs-12 photos" style="text-align: left;">Classes</div>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12 padd_l_r" style="margin-top: 3px;">
                      <div class="panel-group col-xs-12 sr_pv_padding_lr padd_l_r" id="accordion" style="border-bottom: 3px solid #00477b; padding-bottom: 3px;">
                          
                          <div class="panel-heading col-xs-12 sr_class_acc01">
                              <div class="panel-title">
                                  <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"  style="padding: 0px;">
                                    <span class="sr_class_acc01 sr_class_acc_text1" style="box-sizing:none;float:left;">Upcoming Classes</span>
                                    <span class="sr_class_acc_icon"><i class="fa fa-plus" aria-hidden="true" style="float:right">&nbsp;</i></span>
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
                                                    <a href="<?php echo HTTP_ROOT;?>/Homes/classDetail/<?php echo $result['VendorClasse']['id'];?>" ><img src="<?php echo HTTP_ROOT;?>/img/Vendor/class_image/<?php 
                                                    echo $result['VendorClasse']['upload_class_photo'];?>" class="img_res img-responsive" style="width:484px;height:253px;border:2px solid black;"></a>
                                                    <div class="image_price12 pull-right">
                                                      <span class="ccc" style="color:white">
                                                        $&nbsp;<?php echo $result['VendorClasse']['price_per_head'];?></span>
                                                    </div>

                                                  </div>  
                                                </div><!-- ********images************ -->
                                                <!-- ********text************ -->
                                                
                                                <div class="col-md-7 col-sm-12 col-xs-12 text_res sr_2605_03_padding">
                                                   <div class="col-xs-12 col-sm-12 sr_2605_06 sr_2605_06_textLorem021 sr_pv_padding_lr txt_cntnt">
                                                      <div class="hathyga col-xs-12 col-sm-12 sr_2605_03_padding">
                                                        <?php echo $result['VendorClasse']['class_topic'];?></div>
                                                      <div class="col-xs-12 col-sm-12 sr_2605_03_padding sr_serch_div_l_hite sr_class_acc_div padd_l_r">
                                                        <img class="img-responsive" style="display: inline; margin-top: -12px; margin-right: 5px;" src="<?php echo HTTP_ROOT;?>/img/fun&refreshment/location.png">
                                                        <span class="sr_class_acc_text02">Chennai</span>
                                                      </div>
                                                      <div class="col-xs-12 col-sm-12 sr_serch_div_l_hite sr_class_acc_div padd_l_r">
                                                        <img class="img-responsive" style="display: inline; margin-top: -12px; margin-right: 5px;" src="<?php echo HTTP_ROOT;?>/img/fun&refreshment/calander.png">&nbsp;&nbsp;
                                                        <span class="sr_class_acc_text02">
                                                          <?php echo $result['VendorClasse']['starting_month'];?></span>&nbsp;
                                                        <img class="img-responsive" style="display: inline; margin-top: -12px; margin-right: 5px;" src="<?php echo HTTP_ROOT;?>/img/fun&refreshment/clock.png">
                                                        <span class="sr_class_acc_text02">9am to 5pm</span>
                                                      </div>
                                                      <div class="col-xs-12 col-sm-12  sr_2605_06_textLorem sr_serch_div_l_hite sr_class_acc_div padd_l_r">
                                                        <img class="img-responsive" style="display: inline; margin-top: -12px; margin-right: 5px;" src="<?php echo HTTP_ROOT;?>/img/fun&refreshment/information.png">
                                                        <span class="sr_class_acc_text02">
                                                        <?php echo substr($result['VendorClasse']['class_summary'], 0, 50),".......";?>
                                                        </span>
                                                      </div>
                                                      <div class="col-xs-12 col-sm-12 padd_l_r"><img src="<?php echo HTTP_ROOT;?>/img/8.jpg" class="star" style="height: 25px;"></div>
                                                      <div class="col-xs-12 col-sm-12" style="text-align: right;padding-right:151px;"><button class="booking">Booking Status</button></div>
                                                    </div>
                                                </div>        
                                                <!-- ********text************ -->
                                          </div> 
                                        <?php } }?>
                                    </div><!-- tab 1 / -->
                              </div>
                          </div> 

                          <div class="col-xs-12 col-sm-12" style="margin-bottom: 5px; margin-top: 5px; border: 2px solid #00477b;"></div>

                          <div class="panel-heading col-xs-12 sr_class_acc01">
                              <div class="panel-title">
                                  <a data-toggle="collapse" data-parent="#accordion" href="#collapsetwo"  style="padding: 0px;">
                                    <span class="sr_class_acc01 sr_class_acc_text1" style="box-sizing:none;float:left;">Past Classes</span>
                                    <span class="sr_class_acc_icon"><i class="fa fa-plus" aria-hidden="true" style="float:right">&nbsp;</i></span>
                                  </a>
                              </div>
                          </div>

                          <div id="collapsetwo" class="panel-collapse collapse col-xs-12 sr_pv_padding_lr myprflbrd">
                              <div class="panel-body jstify col-xs-12 sr_pv_padding_lr">
                                    <div class="col-xs-12 col-sm-12 sr_2605_03_padding sr_pv_padding_lr" id="#">
                                       <?php if(!empty($past_class)){
                                                  foreach ($past_class as $result) {

                                                  ?>           
                                          <div class="col-sm-12 col-xs-12 sr_260501 sr_pv_padding_lr" style="padding-bottom: 15px; border-bottom: 2px solid #00477b; background:#fff;"> 
                                                <!-- ********images************ -->
                                                <div class="col-md-5 col-sm-12 col-xs-12 padd_l_r1 img-responsive"  style="margin-top: 15px;">
                                                  <div class="col-xs-12 col-sm-12 col-md-offset-1 col-md-10">
                                                    <img src="<?php echo HTTP_ROOT;?>/img/Vendor/class_image/<?php 
                                                    echo $result['VendorClasse']['upload_class_photo'];?>" class="img_res img-responsive" style="width:484px;height:253px;border:2px solid black;">
                                                    <div class="image_price12 pull-right">
                                                      <span class="ccc" style="color:white">
                                                        $&nbsp;<?php echo $result['VendorClasse']['price_per_head'];?></span>
                                                    </div>

                                                  </div>  
                                                </div><!-- ********images************ -->
                                                <!-- ********text************ -->
                                                
                                                <div class="col-md-7 col-sm-12 col-xs-12 text_res sr_2605_03_padding">
                                                   <div class="col-xs-12 col-sm-12 sr_2605_06 sr_2605_06_textLorem021 sr_pv_padding_lr txt_cntnt">
                                                      <div class="hathyga col-xs-12 col-sm-12 sr_2605_03_padding">
                                                        <?php echo $result['VendorClasse']['class_topic'];?></div>
                                                      <div class="col-xs-12 col-sm-12 sr_2605_03_padding sr_serch_div_l_hite sr_class_acc_div padd_l_r">
                                                        <img class="img-responsive" style="display: inline; margin-top: -12px; margin-right: 5px;" src="<?php echo HTTP_ROOT;?>/img/fun&refreshment/location.png">
                                                        <span class="sr_class_acc_text02">Chennai</span>
                                                      </div>
                                                      <div class="col-xs-12 col-sm-12 sr_serch_div_l_hite sr_class_acc_div padd_l_r">
                                                        <img class="img-responsive" style="display: inline; margin-top: -12px; margin-right: 5px;" src="<?php echo HTTP_ROOT;?>/img/fun&refreshment/calander.png">&nbsp;&nbsp;
                                                        <span class="sr_class_acc_text02">
                                                          <?php echo $result['VendorClasse']['starting_month'];?></span>&nbsp;
                                                        <img class="img-responsive" style="display: inline; margin-top: -12px; margin-right: 5px;" src="<?php echo HTTP_ROOT;?>/img/fun&refreshment/clock.png">
                                                        <span class="sr_class_acc_text02">9am to 5pm</span>
                                                      </div>
                                                      <div class="col-xs-12 col-sm-12  sr_2605_06_textLorem sr_serch_div_l_hite sr_class_acc_div padd_l_r">
                                                        <img class="img-responsive" style="display: inline; margin-top: -12px; margin-right: 5px;" src="<?php echo HTTP_ROOT;?>/img/fun&refreshment/information.png">
                                                        <span class="sr_class_acc_text02">
                                                        <?php echo substr($result['VendorClasse']['class_summary'], 0, 50),".......";?>
                                                        </span>
                                                      </div>
                                                      <div class="col-xs-12 col-sm-12 padd_l_r"><img src="<?php echo HTTP_ROOT;?>/img/8.jpg" class="star" style="height: 25px;"></div>
                                                      <div class="col-xs-12 col-sm-12" style="text-align: right;padding-right:151px;"><button class="booking">Booking Status</button></div>
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
  <!-- ***************navbar******************** -->
 <script>
function ClickUpload() {
$("#FileUpload").trigger('click');
}
function ClickUpload1() {
$("#FileUpload1").trigger('click');
}
$(document).ready(function(){

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
$(document).ready(function() {

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
      <script type="text/javascript">
        $(document).ready(function() {
            $("#profile1").show();
        });

        /* sitaram 30.05.2016*/
              /* section 2nd photo & video code */
              $(".sr_photo01").css('background','#00477b');
              $(".sr_photo01").css('color','#fff');

              $(".sr_photo01").click(function(){
                    $(".sr_video01").css('background','#fff');
                    $(".sr_video01").css('color','#00477b');
                    $(".sr_photo01").css('background','#00477b');
                    $(".sr_photo01").css('color','#fff');
                    // alert("hii");
                    $("#sr_photo").fadeIn();
                    $("#sr_video").hide();
              });

              $(".sr_video01").click(function(){
                    $(".sr_photo01").css('background','#fff');
                    $(".sr_photo01").css('color','#00477b');
                    $(".sr_video01").css('background','#00477b');
                    $(".sr_video01").css('color','#fff');
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

                    $("#sr_class").css('background','#00477b');
                    $("#sr_class").css('color','#fff');

                    $("#video").css('background','#fff');
                    $("#video").css('color','#00477b');

                    $("#profile").css('color','#00477b');
                    $("#profile").css('background','#fff');



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
              $("#profile").css('background','#00487B');
              $("#profile").css('color','#FFF');
              $("#video").css('background','#FFF');
              $("#profile").removeClass('seg786');
              $("#video").css('color','#00487B');
              $("#video1").fadeOut();
              $("#sr_class").css('background','#fff');
              $("#sr_class").css('color','#00487B');
          });
           $("#video").click(function(){
              $('#xxxx').hide();
              $('#accordion').hide();
              $("#video1").show();
              $("#video").css('background','#00487B');
              $("#video").css('color','#FFF');
              $("#profile1").fadeOut();
              $("#profile").css('background','#FFF');
              $("#profile").css('color','#00487B');
              $("#profile").removeClass('seg786');
              $("#sr_class").css('background','#fff');
              $("#sr_class").css('color','#00487B');
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
  });</script>