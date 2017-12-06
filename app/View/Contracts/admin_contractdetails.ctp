<?php echo $this->Flash->render('positive'); ?>

<div class="warper container-fluid" style="margin-bottom:60px;">
	<div class="page-header"><h1>Contract Details

	<span class="pull-right">
	<?php echo $this->Html->link('Edit',array('controller' => 'Contracts', 'action' => 'contractedit',$Contract['Contract']['id']),array('escape'=>false,'class'=>'btn btn-default'));?>
	<?php echo $this->Html->link('Back',array('controller' => 'Contracts', 'action' => 'contractlist'),array('escape'=>false,'class'=>'btn btn-default'));?>
	</div>
	</span>
	</h1>


		<div class="row"> 
			<div class="col-xs-4 col-sm-4">
				<div class="form-group">
					<div class="panel panel-default">
						<div class="panel-heading"><i class="fa fa-user"></i> Customer </div>
        				<div class="panel-body">
							<div class="panel-body customer_info">
							<div class="row">  
								<div class="col-xs-12 col-sm-12">
									<div class="form-group">
										<span id="user_id" style="display: none;"><?php echo $user_id= $user['User']['id'];?></span>
										<span id="contract_id"  style="display: none;"><?php echo $contract_id = $Contract['Contract']['id']; ?></span>
										<b>Customer: </b>
										<?php $customer_name = $user['User']['first_name'].' '.$user['User']['last_name'];
										echo $this->Html->link(ucfirst($customer_name),array('controller' => 'users', 'action' => 'userdetail',$user_id),array('escape'=>false,));?>	
										<br><br>
										<b>Phone: </b><?php 
										if(!empty($phone)){
											foreach ($phone as $ph) {
												$phone_type	= $ph['Phone']['phone_type'];

												if($phone_type=='Phone')
												{
													echo $ph['Phone']['phone_number'].'<br>';
												}
											}
											
										}

										?>
										<br>
										<b>Email:  </b><a href="mailto:<?php echo $user['User']['email']?>"><?php echo $user['User']['email']?></a> 
										<br><br>
										<b>Mobile:  </b><?php 
										if(!empty($phone)){
											foreach ($phone as $ph) {
												$phone_type	= $ph['Phone']['phone_type'];

												if($phone_type=='Mobile')
												{
													echo $ph['Phone']['phone_number'];
												}
											}
											
										}

										?>
										<br><br>
										<b>Address:   </b>

										<?php 
										$address = $user['User']['address'].' '.$user['User']['city'].' '.$user['User']['state_country'].' '.$user['User']['zip'];
										?>
										<a target="_blank" href="https://maps.google.fr/maps?q=<?php echo $address;?>"> <?php echo ' '.$address;?>
                            			</a>
										<br>
									</div>
								</div>
							</div>
               				</div>
						</div>
					</div>


					<div class="form-group">
					<div class="panel panel-default">
						<div class="panel-heading"><i class="fa fa-check"></i> Activity </div>
        				<div class="panel-body">
							<div class="panel-body customer_info">
							<div class="row">  
								<div class="col-xs-12 col-sm-12">
									<div class="form-group">

									<a class="btn btn-warning btn-sm" data-toggle="modal" href="#myEmail">New Email</a>


									<a class="btn btn-default btn-sm" data-toggle="modal" href="#myAttachmentModal">Add File</a><br><br>

									<p class="btn btn-default btn-sm addreminder">Add Reminder</p>
								

									<div id="reminder" style="display: none;"> 
										<h4>Add Reminder</h4>
										<?php echo $this->Form->create('Contract',array('controller'=>'Contracts','action'=>'addnewreminder')); ?> 
											<div class="row">                 
											<div class="col-xs-12 col-sm-12">
											<div class="form-group">
												<p>Customer: <?php echo $customer_name; ?></p>
												<?php echo $this->Form->input('Reminder.customer', array('type'=>'hidden','div'=>false,'class'=>'form-control','label'=>'Customer','value'=>$customer_name)); ?>
												<?php echo $this->Form->input('Reminder.user_id', array('type'=>'hidden','div'=>false,'class'=>'form-control','value'=>$user_id)); ?>
												<?php echo $this->Form->input('Reminder.contract_id', array('type'=>'hidden','div'=>false,'class'=>'form-control','value'=>$contract_id)); ?>
											</div>
											</div>
											</div>
										   	<div class="row">                 
											<div class="col-xs-12 col-sm-12">
											<div class="form-group">
												
                								<input id="datetimepicker" style="width: 100%;" name="Reminder[at]" />
                							
											</div>
											</div>
											</div>
											<div class="row">                 
											<div class="col-xs-12 col-sm-12">
											<div class="form-group">
													<?php echo $this->Form->input('Reminder.notes', array('type'=>'textarea','class'=>'form-control','label'=>'','placeholder'=>'Notes...','rows'=>"3",'value'=>'Remember to look at the contract for '.$customer_name)); ?>
											</div>
											</div>  
											</div>
											
											
											<div class="row">  
												<div class="col-xs-12 col-sm-12">
													<div class="form-group">
													<div id="session_id" style="display: none;"><?php echo $session_id = $this->Session->read('User_id');?>
													</div>
													
													<label>For Tech</label><br>	
														<input type='hidden' name="Reminder[tech]" id="owner" value="<?php echo $this->Session->read('Auth.User.first_name');?>"/>

														<select  class="select optional form-control" >
															<option selected="selected">
																<?php echo $this->Session->read('Auth.User.first_name').' '.$this->Session->read('Auth.User.email');?>
															</option>
														</select>
													</div>
								            	</div>
											</div>
											

											<div class="row">  
												
								               	<div class="col-xs-3 col-sm-3">
													<div class="form-group">
														<?php echo $this->Form->button("Save", array('class' => 'btn btn-success pull-left')); ?>
													</div>
								               	</div>
								               	<div class="col-xs-1 col-sm-1">
												</div>
								               	<div class="col-xs-8 col-sm-8">
												<div class="btn-group">
													<?php echo $this->Html->link('All Reminders (new window)',array('controller' => 'Reminders', 'action' => 'reminderlist'),array('escape'=>false,'class'=>'btn btn-default m-b-sm','target'=>"_blank"));?>

												</div>
												</div>
												
											</div>

											                		
										<?php echo $this->Form->end(); ?>
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
											

								            <?php echo $this->Form->create('contract',array('controller'=>'Contracts','action'=>'addattachment','class'=>'validator-form','enctype' => 'multipart/form-data')); ?>

								            
								                
								            <div class="row">  
								                   
								            <div class="col-xs-12 col-sm-12">
												<div class="input-group">
														
														<span class="col-xs-5 col-sm-5">
												
														<label>Select one file:</label>&nbsp;&nbsp;&nbsp;
														</span>
														<span class="col-xs-1 col-sm-1"></span>

														<span class="btn btn-primary col-xs-6 col-sm-6">
								                   		
								                   		
								                    		<?php echo $this->Form->input('contract.file', array('type'=>'file','class'=>'form-control','label'=>'Choose File','required'=>'required','style'=>"display: none;")); ?> 

															<?php echo $this->Form->input('contract.contract_id', array('type'=>'hidden','class'=>'form-control','value'=>$contract_id)); ?>	
								                    		
								                    	</span>&nbsp;&nbsp;&nbsp;

								                    	<span class="col-xs-12 col-sm-12"></span>
								                    	<span class="col-xs-12 col-sm-12" style="padding-right: 0;">

								                    	<button type="submit" class="btn btn-success pull-right">Upload</button>
								                    	
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
									<!-- myAttachment Modal -->   




									<!-- Email Modal -->   
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
										<?php echo $this->Form->create('contract',array('controller'=>'Contracts','action'=>'newemail')); ?>

											<div class="row">                 
		                    				<div class="col-xs-12 col-sm-6">
											<div class="form-group">
		                   						<?php echo $this->Form->input('contract.email_from', array('div'=>false,'class'=>'form-control','placeholder'=>"From",'label'=>'From:','required'=>'required','value'=>$this->Session->read('Auth.User.email'))); ?>
		                   						<?php echo $this->Form->input('contract.user_id', array('type'=>'hidden','class'=>'form-control','value'=>$user_id)); ?>
		                   						<?php echo $this->Form->input('contract.contract_id', array('type'=>'hidden','class'=>'form-control','value'=>$contract_id)); ?>
		                   						<?php echo $this->Form->input('contract.user', array('type'=>'hidden','class'=>'form-control','value'=>$this->Session->read('Auth.User.first_name'))); ?>
											</div>
		                    				</div>
		                					</div>


		                					<div class="row">                 
		                    				<div class="col-xs-12 col-sm-6">
											<div class="form-group">
		                   						<?php echo $this->Form->input('contract.email_to', array('div'=>false,'class'=>'form-control','placeholder'=>"To",'label'=>'To:','required'=>'required','value'=>$user['User']['email'])); ?>
		                   						
											</div>
		                    				</div>
		                					</div>



		                					<div class="row cc-field" style="display: none;">                 
		                    				<div class="col-xs-12 col-sm-6">
											<div class="form-group">
		                   						<?php echo $this->Form->input('contract.cc', array('div'=>false,'class'=>'form-control','placeholder'=>"CC",'label'=>'CC:')); ?>
		                   						
											</div>
		                    				</div>
		                					</div>


		                					<div class="row bcc-field" style="display: none;">                 
		                    				<div class="col-xs-12 col-sm-6">
											<div class="form-group">
		                   						<?php echo $this->Form->input('contract.bcc', array('div'=>false,'class'=>'form-control','placeholder'=>"BCC",'label'=>'BCC:')); ?>
		                   						
											</div>
		                    				</div>
		                					</div>


		                					<div class="row">                 
		                    				<div class="col-xs-12 col-sm-6">
											<div class="form-group">
		                   						<?php echo $this->Form->input('contract.subject', array('div'=>false,'class'=>'form-control','placeholder'=>"Subject",'label'=>'Subject:','required'=>'required')); ?>
		                   						
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
		                   						<?php echo $this->Form->input('contract.message', array('type'=>'textarea','class'=>'form-control','placeholder'=>"Email message...",'label'=>' ','required'=>'required')); ?>
		                   						
											</div>
		                    				</div>
		                					</div>

		                					<div class="row">
		                					<div class="col-md-6">
		                					<div class="form-group">
	                							<button type="submit" class="btn btn-sm btn-success pull-right">Send</button>
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
									<!-- Email Modal --> 


									<hr class="dotted">	
									<?php echo $this->Form->create('Contract',array('controller'=>'Contracts','action'=>'addnotes','class'=>"validator-form",'id'=>"wizardForm")); ?>

									


								
								
										<div class="row" style="margin-top: 15px;">                 
											<div class="col-xs-12 col-sm-12">
												<div class="form-group">
																	
													<?php echo $this->Form->input('Contract.notes', array('type'=>'textarea','class'=>'form-control','required'=>'required','label'=>'Add Note','name'=>'Note[notes]','style'=>"width: 230px; height: 80px;")); ?>

													<?php echo $this->Form->input('Contract.contract_id', array('type'=>'hidden','class'=>'form-control','name'=>'Note[contract_id]','value'=>$contract_id)); ?>
												    
												</div>
											</div>
										</div>

										<div class="row">                 
											<div class="col-xs-12 col-sm-12">
												
												<div class="btn-group">
													<?php echo $this->Form->button('Create Contract Note', array('class' => 'btn btn-success pull-left')); ?>
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
			</div> 
			<div class="col-xs-4 col-sm-4">
				<div class="form-group">
					<div class="panel panel-default">
						<div class="panel-heading"><i class="fa fa-file-text-o"></i> Contract </div>
        				<div class="panel-body">
							<div class="panel-body customer_info">
							<div class="row">  
								<div class="col-xs-12 col-sm-12">
									<div class="form-group">
										<b>Name: </b>

										<span class="contract_name">
                             				<?php $contract_name = $Contract['Contract']['contract_name']; ?>
                             				<?php if($contract_name!=''){
											?>
											
											<span class="contract_name_edit best_in_place">		<?php echo $contract_name;?>
                             				</span>
                             				
											<?php
											}else
											{ 
											?>	
												<span class="contract_name_edit best_in_place" style="color: #d3d3d3;border: medium none;font-style: italic;">
													<?php echo 'click to add';?>
                             					</span>
                             					
										<?php } ?>
                            			
                             			</span>

		                                <div style="display:none;" class="contract_name_form" >
		                                    <form class="place" action="javascript:void(0);">
		                                    <input type="text" class="form-control" id="contract_name" value="<?php echo $contract_name;?>" required>
		                                    <input type="hidden"  id="cont_id" value="<?php echo $contract_id;?>">
		                                    <input class="submit_contract_name btn btn-success" type="button" value="Save">
		                                    <input class="cancle_contract_name btn btn-default" type="button" value="Cancel">
		                                    </form>
		                                </div>
										<br><br>

										<b>Status: </b>

										<span class="status">
                             				<?php $status = $Contract['Contract']['status']; ?>
                             				<?php if($status!=''){
											?>
											
											<span class="status_edit best_in_place">
												<?php echo $status;?>
                             				</span>
                             				
											<?php
											}else
											{ 
											?>	
												<span class="status_edit best_in_place" style="color: #d3d3d3;border: medium none;font-style: italic;">
													<?php echo 'click to add';?>
                             					</span>
                             					
										<?php } ?>
                            			
                             			</span>

		                                <div style="display:none;" class="status_form" >

		                                    <form action="javascript:void(0);">
			                                    <select class="select_ form-control">
			                                        <option>New</option>
			                                        <option>Lead</option>
			                                        <option>First Contact</option>
			                                        <option>Opportunity</option>
			                                        <option>Prospect</option>
			                                        <option>Waiting on Client</option>
			                                        <option>In Negotiation</option>
			                                        <option>Pending</option>
			                                        <option>Won</option>
			                                        <option>Lost</option>
			                                    </select>
			                                    <input type="hidden"  id="id_" value="<?php echo $contract_id;?>">
			                                </form>

		                                </div>

										<br><br>
										
										<b>Estimated Value:  </b>

										<span class="estimated_value">
                             				<?php $estimated_value = $Contract['Contract']['estimated_value']; ?>
                             				<?php if($estimated_value!=''){
											?>
											
											<span class="estimated_value_edit best_in_place">		<?php echo '$'.$estimated_value;?>
                             				</span>
                             				
											<?php
											}else
											{ 
											?>	
												<span class="estimated_value_edit best_in_place" style="color: #d3d3d3;border: medium none;font-style: italic;">
													<?php echo 'click to add';?>
                             					</span>
                             					
										<?php } ?>
                            			
                             			</span>

		                                <div style="display:none;" class="estimated_value_form" >
		                                    <form class="place" action="javascript:void(0);">
		                                    <input type="text" class="form-control" id="estimated_value" value="<?php echo $estimated_value;?>" onkeypress='return isNumber(event)' required>
		                                    <input type="hidden"  id="cont_id" value="<?php echo $contract_id;?>">
		                                    <input class="submit_estimated_value btn btn-success" type="button" value="Save">
		                                    <input class="cancle_estimated_value btn btn-default" type="button" value="Cancel">
		                                    </form>
		                                </div>


										<br><br>
										<b>Likelihood of Winning (%):  </b>
										<span class="likelihood">
                             				<?php $likelihood = $Contract['Contract']['likelihood']; ?>
                             				<?php if($likelihood!=''){
											?>
											
											<span class="likelihood_edit best_in_place">
												<?php echo $likelihood;?>
                             				</span>
                             				
											<?php
											}else
											{ 
											?>	
												<span class="likelihood_edit best_in_place" style="color: #d3d3d3;border: medium none;font-style: italic;">
													<?php echo 'click to add';?>
                             					</span>
                             					
										<?php } ?>
                            			
                             			</span>

		                                <div style="display:none;" class="likelihood_form" >

			                                <form action="javascript:void(0);">
			                                    <select class="likelihood_select form-control">
			                                        <option>0</option>
			                                        <option>25</option>
			                                        <option>50</option>
			                                        <option>75</option>
			                                        <option>100</option>
			                                        
			                                    </select>
			                                    <input type="hidden"  id="likelihood_id" value="<?php echo $contract_id;?>">
			                                </form>

		                                </div>

										<br><br>

										<b>Start date: </b>

										<span class="start_date">
                             				<?php $start_date = $Contract['Contract']['start_date']; ?>
                             				<?php if($start_date!=''){
											?>
											
											<span class="start_date_edit best_in_place">
												<?php echo $start_date;?>
                             				</span>
                             				
											<?php
											}else
											{ 
											?>	
												<span class="start_date_edit best_in_place" style="color: #d3d3d3;border: medium none;font-style: italic;">
													<?php echo 'click to add';?>
                             					</span>
                             					
										<?php } ?>
                            			
                             			</span>

		                                <div style="display:none;" class="start_date_form" >

			                                <form class="place" action="javascript:void(0);">
			                                    <input type="text" class="form-control date-picker" id="start_date" value="<?php echo $start_date;?>" required>
			                                    <input type="hidden"  id="cont_id" value="<?php echo $contract_id;?>">
			                                    <input class="submit_start_date btn btn-success" type="button" value="Save">
			                                    <input class="cancle_start_date btn btn-default" type="button" value="Cancel">
		                                    </form>

		                                </div>

										<br><br>

										<b>End date:  </b>

										<span class="end_date">
                             				<?php $end_date = $Contract['Contract']['end_date']; ?>
                             				<?php if($end_date!=''){
											?>
											
											<span class="end_date_edit best_in_place">
												<?php echo $end_date;?>
                             				</span>
                             				
											<?php
											}else
											{ 
											?>	
												<span class="end_date_edit best_in_place" style="color: #d3d3d3;border: medium none;font-style: italic;">
													<?php echo 'click to add';?>
                             					</span>
                             					
										<?php } ?>
                            			
                             			</span>

		                                <div style="display:none;" class="end_date_form" >

			                                <form class="place" action="javascript:void(0);">
			                                    <input type="text" class="form-control date-picker" id="end_date" value="<?php echo $end_date;?>" required>
			                                    <input type="hidden"  id="cont_id" value="<?php echo $contract_id;?>">
			                                    <input class="submit_end_date btn btn-success" type="button" value="Save">
			                                    <input class="cancle_end_date btn btn-default" type="button" value="Cancel">
		                                    </form>

		                                </div>

										<br><br>

										<b>Primary contact:  </b>

										<span class="primary_contact">
                             				<?php $primary_contact = $Contract['Contract']['primary_contact']; ?>
                             				<?php if($primary_contact!=''){
											?>
											
											<span class="primary_contact_edit best_in_place">		<?php echo $primary_contact;?>
                             				</span>
                             				
											<?php
											}else
											{ 
											?>	
												<span class="primary_contact_edit best_in_place" style="color: #d3d3d3;border: medium none;font-style: italic;">
													<?php echo 'click to add';?>
                             					</span>
                             					
										<?php } ?>
                            			
                             			</span>

		                                <div style="display:none;" class="primary_contact_form" >
		                                    <form class="place" action="javascript:void(0);">
		                                    <input type="text" class="form-control" id="primary_contact" value="<?php echo $primary_contact;?>" required>
		                                    <input type="hidden"  id="cont_id" value="<?php echo $contract_id;?>">
		                                    <input class="submit_primary_contact btn btn-success" type="button" value="Save">
		                                    <input class="cancle_primary_contact btn btn-default" type="button" value="Cancel">
		                                    </form>
		                                </div>
										<br><br>

										<b>Service Level Agreement (SLA):  </b>

										<span class="service_level_agreement">
                             				<?php $service_level_agreement = $Contract['Contract']['sla_id']; ?>
                             				<?php if(!empty($slanamebyid)){
											?>
											
											<span class="service_level_agreement_edit best_in_place">
												<?php
													echo $slanamebyid['Sla']['name'];
												?>
                             				</span>
                             				
											<?php
											}else
											{ 
											?>	
												<span class="service_level_agreement_edit best_in_place" style="color: #d3d3d3;border: medium none;font-style: italic;">
													<?php echo 'click to add';?>
                             					</span>
                             					
										<?php } ?>
                            			
                             			</span>

		                                <div style="display:none;" class="service_level_agreement_form" >

			                                <form action="javascript:void(0);">
			                                    <select class="form-control service_level_agreement_select" >

		                                          	<?php foreach($slaname as $key => $value){ 
		                                          	?>
													<option value='<?php echo $key;?>'>
													<?php echo $value;?> 
													</option> 
													<?php }?>
			                                    </select>
			                                     		  
			                                    <input type="hidden"  id="id_" value="<?php echo $contract_id;?>">
			                                </form>

		                                </div>
		                                

										<br><br>


										<b>Contract Applies to All Tickets: </b>

										<span class="applie">
                             				<?php $applie = $Contract['Contract']['applies_to_all_tickets'] ?>
                             				<?php if($applie!=''){
											
                             					if($applie=='1')
                             					{
                             						?>
                             						<span class="applie_edit best_in_place">
														<?php echo 'yes';?>
                             						</span>
                             						<?php
                             					}
                             					else
                             					{
                             						?>
                             						<span class="applie_edit best_in_place">
														<?php echo 'No';?>
                             						</span>
                             						<?php
                             					}

											}else
											{ 
											?>	
												<span class="applie_edit best_in_place" style="color: #d3d3d3;border: medium none;font-style: italic;">
													<?php echo 'click to add';?>
                             					</span>
                             					
										<?php } ?>
                            			
                             			</span>

		                                <div style="display:none;" class="applie_form" >

			                                <form action="javascript:void(0);">
			                                    <select class="applie_select form-control">
			                                        <option value="1">Yes</option>
			                                        <option value="0">No</option>
			                                        
			                                    </select>
			                                    <input type="hidden"  id="id_" value="<?php echo $contract_id;?>">
			                                </form>

		                                </div>

										<br><br>

										<b>Description: </b>

										<span class="description">
                             				<?php $description = $Contract['Contract']['description']; ?>
                             				<?php if($description!=''){
											?>
											
											<span class="description_edit best_in_place">		<?php echo $description;?>
                             				</span>
                             				
											<?php
											}else
											{ 
											?>	
												<span class="description_edit best_in_place" style="color: #d3d3d3;border: medium none;font-style: italic;">
													<?php echo 'click to add';?>
                             					</span>
                             					
										<?php } ?>
                            			
                             			</span>

		                                <div style="display:none;" class="description_form" >
		                                    <form class="place" action="javascript:void(0);">
		                                    <input type="text" class="form-control" id="description" value="<?php echo $description;?>" required>
		                                    <input type="hidden"  id="cont_id" value="<?php echo $contract_id;?>">
		                                    <input class="submit_description btn btn-success" type="button" value="Save">
		                                    <input class="cancle_description btn btn-default" type="button" value="Cancel">
		                                    </form>
		                                </div>

										<br><br>   
																						
									</div>
								</div>
							</div>
               				</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-4 col-sm-4">

				<div class="form-group">
					<div class="panel panel-default">
						<div class="panel-heading"><i class="fa fa-check"></i> Contract Pricing </div>
        				<div class="panel-body">
							<div class="panel-body customer_info">
							<div class="row">  
								<div class="col-xs-12 col-sm-12">
									<div class="form-group">

										<h4 class="mbs">Add Custom Contracted Rate for a Product</h4>

										<?php echo $this->Form->create('Contract',array('controller'=>'Contracts','action'=>'addpricing','class'=>"validator-form",'id'=>"wizardForm")); ?>

										<div class="row" style="margin-top: 15px;">              
											<div class="col-xs-12 col-sm-12">
												<div class="form-group">
																	
													<?php echo $this->Form->input('ContractPricing.product_name', array('div'=>false,'class'=>'form-control','placeholder' => "Start typing the product's name",'required'=>'required','label'=>'Name','id'=>'product_name','required'=>'required')); ?>
												    <div id="product_found"></div>
												</div>
											</div>
										</div>
										<div class="row">                 
							                <div class="col-xs-12 col-sm-12">
												<div class="form-group">
													<?php echo $this->Form->input('ContractPricing.price', array('type'=>'text', 'class'=>'form-control','label'=>'Contract Price (override)','placeholder' => "00.0",'onkeypress'=>'return isNumber(event)','id'=>'price')); ?>
													<?php echo $this->Form->input('ContractPricing.contract_id', array('type'=>'hidden', 'class'=>'form-control','value'=> $contract_id)); ?>
																									    
												</div>
											</div>
										</div>
										<div class="row">  						
							               	<div class="col-xs-12 col-sm-12">
												<div class="form-group">
													<?php echo $this->Form->button("Add Override", array('class' => 'btn btn-success pull-left')); ?>
												</div>
							               	</div>									
										</div>


										<?php echo $this->Form->end(); ?>
									</div>
								</div>
								<hr class="dotted"><br>

								<div class="row">  
								<div class="col-xs-12 col-sm-12">
								<div class="form-group">
								
									<table class="table table-striped custom-table-code table-bordered table-responsive">
							            <thead>
							                <tr>	 
								                <th>Product</th>
												<th>Price</th>
												<th></th>
												
											</tr>
										</thead>
										<tbody class="userdata"><?php $counter=0; ?>
										<?php foreach($Pricing as $pricing) {
											
										?>
											<tr>
												<td><?php echo $pricing['ContractPricing']['product_name'];?> </td>
												<td><?php echo $pricing['ContractPricing']['price']; ?> </td>
												<td><?php echo $this->Html->link('<i class="btn btn-danger btn-sm fa fa-remove"></i>',array('controller' => 'Contracts', 'action' => 'deletepricing',$pricing['ContractPricing']['id'],$contract_id),array('escape'=>false,'confirm' => 'Are you sure?'));?> </td>
											</tr>
										<?php } ?>
										</tbody>
															
							        </table> 
							    </div>
							    </div>
							    </div>
							</div>
               				</div>
						</div>
					</div>
				</div>
			</div>
			
		</div>


		<div class="row">  
			<div class="col-xs-1 col-sm-1">
			</div>
			<div class="col-xs-10 col-sm-10">
				<div class="form-group">
					<div class="panel panel-default">
						<div class="panel-heading"><i class="fa fa-tags"></i>    Additional Information
						</div>
            			<div class="panel-body">
							<div class="row">  
								<div class="col-xs-12 col-sm-12">
								<div class="form-group">
								<br>	
									<b>Notes</b>
									<br><br>
									<table cellpadding="0" cellspacing="0" border="0" class="table table-striped custom-table-code table-bordered table-responsive">
							            <thead style="background-color;#A9A9A9;">
							                <tr>	 
								                <th width="20%">Created</th>
												<th>Note</th>
												<th width="10%"></th>
												
											</tr>
										</thead>
										<tbody class="userdata"><?php $counter=0; ?>
										<?php foreach($Note as $note) {
										?>
											<tr>
												<td><?php echo date('D d-m-Y g:i A',strtotime($note['Note']['created']));?> </td>
												<td><?php echo $note['Note']['notes']; ?> </td>
												<td><?php echo $this->Html->link('<i class="btn btn-danger btn-sm fa fa-remove"></i>',array('controller' => 'Contracts', 'action' => 'deletenote',$note['Note']['id'],$contract_id),array('escape'=>false,'confirm' => 'Are you sure you wish to delete this Note?'));?> </td>
											</tr>
										<?php } ?>
										</tbody>
															
							        </table> 

								<br>	
									<h4>Attachments</h4>
									<table class="table table-bordered">
									<thead>
									<tr>
									<th width="20%">Created</th>
									<th>File</th>
									<th width="10%"></th>
									</tr>
									</thead>
									
									<tbody>
										<?php $path = "attachment/";	?> 
										<?php foreach($Attachment as $att) {
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
											<td>						 
												
												<?php echo $this->Html->link('<i class="btn btn-danger btn-sm fa fa-times"></i>',array('action'=>'Contracts','action'=>'deleteAttachment',$att_id,$contract_id,$file_name),array('escape'=>false,'confirm' => 'Are you sure you wish to delete this Attachment?'));?>
											</td>
										</tr>
										<?php } ?> 			
									</tbody>
									</table>
								<br>	
									<b>Recurring Invoices</b>
									
								</div>

								</div>
							</div>
           				</div>
					</div>
				</div>
			</div>
		</div>

	
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



