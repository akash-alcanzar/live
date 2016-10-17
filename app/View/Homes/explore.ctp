<style>
#click_tab102{
	background:#000873;
	border-radius:5px;
}
/*#people_near:active{
	background:#000873;
	border-radius:5px;
}
#group:active{
	background:#000873;
	border-radius:5px;
}*/
#marker-tooltip {
   
    position:absolute;
    width: 300px;
    height: 200px;
    background-color: #ccc;
    margin: 15px;
     overflow-y: auto;
}
#marker-tooltip1 {
   
   /* position:absolute;
    width: 300px;
    height: 600px;
    background-color: #ccc;
    margin: 15px;
    overflow-y: auto;*/
}
</style>
<?php echo $this->Html->css('front/geolocation');?>
<?php echo $this->Html->css('front/range');?>

<script src="http://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<?php echo $this->Html->script('front/jquery.geocomplete');?>
<?php //echo $this->Html->script('front/range');?>

<!-- <div class="col-md-12 col-sm-12 col-xs-12 single-slide_br banner_six">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <center>
        <a href="#" class="more_vw">And Many More</a>
      </center>
    </div>
</div> -->
<style type="text/css">
    .two_seg{border-bottom:1px solid #00c3c1;}
    .dropdown:hover .dropdown-menu{display: block;}
    .cur{cursor: pointer;}
    #people_near{border-bottom:2px solid #000;}
    #click_tab102{border-bottom:2px solid #00cdc6;}
    #explore{cursor:pointer;}
    .active_class{color:black;text-decoration:underline;}
    
</style>
<div class="col-md-12 col-sm-12 col-xs-12 padd_l_r">
    <div class="col-md-12 col-sm-12 col-xs-12 padd_l_r">
        <img src="<?php echo HTTP_ROOT;?>/img/profile_img/explore_ban.jpg" class="img-responsive" alt="Explore">
    </div>
</div>  
<div class="col-xs-12 col-sm-12  col-md-12 col-lg-offset-1 col-lg-10" >
    <div class="container-fluid  padd_l_r" style="">            
        <div class="col-md-12 col-sm-12 col-xs-12" style="">  </div>   
        <div class="col-md-12 col-sm-12 col-xs-12 padd_l_r br_srch_act">
            <div class="col-md-7 col-sm-7 col-xs-6 left-box-content" style="border-radius:5px;">
                <div class="col-md-4 col-sm-3 col-xs-12 padd_l_r find-near-div find-near-field  cur" id="click_tab102">
                    <center>
                    <div class="image1"></div>
                      <img class="globgreen" src="<?php echo HTTP_ROOT?>/img/glob.png">
                        <!--  <img class="globblack" src="<?php echo HTTP_ROOT?>/img/globblack.png">-->
                        <span id="clr01">Find classes near you </span>
                    </center>
                    <!-- <hr class="near-border nearr-border active" id="hr1"> -->
                    <center>
                        <img class="caret_img24" id="carrot" src="<?php echo HTTP_ROOT;?>/img/caret.png" style=" margin-top: 21px;  width: 10px;">
                    </center>
                </div>

                <div class="col-md-4 col-sm-4 col-xs-12 padd_l_r find-people-near-div find-near-div find-people-near find-near-field  cur" id="people_near">
                    <center>
                    <div id="image2"></div>
                    <!--  <img class="handgreen" src="<?php echo HTTP_ROOT?>/img/handgreen.png">-->
                      <img class="handblack" src="<?php echo HTTP_ROOT?>/img/handblack.png">
                        
                        <span id="clr02">Find people near you </span>
                    </center>
                    <!-- <hr class="near-border near-border1 nearr-border1" id="hr2"> -->
                    
                    <center>
                        <img class="caret_img24" src="<?php echo HTTP_ROOT;?>/img/caret.png" style=" margin-top: 21px;  width: 10px;display:none;" id="carrot1">
                    </center>
                </div> 

                <div class="col-md-4 col-sm-4 col-xs-12 padd_l_r find-people-near find-people-near-div-last find-near-field" id="group">
                    <center>
                    <div id="image3"></div>
                    <img class="manblack" src="<?php echo HTTP_ROOT?>/img/manblack.png">
                         <!--   <img class="mangreen" src="<?php echo HTTP_ROOT?>/img/mangreen.png">-->
                        <span>Find groups near you </span>
                    </center>
                    <hr class="near-border nearr-border2" style="margin-top:29px;">
                    <center>
                        <img class="caret-border-img2" src="<?php echo HTTP_ROOT;?>/img/caret.png">
                    </center>
                </div>
            </div>
            <div class="col-md-5 col-sm-5 col-xs-6 padd_l_r search-box-content">
                    <div class="input-group srch_adon_brd">

                        <input type="text" id="class_search" class="form-control br_inpt_radius" placeholder="Search for short classes &  activities">
                        <input type="text" id="class_search1" class="form-control br_inpt_radius" placeholder="Search for short classes &  activities" style="display:none;">
                        
                        <span class="input-group-btn">
                            <button class="btn btn-default br_inpt_radius srch_adon" type="button" id="postSearch">Search</button>
                            <button class="btn btn-default br_inpt_radius srch_adon" type="button" id="postSearch1" style="display:none;">Search</button>
                        </span>
                    </div>
                </div>  
        </div>
    </div>
</div>  






<div class="col-xs-12 col-sm-12  col-md-12 col-lg-offset-1 col-lg-10">
   
    
    <div class="container-fluid  padd_l_r " id="tab1" style=""> 

            
            <!-- Furry Teddy Bear -->

            <!-- *************tab head*************** -->
            <!--==================================================First Tab==================================================-->
            <div class="col-md-12 col-sm-12 col-xs-12 tab_head sr_2605_03_padding nav nav-tabs list_220 padd_l_r" style="">
                <div class="col-xs-12 col-sm-12 sr_2605_03_padding padd_l_r">
                    <div class="col-md-2 col-sm-2 col-xs-3 rec_health padd_l_r one_seg12" id="explore">EXPLORE </div>
                    <div class="col-md-10 col-sm-10 col-xs-9 sr_2605_03_padding  sr_2705_bdr3 one_seg12 padd_l_r">
                        <div class="row">
                           <!-- <?php //foreach ($category as  $res) { ?>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6 padd_l_r two_seg seg_brd_tp_class_segment" id="<?php// echo $res['Category']['id'];?>" style="background-color:#<?php //echo $res['Category']['color_code'];?>;">
                                    <a style="color:#fff;"><?php //echo $res['Category']['category_name']; ?></a>
                                </div> 
                            <?php // } ?>    -->
                            <?php foreach ($category as  $res) { ?>
                            <div id="<?php echo $idd=$res['Category']['id'];?>"> 
							<div class=""></div>
                            <?php if($idd=="1"){?> 
                                    <div class="fun col-lg-4 col-md-4 col-sm-4 col-xs-6 padd_l_r two_seg seg_brd_tp_class_segment">
                                        <a style="color:#fff;"><?php echo $res['Category']['category_name']; ?></a>
                                        <img src="<?php echo HTTP_ROOT;?>/img/explore/fun.png" style="float:right;padding:0px;" />
                                    </div>
							 <?php } ?>
                             <?php if($idd=="2"){?> 
                                    <div class="informative col-lg-4 col-md-4 col-sm-4 col-xs-6 padd_l_r two_seg seg_brd_tp_class_segment">
                                        <a style="color:#fff;"><?php echo $res['Category']['category_name']; ?></a>
                                        <img src="<?php echo HTTP_ROOT;?>/img/explore/informative.png" style="float:right;padding:0px;" />
                                    </div>
							 <?php } ?>
                             <?php if($idd=="3"){?> 
                                    <div class="health col-lg-4 col-md-4 col-sm-4 col-xs-6 padd_l_r two_seg seg_brd_tp_class_segment">
                                        <a style="color:#fff;"><?php echo $res['Category']['category_name']; ?></a>
                                        <img src="<?php echo HTTP_ROOT;?>/img/explore/health.png" style="float:right;padding:0px;" />
                                    </div>
							 <?php } ?>
                             <?php if($idd=="4"){?> 
                                    <div class="kids col-lg-4 col-md-4 col-sm-4 col-xs-6 padd_l_r two_seg seg_brd_tp_class_segment">
                                        <a style="color:#fff;"><?php echo $res['Category']['category_name']; ?></a>
                                        <img src="<?php echo HTTP_ROOT;?>/img/explore/kids.png" style="float:right;padding:0px;" />
                                    </div>
							 <?php } ?>
                             <?php if($idd=="5"){?> 
                                    <div class="education col-lg-4 col-md-4 col-sm-4 col-xs-6 padd_l_r two_seg seg_brd_tp_class_segment">
                                        <a style="color:#fff;"><?php echo $res['Category']['category_name']; ?></a>
                                        <img src="<?php echo HTTP_ROOT;?>/img/explore/education.png" style="float:right;padding:0px;" />
                                    </div>
							 <?php } ?>
                             <?php if($idd=="6"){?> 
                                    <div class="home col-lg-4 col-md-4 col-sm-4 col-xs-6 padd_l_r two_seg seg_brd_tp_class_segment">
                                        <a style="color:#fff;"><?php echo $res['Category']['category_name']; ?></a>
                                        <img src="<?php echo HTTP_ROOT;?>/img/explore/home.png" style="float:right;padding:0px;" />
                                    </div>
							 <?php } ?>
                                     
                                   
                              
                                
                                <?php //echo $res['Category']['color_code'];?>
                                </div> 
                                <?php  } ?>    
                        </div>
                    </div>
                </div>
            </div>
    <!-- </div> -->
    <div class="col-md-12 col-sm-12 col-xs-12 padd_l_r br_srch_act">
        <div class="col-md-3 col-sm-3 col-xs-12  padd_l_r location-box-seerch" >
            <form class="form-search" method="post" id="s" action="/">
                <div class="input-append">
                    <input type="text" class="input-medium search-query-box" name="s" id="geocomplete" placeholder="Search" value="" style="width:100%;">
                    <input type="hidden" name="submit" value="submit" >
                </div>
            </form>
        </div>
        <div class="col-md-3 col-sm-3 col-xs-12 change-box-btn">
            <button type="button" class="btn btn-success locality-button" id="location_search">
                <span>Change Locality & Search</span>
            </button>
        </div>
        <div class="col-md-2 col-sm-2 col-xs-12 yes-box-seerch" style="padding-right:0px;">
            <form class="form-search" method="post" id="s" action="/">
                <div class="input-append">
                    <input type="hidden" name="submit" value="submit">
                </div>
            </form>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-12 gps-box-div">
            <button type="button" class="btn btn-success locality-button" id="gps"><span>Use GPS to Set exact Location & Search</span></button>
        </div>
    </div>

    <!-- *************tab head*************** -->
    <div class="col-md-12 col-sm-12 col-xs-12 "> &nbsp; </div>
    <div class="col-xs-12 col-sm-12" style="margin: 15px 0px 0px;">
  <center>
    <span style="font-size: 16px; color: gray; font-weight: bold;">Distance&nbsp;:</span>
    <span style="font-size: 16px; color: gray; font-weight: bold;" id="dist">0&nbsp;KM</span>
  </center>
</div>
 <input type="range" id="ran" min="0" max="100" style="margin-top:15px;"data-rangeSlider style="background-color:green;padding-top:5px;">

    <!-- google map code -->
    <div class="col-md-12 col-sm-12 col-xs-12 sr_2605_03 padd_l_r map11"> 
    	<div class="col-md-8 col-sm-8 col-xs-8">
          <div id="googleMap" class="google-map-div" style="width:100%;height:600px;"></div>
          <div id="marker-tooltip" style="display:none;"></div>
          </div>
          <div class="col-md-4 col-sm-4 col-xs-4 pad_all">
          <div class="row">
          	
           <div id="marker-tooltip1" style="display:none;"></div>
          </div>
          <div style="margin-bottom:0px;">
            	<div class="row">
	          			<img src="<?php echo HTTP_ROOT;?>/img/explore/fun.png"/>
                        <label>Fun & Recreation</label>
                    </div>
                    <div class="row">
                      	<img src="<?php echo HTTP_ROOT;?>/img/explore/informative.png"/>
                    	<label>Informative & Motivational</label>       
                    </div>
                    <div class="row"> 
                    	<img src="<?php echo HTTP_ROOT;?>/img/explore/health.png"/> 
                        <label>Health & Fitness</label>  
                        		
                     </div>
                
                     <div class="row">
	                    <img src="<?php echo HTTP_ROOT;?>/img/explore/kids.png"/>
                        <label>Kids & Teens</label>
                        
                     </div>
                     <div class="row"> 
                        <img src="<?php echo HTTP_ROOT;?>/img/explore/education.png"/> 
                        <label>Education & Skill Development</label>  
                     </div>
                     <div class="row">   
                        <img src="<?php echo HTTP_ROOT;?>/img/explore/home.png"/>
                        <label>Home Maintenance</label>
                     </div>
                     </div>
            
          </div>
    </div> 

   <div class="col-md-12 col-sm-12 col-xs-12 "> &nbsp; </div>
      <!-- google map code / -->
      <!-- <div class="col-md-12 col-sm-12 col-xs-12 sr_0106_div_a_class"> 
          <center><button type="botton" class="btn btn-primary sr_0106_gift_a_class">Gift A Class</button></center>
      </div> -->
    
</div>

<!-- 2nd code start -->

<div class="container-fluid  padd_l_r " style="display:none" id="tab2"> 

            
            <!-- Furry Teddy Bear -->

            <!-- *************tab head*************** -->
            <!--==================================================First Tab==================================================-->
            <div class="col-md-12 col-sm-12 col-xs-12 tab_head sr_2605_03_padding nav nav-tabs list_220 padd_l_r" style="">
                <div class="col-xs-12 col-sm-12 sr_2605_03_padding padd_l_r">
                    <div class="col-md-2 col-sm-2 col-xs-3 rec_health padd_l_r one_seg12">EXPLORE</div>
                    <div class="col-md-10 col-sm-10 col-xs-9 sr_2605_03_padding  sr_2705_bdr3 one_seg12 padd_l_r">
                        <div class="row">
                           <!-- <?php //foreach ($category as  $res) { ?>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6 padd_l_r two_seg seg_brd_tp_class_segment1" 
                                id="<?php //echo $res['Category']['id'];?>" style="background-color:#<?php //echo $res['Category']['color_code'];?>">
                                    <a style="color:#fff;"><?php //echo $res['Category']['category_name']; ?></a>
                                </div> 
                            <?php  //} ?>    -->
                            <?php foreach ($category as  $res) { ?>
							<div class="col-lg-4 col-md-4 col-sm-4 col-xs-6 padd_l_r two_seg seg_brd_tp_class_segment" id="<?php echo $res['Category']['id'];?>" >
                                <a style="color:#fff;"><?php echo $res['Category']['category_name']; ?></a>
                                <?php if($res['Category']['category_name']=="Fun & Recreation"){?>
                                <img src="<?php echo HTTP_ROOT;?>/img/explore/fun.png" style="float:right;padding:0px;" />
                                <?php } elseif($res['Category']['category_name']=="Informative & Motivational"){?>
                                <img src="<?php echo HTTP_ROOT;?>/img/explore/informative.png" style="float:right;" />
                                <?php } elseif($res['Category']['category_name']=="Health & Fitness"){?>
                                <img src="<?php echo HTTP_ROOT;?>/img/explore/health.png" style="float:right;" />
                                <?php } elseif($res['Category']['category_name']=="Kids & Teens"){?>
                                <img src="<?php echo HTTP_ROOT;?>/img/explore/kids.png" style="float:right;" />
                                <?php } elseif($res['Category']['category_name']=="Education & Skill Development"){?>
                                <img src="<?php echo HTTP_ROOT;?>/img/explore/education.png" style="float:right;" />
                                <?php } elseif($res['Category']['category_name']=="Home Maintenance"){?>
                                <img src="<?php echo HTTP_ROOT;?>/img/explore/home.png" style="float:right;" />
                                <?php } ?>
                                
                                <?php //echo $res['Category']['color_code'];?>
                                </div> 
                                <?php  } ?>    
                        </div>
                    </div>
                </div>
            </div>
    <!-- </div> -->
    <div class="col-md-12 col-sm-12 col-xs-12 padd_l_r br_srch_act">
        <div class="col-md-3 col-sm-3 col-xs-12  padd_l_r location-box-seerch" >
            <form class="form-search" method="post" id="s" action="/">
                <div class="input-append">
                    <input type="text" class="input-medium search-query-box" name="s" id="geocomplete1" placeholder="Search" value="" style="width:100%;">
                    <input type="hidden" name="submit" value="submit" >
                </div>
            </form>
        </div>
        <div class="col-md-3 col-sm-3 col-xs-12 change-box-btn">
            <button type="button" class="btn btn-success locality-button" id="location_search1">
                <span>Change Locality & Search</span>
            </button>
        </div>
        <div class="col-md-2 col-sm-2 col-xs-12 yes-box-seerch" style="padding-right:0px;">
            <form class="form-search" method="post" id="s" action="/">
                <div class="input-append">
                    <input type="hidden" name="submit" value="submit">
                </div>
            </form>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-12 gps-box-div">
            <button type="button" class="btn btn-success locality-button" id="gps1"><span>Use GPS to Set exact Location & Search</span></button>
        </div>
    </div>
    <!-- *************tab head*************** -->
    <div class="col-md-12 col-sm-12 col-xs-12 "> &nbsp; </div>
    <div class="col-xs-12 col-sm-12" style="margin: 15px 0px 0px;">
  <center>
    <span style="font-size: 16px; color: gray; font-weight: bold;">Distance&nbsp;:</span>
    <span style="font-size: 16px; color: gray; font-weight: bold;" id="dist1">0&nbsp;KM</span>
  </center>
</div>
 <input type="range" id="ran1" min="0" max="100" style="margin-top:15px;"data-rangeSlider style="background-color:green;padding-top:5px;">
    <!-- google map code -->
    <div class="col-md-12 col-sm-12 col-xs-12 sr_2605_03 padd_l_r map11"> 
          <div id="googleMap1" class="google-map-div" style="width:100%;height:600px;overflow:auto;"></div>
    </div> 
    <div class="col-md-12 col-sm-12 col-xs-12 "> &nbsp; </div>
    <input type="hidden" name="lat" id="latitude" value="0">
    <input type="hidden" name="lng" id="longitude" value="0">
     <input type="hidden" name="lat1" id="latitude1" value="0">
    <input type="hidden" name="lng1" id="longitude1" value="0">
     <input type="hidden" name="zoom" id="zoom" value="0"> 
    
</div>
        </div>
     


<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true&libraries=places&key=AIzaSyBTWFXzW0kk-GOyASPoip3CXq02xbhr_z4"></script> 

 <script>
 $('#gps').click(function(){
     getLocation();
  });
  $('#gps1').click(function(){
    
     getLocation();
  });
  var latitude=0;
  var longitude=0; 
 $(function(){
        
        $("#geocomplete").geocomplete()
         $("#geocomplete1").geocomplete() 
        
      });
 $(document).ready(function(){
$('#ran').val('10');
$('#ran1').val('10');
 $('#dist').text($('#ran').val()+" KM");
 $('#dist1').text($('#ran1').val()+" KM");
 $('#ran').attr('disabled',true);
 getLocation();
  var marker;
          
    var locations = [];



    
  });
/*===================================================End tab1=====================================================*/
  /*===================================Tab2==========================================================*/
   $('#location_search1').click(function(){
    $('.loader').show();
    var distance=$('#ran1').val();
    var address=$('#geocomplete1').val();
    var search=$('#class_search1').val();
    if(search==''){
        search='0';
    }
    $('#ran1').attr('disabled',false);
   
    $.ajax({
       url: '<?php echo HTTP_ROOT;?>/Homes/findByAddressClasss/'+btoa(address)+"/"+distance+'/'+search,
        type: 'post',
         success: function(output) {

            $('.loader').hide();
             $('#googleMap1').html('');
          $('#googleMap1').html(output);
            
        }
    });
});
/*======================================End ============================================================*/
/*=======================================Tab1===========================================================*/
  $('#location_search').click(function(){

    $('.loader').show();
    $('#googleMap').html('');
    var distance=$('#ran').val();
    var search=$('#class_search').val();
    if(search==''){
        search=0;
    }
    var address=$('#geocomplete').val();
    $.ajax({
       url: '<?php echo HTTP_ROOT;?>/Homes/findByAddress/'+btoa(address)+"/"+distance+'/'+search,
        type: 'post',
         success: function(output) {

            $('.loader').hide();


            var result=jQuery.parseJSON(output);
            console.log(result);
            if(result.found=='0'){
              $('#ran').attr('disabled',false);
     var map = new google.maps.Map(document.getElementById('googleMap'), {
      zoom: 12,
      center: new google.maps.LatLng(result.latitude,result.longitude),
     
       
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });

            }
            else{
          
          
               $('#ran').attr('disabled',false);
              locations_str = '';
              locations = new Array();
              $.each(result,function(e,temp_obj){
                         
                var location = [];
                location.push(temp_obj.bg_vendor_classes.class_topic);
                location.push(temp_obj.bg_vendor_classe_location_details.latitude);
                location.push(temp_obj.bg_vendor_classe_location_details.longitude);
                location.push(temp_obj.bg_categories.color_code);
                 location.push(temp_obj.bg_vendor_classes.ide);

                locations.push(location);
                console.log(location);
                // locations_str += "['"+temp_obj.bg_vendor_classes.class_topic+"', "+temp_obj.bg_vendor_classes.latitude+", "+temp_obj.bg_vendor_classes.longitude+", "+(++i)+"],";
              });
     var map = new google.maps.Map(document.getElementById('googleMap'), {
      zoom:12,
      center: new google.maps.LatLng(locations[0][1], locations[0][2]),
     
       
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    var infowindow = new google.maps.InfoWindow();

    var marker, i;

    for (i = 0; i < locations.length; i++) {  
      var pinColor = locations[i][3];
var pinImage = new google.maps.MarkerImage("http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=%E2%80%A2|" + pinColor,
    new google.maps.Size(21, 34),
    new google.maps.Point(0,0),
    new google.maps.Point(10, 34));
var pinShadow = new google.maps.MarkerImage("http://chart.apis.google.com/chart?chst=d_map_pin_shadow",
    new google.maps.Size(40, 37),
    new google.maps.Point(0, 0),
    new google.maps.Point(12, 35));
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
        map: map,
        map: map,
        icon: pinImage,
        scale: 20,
        shadow: pinShadow,
        url:'<?php echo HTTP_ROOT;?>/classes/'+btoa(locations[i][4]),
        title:locations[i][0]
        
      });
google.maps.event.addListener(marker, 'mouseover', function (event) {
          var latitude = this.position.lat();
    var longitude = this.position.lng();
    var point = fromLatLngToPoint(this.getPosition(),map);
    $('.loader').show();
          $.ajax({ 
        url: '<?php echo HTTP_ROOT;?>/Homes/sameLocationClass/'+latitude.toFixed(6)+'/'+longitude.toFixed(6),
        type: 'post',
         success: function(output) {
        $('.loader').hide();
            if(output=='0'){
              $('#marker-tooltip').hide();
			      $('#marker-tooltip1').hide();
            }
            else{

       $('#marker-tooltip').html(output).css({
            'left': point.x,
                'top': point.y
        }).show();
		 $('#marker-tooltip1').html(output).css({
            
        }).show();
         }
     }
     });
      
       
    });
 google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          
           window.location.href = this.url;
          infowindow.setContent(locations[i][0]);
          infowindow.open(map, marker);
        }
      })(marker, i));
    }
          
           
       }  
       }
       });


  //alert('hii');
  


});
 

 function getLocation() {
     
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
        showMap();
    } else { 

        
         //alert('hii');
        x.innerHTML = "Geolocation is not supported by this browser.";
        
    }
}

