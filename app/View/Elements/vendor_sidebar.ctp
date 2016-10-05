<?php  $user_data=$this->requestAction(array('controller'=>'Homes', 'action'=>'getUser'), 
                              array('pass'=>array($user_view['UserMaster']['id'])));
    

?>
                             
<div class="col-md-2 col-lg-2 col-sm-3 col-xs-12 vendor-left-bar" id="s_1_lpad">
            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 s_5_lside1" id="">
                <div class="col-md-5 col-lg-6 col-sm-6 col-xs-4 sr_20_07_img_div02" id="s_5_user">
                    <?php 
                    
                        $profile_img=$user_view['UserMaster']['profile_image'];
                      
                       $user_type_id=$user_view['UserMaster']['user_type_id'];
                      $user_pic1 = substr($profile_img,0,4);
                   
                           if($user_pic1 == 'http'){ ?>
                           
                                <img src="<?php echo $profile_img; ?>" class="rth654 sr_20_img_user" style=""> 
                                 
                         <?php } 
                               else if($profile_img!='' and $user_type_id==1) {  ?>

                                <img src="<?php echo HTTP_ROOT;?>/img/Vendor/profile/<?php echo $profile_img; ?>" class="rth654 sr_20_img_user"> 

                            <?php }elseif($profile_img!='' and $user_type_id==2){  ?>
                                
                                <img src="<?php echo HTTP_ROOT;?>/img/Buyer/profile/<?php echo $profile_img; ?>" class="rth654 sr_20_img_user"> 

                           <?php }elseif($profile_img!='' and $user_type_id==''){ ?>

                               
                                <img src="<?php echo $profile_img; ?>" class="rth654 sr_20_img_user" style=""> 
                            
                            <?php } 

                    ?>

                </div>
                <div class="col-md-7 col-lg-6 col-sm-6 col-xs-7" id="s_5_user">
                  <div class="s_5_welcome sr_20_name_user" style=""><?php echo $user_data['UserMaster']['first_name'];?></div><br>
                  <div id="s_5_john" class="sr_20_name_user02" style="font-weight:bold;">
                        <?php if($user_data['UserMaster']['user_type_id']=='1'){ 

                            echo ucwords("Vendor"); 

                            }else{

                             echo ucwords("Learner");
                        }?>
                    </div>
                </div>
            </div>
            
            <?php if($user_data['UserMaster']['user_type_id']=='1'){ ?>

                <style type="text/css">

                    .bg_vendor{background-color: #00CDC6;}
                        
                </style>

            <?php }else{ ?>

                    <style type="text/css">

                        .bg_vendor { 
                            
                            background-color: #fff;
                            color: #00CDC6;
                            
                        }

                        .bg_vendor p {
                            font-size: 14px;
                            color: #00CDC6;
                            text-align: center;
                            padding-top: 8px;
                            cursor: pointer;
                            font-family: OS_bold;
                            text-decoration: underline;
                        }

                        .bg_vendor1 p {
                            font-size: 14px;
                            color: #fff;
                            text-align: center;
                            padding-top: 8px;
                            cursor: pointer;
                            font-family: OS_regular;
                        }
                    </style>

                    <?php } ?>

            <div class="col-md-6 col-sm-6 col-xs-6 <?php if($user_data['UserMaster']['user_type_id']=='1'){ echo 'bg_vendor'; } else { echo 'bg_vendor1'; } ?>" id="<?php if($user_data['UserMaster']['user_type_id']=='1'){
                    echo "vndr1"; } else { echo "buyer1"; }?>">
                  <p><?php if($user_data['UserMaster']['user_type_id']=='1'){
                    echo "Vendor"; } else { echo "Learner"; }?></p>
                </div>
               <div class="col-md-6 col-sm-6 col-xs-6 <?php if($user_data['UserMaster']['user_type_id']=='1'){ echo 'bg_vendor1';} else {echo 'bg_vendor'; }?>" id="<?php if($user_data['UserMaster']['user_type_id']=='1'){
                    echo "buyer1"; } else { echo "vndr1"; }?>">
                  <p><?php if($user_data['UserMaster']['user_type_id']=='1'){
                    echo "Learner"; } else { echo "Vendor"; } ?></p>
                </div>
                <!-- *****************vendor***************** -->
               
                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 padd_l_r" id="buyer" style="display:none;">
                    <!-- **************courses*********** -->
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 s_5_cource321" id="s_5_cource">
                        <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3 b_pad sr_20_icon_w">
                        <img src="<?php echo HTTP_ROOT;?>/img/img/dashboard1.png" id="s_5_img_width">
                        </div>
                        <div class="col-md-9 col-lg-9 col-sm-9 col-xs-9  padd_l_r" id="s_5_pad_h">
                        <a href="<?php echo HTTP_ROOT;?>/Homes/dashboard/lern_dash">Dashboard</a>
                        </div>
                    </div>
                    <!-- **************courses*********** -->       
                    <!-- **************Companies*********** -->
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 s_5_cource321" id="s_5_cource">
                        <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3 b_pad sr_20_icon_w">
                        <!-- <i class="fa fa-building-o"></i> -->
                        <img src="<?php echo HTTP_ROOT;?>/img/img/myprofile.png" id="s_5_img_width">
                        </div>
                        <div class="col-md-9 col-lg-9 col-sm-9 col-xs-9  padd_l_r" id="s_5_pad_h">
                        <a href="<?php echo HTTP_ROOT;?>/Homes/myProfile/lerner">My Profile</a>
                        </div>
                    </div>
