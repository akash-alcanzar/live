<style>
  .home_header_city{
      -moz-appearance: none;
      -webkit-appearance: none;
      padding:10px 30px;
      border:none;
      margin-top:3px; 
  }
</style>


<?php $Allcities    = $this->requestAction(array('controller'=>'Homes', 'action'=>'getCities')); ?>

<?php 

$Allcategory  = $this->requestAction(array('controller'=>'Homes', 'action'=>'getCategory')); 

?>

<?php $Allsegment1=$this->requestAction(array('controller'=>'Homes', 'action'=>'getSegment'),array('pass'=>array(1)));
  
      $Allsegment2=$this->requestAction(array('controller'=>'Homes', 'action'=>'getSegment'),array('pass'=>array(2)));
     $Allsegment3=$this->requestAction(array('controller'=>'Homes', 'action'=>'getSegment'),array('pass'=>array(3)));
     $Allsegment4=$this->requestAction(array('controller'=>'Homes', 'action'=>'getSegment'),array('pass'=>array(4)));
     $Allsegment5=$this->requestAction(array('controller'=>'Homes', 'action'=>'getSegment'),array('pass'=>array(5)));
     $Allsegment6=$this->requestAction(array('controller'=>'Homes', 'action'=>'getSegment'),array('pass'=>array(6)));
	 $result =$this->requestAction(array('controller'=>'Homes', 'action'=>'cat_segments'));
?>

<?php

    $a=$this->params->pass[0];
    $city_name =$this->requestAction(array('controller'=>'Homes','action'=>'upcoming/'.$a));

?>


