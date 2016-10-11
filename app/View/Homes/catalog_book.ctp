<?php 
/*echo "<pre>";
print_r(@$view_fixed_class);
echo "</pre>";*/

$class_id             = $payment_quote['VendorClasse']['id'];
$class_topic          = $payment_quote['VendorClasse']['class_topic'];
$class_type           = $payment_quote['VendorClasse']['class_timing_id'];
$class_duration       = $payment_quote['VendorClasse']['class_duration'];
$starting_month       = $payment_quote['VendorClasse']['starting_month'];
$location             = $payment_quote['VendorClasse']['location'];
$max_ticket_available = $payment_quote['VendorClasse']['max_ticket_available'];
$price_per_head       = $payment_quote['VendorClasse']['price_per_head'];
$time_of_day          = $payment_quote['VendorClasse']['time_of_day'];

if($class_type==1)
{
  $class_type='Flexible';
}
else
{
  $class_type='Fixed';

  $view_fixed_class['ClassSchedule']['id'];
  $starting_month = $view_fixed_class['ClassSchedule']['session_date'];
  $time_of_day    =$view_fixed_class['ClassSchedule']['session_time'];
}

//echo $class_topic;
?>
<?php //echo ($class_type==2)?'Fixed Class':'Flexible Class'; ?>
<?php if($user_view['UserMaster']['user_type_id']=='1'){?>
<style>
.funmp1 {
    width: 100%;
  
    background-image: url("<?php echo HTTP_ROOT;?>/img/Vendor/profile/<?php echo $user_view['UserMaster']['background_image'];?>");

    background-repeat: no-repeat;
    background-size: 100% 100%;
    padding-bottom:10px;
}
</style>
<?php } else{?>
<style>
.funmp1 {
    width: 100%;
  
    background-image: url("<?php echo HTTP_ROOT;?>/img/Buyer/profile/<?php echo $user_view['UserMaster']['background_image'];?>");

    background-repeat: no-repeat;
    background-size: 100% 100%;
    padding-bottom:10px;
}
</style>
<?php }?>
<style>

.myprflbrd {
    border: 0px solid #00477B !important;
}
.snr {
    padding-top: 3px;
}
.edit-bg {
    color: rgb(255, 255, 255);
    font-size: 21px;
}
.edit-photo{
  color: #FFF;
  font-family: 'os_bold';
  font-size: 14px;
  cursor: pointer;
}
.image_price12{

   background-color: #54c0c1;
    border-radius: 40%;
    bottom: 239px;
    height: 48px;
    position: relative;
    width: 90px;
    margin-right:8px;
}
.ccc{
     bottom: -10px;
    font-size: 20px;
    padding-left: 32px;
    padding-top: 20px;
    position: relative; 
}
.fa-camera-br {
    color: white;
    font-size: 24px;
    position: relative;
    right: 21px;
    top: 57px;
}

#hideimge{
display:none;
}
.user765 {
    position: relative;
    bottom: 90px;
    left: 155px;
}
.najm1 {
    position: relative;
    bottom: 50px;
    right: -5px;
}
.pimgtop{padding: 5px;
}
.booking{
background-color:#00477B;
color:#fff;
border-radius:30%;
}
.clrdash123 {
    background-color: #2BCDC1;
    padding: 10px 0px;
}
.input {
        padding-left:35px; 
        background: #E6E3E4;

    }
    .sprite:before{
        background: url('http://img45.imageshack.us/img45/4259/buildingssheet7dv.png');
        content: "\f145";
        position: absolute;
        height:32px;
        width:100%;
        margin: -10px 0 0 -10px;
        z-index:100;
        font-size: 20px;
    }
   .sprite:before {
        background-position: -32px 0;
    }
    .book-vd{
        padding: 10px;
    }
    .b_1_check {
    font-size: 14px;
}
@media (max-width: 1920px) and (min-width: 1366px){
    .b_1_check {font-size: 16px;}
}
@media (max-width: 1199px) and (min-width: 992px){
    .b_1_check {font-size: 14px;}
}
@media (max-width: 991px) and (min-width: 768px){
    .b_1_check {font-size: 12px;}
}
@media (max-width: 767px) and (min-width: 450px){
    .b_1_check {font-size: 11px;}
    .cust-xs-12{width: 50%!important;}
}
@media (max-width: 449px) and (min-width: 300px){
    .b_1_check {font-size: 11px;}
}
.alertdanger {
    color: #A94442;
    }
