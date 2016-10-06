<?php $user_data=$this->Session->read('User');?>

<!-- Braingroom modifications --><style>
 option:hover, 
         option:focus, 
        option:active, 
         option:checked
            {
                background: linear-gradient(#33B9B4,#33B9B4);
                background-color: #33B9B4; /* for IE */
            }
 option:hover, 
         option:focus, 
        option:active, 
         option:checked
            {
                background: linear-gradient(#33B9B4,#33B9B4);
                background-color: #33B9B4; /* for IE */
            }

            input:-moz-placeholder { /* Firefox 18- */
                color: #555 !important;  
                }
                 
                input::-moz-placeholder {  /* Firefox 19+ */
                color: #555 !important;  
                }
                 
                input:-ms-input-placeholder {  
                color: #555 !important;  
                }
                input::-webkit-input-placeholder {
                    color: #555 !important;  
                }
                .btn-group > .btn:first-child {
                        margin-left: 0px;
                        height: 45px;
                       /*border-color: #f;*/
                       border: 2px solid #959595;
                       border-radius: 10px;
                    
                    }
                .btn-group, .btn-group-vertical {
                    position: relative;
                    display: inline-block;
                    vertical-align: middle;
                    width: 100%;
                    }
                    
                .btn-group > .btn {
                    position: relative;
                    float: left;
                    width: 100%;
                    }
                    .dropdown-menu{
                    height: 300px;
                    padding: 0px 20px; 
                    width: 360px;
                    line-height: block;
                    overflow-y: scroll;
                }
                .multiselect-selected-text {
                        float: left;
                    }
                    .btn .caret {
                    margin-left: 10px;
                    float: right;
                    margin-top: 7px;
                    display: none;
                }
</style>  <!-- Braingroom modifications -->
<style type="text/css">
.carimg {
    top: -54px;
    margin-right: 9px !important;
    margin-left: -13px;
}

.carimg2 {
    top: -33px;
    margin-right: 9px !important;
    margin-left: -13px;
}

.carimg2 {
    left: 93%;
    position: relative;
}
.carimg2 img {
    width: 16px;
}

.carimg3 {
    top: -31px;
    margin-right: 9px !important;
    margin-left: 353px;
}

.carimg3 img {
    width: 16px;
}
.carimgsize3
{
    margin-top: -65px;
}
.pc_error{
	
	color: #A94442;
}
.sclass
{
padding: 15px 35px; text-align: center;
}
.cc
{
color:#1B191A;float: left;
}
.pop_cal {
    margin-top: 15px;
    width: 19px !important;
    margin-left: -9px;
}
.pop_time
{
	width: 20px;
    margin-top: 20px;
}

.pc_sub_class {
    background: #38C6C0 none repeat scroll 0px 0px !important;
    border: 0px none !important;
    border-radius: 10px !important;
    color: #FFF !important;
    font-family: "os_Regular" !important;
    padding: 9px 35px !important;
    text-shadow: 1px 0px 1px #ECE3E2 !important;
    margin-left: 35px;
}
.bdrsessn {
    border: 1px solid #000;
    padding: 10px;
    background-color:;
}
.lri_cal{

   margin-right: 218px;
    margin-top: 22px;
}
.lri_cal_2{
	margin-right: 245px;
    margin-top: 19px;
    width: 16px !important;
}
.drp_pop{
    margin-top: 24px;
    margin-left: 12px;
}
</style>

  <div class="col-md-10 col-sm-9 col-xs-12 ruth6542 ruth654786">
    <div class="col-md-12 col-sm-12 col-xs-12 sr_pv_padding_lr" style="background:#fff;padding-bottom:30px;">
        <div class="col-md-12 col-sm-12 col-xs-12 clrdash123 ruth1">
            <div class="col-md-3 col-sm-3 col-xs-4 bar321 bar786">
                <div><i class="fa fa-bars dshclr12" style="display:none;"></i><img src="<?php echo HTTP_ROOT;?>/img/profile_img/user.png" class="user432"><span class="dashbrd12 prf543">POST CLASSES</span></div>
            </div>
            <!-- Start Top Right bar -->
         		<?php echo $this->Element('mainpage_top_right_ber'); ?>
         	<!-- Start Top Right bar -->
        </div>

        <div class="col-md-12 col-sm-12 col-xs-12 sr_pv_padding_lr"> 

        	<?php echo $this->Session->flash();  ?>
                
        	<!-- class code -->
   			<div class="col-md-12 col-sm-12 col-xs-12" style="border-bottom: 2px solid #043D7B">
	            <div class="col-xs-12 col-sm-12" style="margin-top: 10px; margin-bottom: 10px;">
	                <span class="faq_home01">Class Form</span>
	            </div>
	        </div> 
	        <!-- form code -->
	        <div class="col-md-12 col-sm-12 col-xs-12 faq_width02 sr_pv_padding_lr01" style="margin-top: 30px; margin-bottom: 30px;">
	        	<div class="col-md-12 col-sm-12 col-xs-12 sr_pv_padding_lr01" style="border: 1px solid rgb(194, 192, 193); background: rgb(247, 245, 246) none repeat scroll 0% 0%;" >
	        		<div class="col-md-12 col-sm-12 col-xs-12 sr_pv_padding_lr01" style="margin-top: 50px; margin-bottom: -53px; ">
	        			<!-- Start Form  -->
	        			<!-- <form action="savepostClass" name="frm" method="post" enctype="multipart/form-data"> -->

	        				<form action="create" name="frm" method="post" enctype="multipart/form-data"  onsubmit="return validateForm()">
                         
	        				<!-- 1st -->
	        				<div class="col-sm-12 col-xs-12 sr_pv_padding_lr">
			        			<div class="col-sm-12 col-xs-12">
				                    <span class="faq_t_q01" style="color:#1B191A;">Basic Class Information</span>
				                </div>
				                <div class="col-sm-12 col-xs-12 sr_pv_padding_lr01" style="margin-top: 20px; margin-bottom: 20px;"> 
				                	<div class="col-sm-12 col-xs-12 col-md-6"> 
				                		<div class="col-sm-12 col-xs-12" style="margin-top: 20px;">
					                		<div class="form-group" style="margin-bottom: 5px;">
											<select  class="form-control reg_input" name="category_id" id="category_id" onchange="show_subcat();">
													<option value="">Choose Class Category</option>
														<?php
								                			foreach ($all_main_cat as $key => $value_cat) {

								                				$cat_id=$value_cat['Category']['id'];
																$cat_name=$value_cat['Category']['category_name'];

												      ?>
												      <option value="<?php echo $cat_id; ?>"><?php echo $cat_name; ?></option>
														<?php
													}
													?>
												</select>
												<div id="s1" class="pc_error">&nbsp;</div>							
																	
												<span class="carimg"><img src="<?php echo HTTP_ROOT; ?>/img/caret.png"></span>
										        <p class="err_css" id="error_01" style="padding-top:0px;padding-left:10px;"></p>
											</div>
					                	</div>

                                    <div class="col-sm-12 col-xs-12" style="margin-top: 0px;">
                                        <div class="form-group" style="margin-bottom: 5px;">
                                            <textarea type="text" row="5" name="about_class" class="form-control pc_texta reg_input" placeholder="About Class" id="about_class"></textarea>
                                            <div id="ab_1" class="pc_error">&nbsp;</div>
                                    
                                    
                                            <p id="error_01" style="padding-top:20px;padding-left:10px;" class="err_css"></p>
                                        </div>
                                    </div>
					                	<div class="col-sm-12 col-xs-12" style="">
					                		<div class="form-group br_state" style="margin-bottom: 10px;">
					                			<input class="form-control reg_input" name="class_topic"placeholder="Class Topic" type="text" id="class_topic">	
	    										<p class="err_css" id="error_mobile" style="padding-left: 10px; padding-top: 20px; margin-bottom: 5px;"></p>
	    										<div id="s3" class="pc_error">&nbsp;</div>
							                </div> 
							            </div> 
	
<<<<<<< HEAD
<div class="col-sm-12 col-xs-12" style="">
=======
    <div class="col-sm-12 col-xs-12" style="">
>>>>>>> f528325b924d743d6309aa636dc9efac5fb60a1e
					                		<div class="form-group br_state" style="margin-bottom: 10px;">
					                			
                                                <select class="form-control reg_input" name="is_type" id="is_type">
                                                <option value="">--Select Target Audience--</option>
                                                <option value="1">B2C</option>
                                                <option value="2">B2B</option>
                                                </select>
	    										<p class="err_css" id="error_mobile" style="padding-left: 10px; padding-top: 20px; margin-bottom: 5px;"></p>
	    										<div id="is_3" class="pc_error">&nbsp;</div>
							                </div> 
							            </div>
                                        
                                        
            
        
					                	<div class="col-sm-12 col-xs-12" style="">
					                		<div class="form-group class_type" style="margin-bottom: 5px;">
					                			
												<select  class="form-control reg_input" name="class_type_id[]" id="class_type_id">
														<?php
								                			foreach ($all_class_type as $key => $value_class_type) {

								                		$class_id   =$value_class_type['ClassType']['id'];
														$class_name =$value_class_type['ClassType']['types'];

												      ?>
												      <option value="<?php echo $class_id; ?>"><?php echo $class_name; ?></option>
														<?php
													}
													?>
												</select>
												<div id="class_5" class="pc_error">&nbsp;</div>							
																	
												<span class="carimg"><img src="<?php echo HTTP_ROOT; ?>/img/caret.png"></span>
										        <p class="err_css" id="error_01" style="padding-top:0px;padding-left:10px;"></p>
											</div>
					                	</div>
                                       
					            	</div><!-- 1st 6 -->

					            	<div class="col-sm-12 col-xs-12 col-md-6">
<!-- Braingroom modifications 16/07/2016 -->		<div class="col-sm-12 col-xs-12 pc_side2_m_top" style="" id="sub_cat_id">
					                		<div class="form-group" style="margin-bottom: 5px;" >
					                			<div class="form-group" >
												<select  class="form-control reg_input" name="segment_id" id="segment_id">
															<option >Select Class Segments</option>										
												</select>
												</div>	
												<div id="SS-2" class="pc_error">&nbsp;&nbsp;</div>					
																	
												<span class="carimg" style="top:-67px;"><img src="<?php echo HTTP_ROOT; ?>/img/caret.png"></span>
										        <p class="err_css" id="error_01" style="padding-top:0px;padding-left:10px;"></p>
											</div>
					                	</div>
<!-- Braingroom modifications 16/07/2016 -->
					                	<div class="col-sm-12 col-xs-12" style="margin-top: 0px;">
					                		<div class="form-group" style="margin-bottom: 5px;">
					                			<textarea type="text" row="5" name="class_summary" class="form-control pc_texta reg_input" placeholder="Class Summary" id="class_summary"></textarea>
					                			<div id="s4" class="pc_error">&nbsp;</div>


										        <p id="error_01" style="padding-top:20px;padding-left:10px;" class="err_css"></p>
					                		</div>
					                	</div>
                                        <div class="col-sm-12 col-xs-12" style="margin-top: 0px;">
					                		<div class="form-group" style="margin-bottom: 5px;">
					                			<textarea type="text" row="5" name="about_academy" class="form-control pc_texta reg_input" placeholder="About Academy" id="about_academy"></textarea>
					                			<div id="ac_1" class="pc_error">&nbsp;</div>


										        <p id="error_01" style="padding-top:20px;padding-left:10px;" class="err_css"></p>
					                		</div>
					                	</div>
                                        
                                        	
                                        <div class="col-sm-12 col-xs-12" style="margin-top: 0px;">
					                		<div class="form-group js-b2c-group hide" style="margin-bottom: 5px;">
                <select  class="form-control reg_input" name="group_id[]" id="group_id" multiple="multiple">
														<?php
								                			foreach ($ConnectGroup as $key => $group) {
												      ?>
	<option value="<?php echo $group['ConnectGroup']['id']; ?>"><?php echo $group['ConnectGroup']['group_name']; ?></option>
														<?php
													}
													?>
												</select>
					                			<div id="s4" class="pc_error">&nbsp;</div>


										        <p id="error_01" style="padding-top:20px;padding-left:10px;" class="err_css"></p>
					                		</div>
					                	</div>
					            	</div>
				                </div>
				            </div>

				            <!-- 2nd -->







                           
				            <div class="col-sm-12 col-xs-12 sr_pv_padding_lr">
                             <div class="js-b2b-schedule">
			        			<div class="col-sm-12 col-xs-12">
				                    <span class="faq_t_q01" style="color:#1B191A;">Schedules & Duration</span>
				                </div>
				                <div class="col-sm-12 col-xs-12 sr_pv_padding_lr01" id="s_duration1" style="margin-top: 20px; margin-bottom: 20px;"> 
				                	<!-- 1st  6 -->
				                	<div class="col-sm-12 col-xs-12 col-md-12"> 
				                		<!-- 1st -->
				                		<div class="col-sm-12 col-xs-12 col-md-6" style="padding-left:0px;">
					                		<div class="form-group">
												<select  class="form-control reg_input" name="class_timing_id" id="class_timing_id" onchange="schedules();">
													<option value="">Choose Class Schedules</option>
													<option value="1">Flexible</option>
													<option value="2">Fixed</option>
													
												</select>
												<div id="s6" class="pc_error">&nbsp;</div>							
																	
												<span class="carimg"><img src="<?php echo HTTP_ROOT; ?>/img/caret.png"></span>
										        <p class="err_css" id="error_01" style="padding-top:0px;padding-left:10px;"></p>
											</div>
					                	</div>
										
										<div class="col-sm-12 col-xs-12 col-md-6">
										<div class="col-sm-12 col-xs-12 col-md-12" style="padding-right:0px; padding-left:0px;">
										<div class="col-sm-6 col-xs-6 col-md-6" style="padding-right:2px; padding-left:0px;">
										<div class="form-group">
											<input  class="form-control reg_input" name="duration" placeholder="Enter Duration" type="text" id="duration">
											<div id="s11" class="pc_error">&nbsp;</div>
											</div>
										 </div>
									 <div class="col-sm-6 col-xs-6 col-md-6" style="padding-right:0px; padding-left:8px;">
									      <div class="form-group">
												<select  class="form-control reg_input" name="time_day" id="time_day">
													<option value="">Choose Hrs/Days</option>
													<option value="Day">Days</option>
													<option value="Hour">Hours</option>
												</select>							
																	
												<span class="carimg2"><img src="<?php echo HTTP_ROOT; ?>/img/caret.png"></span>
										        <p class="err_css" id="error_01" style="padding-top:0px;padding-left:10px;"></p>
											</div>
									  </div>
										</div>
					                	</div>
											<!--<div class="col-sm-6 col-xs-6 col-md-6" style="">
					                		<div class="form-group">
												<select  class="form-control reg_input" name="time_day" id="time_day">
													<option value="">Choose Hrs/Day</option>
													<option value="Day">Day</option>
													<option value="Hour">Hour</option>
												</select>							
																	
												<span class="carimg2"><img src="<?php echo HTTP_ROOT; ?>/img/caret.png"></span>
										        <p class="err_css" id="error_01" style="padding-top:0px;padding-left:10px;"></p>
											</div>
					                	</div>-->
										</div>
										
										<div class="col-sm-12 col-xs-12 col-md-6" style="" id="s_date1">
					                		<div class="form-group">
                    							<input  class="form-control reg_input" name="starting_month" id="datepicker1" placeholder="Starting Date (Class Validity)" type="text"> 
                    							<div id="s8" class="pc_error">&nbsp;</div> 							  
  							  					<span class="cal_b"><img src="<?php echo HTTP_ROOT; ?>/img/cal.png"></span>
  							  					<p class="err_css" id="error_01" style="padding-top:0px;padding-left:10px; margin:-10px 0 10px"></p>
  											</div>
							            </div>

										<div class="col-sm-12 col-xs-12 col-md-6" style="" id="e_date1">
					                		<div class="form-group">
                    							<input  class="form-control reg_input" name="end_month" id="datepicker2" placeholder="End Date (Class Validity)" type="text"> 
                    							<div id="s9" class="pc_error">&nbsp;</div> 							  
  							  					<span class="cal_b"><img src="<?php echo HTTP_ROOT; ?>/img/cal.png"></span>
  							  					<p class="err_css" id="error_01" style="padding-top:0px;padding-left:10px; margin:-10px 0 10px"></p>
  											</div>
							            </div>
										
										
									
					                	<!-- 2 -->
										<div class="col-sm-12 col-xs-12 col-md-6" style="">
					                		<div class="form-group">
					                			<input class="form-control reg_input" name="no_of_session" placeholder="No. of Session in a Class" type="text" id="no_of_session" onblur="inree_class();">
					                			<div id="s10" class="pc_error">&nbsp;</div>


	    										<p class="err_css" id="error_mobile" style="padding-left: 10px; padding-top: 20px; margin-bottom: 5px;"></p>
							                </div> 
							            </div> 
										
										<div class="col-sm-12 col-xs-12 col-md-6 js-class-nature hide" style="">
					                		<div class="form-group">
												<select  class="form-control reg_input" name="class_nature" id="class_nature">
													<option value="">Choose Class </option>
													<option value="1">Single Class</option>
													<option value="2">Multiple Class</option>
												</select>
												<div id="s7" class="pc_error">&nbsp;</div>							
																	
												<span class="carimg"><img src="<?php echo HTTP_ROOT; ?>/img/caret.png"></span>
										        <p class="err_css" id="error_01" style="padding-top:0px;padding-left:10px;"></p>
											</div>
					                	</div>
										
										<!--Start sesstion-->
                                        <div class="js-session-single">
										<div class="col-sm-12 col-xs-12" id="section_id" style="display:none">
										
										<div class="col-sm-12 col-xs-12 sr_pv_padding_lr" id="no_session_class" style="border: 1px solid #757575; margin-bottom: 42px;">
					                	<div id="scs_1">
										<div class="col-sm-12 col-xs-12 " style="padding: 15px 35px; text-align: center;">
						                    <span class="faq_t_q01" style="color:#1B191A;float: left;">Session 1</span>
						                    <span class="faq_t_q01" style="color:#ABA9AA;">Class Schedules</span>
						                </div>
						                <div class="col-sm-12 col-xs-12 sr_pv_padding_lr">
						                	<div class="col-sm-12 col-xs-12 col-md-6">
						                		<div class="col-sm-12 col-xs-12" style="">
							                		<div class="form-group " style="margin-bottom: 5px;">
		                    							<input  class="form-control reg_input" id="session_datepicker1" name="data_1[]" placeholder="Choose Date" type="text">  							  
		  							  					<span class="cal_b"><img src="<?php echo HTTP_ROOT; ?>/img/cal.png" class="pop_cal"></span>
		  							  					<p class="err_css" id="error_01" style="padding-top:0px;padding-left:10px; margin:-10px 0 10px"></p>
		  											</div>
									            </div> 
						                	</div>
						                	<!-- 2nd -->
						                	<div class="col-sm-12 col-xs-12 col-md-6">
						                		<div class="col-sm-12 col-xs-12" style="">
							                		<div class="form-group" id="sample2" style="margin-bottom: 5px;">
													<!-- <input class="form-control reg_input" name="time_1" placeholder="Time" type="text" id="time_1" onblur="inree_class();"> -->
														<select  class="form-control reg_input" id="time_1" name="time_1[]">
															<option value="">Choose Time</option>
															<option value="9 AM">9 AM</option>
															<option value="10 AM">10 AM</option>
															<option value="11 AM">11 AM</option>
															<option value="12 PM">12 PM</option>
															<option value="1 PM">1 PM</option>
															<option value="2 PM">2 PM</option>
															<option value="3 PM">3 PM</option>
															<option value="4 PM">4 PM</option>
															<option value="5 PM">5 PM</option>
															<option value="6 PM">6 PM</option>
															<option value="7 PM">7 PM</option>
															<option value="8 PM">8 PM</option>
															<option value="9 PM">9 PM</option>
															

															
														</select>							
																			
														<span class="carimg"><img src="<?php echo HTTP_ROOT; ?>/img/caret.png" style="margin-top:23px; margin-left: 9px;"></span>
												        <p class="err_css" id="error_01" style="padding-top:0px;padding-left:10px;"></p>
													</div>
							                	</div>
						                	</div>
						                </div>
										<div class="col-sm-12 col-xs-12 sr_pv_padding_lr">
						                	<botton class="btn btn-primary pc_sub_class" id="sub_class" style="float: right; margin-right: 30px; margin-bottom: 15px;" onclick="next_session('2');">Add Session 2</botton>
						                </div>
										</div>
					                </div>
									<div class="col-sm-12 col-xs-12 col-md-3">&nbsp;&nbsp;</div>
										<?php /*?><div class="col-sm-12 col-xs-12 col-md-6 js-recurring hide">
						                		<div class="col-sm-12 col-xs-12" style="">
							                		<div class="form-group" style="margin-bottom: 5px;">
														<select  class="form-control reg_input" name="recurring_class_id" id="recurring_class_id" onchange="recurring_class_(this);">
															<option value="">Choose Recurring Classes</option>
															<option value="1">Recurring Classes (Regular-Monthly)</option>
															<option value="2">Recurring Classes (Regular-Weekly)</option>
															<option value="3">Recurring Classes (lrregular)</option>
														</select>							
																			
														<span class="carimg"><img src="<?php echo HTTP_ROOT; ?>/img/caret.png" class="drp_pop"></span>
												        <p class="err_css" id="error_01" style="padding-top:0px;padding-left:10px;"></p>
													</div>
							                	</div>
						                	</div><?php */?>
											<div class="col-sm-12 col-xs-12 col-md-3">&nbsp;&nbsp;</div>
									</div>
									</div>
                                    <div class="js-multiple-class hide">
                                    <div class="col-sm-12 col-xs-12 col-md-3">&nbsp;&nbsp;</div>
										<div class="col-sm-12 col-xs-12 col-md-6 js-recurring hide">
						                		<div class="col-sm-12 col-xs-12" style="">
							                		<div class="form-group" style="margin-bottom: 5px;">
														<select  class="form-control reg_input" id="rec_class" onchange="recurring_class();">
															<option value="">Choose Recurring Classes</option>
															<option value="1">Recurring Classes (Regular-Monthly)</option>
															<option value="2">Recurring Classes (Regular-Weekly)</option>
															<option value="3">Recurring Classes (lrregular)</option>
														</select>							
																			
														<span class="carimg"><img src="<?php echo HTTP_ROOT; ?>/img/caret.png" class="drp_pop"></span>
												        <p class="err_css" id="error_01" style="padding-top:0px;padding-left:10px;"></p>
													</div>
							                	</div>
						                	</div>
											<div class="col-sm-12 col-xs-12 col-md-3">&nbsp;&nbsp;</div>
                                    </div>
									<!--end sesstion-->
										
					                	<!--<div class="col-sm-12 col-xs-12 col-md-6" style="">
					                		<div class="form-group">

					                			<input  class="form-control reg_input" name="age_from" placeholder="Age From" type="text" id="age_from">	
												<div id="s12" class="pc_error">&nbsp;</div>				
																	
												<!--<span class="carimg"><img src="<?php //echo HTTP_ROOT; ?>/img/caret.png"></span>
										        <p class="err_css" id="error_01"></p>
											</div>
					                	</div>
										
										<div class="col-sm-12 col-xs-12 col-md-6" style="">
					                		<div class="form-group">

					                			<input  class="form-control reg_input" name="age_to" placeholder="Age To" type="text" id="age_to" onblur="compare_age()" value="">
					                			<div id="s13" class="pc_error">&nbsp;</div>
							                </div> 
							            </div> 	
					            	</div>
				                </div>
				               -->
				               <div class="col-sm-12 col-xs-12 sr_pv_padding_lr01" id="s_duration2" style="margin-top: 20px; margin-bottom: 20px;">
				                	<div class="col-sm-12 col-xs-12 sr_pv_padding_lr">
					                	<!-- 1st  6 -->
					                
						                <!-- 1st  6 -->
					               

						               
								    </div>
					                <!-- 2nd -->
					               
					                <!-- 3rd -->
					               
					               
				                </div>	
				                <!-- page 2 -->
				            </div>
							</div>
						<div class="col-sm-12 col-xs-12 sr_pv_padding_lr" style="">
						<div class="col-sm-12 col-xs-12">
						<span class="faq_t_q01" style="color:#1B191A;">Class Type & Price</span>
						</div>
						
						<div class="row" style="margin-top: 50px; margin-bottom: 0px;" > 
						<div class="col-sm-4 form-group">				
							
								<?php  
											echo $this->Form->input('age_category', array(
												'options' => array('Kids ( 4-12 )', 'Teens ( 13-19 )', 'Adults (20+)'),
												'class' => 'form-control reg_input',
												'label' => false,
												'multiple'=>"multiple",
												//'empty' => '(choose Age Category)'
											));
								?>
							
								<div id="exp" class="pc_error">&nbsp;</div>
							<p class="err_css" id="error_mobile" style="padding-left: 10px; padding-top: 20px; margin-bottom: 5px;"></p>
						</div> 
						<div class="col-sm-4 form-group" style="">
							
							<input class="form-control reg_input" name="class_tag" placeholder="Tags for Class" type="text" id="class_tag">
							<div>Pleas enter add comma after every class</div>
							<div id="s17" class="pc_error">&nbsp;</div>	
							<p class="err_css" id="error_mobile" style="padding-left: 10px; padding-top: 20px; margin-bottom: 5px;"></p>
						</div> 
						<div class="col-sm-4 form-group js-b2c-community hide" style="">
							<select  class="form-control reg_input" name="community_id[]" id="community_id" multiple="multiple" value="" data-actions-box="true"  style='overflow:auto' onblur="community(this.value)">
							<?php
								foreach ($coummunity_data as $key => $coummunity_value) {
								
								$id        = $coummunity_value['Community']['id'];
								$comm_name = $coummunity_value['Community']['community_name'];
								
							?>
							<option value="<?php echo $id; ?>"><?php echo $comm_name; ?></option>
							<?php
								}
							?>	
							</select>	
						<div id="s15" class="pc_error">&nbsp;</div>						
						
						<span class="carimg"><img src="<?php echo HTTP_ROOT; ?>/img/caret.png"></span>
						<p class="err_css" id="error_01" style="padding-top:0px;padding-left:10px;"></p>
						</div>
						</div>
                        <div class="js-b2b">
                        </div>
						 <div class="js-b2c">
                         </div>
                        
							
				            <!-- 3rd -->
				            <div class="col-sm-12 col-xs-12 sr_pv_padding_lr" style="margin-top: 50px; margin-bottom: 25px;">




				            	<div class="col-sm-12 col-xs-12">
				                    <span class="faq_t_q01" style="color:#1B191A;">Ticket & Location</span>
				                </div>
                                <div class="js-b2b-loc">
									<div class="col-sm-5 form-group" style="margin-top: 15px;">

					                			<input  class="form-control reg_input" name="max_ticket_available" placeholder="Maximum Ticket Available" type="text" id="max_ticket_available">
												<div id="s16" class="pc_error">&nbsp;</div>
												
											</div>
				                <div class="input_fields_wrap_ticket">
				                <div class="row" style="margin-top: 50px; margin-bottom: 0px;">
					                	<div class="col-sm-8 form-group" style="">

					                			<textarea type="text" row="5" name="area[]" class="form-control reg_input" placeholder="Class Location" id="area_0"></textarea>

					                			<!-- <input class="form-control reg_input" name="location" placeholder="Class Location" type="text" id="location"> -->	
					                			<div id="L-0" class="pc_error">&nbsp;</div>
	    										<p class="err_css" id="error_mobile" style="padding-left: 10px; padding-top: 20px; margin-bottom: 5px;"></p>
							            </div> 
							            <!-- 2 -->
					                	
											<div class="col-sm-3 form-group" style="margin-bottom: 0px;">
											<select id="area_id_0" name="area_id[0]" class="form-control reg_input" onblur="">
											<option value="">Select Locality</option>
											<?php foreach ($localitie as $key => $localitie_value) {
											
											$loc_id=$localitie_value['Locality']['id'];
											$loc_name=$localitie_value['Locality']['name'];
											
											?>
											<option value="<?php echo $loc_id; ?>"><?php echo $loc_name; ?></option>
											<?php
											}
											?>
											
											</select>
											<div id="LO-0" class="error_msg">&nbsp;&nbsp;</div>
											<span class="carimg"><img src="<?php echo HTTP_ROOT;?>/img/caret.png"></span>
											
											</div>
											
									</div>
					             </div>
                                 
					             <div class="form-group" style="float:right;">
												<botton class="btn btn-primary add_field_loc_button" onclick=";">Add more</botton>
											</div>
	</div>
    
    
    <div class="js-b2c-loc hide">
    <div class="col-sm-5 form-group" style="margin-top: 15px;">

					                			<input  class="form-control reg_input" name="min_ticket_available" placeholder="Minimum Ticket Available" type="text" id="min_ticket_available">
												<div id="s16" class="pc_error">&nbsp;</div>
												
											</div>
        <div class="col-sm-12 col-xs-12 col-md-12"> 
				                		<!-- 1st -->
				                		<div class="col-sm-12 col-xs-12 col-md-6" style="padding-left:0px;">
					                		<div class="form-group">
												    <?php  
                echo $this->Form->input('city', array(
                'options' => $cities,
                'class' => 'form-control reg_input',
                'label' => false,
                ));
                ?>
												<div id="c6" class="pc_error">&nbsp;</div>							
																	
												<span class="carimg"><img src="<?php echo HTTP_ROOT; ?>/img/caret.png"></span>
										        <p class="err_css" id="error_01" style="padding-top:0px;padding-left:10px;"></p>
											</div>
					                	</div>
										
										<div class="col-sm-12 col-xs-12 col-md-6">
										<div class="col-sm-12 col-xs-12 col-md-12" style="padding-right:0px; padding-left:0px;">
										<div class="col-sm-6 col-xs-6 col-md-6" style="padding-right:2px; padding-left:0px;">
										<div class="form-group">
										  <?php  
                echo $this->Form->input('region.', array(
                'options' => array('1' => 'North' , '2' => 'East', '3' => 'West', '4' => 'South'),
                'class' => 'form-control reg_input',
                'label' => false,
				'multiple'
                ));
                ?>
											<div id="r11" class="pc_error">&nbsp;</div>
                                            <span class="carimg"><img src="<?php echo HTTP_ROOT; ?>/img/caret.png"></span>
										        <p class="err_css" id="error_01" style="padding-top:0px;padding-left:10px;"></p>
											</div>
										 </div>
									 <div class="col-sm-6 col-xs-6 col-md-6" style="padding-right:0px; padding-left:8px;">
									      <div class="form-group">
												  <?php  
                echo $this->Form->input('locality_id.', array(
                'options' => $locality,
                'class' => 'form-control reg_input',
                'label' => false,
				'multiple'
                ));
                ?>		
												<span class="carimg2"><img src="<?php echo HTTP_ROOT; ?>/img/caret.png"></span>
										        <p class="err_css" id="error_01" style="padding-top:0px;padding-left:10px;"></p>
											</div>
									  </div>
										</div>
					                	</div>
											
										</div>
    </div>
    
					            	       <div class="col-sm-12 col-xs-12 sr_pv_padding_lr" style="margin-top: 20px;">
				            	<div class="col-sm-12 col-xs-12">
				                    <span class="faq_t_q01" style="color:#1B191A;">Additional Information</span>
				                </div>
				                 <div class="col-sm-12 col-xs-12 sr_pv_padding_lr01" style="margin-top: 20px; margin-bottom: 20px;"> 
				                	<!-- 1st  6 -->
				                	<div class="col-sm-12 col-xs-12 col-md-6"> 
				                		<!-- 1st -->
					                	<!-- 2 -->
					                	<div class="col-sm-12 col-xs-12" style="">
					                						                		<div class="form-group">
						  <!-- <label for="usr"><img src="images/mobile.png" class="reg_id"></label> -->
                			<?php echo $this->Form->input('class_image1', array('type'=>'file','label' => false,'div'=>false, 'class' => 'form-control boxesstyle','style'=>'display:none','id'=>'file-upload1'));?>
             
						  <input type="text" class="form-control reg_input" id="upload_photo1" placeholder="Upload PPT">
						  <div id="s18" class="pc_error">&nbsp;</div>
						  <span class="cal_br cal_br_s2"><img src="<?php echo HTTP_ROOT;?>/img/browse.png" id="img_click1" style="margin-top: 20px;"></span>
						 
							
						</div>

							            </div> 
							            <!-- 2 -->
							            <div class="col-sm-12 col-xs-12 pc_ma-top" style="">

					                		<div class="form-group">
						  <!-- <label for="usr"><img src="images/mobile.png" class="reg_id"></label> -->
                			<?php echo $this->Form->input('class_image2', array('type'=>'file','label' => false,'div'=>false, 'class' => 'form-control boxesstyle','style'=>'display:none','id'=>'file-upload2'));?>
             
						  <input type="text" class="form-control reg_input" id="upload_photo2" placeholder="Upload Specific Tutor Picture">
						  <div id="s19" class="pc_error">&nbsp;</div>
						  <span class="cal_br cal_br_s2"><img src="<?php echo HTTP_ROOT;?>/img/browse.png" id="img_click2" style="margin-top: 20px;"></span>
						  
							
						</div>

							            </div> 
							           
					            	</div>

					            	<!-- 6. 2 -->
					            	<div class="col-sm-12 col-xs-12 col-md-6">
					            		<!-- 1 -->
					            		<div class="col-sm-12 col-xs-12 " style="">
					                		<div class="form-group">
						  <!-- <label for="usr"><img src="images/mobile.png" class="reg_id"></label> -->
                			<?php echo $this->Form->input('class_image3', array('type'=>'file','label' => false,'div'=>false, 'class' => 'form-control boxesstyle','style'=>'display:none','id'=>'file-upload3'));?>
             
						  <input type="text" class="form-control reg_input" id="upload_photo3" placeholder="Upload Sample Video">
						 <div id="s20" class="pc_error">&nbsp;</div>
						  <span class="cal_br cal_br_s2"><img src="<?php echo HTTP_ROOT;?>/img/browse.png" id="img_click3" style="margin-top:20px;"></span>
						   
							
						</div>
							            </div> 

					                	<!-- 2 -->
					                	<div class="col-sm-12 col-xs-12 pc_ma-top" style="">


					                		<div class="form-group">
						  <!-- <label for="usr"><img src="images/mobile.png" class="reg_id"></label> -->
                			<?php echo $this->Form->input('class_image4', array('type'=>'file','label' => false,'div'=>false, 'class' => 'form-control boxesstyle','style'=>'display:none','id'=>'file-upload4'));?>
             
						  <input type="text" class="form-control reg_input" id="upload_photo4" placeholder="Upload Class Photo">
						  <div id="s21" class="pc_error">&nbsp;</div>
						  <span class="cal_br cal_br_s2"><img src="<?php echo HTTP_ROOT;?>/img/browse.png" id="img_click4" style="margin-top: 20px;"></span>
						   
							
						</div>

							            </div> 
					                	<!-- 4 -->					                		
					            	</div>
				                </div>
				            </div>

			            	<div class="col-sm-12 col-xs-12 sr_pv_padding_lr" style="margin-top: 30px; margin-bottom: 50px;">
			            		<div class="col-sm-12 col-xs-12">
				                    <input type="Submit" class="btn btn-primary pc_sub_class" name="sub_class" id="sub_class" value="Submit class">
				                    <button type="botton" class="btn btn-primary pc_pro_class" id="sub_class">Promote Your class</button>
				                </div>
			            	</div>
				                </div>
				            </div>
</div>
							
<!--braingroom modifications	-->			                		
					            	</div>
				                </div>
				            </div>

				             <!-- 4th -->
			            </form>   

			            <!-- End Form  -->
	        		</div>
	        	</div> 
	        </div> 
        </div>
    </div>


    
</div>
<!-- Modal -->

<div class="modal fade" id="myModal_monthly" role="dialog">
    <div class="modal-dialog" style="width:97%">
        <div class="modal-content pc_model_w">
	        <div class="modal-header" style="background:#2BCDC0">
	          	<button type="button" class="close" data-dismiss="modal">&times;</button>
	          	<center class="modal-title pc_model_t_h">Recurring Classes (Regular-Monthly)</center>
	        </div>
	        <div class="modal-body">
	        	<form id="formIdMonthly">
	            <div class="col-sm-12 col-xs-12" style="margin-top: 20px;">
	            	<div class="col-sm-12 col-xs-12 col-md-6">
	            		<div class="col-sm-12 col-xs-12" style="">
	                		<div class="form-group " style="margin-bottom: 5px;">
    							<input  class="form-control reg_input" id="pop1_datepicker1" name="start_date" placeholder="Start Date" type="text">  							  <input type="hidden" name="type" id="type" value="2" />
			  					<span class="cal_b"><img src="<?php echo HTTP_ROOT; ?>/img/cal.png" class="pop_cal"></span>
			  					<p class="err_css" id="error_01" style="padding-top:0px;padding-left:10px; margin:-10px 0 10px"></p>
							</div>
			            </div>
			            <div class="col-sm-12 col-xs-12">
	                		<div class="form-group br_state" style="margin-bottom: 10px;">
	                			<input class="form-control reg_input" placeholder="No. of session in a Single Class(X)" id="session_single_class_monthly" name="session_single_class_monthly" type="text" onblur="regular_single_class_monthly();">	
								<p class="err_css" id="error_mobile" style="padding-left: 10px; padding-top: 20px; margin-bottom: 5px;"></p>
			                </div> 
			            </div> 
			        </div> 
			        <div class="col-sm-12 col-xs-12 col-md-6">
	            		<div class="col-sm-12 col-xs-12" style="">
	                		<div class="form-group " style="margin-bottom: 5px;">
    							<input  class="form-control reg_input" id="pop1_datepicker4"   name="end_date" placeholder="End Date" type="text">  							  
			  					<span class="cal_b"><img src="<?php echo HTTP_ROOT; ?>/img/cal.png" class="pop_cal"></span>

			  					(Validaty Period- You can add recurring classes for maximum two months)
			  					<p class="err_css" id="error_01" style="padding-top:0px;padding-left:10px; margin:-10px 0 10px"></p>
							</div>
			            </div> 

			            <div class="col-sm-12 col-xs-12" style="">
	                		<div class="form-group " style="margin-bottom: 5px;">
    							<!-- <span class="faq_t_q01 faq_t_q0100" style="color:#1B191A;float: left;">Validaty Period- You can add recurring classes for maximum two months</span> -->
							</div>
			            </div> 
			        </div>
	            </div>
	           <div id="no_session_single_class_monthly">
	            <div class="col-sm-12 col-xs-12 sr_pv_padding_lr" id="reg_class_schedul_monthly_1" style="border: 1px solid #757575;margin-top: 15px;">
	            	<div class="col-sm-12 col-xs-12 " style="">
	            	 <div class="col-sm-12 col-xs-12 " style="">
		            	<div class="col-sm-12 col-xs-12 " style="padding: 15px 35px; text-align: center;">
		                    <span class="faq_t_q01" style="color:#1B191A;float: left;">Session 1</span>
		                    <span class="faq_t_q01" style="color:#ABA9AA;">Class Schedules</span>
		                </div>
		                <div class="col-sm-12 col-xs-12 sr_pv_padding_lr">
		                	<div class="col-sm-12 col-xs-12 col-md-6">
		                		<div class="col-sm-12 col-xs-12" style="">
			                		

			                		<div class="form-group" style="margin-bottom: 15px;">
 <input class="form-control reg_input" id="pop3_datepicker3" name="date_month_lrr[]" placeholder="Date &amp; Month" type="text">
		    							
										</div>
					            </div>
					            <div class="col-sm-12 col-xs-12 sr_pv_padding_lr" style="">
				                	<div class="col-sm-12 col-xs-12">
				                		<div class="form-group br_state" style="margin-bottom: 10px;">
				                			<input class="form-control reg_input" id="regular_duration" placeholder="duration" type="text">	
											<p class="err_css" id="error_mobile" style="padding-left: 10px; padding-top: 20px; margin-bottom: 5px;"></p>
						                </div> 
						            </div> 
						        </div>  
		                	</div>
		                	<!-- 2nd -->
		                	<div class="col-sm-12 col-xs-12 col-md-6">
		                		<div class="col-sm-12 col-xs-12" style="">
			                		<div class="form-group" style="margin-bottom: 5px;">
											<select  class="form-control reg_input" id="time_of_day" name="reg_time[]">
															<option value="">Time of day</option>
															<option value="9 AM">9 AM</option>
															<option value="10 AM">10 AM</option>
															<option value="11 AM">11 AM</option>
															<option value="12 PM">12 PM</option>
															<option value="1 PM">1 PM</option>
															<option value="2 PM">2 PM</option>
															<option value="3 PM">3 PM</option>
															<option value="4 PM">4 PM</option>
															<option value="5 PM">5 PM</option>
															<option value="6 PM">6 PM</option>
															<option value="7 PM">7 PM</option>
															<option value="8 PM">8 PM</option>
															<option value="9 PM">9 PM</option>
														</select>
															
										<span class="carimg"><img src="<?php echo HTTP_ROOT; ?>/img/caret.png" class="pop_time"></span>
								        <p class="err_css" id="error_01" style="padding-top:0px;padding-left:10px;"></p>
									</div>
			                	</div>
		                	</div>
		               </div>
		                <div class="col-sm-12 col-xs-12 sr_pv_padding_lr">
		                	<!-- <button  type="botton" class="btn btn-primary pc_sub_class" id="" style="float: right; margin-right: 30px; margin-bottom: 15px;" onclick="regular_class_next('2');">Add Session</button> -->

		                	<!--  <button class="btn btn-primary pc_sub_class" id="" style="float: right; margin-right: 30px; margin-bottom: 15px;" data-dismiss="modal">Close</button> -->

		                	<input type="button" class="btn btn-primary pc_sub_class" id="" style="float: right; margin-right: 30px; margin-bottom: 15px;" onclick="regular_class_next_monthly('2');" value="Add Session">
		                </div>
		            </div>	
	            </div>
	            </div>
	        </div>


	            <div class="col-sm-12 col-xs-12">
	            	<div class="col-sm-12 col-xs-12 sr_pv_padding_lr">
		                	<button type="botton" class="btn btn-primary pc_sub_class" id="sub_class2" style="margin-right: 30px; margin-bottom: 15px;margin-top: 30px;" data-toggle="modal" data-target="#myModal_monthly">Back</button>
		                </div>
	            </div>
	       </form>
	        </div>
	        <div class="modal-footer" style="border-top: 0px solid #e5e5e5;">
	           <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        </div>
  		</div>
    </div>
</div>


<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog" style="width:97%">
        <div class="modal-content pc_model_w">
	        <div class="modal-header" style="background:#2BCDC0">
	          	<button type="button" class="close" data-dismiss="modal">&times;</button>
	          	<center class="modal-title pc_model_t_h">Recurring Classes (Regular-Weekly)</center>
	        </div>
	        <div class="modal-body">
	        	<form id="formId">
	            <div class="col-sm-12 col-xs-12" style="margin-top: 20px;">
	            	<div class="col-sm-12 col-xs-12 col-md-6">
	            		<div class="col-sm-12 col-xs-12" style="">
	                		<div class="form-group " style="margin-bottom: 5px;">
    							<input  class="form-control reg_input" id="pop1_datepicker1" name="start_date" placeholder="Start Date" type="text">  							  <input type="hidden" name="type" id="type" value="1" />
			  					<span class="cal_b"><img src="<?php echo HTTP_ROOT; ?>/img/cal.png" class="pop_cal"></span>
			  					<p class="err_css" id="error_01" style="padding-top:0px;padding-left:10px; margin:-10px 0 10px"></p>
							</div>
			            </div>
			            <div class="col-sm-12 col-xs-12">
	                		<div class="form-group br_state" style="margin-bottom: 10px;">
	                			<input class="form-control reg_input" placeholder="No. of session in a Single Class(X)" id="session_single_class" name="session_single_class" type="text" onblur="regular_single_class();">	
								<p class="err_css" id="error_mobile" style="padding-left: 10px; padding-top: 20px; margin-bottom: 5px;"></p>
			                </div> 
			            </div> 
			        </div> 
			        <div class="col-sm-12 col-xs-12 col-md-6">
	            		<div class="col-sm-12 col-xs-12" style="">
	                		<div class="form-group " style="margin-bottom: 5px;">
    							<input  class="form-control reg_input" id="pop1_datepicker3"   name="end_date" placeholder="End Date" type="text">  							  
			  					<span class="cal_b"><img src="<?php echo HTTP_ROOT; ?>/img/cal.png" class="pop_cal"></span>
			  					(Validaty Period- You can add recurring classes for maximum two months)
			  					<p class="err_css" id="error_01" style="padding-top:0px;padding-left:10px; margin:-10px 0 10px"></p>
							</div>
			            </div> 

			            <div class="col-sm-12 col-xs-12" style="">
	                		<div class="form-group " style="margin-bottom: 5px;">
    							<!-- <span class="faq_t_q01 faq_t_q0100" style="color:#1B191A;float: left;">Validaty Period- You can add recurring classes for maximum two months</span> -->
							</div>
			            </div> 
			        </div>
	            </div>
	           <div id="no_session_single_class">
	            <div class="col-sm-12 col-xs-12 sr_pv_padding_lr" id="reg_class_schedul_1" style="border: 1px solid #757575;margin-top: 15px;">
	            	<div class="col-sm-12 col-xs-12 " style="">
	            	 <div class="col-sm-12 col-xs-12 " style="">
		            	<div class="col-sm-12 col-xs-12 " style="padding: 15px 35px; text-align: center;">
		                    <span class="faq_t_q01" style="color:#1B191A;float: left;">Session 1</span>
		                    <span class="faq_t_q01" style="color:#ABA9AA;">Class Schedules</span>
		                </div>
		                <div class="col-sm-12 col-xs-12 sr_pv_padding_lr">
		                	<div class="col-sm-12 col-xs-12 col-md-6">
		                		<div class="col-sm-12 col-xs-12" style="">
			                		

			                		<div class="form-group" style="margin-bottom: 15px;">

			                			<select  class="form-control reg_input" id="date_of_week" name="reg_date[]">
											<option value="">Date of Week</option>
											<option value="Sunday">Sunday</option>
											<option value="Monday">Monday</option>
											<option value="Tuesday">Tuesday</option>
											<option value="Wednesday">Wednesday</option>
											<option value="Thursday">Thursday</option>
											<option value="Friday">Friday</option>
											<option value="Saturday">Saturday</option>
										</select>	
		    							<!-- <input  class="form-control reg_input" id="pop2_datepicker2" name="date_of_week" placeholder="Date of Week" type="text">  							  
						  					<span class="cal_b"><img src="<?php //echo HTTP_ROOT; ?>/img/cal.png" class="pop_cal"></span>
						  					<p class="err_css" id="error_01" style="padding-top:0px;padding-left:10px; margin:-10px 0 10px"></p> -->
										</div>
					            </div>
					            <div class="col-sm-12 col-xs-12 sr_pv_padding_lr" style="">
				                	<div class="col-sm-12 col-xs-12">
				                		<div class="form-group br_state" style="margin-bottom: 10px;">
				                			<input class="form-control reg_input" id="regular_duration" placeholder="duration" type="text">	
											<p class="err_css" id="error_mobile" style="padding-left: 10px; padding-top: 20px; margin-bottom: 5px;"></p>
						                </div> 
						            </div> 
						        </div>  
		                	</div>
		                	<!-- 2nd -->
		                	<div class="col-sm-12 col-xs-12 col-md-6">
		                		<div class="col-sm-12 col-xs-12" style="">
			                		<div class="form-group" style="margin-bottom: 5px;">
											<select  class="form-control reg_input" id="time_of_day" name="reg_time[]">
															<option value="">Time of day</option>
															<option value="9 AM">9 AM</option>
															<option value="10 AM">10 AM</option>
															<option value="11 AM">11 AM</option>
															<option value="12 PM">12 PM</option>
															<option value="1 PM">1 PM</option>
															<option value="2 PM">2 PM</option>
															<option value="3 PM">3 PM</option>
															<option value="4 PM">4 PM</option>
															<option value="5 PM">5 PM</option>
															<option value="6 PM">6 PM</option>
															<option value="7 PM">7 PM</option>
															<option value="8 PM">8 PM</option>
															<option value="9 PM">9 PM</option>
														</select>
															
										<span class="carimg"><img src="<?php echo HTTP_ROOT; ?>/img/caret.png" class="pop_time"></span>
								        <p class="err_css" id="error_01" style="padding-top:0px;padding-left:10px;"></p>
									</div>
			                	</div>
		                	</div>
		               </div>
		                <div class="col-sm-12 col-xs-12 sr_pv_padding_lr">
		                	<!-- <button  type="botton" class="btn btn-primary pc_sub_class" id="" style="float: right; margin-right: 30px; margin-bottom: 15px;" onclick="regular_class_next('2');">Add Session</button> -->

		                	<!--  <button class="btn btn-primary pc_sub_class" id="" style="float: right; margin-right: 30px; margin-bottom: 15px;" data-dismiss="modal">Close</button> -->

		                	<input type="button" class="btn btn-primary pc_sub_class" id="" style="float: right; margin-right: 30px; margin-bottom: 15px;" onclick="regular_class_next('2');" value="Add Session">
		                </div>
		            </div>	
	            </div>
	            </div>
	        </div>


	            <div class="col-sm-12 col-xs-12">
	            	<div class="col-sm-12 col-xs-12 sr_pv_padding_lr">
		                	<button type="botton" class="btn btn-primary pc_sub_class" id="sub_class2" style="margin-right: 30px; margin-bottom: 15px;margin-top: 30px;" data-toggle="modal" data-target="#myModal">Back</button>
		                </div>
	            </div>
	       </form>
	        </div>
	        <div class="modal-footer" style="border-top: 0px solid #e5e5e5;">
	           <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        </div>
  		</div>
    </div>
</div>

<!-- Modal 2 -->
<div class="modal fade" id="myModal_2" role="dialog">
    <div class="modal-dialog" style="width:100%">
        <div class="modal-content pc_model_w">
	        <div class="modal-header" style="background:#2BCDC0">
	          	<button type="button" class="close" data-dismiss="modal">&times;</button>
				
	          	<center class="modal-title pc_model_t_h">Recurring Classes (lrregular)</center>
	        </div>
	        <div class="modal-body">
	        	<form id="form_lrr_Id">
	            <div class="col-sm-12 col-xs-12" style="margin-top: 20px;">
	            	<div class="col-sm-12 col-xs-12 col-md-6">
	            		<div class="col-sm-12 col-xs-12" style="">
	                		<div class="form-group " style="margin-bottom: 5px;">
    							<input  class="form-control reg_input" id="pop3_datepicker1" name="start_date_lrr" placeholder="Start Date" type="text">  							  
			  					<span class="cal_b"><img src="<?php echo HTTP_ROOT; ?>/img/cal.png" class="pop_cal"></span>
			  					<p class="err_css" id="error_01" style="padding-top:0px;padding-left:10px; margin:-10px 0 10px"></p>
							</div>
			            </div>
			            <div class="col-sm-12 col-xs-12">
	                		<div class="form-group br_state" style="margin-bottom: 10px;">
	                			<input class="form-control reg_input" id="lrr_rec_class" placeholder="No. of lrregular Recurring Class" type="text" name="no_lrc" value="">	
								<p class="err_css" id="error_mobile" style="padding-left: 10px; padding-top: 20px; margin-bottom: 5px;"></p>
			                </div> 
			            </div> 
			        </div> 
			        <div class="col-sm-12 col-xs-12 col-md-6">
	            		<div class="col-sm-12 col-xs-12" style="">
	                		<div class="form-group " style="margin-bottom: 5px;">
    							<input  class="form-control reg_input" id="pop3_datepicker2" name="end_date_lrr" placeholder="End Date" type="text">

			  					<span class="cal_b"><img src="<?php echo HTTP_ROOT; ?>/img/cal.png" class="pop_cal"></span>
			  					(Validation are two month)
			  					<p class="err_css" id="error_01" style="padding-top:0px;padding-left:10px; margin:-10px 0 10px"></p>
							</div>
			            </div> 
			            <div class="col-sm-12 col-xs-12" style="">
	                		<div class="form-group " style="margin-bottom: 5px;">
							<input class="form-control reg_input" name="no_lrsc" id="lr_reg_single_class" placeholder="No. of session in a Single Class" type="text" onblur="lrregular_single_class();">
    							<!--<span class="faq_t_q01 faq_t_q0100" style="color:#1B191A;float: left;">(i) Validaty Period- You can add recurring classes for maximum two months</span>-->
							</div>
			            </div> 
			        </div>
	            </div>
	            <div id="lrregular_loop_s_1">
	            	
				<div class="col-sm-12 col-xs-12 col-md-12" id="lrregular_1_1">
				<div class="row bdrsessn">
                    
					<p>Class 1</p>
					<center>
	            <div class="bdrsessn col-sm-12 col-xs-12 col-md-10" style="margin-left: 54px;">
                    <div class="row">
                      <div class="col-md-5 col-sm-5 col-xs-12 pull-left bsc">
                        <p>Session 1.1 (x,y)</p>
                    </div>
                    <div class="col-md-7 col-sm-7 col-xs-12 pull-left bsc1">
                        
                    </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <!-- ************select calendar********* -->
                        <div class="form-group reg_text">
                          <!-- <label for="usr"><img src="images/reg_pwd.png" class="reg_id"></label> -->
                          <input class="form-control reg_input" id="pop3_datepicker3" name="date_month_lrr[]" placeholder="Date &amp; Month" type="text">
                          <input class="hidden" name="clas_id[]" id="clas_id" value="1"/>
                          <span class="cal_b"><img src="<?php echo HTTP_ROOT; ?>/img/cal.png" class="lri_cal_2"></span>
                        </div>
                        <!-- ************select calendar********* -->
                      </div>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <!-- ************select field1********* -->
                          <div class="form-group reg_text1">
                            <!-- <label for="usr"><img src="images/interest.png" class="reg_id"></label> -->

													<select class="form-control reg_input" name="session_time[]" id="sel1">
															<option value="">Time of Day</option>
															<option value="9 AM">9 AM</option>
															<option value="10 AM">10 AM</option>
															<option value="11 AM">11 AM</option>
															<option value="12 PM">12 PM</option>
															<option value="1 PM">1 PM</option>
															<option value="2 PM">2 PM</option>
															<option value="3 PM">3 PM</option>
															<option value="4 PM">4 PM</option>
															<option value="5 PM">5 PM</option>
															<option value="6 PM">6 PM</option>
															<option value="7 PM">7 PM</option>
															<option value="8 PM">8 PM</option>
															<option value="9 PM">9 PM</option>
														</select>

                           
                            <span class="carimg"><img src="<?php echo HTTP_ROOT; ?>/img/cal.png" class="lri_cal"></span>
                          </div>
                          <div class="col-md-12 col-sm-12 col-xs-12 pull-right padd_l_r">
                            <input type="button" class="btn sessbtn pull-right" id="add_session_1" onclick="lrr_add_class_session(1,2);" value="Add Session 1.2">
                          </div>
                          <!-- ************select field1********* -->
                      </div>
                    </div>
          </div>
		  </center>
		  <div class="col-md-12 col-sm-12 col-xs-12 pull-right padd_l_r">
                            <input type="button" class="btn sessbtn pull-right" style="margin-top: 19px;" onclick="lrr_add_class(2,1);" value="Add Class 1">
                          </div>
		  
		  </div>
		  </div>
		</form>
		  
		</div>
	           
	        </div>
	        <div class="modal-footer" style="border-top: 0px solid #e5e5e5;">
	           <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        </div>
  		</div>
    </div>
</div>
<script>
document.getElementById("class_nature").addEventListener("change", function(){
	var class_nature = $(this).val();
		if(class_nature == 2) {
			$('.js-recurring').removeClass('hide');
			$('.js-session-single').addClass('hide');
			$('.js-multiple-class').removeClass('hide');
		} else {
			$('.js-multiple-class').addClass('hide');
			$('.js-session-single').removeClass('hide');
			$('.js-recurring').addClass('hide');
		}
});
</script>
<script type="text/javascript">
	document.getElementById("is_type").addEventListener("change", function(){
		var class_type = $(this).val();
		if(class_type == 2) {
				$('.js-b2b').addClass('hide');
				$('.js-b2c-community').addClass('hide');
				$('.js-b2b-schedule').addClass('hide');
				$('.js-b2b-loc').addClass('hide');
				$('.js-class-price').addClass('hide');
				$('.js-b2c').removeClass('hide');
				$('.js-b2c-loc').removeClass('hide');
				$('.js-b2c-group').removeClass('hide');
					$.ajax({  
					type: "POST",  
					url: "<?php echo HTTP_ROOT; ?>/vendor_classes/b2c_class",  
					data: "class_type="+ class_type,  
					success: function(msg){ 
					var resp = msg.split('~')
						$(".class_type").html(resp[0]);
						$(".js-b2c").html(resp[1]); 
						
						var max_fields      = 10;
				var max_fields_loc      = 10; //maximum input boxes allowed
				var wrapper         = $(".input_fields_wrap_b2c"); //Fields wrapper
				var add_button      = $(".add_field_button_b2c"); 
				var x = 0;
				var y = 0;  
				$(add_button).click(function(e){
		    e.preventDefault();
		    if(x < max_fields){ 
		        x++; 
		        $(wrapper).append(
		        		'<div class ="remove_field col-xs-12 col-sm-12 padd_l_r"><div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-3">'+
						'<select  class="form-control reg_input" name="level_id['+x+']" id="level_id_'+x+'">'+
						'<option value="">Choose Expertise Level</option>'+
						'<option value="1">Beginners</option>'+
						'<option value="2">Intermediate</option>'+
						'<option value="3">Advanced</option>'+
						
						'</select>'+
						'<div id="s7" class="pc_error">&nbsp;</div>'+					
									
						'<span class="carimg"><img src=HTTP_ROOT/img/caret.png></span>'+
						'<p class="err_css" id="error_01" style="padding-top:0px;padding-left:10px;"></p>'+
						'</div>'+
						'<div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-3">'+
						'<select  class="form-control reg_input" name="expert_level_id['+x+']" id="expert_level_id_'+x+'">'+
						'<option value="">Choose Class Level</option>'+
						'<option value="1">Level 1</option>'+
						'<option value="2">Level 2</option>'+
						'<option value="3">Level 3</option>'+
						
						'</select>'+
						'<div id="s7" class="pc_error">&nbsp;</div>'+					
									
						'<span class="carimg"><img src=HTTP_ROOT/img/caret.png"></span>'+
						'<p class="err_css" id="error_01" style="padding-top:0px;padding-left:10px;"></p>'+
						'</div>'+
		        '<div class="form-group col-xs-11 col-sm-11 col-md-5 col-lg-3">'+
				'<div class="input textarea"><textarea id="Description_'+x+'" rows="3" cols="25" placeholder="Description" class="form-control reg_input" name="data[Description]['+x+']"></textarea></div></div>'+
				'<a href="#" class="btn btn-primary col-sm-1 form-group remove_class_details">Remove</a></div>'
		        ); //add input box
		    }
		});
					
		$(wrapper).on("click",".remove_class_details", function(e){ //user click on remove text
		    e.preventDefault(); $(this).parent('div').remove(); x--;
		})
					} 
					});
					
				
			} else {
					$('.js-b2b').removeClass('hide');
					$('.js-b2c-community').removeClass('hide');
					$('.js-b2b-schedule').removeClass('hide');
					$('.js-b2b-loc').removeClass('hide');
					$('.js-class-price').removeClass('hide');
					$('.js-b2c').addClass('hide');
					$('.js-b2c-loc').addClass('hide');
					$('.js-b2c-group').addClass('hide');
						$.ajax({  
					type: "POST",  
					url: "<?php echo HTTP_ROOT; ?>/vendor_classes/b2b_class",  
					data: "class_type="+ class_type,  
					success: function(msg){ 
						var resp = msg.split('~');
					$(".class_type").html(resp[0]); 
						$(".js-b2b").html(resp[1]); 
						
						var max_fields      = 10;
		var max_fields_loc      = 10; 
		var wrapper         = $(".input_fields_wrap_b2b"); 
		var add_button      = $(".add_field_button_b2b"); 
		var x = 0;
		var y = 0;  //initlal text box count
		$(add_button).click(function(e){ //on add input button click
		    e.preventDefault();
		    if(x < max_fields){ 
		        x++; 
		        $(wrapper).append(
		        		'<div class ="remove_field col-xs-12 col-sm-12 padd_l_r"><div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-3">'+
						'<select  class="form-control reg_input" name="level_id['+x+']" id="level_id_'+x+'">'+
						'<option value="">Choose Expertise Level</option>'+
						'<option value="1">Beginners</option>'+
						'<option value="2">Intermediate</option>'+
						'<option value="3">Advanced</option>'+
						
						'</select>'+
						'<div id="s7" class="pc_error">&nbsp;</div>'+					
									
						'<span class="carimg"><img src=HTTP_ROOT/img/caret.png></span>'+
						'<p class="err_css" id="error_01" style="padding-top:0px;padding-left:10px;"></p>'+
						'</div>'+
						'<div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-3">'+
						'<select  class="form-control reg_input" name="expert_level_id['+x+']" id="expert_level_id_'+x+'">'+
						'<option value="">Choose Class Level</option>'+
						'<option value="1">Level 1</option>'+
						'<option value="2">Level 2</option>'+
						'<option value="3">Level 3</option>'+
						
						'</select>'+
						'<div id="s7" class="pc_error">&nbsp;</div>'+					
									
						'<span class="carimg"><img src=HTTP_ROOT/img/caret.png"></span>'+
						'<p class="err_css" id="error_01" style="padding-top:0px;padding-left:10px;"></p>'+
						'</div>'+
		        '<div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-2">'+
		        '<div class="input text"><input type="text" id="Price_'+x+'" placeholder="Price" class="form-control reg_input" name="price[]"></div></div>'+
		        '<div class="form-group col-xs-11 col-sm-11 col-md-5 col-lg-3">'+
				'<div class="input textarea"><textarea id="Description_'+x+'" rows="3" cols="25" placeholder="Description" class="form-control reg_input" name="data[Description]['+x+']"></textarea></div></div>'+
				'<a href="#" class="btn btn-primary col-sm-1 form-group remove_class_details">Remove</a></div>'
		        ); //add input box
		    }
		});
		
		$(wrapper).on("click",".remove_class_details", function(e){ //user click on remove text
		    e.preventDefault(); $(this).parent('div').remove(); x--;
		})
					} 
					}); 
				}
	});
</script>
<script>
   
		var max_fields      = 10;
		var max_fields_loc      = 10; //maximum input boxes allowed
		var wrapper_tiket = $(".input_fields_wrap_ticket");	
		var add_ticket_button      = $(".add_field_loc_button"); 	
		var x = 0;
		var y = 0;  //initlal text box count
		
		$(add_ticket_button).click(function(e){ //on add input button click
		    e.preventDefault();
		    if(y < max_fields_loc){ //max input box allowed
		        y++; //text box increment
		        $(wrapper_tiket).append(
		        '<div class="row remove_location">'+
		      	'<div class="col-sm-8 form-group" style="">'+

				'<textarea type="text" row="5" name="area[]" class="form-control reg_input" placeholder="Class Location" id="area_'+y+'"></textarea>'+
				
				'<div id="L-'+y+'" class="pc_error">&nbsp;</div>'+
				'<p class="err_css" id="error_mobile" style="padding-left: 10px; padding-top: 20px; margin-bottom: 5px;"></p>'+
				'</div>'+
				
				'<div class="col-sm-3 form-group" style="margin-bottom: 0px;">'+
'<select id="area_id_'+y+'" name="area_id['+y+']" class="form-control reg_input">'+
				'<option value="">Select Locality</option>'+
				
					"<?php foreach ($localitie as $key => $localitie_value) {
					
					$loc_id=$localitie_value['Locality']['id'];
					$loc_name=$localitie_value['Locality']['name'];
					
					?>"+
					'<option value="<?php echo $loc_id; ?>">'+
					"<?php echo trim($loc_name); ?>"+
					'</option>'+
					"<?php
					}
					?>"
					
				+'</select>'+
				'<div id="LO-'+y+'" class="error_msg">&nbsp;&nbsp;</div>'+
				'<span class="carimg"><img src="HTTP_ROOT/img/caret.png"></span>'+
				
				'</div>'+
				
				'<a href="#" class="btn btn-primary col-sm-1 form-group remove_loc">Remove</a>'+
				'</div>'
		        ); //add input box
		    }
		});
		$(wrapper_tiket).on("click",".remove_loc", function(e){ //user click on remove text
		    e.preventDefault(); $(this).parent('div').remove(); y--;
		})
   </script> 
 <script type="text/javascript">
 /* Braingroom modifications 16/07/2016 */
function show_subcat()
{
	var catid = $("#category_id").val();
		$.ajax({  
		    type: "POST",  
		    url: "<?php echo HTTP_ROOT; ?>/Homes/findsubCat",  
		    data: "cat_id="+ catid,  
		    success: function(msg){ 
		    $("#sub_cat_id").html(msg); 
		   
  
			var categCheck  = $('#segment_id').multiselect({
				nonSelectedText: 'Select Class Segments',
				enableFiltering: true,
				filterPlaceholder: 'Search',
				enableCaseInsensitiveFiltering : true,
				includeSelectAllOption: true,
				filterPlaceholder: 'Search',
				dropRight: true			});
			categCheck.multiselect('rebuild');
			
		 } 
		  }); 
}

/*function locality(){
	      var valdataget = document.getElementById('area_id');
	      var message = document.getElementById('f7');
	      if(valdataget.value==''){
	        message.innerHTML = "Please select locality";
	      }else{
	         message.innerHTML = "&nbsp;";
	        }
	 } */
function segment(){
	 if (segment==null) {
            $("#s2").html('Please select atleast one');
            $("#locality").focus();
            return false;
	    }
	    else
	    {
	    	$("#s2").html('');
            //$("#locality").focus();
            return false;
	    }
	}

/* Braingroom modifications 16/07/2016 */
</script>
<script>
  $(function() {
    //$( "#datepicker").datepicker();
    $( "#datepicker1" ).datepicker({yearRange:'1900:2030',minDate:0,changeYear: true, changeMonth: true });
    $( "#datepicker2" ).datepicker({yearRange:'1900:2030',minDate:1,changeYear: true, changeMonth: true });
	$( "#session_datepicker1" ).datepicker({yearRange:'1900:2030',minDate:0,changeYear: true, changeMonth: true });
	$( "#pop1_datepicker1" ).datepicker({yearRange:'1900:2030',minDate:0,changeYear: true, changeMonth: true });
	$( "#pop2_datepicker2" ).datepicker({yearRange:'1900:2030',minDate:0,changeYear: true, changeMonth: true });
	$( "#pop1_datepicker3" ).datepicker({yearRange:'1900:2030',minDate:0,changeYear: true, changeMonth: true });
	$( "#pop1_datepicker4" ).datepicker({yearRange:'1900:2030',minDate:0,changeYear: true, changeMonth: true });
	$( "#pop3_datepicker1" ).datepicker({yearRange:'1900:2030',minDate:0,changeYear: true, changeMonth: true });
	$( "#pop3_datepicker2" ).datepicker({yearRange:'1900:2030',minDate:1,changeYear: true, changeMonth: true });
	$( "#pop3_datepicker3" ).datepicker({yearRange:'1900:2030',minDate:0,changeYear: true, changeMonth: true });
	$( "#pop3_datepicker4" ).datepicker({yearRange:'1900:2030',minDate:0,changeYear: true, changeMonth: true });
	
 });
</script>
<script>
function validateForm() 
{
	var location_level_length = document.getElementsByName('area[]').length;
	var level_length = document.getElementsByName('level_id[]').length;
	var i;
	var category_id                = document.forms["frm"]["category_id"].value;
	var segment_id                 = document.forms["frm"]["segment_id"].value;
    var city                		= document.forms["frm"]["city"].value;
	var region                		= document.forms["frm"]["region"].value;
	var class_nature                = document.forms["frm"]["class_nature"].value;
	var is_type                		= document.forms["frm"]["is_type"].value;
	var locality_id                	= document.forms["frm"]["locality_id"].value;
	var class_topic                = document.forms["frm"]["class_topic"].value;
    var class_summary              = document.forms["frm"]["class_summary"].value;
    var class_type_id              = document.forms["frm"]["class_type_id"].value;
	var group_id              = document.forms["frm"]["group_id"].value;
    var class_timing_id            = document.forms["frm"]["class_timing_id"].value;
    var no_of_session              = document.forms["frm"]["no_of_session"].value;
    var day_of_week                = document.forms["frm"]["duration"].value;
    var time_of_day                = document.forms["frm"]["time_day"].value;
	var age_category                = document.forms["frm"]["age_category"].value;
	var community_id               = document.forms["frm"]["community_id"].value;
	var max_ticket_available       = document.forms["frm"]["max_ticket_available"].value;
	var min_ticket_available       = document.forms["frm"]["min_ticket_available"].value;
	var class_tag                  = document.forms["frm"]["class_tag"].value;
	var img1                       = document.forms["frm"]["upload_photo1"].value;
	var img2                       = document.forms["frm"]["upload_photo2"].value;
	var img3                       = document.forms["frm"]["upload_photo3"].value;
	var img4                       = document.forms["frm"]["upload_photo4"].value;
	var res1 = img1.split('.'); 
	var res2 = img2.split('.');
	var res3 = img3.split('.');
	var res4 = img4.split('.');
console.log('city'+city+'region'+region+'is_type'+is_type+'locality_id'+locality_id+'class_topic'+class_topic+'class_summary'+class_summary+'class_type_id'+class_type_id+'class_timing_id'+class_timing_id+'no_of_session'+no_of_session+'day_of_week'+day_of_week+'time_of_day'+time_of_day+'age_category'+age_category+'community_id'+community_id+'max_ticket_available'+max_ticket_available+'class_tag'+class_tag+'class_nature'+class_nature);
	
if(img1==''){
		var ext1 = '';
	}
	else{
		var ext1 = res1[1];
	}

	if(img2==''){
		var ext2 = '';
	}
	else{
		var ext2 = res2[1];
	}
	if(img3==''){
		var ext3 = '';
	}
	else{
		var ext3 = res3[1];
	}
	if(img4==''){
		var ext4 = '';
	}
	else{
		var ext4 = res4[1];
	}

	//res1


	
 	/******************* Step 3 ***********************/
		    if(category_id == null || category_id == "")
		    {
		    	
		    	//alert(coaching_experience);
		    	$('#s1').html('Please Select Category');
		        	$('#category_id').focus();
		        	return false;
		    }

		    else if(segment_id == null || segment_id == "")
		    {
		    	$('#SS-2').html('Please Select Segment');
		        	$('#segment_id').focus();
		        	return false;
		    }

		    else if(class_topic == null || class_topic == "")
		    {
		    	$('#s3').html('Please Enter Class Topic');
		        	$('#class_topic').focus();
		        	return false;
		    }

		     else if(class_summary == null || class_summary == "")
		    {
		    	$('#s4').html('Please Enter Summary');
		        	$('#class_summary').focus();
		        	return false;
		    }
			 else if(is_type == null || is_type == "")
		    {
		    	$('#is_3').html('Please Enter Class Type');
		        	$('#is_type').focus();
		        	return false;
		    }
		     else if(class_type_id == null || class_type_id == "")
		    {
		    	$('#class_5').html('Please Enter Class Type');
		        	$('#class_type_id').focus();
		        	return false;
		    }


		    
		   /*   else if(class_timing_id == null || class_timing_id == "")
		    {
		    	$('#s6').html('Please Enter Class Schedule Type');
		        	$('#class_timing_id').focus();
		        	return false;
		    }


		     else if(level_id == null || level_id == "")
		    {
		    	$('#s7').html('Please Enter Class Level');
		        	$('#level_id').focus();
		        	return false;
		    }
		   else if(locality_id == null || locality_id == "")
		    {
		    	$('#f7').html('Please Enter Class Level');
		        	$('#locality_id').focus();
		        	return false;
		    }*/

		    /*********************** End Step ********************/
		
		
     /******************* Step 4 ***********************/
		/*else if (starting_month == null || starting_month == "") {
				$('#s8').html('Please Select start Date');
	        	$('#datepicker1').focus();
	        	return false;
	    }
	    else if(end_month == null || end_month == ""){
	    	$('#s9').html('Please Select End Date');
	        	$('#datepicker2').focus();
	        	return false;
	    }
	    else if(no_of_session == null || no_of_session == ""){
	    	$('#s10').html('Please Enter No Of Sessions');
	        	$('#no_of_session').focus();
	        	return false;
	    }
	     else if(day_of_week == null || day_of_week == ""){
	    	$('#s11').html('Please enter duration');
	        	$('#duration').focus();
	        	return false;
	    }
		else if(time_of_day == null || time_of_day == ""){
	    	$('#s11').html('Please Choose hour/day');
	        	$('#time_day').focus();
	        	return false;
	    }*/
		else if(age_category == null || age_category == ""){
	    	$('#exp').html('Please select age category');
	        	$('#age_category').focus();
	        	return false;
	    }


	     /*else if(age_from == null || age_from == ""){
	    	$('#s12').html('Please Enter Age');
	        	$('#age_from').focus();
	        	return false;
	    }

	     else if(age_to == null || age_to == ""){
	    	$('#s13').html('Please Enter Age');
	        	$('#age_to').focus();
	        	return false;
	    }


	else if(age_from > age_to)
	{
		$('#s13').html('Value must be greater than age from');
		//$('#age_to').val($('#age_to').val(''));
		//$("#age_to").val('');

	}
	else if(location == null || location == ""){
	    	$('#s14').html('Please Enter Location');
	        	$('#location').focus();
	        	return false;
	    }

	     else if(community_id == null || community_id == ""){
	    	$('#s15').html('Please Select Community Type');
	        	$('#community_id').focus();
	        	return false;
	    }

*/
	   /*  else if(max_ticket_available == null || max_ticket_available == ""){
	    	$('#s16').html('Please Max Ticket Available');
	        	$('#max_ticket_available').focus();
	        	return false;
	    }*/
		

	     else if(class_tag == null || class_tag == ""){
	    	$('#s17').html('Please Enter Tag');
	        	$('#class_tag').focus();
	        	return false;
	    }
		else if(city == null || city == ""){
	    	$('#c6').html('Please Select city');
	        	$('#city').focus();
	        	return false;
	    }
		else if(level_length != 0 || level_length != null || level_length != ''){
				for (i = 0; i < level_length; i++) 
					{		
							 
							var expert_level =  document.forms["frm"]['level_id_'+i].value;
							var class_level = document.forms["frm"]['expert_level_id_'+i].value;
							var price =  document.forms["frm"]['Price_'+i].value;
							var description = document.forms["frm"]['Description_'+i].value;
							if(expert_level == null || expert_level == ''){
								$('#E-'+i).html('Please Choose Expertise level ');
								$('#level_id_'+i).focus();
								return false;
							}
							else if(price == null || price =='') {
								$('#PR-'+i).html('Please Enter Price');
								$('#Price_'+i).focus();
								return false
							}
							
							else if(class_level != '' || class_level != null) {
								if(description == null || description =='')
								{
									$('#DE-'+i).html('Please Enter Description');
									$('#Description_'+i).focus();
									return false;
								} 
								else {
									location_details();
									}
							}
					}
					return false;
	    }
		else if(location_level_length != 0 || location_level_length != null || location_level_length != ''){
					for (i = 0; i < location_level_length; i++) 
						{		
								 
								var location =  document.forms["frm"]['area_'+i].value;
								var locality_id = document.forms["frm"]['area_'+i].value;
								if(location == null || location == ''){
									$('#L-'+i).html('Please Choose Location');
									$('#location_'+i).focus();
									return false;
								} else if(locality_id == null || locality_id =='') {
									$('#LO-'+i).html('Please Select Locality');
									$('#area_id_'+i).focus();
									return false
								}
						}
					return false;
			} 

	    else if(ext1!='ppt' && ext1!=''){
	    	
	    	
	    		$('#s18').html('Only PPT files are allowed.');
	    		return false;
	    	
	        	
	    }

		
	    else if(ext2!='jpg' && ext2!='png' && ext2!='jpeg' && ext2!='gif' && ext2!=''){
	    		
	    		$('#s19').html('Only jpg, png, jpeg, gif files are allowed.');
	    		return false;
	    }
	    	
	   else if(ext3 != "mp4" && ext3 != "mkv" && ext3 != "avi" && ext3 != "swf" && ext3 != "webm" && ext3 != "mov" && ext3 != "dvr" && ext3!='')
	    	{
	    		$('#s20').html('Only mp4, mkv, avi, swf, webm, mov, dvr  files are allowed.');
	    		return false;
	    	}
	        	
	    

	  
	    	
	   else if(ext4 != "jpg" && ext4 != "png" && ext4 != "jpeg" && ext4 != "gif" && ext4!='')
	    	{
	    		$('#s21').html('Only jpg, png, jpeg, gif files are allowed.');
	    		return false;
	    	}
	        	
	    

	    
	    else
	    {
	    	return true;
	    }

}
</script>
<script>
$(document).ready(function(){
                var vendor_type='<?php echo $user_data['UserMaster']['user_type_id']; ?>';
               var area_of_expertise='<?php echo $user_data['UserMaster']['area_of_expertise']; ?>';
               var dob='<?php echo $user_data['UserMaster']['d_o_b']; ?>';
               var official_reg_id='<?php echo $user_data['UserMaster']['d_o_b']; ?>';
               var address='<?php echo $user_data['UserMaster']['address']; ?>';
               var yourself='<?php echo $user_data['UserMaster']['yourself']; ?>';
               var institue='<?php echo $user_data['UserMaster']['institute_name'];?>';
               var official_reg_id='<?php echo $user_data['UserMaster']['institute_name'];?>';
               if((vendor_type=='1')){
                 if((institue=='')||(official_reg_id=='')){
                  alert(' You Are Not Able to Post Class Please Update Step 2 Process Using Edit Profile Section');
                 window.location.href="<?php echo HTTP_ROOT;?>/Homes/myProfile/";

                return false;
                 }
                 else{
                  window.location.href="<?php echo HTTP_ROOT;?>/vendor_classes/create";
                   }
               }
               else if((vendor_type=='2')){
                 if((area_of_expertise=='')||(dob=='')||(address=='')||(yourself=='')){
                  alert('You Are Not Able to Post Class Please Update Step 2 Process Using Edit Profile Section');
                 window.location.href="<?php echo HTTP_ROOT;?>/Homes/myProfile/";
                return false;
                 }
                 else{
                  window.location.href="<?php echo HTTP_ROOT;?>/vendor_classes/create";
                  }
               }
              
             
           });
</script>
<script type="text/javascript">
$("#file-upload1").on('change',function(){
      var a = $(this).val();




    
      $('#upload_photo1').val(a);
  });

  $("#img_click1").on('click',function(){

  	//alert("hgfhgfhg");
      $('#file-upload1').click();
  });
</script>

<script type="text/javascript">
$("#file-upload2").on('change',function(){
      var a = $(this).val();
    
      $('#upload_photo2').val(a);
  });

  $("#img_click2").on('click',function(){
  	//alert("hgfhgfhg");
      $('#file-upload2').click();
  });
</script>
<script type="text/javascript">
$("#file-upload3").on('change',function(){
      var a = $(this).val();
    
      $('#upload_photo3').val(a);
  });

  $("#img_click3").on('click',function(){
  	//alert("hgfhgfhg");
      $('#file-upload3').click();
  });
</script>

<script type="text/javascript">
$("#file-upload4").on('change',function(){
      var a = $(this).val();
    
      $('#upload_photo4').val(a);
  });

  $("#img_click4").on('click',function(){
  	//alert("hgfhgfhg");
      $('#file-upload4').click();
  });
</script>

<!-- Number Validation -->
<script type="text/javascript">
$("#no_of_session").keypress(function (e) {
          if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        //$("#errmsg").html("Digits Only").show().fadeOut("slow");
    return false;
    }
   });
