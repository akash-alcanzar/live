<style type="text/css">
.add_top1 {
    padding-top: 0px!important;
}
</style>
<?php
 $cc_id = $view_class['VendorClasse']['id']; 
 $cc_id =base64_encode($cc_id);
 //echo $cc_id;
// die;
?>
<?php 
//echo "<pre>";
//print_r($view_class);
//print_r($category);die;
//print_r($segment);die;
//print_r($shedule_class);
?>
<div class="col-md-10 col-sm-9 col-xs-12 ruth6542 ruth654786 right-box-bar">
    <div class="col-md-12 col-sm-12 col-xs-12 sr_pv_padding_lr" style="background:#fff;">
        <div class="col-md-12 col-sm-12 col-xs-12 clrdash123 ruth1">
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 bar321 bar786">
                <div><i class="fa fa-bars dshclr12" style="display:none;"></i><!-- <img src="<?php echo HTTP_ROOT;?>/img/profile_img/user.png" class="user432"> --><span class="dashbrd12 prf543"><a href="<?php echo HTTP_ROOT;?>/homes/myProfile" class="dashbrd12">My Profile</a> >>Upcomming Class <?php //echo ucfirst($view_class['VendorClasse']['class_topic']);?></span></div>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 bar321 bar876">
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
                </div>
            </div>
        </div>
        <!-- work -->
        <div class="col-md-12 col-sm-12 col-xs-12 padd_l_r add_top_13a">
            <div class="col-md-12 col-sm-12 col-xs-12 padd_l_r weight_brd class-title-div">
                <div class="col-md-8 col-sm-8 col-xs-12">
                    <p class="weight_loss class-title-heading class-title-heading-first"><?php echo ucfirst($view_class['VendorClasse']['class_topic']);?></p>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12" style="padding:0px; margin-top:10px;">
                    <div class="col-md-12 col-sm-12 col-xs-12 padd_thirty post-class-head">
                        <p class="class-title-heading class-user-title-heading pull-right">By <?php echo ucfirst($view_class['VendorClasse']['class_by']);?></p>
                        <?php 
                           $profile_img=$user_view['UserMaster']['profile_image'];
                          
                           $user_type_id=$user_view['UserMaster']['user_type_id'];
                           //echo $user_type_id;
                           //die;
                           if($profile_img!='' and $user_type_id==1)
                           {
                            ?>
                             <img src="<?php echo HTTP_ROOT;?>/img/Vendor/profile/<?php echo $profile_img; ?>" class="georgeimg prflimg pull-right"> 
                             <?php
                             }
                             elseif($profile_img!='' and $user_type_id==2)
                             {
                                ?>
                                <img src="<?php echo HTTP_ROOT;?>/img/Buyer/profile/<?php echo $profile_img; ?>" class="georgeimg prflimg pull-right"> 
                                <?php
                            }
                            elseif($profile_img!='' and $user_type_id=='')
                             {
                                ?>
                                <img src="<?php echo $profile_img; ?>" class="georgeimg prflimg pull-right"> 
                                <?php
                            }
                        ?>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12 star_class post-class-head star-divv padd_thirty pull-right">
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12 padd_l_r">
                <div class="col-md-8 col-sm-8 col-xs-12">
                    <div class="col-md-12 col-sm-12 col-xs-12 padd_thirty">
                       <div class="col-md-8 col-sm-7 col-xs-6 padd_l_r">
                            <!-- <div class="col-md-1 col-sm-1 col-xs-1 padd_l_r">
                                <i class="fa fa-thumbs-o-up like_thumb" aria-hidden="true"></i>
                            </div> -->
