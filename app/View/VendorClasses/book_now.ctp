<?php 

//echo '<pre>'; print_r($book); die;
	
if($class['VendorClasse']['class_timing_id']==1)
{
 // $class='Flexible';
}
else
{
  //$class='Fixed';
}

?>
<?php if($class['User']['user_type_id']){?>
<style>
.funmp1 {
    width: 100%;
  
    background-image: url("<?php echo HTTP_ROOT;?>/img/Vendor/profile/<?php echo $class['User']['background_image'];?>");

    background-repeat: no-repeat;
    background-size: 100% 100%;
    padding-bottom:10px;
}
</style>
<?php }?>
<?php /*?><?php else{?>
<style>
.funmp1 {
    width: 100%;
  
    background-image: url("<?php echo HTTP_ROOT;?>/img/Buyer/profile/<?php echo $class['User']['background_image'];?>");

    background-repeat: no-repeat;
    background-size: 100% 100%;
    padding-bottom:10px;
}
</style>
<?php }?><?php */?>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<div class="col-md-10 col-sm-9 col-xs-12 ruth6542 ruth654786 cstm_md9">
          <div class="col-md-12 col-sm-12 col-xs-12 book-brd padd_l_r">
            <div class="col-lg-offset-1 col-lg-10 col-md-12 col-sm-12 padd_l_r padd_l_r lglbrgroom brdash_naj">
                <?php /*?><div class="fixed-class"><?php echo $class_type; ?> Class Booking</div><?php */?>
            </div>
        </div>
        <div class="col-md-12 col-sm-12 col-xs-12 book-bg padd_l_r">
            <div class="col-lg-offset-1 col-lg-10 col-md-12 col-sm-12 padd_l_r padd_l_r lglbrgroom brdash_naj">
                <div class="booked-fix"><?php echo $class['VendorClasse']['class_topic']; ?></div>
            </div>
        </div>
    <?php 
    $u_id = $class['User']['id']; 
    ?>
    <input type="hidden" name="user_id" id="user_id" value="<?php echo $class['User']['id']; ?>"/>
    <input type="hidden" name="login_user" id="login_user" value="<?php echo $user_login['UserMaster']['id']; ?>"/>
    <input type="hidden" name="as" id="as" value="kbnmbmnb"/>
    <input type="hidden" name="class_id" id="class_id" value="<?php echo $class['VendorClasse']['id']; ?>"/>
    <!-- <input type="hidden" name="class_id" id="class_id" value=""/> -->
    
		<div class="col-md-12 col-sm-12 col-xs-12 padd_l_r book-form-line"></div>
		<div class="col-md-12 col-sm-12 col-xs-12 padd_l_r book-form-ticket">
				<div class="col-md-offset-2 col-md-8 col-sm-offset-1 col-sm-10 col-xs-12 book-no">
					<div class="col-md-7 col-sm-7 col-xs-7 padd_l_r">
						<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 padd_l_r">
							<i class="fa fa-ticket book-fa-ticket" aria-hidden="true"></i>
						</div>
						<div class="col-lg-11 col-md-11 col-sm-10 col-xs-11 padd_l_r">	
							<?php /*?><span class="book-avail">No. Of Tickets Available <?php echo $max_ticket_available; ?></span><?php */?>
						</div>
					</div>
					<div class="col-md-5 col-sm-5 col-xs-5 padd_l_r">
						<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 padd_l_r">
							<i class="fa fa-inr book-fa-inr" aria-hidden="true"></i>
						</div>
						<div class="col-lg-11 col-md-11 col-sm-10 col-xs-11 padd_l_r">
						<?php //$price_per_head=1; ?>
						<input type="hidden" id="max_price" value="">
							<span class="book-avail">Ticket Price Rs : <?php echo $this->request->data['total_cost']; ?></span>
						</div>
					</div>
				</div>
			</div>
		<div class="col-md-12 col-sm-12 col-xs-12 padd_l_r book-form-field">
				<div class="col-md-offset-2 col-md-8 col-sm-offset-1 col-sm-10 col-xs-12">
					<div class="col-md-12 col-sm-12 col-xs-12 book-vd">
            <CENTER><div id="showmsg" class="alertsuccess">&nbsp;</div></CENTER>
             <CENTER><div id="showmsg1" class="alertdanger">&nbsp;</div></CENTER>
             <CENTER><div>&nbsp;</div></CENTER>
						<div class="col-md-5 col-sm-6 col-xs-12 b_1_pd cust-xs-12" id="radio_btn">
						     <!-- <input name="user_type_id" class="radio-custom" id="radio-1" value="1" type="radio"> -->
                 <input name="user_type_id" class="radio-custom" id="radio-1" value="1" type="radio" checked="checked" onchange="Coupon();">
						     <label class="radio-custom-label" for="radio-1"><span class="b_1_check">By Coupon</span></label>
						</div>
						<div class="col-md-7 col-sm-6 col-xs-12 b_1_pd cust-xs-12">
						    <input name="user_type_id" class="radio-custom" id="radio-2" value="2" type="radio" checked="checked" onchange="Coupon();">
						    <label class="radio-custom-label" for="radio-2"><span class="b_1_check">By Credit/Debit Card</span></label>
					    </div>
					</div>
           <div class="col-md-12 col-sm-12 col-xs-12 book-vd" id="coupon" style="display:none;">         
              <div class="form-group">
                <input class="form-control book-input book-sprite" id="coupon_value" type="text" value="" placeholder="Please Enter Coupon id">
              </div>
          </div>
				     <div class="col-md-12 col-sm-12 col-xs-12 book-vd" id="credit">					
							<div class="form-group">
							  <!--<input class="form-control book-input book-sprite" id="reg_t_id" type="text" value="" placeholder="Enter Required Tickets" onkeyup="myFunction();">-->
                              <input class="form-control book-input book-sprite" id="" type="text" value="<?php echo $class['VendorClasseLocationDetail']['0']['location']; ?>">
                              
                             <?php /*?> <input type="text" value="<?php echo $class['VendorClasseLocationDetail']['0']['location']; ?>" /><?php */?>
							</div>
					</div>
					
					<div class="form-group">
					  <div class="col-md-12 col-sm-12 col-xs-12 book-rupee">
					  	<i class="fa fa-inr book-r" aria-hidden="true"></i>
             <input type="hidden" name="" id="amount_copan" value="<?php echo $this->request->data['total_cost']; ?>"/> 
					  	<span class="book-total" id="tp_rs"> Total Price: Rs. <?php echo $this->request->data['total_cost']; ?>/- </span>
					  </div>
					</div>
					</div>
					</div>
					<div class="col-md-12 col-sm-12 col-xs-12">
				<!-- Start For Pey -->
					<?php 
						$PAYU_BASE_URL = "https://secure.payu.in";
						//$PAYU_BASE_URL = "https://test.payu.in";
						$action = $PAYU_BASE_URL . '/_payment';  
					?>
						<form action="<?php echo $action; ?>" method="post" name="payuForm">
							  <input type="hidden" name="key" id="key" value="hF6qmoBJ" />
							  <input type="hidden" name="hash" id="hash" value=""/>
							  <input type="hidden" name="txnid" id="txnid" value="<?php echo $txnid; ?>" />
							  <input type="hidden" name="amount" id="amount" value="<?php echo $this->request->data['total_cost']; ?>"/>
							  <input type="hidden" name="firstname" id="firstname" value="<?php echo $class['User']['first_name']?>" />
							  <input type="hidden" name="email" id="email" value="<?php echo $email; ?>" />
							  <input type="hidden" name="phone" id="phone" value="<?php echo $mobile; ?>"/>
                             <textarea name="productinfo" id="productinfo" style="display:none;"><?php echo $class['VendorClasse']['class_topic'];?></textarea> 
                              <input type="hidden" name="udf1" id="udf1" value="<?php if(!empty($user_id)): echo $user_id; endif; ?>"/>
                             <input type="hidden" name="udf2" id="udf2" value="<?php echo $class_id; ?>"/>
                              <input type="hidden" name="udf3" id="udf3" value="<?php echo $locality_id; ?>"/>
							  <textarea name="udf4" id="udf4" style="display:none;"><?php echo $ticket; ?></textarea>
							  <input type="hidden" name="surl" id="surl" value="<?php echo HTTP_ROOT; ?>/vendor_classes/paySuccess" size="64" />
							  <input type="hidden" name="furl" id="furl" value="<?php echo HTTP_ROOT; ?>/Homes/payFailure" size="64" />
							  <input type="hidden" name="service_provider" id="service_provider" value="payu_paisa" size="64" />
                              
							  <div class="col-md-offset-2 col-md-8 col-sm-offset-2 col-sm-8 col-xs-offset-2 col-xs-8 book-proceed cust-xs-offset-2" id="pay_submit" style="display:none;">
								<center><input type="submit" value="Proceed to payment" class="btn book-pr-pay" /></center>
								</div>
              </form>
             
               <div id="paycoupon" class="col-md-offset-2 col-md-8 col-sm-offset-2 col-sm-8 col-xs-offset-2 col-xs-8 book-proceed cust-xs-offset-2" style="display:none;">
                 <center><button id="payfor_Coupon" class="btn book-pr-pay">Submit</button></center>
                </div>

              <div class="col-md-offset-2 col-md-8 col-sm-offset-2 col-sm-8 col-xs-offset-2 col-xs-8 book-proceed cust-xs-offset-2">
                <center><button id="pay" class="btn book-pr-pay">Confirm</button>
                </center>
               </div>
						</div>
					<!-- End Pay -->
			<!-- End -->
        

          <!-- ******************work ****************** -->
