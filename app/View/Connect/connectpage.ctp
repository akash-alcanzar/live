<?php 

    $user_id      = $user_view['UserMaster']['id'];
    $user_type    = $user_view['UserMaster']['user_type_id'];

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

/* akash modify css after functionlity done */

    .modal-dialog{
        width:1000px;
    }

    .modal{overflow:visible;}
    .modal-body{overflow-y:visible;}
    .form-control[readonly]{
        background-color: white;
    }
    
    #hideimge{
       display:none;
    }

    .blog_image_icon{
        color: #2bcdc1;
        cursor: pointer;
        font-size: 30px;
        position: relative;
        top:-30px;
       float: right;
       padding-right:5px;
    }

    .moz_hide{
        -moz-appearance: none;
        -webkit-appearance: none;
        cursor:pointer;
    }

    .err{
       color:red; 
    }

    .fa_caret_down_model{
        font-size: 20px;
        color: #2bcdc1;
        top: -27px;
        float: right;
        padding-right:10px;
        position: relative;
    }
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
        <?php echo $this->Html->image('../img/connect/banner/category_selected.jpg', array('url' => array('controller' =>'Connect','action'=>'connectpage'),'class'=>'banner_img_left image-responsive'));
        ?>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 padd_l_r ">  
        <?php echo $this->Html->image('../img/connect/banner/group.jpg', array('url' => array('controller' =>'Connect','action'=>'connectGroup'),'class'=>'banner_img_ryt image-responsive')); 
        ?>
    </div>
</div>


<div class="">&nbsp;</div>
<div class="">&nbsp;</div>

