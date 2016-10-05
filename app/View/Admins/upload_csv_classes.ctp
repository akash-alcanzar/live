<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
<style type="text/css">
.modal-dialog{
   position: static;
   margin: 30px auto;
   width: 900px;
}	
</style>
<section id="main-content">
 	<section class="wrapper">
 		<div style="padding-top:20px" class="row">
 			<div style="" class="col-md-12">
 				<ol class="breadcrumb">
 					<li><a href="#"><i class="fa fa-home"></i></a></li>
 					<li><a href="<?php echo HTTP_ROOT."/Admins/manageClass";?>">Mange Classes</a></li>
 					<li><a href="<?php echo HTTP_ROOT."/Admins/addGroup";?>">Upload Csv Class</a></li>
 				</ol>
 			</div>
 		</div>
 		
 		<div class="row">
 			<div class="col-md-12">
 				<div class="panel panel-default panel-primary">
 					<div class="panel-heading pannel-heading-strip"><i class="fa fa-edit"></i>&nbsp; Upload Csv Class</div>
 					<div class="panel-body">
 						
 							 <?php echo $this->Form->create('VendorClass',array('enctype'=>'multipart/form-data'));?>   
 							<div class="login-wrap" style="padding:0;margin:0px auto;">
 								
 								<div style="color:red;text-align:center;">
 									<?php echo  $this->Session->flash(); ?>
 								</div>
 								
 								<div class="row">

 								   <!-- <div class="col-md-12" style="margin-bottom: 15px">
                                      
                                      <div class="col-lg-2"><label>Vendor</label>  </div>
 									  <div class="col-lg-6"> 
 									     <div class="input-group"> 
 									       <select name="vendor" class="form-control">
 									       	<option>Select Vendor</option>

 									       </select>
 									     </div> 
 									  </div>

 									</div>

 									<div class="col-md-12" style="margin-bottom: 15px">
                                      
                                      <div class="col-lg-2"><label>Image</label>  </div>
 									  <div class="col-lg-6"> 
 									     <div class="input-group"> 
 									       <input aria-label="Text input with multiple buttons" class="form-control"> 
 									       <div class="input-group-btn"> <button class="btn btn-default" type="button" id="choose-img" data-toggle="modal" data-target="#myModal">Select Image</button> 
 									      </div> 
 									     </div> 
 									  </div>

 									</div>

 									<div class="col-md-12" style="margin-bottom: 15px">
                                
                                      <div class="col-lg-2"><label>Video</label>  </div>
 									  <div class="col-lg-6"> 
 									     <div class="input-group"> 
 									       <input aria-label="Text input with multiple buttons" class="form-control"> 
 									       <div class="input-group-btn"> <button class="btn btn-default" type="button">Choose video</button> 
 									      </div> 
 									     </div> 
 									  </div>

 									</div> -->

 									<div class="col-md-12" style="margin-bottom: 15px">
                                
                                      <div class="col-lg-2"><label>Upload Csv</label>  </div>
 									  <div class="col-lg-6"> 
 									     <div class="input-group">  									    
 									       <?php echo $this->Form->input('csv_class',array('type'=>'file','class'=>'form-control')) ?>
 									     </div> 
 									  </div>

 									</div>

 									<div class="col-md-12" style="margin-bottom: 15px">
                                      <div class="col-lg-2"><label></label>  </div>
 									  <div class="col-lg-6"> 
 									     <div class="input-group"> 
 									       <input type="submit" class="btn btn-default savebtn" style="background-color:#AB1A1F;color:#fff; !important;" value="Submit">
 									     </div> 
 									  </div>
 									</div>
 								</div>


 							</div>
 						<?php echo $this->Form->end(); ?>
 					</div>
 				</div>
 			</div>
 		</div>
 	</section>
 </section>


<!-- Modal -->
<?php /*
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Image Gallary</h4>
        </div>
        <div class="modal-body">
          <p>Some text in the modal.</p>
          
          <div class="row">
              <?php $images= array('1','2','3','4','1','2','3','4') ?>
			  <?php foreach($images as $img){ ?>
			  <div class="col-sm-6 col-md-4">
			    <div class="thumbnail">
			      <img src="https://www.braingroom.com/img/Vendor/class_image/violin.jpg">
			    </div>
			  </div>
			  <?php } ?>

			  <div class="col-sm-6 col-md-4">
			    <div class="thumbnail">
			      <img src="https://www.braingroom.com/img/Vendor/class_image/violin.jpg">
			    </div>
			  </div>

			  <div class="col-sm-6 col-md-4">
			    <div class="thumbnail">
			      <img src="https://www.braingroom.com/img/Vendor/class_image/violin.jpg">
			    </div>
			  </div>

			</div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
*/ ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>


  
