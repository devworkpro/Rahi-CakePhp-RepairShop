<?php echo $this->Flash->render('positive'); ?>
<style type="text/css">
  .customer{
    text-align: center;
    background: #F1F1F1;
  }
</style>
<?php $invcount=0;$paid_inv=0;$unpaid_inv=0;$paid_inv_total=0;$unpaid_inv_total=0;$inv_total=0;?>
  <?php foreach($invoice as $inv) {?>
    <?php  ++$invcount;?>
    <? $inv_total = $inv_total + $inv['Invoice']['total'];?>
    <?php $status = $inv['Invoice']['status'];
    if($status=='1')
    {
    $paid_inv=$paid_inv+1;
    $paid_inv_total = $paid_inv_total + $inv['Invoice']['total'];
    }
    else
    {
    $unpaid_inv=$unpaid_inv+1;
    $unpaid_inv_total = $unpaid_inv_total + $inv['Invoice']['total'];
    }
    ?>
    
  <?php } ?>


  <?php $tic_count=0;$resolved_tic=0;$open_tic=0;?>
  <?php foreach($ticket as $tic) {?>
    <?php  ++$tic_count;?>
    <?php $status = $tic['Ticket']['status'];
    if($status=='Resolved')
    {
    	$resolved_tic=$resolved_tic+1;
    }
    else
    {
    	$open_tic = $open_tic+1;
    }
   
    ?>
    
  <?php } ?>




<div class="warper container-fluid" style="margin-bottom:50px;">
	<div class="page-header">
  		<h1>Customer Details
  		<span class="pull-right">
  			<span style="display: none;" id="user_id"><?php echo $user_id=$userDetail['User']['id']; ?></span>
  			<span style="display: none;" id="firstname"><?php echo $first_name=$userDetail['User']['first_name']; ?></span>
  			<span style="display: none;" id="lastname"><?php echo $last_name=$userDetail['User']['last_name']; ?></span>
  			
  			<?php echo $this->Html->link('Edit',array('controller' => 'users', 'action' => 'useredit',$user_id),array('escape'=>false,'class'=>'btn btn-primary'));?>

  			<span class="btn-group">
	        <a class="btn btn-default btn-sm dropdown-toggle" href="#" data-toggle="dropdown">New<span class="caret"></span></a>
	        <ul class="dropdown-menu">
	            <li>
	            	<a href="#myAppointmentModal" class="menu-default" data-toggle="modal">Appointment</a>
	            </li>
	            <li>
	            	<a href="#myAttachmentModal" class="menu-default" data-toggle="modal">Attachment</a>
	            </li>
	            <li><?php echo $this->Html->link('<p class="menu-default">Invoice</p>',array('controller'=>'Invoices','action'=>'add','?' => array('user_id' => $user_id)),array('escape'=>false));?></li>
	            <li><?php echo $this->Html->link('<p class="menu-default">Estimate</p>',array('controller'=>'Estimates','action'=>'add','?' => array('user_id' => $user_id)),array('escape'=>false));?></li>
	            <li><?php echo $this->Html->link('<p class="menu-default">Ticket</p>',array('controller'=>'Tickets','action'=>'new',$user_id),array('escape'=>false));?></li>
	            <li><?php echo $this->Html->link('<p class="menu-default">Payment</p>',array('controller'=>'users','action'=>'#',$user_id),array('escape'=>false));?></li>
	            <li><?php echo $this->Html->link('<p class="menu-default">Customer Purchase</p>',array('controller'=>'Orders','action'=>'add','?' => array('user_id' => $user_id)),array('escape'=>false));?></li>
	            
	        </ul>
	      	</span>


  			<span class="btn-group">
	        <a class="btn btn-default btn-sm dropdown-toggle" href="#" data-toggle="dropdown">Actions<span class="caret"></span></a>
	        <ul class="dropdown-menu">
	            <li><?php echo $this->Html->link('<p class="menu-default">Delete</p>',array('controller'=>'users','action'=>'deleteuser',$user_id),array('escape'=>false,'confirm' => 'Are you sure?'));?></li>
	        </ul>
	      	</span>

			
  			<?php echo $this->Html->link('<i class="fa fa-arrow-left"></i> Back',array('controller' => 'users', 'action' => 'index'),array('escape'=>false,'class'=>'btn btn-default'));?>	
  		</span>
  		</h1>
  	</div>
  	<div class="row">
		<div class="col-xs-12 col-sm-12">
		  <div class="col-md-3">
		    <div class="panel panel-white">
		      <div class="panel-body customer">
		        <h4>Tickets</h4>
		        <h5>Open / Total</h5>

		        <span style="font-size: 50px; bold;"><?php echo $open_tic.'/'.$tic_count?></span>
		      </div>
		    </div>
		  </div>
		  <div class="col-md-3">
			  <div class="panel panel-white">
			    <div class="panel-body customer">
			      <h4>Invoices</h4>
			      <h5>Unpaid / Total</h5>
			      <span style="font-size: 50px; bold;"><?php echo $unpaid_inv.'/'.$invcount;?></span>
			    </div>
			  </div>  
		  </div>
		  <div class="col-md-3">
		    <div class="panel panel-white">
		      <div class="panel-body customer">
		        <h4>Balance Open / Total Invoiced</h4>
		        <span style="font-size: 50px; bold;"><?php echo '$'.$unpaid_inv_total.'/<br>'.'$'.$inv_total;?></span>
		      </div>
		    </div>
		  </div>
		  <div class="col-md-3">
		    <div class="panel panel-white">
		      <div class="panel-body customer">
		        <h4>Credit Balance</h4>
		        <span style="font-size: 50px; bold;"><?php echo '$'.'0';?></span>
		      </div>
		    </div>  
		  </div>
		</div>
	</div><br/>