</div>
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="background-color:#2bcdc1;">
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>

<h4 class="modal-title cat_mod_title">Please Enter Your Details</h4>
</div>
<div class="modal-body">

<div class="">&nbsp;</div>
<div id="guest1">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padd_l_r">
      <input class="" name="gift_f_type" id="gift_f_type" type="hidden" value="">
       <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
          <div class="radio pull-right">
            <label>
                <input type="radio" name="optradio" value="1" id="book_1">
                  <span class="connt_flex_middle_text">Continue As Guest
                  </span>
            </label>
          </div>
      </div>
      <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
        <div class="radio pull-left">
          <label>
            <input type="radio" name="optradio" value="2" id="book_2">
              <span class="connt_flex_middle_text" >Login And Continue
              </span>
          </label>
          </center>
        </div>
      </div>    
    </div>
</div>
<div class="">&nbsp;</div>
                  <!-- For Guest -->
                      <div id="guest" style="display:none;">
                         
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                  <div class="col-md-3 col-sm-3 col-xs-12">
                                      <span class="">Name</span>
                                  </div>
                                  <div class="col-md-9 col-sm-9 col-xs-12">

                                    <div class="form-group ">
                                      <input class="form-control" id="nameUser" name="name" placeholder="Enter Name" 
                                      type="text" >
                                      <span id="name_error" class="error-gift">&nbsp;</span>
                                    </div>

                                  </div>

                                  
                                </div>  
                                  <div class="col-md-12 col-sm-12 col-xs-12">
                                  <div class="col-md-3 col-sm-3 col-xs-12">
                                      <span class="">Email</span>
                                  </div>
                                  <div class="col-md-9 col-sm-9 col-xs-12">

                                    <div class="form-group ">
                                      <input class="form-control" id="emailuser" name="email1" placeholder="Enter Email" type="text" onblur="emailchkguest();">
                                      <span id="email_user_error" class="error-gift">&nbsp;</span>
                                    </div>

                                  </div>
                                  
                                  
                                </div> 
                                 <div class="col-md-12 col-sm-12 col-xs-12">
                                  <div class="col-md-3 col-sm-3 col-xs-12">
                                      <span class="">Mobile No.</span>
                                  </div>
                                  <div class="col-md-9 col-sm-9 col-xs-12">

                                    <div class="form-group ">
                                      <input class="form-control " id="mobile_no" name="mobile" placeholder="Enter Mobile Number" 
                                      type="text" maxlength="10" >
                                      <span id="mobile_error" class="error-gift">&nbsp;</span>
                                    </div>

                                  </div>
                                  
                                  
                                </div> 
                              </div>
                  <!-- End Guest and  Login Start-->
                    <div id="as_login" style="display:none;">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                   <div class="col-md-3 col-sm-3 col-xs-12">&nbsp;</div>
                                   <div class="col-md-9 col-sm-9 col-xs-12">
                                    <div id="invalid_up" class="error-gift">&nbsp;</div>
                                   </div>
                                 </div>
                                   <div class="col-md-12 col-sm-12 col-xs-12">
                                  <div class="col-md-3 col-sm-3 col-xs-12">
                                      <span class="">Email Id</span>
                                  </div>
                                  <div class="col-md-9 col-sm-9 col-xs-12">

                                    <div class="form-group ">
                                      <input class="form-control " id="email_login" name="email_login" placeholder="Enter Email Id" 
                                      type="text" onblur="emailchklogin();">
                                      <span id="email_error_login" class="error-gift">&nbsp;</span>
                                    </div>

                                  </div>

                                  
                                </div>  
                                  <div class="col-md-12 col-sm-12 col-xs-12">
                                  <div class="col-md-3 col-sm-3 col-xs-12">
                                      <span class="">Password</span>
                                  </div>
                                  <div class="col-md-9 col-sm-9 col-xs-12">

                                    <div class="form-group ">
                                      <input class="form-control" id="password_login" name="password_login" placeholder="Please Enter Password" 
                                      type="password" onkeyup="passchklogin();">
                                      <span id="password_error_login" class="error-gift">&nbsp;</span>
                                    </div>

                                  </div>
                                  
                                  
                                </div> 
                                 <div class="col-md-12 col-sm-12 col-xs-12" id="phone_login" style="display:none;">
                                  <div class="col-md-3 col-sm-3 col-xs-12">
                                      <span class="">Mobile No.</span>
                                  </div>
                                  <div class="col-md-9 col-sm-9 col-xs-12">

                                    <div class="form-group ">
                                      <input class="form-control " id="mobile_no_login" name="mobile" placeholder="Enter Mobile Number" 
                                      type="text" maxlength="10"  value="<?php echo $user_view['UserMaster']['mobile'];?>">
                                      <span id="mobile_login_error" class="error-gift">&nbsp;</span>
                                    </div>

                                  </div>
                                  
                                  
                                </div> 
                                 
                              </div>
                  <!-- End Login -->
                  <div class="modal-footer" style="border-top:none;">
                          <center>
                              <span id="login_btn">
                                <button style="background-color:#2bcdc1;border:none;" type="button" class="btn btn-primary" id="loginUser">Login</button>
                              </span>
                             <span id="guest_btn">
                                <button style="background-color:#2bcdc1;border:none;" type="button" class="btn btn-primary" id="submitUser"> Submit </button>
                           </span> 
                           <span id="guest_login_btn">
                            <button type="button" style="background-color:#2bcdc1;border:none;"  class="btn btn-primary" id="cancelUser"> Cancel </button> 
                          </span>
                      </center>
                </div>
