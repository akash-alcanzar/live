<style type="text/css">
  .butt_dollar-br {
    position: relative;
    top: -171px;
    left: 31%;
    background: #30AFA8;
    color: #FFF !important;
    border-radius: 15px;
  }

  .flexible-fixed-fun {
    color: #FFF;
    background-color: #00CDC6;
    font-family: OS_regular;
    padding: 3px 6px;
    
    position: absolute;
    border-radius: 25px;
    top: 9px;
    left: 8px;
    width: 69px;
    height: 28px;
    text-align: center;
    font-size: 13px;
}

.image_price12-fun {
   background-color: #00CDC6;
    margin-top: 10px;
    padding: 3px 6px;
    text-align: center;
    position: absolute;
    margin-left: 69%;
    width: 59px;
    height: 27px;
    border-radius: 25px;
}
.pull-right-fun {
    float: right !important;
}
.fstElement{width: 100% !important;}
.fstMultipleMode .fstControls{width: 100% !important;}
.fstMultipleMode .fstQueryInput{width: 100% !important;}
</style>


<div class="col-md-10 col-sm-9 col-xs-12 ruth6542 ruth654786">
    <div class="col-md-12 col-sm-12 col-xs-12 sr_pv_padding_lr" style="background:#fff;">
        <div class="col-md-12 col-sm-12 col-xs-12 clrdash123 ruth1">
            <div class="col-md-4 col-sm-4 col-xs-4 bar321 bar786">
                <div><i class="fa fa-bars dshclr12" style="display:none;"></i><img src="<?php echo HTTP_ROOT;?>/img/profile_img/user.png" class="user432"><span class="dashbrd12 prf543">Add Class To Catalogue</span></div>
            </div>
            <!-- Start Top Right bar -->
            <?php echo $this->Element('mainpage_top_right_ber'); ?>
          <!-- Start Top Right bar -->
        </div>

        <?php 
         /* echo "<pre>";
          print_r($add_class_list);
          echo "</pre>"; */
        ?>
        <!-- ************work************** -->
        <div class="col-md-12 col-sm-12 col-xs-12 padd_l_r add_top">
               <section>
                    <?php foreach ($all_class as $key => $value_class) {

                   
                      $id                    =  $value_class['VendorClasse']['id'];
                      $class_title           =  $value_class['VendorClasse']['class_topic'];
                      $place                 =  $value_class['VendorClasse']['location'];
                      $class_photo           =  $value_class['VendorClasse']['upload_class_photo'];
                      $class_duration        =  $value_class['VendorClasse']['class_duration'];
                      $price_per_head        =  $value_class['VendorClasse']['price_per_head'];
                      $catalogue_status_find =  $value_class['VendorClasse']['catalogue_status'];
                      $class_timing_id       =  $value_class['VendorClasse']['class_timing_id'];
                      $user_id               =  $value_class['VendorClasse']['user_id'];
                      $c_id = base64_encode($id);

                      //echo $catalogue_status_find;

                        if($catalogue_status_find==''){

                          $catalogue_class_status='NA';
                        }
                        else if($catalogue_status_find=='0'){

                          $catalogue_class_status='Pending';
                        }
                        else if($catalogue_status_find=='1'){

                          $catalogue_class_status='Approved';
                        }
                        else if($catalogue_status_find=='2'){

                          $catalogue_class_status='Rejected';
                        }
                        
                        
                      if($class_photo=='')
                      {
                        $classimg='defult_pic.png';
                      }
                      else
                      {
                        $classimg=$class_photo;
                      }
                      if($class_timing_id==1)
                      {
                        $class_type='Flexible';
                      }
                      else if($class_timing_id==2){

                        $class_type='Fixed';
                      }
                    
                    ?>
                        
                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 padd_l_r add_top1 ">
                            <div class="grid1 gridworkshopsbg1">
                                <div class="view1 view-first">
                                    <div class="index_img">
                                       <div class="image_price12-fun" style="color:white;float:right">₹ <?php echo $price_per_head; ?></div>
                                       <?php 
                                        if($catalogue_status_find==1)
                                        {
                                       ?>
                                        <a href="<?php echo HTTP_ROOT;?>/Homes/classDetail/<?php echo $c_id; ?>">
                                          <img src="<?php echo HTTP_ROOT; ?>/img/Vendor/class_image/<?php echo $classimg;?>">
                                          </a> 
                                          <?php
                                        }
                                        else
                                        {
                                          ?>
                                          <img src="<?php echo HTTP_ROOT; ?>/img/Vendor/class_image/<?php echo $classimg;?>">
                                          <?php
                                        }
                                        ?>
                                         <div class="flexible-fixed-fun"><?php echo $class_type; ?></div>
                                    </div>                
                                </div>                           
                                <div class="golden_br">
                                    <h4><?php echo $class_title; ?></h4>
                                    <!-- <p>PLACE :<?php //echo $place; ?></p> -->
                                    <p>Duration : <?php echo $class_duration; ?></p>
                                   
                                    <!-- <h6>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </h6> -->
                                    <?php 
                                    if($catalogue_status_find==''){
                                      ?>
                                    <button class="btn" tabindex="0" id="<?php echo 'send_request_'.$id; ?>" onclick="add_catalogue('<?php echo $id; ?>','<?php echo $user_id;?>');">Send Request</button>
                                    <?php 
                                  }
                                   
                                    else if($catalogue_status_find==2){
                                      ?>
                                    <button class="btn" tabindex="0" id="<?php echo 'send_request_'.$id; ?>" onclick="add_catalogue('<?php echo $id; ?>','<?php echo $user_id;?>');">Send Request</button>
                                    <?php 
                                  }
                                  else if($catalogue_status_find==0)
                                  {
                                    ?>
                                    <button class="btn" tabindex="0" id="<?php echo 'send_request_'.$id; ?>" onclick="add_catalogue('<?php echo $id; ?>','<?php echo $user_id;?>');" style="visibility: hidden;">Send Request</button>
                                    <?php
                                  }
                                  else if($catalogue_status_find==1)
                                  {
                                    ?>
                                    <button class="btn" tabindex="0" id="<?php echo 'send_request_'.$id; ?>" onclick="add_catalogue('<?php echo $id; ?>','<?php echo $user_id;?>');" style="visibility: hidden;">Send Request</button>
                                    <?php
                                  }
                                  ?>
                                </div>
                                <div class="add_class" id="<?php echo 'catalogue_class_status_'.$id; ?>">
                                    <p>Request Status: <?php echo $catalogue_class_status; ?></p>
                                </div>                               
                            </div>
                        </div></a>
                   <?php } ?>
               </section>
        </div>
        <!-- ************work1************** -->
    </div>


    