<!-- Customer information panel -->
  <div class="panel panel-default">
    <div class="panel-heading"><i class="fa fa-user"></i>       Customer Info</div>
    <div class="panel-body">
	<!-- /.box-header -->
      <div class="tab-pane active" id="user">
        <div class="box-body">
        	<div class="row">
        		
        		<div class="col-lg-6 col-md-6">
         		<h1>
         		<?php echo ucfirst($userDetail['User']['first_name'])." ".ucfirst($userDetail['User']['last_name']); ?>
                 | 
                 <?php echo $this->Html->link(ucfirst($userDetail['User']['business_name']),array('controller' => 'users', 'action' => 'userdetail',$user_id),array('escape'=>false,));?>	
            	</h1>
            	<p>Customer online profile link:  <?php echo $this->Html->link("Link",array('controller' => 'PortalUsers', 'action' => 'userlogin'),array('escape'=>false, "target"=>"_blank"));?>	</p>
            	<p>Added on: <?php $date=date_create($userDetail['User']['created']);
            echo date_format($date,"d-M-Y"); ?> </p>

            	<p>Referred by: <?php echo $userDetail['User']['referred_by'];?> </p>
        		</div>
        		<div class="col-lg-6 col-md-6"> <br>
				<?php echo $this->Html->link('<i class="fa fa-barcode"></i>
Customer Barcode Label',array('controller' => 'users', 'action' => 'userdetail',$user_id),array('escape'=>false,'class'=>'btn btn-default pull-right'));?>




        		</div>
        	</div>

        	<div class="row">
        		<div class="col-lg-3 col-md-3" style="min-width: 180px;">
        		<b>Email:</b> <?php echo $userDetail['User']['email'];?> <br>
        		<b>Office:</b> <?php 
        						if(!empty($phone)){
									foreach ($phone as $ph) {
										$phone_type	= $ph['Phone']['phone_type'];
										
										if($phone_type=='Office')
										{
											echo $ph['Phone']['phone_number'];
										}
									}
								}

								?> <br><br>
				<b>Unpaid Invoices </b>
				<a href="#" data-toggle="modal" data-target="#myModal">PDF Statement</a>
				
        		</div>
        		<div class="col-lg-3 col-md-3">
        			<div class="col-lg-3 col-md-3">
        			<b>Address:</b> 
        			</div>
        			<div class="col-lg-9 col-md-9">
        			<?php $address = $userDetail['User']['address'].' '.$userDetail['User']['city'].' '.$userDetail['User']['state_country'].' '.$userDetail['User']['zip'];?>
        			 <a target="_blank" href="https://maps.google.fr/maps?q=<?php echo $address;?>"> <?php echo ' '.$address;?>
                             </a>
        			</div>
           		</div>
        		<div class="col-lg-6 col-md-6">
        		<div class="col-lg-3 col-md-3">	
                <b>Add Log:</b>
              	</div>
              	<div class="col-lg-7 col-md-7">
                <?php echo $this->Form->create('Users',array('controller'=>'users','action'=>'communication_log','class'=>'validator-form')); ?>

                	<?php echo $this->Form->input('CommunicationLog.user_id', array('type'=>'hidden','div'=>false,'class'=>'form-control','value'=>$user_id)); ?>

                	<?php echo $this->Form->input('CommunicationLog.type', array('options' => array('Email' => 'Email', 'Phone' => 'Phone','Visit' => 'Visit','Other' => 'Other'),'class'=>'form-control','label'=>'Communication type')); ?>

                	<?php echo $this->Form->input('CommunicationLog.notes', array('type'=>'textarea', 'placeholder'=>"Message here...", 'class'=>'form-control','label'=>false,'style'=>'margin:10px 0px 10px;height: 70px;')); ?>


                	<?php echo $this->Form->button('Add Log', array('class' => 'btn btn-success right')); ?>


				<?php echo $this->Form->end(); ?>	
        		</div>
        		<div class="col-lg-2 col-md-2">
        		</div>

        		</div>
        	</div><br>
        	<div class="row">
        		
        		<div class="col-lg-12 col-md-12">
         			<pre1 style="padding: 15px;">
         				<b>Notes:</b>
         				<span class="notes">
             				<?php $notes = $userDetail['User']['notes'];?>
             				<?php if($notes!=''){
							?>
							<span class="notes_edit best_in_place"><?php echo $notes;?>
             				</span>
							<?php
							}else
							{ 
							?>	
							<span class="notes_edit best_in_place" style="color: #d3d3d3;border: medium none;font-style: italic;"><?php echo 'click to add';?>
             				</span>
             					
							<?php } ?>
                            			
                        </span>
         			
         				<span style="display:none;" class="notes_form">
	 						<form class="place" action="javascript:void(0);">
	 						<div class="row">
	 							<div class="col-md-4">
									<textarea class="form-control" id="notes" required="required"><?php echo $notes;?></textarea>
									<input type="hidden" id="id" value="<?php echo $userDetail['User']['id'];?>">
									<input class="notes_submit btn btn-success" type="button" value="Save" >
									<input class="notes_cancle btn btn-default" type="button" value="Cancel" >
								</div>
							</div>
							</form>
						</span>
					</pre1>
										
            	</div>
        		
        	</div>
        	<div class="row">
        		
        		<div class="col-lg-12 col-md-12">
         			<hr>	
         			<h4>Custom Fields</h4>
         			<?php 
         			if(!empty($CustomerFieldValue))
         			{
         				foreach($CustomerFieldValue as $Customerfieldvalue) {
							
						$name = $Customerfieldvalue['CustomerFieldValue']['name'];
						$value = $Customerfieldvalue['CustomerFieldValue']['value'];
						$field_type = $Customerfieldvalue['CustomerFieldValue']['field_type'];
						?>
						<div class="col-lg-4 col-md-4" style="height: 60px;">
         					<b><?php echo $name.':';?></b> 
							<?php 
								switch ($field_type) {
								    case "textarea":
								        ?><pre><?php echo $value;?></pre><br><?php
								        break;
								    case "weblink":
								       	?><a href="https://www.google.com/search?q=<?php echo $value;?>" target="_blank"><?php echo $value;?></a><br><?php
								       	break;
								    case "checkbox":
								        if($value=="on")
									  	{
									  		?><i class="fa fa-check-square-o"></i><br><?php
									  	}
									  	else{
									  		?><i class="fa fa-square-o"></i><br><?php
									  	}
								        break;
								    default:
								        echo $value;
								}
							?>
         				</div> 
						<?php
						}
         			}
         			elseif(!empty($CustomerField))
         			{
         				foreach($CustomerField as $customerfield) {
							$name = $customerfield['CustomerField']['name'];
							?>
							<div class="col-lg-4 col-md-4">
								<b><?php echo $name.':';?></b>
							</div> 	
							<?php
						}
         			}
         			?>
         			
            	</div>
        		
        	</div>

        </div><!-- /.box-body -->
	  </div>
    </div>
  </div>



<!-- Modal Unpaid Invoice Pdf-->

<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      	<div class="modal-content">

        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"></h4><div class="btn btn-default btn-sm" id="create_pdf">Save PDF</div>
        </div>

    	<div class="modal-body">
      		<div class="segment" id="pdfdiv1" >
     
     		<div class="divider"></div>
    
     		<form class="ui form">

		      	<div class="two fields" style="margin-top:10px;">
			    	<div class="text-left" >
			     

				        <label for=""> <?php echo ucfirst($userDetail['User']['first_name'])." ".ucfirst($userDetail['User']['last_name']); ?> </label> <br>

				        <label for=""> <?php echo $address; ?></label>
			        
			       	</div>
			       	<div class="text-right" style="margin-top:-50px;">
			       
				        <label for="">
							Statement Date        <span> <?php echo ''.date("D d-m-Y");?></span><br>
						</label><br>

						<?php $total=0; foreach ($invoice as $inv) {
							
							if($inv['Invoice']['status']!='1')
							{
							 $Total =$inv['Invoice']['total']; 
							 $total = $total + $Total;
							}
						}
						?>
				        <label for="">
							Balance Due  <span><?php echo '$'.$total;?></span>
						</label><br>				

			       	</div>
		      	</div>
      			<br><br>				

      


      
      
      			<h4 class="ui top attached header"></h4>
			    <div class="ui bottom attached segment">     
			        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped custom-table-code table-bordered table-responsive">
			            <thead style="background-color;#A9A9A9;">
			                <tr>	 
				                <th>Date</th>
								<th>Activity</th>
				                <th>Amount</th>
								<th>Open Amount</th>
							</tr>
						</thead>
						<tbody class="userdata"><?php $counter=0;$total=0;$tax=0;$string=''; ?>
							<?php foreach ($invoice as $inv) {
							
							if($inv['Invoice']['status']!='1')
							{
							?>
							<tr>
								<?php $Total =$inv['Invoice']['total']; ?>
								<?php $total = $total + $Total;?>
								<td><?php echo date('D d-m-Y',strtotime($inv['Invoice']['created']));?>
								</td>
								<td>
								<?php $inv_number = $inv['Invoice']['inv_number'];
								$inv_id = $inv['Invoice']['id'];
								$due_date = $inv['Invoice']['due_date'];?>
								<?php echo 'Invoice '.'#'.$inv_number.':Due '.date('d-m-Y',strtotime($due_date)); ?>
								</td>
							
								<td><?php echo '$'.$Total;?></td>
								<td><?php echo '$'.$Total;?></td>
							</tr>

							<?php }
							} ?>
						</tbody>
											
			        </table>   

			        <table cellpadding="0" cellspacing="0" border="0" class="table table-responsive">
			            <thead style="background-color;#A9A9A9;">
			                <tr>	 
				               	<th align="right">Current Due</th>
				                <th align="right">Amount Due</th>
								
							</tr>
						</thead>
						<tbody class="userdata">
							<tr>
								<td></td>
								<td align="right"><?php echo '$'.$total;?></td>
							</tr>
						</tbody>
						
			        </table> 
			    </div>
      		</form>
     		</div>
       	</div>

		</div>
    </div>
</div>
  
<!-- Modal Unpaid Invoice Pdf-->





  	<!-- Jump To panel -->
    <div class="panel panel-default">
    <div class="panel-heading">Jump To:</div>
    <div class="panel-body">
		<div class="row">
			<div class="widget-content info-filters">
        		<ul class="nav nav-pills">
          			<li class="active"><a data-show="all" data-toggle="tab" href="#tab-1" id="all">All</a></li>
			        <li class=""><a data-show=".addresses" data-toggle="tab" href="#tab-2" id="addresses">Addresses</a></li>
			        <li class=""><a data-show=".assets" data-toggle="tab" href="#tab-3" id="assets">Assets</a></li>

			        <li class=""><a data-show=".attachments" data-toggle="tab" href="#tab-4" id="attachments">Attachments</a></li>
			        <li class=""><a data-show=".changehistory" data-toggle="tab" href="#tab-5" id="changehistory">Change History</a></li>

			        <li class=""><a data-show=".contacts" data-toggle="tab" href="#tab-6" id="contacts">Contacts</a></li>

			        <li class=""><a data-show=".contracts" data-toggle="tab" href="#tab-7" id="contracts">Contracts</a></li>
			          
			        <li class=""><a data-show=".estimates" data-toggle="tab" href="#tab-8" id="estimates">Estimates</a></li>
			        <li class=""><a data-show=".invoices" data-toggle="tab" href="#tab-9" id="invoices">Invoices</a></li>
			        <li class=""><a data-show=".leads" data-toggle="tab" href="#tab-10" id="leads">Leads</a></li>
			        <li class=""><a data-show=".communication_log" data-toggle="tab" href="#tab-11" id="log">Log</a></li>
			        <li><a data-show=".payments" data-toggle="tab" href="#tab-12" id="payments">Payments</a></li>
			        <li><a data-show=".portal_users" data-toggle="tab" href="#tab-13" id="portal_users">Portal Users</a></li>
			        <li><a data-show=".purchase" data-toggle="tab" href="#tab-14" id="purchase">Purchase</a></li>
			        <li><a data-show=".recurring_invoices" data-toggle="tab" href="#tab-15" id="recurring_invoices">Recurring Invoices</a></li>
			        <li><a data-show=".reminders" data-toggle="tab" href="#tab-16" id="reminters">Reminders</a></li>
			        <li><a data-show=".tickets" data-toggle="tab" href="#tab-17" id="tickets">Tickets</a></li>
			        <li><a data-show=".warranty" data-toggle="tab" href="#tab-18" id="warranty">Warranties</a></li>
			          
        		</ul>
        	</div>
        </div>
	</div>
  	</div>



  	<!-- My Appointment Modal -->   
	
	<div class="modal fade" id="myAppointmentModal" role="dialog">
		<div class="modal-dialog">
		<!-- Modal content-->
			<div class="modal-content">
			<div class="modal-header">
			    <button type="button" class="close" data-dismiss="modal">&times;</button>
			    <h4 class="modal-title">New Appointment</h4>
			</div>
			<div class="modal-body">
			<div id="appointment" > 
			<?php echo $this->Form->create('users',array('controller'=>'Users','action'=>'addappointment')); ?> 


			    <div class="row">                 
				<div class="col-xs-12 col-sm-12">
				<div class="form-group">
				<?php echo "Customer:".$customer_name = $userDetail['User']['first_name']." ".$userDetail['User']['last_name']; ?>
						<?php echo $this->Form->input('Appointment.customer_name', array('type'=>'hide','class'=>'form-control','placeholder' => "Customer Name",'label'=>'Customer Name', 'value'=>$customer_name)); ?>
						<?php echo $this->Form->input('Appointment.user_id', array('type'=>'hidden','class'=>'form-control', 'value'=>$user_id)); ?>
				</div>
				</div>
				</div>
				<div class="row">                 
				<div class="col-xs-12 col-sm-12">
				<div class="form-group">
						<?php echo $this->Form->input('Appointment.summary', array('div'=>false,'class'=>'form-control','placeholder' => "Summary",'label'=>'Summary','value'=>'Appointment')); ?>
				</div>
				</div>
				</div>
				<div class="row">                 
				<div class="col-xs-12 col-sm-12">
				<div class="form-group">
						<?php echo $this->Form->input('Appointment.description', array('type'=>'textarea','class'=>'form-control','label'=>'Description')); ?>
				</div>
				</div>  
				</div>
				<div class="row">                 
				<div class="col-xs-12 col-sm-12">
				<div class="form-group">
						<?php echo $this->Form->input('Appointment.type', array('options' => array('NULL' => '', 'In Shop' => 'In Shop','Onsite' => 'Onsite','Phone Call' => 'Phone Call'),'class'=>'form-control','label'=>'Appointment type')); ?>
				</div>
				</div>
				</div>
				<div class="row">                 
				<div class="col-xs-12 col-sm-12">
				<div class="form-group">
						<?php echo $this->Form->input('Appointment.address', array('div'=>false,'class'=>'form-control','placeholder'=>"Leave blank to autofill the address",'label'=>'Location','required'=>'required')); ?>
						
				</div>
				</div>
				</div>
				<div class="row">  
				<div class="col-xs-12 col-sm-12">
				<div class="form-group">

	         		
	        			<label>Appointment Starting Time</label>
	                	
	    				<input type='text' class="" name="Appointment[start_at]" id="datetimepicker1" style="width: 100%;" />

				</div>
				</div>
				</div>
				<div class="row">  
				<div class="col-xs-12 col-sm-12">
					<div class="form-group">
						
						<label>Appointment Ending Time</label>
	                    <input type='text' class="" name="Appointment[end_at]" id="datetimepicker2" style="width: 100%;" />
					
					</div>
	            </div>
				</div>
				<div class="row">  
					<div class="col-xs-12 col-sm-12">
						<div class="form-group">
						
						<?php echo $this->Form->input('Appointment.owner', array('options' => array($this->Session->read('Auth.User.first_name').' '.$this->Session->read('Auth.User.email') => $this->Session->read('Auth.User.first_name').' '.$this->Session->read('Auth.User.email')),'class'=>'form-control','label'=>'Appointment Owner')); ?>
						
						
						</div>
	            	</div>
				</div>
				<div class="row">  
					<div class="col-xs-12 col-sm-12">
						<div class="form-group">

						<?php echo $this->Form->input('Appointment.attendees', array('options' => array($this->Session->read('Auth.User.first_name') => $this->Session->read('Auth.User.first_name')),'class'=>'form-control','label'=>'Attendees')); ?>
						
	            		</div>
	            	</div>
														
				</div>

				<div class="row">  
				<hr class="dotted">	
					<div class="col-xs-12 col-sm-4">
						<div class="form-group">
							<?php echo $this->Html->link('View Calendar (new window)',array('controller' => 'Calendars', 'action' => 'add'),array('escape'=>false,'class'=>'btn btn-default'));?>
						</div>
	               	</div>
	               	<div class="col-xs-12 col-sm-4">
						<div class="form-group">
							
						</div>
	               	</div>
	               	<div class="col-xs-12 col-sm-4">
					
					<div class="btn-group">
						<?php echo $this->Form->button("Create Appointment", array('class' => 'btn btn-success pull-left')); ?>
					</div>
					</div>
				</div>

				                		
				<?php echo $this->Form->end(); ?>
			</div>
			</div>
			</div>
			      
		</div>
	</div> 

<div class="row allpanel">

	<!-- Communication Log -->
	<div class="panel panel-default col-md-6 communication_log">
	    <div class="panel-heading clearfix">
	        <h4 class="panel-title"><i class="fa fa-envelope"></i>     Communication Log</h4>
	    </div>
	    <div class="panel-body">
	    	<div class="table-responsive">
	        <table class="table table-hover table-bordered">
	            <thead>
	                <tr>
	                    <th>Date</th>
						<th>Type</th>
						<th>Notes</th>
	                </tr>
	            </thead>
	            <tbody>
	            <?php foreach ($communicationlog as $comm) {
				?>
				<tr>
					<td><?php echo date('D d-m-Y g:i A',strtotime($comm['CommunicationLog']['created']));?></td>

					<td><?php echo $comm['CommunicationLog']['type'];?></td>

					<td><?php echo $comm['CommunicationLog']['notes'];?></td>
				</tr>

				<?php }?>
				<tr><td colspan="4"><?php echo $this->Html->link("More",array('controller' => 'users', 'action' => 'communicationlog_list'),array('escape'=>false));?></td></tr>
	            </tbody>
	        </table>
	       	</div>
	    </div>
	</div>
	
	<!-- Reminters -->
	
	<div class="panel panel-default col-md-6 reminder">
	    <div class="panel-heading clearfix">
	        
	        <h4 class="panel-title"><i class="fa fa-clock-o"></i>      Reminders&nbsp;&nbsp;   </h4>
	       	
	       	<p>
	       		<a href="#myReminderModal" data-toggle="modal" style="font-size:15px;">
          			<span class="glyphicon glyphicon-plus"></span>
        		</a>
      		</p>
	        
			
	    </div>
	    <div class="panel-body">
	    	<div class="table-responsive">
	        <table class="table table-hover table-bordered">
	            <thead>
	                <tr>
	                    <th>Time</th>
						<th>Message</th>
						<th>Tech</th>
						<th>Customer</th>
						<th></th>
						<th></th>
	                </tr>
	            </thead>
	            <tbody>
	            <?php $counter=0;?>
	            <?php foreach ($reminder as $rem) {
	            	$row_id =  ++$counter;
	            	$status = $rem['Reminder']['status'];
	            	if($status!=1){
				?>
				<tr>
					<td><?php echo date('D d-m-Y g:i A',strtotime($rem['Reminder']['at']));?></td>

					<td><?php echo $rem['Reminder']['notes'];?></td>

					<td><?php echo $rem['Reminder']['tech'];?></td>
					<td><?php echo $rem['Reminder']['customer'];?></td>
					<td>
						<?php echo $this->Html->link('Snooze 1 day',array('controller' => 'Users', 'action' => 'updatereminder',$rem['Reminder']['id'],$userDetail['User']['id']),array('escape'=>false));?>

					</td>
					<td>
						<span style="font-weight: normal;" id="<?php echo $row_id; ?>" class="best_in_place status status_<?php echo $row_id; ?>">Clear</span>

						<input type="hidden" value="<?php echo $rem['Reminder']['id'];?>" id="id_<?php echo $row_id; ?>">

                        <span style="font-weight: normal; display: none;" id="<?php echo $row_id; ?>" class="best_in_place status reactive_status_<?php echo $row_id; ?>">Reactive</span>

                      	<span style="font-weight: normal; display: none;" id="<?php echo $row_id; ?>" class="best_in_place status clear_status_<?php echo $row_id; ?>">Clear</span>
					</td>
					<td>
						<?php echo $this->Html->link('<i class="btn btn-danger btn-sm fa fa-times"></i>',array('controller' => 'users', 'action' => 'deletereminder',$rem['Reminder']['id'],$userDetail['User']['id']),array('escape'=>false,'confirm' => 'Are you sure you wish to delete this Reminder?'));?>

					</td>
				</tr>

				<?php } }?>

	            </tbody>
	        </table>
	        </div>
	    </div>
	</div>
		<!-- Reminder Modal -->   
		<div class="modal fade" id="myReminderModal" role="dialog">
		<div class="modal-dialog">
		<!-- Modal content-->
			<div class="modal-content">
			<div class="modal-header">
			    <button type="button" class="close" data-dismiss="modal">&times;</button>
			    <h4 class="modal-title">Set a new reminder</h4>
			</div>
			<div class="modal-body">
			<div id="appointment" > 
			<?php echo $this->Form->create('Users',array('controller'=>'users','action'=>'addnewreminder')); ?> 
				<div class="row">                 
				<div class="col-xs-12 col-sm-12">
				<div class="form-group">
					<p>Customer: <?php echo ucfirst($userDetail['User']['first_name'])." ".ucfirst($userDetail['User']['last_name']); ?></p>
					<?php echo $this->Form->input('Reminder.customer', array('type'=>'hidden','div'=>false,'class'=>'form-control','label'=>'Customer','value'=>$userDetail['User']['first_name']." ".$userDetail['User']['last_name'])); ?>
					<?php echo $this->Form->input('Reminder.user_id', array('type'=>'hidden','div'=>false,'class'=>'form-control','value'=>$userDetail['User']['id'])); ?>
				</div>
				</div>
				</div>
			   	<div class="row">                 
				<div class="col-xs-12 col-sm-12">
				<div class="form-group">

					<input type='text' class="" name="Reminder[at]" id="datetimepicker3" style="width: 100%;" />

				</div>
				</div>
				</div>
				<div class="row">                 
				<div class="col-xs-12 col-sm-12">
				<div class="form-group">
						<?php echo $this->Form->input('Reminder.notes', array('type'=>'textarea','class'=>'form-control','label'=>'','placeholder'=>'Notes...')); ?>
				</div>
				</div>  
				</div>
				
				
				<div class="row">  
					<div class="col-xs-12 col-sm-12">
						<div class="form-group">
											
						<label>For Tech</label><br>	
							<input type='hidden' name="Reminder[tech]" value="<?php echo $this->Session->read('Auth.User.first_name')?>"/>

							<select  class="select optional form-control" >
								<option selected="selected">							<?php
									echo $this->Session->read('Auth.User.first_name').' '.$this->Session->read('Auth.User.email');
									?>
								</option>
							</select>
						</div>
	            	</div>
				</div>
				

				<div class="row">  
				<hr class="dotted">	
					<div class="col-xs-2 col-sm-2">
					</div>
	               	<div class="col-xs-3 col-sm-3">
						<div class="form-group">
							<?php echo $this->Form->button("Save", array('class' => 'btn btn-success pull-left')); ?>
						</div>
	               	</div>
	               	<div class="col-xs-2 col-sm-2">
					</div>
	               	<div class="col-xs-3 col-sm-3">
					<div class="btn-group">
						<?php echo $this->Html->link('All Reminders',array('controller' => 'Reminders', 'action' => 'reminderlist'),array('escape'=>false,'class'=>'btn btn-default m-b-sm'));?>

					</div>
					</div>
					<div class="col-xs-2 col-sm-2">
					</div>
				</div>

				                		
				<?php echo $this->Form->end(); ?>
			</div>
			</div>
			</div>
			      
		</div>
		</div> 
	

	<!-- Invoice -->
	
	<div class="panel panel-default col-md-6 invoice">
	    <div class="panel-heading clearfix">
	        <h4 class="panel-title"><i class="fa fa-money"></i>     Invoices</h4>
	    </div>
	    <div class="panel-body">
	    	<div class="table-responsive">
	        <table class="table table-hover table-bordered">
	            <thead>
	                <tr>
	                    <th>Inv Number</th>
						<th>Status</th>
						<th>Date</th>
						<th>Total</th>
	                </tr>
	            </thead>
	            <tbody>
	            <?php foreach ($invoice as $inv) {
				?>
				<tr>
					<td>
					<?php $inv_number = $inv['Invoice']['inv_number'];
					$inv_id = $inv['Invoice']['id'];?>
					<?php echo $this->Html->link($inv_number,array('controller' => 'Invoices', 'action' => 'invoicedetails',$inv_id),array('escape'=>false));?>

					</td>

					<td><?php $status= $inv['Invoice']['status'];
					if($status=='1')
					{
						?><i class="fa fa-check-circle"></i><?php
					}
					else
					{
						?><i class="fa fa-times"></i><?php
					}

					?></td>
					<td><?php echo date('D d-m-Y g:i A',strtotime($inv['Invoice']['created']));?></td>
					<td><?php echo '$'.$inv['Invoice']['total'];?></td>
				</tr>

				<?php }?>
				<tr><td colspan="4"><?php echo $this->Html->link("More",array('controller' => 'Invoices', 'action' => 'invoicelist'),array('escape'=>false));?></td></tr>
	            </tbody>
	        </table>

	       	</div>
	    </div>
	</div>
	


	<!-- Contacts -->
	<div class="panel panel-default col-md-6 contact">
    <div class="panel-heading clearfix">
        
        <h4 class="panel-title"><i class="fa fa-user"></i>     Contacts &nbsp;&nbsp;</h4>
        <a href="#"><p class="glyphicon glyphicon-plus" id="addnewcontact"></p></a>
    </div>
    <div class="panel-body">
    	<div class="table-responsive">
        <table class="table table-hover table-bordered" id="ContactTable">
            <thead>
                <tr>
                   	<th>Name</th>
					<th>Phone</th>
					<th>Email</th>
					<th></th>
                </tr>
            </thead>
            <tbody>
            <?php $counter=0;?>
            <?php foreach ($Contact as $contact) {
            	//pr($contact);
            	$contact_id = $contact['Contact']['id'];
            	$row_id =  ++$counter;
			?>
			<tr>
				<td>
                    <span class="contact_name contact_name_<?php echo $row_id; ?>">
 						<?php $name = $contact['Contact']['name']; ?>
         				<?php if($name!=''){
						?>
						<span id="<?php echo $row_id; ?>" class="name name_edit_<?php echo $row_id; ?> best_in_place">
							<?php echo $name;?>
         				</span>
         				<?php
						}else
						{ 
						?>	
						<span id="<?php echo $row_id; ?>" class="name name_edit_<?php echo $row_id; ?> best_in_place" style="color: #d3d3d3;border: medium none;font-style: italic;">
							<?php echo 'click to add';?>
     					</span>
         				<?php
         				}
         				?>
 						     						
 					</span>
 					<span style="display:none;" class="name_form_<?php echo $row_id;?>" id="<?php echo $row_id; ?>" >
                        <form class="place" action="javascript:void(0);">
                        <input type="text" class="form-control" id="contact_name_<?php echo $row_id;?>" value="<?php echo $name;?>" required>
                        <input type="hidden"  id="contact_id_<?php echo $row_id;?>" value="<?php echo $contact_id;?>">
                        <input class="submit_contact_name btn btn-success" type="button" value="Save" id="<?php echo $row_id; ?>">
                        <input class="cancle_contact_name btn btn-default" type="button" value="Cancel" id="<?php echo $row_id; ?>">
                        </form>
                    </span>
 					
				</td>
				<td><strong>Phone:</strong><br>
					<span class="contact_phone contact_phone_<?php echo $row_id;?>">
 						<?php $phone = $contact['Contact']['phone']; ?>
         				<?php if($phone!=''){
						?>
						<span id="<?php echo $row_id; ?>" class="phone phone_edit_<?php echo $row_id; ?> best_in_place">
							<?php echo $phone;?>
         				</span>
         				<?php
						}else
						{ 
						?>	
						<span id="<?php echo $row_id; ?>" class="phone phone_edit_<?php echo $row_id; ?> best_in_place" style="color: #d3d3d3;border: medium none;font-style: italic;">
							<?php echo 'click to add';?>
     					</span>
         				<?php
         				}
         				?>
 						     						
 					</span>
 					<span style="display:none;" class="phone_form_<?php echo $row_id;?>" id="<?php echo $row_id; ?>" >
                        <form class="place" action="javascript:void(0);">
                        <input type="text" class="form-control" id="contact_phone_<?php echo $row_id;?>" value="<?php echo $phone;?>" required>
                        <input type="hidden"  id="contact_id_<?php echo $row_id;?>" value="<?php echo $contact_id;?>">
                        <input class="submit_contact_phone btn btn-success" type="button" value="Save" id="<?php echo $row_id; ?>">
                        <input class="cancle_contact_phone btn btn-default" type="button" value="Cancel" id="<?php echo $row_id; ?>">
                        </form>
                    </span><br>
                    <strong>Mobile:</strong><br>
                    <span class="contact_mobile contact_mobile_<?php echo $row_id;?>">
 						<?php $mobile = $contact['Contact']['mobile']; ?>
         				<?php if($mobile!=''){
						?>
						<span id="<?php echo $row_id; ?>" class="mobile mobile_edit_<?php echo $row_id; ?> best_in_place">
							<?php echo $mobile;?>
         				</span>
         				<?php
						}else
						{ 
						?>	
						<span id="<?php echo $row_id; ?>" class="mobile mobile_edit_<?php echo $row_id; ?> best_in_place" style="color: #d3d3d3;border: medium none;font-style: italic;">
							<?php echo 'click to add';?>
     					</span>
         				<?php
         				}
         				?>
 						     						
 					</span>
 					<span style="display:none;" class="mobile_form_<?php echo $row_id;?>" id="<?php echo $row_id; ?>" >
                        <form class="place" action="javascript:void(0);">
                        <input type="text" class="form-control" id="contact_mobile_<?php echo $row_id;?>" value="<?php echo $mobile;?>" required>
                        <input type="hidden"  id="contact_id_<?php echo $row_id;?>" value="<?php echo $contact_id;?>">
                        <input class="submit_contact_mobile btn btn-success" type="button" value="Save" id="<?php echo $row_id; ?>">
                        <input class="cancle_contact_mobile btn btn-default" type="button" value="Cancel" id="<?php echo $row_id; ?>">
                        </form>
                    </span>
				</td>
				<td>
					<span class="contact_email contact_email_<?php echo $row_id;?>">
 						<?php $email = $contact['Contact']['email']; ?>
         				<?php if($email!=''){
						?>
						<span id="<?php echo $row_id; ?>" class="email email_edit_<?php echo $row_id; ?> best_in_place">
							<?php echo $email;?>
         				</span>
         				<?php
						}else
						{ 
						?>	
						<span id="<?php echo $row_id; ?>" class="email email_edit_<?php echo $row_id; ?> best_in_place" style="color: #d3d3d3;border: medium none;font-style: italic;">
							<?php echo 'click to add';?>
     					</span>
         				<?php
         				}
         				?>     						     						
 					</span>
 					<span style="display:none;" class="email_form_<?php echo $row_id;?>" id="<?php echo $row_id; ?>" >
                        <form class="place" action="javascript:void(0);">
                        <input type="email" class="form-control" id="contact_email_<?php echo $row_id;?>" value="<?php echo $email;?>" required>
                        <input type="hidden"  id="contact_id_<?php echo $row_id;?>" value="<?php echo $contact_id;?>">
                        <input class="submit_contact_email btn btn-success" type="button" value="Save" id="<?php echo $row_id; ?>">
                        <input class="cancle_contact_email btn btn-default" type="button" value="Cancel" id="<?php echo $row_id; ?>">
                        </form>
                    </span>
				</td>
				<td>
					<span class="btn btn-default btn-sm advanced_data_btn" id="<?php echo $row_id;?>"><i class="fa fa-caret-square-o-down"></i></span>
					<?php echo $this->Html->link('<i class="btn btn-danger btn-sm fa fa-times"></i>',array('action'=>'Users','action'=>'deletecontact',$contact_id,$user_id),array('escape'=>false,'confirm' => 'Are you sure?'));?>
				</td>
				<tr width="100%" style="display: none;" class="advanced_data_<?php echo $row_id;?>">
				  <td colspan="4">
				    <div class="row">
				      <div class="col-lg-6 col-md-6">
				        <strong>Address:</strong>
				        <span class="contact_address contact_address_<?php echo $row_id;?>">
     						<?php $address = $contact['Contact']['address']; ?>
             				<?php if($address!=''){
							?>
							<span id="<?php echo $row_id; ?>" class="address address_edit_<?php echo $row_id; ?> best_in_place">
								<?php echo $address;?>
             				</span>
             				<?php
							}else
							{ 
							?>	
							<span id="<?php echo $row_id; ?>" class="address address_edit_<?php echo $row_id; ?> best_in_place" style="color: #d3d3d3;border: medium none;font-style: italic;">
								<?php echo 'click to add';?>
         					</span>
             				<?php
             				}
             				?>
 						</span>
 						<span style="display:none;" class="address_form_<?php echo $row_id;?>" id="<?php echo $row_id; ?>" >
                            <form class="place" action="javascript:void(0);">
                            <input type="text" class="form-control" id="contact_address_<?php echo $row_id;?>" value="<?php echo $address;?>" required>
                            <input type="hidden"  id="contact_id_<?php echo $row_id;?>" value="<?php echo $contact_id;?>">
                            <input class="submit_contact_address btn btn-success" type="button" value="Save" id="<?php echo $row_id; ?>">
                            <input class="cancle_contact_address btn btn-default" type="button" value="Cancel" id="<?php echo $row_id; ?>">
                            </form>
                    	</span><br>
				        <strong>Address 2:</strong>
				        <span class="contact_address2 contact_address2_<?php echo $row_id;?>">
     						<?php $address2 = $contact['Contact']['address2']; ?>
             				<?php if($address2!=''){
							?>
							<span id="<?php echo $row_id; ?>" class="address2 address2_edit_<?php echo $row_id; ?> best_in_place">
								<?php echo $address2;?>
             				</span>
             				<?php
							}else
							{ 
							?>	
							<span id="<?php echo $row_id; ?>" class="address2 address2_edit_<?php echo $row_id; ?> best_in_place" style="color: #d3d3d3;border: medium none;font-style: italic;">
								<?php echo 'click to add';?>
         					</span>
             				<?php
             				}
             				?>
 						</span>
 						<span style="display:none;" class="address2_form_<?php echo $row_id;?>" id="<?php echo $row_id; ?>" >
                            <form class="place" action="javascript:void(0);">
                            <input type="text" class="form-control" id="contact_address2_<?php echo $row_id;?>" value="<?php echo $address2;?>" required>
                            <input type="hidden"  id="contact_id_<?php echo $row_id;?>" value="<?php echo $contact_id;?>">
                            <input class="submit_contact_address2 btn btn-success" type="button" value="Save" id="<?php echo $row_id; ?>">
                            <input class="cancle_contact_address2 btn btn-default" type="button" value="Cancel" id="<?php echo $row_id; ?>">
                            </form>
                    	</span>
				      </div>
				      <div class="col-lg-6 col-md-6">
				        <strong>City:</strong>
				        <span class="contact_city contact_city_<?php echo $row_id;?>">
     						<?php $city = $contact['Contact']['city']; ?>
             				<?php if($city!=''){
							?>
							<span id="<?php echo $row_id; ?>" class="city city_edit_<?php echo $row_id; ?> best_in_place">
								<?php echo $city;?>
             				</span>
             				<?php
							}else
							{ 
							?>	
							<span id="<?php echo $row_id; ?>" class="city city_edit_<?php echo $row_id; ?> best_in_place" style="color: #d3d3d3;border: medium none;font-style: italic;">
								<?php echo 'click to add';?>
         					</span>
             				<?php
             				}
             				?>
 						</span>
 						<span style="display:none;" class="city_form_<?php echo $row_id;?>" id="<?php echo $row_id; ?>" >
                            <form class="place" action="javascript:void(0);">
                            <input type="text" class="form-control" id="contact_city_<?php echo $row_id;?>" value="<?php echo $city;?>" required>
                            <input type="hidden"  id="contact_id_<?php echo $row_id;?>" value="<?php echo $contact_id;?>">
                            <input class="submit_contact_city btn btn-success" type="button" value="Save" id="<?php echo $row_id; ?>">
                            <input class="cancle_contact_city btn btn-default" type="button" value="Cancel" id="<?php echo $row_id; ?>">
                            </form>
                    	</span>
				        <strong>State:</strong>
				        <span class="contact_state contact_state_<?php echo $row_id;?>">
     						<?php $state = $contact['Contact']['state']; ?>
             				<?php if($state!=''){
							?>
							<span id="<?php echo $row_id; ?>" class="state state_edit_<?php echo $row_id; ?> best_in_place">
								<?php echo $state;?>
             				</span>
             				<?php
							}else
							{ 
							?>	
							<span id="<?php echo $row_id; ?>" class="state state_edit_<?php echo $row_id; ?> best_in_place" style="color: #d3d3d3;border: medium none;font-style: italic;">
								<?php echo 'click to add';?>
         					</span>
             				<?php
             				}
             				?>
 						</span>
 						<span style="display:none;" class="state_form_<?php echo $row_id;?>" id="<?php echo $row_id; ?>" >
                            <form class="place" action="javascript:void(0);">
                            <input type="text" class="form-control" id="contact_state_<?php echo $row_id;?>" value="<?php echo $state;?>" required>
                            <input type="hidden"  id="contact_id_<?php echo $row_id;?>" value="<?php echo $contact_id;?>">
                            <input class="submit_contact_state btn btn-success" type="button" value="Save" id="<?php echo $row_id; ?>">
                            <input class="cancle_contact_state btn btn-default" type="button" value="Cancel" id="<?php echo $row_id; ?>">
                            </form>
                    	</span>
				        <br>
				        <strong>Postal Code:</strong>
				        <span class="contact_zip contact_zip_<?php echo $row_id;?>">
     						<?php $zip = $contact['Contact']['zip']; ?>
             				<?php if($zip!=''){
							?>
							<span id="<?php echo $row_id; ?>" class="zip zip_edit_<?php echo $row_id; ?> best_in_place">
								<?php echo $zip;?>
             				</span>
             				<?php
							}else
							{ 
							?>	
							<span id="<?php echo $row_id; ?>" class="zip zip_edit_<?php echo $row_id; ?> best_in_place" style="color: #d3d3d3;border: medium none;font-style: italic;">
								<?php echo 'click to add';?>
         					</span>
             				<?php
             				}
             				?>
 						</span>
 						<span style="display:none;" class="zip_form_<?php echo $row_id;?>" id="<?php echo $row_id; ?>" >
                            <form class="place" action="javascript:void(0);">
                            <input type="text" class="form-control" id="contact_zip_<?php echo $row_id;?>" value="<?php echo $zip;?>" required>
                            <input type="hidden"  id="contact_id_<?php echo $row_id;?>" value="<?php echo $contact_id;?>">
                            <input class="submit_contact_zip btn btn-success" type="button" value="Save" id="<?php echo $row_id; ?>">
                            <input class="cancle_contact_zip btn btn-default" type="button" value="Cancel" id="<?php echo $row_id; ?>">
                            </form>
                    	</span>
				      </div>
				      <div class="col-md-12">
				        <strong>Notes:</strong>
				        <span class="contact_notes contact_notes_<?php echo $row_id;?>">
     						<?php $notes = $contact['Contact']['notes']; ?>
             				<?php if($notes!=''){
							?>
							<span id="<?php echo $row_id; ?>" class="notes notes_edit_<?php echo $row_id; ?> best_in_place">
								<?php echo $notes;?>
             				</span>
             				<?php
							}else
							{ 
							?>	
							<span id="<?php echo $row_id; ?>" class="notes notes_edit_<?php echo $row_id; ?> best_in_place" style="color: #d3d3d3;border: medium none;font-style: italic;">
								<?php echo 'click to add';?>
         					</span>
             				<?php
             				}
             				?>
 						</span>
 						<span style="display:none;" class="notes_form_<?php echo $row_id;?>" id="<?php echo $row_id; ?>" >
                            <form class="place" action="javascript:void(0);">
                            <input type="text" class="form-control" id="contact_notes_<?php echo $row_id;?>" value="<?php echo $notes;?>" required>
                            <input type="hidden"  id="contact_id_<?php echo $row_id;?>" value="<?php echo $contact_id;?>">
                            <input class="submit_contact_notes btn btn-success" type="button" value="Save" id="<?php echo $row_id; ?>">
                            <input class="cancle_contact_notes btn btn-default" type="button" value="Cancel" id="<?php echo $row_id; ?>">
                            </form>
                    	</span>
				      </div>

				    </div>
				  </td>
				</tr>
									
			</tr>

			<?php } ?>
			<tr><td style="height: 5px;" colspan="4"></td></tr>
            </tbody>
        </table>
        </div>
    </div>
	</div>





	<!-- Recurring Invoices -->
	
	<div class="panel panel-default col-md-6 recurring_invoice">
	    <div class="panel-heading clearfix">
	        <h4 class="panel-title"><i class="fa fa-money"></i>     Recurring Invoices/Subscriptions &nbsp;&nbsp;</h4>
	        <?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>',array('controller' => 'Schedules', 'action' => 'new','?' => array('user_id' => $user_id)),array('escape'=>false));?> 	
	    </div>
	    <div class="panel-body">
	    	<div class="table-responsive">
	        <table class="table table-hover table-bordered">
	            <thead>
	                <tr>
	                    <th>Name</th>
						<th>Type</th>
						<th>Status</th>
						<th>Frequency</th>
						<th>Next Billing</th>
	                </tr>
	            </thead>
	            <tbody>
	            <?php foreach ($Schedule as $schedule) {
	            $run = $schedule['Schedule']['run_next_at'];
                $current_date = date('m/d/Y', time());
                $date1=date_create($current_date);
                $date2=date_create($run);
                $diff=date_diff($date1,$date2);
                $days = $diff->format("%R%a days");

                if($days<0){

				?>
				<tr class="alert alert-danger" style="background-color:#F2DEDE;">
					<td>
					<?php $name = $schedule['Schedule']['name'];
					$schedule_id = $schedule['Schedule']['id'];?>
					<?php echo $this->Html->link($name,array('controller' => 'Schedules', 'action' => 'scheduleedit',$schedule_id),array('escape'=>false));?>

					</td>

					<td><?php echo $schedule['Schedule']['type'];?></td>
					<td><?php echo $schedule['Schedule']['status'];?></td>
					<td><?php echo $schedule['Schedule']['frequency'];?></td>
					<td><?php ?></td>
				</tr>

				<?php }else{	?>
				<tr>
					<td>
					<?php $name = $schedule['Schedule']['name'];
					$schedule_id = $schedule['Schedule']['id'];?>
					<?php echo $this->Html->link($name,array('controller' => 'Schedules', 'action' => 'scheduleedit',$schedule_id),array('escape'=>false));?>

					</td>

					<td><?php echo $schedule['Schedule']['type'];?></td>
					<td><?php echo $schedule['Schedule']['status'];?></td>
					<td><?php echo $schedule['Schedule']['frequency'];?></td>
					<td><?php echo $schedule['Schedule']['run_next_at'];?></td>
				</tr>
				<?php } }?>
				<tr><td colspan="5"><?php echo $this->Html->link("More",array('controller' => 'Schedules', 'action' => 'schedulelist'),array('escape'=>false));?></td></tr>
				<tr></tr>
	            </tbody>
	        </table>

	       	</div>
	    </div>
	</div>


	<!-- Portal Users -->
	<div class="panel panel-default col-md-6 portal_users">
    <div class="panel-heading clearfix">
        
        <h4 class="panel-title"><i class="fa fa-user"></i>     Portal Users  &nbsp;&nbsp;</h4>
        <a href="#"><p class="glyphicon glyphicon-plus" id="addnewportaluser"></p></a>
    </div>
    <div class="panel-body">
    	<div class="table-responsive">
        <table class="table table-hover table-bordered" id="PortalUserTable">
            <thead>
                <tr>
                   	<th>Customer/Contact</th>
					<th>Login</th>
					<th></th>
                </tr>
            </thead>
            <tbody>
            <?php $counter=0;?>
            <?php foreach ($PortalUser as $portaluser) {
            	//pr($portaluser);
            	$portaluser_id = $portaluser['PortalUser']['id'];
            	$row_id =  ++$counter;
			?>
			<tr>
				<td>
                    <span class="customer customer_<?php echo $row_id; ?>">
 						<?php $customer = $portaluser['PortalUser']['customer']; ?>
         				
						<span id="<?php echo $row_id; ?>" class="customer customer_edit_<?php echo $row_id; ?> best_in_place">
							<?php echo $customer;?>
         				</span>
         				
						
 						     						
 					</span>
 					
                    <div style="display:none;" class="customer_form customer_form_<?php echo $row_id;?>" id="<?php echo $row_id; ?>" >
                    
                    	<form class="place" action="javascript:void(0);">
                      	<select  id="<?php echo $row_id; ?>" class="select_customer form-control" > 
                      		<option><?php echo $first_name.' '.$last_name;?> </option>                     		
                          	<?php foreach($Contact as $contact){ 
                          		$name=$contact['Contact']['name'];
                          		$id=$con['Contact']['id'];
                          	?>

							<option>
							<?php echo $name;?> 
							</option> 
							<?php } ?>
                      	</select>
			                                       
                      	<input type="hidden"  id="id_<?php echo $row_id;?>" value="<?php echo $portaluser_id;?>">
                      
                    </form>
                    </div>
 					
				</td>
				<td>
					<span class="portal_user_login portal_user_login_<?php echo $row_id;?>">
 						<?php $login = $portaluser['PortalUser']['login']; ?>
         				<?php if($login!=''){
						?>
						<span id="<?php echo $row_id; ?>" class="login login_edit_<?php echo $row_id; ?> best_in_place">
							<?php echo $login;?>
         				</span>
         				<?php
						}else
						{ 
						?>	
						<span id="<?php echo $row_id; ?>" class="login login_edit_<?php echo $row_id; ?> best_in_place" style="color: #d3d3d3;border: medium none;font-style: italic;">
							<?php echo 'click to add';?>
     					</span>
         				<?php
         				}
         				?>
 						     						
 					</span>
 					<span style="display:none;" class="login_form_<?php echo $row_id;?>" id="<?php echo $row_id; ?>" >
                        <form class="place" action="javascript:void(0);">
                        <input type="text" class="form-control" id="portaluser_login_<?php echo $row_id;?>" value="<?php echo $login;?>" required>

                        <input type="hidden"  id="portaluser_id_<?php echo $row_id;?>" value="<?php echo $portaluser_id;?>">
                        <input class="submit_login btn btn-success" type="button" value="Save" id="<?php echo $row_id; ?>">
                        <input class="cancle_login btn btn-default" type="button" value="Cancel" id="<?php echo $row_id; ?>">
                        </form>
                    </span><br>
                    
				</td>
				
				<td>
					<span class="btn btn-default btn-sm portaluser_advanced_btn portaluser_advanced_btn_<?php echo $row_id;?>" id="<?php echo $row_id;?>"><i class="fa fa-caret-square-o-down"></i></span>
					<?php echo $this->Html->link('<i class="btn btn-danger btn-sm fa fa-times"></i>',array('action'=>'Users','action'=>'deletecontact',$contact_id,$user_id),array('escape'=>false,'confirm' => 'Are you sure?'));?>
				</td>
				<tr width="100%" style="display: none;" class="portaluser_advanced_<?php echo $row_id;?>">
				    <td colspan="3">
				    <div class="row">
				      	<div class="col-lg-6 col-md-6">
				        	<div class="form-group">
				        		<label>Password</label>
				        		<input type="password" class="form-control password password_<?php echo $row_id;?>" id="password_<?php echo $row_id;?>" value="<?php echo $portaluser['PortalUser']['password']; ?>">
				        		<input type="hidden" class="form-control" id="portaluser_id_<?php echo $row_id;?>" value="<?php echo $portaluser_id;?>">
     						
							</div>            				
 							
						</div>			        
				      	<div class="col-lg-6 col-md-6">
				      		<div class="form-group">
				      			<label>Password Confirmation</label>
				        		<input type="password" class="form-control confirm_password confirm_password_<?php echo $row_id;?>" id="confirm_password_<?php echo $row_id;?>" value="<?php echo $portaluser['PortalUser']['confirm_password']; ?>">
							
							<span id="confirmMessage" class="confirmMessage"></span>
				       		</div>
				      	</div>

				    </div>
				    <div class="row">
				      	<div class="col-lg-12 col-md-12">
				        	<div class="form-group" >
     						<?php echo $this->Form->button('Update Portal User', array('div'=>false,'class'=>'btn btn-default portal_user_btn ','id'=>$row_id)); ?>
							</div>	
 							
						</div>			        
				      	
				    </div>
				    </td>
				</tr>
									
			</tr>

			<?php } ?>
			
            </tbody>
        </table>
        </div>
    </div>
	</div>





	<!-- Address -->
	<div class="panel panel-default col-md-6 addresses">
	    <div class="panel-heading clearfix">
	        
	        <h4 class="panel-title"><i class="fa fa-user"></i>     Additional Addresses &nbsp;&nbsp;   </h4>
	       	
        		<?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>',array('controller' => 'users', 'action' => 'useredit',$user_id),array('escape'=>false));?>
      		
	        
			
	    </div>
	    <div class="panel-body">
	    	<div class="table-responsive">
	        <table class="table table-hover table-bordered">
	            <thead>
	                <tr>
	                    <th>Address</th>
						<th></th>
						<th>City</th>
						<th>State/County</th>
						<th>Zip/Postal</th>
						<th></th>
	                </tr>
	            </thead>
	            <tbody>
	            <?php foreach ($Address as $add) {
				?>
				<tr>
					<td><?php echo $add['Address']['street'];?></td>

					<td><?php echo $add['Address']['address'];?></td>

					<td><?php echo $add['Address']['city'];?></td>
					<td><?php echo $add['Address']['country'];?></td>
					<td><?php echo $add['Address']['zip'];?></td>

					<td>
						<button type="button" class="btn btn-danger btn-sm fa fa-times delete_address delete_address_button_<?php echo $add['Address']['id'];?>" id="<?php echo $add['Address']['id'];?>" onclick="return confirm('Are you sure you want to delete this Address?');"></button>

					</td>
				</tr>

				<?php }?>

	            </tbody>
	        </table>
	        </div>
	    </div>
	</div>
	






	<!-- Payments -->
	<div class="panel panel-default col-md-6 payment">
	    <div class="panel-heading clearfix">
	        <h4 class="panel-title"><i class="fa fa-credit-card"></i>     Payments</h4>

	    </div>
	    <div class="panel-body">
	    	<div class="table-responsive">
	        <table class="table table-hover table-bordered">
	            <thead>
	                <tr>
	                    <th>Date</th>
						<th>Amount</th>
						<th>Message/Method</th>
						<th>Invoice(s)</th>
						<th></th>
	                </tr>
	            </thead>
	            <tbody>
	            <?php //foreach ($invoice as $inv) {
				?>
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>

				<tr><td colspan="5"><?php echo $this->Html->link("More",array('controller' => 'Payments', 'action' => 'paymentlist'),array('escape'=>false));?></td></tr>
	            </tbody>
	        </table>

	       	</div>
	    </div>
	</div>
	

	<!-- Tickets -->
	<div class="panel panel-default col-md-6 ticket">
	    <div class="panel-heading clearfix">
	        
	        <h4 class="panel-title"><i class="fa fa-tags"></i>     Tickets &nbsp;&nbsp;   </h4>
	       	       
			
	    </div>
	    <div class="panel-body">
	    	<div class="table-responsive">
	        <table class="table table-hover table-bordered">
	            <thead>
	                <tr>
	                    <th>ID</th>
						<th>Created</th>
						<th>Subject</th>
						<th>Status</th>
						
	                </tr>
	            </thead>
	            <tbody>
	            <?php foreach ($ticket as $tic) {
				?>
				<tr>
					<td><?php $tic_id = $tic['Ticket']['id'];?>
						<?php echo $this->Html->link($tic_id,array('controller' => 'Tickets', 'action' => 'ticketdetails',$tic_id),array('escape'=>false));?>

					</td>

					<td><?php echo date('D d-m-Y g:i A',strtotime($tic['Ticket']['created']));?></td>
					<td><?php echo $tic['Ticket']['title'];?></td>
					<td><?php echo $tic['Ticket']['status'];?></td>

					
				</tr>

				<?php }?>
				<tr><td colspan="4"><?php echo $this->Html->link("More",array('controller' => 'Tickets', 'action' => 'ticketlist'),array('escape'=>false));?></td></tr>
	            </tbody>
	        </table>
	        </div>
	    </div>
	</div>
	


	<!-- Attachments  -->
	
	<div class="panel panel-default col-md-6 attachment">
	    <div class="panel-heading clearfix">
	        <h4 class="panel-title"><i class="fa fa-paperclip"></i>     Attachments &nbsp;&nbsp;
	        <p><a href="#myAttachmentModal" data-toggle="modal" style="font-size:15px;">
          			<span class="glyphicon glyphicon-plus"></span>
        		</a></p></h4>  
        		
        		<input id='attechmentfile' type="filepicker" data-fp-apikey="Ass9Y7zESsGFzWzN2nfPwz" onchange="alert(event.fpfile.url)" name="Attechment[file]">
      		
	    </div>
	    <div class="panel-body">
	    	<div class="table-responsive">
	        <table class="table table-hover table-bordered">
	            <thead>
	                <tr>
	                    <th>Created</th>
						<th>File</th>
						<th>Private/Public</th>
						<th></th>
	                </tr>
	            </thead>
	            <tbody>
					<?php $path = "attachment/";	?> 
					<?php foreach($attachment as $att) {
						$file_name= $att['Attachment']['file'];
						$img = "$path"."$file_name";
					?>
					<tr>
						<td>
						<?php $att_id= $att['Attachment']['id'];?>
						<?php echo $start_at= date('D d-m-Y g:i A',strtotime($att['Attachment']['created']));?>
						</td>
						<td>
							<?php echo $this->Html->image($img, array('alt' => 'Image','width'=>'80px','height'=>'60px',"style"=>"border:2px solid #CCCCCC")); ?>
						
							<a target="_blank" href="http://112.196.42.180/projects/repairshopsaas/repairshopsaas/img/attachment/<?php echo $file_name;?>"><?php echo $file_name= $att['Attachment']['file'];?></a>
									
									
						</td>
						<td><?php echo $att['Attachment']['status'];?></td>
						<td>						 
							
							<?php echo $this->Html->link('<i class="btn btn-danger btn-sm fa fa-times"></i>',array('action'=>'Leads','action'=>'deleteAttachment',$att_id,$user_id,$file_name),array('escape'=>false,'confirm' => 'Are you sure you wish to delete this Attachment?'));?>
						</td>
					</tr>
					<?php } ?> 			
				</tbody>
	            
	        </table>

	       	</div>
	    </div>
	</div>

	<!-- myAttachment Modal -->   
	<div class="modal fade" id="myAttachmentModal" role="dialog">
		<div class="modal-dialog">
		<!-- Modal content-->
			<div class="modal-content">
			<div class="modal-header">
			    <button type="button" class="close" data-dismiss="modal">&times;</button>
			    <h4 class="modal-title">Upload File</h4>
			</div>
			<div class="modal-body">
			
			<div id="main-wrapper" class="container">
			

            <?php echo $this->Form->create('users',array('controller'=>'users','action'=>'attachment','class'=>'validator-form','enctype' => 'multipart/form-data')); ?>

            
                
            <div class="row">  
                   
            <div class="col-xs-12 col-sm-12">
				<div class="input-group">
						
						<span class="col-xs-5 col-sm-5">
				
						<label>Select one file:</label>&nbsp;&nbsp;&nbsp;
						</span>
						<span class="col-xs-1 col-sm-1"></span>

						<span class="btn btn-primary col-xs-6 col-sm-6">
                   		
                   		
                    		<?php echo $this->Form->input('attachment.file', array('type'=>'file','class'=>'form-control','label'=>'Choose File','required'=>'required','style'=>"display: none;")); ?> 

                    		<?php echo $this->Form->input('attachment.user_id', array('type'=>'hidden','class'=>'form-control','value'=>$user_id)); ?>


							<?php echo $this->Form->input('attachment.status', array('type'=>'hidden','class'=>'form-control','value'=>'Private')); ?>	
                    		
                    	</span>&nbsp;&nbsp;&nbsp;

                    	<span class="col-xs-12 col-sm-12"></span>
                    	<span class="col-xs-12 col-sm-12" style="padding-right: 0;">
                    	<?php echo $this->Form->submit('Upload', array('class' => 'btn btn-success pull-right')); ?>
                    	</span>
                </div>
            	
			</div>
			  
			
			<?php echo $this->Form->end(); ?> 



            </div>      
			</div>

				                		
			
			
			</div>
			</div>
									      
		</div>
	</div>
	




	


	
	<!-- Estimates -->
	<div class="panel panel-default col-md-6 estimate">
	    <div class="panel-heading clearfix">
	        
	        <h4 class="panel-title"><i class="fa fa-money"></i>     Estimates &nbsp;&nbsp;   </h4>
	       	       
			
	    </div>
	    <div class="panel-body">
	    	<div class="table-responsive">
	        <table class="table table-hover table-bordered">
	            <thead>
	                <tr>
	                    <th>Estimate Number</th>
						<th>Status</th>
						<th>Date</th>
						<th>Total</th>
						
	                </tr>
	            </thead>
	            <tbody>
	            <?php foreach ($estimate as $est) {
				?>
				<tr>
					<td><?php $est_id = $est['Estimate']['id'];
						$est_number = $est['Estimate']['est_number'];
					?>
						<?php echo $this->Html->link($est_number,array('controller' => 'Estimates', 'action' => 'estimatedetails',$user_id,$est_id),array('escape'=>false));?>

					</td>
					<td><?php $status = $est['Estimate']['status'];
					if($status=='1')
					{
						echo $this->Html->image('check_mark_green.gif', array('alt' => 'Image','width'=>'15', 'height'=>'15','title'=>'Approved'));
					}
					else{ }?>
					</td>
					<td><?php echo date('D d-m-Y g:i A',strtotime($est['Estimate']['created']));?></td>
					<td><?php echo '$'.$est['Estimate']['total'];?></td>
					

					
				</tr>

				<?php }?>
				<tr><td colspan="4"><?php echo $this->Html->link("More",array('controller' => 'Estimates', 'action' => 'estimatelist'),array('escape'=>false));?></td></tr>
	            </tbody>
	        </table>
	        </div>
	    </div>
	</div>




	<!-- Contracts -->
	<div class="panel panel-default col-md-6 contract">
	    <div class="panel-heading clearfix">
	        
	        <h4 class="panel-title"><i class="fa fa-money"></i>     Contracts &nbsp;&nbsp;  </h4>
	        <?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>',array('controller' => 'Contracts', 'action' => 'add','?' => array('user_id' => $user_id)),array('escape'=>false));?> 	
	    </div>
	    <div class="panel-body">
	    	<div class="table-responsive">
	        <table class="table table-hover table-bordered">
	            <thead>
	                <tr>
	                    <th>Name</th>
						<th>Start Date</th>
						<th>End Date</th>
						<th>Status</th>
						<th>Est. Amount</th>
	                </tr>
	            </thead>
	            <tbody>
	            <?php foreach ($Contract as $contract) {
				?>
				<tr>
					<td><?php 
						$contract_name = $contract['Contract']['contract_name'];
						$contract_id = $contract['Contract']['id'];
						echo $this->Html->link($contract_name,array('controller' => 'Contracts', 'action' => 'contractdetails',$contract_id),array('escape'=>false));?>
					</td>
					<td><?php echo date('D d-m-Y g:i A',strtotime($contract['Contract']['start_date']));?>
					</td>
					<td><?php echo date('D d-m-Y g:i A',strtotime($contract['Contract']['end_date']));?></td>
					<td><?php echo $contract['Contract']['status'];?></td>
					<td><?php echo '$'.$contract['Contract']['estimated_value'];?></td>
										
				</tr>

				<?php } ?>
				<tr><td colspan="5"><?php echo $this->Html->link("More",array('controller' => 'Contracts', 'action' => 'contractlist'),array('escape'=>false));?></td></tr>
	            </tbody>
	        </table>
	        </div>
	    </div>
	</div>
	



	<!-- Purchase -->
	<div class="panel panel-default col-md-6 purchase">
	    <div class="panel-heading clearfix">
	        
	        <h4 class="panel-title"><i class="fa fa-money"></i>     Purchases &nbsp;&nbsp;   </h4>
	       	<?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>',array('controller' => 'Orders', 'action' => 'add','?' => array('user_id' => $user_id)),array('escape'=>false));?>        
			
	    </div>
	    <div class="panel-body">
	    	<div class="table-responsive">
	        <table class="table table-hover table-bordered">
	            <thead>
	                <tr>
	                    <th>Date</th>
						<th>Status</th>
						<th>Paid Amount</th>
						<th></th>
						
	                </tr>
	            </thead>
	            <tbody>
	            <?php foreach ($order as $orders) {
				?>
				<tr>
					<td><?php echo date('D d-m-Y g:i A',strtotime($orders['Order']['created']));?></td>
					<td><?php echo $orders['Order']['status'];?></td>
					<td><?php $paid = $orders['Order']['paid'];
						if($paid=='1'){
							echo '$'.$orders['Order']['total'].'.00';
						}else{

						}
						?>
					</td>
					<td>
						<?php echo $this->Html->link('View',array('controller'=>'Orders','action'=>'orderdetails',$orders['Order']['id']),array('escape'=>false));?>
					</td>
				</tr>
				<?php }?>
				<tr><td colspan="4"><?php echo $this->Html->link("More",array('controller' => 'Orders', 'action' => 'orderlist'),array('escape'=>false));?></td></tr>

	            </tbody>
	        </table>
	        </div>
	    </div>
	</div>




	<!-- Warranty Information  -->
	<div class="panel panel-default col-md-6 warranty">
	    <div class="panel-heading clearfix">
	        
	        <h4 class="panel-title"><i class="fa fa-tags"></i>      Warranty Information &nbsp;&nbsp;   </h4>
	       	       
			
	    </div>
	    <div class="panel-body">
	    	<div class="table-responsive">
	        <table class="table table-hover table-bordered">
	            <thead>
	                <tr>
	                    <th>Name</th>
						<th>Expiration</th>
						<th></th>
						
	                </tr>
	            </thead>
	            <tbody>
	            <?php foreach ($Warranty as $warranty) {
	            	
				?>
				<tr><?php $warranty_id = $warranty['Warranty']['id'];?>
					<td><?php $name = $warranty['Warranty']['name'];
						echo $this->Html->link($name,array('controller' => 'Warranties', 'action' => 'warrantyview',$warranty_id),array('escape'=>false));
						
					?></td>
					<td><?php echo date('D d-m-Y g:i A',strtotime($warranty['Warranty']['expiration_date']));?></td>					
					<td><?php echo $this->Html->link('<i class="btn btn-danger btn-sm fa fa-times"></i>',array('action'=>'users','action'=>'deletewarranty',$warranty_id,$user_id),array('escape'=>false,'confirm' => 'Are you sure?'));?></td>
				</tr>
				<?php }?>
				<tr><td colspan="3"><?php echo $this->Html->link("More",array('controller' => 'Warranties', 'action' => 'warrantylist'),array('escape'=>false));?></td></tr>
	            </tbody>
	        </table>
	        </div>
	    </div>
	</div>




	<!-- Leads  -->
	<div class="panel panel-default col-md-6 leads">
	    <div class="panel-heading clearfix">
	        
	        <h4 class="panel-title"><i class="fa fa-tags"></i>      Leads &nbsp;&nbsp;   </h4>
	       	       
			
	    </div>
	    <div class="panel-body">
	    	<div class="table-responsive">
	        <table class="table table-hover table-bordered">
	            <thead>
	                <tr>
	                    <th>Created</th>
						<th>Subject</th>
						<th>Status</th>
						
	                </tr>
	            </thead>
	            <tbody>
	            <?php foreach ($lead as $leads) {

				?>
				<tr>
					<td><?php echo date('D d-m-Y g:i A',strtotime($leads['Lead']['created']));?></td>
					<td><?php echo $leads['Lead']['subject'];?></td>
					
					<td><?php echo $leads['Lead']['status'];?></td>

					
				</tr>

				<?php }?>
				<tr><td colspan="3"><?php echo $this->Html->link("More",array('controller' => 'leads', 'action' => 'leadlist'),array('escape'=>false));?></td></tr>
	            </tbody>
	        </table>
	        </div>
	    </div>
	</div>
	



	<!-- Assets  -->
	<div class="panel panel-default col-md-6 assets">
	    <div class="panel-heading clearfix">
	        
	        <h4 class="panel-title">      Assets &nbsp;&nbsp;   </h4>

	       	<?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>',array('controller' => 'Assets', 'action' => 'newasset','?' => array('user_id' => $user_id)),array('escape'=>false));?> 
	    </div>
	    <div class="panel-body">
	    	<div class="table-responsive">
	        <table class="table table-hover table-bordered">
	            <thead>
	                <tr>
	                    <th>Name</th>
						<th>Asset Serial Number</th>
						<th>Type</th>
						<th></th>
	                </tr>
	            </thead>
	            <tbody>
	            <?php foreach ($assets as $asset) {
	            	$asset_id = $asset['AssetFieldValue']['id']
				?>
				<tr>
					<td><?php $name = $asset['AssetFieldValue']['name'];
					echo $this->Html->link($name,array('controller'=>'Assets','action'=>'assetdetails',$asset_id),array('escape'=>false));
					?></td>
					<td><?php echo $asset['AssetFieldValue']['serial_number'];?></td>
					<td><?php echo $asset['AssetFieldValue']['type'];?></td>
					<td>
						<?php echo $this->Html->link('<i class="btn btn-default fa fa-check-square-o"></i>',array('controller'=>'Assets','action'=>'assetfieldvalueedit','?' => array('asset_id' => $asset_id)),array('escape'=>false));?>

                        <?php echo $this->Html->link('<i class="btn btn-danger  fa fa-times"></i>',array('controller' => 'Assets', 'action' => 'assetcustomfieldvaluedelete',$asset_id),array('escape'=>false,'confirm' => 'Are you sure you wish to delete this Asset?'));?>
					</td>

					
				</tr>

				<?php }?>
				<tr><td colspan="4"><?php echo $this->Html->link("More",array('controller' => 'assets', 'action' => 'customerassets'),array('escape'=>false));?></td></tr>
	            </tbody>
	        </table>
	        </div>
	    </div>
	</div>



	<!-- Change History  -->
	<div class="panel panel-default col-md-6 changehistory">
	    <div class="panel-heading clearfix">
	        
	        <h4 class="panel-title"> <i class="fa fa-tags"></i>       Change History (admin only)&nbsp;&nbsp;   </h4>

	      
	    </div>
	    <div class="panel-body">
	    	<div class="table-responsive">
	        <table class="table table-hover table-bordered">
	            <thead>
	                <tr>
	                    <th>Date</th>
						<th>Employee</th>
						<th>Changes</th>
						
	                </tr>
	            </thead>
	            <tbody>
	            <?php foreach ($logs as $log) {
	            	
				?>
				<tr>
					<td style="vertical-align: middle;"><?php echo date('D d-m-Y g:i A',strtotime($log['Log']['created']));?></td>
					<td style="vertical-align: middle;" ><?php echo $log['Log']['employee'];?></td>
					<td>
					<?php $property = $log['Log']['changes'];
                       
                        if($property!='')
                        {
                           	$json = json_decode($property, true);
                           	$useredit = $log['Log']['edit'];
                          
                            if($useredit!="")
                            {
							   	echo '<p><b>firstname to: </b>'.$json['User']['first_name'].'</p>';
							   	echo '<p><b>lastname to: </b>'.$json['User']['last_name'].'</p>';
							   	echo '<p><b>email to : </b>'.$json['User']['email'].'</p>';
							   	echo '<p><b>referred_by to : </b>'.$json['User']['referred_by'].'</p>';
							   	
								echo '<p><b>business_name to: </b>'.$json['User']['business_name'].'</p>';
                           		
                           		echo '<p><b>address to : </b>'.$json['User']['address'].'</p>';
                           		
                           		echo '<p><b>address_2 to: </b>'.$json['User']['address2'].'</p>';
                           		
                           		echo '<p><b>city to : </b>'.$json['User']['city'].'</p>';
                           		
                           		echo '<p><b>state to : </b>'.$json['User']['state_country'].'</p>';
                           		
                           		echo '<p><b>zip to: </b>'.$json['User']['zip'].'</p>';
                           	}
                           	else
                           	{
                           		echo '<p><b>firstname to: </b>'.$json['first_name'].'</p>';
							   	echo '<p><b>lastname to: </b>'.$json['last_name'].'</p>';
							   	echo '<p><b>email to : </b>'.$json['email'].'</p>';
							   	echo '<p><b>referred_by to : </b>'.$json['referred_by'].'</p>';
							   	
								echo '<p><b>business_name to: </b>'.$json['business_name'].'</p>';
                           		
                           		echo '<p><b>address to : </b>'.$json['address'].'</p>';
                           		
                           		echo '<p><b>address_2 to: </b>'.$json['address2'].'</p>';
                           		
                           		echo '<p><b>city to : </b>'.$json['city'].'</p>';
                           		
                           		echo '<p><b>state to : </b>'.$json['state_country'].'</p>';
                           		
                           		echo '<p><b>zip to: </b>'.$json['zip'].'</p>';
                           	}
                        }

                       ?>

					</td>
					

					
				</tr>

				<?php }?>
	            </tbody>
	        </table>
	        </div>
	    </div>
	</div>


</div>
	<?php if(!empty($Email))
			{
		?>
		<div class="row"> 
			<div class="col-xs-1 col-sm-1">
			</div> 
			<div class="col-xs-10 col-sm-10">
				<div class="form-group">
					<div class="panel panel-default">
						<div class="panel-heading"><i class="fa fa-envelope"></i> Email</div>
						<div class="panel-body">
							<?php foreach($Email as $app) {?>
								<div class="mam well outbound" style="margin-top: 10px;">
									<div class="row">
									<div class="col-md-8">
										<?php $id= $app['Email']['id'];?>
										<?php echo $start_at= date('D d-m-Y g:i A',strtotime($app['Email']['created']));?><br><br>
										<span class="label label-success">From: <?php echo $start_at= $app['Email']['email_from'];?></span>
										<span class="label label-primary">User: <?php echo $start_at= $app['Email']['user'];?></span><br><br>
										<span class="label label-info">To: <?php echo $start_at= $app['Email']['email_to'];?></span>
									</div>
									<div class="col-md-4" style="text-align: right;">
										<a class="btn btn-warning btn-sm ajax-modalize" data-toggle="modal" href="#myEmail"><i class="fa fa-reply"></i>Reply
										</a>
									</div>
									</div>
									<div class="row mtm">
									<div class="col-md-12">
										<h4> <?php echo $start_at= $app['Email']['subject'];?></h4>
										<p class="mts"><?php echo $start_at= $app['Email']['message'];?></p>
									</div>
									</div>
								</div>
							<?php } ?> 	
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-1 col-sm-1">
			</div>
		</div>
		<?php
		}
		?>

</div>



<!-- Date Time Picker -->


    <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2017.1.118/styles/kendo.common-material.min.css" />
    <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2017.1.118/styles/kendo.material.min.css" />
    <script src="https://kendo.cdn.telerik.com/2017.1.118/js/kendo.all.min.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
    // create DateTimePicker from input HTML element
    $("#datetimepicker1").kendoDateTimePicker({
    value:new Date()
    });

    $("#datetimepicker2").kendoDateTimePicker({
    value:new Date()
    });

    $("#datetimepicker3").kendoDateTimePicker({
    value:new Date()
    });
});
</script>


