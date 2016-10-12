<?php 

  $user_id      = $user_view['UserMaster']['id'];
  $user_type    = $user_view['UserMaster']['user_type_id'];
  $group_count  = count($category_data) + 1;
  $my_grp_count = count($my_group);
  $check_count  = count($my_grp_id);
  
?>
<style>

input[type="checkbox"]:checked + label::after {
   content: '';
   position: absolute;
   width: 13px;
   height: 7px;
   background: rgba(0, 0, 0, 0);
   top: 0.5ex;
   left: 0.3ex;
   border: 3px solid #2bcdc1;
   border-top: none;
   border-right: none;
   -webkit-transform: rotate(-45deg);
   -moz-transform: rotate(-45deg);
   -o-transform: rotate(-45deg);
   -ms-transform: rotate(-45deg);
   transform: rotate(-45deg);
}

input[type="checkbox"] {
   line-height: 2.1ex;
}


input[type="checkbox"] {
    position: absolute;
    left: -999em;
}


input[type="checkbox"] + label {
    position: relative;
    overflow: hidden;
    cursor: pointer;
}

input[type="checkbox"] + label::before {
   content: "";
   display: inline-block;
   height: 20px;
   width: 20px;
   background-color: white;
   border: 1px solid #2bcdc1;
   margin-right: 0.5em;
}

    .form-control[disabled], .form-control[readonly], fieldset[disabled] .form-control {
        background-color:white;
        opacity: 1;
    }

    #owl-demo .item{
        margin: 3px;
    }
    #owl-demo .item img{
        display: block;
        width: 100%;
        height: auto;
    }
    .modal-dialog{

        width:1000px;

    }
    .modal { overflow: visible; }
    .modal-body { overflow-y: visible;}
    
    .msg_top_header{
      background-color:#2bcdc1;
      color: white;
      font-size: "os_Regular";
      padding: 4px;
      font-size: 15px;
      text-transform: capitalize;
      text-align:center;
    }
    .msg_pro_pic{
      width: 50px;
      height: 50px;  
    }
    .user_msg_panel{
      background-color:white;
      padding: 5px;
      height: 60px;
    }
    .user_msg_panel:hover{
      background-color:#F1F1F1;
      padding: 5px;
      height: 60px;
    }
    .user_msg_descripation{
      color: #5b595c;
      text-transform: capitalize;
      font-family: "os_Regular";
      font-size: 12px;
    }
    .user_msg_title{
      color: #0f0f0f;
      text-transform: capitalize;
      font-family: "os_Regular";
      font-size: 16px; 
    }

    .mouse_show{
      cursor: pointer;
    }

    .bottom_bdr{
      border-bottom: 1px solid #2bcdc1;
    }

   .err{
       color:red; 
    }

    .moz_hide{
        -moz-appearance: none;
        -webkit-appearance: none;
        cursor:pointer;
    }
/* end off message css */
</style>

<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padd_l_r fle_page_haedre">
  <center>
    <span class="connet_text_hed">
      BrainGroom Connect Forum & Groups 
    </span>
  </center>
</div>

<div class="col-xs-12 col-sm-12 col-md-12 col-12-lg padd_l_r connt_bg_img">
    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 padd_l_r ">
        <?php echo $this->Html->image('../img/connect/banner/category.jpg', array('url' => array('controller' =>'Connect','action'=>'connectpage'),'class'=>'banner_img_left'));
        ?>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 padd_l_r cont_banner_ryt">  
        <?php echo $this->Html->image('../img/connect/banner/group_selected.jpg', array('url' => array('controller' =>'Connect','action'=>'connectGroup'),'class'=>'banner_img_ryt')); 
        ?>
    </div>
</div>