<!--                             <div class="col-md-10 col-sm-11 col-xs-10 cust-ninty">
                                <p class="like_comment"><span class="ninty">90%</span> Customer recommended</p>
                            </div> -->
                        </div>
                        <div class="col-md-4 col-sm-5 col-xs-6 padd_thirty">
                            <div class="pull-right">
                                <div class="col-md-4 col-sm-3 col-xs-4 pad_fixed">
                                     <?php echo $this->Html->image('icon_fixed.png', array('alt' => 'CakePHP','class'=>'fixed_class'));?>
                                </div>
                                <div class="col-md-8 col-sm-9 col-xs-8 fixed_txt">                                    
                                    <?php echo ($view_class['VendorClasse']['class_timing_id']==2)?'Fixed Class':'Flexible Class'; ?>
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12 padd_l_r">
                <div class="col-md-8 col-sm-8 col-xs-12">
                    <div class="col-md-12 col-sm-12 col-xs-12 padd_l_r">
                        <div class="col-md-12 col-sm-12 col-xs-12 padd_l_r">
                            <div class="col-md-12 col-sm-12 col-xs-12 padd_thirty">
                                <?php //echo $this->Html->image('main_banner.jpg', array('alt' => 'CakePHP','class'=>'img-responsive hath'));

                                ?>
                                <?php if(!empty($view_class['VendorClasse']['upload_class_photo'])){?>
                                <div style="">
                                    <?php echo $this->Html->image('Vendor/class_image/'.$view_class['VendorClasse']['upload_class_photo'], array('alt' => 'Class Image','class'=>'hath class-imgg img-thumbnail db-img'));?>
                                </div>
                                <?php }else{?>
                                    <div style="">
                                        <?php echo $this->Html->image('Vendor/class_image/defult_pic.png', array('alt' => 'Class Image','class'=>'hath class-imgg img-thumbnail db-img'));?>
                                    </div>
                                <?php } ?>
                                <div class="col-md-12 col-sm-12 col-xs-12 webnair">
                                    <div class="col-md-1 col-sm-1 col-xs-2 wenair">
                                        <?php echo $this->Html->image('icon_webnair.png', array('alt' => 'Class Type','class'=>'fixed_class'));?>
                                    </div>  
                                    <div class="col-md-4 col-sm-6 col-xs-4 wenair_p">
                                         <?php 
                                            if($view_class['VendorClasse']['class_type_id']==1){
                                                echo "Workshops";
                                            }else if($view_class['VendorClasse']['class_type_id']==2){
                                                 echo "Talks";
                                            }else if($view_class['VendorClasse']['class_type_id']==3){
                                                 echo "Webniars";
                                            }

                                         ?>
                                    </div>
                                    <div class="col-md-1 col-sm-1 col-xs-2 wenair">
                                        <?php echo $this->Html->image('kids_gang.png', array('alt' => 'CakePHP','class'=>'fixed_class'));?>
                                    </div>  
                                    <div class="col-md-3 col-sm-4 col-xs-3 wenair_p">
                                       <?php echo $view_class['VendorClasse']['community_name'];?>
                                    </div>    
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12 padd_thirty br_desc fix-div">
                            <div class="col-md-12 col-sm-12 col-xs-12 padd_l_r desc_clr fix-div-part">
                                <div class="col-md-12 col-sm-12 col-xs-12 desc_cntnt clss-desc-content">
                                    <h3>Description:</h3>
                                    <p><?php echo $view_class['VendorClasse']['class_summary'];?></p>
                                </div>
                                <!-- <div class="col-md-12 col-sm-12 col-xs-12 desc_what">
                                    <p>What You'll Learn</p>
                                    <ul>
                                      <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li>
                                      <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li>
                                      <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li>
                                      <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li>
                                    </ul>
                                </div> -->
                               <!--  <div class="col-md-12 col-sm-12 col-xs-12 fee_incld include-div"> -->
                                    <!-- <h3>Fee Includes</h3> -->
                                    <!-- <p>Duration</p> -->
                                    <!-- <ul>
                                      <li>  <?php echo $view_class['VendorClasse']['class_duration'];?></li> -->
                                      <!-- <li>2 hr 30min per day(Saturday and Sunday)</li> -->
                                    <!-- </ul>
                                </div> -->
                                <div class="col-md-12 col-sm-12 col-xs-12 fee_rs">
                                    <!-- <p>Fee: &#8377; <?php echo $view_class['VendorClasse']['price_per_head'];?> </p> -->
                                   <!--  <ul>
                                        <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li>
                                          <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li>
                                          <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li>
                                    </ul>   -->    
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12 fee_rs downloaddd-link">
                                    <p class="class-title-heading-first">Link for pre request and additional information:</p>
                                    <!-- <p>Download Link:</p> -->
                                        <a href="#"><div class="col-md-12 col-sm-12 col-xs-12 download-class-linkk">Class PPT</div></a>
                                        <!-- <a href="#"><div class="col-md-12 col-sm-12 col-xs-12 download-class-linkk">Class Image</div></a>
                                        <a href="#"><div class="col-md-12 col-sm-12 col-xs-12  download-class-linkk">Class Document</div></a> -->
                                        <a href="#"><div class="col-md-12 col-sm-12 col-xs-12 download-class-linkk">Class Video</div></a>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12 fee_rs first-catseg-link">
                                   
                                        <p class="cat-seg"><strong>Category:</strong> <?php foreach ($category as $result) {
                                            if($result['Category']['id'] == $view_class['VendorClasse']['category_id']){
                                                echo $result['Category']['category_name'];
                                            }
                                        } ?>
                                        </p>
                                        <p class="cat-seg cat-seg-item"><b>Segment:</b> <?php foreach($segment as $segnment_result){
                                                echo $segnment_result['ClassSegment']['segment_name'];
                                            }?>
                                        </p>

                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12" style="margin-top:-75px; padding:0px;">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <h3 class="cls_loc locationn-class">Location:</h3>
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12 book_1500  goolge-div-book">
                                    <div class="map_ggl map_ggllle">
                                        <input type="hidden" name="longitude" id="longitude" value="<?php echo $view_class['VendorClasse']['longitude'];?> ">
                                        <input type="hidden" name="latitude" id="latitude" value="<?php echo $view_class['VendorClasse']['latitude'];?> ">
                                        <div id="gMap" class="ggl_map ggllle_map"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12 rs_fty right-sidebar">
                    <div class="col-md-12 col-sm-12 col-xs-12 book_1500 right-book-first">
                        <div class="col-md-12 col-sm-12 col-xs-12 sr_pv_padding_lr right-book-content-first">
                            <div class="col-sm-12 col-xs-6 fifhndrd"><h3>&#8377;<?php echo $view_class['VendorClasse']['price_per_head'];?></h3></div>

                            <div class="col-sm-12 col-xs-6 book_center"><a href="<?php HTTP_ROOT; ?>/braingroom/Homes/bookNow/<?php echo $cc_id; ?>"><button class="btn book_now">Book Now</button></a></div>
                            <div class="col-md-12 col-sm-12 col-xs-12 padisplay">
                                <div class="col-md-2 col-sm-3 col-xs-1 padd_beg">
                                    <?php echo $this->Html->image('sideicon1.png', array('alt' => 'CakePHP','class'=>'fixed_class'));?>
                                </div>
                                <div class="col-md-8 col-sm-9 col-xs-10 begin_lm right-bgin-content cust-md-padd booknow-content">
                                    <?php 
                                        if($view_class['VendorClasse']['level_id']==1){
                                            echo "Beginners";
                                        }else if($view_class['VendorClasse']['level_id']==2){
                                             echo "Intermediate";
                                        }else if($view_class['VendorClasse']['level_id']==3){
                                             echo "Advance";
                                        }
                                     ?>                               
                                </div>
                            </div>      
                            <div class="col-md-12 col-sm-12 col-xs-12 padisplay1 ">
                                <div class="col-md-2 col-sm-3 col-xs-1 padd_beg">
                                    <?php echo $this->Html->image('sideicon2.png', array('alt' => 'CakePHP','class'=>'fixed_class'));?>
                                </div>
                                <?php 
                                    // $start_date = $view_class['VendorClasse']['starting_month'];
                                    // $end_month = $view_class['VendorClasse']['end_month'];
                                    // $date = date('m/d/Y');
                                    // $date_create = date_create($start_date);
                                    // $date_create1 = date_create($date);
                                    // //print_r($date_create1);
                                    // $datenew = $date_create1;
                                    // $date_diff = date_diff($date_create1,$date_create);
                                    // echo "<pre>";
                                    // print_r($date_diff);
                                    // $day = $date_diff->d;
                                    // print_r($day);
                                    $fixclass = $view_class['VendorClasse']['class_timing_id'];
                                    if($fixclass == 1){
                                ?>
                                    <div class="col-md-8 col-sm-9 col-xs-10 begin_lm right-bgin-content  cust-md-padd booknow-content">
                                        Flexible
                                        <!-- Friday, 11jan 16 -->
                                    </div>
                                <?php }else{?>
                                    <div class="col-md-8 col-sm-9 col-xs-10 begin_lm right-bgin-content  cust-md-padd booknow-content">
                                        <?php echo $view_class['VendorClasse']['starting_month'];?>
                                    </div>
                                <?php }?>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12 padisplay1 ">
                                <div class="col-md-2 col-sm-3 col-xs-1 padd_beg">
                                    <?php echo $this->Html->image('sideicon2.png', array('alt' => 'CakePHP','class'=>'fixed_class'));?>
                                </div>
                                <div class="col-md-8 col-sm-9 col-xs-10 begin_lm right-bgin-content  cust-md-padd booknow-content">
                                   <?php echo $view_class['VendorClasse']['no_of_session'];?>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12 padisplay1">
                                <div class="col-md-2 col-sm-3 col-xs-1 padd_beg">
                                    <?php echo $this->Html->image('sideicon3.png', array('alt' => 'CakePHP','class'=>'fixed_class'));?>
                                </div>
                                <?php 
                                    $flexclass = $view_class['VendorClasse']['class_timing_id'];
                                        //foreach ($shedule_class as $key => $shedule) {
                                        //     $date = $shedule['ClassSchedule']['session_date'];
                                        //     $current_date = date('d/m/Y');
                                        //     if($date > $current_date){
                                        //         print_r($shedule['ClassSchedule']['session_date']);
                                        //     }
                                        // }
                                    if($flexclass == 1){
                                ?>
                                    <div class="col-md-8 col-sm-9 col-xs-10 begin_lm right-bgin-content  cust-md-padd booknow-content">
                                        <?php echo $view_class['VendorClasse']['class_duration'];?>
                                    </div>
                                <?php }else{
                                        if($flexclass == 2){
                                    ?>
                                    <div class="col-md-8 col-sm-9 col-xs-10 begin_lm right-bgin-content  cust-md-padd booknow-content">
                                        <?php
                                            // foreach ($shedule_class as $key => $shedule) {
                                            //     $date = $shedule['ClassSchedule']['session_date'];
                                            //     $current_date = date('d/m/Y');
                                            //     echo $date;
                                            //     // if($date > $current_date){
                                            //     //     print_r($shedule['ClassSchedule']['session_date']);
                                            //     // }
                                            // }
                                        ?>
                                    </div>
                                <?php }}?>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12 padisplay1">
                                <div class="col-md-2 col-sm-3 col-xs-1 padd_beg">
                                    <?php echo $this->Html->image('sideicon4.png', array('alt' => 'CakePHP','class'=>'fixed_class'));?>
                                </div>
                                <div class="col-md-10 col-sm-9 col-xs-10 begin_lm right-bgin-content cust-md-padd booknow-content booknow-location-content" style="padding:0px;">
                                    <?php echo substr($view_class['VendorClasse']['location'],0,100),'...';?>
                                </div>
                            </div>
                             <div class="col-md-12 col-sm-12 col-xs-12 padisplay1">
                                <div class="col-md-2 col-sm-3 col-xs-1 padd_beg">
                                    <?php echo $this->Html->image('sideicon5.png', array('alt' => 'CakePHP','class'=>'fixed_class'));?>
                                </div>
                                <div class="col-md-10 col-sm-9 col-xs-10 begin_lm right-bgin-content  cust-md-padd booknow-content">
                            
                                    <?php 
                                        if($view_class['VendorClasse']['age_from'] != ""){
                                        echo $view_class['VendorClasse']['age_from'];?> To  <?php echo $view_class['VendorClasse']['age_to'];?> Yrs Age Group
                                        <?php }else{?>
                                        N/A
                                        <?php }?>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12 padisplay1">
                                <div class="col-md-12 col-sm-12 col-xs-12 pad_fb share-book-content">
                                    <div class="col-md-12 col-sm-12 col-xs-12 share ">
                                        Share This Class
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12 padd_l_r share-book-content-element">
                                        <div class="col-md-1 col-sm-1 col-xs-2 fb_lm">
                                            <?php echo $this->Html->image('social1.png', array('alt' => 'CakePHP'));?>
                                        </div>
                                        <div class="col-md-1 col-sm-1 col-xs-2 fb_lm">
                                            <?php echo $this->Html->image('social2.png', array('alt' => 'CakePHP'));?>
                                        </div>
                                        <div class="col-md-1 col-sm-1 col-xs-2 fb_lm">
                                            <?php echo $this->Html->image('social3.png', array('alt' => 'CakePHP'));?>
                                        </div>
                                        <div class="col-md-1 col-sm-1 col-xs-2 fb_lm">
                                            <?php echo $this->Html->image('social4.png', array('alt' => 'CakePHP'));?>
                                        </div>
                                        <div class="col-md-2 col-sm-2 col-xs-4 like">
                                            <?php echo $this->Html->image('like.jpg', array('alt' => 'CakePHP','class'=>'like'));?>
                                        </div>
                                    </div>    
                                </div>
                            </div>
                        </div>
                         <div class="col-md-12 col-sm-12 col-xs-12 video-div">
                            <h3 class="cls_loc">Video</h3>
                            <video controls class="class-video">
                              <source src="<?php echo HTTP_ROOT;?>/img/Fitoor_(Theatrical_Trailer)_Full_HD(videoming.in).mp4" type="video/mp4">
                               <source src="mov_bbb.ogg" type="video/ogg">
                              Your browser does not support HTML5 video.
                            </video>
                        </div> 
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12 find_people join_class">
                        <div class="col-md-12 col-sm-12 col-xs-12 people_aricon people_aricon-div">
                            <div class="col-md-12 col-sm-12 col-xs-12 people_around people-join-class">
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 globe">
                                    <?php echo $this->Html->image('btnicon1.png', array('alt' => 'CakePHP','class'=>'fixed_class1'));?>    
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 around-font-p around_p padd_l_r">
                                    Find People around you who are attending this group
                                </div>
                            </div>    
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12 people_aricon1 people_aricon-div " style="margin-top:30px;">
                            <div class="col-md-12 col-sm-12 col-xs-12 people_book people-join-class">
                                <div class="col-md-2 col-sm-2 col-xs-2 globe">
                                    <?php echo $this->Html->image('btnicon2.png', array('alt' => 'CakePHP','class'=>'fixed_class1'));?> 
                                </div>
                                <div class="col-md-10 col-sm-10 col-xs-10 around-font-p  around_p padd_l_r">
                                    Book This Class and join related Interested Group
                                </div>
                            </div>    
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12 people_aricon1">
                    <!-- work 12col -->
                    <?php if($view_class['VendorClasse']['recurring_class_id'] != 0) { ?>
                        <div class="col-md-12 col-sm-12 col-xs-12 recur_session">
                            <div class="col-md-12 col-sm-12 col-xs-12 recurring">
                                <div class="col-md-12 col-sm-12 col-xs-12 recur_book">
                                    <div class="col-md-12 col-sm-12 col-xs-12 padd_l_r">
                                        <div class="row">
                                            <div class="col-md-1 col-sm-2 col-xs-1 cltime">
                                                <?php echo $this->Html->image('icon4.png', array('alt' => 'CakePHP','class'=>'rec_cal'));?>
                                            </div>
                                            <div class="col-md-11 col-sm-10 col-xs-11 recur_timing">
                                                Recurring Session Timing
                                            </div>
                                        </div>    
                                        <div class="col-md-12 col-sm-12 col-xs-12 padd_l_r">
                                            <div class="col-md-1 col-sm-2 col-xs-1">
                                                
                                            </div>
                                            <div class="col-md-11 col-sm-10 col-xs-11 padd_l_r">
                                                <div class="col-md-12 col-sm-12 col-xs-12 padd_l_r recur_s_time">
                                                    <div class="col-md-8 col-sm-8 col-xs-8 padd_l_r people_aricon">
                                                        <div class="col-md-1 col-sm-1 col-xs-1 padd_l_r">
                                                            <?php echo $this->Html->image('sideicon3.png', array('alt' => 'CakePHP','class'=>'jan_one'));?>
                                                        </div>
                                                        <div class="col-md-11 col-sm-11 col-xs-11 pm_5">
                                                            Jan 1, 5:00PM to 7 PM
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-sm-4 col-xs-4 padd_l_r people_aricon">
                                                        <div class="pull-right book_flt">
                                                            <a href="<?php HTTP_ROOT; ?>/braingroom/Homes/bookNow/<?php echo $cc_id; ?>"><button class="btn recur_book1">Book Now</button></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-sm-12 col-xs-12 padd_l_r recur_s_time">
                                                    <div class="col-md-8 col-sm-8 col-xs-8 padd_l_r people_aricon">
                                                        <div class="col-md-1 col-sm-1 col-xs-1 padd_l_r">
                                                            <?php echo $this->Html->image('sideicon3.png', array('alt' => 'CakePHP','class'=>'jan_one'));?>
                                                        </div>
                                                        <div class="col-md-11 col-sm-11 col-xs-11 pm_5">
                                                            Jan 1, 5:00PM to 7 PM
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-sm-4 col-xs-4 padd_l_r people_aricon">
                                                        <div class="pull-right book_flt">
                                                            <a href="<?php HTTP_ROOT; ?>/braingroom/Homes/bookNow/<?php echo $cc_id; ?>"><button class="btn recur_book1">Book Now</button></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-sm-12 col-xs-12 padd_l_r recur_s_time">
                                                    <div class="col-md-8 col-sm-8 col-xs-8 padd_l_r people_aricon">
                                                        <div class="col-md-1 col-sm-1 col-xs-1 padd_l_r">
                                                            <?php echo $this->Html->image('sideicon3.png', array('alt' => 'CakePHP','class'=>'jan_one'));?>
                                                        </div>
                                                        <div class="col-md-11 col-sm-11 col-xs-11 pm_5">
                                                            Jan 1, 5:00PM to 7 PM
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-sm-4 col-xs-4 padd_l_r people_aricon">
                                                        <div class="pull-right book_flt">
                                                            <a href="<?php HTTP_ROOT; ?>/braingroom/Homes/bookNow/<?php echo $cc_id; ?>"><button class="btn recur_book1">Book Now</button></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-sm-12 col-xs-12 padd_l_r recur_s_time">
                                                    <div class="col-md-8 col-sm-8 col-xs-8 padd_l_r people_aricon">
                                                        <div class="col-md-1 col-sm-1 col-xs-1 padd_l_r">
                                                            <?php echo $this->Html->image('sideicon3.png', array('alt' => 'CakePHP','class'=>'jan_one'));?>
                                                        </div>
                                                        <div class="col-md-11 col-sm-11 col-xs-11 pm_5">
                                                            Jan 1, 5:00PM to 7 PM
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-sm-4 col-xs-4 padd_l_r people_aricon">
                                                        <div class="pull-right book_flt">
                                                            <a href="<?php HTTP_ROOT; ?>/Homes/bookNow/<?php echo $cc_id; ?>"><button class="btn recur_book1"><button class="btn recur_book1">Book Now</button></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>    
                                    </div>
                                </div>
                            </div>     
                        </div>
                    <?php } ?>
                    <div class="col-md-12 col-sm-12 col-xs-12" style="margin-top:35px;">
                        <center>
                            <a href="#"><button class="btn butt_gft bok-now-btn">
                                <!-- <i class="fa fa-gift gift_fa" aria-hidden="true"></i> -->
                                <span class="padd_gft">Book Now</span>
                            </button></a>
                        </center>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12 image_sldr">
                        <!-- image slider -->
                        <div id="myCarousel" class="carousel slide" data-ride="carousel">
                            <!-- Indicators -->
                           <!--  <ol class="carousel-indicators">
                                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                <li data-target="#myCarousel" data-slide-to="1"></li>
                                <li data-target="#myCarousel" data-slide-to="2"></li>
                                <li data-target="#myCarousel" data-slide-to="3"></li>
                            </ol> -->

                            <!-- Wrapper for slides -->
                            <div class="carousel-inner" role="listbox">
                                <div class="item active">
                                  <?php echo $this->Html->image('discount_banner.jpg', array('alt' => 'CakePHP','class'=>'img-responsive'));?>
                                </div>

                                <div class="item">
                                  <?php echo $this->Html->image('discount_banner.jpg', array('alt' => 'CakePHP','class'=>'img-responsive'));?>
                                </div>

                                <div class="item">
                                  <?php echo $this->Html->image('discount_banner.jpg', array('alt' => 'CakePHP','class'=>'img-responsive'));?>
                                </div>

                                <div class="item">
                                  <?php echo $this->Html->image('discount_banner.jpg', array('alt' => 'CakePHP','class'=>'img-responsive'));?>
                                </div>
                            </div>

                            <!-- Left and right controls -->
                            <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                                <!-- <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> -->
                                <?php echo $this->Html->image('arrow1.png', array('alt' => 'CakePHP','class'=>'glyphicon glyphicon-chevron-left arrow12'));?>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                                <!-- <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> -->
                                <?php echo $this->Html->image('arrow2.png', array('alt' => 'CakePHP','class'=>'glyphicon glyphicon-chevron-left arrow12'));?>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                        <!-- image slider -->
                        <div class="col-md-12 col-sm-12 col-xs-12 image_sldr1">
                            <center>
                                <a href="<?php echo HTTP_ROOT;?>/Homes/gift_class1"><button class="btn butt_gft">
                                    <i class="fa fa-gift gift_fa" aria-hidden="true"></i>
                                    <span class="padd_gft">Gift This Class</span>
                                </button></a>
                                <div class="sold_20">
                                    <span class="pad10">10 Available/20 Sold</span>
                                    <i class="fa fa-heart pad_heart" aria-hidden="true"></i>
                                    <span class="add_wish">Add To Wishlist</span>
                                </div>
                            </center>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12 padd_thirty">
                        <div class="col-md-12 col-sm-12 col-xs-12 class_recmnd">
                            Recommended Classes
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12 padd_l_r">
                            <!-- 4 content slider -->
                            <div class="bx_height">
                                <ul class="bxslider">
                                    <?php foreach ($class_status as $result) { 
                                                if($result['VendorClasse']['recommended_status']==1){
                                            ?>
                                        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 padd_l_r add_top1 bx_12">
                                            <div class="grid_br gridworkshopsbg12">
                                                <div class="view1 view-first">
                                                    <div class="index_img">
                                                                   
                                                        <?php //echo $this->Html->image('pics9.png', array('alt' => 'CakePHP'));?>
                                                        <?php if(!empty($result['VendorClasse']['upload_class_photo'])){?>
                                                          <img src="<?php echo HTTP_ROOT;?>/img/Vendor/class_image/<?php echo $result['VendorClasse']['upload_class_photo'];?>" class="img-responsive img-thumbnail" alt=""/>               
                                                        <?php }else{?>
                                                          <img src="<?php echo HTTP_ROOT;?>/img/Vendor/class_image/defult_pic.png" class="img-thumbnail img-responsive" alt=""/>
                                                        <?php }?>
                                                            <button class="btn butt_dollar_br">&#x20B9;<?php echo $result['VendorClasse']['price_per_head'];?></button>
                                                    </div>                 
                                                </div>                           
                                                <div class="golden_br13 golden_br133">
                                                    <div class="slider-topic"><?php echo $result['VendorClasse']['class_topic'];?></div>
                                                      <p>PLACE :<?php echo $result['VendorClasse']['location'];?></p>
                                                      <h5><?php echo $result['VendorClasse']['class_duration'];?> </h5>
                                                </div>                               
                                             </div>
                                        </div>
                                    <?php }}?>
                                </ul>
                            </div>    
                            <!-- 4 content slider -->
                        </div>
                    </div>
                    <!-- worh 12 col -->
                </div>
            </div>    
        </div>
        <!-- work -->
    </div>
