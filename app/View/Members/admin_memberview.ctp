<section class="content">
	<div class="row">
		<div class="col-md-9">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title"><center><i>Mambers</i></center></h3>
                </div><!-- /.box-header -->
                <div class="box-body">

					<table class="table table-bordered table-striped dataTable no-footer">      
						<tr><th>product Name</th>
							<td><?php echo $order['Order']['product_name']; ?></td>
						</tr>
						<tr><th>Amount</th>
							<td><?php echo $order['Order']['amount']; ?></td>
						</tr>
						<tr><th>Quantity</th>
							<td><?php echo $order['Order']['quantity']; ?></td>
						</tr>
     
						<tr><td colspan="2">
						<?php echo $this->Html->link('Edit',array('controller'=>'orders','action'=>'orderedit',$order['Order']['id']),array('escape'=>false));?>&nbsp;&nbsp;
						<?php echo $this->Html->link('Back',array('controller' => 'orders', 'action' => 'orderlist',$order['Order']['id']),array('escape'=>false,));?>
						</td></tr>   
    
					</table>
				</div><!-- /.box-body -->
			</div><!-- /.box -->
		</div>
	</div>
</section>


  