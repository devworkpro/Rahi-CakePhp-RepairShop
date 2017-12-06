<?php echo $this->Flash->render('positive'); ?>
<div class="warper container-fluid" style="margin-bottom:50px; margin-top:10px;">
 <?php echo $this->Html->link('New RMA',array('controller'=>'Rmas','action'=>'add'),array('escape'=>false, 'class'=>'btn btn-success pull-right'));?>
<div class="page-header">
    <h3>RMA/Returns Tracker</h3>
    <p>Track items that you need to return, RMA, etc.</p>
    
    
</div>



  <div class="panel panel-default">
    <div class="panel-heading">Rmas Order Tracker</div>
      <div class="panel-body">
          <table id="example" class="table table-striped">
              <thead>
              <tr>	 
                <th>Customer</th>
			        	<th>Description</th>
      	        <th>Vendor</th>
                <th>Vendor name</th>
				        <th>Status</th>
                <th>Reason</th>
                <th>Tracking number</th> 
                <th>Submitted on</th> 
                <th>Returned on</th> 
				        <th></th>                     
		         	</tr>
	          	</thead>
						  <tbody class="userdata">
                <?php $counter=0;?>
                <?php foreach($Rma as $Rmas) {
                  $row_id =  ++$counter; ?>
                  <tr>
                  <?php  $Rma_id= $Rmas['Rma']['id'];?>
                  <?php  $user_id= $Rmas['Rma']['user_id'];?>
                    <td><?php echo $Rmas['Rma']['customer_name'];?></td>

                    <td><?php echo $Rmas['Rma']['item_description'];?></td>

                    <td><?php 
                            if(!empty($Rmas['vendor']))
                            {
                                echo $Rmas['vendor']['Vendor']['name']; 
                            }
                        ?>
                    </td>

                    <td><?php echo $Rmas['Rma']['vendor_name'];?></td>

                    <td>
                      <div class="status_<?php echo $row_id; ?> statuss">
                        <span data-bip-skip-blur="true" id="<?php echo $row_id; ?>" class="best_in_place status rec_<?php echo $row_id; ?>"> <?php echo $status = $Rmas['Rma']['status'];?>
                              </span>                                      
                      </div>
                      <div style="display:none;" class="quantityedit qty_edit_<?php echo $row_id;?>" id="<?php echo $row_id; ?>" >
                        <form class="place" action="javascript:void(0);">
                          <select  id="<?php echo $row_id; ?>" class="select_ form-control" >
                            <option> New </option>
                            <option>Waiting for RMA</option>
                            <option>Return Shipped</option>
                            <option>Waiting for Refund</option>
                            <option>Resolved</option>
                          </select>
                          <input type="hidden"  id="id_<?php echo $row_id;?>" value="<?php echo $Rmas['Rma']['id'];;?>">

                              
                        </form>
                      </div>
                    </td>

                    <td><?php echo $Rmas['Rma']['reason'];?></td>                 

                    <td><?php echo $Rmas['Rma']['tracking_number'];?></td>
                    <td><?php echo  $created = date('d-m-Y',strtotime($Rmas['Rma']['submitted'])); ?></td>                         
                    <td><?php echo  $created = date('d-m-Y',strtotime($Rmas['Rma']['returned'])); ?></td>
                     
                    <td>
                      <?php echo $this->Html->link('<i class="btn btn-warning btn-sm fa fa-pencil"></i>',array('controller'=>'Rmas','action'=>'rmaedit',$Rmas['Rma']['id']),array('escape'=>false));?>

                      <?php echo $this->Html->link('<i class="btn btn-danger btn-sm fa fa-times"></i>',array('controller' => 'Rmas', 'action' => 'deleteRma',$Rmas['Rma']['id']),array('escape'=>false,'confirm' => 'Are you sure you wish to delete this Rma?'));?>
                  
          
                    </td>
                  </tr>    
                  <?php } ?>                 
              </tbody>
          </table>    
      </div><!-- /.box-body -->
  </div><!-- /.box -->


</div>      


<script>
$(document).ready(function() {
  
$(".status").click(function(){
  id = $(this).attr('id');
$(".qty_edit_"+id).show();
$(".status_"+id).hide();


});

$('.quantityedit').focusout(function(){
  $(".quantityedit").hide();
  $(".statuss").show();
});


    
$('.select_').change(function() {
var status=$(this).val();
id = $(this).attr('id');
    var rma_id = $('#id_'+id).val();
          
    if(status!='')
    {
         $.ajax({
         type: "POST",
         url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/Rmas/statusupdate/",

        // url: "search.php",
         data: { status : status , rma_id:rma_id},
      
         success: function(data)
         {
           window.location.reload();
          //  $('#newDiv').html(jQuery(data).find('.result').html()); 
          }
          });
    }return false;    

  });


});
</script>
<style type="text/css">
.best_in_place {
    background-color: white;
    border: 1px solid #ddd9d9;
    color: black;
    display: inline-block;
    line-height: 1.8;
    padding: 2px 3px;
}
</style>     