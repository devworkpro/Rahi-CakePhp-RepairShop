<?php echo $this->Flash->render('positive'); ?>
<div class="warper container-fluid" style="margin-bottom:50px; margin-top:10px;">
	<div class="row">
		<div class="col-md-6"><h3>Customer Purchases</h3></div>
		<div class="col-md-6 text-right" style="margin-top: 15px;">
		<?php echo $this->Html->link('New Purchase',array('controller'=>'Orders','action'=>'add'),array('escape'=>false, 'class'=>'btn btn-success m-b-sm'));?>
		</div>
	</div>
	<hr>
    <div class="panel panel-white" >
        <div class="panel-heading clearfix">
            <h3 class="panel-title"><i class="fa fa-desktop"></i>     Purchases</h3>
            
          
        </div>

        <div class="panel-body">
            
            <div class="table-responsive">
            <table id="example" class="display table" style="width: 100%; cellspacing: 0; ">
                <thead>
                  <tr>  
                        <th>Customer</th>  
                        <th>Items</th>
                        <th>Amount</th>
                        <th>Status</th>
                        <th>Paid</th>
                        <th>Created</th>
                        <th></th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>    
                        <th>Customer</th>  
                        <th>Items</th>
                        <th>Amount</th>
                        <th>Status</th>
                        <th>Paid</th>
                        <th>Created</th>
                        <th></th>
                  </tr>
                </tfoot>
                <tbody>
                 <?php $counter=0;?>
                    <?php foreach($orders as $order) {
                    	 $row_id =  ++$counter;
                    	?>
                      <tr>
                        
                        <td><?php $customer_name = $order['users']['first_name'].' '.$order['users']['last_name'];?>
                            <?php echo $this->Html->link(ucfirst($customer_name),array('controller'=>'Orders','action'=>'orderdetails',$order['orders']['id']),array('escape'=>false));?>


                        </td>
                        <td><?php echo $items = $order['orders']['item']; ?></td>
                        <td><?php echo '$'.$total = $order['orders']['total']; ?></td>

                       
                        <td>
	                        <div class="statuss status_<?php echo $row_id; ?>">
	                         
	                        	<span data-bip-skip-blur="true" id="<?php echo $row_id; ?>" class="best_in_place status rec_<?php echo $row_id; ?>"> <?php echo $status = $order['orders']['status'];?>
	                            </span>                                      
	                        </div>
	                        <div style="display:none;" class="statusedit status_edit_<?php echo $row_id;?>" id="<?php echo $row_id; ?>" >
	                          	<form action="javascript:void(0);">
	                            	<select  id="<?php echo $row_id; ?>" class="select_ form-control">
			                            <option> Estimate </option>
			                            <option>Waiting on Refurb</option>
			                            <option>Waiting on Restock</option>
			                            <option>Added to Inventory</option>
			                            <option>Completed</option>
			                            
	                            	</select>
	                            	<input type="hidden"  id="id_<?php echo $row_id;?>" value="<?php echo $order['orders']['id'];?>">
	                            </form>
	                        </div>
                        </td>

                        
                        <td><?php $paid = $order['orders']['paid']; 
                        	if($paid==1)
                        	{
                        		echo $this->Html->image('check_mark_green.gif', array('alt' => 'Image','width'=>'15', 'height'=>'15'));
							}
                        	else{
                        	} ?>
                        </td>


                        <td>                  	
                        <?php echo date('D d-m-Y g:i A',strtotime($order['orders']['created']));?>
                        </td>
                        

                        <td>
                        
                        <?php echo $this->Html->link('<i class="btn btn-warning fa fa-edit"></i>',array('controller'=>'Orders','action'=>'orderdetails',$order['orders']['id']),array('escape'=>false));?>
                        
                         <?php echo $this->Html->link('<i class="btn btn-danger fa fa-remove"></i>',array('controller' => 'Orders', 'action' => 'deleteorder',$order['orders']['id']),array('escape'=>false,'confirm' => 'Are you sure you wish to delete this order?'));?>
            
                        </td>
                      </tr>    
                   <?php } ?>
                </tbody>
            </table>  
            </div>
        </div>
    </div>
</div> 


<script>
$(document).ready(function() {
  
    $(document).on('click', '.status', function() {
        id = $(this).attr('id');
        $(".status_edit_"+id).show();
        $(".status_"+id).hide();
    });

    
    $(document).on('focusout', '.statusedit', function() {
    	$(".statusedit").hide();
    	$(".statuss").show();
    });

    
    $(document).on('change', '.select_', function() {

    	var status=$(this).val();
    	var id = $(this).attr('id');
        var order_id = $('#id_'+id).val();
               
        if(status!='')
        {
            $.ajax({
            type: "POST",
            url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/admin/Orders/statusupdate/",

            data: { status : status , order_id:order_id},
          
            success: function(data)
                {
                    $(".status_edit_"+id).hide();
                    $(".rec_"+id).empty();
                    $(".rec_"+id).append(status);
                    $(".rec_"+id).show();
                    $(".status_"+id).show();
                }
            });
        }return false;    
    });
});
</script>