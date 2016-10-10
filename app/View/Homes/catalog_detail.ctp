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

.hathyga {
    text-transform: capitalize;
    font-size: 20px;
    color: #01091C;
    font-family: "os_Regular";
    margin-top: 22px;
}
</style>
<div class="col-md-12 col-sm-12 col-xs-12 padd_l_r">
  <div class="col-md-12 col-sm-12 col-xs-12 padd_l_r">
  <?php 
  //$catimg = $cat_img[0]['Category']['category_image'];
  //echo HTTP_ROOT.'/img/category_image/'.$catimg;
  //die;
  ?>
  <?php
    //echo $catalog_id;
      //die;
       $cl_id = base64_encode($catalog_id);
   /* if($catalog_id==1)
    {
      $catimg_banner='catelogue_banner1.jpg';
    }
    else if($catalog_id==2){

      $catimg_banner='catelogue_banner2.jpg';
    }
    else if($catalog_id==3){

        $catimg_banner='catelogue_banner3.jpg';
    }
    else if($catalog_id==4){

        $catimg_banner='catelogue_banner4.jpg';
    }
    else if($catalog_id==5){

      $catimg_banner='catelogue_banner5.jpg';
    }
    else if($catalog_id==6){

      $catimg_banner='catelogue_banner6.jpg';
    }
   */
 //echo $banner_image;
 //die;
    
  ?>
    <a href="#">
      <!--<img src="<?php //echo HTTP_ROOT;?>/img/profile_img/fun.jpg" class="img-responsive" alt="">-->

    <img src="<?php echo HTTP_ROOT;?>/img/catalogue_image/<?php echo $banner_image;?>" class="img-responsive" alt="catalogue_image" style="width:100%;height:300px;">
    </a>
  </div>