<div class="hidden-xs hidden-sm hidden-md">&nbsp;</div>
<div class="hidden-md hidden-sm">&nbsp;</div>
<div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1 col-lg-10 col-lg-offset-1">
    <div class="">&nbsp;</div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <div class="col-xs-12 col-sm-offset-3 col-sm-6 col-md-offset-3 col-md-6 col-lg-offset-3 col-lg-6 fle_page_haedre my_grp_tab_div" onclick="open_all_group();" id="chnge_color">
                    <span class="my_grp_tab">
                      All Group 
                    </span> 
                </div>
            </div>
            <?php if(empty($user_id)){ ?>
              <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                  <div class="col-xs-12 col-sm-offset-3 col-sm-6 col-md-offset-3 col-md-6 col-lg-offset-3 col-lg-6 fle_page_haedre my_grp_tab_div" onclick="open_my_group();" id="shift_color">
                      <span class="my_grp_tab">
                        My Group
                      </span> 
                  </div> 
              </div>
            <?php } ?>  
            <?php if($user_type == 2){ ?>
              <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                  <div class="col-xs-12 col-sm-offset-3 col-sm-6 col-md-offset-3 col-md-6 col-lg-offset-3 col-lg-6  fle_page_haedre my_grp_tab_div" onclick="open_my_group();" id="shift_color">
                      <span class="my_grp_tab">
                        My Group
                      </span> 
                  </div> 
              </div>
            <?php } ?>  
        </div> 
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12  padd_l_r connt_flex_middle_bdr">
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padd_l_r" id="All_group_unreg">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padd_l_r" style="background-color:#2bcdc1">
              <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 fle_page_haedre">
                <span class="connet_text_hed" id="chnage_tab_name">
                    ALL GROUP
                </span>
              </div>  
              <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 fle_page_haedre">
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 all_grp_search pull-right">
                  <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 padd_l_r">
                      <div class="form-group" style="margin:0px;">
                        <input type="text" class="form-control" id="search_seg" placeholder="All Group Search" style="border-radius: 0px ! important ;">
                      </div>
                  </div>    
                  <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 padd_l_r" style="background-color:white;color:#2bcdc1;cursor:pointer;">
                      <center>
                        <i class="fa fa-search sech_icon" style="color:#2bcdc1;" aria-hidden="true"></i>
                      </center>  
                  </div>
                </div>  
              </div>
            </div>
            <div class="hidden-xs">&nbsp;</div>  
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 autoacroll_seg" id="All_group_unreg1">
                <?php foreach($segment_data as $data){ ?>
                  <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3 cat_img_cnnt" id="<?php echo $data['ConnectSegmentGroup']['id'];?>" style="margin-top:25px;cursor:pointer;"  onclick="getcatid(<?php echo $data['ConnectSegmentGroup']['id']; ?>);">
                      <center class="cat_image" id="res<?php echo $data['ConnectSegmentGroup']['id'];?>">
                        <?php if(empty($data['ConnectSegmentGroup']['group_image'])){ ?>
                           <img class="image-responsive" src="<?php echo HTTP_ROOT;?>/img/group_image/<?php echo $data['ConnectSegmentGroup']['group_image'];?>" alt="img not found">
                        <?php }else{ ?>
                           <img class="image-responsive img-circle" src="<?php echo HTTP_ROOT;?>/img/group_image/<?php echo $data['ConnectSegmentGroup']['group_image'];?>" alt="img not found">
                        <?php } ?>
                      </center>    
                      <div class="hidden-xs">&nbsp;</div>
                      <center>
                        <span class="connt_flex_middle_text">
                          <?php echo $data['ConnectSegmentGroup']['group_name'];?>
                        </span>
                      </center>        
                  </div>
                <?php } ?> 
            </div>
          </div>
         
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padd_l_r" id="My_group_unreg" style="display:none">  
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="background-color:#2bcdc1">
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 fle_page_haedre">
              <span class="connet_text_hed" id="chnage_tab_name">
                  My GROUP
              </span>
            </div>  
            <?php if(!empty($user_id)){ ?>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 fle_page_haedre">
              <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 all_grp_search pull-right">
                <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 padd_l_r">
                    <div class="form-group" style="margin:0px;">
                        <input type="text" class="form-control" id="my_grp_search_seg" placeholder="My Group Search" style="border-radius:0px ! important;" segdata="">
                    </div>
                </div>    
                <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 padd_l_r" style="background-color:white;color:#2bcdc1;cursor:pointer;">
                    <center>
                        <i class="fa fa-search sech_icon" onclick="my_grp_search_group()" style="color:#2bcdc1;" aria-hidden="true"></i>
                    </center>  
                </div>
              </div>  
            </div>
            <?php } ?>
            </div>
            <div class="">&nbsp;</div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="My_group_unreg1">
                <?php if(empty($user_id)){ ?>
                    <span class="my_grp_tab" style="color:#2bcdc1">
                      <center>
                        To enjoy this feature go for <a href="<?php echo HTTP_ROOT?>/Homes/login" style="color:#0e1311">Login</a>.
                      </center>
                    </span>
                <?php }else{ ?> 
                    <?php if(empty($my_group)){ ?>
                      <span class="my_grp_tab" style="color:#2bcdc1">
                        <center>
                          To enjoy this feature,plaese book some class.
                        </center>  
                      </span> 
                    <?php }else{ ?>
                      <span class="my_grp_tab" style="color:#2bcdc1">
                        <?php foreach($my_group as $data){ ?>
                          <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 cat_img_cnnt" id="<?php echo $data['ConnectSegmentGroup']['id'];?>" style="margin-top:25px;cursor:pointer;"  onclick="my_grp_getcatid(<?php echo $data['ConnectSegmentGroup']['id']; ?>);">
                            <center class="cat_image" id="my_grp_res<?php echo $data['ConnectSegmentGroup']['id'];?>">
                              <?php if(empty($data['ConnectSegmentGroup']['group_image'])){ ?>
                                 <img class="image-responsive" src="<?php echo HTTP_ROOT;?>/img/group_image/<?php echo $data['ConnectSegmentGroup']['group_image'];?>" alt="img not found">
                              <?php }else{ ?>
                                 <img class="image-responsive img-circle" src="<?php echo HTTP_ROOT;?>/img/group_image/<?php echo $data['ConnectSegmentGroup']['group_image'];?>" alt="img not found">
                              <?php } ?>
                            </center>    
                            <div class="">&nbsp;</div>
                            <center>
                                <span class="connt_flex_middle_text">
                                  <?php echo $data['ConnectSegmentGroup']['group_name'];?>
                                <span>
                            </center>        
                          </div>
                        <?php } ?>     
                      </span> 
                    <?php } ?>
                <?php } ?>
            </div>
            <div class="">&nbsp;</div>
          </div>
            
        </div>
        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">&nbsp;</div> 
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
      <div id="check_empty_gourp_data">
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padd_l_r" id="activty_view_button">      
              <div class="col-xs-12 col-sm-9 col-md-8 col-lg-6 pull-right">
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 padd_l_r">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 fle_page_haedre" style="border: 1px solid #ccc;cursor:pointer;" id="view_back" onclick="viewvendorpost();">  
                        <i class="fa fa-eye eye_icon" id="view_icon" aria-hidden="true"></i>
                        <span class="connt_flex_middle_text" id="view_text" style="color:white;">View Activity Request</span>    
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 top_space" id="add_acty_form" style="display:none;">
                      <?php  if(!empty($user_id) && !empty($group_data)){ ?>
                        <span class="connt_flex_middle_text_part2" id="open_model" style="display:block;">
                          <i class="fa fa-plus-square-o" aria-hidden="true"></i>
                                Add Activity Request
                        </span>
                      <?php } ?>  
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 padd_l_r">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 fle_page_haedre" id="user_back" style="background-color:white;border: 1px solid #ccc;cursor:pointer;" onclick="viewuserpost();">  
                        <i class="fa fa-eye eye_icon1" id="user_icon" style="color:#2bcdc1;" aria-hidden="true"></i>
                        <span class="connt_flex_middle_text" id="user_text" style="color:#2bcdc1;">View Group Posts</span>     
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padd_l_r top_space" id="add_post_form" style="display:none;">
                      <?php if(!empty($user_id) && !empty($group_post_data) && $user_type_id == 2 ){ ?>
                        <span class="connt_flex_middle_text_part2" id="open_model1" style="display:block;">
                          <i class="fa fa-plus-square-o" aria-hidden="true"></i>
                              Add Group Post
                        </span>
                      <?php } ?>  
                    </div>
                </div>
            </div>
          </div>
          </div>
          <?php if(empty($group_data)){ ?>
              <div id="view_box" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pull-left click_seg_chnage">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id=""> 
                  <center>
                    <span class="connt_flex_middle_text" style="text-align:center;">No Activity Request !!!</span>
                  </center>
                </div>
              </div>  
          <?php }else{ ?>
              <div id="view_box" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pull-left click_seg_chnage">
                <div class="">&nbsp;</div> 
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
                  <div class="col-xs-12 col-sm-5 col-md-4 col-lg-3 pull-left">
                      <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 padd_l_r">
                        <div class="form-group" style="margin:0px;">
                          <input type="text" class="form-control" id="acty_search" placeholder="Activity Search" style="border-radius:0px ! important;" segdata="0">
                        </div>
                      </div>    
                      <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 padd_l_r" style="background-color:#2bcdc1;cursor:pointer;">
                        <center>
                        <i class="fa fa-search sech_icon" aria-hidden="true"></i>
                        </center>  
                      </div>
                      <span class="err" id="err_search_seg" style="color:white;">&nbsp;</span>    
                  </div> 
                </div> 
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 connt_flex_middle_bdr" id="show_change_grp_data">
                  <div class="">&nbsp;</div>
                  <?php foreach ($group_data as $data){ ?>
                        <?php  $testCond = false;
                            for($i=0; $i < $check_count; $i++){
                                if($data['GroupActivity']['group_id'] == $my_grp_id[$i]){
                                    $testCond = true;
                                    break;
                                }
                            }
                        ?>
                      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pull-right comm_box2_chat_box">
                          <div class="col-xs-12 col-sm-3 col-md-3 col-lg-2 cmmt_box_de">
                                  <div class="">&nbsp;</div>
                                  <center>
                                    <?php $user_pic = $data['usermaster']['profile_image'];

                                        if(empty($user_pic)){ ?>
                                            <img class="profile_pic img-circle" src="<?php echo HTTP_ROOT;?>/img/connect/dummy/pic.png" alt="img not found">

                                         <?php  }else{

                                        $user_pic1 = substr($user_pic,0,4);

                                        if($user_pic1 == 'http'){ ?>
                                            <img class="profile_pic img-circle" src="<?php echo $data['usermaster']['profile_image'];?>"      alt="img not found">
                                        <?php }else{ ?>

                                          <?php if($data['usermaster']['user_type_id'] ==1 ){ ?>
                                            <img  class="profile_pic img-circle" src="<?php echo HTTP_ROOT;?>/img/Vendor/profile/<?php echo $data['usermaster']['profile_image'];?>" alt="img not found">
                                          <?php }else{ ?>
                                            <img  class="profile_pic img-circle" src="<?php echo HTTP_ROOT;?>/img/Buyer/profile/<?php echo $data['usermaster']['profile_image'];?>" alt="img not found">
                                          <?php } ?>

                                    <?php } } ?>
                                  </center>
                          </div>   
                          <div class="col-xs-12 col-sm-9 col-md-9 col-lg-10 padd_l_r">
                              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padd_l_r">
                                  <span class="connt_flex_middle_bdr123" style="color:#0f0f0f;padding-top:30px;text-transform:capitalize;">
                                     <?php echo $data['usermaster']['first_name']; ?>
                                  </span>
                                  <span class="connt_flex_middle_bdr123" style="color:#5b595c;padding-top:30px;padding-right:5px;">
                                    on <?php echo date('d M Y', $data['GroupActivity']['add_date']); ?> at <?php echo date('h:i a',$data['GroupActivity']['add_date']);?> 
                                  </span>
                                  <i class="icon-map-marker"></i>
                                  <span class="connt_flex_middle_bdr123" style="color:#0f0f0f;padding-top:30px;">
                                    Chennai
                                  </span>
                              </div>
                              <div class="">&nbsp;</div>
                              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padd_l_r">
                                  <span class="connt_flex_middle_bdr123" style="color:#5b595c;padding-top:30px;text-transform:capitalize;">
                                       <?php echo $data['GroupActivity']['request_purpose']; ?>   
                                  </span>
                              </div>
                              <div class="">&nbsp;</div>
                              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padd_l_r">
                                  <span class="connt_flex_middle_bdr123 ryt_margin" style="color:#0f0f0f;">
                                    Activity Date :
                                  </span>
                                  <span class="connt_flex_middle_bdr123" style="color:#5b595c;padding-right:5px;">
                                    on <?php echo $data['GroupActivity']['request_date']; ?> 
                                  </span>
                                  <span class="connt_flex_middle_bdr123 ryt_margin" style="color:#0f0f0f;">
                                    Activity Time :
                                  </span>
                                  <span class="connt_flex_middle_bdr123" style="color:#5b595c;padding-right:5px;">
                                    <?php echo $data['GroupActivity']['request_time']; ?> 
                                  </span>
                                  <span class="connt_flex_middle_bdr123 ryt_margin" style="color:#0f0f0f;">
                                    Activity Location :
                                  </span>
                                  <span class="connt_flex_middle_bdr123" style="color:#5b595c;padding-right:5px;">
                                     <?php echo $data['GroupActivity']['location']; ?> 
                                  </span>
                              </div>
                              <div class="">&nbsp;</div>
                              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padd_l_r">
                                    <?php if($testCond){ ?>                          
                                      <span class="ryt_margin" id="change_likedata_<?php echo $data['GroupActivity']['id']; ?>" style="cursor:pointer;" onclick="likechange('<?php echo $data['GroupActivity']['id']?>')">
                                        <span class="connt_flex_middle_bdr123" style="color:#0f0f0f;">
                                        <?php if($group_like[$data['GroupActivity']['id']]['status']['GroupActivityLike']['status'] == 1){ ?>
                                        <i style="color:#2bcdc1" class="fa fa-thumbs-up" aria-hidden="true">
                                        </i>
                                        <?php }else{  ?>
                                        <i class="fa fa-thumbs-up" aria-hidden="true"></i>
                                        <?php } ?> 
                                        </span>
                                        <span class="connt_flex_middle_bdr123" style="color:#5b595c;padding-right:5px;">
                                          <?php echo (isset($group_like[$data['GroupActivity']['id']]['value']))?$group_like[$data['GroupActivity']['id']]['value']:0;?> Likes
                                        </span>   
                                      </span>
                                      <span class="ryt_margin mouse_show" id="ajax_cmmt_data_<?php echo $data['GroupActivity']['id']; ?>" onclick="commmt_data_show('<?php echo $data['GroupActivity']['id']; ?>')">
                                        <span class="connt_flex_middle_bdr123" style="color:#0f0f0f;">
                                           <i class="fa fa-comments" aria-hidden="true"></i>
                                        </span>
                                        <span class="connt_flex_middle_bdr123" style="color:#5b595c;padding-right:5px;">
                                          
                                           <?php echo (isset($group_commt[$data['GroupActivity']['id']]))?$group_commt[$data['GroupActivity']['id']]:0;?> Comments
                                        </span>
                                      </span>
                                      <span class="ryt_margin" id="report_check_<?php echo $data['GroupActivity']['id'];?>" 
                                         onclick="report_activity('<?php echo $data['GroupActivity']['id'];?>')" style="cursor:pointer;">
                                            <?php if($report_array[$data['GroupActivity']['id']]['status']['GroupActivityReport']['status'] == 1){ ?>
                                            <i style="color:#2bcdc1" class="fa fa-file-text" aria-hidden="true"></i>
                                            <?php }else{ ?>
                                            <i class="fa fa-file-text" aria-hidden="true"></i>
                                            <?php } ?> 
                                            <span class="connt_flex_middle_bdr123">
                                                <?php echo (isset($report_array[$data['GroupActivity']['id']]['value']))?$report_array[$data['GroupActivity']['id']]['value']:0;
                                                ?> Report
                                            </span>
                                      </span>
                                      <span class="ryt_margin" id="attend_check_<?php echo $data['GroupActivity']['id'];?>" 
                                         onclick="attend_activity('<?php echo $data['GroupActivity']['id'];?>')" style="cursor:pointer;">
                                            <?php if($user){ ?>

                                            <i style="color:#2bcdc1" class="fa fa-user" aria-hidden="true"></i>

                                            <?php }else{ ?>

                                            <i class="fa fa-user" aria-hidden="true"></i>

                                            <?php } ?> 

                                            <span class="connt_flex_middle_bdr123">
                                                0 Attendance
                                            </span>
                                      </span>
                                    <?php }else{ ?>
                                      <span class="ryt_margin" id="change_likedata_<?php echo $data['GroupActivity']['id']; ?>" style="pointer-events:none;" onclick="likechange('<?php echo $data['GroupActivity']['id']?>')">
                                        <span class="connt_flex_middle_bdr123" style="color:#0f0f0f;">
                                        <?php if($group_like[$data['GroupActivity']['id']]['status']['GroupActivityLike']['status'] == 1){ ?>
                                        <i style="color:#2bcdc1" class="fa fa-thumbs-up" aria-hidden="true">
                                        </i>
                                        <?php }else{  ?>
                                        <i class="fa fa-thumbs-up" aria-hidden="true"></i>
                                        <?php } ?> 
                                        </span>
                                        <span class="connt_flex_middle_bdr123" style="color:#5b595c;padding-right:5px;">
                                          <?php echo (isset($group_like[$data['GroupActivity']['id']]['value']))?$group_like[$data['GroupActivity']['id']]['value']:0;?> Likes
                                        </span>   
                                      </span>
                                      <span class="ryt_margin mouse_show" id="ajax_cmmt_data_<?php echo $data['GroupActivity']['id']; ?>" onclick="commmt_data_show('<?php echo $data['GroupActivity']['id']; ?>')">
                                        <span class="connt_flex_middle_bdr123" style="color:#0f0f0f;">
                                           <i class="fa fa-comments" aria-hidden="true"></i>
                                        </span>
                                        <span class="connt_flex_middle_bdr123" style="color:#5b595c;padding-right:5px;">
                                           <?php echo (isset($group_commt[$data['GroupActivity']['id']]))?$group_commt[$data['GroupActivity']['id']]:0;?> Comments
                                        </span>
                                      </span>
                                      <span class="ryt_margin" id="report_check_<?php echo $data['GroupActivity']['id'];?>" 
                                         onclick="report_activity('<?php echo $data['GroupActivity']['id'];?>')" style="pointer-events:none;">
                                            <?php if($report_array[$data['GroupActivity']['id']]['status']['GroupActivityReport']['status'] == 1){ ?>
                                            <i style="color:#2bcdc1" class="fa fa-file-text" aria-hidden="true"></i>
                                            <?php }else{ ?>
                                            <i class="fa fa-file-text" aria-hidden="true"></i>
                                            <?php } ?> 
                                            <span class="connt_flex_middle_bdr123">
                                                <?php echo (isset($report_array[$data['GroupActivity']['id']]['value']))?$report_array[$data['GroupActivity']['id']]['value']:0;
                                                ?> Report
                                            </span>
                                      </span>
                                      <span class="ryt_margin" id="attend_check_<?php echo $data['GroupActivity']['id'];?>" 
                                         onclick="attend_activity('<?php echo $data['GroupActivity']['id'];?>')" style="pointer-events:none;">
                                            <?php if($user){ ?>

                                            <i style="color:#2bcdc1" class="fa fa-user" aria-hidden="true"></i>

                                            <?php }else{ ?>

                                            <i class="fa fa-user" aria-hidden="true"></i>

                                            <?php } ?> 

                                            <span class="connt_flex_middle_bdr123">
                                                0 Attendance
                                            </span>
                                      </span>
                                    <?php }  ?>
                                    <div id="show_cmmt_div_<?php echo $data['GroupActivity']['id']; ?>" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 connt_flex_middle_bdr" style="display:none;background-color:#F2F3F4;">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="">           
                                          <div class="">&nbsp;</div>
                                          <div class="">&nbsp;</div>
                                          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <span style="color:#0f0f0f" class="connt_flex_middle_bdr12">
                                              <?php echo (isset($group_commt[$data['GroupActivity']['id']]))?$group_commt[$data['GroupActivity']['id']]:0; ?> Comments 
                                            </span>
                                          </div>
                                            <?php foreach ($group_post_data as $postdata){  ?>
                                              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pull-right comm_box2_chat_box">
                                                  <center>
                                                      <div class="col-xs-12 col-sm-12 col-md-1 col-lg-1 cmmt_box_de">
                                                      <?php $user_pic = $postdata['usermaster']['profile_image'];
                                                          if(empty($user_pic)){ ?>

                                                          <img class="profile_pic img-circle" src="<?php echo HTTP_ROOT;?>/img/connect/dummy/pic.png" alt="img not found">

                                                           <?php  }else{

                                                          $user_pic1 = substr($user_pic,0,4);

                                                          if($user_pic1 == 'http'){ ?>

                                                            <img class="profile_pic img-circle" src="<?php echo $postdata['usermaster']['profile_image'];?>" alt="img not found">

                                                          <?php }else{ ?>

                                                            <?php if( $postdata['usermaster']['user_type_id'] == 1 ){ ?>
                                                                <img  class="img-thumbnail" src="<?php echo HTTP_ROOT;?>/img/Vendor/profile/<?php echo $postdata['usermaster']['profile_image'];?>" alt="img not found">
                                                            <?php }else{ ?>
                                                                <img  class="img-thumbnail" src="<?php echo HTTP_ROOT;?>/img/Buyer/profile/<?php echo $postdata['usermaster']['profile_image'];?>" alt="img not found">
                                                            <?php } ?>

                                                      <?php } } ?>
                                                    </div>
                                                  </center>   
                                                  <div class="col-xs-12 col-sm-11 col-md-11 col-lg-11  cmmt_box_de">
                                                      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padd_l_r mar_pad">
                                                          <span class="connt_flex_middle_bdr123" style="color:#0f0f0f;">
                                                             <?php echo $postdata['usermaster']['first_name']; ?> 
                                                          </span>
                                                          <span class="connt_flex_middle_bdr123" style="color:#5b595c;padding-right:5px;">
                                                            on <?php echo date('d M Y', $postdata['GroupPost']['add_date']); ?> at <?php echo date('h:i a',$postdata['GroupPost']['add_date']);?> 
                                                          </span>
                                                      </div> 
                                                      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padd_l_r mar_pad">
                                                          <span class="connt_flex_middle_bdr123" style="color:#5b595c;">
                                                               <?php echo $postdata['GroupPost']['description']; ?> 
                                                          </span>
                                                      </div>
                                                  </div>
                                              </div>
                                            <?php } ?>
                                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                              <fieldset class="form-group">
                                                <span style="" class="connt_flex_middle_bdr12">
                                                  <strong>
                                                   Add Comment :
                                                  </strong>
                                                </span>
                                                <textarea rows="6" cols="30" type="text" id="acty_cmmt_<?php echo $data['GroupActivity']['id']; ?>" class="form-control input_login" placeholder="Add a comment..." style="border: 2px solid #2bcdc1 !important;"></textarea>
                                                </fieldset>
                                                <span class="err" id="err_acty_cmmt_<?php echo $data['GroupActivity']['id']; ?>">&nbsp;</span>
                                                <button style="pointer-events:none;background-color:#2bcdc1;border:none;" type="button" class="btn btn-primary" onclick="post_submit('<?php echo $data['GroupActivity']['id']; ?>')">Post</button>
                                               <div class="">&nbsp;</div>
                                            </div> 
                                        </div>
                                    </div>    
                              </div>
                          </div>
                      </div>
                      <div class="">&nbsp;</div>
                  <?php } ?>     
                </div>
                <div class="">&nbsp;</div>     
              </div>
          <?php } ?>
          
          <?php if(empty($group_post_data)){ ?>
              <div id="usr_box" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pull-left" style="display:none;">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="show_grp_post_data"> 
                  <center>
                    <span class="connt_flex_middle_text" style="text-align:center;">No Group Post !!!</span>
                  </center>
                </div>
              </div>   
          <?php }else{ ?>
              <div id="usr_box" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pull-left" style="display:none;">
                <div class="">&nbsp;</div> 
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
                  <div class="col-xs-12 col-sm-5 col-md-4 col-lg-3 pull-left">
                      <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 padd_l_r">
                        <div class="form-group" style="margin:0px;">
                          <input type="text" class="form-control" id="grp_pst_search" placeholder="Group Post Search" style="border-radius:0px ! important;" segdata="0">
                        </div>
                      </div>    
                      <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 padd_l_r" style="background-color:#2bcdc1;cursor:pointer;">
                        <center>
                        <i class="fa fa-search sech_icon" aria-hidden="true"></i>
                        </center>  
                      </div>
                      <span class="err" id="err_search_seg" style="color:white;">&nbsp;</span>    
                  </div>
                </div> 
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 connt_flex_middle_bdr" id="show_grp_post_data">
                  <div class="">&nbsp;</div> 
                  <?php foreach ($group_post_data as $postdata){  ?>
                      
                      <?php  $testCond = false;
                            for($i=0; $i < $check_count; $i++){
                                if($data['GroupPost']['group_id'] == $my_grp_id[$i]){
                                    $testCond = true;
                                    break;
                                }
                            }
                      ?>
                      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pull-right comm_box2_chat_box">
                          <div class="col-xs-12 col-sm-3 col-md-3 col-lg-2 cmmt_box_de mar_pad">
                                <center><div class="">&nbsp;</div>
                                  <?php 
                                      $user_pic = $postdata['usermaster']['profile_image'];
                                      if(empty($user_pic)){ ?>
                                          <img class="profile_pic img-circle" src="<?php echo HTTP_ROOT;?>/img/connect/dummy/pic.png" alt="img not found">
                                       <?php  }else{
                                      $user_pic1 = substr($user_pic,0,4);

                                      if($user_pic1 == 'http'){ ?>

                                        <img class="profile_pic img-circle" src="<?php echo $postdata['usermaster']['profile_image'];?>" alt="img not found">

                                      <?php }else{ ?>

                                        <?php if($postdata['usermaster']['user_type_id'] == 1){ ?>
                                            <img  class="profile_pic img-circle" src="<?php echo HTTP_ROOT;?>/img/Vendor/profile/<?php echo $postdata['usermaster']['profile_image'];?>" alt="img not found">
                                        <?php }else{ ?>
                                            <img  class="profile_pic img-circle" src="<?php echo HTTP_ROOT;?>/img/Buyer/profile/<?php echo $postdata['usermaster']['profile_image'];?>" alt="img not found">
                                        <?php } ?>
                                        
                                  <?php } } ?>
                                </center>
                          </div>   
                          <div class="col-xs-12 col-sm-9 col-md-9 col-lg-10 padd_l_r">
                              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padd_l_r mar_pad">
                                  <span class="connt_flex_middle_bdr123" style="color:#0f0f0f;">
                                     <?php echo $postdata['usermaster']['first_name']; ?> 
                                  </span>
                                  <span class="connt_flex_middle_bdr123" style="color:#5b595c;padding-right:5px;">
                                    on <?php echo date('d M Y', $postdata['GroupPost']['add_date']); ?> at <?php echo date('h:i a',$postdata['GroupPost']['add_date']);?> 
                                  </span>
                              </div> 
                              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padd_l_r mar_pad">
                                  <span class="connt_flex_middle_bdr123" style="color:#5b595c;">
                                       <?php echo $postdata['GroupPost']['description']; ?> 
                                  </span>
                              </div>
                              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padd_l_r mar_pad">
                                  <span class="connt_flex_middle_bdr123" style="color:#0f0f0f;">
                                   City :
                                  </span>
                                  <span class="connt_flex_middle_bdr123" style="color:#5b595c;padding-right:5px;">
                                    chennai
                                  </span>
                                  <span class="connt_flex_middle_bdr123" style="color:#0f0f0f;">
                                    Locality :
                                  </span>
                                  <span class="connt_flex_middle_bdr123" style="color:#5b595c;padding-right:5px;">
                                   lucknow
                                  </span>
                              </div> 
                              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padd_l_r mar_pad">
                                  <?php if($testCond){ ?>   
                                    
                                        <span class="ryt_margin" id="change_likepostdata_<?php echo $postdata['GroupPost']['id']; ?>" 
                                            style="cursor:pointer;" onclick="likepostchange('<?php echo $postdata['GroupPost']['id']?>')">
                                            <span class="connt_flex_middle_bdr123" style="color:#0f0f0f;">
                                            
                                            <?php if($group_post_like[$postdata['GroupPost']['id']]['status']['GroupPostLike']['status'] == 1){ ?>
                                            <i style="color:#2bcdc1" class="fa fa-thumbs-up" aria-hidden="true">
                                            </i>
                                            <?php }else{  ?>
                                            <i class="fa fa-thumbs-up" aria-hidden="true"></i>
                                            <?php } ?>     

                                            </span>
                                            <span class="connt_flex_middle_bdr123" style="color:#5b595c;">
                                               <?php echo (isset($group_post_like[$postdata['GroupPost']['id']]))?$group_post_like[$postdata['GroupPost']['id']]:0;?> Likes
                                            </span>
                                        </span> 
                                        
                                        <span class="ryt_margin mouse_show" id="ajax_cmmt_data_post<?php echo $postdata['GroupPost']['id']; ?>" onclick="commmt_data_show_post('<?php echo $postdata['GroupPost']['id'];?>')">
                                          <span class="connt_flex_middle_bdr123" style="color:#0f0f0f;">
                                             <i class="fa fa-comments" aria-hidden="true"></i>
                                          </span>
                                          <span class="connt_flex_middle_bdr123" style="color:#5b595c;">
                                             <?php echo (isset($group_post_commt[$postdata['GroupPost']['id']]))?$group_post_commt[$postdata['GroupPost']['id']]:0; ?> Comments
                                          </span>
                                        </span>
                                        
                                        <span class="ryt_margin" id="post_report_check_<?php echo $postdata['GroupPost']['id'];?>" 
                                           onclick="report_post('<?php echo $postdata['GroupPost']['id'];?>')" style="pointer-events:none;">
                                              <?php if($post_report_array[$postdata['GroupPost']['id']]['status']['GroupPostReport']['status'] == 1){ ?>
                                              <i style="color:#2bcdc1" class="fa fa-file-text" aria-hidden="true"></i>
                                              <?php }else{ ?>
                                              <i class="fa fa-file-text" aria-hidden="true"></i>
                                              <?php } ?> 

                                              <span class="connt_flex_middle_bdr123">
                                                  <?php echo (isset($post_report_array[$postdata['GroupPost']['id']]['value']))?$post_report_array[$postdata['GroupPost']['id']]['value']:0;
                                                  ?> Report
                                              </span>
                                        </span>

                                    <?php }else{ ?>

                                      <span class="ryt_margin" id="change_likepostdata_<?php echo $postdata['GroupPost']['id']; ?>" 
                                        style="pointer-events:none;" onclick="likepostchange('<?php echo $postdata['GroupPost']['id']?>')">
                                        <span class="connt_flex_middle_bdr123" style="color:#0f0f0f;">
                                        
                                        <?php if($group_post_like[$postdata['GroupPost']['id']]['status']['GroupPostLike']['status'] == 1){ ?>
                                        <i style="color:#2bcdc1" class="fa fa-thumbs-up" aria-hidden="true">
                                        </i>
                                        <?php }else{  ?>
                                        <i class="fa fa-thumbs-up" aria-hidden="true"></i>
                                        <?php } ?>     

                                        </span>
                                        <span class="connt_flex_middle_bdr123" style="color:#5b595c;">
                                           <?php echo (isset($group_post_like[$postdata['GroupPost']['id']]))?$group_post_like[$postdata['GroupPost']['id']]:0;?> Likes
                                        </span>
                                      </span> 
                                    
                                      <span class="ryt_margin mouse_show" id="ajax_cmmt_data_post<?php echo $postdata['GroupPost']['id']; ?>" onclick="commmt_data_show_post('<?php echo $postdata['GroupPost']['id']; ?>')">
                                        <span class="connt_flex_middle_bdr123" style="color:#0f0f0f;">
                                           <i class="fa fa-comments" aria-hidden="true"></i>
                                        </span>
                                        <span class="connt_flex_middle_bdr123" style="color:#5b595c;">
                                           <?php echo (isset($group_post_commt[$postdata['GroupPost']['id']]))?$group_post_commt[$postdata['GroupPost']['id']]:0; ?> Comments
                                        </span>
                                      </span>
                                    
                                      <span class="ryt_margin" id="post_report_check_<?php echo $postdata['GroupPost']['id'];?>" 
                                         onclick="report_post('<?php echo $postdata['GroupPost']['id'];?>')" style="pointer-events:none;">
                                            <?php if($post_report_array[$postdata['GroupPost']['id']]['status']['GroupPostReport']['status'] == 1){ ?>
                                            <i style="color:#2bcdc1" class="fa fa-file-text" aria-hidden="true"></i>
                                            <?php }else{ ?>
                                            <i class="fa fa-file-text" aria-hidden="true"></i>
                                            <?php } ?> 

                                            <span class="connt_flex_middle_bdr123">
                                                <?php echo (isset($post_report_array[$postdata['GroupPost']['id']]['value']))?$post_report_array[$postdata['GroupPost']['id']]['value']:0;
                                                ?> Report
                                            </span>
                                      </span>
                                    <?php } ?> 
                                  <div id="show_cmmt_div_post<?php echo $postdata['GroupPost']['id']; ?>" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 connt_flex_middle_bdr" style="display:none;background-color:#f2f3f4;">
                                   
                                  </div>   
                              </div>
                              <div class="">&nbsp;</div>
                          </div>
                      </div>
                      <div class="">&nbsp;</div>  
                    <?php } ?>     
                </div>
                <div class="">&nbsp;</div>        
              </div> 
          <?php } ?>
      </div>
    </div>
    <div class="">&nbsp;</div>