</div>
 
<?php echo $this->Html->css('front/fastselect.min');?>
<?php echo $this->Html->script('front/fastselect.standalone');?>
<div class="modal fade" id="category_id_bkp">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#2bcdc1;">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title cat_mod_title">Add Location For Cataloge</h4>
            </div>
            <div class="modal-body">
                <div class="">&nbsp;</div>
                 
                <div style="" id="city_locality">
                     <div id="msg" class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="width:100%";height:20px;></div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"> 
                        <fieldset class="form-group">
                          
                            <select class="input_login form-control " name="city" id="city"
                             />
                                 <option value="-1">Select city</option>
                                 <?php foreach($cities_data as $country) { ?>
                                    
                                    <?php if($country['City']['id'] == 1){ ?>

                                        <option value="<?php echo $country['City']['id']; ?>">
                                            <?php  echo $country['City']['name']; ?>
                                        </option>
                                    <?php }else{ ?>
                                        <option value="<?php echo $country['City']['id']; ?>" disabled>
                                            <?php  echo $country['City']['name']; ?>
                                        </option>
                                    <?php } ?>
                                 <?php } ?>
                            </select>
                            <span class="err" id="err_city">&nbsp;</span>
                        </fieldset>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <fieldset class="form-group ">
                           <select name="region[]"  id="region" class="multiple_region input_login form-control countries1" multiple placeholder="Select Region">
                           
                             
                              <option value="North">North</option>
                              <option value="south">South</option>
                              <option value="East">East</option>
                              <option value="West">West</option>
                            </select>
                            <span class="err" id="err_region">&nbsp;</span>
                        </fieldset>   
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <fieldset class="form-group ">
                            <select class=" multipleSelect input_login form-control countries1" multiple name="locaity[]" id="locaity" placeholder="Select Locality"/>
                                 <option value="0">Select Locality</option>
                            </select>
                            <span class="err" id="err_locaity">&nbsp;</span>
                        </fieldset>   
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <fieldset class="form-group ">
                            <select class=" multi_class input_login form-control countries1" name="class_type[]" multiple id="class_type"placeholder="Select Class Type"/ >
                              <?php foreach($class_type11 as $res) { ?>
                                  
                                        <option value="<?php echo $res['ClassType']['types']; ?>" >
                                            <?php  echo $res['ClassType']['types']; ?>
                                        </option>
                                    <?php } ?>
                                
                              
                            </select>
                            <span class="err" id="err_class_type">&nbsp;</span>
                        </fieldset>   
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <fieldset class="form-group ">
                            <select class=" multi_group input_login form-control countries1" name="group[]" multiple  id="group_id" placeholder="Select Group"/>
                                
                                  <?php foreach($group_name as $res) { ?>
                                  
                                        <option value="<?php echo $res['ConnectGroup']['id'];?>" >
                                            <?php  echo $res['ConnectGroup']['group_name']; ?>
                                        </option>
                                    <?php } ?>
                            </select>
                            <input type="hidden" name="vendor_id" id="vendor_id">
                            <input type="hidden" name="class_id" id="class_id">
                            
                            <span class="err" id="err_catalog_group">&nbsp;</span>
                        </fieldset>   
                    </div>
                </div>
                <script type="text/javascript">
                      
                </script>
            </div>
            <div class="modal-footer" style="border-top:none;">
                <button style="background-color:#2bcdc1;border:none;" type="button" class="btn btn-primary" id="getcat_ids">Send</button>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
      $(document).ready(function(){
     
      });
 $('.multipleSelect').fastselect();
  $('.multiple_region').fastselect();   
  $('.multi_class').fastselect(); 
  $('.multi_group').fastselect();   


          $('#organization').hide();
          $('#individual').show(); 

          $("#radio-1").click(function(){
          //alert('najmu');
          //Holds the product ID of the clicked element
          $('#organization').hide();
          $('#individual').show();
        });
        $("#radio-2").click(function(){
          // Holds the product ID of the clicked element
          $('#individual').hide();
          $('#organization').show();
        });        
  $('#datepicker').click(function(){
   
    /* $( "#datepicker").datepicker();*/
    $( "#datepicker" ).datepicker({yearRange:'1900:2030',maxDate:0,changeYear: true, changeMonth: true });

     $( "#datepicker").datepicker("show");
  })
   $('#datepicker').keypress(function(){
     $( "#datepicker" ).datepicker();
     $( "#datepicker" ).datepicker("show");
  });


    $("#file-upload").on('change',function(){
        var a = $(this).val();      
        $('#upload_photo').val(a);
    });

    $("#img_click").on('click',function(){
        $('#file-upload').click();
    });

    $("#file-upload1").on('change',function(){
      var a = $(this).val();
    
      $('#upload_photo1').val(a);
    });

    $("#img_click1").on('click',function(){
      $('#file-upload1').click();
    });


    $("#file-upload2").on('change',function(){
        var a = $(this).val();      
        $('#upload_photo2').val(a);
    });

    $("#img_click2").on('click',function(){
        $('#file-upload2').click();
    });

    $("#file-upload3").on('change',function(){
      var a = $(this).val();
    
      $('#upload_photo3').val(a);
    });

    $("#img_click3").on('click',function(){
      $('#file-upload3').click();
    });
  
  