</script>


<script type="text/javascript">
$("#day_of_week").keypress(function (e) {
          if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        //$("#errmsg").html("Digits Only").show().fadeOut("slow");
    return false;
    }
   });
</script>

<script type="text/javascript">
$("#age_from").keypress(function (e) {
          if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        //$("#errmsg").html("Digits Only").show().fadeOut("slow");
    return false;
    }
   });
</script>

<script type="text/javascript">
$("#age_to").keypress(function (e) {
          if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        //$("#errmsg").html("Digits Only").show().fadeOut("slow");
    return false;
    }
   });
</script>

<script type="text/javascript">
$("#max_ticket_available").keypress(function (e) {
          if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        //$("#errmsg").html("Digits Only").show().fadeOut("slow");
    return false;
    }
   });
</script>

<script type="text/javascript">
$("#duration").keypress(function (e) {
          if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        //$("#errmsg").html("Digits Only").show().fadeOut("slow");
    return false;
    }
   });
</script>






<script type="text/javascript">
function compare_age(){

	var ageform = $("#age_from").val();
	var ageto = $("#age_to").val();
	//alert(ageto);
	if(ageform > ageto)
	{
		$('#s13').html('Value must be greater than age from');
		//$('#age_to').val($('#age_to').val(''));
		//$("#age_to").val('');

	}
	else
	{
		$('#s13').html('&nbsp;');
	}

	
}
</script>
<script type="text/javascript">
$('#class_timing_idd').on('change', function() {

  alert( this.value ); // or $(this).val()
});
</script>

