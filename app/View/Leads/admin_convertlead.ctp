<?php echo $this->Flash->render('positive'); ?>
<div class="warper container-fluid"> 
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                
                <div class="panel-body">
                	<div class="widget-content">
							<div class="col-xs-6 ">
								<h3>Convert Lead into a Customer and/or Ticket</h3>
								<span style="color: gray;">
								<em>Lead created at <?php echo  $created = date('D d-m-Y g:i A',strtotime($Lead['Lead']['created'])); ?> </em>
								</span>
							</div>
							<div class="col-xs-6 text-right">
								

								<?php echo $this->Html->link('<p class="btn btn-default btn-sm">Back</p>',array('controller' => 'Leads', 'action' => 'leadlist'),array('escape'=>false));?>

                                <?php echo $this->Html->link('<p class="btn btn-danger btn-sm">Delete</p>',array('controller' => 'Leads', 'action' => 'deleteLead',$Lead['Lead']['id']),array('escape'=>false,'confirm' => 'Are you sure you wish to delete this Lead?'));?>

								<a class="btn btn-sm btn-warning btn-sm" href="#" >FAQ</a>
								<br><br>
								
							</div>
							
					</div>
				</div>
			</div>  
		</div>
	</div>
      
    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-white">
                <div class="well">
                <h3 class="mbm">Convert/Attach this Lead to a Customer</h3>
					<hr>



					<ul role="tablist" class="nav nav-tabs" id="myTab">
                      	<li class="active"><a data-toggle="tab" role="tab" href="#home">New Customer</a></li>
                      	<li><a data-toggle="tab" role="tab" href="#home1">    Attach to Existing</a></li>
                 	</ul>
  

                 	<div class="tab-content" id="myTabContent">
                     	<div id="home" class="tab-pane tabs-up fade in active panel panel-default">
                     	<?php if($userid==''){?>
                      		<div class="panel-body">

                       			<?php echo $this->Form->create('Lead',array('controller'=>'Leads','action'=>'newUser','id'=>'newUser')); ?>
					
								<div class="row">                 
			                    <div class="col-xs-12 col-sm-12">
						 			<div class="form-group">
			                   		<?php echo $this->Form->input('Lead.first_name', array('div'=>false,'class'=>'form-control','placeholder' => "First Name",'label'=>'First Name', 'id'=>'first_name' , 'name'=>'User[first_name]','required'=>'required')); ?>
									</div>
			                    </div>
			                	</div>
								          
							
								<div class="row">                 
				                    <div class="col-xs-12 col-sm-12">
										<div class="form-group">
				                 		<?php echo $this->Form->input('Lead.last_name', array('div'=>false,'class'=>'form-control','placeholder' => "Last Name",'required'=>'required','label'=>'Last Name','id'=>'last_name','name'=>'User[last_name]')); ?>
										</div>
				                    </div>
				                </div>

				                <div class="row">                 
				                    <div class="col-xs-12 col-sm-12">
										<div class="form-group">
				                 		<?php echo $this->Form->input('Lead.business_name', array('div'=>false,'class'=>'form-control','placeholder' => "Business Name",'required'=>'required', 'name'=>'User[business_name]')); ?>
										</div>
				                    </div>
				                </div>

				                <div class="row">                 
				                    <div class="col-xs-12 col-sm-12">
										<div class="form-group">
				                 		<?php echo $this->Form->input('Lead.phone', array('div'=>false,'class'=>'form-control','placeholder' => "Phone",'required'=>'required','label'=>'Phone', 'name'=>'Phone[phone_number]')); ?>
										</div>
				                    </div>
				                </div>
				                
				                <div class="row">                 
				                    <div class="col-xs-12 col-sm-12">
										<div class="form-group">
				                 		<?php echo $this->Form->input('Lead.email', array('div'=>false,'class'=>'form-control','placeholder' => "Email",'required'=>'required','label'=>'Email', 'name'=>'User[email]')); ?>
										</div>
				                    </div>
				                </div>



				                <div class="row">                 
				                    <div class="col-xs-12 col-sm-12">
										<div class="form-group">
				                 		<?php echo $this->Form->input('User.mobile', array('div'=>false,'class'=>'form-control','required'=>'required','label'=>'Mobile Phone', 'name'=>'Phone[phone_number]')); ?>
										</div>
				                    </div>
				                </div>


				                <div class="row">                 
				                    <div class="col-xs-12 col-sm-12">
										<div class="form-group">
				                 		<?php echo $this->Form->input('User.address', array('div'=>false,'class'=>'form-control','required'=>'required','label'=>'Address', 'name'=>'Address[address]')); ?>
										</div>
				                    </div>
				                </div>


				                <div class="row">                 
				                    <div class="col-xs-12 col-sm-12">
										<div class="form-group">
				                 		<?php echo $this->Form->input('User.city', array('div'=>false,'class'=>'form-control','required'=>'required','label'=>'City', 'name'=>'Address[city]')); ?>
				                 		<?php echo $this->Form->input('Lead.lead_id', array('type'=>'hidden','class'=>'form-control' ,'value'=>$Lead['Lead']['id'])); ?>
										</div>
				                    </div>
				                </div>


				                <div class="row">                 
				                    <div class="col-xs-12 col-sm-12">
										<div class="form-group">
				                 		<?php echo $this->Form->input('User.state', array('div'=>false,'class'=>'form-control','required'=>'required','label'=>'State/County', 'name'=>'Address[country]')); ?>
										</div>
				                    </div>
				                </div>

				                <div class="row">                 
				                    <div class="col-xs-12 col-sm-12">
										<div class="form-group">
				                 		<?php echo $this->Form->input('User.zip', array('div'=>false,'class'=>'form-control','required'=>'required','label'=>'Zip/Postal Code', 'name'=>'Address[zip]')); ?>
										</div>
				                    </div>
				                </div>

							
								<div class="row">                 
									<div class="col-xs-12 col-sm-12">
									<hr class="dotted">	
										<div class="btn-group">
											<?php echo $this->Form->button('Create Customer', array('class' => 'btn btn-success pull-left')); ?>
										</div>
									</div>
								</div>		
				    			<?php echo $this->Form->end(); ?>
                       		</div>
                       	<?php }else{?>




                       		<div class="panel-body">
     							<div>
     								<h3 class="alert alert-info"><?php echo $user['User']['first_name'].' '.$user['User']['last_name']." is a Customer";?>&nbsp;&nbsp;<?php echo $this->Html->link('<p class="btn btn-default btn-sm">View</p>',array('controller'=>'Users','action'=>'userview',$userid),array('escape'=>false));?></h3>
     							</div>
							
								<div class="row">                 
				                    <div class="col-xs-12 col-sm-12">
										<div class="form-group">
				                 		<b>Customer :   </b><?php echo $user['User']['first_name'];?><br>
				                 		<b>Email :   </b><?php echo $user['User']['email'];?><br>
				                 		<b>Mobile:    </b><?php echo $user['User']['phone_number'];?><br>
				                 		<b>Address :   </b><?php echo $user['User']['address'];?><br>
				                 		
										</div>
				                    </div>
				                </div>

                       		</div>
                       		<?php }?>



                      	</div>

					    <div id="home1" class="tab-pane tabs-up fade panel panel-default">
					        <div class="panel-body">
					        <?php echo $this->Form->create('Lead',array('controller'=>'Leads','action'=>'existingUser','id'=>'existingUser')); ?>
					            <h3 class="mts">Enter the customer name to lookup an existing customer</h3>
					            <?php echo $this->Form->input('Lead.name', array('div'=>false,'class'=>'form-control','placeholder' => "Start typing the customer's name",'id'=>'get_data','required'=>'required','label'=>'Customer Name')); ?>
					            <?php echo $this->Form->input('Lead.lead_id', array('type'=>'hidden','class'=>'form-control' ,'value'=>$Lead['Lead']['id'])); ?>
                 				<div id="result"></div>
                 				<div class="row">                 
									<div class="col-xs-12 col-sm-12">
									<hr class="dotted">	
										<div class="btn-group">
											<?php echo $this->Form->button('Attach to Customer', array('class' => 'btn btn-success pull-left')); ?>
										</div>
									</div>
								</div>
							<?php echo $this->Form->end(); ?>
					        </div>
					    </div>
					</div>
						
				</div>
			</div>
		</div>


		<div class="col-md-8">
            <div class="panel panel-white">
                <div class="well">
 					<ul role="tablist" class="nav nav-tabs" id="myTab1">
	                    <li class="active"><a data-toggle="tab" href="#process">Process as Ticket</a></li>
						<li class=""><a data-toggle="tab" href="#opportunity">Sales Funnel</a></li>
						<li class=""><a data-toggle="tab" href="#appointments">Appointments</a></li>
						<li class=""><a data-toggle="tab" href="#attachments">Attachments</a></li>
						<li class=""><a data-toggle="tab" href="#emails">Emails</a></li>
						<li class=""><a data-toggle="tab" href="#merge">Merge</a></li>

                 	</ul>

                	<div class="tab-content" id="myTabContent">
	                	<div id="process" class="tab-pane tabs-up fade in active panel panel-default">
	                    	<div class="panel-body">
	                    		<h3 class="mbs">Convert this Lead to a Ticket (and Customer)</h3>
	                    		<hr>
	                    		<h4>Ticket Details</h4>
	                    		<?php 
	                    		if($ticketid==''){
	                    		?>
	                    		<?php echo $this->Form->create('Leads',array('controller'=>'Leads','action'=>'newTicket','id'=>'newTicket')); ?>
					
								<div class="row">                 
			                    <div class="col-xs-12 col-sm-12">
									<div class="form-group">
										<?php echo $this->Form->input('Lead.issue_type', array('options' => array('NULL' => '', 'virus' => 'Virus','tuneup' => 'TuneUp','software' => 'Software','other'=>'Other'),'class'=>'form-control','label'=>'Ticket problem type:','name'=>'Ticket[type]')); ?>
			                   		
									</div>
			                    </div>
			                	</div> 
								          
							
								<div class="row">                 
				                    <div class="col-xs-12 col-sm-12">
										<div class="form-group">
				                 		<?php echo $this->Form->input('Lead.subject', array('div'=>false,'class'=>'form-control','required'=>'required','label'=>'Ticket subject:','id'=>'subject','name'=>'Ticket[title]')); ?>
										</div>
				                    </div>
				                </div><br>
				                Initial Public Comment<br><br>
				                <div class="row">                 
				                    <div class="col-xs-12 col-sm-12">
										<div class="form-group">
				                 		<?php echo $this->Form->input('Lead.description', array('div'=>false,'class'=>'form-control','required'=>'required','label'=>'Ticket description:','name'=>'Ticket[description]')); ?>
				                 		<?php echo $this->Form->input('Lead.status', array('type'=>'hidden','class'=>'form-control','required'=>'required','name'=>'Ticket[status]','value'=>'New')); ?>
				                 		<?php echo $this->Form->input('Lead.userid', array('type'=>'hidden','class'=>'form-control','required'=>'required','name'=>'Ticket[user_id]','value'=>$userid)); ?>
				                 		<?php echo $this->Form->input('Lead.first_name', array('type'=>'hidden','class'=>'form-control', 'name'=>'User[first_name]','required'=>'required')); ?>
				                 		<?php echo $this->Form->input('Lead.last_name', array('type'=>'hidden','class'=>'form-control', 'name'=>'User[last_name]','required'=>'required')); ?>
				                 		<?php echo $this->Form->input('Lead.email', array('type'=>'hidden','class'=>'form-control', 'name'=>'User[email]','required'=>'required')); ?>
				                 		<?php echo $this->Form->input('Lead.lead_id', array('type'=>'hidden','class'=>'form-control' ,'name'=>'Ticket[lead_id]','value'=>$Lead['Lead']['id'])); ?>
 
										</div>
				                    </div>
				                </div>

				                <div class="row">                 
				                    <div class="col-xs-12 col-sm-12">
									<div class="form-group">
									<label>Assigned User:</label>
				                 		<div class="assignee">
										<span data-bip-skip-blur="true" id="assignee" class="best_in_place assignee_ rec_"> <?php echo $assignee = $Lead['Lead']['assignee'];?></span>
                                        </div>
                                        <div style="display:none;" class="assignee_edit" id="" >
                                 			<P class="place">
                                    			<select  id="" class="select_assignee form-control" >
		                                      	<option> None </option>
		                                      	<option><?php echo $user_first_name;?></option>
		                                      
                                   				</select>
                                    			<input type="hidden"  id="id" value="<?php echo $Lead['Lead']['id'];?>">
											</p>
                                		</div>
                                        	
									</div>
				                    </div>
				                </div>
				                <hr>
				                
				                <div class="row">                 
				                    <div class="col-xs-6 col-sm-6">
										<div class="form-group">
				                 		<?php echo $this->Form->input('Lead.note', array('div'=>false,'class'=>'form-control','label'=>' Notes:','name'=>'Ticket[notes]')); ?>
										</div>
				                    </div>
				                    <?php if($userid==''){?>
				                    <div class="col-xs-6 col-sm-6">
									<div class="btn-group">
											<?php echo $this->Form->submit('Create Customer & Ticket', array('class' => 'btn btn-success pull-right', 'id'=>'newTicket' )); ?>
									</div>
									</div>
									<?php }else {?>
									<div class="col-xs-6 col-sm-6">
									<div class="btn-group">
											<?php echo $this->Form->submit('Create Ticket', array('class' => 'btn btn-success pull-right', 'id'=>'newTicket' )); ?>
									</div>
									</div>
									<?php }?>
				                </div>
				               				                  		
				    			<?php echo $this->Form->end(); ?>
                       			<?php }
                       			else {?>
                       				<div class="col-xs-12 col-sm-12">
									<div class="btn-group">
										<h4 style="align-content: center;">Lead already converted To Ticket</h4>
									</div>
									</div>

                       			<?php }?>
	                   		</div>
	                	</div>

						<div id="opportunity" class="tab-pane tabs-up fade panel panel-default">
							<div class="panel-body">
						        <h3>Sales Funnel:</h3>
						        <table id="example" class="display table"> 
									<thead> </thead>
									<tbody>
									<tr>
										<td>Status</td>
										<td>
										<div class="status">
                                  			<span data-bip-skip-blur="true" id="" class="best_in_place status_ rec_"> <?php echo $status = $Lead['Lead']['status'];?>
                                        	</span>                                      
                                		</div>
                                		<div style="display:none;" class="status_edit" id="" >
                                 			<form class="place" action="javascript:void(0);">
                                    		<select  id="" class="select_ form-control" >
		                                      <option> New </option>
		                                      <option>Lead</option>
		                                      <option>First Contact</option>
		                                      <option>Opportunity</option>
		                                      <option>Prospect</option>
		                                      <option>Waiting on Client</option>
		                                      <option>In Negotiation</option>
		                                      <option>In Pending</option>
		                                      <option>Won</option>
		                                      <option>Lost</option>
                                   			</select>
                                    	<input type="hidden"  id="id" value="<?php echo $Lead['Lead']['id'];?>">

                                         
                                  		</form>
                                		</div>

                                		</td>
									</tr>
									<tr>
										<td>Assignee</td>
										<div class="assignee">
										<td><span data-bip-skip-blur="true" id="assignee" class="best_in_place assignee_ rec_"> <?php echo $assignee = $Lead['Lead']['assignee'];?>
								
                                        	</span>
                                        	</div>
                                        	<div style="display:none;" class="assignee_edit" id="" >
                                 			<form class="place" action="javascript:void(0);">
                                    		<select  id="" class="select_assignee form-control" >
		                                      <option> None </option>
		                                      <option><?php echo $user_first_name;?></option>
		                                      
                                   		</select>
                                    		<input type="hidden"  id="id" value="<?php echo $Lead['Lead']['id'];?>">

                                        
                                  		</form>
                                		</div>
                                        	</td>
									</tr>
									<tr>
										<td>Estimated Value</td>
										<td></td>
									</tr>
									<tr>
										<td>Estimated Likelihood of Closing</td>
										<td></td>
									</tr>
									<tr>
										<td>Start Date</td>
										<td></td>
									</tr>
									</tbody>
								</table>
							</div>
						</div>
						<div id="appointments" class="tab-pane tabs-up fade panel panel-default">
                			<div class="panel-body">
                				<h3>Appointments:</h3>
                				<a class="pull-right btn btn-default btn-sm" data-toggle="modal" href="#myModal" id='NewAppointment'>New Appointment</a><br><br>              				
                				<div class="table-responsive">
                				<table id="example" class="display table">

									<thead>
									<tr>
									<th>Details</th> 
									<th></th>
									
									</tr>
									</thead>
									<tbody>
									<?php foreach($Appointment as $app) {?>
									<tr>
									<td>
									<?php $app_id= $app['Appointment']['id'];?>
									<?php $owner= "Apt Owner: ".$app['Appointment']['owner'];?>
									<?php $summary= ucfirst($app['Appointment']['summary']);?>
									<?php $start_at= "Appointment: ".date('D d-m-Y g:i A',strtotime($app['Appointment']['start_at'])).' - '.$summary;?>


									<?php echo $this->Html->link($start_at,array('controller'=>'Appointments','action'=>'appointmentdetails',$app_id),array('data-toggle'=>'tooltip','data-placement'=>'top','title'=>$owner,'escape'=>false));?>
									</td>

									<td>						 
									 <?php echo $this->Html->link('<i class="btn btn-warning btn-sm fa fa-check-square-o"></i>',array('controller'=>'Appointments','action'=>'appointmentedit',$app_id),array('escape'=>false));?>

									  <?php echo $this->Html->link('<i class="btn btn-danger btn-sm fa fa-times"></i>',array('controller'=>'Appointments','action'=>'deleteAppointment',$app_id),array('escape'=>false,'confirm' => 'Are you sure you wish to delete this Appointment?'));?>
									</td>
									</tr>
									<?php } ?> 			
									</tbody>
								</table>
								</div>		
                   				
					
									

                				



								<!-- Modal -->   
								<div class="modal fade" id="myModal" role="dialog">
								<div class="modal-dialog">
								<!-- Modal content-->
									<div class="modal-content">
									<div class="modal-header">
									    <button type="button" class="close" data-dismiss="modal">&times;</button>
									    <h4 class="modal-title">New Appointment</h4>
									</div>
									<div class="modal-body">
									<div id="appointment" > 
									<?php echo $this->Form->create('Leads',array('controller'=>'Leads','action'=>'appointment')); ?> 


									    <div class="row">                 
	                    				<div class="col-xs-12 col-sm-12">
										<div class="form-group">
	                   						<?php echo $this->Form->input('Appointment.customer_name', array('div'=>false,'class'=>'form-control','placeholder' => "Customer Name",'label'=>'Customer Name', 'id'=>'customer_name' )); ?>
	                   						<?php echo $this->Form->input('Appointment.lead_id', array('type'=>'hidden','class'=>'form-control', 'value'=>$Lead['Lead']['id'] )); ?>
										</div>
	                    				</div>
	                					</div>
	                					<div class="row">                 
	                    				<div class="col-xs-12 col-sm-12">
										<div class="form-group">
	                   						<?php echo $this->Form->input('Appointment.summary', array('div'=>false,'class'=>'form-control','placeholder' => "Summary",'label'=>'Summary','id'=>'summary')); ?>
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
	                   						<?php echo $this->Form->input('Appointment.user_id', array('type'=>'hidden','class'=>'form-control','value'=>$userid)); ?>
	                   						<?php echo $this->Form->input('Appointment.ticket_id', array('type'=>'hidden','class'=>'form-control','value'=>$ticketid)); ?>
										</div>
	                    				</div>
	                					</div>
										<div class="row">  
										<div class="col-xs-12 col-sm-12">
										<div class="form-group">

                                     		
                                    			<label>Appointment Starting Time</label>
						                    	<div class='input-group date' id="datetimepicker1" >
						                        <?php echo $this->Form->input('Appointment.start_at', array('class'=>'form-control','div'=>false, 'label'=>false)); ?>
						                        	<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
						                    	</div>
                                		
                            
										</div>
                						</div>
										</div>
										<div class="row">  
										<div class="col-xs-12 col-sm-12">
											<div class="form-group">
												
												<label>Appointment Ending Time</label>
						                    	<div class='input-group date' id="datetimepicker2" >
						                        <?php echo $this->Form->input('Appointment.end_at', array('class'=>'form-control','div'=>false, 'label'=>false)); ?>
						                        	<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
						                    	</div>
											
											</div>
					                    </div>
										</div>
										<div class="row">  
											<div class="col-xs-12 col-sm-12">
												<div class="form-group">
												<div id="session_id" style="display: none;"><?php echo $session_id = $this->Session->read('User_id');?>
												</div>
												
												<label>Appointment Owner</label><br>	
													<input type='hidden' name="Appointment[owner]" id="owner" value=""/>

													<select  class="select optional form-control" >
														<option class="session_email" selected="selected"></option>
													</select>
												</div>
					                    	</div>
										</div>
										<div class="row">  
											<div class="col-xs-12 col-sm-12">
												<div class="form-group">
												<label>Attendees</label>					
												<input type='hidden' name="Appointment[attendees]" id="attendees" value=""/>
												<select class="form-control select optional" >
													<option class="session_email1" selected="selected"></option>
												</select>			

  
					                    		</div>
					                    	</div>
																				
										</div>
				  
										<div class="row">  
										<hr class="dotted">	
											<div class="col-xs-12 col-sm-4">
												<div class="form-group">
													<a class="btn btn-default btn-sm" href="">View Calendar (new window)</a>
												</div>
						                   	</div>
						                   	<div class="col-xs-12 col-sm-4">
												<div class="form-group">
													
												</div>
						                   	</div>
						                   	<div class="col-xs-12 col-sm-4">
											
											<div class="btn-group">
												<?php echo $this->Form->button("Create Appointment", array('class' => 'btn btn-success pull-left','id'=>"submitButton", 'onclick'=>"sendForm()")); ?>
											</div>
											</div>
										</div>

										                		
				    					<?php echo $this->Form->end(); ?>
									</div>
									</div>
									</div>
									      
								</div>
								</div>  

               				</div>
	                	</div>

						<div id="attachments" class="tab-pane tabs-up fade panel panel-default">
							<div class="panel-body">
						        <h3>Attachments:</h3>
						        <a class="pull-right btn btn-default btn-sm" data-toggle="modal" href="#myAttachment" id='NewAppointment'>New Attachment</a><br><br>  



						        <div class="table-responsive">
                				<table id="example" class="display table">

									<thead>
									<tr>
									<th>Created</th> 
									<th>File</th>
									<th></th>
									</tr>
									</thead>
									<tbody>
									<?php $path = "attachment/";	?> 
									<?php foreach($Attachment as $app) {
										$file_name= $app['Attachment']['file'];
										$img = "$path"."$file_name";
										?>
									<tr>
									<td>
									<?php $id= $app['Attachment']['id'];?>
									<?php echo $start_at= date('D d-m-Y g:i A',strtotime($app['Attachment']['created']));?>

									
									</td>
									<td>
									<?php echo $this->Html->image($img, array('alt' => 'Image','width'=>'80px','height'=>'60px',"style"=>"border:2px solid #CCCCCC")); ?>
									
									<a target="_blank" href="http://whizna.com/img/attachment/<?php echo $file_name;?>"><?php echo $file_name= $app['Attachment']['file'];?></a>
									
									
									</td>

									<td>						 
									  <?php echo $this->Html->link('<i class="btn btn-danger btn-sm fa fa-times"></i>',array('action'=>'Leads','action'=>'deleteAttachment',$id,$Lead['Lead']['id'],$file_name),array('escape'=>false,'confirm' => 'Are you sure you wish to delete this Attachment?'));?>
									</td>
									</tr>
									<?php } ?> 			
									</tbody>
								</table>
								</div>	




						        <!-- Modal -->   
								<div class="modal fade" id="myAttachment" role="dialog">
								<div class="modal-dialog">
								<!-- Modal content-->
									<div class="modal-content">
									<div class="modal-header">
									    <button type="button" class="close" data-dismiss="modal">&times;</button>
									    <h4 class="modal-title">Upload File</h4>
									</div>
									<div class="modal-body">
									
									<div id="main-wrapper" class="container">
									
                
				                    <?php echo $this->Form->create('lead',array('controller'=>'Leads','action'=>'attachment','class'=>'validator-form','enctype' => 'multipart/form-data')); ?>

				                    
				                        
				                    <div class="row">  
				                           
				                    <div class="col-xs-12 col-sm-12">
										<div class="input-group">
												
												<span class="col-xs-5 col-sm-5">
										
												<label>Select one file:</label>&nbsp;&nbsp;&nbsp;
												</span>
												<span class="col-xs-1 col-sm-1"></span>

												<span class="btn btn-primary col-xs-6 col-sm-6">
                                           		
                                           		
                                            		<?php echo $this->Form->input('Lead.file', array('type'=>'file','class'=>'form-control','label'=>'Choose File','required'=>'required','style'=>"display: none;")); ?> 

                                            		<?php echo $this->Form->input('Lead.user_id', array('type'=>'hidden','class'=>'form-control','value'=>$userid)); ?>

	                   								<?php echo $this->Form->input('Lead.lead_id', array('type'=>'hidden','class'=>'form-control','value'=>$Lead['Lead']['id'])); ?>
                                            		
                                            	</span>&nbsp;&nbsp;&nbsp;

                                            	<span class="col-xs-12 col-sm-12"></span>
                                            	<span class="col-xs-12 col-sm-12" style="padding-right: 0;">
                                            	<?php echo $this->Form->submit('Upload', array('class' => 'btn btn-success pull-right', 'id'=>'newTicket' )); ?>
                                            	</span>
                                        </div>
                                    	
									</div>
									  
									
									<?php echo $this->Form->end(); ?> 



				                    </div>      
                					</div><!-- Main Wrapper -->

										                		
				    				
									
									</div>
									</div>
									      
								</div>
								</div>
								  

							</div>
						</div>
						<div id="emails" class="tab-pane tabs-up fade panel panel-default">
	                    	<div class="panel-body">
	                    		<h3>Emails:</h3>
	                    		<a class="pull-right btn btn-default btn-sm" data-toggle="modal" href="#myEmail" id='NewAppointment'>New Email</a><br><br>  
								<?php foreach($Email as $app) {?>
								<div class="mam well outbound">
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


						        <!-- Modal -->   
								<div class="modal fade" id="myEmail" role="dialog">
								<div class="modal-dialog">
								<!-- Modal content-->
									<div class="modal-content">
									<div class="modal-header">
									    <button type="button" class="close" data-dismiss="modal">&times;</button>
									    <h4 class="modal-title">Compose Email</h4>
									</div>
									<div class="modal-body">
									
									<div id="main-wrapper" class="container">
									<div class="row">                 
	                    			<div class="col-xs-12 col-sm-12">
									<?php echo $this->Form->create('lead',array('controller'=>'Leads','action'=>'newemail')); ?>

										<div class="row">                 
	                    				<div class="col-xs-12 col-sm-6">
										<div class="form-group">
	                   						<?php echo $this->Form->input('lead.email_from', array('div'=>false,'class'=>'form-control','placeholder'=>"From",'label'=>'From:','required'=>'required','id'=>'email')); ?>
	                   						<?php echo $this->Form->input('lead.user_id', array('type'=>'hidden','class'=>'form-control','value'=>$userid)); ?>
	                   						<?php echo $this->Form->input('lead.lead_id', array('type'=>'hidden','class'=>'form-control','value'=>$Lead['Lead']['id'])); ?>
	                   						<?php echo $this->Form->input('lead.user', array('type'=>'hidden','class'=>'form-control attendees')); ?>
										</div>
	                    				</div>
	                					</div>


	                					<div class="row">                 
	                    				<div class="col-xs-12 col-sm-6">
										<div class="form-group">
	                   						<?php echo $this->Form->input('lead.email_to', array('div'=>false,'class'=>'form-control','placeholder'=>"From",'label'=>'To:','required'=>'required','value'=>$Lead['Lead']['email'])); ?>
	                   						
										</div>
	                    				</div>
	                					</div>



	                					<div class="row cc-field" style="display: none;">                 
	                    				<div class="col-xs-12 col-sm-6">
										<div class="form-group">
	                   						<?php echo $this->Form->input('lead.cc', array('div'=>false,'class'=>'form-control','placeholder'=>"CC",'label'=>'CC:')); ?>
	                   						
										</div>
	                    				</div>
	                					</div>


	                					<div class="row bcc-field" style="display: none;">                 
	                    				<div class="col-xs-12 col-sm-6">
										<div class="form-group">
	                   						<?php echo $this->Form->input('lead.bcc', array('div'=>false,'class'=>'form-control','placeholder'=>"BCC",'label'=>'BCC:')); ?>
	                   						
										</div>
	                    				</div>
	                					</div>


	                					<div class="row">                 
	                    				<div class="col-xs-12 col-sm-6">
										<div class="form-group">
	                   						<?php echo $this->Form->input('lead.subject', array('div'=>false,'class'=>'form-control','placeholder'=>"Subject",'label'=>'Subject:','required'=>'required','value'=>'Re: '.$Lead['Lead']['subject'])); ?>
	                   						
										</div>
	                    				</div>
	                					</div>
	                					<div class="row">
										<div class="col-lg-1 col-md-1"> </div>
										<div class="col-lg-3 col-md-3">
										<a class="badge" onclick="$('.cc-field').toggle();; return false;" href="#">cc</a>
										<a class="badge" onclick="$('.bcc-field').toggle();; return false;" href="#">bcc</a>
										</div>
										</div>


	                					<div class="row">                 
	                    				<div class="col-xs-12 col-sm-6">
										<div class="form-group">
	                   						<?php echo $this->Form->input('lead.message', array('type'=>'textarea','class'=>'form-control','placeholder'=>"Email message...",'label'=>' ','required'=>'required')); ?>
	                   						
										</div>
	                    				</div>
	                					</div>

	                					<div class="row">
	                					<div class="col-md-6">
	                					<div class="form-group">
                							<?php echo $this->Form->submit('Send', array('class' => 'btn btn-sm btn-success pull-right', 'id'=>'newTicket' )); ?>
                						</div>
										</div>
										</div>

      								<?php echo $this->Form->end(); ?> 
      								</div>
      								</div>
                					</div><!-- Main Wrapper -->

										                		
				    				
									
									</div>
									</div>
									      
								</div>
								</div>
	                   		</div>
	                	</div>

						<div id="merge" class="tab-pane tabs-up fade panel panel-default">
							<div class="panel-body">
						        <h3 class="mbs">Merge This Lead</h3><br><hr>
						        
								<?php echo $this->Form->create('Leads',array('controller'=>'Leads','action'=>'merge')); ?>
					
								<div class="row">                 
				                    <div class="col-xs-12 col-sm-10">
										<div class="form-group">
				                 		<?php echo $this->Form->input('Lead.ticket_id', array('type'=>'text','class'=>'form-control','required'=>'required','label'=>'Merge into an existing ticket (by number):','name'=>'Ticket[ticket_id]')); ?>
				                 		<?php echo $this->Form->input('Lead.userid', array('type'=>'hidden','class'=>'form-control','required'=>'required','name'=>'Ticket[user_id]','value'=>$userid)); ?>
				                 		
				                 		<?php echo $this->Form->input('Lead.lead_id', array('type'=>'hidden','class'=>'form-control' ,'name'=>'Ticket[lead_id]','value'=>$Lead['Lead']['id'])); ?>
 
										</div>
				                    </div>
				                    <div class="col-xs-2 col-sm-2" style="margin-top: 22px;">
									<div class="btn-group">
											<?php echo $this->Form->submit('Merge', array('class' => 'btn btn-success pull-right' )); ?>
									</div>
									</div>
				                </div>

				                
				               				                  		
				    			<?php echo $this->Form->end(); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
$(document).ready(function() {
    
$('#lookup').click(function() {
	$('#error').show();
		});		
});
</script>
<script type="text/javascript">
$(document).ready(function(){
	$("#result").click(function(){
		$(this).hide();
	});
	$('#get_data').keyup(function(){

		var searchid = $(this).val();
		var dataString = searchid;
		//alert(dataString);
		$("#result").show();
		if(searchid!='')
		{
 			   $.ajax({
 			   type: "POST",
 			   url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/admin/Leads/lead/",

 			  // url: "search.php",
 			   data: { search : dataString },
			
 			   success: function(data)
 			   {
  				  $("#result").html(jQuery(data).find('.result').html()); 
  				//  $('#newDiv').html(jQuery(data).find('.result').html()); 
  			  }
  			  });
		}return false;    

	});
});
</script>

<script>
$(document).ready(function() {
  
$(".status_").click(function(){
$(".status_edit").show();
$(".status_").hide();


});

$('.status_edit').focusout(function(){
  $(".status_edit").hide();
  $(".status_").show();
});
    
$('.select_').change(function() {
var status=$(this).val();
var lead_id = $('#id').val();
   //alert(status);alert(lead_id);die();       
    if(status!='')
    {
         $.ajax({
         type: "POST",
         url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/admin/Leads/statusupdate/",

        // url: "search.php",
         data: { status : status , lead_id:lead_id},
      
         success: function(data)
         {
          //window.location.reload();
          //  $('#newDiv').html(jQuery(data).find('.result').html()); 
          	$(".status_edit").hide();
          	$(".status_").empty();
          	$(".status_").append(status);
          	$(".status_").show();

			//$("#opportunity").load();
          }
          });
    }return false;    

  });


});
</script>
<script>
$(document).ready(function() {
  
$(".assignee_").click(function(){
$(".assignee_edit").show();
$(".assignee_").hide();

});


$('.assignee_edit').focusout(function(){
  $(".assignee_edit").hide();
  $(".assignee_").show();
});
    
$('.select_assignee').change(function() {
var assignee=$(this).val();
var lead_id = $('#id').val();
  // alert(assignee);alert(lead_id);die();       
    if(assignee!='')
    {
         $.ajax({
         type: "POST",
         url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/admin/Leads/assigneeupdate/",

        // url: "search.php",
         data: { assignee : assignee , lead_id:lead_id},
      
         success: function(data)
         {
          //window.location.reload();
          //  $('#newDiv').html(jQuery(data).find('.result').html()); 
          	$(".assignee_edit").hide();
          	$(".assignee_").empty();
          	$(".assignee_").append(assignee);
          	$(".assignee_").show();

			//$("#opportunity").load();
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


<script>
$(document).ready(function() {
var id=$('#session_id').text();

//alert(id);
		if(id!='')
		{
 			   $.ajax({
 			   type: "POST",
 			   url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/admin/Tickets/email/",

 			  // url: "search.php",
 			   data: { id : id },
			
 			   success: function(data)
 			   {
  				  	//$(".ssss").html(jQuery(data).find('#result').html()); 
  				  	//$('.session_email').html(data);
  				  		$('.session_email').html(jQuery(data).find('.get_result').html()); 
  				        $('.session_email1').html(jQuery(data).find('.get_result1').html()); 
  						
  						var owner = jQuery(data).find('.get_result').html(); 
  						$('#owner').val(owner.trim()); 

  						var att = jQuery(data).find('.get_result1').html();
  						$('#attendees').val(att.trim()); 
  						$('.attendees').val(att.trim()); 
  						 
  						var email = jQuery(data).find('.get_result2').html();
  						$('#email').val(email.trim());
  						
  					
  			   }
  			  });
		}return false; 
		
});
</script>

<script>
$(document).ready(function() {
  
$("#NewAppointment").click(function(){

var first_name = $('#first_name').val();
var last_name = $('#last_name').val();
var subject = $('#subject').val();
var customer_name = first_name +" "+ last_name;
var summary = customer_name +" - "+ subject;

$('#customer_name').val(customer_name);
$('#summary').val(summary);   
});

});
</script>

<script src="<?php echo $this->webroot.'js/jquery/jquery-1.9.1.min.js'?>"></script>
<script type="text/javascript">

$(function() {
    $("#datetimepicker1").datetimepicker();
    $("#datetimepicker2").datetimepicker();
});
</script>