</div>				
	


<!-- Date Time Picker -->

    <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2017.1.118/styles/kendo.common-material.min.css" />
    <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2017.1.118/styles/kendo.material.min.css" />
    <script src="https://kendo.cdn.telerik.com/2017.1.118/js/kendo.all.min.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
    // create DateTimePicker from input HTML element
    $("#datetimepicker").kendoDateTimePicker({
    value:new Date()
    });
});
</script>



<!-- Reminder -->

<script>
$(document).ready(function(){
    $(".addreminder").click(function(){
        $("#reminder").toggle();
    });
});
</script>


		

<!-- Update Contract Name -->

<script>
$(document).ready(function() {
  
$(".contract_name").click(function(){
 
$(".contract_name_form").show();
$(".contract_name").hide();
});

    
$(".cancle_contract_name").click(function(){

$(".contract_name_form").hide();
$(".contract_name").show(); 
});   

$('.submit_contract_name').click(function(){
       
        //$(".submit_estimated_value").val("Working....");
    
        var contract_name = $('#contract_name').val();
        var contract_id = $('#cont_id').val();
        //alert(contract_id);alert(contract_name);die();
        
        if(contract_name!='')
        {
               $.ajax({
               type: "POST",
               url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/admin/Contracts/contractnameupdate/",

              // url: "search.php",
               data: { contract_name : contract_name , contract_id:contract_id},
            
               success: function(data)
               {
                // window.location.reload();
                //  $('#newDiv').html(jQuery(data).find('.result').html()); 
                $(".contract_name_form").hide();
                $(".contract_name_edit").empty();
                $(".contract_name_edit").append(contract_name);
                $(".contract_name").show();
              }
              });
        }return false;    

    });


});
</script>	


