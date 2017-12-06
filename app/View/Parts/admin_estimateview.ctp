<div class="warper container-fluid">
<div class="page-header"><h1>Invoice Details <small></small></h1></div>
<div class="panel panel-default">
                    <div class="panel-heading">Invoice View</div>
                    <div class="panel-body">



					<table class="table table-bordered table-striped dataTable no-footer">      
						<tr><th>Inv Number</th>
							<td><?php echo $Invoice['Invoice']['inv_number']; 
							?></td>
						</tr>
						<tr><th>Name</th>
							<td><?php echo $Invoice['Invoice']['name']; ?></td>
						</tr>
						<tr><th>Status</th>
						<td>
							<?php $status = $Invoice['Invoice']['status']; 
							if ($status=='1'){
								 echo "Confirm";
							}
							else{ echo "Pending";?>
							<?php 	}?>
						</td>	
						</tr>
						<tr><th>Amount</th>
							<td><?php echo '$',$Invoice['Invoice']['tax_rate']; ?></td>
						</tr>
						<tr><th>Date</th>
							<td><?php echo $Invoice['Invoice']['created']; ?></td>
						</tr>
						<tr><th>Total Amount</th>
							<td><?php echo '$',$Invoice['Invoice']['total']; ?></td>
						</tr>
     
						<tr><td colspan="2">
						<?php echo $this->Html->link('Edit',array('controller'=>'Invoices','action'=>'editinginvoice',$Invoice['Invoice']['id']),array('escape'=>false));?>&nbsp;&nbsp;
						<?php echo $this->Html->link('Back',array('controller' => 'Invoices', 'action' => 'invoicelist',$Invoice['Invoice']['id']),array('escape'=>false,));?>
						</td></tr>   
    
					</table>
				</div><!-- /.box-body -->
			</div><!-- /.box -->
		</div>
	