<script type="text/javascript">
    function getval(sel) {
	
	//alert('rrr');
       alert(sel.value);
    }
</script>
<script type="text/javascript">
function schedules ()
{
	//alert('rrr');
	var sid = $("#class_timing_id").val();

	if(sid==2)
	{
	//$("#vndr").show();
    $("#s_date1").hide();
	$("#e_date1").hide();
	$("#section_id").show();
	$('.js-class-nature').removeClass('hide');
	}
	else{
	
	$("#s_date1").show();
	$("#e_date1").show();
	$("#section_id").hide();
	$('.js-class-nature').addClass('hide');
	}
	
		 
	//alert(cat_id);
}
</script>

<script type="text/javascript">
function recurring_class()
{
	//alert('rrr');
	var rc_id = $("#rec_class").val();
	if(rc_id==1){
		
		//$(#myModal).show();
		$('#myModal_monthly').modal('show');
	}
	if(rc_id==2){
		
		//$(#myModal).show();
		$('#myModal').modal('show');
	}
	else if(rc_id==3)
	{

		$('#myModal_2').modal('show');
	}
	
}
</script>


<script type="text/javascript">
function inree_class()
{
	//alert('rrr');
	var total_no_of_session = $("#no_of_session").val();
	//alert(total_no_of_session);
	var i=2;
	var j=3;
	//j.trim();
	var  hold_html;
	for(i=2;i<=total_no_of_session;i++)
	{
		//alert(i);
		//j++;
		hold_html='<div id="scs_'+i+'" style="display:none"><div class="col-sm-12 col-xs-12 sclass"><span class="faq_t_q01 cc">Session '+i+'</span><span class="faq_t_q01" style="color:#ABA9AA;">Class Schedules</span></div><div class="col-sm-12 col-xs-12 sr_pv_padding_lr"><div class="col-sm-12 col-xs-12 col-md-6"><div class="col-sm-12 col-xs-12" style=""><div class="form-group " style="margin-bottom: 5px;"><input  class="form-control reg_input" id="session_datepicker'+i+'" name="data_1[]" placeholder="Choose Date" type="text"><span class="cal_b"><img src="<?php echo HTTP_ROOT; ?>/img/cal.png"></span><p class="err_css" id="error_01" style="padding-top:0px;padding-left:10px; margin:-10px 0 10px"></p></div></div></div><div class="col-sm-12 col-xs-12 col-md-6"><div class="col-sm-12 col-xs-12" style=""><div class="form-group" style="margin-bottom: 5px;"><select class="form-control reg_input" name="time_1[]" id="sel1"><option value="">Time of Day</option><option value="9 AM">9 AM</option><option value="10 AM">10 AM</option><option value="11 AM">11 AM</option><option value="12 PM">12 PM</option><option value="1 PM">1 PM</option><option value="2 PM">2 PM</option><option value="3 PM">3 PM</option><option value="4 PM">4 PM</option><option value="5 PM">5 PM</option><option value="6 PM">6 PM</option><option value="7 PM">7 PM</option><option value="8 PM">8 PM</option><option value="9 PM">9 PM</option></select><span class="carimg"><img src="<?php echo HTTP_ROOT; ?>/img/caret.png"></span><p class="err_css" id="error_01" style="padding-top:0px;padding-left:10px;"></p></div></div></div></div><div class="col-sm-12 col-xs-12 sr_pv_padding_lr"><botton class="btn btn-primary pc_sub_class" id="add_ss_'+j+'" style="float: right; margin-right: 30px; margin-bottom: 15px;" onclick="next_session('+j+');">Add Session'+j+'</botton></div></div>';
		$('#no_session_class').append(hold_html);
		$('#session_datepicker'+i).datepicker({yearRange:'1900:2030',minDate:0,changeYear: true, changeMonth: true });
		//session_datepicker"'+i+'
		//append
		j++;
		//j.trim();
		
	}
	total_no_of_session= ++total_no_of_session;
	
	
	$('#add_ss_'+total_no_of_session).hide();
	//$('#no_session_class').append(hold_html);

}
</script>