<div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1 col-lg-10 col-lg-offset-1">
    <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12  padd_l_r connt_flex_middle_bdr">
            <?php if(empty($user_id)){  ?>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12  fle_page_haedre">
                    <span class="connet_text_hed">
                        CATEGORIES
                    </span>
                </div>
            <?php }else{ ?>
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6  fle_page_haedre">
                    <span class="connet_text_hed">
                        CATEGORIES
                    </span>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6  fle_page_haedre" id="open_model">
                    <span class="connt_flex_middle_text_part2 pull-right">
                        <i class="fa fa-pencil" aria-hidden="true"></i>
                        CUSTOMIZE
                    </span>
                </div>    
            <?php } ?>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 fixed_cate_hyt" id="customize_cat_data">
                <div class="">&nbsp;</div>
                <?php foreach ($category_data as $data){ ?>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 cat_img_cnnt" id="<?php echo $data['Category']['id'];?>" style="cursor:pointer;" onclick="getcatid(<?php echo $data['Category']['id']; ?>);">
                        <center class="cat_image" id="res<?php echo $data['Category']['id'];?>">
                            <img class="image-responsive img-circle" src="<?php echo HTTP_ROOT;?>/img/category_image/<?php echo $data['Category']['category_image'];?>" alt="img not found">
                        </center>
                        <div class="hidden-xs hidden-sm hidden-md">&nbsp;</div>    
                        <center>
                            <span class="connt_flex_middle_text">
                                <?php echo $data['Category']['category_name']; ?>
                            </span>
                        </center>
                        <div class="">&nbsp;</div>             
                    </div>
                <?php } ?>
            </div>
        </div>
        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">&nbsp;</div> 
    </div>
    <div class="col-xs-12 col-sm-7 col-md-7 col-lg-7" style="background-color:#fefcfd;">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pull-left padd_l_r connt_flex_middle_bdr">
            <?php if(empty($user_id)){  ?>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 fle_page_haedre">
                    <div class="col-xs-12 col-sm-6 col-md-8 col-lg-8 padd_l_r">
                        <span class="connet_text_hed ">
                            SEGMENTS
                        </span>
                    </div>    
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 padd_l_r">
                        <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 padd_l_r">
                            <div class="form-group" style="margin:0px;">
                                <input type="text" class="form-control" id="search_seg" placeholder="Search" style="border-radius: 0px ! important ;" segdata="0">
                            </div>
                        </div>    
                        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 padd_l_r" style="background-color:white;color:#2bcdc1;cursor:pointer;">
                            <center>
                                <i class="fa fa-search sech_icon" id="search_segment" style="color:#2bcdc1;" aria-hidden="true"></i>
                            </center>  
                        </div>            
                    </div>
                </div>
            <?php }else{ ?>
                <div class="col-xs-12 col-sm-4 col-md-6 col-lg-6 fle_page_haedre">
                    <span class="connet_text_hed ">
                        SEGMENTS
                    </span>    
                </div>
                <div class="col-xs-12 col-sm-8 col-md-6 col-lg-6 padd_l_r " style="background-color:#2bcdc1;">
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 padd_l_r fle_page_haedre">
                        <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 padd_l_r">
                            <div class="form-group" style="margin:0px;">
                               <input type="text" class="form-control" id="search_seg" placeholder="Search" style="border-radius: 0px ! important ;" segdata="0">
                            </div>
                        </div>    
                        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 padd_l_r" style="background-color:white;color:#2bcdc1;cursor:pointer;">
                            <center>
                                <i class="fa fa-search sech_icon" id="search_segment" style="color:#2bcdc1;" aria-hidden="true"></i>
                            </center>    
                        </div>
                    </div> 
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 fle_page_haedre" id="open_model1">
                        <div class="col-xs-6 col-sm-12 col-md-12 padd_l_r">
                            <span class="connt_flex_middle_text_part2 pull-right">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                CUSTOMIZE
                            </span>
                        </div>
                    </div>
                </div>
            <?php } ?>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 content">   
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padd_l_r click_change seg_scroll">
                        <?php foreach ($segment_data as $data1 ) { ?>    
                            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4" id="<?php echo $data1['ClassSegment']['id'];?>"  style="margin-top:25px;cursor:pointer;" onclick="getsemid(<?php echo $data1['ClassSegment']['id']; ?>);" >
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padd_l_r segmt_img">
                                    <center>
                                        <?php if(empty($data1['ClassSegment']['segment_image'])){ ?>
                                            <img class="image-responsive" src="<?php echo HTTP_ROOT;?>/img/connect/noimage.jpg" alt="img not found">
                                        <?php }else{  ?>
                                            <img class="image-responsive" src="<?php echo HTTP_ROOT;?>/img/segment_image/<?php echo $data1['ClassSegment']['segment_image'];?>" alt="img not found">
                                        <?php } ?>
                                    </center>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 semgt_connt_bdr2" id="segt<?php echo $data1['ClassSegment']['id'];?>">
                                    <center>
                                        <span class="connt_flex_middle_text" id="segt_text<?php echo $data1['ClassSegment']['id'];?>">
                                            <?php echo $data1['ClassSegment']['segment_name'];?>
                                        </span>
                                    </center>
                                </div>           
                            </div>
                        <?php } ?>
                    </div>
                </div>
        </div> 
        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">&nbsp;</div>
    </div>
    <div class="">&nbsp;</div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padd_l_r">    
        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-6">
           <br>      
        </div>
        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padd_l_r vvb" id="view_back" style="background-color:#2bcdc1;border: 1px solid #ccc;cursor:pointer;" onclick="viewvendorpost();">  
                <i class="fa fa-eye eye_icon" id="view_icon" aria-hidden="true"></i>
                <span class="connt_flex_middle_text" id="view_text" style="color:white;">View Vendor Article</span>    
            </div>
            <?php if(!empty($user_id) && $user_type == 1){ ?>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padd_l_r vvb top_space" style="background-color:white;border: 1px solid #ccc;cursor:pointer;" id="open_model_view_blog">
                    <i aria-hidden="true" style="color:#2bcdc1;" id="user_icon" class="fa fa-plus eye_icon1"></i>
                    <span class="connt_flex_middle_text" style="color:#2bcdc1;">Add New Article</span>   
                </div>
            <?php }  ?>
        </div>
        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padd_l_r vvb" id="user_back" style="background-color:white;border: 1px solid #ccc;cursor:pointer;" onclick="viewuserpost();"> 
                <i class="fa fa-eye eye_icon1" id="user_icon" style="color:#2bcdc1;" aria-hidden="true"></i>
                <span class="connt_flex_middle_text" id="user_text" style="color:#2bcdc1;">View User Posts</span>    
            </div>
            <?php if(!empty($user_id) && $user_type == 2){ ?>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padd_l_r vvb top_space" style="background-color:white;border:1px solid #ccc;cursor:pointer;display:none;" id="open_model_view_post">       
                    <i aria-hidden="true" style="color:#2bcdc1;" id="user_icon" class="fa fa-plus eye_icon1"></i>    
                    <span class="connt_flex_middle_text" style="color:#2bcdc1;">Add New Post</span>
                </div>
            <?php } ?>    
        </div>
    </div>
    <div id="view_box" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pull-left  click_seg_chnage" style="padding:15px;">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5 padd_l_r vvb1">
                <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 padd_l_r">
                    <div class="form-group">
                        <input  type="text" id="blog_search" class="form-control" placeholder="Blog Search" style="border-radius: 0px!important;" segdata="0">
                    </div>            
                </div>
                <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 padd_l_r" style="background-color:#2bcdc1;cursor:pointer;">
                    <center>
                        <i class="fa fa-search sech_icon" onclick="" aria-hidden="true"></i>
                    </center>  
                </div>
                <span class="err" id="err_search_blog">&nbsp;</span>          
            </div>
        </div>
        <div id="view1_box" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 connt_flex_middle_bdr">
            <div class="">&nbsp;</div> 
            <?php if(!empty($blog_data)){ ?>
                <?php foreach ($blog_data as $value)  { ?>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 blog_background_design">
                        <div class="">&nbsp;</div>   
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padd_l_r">
                            <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 padd_l_r cat_pro_pic_blog">
                                <center>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <?php  $user_pic = $value['userdata']['profile_image'];
                                                if(empty($user_pic)){ ?>
                                                    <img class="img-thumbnail" src="<?php echo HTTP_ROOT;?>/img/connect/dummy/pic.png" alt="img not found">
                                                    <?php  }else{
                                                    $user_pic1 = substr($user_pic,0,4);
                                                    if($user_pic1 == 'http'){ ?>
                                                        <img class="img-thumbnail" src="<?php echo $value['userdata']['profile_image'];?>"      alt="img not found">
                                                    <?php }else{ ?>
                                                        <?php if($value['userdata']['user_type_id'] == 1 ){ ?>

                                                            <img  class="img-thumbnail" src="<?php echo HTTP_ROOT;?>/img/Vendor/profile/<?php echo $value['userdata']['profile_image'];?>" alt="img not found">
                                                        <?php }else{ ?>
                                                            <img  class="img-thumbnail" src="<?php echo HTTP_ROOT;?>/img/Buyer/profile/<?php echo $value['userdata']['profile_image'];?>" alt="img not found">
                                                        <?php } ?> 
                                        <?php } } ?>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <i class="fa fa-user coont_box2_icon121" aria-hidden="true"></i>
                                        <span class="coont_box2_icon">
                                            <?php echo $value['userdata']['first_name'];?>
                                        </span>    
                                    </div>
                                </center>    
                            </div>
                            <div class="col-xs-12 col-sm-10 col-md-10 col-lg-10 padd_l_r">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padd_l_r">
                                    <div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">   
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padd_l_r">
                                            <span class="connt_flex_middle_bdr12" style="color:#0f0f0f;text-transform: capitalize;">
                                                <b><?php echo $value['Blog']['blog_title'];?></b>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5 padd_l_r" style="float:left;">
                                  
                                    </div>
                                    <div class="col-xs-12 col-sm-11 col-md-12 col-lg-11 pdd_top21">
                                        <span class="connt_flex_middle_bdr123" style="color:#5b595c;">
                                            <?php echo $value['Blog']['blog_description']; ?>
                                        </span>
                                    </div>    
                                </div>        
                            </div>   
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padd_l_r">
                                <div class="col-xs-12 col-sm-3 col-md-2 col-lg-2 padd_l_r">  
                                   
                                </div>
                                <?php if(!empty($user_id)){ ?>
                                    <?php if($user_type == 1){ ?>
                                    <div class="col-xs-12 col-sm-9 col-md-10 col-lg-10 padd_l_r">
                                        <div id="change_like_count_<?php echo $value['Blog']['id']; ?>" class="col-xs-12 col-sm-2 col-md-2 col-lg-1 padd_l_r" style="pointer-events: none;" onclick="get_blog_like_id('<?php echo $value['Blog']['id']; ?>');">
                                            <?php if($comment_array[$value['Blog']['id']]['status']['BlogLike']['status'] == 1){  ?>
                                                <i style="color:#2bcdc1" class="fa fa-thumbs-up coont_box2_icon121" aria-hidden="true"></i>
                                            <?php }else{  ?>
                                                <i class="fa fa-thumbs-up coont_box2_icon121" aria-hidden="true"></i>
                                            <?php } ?> 
                                            <span class="coont_box2_icon">
                                                <?php echo (isset($comment_array[$value['Blog']['id']]['value']))?$comment_array[$value['Blog']['id']]['value']:0;
                                                ?>
                                            </span>
                                        </div>   

                                        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-2 padd_l_r">
                                            <i class="fa fa-clock-o coont_box2_icon121" aria-hidden="true"></i>
                                            <span class="coont_box2_icon">
                                                <?php echo date('d M Y', $value['Blog']['add_date']);?>
                                            </span>
                                        </div>

                                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-2 padd_l_r" id="ajxa_attch_<?php echo $value['Blog']['id'];?>" onclick="shwdiv('<?php echo $value['Blog']['id'];?>')" style="cursor:pointer">
                                            <i class="fa fa-comments coont_box2_icon121" aria-hidden="true"></i>
                                            <span class="coont_box2_icon">
                                                <?php echo (isset($like_array[$value['Blog']['id']]))?$like_array[$value['Blog']['id']]:0;
                                                ?> COMMENTS
                                            </span>
                                        </div>
                                        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 padd_l_r" id="report_check_<?php echo $value['Blog']['id'];?>" onclick="report_blog('<?php echo $value['Blog']['id'];?>')" 
                                                style="pointer-events:none;">
                                            <?php if($report_array[$value['Blog']['id']]['status']['BlogReport']['status'] == 1){  ?>
                                                <i style="color:#2bcdc1" class="fa fa-file-text coont_box2_icon121" aria-hidden="true"></i>
                                            <?php }else{  ?>
                                                <i class="fa fa-file-text coont_box2_icon121" aria-hidden="true"></i>
                                            <?php } ?> 
                                            <span class="coont_box2_icon">
                                                <?php echo (isset($report_array[$value['Blog']['id']]['value']))?$report_array[$value['Blog']['id']]['value']:0;
                                                ?> Report
                                            </span>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 connt_flex_middle_bdr" style="display:none;" id="comment<?php echo $value['Blog']['id'];?>">
                                        </div>
                                    </div>    
                                    <?php }else{ ?>
                                        <div class="col-xs-12 col-sm-9 col-md-10 col-lg-10 padd_l_r">
                                            <div id="change_like_count_<?php echo $value['Blog']['id']; ?>" class="col-xs-12 col-sm-2 col-md-2 col-lg-1 padd_l_r" style="cursor:pointer" onclick="get_blog_like_id('<?php echo $value['Blog']['id']; ?>');">
                                                <?php if($comment_array[$value['Blog']['id']]['status']['BlogLike']['status'] == 1){  ?>
                                                    <i style="color:#2bcdc1" class="fa fa-thumbs-up coont_box2_icon121" aria-hidden="true"></i>
                                                <?php }else{  ?>
                                                    <i class="fa fa-thumbs-up coont_box2_icon121" aria-hidden="true"></i>
                                                <?php } ?> 
                                                <span class="coont_box2_icon">
                                                    <?php echo (isset($comment_array[$value['Blog']['id']]['value']))?$comment_array[$value['Blog']['id']]['value']:0;
                                                    ?>
                                                </span>
                                            </div>   

                                            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-2 padd_l_r">
                                                <i class="fa fa-clock-o coont_box2_icon121" aria-hidden="true"></i>
                                                <span class="coont_box2_icon">
                                                    <?php echo date('d M Y', $value['Blog']['add_date']);?>
                                                </span>
                                            </div>

                                            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-2 padd_l_r" id="ajxa_attch_<?php echo $value['Blog']['id'];?>" onclick="shwdiv('<?php echo $value['Blog']['id'];?>')" style="cursor:pointer">
                                                <i class="fa fa-comments coont_box2_icon121" aria-hidden="true"></i>
                                                <span class="coont_box2_icon">
                                                    <?php echo (isset($like_array[$value['Blog']['id']]))?$like_array[$value['Blog']['id']]:0;
                                                    ?> COMMENTS
                                                </span>
                                            </div>

                                            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 padd_l_r" id="report_check_<?php echo $value['Blog']['id'];?>" onclick="report_blog('<?php echo $value['Blog']['id'];?>')" 
                                                    style="cursor:pointer;">
                                                <?php if($report_array[$value['Blog']['id']]['status']['BlogReport']['status'] == 1){  ?>
                                                    <i style="color:#2bcdc1" class="fa fa-file-text coont_box2_icon121" aria-hidden="true"></i>
                                                <?php }else{  ?>
                                                    <i class="fa fa-file-text coont_box2_icon121" aria-hidden="true"></i>
                                                <?php } ?> 
                                                <span class="coont_box2_icon">
                                                    <?php echo (isset($report_array[$value['Blog']['id']]['value']))?$report_array[$value['Blog']['id']]['value']:0;
                                                    ?> Report
                                                </span>
                                            </div>

                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 connt_flex_middle_bdr" style="display:none;" id="comment<?php echo $value['Blog']['id'];?>">
                                            </div>
                                        </div>      
                                    <?php } ?>
                                <?php }else{ ?>
                                    <div class="col-xs-12 col-sm-9 col-md-10 col-lg-10 padd_l_r">
                                        <div id="change_like_count_<?php echo $value['Blog']['id']; ?>" class="col-xs-12 col-sm-2 col-md-2 col-lg-1 padd_l_r" style="pointer-events: none;" onclick="get_blog_like_id('<?php echo $value['Blog']['id']; ?>');">
                                            <?php if($comment_array[$value['Blog']['id']]['status']['BlogLike']['status'] == 1){  ?>
                                                <i style="color:#2bcdc1" class="fa fa-thumbs-up coont_box2_icon121" aria-hidden="true"></i>
                                            <?php }else{  ?>
                                                <i class="fa fa-thumbs-up coont_box2_icon121" aria-hidden="true"></i>
                                            <?php } ?> 
                                            <span class="coont_box2_icon">
                                                <?php echo (isset($comment_array[$value['Blog']['id']]['value']))?$comment_array[$value['Blog']['id']]['value']:0;
                                                ?>
                                            </span>
                                        </div>

                                        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-2 padd_l_r">
                                            <i class="fa fa-clock-o coont_box2_icon121" aria-hidden="true"></i>
                                            <span class="coont_box2_icon">
                                                <?php echo date('d M Y', $value['Blog']['add_date']);?>
                                            </span>
                                        </div>

                                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-2 padd_l_r" id="ajxa_attch_<?php echo $value['Blog']['id'];?>" onclick="shwdiv('<?php echo $value['Blog']['id'];?>')" style="cursor:pointer">
                                            <i class="fa fa-comments coont_box2_icon121" aria-hidden="true"></i>
                                            <span class="coont_box2_icon">
                                                <?php echo (isset($like_array[$value['Blog']['id']]))?$like_array[$value['Blog']['id']]:0;
                                                ?> COMMENTS
                                            </span>
                                        </div>

                                        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 padd_l_r" id="report_check_<?php echo $value['Blog']['id'];?>" onclick="report_blog('<?php echo $value['Blog']['id'];?>')" 
                                                style="pointer-events:none;">
                                            <?php if($report_array[$value['Blog']['id']]['status']['BlogReport']['status'] == 1){  ?>
                                                <i style="color:#2bcdc1" class="fa fa-file-text coont_box2_icon121" aria-hidden="true"></i>
                                            <?php }else{  ?>
                                                <i class="fa fa-file-text coont_box2_icon121" aria-hidden="true"></i>
                                            <?php } ?> 
                                            <span class="coont_box2_icon">
                                                <?php echo (isset($report_array[$value['Blog']['id']]['value']))?$report_array[$value['Blog']['id']]['value']:0;
                                                ?> Report
                                            </span>
                                        </div>

                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 connt_flex_middle_bdr" style="display:none;" id="comment<?php echo $value['Blog']['id'];?>">
                                        </div>
                                    </div>
                                <?php } ?>
                        </div>
                        <div class="">&nbsp;</div>
                    </div>
                    <div style="background-color:white;">&nbsp;</div>    
                <?php $i++; } ?>
            <?php }else{ ?>

                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 blog_background_design">
                   <center>
                    <span class="connet_text_hed" style="color:#2bcdc1"> No Article Exits </span>
                   </center>
                </div>
                <div style="background-color:white;">&nbsp;</div>       

            <?php } ?>    
        </div>       
    </div>
    <div id="usr_box" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pull-left click_seg_chnage_post" style="padding:15px;display:none;">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5 padd_l_r vvb1">
                <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 padd_l_r">
                    <div class="form-group">
                        <input type="text" id="post_search" class="form-control" placeholder="Post Search" style="border-radius: 0px ! important ;">
                    </div>            
                </div>
                <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 padd_l_r" style="background-color:#2bcdc1;cursor:pointer;">
                    <center>
                        <i class="fa fa-search sech_icon" onclick="" aria-hidden="true"></i>
                    </center>  
                </div>
                <span class="err" id="err_post_search">&nbsp;</span>          
            </div>
        </div>
        <div id="usr1_box" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pull-left connt_flex_middle_bdr">
        <div class="">&nbsp;</div>   
        <?php if(!empty($post_data)){ ?>

            <?php foreach ($post_data as $value){ ?>    
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 blog_background_design">
                    <div class="">&nbsp;</div>   
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
                        <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 padd_l_r cat_pro_pic_blog">
                            <center>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <?php  $user_pic = $value['userdata']['profile_image'];
                                        if(empty($user_pic)){ ?>
                                            <img class="img-thumbnail" src="<?php echo HTTP_ROOT;?>/img/connect/dummy/pic.png" alt="img not found">
                                            <?php  }else{ $user_pic1 = substr($user_pic,0,4);
                                            if($user_pic1 == 'http'){ ?>
                                                
                                                <img class="img-thumbnail" src="<?php echo $value['userdata']['profile_image'];?>" alt="img not found">
                                            
                                            <?php }else{ ?>

                                                <?php if( $value['userdata']['user_type_id'] == 1 ){ ?>
                                                    <img  class="img-thumbnail" src="<?php echo HTTP_ROOT;?>/img/Vendor/profile/<?php echo $value['userdata']['profile_image'];?>" alt="img not found">
                                                <?php }else{ ?>
                                                    <img  class="img-thumbnail" src="<?php echo HTTP_ROOT;?>/img/Buyer/profile/<?php echo $value['userdata']['profile_image'];?>" alt="img not found">
                                                <?php } ?>

                                    <?php } } ?>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <i class="fa fa-user coont_box2_icon121" aria-hidden="true"></i>
                                    <span class="coont_box2_icon">
                                        <?php echo $value['userdata']['first_name'];?>
                                    </span>    
                                </div>
                            </center>    
                        </div>
                        <div class="col-xs-12 col-sm-10 col-md-10 col-lg-10 padd_l_r">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padd_l_r">
                                <div class="col-xs-12 col-sm-7 col-md-7 col-lg-7 padd_l_r">   
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
                                        <span class="connt_flex_middle_bdr12" style="color:#0f0f0f;text-transform: capitalize;">
                                            <b>
                                               <?php echo $value['Post']['post_title'];?>
                                            </b>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5 padd_l_r" style="float:left;">
                              
                                </div>
                                <div class="col-xs-12 col-sm-11 col-md-12 col-lg-11 pdd_top21">
                                    <span class="connt_flex_middle_bdr123" style="color:#5b595c;">
                                        <?php echo $value['Post']['post_description']; ?>
                                    </span>
                                </div>    
                            </div>        
                        </div>   
                    </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
                            <div class="col-xs-12 col-sm-3 col-md-2 col-lg-2 padd_l_r">  
                              
                            </div>
                            <?php if(!empty($user_id)){ ?>
                                <?php if($user_type == 1){ ?>
                                    <div class="col-xs-12 col-sm-9 col-md-10 col-lg-10 padd_l_r">
                                        <div id="post_change_like_count_<?php echo $value['Post']['id']; ?>" class="col-xs-12 col-sm-4 col-md-4 col-lg-1 padd_l_r" style="pointer-events:none;" onclick="get_post_like_id('<?php echo $value['Post']['id']; ?>');">
                                            <?php if($post_like_array[$value['Post']['id']]['status']['PostLike']['status'] == 1){  ?>
                                                <i style="color:#2bcdc1" class="fa fa-thumbs-up coont_box2_icon121" aria-hidden="true">
                                                </i>
                                            <?php }else{  ?>
                                                <i class="fa fa-thumbs-up coont_box2_icon121" aria-hidden="true"></i>
                                            <?php } ?> 
                                            <span class="coont_box2_icon">
                                                <?php echo (isset($post_like_array[$value['Post']['id']]['value']))?$post_like_array[$value['Post']['id']]['value']:0;
                                                ?>
                                            </span>                                                    
                                        </div>
                                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-2 padd_l_r">
                                            <i class="fa fa-clock-o coont_box2_icon121" aria-hidden="true"></i>
                                            <span class="coont_box2_icon">
                                                <?php echo date('d M Y', $value['Post']['add_date']);?>
                                            </span>
                                        </div>
                                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-2 padd_l_r" id="post_ajxa_attch_<?php echo $value['Post']['id'];?>" onclick="postshwdiv('<?php echo $value['Post']['id'];?>')" style="cursor:pointer">
                                            <i class="fa fa-comments coont_box2_icon121" aria-hidden="true"></i>
                                            <span class="coont_box2_icon">
                                                <?php echo (isset($post_commmt_array[$value['Post']['id']]))?$post_commmt_array[$value['Post']['id']]:0; ?> COMMENTS
                                            </span>
                                        </div>

                                        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 padd_l_r" id="report_post_check_<?php echo $value['Post']['id'];?>" onclick="report_post('<?php echo $value['Post']['id'];?>')" 
                                                style="pointer-events:none;">
                                            <?php if($post_report_array[$value['Post']['id']]['status']['PostReport']['status'] == 1){  ?>
                                                <i style="color:#2bcdc1" class="fa fa-file-text coont_box2_icon121" aria-hidden="true"></i>
                                            <?php }else{  ?>
                                                <i class="fa fa-file-text coont_box2_icon121" aria-hidden="true"></i>
                                            <?php } ?> 
                                            <span class="coont_box2_icon">
                                                <?php echo (isset($post_report_array[$value['Post']['id']]['value']))?$post_report_array[$value['Post']['id']]['value']:0;
                                                ?> Report
                                            </span>
                                        </div>

                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 connt_flex_middle_bdr" style="display:none;" id="postcomment<?php echo $value['Post']['id'];?>">
                         
                                        </div>  
                                    </div>
                                <?php }else{ ?>
                                    <div class="col-xs-12 col-sm-9 col-md-10 col-lg-7 padd_l_r">
                                            <div id="post_change_like_count_<?php echo $value['Post']['id']; ?>" class="col-xs-12 col-sm-4 col-md-4 col-lg-4 padd_l_r" onclick="get_post_like_id('<?php echo $value['Post']['id']; ?>');">
                                                    <?php if($post_like_array[$value['Post']['id']]['status']['PostLike']['status'] == 1){  ?>
                                                        <i style="color:#2bcdc1" class="fa fa-thumbs-up coont_box2_icon121" aria-hidden="true">
                                                        </i>
                                                    <?php }else{  ?>
                                                        <i class="fa fa-thumbs-up coont_box2_icon121" aria-hidden="true"></i>
                                                    <?php } ?> 
                                                    <span class="coont_box2_icon">
                                                        <?php echo (isset($post_like_array[$value['Post']['id']]['value']))?$post_like_array[$value['Post']['id']]['value']:0;
                                                        ?>
                                                    </span>                                                    
                                            </div>
                                            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 padd_l_r">
                                                <i class="fa fa-clock-o coont_box2_icon121" aria-hidden="true"></i>
                                                <span class="coont_box2_icon">
                                                    <?php echo date('d M Y', $value['Post']['add_date']);?>
                                                </span>
                                            </div>
                                            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 padd_l_r" id="post_ajxa_attch_<?php echo $value['Post']['id'];?>" onclick="postshwdiv('<?php echo $value['Post']['id'];?>')" style="cursor:pointer">
                                                <i class="fa fa-comments coont_box2_icon121" aria-hidden="true"></i>
                                                <span class="coont_box2_icon">
                                                    <?php echo (isset($post_commmt_array[$value['Post']['id']]))?$post_commmt_array[$value['Post']['id']]:0; ?> COMMENTS
                                                </span>
                                            </div>
                                            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 padd_l_r" id="report_post_check_<?php echo $value['Post']['id'];?>" onclick="report_post('<?php echo $value['Post']['id'];?>')" 
                                                    >
                                                <?php if($post_report_array[$value['Post']['id']]['status']['PostReport']['status'] == 1){  ?>
                                                    <i style="color:#2bcdc1" class="fa fa-file-text coont_box2_icon121" aria-hidden="true"></i>
                                                <?php }else{  ?>
                                                    <i class="fa fa-file-text coont_box2_icon121" aria-hidden="true"></i>
                                                <?php } ?> 
                                                <span class="coont_box2_icon">
                                                    <?php echo (isset($post_report_array[$value['Post']['id']]['value']))?$post_report_array[$value['Post']['id']]['value']:0;
                                                    ?> Report
                                                </span>
                                            </div>

                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 connt_flex_middle_bdr" style="display:none;" id="postcomment<?php echo $value['Post']['id'];?>">
                         
                                            </div>  
                                    </div>  
                                <?php } ?>
                            <?php }else{ ?>
                                <div class="col-xs-12 col-sm-9 col-md-10 col-lg-10 padd_l_r">
                                    <div id="post_change_like_count_<?php echo $value['Post']['id']; ?>" class="col-xs-12 col-sm-4 col-md-4 col-lg-1 padd_l_r" style="pointer-events:none;" onclick="get_post_like_id('<?php echo $value['Post']['id']; ?>');">
                                        <?php if($post_like_array[$value['Post']['id']]['status']['PostLike']['status'] == 1){  ?>
                                            <i style="color:#2bcdc1" class="fa fa-thumbs-up coont_box2_icon121" aria-hidden="true">
                                            </i>
                                        <?php }else{  ?>
                                            <i class="fa fa-thumbs-up coont_box2_icon121" aria-hidden="true"></i>
                                        <?php } ?> 
                                        <span class="coont_box2_icon">
                                            <?php echo (isset($post_like_array[$value['Post']['id']]['value']))?$post_like_array[$value['Post']['id']]['value']:0;
                                            ?>
                                        </span>                                                    
                                    </div>
                                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-2 padd_l_r">
                                        <i class="fa fa-clock-o coont_box2_icon121" aria-hidden="true"></i>
                                        <span class="coont_box2_icon">
                                            <?php echo date('d M Y', $value['Post']['add_date']);?>
                                        </span>
                                    </div>

                                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-2 padd_l_r" id="post_ajxa_attch_<?php echo $value['Post']['id'];?>" onclick="postshwdiv('<?php echo $value['Post']['id'];?>')" style="cursor:pointer">
                                        <i class="fa fa-comments coont_box2_icon121" aria-hidden="true"></i>
                                        <span class="coont_box2_icon">
                                            <?php echo (isset($post_commmt_array[$value['Post']['id']]))?$post_commmt_array[$value['Post']['id']]:0; ?> COMMENTS
                                        </span>
                                    </div>

                                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 padd_l_r" id="report_post_check_<?php echo $value['Post']['id'];?>" onclick="report_post('<?php echo $value['Post']['id'];?>')" style="pointer-events:none;">
                                        <?php if($post_report_array[$value['Post']['id']]['status']['PostReport']['status'] == 1){  ?>
                                            <i style="color:#2bcdc1" class="fa fa-file-text coont_box2_icon121" aria-hidden="true"></i>
                                        <?php }else{  ?>
                                            <i class="fa fa-file-text coont_box2_icon121" aria-hidden="true"></i>
                                        <?php } ?> 
                                        <span class="coont_box2_icon">
                                            <?php echo (isset($post_report_array[$value['Post']['id']]['value']))?$post_report_array[$value['Post']['id']]['value']:0;
                                            ?> Report
                                        </span>
                                    </div>


                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 connt_flex_middle_bdr" style="display:none;" id="postcomment<?php echo $value['Post']['id'];?>">
                         
                                    </div> 
                                </div>
                            <?php } ?>
                        </div>
                    <div class="">&nbsp;</div>
                </div>
                <div style="background-color:white;">&nbsp;</div>  
            <?PHP } ?>
            
        <?php }else{ ?>
            
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 blog_background_design">
               <center>
                <span class="connet_text_hed" style="color:#2bcdc1"> No Post Exits </span>
               </center>
            </div>
            <div style="background-color:white;">&nbsp;</div> 
        
        <?php } ?>
        </div> 
    </div>    
    <div class="">&nbsp;</div>