<div class="container-fluid padd_l_r ">  
  <div class="col-md-12 col-xs-12 b_header padd_l_r b12_field">
      <div class="col-lg-offset-1 col-lg-10 col-md-12 col-sm-12  b12_field padd_l_r ">
        <!-- <div class="col-md-12 col-sm-12 col-xs-12 b_header padd_l_r"> -->
          <!-- <div class=" bdrcol-sm-12  col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2  col-xs-12 b_row padd_l_r"> -->
            <div class="col-xs-12 col-sm-12 sr_15_07_padd">
              <!-- ***************left button*************** -->
              <div class="col-md-7 col-sm-7 col-lg-8 col-xs-12 pull-left padd_l_r sr_18_07_header_bdr">
                                  <a href="<?php echo HTTP_ROOT;?>/sell-express">
                    <button class="btn buttclass" >Class Providers</button>
                  </a>
                  <a href="<?php echo HTTP_ROOT;?>/arrange-class">
                    <button class="btn butidea sr_18_07_cfo">Catalogue for Organizers</button>
                  </a>
                  <a href="<?php echo HTTP_ROOT;?>/Homes/gift">
                    <button class="btn butgift" >
                      <i class="fa fa-gift gifticon" aria-hidden="true"></i>
                      Gift A Class
                    </button>
                  </a>  
                   <a href="<?php echo HTTP_ROOT;?>/blog">
                    <button class="btn butidea sr_18_07_cfo border-blog"> 
                    <i class="glyphicon glyphicon-comment blogicon"></i> Blog</button>
                  </a>
                  <a href="#">
                  <button class="btn butidea sr_18_07_cfo border-blog"> 
                    Contact US</button>  
                  </a>
              </div>
              <!-- ***************left button*************** -->
              <!-- ***************right button*************** -->
              <div class="col-md-5 col-xs-12 col-lg-4 col-sm-5  padd_l_r">
                  <div class="pull-right br_login" id="br_login" >
                      <i class="fa fa-sign-in b_login" aria-hidden="true"></i>
                      
                        <?php  
                         
                        $user =$this->Session->read('User'); 

                        if(!empty($user))
                        {
                          ?>
                          <?php echo $this->Element('home_comman_logout'); ?>
                        
                        <?php }else{ ?>
						            <span>
                          <?php echo $this->Html->link('Login/Sign Up', array('controller' => 'Homes','action' => 'login'), array('escape' => false,'id'=>'','class'=>'b_signup','style'=>'padding:10px 12px;'));
                          ?>
                        </span>
						<?php
                      }
                      ?>

                      <i class="fa fa-map-marker" aria-hidden="true" style="position:relative;left:6%; top: -2px;" ></i>
                      <select class="b_chennai home_header_city" name="header_city_id" id="header_city_id"       onchange="get_city_value(this.value)">
                             <?php  if(!empty($city_name)){?>
                              <option selected value="<?php echo $city_name;?>">
                                <?php echo $city_name ;?>
                              </option>
                            
                                <?php }
                                else{
                                  foreach ($Allcities as  $city_value){ ?>
                                    <option style="font-size:14px;" value="<?php echo $city_value['City']['id']; ?>">
                                      <?php echo $city_value['City']['name']; ?>
                                    </option>
                                <?php }} ?>
                        </select>
                         <i class="fa fa-angle-down" aria-hidden="true" style="position:relative;left:-6%;"></i>
                        <!-- <i class="fa fa-angle-down" aria-hidden="true" style="position: relative; cursor: pointer; left: -8%; font-size: 20px;"></i> -->
                  </div>
              </div>
              <!-- ***************right button *************** -->
            </div>
          <!-- </div> -->
        <!-- </div> -->
      </div>
  </div>
  <div class="col-xs-12 col-sm-12 padd_l_r">
        <div class="col-lg-offset-1 col-lg-10 col-md-12 col-sm-12 col-xs-12 padd_l_r">
            <div class="col-xs-12 col-sm-12 padd_l_r sr_29_07_m_top">
              <!-- <div class="col-md-12 col-md-12 col-sm-12 col-xs-12 br_pad brn_pad"> -->
                 <!--  <div class="col-sm-12  col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2 col-xs-12 brn_pad"> -->
                 
                      <div class="col-md-3 col-sm-3 col-xs-12 b_logo brn_pad b_widh sr_29_07_lgo_img">
                      <img src="<?php echo HTTP_ROOT;?>/img/beta.png" style="width: 50px;" >
                        <a href="<?php echo HTTP_ROOT;?>">
                          <img src="<?php echo HTTP_ROOT;?>/img/logo.jpg" class="blwdh">
                        </a>
                      </div>
                      <!-- ******************new alignment***************** -->
                      <div class="col-md-6 col-sm-5 col-xs-12 padd_l_r b_fcb1 b_pad1 sr_29_07_md_screen">
                        <center class="bl_cntr">
                          <form action="<?php echo HTTP_ROOT;?>/vendor_classes/lists" name="s_cat" method="post">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                              <input type="hidden" id="search_cat_id" name="search_cat_id" value=""/>
                               
                                <div class="sr_29_07_search_box_div">
                                  <div class="col-xs-5 sr_19_07_select_div" style="padding-right: 0px; margin-top: -4px;">
                                      <select class="form-control sr_19_07_select_btn" name="search_cat_id" style="">
                                          <option value="0" class="slt_pad01_08">Select Category</option>
                                          <option value="1" class="slt_pad01_08">Fun & Recreation</option>
                                          <option value="2" class="slt_pad01_08">Informative & Motivational</option>
                                          <option value="3" class="slt_pad01_08">Health & Fitness</option>
                                          <option value="4" class="slt_pad01_08">Kids & Teens</option>
                                          <option value="5" class="slt_pad01_08">Education & Skill Development</option>
                                          <option value="6" class="slt_pad01_08">Home Maintenance</option>

                                      </select>
                                      <span class="carrte_select"><img src="<?php echo HTTP_ROOT;?>/img/thumbnail/caret.png" alt="img" style="height: 10px;"></span>
                                  </div>
                                  <div class="col-xs-7">
                                      <input type="text" placeholder="Search for classes & activities..." name="search_key" id="search_key" class="b_1_input1" style="border-radius: 0px; width: 100%; padding-right: 40px;">
                                      <button type="submit" class="srchbutt" name="search" style="">
                                       <i class="fa fa-search srci" style="color: #1d4f8a;"></i>
                                      </button>
                                  </div>
                                </div>
                                <!-- hide category -->
                                
                                <!-- hide category -->
                            </div>
                          </form>
                            <div class="col-md-9 col-sm-12 col-xs-12 bl_inpt">
                              <div>
                                <div id="b11"><a href="#" class="fun123" onclick="serch_cat('1');">Fun & Recreation</a></div>
                                <div id="b12"><a href="#" class="fun123" onclick="serch_cat('2');">Informative & Motivational</a></div>
                                <div id="b13"><a href="#" class="fun123" onclick="serch_cat('3');">Health & Fitness</a></div>
                                <div id="b14"><a href="#" class="fun123" onclick="serch_cat('4');">Kids & Teens</a></div>
                                <div id="b15"><a href="#" class="fun123" onclick="serch_cat('5');">Education & Skill Development</a></div>
                                <div id="b16"><a href="#" class="fun123" onclick="serch_cat('6');">Home Maintenance</a></div>
                              </div>
                            </div>    
                        </center>
                      </div>
                      <div class="col-md-3 col-sm-4 col-xs-12 padd_l_r b_fcb2 b_pad12 sr_15_07_connect_btn">
                          <div class="pull-right b_lft">
                            <button class="btn btclass1 fbttp" style="padding:5px 20px;"><img src="<?php echo HTTP_ROOT;?>/img/iconfind.png" />Find</button>
                            <button class="btn btclassnt1  fbttp" style="padding:5px 10px;">
                            <!--<img src="<?php echo HTTP_ROOT;?>/img/iconconnect1.png" />--> <i class="fa fa-group"></i> Connect</button>
                          </div>
                      </div>
                      <!-- ******************new alignment***************** -->
                  </div>
        </div>
  </div>