</div>  
<div class="col-xs-12 col-sm-12  col-md-12 col-lg-offset-1 col-lg-10" >
          <div class="container-fluid  padd_l_r" style="">
            
          <div class="col-md-12 col-sm-12 col-xs-12 padd_l_r br_srch_act">
            <div class="col-md-7 col-sm-7 col-xs-6"></div>
            <div class="col-md-5 col-sm-5 col-xs-6 padd_l_r inpt_adon">
              <?php echo $this->Form->create('Request');?>
              <div class="input-group srch_adon_brd">

                <input type="text" class="form-control br_inpt_radius" name="data[Request][search]" placeholder="Search for short classes &  activities">
                <span class="input-group-btn">
                  <button class="btn btn-default br_inpt_radius srch_adon" type="submit">Search</button>
                </span>
              </div>
              <?php echo $this->Form->end();?>
            </div>  
          </div>  
         </div>
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
              <?php echo $this->Form->create('Request');?> 
              <div class="col-md-12 col-sm-12 col-xs-12 fldv1 list_filter">
                 <div class="form-group mrg_btm">
                  <?php echo $this->Form->input('city_id', array('type'=>'select','label' => false,'div'=>false, 'class' => 'form-control crt_br','placeholder'=>'City Name','options'=>$city_name,'id'=>'city_ide'));?>
                  
                  <span class="carimg_br12"><img src="<?php echo HTTP_ROOT;?>/img/caret.png"></span>
                </div>
                <div class="form-group mrg_btm">
                  <select class="form-control crt_br" id="region" placeholder="Select Region" name="data[Request][region]">
               
                  <option value="East">East</option>
                    <option value="West">West</option>
                    <option value="North">North</option>
                    <option value="South">South</option>
                  </select>
                  <span class="carimg_br12"><img src="<?php echo HTTP_ROOT;?>/img/caret.png"></span>
                </div>
                <div class="form-group mrg_btm">
                  <select class="form-control crt_br" id="location" placeholder="Locality" name="data[Request][locality]">
                    <option>Location</option>
                    <!-- <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option> -->
                  </select>
                  <span class="carimg_br12"><img src="<?php echo HTTP_ROOT;?>/img/caret.png"></span>
                </div>
                <div class="form-group mrg_btm">
                   <?php echo $this->Form->input('class_type', array('type'=>'select','label' => false,'div'=>false, 'class' => 'form-control crt_br','placeholder'=>'Class Type','options'=>$class_type));?>
               
                  <span class="carimg_br12"><img src="<?php echo HTTP_ROOT;?>/img/caret.png"></span>
                </div>
                <div class="form-group">
                  <div class="sm-12 xs-12 butt_pos">
                    <input type="reset" value="Cancel" class="btn btn-success buutt_cancel">
                    <input type="submit" value="OK" class="btn btn-success buutt_ok">
                    </div>
                </div>
              </div>
              <?php echo $this->Form->end();?>
              <div class="col-md-12 col-sm-12 col-xs-12 fldv1 padd_l_r sort_by_br786"> 
                <div class="col-md-12 col-sm-12 col-xs-12 padd_l_r">
                  <div class="col-md-12 col-sm-12 col-xs-12 fltrdv">
                    <div class="filter_br">
                      Sort By
                    </div>
                  </div>
                  <div class="col-md-12 col-sm-12 col-xs-12 padd-l_r list_filter">
                    
                    <div class="col-md-12 col-sm-12 col-xs-12">
                      <p class="price_br">Class</p>
                    </div>
                    <div class="form-group b_1_radio">
                      <?php echo $this->Form->create('Request');?> 

                        <div class="row">
                          <label class="radio-inline">
                            <!-- <input type="radio" name="gender" value="male" checked> -->
                              <input type="radio" name="optradio" value="1">
                              <span class="hghlow">Ascending</span>
                          </label>
                          <label class="radio-inline newly_add">
                            <!-- <input type="radio" name="gender" value="male" checked> -->
                            <input type="radio" name="optradio" value="2">
                            <span class="hghlow">Descending</span>
                          </label>
                        </div>  
                    
                    </div>
                   
                    <div class="form-group tp_br786">
                      <div class="sm-12 xs-12 butt_pos">
                        <input type="reset" value="Cancel" class="btn btn-success buutt_cancel">
                    <input type="submit" value="OK" class="btn btn-success buutt_ok">
                      </div>
                    </div>
                       <?php echo $this->Form->end();?>
                  </div>  
                </div>                
              </div>  
            </div>
            <!-- **************form update*********** -->
            <!-- images with text code  tab content--> 
            <div class="col-lg-9 col-md-8 col-sm-9 col-xs-7 padd_l_r sr_2605_02 tab-content padd_220" style="">
                <div class="col-md-12 col-sm-12 col-xs-12 fltrdv">
                  <div class="filter_br">
                    <?php  $total_class=count ($cataloglist); ?>
                    <?php echo $total_class; ?> Class listing Found
                  </div>
                </div>
                <div class="col-xs-12 col-sm-12 sr_2605_03_padding tab-pane fade  active in list_filter1" id="banking" name="banking">

                  <?php 

                  if($total_class==0)
                  {

                    echo "Classes not Exist!";

                  }
                  /*echo "<pre>";
                  print_r($allclass);
                  echo "</pre>";
*/


                  ?>
                 <?php foreach ($cataloglist as $key => $value_catalog) {
                    
                    $class_id       = $value_catalog['VendorClasse']['id'];
                    $user_id        = $value_catalog['VendorClasse']['user_id'];
                    $class_topic    = $value_catalog['VendorClasse']['class_topic'];
                    
                    $class_mod_id   = $value_catalog['VendorClasse']['class_timing_id'];
                    $class_duration = $value_catalog['VendorClasse']['class_duration'];
                    $class_summary  = $value_catalog['VendorClasse']['class_summary'];
                    $location       = $value_catalog['VendorClasse']['location'];
                    $class_photo    = $value_catalog['VendorClasse']['upload_class_photo'];
                    $price_per_head = $value_catalog['VendorClasse']['price_per_head'];
                    $starting_month = $value_catalog['VendorClasse']['starting_month'];

                  if($class_mod_id==1){

                   $class_name_type='Flexible';
                  }
                  else
                  {
                    $class_name_type='Fixed';
                  } 
                  $class_id   = base64_encode($class_id);

                ?>
                 
                            
                    <div class="col-sm-12 col-xs-12 sr_260501 padd_l_r"> 
                          <!-- ********images************ -->
                          <div class="col-md-4 col-sm-4 col-xs-12 img-responsive padd_l_r">
                            <div class="col-xs-12 col-sm-12 fun01_img_w">
                              <span class="flexible-fixed-fun"><?php echo $class_name_type; ?></span>
                              <span class="image_price12-fun pull-right-fun" style="color:white">₹ <?php echo $price_per_head; ?></span>
                              <?php 

                              //echo $upload_class_photo;

                              if($class_photo=='')
                              {
                                  $class_photo='defult_pic.png';
                              }
                              ?>
                              <a href="<?php echo HTTP_ROOT;?>/Homes/CatalougeClassDetail/<?php echo $class_id; ?>/<?php echo $cl_id; ?>"><img src="<?php echo HTTP_ROOT;?>/img/Vendor/class_image/<?php echo $class_photo; ?>" class="img_res img-responsive img-thumbnail"></a>

                            </div>  

                          </div><!-- ********images************ -->
                          <!-- ********text************ -->
                           <div class="col-md-6 col-sm-6 col-xs-12 text_res sr_2605_03_padding status-div" >
                                                 <div class="col-xs-12 col-sm-12 sr_2605_06 sr_2605_06_textLorem021 sr_pv_padding_lr txt_cntnt">
                                                    <div class="hathyga up-com-post col-xs-12 col-sm-12 sr_2605_03_padding upcoming-class-title" style="font-weight:bold">
                                                      <?php echo $value_catalog['VendorClasse']['class_topic'];?>
                                                    </div>
                                                    <div class="col-xs-12 col-sm-12 sr_2605_03_padding sr_serch_div_l_hite sr_class_acc_div padd_l_r" style="margin-bottom:7px;">

                                                      <div class="row">
                                                        <div class="col-md-2 col-sm-2 col-xs-2 upcom-img-class">
                                                          <img class="img-responsive" style="display: inline; margin-right: 5px;" src="<?php echo HTTP_ROOT;?>/img/fun&refreshment/location.png">
                                                        </div>
                                                        <div class="col-md-10 col-sm-10 col-xs-10 sr_class_acc_text02 upclass-location">
                                                          <?php echo $value_catalog['VendorClasse']['location'];?>
                                                        </div>
                                                      </div>
                                                    </div>
                                                    <div class="col-xs-12 col-sm-12 sr_2605_03_padding sr_serch_div_l_hite sr_class_acc_div padd_l_r" style="margin-bottom:7px;">
                                                      <div class="row">
                                                        <div class="col-md-2 col-sm-2 col-xs-2 upcom-img-class">
                                                          <img class="img-responsive" style="display: inline; margin-right: 5px;" src="<?php echo HTTP_ROOT;?>/img/fun&refreshment/user.png">
                                                        </div>
                                                        <div class="col-md-10 col-sm-10 col-xs-10 sr_class_acc_text02 upclass-location">
                                                        <?php if($value_catalog['UserMaster']['vendor_type_id']=='1'){?>  
                                                        <strong> By :</strong> <?php echo ucfirst($value_catalog['UserMaster']['institute_name']);?>
                                                        <?php }else{?>
                                                        <strong> By :</strong> <?php echo ucfirst($value_catalog['UserMaster']['institute_name']);?>
                                                        <?php }?>
                                                        </div>
                                                      </div>
                                                    </div>
                                                    <div class="col-xs-12 col-sm-12 sr_2605_03_padding sr_serch_div_l_hite sr_class_acc_div padd_l_r" style="margin-bottom:7px;">
                                                      <div class="row">
                                                        <div class="col-md-2 col-sm-2 col-xs-2 upcom-img-class">
                                                          <img class="img-responsive" style="display: inline; margin-right: 5px;" src="<?php echo HTTP_ROOT;?>/img/fun&refreshment/session.png">
                                                        </div>
                                                        <div class="col-md-10 col-sm-10 col-xs-10 sr_class_acc_text02 upclass-location">
                                                        <strong><?php echo ucfirst($value_catalog['VendorClasse']['no_of_session']);?></strong>&nbsp;Session
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
                                                            <?php echo $value_catalog['VendorClasse']['class_duration'];?></div>&nbsp;
                                                          <?php }else{?>
                                                          <div class="row">
                                                            <div class="col-md-4 col-sm-4 col-xs-4 sr_class_acc_text02 past-timming-div-first" >
                                                            <?php echo $value_catalog['VendorClasse']['starting_month'];?></div>&nbsp;
                                                            <div class="col-md-7 col-sm-7 col-xs-6 past-timmg-div-second">
                                                              <div class="col-md-2 col-sm-2 col-xs-2 upcom-img-class">
                                                                <img class="img-responsive" style="display: inline; margin-right: 5px;" src="<?php echo HTTP_ROOT;?>/img/fun&refreshment/clock.png">
                                                              </div>
                                                              <div class="col-md-10 col-sm-10 col-xs-10 sr_class_acc_text02 upclass-location"><?php echo $value_catalog['VendorClasse']['time_of_day'];?></div>
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
                                                            <?php echo substr($value_catalog['VendorClasse']['class_summary'], 0, 150),".......";?>
                                                          </div>
                                                        </div>
                                                    </div>
                                                    
                                              </div>    
                                               
                          <!-- ********text************ -->
                    </div> 
                   <?php } ?>  
                  <center class="white_bg">
                    <style type="text/css">
                     

               
                    </style>