</div>

<div class="">&nbsp;</div> 

<div class="modal fade" id="category_id">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#2bcdc1;">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true" >&times;</button>
                <h4 class="modal-title cat_mod_title" >Customize Category</h4>
            </div>
            <div class="modal-body">
                
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <span class="connt_flex_middle_text" style="color:#2bcdc1">Edit Category</span>
                </div>
                <div class="">&nbsp;</div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padd_l_r">
                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 padd_l_r">
                        <input name="category_ids" class="radiobtn required" value="1" id="checkbox1" type="checkbox">
                        <label class="connt_flex_middle_text_model"  for="checkbox1">Fun & Recreation</label>
                    </div>

                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 padd_l_r">
                        <input name="category_ids" class="radiobtn required" value="2" id="checkbox2" type="checkbox">
                        <label class="connt_flex_middle_text_model"  for="checkbox2">Informative & Motivational</label>
                    </div>

                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 padd_l_r">
                        <input name="category_ids" class="radiobtn required" value="3" id="checkbox3" type="checkbox">
                        <label class="connt_flex_middle_text_model"  for="checkbox3">Health & Fitness</label>
                    </div>

                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 padd_l_r">
                        <input name="category_ids" class="radiobtn required" value="4" id="checkbox4" type="checkbox">
                        <label class="connt_flex_middle_text_model"  for="checkbox4">Kids & Teems</label>
                    </div>


                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 padd_l_r">
                        <input name="category_ids" class="radiobtn required" value="5" id="checkbox5" type="checkbox">
                        <label class="connt_flex_middle_text_model" for="checkbox5">Education & Skill Development</label>
                    </div>

                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 padd_l_r">
                        <input name="category_ids" class="radiobtn required" value="6" id="checkbox6" type="checkbox">
                        <label class="connt_flex_middle_text_model"  for="checkbox6">Home Maintenance</label>
                    </div>    
                </div>
                <div class="">&nbsp;</div>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6"> 
                    <fieldset class="form-group ">
                        <select class="input_login form-control" style="-moz-appearance:button;" name="city" id="city"
                         onchange="find_state(this.value)" />
                             <option value="0">Select City</option>
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
                        <!-- <i class="fa fa-caret-down blog_image_icon" aria-hidden="true"></i> -->
                        <span class="err" id="err_city">&nbsp;</span>
                    </fieldset>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <fieldset class="form-group ">
                        <select class="input_login form-control countries1" name="locaity" id="locaity"/>
                            <option value="0">Select Locality</option>
                        </select>
                        <i class="fa fa-caret-down blog_image_icon" aria-hidden="true"></i>
                        <span class="err" id="err_locaity">&nbsp;</span>
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
                               
                                $('#locaity').html(states); 
                             
                            });
                        }
                </script>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <fieldset class="form-group ">
                    </fieldset>
                </div>    
            </div>
            <div class="modal-footer" style="border-top:none;">
                <button style="background-color:#2bcdc1;border:none;" type="button" class="btn btn-primary" id="getcat_ids"> Submit </button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="segment_id">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#2bcdc1;">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true" >&times;</button>
                <h4 class="modal-title cat_mod_title" >Customize Segment</h4>
            </div>
            <div class="modal-body">
                
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <span class="connt_flex_middle_text" style="color:#2bcdc1">Edit Segment</span>
                </div>
                <div class="">&nbsp;</div>
                
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padd_l_r">
                    <div id="modal_sgt_data">
                        <?php foreach ($all_segment_data as $value) { ?>
                            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 padd_l_r">
                                <input name="segment_ids" class="radiobtn required" value="<?php echo $value['ClassSegment']['id'];?>" id="checkbox_seg<?php echo $value['ClassSegment']['id'];?>" type="checkbox">
                                
                                <label class="connt_flex_middle_text_model" for="checkbox_seg<?php echo $value['ClassSegment']['id'];?>">
                                    <?php echo $value['ClassSegment']['segment_name'];?>
                                </label>
                            </div>
                        <?php  } ?>
                    </div>     
                </div>
                <div class="">&nbsp;</div>
            </div>
            <div class="modal-footer" style="border-top:none;">
                <button style="background-color:#2bcdc1;border:none;" type="button" class="btn btn-primary" id="getseg_ids">
                    Submit 
                </button>
            </div>
        </div>
    </div>