.alertsuccess {
    color: #3C763D;
}
</style>
<div class="col-md-12 col-sm-9 col-xs-12 ruth6542 ruth654786 cstm_md9">
  <?php if(!empty($user_view['UserMaster']['user_type_id'])){?>
    <div class="col-md-12 col-sm-12 col-xs-12 clrdash123 ruth1">
        <div class="col-md-3 col-sm-3 col-xs-4 bar321 bar786">
          <div><i class="fa fa-bars dshclr12" style="display:none;"></i><img src="<?php echo HTTP_ROOT;?>/img/profile_img/user.png" class="user432 dummy_user"><span class="dashbrd12 prf543">Provider Profile</span></div>
        </div>
        <div class="col-md-9 col-sm-9 col-xs-9 bar321 bar876 snr">
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
                <!--<span class="vendor">Vendor</span>-->
            </div>
        </div>
    </div> 
    <?php }?>
          
          
          <!-- ******************work ****************** -->
          <div class="col-md-12 col-sm-12 col-xs-12 book-brd padd_l_r">
            <div class="col-lg-offset-1 col-lg-10 col-md-12 col-sm-12 padd_l_r padd_l_r lglbrgroom brdash_naj">
                <div class="fixed-class"><?php echo $class_type; ?> Catalog Class Booking</div>
            </div>
        </div>
        <div class="col-md-12 col-sm-12 col-xs-12 book-bg padd_l_r">
            <div class="col-lg-offset-1 col-lg-10 col-md-12 col-sm-12 padd_l_r padd_l_r lglbrgroom brdash_naj">
                <div class="booked-fix"><?php echo $class_topic;?></div>
            </div>
        </div>
       <!-- <div class="col-md-12 col-sm-12 col-xs-12 book-bg1 padd_l_r">
            <div class="col-lg-offset-1 col-lg-10 col-md-12 col-sm-12 col-xs-12 padd_l_r padd_l_r lglbrgroom brdash_naj pad-book">
                <div class="col-md-3 col-sm-3 col-xs-12 cust-xs-2 padd_l_r booed-dur-pad">
                    <div class="col-md-5 col-sm-5 col-xs-7 padd_l_r booked-dur">Duration:</div>
                    <div class="col-md-7 col-sm-7 col-xs-5 padd_l_r booked-hrs"><?php //echo $class_duration; ?></div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12 cust-xs-6 padd_l_r">
                    <div class="col-md-4 col-sm-4 col-xs-3 padd_l_r booked-dur">
                        Date:
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-9 padd_l_r booked-hrs">
                       Friday 11 June 2016, 9:00 AM to 11:00 AM
                        <?php //echo $starting_month; ?> 
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 cust-xs-4 padd_l_r">
                    <div class="col-md-3 col-sm-3 col-xs-3 padd_l_r booked-dur">Address:</div>
                    <div class="col-md-9 col-sm-9 col-xs-9 padd_l_r booked-hrs"><?php //echo $location; ?></div>
                </div>
            </div>
        </div>-->
		<!-- Peyment Page By Rohit-->
    <?php 
    $u_id = $payment_quote['UserMaster']['id']; 
    ?>
    <input type="hidden" name="user_id" id="user_id" value="<?php echo $u_id; ?>"/>
    <input type="hidden" name="class_id" id="class_id" value="<?php echo $class_id; ?>"/>
    <!-- <input type="hidden" name="class_id" id="class_id" value=""/> -->
    
		<div class="col-md-12 col-sm-12 col-xs-12 padd_l_r book-form-line"></div>
		<div class="col-md-12 col-sm-12 col-xs-12 padd_l_r book-form-ticket">
				<div class="col-md-offset-2 col-md-8 col-sm-offset-1 col-sm-10 col-xs-12 book-no">
					<div class="col-md-7 col-sm-7 col-xs-7 padd_l_r">
						<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 padd_l_r">
							<i class="fa fa-inr book-fa-inr" aria-hidden="true"></i>
						</div>
						<div class="col-lg-11 col-md-11 col-sm-10 col-xs-11 padd_l_r">
            <input type="hidden" id="max_price" value="<?php echo base64_decode($this->params->pass[1]); ?>">	
							<span class="book-avail">Total Price Rs : <?php echo base64_decode($this->params->pass[1]); ?></span>
						</div>
					</div>
					
				</div>
			</div>
		
					<div class="col-md-12 col-sm-12 col-xs-12">
				<!-- Start For Pey -->
					<?php 
          $MERCHANT_KEY = "hF6qmoBJ";

// Merchant Salt as provided by Payu
$SALT = "sBL86X9MpG";
					$PAYU_BASE_URL = "https://secure.payu.in";
$action = '';
$posted = array();
if(!empty($_POST)) {
    //print_r($_POST);
  foreach($_POST as $key => $value) {    
    $posted[$key] = $value; 
  
  }

}


$formError = 0;

