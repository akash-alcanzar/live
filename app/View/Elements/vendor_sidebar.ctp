<?php  $user_data=$this->requestAction(array('controller'=>'Homes', 'action'=>'getUser'), 
                              array('pass'=>array($user_view['UserMaster']['id'])));
                              ?>
   <style type="text/css">
       .profile_img025{
            border-radius: 50%; 
            border: 2px solid white; 
            width: 60px; 
            height: 65px;
       }
       .p_img_div025{width: 65px !important}
       
   </style>                          
<div class="col-md-2 col-lg-2 col-sm-3 col-xs-12 vendor-left-bar" id="s_1_lpad">
            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 s_5_lside1" id="">
                <div class="col-md-4 col-lg-4 col-sm-4 col-xs-4 p_img_div025" id="s_5_user">
                    <?php 
                   $profile_img=$user_data['UserMaster']['profile_image'];
                   $user_type_id=$user_data['UserMaster']['user_type_id'];
                   //echo $user_type_id;
                   //die;
                   if($profile_img!='' and $user_type_id==1)
                   {
                    ?>
                        <div style="background: url('<?php echo HTTP_ROOT;?>/img/Vendor/profile/<?php echo $profile_img; ?>') repeat scroll center center ; background-repeat: no-repeat; background-size:cover;" class="col-xs-12 col-sm-12  padd_l_r profile_img025"></div>
                     
                     <?php
                 }
                 elseif($profile_img!='' and $user_type_id==2)
                 {
                    ?>
                    <img src="<?php echo HTTP_ROOT;?>/img/Buyer/profile/<?php echo $profile_img; ?>" class="rth654" style="width:90px;height:100px;border-radius:50%;border:2px solid white;"> 
                    <?php
                }
                elseif($profile_img!='' and $user_type_id=='')
                     {
                        ?>
                        <img src="<?php echo $profile_img; ?>" class="rth654" style="width:90px;height:100px;border-radius:50%;border:2px solid white;"> 
                        <?php
                    }
                 ?>
                 </div>
                <div class="col-md-8 col-lg-8 col-sm-8 col-xs-10 p_u_name0285 padd_l_r" id="s_5_user">
                  <label class="s_5_welcome" style="padding:5px;"><?php echo $user_data['UserMaster']['first_name'];?></label><br>
                  <span id="s_5_john" style="font-weight:bold;padding:5px;"><?php if($user_data['UserMaster']['user_type_id']=='1'){
                    echo ucwords("Vendor");
                  }
                  else{
                    echo ucwords("Learner");
                  }?></span>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-6 bg_vendor" id="<?php if($user_data['UserMaster']['user_type_id']=='1'){
                    echo "vndr1"; } else { echo "buyer1"; }?>">
                  <p><?php if($user_data['UserMaster']['user_type_id']=='1'){
                    echo "Vendor"; } else { echo "Learner"; }?></p>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6 bg_vendor1" id="<?php if($user_data['UserMaster']['user_type_id']=='1'){
                    echo "buyer1"; } else { echo "vndr1"; }?>">
                  <p><?php if($user_data['UserMaster']['user_type_id']=='1'){
                    echo "Learner"; } else { echo "Vendor"; }?></p>
                </div>
                <!-- *****************vendor***************** -->
                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 padd_l_r" id="buyer" style="display:none;">
                    <!-- **************courses*********** -->
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 s_5_cource321" id="s_5_cource">
                        <a href="<?php echo HTTP_ROOT;?>/Homes/dashboard">
                            <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3 b_pad">

                                <img src="<?php echo HTTP_ROOT;?>/img/img/dashboard1.png" id="s_5_img_width">
                            </div>
                            <div class="col-md-9 col-lg-9 col-sm-9 col-xs-9 padd_l_r" id="s_5_pad_h">
                            Dashboard sfgdfgs
                            </div>
                        </a>
                    </div>
                    <!-- **************courses*********** -->
                    <!-- **************skills*********** -->
                    <!-- <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 s_5_cource321" id="s_5_cource">
                        <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3 b_pad">
                        <img src="<?php //echo HTTP_ROOT;?>/img/img/home.png" id="s_5_img_width">
                        </div>
                        <div class="col-md-9 col-lg-9 col-sm-9 col-xs-9  padd_l_r" id="s_5_pad_h">
                        <a href="#">Home</a>
                        </div>
                    </div> -->
                    <!-- **************skills*********** -->
                    <!-- **************Companies*********** -->
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 s_5_cource321" id="s_5_cource">
                        <a href="<?php echo HTTP_ROOT;?>/Homes/myProfile">
                            <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3 b_pad">
                            <!-- <i class="fa fa-building-o"></i> -->
                            <img src="<?php echo HTTP_ROOT;?>/img/img/myprofile.png" id="s_5_img_width">
                            </div>
                            <div class="col-md-9 col-lg-9 col-sm-9 col-xs-9  padd_l_r" id="s_5_pad_h">
                            My Profile
                            </div>
                        </a>
                    </div>
                    <!-- **************Companies*********** -->
                    <!-- **************Roles*********** -->
                    <!-- <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 s_5_cource321" id="s_5_cource">
                        <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3 b_pad">
                        <img src="images/img/postagenda1.png" id="s_5_img_width">
                        </div>
                        <div class="col-md-9 col-lg-9 col-sm-9 col-xs-9  padd_l_r" id="s_5_pad_h">
                        <a href="#">Post Agenda</a>
                        </div>
                    </div> -->
                    <!-- **************Roles*********** -->
                    <!-- **************My Profile*********** -->
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 s_5_cource321" id="s_5_cource">
                        <a href="#">
                            <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3 b_pad">
                            <!-- <i class="fa fa-user"></i> -->
                            <img src="<?php echo HTTP_ROOT;?>/img/img/postclass1.png" class="mob_img">
                            </div>
                            <div class="col-md-9 col-lg-9 col-sm-9 col-xs-9  padd_l_r" id="s_5_pad_h">
                            Class Near You
                            </div>
                        </a>
                    </div>
                    <!-- **************My Profile*********** -->
                    <!-- **************Setting*********** -->
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 s_5_cource321" id="s_5_cource">
                        <a href="#">
                            <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3 b_pad">
                            <img src="<?php echo HTTP_ROOT;?>/img/img/recommendclasses.png" class="mob_img">
                            </div>
                            <div class="col-md-9 col-lg-9 col-sm-9 col-xs-9  padd_l_r" id="s_5_pad_h">
                            Class catalogue for Organization
                            </div>
                        </a>
                    </div>
                    <!-- **************Setting*********** -->
                    <!-- **************Reports*********** -->
                   
                    <!-- **************Reports*********** -->
                    <!-- **************Lessons*********** -->
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 s_5_cource321" id="s_5_cource">
                        <a href="Faq">
                            <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3 b_pad">
                            <img src="<?php echo HTTP_ROOT;?>/img/img/faq1.png" class="mob_img">
                            </div>
                            <div class="col-md-9 col-lg-9 col-sm-9 col-xs-9  padd_l_r">
                            FAQ
                            </div>
                        </a>
                    </div>
                    <!-- **************Lessons*********** -->
                    <!-- **************Practice*********** -->
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 s_5_cource321" id="s_5_cource">
                        <a href="#">
                            <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3 b_pad">
                            <img src="<?php echo HTTP_ROOT;?>/img/img/term1.png" class="mob_img">
                            </div>
                            <div class="col-md-9 col-lg-9 col-sm-9 col-xs-9  padd_l_r">
                           Terms and Condition
                            </div>
                        </a>
                    </div>
                    <!-- **************Practice*********** -->
                    <!-- **************Test*********** -->
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 s_5_cource321" id="">
                        <a href="#">
                            <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3 b_pad">
                            <img src="<?php echo HTTP_ROOT;?>/img/img/changepassword.png" class="mob_img">
                            </div>
                            <div class="col-md-9 col-lg-9 col-sm-9 col-xs-9  padd_l_r">
                            Change Password
                            </div>
                        </a>
                    </div>
                    <!-- **************Test*********** -->
                    <!-- **************Test*********** -->
                    <!-- <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 s_5_cource321" id="">
                        <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3 b_pad">
                        <img src="<?php //echo HTTP_ROOT;?>/img/img/settings.png" class="mob_img">
                        </div>
                        <div class="col-md-9 col-lg-9 col-sm-9 col-xs-9  padd_l_r">
                        <a href="#">Settings</a>
                        </div>
                    </div> -->
                    <!-- **************Test*********** -->
                     <!-- **************Test*********** -->
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 s_5_cource321" id="">
                        <a href="<?php echo HTTP_ROOT;?>/Homes/logout">
                            <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3 b_pad">
                            <img src="<?php echo HTTP_ROOT;?>/img/img/logout.png" class="mob_img">
                            </div>
                            <div class="col-md-9 col-lg-9 col-sm-9 col-xs-9  padd_l_r">
                            Logout
                            </div>
                        </a>
                    </div>
                    <!-- **************Test*********** -->
                    <!-- **************Test*********** -->
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 s_5_cource321" id="">
                        <a href="#">
                            <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3 b_pad">
                            <img src="<?php echo HTTP_ROOT;?>/img/img/mobileverification.png" class="mob_img">
                            </div>
                            <div class="col-md-9 col-lg-9 col-sm-9 col-xs-9  padd_l_r">
                            Mobile Verification
                            </div>
                        </a>
                    </div>
                     <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 s_5_cource321" id="">
                        <a href="#">
                            <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3 b_pad">
                            <img src="<?php echo HTTP_ROOT;?>/img/vendoricon5.png" class="mob_img new-veri-imgg">
                            </div>
                            <div class="col-md-9 col-lg-9 col-sm-9 col-xs-9  padd_l_r">
                            Booking History
                            </div>
                        </a>
                    </div>
                     <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 s_5_cource321" id="">
                        <a href="#">
                            <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3 b_pad">
                            <img src="<?php echo HTTP_ROOT;?>/img/vendoricon6.png" class="mob_img new-veri-imgg new-veri-imggage">
                            </div>
                            <div class="col-md-9 col-lg-9 col-sm-9 col-xs-9  padd_l_r">
                             Booking History
                            </div>
                        </a>
                    </div>
                    <!-- **************Test*********** -->
                </div>  
                <!-- *****************vendor***************** -->
                <!--******************buyer ******************-->
                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 padd_l_r" id="vndr">
                    <!-- **************courses*********** -->
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 s_5_cource321" id="s_5_cource">
                        <a href="<?php echo HTTP_ROOT;?>/Homes/dashboard">
                            <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3 b_pad">
                            <img src="<?php echo HTTP_ROOT;?>/img/img/dashboard1.png" id="s_5_img_width">
                            </div>
                            <div class="col-md-9 col-lg-9 col-sm-9 col-xs-9  padd_l_r" id="s_5_pad_h">
                            Dashboard
                            </div>
                        </a>
                    </div>
                    <!-- **************courses*********** -->
                    <!-- **************skills*********** -->
                    <!-- <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 s_5_cource321" id="s_5_cource">
                        <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3 b_pad">
                        <img src="<?php //echo HTTP_ROOT;?>/img/img/home.png" id="s_5_img_width">
                        </div>
                        <div class="col-md-9 col-lg-9 col-sm-9 col-xs-9  padd_l_r" id="s_5_pad_h">
                        <a href="#">Home</a>
                        </div>
                    </div> -->
                    <!-- **************skills*********** -->
                    <!-- **************Companies*********** -->
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 s_5_cource321" id="s_5_cource">
                        <a href="<?php echo HTTP_ROOT;?>/Homes/myProfile">
                            <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3 b_pad">
                            <!-- <i class="fa fa-building-o"></i> -->
                            <img src="<?php echo HTTP_ROOT;?>/img/img/myprofile.png" id="s_5_img_width">
                            </div>
                            <div class="col-md-9 col-lg-9 col-sm-9 col-xs-9  padd_l_r" id="s_5_pad_h">
                            My Profile
                            </div>
                        </a>
                    </div>
                    <!-- **************Companies*********** -->
                    <!-- **************Roles*********** -->
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 s_5_cource321" id="s_5_cource">
                        <a href="PostClass">
                            <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3 b_pad">
                            <img src="<?php echo HTTP_ROOT;?>/img/img/postagenda1.png" id="s_5_img_width">
                            </div>
                            <div class="col-md-9 col-lg-9 col-sm-9 col-xs-9  padd_l_r" id="s_5_pad_h">
                            Post Class
                            </div>
                        </a>
                    </div>
                    <!-- **************Roles*********** -->
                    <!-- **************My Profile*********** -->
                    <!--  <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 s_5_cource321" id="s_5_cource">
                        <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3 b_pad">
                        <img src="images/img/postclass1.png" class="mob_img">
                        </div>
                        <div class="col-md-9 col-lg-9 col-sm-9 col-xs-9  padd_l_r" id="s_5_pad_h">
                        <a href="#">Post Class</a>
                        </div>
                    </div> -->
                    <!-- **************My Profile*********** -->
                    <!-- **************Setting*********** -->
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 s_5_cource321" id="s_5_cource">
                        <a href="<?php echo HTTP_ROOT;?>/Homes/promoteClass">
                            <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3 b_pad">
                            <img src="<?php echo HTTP_ROOT;?>/img/img/recommendclasses.png" class="mob_img">
                            </div>
                            <div class="col-md-9 col-lg-9 col-sm-9 col-xs-9  padd_l_r" id="s_5_pad_h">
                            Promote Your Classes
                            </div>
                        </a>
                    </div>
                    <!-- **************Setting*********** -->
                    <!-- **************Reports*********** -->
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 s_5_cource321" id="s_5_cource">
                        <a href="<?php echo HTTP_ROOT;?>/Homes/addClassCatalog">
                            <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3 b_pad">
                            <!-- <i class="fa fa-file-text-o"></i> -->
                            <img src="<?php echo HTTP_ROOT;?>/img/img/promot1.png" class="mob_img">
                            </div>
                            <div class="col-md-9 col-lg-9 col-sm-9 col-xs-9  padd_l_r" id="s_5_pad_h">
                            Add Class to catalogue
                            </div>
                        </a>
                    </div>
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 s_5_cource321" id="s_5_cource">
                        <a href="#">
                            <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3 b_pad">
                            <!-- <i class="fa fa-file-text-o"></i> -->
                            <img src="<?php echo HTTP_ROOT;?>/img/img/promot1.png" class="mob_img">
                            </div>
                            <div class="col-md-9 col-lg-9 col-sm-9 col-xs-9  padd_l_r" id="s_5_pad_h">
                            Blog/Feed
                            </div>
                        </a>
                    </div>
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 s_5_cource321" id="s_5_cource">
                        <a href="<?php echo HTTP_ROOT;?>/Homes/paymentDetails">
                            <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3 b_pad">
                            <!-- <i class="fa fa-file-text-o"></i> -->
                            <img src="<?php echo HTTP_ROOT;?>/img/img/promot1.png" class="mob_img">
                            </div>
                            <div class="col-md-9 col-lg-9 col-sm-9 col-xs-9  padd_l_r" id="s_5_pad_h">
                            Payment Details
                            </div>
                        </a>
                    </div>

                    
                    <!-- **************Reports*********** -->
                    <!-- **************Lessons*********** -->
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 s_5_cource321" id="s_5_cource">
                        <a href="Faq"> 
                            <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3 b_pad">
                            <img src="<?php echo HTTP_ROOT;?>/img/img/faq1.png" class="mob_img">
                            </div>
                            <div class="col-md-9 col-lg-9 col-sm-9 col-xs-9  padd_l_r">
                            FAQ
                            </div>
                        </a>
                    </div>
                    <!-- **************Lessons*********** -->
                    <!-- **************Practice*********** -->
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 s_5_cource321" id="s_5_cource">
                        <a href="#">
                            <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3 b_pad">
                            <img src="<?php echo HTTP_ROOT;?>/img/img/term1.png" class="mob_img">
                            </div>
                            <div class="col-md-9 col-lg-9 col-sm-9 col-xs-9  padd_l_r">
                            Term and condition
                            </div>
                        </a>
                    </div>
                    <!-- **************Practice*********** -->
                    <!-- **************Test*********** -->
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 s_5_cource321" id="">
                        <a href="#"> 
                            <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3 b_pad">
                            <img src="<?php echo HTTP_ROOT;?>/img/img/changepassword.png" class="mob_img">
                            </div>
                            <div class="col-md-9 col-lg-9 col-sm-9 col-xs-9  padd_l_r">
                            Change Password
                            </div>
                        </a>
                    </div>
                    <!-- **************Test*********** -->
                    <!-- **************Test*********** -->
                    <!-- <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 s_5_cource321" id="">
                        <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3 b_pad">
                        <img src="<?php //echo HTTP_ROOT;?>/img/img/settings.png" class="mob_img">
                        </div>
                        <div class="col-md-9 col-lg-9 col-sm-9 col-xs-9  padd_l_r">
                        <a href="#">Settings</a>
                        </div>
                    </div> -->
                    <!-- **************Test*********** -->
                     <!-- **************Test*********** -->
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 s_5_cource321" id="">
                        <a href="<?php echo HTTP_ROOT;?>/Homes/logout">
                            <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3 b_pad">
                            <img src="<?php echo HTTP_ROOT;?>/img/img/logout.png" class="mob_img">
                            </div>
                            <div class="col-md-9 col-lg-9 col-sm-9 col-xs-9  padd_l_r">
                           Logout
                            </div>
                        </a>
                    </div>
                    <!-- **************Test*********** -->
                    <!-- **************Test*********** -->
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 s_5_cource321" id="">
                        <a href="#">
                            <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3 b_pad">
                            <img src="<?php echo HTTP_ROOT;?>/img/img/mobileverification.png" class="mob_img">
                            </div>
                            <div class="col-md-9 col-lg-9 col-sm-9 col-xs-9  padd_l_r">
                            Mobile Verification
                            </div>
                        </a>
                    </div>
                    <!-- **************Test*********** -->
                    <!-- **************Test*********** -->
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 s_5_cource321" id="">
                        <a href="#">
                            <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3 b_pad">
                            <img src="<?php echo HTTP_ROOT;?>/img/vendoricon5.png" class="mob_img new-veri-imgg">
                            </div>
                            <div class="col-md-9 col-lg-9 col-sm-9 col-xs-9  padd_l_r">
                            My Classes
                            </div>
                        </a>
                    </div>
                    <!-- **************Test*********** -->
                    <!-- **************Test*********** -->
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 s_5_cource321" id="">
                        <a href="#">
                            <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3 b_pad">
                            <img src="<?php echo HTTP_ROOT;?>/img/vendoricon6.png" class="mob_img new-veri-imgg new-veri-imggage">
                            </div>
                            <div class="col-md-9 col-lg-9 col-sm-9 col-xs-9  padd_l_r">
                           My Wishlist
                            </div>
                        </a>
                    </div>
                    <!-- **************Test*********** -->
                </div>
                <!-- *****************buyer******************* -->
            
      </div>
<?php if($user_data['UserMaster']['user_type_id']=='1'){?>
<script>
$(document).ready(function(){
$('#vndr1').css('font-family','os_bold');
$('#vndr1').css('background','#00CDC6');
$('#buyer1').css('background','#fff');
});
</script>
<?php }else{?>
<script>
$(document).ready(function(){
$('#buyer1').css('font-family','os_bold');
$('#buyer1').css('background','#fff');
$('#vndr1').css('background','#00CDC6');


});
</script>
<?php }?>
<script>
$('#buyer1').click(function(){
$('#buyer1').css('font-family','os_bold');

$('#vndr1').css('font-family','os_regular');
$('#buyer1').css('background','#008079');
$('#vndr1').css('background','#00B9AF');

});
$('#vndr1').click(function(){
$('#vndr1').css('font-family','os_bold');
$('#buyer1').css('font-family','os_regular');

$('#vndr1').css('background','#008079');
$('#buyer1').css('background','#00B9AF');

});

</script>