<?php if($total_class=='y'){ ?>
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
  }
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
        
          <!-- images with text code / --> 
          <div class="col-md-12 col-sm-12 col-xs-12 funtr"> 
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padd_l_r">
              <h4 class="feature_work">Papular Catalogue Classes In Agenda</h4>
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
                          <?php foreach($papluar_catalog as $res){?>
                          
                                              <div class="item b_1_crs">
                                                <li>
                                                  <div class="grid1 gridworkshopsbg1">
                                                    <div class="view1 view-first">
                                                      <div class="index_img">
                                                        <img src="<?php echo HTTP_ROOT;?>/img/Vendor/class_image/<?php echo $res['VendorClasse']['upload_class_photo'];?>" class="img-responsive" alt=""/>
                                                      </div>                 
                                                    </div> 
                                                    
                                                    
                                                     <div class="golden">
                                                          <h4><?php echo $res['VendorClasse']['class_topic'];?></h4>
                                                          <p>Type : <?php echo $res['ClassType']['types'];?></p>
                                                            <?php if($res['UserMaster']['vendor_type_id']=='1'){?>
                                                          <h5>BY : <?php echo $res['UserMaster']['institute_name'];?> </h5>
                                                            <?php }else{?>
                                                            <h5>By : <?php echo $res['UserMaster']['first_name'];?> </h5>
                                                            <?php }?>
                                                          <!--<h6>
                                                              <i class="fa fa-star"></i>
                                                              <i class="fa fa-star"></i>
                                                              <i class="fa fa-star"></i>
                                                              <i class="fa fa-star"></i>
                                                              <i class="fa fa-star"></i>
                                                          </h6>-->
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
  $('#city_ide').on('change',function(){
   var city_id=$(this).val();
   if(city_id!='1'){
    alert('Only Chennai Locality are available');
   }
   else{
   $.ajax({
    url:'<?php echo HTTP_ROOT;?>/Homes/getLocation/'+city_id,
   
    success:function(result){
      $('#location').html('');
      $('#location').append(result);
    }
   });
 }
  });
 })
  </script>