<!-- Status Update -->

<script>

$(document).ready(function() {
  
	$(".status").click(function(){
		$(".status_form").show();
		$(".status").hide();
	});


	$('.status_form').focusout(function(){
		$(".status_form").hide();
		$(".status").show();
	});
    
	$('.select_').change(function() {
		var status=$(this).val();
	    var contract_id = $('#id_').val();
	   	//alert(status);alert(contract_id);die();
	    if(status!='')
	    {
	        $.ajax({
	        type: "POST",
	        url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/admin/Contracts/statusupdate/",
	        // url: "search.php",
	        data: { status : status , contract_id:contract_id},
	      
	        success: function(data)
	        {
	            $(".status_form").hide();
	            $(".status_edit").empty();
	            $(".status_edit").append(status);
	            $(".status_edit").show();
	            $(".status").show();
	           
	          // window.location.reload();
	          //  $('#newDiv').html(jQuery(data).find('.result').html()); 
	        }
	        });
	    }return false;    
	});
});
</script>




<!-- Update estimated value -->

<script>
$(document).ready(function() {
  
$(".estimated_value").click(function(){
 
$(".estimated_value_form").show();
$(".estimated_value").hide();
});

    
$(".cancle_estimated_value").click(function(){

$(".estimated_value_form").hide();
$(".estimated_value").show(); 
});   

$('.submit_estimated_value').click(function(){
       
        //$(".submit_estimated_value").val("Working....");
    
        var estimated_value = $('#estimated_value').val();
        var contract_id = $('#cont_id').val();
        //alert(contract_id);alert(estimated_value);die();
        
        if(estimated_value!='')
        {
               $.ajax({
               type: "POST",
               url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/admin/Contracts/estimatedvalueupdate/",

              // url: "search.php",
               data: { estimated_value : estimated_value , contract_id:contract_id},
            
               success: function(data)
               {
                // window.location.reload();
                //  $('#newDiv').html(jQuery(data).find('.result').html()); 
                $(".estimated_value_form").hide();
                $(".estimated_value_edit").empty();
                $(".estimated_value_edit").append('$'+estimated_value);
                $(".estimated_value").show();
              }
              });
        }return false;    

    });


});
</script>	
			

