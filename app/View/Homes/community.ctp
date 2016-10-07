<style type="text/css">
.cat_bg_color {
    background: #00CDC6 none repeat scroll 0% 0%;
    cursor: pointer;
}
.seg_brd_tp_class_segment {
    border-bottom: 1px solid #00C3C1;
}

.flexible-fixed-fun {
    color: #FFF;
    background-color: #00CDC6;
    font-family: OS_regular;
    padding: 3px 6px;
    z-index: 1050;
    position: absolute;
    border-radius: 25px;
    top: 35px;
    left: 21px;
    width: 69px;
    height: 28px;
    text-align: center;
    font-size: 13px;
}

.image_price12-fun {
    background-color: #00CDC6;
    height: 26px;
    margin-right: 5px;
    border-radius: 25px;
    width: 61px;
    padding: 4px 0px;
    position: relative;
    bottom: -34px;
    text-align: center;
}
.pull-right-fun {
    float: right !important;
}
.flexible-fixed_price {
    color: #fff;
    background-color: #00CDC6;
    font-family: OS_regular;
    padding: 5px 13px;
    z-index: 1050;
    position: absolute;
    border-radius: 25px;
    top: 8px;
    width: 70px;
    height: 30px;
    text-align: center;
    float: right !important;
}

.hathyga {
    text-transform: capitalize;
    font-size: 20px;
    color: #01091C;
    font-family: "os_Regular";
    margin-top: 22px;
}
.morecontent span {
  display: none;
}
.comment {
    width: 400px;
    background-color: #F0F0F0;
    margin: 10px;
}
.city {
    word-wrap: break-word;
    text-transform: capitalize;
}
.city {
    font-size: 14px;
    font-family: "os_regular";
    padding-left: 14px;
}
.text-justify {
    text-align: justify;
}
a.morelink {
    text-decoration: none;
    outline: medium none;
}
a:focus, a:hover {
    color: #23527C;
    text-decoration: underline;
}
</style>
<?php
//echo HTTP_ROOT;
	$total_class = count ($all_total_class); 
	$com_banner  = $com_img['Communitie']['community_banner'];
	$com_id      = $com_img['Communitie']['id'];
	$action_url  = HTTP_ROOT.'/Homes/community/'.$com_id;
?>
<input type="hidden" name="" id="total_page" value="<?php echo $total_class; ?>">
<input type="hidden" name="" id="page_load" value="<?php echo $page; ?>">
<input type="hidden" name="" id="show_type" value="<?php echo @$filter; ?>">
<div class="col-md-12 col-sm-12 col-xs-12 padd_l_r">
  <div class="col-md-12 col-sm-12 col-xs-12 padd_l_r">
  
    <a href="#">
      <!--<img src="<?php //echo HTTP_ROOT;?>/img/profile_img/fun.jpg" class="img-responsive" alt="">-->
	  <img src="<?php echo HTTP_ROOT;?>/img/community_image/<?php echo $com_banner; ?>" class="img-responsive" alt="community_image">
    </a>
  </div>
</div>  
<div class="col-xs-12 col-sm-12  col-md-12 col-lg-offset-1 col-lg-10" >
          <div class="container-fluid  padd_l_r" style="">
            <div class="col-md-12 col-sm-12 col-xs-12 funtr"> 
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padd_l_r">
        <h4 class="feature_work">Featured Workshop &amp; Classes</h4>
    </div>