</div>
<link  rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
<script>
    $(function(){
        $("#datepicker").datepicker({
            minDate: 0,
            dateFormat: 'dd/mm/yy',
            maxDate: '+1Y+6M'
        });
    });
</script>
<div class="">&nbsp;</div>
<div class="">&nbsp;</div>

<!--  all model boxes -->

<div class="modal fade" id="category_id">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#2bcdc1;">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title cat_mod_title">Add Activity Request</h4>
            </div>
            <div class="modal-body">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <center>
                        <input name="category_ids" class="radiobtn required" value="1" id="checkbox1" type="checkbox" 
                         onclick="check_city()"> 
                        <label class="connt_flex_middle_text"  style="color:#2bcdc1" for="checkbox1">
                            Do You want to show this activity to the members or specific city or locality.
                        </label>
                    </center>    
                </div>
                <div class="">&nbsp;</div>
                <div style="display:none;" id="city_locality">
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6"> 
                        <fieldset class="form-group">
                            <select class="input_login form-control " name="city" id="city"
                             onchange="find_state(this.value)" />
                                 <option value="-1">Select City</option>
                                 <?php foreach($cities_data as $country) { ?>
                                    <?php if($country['City']['id'] == 1){ ?>
                                        <option value="<?php echo $country['City']['id']; ?>">
                                            <?php  echo $country['City']['name']; ?>
                                        </option>
                                    <?php }else{ ?>
                                        <option value="<?php echo $country['City']['id']; ?>" disabled>
                                            <?php  echo $country['City']['name']; ?>
                                        </option>
                                    <?php } ?>
                                 <?php } ?>
                            </select>
                            <span class="err" id="err_city">&nbsp;</span>
                        </fieldset>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <fieldset class="form-group ">
                            <select class="input_login form-control countries1" name="locaity" id="locaity"/>
                                 <option value="-1">Select Locality</option>
                            </select>
                            <span class="err" id="err_locaity">&nbsp;</span>
                        </fieldset>   
                    </div>
                </div>
                <script type="text/javascript">
                       function find_state(city_id){

                        $.ajax({
                          method: "POST",
                          url: 'findlocality',
                          data: 'city_id='+city_id
                        })
                       .done(function(states) {
                           $('#locaity').html(states); 
                        });
                    }
                </script>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <fieldset class="form-group">
                        <textarea rows="3" cols="50" type="text" name="pro_purpose" id="pro_purpose" class="form-control input_login"
                            placeholder="Request Purpose"></textarea>
                        <span class="err" id="err_purpose">&nbsp;</span>
                    </fieldset>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <fieldset class="form-group ">
                        <input type="text" name="pro_date" class="form-control input_login" id="datepicker" placeholder="Proposed date" readonly>
                        <span class="err" id="err_date">&nbsp;</span>
                    </fieldset>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <fieldset class="form-group ">
                        <input type="text" name="basicExample" class="form-control time ui-timepicker-input" id="basicExample" placeholder="Proposed Time">
                        <script type="text/javascript">
                            $('#basicExample').timepicker({
                                
                            });
                        </script>
                        <span class="err" id="err_time">&nbsp;</span>
                    </fieldset>
                </div>

                <!-- Choose Group -->

                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                  <fieldset class="form-group ">
                    <select multiple="multiple" class="input_login form-control" name="select_group" id="select_group"/>
                      <?php foreach($segment_data as $data) { ?>
                          <option value="<?php echo $data['ConnectSegmentGroup']['id']; ?>">
                            <?php echo $data['ConnectSegmentGroup']['group_name']; ?>
                          </option>
                      <?php } ?>
                    </select>   
                    <span class="err" id="err_select_group">&nbsp;</span>
                  </fieldset>
                </div>

                <!-- Choose Activity Group  -->
                
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                  <fieldset class="form-group ">
                    <select class="input_login form-control" name="select_activity" id="select_activity"/>
                     <option>A Activity</option>
                     <option>B Activity</option>
                     <option>C Activity</option>
                     <option>D Activity</option>
                    </select>   
                    <span class="err" id="err_select_activity">&nbsp;</span>
                  </fieldset>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <fieldset class="form-group ">
                    <input type="text" name="pro_location" id="pro_location" class="form-control input_login" placeholder="Proposed Location">
                        <span class="err" id="err_location">&nbsp;</span>
                    </fieldset>
                </div> 
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <fieldset class="form-group ">
                        <select class="input_login form-control" name="pro_type" id="pro_type"/>
                            <option value="-1">Privacy</option>     
                            <option value="1">Group User</option>
                            <option value="2">All User</option>       
                        </select>    
                        <span class="err" id="err_type">&nbsp;</span>
                    </fieldset>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <fieldset class="form-group">
                    <input type="text" name="pro_note" id="pro_note" class="form-control input_login" placeholder="Note">
                        <span class="err" id="err_note">&nbsp;</span>
                    </fieldset>
                </div>  
            </div>
            <div class="modal-footer" style="border-top:none;">
                <button style="background-color:#2bcdc1;border:none;" type="button" class="btn btn-primary" id="getcat_ids">Send</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="success_msg">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#2bcdc1;">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title cat_mod_title">Success Message</h4>
            </div>
            <div class="modal-body">
                <div class="">&nbsp;</div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <center>
                        <span class="connet_text_hed" style="color:#2bcdc1">
                            Your activity request has been send successfully for admin approval.     
                        </span>
                    </center>
                </div>
            </div>
            <div class="modal-footer" style="border-top:none;">
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="success_msg1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#2bcdc1;">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title cat_mod_title">Success Message</h4>
            </div>
            <div class="modal-body">
                <div class="">&nbsp;</div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <center>
                        <span class="connet_text_hed" style="color:#2bcdc1">
                            Your Group Post request has been send successfully for admin approval.     
                        </span>
                    </center>
                </div>
            </div>
            <div class="modal-footer" style="border-top:none;">
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="notice_msg" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#2bcdc1;">
                 <button type="button" class="close" data-dismiss="modal" aria-hidden="true" onClick="window.location.reload();">&times;</button>
                <h4 class="modal-title cat_mod_title">
                  <?php echo $msg['GroupActivityMessge']['message'];?>
                </h4>
            </div>
            <div class="modal-body">
                <div class="">&nbsp;</div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                  <span class="pull_left">Hello <?php echo $user_view['UserMaster']['first_name']; ?>
                  </span>
                  <br>
                  <span class="connt_flex_middle_bdr123" style="color:#0f0f0f">
                     <?php echo $msg['GroupActivityMessge']['message'];?>
                  </span>
                  <br>
                  <span class="pull_left">Thanks <?php echo $msg['usermaster']['first_name']; ?>
                  </span>
                </div>
            </div>
        </div>
    </div>