<script type="text/javascript">
function next_session(nsid)
{
	var no_of_sess = $('#no_of_session').val();

	if(no_of_sess=='')
	{
		alert('Please Enter No Of Session');
	}
	else
	{

		$('#scs_'+nsid).show();
		nsid= --nsid;
		//alert(nsid);
		$('#scs_'+nsid).hide();
	}
	
}
</script>


<!-- End -->
<script type="text/javascript">
function regular_single_class_monthly()
{
	//alert('rrr');

	var total_session_single_class = $("#session_single_class_monthly").val();
	//alert(total_no_of_session);
	var i=2;
	var j=3;
	//j.trim();
	var  hold_html;
	for(i=2;i<=total_session_single_class;i++)
	{
		//alert(i);
		//j++;
		if(i!=total_session_single_class)
		{
		hold_html='<div class="col-sm-12 col-xs-12 sr_pv_padding_lr" id="reg_class_schedul_monthly_'+i+'" style="border: 1px solid #757575;margin-top: 15px; display:none;"><div class="col-sm-12 col-xs-12 " style="padding: 15px 35px; text-align: center;"><span class="faq_t_q01" style="color:#1B191A;float: left;">Session '+i+'</span><span class="faq_t_q01" style="color:#ABA9AA;">Class Schedules</span></div><div class="col-sm-12 col-xs-12 sr_pv_padding_lr"><div class="col-sm-12 col-xs-12 col-md-6"><div class="col-sm-12 col-xs-12" style=""><div class="form-group" style="margin-bottom: 15px;"><input class="form-control reg_input" id="pop3_datepicker3" name="date_month_lrr[]" placeholder="Date &amp; Month" type="text"></div></div><div class="col-sm-12 col-xs-12 sr_pv_padding_lr" style=""><div class="col-sm-12 col-xs-12"><div class="form-group br_state" style="margin-bottom: 10px;"><input class="form-control reg_input" id="regular_duration" placeholder="duration" type="text"><p class="err_css" id="error_mobile" style="padding-left: 10px; padding-top: 20px; margin-bottom: 5px;"></p></div></div></div></div><div class="col-sm-12 col-xs-12 col-md-6"><div class="col-sm-12 col-xs-12" style=""><div class="form-group" style="margin-bottom: 5px;"><select  class="form-control reg_input" id="time_of_day" name="reg_time[]"><option value="">Time of day</option><option value="9 AM">9 AM</option><option value="10 AM">10 AM</option><option value="11 AM">11 AM</option><option value="12 PM">12 PM</option><option value="1 PM">1 PM</option><option value="2 PM">2 PM</option><option value="3 PM">3 PM</option><option value="4 PM">4 PM</option><option value="5 PM">5 PM</option><option value="6 PM">6 PM</option><option value="7 PM">7 PM</option><option value="8 PM">8 PM</option><option value="9 PM">9 PM</option></select><span class="carimg"><img src="<?php echo HTTP_ROOT; ?>/img/caret.png" class="pop_time"></span><p class="err_css" id="error_01" style="padding-top:0px;padding-left:10px;"></p></div></div></div></div><div class="col-sm-12 col-xs-12 sr_pv_padding_lr"><input type="button" class="btn btn-primary pc_sub_class" id="" style="float: right; margin-right: 30px; margin-bottom: 15px;" onclick="regular_class_next('+j+');" value="Add Session"></div></div>';
	}
	else
	{
		hold_html='<div class="col-sm-12 col-xs-12 sr_pv_padding_lr" id="reg_class_schedul_monthly_'+i+'" style="border: 1px solid #757575;margin-top: 15px; display:none;"><div class="col-sm-12 col-xs-12 " style="padding: 15px 35px; text-align: center;"><span class="faq_t_q01" style="color:#1B191A;float: left;">Session '+i+'</span><span class="faq_t_q01" style="color:#ABA9AA;">Class Schedules</span></div><div class="col-sm-12 col-xs-12 sr_pv_padding_lr"><div class="col-sm-12 col-xs-12 col-md-6"><div class="col-sm-12 col-xs-12" style=""><div class="form-group" style="margin-bottom: 15px;"><input class="form-control reg_input" id="pop3_datepicker3" name="date_month_lrr[]" placeholder="Date &amp; Month" type="text"></div></div><div class="col-sm-12 col-xs-12 sr_pv_padding_lr" style=""><div class="col-sm-12 col-xs-12"><div class="form-group br_state" style="margin-bottom: 10px;"><input class="form-control reg_input" id="regular_duration" placeholder="duration" type="text"><p class="err_css" id="error_mobile" style="padding-left: 10px; padding-top: 20px; margin-bottom: 5px;"></p></div></div></div></div><div class="col-sm-12 col-xs-12 col-md-6"><div class="col-sm-12 col-xs-12" style=""><div class="form-group" style="margin-bottom: 5px;"><select  class="form-control reg_input" id="time_of_day" name="reg_time[]"><option value="">Time of day</option><option value="9 AM">9 AM</option><option value="10 AM">10 AM</option><option value="11 AM">11 AM</option><option value="12 PM">12 PM</option><option value="1 PM">1 PM</option><option value="2 PM">2 PM</option><option value="3 PM">3 PM</option><option value="4 PM">4 PM</option><option value="5 PM">5 PM</option><option value="6 PM">6 PM</option><option value="7 PM">7 PM</option><option value="8 PM">8 PM</option><option value="9 PM">9 PM</option></select><span class="carimg"><img src="<?php echo HTTP_ROOT; ?>/img/caret.png" class="pop_time"></span><p class="err_css" id="error_01" style="padding-top:0px;padding-left:10px;"></p></div></div></div></div><div class="col-sm-12 col-xs-12 sr_pv_padding_lr"><input type="button" class="btn btn-primary pc_sub_class" id="" style="float: right; margin-right: 30px; margin-bottom: 15px;" onclick="save_regular_class_monthly();" value="Add Session"></div></div>';
	}
		$('#no_session_single_class_monthly').append(hold_html);
		//$('#session_datepicker'+i).datepicker({yearRange:'1900:2030',minDate:0,changeYear: true, changeMonth: true });
		//session_datepicker"'+i+'
		//append
		j++;
		//j.trim();
		
	}
	total_session_single_class= ++total_session_single_class;
	
	
	//$('#add_ss_'+total_no_of_session).hide();
	//$('#no_session_class').append(hold_html);

}
</script>
<script type="text/javascript">
function regular_single_class()
{
	//alert('rrr');
	var total_session_single_class = $("#session_single_class").val();
	//alert(total_no_of_session);
	var i=2;
	var j=3;
	//j.trim();
	var  hold_html;
	for(i=2;i<=total_session_single_class;i++)
	{
		//alert(i);
		//j++;
		if(i!=total_session_single_class)
		{
		hold_html='<div class="col-sm-12 col-xs-12 sr_pv_padding_lr" id="reg_class_schedul_'+i+'" style="border: 1px solid #757575;margin-top: 15px; display:none;"><div class="col-sm-12 col-xs-12 " style="padding: 15px 35px; text-align: center;"><span class="faq_t_q01" style="color:#1B191A;float: left;">Session '+i+'</span><span class="faq_t_q01" style="color:#ABA9AA;">Class Schedules</span></div><div class="col-sm-12 col-xs-12 sr_pv_padding_lr"><div class="col-sm-12 col-xs-12 col-md-6"><div class="col-sm-12 col-xs-12" style=""><div class="form-group" style="margin-bottom: 15px;"><select  class="form-control reg_input" id="date_of_week" name="reg_date[]"><option value="">Date of Week</option><option value="Sunday">Sunday</option><option value="Monday">Monday</option><option value="Tuesday">Tuesday</option><option value="Wednesday">Wednesday</option><option value="Thursday">Thursday</option><option value="Friday">Friday</option><option value="Saturday">Saturday</option></select></div></div><div class="col-sm-12 col-xs-12 sr_pv_padding_lr" style=""><div class="col-sm-12 col-xs-12"><div class="form-group br_state" style="margin-bottom: 10px;"><input class="form-control reg_input" id="regular_duration" placeholder="duration" type="text"><p class="err_css" id="error_mobile" style="padding-left: 10px; padding-top: 20px; margin-bottom: 5px;"></p></div></div></div></div><div class="col-sm-12 col-xs-12 col-md-6"><div class="col-sm-12 col-xs-12" style=""><div class="form-group" style="margin-bottom: 5px;"><select  class="form-control reg_input" id="time_of_day" name="reg_time[]"><option value="">Time of day</option><option value="9 AM">9 AM</option><option value="10 AM">10 AM</option><option value="11 AM">11 AM</option><option value="12 PM">12 PM</option><option value="1 PM">1 PM</option><option value="2 PM">2 PM</option><option value="3 PM">3 PM</option><option value="4 PM">4 PM</option><option value="5 PM">5 PM</option><option value="6 PM">6 PM</option><option value="7 PM">7 PM</option><option value="8 PM">8 PM</option><option value="9 PM">9 PM</option></select><span class="carimg"><img src="<?php echo HTTP_ROOT; ?>/img/caret.png" class="pop_time"></span><p class="err_css" id="error_01" style="padding-top:0px;padding-left:10px;"></p></div></div></div></div><div class="col-sm-12 col-xs-12 sr_pv_padding_lr"><input type="button" class="btn btn-primary pc_sub_class" id="" style="float: right; margin-right: 30px; margin-bottom: 15px;" onclick="regular_class_next('+j+');" value="Add Session"></div></div>';
	}
	else
	{
		hold_html='<div class="col-sm-12 col-xs-12 sr_pv_padding_lr" id="reg_class_schedul_'+i+'" style="border: 1px solid #757575;margin-top: 15px; display:none;"><div class="col-sm-12 col-xs-12 " style="padding: 15px 35px; text-align: center;"><span class="faq_t_q01" style="color:#1B191A;float: left;">Session '+i+'</span><span class="faq_t_q01" style="color:#ABA9AA;">Class Schedules</span></div><div class="col-sm-12 col-xs-12 sr_pv_padding_lr"><div class="col-sm-12 col-xs-12 col-md-6"><div class="col-sm-12 col-xs-12" style=""><div class="form-group" style="margin-bottom: 15px;"><select  class="form-control reg_input" id="date_of_week" name="reg_date[]"><option value="">Date of Week</option><option value="Sunday">Sunday</option><option value="Monday">Monday</option><option value="Tuesday">Tuesday</option><option value="Wednesday">Wednesday</option><option value="Thursday">Thursday</option><option value="Friday">Friday</option><option value="Saturday">Saturday</option></select></div></div><div class="col-sm-12 col-xs-12 sr_pv_padding_lr" style=""><div class="col-sm-12 col-xs-12"><div class="form-group br_state" style="margin-bottom: 10px;"><input class="form-control reg_input" id="regular_duration" placeholder="duration" type="text"><p class="err_css" id="error_mobile" style="padding-left: 10px; padding-top: 20px; margin-bottom: 5px;"></p></div></div></div></div><div class="col-sm-12 col-xs-12 col-md-6"><div class="col-sm-12 col-xs-12" style=""><div class="form-group" style="margin-bottom: 5px;"><select  class="form-control reg_input" id="time_of_day" name="reg_time[]"><option value="">Time of day</option><option value="9 AM">9 AM</option><option value="10 AM">10 AM</option><option value="11 AM">11 AM</option><option value="12 PM">12 PM</option><option value="1 PM">1 PM</option><option value="2 PM">2 PM</option><option value="3 PM">3 PM</option><option value="4 PM">4 PM</option><option value="5 PM">5 PM</option><option value="6 PM">6 PM</option><option value="7 PM">7 PM</option><option value="8 PM">8 PM</option><option value="9 PM">9 PM</option></select><span class="carimg"><img src="<?php echo HTTP_ROOT; ?>/img/caret.png" class="pop_time"></span><p class="err_css" id="error_01" style="padding-top:0px;padding-left:10px;"></p></div></div></div></div><div class="col-sm-12 col-xs-12 sr_pv_padding_lr"><input type="button" class="btn btn-primary pc_sub_class" id="" style="float: right; margin-right: 30px; margin-bottom: 15px;" onclick="save_regular_class();" value="Add Session"></div></div>';
	}
		$('#no_session_single_class').append(hold_html);
		//$('#session_datepicker'+i).datepicker({yearRange:'1900:2030',minDate:0,changeYear: true, changeMonth: true });
		//session_datepicker"'+i+'
		//append
		j++;
		//j.trim();
		
	}
	total_session_single_class= ++total_session_single_class;
	
	
	//$('#add_ss_'+total_no_of_session).hide();
	//$('#no_session_class').append(hold_html);

}
</script>