</div>
<section id="menu-area">            
    <nav class="navbar navbar-default" role="navigation padd_l_r"> 
        <div class="col-lg-offset-1 col-lg-10 col-md-12 col-sm-12 padd_l_r">
        <a href="#" class="menu-icon"><span class="fa fa-bars logspan"></span></a>
        <div id="navbar" class="navbar-collapse collapse na_bg_clr012">
        <ul id="top-menu" class="nav navbar-nav navbar-right main-nav col-xs-12 col-sm-12 padd_l_r">
<?php 
	foreach($result as $res){
		?>
		<li class="dropdown active first maiin-menu-list">
		<?php 
			//echo $this->Html->link($res['Category']['category_name'], array($res['Category']['slug']), array('class' => '# pad_right_5 maiin-menu-list-link', array('escape' => false)), array('escape' => false));
	?>
     <a href="<?php echo HTTP_ROOT;?>/<?php echo $res['Category']['slug']; ?>" class="# pad_right_5 maiin-menu-list-link">
                <?php echo $res['Category']['category_name'];?>
                <span class="fa fa-angle-down"></span>
              </a>
	<ul class="dropdown-menu" role="menu" style="background-color:#38B9B5; z-index:100000;">
    	<li>
        	<?php 
				foreach($res['ClassSegment'] as $seg){
						//echo $this->Html->link($seg['segment_name'], array('controller' => 'vendor_classes','action'=>'lists',$res['Category']['slug'],$seg['slug']));
						?>
                        <a href="<?php echo HTTP_ROOT;?>/<?php echo $res['Category']['slug'];?>/<?php echo $seg['slug'];?>">
                    <?php echo $seg['segment_name'];?></a>
                        <?php
					}
			?>
        </li>
    </ul>
    </li>
    <?php
	}