</div> 

<div class="modal fade" id="post_id">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#2bcdc1;">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true" >&times;</button>
                <h4 class="modal-title cat_mod_title">Add Group Post</h4>
            </div>
            <div class="modal-body">
                <div class="">&nbsp;</div>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6"> 
                  <fieldset class="form-group">
                      <select class="input_login form-control" name="group_post_city" id="group_post_city"
                       onchange="find_state(this.value)" />
                           <option value="-1">Select City</option>
                           <?php foreach($cities_data as $country) { ?>
                              <?php if($country['City']['id'] == 1){ ?>
                                  <option value="<?php echo $country['City']['id']; ?>">
                                      <?php  echo $country['City']['name']; ?>
                                  </option>
                              <?php }else{ ?>
                                  <option value="<?php echo $country['City']['id']; ?>" disabled>
                                      <?php  echo $country['City']['name']; ?>
                                  </option>
                              <?php } ?>
                           <?php } ?>
                      </select>
                      <span class="err" id="err_group_post_city">&nbsp;</span>
                  </fieldset>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                  <fieldset class="form-group ">
                      <select class="input_login form-control countries1" name="locaity" id="group_post_locaity"/>
                        <option value="-1">Select Locality</option>
                      </select>
                      <span class="err" id="err_group_post_locaity">&nbsp;</span>
                  </fieldset>   
                </div>

                <script type="text/javascript">
                  function find_state(city_id){
                    $.ajax({
                      method: "POST",
                      url: 'findlocality',
                      data: 'city_id='+city_id
                    })
                   .done(function(states) {
                       $('#group_post_locaity').html(states); 
                    });
                  }
                </script>
                
                <!-- Choose Group -->

                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                  <fieldset class="form-group ">
                    <select multiple="multiple" class="input_login form-control" name="select_group_post" id="select_group_post"/>
                      <?php foreach($segment_data as $data) { ?>
                          <option value="<?php echo $data['ConnectSegmentGroup']['id']; ?>">
                            <?php echo $data['ConnectSegmentGroup']['group_name']; ?>
                          </option>
                      <?php } ?>
                    </select>   
                    <span class="err" id="err_select_group_post">&nbsp;</span>
                  </fieldset>                
                </div>

                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <fieldset class="form-group">
                      <textarea rows="3" type="text" name="add_post" id="add_post" class="form-control input_login" 
                            placeholder="Add Your Comments..."></textarea>
                      <span class="err" id="err_post_commt">&nbsp;</span>
                    </fieldset>
                </div>

            </div>
            <div class="modal-footer" style="border-top:none;">
                <button style="background-color:#2bcdc1;border:none;" type="button" class="btn btn-primary" id="add_post_click">Send</button>
            </div>
        </div>
    </div>