function showPosition(position) {
  
 latitude =position.coords.latitude;
 longitude=position.coords.longitude;
 $('#latitude').val(latitude);
 $('#longitude').val(longitude);
 $('#latitude1').val(latitude);
 $('#longitude1').val(longitude);
 
 //alert(latitude);
 showMap();
    
    }
 function fromLatLngToPoint(latLng, map) {
    var topRight = map.getProjection().fromLatLngToPoint(map.getBounds().getNorthEast());
    var bottomLeft = map.getProjection().fromLatLngToPoint(map.getBounds().getSouthWest());
    var scale = Math.pow(2, map.getZoom());
    var worldPoint = map.getProjection().fromLatLngToPoint(latLng);
    return new google.maps.Point((worldPoint.x - bottomLeft.x) * scale, (worldPoint.y - topRight.y) * scale);
}
    function showMap(){
        var latitude=$('#latitude').val();
        var longitude=$('#longitude').val();
        var dist=$('#ran').val();
        if((latitude=='0')&&(longitude=='0')){
            $('#ran').attr('disabled',true);
             $.ajax({ 
        url: '<?php echo HTTP_ROOT;?>/Homes/explore/'+latitude+'/'+longitude,
        type: 'post',
         success: function(output) {
               
              var result=jQuery.parseJSON(output);
              
              locations_str = '';
              locations = new Array();
              $.each(result,function(e,temp_obj){
                         
                var location = [];
                location.push(temp_obj.bg_vendor_classes.class_topic);

                location.push(temp_obj.bg_vendor_classe_location_details.latitude);
                location.push(temp_obj.bg_vendor_classe_location_details.longitude);
                location.push(temp_obj.bg_categories.color_code);
                location.push(temp_obj.bg_vendor_classes.ide);
                locations.push(location);
                console.log(location);
                // locations_str += "['"+temp_obj.bg_vendor_classes.class_topic+"', "+temp_obj.bg_vendor_classes.latitude+", "+temp_obj.bg_vendor_classes.longitude+", "+(++i)+"],";
              });
   var map = new google.maps.Map(document.getElementById('googleMap'), {
      zoom: 10,
      center: new google.maps.LatLng(13.1339078,80.2707),
     
       
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    var infowindow = new google.maps.InfoWindow();

    var marker, i;
   var bounds = new google.maps.LatLngBounds();
    for (i = 0; i < locations.length; i++) { 

            
     //bounds.extend(locations[i][1]); 
      var pinColor = locations[i][3];
var pinImage = new google.maps.MarkerImage("http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=%E2%80%A2|" + pinColor,
    new google.maps.Size(21, 34),
    new google.maps.Point(0,0),
    new google.maps.Point(10, 34));
var pinShadow = new google.maps.MarkerImage("http://chart.apis.google.com/chart?chst=d_map_pin_shadow",
    new google.maps.Size(40, 37),
    new google.maps.Point(0, 0),
    new google.maps.Point(12, 35));
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
        map: map,
        map: map,
        icon: pinImage,
        scale: 20,
        shadow: pinShadow,
        url:'<?php echo HTTP_ROOT;?>/classes/'+btoa(locations[i][4]),
        title:locations[i][0]
        
      });
      map.setZoom(11);
 google.maps.event.addListener(marker, 'mouseover', function (event) {
          var latitude = this.position.lat();
    var longitude = this.position.lng();
    var point = fromLatLngToPoint(this.getPosition(),map);
     $('.loader').show();
          $.ajax({ 
        url: '<?php echo HTTP_ROOT;?>/Homes/sameLocationClass/'+latitude.toFixed(6)+'/'+longitude.toFixed(6),
        type: 'post',
         success: function(output) {
         $('.loader').hide();
      if(output=='0'){
              $('#marker-tooltip').hide();
			   $('#marker-tooltip1').hide();
            }
            else{

       $('#marker-tooltip').html(output).css({
            'left': point.x,
                'top': point.y
        }).show();
		$('#marker-tooltip1').html(output).css({
           
        }).show();
         }
         }
     });
      
       
    });    
 google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          
           window.location.href = this.url;
          infowindow.setContent(locations[i][0]);
          infowindow.open(map, marker);
        }
      })(marker, i));

    }
    //center the map to a specific spot (city)
//map.fitBounds(bounds);
              
 

           

        }
        });
        }
        else{
            $('#ran').attr('disabled',false);
        $.ajax({ 
        url: '<?php echo HTTP_ROOT;?>/Homes/explore/'+latitude+'/'+longitude,
        type: 'post',
         success: function(output) {
               
              var result=jQuery.parseJSON(output);
             
              locations_str = '';
              locations = new Array();
              $.each(result,function(e,temp_obj){
                         
                var location = [];
                location.push(temp_obj.bg_vendor_classes.class_topic);

                location.push(temp_obj.bg_vendor_classe_location_details.latitude);
                location.push(temp_obj.bg_vendor_classe_location_details.longitude);
                location.push(temp_obj.bg_categories.color_code);
                location.push(temp_obj.bg_vendor_classes.ide);
                
                locations.push(location);
                console.log(location);
                // locations_str += "['"+temp_obj.bg_vendor_classes.class_topic+"', "+temp_obj.bg_vendor_classes.latitude+", "+temp_obj.bg_vendor_classes.longitude+", "+(++i)+"],";
              });
   var map = new google.maps.Map(document.getElementById('googleMap'), {
      zoom: 10,
      center: new google.maps.LatLng(latitude,longitude),
     
       
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    var infowindow = new google.maps.InfoWindow();

    var marker, i;
      //var bounds = new google.maps.LatLngBounds();
    for (i = 0; i < locations.length; i++) {
     //bounds.extend(locations[i].getPosition());   
      var pinColor = locations[i][3];
var pinImage = new google.maps.MarkerImage("http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=%E2%80%A2|" + pinColor,
    new google.maps.Size(21, 34),
    new google.maps.Point(0,0),
    new google.maps.Point(10, 34));
var pinShadow = new google.maps.MarkerImage("http://chart.apis.google.com/chart?chst=d_map_pin_shadow",
    new google.maps.Size(40, 37),
    new google.maps.Point(0, 0),
    new google.maps.Point(12, 35));
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
        map: map,
        map: map,
        icon: pinImage,
        scale: 20,
        shadow: pinShadow,
        url:'<?php echo HTTP_ROOT;?>/classes/'+btoa(locations[i][4]),
        title:locations[i][0]
        
      });
       map.setZoom(11);
        google.maps.event.addListener(marker, 'mouseover', function (event) {
          var latitude = this.position.lat();
    var longitude = this.position.lng();
    var point = fromLatLngToPoint(this.getPosition(),map);
     $('.loader').show();
          $.ajax({ 
        url: '<?php echo HTTP_ROOT;?>/Homes/sameLocationClass/'+latitude.toFixed(6)+'/'+longitude.toFixed(6),
        type: 'post',
         success: function(output) {
         $('.loader').hide();
      if(output=='0'){
              $('#marker-tooltip').hide();
			  $('#marker-tooltip1').hide(); 
            }
            else{

       $('#marker-tooltip').html(output).css({
            'left': point.x,
                'top': point.y
        }).show();
		$('#marker-tooltip1').html(output).css({
           
        }).show();
         }
         }
     });
      
       
    });   
      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          
           window.location.href = this.url;
          infowindow.setContent(locations[i][0]);
          infowindow.open(map, marker);
        }
      })(marker, i));

    }
      //map.fitBounds(bounds);         
 

           

        }
        });
    }
}
$('#ran').change(function(){
    var distance=$(this).val();
    if(distance<20){
         a=10;
    }
    if(distance>20 &&(distance<40)){
        a=15;
    }

    var location=$('#geocomplete').val();
    var latitude=$('#latitude').val();
    var longitude=$('#longitude').val();
    var search=$('#class_search').val();
    if(search==''){
        search=0;
    }
    if(location==''){
    location="null";
    }
    $('.loader').show();
     $.ajax({ 
        url: '<?php echo HTTP_ROOT;?>/Homes/locationRange/'+latitude+'/'+longitude+'/'+location+'/'+distance+'/'+search,
        type: 'post',
         success: function(output) {
             var result=jQuery.parseJSON(output);
              console.log(result);
              if(result.found=='0'){
                
               $('.loader').hide();
     var map = new google.maps.Map(document.getElementById('googleMap'), {
      zoom: 9,
      center: new google.maps.LatLng(result.current_lat,result.current_lng),
     
       
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });
       map.setZoom(12);
    
      /*if (map.getZoom() > 19) { 
        map.setZoom(19); 
      }*/ 

            }
            else{
                $('.loader').hide();
                
              locations_str = '';
              locations = new Array();
              $.each(result,function(e,temp_obj){
                         
                var location = [];
                location.push(temp_obj.bg_vendor_classes.class_topic);
                lat=temp_obj.bg_vendor_classes.current_lat;
                lng=temp_obj.bg_vendor_classes.current_lng;
                location.push(temp_obj.bg_vendor_classe_location_details.latitude);
                location.push(temp_obj.bg_vendor_classe_location_details.longitude);
                location.push(temp_obj.bg_categories.color_code);
                 location.push(temp_obj.bg_vendor_classes.ide);

                locations.push(location);
                console.log(location);
                // locations_str += "['"+temp_obj.bg_vendor_classes.class_topic+"', "+temp_obj.bg_vendor_classes.latitude+", "+temp_obj.bg_vendor_classes.longitude+", "+(++i)+"],";
              });
    var map = new google.maps.Map(document.getElementById('googleMap'), {
      zoom: 9,
      center: new google.maps.LatLng(lat,lng),
     
       
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    var infowindow = new google.maps.InfoWindow();

    var marker, i;

    for (i = 0; i < locations.length; i++) {  
      var pinColor = locations[i][3];
var pinImage = new google.maps.MarkerImage("http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=%E2%80%A2|" + pinColor,
    new google.maps.Size(21, 34),
    new google.maps.Point(0,0),
    new google.maps.Point(10, 34));
var pinShadow = new google.maps.MarkerImage("http://chart.apis.google.com/chart?chst=d_map_pin_shadow",
    new google.maps.Size(40, 37),
    new google.maps.Point(0, 0),
    new google.maps.Point(12, 35));
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
        map: map,
        map: map,
        icon: pinImage,
        scale: 20,
        shadow: pinShadow,
        url:'<?php echo HTTP_ROOT;?>/classes/'+btoa(locations[i][4]),
        title:locations[i][0]
        
      });
      map.setZoom(12);
   google.maps.event.addListener(marker, 'mouseover', function (event) {
          var latitude = this.position.lat();
    var longitude = this.position.lng();
    var point = fromLatLngToPoint(this.getPosition(),map);
     $('.loader').show();
          $.ajax({ 
        url: '<?php echo HTTP_ROOT;?>/Homes/sameLocationClass/'+latitude.toFixed(6)+'/'+longitude.toFixed(6),
        type: 'post',
         success: function(output) {
          $('.loader').hide();
      if(output=='0'){
              $('#marker-tooltip').hide();
			    $('#marker-tooltip1').hide();
            }
            else{

       $('#marker-tooltip').html(output).css({
            'left': point.x,
                'top': point.y
        }).show();
		$('#marker-tooltip1').html(output).css({
           
        }).show();
         }
         }
     });
      
       
    });   
 google.maps.event.addListener(marker, 'change', (function(marker, i) {
        return function() {
          
           window.location.href = this.url;
          infowindow.setContent(locations[i][0]);
          infowindow.open(map, marker);
        }
      })(marker, i));
    }
          
     
         }
              
 

            }
         
     });
})