<!-- Delete User Address-->
<script>
$(document).ready(function(){
    $(".delete_address").click(function(){
        var addressid = $(this).attr('id');
        //alert(id);
        $(".delete_address_button_"+addressid).text("Working....");

        //alert("The paragraph was clicked.");die();
        
  	
  		$.ajax({
 			   type: "POST",
 			   url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/admin/users/userdeleteaddress/",

 			  // url: "search.php",
 			   data: { addressid:addressid },
			
 			   success: function(data)
 			   {

					$(".delete_address_button_"+addressid).text("Done");
					window.location.reload();
  			  }
  		});
    });

    
});
</script>


<!-- jump to -->
<script>
$(document).ready(function(){
    
$('#all').click(function(){
	$(".addresses").show();
	$(".assets").show();
	$(".attachment").show();
	$(".changehistory").show();
	$(".contact").show();
	$(".contract").show();
	$(".estimate").show();
	$(".invoice").show();
	$(".leads").show();
	$(".communication_log").show();
	$(".payment").show();
	$(".portal_users").show();
	$(".purchase").show();
	$(".recurring_invoice").show();
	$(".reminder").show();
	$(".ticket").show();
	$(".warranty").show();
});

$('#addresses').click(function(){
	$(".addresses").show();
	$(".assets").hide();
	$(".attachment").hide();
	$(".changehistory").hide();
	$(".contact").hide();
	$(".contract").hide();
	$(".estimate").hide();
	$(".invoice").hide();
	$(".leads").hide();
	$(".communication_log").hide();
	$(".payment").hide();
	$(".portal_users").hide();
	$(".purchase").hide();
	$(".recurring_invoice").hide();
	$(".reminder").hide();
	$(".ticket").hide();
	$(".warranty").hide();
});

$('#assets').click(function(){
	$(".addresses").hide();
	$(".assets").show();
	$(".attachment").hide();
	$(".changehistory").hide();
	$(".contact").hide();
	$(".contract").hide();
	$(".estimate").hide();
	$(".invoice").hide();
	$(".leads").hide();
	$(".communication_log").hide();
	$(".payment").hide();
	$(".portal_users").hide();
	$(".purchase").hide();
	$(".recurring_invoice").hide();
	$(".reminder").hide();
	$(".ticket").hide();
	$(".warranty").hide();
});

$('#attachments').click(function(){
	$(".addresses").hide();
	$(".assets").hide();
	$(".attachment").show();
	$(".changehistory").hide();
	$(".contact").hide();
	$(".contract").hide();
	$(".estimate").hide();
	$(".invoice").hide();
	$(".leads").hide();
	$(".communication_log").hide();
	$(".payment").hide();
	$(".portal_users").hide();
	$(".purchase").hide();
	$(".recurring_invoice").hide();
	$(".reminder").hide();
	$(".ticket").hide();
	$(".warranty").hide();
});


$('#changehistory').click(function(){
	$(".addresses").hide();
	$(".assets").hide();
	$(".attachment").hide();
	$(".changehistory").show();
	$(".contact").hide();
	$(".contract").hide();
	$(".estimate").hide();
	$(".invoice").hide();
	$(".leads").hide();
	$(".communication_log").hide();
	$(".payment").hide();
	$(".portal_users").hide();
	$(".purchase").hide();
	$(".recurring_invoice").hide();
	$(".reminder").hide();
	$(".ticket").hide();
	$(".warranty").hide();
});

$('#contacts').click(function(){
	$(".addresses").hide();
	$(".assets").hide();
	$(".attachment").hide();
	$(".changehistory").hide();
	$(".contact").show();
	$(".contract").hide();
	$(".estimate").hide();
	$(".invoice").hide();
	$(".leads").hide();
	$(".communication_log").hide();
	$(".payment").hide();
	$(".portal_users").hide();
	$(".purchase").hide();
	$(".recurring_invoice").hide();
	$(".reminder").hide();
	$(".ticket").hide();
	$(".warranty").hide();
});

$('#contracts').click(function(){
	$(".addresses").hide();
	$(".assets").hide();
	$(".attachment").hide();
	$(".changehistory").hide();
	$(".contact").hide();
	$(".contract").show();
	$(".estimate").hide();
	$(".invoice").hide();
	$(".leads").hide();
	$(".communication_log").hide();
	$(".payment").hide();
	$(".portal_users").hide();
	$(".purchase").hide();
	$(".recurring_invoice").hide();
	$(".reminder").hide();
	$(".ticket").hide();
	$(".warranty").hide();
});

$('#estimates').click(function(){
	$(".addresses").hide();
	$(".assets").hide();
	$(".attachment").hide();
	$(".changehistory").hide();
	$(".contact").hide();
	$(".contract").hide();
	$(".estimate").show();
	$(".invoice").hide();
	$(".leads").hide();
	$(".communication_log").hide();
	$(".payment").hide();
	$(".portal_users").hide();
	$(".purchase").hide();
	$(".recurring_invoice").hide();
	$(".reminder").hide();
	$(".ticket").hide();
	$(".warranty").hide();
});

$('#invoices').click(function(){
	$(".addresses").hide();
	$(".assets").hide();
	$(".attachment").hide();
	$(".changehistory").hide();
	$(".contact").hide();
	$(".contract").hide();
	$(".estimate").hide();
	$(".invoice").show();
	$(".leads").hide();
	$(".communication_log").hide();
	$(".payment").hide();
	$(".portal_users").hide();
	$(".purchase").hide();
	$(".recurring_invoice").hide();
	$(".reminder").hide();
	$(".ticket").hide();
	$(".warranty").hide();
});

$('#leads').click(function(){
	$(".addresses").hide();
	$(".assets").hide();
	$(".attachment").hide();
	$(".changehistory").hide();
	$(".contact").hide();
	$(".contract").hide();
	$(".estimate").hide();
	$(".invoice").hide();
	$(".leads").show();
	$(".communication_log").hide();
	$(".payment").hide();
	$(".portal_users").hide();
	$(".purchase").hide();
	$(".recurring_invoice").hide();
	$(".reminder").hide();
	$(".ticket").hide();
	$(".warranty").hide();
});

$('#log').click(function(){
	$(".addresses").hide();
	$(".assets").hide();
	$(".attachment").hide();
	$(".changehistory").hide();
	$(".contact").hide();
	$(".contract").hide();
	$(".estimate").hide();
	$(".invoice").hide();
	$(".leads").hide();
	$(".communication_log").show();
	$(".payment").hide();
	$(".portal_users").hide();
	$(".purchase").hide();
	$(".recurring_invoice").hide();
	$(".reminder").hide();
	$(".ticket").hide();
	$(".warranty").hide();
});

$('#payments').click(function(){
	$(".addresses").hide();
	$(".assets").hide();
	$(".attachment").hide();
	$(".changehistory").hide();
	$(".contact").hide();
	$(".contract").hide();
	$(".estimate").hide();
	$(".invoice").hide();
	$(".leads").hide();
	$(".communication_log").hide();
	$(".payment").show();
	$(".portal_users").hide();
	$(".purchase").hide();
	$(".recurring_invoice").hide();
	$(".reminder").hide();
	$(".ticket").hide();
	$(".warranty").hide();
});

$('#portal_users').click(function(){
	$(".addresses").hide();
	$(".assets").hide();
	$(".attachment").hide();
	$(".changehistory").hide();
	$(".contact").hide();
	$(".contract").hide();
	$(".estimate").hide();
	$(".invoice").hide();
	$(".leads").hide();
	$(".communication_log").hide();
	$(".payment").hide();
	$(".portal_users").show();
	$(".purchase").hide();
	$(".recurring_invoice").hide();
	$(".reminder").hide();
	$(".ticket").hide();
	$(".warranty").hide();
});

$('#purchase').click(function(){
	$(".addresses").hide();
	$(".assets").hide();
	$(".attachment").hide();
	$(".changehistory").hide();
	$(".contact").hide();
	$(".contract").hide();
	$(".estimate").hide();
	$(".invoice").hide();
	$(".leads").hide();
	$(".communication_log").hide();
	$(".payment").hide();
	$(".portal_users").hide();
	$(".purchase").show();
	$(".recurring_invoice").hide();
	$(".reminder").hide();
	$(".ticket").hide();
	$(".warranty").hide();
});

$('#recurring_invoices').click(function(){
	$(".addresses").hide();
	$(".assets").hide();
	$(".attachment").hide();
	$(".changehistory").hide();
	$(".contact").hide();
	$(".contract").hide();
	$(".estimate").hide();
	$(".invoice").hide();
	$(".leads").hide();
	$(".communication_log").hide();
	$(".payment").hide();
	$(".portal_users").hide();
	$(".purchase").hide();
	$(".recurring_invoice").show();
	$(".reminder").hide();
	$(".ticket").hide();
	$(".warranty").hide();
});

$('#reminters').click(function(){
	$(".addresses").hide();
	$(".assets").hide();
	$(".attachment").hide();
	$(".changehistory").hide();
	$(".contact").hide();
	$(".contract").hide();
	$(".estimate").hide();
	$(".invoice").hide();
	$(".leads").hide();
	$(".communication_log").hide();
	$(".payment").hide();
	$(".portal_users").hide();
	$(".purchase").hide();
	$(".recurring_invoice").hide();
	$(".reminder").show();
	$(".ticket").hide();
	$(".warranty").hide();
});

$('#tickets').click(function(){
	$(".addresses").hide();
	$(".assets").hide();
	$(".attachment").hide();
	$(".changehistory").hide();
	$(".contact").hide();
	$(".contract").hide();
	$(".estimate").hide();
	$(".invoice").hide();
	$(".leads").hide();
	$(".communication_log").hide();
	$(".payment").hide();
	$(".portal_users").hide();
	$(".purchase").hide();
	$(".recurring_invoice").hide();
	$(".reminder").hide();
	$(".ticket").show();
	$(".warranty").hide();
});

$('#warranty').click(function(){
	$(".addresses").hide();
	$(".assets").hide();
	$(".attachment").hide();
	$(".changehistory").hide();
	$(".contact").hide();
	$(".contract").hide();
	$(".estimate").hide();
	$(".invoice").hide();
	$(".leads").hide();
	$(".communication_log").hide();
	$(".payment").hide();
	$(".portal_users").hide();
	$(".purchase").hide();
	$(".recurring_invoice").hide();
	$(".reminder").hide();
	$(".ticket").hide();
	$(".warranty").show();
});

});
</script>