</script>
<script type="text/javascript">
$('#city').on('change',function(){
var city_id=$(this).val();
 $('#locaity').val('');
$.ajax({  
            type: "POST",  
            url: "<?php echo HTTP_ROOT; ?>/Homes/findlocality",  
            data: 'city_id='+city_id,
            success: function(respons){ 
             $('.loader').hide();
           $('#locaity').html(respons);
}
}); 
});
$('#region').on('change',function(){
var city=$('#city').val();
  if(city=='-1'){
   $('#msg').html('<div class="alert alert-danger">Please Select City</div>');
   $(this).val('');
   return false;
   }
else{
return true;
} 
});
$('#getcat_ids').on('click',function(){
  var city=$('#city').val();
  if(city=='-1'){
   $('#msg').html('<div class="alert alert-danger">Please Select City</div>');
   return false;
   } 
else{
  var region=$('#region').val();
  var locality=$('#locaity').val();
  var class_type=$('#class_type').val();
  var group=$('#group_id').val();
  
  $.ajax({  
            type: "POST",  
            url: "<?php echo HTTP_ROOT; ?>/Homes/requestCatalogue",  
            data:  {
          city:city ,
          region: region,
          locality:locality,
          class_type:class_type,
          group:group,
          vendor_id:$('#vendor_id').val(),
          class_id:$('#class_id').val()

        },  
            success: function(respons){  
              $('#category_id_bkp').modal('hide');
                if(respons==1){
                  
                  window.location.href='<?php echo HTTP_ROOT;?>/Homes/addClassCatalog';
                }

              
            }
          });
}
})

function add_catalogue(class_id,user_id){

  $('#vendor_id').val(user_id);
  $('#class_id').val(class_id);
    $('#category_id_bkp').modal('show');
 /* $.ajax({  
            type: "POST",  
            url: "<?php echo HTTP_ROOT; ?>/Homes/addCatalogue",  
            data: 'class_id='+class_id,  
            success: function(catalogue_respons){  
                //$("#status1").html('');
              //alert(catalogue_respons);

              if(catalogue_respons==1)
              {
                    $("#catalogue_class_status_"+class_id).html('<p>Request Status:Pending</p>');
                    //$('#holder_name').focus();
                    //$("#send_request_"+class_id).hide();
                     document.getElementById("send_request_"+class_id).style.visibility = "hidden";
             }
            else{

                $("#showmsg1").html('Not Save Successfully');
                //$('#holder_name').focus();
            }
            } 
           
          }); */
  
}
</script>