</div> 

<div class="modal fade" id="category_id_part">
    <div class="modal-dialog">
        <form action="#" method="post" name="pro_pic" id="pro_pic" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header" style="background-color:#2bcdc1;">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title cat_mod_title">Add Blog Request</h4>
                </div>
                <div class="modal-body">
                <div class="">&nbsp;</div>
                
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6"> 
                    <fieldset>
                        <select multiple="multiple" class="form-control" name="category_model_id[]" id="category_model_id" onchange="show_subcat();">
                            <?php foreach ($category_data as  $value) { ?>
                                <option value="<?php echo $value['Category']['id']; ?>">
                                    <?php  echo $value['Category']['category_name']; ?>
                                </option>
                            <?php } ?>   
                        </select>
                        <span class="err" id="err_category_model_id">&nbsp;</span>  
                    </fieldset>
                </div>
          
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <fieldset class="form-group" id="segment_id_model_again">
                        <div id="segment_id_model_div">
                            <select class="form-control" placeholder="Select Segment" name="segment_id_hide" id="segment_id_hide">
                                <option value="" selected>
                                    Select Segment
                                </option>
                            </select>    
                        </div>   
                        <script type="text/javascript">

                            function show_subcat(){
                                
                                $('#segment_id_hide').hide();                                
                                cat_id = $('#category_model_id').val();
                                $.ajax({
                                      method: "POST",
                                      url: 'addBlogFindSegment1',
                                      data: 'cat_id='+cat_id
                                    }).done(function(res){     

                                    if(res == 1){
                                    
                                       var data = '<select class="form-control" placeholder="Select Segment" name="segment_id_hide" id="segment_id_hide"><option value="" selected>Select Segment </option></select>';

                                        $('#segment_id_model_div').html(data); 
                                       
                                    }else{

                                        $('#segment_id_model_div').html('');    
                                        $('#segment_id_model_div').append(res);

                                        var segment_id_model = $('#segment_id_model').SumoSelect({
                                            selectAll:true, 
                                            placeholder:'Select Segment'    
                                        });
                                    }    
                                }); 
                            }
                        </script>  
                        <span class="err" id="err_segment_id_model">&nbsp;</span>
                    </fieldset>
                    <div>&nbsp;</div>
                    <div>&nbsp;</div>   
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
                    <input class="form-control" name="blog_topic" placeholder="Blog Topic" type="text" id="blog_topic"> 
                    <span class="err" id="err_blog_topic">&nbsp;</span>    
                    </fieldset>
                    <fieldset class="form-group ">
                    <input type="text" class="form-control" name="docs_upload" id="docs_upload" value="" placeholder="Upload your image" readonly>
                    <i class="fa fa-camera blog_image_icon" onclick="ClickUpload();" aria-hidden="true" id="img_click1"></i>
                    <span class="err" id="err_blog_image">&nbsp;</span>        
                    </fieldset>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <fieldset class="form-group">
                        <textarea id="blog_summary" placeholder="Blog Description" class="form-control pc_texta " name="blog_summary" row="5" type="text"></textarea>
                        <span class="err" id="err_blog_summary">&nbsp;</span>
                    </fieldset>
                </div> 
                <div class="modal-footer" style="border-top:none;">
                    <button onclick="docsupload();" style="background-color:#2bcdc1;border:none;" type="button" class="btn btn-primary">Send</button>
                </div>
                </div>
                <div id="hideimge">
                    <input type="file" name="FileUpload" id="FileUpload" class="uploadbox"/>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="post_id">
    <div class="modal-dialog">
        <form action="#" method="post" name="pro_pic_post" id="pro_pic_post" enctype="multipart/form-data">
            <div class="modal-content">
            <div class="modal-header" style="background-color:#2bcdc1;">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title cat_mod_title">Add Post Request</h4>
            </div>
            <div class="modal-body">
                <div class="">&nbsp;</div>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6"> 
                    <fieldset class="form-group">
                        
                        <select multiple="multiple" class="form-control moz_hide" name="category_model_id_post[]" id="category_model_id_post" onchange="show_subcat_post();">
                            <?php foreach ($category_data as  $value) { ?>
                                <option value="<?php echo $value['Category']['id']; ?>">
                                    <?php  echo $value['Category']['category_name']; ?>
                                </option>
                            <?php } ?>   
                        </select>

                        <script type="text/javascript">
                            
                            function show_subcat_post(){

                                $('#segment_id_post_hide').hide();       
                                cat_id = $('#category_model_id_post').val();
                                $.ajax({
                                  method: "POST",
                                  url: 'addBlogFindSegment2',
                                  data: 'cat_id='+cat_id
                                }).done(function(states){
                                    if(res == 1){
                                    
                                       var data = '<select class="form-control" placeholder="Select Segment" name="segment_id_post_hide" id="segment_id_post_hide"><option value="" selected>Select Segment</option></select>';

                                        $('#segment_id_model_post_div').html(data); 
                                       
                                    }else{

                                        $('#segment_id_model_post_div').html('');    
                                        $('#segment_id_model_post_div').append(res);

                                        var segment_id_model_post = $('#segment_id_model_post').SumoSelect({
                                            selectAll:true, 
                                            placeholder:'Select Segment'    
                                        });
                                    }    

                                });
                            }
                        </script>  

                        <span class="err" id="err_category_model_id_post">&nbsp;</span>
                        <div class="">&nbsp;</div>
                    
                    </fieldset>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <fieldset class="form-group">
                        <div id="segment_id_model_post_div">
                            <select class="form-control" placeholder="Select Segment" name="segment_id_post_hide" id="segment_id_post_hide">
                                <option value="" selected>
                                    Select Segment
                                </option>
                            </select>    
                        </div>
                        <span class="err" id="err_segment_id_model_post">&nbsp;</span>
                    </fieldset>
                    <div class="">&nbsp;</div>   
                    <div class="">&nbsp;</div>      
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <fieldset class="form-group">
                        <input class="form-control" name="post_topic" placeholder="Post Topic" type="text" id="post_topic"> 
                        <span class="err" id="err_post_topic">&nbsp;</span>    
                    </fieldset>
                    <fieldset class="form-group">
                        <input type="text" class="form-control" name="docs_upload_post" id="docs_upload_post" placeholder="Upload post image" readonly>
                        <i class="fa fa-camera blog_image_icon" onclick="postClickUpload();" aria-hidden="true"></i>
                        <span class="err" id="err_post_image">&nbsp;</span>        
                    </fieldset>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <fieldset class="form-group">
                        <textarea id="post_summary" placeholder="Post Description" class="form-control pc_texta" name="post_summary" row="5" type="text"></textarea>
                        <span class="err" id="err_post_summary">&nbsp;</span>
                    </fieldset>
                </div> 
                <div class="modal-footer" style="border-top:none;">
                    <button onclick="postdocsupload();" style="background-color:#2bcdc1;border:none;" type="button" class="btn btn-primary">Send</button>
                </div>
            </div>
            <div id="hideimge">
                <input type="file" name="postFileUpload" id="postFileUpload" class="postuploadbox"/>
            </div>
            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="err_msg1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#2bcdc1;">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title cat_mod_title">Error Message</h4>
            </div>
            <div class="modal-body">
                <div class="">&nbsp;</div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <center>
                        <span class="connet_text_hed" style="color:#2bcdc1">
                            You registered as Learner profile , you don't have permission to add activity request.     
                        </span>
                    </center>
                </div>
            </div>
            <div class="modal-footer" style="border-top:none;">
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="err_msg2">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#2bcdc1;">
                 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title cat_mod_title">Error Message</h4>
            </div>
            <div class="modal-body">
                <div class="">&nbsp;</div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <center>
                        <span class="connet_text_hed" style="color:#2bcdc1">
                            You registered as Vendor profile , you don't have permission to add post.     
                        </span>
                    </center>0
                </div>0
            </div>
            <div class="modal-footer" style="border-top:none;">
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="file_type">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#2bcdc1;">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title cat_mod_title">Error Message</h4>
            </div>
            <div class="modal-body">
                <div class="">&nbsp;</div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <center>
                        <span class="connet_text_hed" style="color:#2bcdc1">
                            Please choose .png , .jpg , .jpeg type file only!   
                        </span>
                    </center>
                </div>
            </div>
            <div class="modal-footer" style="border-top:none;">
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="file_success_msg">
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
                          Your Blog has been send for admin approval Successfully. 
                        </span>
                    </center>
                </div>
            </div>
            <div class="modal-footer" style="border-top:none;">
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="file_success_error">
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
                          There is some network issue. Please try again to add blog. 
                        </span>
                    </center>
                </div>
            </div>
            <div class="modal-footer" style="border-top:none;">
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="post_success_msg" data-keyboard="false" data-backdrop="static">
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
                          Your Post has been send successfully. 
                        </span>
                    </center>
                </div>
            </div>
            <div class="modal-footer" style="border-top:none;">
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="file_success_error">
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
                          There is some network issue. Please try again to add Post. 
                        </span>
                    </center>
                </div>
            </div>
            <div class="modal-footer" style="border-top:none;">
            </div>
        </div>
    </div>