<!-- file picker API-->

<script src="https://api.filestackapi.com/filestack.js"></script>

<script type="text/javascript">
  filepicker.setKey("Ass9Y7zESsGFzWzN2nfPwz");
  

  document.getElementById("attechmentfile").onclick = function(){
  	alert("Fsdf");
	  filepicker.pickAndStore(
	  {
	    mimetype: 'image/*',
	    container: 'window',
	    services: ['COMPUTER','INSTAGRAM', 'FACEBOOK', 'FLICKER','GOOGLE_DRIVE', 'DROPBOX',]
	  },
	  {
	    location:"S3"
	  },
	  function(Blob){
	    console.log(JSON.stringify(Blob));
	  },
	  function(FPError){
	    console.log(FPError.toString());
	  },
	  function(progress){
	    console.log(JSON.stringify(progress));
	  });
	};


	
	function success()
	{
		alert(event.fpfile.url);
		alert("DSf");
	}
</script>


<!-- PDF scripts -->

<script type="text/javascript" src="//cdn.rawgit.com/MrRio/jsPDF/master/dist/jspdf.min.js"></script> 

<script type="text/javascript" src="//cdn.rawgit.com/niklasvh/html2canvas/0.5.0-alpha2/dist/html2canvas.min.js"></script>

<script type="text/javascript" >    (function(){
    var 
     form = $('.form'),
     cache_width = form.width(),
     a4  =[ 595.28,  841.89];  // for a4 size paper width and height
     
    $('#create_pdf').on('click',function(){
     $('body').scrollTop(0);
     createPDF();
     $('#myModal').hide();


    });
    //create pdf
    function createPDF(){
     getCanvas().then(function(canvas){
      var 
      img = canvas.toDataURL("image/png"),
      doc = new jsPDF({
              unit:'px', 
              format:'a4'
            });     
            doc.addImage(img, 'JPEG', 20, 20);
            doc.save('statement.pdf');
            form.width(cache_width);
            location.reload();
     });
    }
     
    // create canvas object
    function getCanvas(){
     form.width((a4[0]*1.33333) -80).css('max-width','none');
     return html2canvas(form,{
         imageTimeout:2000,
         removeContainer:true
        }); 
    }
     
    }());