</div>
  

<!-- model boxes  -->
<script>
    function shwdiv(id){
        var userid  = id;
        $.post("<?php echo Router::url( '/', true ).'Connect/BlogCommt/'; ?>", {userid : userid}, function(res){                                   
            if(res){
                $("#comment"+userid).html(res).toggle();      
            }
      });
    }
</script>

<script>
    function getcatid(id){

        var search_group   = $('#acty_search').attr('segdata');

        var userid         = "<?php echo $user_id; ?>";
        var group_id       = id;

        if(search_group == "0"){

          var count          = <?php echo count($seg_data); ?>;
          var cat_array      = <?php echo json_encode($seg_data);?>;

           if(userid == ""){
            
                for(var i=0;i<count;i++){
                  document.getElementById("res"+cat_array[i]).className = "cat_image"; 
                }    
                  document.getElementById("res"+group_id).className = "cat_image1";
            
            }else{
            
               for(var i=0;i<count;i++){
                  document.getElementById("res"+cat_array[i]).className = "cat_image"; 
                }    
                  document.getElementById("res"+group_id).className = "cat_image1";
            }

          $('.loader1').show();
          $.post("<?php echo Router::url( '/', true ).'Connect/changegroupdata/'; ?>", {userid : userid , group_id : group_id},
              function(res){ 
              if(res != ""){
                
                $('.loader1').hide();
                $("#show_change_grp_data").html(res);
               
              }                             
          });   

        }else{

          var g_count        = search_group.split(","); 
          var count          = g_count.length;
          var group_id       = search_group;

          var group_id_click = id;

          if(group_id_click == ""){

            $('.loader1').show();
            $.post("<?php echo Router::url( '/', true ).'Connect/changegroupdata/'; ?>", {userid : userid , group_id : group_id},
                function(res){ 
                if(res != ""){
                  
                  $('.loader1').hide();
                  $("#show_change_grp_data").html(res);
                 
                }                             
            });

          }else{

            var group_id = group_id_click;

            if(userid == ""){
                
                for(var i=0;i<count;i++){
                  document.getElementById("res"+g_count[i]).className = "cat_image"; 
                }    
                  document.getElementById("res"+group_id).className = "cat_image1";
            
            }else{
               
               for(var i=0;i<count;i++){
                  document.getElementById("res"+g_count[i]).className = "cat_image"; 
                }    
                  document.getElementById("res"+group_id).className = "cat_image1";
            }

            $('.loader1').show();
            $.post("<?php echo Router::url( '/', true ).'Connect/changegroupdata/'; ?>", {userid : userid , group_id : group_id},
                function(res){ 
                if(res != ""){
                  $('.loader1').hide();
                  $("#show_change_grp_data").html(res);
                }                             
            });  
          }
        }
    }

    // my group get id

     function my_grp_getcatid(id){

        var search_group   = $('#seg_data').val(); 
        var userid         = "<?php echo $user_id; ?>";
        var group_id       = id;
        var g_count        = search_group.split(","); 
        var count          = g_count.length;

        if(userid == ""){

            for(var i=0;i<count;i++){
              document.getElementById("my_grp_res"+g_count[i]).className = "cat_image"; 
            }    
              document.getElementById("my_grp_res"+group_id).className = "cat_image1";
        
        }else{
           
           for(var i=0;i<count;i++){
              document.getElementById("my_grp_res"+g_count[i]).className = "cat_image"; 
            }    
              document.getElementById("my_grp_res"+group_id).className = "cat_image1";
        }

        $('.loader1').show();
        $.post("<?php echo Router::url( '/', true ).'Connect/changegroupdata/'; ?>", {userid : userid , group_id : group_id},
            function(res){ 
            if(res != ""){
              $('.loader1').hide();
              $("#show_change_grp_data").html(res);
            }                             
        });  
        
    }

    function acceptactivity(id){

      var activity_id = id; 
      var use_id      = "<?php echo $user_id;?>";
      
      $('.loader1').show();
      $.post("<?php echo Router::url( '/', true ).'Connect/acceptActivityByUser/'; ?>", {activity_id : activity_id , use_id : use_id},
            function(res){ 
            if(res != ""){
              var res_id = parseInt(res);
              $("#accept_"+res_id).css('visibility','hidden');
              $('.loader1').hide();  
            }                             
      }); 
    }

    function read_msg(id){

      var msg_id    = id;
      var user_id   = "<?php echo $user_id;?>";
      $('.loader1').show();  
      $.post("<?php echo Router::url( '/', true ).'Connect/msgRead/'; ?>", {msg_id : msg_id , user_id : user_id},
            function(res){ 
            if(res != ""){

               $('.loader1').hide();  
               $("#notice_msg").html(res);  
               $("#notice_msg").modal('show');
          }                             
      }); 
    }