if(empty($posted['txnid'])) {
  // Generate random transaction id
  $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);

} else {
  $txnid = $posted['txnid'];
}
$hash = '';
// Hash Sequence
$hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";
if(empty($posted['hash']) && sizeof($posted) > 0) {
  if(
          empty($posted['key'])
          || empty($posted['txnid'])
          || empty($posted['amount'])
          || empty($posted['firstname'])
          || empty($posted['email'])
          || empty($posted['phone'])
          || empty($posted['productinfo'])
          
          || empty($posted['surl'])
          || empty($posted['furl'])
      || empty($posted['service_provider'])
  ) {
    $formError = 1;
  } else {
    //$posted['productinfo'] = json_encode(json_decode('[{"name":"tutionfee","description":"","value":"500","isRequired":"false"},{"name":"developmentfee","description":"monthly tution fee","value":"1500","isRequired":"false"}]'));
  $hashVarsSeq = explode('|', $hashSequence);
    $hash_string = '';  
  foreach($hashVarsSeq as $hash_var) {
      $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
      $hash_string .= '|';
    }

    $hash_string .= $SALT;


    $hash = strtolower(hash('sha512', $hash_string));
    $action = $PAYU_BASE_URL . '/_payment';

  }
} elseif(!empty($posted['hash'])) {
  $hash = $posted['hash'];
  $action = $PAYU_BASE_URL . '/_payment';

}
?>
         
aaa
						<form action="<?php echo $action; ?>" method="post" name="payuForm">
							  <input type="hidden" name="key" id="key" value="<?php echo $MERCHANT_KEY;?>" />
							  <input type="hidden" name="hash" value="<?php echo $hash;?>"/>
							  <input type="hidden" name="txnid" id="txnid" value="<?php echo $txnid;?>" />
							  <input type="hidden" name="amount" id="amount" value="<?php echo base64_decode($this->params->pass[1]); ?>"/>
							  <input type="hidden" name="firstname" id="firstname" value="<?php echo $payment_quote['UserMaster']['first_name'] ?>"/>
							  <input type="hidden" name="email" id="email" value="<?php echo $payment_quote['UserMaster']['email']?>" />
							  <input type="hidden" name="phone" id="phone"  value="<?php echo $payment_quote['UserMaster']['mobile']?>"/>

							  <textarea name="productinfo" id="productinfo" style="display:none;">Catalog Request</textarea>
							  <input type="hidden" name="surl" id="surl" value="<?php echo HTTP_ROOT; ?>/Homes/quoteSuccess" size="64" />
							  <input type="hidden" name="furl" id="furl" value="<?php echo HTTP_ROOT; ?>/Homes/quoteFailure" size="64" />
							  <input type="hidden" name="service_provider" id="service_provider" value="payu_paisa" size="64" />
							 
                <div id="pay_submit" class="col-md-offset-2 col-md-8 col-sm-offset-2 col-sm-8 col-xs-offset-2 col-xs-8 book-proceed cust-xs-offset-2" style="display:block;">
                  <div id="message"></div>
                   <div class="col-xs-12 col-sm-12" id="mobile_show"><center>
                  <input type="text" id="new_mobile" placeholder="Enter Mobile Number"></center></div> <div class="col-xs-12 col-sm-12" style="margin-top:30px;">

								<center>
                  <input type="submit" value="Proceed to payment" class="btn book-pr-pay1" id="payment1" style="background-color:green !important;color:#fff;"/>
                  <input type="submit" value="Confirm" class="btn book-pr-pay" id="payment" style="background-color:red !important;display:none;"/></center></div>
								</div>
              </form>
              
						</div>
					<!-- End Pay -->
			<!-- End -->
         
<?php $book_id =uniqid(); 
//echo $book_id;
?>
<input type="hidden" name="book_id" id="book_id" value="<?php echo $book_id; ?>" />
 <script>

    var hash = '<?php echo $hash ?>';
    function submitPayuForm() {
      if(hash == '') {
        return;
      }
      var payuForm = document.forms.payuForm;

      payuForm.submit();
    }
  $(document).ready(function(){
    var mobile_no='<?php echo $payment_quote['UserMaster']['mobile']?>';
    if(mobile_no==''){
   
     $('#mobile_show').show(); 
       
    }
    else{
     $('#mobile_show').hide(); 
    }
    $('#payment1').click(function(){
    var mobile_no='<?php echo $payment_quote['UserMaster']['mobile']?>';
     var mobile_no1=$('#new_mobile').val();
     if(mobile_no==''){
      var mobile_no1=$('#new_mobile').val();
       if(mobile_no1==''){
       $('#message').html('<div class="alert alert-danger"><center>Please Enter Mobile No</center></div>');
       return false;
      }
      else{
      $('#phone').val(mobile_no1); 
      $('#payment').show();
      $('#payment1').hide();
       var payuForm = document.forms.payuForm;

      payuForm.submit();
        return true;
      }
     }
     
    });
  }); 
  </script>

