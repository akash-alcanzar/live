<select  class="form-control reg_input" name="class_type_id[]" id="class_type_id" multiple="multiple">
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
                                               <?php echo '~';?>
                                              
							<div class="row input_fields_wrap_b2c" style="">
								<div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-3">
									<select  class="form-control reg_input" name="level_id[]" id="level_id_0">
									<option value="">Choose Expertise Level</option>
									<option value="1">Beginners</option>
									<option value="2">Intermediate</option>
									<option value="3">Advanced</option>
									
									</select>
									<div id="E-0" class="pc_error">&nbsp;</div>							
									
									<span class="carimg"><img src="<?php echo HTTP_ROOT; ?>/img/caret.png"></span>
									<p class="err_css" id="error_01" style="padding-top:0px;padding-left:10px;"></p>
								</div>

								<div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-3">
									<select  class="form-control reg_input" name="expert_level_id[0]" id="expert_level_id_0">
									<option value="">Choose Class Level</option>
									<option value="1">Level 1</option>
									<option value="2">Level 2</option>
									<option value="3">Level 3</option>
									
									</select>
									<div id="EP-0" class="pc_error">&nbsp;</div>							
										
									<span class="carimg"><img src="<?php echo HTTP_ROOT; ?>/img/caret.png"></span>
									<p class="err_css" id="error_01" style="padding-top:0px;padding-left:10px;"></p>
								</div>
							
									<div id="PR-0" class="pc_error">&nbsp;</div>
			
								<div class="form-group col-xs-11 col-sm-11 col-md-5 col-lg-3">
									<div class="input textarea"><textarea id="Description_0" rows="3" cols="25" placeholder="Description" class="form-control reg_input" name="data[Description][0]"></textarea></div>
									<div id="DE-0" class="pc_error">&nbsp;</div>
								</div>
								<a href="#" data-toggle="tooltip" title="what courses you are going to cover!">
								<span class="glyphicon glyphicon-info-sign"></span>
								</a>
								
		<div class="form-group" style="float:right;">
								<botton class="btn btn-primary add_field_button_b2c" onclick=";">Add more</botton>
								</div>
						</div>
<script type="text/javascript">


var classtype  = $('#class_type_id').multiselect({
nonSelectedText: 'Select Class Types',
enableFiltering: true,
filterPlaceholder: 'Search',
enableCaseInsensitiveFiltering : true,
includeSelectAllOption: true,
filterPlaceholder: 'Search',
dropRight: true			});
classtype.multiselect('rebuild');
</script>