</script>

<!-- Notes Update -->

<script>
$(document).ready(function() {
  
$(".notes_edit").click(function(){
$(".notes_form").show();
$(".notes").hide();
});

    
$(".notes_cancle").click(function(){

$(".notes").show();
$(".notes_form").hide();
});   

$('.notes_submit').click(function(){
		var notes = $('#notes').val();
		var user_id = $('#id').val();
		//alert(notes);alert(user_id);die();		
		if(notes!='')
		{
 			   $.ajax({
 			   type: "POST",
 			   url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/admin/Users/notesupdate/",

 			  // url: "search.php",
 			   data: { notes : notes , user_id:user_id},
			
 			   success: function(data)
 			   {
  				 //window.location.reload();
  				 $(".notes_form").hide();
            	 $(".notes_edit").empty();
            	 $(".notes_edit").append(notes);
            	 $(".notes_edit").removeAttr("style");
            	 $(".notes").show();
  				//  $('#newDiv').html(jQuery(data).find('.result').html()); 
  			  }
  			  });
		}return false;    

	});


});
</script>


<!-- Add New Contact -->

<script>
$(document).ready(function() {
	$('#addnewcontact').click(function(){		
		var user_id = $("#user_id").text();
		//alert(user_id);die();
		$.ajax({
 			type: "POST",
 			url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/admin/Users/addnewcontact/",
 			data: { user_id : user_id },
			
 			success: function(data)
 			{
 				window.location.reload();
  			}
  		});
		return false;    
	});
});
</script>