/*================================================End===============================================================*/
 $('#ran1').change(function(){

  $('#dist1').text($(this).val()+" KM");
   var cat_id=null;
   var latitude1=$('#latitude1').val();
   var longitude1=$('#longitude1').val();
   var distance=$(this).val();
   var search=$('#class_search1').val();
  
  if(search==''){
    search=0;
  }
  var location=$('#geocomplete1').val();
  if(location==''){
    location=null;
  }
    $(this).css('font-weight','bold');
  $(this).css('color','green');
  
 
  $('.loader').show();
 
    $.ajax({ 
        url: '<?php echo HTTP_ROOT;?>/Homes/findClassesData/'+latitude1+'/'+longitude1+'/'+cat_id+"/"+distance+'/'+location+'/'+search,
        type: 'post',
         success: function(output) {

            $('#googleMap1').html('');
          $('#googleMap1').html(output);
          
           $('.loader').hide();
         }
       });
  
})

 $('.seg_brd_tp_class_segment1').click(function(){
   var cat_id=$(this).attr('id');
   var latitude1=$('#latitude1').val();
   var longitude1=$('#longitude1').val();
   var distance=$('#ran1').val();
   var search=$('#class_search1').val();
  
  if(search==''){
    search=0;
  }
  var location=$('#geocomplete1').val();
  if(location==''){
    location=null;
  }
    $(this).css('font-weight','bold');
  $(this).css('color','green');
  
  
  $('.loader').show();
 
    $.ajax({ 
        url: '<?php echo HTTP_ROOT;?>/Homes/findClassesData/'+latitude1+'/'+longitude1+'/'+cat_id+"/"+distance+'/'+location+'/'+search,
        type: 'post',
         success: function(output) {

            $('#googleMap1').html('');
          $('#googleMap1').html(output);
          
           $('.loader').hide();
         }
       });
  });