</script>

<script>
    $(document).ready(function() {

        $('#getcat_ids').click(function(){      

            var city             = $('#city').val();
            var group_id         = $('#select_group').val();
            var activity_name    = $('#select_activity').val();
            var locality         = $('#locaity').val();
            var pro_purpose      = $('#pro_purpose').val();
            var pro_date         = $('#datepicker').val();
            var pro_time         = $('#basicExample').val();
            var pro_locat        = $('#pro_location').val();
            var pro_type         = $('#pro_type').val();
            var pro_note         = $('#pro_note').val();    

            if(document.getElementById("checkbox1").checked == true){

              if(city == -1){

                $('#err_city').html('Please enter city.');            
                $("#city").focus();
                   return false;
                }else{
                    $('#err_city').html('&nbsp;');             
                }

                if(locality == -1){
               
                    $('#err_locaity').html('Please enter locality.');            
                    $("#locaity").focus();    
                        return false;
                }else{
                    $('#err_locaity').html('&nbsp;');             
                }
            }

            if(pro_purpose == ""){
               
                $('#err_purpose').html('Please enter proposed purpose.');            
                $("#pro_purpose").focus();    
                    return false;

            }else{

                $('#err_purpose').html('&nbsp;');             
            }

            if(pro_date == ""){
               
                $('#err_date').html('Please enter data.');            
                $("#datepicker").focus();    
                    return false;

            }else{
                
                $('#err_date').html('&nbsp;');             
            }

            if(pro_time == ""){
               
                $('#err_time').html('Please enter time.');            
                $("#basicExample").focus();    
                    return false;

            }else{
                
                $('#err_time').html('&nbsp;');             
            }



            if(group_id == null){
               
                $('#err_select_group').html('Please Select Group.');            
                $("#select_group").focus();    
                    return false;

            }else{
                
                $('#err_select_group').html('&nbsp;');             
            }


            if(pro_locat == ""){
               
                $('#err_location').html('Please enter Proposed location.');            
                $("#pro_location").focus();    
                    return false;

            }else{
                
                $('#err_location').html('&nbsp;');             
            }

            if(pro_type == -1){
               
                $('#err_type').html('Please enter proposed type.');            
                $("#pro_type").focus();    
                    return false;

            }else{
                
                $('#err_type').html('&nbsp;');             
            }

            if(pro_note == ""){
               
                $('#err_note').html('Please enter note.');            
                $("#pro_note").focus();    
                    return false;

            }else{
                
                $('#err_note').html('&nbsp;');             
            }

            $('.loader1').show();  
            $.post("<?php echo Router::url( '/', true ).'Connect/addactivityrequest/'; ?>", {city : city, locality : locality,  pro_purpose : pro_purpose, pro_date : pro_date , pro_time : pro_time , pro_locat : pro_locat, pro_type : pro_type , pro_note : pro_note, group_id : group_id ,activity_name : activity_name}, function(res){
                
                if(res == 1){ 
                    $('.loader1').hide();  
                    $("#category_id").modal('toggle');
                    $("#success_msg").modal('toggle');
                }            
            });     
        });



        $('#add_post_click').click(function(){      
         
          var city_id         = $('#group_post_city').val();
          var locality_id     = $('#group_post_locaity').val();
          var group_id        = $('#select_group_post').val();
	        var userid          = "<?php echo $user_id;?>";	
          var user_view_post  = $('#add_post').val();

          
          if(city_id == -1){
            $('#err_group_post_city').html('Please select city.');            
            $("#group_post_city").focus();    
              return false;
          }else{
            $('#err_group_post_city').html('&nbsp;');             
          }


          if(locality_id == 0){
            $('#err_group_post_locaity').html('Please select locality.');            
            $("#group_post_locaity").focus();    
              return false;
          }else{
            $('#err_group_post_locaity').html('&nbsp;');             
          }


          if(group_id == null){
            $('#err_select_group_post').html('Please select Group.');            
            $("#select_group_post").focus();    
              return false;
          }else{
            $('#err_select_group_post').html('&nbsp;');             
          }  


          if(user_view_post == ""){
            $('#err_post_commt').html('Please enter post.');            
            $("#add_post").focus();    
              return false;
          }else{
            $('#err_post_commt').html('&nbsp;');             
          }

          $('.loader1').show();  
          $.post("<?php echo Router::url( '/', true ).'Connect/addviewpost/'; ?>", { city_id : city_id, locality_id : locality_id, user_view_post : user_view_post , group_id : group_id }, function(res){
              if(res == 1){
                  $('.loader1').hide();
                  $("#post_id").modal('toggle');
                  $("#success_msg1").modal('toggle');  
                  $.post("<?php echo Router::url( '/', true ).'Connect/changegrouppostdata/'; ?>", {userid : userid , group_id : group_id},
                      function(res){ 
                      if(res != ""){
                          $("#show_grp_post_data").html(res);
                          $('.loader1').hide();  
                      }                             
                  });
              }            
          }); 
        });       
    }); 