</div>
<div class="col-md-12 col-sm-12 col-xs-12" style="border:2px solid #00CDC6;">  </div>
        <!-- silder box 1 -->

          <div class=" col-md-12 col-sm-12 col-xs-12 pad_all funsld">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
                    <div class="row slide3_row1">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div id="testimonials" class="container-fluid">
                                <div class="row">
                                    <div class="C_17_num">        
                                        <div id="grid-contant-slider1" class="b_sld">
                                            <!-- item 1 -->
                                            <div class="item b_1_crs">
                                                <li>
                                                  <div class="grid1 gridworkshopsbg1">
                                                    <div class="view1 view-first">
                                                      <div class="index_img">
                                                        <img src="<?php echo HTTP_ROOT;?>/img/pics9.png" class="img-responsive" alt=""/>
                                                        <button class="btn butt_dollar">&#8377;320</button>
                                                      </div>                 
                                                    </div>                                                
                                                    <div class="golden">
                                                          <h4>Cookie Pods Workshop</h4>
                                                          <p>PLACE :EAST NAGAR, BNG</p>
                                                          <h5>Sat, 15 jan, 7 to 8pm </h5>
                                                          <h6>
                                                              <i class="fa fa-star"></i>
                                                              <i class="fa fa-star"></i>
                                                              <i class="fa fa-star"></i>
                                                              <i class="fa fa-star"></i>
                                                              <i class="fa fa-star"></i>
                                                          </h6>
                                                          <button class="btn" tabindex="0">details</button>
                                                    </div>
                                                  </div>
                                                </li>
                                            </div>
                                            <!-- item 2 -->
                                            <div class="item b_1_crs">
                                                <li>
                                                  <div class="grid1 gridworkshopsbg1">
                                                      <div class="view1 view-first">
                                                        <div class="index_img2">
                                                          <img src="<?php echo HTTP_ROOT;?>/img/pics2.png" class="img-responsive" alt=""/>
                                                          <button class="btn butt_dollar">&#8377;320</button>
                                                        </div>                 
                                                      </div> 
                                                       <div class="golden">
                                                            <h4>Hatha Yoga For Weight loss</h4>
                                                            <p>PLACE :EAST NAGAR, BNG</p>
                                                            <h5>Sat, 15 jan, 7 to 8pm </h5>
                                                            <h6>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                            </h6>
                                                            <button class="btn" tabindex="0">details</button>
                                                      </div>
                                                  </div>
                                                </li>
                                            </div>
                                            <!-- item 3 -->  
                                            <div class="item b_1_crs">
                                              <li>
                                                <div class="grid1 gridworkshopsbg1">
                                                  <div class="view1 view-first">
                                                    <div class="index_img">
                                                      <img src="<?php echo HTTP_ROOT;?>/img/pics3.png" class="img-responsive" alt=""/>
                                                      <button class="btn butt_dollar">&#8377;320</button>
                                                    </div>                      
                                                  </div> 
                                                   
                                                  <div class="golden">
                                                    <h4>Meringue Tower of Kisses</h4>
                                                    <p>PLACE :EAST NAGAR, BNG</p>
                                                    <h5>Sat, 15 jan, 7 to 8pm </h5>
                                                    <h6>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </h6>
                                                    <button class="btn" tabindex="0">details</button>
                                                  </div>
                                                </div>
                                              </li>
                                            </div>
                                            <!-- item 4 -->          
                                                    
                                            <div class="item b_1_crs">
                                              <li>
                                                <div class="grid1 gridworkshopsbg1">
                                                  <div class="view1 view-first">
                                                    <div class="index_img">
                                                      <img src="<?php echo HTTP_ROOT;?>/img/pics4.png" class="img-responsive" alt=""/>
                                                      <button class="btn butt_dollar">&#8377;320</button>
                                                    </div>                        
                                                  </div>
                                                  <div class="golden">
                                                      <h4>Golden Pineapple Ball(Hands on)</h4>
                                                      <p>PLACE :EAST NAGAR, BNG</p>
                                                      <h5>Sat, 15 jan, 7 to 8pm </h5>
                                                      <h6>
                                                          <i class="fa fa-star"></i>
                                                          <i class="fa fa-star"></i>
                                                          <i class="fa fa-star"></i>
                                                          <i class="fa fa-star"></i>
                                                          <i class="fa fa-star"></i>
                                                      </h6>
                                                      <button class="btn" tabindex="0">details</button>
                                                  </div>
                                                </div>
                                              </li>
                                            </div> 
                                            <!-- item 4 -->   
                                            <div class="item b_1_crs">
                                              <li>
                                                <div class="grid1 gridworkshopsbg1">
                                                  <div class="view1 view-first">
                                                    <div class="index_img">
                                                      <img src="<?php echo HTTP_ROOT;?>/img/pics9.png" class="img-responsive" alt=""/>
                                                      <button class="btn butt_dollar">&#8377;320</button>
                                                    </div>                 
                                                  </div> 
                                                  <div class="golden">
                                                        <h4>Cookie Pods Workshop</h4>
                                                        <p>PLACE :EAST NAGAR, BNG</p>
                                                        <h5>Sat, 15 jan, 7 to 8pm </h5>
                                                        <h6>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                        </h6>
                                                        <button class="btn" tabindex="0">details</button>
                                                  </div>
                                                </div>
                                              </li>
                                            </div>
                                            <!-- slider item end -->   
                                        </div>
                                    </div>
                                </div>
                            </div>        
                       </div>
                    </div>
                </div> 
          </div>

        <!-- end slider 1 -->
         
          
          <div class="col-md-12 col-sm-12 col-xs-12 padd_l_r br_srch_act">
            <div class="col-md-7 col-sm-7 col-xs-6"></div>
            <div class="col-md-5 col-sm-5 col-xs-6 padd_l_r inpt_adon">
              <!-- Start Form 1 -->
            
              <form action="<?php echo $action_url; ?>" name="" method="post">
                  <div class="input-group srch_adon_brd">
                  <input type="hidden" class="form-control br_inpt_radius" name="search_cat_id" value="<?php echo $com_id; ?>">
                    <input type="text" class="form-control br_inpt_radius" name="search_key" placeholder="Search for short classes &  activities">
                    <span class="input-group-btn">
                      <input type="submit" class="btn btn-default br_inpt_radius srch_adon" name="search" value="Search">
                      <!-- <button class="btn btn-default br_inpt_radius srch_adon" type="button">Search</button> -->
                    </span>
                  </div>
                </form>
                  <!-- End Form 1 -->


            </div>  
          </div>  
          <!-- Furry Teddy Bear -->
          <!-- *************tab head*************** -->
          <?php 
          /*echo "<pre>";
          print_r($view_clasa_segment);
          echo "</pre>" ;*/

          ?> 
         
          <!-- *************tab head*************** -->
          <!-- **************form update*********** -->
          <div class="col-md-12 col-sm-12 col-xs-12 padd_l_r tp_br">
            <div class="col-lg-3 col-md-4 col-sm-3 col-xs-5 padd_l_r">
              <div class="col-md-12 col-sm-12 col-xs-12 padd_l_r">
                <div class="col-md-12 col-sm-12 col-xs-12 fltrdv">
                  <div class="filter_br">
                    Filter
                  </div>
                </div>
              </div>  
               <!-- Start form 2 -->
               
              <form action="<?php echo $action_url; ?>" name="fm" method="post">
                <input type="hidden" class="form-control br_inpt_radius" name="search_cat_id" value="<?php echo $cat_id; ?>">
                <div class="col-md-12 col-sm-12 col-xs-12 fldv1 list_filter">
               <!--  <div class="form-group mrg_btm">
                  <input class="form-control crt_br" name="start_datepicker" id="start_datepicker" type="text" placeholder="Start Date" value="<?php //echo @$date; ?>">
                  <span class="carimg_br12"><img src="<?php //echo HTTP_ROOT;?>/img/cal.png"></span>
                </div> -->
            <div class="form-group mrg_btm"> 
              <select class="form-control crt_br" name="Community_id" id="select">
                    <?php if($community_id==''){?>
                    <option value="">Choose Category</option>
                    <?php
                        }
                          foreach ($coummunity_data as $key => $coummunity_value) {

                            $id        = $coummunity_value['Category']['id'];
                            $comm_name = $coummunity_value['Category']['category_name'];
                            # code...
                           
                          ?>
                          <?php if(@$community_id==$id){ ?>
                              <option value="<?php echo $id; ?>" selected><?php echo $comm_name; ?></option>

                            <?php
                          }
                          else{
                          ?>
                         <option value="<?php echo $id; ?>"><?php echo $comm_name; ?></option>

                          <?php
                        }
                          }
                          ?>
                  </select>
                  <span class="carimg_br12"><img src="<?php echo HTTP_ROOT;?>/img/caret.png"></span>
                </div>
              
                <div class="form-group mrg_btm">
                  <input class="form-control crt_br" id="location" name="location" type="text" placeholder="Location" value="<?php echo @$location; ?>">
                  <span class="carimg_br12">&nbsp;</span>
                </div>
                <div class="form-group">
                  <div class="sm-12 xs-12 butt_pos">
                   <!--  <a href="#" class="btn btn-success buutt_cancel">Cancel</a> -->
                    <!-- <a href="#" class="btn btn-success buutt_ok"></a> -->
                     <input type="submit" class="btn btn-success buutt_ok" name="Filter" value="Submit">
                  </div>
                </div>
              </div>
             </form>
             <!-- End form 2 -->

              <div class="col-md-12 col-sm-12 col-xs-12 fldv1 padd_l_r sort_by_br786"> 
                <div class="col-md-12 col-sm-12 col-xs-12 padd_l_r">
                  <div class="col-md-12 col-sm-12 col-xs-12 fltrdv">
                    <div class="filter_br">
                      Sort By
                      </div>
                  </div>
                  <!-- Start Form 3 -->
                  <div class="col-md-12 col-sm-12 col-xs-12 padd-l_r list_filter">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                      <p class="price_br">Price</p>
                    </div>
                  
                    <form action="<?php echo $action_url; ?>" name="fm" method="post">
                       <input type="hidden" class="form-control br_inpt_radius" name="search_cat_id" value="<?php echo $cat_id; ?>">
                      <div class="row">
                        <label class="radio-inline">
                          <input type="radio" name="optionsRadios" id="optionsRadios1" value="1" <?php if(@$find_sort_val==1){ echo 'checked'; } ?>>
                          <span class="hghlow">Highest to Lowest</span>
                        </label>
                        <label class="radio-inline radpos">
                          <input type="radio" name="optionsRadios" id="optionsRadios2" value="2" <?php if(@$find_sort_val==2){ echo 'checked'; } ?>>
                          <span class="hghlow">Lowest to Highest</span>
                        </label>
                      </div>
                   
                    <div class="col-md-12 col-sm-12 col-xs-12">
                      <p class="price_br">Class</p>
                    </div>
                    <div class="form-group b_1_radio">
                     
                        <div class="row">
                          <label class="radio-inline">
                            <!-- <input type="radio" name="gender" value="male" checked> -->
                              <input type="radio" name="optionsRadios" value="3" <?php if(@$find_sort_val==3){ echo 'checked'; } ?>>
                              <span class="hghlow">Upcoming</span>
                          </label>
                          <label class="radio-inline newly_add">
                            <!-- <input type="radio" name="gender" value="male" checked> -->
                            <input type="radio" name="optionsRadios" value="4" <?php if(@$find_sort_val==4){ echo 'checked'; } ?>>
                            <span class="hghlow">Newly Added</span>
                          </label>
                        </div>  
                     
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                      <p class="price_br">Location</p>
                    </div>
                    <div role="form">
                      <div class="checkbox">
                        <label>
                          <input type="checkbox" value="4" name="location">
                          <span class="closest">Closest to Farthest</span>
                        </label>
                      </div>
                    </div>
                    <div class="form-group tp_br786">
                      <div class="sm-12 xs-12 butt_pos">
                        <!-- <a href="#" class="btn btn-success buutt_cancel">Cancel</a>
                        <a href="#" class="btn btn-success buutt_ok">Ok</a> -->
                        <input type="submit" class="btn btn-success buutt_ok" name="Sort" value="Submit">
                      </div>
                    </div>
                  </div>  
                </form>
               <!--  End Form 3 -->
                </div>                
              </div>  
            </div>
            <!-- **************form update*********** -->
            <!-- images with text code  tab content-->  
            <div class="col-lg-9 col-md-8 col-sm-9 col-xs-7 padd_l_r sr_2605_02 tab-content padd_220">
             
                <div class="col-md-12 col-sm-12 col-xs-12 fltrdv">
                  <div class="filter_br">
                   
                    <?php echo $total_class; ?> Class listing Found

                  </div>
                </div>
                <div class="col-xs-12 col-sm-12 sr_2605_03_padding tab-pane fade  active in list_filter1" id="banking" name="banking">

                  <?php 
                  /*echo "<pre>";
                  print_r($allclass);
                  echo "</pre>";
                  die;*/

                  if($total_class==0)
                  {

                    echo "Classes not Exist!";

                  }
                  /*echo "<pre>";
                  print_r($allclass);
                  echo "</pre>";
                  die;*/
                  ?>
                  <?php foreach ($allclass as $key => $allclass_value) {

                  $class_id                 =   $allclass_value['bg_vendor_classes']['id'];
                  $class_topic              =   $allclass_value['bg_vendor_classes']['class_topic'];
                  $upload_class_photo       =   $allclass_value['bg_vendor_classes']['upload_class_photo'];
                  $class_class_summary      =   $allclass_value['bg_vendor_classes']['class_summary'];
                  $class_class_duration     =   $allclass_value['bg_vendor_classes']['class_duration'];
                  $class_price     =   $allclass_value['bg_vendor_classe_level_details']['price'];
                  $age_group                =   $allclass_value['bg_vendor_classes']['age_group'];
                  $no_of_session            =   $allclass_value['bg_vendor_classes']['no_of_session'];
                  
                  
                  $class_status             =   $allclass_value['bg_vendor_classes']['status'];
                  $class_mod_id             =   $allclass_value['bg_vendor_classes']['class_timing_id'];
                  $cl_shud_session_date     =   $allclass_value['bg_class_schedules']['session_date'];
                  $cl_shud_session_time     =   $allclass_value['bg_class_schedules']['session_time'];
                  $uid                      =   $allclass_value['bg_user_masters']['id'];
                  $user_name                =   $allclass_value['bg_user_masters']['first_name'];
                  $location_name            =   $allclass_value['bg_localities']['name'];
                  if($upload_class_photo==''){

                    $upload_class_photo='FFFFFF.png';
                  }

                  

                  
                  if($class_mod_id==1){

                   $class_name_type='Flexible';
                  }
                  else if($class_mod_id==2)
                  {
                    $class_name_type='Fixed';
                  }
                  $class_id = base64_encode($class_id);
                ?> 
               <div style="opacity: 1;" class="col-sm-12 col-xs-12 sr_260501 padd_l_r scroll_box_display"> 
                          <!-- ********images************ -->
                          <div class="col-md-4 col-sm-4 col-xs-12 img-responsive padd_l_r">
                            <div class="col-xs-12 col-sm-12 fun01_img_w">
                              <span class="flexible-fixed-fun"><?php echo $class_name_type; ?></span>
                              <span class="image_price12-fun pull-right-fun" style="color:white">₹ <?php echo $class_price; ?></span><a href="<?php echo HTTP_ROOT?>/classes/<?php echo $class_topic; ?>" >
                              <img src="<?php echo HTTP_ROOT.'/img/Vendor/class_image/'.$upload_class_photo; ?>" class="imgresponsive img-thumbnail" alt="">
                            </a>
                            </div></div><!-- ********images************ -->
                          <!-- ********text************ -->
                          <div class="col-md-8 col-sm-8 col-xs-12 text_res sr_2605_03_padding">
                             <div class="col-xs-12 col-sm-12 sr_2605_06 sr_2605_06_textLorem021">
                                <div class="hathyga col-xs-12 col-sm-12"><?php echo $class_topic; ?><span class="pull-right">
                                        <div class="col-xs-12 col-sm-12 sr_2605_03_padding sr_serch_div_l_hite sr_class_acc_div padd_l_r" style="margin-bottom:7px;">
                                            <div class="row">
                                  <img class="img-responsive" style="display: inline; margin-right: 5px;" src="http://www.braingroom.com/img/fun&refreshment/user.png">
                                                <span class="city">
                                                <strong> By :</strong><?php echo $user_name; ?></span>
                                            </div>
                                        </div>
                                   
                                    </span>
                              </div></div>
                                
                                <div class="col-xs-12 col-sm-12 sr_2605_03_padding sr_serch_div_l_hite">
                                  <img class="img-responsive" style="display: inline; margin-top: -10px;  width: 20px; margin-right: 5px;" src="<?php echo HTTP_ROOT; ?>/img/fun&refreshment/location.png"><span class="city"><?php echo $location_name; ?></span>
                                 <!--  <span class="city">
                                  Madipakkam                                  </span> -->
                                                                  <img src="http://www.braingroom.com/img/8.jpg" class="pull-right star" style="height: 20px;">
                                </div>
                                                                <div class="col-xs-12 col-sm-12 sr_2605_03_padding sr_serch_div_l_hite">
                                 
                                                                  <img class="img-responsive" style="display: inline; width: 15px;" src="<?php echo HTTP_ROOT; ?>/img/fun&refreshment/clock.png">
                                  <span class="city">Total Duration: <?php echo $class_class_duration; ?></span>
                                   <span class="city"></span>
                                   <span>No of Sessions: <?php echo $no_of_session; ?></span>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 sr_2605_03_padding sr_2605_06_textLorem sr_serch_div_l_hite">
                                  <img class="img-responsive" style="display: inline; margin-right: 5px; width: 10px; margin-top: -5px;" src="<?php echo HTTP_ROOT; ?>/img/fun&refreshment/information.png">&nbsp;&nbsp; 
                                  <p class="comment more city text-justify"><?php echo $class_class_summary; ?><!-- <a href="" class="morelink">more</a> --></p>
                                </div>
                                <div class="col-xs-12 col-sm-12">
                                  <span>Age Group: <?php echo $age_group; ?></span>
                                </div>
                                <div class="col-xs-12 col-sm-12">
                                <span>Other Localities:<?php echo $location_name; ?></span>
                                </div>
                                
                          </div>        
                          <!-- ********text************ -->
                    </div>
                  <?php } ?>
                  <center class="white_bg">
                    <div id="status1"></div>
                    <style type="text/css">
                     

               
                    </style>