<!-- Update Likelihood -->

<script>
$(document).ready(function() {
  
$(".likelihood").click(function(){
  
$(".likelihood_form").show();
$(".likelihood").hide();


});

$('.likelihood_form').focusout(function(){
    $(".likelihood_form").hide();
    $(".likelihood").show();
});

    
$('.likelihood_select').change(function() {

    var likelihood =$(this).val();
    var contract_id = $('#likelihood_id').val();
    //alert(likelihood);alert(contract_id);die();
      
    if(likelihood!='')
    {
        $.ajax({
        type: "POST",
        url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/admin/Contracts/likelihoodupdate/",

        // url: "search.php",
        data: { likelihood : likelihood , contract_id:contract_id},
      
        success: function(data)
        {
            $(".likelihood_form").hide();
            $(".likelihood_edit").empty();
            $(".likelihood_edit").append(likelihood);
            $(".likelihood_edit").show();
            $(".likelihood").show();
           
           //window.location.reload();
          //  $('#newDiv').html(jQuery(data).find('.result').html()); 
        }
        });
    }return false;    

});


});
</script>


<!-- Update Start Date -->

<script>
$(document).ready(function() {
  
$(".start_date").click(function(){
 
$(".start_date_form").show();
$(".start_date").hide();
});

    
$(".cancle_start_date").click(function(){

$(".start_date_form").hide();
$(".start_date").show(); 
});   

$('.submit_start_date').click(function(){
       
        //$(".submit_estimated_value").val("Working....");
    
        var start_date = $('#start_date').val();
        var contract_id = $('#cont_id').val();
        //alert(contract_id);alert(start_date);die();
        
        if(start_date!='')
        {
               $.ajax({
               type: "POST",
               url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/admin/Contracts/startdateupdate/",

              // url: "search.php",
               data: { start_date : start_date , contract_id:contract_id},
            
               success: function(data)
               {
                // window.location.reload();
                //  $('#newDiv').html(jQuery(data).find('.result').html()); 
                $(".start_date_form").hide();
                $(".start_date_edit").empty();
                $(".start_date_edit").append(start_date);
                $(".start_date").show();
              }
              });
        }return false;    

    });


});
</script>	