</div>
<?php
    $longitude      = $result['VendorClasse']['longitude'];
    $latitude       = $result['VendorClasse']['latitude'];
    $class_topic    = $result['VendorClasse']['class_topic'];
    $class_topic    = $result['VendorClasse']['class_topic'];
    $class_summary  = $result['VendorClasse']['class_summary'];
    $location       = $result['VendorClasse']['location'];
?>

 
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true&libraries=places&key=AIzaSyBTWFXzW0kk-GOyASPoip3CXq02xbhr_z4"></script> 
<script type="text/javascript">
// <![CDATA[
var markers = [{"title":"<?php echo $class_topic; ?>","lat":"<?php echo $latitude; ?>","lng":"<?php echo $longitude; ?>","description":"<?php echo $location; ?>"}];
window.onload = function () {
var mapOptions = {
center: new google.maps.LatLng(markers[0].lat, markers[0].lng),
zoom:5,
mapTypeId: google.maps.MapTypeId.ROADMAP
};
var map = new google.maps.Map(document.getElementById("gMap"), mapOptions);
var infoWindow = new google.maps.InfoWindow();
var lat_lng = new Array();
var latlngbounds = new google.maps.LatLngBounds();
for (i = 0; i < markers.length; i++) {
var data = markers[i]
var myLatlng = new google.maps.LatLng(data.lat, data.lng);
lat_lng.push(myLatlng);
var marker = new google.maps.Marker({
position: myLatlng,
map: map,
title: data.title
});
latlngbounds.extend(marker.position);
(function (marker, data) {
google.maps.event.addListener(marker, "click", function (e) {
infoWindow.setContent(data.description);
infoWindow.open(map, marker);
});
})(marker, data);
}
map.setCenter(latlngbounds.getCenter());
map.fitBounds(latlngbounds);

}
// ]]></script>