</div> 
</div> 
    </div>
    </div> 
          
           
</div>

<script type="text/javascript">
$(document).ready(function(){
	 $('#login_btn').hide();
    $(document).on('click','#book_1',function(){
      
          $('#as_login').hide();
          $('#login_btn').hide();
          $('#guest').show();
          $('#guest_btn').show();
          $("#guest_login_btn").show();
          
    });
        $(document).on('click','#book_2',function(){
 
           $('#guest').hide();
           $('#guest_btn').hide();
           $('#as_login').show();
           $('#login_btn').show();
           $("#guest_login_btn").show();

        });
});

</script>
<script type="text/javascript">
function passchklogin(){
                
      $('#password_error_login').html('');
          
}
</script>
<script>
$('#submitUser').click(function(){
	
  $('#submitUser').click(function(){

    var regemail = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
    //alert('hi');
    var first_name_user = $('#nameUser').val();
    var email           = $('#emailuser').val();
    var phone           = $('#mobile_no').val();
  //alert(first_name_user);
  if(first_name_user==''){
       
       $('#name_error').html('Please Enter Your name');
        /*$('#name_error').css('color','red');*/
        return false;
  }
  else if(email==''){
   
    $('#email_user_error').html('Please Enter email address');
    /*$('#email_error').css('color','red');*/
    return false;

  }
   
else if(regemail.test(email) == false){ 


      $('#email_user_error').html('Please enter valid e-mail address!'); 
      return false;
  }
  else if(phone==''){
   
    $('#mobile_error').html('Please Enter Your Phone Number');
    
    return false;
   }

   else{
		$('#firstname').val(first_name_user);
		$('#email').val(email);
		$('#phone').val(phone);
		$('#myModal').modal('hide');
   }
 });
 
	});