<script type="text/javascript">
function regular_class_next(reg_cs_id)
{
	var session_s_class = $('#session_single_class').val();


	if(session_s_class=='')
	{
		alert('Please Enter No Of Session Single Class');
	}
	else
	{

		$('#reg_class_schedul_'+reg_cs_id).show();
		reg_cs_id= --reg_cs_id;
		//alert(nsid);
		$('#reg_class_schedul_'+reg_cs_id).hide();
	}
	
}
</script>
<script type="text/javascript">
function regular_class_next_monthly(reg_cs_id)
{
	var session_s_class = $('#session_single_class_monthly').val();


	if(session_s_class=='')
	{
		alert('Please Enter No Of Session Single Class');
	}
	else
	{

		$('#reg_class_schedul_monthly_'+reg_cs_id).show();
		reg_cs_id= --reg_cs_id;
		//alert(nsid);
		$('#reg_class_schedul_monthly_'+reg_cs_id).hide();
	}
	
}
</script>
<script type="text/javascript">
function save_regular_class()
{
	//alert('hi');
	 var query = $('#formId').serialize();
        var url = '<?php echo HTTP_ROOT; ?>/Homes/addRegular';
        $.post(url, query, function (response) {
         //alert (response);
         if(response==1){
         	$('#myModal').modal('hide');
			$('#myModal_monthly').modal('hide');
         }
        });
}
</script>
<script type="text/javascript">
function save_regular_class_monthly()
{
	//alert('hi');
	 var query = $('#formIdMonthly').serialize();
        var url = '<?php echo HTTP_ROOT; ?>/Homes/addRegular';
        $.post(url, query, function (response) {
         //alert (response);
         if(response==1){
			$('#myModal_monthly').modal('hide');
         }
        });
}
</script>
<script type="text/javascript">
function lrregular_single_class()
{
	
	var total_lrr_rec_class =   $('#lrr_rec_class').val();
	var total_no_ss_class   =   $('#lr_reg_single_class').val();

	var i=1;
	var j=2;
	var k=2;
	var l='';
	var lrr_id= '';
	//j.trim();
	var  hold_html;
	for(i=i;i<=total_lrr_rec_class; i++)
	{
		for(k=k;k<=total_no_ss_class;k++)
		{
				lrr_id = 'lrregular_'+i+'_'+k;
				//console.log((i+'!='+total_lrr_rec_class+' && '+k+'!='+total_no_ss_class)+' : '+(i!=total_lrr_rec_class && k!=total_no_ss_class));

			if(i==total_lrr_rec_class && k==total_no_ss_class){

				l= k+1;
				t= i;

				if(k==total_no_ss_class)
				{
					l=1;
					t= i+1;

				}
				hold_html='<div class="col-sm-12 col-xs-12 col-md-12" id="'+lrr_id+'" style="display:none;"><div class="row bdrsessn"><p>Class '+i+'</p><center><div class="bdrsessn col-sm-12 col-xs-12 col-md-10" style="margin-left: 54px;"><div class="row"><div class="col-md-5 col-sm-5 col-xs-12 pull-left bsc"><p>Session '+i+'.'+k+'(x,y)</p></div><div class="col-md-7 col-sm-7 col-xs-12 pull-left bsc1"></div></div><div class="row"><div class="col-md-6 col-sm-6 col-xs-12"><div class="form-group reg_text"><input class="form-control reg_input" id="pop3_datepicker3" name="date_month_lrr[]" placeholder="Date &amp; Month" type="text"><input class="hidden" name="clas_id[]" id="clas_id" value="'+i+'"/><span class="cal_b"><img src="<?php echo HTTP_ROOT; ?>/img/cal.png" class="lri_cal_2"></span></div></div><div class="col-md-6 col-sm-6 col-xs-12"><div class="form-group reg_text1"><select class="form-control reg_input" name="session_time[]" id="sel1"><option value="">Time of Day</option><option value="9 AM">9 AM</option><option value="10 AM">10 AM</option><option value="11 AM">11 AM</option><option value="12 PM">12 PM</option><option value="1 PM">1 PM</option><option value="2 PM">2 PM</option><option value="3 PM">3 PM</option><option value="4 PM">4 PM</option><option value="5 PM">5 PM</option><option value="6 PM">6 PM</option><option value="7 PM">7 PM</option><option value="8 PM">8 PM</option><option value="9 PM">9 PM</option></select><span class="carimg"><img src="<?php echo HTTP_ROOT; ?>/img/cal.png" class="lri_cal"></span></div><div class="col-md-12 col-sm-12 col-xs-12 pull-right padd_l_r"></div></div></div></div></center><div class="col-md-12 col-sm-12 col-xs-12 pull-right padd_l_r"><input type="button" class="btn sessbtn pull-right" style="margin-top: 19px;" onclick="save_lrregular_class();" value="Save Class"></div></div></div>';


				
			}
			else
			{

				l= k+1;
				t= i;

				if(k==total_no_ss_class)
				{
					l=1;
					t= i+1;

				}
				hold_html='<div class="col-sm-12 col-xs-12 col-md-12" id="'+lrr_id+'" style="display:none;"><div class="row bdrsessn"><p>Class '+i+'</p><center><div class="bdrsessn col-sm-12 col-xs-12 col-md-10" style="margin-left: 54px;"><div class="row"><div class="col-md-5 col-sm-5 col-xs-12 pull-left bsc"><p>Session '+i+'.'+k+'(x,y)</p></div><div class="col-md-7 col-sm-7 col-xs-12 pull-left bsc1"></div></div><div class="row"><div class="col-md-6 col-sm-6 col-xs-12"><div class="form-group reg_text"><input class="form-control reg_input" id="pop3_datepicker3" name="date_month_lrr[]" placeholder="Date &amp; Month" type="text"><input class="hidden" name="clas_id[]" id="clas_id" value="'+i+'"/><span class="cal_b"><img src="<?php echo HTTP_ROOT; ?>/img/cal.png" class="lri_cal_2"></span></div></div><div class="col-md-6 col-sm-6 col-xs-12"><div class="form-group reg_text1"><select class="form-control reg_input" name="session_time[]" id="sel1"><option value="">Time of Day</option><option value="9 AM">9 AM</option><option value="10 AM">10 AM</option><option value="11 AM">11 AM</option><option value="12 PM">12 PM</option><option value="1 PM">1 PM</option><option value="2 PM">2 PM</option><option value="3 PM">3 PM</option><option value="4 PM">4 PM</option><option value="5 PM">5 PM</option><option value="6 PM">6 PM</option><option value="7 PM">7 PM</option><option value="8 PM">8 PM</option><option value="9 PM">9 PM</option></select><span class="carimg"><img src="<?php echo HTTP_ROOT; ?>/img/cal.png" class="lri_cal"></span></div><div class="col-md-12 col-sm-12 col-xs-12 pull-right padd_l_r"><input type="button" class="btn sessbtn pull-right" id="add_session_'+i+'_'+k+'" onclick="lrr_add_class_session('+t+','+l+');" value="Add Session"></div></div></div></div></center><div class="col-md-12 col-sm-12 col-xs-12 pull-right padd_l_r"><input type="button" class="btn sessbtn pull-right" style="margin-top: 19px;" onclick="lrr_add_class('+j+','+l+');" value="Add Class"></div></div></div>';

				//$('#add_session_'+j+'_'+k+).hide();

				//k++;


				
			}

				$('#lrregular_loop_s_1').append(hold_html);
		}
		k=1;
		
		j++;

		
	}
	total_lrr_rec_class = ++total_lrr_rec_class;
	total_no_ss_class   = ++total_no_ss_class;
		
		//alert(total_lrr_rec_class);
		//alert(total_no_ss_class);
}
</script>
<script type="text/javascript">
function lrr_add_class(lrr_class,lrr_ss_id){

	lrr_id1 = 'lrregular_'+lrr_class+'_'+lrr_ss_id;



	var total_lrr_rec_class =   $('#lrr_rec_class').val();
	var total_no_ss_class   =   $('#lr_reg_single_class').val();

	if(total_lrr_rec_class=='')
	{
		alert('No. of lrregular Recurring Class');

	}
	else if(total_no_ss_class=='')
	{
		alert('No. of session in a Single Class');
	}
	else{

		lrr_id1 = 'lrregular_'+lrr_class+'_'+lrr_ss_id;
		$('#'+lrr_id1).show();
		//$('#add_session_'+lrr_class+'_'+lrr_ss_id+).hide();
		lrr_class= --lrr_class;
		if(lrr_ss_id==1);
	{
		lrr_ss_id=total_no_ss_class;
	}
		
		lrr_id1 = 'lrregular_'+lrr_class+'_'+lrr_ss_id;
		$('#'+lrr_id1).hide();

	}

}
</script>