<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 s_5_cource321" id="s_5_cource">
                        <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3 b_pad sr_20_icon_w">
                        <i class="fa fa-inbox" aria-hidden="true" style="color:white;"></i>
                        </div>
                        <div class="col-md-9 col-lg-9 col-sm-9 col-xs-9  padd_l_r" id="s_5_pad_h">
                        <a href="<?php echo HTTP_ROOT;?>/Homes/msgInboxLearner">Message Inbox</a>
                        </div>
                    </div>
                    <!-- **************Companies*********** -->
                    <!-- **************My Profile*********** -->
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 s_5_cource321" id="s_5_cource">
                        <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3 b_pad sr_20_icon_w">
                        <!-- <i class="fa fa-user"></i> -->
                        <img src="<?php echo HTTP_ROOT;?>/img/img/postclass1.png" class="mob_img">
                        </div>
                        <div class="col-md-9 col-lg-9 col-sm-9 col-xs-9  padd_l_r" id="s_5_pad_h">
                        <a href="#">Class Near You</a>
                        </div>
                    </div>
                    <!-- **************My Profile*********** -->
                    <!-- **************Setting*********** -->
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 s_5_cource321" id="s_5_cource">
                        <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3 b_pad sr_20_icon_w">
                        <img src="<?php echo HTTP_ROOT;?>/img/img/recommendclasses.png" class="mob_img">
                        </div>
                        <div class="col-md-9 col-lg-9 col-sm-9 col-xs-9  padd_l_r" id="s_5_pad_h">
                        <a href="<?php echo HTTP_ROOT;?>/Homes/arrangeClass">Class catalogue for Organization</a>
                        </div>
                    </div>
                    <!-- **************Setting*********** -->
                    <!-- **************Test*********** -->
                   
                     <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 s_5_cource321" id="">
                        <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3 b_pad sr_20_icon_w">
                        <img src="<?php echo HTTP_ROOT;?>/img/vendoricon5.png" class="mob_img new-veri-imgg">
                        </div>
                        <div class="col-md-9 col-lg-9 col-sm-9 col-xs-9  padd_l_r">
                        <a href="<?php echo HTTP_ROOT;?>/Homes/myProfile/Booking">Booking History</a>
                        </div>
                    </div>
                     <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 s_5_cource321" id="">
                        <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3 b_pad sr_20_icon_w">
                        <img src="<?php echo HTTP_ROOT;?>/img/vendoricon6.png" class="mob_img new-veri-imgg new-veri-imggage">
                        </div>
                        <div class="col-md-9 col-lg-9 col-sm-9 col-xs-9  padd_l_r">
                       <a href="<?php echo HTTP_ROOT;?>/Homes/myProfile/Wishlist">Wishlist</a>
                        </div>
                    </div>
                     <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 s_5_cource321" id="s_5_cource">
                        <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3 b_pad sr_20_icon_w">
                        <img src="<?php echo HTTP_ROOT;?>/img/img/faq1.png" class="mob_img">
                        </div>
                        <div class="col-md-9 col-lg-9 col-sm-9 col-xs-9  padd_l_r">
                        <a href="<?php echo HTTP_ROOT;?>/Homes/Faq">FAQ</a>
                        </div>
                    </div>
                    <!-- **************Lessons*********** -->
                    <!-- **************Practice*********** -->
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 s_5_cource321" id="s_5_cource">
                        <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3 b_pad sr_20_icon_w">
                        <img src="<?php echo HTTP_ROOT;?>/img/img/term1.png" class="mob_img">
                        </div>
                        <div class="col-md-9 col-lg-9 col-sm-9 col-xs-9  padd_l_r">
                        <a href="<?php echo HTTP_ROOT;?>/Homes/terms">Term and condition</a>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 s_5_cource321" id="">
                        <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3 b_pad sr_20_icon_w">
                        <img src="<?php echo HTTP_ROOT;?>/img/img/changepassword.png" class="mob_img">
                        </div>
                        <div class="col-md-9 col-lg-9 col-sm-9 col-xs-9  padd_l_r">
                        <a href="<?php echo HTTP_ROOT;?>/Homes/changepassword">Change Password</a>
                        </div>
                    </div>
                     <!-- **************Test*********** -->
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 s_5_cource321" id="">
                        <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3 b_pad sr_20_icon_w">
                        <img src="<?php echo HTTP_ROOT;?>/img/img/logout.png" class="mob_img">
                        </div>
                        <div class="col-md-9 col-lg-9 col-sm-9 col-xs-9  padd_l_r">
                        <a href="<?php echo HTTP_ROOT;?>/Homes/logout">Logout</a>
                        </div>
                    </div>
                    <!-- **************Test*********** -->
                </div>  
                <!-- *****************vendor***************** -->
                <!--******************buyer ******************-->
                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 padd_l_r" id="vndr">
                    <!-- **************courses*********** -->
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 s_5_cource321" id="s_5_cource">
                        <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3 b_pad sr_20_icon_w">
                        <img src="<?php echo HTTP_ROOT;?>/img/img/dashboard1.png" id="s_5_img_width">
                        </div>
                        <div class="col-md-9 col-lg-9 col-sm-9 col-xs-9  padd_l_r" id="s_5_pad_h">
                        <a href="<?php echo HTTP_ROOT;?>/Homes/dashboard">Dashboard</a>
                        </div>
                    </div>
                    <!-- **************courses*********** -->
                    <!-- **************Companies*********** -->
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 s_5_cource321" id="s_5_cource">
                        <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3 b_pad sr_20_icon_w">
                        <!-- <i class="fa fa-building-o"></i> -->
                        <img src="<?php echo HTTP_ROOT;?>/img/img/myprofile.png" id="s_5_img_width">
                        </div>
                        <div class="col-md-9 col-lg-9 col-sm-9 col-xs-9  padd_l_r" id="s_5_pad_h">
                        <a href="<?php echo HTTP_ROOT;?>/Homes/myProfile/">My Profile</a>
                        </div>
                    </div>
 <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 s_5_cource321" id="s_5_cource">
                        <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3 b_pad sr_20_icon_w">
                        <i class="fa fa-inbox" aria-hidden="true" style="color:white;"></i>
                        </div>
                        <div class="col-md-9 col-lg-9 col-sm-9 col-xs-9  padd_l_r" id="s_5_pad_h">
                        <a href="<?php echo HTTP_ROOT;?>/Homes/msgInboxVendor">Message Inbox</a>
                        </div>
                    </div>
                    <!-- **************Companies*********** -->
                    <!-- **************Roles*********** -->
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 s_5_cource321" id="s_5_cource">
                        <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3 b_pad sr_20_icon_w">
                        <img src="<?php echo HTTP_ROOT;?>/img/img/postagenda1.png" id="s_5_img_width">
                        </div>
                        <div class="col-md-9 col-lg-9 col-sm-9 col-xs-9  padd_l_r" id="s_5_pad_h">
                        <a href="<?php echo HTTP_ROOT;?>/vendor_classes/create">Post Class</a>
                        </div>
                    </div>
                    <!-- **************Roles*********** -->
                    <!-- **************Setting*********** -->
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 s_5_cource321" id="s_5_cource">
                        <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3 b_pad sr_20_icon_w">
                        <img src="<?php echo HTTP_ROOT;?>/img/img/recommendclasses.png" class="mob_img">
                        </div>
                        <div class="col-md-9 col-lg-9 col-sm-9 col-xs-9  padd_l_r" id="s_5_pad_h">
                        <a href="<?php echo HTTP_ROOT;?>/Homes/promoteClass">Promote Your Classes</a>
                        </div>
                    </div>
                    <!-- **************Setting*********** -->
                    <!-- **************Reports*********** -->
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 s_5_cource321" id="s_5_cource">
                        <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3 b_pad sr_20_icon_w">
                        <!-- <i class="fa fa-file-text-o"></i> -->
                        <img src="<?php echo HTTP_ROOT;?>/img/img/promot1.png" class="mob_img">
                        </div>
                        <div class="col-md-9 col-lg-9 col-sm-9 col-xs-9  padd_l_r" id="s_5_pad_h">
                        <a href="<?php echo HTTP_ROOT;?>/Homes/addClassCatalog">Add Class to catalogue</a>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 s_5_cource321" id="s_5_cource">
                        <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3 b_pad sr_20_icon_w">
                        <!-- <i class="fa fa-file-text-o"></i> -->
                        <img src="<?php echo HTTP_ROOT;?>/img/img/promot1.png" class="mob_img">
                        </div>
                        <div class="col-md-9 col-lg-9 col-sm-9 col-xs-9  padd_l_r" id="s_5_pad_h">
                        <a href="#">Blog/Feed</a>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 s_5_cource321" id="s_5_cource">
                        <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3 b_pad sr_20_icon_w">
                        <!-- <i class="fa fa-file-text-o"></i> -->
                        <img src="<?php echo HTTP_ROOT;?>/img/img/promot1.png" class="mob_img">
                        </div>
                        <div class="col-md-9 col-lg-9 col-sm-9 col-xs-9  padd_l_r" id="s_5_pad_h">
                         <a href="<?php echo HTTP_ROOT;?>/Homes/paymentAccount">Payment Details </a>
                        </div>
                    </div>
                    <!-- akash code -->
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 s_5_cource321" id="s_5_cource">
                        <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3 b_pad sr_20_icon_w">
                            <img src="<?php echo HTTP_ROOT;?>/img/img/promot1.png" class="mob_img">
                        </div>
                        <div class="col-md-9 col-lg-9 col-sm-9 col-xs-9  padd_l_r" id="s_5_pad_h">
                            <a href="<?php echo HTTP_ROOT;?>/Homes/classList">Flexible Class Attendance</a>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 s_5_cource321" id="">
                        <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3 b_pad sr_20_icon_w">
                        <img src="<?php echo HTTP_ROOT;?>/img/vendoricon5.png" class="mob_img new-veri-imgg">
                        </div>
                        <div class="col-md-9 col-lg-9 col-sm-9 col-xs-9  padd_l_r">
                        <a href="<?php echo HTTP_ROOT;?>/Homes/myProfile/my_class">My Classes</a>
                        </div>
                    </div>
                    <!-- end of akash code  -->
                    
                    <!-- **************Reports*********** -->
                    <!-- **************Lessons*********** -->
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 s_5_cource321" id="s_5_cource">
                        <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3 b_pad sr_20_icon_w">
                        <img src="<?php echo HTTP_ROOT;?>/img/img/faq1.png" class="mob_img">
                        </div>
                        <div class="col-md-9 col-lg-9 col-sm-9 col-xs-9  padd_l_r">
                        <a href="<?php echo HTTP_ROOT;?>/Homes/Faq">FAQ</a>
                        </div>
                    </div>
                    <!-- **************Lessons*********** -->
                    <!-- **************Practice*********** -->
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 s_5_cource321" id="s_5_cource">
                        <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3 b_pad sr_20_icon_w">
                        <img src="<?php echo HTTP_ROOT;?>/img/img/term1.png" class="mob_img">
                        </div>
                        <div class="col-md-9 col-lg-9 col-sm-9 col-xs-9  padd_l_r">
                        <a href="<?php echo HTTP_ROOT;?>/Homes/terms">Term and condition</a>
                        </div>
                    </div>
                    <!-- **************Practice*********** -->
                    <!-- **************Test*********** -->
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 s_5_cource321" id="">
                        <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3 b_pad sr_20_icon_w">
                        <img src="<?php echo HTTP_ROOT;?>/img/img/changepassword.png" class="mob_img">
                        </div>
                        <div class="col-md-9 col-lg-9 col-sm-9 col-xs-9  padd_l_r">
                        <a href="<?php echo HTTP_ROOT;?>/Homes/changepassword">Change Password</a>
                        </div>
                    </div>
                    <!-- **************Test*********** -->
                     <!-- **************Test*********** -->
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 s_5_cource321" id="">
                        <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3 b_pad sr_20_icon_w">
                        <img src="<?php echo HTTP_ROOT;?>/img/img/logout.png" class="mob_img">
                        </div>
                        <div class="col-md-9 col-lg-9 col-sm-9 col-xs-9  padd_l_r">
                       <a href="<?php echo HTTP_ROOT;?>/Homes/logout">Logout</a>
                        </div>
                    </div>
                    <!-- **************Test*********** -->
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
            $('#buyer1').css('css','#00CDC6');
        });
    </script>

<?php }else{ ?>

    <script>
        $(document).ready(function(){
            $("#vndr").hide();
            $("#buyer").show();
            $('#buyer1').css('font-family','os_bold');
            $('#g_vendor1').css('background','#fff');
            $('#vndr1').css('background','#fff !important');
            $('#buyer1').css('background','rgb(0, 205, 198)');
        });
    </script>

<?php }?>