</div>  
<!-- end  -->
<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
<script>
    function shwdiv(id){

        var user_id   = "<?php echo $user_id;?>";
        var blog_ids  = parseInt(id);

        $('.loader1').show();
        
        $.post("<?php echo Router::url( '/', true ).'Connect/blogCommentData/'; ?>", { blog_ids : blog_ids, user_id : user_id}, function(res){
            if(res){
                $('.loader1').hide(); 
                $("#comment"+blog_ids).html(res).toggle();      
            }
      });
    }

    function postshwdiv(id){

        var user_id   = "<?php echo $user_id;?>";
        var post_ids  = parseInt(id);

        $('.loader1').show();
        $.post("<?php echo Router::url( '/', true ).'Connect/postCommentData/'; ?>", { post_ids : post_ids, user_id : user_id}, function(res){
            if(res){
                $('.loader1').hide(); 
                $("#postcomment"+post_ids).html(res).toggle();      
            }
      });
    }

    function show_reply_blog(id){

        var user_id   = "<?php echo $user_id;?>";
        var commt_id  = id;

        $('.loader1').show();
        $.post("<?php echo Router::url( '/', true ).'Connect/blogCommentReplyData/'; ?>", { commt_id : commt_id, user_id : user_id}, function(res){
                
            $('.loader1').hide(); 
            $("#reply_blog_"+commt_id).html(res).toggle(); 
      });   
    }

    function show_reply_post(id){

        var user_id   = "<?php echo $user_id;?>";
        var commt_id  = id;

        $('.loader1').show();
        $.post("<?php echo Router::url( '/', true ).'Connect/postCommentReplyData/'; ?>", { commt_id : commt_id, user_id : user_id}, function(res){
                
            $('.loader1').hide(); 
            $("#reply_post_"+commt_id).html(res).toggle(); 
      });   
    }