<!-- Update End Date -->

<script>
$(document).ready(function() {
  
$(".end_date").click(function(){
 
$(".end_date_form").show();
$(".end_date").hide();
});

    
$(".cancle_end_date").click(function(){

$(".end_date_form").hide();
$(".end_date").show(); 
});   

$('.submit_end_date').click(function(){
       
        //$(".submit_estimated_value").val("Working....");
    
        var end_date = $('#end_date').val();
        var contract_id = $('#cont_id').val();
        //alert(contract_id);alert(end_date);die();
        
        if(end_date!='')
        {
               $.ajax({
               type: "POST",
               url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/admin/Contracts/enddateupdate/",

              // url: "search.php",
               data: { end_date : end_date , contract_id:contract_id},
            
               success: function(data)
               {
                // window.location.reload();
                //  $('#newDiv').html(jQuery(data).find('.result').html()); 
                $(".end_date_form").hide();
                $(".end_date_edit").empty();
                $(".end_date_edit").append(end_date);
                $(".end_date").show();
              }
              });
        }return false;    

    });


});
</script>	


<!-- Update Primary Contract -->

<script>
$(document).ready(function() {
  
$(".primary_contact").click(function(){
 
$(".primary_contact_form").show();
$(".primary_contact").hide();
});

    
$(".cancle_primary_contact").click(function(){

$(".primary_contact_form").hide();
$(".primary_contact").show(); 
});   

$('.submit_primary_contact').click(function(){
       
        //$(".submit_estimated_value").val("Working....");
    
        var primary_contact = $('#primary_contact').val();
        var contract_id = $('#cont_id').val();
        //alert(contract_id);alert(primary_contact);die();
        
        if(primary_contact!='')
        {
               $.ajax({
               type: "POST",
               url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/admin/Contracts/primarycontactupdate/",

              // url: "search.php",
               data: { primary_contact : primary_contact , contract_id:contract_id},
            
               success: function(data)
               {
                // window.location.reload();
                //  $('#newDiv').html(jQuery(data).find('.result').html()); 
                $(".primary_contact_form").hide();
                $(".primary_contact_edit").empty();
                $(".primary_contact_edit").append(primary_contact);
                $(".primary_contact").show();
              }
              });
        }return false;    

    });


});
</script>


