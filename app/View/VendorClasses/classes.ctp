<?php
$gift = explode('/',$this->request->url);
$user_id = $user_view['UserMaster']['id'];
?>
<style type="text/css">
.nbs-flexisel-nav-left{
	margin-top:250px !important;	
}
.nbs-flexisel-nav-right{
	margin-top:250px !important;	
}
.add_top1 {
    padding-top: 0px!important;
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
.ruth6542{padding-left: 0px!important; margin-bottom: 30px;}
.provider-name{ cursor: pointer;}
</style>
<?php /*?>  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script><?php */?>
<div class="col-md-12 col-sm-12 col-xs-12 padd_l_r">
  <div class="col-md-12 col-sm-12 col-xs-12 padd_l_r">
    <!-- <a href="http://braingroom.com/braingroom/homes/kids"> -->
      <?php     
        if($class['VendorClasse']['category_id'] == 1){?>
        <a href="<?php echo HTTP_ROOT;?>/braingroom/homes/fun/1">
            <img src="<?php echo HTTP_ROOT;?>/img/profile_img/fun.jpg" class="img-responsive" alt="">
        </a>
      <?php }?>
      <?php     
        if($class['VendorClasse']['category_id'] == 2){?>
        <a href="<?php echo HTTP_ROOT;?>/braingroom/homes/fun/2">
            <img src="<?php echo HTTP_ROOT;?>/img/profile_img/informative.jpg" class="img-responsive" alt="">
        </a>
      <?php }?>
      <?php     
        if($class['VendorClasse']['category_id'] == 3){?>
        <a href="<?php echo HTTP_ROOT;?>/braingroom/homes/fun/3">
            <img src="<?php echo HTTP_ROOT;?>/img/profile_img/health.jpg" class="img-responsive" alt="">
        </a>
      <?php }?>
      <?php     
        if($class['VendorClasse']['category_id'] == 4){?>
        <a href="<?php echo HTTP_ROOT;?>/braingroom/homes/fun/4">
            <img src="<?php echo HTTP_ROOT;?>/img/profile_img/kids.jpg" class="img-responsive" alt="">
        </a>
      <?php }?>
      <?php     
        if($class['VendorClasse']['category_id'] == 5){?>
        <a href="<?php echo HTTP_ROOT;?>/braingroom/homes/fun/5">
            <img src="<?php echo HTTP_ROOT;?>/img/profile_img/education.jpg" class="img-responsive" alt="">
        </a>
      <?php }?>
      <?php     
        if($class['VendorClasse']['category_id'] == 6){?>
        <a href="<?php echo HTTP_ROOT;?>/braingroom/homes/fun/6">
            <img src="<?php echo HTTP_ROOT;?>/img/profile_img/hme_mntc.jpg" class="img-responsive" alt="">
        </a>
      <?php }?>
   <!--  </a> -->
  </div>
</div>
<?php /* Modified by dinesh@braingroom.com 19/07/16*/?>
<div class="col-xs-12 col-sm-12  col-md-12 col-lg-offset-1 col-lg-10">
    <div class="container-fluid  padd_l_r">
        <div class="col-md-12 col-sm-12 col-xs-12 funtr"> 
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padd_l_r">
                <h4 class="feature_work">
                	<label class="b_1_home"><a href="#" class="b_11_home"><?php echo $class['Category']['category_name']; ?></label>
                        <label class="b_1_angle"><i class="fa fa-angle-right" aria-hidden="true"></i></label>
                        <label class="b_1_rgtn"><a href="#" class="b_11_home"><?php echo $class['Segment']['segment_name']; ?></a></label>
                </h4>
            </div>
        </div>
        <div class="col-md-12 col-sm-12 col-xs-12 ruth6542 ruth654786">
            <div class="col-md-12 col-sm-12 col-xs-12 sr_pv_padding_lr" style="background:#fff;">
                <!-- work -->
                <div class="col-md-12 col-sm-12 col-xs-12 padd_l_r add_top_13a">
                    <div class="col-md-12 col-sm-12 col-xs-12 padd_l_r weight_brd class-title-div">
                        <div class="col-md-8 col-sm-8 col-xs-12">
                            <p class="weight_loss class-title-heading class-title-heading-first" >
               <a href="<?php echo HTTP_ROOT?>/classes/<?php echo $class['VendorClasse']['class_topic']; ?>" >
               <?php echo ucfirst($class['VendorClasse']['class_topic']); ?>
               </a>
               </p>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12" style="padding:0px; margin-top:10px;">
                        <div class="classnamedesign">
                            <div class="col-md-12 col-sm-12 col-xs-12 padd_thirty post-class-head">
                            <?php /* Modified by dinesh@braingroom.com 19/07/16*/?>
                               <div class="col-md-1 col-sm-1 col-xs-1 padd_thirty post-class-head">
                                <p class="provider-name class-title-heading class-user-title-heading pull-right classprofilename" 
                                id="<?php echo $class['VendorClasse']['user_id'];?>"> <?php echo ucfirst($class['User']['first_name']);?>
                                </p>
                             
                                <?php 
                                   $profile_img=$class['User']['profile_image'];
                                
                                   $user_type_id=$class['User']['user_type_id'];
                                   if($profile_img!='' and $user_type_id==1)
                                   {
                                    ?>
                                     <img class="classimg" src="<?php echo HTTP_ROOT;?>/img/Vendor/profile/<?php echo $profile_img; ?>" id="profile-pic<?php echo $class['VendorClasse']['user_id'];?>" class="georgeimg prflimg pull-right profile-img"> 
                                     <?php
                                     }
                                     elseif($profile_img!='' and $user_type_id==2)
                                     {
                                        ?>
                                        <img class="classimg" src="<?php echo HTTP_ROOT;?>/img/Buyer/profile/<?php echo $profile_img; ?>" id="profile-pic<?php echo $class['VendorClasse']['user_id'];?>" class="georgeimg prflimg pull-right profile-img"> 
                                        <?php
                                    }
                                    elseif($profile_img!='' and $user_type_id=='')
                                     {
                                     /*   ?>
                                        <img class="classimg" src="<?php echo $profile_img; ?>" id="profile-pic<?php echo $class['VendorClasse']['user_id'];?>" class="georgeimg prflimg pull-right profile-img"> 
                                        <?php
                                    }
									  else
                                     {*/
                                        ?>
                                       <!-- <img class="classimg" src="<?php //echo $profile_img; ?>" id="profile-pic<?php //echo $class['VendorClasse']['user_id'];?>" class="georgeimg prflimg pull-right profile-img"> -->
                                       <img class="classimg" src="<?php echo HTTP_ROOT;?>/img/Vendor/profile/vendor_logo.png" class="georgeimg prflimg pull-right profile-img">
                                        <?php
                                    }
                                ?>
                           </div>
                                <div class="col-md-11 col-sm-11 col-xs-11 padd_thirty post-class-head">
                                <p class="provider-name class-title-heading class-user-title-heading classprofilename" 
                                id="<?php echo $class['VendorClasse']['user_id'];?>"> <?php echo ucfirst($class['User']['first_name']);?>
                                </p>
                             </div>
                            </div>
                            <?php /* Modified by dinesh@braingroom.com 19/07/16*/?>
                            <div class="col-md-12 col-sm-12 col-xs-12 star_class post-class-head star-divv padd_thirty pull-right classstardesign">
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12 padd_l_r">
                        <div class="col-md-8 col-sm-8 col-xs-12">
                            <div class="col-md-12 col-sm-12 col-xs-12 padd_thirty">
                               <div class="col-md-8 col-sm-7 col-xs-6 padd_l_r">
                                   <!--  <div class="col-md-1 col-sm-1 col-xs-1 padd_l_r">
                                        <i class="fa fa-thumbs-o-up like_thumb" aria-hidden="true"></i>
                                    </div>
                                    <div class="col-md-10 col-sm-11 col-xs-10 cust-ninty">
                                        <p class="like_comment"><span class="ninty">90%</span> Customer recommended</p>
                                    </div> -->
                                </div>
                                <div class="col-md-4 col-sm-5 col-xs-6 padd_thirty">
                                    <div class="pull-right">
                                        <div class="col-md-4 col-sm-3 col-xs-4 pad_fixed">
                                             <?php echo $this->Html->image('icon_fixed.png', array('alt' => 'CakePHP','class'=>'fixed_class'));?>
                                        </div>
                                        <div class="col-md-8 col-sm-9 col-xs-8 fixed_txt">                                    
                                           <?php /* Modified by dinesh@braingroom.com 19/07/16*/?>
                                            <?php echo ($class['VendorClasse']['class_timing_id']==2)?'Fixed Class':'Flexible Class'; ?>
                                            <?php /* Modified by dinesh@braingroom.com 19/07/16*/?>
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
                                        <div style="">
                                     <?php /* Modified by dinesh@braingroom.com 19/07/16*/?>   
                                     <?php 
									 $seg_pic = explode(',',$class['VendorClasse']['segment_id']);
											$class_img=$class['VendorClasse']['upload_class_photo'];
											$class_id = base64_encode($class['VendorClasse']['id']);
											/*if(!empty($class['VendorClasse']['upload_class_photo'])){
													
echo $this->Html->link($this->Html->image('Vendor/class_image/'.$class['VendorClasse']['upload_class_photo'].'.jpg', array('class' => 'imgresponsive img-thumbnail')),array('controller'=>'Vendor_classes','action'=>'classes',$class_id),array('escape' => false));
                                                     
                                                 }
			else{
												$seg_pic = explode(',',$class['VendorClasse']['segment_id']);
echo $this->Html->link($this->Html->image('Vendor/'.$result['VendorClasse']['category_id'].'/'.$seg_pic[0].'/defult_pic.jpg', array('class' => 'imgresponsive img-thumbnail')), array('controller'=>'Vendor_classes','action'=>'classes',$class_id), array('escape' => false));
			}*/
                                        ?>
                                        <?php 
											if(!empty($class['VendorClasse']['upload_class_photo'])){
											?>
											<a href="<?php echo HTTP_ROOT?>/classes/<?php echo $class['VendorClasse']['class_topic']; ?>" >
											<?php	

										echo $this->Html->image('Vendor/class_image/'.$class['VendorClasse']['upload_class_photo'].'.jpg', array('class' => 'imgresponsive img-thumbnail'));
											?>
											</a>
											<?php  }else{
											$seg_pic = explode(',',$class['VendorClasse']['segment_id']);
											?>	  <a href="<?php echo HTTP_ROOT?>/classes/<?php echo $class['VendorClasse']['class_topic']; ?>" >
											<?php
											echo $this->Html->image('Vendor/'.$class['VendorClasse']['category_id'].'/'.$seg_pic[0].'/defult_pic.jpg', array('class' => 'imgresponsive img-thumbnail'));
											?>
											</a>
									<?php } ?>
                                        <?php /* Modified by dinesh@braingroom.com 19/07/16*/?>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12 webnair">
                                            <div class="col-xs-6 col-sm-6 vc_c_xs_screen_w_20 padd_l_r">
                                              <div class="col-md-1 col-sm-1 col-xs-2 wenair" style="width:50px">
                                                  <?php echo $this->Html->image('icon_webnair.png', array('alt' => 'Class Type','class'=>'fixed_class'));?>
                                              </div>  
                                              <div class="col-md-9 col-sm-8 col-xs-8 wenair_p">
                                                   <?php echo $class['ClassType']['types'];
                                                   ?>
                                              </div>
                                            </div>
                                            <div class="col-xs-6 col-sm-6 vc_c_xs_screen_w_20 padd_l_r">
                                              <div class="col-md-1 col-sm-1 col-xs-2 wenair" style="width:50px">
                                                  <?php echo $this->Html->image('kids_gang.png', array('alt' => 'CakePHP','class'=>'fixed_class'));?>
                                              </div>  
                                              <div class="col-md-9 col-sm-8 col-xs-8 wenair_p">
                                                 <?php echo $class['Community']['community_name'];
                                                 ?>
                                                 <?php /* Modified by dinesh@braingroom.com 19/07/16*/?>
                                              </div>
                                            </div>    
                                        </div>
                                    </div>
                                </div>
                                <div>
                                </div>

                                

                                <div class="col-md-12 col-sm-12 col-xs-12 padd_thirty br_desc">
                                    <div class="col-md-12 col-sm-12 col-xs-12 padd_l_r desc_clr">
                                     <h4 class="butt_gft vc_c_descrip_txt" align="center">Description</h4>
            <div class="col-md-12 col-sm-12 col-xs-12 desc_cntnt"  style=" margin-top:10px; height:400px; overflow:auto;">
                                            <span>Class Summary:</span>
                                           		<p><?php 
												
												echo preg_replace("/(^[\r\n]*|[\r\n]+)[\s\t]*[\r\n]+/", "\n", $class['VendorClasse']['class_summary']);?></p>
                                            <span>About the Academy:</span>
                                            	<p><?php
												echo preg_replace("/(^[\r\n]*|[\r\n]+)[\s\t]*[\r\n]+/", "\n", $class['VendorClasse']['about_academy']);
												?></p>
                                            <span>About the Class:</span>
                                            <p><?php
						echo preg_replace("/(^[\r\n]*|[\r\n]+)[\s\t]*[\r\n]+/", "\n", $class['VendorClasse']['about_class']);
											 ?></p>
                                            <?php /*?><pre style="white-space: pre-wrap;">    
                          <?php echo preg_replace("/(^[\r\n]*|[\r\n]+)[\s\t]*[\r\n]+/", "\n", $class['VendorClasse']['class_summary']);
											?>
                                            </pre><?php */?>
                                            
                                        </div>
                                        
                                        
          
                                        
                                        
                                        <?php /*?><div class="col-md-12 col-sm-12 col-xs-12 padd_thirty br_desc">
                                    <div class="col-md-12 col-sm-12 col-xs-12 padd_l_r desc_clr">
                                        <div class="col-md-12 col-sm-12 col-xs-12 desc_cntnt">
                                   <h3>Booking Tickets:</h3>
                                                
                                                
                                                <div class="col-md-12 col-sm-12 col-xs-12" style="margin-top:35px;">
                                <center>
                                    <a href="<?php echo HTTP_ROOT;?>/Homes/bookNow"><button class="btn butt_gft
                                         bok-now-btn">
                                        <!-- <i class="fa fa-gift gift_fa" aria-hidden="true"></i> -->
                                        <span class="padd_gft">Book Now</span>
                                    </button></a>
                                </center>
                            </div>
                                                </div>
                                                </div>
                                                
                                                </div><?php */?>
                                                
                                        <!-- <div class="col-md-12 col-sm-12 col-xs-12 desc_what"> -->
                                           <!--  <p>What You'll Learn</p>
                                            <ul>
                                              <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li>
                                              <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li>
                                              <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li>
                                              <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li>
                                            </ul> -->
                                        <!-- </div> -->
                                        <!-- <div class="col-md-12 col-sm-12 col-xs-12 fee_incld"> -->
                                            <!-- <h3>Fee Includes</h3>
                                            <p>Duration</p> -->
                                            <!-- <ul>
                                              <li>  <?php echo $view_class['VendorClasse']['class_duration'];?> or</li> -->
                                              <!-- <li>2 hr 30min per day(Saturday and Sunday)</li> -->
                                           <!--  </ul>
                                        </div> -->
                                        <div class="col-md-12 col-sm-12 col-xs-12 fee_rs">
                                            <!-- <p>Fee: &#8377; <?php echo $view_class['VendorClasse']['price_per_head'];?> </p>
                                            <ul>
                                                <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li>
                                                  <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li>
                                                  <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li>
                                            </ul>       -->
                                        </div>
                   <?php if(!empty($view_class['VendorClasse']['upload_ppt_name']) || !empty($view_class['VendorClasse']['upload_video_name'])):?>
                                        <div class="col-md-12 col-sm-12 col-xs-12 fee_rs downloaddd-link">
                                            <p class="class-title-heading-first">Link for pre request and additional information:</p>
                                            
                                            <?php if(!empty($view_class['VendorClasse']['upload_ppt_name'])):?>
                                                <a href="#"><div class="col-md-12 col-sm-12 col-xs-12 download-class-linkk">Class PPT</div></a>
                                              <?php endif; ?>
                                            <?php if(!empty($view_class['VendorClasse']['upload_video_name'])):?>
                                                <a href="#"><div class="col-md-12 col-sm-12 col-xs-12 download-class-linkk">Class Video</div></a>
                                                <?php endif; ?>
                                        </div>
                                        <?php endif; ?>
                                        <div class="col-md-12 col-sm-12 col-xs-12 fee_rs first-catseg-link">
                                   
                                                <p class="cat-seg"><strong>Category:</strong> 
                                                <?php 
                                                	echo $class['Category']['category_name'];
                                                ?>
                                                </p>
                                                <p class="cat-seg"><strong>Segment:</strong> 
                                                <?php foreach($segments as $segment){
                                                        echo $segment['ClassSegment']['segment_name'];
                                                    }?>
                                                </p>
                                                <p class="cat-seg"><strong>Age Category:</strong> 
                                                <?php 
												$z= explode(',',$class['VendorClasse']['age_category']);
												foreach($z as $x =>$value){
													if($x == 0): $c[$x] = 'Kids'; endif;
													if($x == 1): $c[$x]= 'Teens';endif;
													if($x == 2): $c[$x]= 'Adults';endif;
												}  
												echo implode(',',$c);
											?>
                                                </p>

                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12" style="margin-top:0px; padding:0px;">
                                         
										 <?php if(!empty($class['ClassRegular']) || ($class['ClassLrregular']) || ($class['ClassSchedule'])):?>
                                        
                                        <div class="col-md-12 col-sm-12 col-xs-12 panel panel-default">
                        <div class="panel-heading">
                        <h4 class="panel-title">
                        <a class="btn butt_gft bok-now-btn accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                        Date & Time Information
                        </a>
                        </h4>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                        
                        
                        <div id="collapseThree" class="panel-collapse collapse in">
                        <div class="panel-body">
                      <?php echo $this->Form->create('VendorClasses', array('Controller'=>'vendor_classes', 'action' => 'book_now'));?>  
                       <div>
                   
                      <?php if(!empty($class['ClassSchedule'])):?>
					  <table class="table table-striped table-bordered table-condensed">
                      <tr><th>Date</th><th>Time</th></tr>
                     
                      		<?php foreach($class['ClassSchedule'] as $cls_schedule){
								?>
                         <tr> <td>
                         <?php echo $cls_schedule['session_date']; ?>
                         </td> 
                         <td>
                         <?php echo $cls_schedule['session_time']; ?>
                         </td>    </tr>  
                                <?php
                            }?>
                            
                            </table>                       		
							<?php endif;
					?>
                      </div>
                            <div>
                            	
                                <?php if(!empty($class['ClassLrregular'])):?>
													<?php
                                                   
													$property_types = array();
													$z =0; 
													foreach($class['ClassLrregular'] as $filter_result){
													if ( in_array($filter_result['class_no'], $property_types) ) {
													continue;
													}
													$property_types[] = $filter_result['class_no'];
									$class_irr = $this->Layout->class_irregular($filter_result['vendor_class_id'],$filter_result['class_no']);
									echo '<table class="table table-striped table-bordered table-condensed">';
														echo '<tr>';
									
									foreach($class_irr as $class_irregular){ //echo '<pre>'; print_r($class_irregular); 
														
														echo '<td>';
															echo $class_irregular['ClassLrregular']['date_month'].' @ '.$class_irregular['ClassLrregular']['time_of_day'];
														echo '</td>';
														
														if($z==0){
															?>
                           <td><input type="checkbox" name="check_list[]" value="<?php echo $z?>" checked="checked" disabled="disabled"></td>
                           <input type="hidden" name="irregular_recur_id[]" value="<?php echo $class_irregular['ClassLrregular']['id']; ?>" />
                                                            <?php
															}
															else {
								?><td>Notify</td><?php
																}
													}
									echo '</tr>';
									echo '</table>';
											$z++;		
											}
                                                    
                                                    
                                                    endif;
                                                    ?>
                                                  
                                                    <?php 
													if(!empty($class['RegularRecurringClasse'])):
													
													$i =0;
														
															//
													foreach($class['RegularRecurringClasse'] as $recur){	
															
													$class_reg = $this->Layout->class_regular($recur['vendor_class_id'],$recur['class_no']);
													//echo '<pre>'; print_r($class_reg);
													echo '<table class="table table-striped table-bordered table-condensed">';
													echo '<tr>';
													
													foreach($class_reg as $reg){
														
														echo '<td>';
															echo $reg['RegularRecurringClasse']['day'].' @ '.$reg['RegularRecurringClasse']['time'];
														echo '</td>';
														
														if($i==0){
															?>
                           <td><input type="checkbox" name="check_list[]" value="<?php echo $i?>" checked="checked" disabled="disabled"></td>
                           <input type="hidden" name="regular_recur_id[]" value="<?php echo $reg['RegularRecurringClasse']['id']; ?>" />
                                                            <?php
															}
															else {
								?><td>
			<?php if(empty($reg['VendorClasseNotification']['regular_recurring_class_id'])) { ?>
                <a href="javascript:void(0);" class="btn js-notify" data-class-no="<?php echo $reg['RegularRecurringClasse']['class_no']; ?>" data-vendor-class-id="<?php echo $reg['RegularRecurringClasse']['vendor_class_id']; ?>" data-user-id="<?php echo $user_id['UserMaster']['id'];?>">Notify</a>
                <?php } else { ?>
                <p>Notified</p>
                <?php }?>
                                </td><?php
																}
													}
													echo '</tr>';
													echo '</table>';
													$i++;
													} 
													
														
													endif; 
													?>
                            </div>
                        
                        </div>
                        
                            
                        </div>
                        </div>
                         
                    </div>
                    <?php endif; ?>
                     <div class="col-md-12 col-sm-12 col-xs-12 panel panel-default">
                        <div class="panel-heading">
                        <h4 class="panel-title">
                        <a class="btn butt_gft bok-now-btn accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                        Level Information
                        </a>
                        </h4>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                        
                        
                        <div id="collapseTwo" class="panel-collapse collapse in">
                        <div class="panel-body">
                        
                        <div>
                                            <table class="table table-striped table-bordered table-condensed">
                                            <?php
											foreach($class['VendorClasseLevelDetail'] as $lvl){
												

												?>
                                                <tr><td><?php
					if($lvl['level_id'] == 1) {echo 'Beginner';} elseif($lvl['level_id'] ==2) {echo 'Intermediate';} else { echo 'Expert';}?></td><td width="75px;"><?php
					if($lvl['expert_level_id'] == 1) { echo 'Level 1';} else if($lvl['expert_level_id'] ==2) { echo 'Level 2';} else { echo 'Level 3';};?></td><td><?php
					echo $lvl['Description'];?></td></tr><?php
					
											}
											?></table>
                                           </div>
                        
                        </div>
                        
                            
                        </div>
                        </div>
                         
                    </div>                       
                              <?php if($class['VendorClasse']['is_type'] == 1 || $class['VendorClasse']['is_type'] == 0):?>              
                                       <div class="col-md-12 col-sm-12 col-xs-12 panel panel-default">
                        <div class="panel-heading">
                        <h4 class="panel-title">
                        <a class="btn butt_gft bok-now-btn accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                        Pricing Information
                        </a>
                        </h4>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                        
                        
                        <div id="collapseOne" class="panel-collapse collapse in">
                        <?php echo $this->Form->create('VendorClasses', array('Controller'=>'vendor_classes', 'action' => 'book_now'));?>
                        <div class="panel-body">
                        <div class="col-xs-12 col-sm-12 padd_l_r">
						<?php 
							 echo '<div class="inline_labels col-xs-12 col-sm-12 padd_l_r" style="">';
							echo $this->Form->input('locality', array(
												'options' => $areas,
												'class' => 'form-control reg_input vc_c_xs_select_w',
												'label' => false,
												'optgroup' => false,
												'empty' => '(Select Location)',
											));
											echo '</div>';
						?>
                        <div class="col-xs-12 col-sm-12" style="">  
                        <center>
                          <h3>Address</h3>
                          <span class="js-repl-address" >
                          </span>
                        </center>
                        </div>
                      
                        </div>
                        <div class="book_1500 col-xs-12 col-sm-12 padd_l_r" style="margin-top: 20px; overflow-x:auto;">
                        <table class="table table-striped table-bordered table-condensed">
                        <tr>
                            <th rowspan="2">Expertise</th>
                            <th colspan="4">Level & details</th>
                            </tr>
                            
                            <tr>
                            <td width="30%;" align="center">Choose One</td>
                            <td width="30%;" align="center">Sub Level</td>
                            <td width="10%;" align="center">Price</td>
                            <td width="30%;" align="center">Select Tickets</td>
                            </tr>
                        <?php $i = 1;
                        foreach($class['VendorClasseLevelDetail'] as $classlevel){ 
                        
                        ?>
                        
                        <tr>    
                        <td>
                        <?php	if($classlevel['level_id'] ==1){ echo 'Begineers'; }
                        else if($classlevel['level_id'] ==2){ echo 'Intermediate';}
                        else {  echo 'Expert'; }
                        ?>
                        </td>
                        <td colspan="4">
                        <table class="table table-striped table-bordered table-condensed"><tr>
                        <?php 
                        if($classlevel['expert_level_id'] ==1){ $class_levels = 'Level 1';}
                        else if($classlevel['expert_level_id'] ==2) {$class_levels = 'Level 2';}
                        else if($classlevel['expert_level_id'] ==3){$class_levels = 'Level 3';}
						else { $class_levels = 'NA';}
                        
                        ?>
                        <td width="30%" align="center"> 
                        <input class="check_val_<?php echo $i;?>" value="<?php echo $classlevel['id'];?>" type="checkbox" id="level_<?php echo $i;?>" name="level_check[]" onClick="check_value(<?php echo $i;?>);"/>
                        </td>
                        <td width="30%" align="center"> 
                        
<a href="#javascript:void(0);" title="Description" data-toggle="popover" class="" data-trigger="hover" data-content="<?php echo $classlevel['Description'];?>">
<mark style="color:turquoise;"><?php echo $class_levels;?></mark></a>
                        
                        </td>
                        <td width="10%" align="center"> <?php echo $classlevel['price'];?></td>
                        <input value="<?php echo $classlevel['price'];?>" type="hidden" id="level_price_<?php echo $i;?>" />
                        <td width="30%;" align="center"> 
                        
                        <select style="width:50px;" id="tic_<?php echo $i;?>" name="tic_<?php echo $classlevel['id'];?>" onClick="select_ticket(<?php echo $i;?>);">Select Ticket
                        <?php 
                        for ($z=1; $z<=$class['VendorClasse']['max_ticket_available']; $z++){
                        ?>
                        <option value="<?php echo $z;?>"><?php echo $z;?></option>
                        <?php
                        }
                        ?>
                        </select>
                        
                        <?php /*?><input type="text" name="tic_<?php echo $i;?>" id="tic_<?php echo $i;?>" value="<?php echo $class['VendorClasse']['max_ticket_available'];?>" /><?php */?>
                        </td>
                       <?php /*?> <td width="150px;" align="center">
                        <a href="" data-id="<?php echo $classlevel['id'];?>" class="btn book_now js-show-description" data-toggle="modal" data-target="#myModal">Description</a>
                        </td><?php */?>
                        </tr>
                        </table>
                        
                        </td>
                        </tr>
                        <?php $i++;
                        }
                        ?>
                        <tr><td align="center" colspan="4">Total Amount:</td><td align="center">
                        <span class="tot_amount" id="total_mt"></span>
                        <input type="hidden" id="class-id" name="classid" value="<?php echo $class['VendorClasse']['id'];?>" />
                        <input type="text" id="total_cost" name="total_cost" value="" readonly/></td>
                        </tr>
                        </table>
                        </div>
                        
                        </div>
                        
                            <div class="col-md-12 col-sm-12 col-xs-12" style="margin-bottom:10px;">
                                    <center>
                                        <?php /*?><a href="<?php echo HTTP_ROOT;?>/Homes/bookNow"><button class="btn butt_gft
                                             bok-now-btn">
                                            <!-- <i class="fa fa-gift gift_fa" aria-hidden="true"></i> -->
                                            <span class="padd_gft">Book Now</span>
                                        </button></a><?php */?>
                                        <?php echo $this->Form->submit('Book Now', array('class'=>'js-form-submit btn butt_gft
                                             bok-now-btn'));?>
                                    </center>
                                </div>
                                
                                
                        </div>
                        </div>
                         
                    </div>
                
                                            <div class="col-md-12 col-sm-12 col-xs-12 book_1500  goolge-div-book">
                                            <div class="map_ggl map_ggllle">
                                                <?php /* Modified by dinesh@braingroom.com 19/07/16*/?>
                                                <input type="hidden" name="longitude" id="longitude" value="<?php echo $class['VendorClasse']['longitude'];?> ">
                                                <input type="hidden" name="latitude" id="latitude" value="<?php echo $class['VendorClasse']['latitude'];?> ">
                                                <?php /* Modified by dinesh@braingroom.com 19/07/16*/?>
                                                <div id="gmap" class="ggl_map ggllle_map"></div>
                                            </div>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12" style="margin-top:0px; padding:0px;">
                     <?php /*?><div class="col-md-12 col-sm-12 col-xs-12 panel panel-default">
                        <div class="panel-heading">
                        <h4 class="panel-title">
                        <a class="btn butt_gft bok-now-btn accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                        Level Information
                        </a>
                        </h4>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                        
                        
                        <div id="collapseTwo" class="panel-collapse collapse in">
                        <div class="panel-body padd_l_r">
                        
                        <div class="col-xs-12 col-sm-12 padd_l_r" style="overflow:auto;">
                                            <table class="table table-striped table-bordered table-condensed">
                                            <tr>
                                            	<th>Expert Level</th>
                                                <th>Sub Level</th>
                                                <th>Description</th>
                                            </tr>
                                            <?php
											foreach($class['VendorClasseLevelDetail'] as $lvl){
												?>
                                                <tr><td><?php
					if($lvl['level_id'] == 1) {echo 'Beginner';} elseif($lvl['level_id'] ==2) {echo 'Intermediate';} else { echo 'Expert';}?></td><td width="75px;"><?php
					if($lvl['expert_level_id'] == 1) { echo 'Level 1';} else if($lvl['expert_level_id'] ==2) { echo 'Level 2';} else if($lvl['expert_level_id'] ==3) { echo 'Level 3';} else {echo 'NA';}?></td><td><?php
					if(!empty($lvl['Description'])){ echo $lvl['Description']; } else { echo 'NA';}?></td></tr><?php
					
											}
											?></table>
                                           </div>
                        
                        </div>
                        
                            
                        </div>
                        </div>
                         
                    </div><?php */?>                       
                                            
                    
                
                
                
                                            <div class="col-md-12 col-sm-12 col-xs-12 book_1500  goolge-div-book">
                                            <div class="map_ggl map_ggllle">
                                                <?php /* Modified by dinesh@braingroom.com 19/07/16*/?>
                                                <input type="hidden" name="longitude" id="longitude" value="<?php echo $class['VendorClasse']['longitude'];?> ">
                                                <input type="hidden" name="latitude" id="latitude" value="<?php echo $class['VendorClasse']['latitude'];?> ">
                                                <?php /* Modified by dinesh@braingroom.com 19/07/16*/?>
                                                <div id="gmap" class="ggl_map ggllle_map"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                
                                 
                                <!-- <div class="col-md-12 col-sm-12 col-xs-12">
                                    <h3 class="cls_loc">Location</h3>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12 book_1500">
                                    <div class="map_ggl">
                                        <input type="hidden" name="longitude" id="longitude" value="<?php //echo $view_class['VendorClasse']['longitude'];?> ">
                                        <input type="hidden" name="latitude" id="latitude" value="<?php //echo $view_class['VendorClasse']['latitude'];?> ">
                                        <div id="googleMap" class="ggl_map"></div>
                                    </div>
                                </div -->
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12 rs_fty right-sidebar">
                            <div class="col-md-12 col-sm-12 col-xs-12 book_1500 right-book-first">
                                <div class="col-md-12 col-sm-12 col-xs-12 sr_pv_padding_lr right-book-content-first">
                                <div class="col-sm-12 col-xs-6 fifhndrd padd_l_r"><h3 id="book_to_amt">&#8377; 
								<?php echo $class['VendorClasseLevelDetail'][0]['price']?>
								</div>
                <div class="col-xs-12 col-sm-12 padd_l_r">
                    <div class="col-sm-12 col-xs-12 book_center padd_l_r">
                    <?php if($gift[0] != 'gift'):?>
                        <a class="js-form-submit-upper btn book_now vc_c_book_now_btn_20" href="javascript:void(0);">Book Now</a>
                        <?php endif; ?>
                    <!-- </div>
                    <div class="col-sm-6 col-xs-6 book_center" style="margin-top: 8px;">   -->
    							      <a href="<?php echo HTTP_ROOT.'/Homes/gift_class1';?>">
                            <button class="btn butt_gft vc_c_gift_btn_20">
                                <i class="fa fa-gift gift_fa" aria-hidden="true"></i>
                                <span class="padd_gft">Gift This Class</span>
                            </button>
                        </a> 
			  
			  <?php if(!empty($user_id)){ ?>
                          <?php if(empty($check_data)) { ?>
                              <div id="add_wish_list" class="btn butt_gft vc_c_gift_btn_20" 
                                    onclick="addwishlist(<?php echo $class['VendorClasse']['id'];?>);">
                                <i class="fa fa-heart gift_fa" aria-hidden="true"></i>
                                <span class="padd_gft">Add To Wishlist</span>
                              </div>
                          <?php }else{ ?>
                            <div class="btn butt_gft vc_c_gift_btn_20" style="Background-color:#00487b;pointer-events:none;">
                              <i class="fa fa-heart gift_fa" aria-hidden="true"></i>
                              <span class="padd_gft">Added To Wishlist</span>
                            </div>
                          <?php } } ?>
			    
        	         </div>
                </div>
                                <?php /*?><div class="col-md-12 col-sm-12 col-xs-12 padisplay">
                                    <div class="col-md-2 col-sm-3 col-xs-1 padd_beg">
                                        <?php echo $this->Html->image('sideicon1.png', array('alt' => 'CakePHP','class'=>'fixed_class'));?>
                                    </div>
                 <!--                   <div class="col-md-8 col-sm-9 col-xs-10 begin_lm cust-md-padd right-bgin-content booknow-content">
                                    </div>
                 -->               </div><?php */?>      
                                <div class="col-md-12 col-sm-12 col-xs-12 padisplay1 ">
                                    <div class="col-md-2 col-sm-3 col-xs-1 padd_beg">
                                        <?php echo $this->Html->image('sideicon2.png', array('alt' => 'CakePHP','class'=>'fixed_class'));?>
                                    </div>
                                    <div class="col-md-8 col-sm-9 col-xs-10 begin_lm cust-md-padd right-bgin-content booknow-content">
                                        Flexible
                                    </div>
                                </div>
                                 <div class="col-md-12 col-sm-12 col-xs-12 padisplay1 ">
                                    <div class="col-md-2 col-sm-3 col-xs-1 padd_beg">
                                        <?php echo $this->Html->image('session.png', array('alt' => 'CakePHP','class'=>'fixed_class'));?>
                                    </div>
                                    <div class="col-md-8 col-sm-9 col-xs-10 begin_lm cust-md-padd right-bgin-content booknow-content">
                                       <?php /* Modified by dinesh@braingroom.com 19/07/16*/?>
                                        <?php echo $class['VendorClasse']['no_of_session'].' '.'Sessions';?>
                                        <?php /* Modified by dinesh@braingroom.com 19/07/16*/?>
                                    </div>
                                </div>
                                <?php /* Modified by dinesh@braingroom.com 19/07/16*/?>
                                <div class="col-md-12 col-sm-12 col-xs-12 padisplay1">
                                    <div class="col-md-2 col-sm-3 col-xs-1 padd_beg">
                                        <?php echo $this->Html->image('sideicon3.png', array('alt' => 'CakePHP','class'=>'fixed_class'));?>
                                    </div>
                                    <?php 
                                        $flexclass = $class['VendorClasse']['class_timing_id'];
                                        if($flexclass == 1){
                                    ?>
                                        <div class="col-md-8 col-sm-9 col-xs-10 begin_lm right-bgin-content  cust-md-padd booknow-content">
                                            <?php echo $class['VendorClasse']['class_duration'].' '.'Hours';?>
                                        </div>
                                    <?php }  ?>
                                </div>
                                <?php /* Modified by dinesh@braingroom.com 19/07/16*/?>
                                <div class="col-md-12 col-sm-12 col-xs-12 padisplay1">
                                    <div class="col-md-2 col-sm-3 col-xs-1 padd_beg">
                                        <?php echo $this->Html->image('sideicon4.png', array('alt' => 'CakePHP','class'=>'fixed_class'));?>
                                    </div>
         <div class="col-md-10 col-sm-9 col-xs-10 begin_lm cust-md-padd right-bgin-content booknow-content js-change-address">
                                        <?php echo $class['VendorClasseLocationDetail'][0]['location'];?>
                                    </div>
                                </div>
                                 <div class="col-md-12 col-sm-12 col-xs-12 padisplay1">
                                    <?php /*?><div class="col-md-2 col-sm-3 col-xs-1 padd_beg">
                                        <?php echo $this->Html->image('sideicon5.png', array('alt' => 'CakePHP','class'=>'fixed_class'));?>
                                    </div>
                                    <div class="col-md-10 col-sm-9 col-xs-10 begin_lm cust-md-padd right-bgin-content booknow-content">
                                       <?php 
                                        if($class['VendorClasse']['age_from'] != ""){
                                        echo $class['VendorClasse']['age_from'];?> To  <?php echo $class['VendorClasse']['age_to'];?> Yrs Age Group
                                        <?php }else{?>
                                        N/A
                                        <?php }?>
                                    </div>
                                </div><?php */?>
                                <div class="col-md-12 col-sm-12 col-xs-12 padisplay1">
                                    <div class="col-md-12 col-sm-12 col-xs-12 pad_fb share-book-content" style="padding-left:0">
                                        <div class="col-md-12 col-sm-12 col-xs-12 share">
                                            Share This Deal
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12 padd_l_r  share-book-content-element">
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
                                
                                <div class="col-md-12 col-sm-12 col-xs-12 video-div vc_c_video_tag_20" style="">
                                    <h3 class="cls_loc vc_c_video_tag_20">Location</h3>
                                    
                               <?php     
							   foreach($class['VendorClasseLocationDetail'] as $Localities){
								   		$loc_name[] = $Localities['Locality']['name'];
										$loc_id[] = $Localities['id'];
										//$onearr=array_combine(range(1, count($loc_name)), $loc_name);
										$onearr = array_combine($loc_id,$loc_name); 
								   }
								   $attributes = array('legend' => false,'separator'=>'<br />');
								   echo '<div class="inline_labels" style="padding-left:20px;font-size:16px;">';
									echo $this->Form->input('VendorClasseLocationDetail', array(
	
										'options' => $areas,
										'type' => 'radio',
										'legend' => false,
										'separator'=>'<br />',
										'value' => 1
									));
									echo '</div>';
								?>
                                    </div>

                                <div class="col-md-12 col-sm-12 col-xs-12 video-div vc_c_video_tag_20">
                                    <div class="col-xs-12 col-sm-12 padd_l_r"></div>
                                    <div class="col-xs-12 col-sm-12 video_tag_div_pad">
                                       <h3 class="cls_loc">Video</h3>
									<?php if(!empty($class['VendorClasse']['upload_video_name'])):
									 $video = $class['VendorClasse']['upload_video_name']; 
									endif;
									?>
                                    <video class="class-video" src="<?php echo HTTP_ROOT;?>/vedio/<?php echo $video; ?>"  controls autoplay>
                     <!--   <source src="<?php //echo HTTP_ROOT;?>/vedio/<?php //echo $video; ?>"  type="video/mp4"> -->
                    
                                    </video>
                                    </div>
                                </div>
                            </div>
                            
                                <div class="col-md-12 col-sm-12 col-xs-12 find_people join_class video_tag_div_pad" style="margin-top: 20px;">
                                    <div class="col-md-12 col-sm-12 col-xs-12 people_aricon people_aricon-div">
                                        <div class="col-md-12 col-sm-12 col-xs-12 people_around people-join-class">
                                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 globe">
                                                <?php echo $this->Html->image('btnicon1.png', array('alt' => 'CakePHP','class'=>'fixed_class1'));?>    
                                            </div>
                                            <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 around-font-p around_p vc_c_find_class20">
                                                Find People around you who are attending this class
                                            </div>
                                        </div>    
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12 people_aricon1 people_aricon-div" style="margin-top:10px;">
                                        <div class="col-md-12 col-sm-12 col-xs-12 people_book people-join-class">
                                            <div class="col-md-2 col-sm-2 col-xs-2 globe">
                                                <?php echo $this->Html->image('btnicon2.png', array('alt' => 'CakePHP','class'=>'fixed_class1'));?> 
                                            </div>
                                            <div class="col-md-10 col-sm-10 col-xs-10 around-font-p around_p vc_c_find_class20">
                                                Book This Class and join related Interest Groups
                                            </div>
                                        </div>    
                                    </div>
                                     <div class="col-md-12 col-sm-12 col-xs-12 people_aricon1 people_aricon-div empty-Div termsscroll ts1" style="margin-top:10px;"><h4>Terms and Conditions</h4>
                                    <!--<h5 style="color:#00cdc6;">Fixed / Flexible Class View Page</h5>-->
                                    <ul>
<li class="listdesign">Fixed classes will have fixed timing, date & place. Fixed classes once booked cannot be cancelled by the user.
</li><li class="listdesign">For Flexible class, after booking, users can call vendors and fix class at a mutually convenient time & place; as per the policy, vendor should start a flexible class within one month of class booking date.
</li><li class="listdesign">No refund for customer initiated cancellations.
</li><li class="listdesign">Refund is possible only in the case where tutor/academy is cancelling the class before / in between or not conducting the classes for the mentioned time period.
</li><li class="listdesign">Class booking through BrainGroom will attract convenience charge from Payment Gateway provider 
</li><li class="listdesign">Please go through the description of each class carefully before you book a class.
<!--<h5 style="color:#00cdc6;">Catalogue Class View Page </h5>
</li><li class="listdesign">Organizer or the person booking Braingroom Catalogue class should possess or should be able to arrange location to conduct class
</li><li class="listdesign">Vendor/Tutor will visit the organizer's location on designated time & at designated date to conduct the class
</li><li class="listdesign">"Get Quote" request is intended to finalize price for catalogue classes as per the specific requirement & volume through series of queries between tutor/academy and organizer (Braingroom user). All these discussions will be mediated by Braingroom admin. 
</li><li class="listdesign">If Vendor/Tutor cancels a catalogue class, then organizer will be refunded the total amount within 7 days of cancellation
</li><li class="listdesign">If a Vendor/Tutor cancels three consecutive catalogue classes, then his account & associated email ids will be deactivated from braingroom.com
 <h5 style="color:#00cdc6;">Post Class Page:</h5>
<h6>Class Posting</h6>
</li><li class="listdesign">Listing classes in braingroom.com is free. Anyone can browse, choose, book and pay for classes through braingroom.com
</li><li class="listdesign">Braingroom guarantees the credibility of profile information provided only by the "registered & verified" vendors. To become a verified vendor & to stand out from the crowd, vendors should mail us photocopies of their credentials (certificates, accolades etc)
</li><li class="listdesign">Vendor can post a class as a normal B2C class with price, location, date & time under "Fixed Class"
</li><li class="listdesign">If vendor wants to provide classes on flexible schedules as per availability, then same can be posted with total class duration & location under "Flexible Class" 
</li><li class="listdesign">If vendor wants to add class for bulk booking alone then they can post it under "Catalogue Class / B2B Class" 
</li><li class="listdesign">To convert an existing Fixed / Flexible class into Catalogue/B2B class, vendor needs to place that request for that specific class under "Add Class to Catalogue" tab.
</li><li class="listdesign">Please make sure the class title has a clear format as given below :-
Fixed :	
Flexible :
Catalogue :
</li><li class="listdesign">Also please mention class summary, about the academy / tutor, about the class in the right order to attract more customers
</li><li class="listdesign">Also try to upload relevant photos & videos for your class to give more information about your facilities & academy
Payment & Class Cancellation
</li><li class="listdesign">Braingroom.com collects a 10% commission on the listing price for each class ticket sold.
</li><li class="listdesign">For flexible classes, it is the tutor/academy's responsibility to enter the class start code & end code to ensure the class progress is getting tracked in the system for payment processing. 
</li><li class="listdesign">Only after getting the end code, the payment will be processed. If vendor fails to enter these codes, the money will be with Braingroom and vendor has one month to re-enter the code / call Braingroom to provide code & process payment.
</li><li class="listdesign">Within 3 working days after the fixed / flexible class completion, the tutors' / coaching institutes (vendors) will receive a sales summary via email. Payment happens in three cycles in a month at Braingroom. It will happen on every 10th, 20th & 30th of a month. During these cycles, Braingroom will make payment to your designated bank account via Internet Banking. 
</li><li class="listdesign">Please ensure that a minimum of 2 days' advance notice is given to attendees who have booked the cancelled class. As a tutor/ academy, when you cancel 3 classes in a row, your account will be deactivated from Braingroom.
</li><li class="listdesign">If a vendor fails to start a flexible class within one month, then the learner is eligible for refund and vendor will be placed in the red list for further investigation.
Promoting Class in Featured List
</li><li class="listdesign">Tutors/Academies can promote their Classes in featured list in home page & category page by making payments accordingly. 
</li><li class="listdesign">Class postings, Add class to Catalogue requests and Featured promote class requests – all these come under admin verification; Admin's decision will be final in all these cases.
</li><li class="listdesign">For vendors taking BrainGroom help to upload classes should be aware that it is their responsibility to provide the right description, details & pictures. Braingroom cannot be responsible for any such mismatch in the information provided.-->


                                      
                                     </div>
                                </div> 
                            
                        </div>
                        
                    </div>    <div class="col-md-12 col-sm-12 col-xs-12 people_aricon1">
                            <!-- work 12col -->
                            <?php if($class['VendorClasse']['recurring_class_id'] != 0) { ?>
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
                                                                    <button class="btn recur_book1">Book Now</button>
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
                                                                    <button class="btn recur_book1">Book Now</button>
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
                                                                    <button class="btn recur_book1">Book Now</button>
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
                                                                    <button class="btn recur_book1">Book Now</button>
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
                            <?php /*?><div class="col-md-12 col-sm-12 col-xs-12" style="margin-top:150px;">
                                <center>
                                    <a href="<?php echo HTTP_ROOT;?>/Homes/bookNow"><button class="btn butt_gft
                                         bok-now-btn">
                                        <!-- <i class="fa fa-gift gift_fa" aria-hidden="true"></i> -->
                                        <span class="padd_gft">Book Now</span>
                                    </button></a>
                                </center>
                            </div><?php */?>
                           
                                <!-- image slider -->
                                
                                <!-- image slider -->
                                <!--<div class="col-md-12 col-sm-12 col-xs-12 image_sldr1">
                                    <center>
                                        <a href="<?php echo HTTP_ROOT.'/Homes/gift_class1';?>">
                                            <button class="btn butt_gft">
                                                <i class="fa fa-gift gift_fa" aria-hidden="true"></i>
                                                <span class="padd_gft">Gift This Class</span>
                                            </button>
                                        </a>   
                                        <div class="sold_20">
                                            <span class="pad10">10 Available/20 Sold</span>
                                            <i class="fa fa-heart pad_heart" aria-hidden="true"></i>
                                            <span class="add_wish">Add To Wishlist</span>
                                        </div>
                                    </center>
                                </div>-->
                             	<div class="col-md-12 col-sm-12 col-xs-12 image_sldr">
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
                                              <?php echo $this->Html->image('001.jpg', array('alt' => 'CakePHP','class'=>'img-responsive'));?>
                                            </div>
    
                                            <div class="item">
                                              <?php echo $this->Html->image('002.jpg', array('alt' => 'CakePHP','class'=>'img-responsive'));?>
                                            </div>
    
                                            <div class="item">
                                              <?php echo $this->Html->image('003.jpg', array('alt' => 'CakePHP','class'=>'img-responsive'));?>
                                            </div>
    
                                            <div class="item">
                                              <?php echo $this->Html->image('004.jpg', array('alt' => 'CakePHP','class'=>'img-responsive'));?>
                                            </div>
                                            
                                            <div class="item">
                                              <?php echo $this->Html->image('005.jpg', array('alt' => 'CakePHP','class'=>'img-responsive'));?>
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
                                </div>
                            <div><div class="col-xs-12 col-sm-12 pad_all">
                            <br/>
          <center>
          <span class="learning01">Recommended Classes</span>
          </center>
      </div>
      <div class="">&nbsp;</div>
      <div class="col-xs-12 col-sm-12 ">
          <center>
              <img src="<?php echo HTTP_ROOT;?>/img/underline.png" alt="images not found" class="b_img_line img-responsive">
          </center>
      </div>            
      

      <div class="">&nbsp;</div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
              <div class="row slide3_row1">
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            
                      <div id="testimonials" class="container-fluid">
                          <div class="row">
                              <div class="C_17_num flex-index-slider">
            
                                  <div id="grid-contant-slider1" class="b_sld">
                                    
                                          <?php 
                                              foreach ($recommended_class as $result) { 
                                                $class_topic = $result['VendorClasse']['class_topic'];
                                                $trending_status = $result['VendorClasse']['trending_status'];
												$class_id = base64_encode($result['VendorClasse']['id']);
                                          ?>
                                          <div class="item b_1_crs treding" id="<?php echo $result['VendorClasse']['id'];?>">
                                            
                                            <li>
                                              <div class="grid1 gridworkshopsbg1 grid-slider-image">
                                                <div class="view1 view-first">
                                                  <div class="index_img">
                                                  <?php 
                                                  echo "<span class='flexible-fixed flexible-fixed-index'>";
                                                  echo ($result['VendorClasse']['class_timing_id'] == 2)?'Fixed':'Flexible';
                                                  echo "</span>";
                                                  ?>
                                                  <?php /*?>  <?php if(!empty($result['VendorClasse']['upload_class_photo'])){
													
echo $this->Html->link($this->Html->image('Vendor/class_image/'.$result['VendorClasse']['upload_class_photo'].'.jpg', array('class' => 'imgresponsive img-thumbnail')),array('controller'=>'Vendor_classes','action'=>'classes',$class_id),array('escape' => false));
                                                     
                                                 }
			else{
												$seg_pic = explode(',',$result['VendorClasse']['segment_id']);
echo $this->Html->link($this->Html->image('Vendor/'.$result['VendorClasse']['category_id'].'/'.$seg_pic[0].'/defult_pic.jpg', array('class' => 'imgresponsive img-thumbnail')), array('controller'=>'Vendor_classes','action'=>'classes',$class_id), array('escape' => false));
			}
            ?><?php */?>
            <?php 
											if(!empty($result['VendorClasse']['upload_class_photo'])){
											?>
											<a href="<?php echo HTTP_ROOT?>/classes/<?php echo $result['VendorClasse']['class_topic']; ?>" >
											<?php	
	//echo $this->Image->resize('Vendor/class_image/'.$result['VendorClasse']['upload_class_photo'].'.jpg','305','148', array('class' => 'imgresponsive img-thumbnail'));
	echo $this->Html->image('Vendor/class_image/'.$result['VendorClasse']['upload_class_photo'].'.jpg', array('class' => 'imgresponsive img-thumbnail'));
											?>
											</a>
											<?php  }else{
											$seg_pic = explode(',',$result['VendorClasse']['segment_id']);
											?>	  <a href="<?php echo HTTP_ROOT?>/classes/<?php echo $result['VendorClasse']['class_topic']; ?>" >
											<?php
											echo $this->Html->image('Vendor/'.$result['VendorClasse']['category_id'].'/'.$seg_pic[0].'/defult_pic.jpg', array('class' => 'imgresponsive img-thumbnail'));
											?>
											</a>
									<?php } ?>
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
                                                  <div class="provider-by" style="color:black !important; margin-bottom:10px !important;">
                                                  <strong>By:</strong>
                                                  <?php 
                                                  if($result['User']['vendor_type_id'] ==2):
                                                        echo $result['User']['first_name'].' '.$result['User']['last_name'];
                                                    else:
                                                        echo $result['User']['institute_name'];
                                                    endif;
                                                  ?>
                                                  </div>
                                                  <div class="indx-address">Place :<?php echo $result['VendorClasseLocationDetail'][0]['Locality']['name'];?></div>
                                                  <h5>No of Sessions:&nbsp;<?php echo $result['VendorClasse']['no_of_session'];?> </h5>
                                                  <h5>Total Duration:&nbsp;<?php echo $result['VendorClasse']['class_duration'].' '.'Hours';?> </h5>
                                                  </div>
                                               
                                              </div>
                                            </li>
                                          </a>
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

                            
                            
                            <!-- worh 12 col -->
                        </div>
                </div>
                <!-- work -->
            </div>
        </div>
    </div>    
</div>
</div>
 <?php
 $mapper = array();
 foreach($class['VendorClasseLocationDetail'] as $locz => $value){ 
	 	$mapper[$locz]['lat'] = $value['latitude'];
		$mapper[$locz]['lng'] =$value['longitude'];
		$mapper[$locz]['description'] =$value['location'];
		$mapper[$locz]['title'] = $class['VendorClasse']['class_topic'];
	 }
$loc = json_encode($mapper);
?>	
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true&libraries=places&key=AIzaSyBTWFXzW0kk-GOyASPoip3CXq02xbhr_z4"></script> 
<script>
// <![CDATA[
var markers = <?php echo $loc; ?>;
window.onload = function () {
var mapOptions = {
center: new google.maps.LatLng(markers[0].lat, markers[0].lng),
zoom: 10,
mapTypeId: google.maps.MapTypeId.ROADMAP
};
var map = new google.maps.Map(document.getElementById("gmap"), mapOptions);
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
		  $('.js-form-submit-upper').on('click',function(){
			  
				var len = document.getElementsByName('level_check[]').length;

				var location = $('#VendorClassesLocality').val();
				var z ;
				var total =0;
				if(location == ''){
					alert('Please select location');
					$('.panel-collapse').collapse('show');
					$('#VendorClassesLocality').focus();
					return false;
				} 
				else if ($("#VendorClassesBookNowForm input:checkbox:checked").length == 0)
				{
					alert('Please select your level');
					$('.panel-collapse').collapse('show');
					$('#VendorClassesLocality').focus();
					return false;
				}
				else
				{	
					$('#VendorClassesBookNowForm').submit();
					return true;
				}
				return false;
		
			  
		  });
		  $('.js-gift-submit').on('click',function(){
				var len = document.getElementsByName('level_check[]').length;
				var location = $('#VendorClassesLocality').val();
				var z ;
				var total =0;
				if(location == ''){
					alert('Please select location');
					return false;
				} 
				else if (len > 0)
				{
					
					return true;
				}
				else
				{	alert('Please select your level');
					return false;
					}
		return false;
		});
		$('.js-form-submit').on('click',function(){
				var len = document.getElementsByName('level_check[]').length;
				var location = $('#VendorClassesLocality').val();
				var z ;
				var total =0;
				if(location == ''){
					alert('Please select location');
					return false;
				} 
				else if (len > 0)
				{
					return true;
				}
				else
				{	alert('Please select your level');
					return false;
					}
		return false;
		});
		$('[data-toggle="popover"]').popover();
		$('.panel-collapse.in').collapse('hide');          
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
        $('.provider-name').click(function(){
          var id = $(this).attr('id');
          window.location.href = "<?php echo HTTP_ROOT;?>/Homes/profile/"+btoa(id);
        });
       /* Modified by dinesh@braingroom.com 19/07/16*/ 
       $('.profile-img').click(function(){
          var id = $(this).attr("profile-pic<?php echo $class['VendorClasse']['user_id'];?>");
          window.location.href = "<?php echo HTTP_ROOT;?>/Homes/profile/"+btoa(id);
        });
		/* Modified by dinesh@braingroom.com 19/07/16*/ 
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

</script>
<script type="text/javascript">
$(document).ready(function(){
	$('.bxslider').bxSlider({
	  auto:true,
	  minSlides: 1,
	  maxSlides: 4,
	  slideWidth: 270,
	  slideMargin: 0
	});
});
</script>

<script>
	function select_ticket(i){
		
		if (document.getElementById('level_'+i).checked){
			//document.getElementById('total_cost').value ='';	
					var len = document.getElementsByName('level_check[]').length;
					var z ;
					var total =0;
					for(z =1; z<=len; z++){
						
							if (document.getElementById('level_'+z).checked){
								var level_price = document.getElementById('level_price_'+z).value;
								var max_tickets = document.getElementById('tic_'+z).value;
								// sum = parseInt(level_price*max_tickets);
								   total += parseInt(level_price*max_tickets);
							}
							
						}
					document.getElementById('total_cost').value = total;
					$('#book_to_amt').html('&#8377;'+total);
		}
		else {
			alert('Please check the level before selecting tickets');
		}
	}
  function check_value(i){
		  if (document.getElementById('level_'+i).checked){
			  	
				 	var level_price = document.getElementById('level_price_'+i).value;
					var max_tickets = document.getElementById('tic_'+i).value;
					var total_mt = document.getElementById('total_cost').value;
					if(total_mt === '' || typeof total_mt === "undefined"){total_mt =0;}
					var tot_amount = parseInt(total_mt) + level_price*max_tickets;
					document.getElementById('total_cost').value = tot_amount;
					$('#book_to_amt').html('&#8377;'+tot_amount);
			  } else {
					var level_price = document.getElementById('level_price_'+i).value;
					var max_tickets = document.getElementById('tic_'+i).value;
					var total_mt = document.getElementById('total_cost').value;
					if(total_mt === '' || typeof total_mt === "undefined"){total_mt =0;}
					var tot_amount = parseInt(total_mt) - level_price*max_tickets;
					document.getElementById('total_cost').value = tot_amount;
					$('#book_to_amt').html('&#8377;'+tot_amount);
			}
  }
			
  </script>
  <script type="text/javascript">
 	$(document).ready(function(){
		document.getElementById('total_cost').value ='';
		
		var w = document.getElementsByTagName('input'); 
			for(var i = 0; i < w.length; i++){ 
				if(w[i].type=='checkbox'){ 
					w[i].checked = false; 
				}
		}
	});
</script>


<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">More Information</h4>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default close" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script>
$('#myModal').on('shown.bs.modal', function () {
  $('#myInput').focus()
})
$(document).ready(function(){
	$('#VendorClassesLocality').on('change', function (){
		var id = $(this).val();
		$.ajax({
			type: "POST", url: "/picolo/vendor_classe_location_details/get_address/"+id,
			data: $(this).serialize(),
			async: false,
					success: function(response){
						$('.js-repl-address').html(response);
					}
		});
	});
	$('.js-show-description').on('click',function (){
		var id =$(this).data('id');
		$.ajax({
			type: "POST", url: "/vendor_classe_level_details/description/"+id,
			data: $(this).serialize(),
			async: false,
					success: function(response){
					$('.modal-body').html(response).modal();
					$(".modal-body").dialog({         
					height: 140,
					modal: true,
					buttons: {
					Ok: function() {
					//$(".modal").dialog('close');
					$('.#myModal').remove();
					}
					}
					}); //dialog
					}//success
			});//ajax
	});
		$('.js-show-locations').on('click',function (){
		var id =$(this).data('id');
		$.ajax({
			type: "POST", url: "/vendor_classe_location_details/details/"+id,
			data: $(this).serialize(),
			async: false,
					success: function(response){
					$('.modal-body').html(response).modal();
					$(".modal-body").dialog({         
					height: 140,
					modal: true,
					buttons: {
					Ok: function() {
					$(this).dialog('close');
					}
					}
					}); //dialog
					}//success
			});//ajax
	});
	$("input[name='data[VendorClasses][VendorClasseLocationDetail]']").on("click",function() {
		
		var id = $(this).val();
		$.ajax({
			type: "POST", url: "/picolo/vendor_classe_location_details/get_address/"+id,
			data: $(this).serialize(),
			async: false,
					success: function(response){
						$('.js-change-address').html(response);
						}//success
			});
	});
});
	
// add wishlist java script function 
	
function addwishlist(classid){

   var userid = "<?php echo $user_id; ?>";

    $.ajax({  

          type: "POST",  
          url:  "<?php echo HTTP_ROOT; ?>/Homes/addwishlist",  
          data: 'classid='+classid+'&userid='+userid,  
       
          success: function(res){  
          
            if(res == 2){
             
              $('#add_wish_list > span').text('Added To Wishlist');
            }
            if(res == 1){

              $('#add_wish_list').css({'background-color':'#00487b','pointer-events':'none'});
              $('#add_wish_list > span').text('Added To Wishlist');
            
            }
         }
    });
}

	
</script>