</script>

<script>
    function getcatid(id){
        var cat_id         =  parseInt(id);
        var userid         = "<?php echo $user_id; ?>";
        var cat_array      = <?php echo json_encode($category_ids);?>;
        
        if(userid == ""){
            for(var i=1;i<7;i++){
                document.getElementById("res"+i).className = "cat_image"; 
            }    
            document.getElementById("res"+cat_id).className = "cat_image1"; 
        }else{
            for(var i = 0; i < cat_array.length; i++) { 
                $('#res'+cat_array[i]).removeClass("cat_image1");
                $('#res'+cat_array[i]).addClass("cat_image");
             }  
                $('#res'+cat_id).removeClass("cat_image");
                $('#res'+cat_id).addClass("cat_image1");
        }   
        
        $('.loader1').show();
       
        get_model_segt_data(id);

        $.post("<?php echo Router::url( '/', true ).'Connect/ChangeCategory/'; ?>", {cat_id : cat_id }, 
        function(res){                   

            var result    = jQuery.parseJSON(res);
            var semrt_id  = result[0];
            
            $('#search_seg').attr('segdata',semrt_id);
            $('#blog_search').attr('segdata',semrt_id);
            $('#post_search').attr('segdata',semrt_id);

            $('.loader1').hide();
            $(".click_change").html(result[1]);

            // loading blog data 
            $.post("<?php echo Router::url( '/', true ).'Connect/segmentdata/'; ?>", {semrt_id : semrt_id }, 
            function(res){                 
                $("#view1_box").html(res);                                            
            });


            // loading Post data 
            $.post("<?php echo Router::url( '/', true ).'Connect/segmentpostdata/'; ?>", {semrt_id : semrt_id }, 
            function(res){                 
                $("#usr1_box").html(res);                                               
            });

        }); 
    }

    function get_model_segt_data(id){

        var cat_id = parseInt(id);
        var userid  = "<?php echo $user_id; ?>";
        
        $('.loader1').show();
        $.post("<?php echo Router::url( '/', true ).'Connect/modelSegmentdata/'; ?>", {cat_id : cat_id , userid : userid }, 
        function(res){                   

           $('.loader1').hide(); 
           $("#modal_sgt_data").html(res);  
                    
        });
    }

   function get_blog_like_id(id){

        var blog_like_id = parseInt(id);
         var user_id     = "<?php echo $user_id; ?>";
          $('.loader1').show();  
          $.post("<?php echo Router::url( '/', true ).'Connect/blogChangeLike/'; ?>", { blog_like_id : blog_like_id , user_id : user_id }, function(res){
              $('.loader1').hide();  
              $('#change_like_count_'+blog_like_id).html(res);
          });               
   }

    function get_post_like_id(id){

        var post_like_id = parseInt(id);
         var user_id     = "<?php echo $user_id; ?>";
          $('.loader1').show();  
          $.post("<?php echo Router::url( '/', true ).'Connect/postChangeLike/'; ?>", { post_like_id : post_like_id , user_id : user_id }, function(res){
              $('.loader1').hide();  
              $('#post_change_like_count_'+post_like_id).html(res);
          });               
    }