<!-- Update Service Level Agreement -->

<script>

$(document).ready(function() {
  
	$(".service_level_agreement").click(function(){
		$(".service_level_agreement_form").show();
		$(".service_level_agreement").hide();
	});


	$('.service_level_agreement_form').focusout(function(){
		$(".service_level_agreement_form").hide();
		$(".service_level_agreement").show();
	});
    
	$('.service_level_agreement_select').change(function() {
		var service_level_agreement=$(this).val();
		var sla = $('.service_level_agreement_select option:selected').text();
	    var contract_id = $('#id_').val();
	   	//alert(service_level_agreement);alert(contract_id);die();
	    if(service_level_agreement!='')
	    {
	        $.ajax({
	        type: "POST",
	        url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/admin/Contracts/servicelevelagreementupdate/",
	        // url: "search.php",
	        data: { service_level_agreement : service_level_agreement , contract_id:contract_id},
	      
	        success: function(data)
	        {
	            $(".service_level_agreement_form").hide();
	            $(".service_level_agreement_edit").empty();
	            $(".service_level_agreement_edit").append(sla);
	            $(".service_level_agreement_edit").show();
	            $(".service_level_agreement").show();
	           
	          // window.location.reload();
	          //  $('#newDiv').html(jQuery(data).find('.result').html()); 
	        }
	        });
	    }return false;    
	});
});
</script>