/*===================================================================================================================*/
 $('.seg_brd_tp_class_segment').click(function(){
  var cat_id=$(this).attr('id');
  //$('#'+cat_id).addClass('active_class');
  var latitude=$('#latitude').val();;
  var longitude=$('#longitude').val();
  var distance=$('#ran').val();
  var search=$('#class_search').val();
  if(search==''){
    search=0;
  }

  var location=$('#geocomplete').val();
  if(location==''){
    location="null";
  }
  $('.loader').show();
   $('#map11').find('#googleMap').remove();
    $('#map11').append('<div id="googleMap" class="google-map-div" style="width:100%;height:600px;"></div>');
    $.ajax({ 
        url: '<?php echo HTTP_ROOT;?>/Homes/findClasses/'+latitude+'/'+longitude+'/'+cat_id+'/'+distance+'/'+search+'/'+location,
        type: 'post',
         success: function(output) {

          var result=jQuery.parseJSON(output);
              if(result.found=='0'){
               $('.loader').hide();
     var map = new google.maps.Map(document.getElementById('googleMap'), {
      zoom: 10,
      center: new google.maps.LatLng(result.current_lat,result.current_lng),
     
       
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });

            }
            else{
                $('.loader').hide();
              locations_str = '';
              locations = new Array();
              $.each(result,function(e,temp_obj){
                         
                var location = [];
                location.push(temp_obj.bg_vendor_classes.class_topic);
                lat=temp_obj.bg_vendor_classes.current_lat;
                lng=temp_obj.bg_vendor_classes.current_lng;
                location.push(temp_obj.bg_vendor_classe_location_details.latitude);
                location.push(temp_obj.bg_vendor_classe_location_details.longitude);
                location.push(temp_obj.bg_categories.color_code);
                 location.push(temp_obj.bg_vendor_classes.ide);

                locations.push(location);
                console.log(location);
                // locations_str += "['"+temp_obj.bg_vendor_classes.class_topic+"', "+temp_obj.bg_vendor_classes.latitude+", "+temp_obj.bg_vendor_classes.longitude+", "+(++i)+"],";
              });

    var map = new google.maps.Map(document.getElementById('googleMap'), {
      zoom: 10,
      center: new google.maps.LatLng(lat,lng),
     
       
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    var infowindow = new google.maps.InfoWindow();

    var marker, i;

    for (i = 0; i < locations.length; i++) {  
      var pinColor = locations[i][3];
var pinImage = new google.maps.MarkerImage("http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=%E2%80%A2|" + pinColor,
    new google.maps.Size(21, 34),
    new google.maps.Point(0,0),
    new google.maps.Point(10, 34));
var pinShadow = new google.maps.MarkerImage("http://chart.apis.google.com/chart?chst=d_map_pin_shadow",
    new google.maps.Size(40, 37),
    new google.maps.Point(0, 0),
    new google.maps.Point(12, 35));
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
        map: map,
        map: map,
        icon: pinImage,
        scale: 20,
        shadow: pinShadow,
        url:'<?php echo HTTP_ROOT;?>/classes/'+btoa(locations[i][4]),
        title:locations[i][0]
        
      });
      map.setZoom(11);
 google.maps.event.addListener(marker, 'mouseover', function (event) {
          var latitude = this.position.lat();
    var longitude = this.position.lng();
    var point = fromLatLngToPoint(this.getPosition(),map);
     $('.loader').show();
          $.ajax({ 
        url: '<?php echo HTTP_ROOT;?>/Homes/sameLocationClass/'+latitude.toFixed(6)+'/'+longitude.toFixed(6),
        type: 'post',
         success: function(output) {
         $('.loader').hide();
      if(output=='0'){
              $('#marker-tooltip').hide();
			    $('#marker-tooltip1').hide();
            }
            else{

       $('#marker-tooltip').html(output).css({
            'left': point.x,
                'top': point.y
        }).show();
		$('#marker-tooltip1').html(output).css({
          
        }).show();
         }
         }
     });
      
       
    });   
 google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          
           window.location.href = this.url;
          infowindow.setContent(locations[i][0]);
          infowindow.open(map, marker);
        }
      })(marker, i));
    }
          
           
         }
     }
       });
  });
    </script>
             
  