</script>
<script>
    function getsemid(id){

        var semrt_id       = parseInt(id);   
        var segt_count     = "<?php echo $sem_data_count; ?>";     
        var seg_array      = <?php echo json_encode($dataArray12);?>;
            
            for(var i = 0; i < seg_array.length; i++) { 
                $('#segt_text'+seg_array[i]).removeClass("connt_flex_middle_text_active");                      
                $('#segt_text'+seg_array[i]).addClass("connt_flex_middle_text");
                $('#segt'+seg_array[i]).removeClass("semgt_connt_bdr_active2");
                $('#segt'+seg_array[i]).addClass("semgt_connt_bdr2");
            }  

            $('#segt_text'+semrt_id).removeClass("connt_flex_middle_text");                      
            $('#segt_text'+semrt_id).addClass("connt_flex_middle_text_active");
            $('#segt'+semrt_id).removeClass("semgt_connt_bdr2");
            $('#segt'+semrt_id).addClass("semgt_connt_bdr_active2");

            $('.loader1').show();
            $.post("<?php echo Router::url( '/', true ).'Connect/segmentdata/'; ?>", {semrt_id : semrt_id },function(res){     
                $('.loader1').hide();              
                $("#view1_box").html(res);
                $('#blog_search').attr('segdata',semrt_id);                                                
            });

            $.post("<?php echo Router::url( '/', true ).'Connect/segmentpostdata/'; ?>", {semrt_id : semrt_id }, 
            function(res){                 
                $("#usr1_box").html(res);
                $('#post_search').attr('segdata',semrt_id);                                                  
            });  
    }
</script>

<script type="text/javascript">
    
    $("#open_model").click(function(event){
        var cats_id   = "<?php echo $cat_ids; ?>";
        var cats = cats_id.split(',');
        for(var i=0;i<cats.length;i++){
            $("#checkbox"+cats[i]).attr('checked',true);
        }
        $("#category_id").modal('show');
    });

    $("#open_model1").click(function(event){
        var seg_array      = <?php echo json_encode($seg_array1);?>;

        for(var i=0;i<seg_array.length;i++){
            $("#checkbox_seg"+seg_array[i]).attr('checked',true);
        }
        $("#segment_id").modal('show');
    });
</script>

<script>
    $(document).ready(function(){

        $('#getcat_ids').click(function(){ 

            var city_id     = $('#city').val(); 
            var locaity     = $('#locaity').val();
           
            var cats_ids = [];
           
            $.each($("input[name='category_ids']:checked"), function(){            
                cats_ids.push($(this).val());
            });

            var  all_cat_ids  =  cats_ids.join(","); 
            var  userid       =  "<?php echo $user_id;?>";
            
            $('.loader1').show();

            $.post("<?php echo Router::url( '/', true ).'Connect/updateCatgory/'; ?>", {city_id : city_id, locaity : locaity,  all_cat_ids : all_cat_ids, userid : userid }, function(res){

                var result=jQuery.parseJSON(res);

                $("#category_id").modal('hide');
                $('.loader1').hide();
                $('#customize_cat_data').html(result[0]);
                $(".click_change").html(result[1]);    
                $("#view1_box").html(result[2]);
                $("#usr1_box").html(result[3]);

                var  cat_id  =  all_cat_ids;

                $.post("<?php echo Router::url( '/', true ).'Connect/modelSegmentdata/'; ?>", {cat_id : cat_id , userid : userid }, function(res){                   

                   $('.loader1').hide(); 
                   $("#modal_sgt_data").html(res);  
                            
                });

            });     
        });

        $('#getseg_ids').click(function(){    

            var userid   = "<?php echo $user_id; ?>";
            var seg_ids = [];

            $.each($("input[name='segment_ids']:checked"), function(){            
                seg_ids.push($(this).val());
            });
           
            var  all_seg_ids  =  seg_ids.join(",");
            var  semrt_id     =  all_seg_ids;  


            $('.loader1').show();
            $.post("<?php echo Router::url( '/', true ).'Connect/updateSegment/'; ?>", {all_seg_ids : all_seg_ids, userid : userid}, function(res){

                    $('.loader1').hide();   
                    $(".click_change").html(res);                                    
                    $("#segment_id").modal('hide');

                    $('#search_seg').attr('segdata',semrt_id);
                    $('#blog_search').attr('segdata',semrt_id);
                    $('#post_search').attr('segdata',semrt_id); 

                    // get blog data 

                    $.post("<?php echo Router::url( '/', true ).'Connect/segmentdata/'; ?>", {semrt_id : semrt_id }, 
                    function(res){                 
                        $("#view1_box").html(res);                                              
                    });

                    // Get Post data  

                    $.post("<?php echo Router::url( '/', true ).'Connect/segmentpostdata/'; ?>", {semrt_id : semrt_id }, 
                        function(res){                 
                        $("#usr1_box").html(res);                                                
                    });  
            }); 
        });      
    }); 
</script>

<script>
    function viewvendorpost(){

       $('#user_back').css('background-color','white');
       $('#user_icon').css('color','#2bcdc1');
       $('#user_text').css('color','#2bcdc1');
       $('#view_back').css('background-color','#2bcdc1');
       $('#view_icon').css('color','white');
       $('#view_text').css('color','white');
       $('#usr_box').hide();
       $('#open_model_view_blog').show();
       $('#open_model_view_post').hide(); 
       $('#view_box').show();
   
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
       $('#open_model_view_blog').hide();
       $('#open_model_view_post').show(); 
       $('#usr_box').show();

    }
</script>

<script type="text/javascript">

    $("#open_model_view_blog").click(function(event){
        $("#category_id_part").modal('show');    
    });

    $("#open_model_view_post").click(function(event){
        $("#post_id").modal('show');
    });

</script>


<script>
    function ClickUpload() {   
        $("#FileUpload").trigger('click');
    }

    function postClickUpload() {   
        $("#postFileUpload").trigger('click');
    }
</script>

<script>
    jQuery('.postuploadbox').change(function() {
          
        var fp = $(".postuploadbox");
        var lg = fp[0]
        .files.length; // get length
        var items = fp[0].files;
        var fileName = items[0].name;
        var fileSize = items[0].size; // get file size 
        var fileType = items[0].type;
        var res     = fileName.split(".");
        var filext  = res[1];

        $('#docs_upload_post').val(fileName);
        $('#docs_upload_post').focus00();

        if(fileSize > 2097152){
           $('#err_post_image').html('Please choose less than 2 mb file!');
           $('#docs_upload_post').val('');
           return false;
        }else{
           $('#err_post_image').html('&nbsp;'); 
        }

        if(filext != 'png' && filext != 'jpeg' && filext != 'jpg'){
            $('#err_post_image').html('Please choose .png , .jpg , .jpeg type file only!');
            $('#docs_upload_post').val('');
            return false;
        }else{
            $('#err_post_image').html('&nbsp;'); 
        }

    });

    jQuery('.uploadbox').change(function() {
          
        var fp = $(".uploadbox");
        var lg = fp[0]
        .files.length; // get length
        var items = fp[0].files;
        var fileName = items[0].name;
        var fileSize = items[0].size; // get file size 
        var fileType = items[0].type;
        var res     = fileName.split(".");
        var filext  = res[1];

        $('#docs_upload').val(fileName);
        $('#docs_upload').focus();

        if(fileSize > 2097152){
           $('#err_blog_image').html('Please choose less than 2 mb file!');
           $('#docs_upload').val('');
           return false;
        }else{
           $('#err_blog_image').html('&nbsp;'); 
        }

        if(filext != 'png' && filext != 'jpeg' && filext != 'jpg'){
            $('#err_blog_image').html('Please choose .png , .jpg , .jpeg type file only!');
            $('#docs_upload').val('');
            return false;
        }else{
            $('#err_blog_image').html('&nbsp;'); 
        }

    });
</script>