<!-- Update Applies to All Tickets -->

<script>

$(document).ready(function() {
  
	$(".applie").click(function(){
		$(".applie_form").show();
		$(".applie").hide();
	});


	$('.applie_form').focusout(function(){
		$(".applie_form").hide();
		$(".applie").show();
	});
    
	$('.applie_select').change(function() {
		var applie=$(this).val();
	    var contract_id = $('#id_').val();
	   	//alert(applie);alert(contract_id);die();
	    if(applie!='')
	    {
	        $.ajax({
	        type: "POST",
	        url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/admin/Contracts/appliestoallticketsupdate/",
	        // url: "search.php",
	        data: { applie : applie , contract_id:contract_id},
	      
	        success: function(data)
	        {
	            $(".applie_form").hide();
	            $(".applie_edit").empty();
	            if(applie=='1')
	            {
	            	$(".applie_edit").append('Yes');
	            	$(".applie_edit").show();
	            	$(".applie").show();
	            }
	            else
	            {
	            	$(".applie_edit").append('No');
	           		$(".applie_edit").show();
	            	$(".applie").show();
	            }
	            
	          // window.location.reload();
	          //  $('#newDiv').html(jQuery(data).find('.result').html()); 
	        }
	        });
	    }return false;    
	});
});
</script>