?>
</ul>
        <?php /*?>  <ul id="top-menu" class="nav navbar-nav navbar-right main-nav col-xs-12 col-sm-12 padd_l_r">
            <li class="dropdown active first maiin-menu-list">
              <a href="<?php echo HTTP_ROOT;?>/vendor_classes/lists/<?php echo $Allcategory[0]['Category']['id'];?>" class="# pad_right_5 maiin-menu-list-link">
                <?php echo $Allcategory[0]['Category']['category_name'];?>
                <span class="fa fa-angle-down"></span>
              </a>
              <ul class="dropdown-menu" role="menu" style="background-color:#38B9B5; z-index:100000;">
                <?php foreach($Allsegment1 as $res1){ ?>               
                   <li>
                    <a href="<?php echo HTTP_ROOT;?>/vendor_classes/lists/<?php echo $Allcategory[0]['Category']['id'];?>/<?php echo $res1['ClassSegment']['id'];?>">
                    <?php echo $res1['ClassSegment']['segment_name'];?></a>
                  </li>
                <?php }?>
              </ul>    
            </li>
            <li class="dropdown active maiin-menu-list">
              <a href="<?php echo HTTP_ROOT;?>/vendor_classes/lists/<?php echo $Allcategory[1]['Category']['id'];?>" class="# pad_right_5 maiin-menu-list-link">
                <?php echo $Allcategory[1]['Category']['category_name'];?>
                <span class="fa fa-angle-down"></span>
              </a>
              <ul class="dropdown-menu" role="menu" style="background-color:#38B9B5; z-index:100000;">
                <?php foreach($Allsegment2 as $res1){ ?>
                  <li>
                    <a href="<?php echo HTTP_ROOT;?>/vendor_classes/lists/<?php echo $Allcategory[1]['Category']['id'];?>/<?php echo $res1['ClassSegment']['id'];?>">
                       <?php echo $res1['ClassSegment']['segment_name'];?>
                    </a>
                  </li>
                <?php }?>                 
              </ul>
            </li>

            <li class="dropdown active maiin-menu-list">
              <a href="<?php echo HTTP_ROOT;?>/vendor_classes/lists/<?php echo $Allcategory[2]['Category']['id'];?>" class="# pad_right_5 maiin-menu-list-link">
                <?php echo $Allcategory[2]['Category']['category_name'];?>
                <span class="fa fa-angle-down"></span>
              </a>
              <ul class="dropdown-menu" role="menu" style="background-color:#38B9B5; z-index:100000;">
                <?php foreach($Allsegment3 as $res1){ ?>
                  <li>
                    <a href="<?php echo HTTP_ROOT;?>/vendor_classes/lists/<?php echo $Allcategory[2]['Category']['id'];?>/<?php echo $res1['ClassSegment']['id'];?>">
                      <?php echo $res1['ClassSegment']['segment_name'];?>
                    </a>
                  </li>
                <?php }?>  
              </ul>
            </li>
            <li class="dropdown active maiin-menu-list">
              <a href="<?php echo HTTP_ROOT;?>/vendor_classes/lists/<?php echo $Allcategory[3]['Category']['id'];?>" class="# pad_right_5 maiin-menu-list-link" >
                <?php echo $Allcategory[3]['Category']['category_name'];?>
                <span class="fa fa-angle-down"></span>
              </a>
              <ul class="dropdown-menu" role="menu" style="background-color:#38B9B5; z-index:100000;">
                <?php foreach($Allsegment4 as $res1){ ?>
                  <li>
                    <a href="<?php echo HTTP_ROOT;?>/vendor_classes/lists/<?php echo $Allcategory[3]['Category']['id'];?>/<?php echo $res1['ClassSegment']['id'];?>">
                      <?php echo $res1['ClassSegment']['segment_name'];?>
                    </a>
                  </li>
                <?php }?>   
              </ul>
            </li>
            <li class="dropdown active maiin-menu-list">
              <a href="<?php echo HTTP_ROOT;?>/vendor_classes/lists/<?php echo $Allcategory[4]['Category']['id'];?>" class="# pad_right_5 maiin-menu-list-link" >
                <?php echo $Allcategory[4]['Category']['category_name'];?>
                <span class="fa fa-angle-down"></span>
              </a>

              <ul class="dropdown-menu" role="menu" style="background-color:#38B9B5; z-index:100000;">
                
                <?php foreach($Allsegment5 as $res1){ ?>
                  <li>
                    <a href="<?php echo HTTP_ROOT;?>/vendor_classes/lists/<?php echo $Allcategory[4]['Category']['id'];?>/<?php echo $res1['ClassSegment']['id'];?>">
                      <?php echo $res1['ClassSegment']['segment_name'];?>
                    </a>
                  </li>
                <?php }?>    

              </ul>
            </li>
            <li class="dropdown active last maiin-menu-list">
              <a href="<?php echo HTTP_ROOT;?>/vendor_classes/lists/<?php echo $Allcategory[5]['Category']['id'];?>" class="# pad_right_5 maiin-menu-list-link">
                <?php echo $Allcategory[5]['Category']['category_name'];?>
                <span class="fa fa-angle-down"></span>
              </a>
              <ul class="dropdown-menu last-droppp-menu" role="menu" style="background-color:#38B9B5; z-index:100000;">
                
                 <?php foreach($Allsegment6 as $res1){ ?>
                  <li>
                    <a href="<?php echo HTTP_ROOT;?>/vendor_classes/lists/<?php echo $Allcategory[5]['Category']['id'];?>/<?php echo $res1['ClassSegment']['id'];?>">
                      <?php echo $res1['ClassSegment']['segment_name'];?>
                    </a>
                  </li>
                <?php }?>
              </ul>
            </li>
          </ul>    <?php */?> 
          <a href="#" class="menu-close"><span class="fa fa-close"></span></a></div>

      </div>     
    </nav>
</section>

<script type="text/javascript">
function serch_cat(catid){
  $('#search_cat_id').val(catid);
}
</script>
<script>
  function get_city_value(id){
    if(id != 1 ){
       window.location.href = "<?php echo HTTP_ROOT;?>/homes/upcoming/"+btoa(id); 
    }
  }
</script>
