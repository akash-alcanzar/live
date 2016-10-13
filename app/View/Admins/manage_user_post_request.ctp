<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
<?php 
    echo $this->Html->css('backend/font-awesome');
    echo $this->Html->script('backend/datatable');
    echo $this->Html->script('backend/jquery-1.12.0.min');
    echo $this->Html->script('backend/jquery.dataTables.min');
    echo $this->Html->script('backend/dataTables.buttons.min');
    echo $this->Html->script('backend/buttons.flash.min');
    echo $this->Html->script('backend/jszip.min');
    echo $this->Html->script('backend/pdfmake.min');
    echo $this->Html->script('backend/vfs_fonts');
    echo $this->Html->script('backend/buttons.html5.min');
    echo $this->Html->script('backend/buttons.print.min');
    echo $this->Html->css('backend/datatable');
    echo $this->Html->css('backend/jquery.dataTables.min');
    echo $this->Html->css('backend/buttons.dataTables.min');
?>
<script type="text/javascript">
$(document).ready(function() {
    $('#example').DataTable( {
        "pagingType": "full_numbers",
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );
</script>
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-md-12" style="padding-top:15px">
                <ol class="breadcrumb">
                    <li class="active"><?php echo $this->Html->link('<i class="fa fa-home"></i>', array('controller'=>'Admins','action'=>'manageVendor'), array('escape'=>false))?></li>
                    <li class="active"><?php echo $this->Html->link('<li class="active">Manage Blog Request</li>', array('controller'=>'Admins','action'=>'manageBlogRequest'), array('escape'=>false))?></li>
                    
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="dashboard-main">
                    <div class="panel panel-default panel-primary ">
                        <div class="panel-heading strip pannel-heading-strip"><i class="fa fa-pencil-square-o"></i>&nbsp; Manage Blog Request</div>
                        <div class="panel-body">
                            <div class="table-top-action">
                            </div>
                             <div id='success_msg'>
                             <?php  echo $this->Session->flash();?>
                             </div>
                            <table id="example" class="table table-striped table-bordered" style="table-layout: fixed;width: 100%;">
                                <thead>
                                <tr>
                                    <th>S.No.</th>
                                    <th>User Name</th>
                                    <th>Segment Name</th>
                                    <th>User Post Name</th>
                                    <th>User Post Summary</th>
                                    <th>User Post Image</th>
                                    <th>Create Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php 
                                $i=1;
                                foreach($data as $res){ ?>
                                <tr>
                                    <td>
                                        <?php echo $i; $i++;?>
                                    </td>
                                    <td>
                                        <?php echo !empty($res['usermaster']['first_name'])?$res['usermaster']['first_name']:"N/A";?>
                                    </td>
                                     <td>
                                        <?php echo !empty($res['classgmt']['segment_name'])?$res['classgmt']['segment_name']:"N/A";?>
                                    </td>
                                    <td>
                                        <?php echo !empty($res['Post']['post_title'])?$res['Post']['post_title']:"N/A";?>
                                    </td>
                                    <td>
                                        <?php echo !empty($res['Post']['post_description'])?$res['Post']['post_description']:"N/A";?>
                                    </td>
                                    <td>
                                        <?php if(!empty($res['Post']['post_image'])){?>
                                          
                                            <img src="<?php echo HTTP_ROOT."/img/blog_image/".$res['Post']['post_image'];?>" width="60" height="60">
                                            
                                        <?php }else{
                                                
                                                echo "N/A";
                                        
                                        }?>
                                    </td>    
                                    <td>
                                        <?php echo !empty(date('d M Y',$res['Post']['add_date']))?date('d M Y',$res['Post']['add_date']):"N/A";?>
                                    </td>
                                    <td>
                                        <?php if($res['Post']['status']==1){
                                              echo "Approved";  
                                              }else if($res['Post']['status']==2){
                                                echo "Rejected";
                                            }else if($res['Post']['status']==0){
                                                echo "Pending";
                                            }
                                        ?>
                                    </td>
                                    <td>
                                        
                                        <?php 

                                        if($res['Post']['status']=='0'){

                                            echo $this->Html->link('Accepted',array('controller'=>'Admins','action'=>'blogRequestaccept/'.base64_encode($res['Post']['id'])))."&nbsp;|&nbsp;";
                                            echo $this->Html->link('Rejected',array('controller'=>'Admins','action'=>'blogRequestrejected/'.base64_encode($res['Post']['id'])))."&nbsp;";
                                        }
                                       
                                       if($res['Post']['status']=='1'){
                                            echo $this->Html->link('Rejected',array('controller'=>'Admins','action'=>'blogRequestrejected/'.base64_encode($res['Post']['id'])));
                                       }
                                    ?>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Trigger the modal with a button -->

</section>
</section>
<script>
$(document).ready(function(){
$('#success_msg').delay(5000).fadeOut();
});
$(document).ready(function(){
$('#Manage_User_Post_Request').css('background-color','black');
});
</script>