<script src="jquery.min.js"></script>
<script>
$(document).ready(function(){
  $('#postSearch1').click(function(){
   var cat_id=null;
   var latitude1=$('#latitude1').val();
   var longitude1=$('#longitude1').val();
   var distance=$('#ran1').val();
   var search=$('#class_search1').val();
  
  if(search==''){
    search=0;
  }
  var location=$('#geocomplete1').val();
  if(location==''){
    location=null;
  }
    $(this).css('font-weight','bold');
  $(this).css('color','green');
  
  
  $('.loader').show();
 
    $.ajax({ 
        url: '<?php echo HTTP_ROOT;?>/Homes/findClassesData/'+latitude1+'/'+longitude1+'/'+cat_id+"/"+distance+'/'+location+'/'+search,
        type: 'post',
         success: function(output) {

            $('#googleMap1').html('');
          $('#googleMap1').html(output);
          
           $('.loader').hide();
         }
       });
  });  

$('#people_near').click(function(){
    $('#class_search1').show();
    $('#postSearch1').show();
    $('#class_search').hide();
    $('#postSearch').hide();

    
 $(this).css('border-color','#00cdc6');
 $(this).css('background','#000873');
 $('#click_tab102').css('background','#fff');
  $(this).css('border-radius','5px');
 $('#carrot1').show();
 $('#carrot').hide();
 $('#clr01').css('color','#000');
  //  $('#image1').html('<img  src='+<?php echo HTTP_ROOT?>/img/globblack.png+'>');
	// $('#image2').html('<img src='+<?php echo HTTP_ROOT?>/img/handgreen.png+'>');

 //  $('#image3').html('<img  src='+<?php echo HTTP_ROOT?>/img/manblack.png+'>');

 //var longitude=longitude;
var latitude1=$('#latitude1').val();
var longitude1=$('#longitude1').val();

if((latitude=='0')&&(longitude=='0')){
    $('#ran1').attr('disabled',true);
  $.ajax({
       url: '<?php echo HTTP_ROOT;?>/Homes/findNearAllClasses/'+latitude1+"/"+longitude1,
        type: 'post',
         success: function(output) {
           
          $('#googleMap1').html('');
          $('#googleMap1').html(output);
          
        }
      });
}
else{
  $('#ran1').attr('disabled',false);
 $.ajax({
       url: '<?php echo HTTP_ROOT;?>/Homes/findNearAllClasses/'+latitude1+"/"+longitude1,
        type: 'post',
         success: function(output) {
            //alert(output);
          $('#googleMap1').html('');
          $('#googleMap1').html(output);
          
        }
      });
       }
    $('#tab1').hide();
    $('#tab2').show();
    $('.caret_img24').show();
    $('#clr02').css('color', '#00cdc6');
    $('#hr2').css('border-bottom-color', '#00cdc6 !important');
    $('#hr1').css('border-color', '#000 !important');
    $('#click_tab102').css('color', '#343434');
	//$('#click_tab102').css('background','000873');
	//$('#click_tab102').css('border-radius','5px');


});
    
$('#click_tab102').click(function(){
     $('#class_search1').hide();
    $('#postSearch1').hide();
    $('#class_search').show();
    $('#postSearch').show();
    $('#people_near').css('border-color','#000');
    $('#carrot1').hide();
    $('#clr02').css('color','#000');
	 $(this).css('background','#000873');
  $(this).css('border-radius','5px');
   $('#people_near').css('background','#fff');
    $('#tab2').hide();
// $('#image1').html('<img  src='+<?php echo HTTP_ROOT?>/img/globgreen.png+'>');
	 // $('#image2').html('<img  src='+<?php echo HTTP_ROOT?>/img/handblack.png+'>');
// $('#image3').html('<img  src='+<?php echo HTTP_ROOT?>/img/manblack.png+'>');
    $('#tab1').show();
    $('#clr01').css('color', '#00cdc6');
    $('#click_tab1').css('color', '#343434');
    $('#click_tab2').css('color', '#00cdc6');
    $('#hr2').css('border-color', '#000 !important');
    $('#hr1').css('border-color', '#00cdc6 !important');
});

$('#explore').click(function(){
window.location.href="<?php echo HTTP_ROOT?>/Homes/explore";
});
$('#group').click(function(){
   $(this).css('color', '#00cdc6');
    $(this).css('background','#000873');
  $(this).css('border-radius','5px');
  window.location.href='<?php echo HTTP_ROOT;?>/Connect/connectpage';
})
$('#ran').change(function(){
  $('#dist').text($(this).val()+" KM");
})

});
$('#postSearch').click(function(){
   $('.loader').show();

  var searchValue=$('#class_search').val();

   $.ajax({
       url: '<?php echo HTTP_ROOT;?>/Homes/findByClass/'+btoa(searchValue),
        type: 'post',
         success: function(output) {

           var result=jQuery.parseJSON(output);
            if(result.found=='0'){
              alert('Record Not Found');
              //$('googleMap').html('');
              $('.loader').hide();
              return false;

            }
            else{
              locations_str = '';
              locations = new Array();
              $.each(result,function(e,temp_obj){
                         
                var location = [];
                location.push(temp_obj.bg_vendor_classes.class_topic);
                location.push(temp_obj.bg_vendor_classe_location_details.latitude);
                location.push(temp_obj.bg_vendor_classe_location_details.longitude);
                location.push(temp_obj.bg_categories.color_code);
                 location.push(temp_obj.bg_vendor_classes.ide);

                locations.push(location);
                console.log(location);
                
                // locations_str += "['"+temp_obj.bg_vendor_classes.class_topic+"', "+temp_obj.bg_vendor_classes.latitude+", "+temp_obj.bg_vendor_classes.longitude+", "+(++i)+"],";
              });
     var map = new google.maps.Map(document.getElementById('googleMap'), {
      zoom: 10,
      center: new google.maps.LatLng(locations[0][1], locations[0][2]),
     
       
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    var infowindow = new google.maps.InfoWindow();

    var marker, i;

    for (i = 0; i < locations.length; i++) {  
      var pinColor = locations[i][3];
var pinImage = new google.maps.MarkerImage("http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=%E2%80%A2|" + pinColor,
    new google.maps.Size(21, 34),
    new google.maps.Point(0,0),
    new google.maps.Point(10, 34));
var pinShadow = new google.maps.MarkerImage("http://chart.apis.google.com/chart?chst=d_map_pin_shadow",
    new google.maps.Size(40, 37),
    new google.maps.Point(0, 0),
    new google.maps.Point(12, 35));
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
        map: map,
        map: map,
        icon: pinImage,
        scale: 20,
        shadow: pinShadow,
        url:'<?php echo HTTP_ROOT;?>/classes/'+btoa(locations[i][4]),
        title:locations[i][0]
        
      });
      map.setZoom(11);
 google.maps.event.addListener(marker, 'mouseover', function (event) {
          var latitude = this.position.lat();
    var longitude = this.position.lng();
    var point = fromLatLngToPoint(this.getPosition(),map);
     $('.loader').show();
          $.ajax({ 
        url: '<?php echo HTTP_ROOT;?>/Homes/sameLocationClass/'+latitude.toFixed(6)+'/'+longitude.toFixed(6),
        type: 'post',
         success: function(output) {
        $('.loader').hide();
      if(output=='0'){
              $('#marker-tooltip').hide();
			   $('#marker-tooltip1').hide();
            }
            else{

       $('#marker-tooltip').html(output).css({
            'left': point.x,
               'top': point.y
        }).show();
		  $('#marker-tooltip1').html(output).css({
           
        }).show();
         }
         }
     });
      
       
    });   
 google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
        
           window.location.href = this.url;
          infowindow.setContent(locations[i][0]);
          infowindow.open(map, marker);
        }
      })(marker, i));
    }
        $('.loader').hide();
   
           
         }
     }
       });
        
 })
</script>
<script type="text/javascript">
$('.fun').click(function() {
    $('.fun').css({
        'border-color': '#ffa0d0',
  });
});
</script>
<style>.fun:hover{background:#ffa0d0;}
.informative:hover{background:#a3a3a3;}
.health:hover{background:#50bef7;}
.kids:hover{background:#ff9600;}
.education:hover{background:#026510;;}
.home:hover{background:#ab47ff;}
</style>