<!-- Advance Data -->

<script>
$(document).ready(function() {
	$('.advanced_data_btn').click(function(){
		id = $(this).attr('id');
		$(".advanced_data_"+id).toggle();
	});
});
</script>


<!-- Update Contact Name -->

<script>
$(document).ready(function() {
  
	$(".name").click(function(){
	  	id = $(this).attr('id');
		$(".name_form_"+id).show();
		$(".name_edit_"+id).hide();
	});

    
	$(".cancle_contact_name").click(function(){
		id = $(this).attr('id');
		$(".name_form_"+id).hide();
		$(".name_edit_"+id).show(); 
	});   

	$('.submit_contact_name').click(function(){
		id = $(this).attr('id');
		var name = $('#contact_name_'+id).val();
		var contact_id = $('#contact_id_'+id).val();
		//alert(name);alert(contact_id);die();	
		if(name!='')
		{
		   	$.ajax({
		   		type: "POST",
		   		url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/admin/Vendors/updatecontactname/",
		   		data: { name : name , contact_id:contact_id},
	
		   		success: function(data)
		   		{
					$(".name_form_"+id).hide();
    				$(".name_edit_"+id).empty();
    				$(".name_edit_"+id).append(name);
    				$(".name_edit_"+id).removeAttr("style");
    				$(".name_edit_"+id).show();
    				$(".contact_name").show();
		  		}
		  	});
		}return false;    
	});
});
</script>