</script>
<script type="text/javascript">
$('#cancelUser').click(function(){
   $('#myModal').modal('hide');
})
</script>
<script type="text/javascript">
function myFunction() {

  var reg_id      = $('#reg_t_id').val();
  var maxprice    = $('#max_price').val();
  var total_price = maxprice*reg_id;
  
    //alert(total_price);
    //$("#total_price").append("<b>Appended text</b>");
    $('#tp_rs').empty()
    $('#tp_rs').append('Total Price: '+total_price+'.00/-');
    $('#amount').val(total_price);
    //$('#tp_rs').last().remove();
}
</script>
<script type="text/javascript">
$("#reg_t_id").keypress(function (e) {
          if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        //$("#errmsg").html("Digits Only").show().fadeOut("slow");
    return false;
    }
   });
</script> 
<script type="text/javascript" >
$(function() {
$('#pay').on('click',function(){
  
//$("#radio_btn").hide();
var amount          = $("#amount").val();
var firstname       = $("#firstname").val();
var email           = $("#email").val();
var phone           = $("#phone").val();
var productinfo     = $("#productinfo").val();
var key             = $("#key").val();
var hash           = $("#hash").val();
var txnid           = $("#txnid").val();
var surl            = $("#surl").val();
var furl             = $("#furl").val();
var service_provider = $("#service_provider").val();
var udf1 = $("#udf1").val();
var udf2 = $("#udf2").val();
var udf3 = $("#udf3").val();
var udf4 = $("#udf4").val();
//var pay_type ='2';
//var pay_type ='2';
var user_id    =  $("#user_id").val();
var user_login = $('#login_user').val();
var class_id   =  $("#class_id").val();
var radioValue =  $("input[name='user_type_id']:checked").val();
var tran_id = 1;

if(email == '' || phone == '' || firstname == ''){
		          $('#myModal').modal({
                                show: true,
                                backdrop: 'static',
                                keyboard: false
                            }
                        );
	} else {
  
		$.ajax({  
		type: "POST",  
		url: "<?php echo HTTP_ROOT; ?>/vendor_classes/save_book",  
		data: 'key='+ key+'&amount='+ amount +'&firstname='+firstname+'&email='+email+'&phone='+phone+'&productinfo='+productinfo+'&txnid='+txnid+'&hash='+hash+'&surl='+surl+'&furl='+furl+'&service_provider='+service_provider+'&user_id='+user_id+'&class_id='+class_id+'&user_type_id='+radioValue+'&tran_id='+tran_id+'&udf1='+udf1+'&udf2='+udf2+'&udf3='+udf3+'&udf4='+udf4,  
		success: function(loginmsg){  
			//$("#status1").html('');
		  //alert(loginmsg);
		  if(!loginmsg==''){
			$('#pay').hide();
			$('#pay_submit').show();
			var l = loginmsg.split("*");
		var txnid = l[0];
		var hash = l[1];
		 $('#txnid').val(txnid);
		$('#hash').val(hash);
		  }
		
		}
		}); 
	}
});
});
</script>
<script>
$(function() {
$('#loginUser').click(function(){
var regemail = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
  var email_login      = $('#email_login').val();
  var password_login   = $('#password_login').val();
  var phone_u_login    = $('#mobile_no_login').val();
  //alert(phone_u_login);
  if(email_login==''){
   
      $('#email_error_login').html('Please Enter email address');
      
      return false;
}
else if(regemail.test(email_login) == false){ 

      $('#email_error_login').html('Please enter valid e-mail address!'); 
      return false;
  }
  else if(password_login==''){
   
    $('#password_error_login').html('Please Enter Password');
    
    return false;
   }
else{
    
      $.ajax({  
            type: "POST",  
            url: "<?php echo HTTP_ROOT; ?>/Homes/book_now_login",  
            data: 'email='+email_login+'&password='+password_login+'&phone='+phone_u_login,  
            success: function(login_respon){
                  if(login_respon==0){
                    $('#invalid_up').html('Invalid Username or Password');
                    $('#myModal').modal('show');
                  }
                  else{
					var res_login      = login_respon.split("*"); 
                    var fname_user     = res_login[0];
                    var email_user     = res_login[1];
                    var phone_user     = res_login[2];
					var u_id = res_login[3];
                    var chk_login_user = res_login[4];
                    //alert(chk_login_user);
                    if(login_respon==2){
                      alert('Please Update Your Mobile NO');
                      $("#phone_login").show();
                      $("#mobile_no_login").focus();
                      return false;
                    }
                     fname_user = fname_user.trim();
                     email_user = email_user.trim();
                     phone_user = phone_user.trim();
					  u_id = u_id.trim();
                     $('#firstname').val(fname_user);
                     $('#email').val(email_user);
                     $('#phone').val(phone_user); 
					 $('#udf1').val(u_id); 
                                          
                    if(chk_login_user==1){
                      alert('successfully login please continue processing');
                    		$('#myModal').modal('hide');
					  }
                } 
			}
           
          });
    
   			}
		});
 	});
