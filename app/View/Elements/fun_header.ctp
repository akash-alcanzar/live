<style>
.georgeimg {
    width: 30px;
    border-radius: 50%;
    margin-top: -13px;
}
</style>
<div class="container-fluid padd_l_r brd_11">
<?php //echo $this->Element('comman_logout'); ?>
        <!-- ********************header first div********** -->
        <div class="row-fluid ">
          <div class="col-lg-offset-1 col-lg-10 col-md-12 col-sm-12 padd_l_r">
              <div class="col-xs-12 col-sm-12 sr_2605_03_padding">
                  <div class="col-md-3 col-sm-3 col-xs-12 b_logo brn_pad b_widh">
                      <a href="<?php echo HTTP_ROOT;?>"><img src="<?php echo HTTP_ROOT;?>/img/logo.jpg" class="logo_br"></a>
                  </div>
                  <div class="col-md-9 col-sm-9 col-xs-12 padd_l_r b_fcb2-br">
                      <div class="pull-right b_lft break_sr_15_07 padd_l_r">
                        <button class="btn btclass1-br fbttp break_sr_16_07_top_btn02" style="">
                          <img src="<?php echo HTTP_ROOT;?>/img/iconfind.png" />
                          <span>Find</span>
                        </button>
                          <a href="<?php echo HTTP_ROOT;?>/Connect/connectpage">
                        <button class="btn btclassnt1-br break_sr_16_07_top_btn02 fbttp" style="">
                          <i class="fa fa-group"></i> Connect</button>
                          <span>Connect</span>
                        </button></a>
                         <?php  
                         
                        //$user =$this->Session->read('User'); 

                        ?>
                           <?php  
                         
                        $user =$this->Session->read('User'); 

                        if(!empty($user))
                        {
                          ?>
                          <?php 
                       $user_view_comman =$this->Session->read('User');
             $profile_img=$user_view_comman['UserMaster']['profile_image'];
                       $user_type_id=$user_view_comman['UserMaster']['user_type_id'];
                       //echo $user_type_id;
                       //die;
                       if($profile_img!='' and $user_type_id==1)
                       {
                        ?>
                         <img src="<?php echo HTTP_ROOT;?>/img/Vendor/profile/<?php echo $profile_img; ?>" class="georgeimg"> 
                         <?php
                     }
                     elseif($profile_img!='' and $user_type_id==2)
                     {
                        ?>
                        <img src="<?php echo HTTP_ROOT;?>/img/Buyer/profile/<?php echo $profile_img; ?>" class="georgeimg"> 
                        <?php
                    }
                 ?>
              <div class="dropdown1 sp-chennai">
               <div><button class="btn btclassnt1-br12  fbttp" style="padding:5px 10px;"><?php echo $user_view_comman['UserMaster']['first_name'];?></button></div>
               <!--  <i class="fa fa-caret-down grg1 dshclr1" aria-hidden="true" id="nti"></i> -->
                <div class="dropdown-content1 logout">
                  <p><a href="<?php echo HTTP_ROOT; ?>/Homes/dashboard" class="logout_a">My Profile</a></p>
                  <p><a href="#" class="logout_a">Change Password</a></p>
                  <p><a href="<?php echo HTTP_ROOT;?>/Homes/logout" class="logout_a">Logout</a></p>
                </div>
              </div>
        <?php
                          }
                          ?>
                       <button class="btn btclassnt1-br12 break_sr_16_07_top_btn02 fbttp" style="">
                          <!-- <span class="sp-chennai">Chennai</span> -->
                          <i class="fa fa-map-marker map_br11" aria-hidden="true"></i>
                          <img class="ch_map" src="<?php echo HTTP_ROOT;?>/img/fun&refreshment/chennai.jpg" />
                        </button>
                      </div>
                  </div>
                  <!-- ******************new alignment***************** -->
              </div>
          </div>
        </div>
      <!-- ********************header second div********* -->
    </div> 