</script>

<script type="text/javascript">
    $("#open_model").click(function(event){
        $("#category_id").modal('show');
    });
    $("#error_msg1").click(function(event){
        $("#err_msg1").modal('show');
    });
    $("#error_msg2").click(function(event){
        $("#err_msg2").modal('show');
    });
    $("#open_model1").click(function(event){
        $("#post_id").modal('show');
    });
    $("#no_gourp_data").click(function(event){
        $("#no_group_msg1").modal('show');
    });
    $("#no_gourp_data1").click(function(event){
        $("#no_group_msg1").modal('show');
    });
</script>

<script>
    function viewvendorpost() {
       $('#user_back').css('background-color','white');
       $('#user_icon').css('color','#2bcdc1');
       $('#user_text').css('color','#2bcdc1');
       $('#view_back').css('background-color','#2bcdc1');
       $('#view_icon').css('color','white');
       $('#view_text').css('color','white');
       $('#usr_box').hide(); 
       $('#view_box').show();
       $('#add_acty_form').show();
      
    }
</script> 
<script>

    function viewuserpost(){
       $('#view_back').css('background-color','white');
       $('#view_icon').css('color','#2bcdc1');
       $('#view_text').css('color','#2bcdc1');
       $('#user_back').css('background-color','#2bcdc1');
       $('#user_icon').css('color','white');
       $('#user_text').css('color','white');
       $('#view_box').hide(); 
       $('#usr_box').show();
       $('#add_acty_form').hide();
       $('#add_post_form').show();

    }

    function check_city(){
        if(document.getElementById("checkbox1").checked == true){
           $('#city_locality').show();
        }else{
           $('#city_locality').hide();
        }
    }

    function likechange(id){

      var activity_id = parseInt(id);
      var user_id     = "<?php echo $user_id; ?>";
      $('.loader1').show();  
      $.post("<?php echo Router::url( '/', true ).'Connect/changelike/'; ?>", { activity_id : activity_id , user_id : user_id }, function(res){
         $('.loader1').hide();      
         $('#change_likedata_'+activity_id).html(res);

      }); 
    }

    function likepostchange(id){
      
      var post_id     = parseInt(id);
      var user_id     = "<?php echo $user_id; ?>";
      $('.loader1').show();  
      $.post("<?php echo Router::url( '/', true ).'Connect/changepostlike/'; ?>", { post_id : post_id , user_id : user_id }, function(res){
        $('.loader1').hide();       
        $('#change_likepostdata_'+post_id).html(res);

      }); 
    }

    function commmt_data_show(id){ 
      var activity_id       = parseInt(id); 
      var user_id           = "<?php echo $user_id; ?>";
        
        $('.loader1').show();  
        $.post("<?php echo Router::url( '/', true ).'Connect/commentData/'; ?>", { activity_id : activity_id , user_id : user_id }, function(res){

           $('.loader1').hide();   
           $('#show_cmmt_div_'+activity_id).html(res);
           $('#show_cmmt_div_'+activity_id).toggle();
        });    
    }

    function commmt_data_show_post(id){ 
      var post_id           = parseInt(id); 
      var user_id           = "<?php echo $user_id; ?>";

        $('.loader1').show();  
        $.post("<?php echo Router::url( '/', true ).'Connect/commentPostData/'; ?>", { post_id : post_id , user_id : user_id }, function(res){
              $('.loader1').hide();  
              $('#show_cmmt_div_post'+post_id).html(res);
              $('#show_cmmt_div_post'+post_id).toggle();
        });    
    }

    function post_submit(id){

      var activity_id = parseInt(id);
      var user_id     = "<?php echo $user_id; ?>";
      var comment     = $('#acty_cmmt_'+activity_id).val();
      
      if(comment == ""){     
        
        $('#err_acty_cmmt_'+activity_id).html('Please enter comment.');            
        $('#acty_cmmt_'+activity_id).focus();    
            return false;
        }else{      
          $('#err_acty_cmmt_'+activity_id).html('&nbsp;');             
      }

      $('.loader1').show();  
      $.post("<?php echo Router::url( '/', true ).'Connect/activityPostCommt/'; ?>", { activity_id : activity_id , user_id : user_id , comment : comment }, function(res){

         $('.loader1').hide();  
        var result=jQuery.parseJSON(res);
        $('#ajax_cmmt_data_'+activity_id).html(result[1]);
        $('#show_cmmt_div_'+activity_id).html(result[0]);
      }); 
    } 


    function group_post_submit(id){

      var post_id     = parseInt(id);
      var user_id     = "<?php echo $user_id; ?>";
      var comment     = $('#pst_cmmt_'+post_id).val();
      
      if(comment == ""){     
        
        $('#err_acty_cmmt_'+post_id).html('Please enter comment.');            
        $('#err_pst_cmmt_'+post_id).focus();    
            return false;
        }else{      
          $('#err_pst_cmmt_'+post_id).html('&nbsp;');             
      }

      $('.loader1').show();  
      $.post("<?php echo Router::url( '/', true ).'Connect/activityGroupPostCommt/'; ?>", { post_id : post_id , user_id : user_id , comment : comment }, function(res){
         $('.loader1').hide();  
         var result=jQuery.parseJSON(res);
          $('#ajax_cmmt_data_post'+post_id).html(result[1]);
          $('#show_cmmt_div_post'+post_id).html(result[0]);
      }); 
    } 
