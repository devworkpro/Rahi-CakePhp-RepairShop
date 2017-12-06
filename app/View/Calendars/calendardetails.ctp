<?php echo $this->Flash->render('positive'); ?>
<div class="warper container-fluid">
	<div ><h1>RMA Details</h1></div>
	<div class="panel panel-default">
		<div class="panel-body">
			<div class="row">  
				<div class="col-xs-12 col-sm-12">
					<div class="form-group">

							<b>Account: </b><span><?php echo $Rmas['Rma']['id'];?></span><br><br>

							<b>Customer: </b><span><?php echo $Rmas['Rma']['customer_name'];?></span><br><br>

							<b>Ticket: </b><?php  ?><br><br>

							<b>Invoice: </b><?php  ?><br><br>

							<b>Purchase order: </b><?php  ?><br><br>
						
							<b>Item: </b><?php  ?><br><br>

							<b>Vendor: </b><?php echo $Rmas['Rma']['vendor'];?><br><br>

							<b>Status: </b><?php echo $Rmas['Rma']['status'];?><br><br>

							<b>Reason: </b><?php echo $Rmas['Rma']['reason']; ?><br><br>

							<b>Notes: </b><?php echo $Rmas['Rma']['notes']; ?><br><br>

							<b>Tracking number:</b><?php echo $Rmas['Rma']['tracking_number'];?><br><br>	

							<b>Submitted on: </b><?php echo $Rmas['Rma']['submitted']; ?><br><br>

							<b>Returned on: </b><?php echo $Rmas['Rma']['returned']; ?><br><br>

							<b>Vendor name: </b><?php echo $Rmas['Rma']['vendor_name'];?><br><br>

							<b>Breakage: </b><?php $breakage=$Rmas['Rma']['breakage'];
							if($breakage=="on"){echo 'true';}else{echo 'false';} ?><br><br>

							<hr class="dotted">
							<?php echo $this->Html->link('Edit',array('controller' => 'Rmas', 'action' => 'rmaedit',$Rmas['Rma']['id']),array('escape'=>false));?>   |   
                   			<?php echo $this->Html->link('Back',array('controller' => 'Rmas', 'action' => 'rmalist'),array('escape'=>false));?>
                   </div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>				