<script type="text/javascript">
      $(document).ready(function(){
        //alert('najmu');
        //   $('.clss-desc-content').dialog({
        //     resizable: false,
        //     minHeight: 250,
        //     create: function() {
        //         $(this).css("maxHeight", 250);        
        //     }
        // });
           // $('.clss-desc-content').resizable("enable");
           // $('.clss-desc-content').dialog({ maxHeight: 250 });


          $('#organization').hide();
          $('#individual').show(); 

          $("#radio-1").click(function(){
          //alert('najmu');
          //Holds the product ID of the clicked element
          $('#organization').hide();
          $('#individual').show();
        });
        $("#radio-2").click(function(){
          // Holds the product ID of the clicked element
          $('#individual').hide();
          $('#organization').show();
        });        
  $('#datepicker').click(function(){
   
    /* $( "#datepicker").datepicker();*/
    $( "#datepicker" ).datepicker({yearRange:'1900:2030',maxDate:0,changeYear: true, changeMonth: true });

     $( "#datepicker").datepicker("show");
  })
   $('#datepicker').keypress(function(){
     $( "#datepicker" ).datepicker();
     $( "#datepicker" ).datepicker("show");
  });


    $("#file-upload").on('change',function(){
        var a = $(this).val();      
        $('#upload_photo').val(a);
    });

    $("#img_click").on('click',function(){
        $('#file-upload').click();
    });

    $("#file-upload1").on('change',function(){
      var a = $(this).val();
    
      $('#upload_photo1').val(a);
    });

    $("#img_click1").on('click',function(){
      $('#file-upload1').click();
    });


    $("#file-upload2").on('change',function(){
        var a = $(this).val();      
        $('#upload_photo2').val(a);
    });

    $("#img_click2").on('click',function(){
        $('#file-upload2').click();
    });

    $("#file-upload3").on('change',function(){
      var a = $(this).val();
    
      $('#upload_photo3').val(a);
    });

    $("#img_click3").on('click',function(){
      $('#file-upload3').click();
    });

  

});


// $(document).ready(function () {
//  alert('hhh');
//     $('#myModal2').dialog({
//         modal: true,
//         autoOpen: false
//     });

//     $('select').change(function () {
//         if ($(this).val() == "1") {
//             $('#myModal2').dialog('open');
//         }
//     });

// });
$('.bxslider').bxSlider({
  auto:true,
  minSlides: 1,
  maxSlides: 4,
  slideWidth: 270,
  slideMargin: 0
});
</script>
