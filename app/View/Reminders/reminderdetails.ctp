<?php echo $this->Flash->render('positive'); ?>
<div class="warper container-fluid" style="margin-bottom: 10px;">
	<div class="page-header"><h1>Appointment Details</h1></div>
	<div class="panel panel-default">
		<div class="panel-body">
			<div class="row">  
				<div class="col-xs-12 col-sm-12">
					<div class="form-group">
						
							<b>Customer: </b><span><?php echo $Ticket['Ticket']['name'];?></span><br><br>
							<b>Customer Email: </b><?php echo $user['User']['email']; ?><br><br>
							<b>Customer Phone: </b><?php echo $user['User']['phone_number']; ?><br><br>
							<b>Summary: </b><span><?php echo $Appointments['Appointment']['summary']; ?></span><br><br>
							<b>Description: </b><?php echo $Appointments['Appointment']['description']; ?><br><br>
							<?php $first_date = $Appointments['Appointment']['start_at'];?>
							<b>Start at: </b><?php echo $date = date('D d-m-Y g:i A',strtotime($first_date));?><br><br>
							<b>End at: </b><?php echo date('D d-m-Y g:i A',strtotime($Appointments['Appointment']['end_at']));?><br><br>
							<b>Location: </b><?php echo $Appointments['Appointment']['address'];?><br><br>
							<b>Do Not Email (or invite): </b><?php $email=$Ticket['Ticket']['email'];if($email=='on'){echo "No";}else{ echo "Yes";} ?>
							<br><br>
							<b>Attendees: </b><?php echo $Appointments['Appointment']['attendees'];?><br><br>
							<b>Linked To:</b><?php echo $this->Html->link( 'Ticket',array('controller'=>'Tickets','action'=>'ticketdetails',$Ticket['Ticket']['id']),array('escape'=>false));?><br><br>	
							<hr class="dotted">
							<?php echo $this->Html->link('Edit',array('controller' => 'Appointments', 'action' => 'appointmentedit',$Appointments['Appointment']['id']),array('escape'=>false,'class'=>'btn btn-primary'));?>   |   
                   			<?php echo $this->Html->link('Back',array('controller' => 'Appointments', 'action' => 'appointmentlist'),array('escape'=>false,'class'=>'btn btn-default'));?>
                   </div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>	
			