<!-- Update Contact Phone -->

<script>
$(document).ready(function() {
  
	$(".phone").click(function(){
	  	id = $(this).attr('id');
		$(".phone_form_"+id).show();
		$(".phone_edit_"+id).hide();
	});

    
	$(".cancle_contact_phone").click(function(){
		id = $(this).attr('id');
		$(".phone_form_"+id).hide();
		$(".phone_edit_"+id).show(); 
	});   

	$('.submit_contact_phone').click(function(){
		id = $(this).attr('id');
		var phone = $('#contact_phone_'+id).val();
		var contact_id = $('#contact_id_'+id).val();
		//alert(phone);alert(contact_id);die();	
		if(phone!='')
		{
 			$.ajax({
 				type: "POST",
 			   	url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/admin/Vendors/updatecontactphone/",
 			   	data: { phone : phone , contact_id:contact_id},
			
 			   	success: function(data)
 			   	{
  					$(".phone_form_"+id).hide();
            		$(".phone_edit_"+id).empty();
            		$(".phone_edit_"+id).append(phone);
            		$(".phone_edit_"+id).removeAttr("style");
            		$(".phone_edit_"+id).show();
            		$(".contact_phone").show();
  			  	}
  			});
		}return false;    
	});
});
</script>


<!-- Update Contact Mobile -->

<script>
$(document).ready(function() {
  
	$(".mobile").click(function(){
	  	id = $(this).attr('id');
		$(".mobile_form_"+id).show();
		$(".mobile_edit_"+id).hide();
	});

    
	$(".cancle_contact_mobile").click(function(){
		id = $(this).attr('id');
		$(".mobile_form_"+id).hide();
		$(".mobile_edit_"+id).show(); 
	});   

	$('.submit_contact_mobile').click(function(){
		id = $(this).attr('id');
		var mobile = $('#contact_mobile_'+id).val();
		var contact_id = $('#contact_id_'+id).val();
		//alert(mobile);alert(contact_id);die();	
		if(mobile!='')
		{
 			$.ajax({
 			   	type: "POST",
 			   	url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/admin/Vendors/updatecontactmobile/",
 			   	data: { mobile : mobile , contact_id:contact_id},
			   	success: function(data)
 			   	{
  					$(".mobile_form_"+id).hide();
            		$(".mobile_edit_"+id).empty();
            		$(".mobile_edit_"+id).append(mobile);
            		$(".mobile_edit_"+id).removeAttr("style");
            		$(".mobile_edit_"+id).show();
            		$(".contact_mobile").show();
  			  	}
  			});
		}return false;    
	});
});
</script>


