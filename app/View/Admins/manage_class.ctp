

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
                    <li class="active"><?php echo $this->Html->link('<i class="fa fa-home"></i>', array('controller'=>'Admins','action'=>'index'), array('escape'=>false))?></li>
                    <li class="active">Manage Class</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <span style="float: right; margin-bottom: 5px">
                    <?php echo $this->Html->link('Upload Csv Class',array('controller'=>'Admins','action'=>'upload_csv_classes'),array('class'=>'btn btn-success')) ?>
                </span>
            </div>
            <div class="col-md-12">
                <div class="dashboard-main">
                    <div class="panel panel-default panel-primary ">
                        <div class="panel-heading strip pannel-heading-strip"><i class="fa fa-pencil-square-o"></i>&nbsp; Manage Class</div>
                        <div class="panel-body">
                            <div class="table-top-action">
                                
                                
                            </div>
                            <div id='success_msg'>
                            <?php echo $this->Session->flash();?>
                        </div>
                            <table id="example" class="table table-striped table-bordered" style="table-layout: fixed;width: 100%;">
                                <thead>
                                <tr>
                                    <th style="width:25px;">Sr. no.</th>
                                    <th>Class Title</th>
                                    <th>Class Provided By</th>
                                    <th>Class period</th>
                                    
                                    <th>Class Type</th>
                                    
                                    <th>Class Duration</th>
                                    <th >Ticket Available</th> 
                                    <th>Price Per Ticket</th>  

                                    <th style="width:45px;">status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php 
                                $i=1;
                                foreach($view_class as $res){ ?>
                                <tr>
                                    <td><?php echo $i; $i++;?></td>
                                    <td><a href='<?php echo HTTP_ROOT;?>/classes/<?php echo $res['VendorClasse']['class_topic'];?>'><?php echo $res['VendorClasse']['class_topic'];?></a></td>
                                    <td><?php echo !empty($res['VendorClasse']['class_by'])?$res['VendorClasse']['class_by']:"N/A";?></td>
                                     <td><?php echo !empty($res['VendorClasse']['starting_month'])?$res['VendorClasse']['starting_month']:"N/A";?> - <?php echo !empty($res['VendorClasse']['end_month'])?$res['VendorClasse']['end_month']:"N/A";?></td>

                                    
                                    <td>
                                        <?php if($res['VendorClasse']['class_timing_id']=='1'){
                                        echo "Flexible";
                                    }else{ 
                                        echo "Fixed";
                                    }?>
                        
                                    </td>

                                    <td><?php echo !empty($res['VendorClasse']['class_duration'])?$res['VendorClasse']['class_duration']:"N/A";?></td>
                                      
                                   <td><?php echo !empty($res['VendorClasse']['max_ticket_available'])?$res['VendorClasse']['max_ticket_available']:"N/A";?></td>
                                   <td><?php echo !empty($res['ClassLevel']['price'])?$res['ClassLevel']['price']."&#8377;":"N/A";?></td>

                                    
                                      
                                     
                                    <td><?php if($res['VendorClasse']['status']==1){
                                      echo "Active";  
                                      }else if($res['VendorClasse']['status']==2){
                                        echo "InActive";
                                    }else if($res['VendorClasse']['status']==3){
                                        echo "Unverified";
                                    }
                                    ?></td>
                                    <td><?php echo $this->Html->link('View',array('controller'=>'Admins','action'=>'viewClass/'.base64_encode($res['VendorClasse']['id'])))."&nbsp|";
                                     if($res['VendorClasse']['status']==1){
                                    echo $this->Html->link('DeActivate',array('controller'=>'Admins','action'=>'ClassStatus/'.base64_encode($res['VendorClasse']['id'])))."&nbsp";
                                    }
                                    else if($res['VendorClasse']['status']==2){
                                      echo $this->Html->link('Activate',array('controller'=>'Admins','action'=>'ClassStatus/'.base64_encode($res['VendorClasse']['id'])))."&nbsp";
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
</section>
</section>
<script>
$(document).ready(function(){
$('#success_msg').delay(5000).fadeOut();
});
$(document).ready(function(){
$('#Manage_Class').css('background-color','black');
});
</script>

   