</script>
<script type="text/javascript">
$(window).load(function() {
//alert('h');
var amount          = '';
var firstname       = '';
var email           = '';
var phone           = '';
var productinfo     = '';
var key             = '';
var hash           = '';
var txnid           = '';
var surl            = '';
var furl             = '';
var service_provider = '';
//var pay_type ='2';
var user_id    =  $("#user_id").val();
var class_id   =  $("#class_id").val();
var radioValue =  $("input[name='user_type_id']:checked").val();
var tran_id = 0;
  
$.ajax({  
    type: "POST",  
    url: "<?php echo HTTP_ROOT; ?>/Homes/saveBookclass",  
    data: 'key='+ key+'&amount='+ amount +'&firstname='+firstname+'&email='+email+'&phone='+phone+'&productinfo='+productinfo+'&txnid='+txnid+'&hash='+hash+'&surl='+surl+'&furl='+furl+'&service_provider='+service_provider+'&user_id='+user_id+'&class_id='+class_id+'&user_type_id='+radioValue+'&tran_id='+tran_id,  
    success: function(pey_respon){  
        //$("#status1").html('');
      //alert(pey_respon);
	  var q = pey_respon;
    var l = q.split("*");
    var txnid = l[0];
    var txnid1 = l[1];
    $('#txnid').val(txnid);
	
	if(txnid!=''){
			//pey();
	}
   // $('#hash').val(txnid1);

     // alert(txnid1);
    } 
   
  });
  
 });