<!-- Update Description -->

<script>
$(document).ready(function() {
  
$(".description").click(function(){
 
$(".description_form").show();
$(".description").hide();
});

    
$(".cancle_description").click(function(){

$(".description_form").hide();
$(".description").show(); 
});   

$('.submit_description').click(function(){
       
        //$(".submit_estimated_value").val("Working....");
    
        var description = $('#description').val();
        var contract_id = $('#cont_id').val();
        //alert(contract_id);alert(description);die();
        
        if(description!='')
        {
               $.ajax({
               type: "POST",
               url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/admin/Contracts/descriptionupdate/",

              // url: "search.php",
               data: { description : description , contract_id:contract_id},
            
               success: function(data)
               {
                // window.location.reload();
                //  $('#newDiv').html(jQuery(data).find('.result').html()); 
                $(".description_form").hide();
                $(".description_edit").empty();
                $(".description_edit").append(description);
                $(".description").show();
              }
              });
        }return false;    

    });


});
</script>




<!-- Product Name -->

<script type="text/javascript">
$(document).ready(function(){
	$('#product_name').keyup(function(){

		var searchid = $(this).val();
		var dataString = searchid;
		//alert(dataString);die();
		if(searchid!='')
		{
 			   $.ajax({
 			   type: "POST",
 			   url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/admin/Contracts/product/",
 			  // url: "search.php",
 			   data: { search : dataString },
			
 			   success: function(data)
 			   {
  				  $("#product_found").html(jQuery(data).find('.result').html()); 
  				//  $('#newDiv').html(jQuery(data).find('.result').html()); 
  			  }
  			  });
		}return false;    

	});
});
</script>



<!-- IS Number -->

<script>
function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;

    }
    return true;
}
</script>