<!-- Update Contact Email -->

<script>
$(document).ready(function() {
  
	$(".email").click(function(){
	  	id = $(this).attr('id');
		$(".email_form_"+id).show();
		$(".email_edit_"+id).hide();
	});

    
	$(".cancle_contact_email").click(function(){
		id = $(this).attr('id');
		$(".email_form_"+id).hide();
		$(".email_edit_"+id).show(); 
	});   

	$('.submit_contact_email').click(function(){
		id = $(this).attr('id');
		var email = $('#contact_email_'+id).val();
		var contact_id = $('#contact_id_'+id).val();
		//alert(email);alert(contact_id);die();	
		if(email!='')
		{
 			$.ajax({
 			   	type: "POST",
 			   	url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/admin/Vendors/updatecontactemail/",
 			   	data: { email : email , contact_id:contact_id},
			
 			   	success: function(data)
 			   	{
  					$(".email_form_"+id).hide();
            		$(".email_edit_"+id).empty();
            		$(".email_edit_"+id).append(email);
            		$(".email_edit_"+id).removeAttr("style");
            		$(".email_edit_"+id).show();
            		$(".contact_email").show();
  			  	}
  			});
		}return false;    
	});
});
</script>



<!-- Update Contact Address -->

<script>
$(document).ready(function() {
  
	$(".address").click(function(){
	  	id = $(this).attr('id');
		$(".address_form_"+id).show();
		$(".address_edit_"+id).hide();
	});

    
	$(".cancle_contact_address").click(function(){
		id = $(this).attr('id');
		$(".address_form_"+id).hide();
		$(".address_edit_"+id).show(); 
	});   

	$('.submit_contact_address').click(function(){
		id = $(this).attr('id');
		var address = $('#contact_address_'+id).val();
		var contact_id = $('#contact_id_'+id).val();
		//alert(address);alert(contact_id);die();	
		if(address!='')
		{
 			$.ajax({
 			   	type: "POST",
 			   	url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/admin/Vendors/updatecontactaddress/",
 			   	data: { address : address , contact_id:contact_id},
			
 			   	success: function(data)
 			   	{
  					$(".address_form_"+id).hide();
            		$(".address_edit_"+id).empty();
            		$(".address_edit_"+id).append(address);
            		$(".address_edit_"+id).removeAttr("style");
            		$(".address_edit_"+id).show();
            		$(".contact_address").show();
  			  	}
  			});
		}return false;    
	});
});
</script>


<!-- Update Contact Address2 -->

<script>
$(document).ready(function() {
  
	$(".address2").click(function(){
	  	id = $(this).attr('id');
		$(".address2_form_"+id).show();
		$(".address2_edit_"+id).hide();
	});

    
	$(".cancle_contact_address2").click(function(){
		id = $(this).attr('id');
		$(".address2_form_"+id).hide();
		$(".address2_edit_"+id).show(); 
	});   

	$('.submit_contact_address2').click(function(){
		id = $(this).attr('id');
		var address2 = $('#contact_address2_'+id).val();
		var contact_id = $('#contact_id_'+id).val();
		//alert(address2);alert(contact_id);die();	
		if(address2!='')
		{
 			$.ajax({
 			   	type: "POST",
 			   	url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/admin/Vendors/updatecontactaddress2/",
 			   	data: { address2 : address2 , contact_id:contact_id},
			
 			   	success: function(data)
 			   	{
  					$(".address2_form_"+id).hide();
            		$(".address2_edit_"+id).empty();
            		$(".address2_edit_"+id).append(address2);
            		$(".address2_edit_"+id).removeAttr("style");
            		$(".address2_edit_"+id).show();
            		$(".contact_address2").show();
  			  	}
  			});
		}return false;    
	});
});
</script>


<!-- Update Contact City -->

<script>
$(document).ready(function() {
  
	$(".city").click(function(){
	  	id = $(this).attr('id');
		$(".city_form_"+id).show();
		$(".city_edit_"+id).hide();
	});

    
	$(".cancle_contact_city").click(function(){
		id = $(this).attr('id');
		$(".city_form_"+id).hide();
		$(".city_edit_"+id).show(); 
	});   

	$('.submit_contact_city').click(function(){
		id = $(this).attr('id');
		var city = $('#contact_city_'+id).val();
		var contact_id = $('#contact_id_'+id).val();
		//alert(city);alert(contact_id);die();	
		if(city!='')
		{
 			$.ajax({
 			   	type: "POST",
 			   	url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/admin/Vendors/updatecontactcity/",
 			   	data: { city : city , contact_id:contact_id},
			
 			   	success: function(data)
 			   	{
  					$(".city_form_"+id).hide();
            		$(".city_edit_"+id).empty();
            		$(".city_edit_"+id).append(city);
            		$(".city_edit_"+id).removeAttr("style");
            		$(".city_edit_"+id).show();
            		$(".contact_city").show();
  			  	}
  			});
		}return false;    
	});
});
</script>

<!-- Update Contact State -->

<script>
$(document).ready(function() {
  
	$(".state").click(function(){
	  	id = $(this).attr('id');
		$(".state_form_"+id).show();
		$(".state_edit_"+id).hide();
	});

    
	$(".cancle_contact_state").click(function(){
		id = $(this).attr('id');
		$(".state_form_"+id).hide();
		$(".state_edit_"+id).show(); 
	});   

	$('.submit_contact_state').click(function(){
		id = $(this).attr('id');
		var state = $('#contact_state_'+id).val();
		var contact_id = $('#contact_id_'+id).val();
		//alert(state);alert(contact_id);die();	
		if(state!='')
		{
 			$.ajax({
 			   	type: "POST",
 			   	url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/admin/Vendors/updatecontactstate/",
 			   	data: { state : state , contact_id:contact_id},
			
 			   	success: function(data)
 			   	{
  					$(".state_form_"+id).hide();
            		$(".state_edit_"+id).empty();
            		$(".state_edit_"+id).append(state);
            		$(".state_edit_"+id).removeAttr("style");
            		$(".state_edit_"+id).show();
            		$(".contact_state").show();
  			  	}
  			});
		}return false;    
	});
});
</script>

<!-- Update Contact Zip -->

<script>
$(document).ready(function() {
  
	$(".zip").click(function(){
	  	id = $(this).attr('id');
		$(".zip_form_"+id).show();
		$(".zip_edit_"+id).hide();
	});

    
	$(".cancle_contact_zip").click(function(){
		id = $(this).attr('id');
		$(".zip_form_"+id).hide();
		$(".zip_edit_"+id).show(); 
	});   

	$('.submit_contact_zip').click(function(){
		id = $(this).attr('id');
		var zip = $('#contact_zip_'+id).val();
		var contact_id = $('#contact_id_'+id).val();
		//alert(zip);alert(contact_id);die();	
		if(zip!='')
		{
 			$.ajax({
 			   	type: "POST",
 			   	url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/admin/Vendors/updatecontactzip/",
 			   	data: { zip : zip , contact_id:contact_id},
			
 			   	success: function(data)
 			   	{
  					$(".zip_form_"+id).hide();
            		$(".zip_edit_"+id).empty();
            		$(".zip_edit_"+id).append(zip);
            		$(".zip_edit_"+id).removeAttr("style");
            		$(".zip_edit_"+id).show();
            		$(".contact_zip").show();
  			  	}
  			});
		}return false;    
	});
});
</script>

<!-- Update Contact Notes -->

<script>
$(document).ready(function() {
  
	$(".notes").click(function(){
	  	id = $(this).attr('id');
		$(".notes_form_"+id).show();
		$(".notes_edit_"+id).hide();
	});

    
	$(".cancle_contact_notes").click(function(){
		id = $(this).attr('id');
		$(".notes_form_"+id).hide();
		$(".notes_edit_"+id).show(); 
	});   

	$('.submit_contact_notes').click(function(){
		id = $(this).attr('id');
		var notes = $('#contact_notes_'+id).val();
		var contact_id = $('#contact_id_'+id).val();
		//alert(notes);alert(contact_id);die();	
		if(notes!='')
		{
 			$.ajax({
 			   	type: "POST",
 			   	url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/admin/Vendors/updatecontactnotes/",
 			   	data: { notes : notes , contact_id:contact_id},
			
 			   	success: function(data)
 			   	{
  					$(".notes_form_"+id).hide();
            		$(".notes_edit_"+id).empty();
            		$(".notes_edit_"+id).append(notes);
            		$(".notes_edit_"+id).removeAttr("style");
            		$(".notes_edit_"+id).show();
            		$(".contact_notes").show();
  			  	}
  			});
		}return false;    
	});
});
</script>



<!-- Add New Portal User -->

<script>
$(document).ready(function() {
	
	$('#addnewportaluser').click(function(){	
		function randomString(len, an){
		    an = an&&an.toLowerCase();
		    var str="", i=0, min=an=="a"?10:0, max=an=="n"?10:62;
		    for(;i++<len;){
		      var r = Math.random()*(max-min)+min <<0;
		      str += String.fromCharCode(r+=r>9?r<36?55:61:48);
		    }
		    return str;
		}	
		var user_id = $("#user_id").text();
		var firstname = $("#firstname").text();
		var lastname = $("#lastname").text();
		var login = randomString(8);
		//alert(firstname);alert(lastname);alert(user_id); alert(login); die();
		$.ajax({
 			type: "POST",
 			url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/admin/PortalUsers/addNewPortalUser/",
 			data: { user_id : user_id , firstname : firstname , lastname : lastname , login : login},
			
 			success: function(data)
 			{
 				window.location.reload();
  			}
  		});
		return false;    
	});
});
</script>


<!-- Update Portal User Customer-->

<script>
$(document).ready(function() {
  
  $(document).on('click', '.customer', function() {  
      id = $(this).attr('id');
      $(".customer_form_"+id).show();
      $(".customer_edit_"+id).hide();
  });

  $(document).on('focusout', '.select_customer', function() {
      $(".customer_form").hide();
      $(".customer").show();
  });


    
  $(document).on('change', '.select_customer', function() {
      var customer=$(this).val();
      id = $(this).attr('id');
      var portaluser_id = $('#id_'+id).val();
      //alert(portaluser_id);alert(customer);die();
      
         $.ajax({
         type: "POST",
         url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/admin/PortalUsers/updatecustomer/",

        // url: "search.php",
         data: { customer : customer , portaluser_id:portaluser_id},
      
         success: function(data)
         {
            $(".customer_form_"+id).hide();
            $(".customer_edit_"+id).empty();
            $(".customer_edit_"+id).append(customer);
            $(".customer_edit_"+id).show();
            $(".customer").show();
           
          //  $('#newDiv').html(jQuery(data).find('.result').html()); 
          }
          });
        
  });
});
</script>


<!-- Update Portal User Login-->

<script>
$(document).ready(function() {
  
	$(".login").click(function(){
	  	id = $(this).attr('id');
		$(".login_form_"+id).show();
		$(".login_edit_"+id).hide();
	});

    
	$(".cancle_login").click(function(){
		id = $(this).attr('id');
		$(".login_form_"+id).hide();
		$(".login_edit_"+id).show(); 
	});   

	$('.submit_login').click(function(){
		id = $(this).attr('id');
		var login = $('#portaluser_login_'+id).val();
		var portaluser_id = $('#portaluser_id_'+id).val();
		//alert(login);alert(portaluser_id);die();	
		if(login!='')
		{
		   	$.ajax({
		   		type: "POST",
		   		url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/admin/PortalUsers/updatelogin/",
		   		data: { login : login , portaluser_id:portaluser_id},
	
		   		success: function(data)
		   		{
					$(".login_form_"+id).hide();
    				$(".login_edit_"+id).empty();
    				$(".login_edit_"+id).append(login);
    				$(".login_edit_"+id).removeAttr("style");
    				$(".login_edit_"+id).show();
    				$(".login").show();
		  		}
		  	});
		}return false;    
	});
});
</script>


<!-- Portal User Advance Data -->

<script>

$(document).ready(function() {

	$('.portaluser_advanced_btn').click(function(){
		id = $(this).attr('id');
		$(".portaluser_advanced_"+id).toggle();
	});

	
});

</script>
<script>
$(document).ready(function() {

	$('.portal_user_btn').click(function(){
		id = $(this).attr('id');
		var pass1 = $('#password_'+id).val();
	    var pass2 = $('#confirm_password_'+id).val();
	    var portaluser_id = $('#portaluser_id_'+id).val();
	    // alert(portaluser_id);
	    if(pass1==pass2){
	    	if(portaluser_id!='')
			{
			   	$.ajax({
			   		type: "POST",
			   		url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/admin/PortalUsers/updatepassword/",
			   		data: { password : pass1 , confirm_password:pass2 , portaluser_id : portaluser_id},
		
			   		success: function(data)
			   		{
						alert("Password was updated!");
						$(".portaluser_advanced_"+id).toggle();
			  		}
			  	});
			}return false; 
	        
	    }else{
	        alert("Password confirmation doesn't match Password");
	    }
	});

	
});
</script>


<script>
$(document).ready(function() {

  $(document).on('click', '.status', function() {  
        id = $(this).attr('id');
        var status = $(this).text();
        var rem_id = $("#id_"+id).val();
        //alert(rem_id);die();
        if(status=="Reactive")
        {
          $(this).hide();
          
          $.ajax({
                  type: "POST",
                  url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/admin/Reminders/statusupdate/",

                  data: { status : status , rem_id:rem_id},
      
                  success: function(data)
                  {
                    $(".clear_status_"+id).show();
                  }
          });
        }
        else
        {
          $(this).hide();          
          $.ajax({
                  type: "POST",
                  url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/admin/Reminders/statusupdate/",

                  data: { status : status , rem_id:rem_id},
      
                  success: function(data)
                  {
                    $(".reactive_status_"+id).show();
                  }
          });
        }
  });
});


</script>