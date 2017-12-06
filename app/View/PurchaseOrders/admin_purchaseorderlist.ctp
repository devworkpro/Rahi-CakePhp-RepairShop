<?php echo $this->Flash->render('positive'); ?>
<div class="warper container-fluid" style="margin-bottom:50px; margin-top:10px;">
	<div class="row">
		<div class="col-md-6"><h2>Purchase Order List</h2></div>
		<div class="col-md-6 text-right" style="margin-top: 15px;">
		<?php echo $this->Html->link('New Purchase Order',array('controller'=>'PurchaseOrders','action'=>'add'),array('escape'=>false, 'class'=>'btn btn-success m-b-sm'));?>
		</div>
	</div>
	<hr>
    <div class="panel panel-white" >
        <div class="panel-heading clearfix">
        </div>

        <div class="panel-body">
            
            <div class="table-responsive">
            <table id="example" class="display table" style="width: 100%; cellspacing: 0; ">
                <thead>
                    <tr>  
                        <th>Number</th>  
                        <th>Status</th>
                        <th>Vendor</th>
                        <th>User</th>
                        <th>Order date</th>
                        <th>Expected date</th>
                        <th>Delivery tracking</th>
                        <th>Total</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                 <?php $counter=0;?>
                    <?php foreach($PurchaseOrders as $purchaseorder) {
                    	$row_id =  ++$counter;
                        $po_id = $purchaseorder['PurchaseOrder']['id'];
                    	?>
                    <tr>
                        
                        <td>
                            <?php $number = $purchaseorder['PurchaseOrder']['number'];?>
                            <?php echo $this->Html->link($number,array('controller'=>'PurchaseOrders','action'=>'purchaseorderdetails',$po_id),array('escape'=>false));?>
                        </td>
                        <td><?php echo $purchaseorder['PurchaseOrder']['status'];?></td>
                        <td><?php 
                                if(!empty($purchaseorder['vendor']))
                                {
                                    echo $purchaseorder['vendor']['Vendor']['name']; 
                                }
                            ?></td>

                        <td><?php echo $purchaseorder['PurchaseOrder']['user'];?></td>    
                        <td><?php echo $purchaseorder['PurchaseOrder']['order_date'];?></td>

                        
                        <td><?php echo $purchaseorder['PurchaseOrder']['expected_date'];?></td>

                        <td><?php $delivery_tracking = $purchaseorder['PurchaseOrder']['delivery_tracking'];?>
                            <a target="_blank" href="http://www.google.com/search?&q=<?php echo $delivery_tracking;?>"><?php echo $delivery_tracking;?></a>
                        </td>
                        <td><?php echo $purchaseorder['PurchaseOrder']['order_total'].'.0'; ?></td>
                       
                        <td>
                        
                        <?php echo $this->Html->link('Edit',array('controller'=>'PurchaseOrders','action'=>'purchaseorderdetails',$po_id),array('class'=>'btn btn-default','escape'=>false));?>
                        
                         <?php echo $this->Html->link('<i class="btn btn-danger fa fa-remove pull-right"></i>',array('controller' => 'PurchaseOrders', 'action' => 'deletePurchaseOrder',$po_id),array('escape'=>false,'confirm' => 'Are you sure you wish to delete this order?'));?>
            
                        </td>
                      </tr>    
                   <?php } ?>
                </tbody>
            </table>  
            </div>
        </div>
    </div>
</div> 