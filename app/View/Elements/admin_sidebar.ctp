  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
  <style type="text/css">
    .pad{padding-left: 0px !important;padding-right: 0px !important;}
    .text_style{ color: #fff; padding: 18px 5px; text-align: center; text-transform: uppercase; font-family: 'sans-serif'; font-size: 12px; font-weight: bold; cursor: pointer;}
    .abc:hover{background-color: #28282e;}
    
    .abc:focus{background-color: #28282e;}
  </style>
php ?> 
<!-- left menu starts -->
<aside>
        <div id="sidebar" class="nav-collapse">
          <!-- sidebar menu start-->
          <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
              <!--<li style="background-color:#fff;" class="col-xs-12 pad">
              <?php echo $this->Html->image('braingroom.png',array('style'=>'width: 50%;right:50%;position: relative;left: 20%;'));?>
              </li>-->
              
              <li class="col-xs-12 pad" id="manage_vendor">
                <?php echo $this->Html->link('<i class="fa fa-user"></i>
                  <span class="listyle">Manage Vendor</span>', array('controller'=>'Admins','action'=>'manageVendor'), array('escape'=>false));?>
              </li>
              <li class="col-xs-12 pad" id="Manage_Learner">
                <?php echo $this->Html->link('<i class="fa fa-user"></i>
                  <span class="listyle">Manage Learner</span>', array('controller'=>'Admins','action'=>'manageLearner'), array('escape'=>false));?>
              </li>
              <li id="call_menu" class="col-xs-12 pad text_style abc">
                <!--<?php echo $this->Html->link('<i class="fa fa-money"></i>
                  <span class="listyle">Transaction By Class</span>', array('controller'=>'Admins','action'=>'transactionDetail'), array('escape'=>false));?>-->
                 <CENTER><i class="fa fa-caret-down" aria-hidden="true"></i></CENTER>
                  
                 <center> Transaction Report</center>
              </li>
              <!-- drop down  menu -->
              <li id="drop_menu" class="col-xs-12 pad">
                <div class="col-xs-12 col-sm-12 pad" style="padding-top:5px;">
                  <center>
                    <p class="text_style abc pad" id="postClass"><span>Transaction By Class</span></p>
                    <p class="text_style abc pad" id="giftClass"><span>Transaction By Gift</span></p>
                    <p class="text_style abc pad" id="promoteClass"><span>Transaction By Promote Class</span></p>
                    
                  </center>
                </div>
              </li>
               <li id="track_call_menu" class="col-xs-12 pad text_style abc">
                <!--<?php echo $this->Html->link('<i class="fa fa-money"></i>
                  <span class="listyle">Transaction By Class</span>', array('controller'=>'Admins','action'=>'transactionDetail'), array('escape'=>false));?>-->
                 <CENTER><i class="fa fa-caret-down" aria-hidden="true" style="font-size:12px;"></i></CENTER>
                  
                 <center> Track Transaction</center>
              </li>
              <!-- drop down  menu -->
              <li id="tracking_menu" class="col-xs-12 pad">
                <div class="col-xs-12 col-sm-12 pad" style="padding-top:5px;">
                  <center>
                    <p class="text_style abc pad" id="fixedClass"><span>Track Fixed Class</span></p>
                    <p class="text_style abc pad" id="flexibleClass"><span>Track Flexible Class</span></p>
                    
                    
                  </center>
                </div>
              </li>

              <li id="track_gift" class="col-xs-12 pad text_style abc">
                <!--<?php echo $this->Html->link('<i class="fa fa-money"></i>
                  <span class="listyle">Transaction By Class</span>', array('controller'=>'Admins','action'=>'transactionDetail'), array('escape'=>false));?>-->
                 <CENTER><i class="fa fa-caret-down" aria-hidden="true" style="font-size:12px;"></i></CENTER>
                  
                 <center> Manage Gift</center>
              </li>
              <!-- drop down  menu -->
              <li id="drop_gift" class="col-xs-12 pad">
                <div class="col-xs-12 col-sm-12 pad" style="padding-top:5px;">
                  <center>
                    <p class="text_style abc pad" id="cuponTracking"><span>Gift Cupon</span></p>
                    <p class="text_style abc pad" id="manageGift"><span>Gift Card</span></p>
                    <p class="text_style abc pad" id="manageNgo"><span>NGOs</span></p>
                    <p class="text_style abc pad" id="ngo_booking"><span>NGOs Booking Tracking</span></p>
                    
                  </center>
                </div>
              </li>

              
               <li class="col-xs-12 pad" id="Manage_Categories">
                <?php echo $this->Html->link('<i class="fa fa-tags"></i>
                  <span class="listyle">Manage Categories</span>', array('controller'=>'Admins','action'=>'manageCategory'), array('escape'=>false));?>
              </li>
              <li class="col-xs-12 pad" id="Manage_Segement">
                <?php echo $this->Html->link('<i class="fa fa-home"></i>
                  <span class="listyle">Manage Segement</span>', array('controller'=>'Admins','action'=>'manageSegment'), array('escape'=>false));?>
              </li>
              <li class="col-xs-12 pad" id="Manage_Community_Group">
                <?php echo $this->Html->link('<i class="fa fa-envelope"></i>
                  <span class="listyle">Manage Community Group</span>', array('controller'=>'Admins','action'=>'manageCommunity'), array('escape'=>false));?>
              </li>
               <li class="col-xs-12 pad" id="Manage_Connect_Group">
                <?php echo $this->Html->link('<i class="fa fa-share-alt"></i>
                  <span class="listyle">Manage Connect Group</span>', array('controller'=>'Admins','action'=>'manageGroup'), array('escape'=>false));?>
              </li>
              <!--<li class="col-xs-12 pad" id="Manage_Gift_Card">
                <?php echo $this->Html->link('<i class="fa fa-gift"></i>
                  <span class="listyle">Manage Gift Card</span>', array('controller'=>'Admins','action'=>'manageGift'), array('escape'=>false));?>
              </li>
              <li class="col-xs-12 pad" id="Manage_Ngo_Card">
                <?php echo $this->Html->link('<i class="fa fa-gift"></i>
                  <span class="listyle">Manage NGO Card</span>', array('controller'=>'Admins','action'=>'manageNgo'), array('escape'=>false));?>
              </li>-->
              <li class="col-xs-12 pad" id="Manage_Featured_Class">
                <?php echo $this->Html->link('<i class="fa fa-picture-o"></i>
                  <span class="listyle">Manage Featured Class</span>', array('controller'=>'Admins','action'=>'manageFeaturedClass'), array('escape'=>false));?>
              </li>
              <li class="col-xs-12 pad" id="Manage_Catalogs">
                <?php echo $this->Html->link('<i class="fa fa-picture-o"></i>
                  <span class="listyle">Manage Catalogs</span>', array('controller'=>'Admins','action'=>'manageCatalog'), array('escape'=>false));?>
              </li>
               <li class="col-xs-12 pad" id="Manage_quote">
                <?php echo $this->Html->link('<i class="fa fa-picture-o"></i>
                  <span class="listyle">Manage Catalog Quote</span>', array('controller'=>'Admins','action'=>'manageQuote'), array('escape'=>false));?>
              </li>
              <li class="col-xs-12 pad" id="Manage_Class">
                <?php echo $this->Html->link('<i class="fa fa-picture-o"></i>
                  <span class="listyle">Manage Class</span>', array('controller'=>'Admins','action'=>'manageClass'), array('escape'=>false));?>
              </li>
              
							<li class="col-xs-12 pad" id="Manage_Blog_Request">
                <?php echo $this->Html->link('<center><img src="'.HTTP_ROOT.'/img/connect/blog.png" alt="img not found"></center>
                  <span class="listyle">Manage Blog Request</span>', array('controller'=>'Admins','action'=>'manageBlogRequest'),array('escape'=>false));?>
              </li>

              <li class="col-xs-12 pad" id="Manage_User_Post_Request">
                <?php echo $this->Html->link('<center><img src="'.HTTP_ROOT.'/img/connect/user_post.png" alt="img not found"></center> 
                <span class="listyle">Manage User Post Request</span>', array('controller'=>'Admins','action'=>'manageUserPostRequest'),array('escape'=>false));?>
              </li>
							
							<li class="col-xs-12 pad" id="Manage_Activity_Request">
                <?php echo $this->Html->link('<i class="fa fa-picture-o"></i>
                  <span class="listyle">Manage Activity Request</span>', array('controller'=>'Admins','action'=>'manageActivityRequest'),array('escape'=>false));?>
              </li>
             
              <li class="col-xs-12 pad">
<a class="nohover" href="">
<i class=""></i>
<span class=""></span>
</a>
</li>
            </ul>            
          </div>
            <!-- sidebar menu end-->
          </div>
        </aside>
         <footer class="main-footer" style="background-color:#D13539;color:white;">
<strong style="color:white;">Copyright &copy; 2014-2015 <a href="http://alcanzarsoft.com" style="color:white;">Alcanzar Software Solution</a> </strong>. <strong style="color:white;"> All rights
reserved.</strong>
</footer>
<!-- left menu ends -->

<script type="text/javascript">
  $(document).ready(function(){
    $('#drop_gift').hide();
    $('#drop_menu').hide();
       $('#tracking_menu').hide();

    $('#call_menu').click(function(){
      $('#drop_menu').toggle('slow');
    });
     $('#track_call_menu').click(function(){
      $('#tracking_menu').toggle('slow');
    });
     $('#track_gift').click(function(){
      $('#drop_gift').toggle('slow');
    });


   
    $('#postClass').click(function(){
      window.location.href='<?php echo HTTP_ROOT?>/Admins/transactionDetail';
    })
    $('#giftClass').click(function(){
      window.location.href='<?php echo HTTP_ROOT?>/Admins/transactionGift';
    })
    $('#promoteClass').click(function(){
      window.location.href='<?php echo HTTP_ROOT?>/Admins/transactionPramote';
    })
    $('#fixedClass').click(function(){
      window.location.href='<?php echo HTTP_ROOT?>/Admins/trackingFixedClass';
    })
    $('#flexibleClass').click(function(){
      window.location.href='<?php echo HTTP_ROOT?>/Admins/trackingFlexibleClass';
    })
    
 $('#ngo_booking').click(function(){

      window.location.href='<?php echo HTTP_ROOT?>/Admins/ngoBooking';
    })
 $('#cuponTracking').click(function(){
  
      window.location.href='<?php echo HTTP_ROOT?>/Admins/cuponTracking';
    })
 $('#manageGift').click(function(){
  
      window.location.href='<?php echo HTTP_ROOT?>/Admins/manageGift';
    })
 $('#manageNgo').click(function(){
  
      window.location.href='<?php echo HTTP_ROOT?>/Admins/manageNgo';
    })

 



  });
</script>
