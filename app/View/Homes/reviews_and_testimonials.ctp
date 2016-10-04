<style>
.text-primary{
color: #337ab7;
font-family: -webkit-body;}
.primary{
color: #00497b;
font-family: -webkit-body;
text-align: center;
}
.main{
font-size: 200%;font-family: initial;color: crimson;
text-align: center;}
.list-disc{
margin: 0px 85px;
}
</style>
<section id="contact">
    <div class="container">
        <div class="row">
            <div class="title-area" style="padding:20px;">
                <span class=""></span>
                <h2 class="title">Reviews and Testimonials</h2>
                <div class="col-xs-12 col-sm-12 ">
                    <center>
                    <img src="<?php echo HTTP_ROOT;?>/img/underline.png" alt="images not found" width="641" height="31" class="b_img_line img-responsive">
                    <?php
                    //echo $this->Image->resize('img/underline.png','308','15', array('class' => 'img-responsive b_img_line'));
                    ?>
                    </center>
            </div> 
        </div>
        
        <!-- <h4 align="center">Please take some time to read through the following terms and conditions.</h4><br>-->
        <div class="col-md-12">
        
        </div>         
        
       
           
            <form name="form1" method="post" action="" enctype="multipart/form-data" onsubmit="submitform()" >
                 <div class="col-md-12 col-sm-12 col-xs-12 pad_all funsld">
                  <div class="col-md-6 col-sm-4 col-xs-6">
                  <img src="<?php echo HTTP_ROOT;?>/img/review/review.jpg" class="foot_img"></img>
                  </div>
                   <div class="col-md-6 col-sm-4 col-xs-6 fpara">
                  <h4 class="text-primary">Please Enter your Reviews and Suggestions:</h4> 
				 	<div class="">&nbsp;</div>
                          <div class="col-md-12 col-sm-12 col-xs-12">
                           
                             <div class="col-md-1 col-sm-1 col-xs-1">
                                 <div class="row">
                                  <img src="<?php echo HTTP_ROOT;?>/img/review/Name.png" class="pimg1"></img>
                                 </div> <div class="row">&nbsp;</div>
                                  <div class="row">
                                  <img src="<?php echo HTTP_ROOT;?>/img/review/Photo.png"  class="pimg1"></img>
                                 </div> <div class="row">&nbsp;</div>
                                  <div class="row">
                                  <img src="<?php echo HTTP_ROOT;?>/img/review/review.png" class="pimg1"></img>
                                 </div>
                             </div>
                             <div class="col-md-3 col-sm-3 col-xs-3">
                                <div class="row"><label>Name</label></div> <div class="row">&nbsp;</div>
                                <div class="row"><label>Photo</label></div> <div class="row">&nbsp;</div>
                                <div class="row"><label>Review for</label></div> <div class="row">&nbsp;</div>
                           </div>
                           	<div class="col-md-8 col-sm-3 col-xs-3">
                           
                                  <div class="row"><input type="text" name="review_name"/></div>
                                  <div class="row">&nbsp;</div>
                                  <div class="row"><input type="file" name="review_photo"/></div>
                                  <div class="row">&nbsp;</div>
                                  <div class="row"><select name="reviews">
                                  <option value="Braingroom_Review">Braingroom Review</option>
                                  <option value="Specific_Review">Specific Review</option>
                                  </select></div>
                         	 </div>
                         
                        
                           </div>
                              <div class="col-md-12 col-sm-12 col-xs-12">
                              	  <div class="col-md-1 col-sm-1 col-xs-1">&nbsp;</div>
                                  <div class="row">&nbsp;</div>
                                  <div class="col-md-10 col-sm-10 col-xs-10">
                                  <div class="row">
                                  <textarea name="reviews" rows="8" cols="60" class="textareaa"></textarea>
                                  <div class="row">&nbsp;</div>
                                  <div class="col-md-12 col-sm-12 col-xs-12">
                                 		<div class="col-md-4 col-sm-4 col-xs-4">&nbsp;</div>
                                  		<div class="col-md-4 col-sm-4 col-xs-4">
                                 			 <input type="submit" name="Submit" value="Submit" id="sub"  />
                                        </div>
                                        <div class="col-md-4 col-sm-4 col-xs-4">&nbsp;</div>
                                  </div>
                                  </div>
                                  <div class="col-md-1 col-sm-1 col-xs-1">&nbsp;</div>
                                  </div>
                     		 </div>
                     </div>
                </div>
            
                    <div class="">&nbsp;</div>   
         <div style="visibility: hidden;" id="hiddenDiv">
	 <form name="form2" method="post" action="" enctype="multipart/form-data" id="output" >
      <div class="col-md-12 col-sm-12 col-xs-12 pad_all funsld" >
      <div class="col-md-1 col-sm-1 col-xs-1">&nbsp;</div>
       		<div class="col-md-3 col-sm-3 col-xs-3">
                 <div class="row"><label style="font-size:18px;text-align:center;">Name</label></div> <div class="row">&nbsp;</div>
                 <div class="row">
                   <img src="<?php echo HTTP_ROOT;?>/img/review/Photo copy.png" width="100" height="100" style="background:#2bcdc1;"></img>
                 </div> <div class="row">&nbsp;</div>
             </div>
              <div class="col-md-8 col-sm-8 col-xs-8">
              	 <div class="row"><h3>Review</h3></div> <div class="row">&nbsp;</div>
                 <div class="row"><label>Review ....</label></div> <div class="row">&nbsp;</div>
               </div>
      </div>
      </form>
      </div>

</section>
<script type="text/JavaScript">
function submitform() {
if(document.cookie.indexOf("div") == -1) {
document.cookie = "div=visibility";
}
}

window.onload = function() {
if(document.cookie.indexOf("div") != -1) {
document.getElementById("hiddenDiv").style.visibility = "visible";
}
}
</script>