<script type="text/javascript">
function lrr_add_class_session(lrr_class,lrr_ss_id){

	lrr_id1 = 'lrregular_'+lrr_class+'_'+lrr_ss_id;

	var total_lrr_rec_class =   $('#lrr_rec_class').val();
	var total_no_ss_class   =   $('#lr_reg_single_class').val();

	if(total_lrr_rec_class=='')
	{
		alert('No. of lrregular Recurring Class');

	}
	else if(total_no_ss_class=='')
	{
		alert('No. of session in a Single Class');
	}
	else{

	//alert(lrr_id1);
	//$('#'+lrr_id1).show();
	//add_session_1_4
	


		

			//lrr_id1 = 'lrregular_'+lrr_class+'_'+lrr_ss_id;
				$('#'+lrr_id1).show();

		lrr_ss_id= --lrr_ss_id;

		//lrr_ss_id= --lrr_ss_id;
		lrr_id1 = 'lrregular_'+lrr_class+'_'+lrr_ss_id;
		//alert(nsid);
		
		//if(total_lrr_rec_class!=lrr_class && total_no_ss_class!=lrr_ss_id)
		//{
		$('#'+lrr_id1).hide();

		$('#add_session_'+lrr_ss_id+'_'+total_no_ss_class).hide();
		

		

		//alert(lrr_id1)
	
}

}
</script>
<script type="text/javascript">
/* Braingroom modifications */