<?php //if($total_class>5){ ?>
                    <!-- <div class="pagination pagination-large">
    <ul class="pagination">
            <?php
                echo $this->Paginator->prev(__('prev'), array('tag' => 'li'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
                echo $this->Paginator->numbers(array('separator' => '','currentTag' => 'a', 'currentClass' => 'active','tag' => 'li','first' => 1));
                echo $this->Paginator->next(__('next'), array('tag' => 'li','currentClass' => 'disabled'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
            ?>
        </ul>
    </div> -->
    <?php
  //}
  ?>
                  <!-- <ul class="pagination">
                    <li class="#"><a href="#">&laquo;</a></li>
                    <li class="active"><a href="#"></a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li><a href="#">&raquo;</a></li>
                  </ul> -->
                </center>
                </div><!-- tab 1 / -->
                                             
            </div>
          </div>  
          <!-- images with text code / --> 
          <div class="col-md-12 col-sm-12 col-xs-12 funtr"> 
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padd_l_r">
              <h4 class="feature_work">Recommended Classes</h4>
            </div>
          </div>
          <div class="col-md-12 col-sm-12 col-xs-12" style="border:2px solid #00CDC6;">  </div> 
          <!-- slider code -->
          <div class=" col-md-12 col-sm-12 col-xs-12 pad_all funsld">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
              <div class="row slide3_row1">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                  <div id="testimonials" class="container-fluid">
                    <div class="row">
                      <div class="C_17_num">
                        <div id="grid-contant-slider3" class="b_sld">

                            <?php 
                            //echo "<pre>";
                            //print_r($recommended_class);
                            //echo "</pre>";
                            //die;
                            //$result
                            foreach ($recommended_class as $key =>$result_rc){

                              $class_topic        = $result_rc['VendorClasse']['class_topic'];
                              $class_timing_id    = $result_rc['VendorClasse']['class_timing_id'];
                              $upload_class_photo = $result_rc['VendorClasse']['upload_class_photo'];
                              $first_name         = $result_rc['User']['first_name'];
                              $class_price        = $result_rc['VendorClasseLevelDetail']['price'];
                              if( $class_timing_id == 1){

                                $cl_type = 'Flexible';
                              }
                              else{

                                $cl_type = 'Fixed';
                              }
                              ?>
                          <div class="item b_1_crs">
                            <li>
                              <div class="grid1 gridfreeclassesbg">
                                <div class="view3 view-first">
                                       <div class="index_img">
                                    <span class="flexible-fixed flexible-fixed-index"><?php echo $cl_type; ?></span>
                                     <span class="flexible-fixed_price" style="float:right;">
                                    ₹100</span>

                                    <a href="<?php echo HTTP_ROOT; ?>/classes/<?php echo $class_topic; ?>">
                                      <img src="<?php echo HTTP_ROOT; ?>/Vendor/class_image/<?php echo $upload_class_photo; ?>" class="imgresponsive img-thumbnail" alt="">                     
                                    </a>
                                   
                                    </div>                      
                                </div>
                                <div class="golden">
                                   <div class="golden">
                                    <div class="slider-topic12">
                                      <?php echo  $class_topic; ?>
                                    </div>
                                    <div class="provider-by" style="color:black !important; margin-bottom:2px !important;">
                                    <strong>By:</strong><?php echo $first_name; ?></div>
                                    <div class="indx-address">Place :NA</div>
                                    <h5>No of Sessions:&nbsp; </h5>
                                    <h5>Total Duration:&nbsp;  Hours </h5>
                                    </div>
                                </div>
                              </div>
                            </li>
                          </div>
                          <?php
                            }
                        ?>
                        </div>                                       
                      </div>
                    </div>
                  </div>        
                </div>
              </div>
            </div>        
          </div>
          <!-- slider code / -->    
          <div class="col-md-12 col-sm-12 col-xs-12 sr_0106_div_a_class padd_l_r white_line"> 
              <a href="#" class="btn btn-default btn-lg btn-block sr_0106_gift_a_class">
                <i class="fa fa-gift gft_fa_br" aria-hidden="true"></i>
                <span class="ngo-gift">Gift A Class</span>
              </a>
          </div>
          <div class="col-md-12 col-sm-12 col-xs-12 banner_gift">
            <div class="col-sm-offset-1 col-sm-10 col-md-offset-1 col-md-10">
              <div class="indvdl_gifting">
                <div><a href="#" class="btn btn-default indvdl_butt">
                  <i class="fa fa-gift gft_fa" aria-hidden="true"></i><span class="ngo-top">Individual Gifting</span></a>
                </div>
                <div class="ngo_gift"><a href="#" class="btn btn-default ngo_butt">
                  <i class="fa fa-gift gft_fa" aria-hidden="true"></i><span class="ngo-top">NGO Gifting</span></a>
                </div>
                <div class="ngo_gift"><a href="#" class="btn btn-default crprt_butt">
                  <i class="fa fa-gift gft_fa" aria-hidden="true"></i><span class="ngo-top">Corporate Gifting</span></a>
                </div>
            </div>
            </div>
          </div>         
        </div>
      </div>
      <script type="text/javascript">
        $(document).ready(function(){
          //alert('hi');
            window.scroll(0,770);
          });
    </script>
    <script type="text/javascript">
       $( "#start_datepicker" ).datepicker({yearRange:'1900:2030',changeYear: true, changeMonth: true });
        $( "#end_datepicker" ).datepicker({yearRange:'1900:2030',changeYear: true, changeMonth: true });
    </script>
   <script type="text/javascript">
        function loadmore(){
            /*$("#cat_list").scroll(function(){
        alert('hi');*/
          
        }
    </script>
    <script>
  $(function(){
    $('.scroll_box_display').fadeInScroll();
  });
</script>