</script>
<script type="text/javascript">
function Coupon() {

//alert('hi');
var radioValue    =$("input[name='user_type_id']:checked").val();
      //alert(radioValue);
      if(radioValue==1)
        {
            $("#coupon").show();
            $("#paycoupon").show();
            $("#pay").hide();
            $("#credit").hide();
            $("#pay_submit").hide();
            
            
        }
     else if(radioValue==2)
      {
          
          $("#pay").show();
          $("#coupon").hide();
          $("#paycoupon").hide();
           $("#credit").show();
           $("#pay_submit").hide();
      }
}
$('#radio_1').click(function(){
  $('#guest').show();
})
$('#radio_2').click(function(){
  var class_id=<?php echo $class_id;?>;
  
  window.location.href="<?php echo HTTP_ROOT;?>Homes/login/"+btoa(class_id)+"/"+"login";
})

</script>
<script type="text/javascript">
$(function() {
$("#payfor_Coupon").click(function() {
  //alert('h');
  var radioValue       = $("input[name='user_type_id']:checked").val();
  var amount_coupan           = $("#amount_copan").val();
  var coupon_value     = $("#coupon_value").val();
  var class_id         = $("#class_id").val();
  var no_of_ticket     = $("#reg_t_id").val();
  //var tot_ticket     = $("#udf4").val();
  var status = 2;
  var book_id= $("#book_id").val();

$.ajax({  
    type: "POST",  
    url: "<?php echo HTTP_ROOT; ?>/Homes/saveCoupon",  
    data: 'coupon_number='+coupon_value+'&payment_amt='+amount_coupan+'&payment_type='+radioValue+'&status='+status+'&class_id='+class_id+'&no_of_ticket='+no_of_ticket+'&booking_id='+book_id,  //+'&tot_ticket='+tot_ticket
    success: function(Coupon_respone){  
        //$("#status1").html('');
    //alert(Coupon_respone);
      if(Coupon_respone==5){
        $("#showmsg").html('The coupon is invalid for this class');
        return false;
      }
      else if(Coupon_respone==1){
        //$("#showmsg").html('Your Class Booked Successfully');
        window.location.assign('<?php echo HTTP_ROOT; ?>/Homes/coupanDetail/'+class_id)
        return false;
      }
      else if(Coupon_respone==4){

        $("#showmsg").html('Invalid Coupon Code');
        return false;
      }
       else if(Coupon_respone==2){

        $("#showmsg").html('You do not have sufficient balance to purchase the class.');
        return false;
      }
      else if(Coupon_respone==3){

        $("#showmsg").html('Sheet not available!');
        return false;
      }
      else if(Coupon_respone==6){

        $("#showmsg").html('Your coupon has been expired!');
        return false;
      }
   }
  }); 
});
});
</script>