</script>

<script>
// show all group data 
function open_all_group(){
  $('#All_group_unreg').show();
  $('#chnage_tab_name').html('ALL GROUP'); 
  $('#My_group_unreg').hide();
  $('#view_box').show();
  $('#activty_view_button').show();
  $('#shift_color').css('background-color','#2bcdc1');
  $('#chnge_color').css("background-color",'#093F7B');
  location.reload();
}

function open_my_group(){

  $('#All_group_unreg').hide();
  $('#chnage_tab_name').html('MY GROUP');    
  $('#My_group_unreg').show();
  $('#shift_color').css('background-color','#093F7B');
  $('#chnge_color').css("background-color",'#2bcdc1');
  $('#add_acty_form').show();

 // $('#add_post_form').hide();

  var user_id     = "<?php echo $user_id;?>";
  var my_group    = "<?php echo $my_grp_count;?>";
  var my_group_id = <?php echo json_encode($my_grp_id);?>;

  if(user_id == ""){
   $('#usr_box').hide();
  }

  if(my_group_id != ""){
    $.post("<?php echo Router::url( '/', true ).'Connect/myGroupData/'; ?>", {user_id : user_id , my_group_id : my_group_id},
      function(res){ 
      $('.loader1').hide(); 
      if(res != ""){
        $('.loader1').hide();
        $('#seg_data').val(my_group_id);
        $("#show_change_grp_data").html(res);
      }                             
    });
  }

  if(user_id == ""){
  
    $('#view_box').hide();
    $('#activty_view_button').hide();
 
  }else{

    if(my_group == 0){
  
      $('#view_box').hide();
      $('#activty_view_button').hide();
    }else{
      
      $('#view_box').show();
      $('#activty_view_button').show();
     
    }
  }

}


$("#search_seg").keyup(function(){

    var userid     = "<?php echo $user_id;?>";
    var search_seg = $('#search_seg').val();
    var segt_ids   = $('#seg_data').val();

    $('.loader1').show(); 
    $.post("<?php echo Router::url( '/', true ).'Connect/searchGroupSegment/'; ?>", {search_seg : search_seg },function(res){
        
      var result=jQuery.parseJSON(res);
      $('#All_group_unreg1').html(result[1]);
      
      var group_id = result[0];
     
      $('#acty_search').attr('segdata',group_id);
      $('#grp_pst_search').attr('segdata',group_id);
      
      $.post("<?php echo Router::url( '/', true ).'Connect/changegroupdata/'; ?>", {userid : userid , group_id : group_id},
        function(res){ 
        $('.loader1').hide(); 
        if(res != ""){
          $('.loader1').hide();
          $("#show_change_grp_data").html(res);
        }                             
      });
    });  
});



  $("#my_grp_search_seg").keyup(function(){

    var userid     = "<?php echo $user_id;?>";
    var search_seg = $('#my_grp_search_seg').val();
    var segt_ids   = <?php echo json_encode($my_grp_id);?>


    $('.loader1').show(); 
    $.post("<?php echo Router::url( '/', true ).'Connect/searchMYGroupSegment/'; ?>", {segt_ids : segt_ids , search_seg : search_seg},function(res){
        $('.loader1').hide();         

        var result=jQuery.parseJSON(res);  
        $('#My_group_unreg1').html(result[1]);
        
        var group_id = result[0];       
        $('#acty_search').attr('segdata',group_id);
        $('#grp_pst_search').attr('segdata',group_id); 

        $.post("<?php echo Router::url( '/', true ).'Connect/myGroupData/'; ?>", {userid : userid , group_id : group_id},
          function(res){ 
          $('.loader1').hide(); 
          if(res != ""){
            $('.loader1').hide();  
            $("#show_change_grp_data").html(res);
          }                             
        });
    });  
  });


$("#acty_search").keyup(function(){         

  var userid         = "<?php echo $user_id;?>";
  var segt_ids       = $('#acty_search').attr('segdata');    
  var search_string  = $("#acty_search").val();            

  $.post("<?php echo Router::url( '/', true ).'Connect/searchGroupActivity/'; ?>", {search_string: search_string, userid: userid,segt_ids : segt_ids},function(response){
    
    $("#show_change_grp_data").html(response);     

  }); 
});



$("#grp_pst_search").keyup(function(){         

  var userid         = "<?php echo $user_id;?>";
  var segt_ids       = $('#grp_pst_search').attr('segdata');    
  var search_string  = $("#grp_pst_search").val();            

  $.post("<?php echo Router::url( '/', true ).'Connect/searchGroupPost/'; ?>", {search_string: search_string, userid: userid,segt_ids : segt_ids},function(response){
    
     alert('working on !!!');

    //    $("#show_change_grp_data").html(response);     

  }); 
});


function report_activity(id){

  var userid      = "<?php echo $user_id; ?>";
  var report_id   = id;
  $.post("<?php echo Router::url( '/', true ).'Connect/reportActivity/'; ?>", { report_id : report_id , userid : userid}, function(res){
    if(res == 2){
      alert("Your already report this Blog.");
    }else{
      $("#report_check_"+report_id).html(res); 
    }     
  });
}


// cmment reply data 

function show_reply_activity(id){

  var user_id   = "<?php echo $user_id;?>";
  var commt_id  = id;

  $('.loader1').show();
  $.post("<?php echo Router::url( '/', true ).'Connect/activityCommentReplyData/'; ?>", { commt_id : commt_id, user_id : user_id}, function(res){
    $('.loader1').hide(); 
    $("#reply_activity_"+commt_id).html(res).toggle(); 
  });   
}


function activity_cmt_reply_submit(id){
      
      var commt_id     = id;
      var user_id     = "<?php echo $user_id; ?>";
      var reply     = $('#activity_commt_replies_'+commt_id).val();
      
      if(reply == ""){     
        
            $('#err_activity_commt_replies_'+commt_id).html('Please enter comment.');            
            $('#activity_commt_replies_'+commt_id).focus();    
            return false;

        }else{      
        
          $('#err_activity_commt_replies_'+commt_id).html('&nbsp;');             
        
        }

        $('.loader1').show();  
        $.post("<?php echo Router::url( '/', true ).'Connect/groupActivityCommtReply/'; ?>", { commt_id : commt_id , user_id : user_id , reply : reply },function(res){
            $('.loader1').hide();  
            $('#activity_reply_data_'+commt_id).html(res);
        });   
  }

// Group Post comment data 

function show_reply_post(id){

  var user_id   = "<?php echo $user_id;?>";
  var commt_id  = id;

  $('.loader1').show();
  $.post("<?php echo Router::url( '/', true ).'Connect/groupPostCommentReplyData/'; ?>", { commt_id : commt_id, user_id : user_id}, function(res){
    $('.loader1').hide(); 
    $("#reply_post_"+commt_id).html(res).toggle(); 
  });   
}


function post_cmt_reply_submit(id){
      
    var commt_id   = id;
    var user_id    = "<?php echo $user_id; ?>";
    var reply      = $('#activity_commt_replies_'+commt_id).val();
    
    if(reply == ""){     
      
          $('#err_activity_commt_replies_'+commt_id).html('Please enter comment.');            
          $('#activity_commt_replies_'+commt_id).focus();    
          return false;

      }else{      
      
        $('#err_activity_commt_replies_'+commt_id).html('&nbsp;');             
      
      }

      $('.loader1').show();  
      $.post("<?php echo Router::url( '/', true ).'Connect/groupActivityCommtReply/'; ?>", { commt_id : commt_id , user_id : user_id , reply : reply },function(res){
          $('.loader1').hide();  
          $('#activity_reply_data_'+commt_id).html(res);
      });   
    } 


</script>  

<script type="text/javascript">
    $(document).ready(function(){

      $('#chnge_color').css("background-color",'#093F7B');
    
    });
</script>


<script type="text/javascript">
    $(document).ready(function(){

      window.select_group = $('#select_group').SumoSelect({
          selectAll:true,
          placeholder:'Select Group'
      });
      window.select_group_post = $('#select_group_post').SumoSelect({
          selectAll:true,
          placeholder:'Select Group'
      });
    
    });    
</script>