<script>

    function postdocsupload(){   

        var category_id            =   $('#category_model_id_post').val();
        var segment_id             =   $('#segment_id_model_post').val(); 
        var post_topic             =   $('#post_topic').val();
        var post_summary           =   $('#post_summary').val();
        var post_image             =   $('#docs_upload_post').val(); 

        if(category_id == null){
            $('#err_category_model_id_post').html('Please Select the Category.');            
            $("#category_model_id_post").focus();
            return false;
        }else{
            $('#err_category_model_id_post').html('&nbsp;');             
        }

        if(segment_id == null){
            $('#err_segment_id_model_post').html('Please Select the Segment.');            
            $("#segment_id_model_post").focus();
            return false;
        }else{
            $('#err_segment_id_model_post').html('&nbsp;');             
        }

        if(post_topic == ""){
            $('#err_post_topic').html('Please enter the Post Name.');            
            $("#post_topic").focus();
            return false;
        }else{
            $('#err_post_topic').html('&nbsp;');             
        }

         if(post_summary == ""){
            $('#err_post_summary').html('Please enter the Post Description.');            
            $("#post_summary").focus();
            return false;
        }else{
            $('#err_post_summary').html('&nbsp;');             
        }
        
        
        var formData = $(this).serializeArray();        
        var WEBURL   ="<?php echo Router::url( '/', true ).'Connect/submitPost/'; ?>";
            
            $.ajax({ 
               type: 'POST',
               url: WEBURL,
               data: new FormData($('#pro_pic_post')[0]),
               processData: false,
               contentType: false,  
               success: function(res){              
                  if(res == 1){                
                        $("#post_id").modal('toggle');
                        $("#post_success_msg").modal('toggle'); 
                    }else{
                        $("#post_id").modal('toggle');
                        $("#post_success_error").modal('toggle');
                    }
                }, 
            });
            return false;
    }



    function docsupload(){   
       
        var category_id            =   $('#category_model_id').val();
        var segment_id             =   $('#segment_id_model').val(); 
        var blog_topic             =   $('#blog_topic').val();
        var blog_summary           =   $('#blog_summary').val();
        var blog_image             =   $('#docs_upload').val(); 
        
        if(category_id == null){
            $('#err_category_model_id').html('Please Select the Category.');            
            $("#category_model_id").focus();
            return false;
        }else{
            $('#err_category_model_id').html('&nbsp;');             
        }

        if(segment_id == null){
            $('#err_segment_id_model').html('Please Select the Segment.');            
            $("#segment_id_model").focus();
            return false;
        }else{
            $('#err_segment_id_model').html('&nbsp;');             
        }

        if(blog_topic == ""){
            $('#err_blog_topic').html('Please enter the Blog Name.');            
            $("#blog_topic").focus();
            return false;
        }else{
            $('#err_blog_topic').html('&nbsp;');             
        }

        if(blog_summary == ""){
            $('#err_blog_summary').html('Please enter the Blog Description.');            
            $("#blog_summary").focus();
            return false;
        }else{
            $('#err_blog_summary').html('&nbsp;');             
        }
    

        var formData = $(this).serializeArray();        
        var WEBURL   ="<?php echo Router::url( '/', true ).'Connect/submitBlog'; ?>";

            $.ajax({ 
               type: 'POST',
               url: WEBURL,
               data: new FormData($('#pro_pic')[0]),
               processData: false,
               contentType: false,  
               success: function(res){              
                  if(res == 1){                
                        
                        $("#category_id_part").modal('toggle');
                        $("#file_success_msg").modal('toggle'); 
                    
                    }else{
                        
                        $("#category_id_part").modal('toggle');
                        $("#file_success_error").modal('toggle');
                       
                    }
                }, 
            });
            return false;
    }
</script>

<script>
    function post_submit(id){
      
      var blog_id     = parseInt(id);
      var user_id     = "<?php echo $user_id; ?>";
      var comment     = $('#acty_cmmt_'+blog_id).val();
      
    if(comment == ""){     
        
        $('#err_acty_cmmt_'+blog_id).html('Please enter comment.');            
        $('#acty_cmmt_'+blog_id).focus();    
            return false;
        }else{      
          $('#err_acty_cmmt_'+blog_id).html('&nbsp;');             
        }

      $('.loader1').show();  
      $.post("<?php echo Router::url( '/', true ).'Connect/blogCommtPost/'; ?>", { blog_id : blog_id , user_id : user_id , comment : comment }, function(res){

            $('.loader1').hide();  
            var result=jQuery.parseJSON(res);
            $('#ajxa_attch_'+blog_id).html(result[1]);
            $('#comment'+blog_id).html(result[0]);
      }); 
    } 
</script>
<script>
    function post_cmmt_submit(id){
      
      var post_id     = parseInt(id);
      var user_id     = "<?php echo $user_id; ?>";
      var comment     = $('#post_cmmt_'+post_id).val();
      
      if(comment == ""){     
        $('#err_post_cmmt_'+post_id).html('Please enter comment.');            
        $('#post_cmmt_'+post_id).focus();    
            return false;
        }else{      
          $('#err_acty_cmmt_'+post_id).html('&nbsp;');             
        }

       $('.loader1').show();  

      $.post("<?php echo Router::url( '/', true ).'Connect/postCommtPost/'; ?>", { post_id : post_id , user_id : user_id , comment : comment }, function(res){

        $('.loader1').hide();  
            var result=jQuery.parseJSON(res);

            $('#post_ajxa_attch_'+post_id).html(result[1]);
            $('#postcomment'+post_id).html(result[0]);
      }); 
    } 
</script>

<script>
    
    $("#search_seg").keyup(function(){
        
        var userid     = "<?php echo $user_id; ?>";
        var search_seg = $('#search_seg').val();
        var segt_ids   = $('#search_seg').attr('segdata');

        $('.loader1').show(); 
        $.post("<?php echo Router::url( '/', true ).'Connect/searchConnectSegment/'; ?>", {segt_ids : segt_ids,search_seg : search_seg },function(res){
            
            var result    = jQuery.parseJSON(res);
            var semrt_id  = result[0];

            $(".click_change").html(result[1]);                                    
            
            // loading blog data 
            $.post("<?php echo Router::url( '/', true ).'Connect/segmentdata/'; ?>", {semrt_id : semrt_id }, 
            function(res){                 
                $('.loader1').hide();
                $("#view1_box").html(res);                                            
            
            });

            // loading Post data 
            $.post("<?php echo Router::url( '/', true ).'Connect/segmentpostdata/'; ?>", {semrt_id : semrt_id }, 
            function(res){                 
                $('.loader1').hide();
                $("#usr1_box").html(res);                                               
            });
        });  
    }); 

    function report_blog(id){

        var userid      = "<?php echo $user_id; ?>";
        var report_id   = id;
        $.post("<?php echo Router::url( '/', true ).'Connect/reportBlog/'; ?>", { report_id : report_id , userid : userid}, function(res){
          if(res == 2){
            alert("Your already report this Blog.");
          }else{
            $("#report_check_"+report_id).html(res); 
          }     
        });  
    } 
</script>

<script type="text/javascript">
    
    $("#blog_search").keyup(function(){         

        var userid         = "<?php echo $user_id;?>";
        var segt_ids       = $('#blog_search').attr('segdata');     
        var search_string  = $("#blog_search").val();            
        $.post("<?php echo Router::url( '/', true ).'Connect/searchConnectBlog/'; ?>", {search_string: search_string, userid: userid ,segt_ids : segt_ids},function(response){

            $("#view1_box").html(response);     

        }); 
    });

</script>


<script type="text/javascript">
    
    $("#post_search").keyup(function(){         

        var userid        = "<?php echo $user_id; ?>";
        var segt_ids      = $('#post_search').attr('segdata'); 
        var search_string = $("#post_search").val();            
        $.post("<?php echo Router::url( '/', true ).'Connect/searchConnectPost/'; ?>", {search_string: search_string, userid: userid ,segt_ids : segt_ids},function(response){
                            
           $("#usr1_box").html(response);     
         
        }); 
    
    });
</script>

<!--  reply Section  -->

<script>
    function blog_cmt_reply_submit(id){
      
      var commt_id     = id;
      var user_id     = "<?php echo $user_id; ?>";
      var reply     = $('#blog_commt_replies_'+commt_id).val();
      
      if(reply == ""){     
        
        $('#err_blog_commt_replies_'+commt_id).html('Please enter comment.');            
        $('#blog_commt_replies_'+commt_id).focus();    
            return false;
        }else{      
          $('#err_blog_commt_replies_'+commt_id).html('&nbsp;');             
        }

        $('.loader1').show();  

        $.post("<?php echo Router::url( '/', true ).'Connect/blogCommtReply/'; ?>", { commt_id : commt_id , user_id : user_id , reply : reply },function(res){

            $('.loader1').hide();  
            $('#blog_reply_data_'+commt_id).html(res);
        }); 
    } 

    function post_cmt_reply_submit(id){
      
      var commt_id     = id;
      var user_id      = "<?php echo $user_id; ?>";
      var reply        = $('#post_commt_replies_'+commt_id).val();
      
      if(reply == ""){     
        
        $('#err_post_commt_replies_'+commt_id).html('Please enter comment.');            
        $('#post_commt_replies_'+commt_id).focus();    
            return false;
        }else{      
          $('#err_post_commt_replies_'+commt_id).html('&nbsp;');             
        }

        $('.loader1').show();  
        
        $.post("<?php echo Router::url( '/', true ).'Connect/postCommtReply/'; ?>", { commt_id : commt_id , user_id : user_id , reply : reply },function(res){
            $('.loader1').hide();  
            $('#post_reply_data_'+commt_id).html(res);
        });
    } 
</script>

<script type="text/javascript">
    $(document).ready(function(){
        
        window.category_model_id = $('#category_model_id').SumoSelect({
            selectAll:true,
            placeholder:'Select Category'
        });

        window.category_model_id_post = $('#category_model_id_post').SumoSelect({
            selectAll:true,
            placeholder:'Select Category'
        });
    });    
</script>