function community(){
	 if (community_id==null) {
            $("#s15").html('Please select atleast 1');

            $("#locality").focus();
            return false;
	    }
	    else
	    {
	    	$("#s15").html('');
            return false;
	    }
	}
/* Braingroom modifications */

function save_lrregular_class()
{
	//alert('hi');
	 var query = $('#form_lrr_Id').serialize();
        var url = '<?php echo HTTP_ROOT; ?>/Homes/addLrregular';
        $.post(url, query, function (response) {
         if(response==1){
         	$('#myModal_2').modal('hide');
         }
        });
}
</script>

<script type="text/javascript">
		$('#community_id').multiselect({
			nonSelectedText: 'Select Community Areas',
			enableFiltering: true,
			filterPlaceholder: 'Search',
			enableCaseInsensitiveFiltering : true,
			includeSelectAllOption: true,
			filterPlaceholder: 'Search',
			dropRight: true	    });

		$('#age_category').multiselect({
			nonSelectedText: 'Select Age Category',
			enableFiltering: true,
			filterPlaceholder: 'Search',
			enableCaseInsensitiveFiltering : true,
			includeSelectAllOption: true,
			filterPlaceholder: 'Search',
			dropRight: true	    });
			
		$('#group_id').multiselect({
			nonSelectedText: 'Select Group',
			enableFiltering: true,
			filterPlaceholder: 'Search',
			enableCaseInsensitiveFiltering : true,
			includeSelectAllOption: true,
			filterPlaceholder: 'Search',
			dropRight: true	    });
		
		$('#region').multiselect({
			nonSelectedText: 'Select Region',
			enableFiltering: true,
			filterPlaceholder: 'Search',
			enableCaseInsensitiveFiltering : true,
			includeSelectAllOption: true,
			filterPlaceholder: 'Search',
			dropRight: true	    });
			
		$('#locality_id').multiselect({
			nonSelectedText: 'Select Locality',
			enableFiltering: true,
			filterPlaceholder: 'Search',
			enableCaseInsensitiveFiltering : true,
			includeSelectAllOption: true,
			filterPlaceholder: 'Search',
			dropRight: true	    });


</script>

   <script>
   function location_details(){
	   	var location_level_length = document.getElementsByName('area[]').length;
		var i;
	   		if(location_level_length != 0 || location_level_length != null || location_level_length != ''){
					for (i = 0; i < location_level_length; i++) 
						{		
								var location =  document.forms["frm"]['area_'+i].value;
								var locality_id = document.forms["frm"]['area_id_'+i].value;
								if(location == null || location == ''){
									$('#L-'+i).html('Please Choose Location');
									$('#area_'+i).focus();
									return false;
								} else if(locality_id == null || locality_id =='') {
									$('#LO-'+i).html('Please Select Locality');
									$('#area_id_'+i).focus();
									return false;
								} 
									
								
						}document.forms["frm"].submit();
					return false;
			} 
	   }
   </script>

