<?php echo $this->Flash->render('positive'); ?>
<div class="warper container-fluid" style="margin-bottom:50px;">
<div class="page-header"><h1>Order Details <span><?php echo $this->Html->link('<i class="fa fa-arrow-left"></i> Back',array('controller' => 'orders', 'action' => 'orderlist'),array('escape'=>false,'class'=>'btn btn-default pull-right'));?></span></h1></div>
<div class="panel panel-default">
                    <div class="panel-heading">Order View</div>
                    <div class="panel-body">



					<table class="table table-bordered table-striped dataTable no-footer">      
						<tr><th>product Name</th>
							<td><?php echo $order['Order']['product_name']; ?></td>
						</tr>
						<tr><th>Amount</th>
							<td><?php echo '$',$amount = $order['Order']['amount']; ?></td>
						</tr>
						<tr><th>Quantity</th>
							<td><?php echo $quantity = $order['Order']['quantity']; ?></td>
						</tr>
						<tr><th>Total Amount</th>
							<td><?php echo  '$',$quantity*$amount; ?></td>
						</tr>
     
						<tr><td colspan="2">
						<?php echo $this->Html->link('Edit',array('controller'=>'orders','action'=>'orderedit',$order['Order']['id']),array('escape'=>false,'class'=>'btn btn-primary'));?>&nbsp;&nbsp;
						<?php echo $this->Html->link('Back',array('controller' => 'orders', 'action' => 'orderlist'),array('escape'=>false,'class'=>'btn btn-default'));?>
						</td></tr>   
    
					</table>
				</div><!-- /.box-body -->
			</div><!-- /.box -->
		</div>
	

  