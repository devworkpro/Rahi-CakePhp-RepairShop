<?php echo $this->Flash->render('positive'); ?>
<style type="text/css">
  .customer{
    text-align: center;
    background: #F1F1F1;
  }
</style>
<?php $total_open_po=0; $open_po=0; $total_open_po_amount=0; $j=0; $open_po_amount=0;?>
  <?php foreach($PurchaseOrder as $purchaseorder) {?>
    <?php  ++$total_open_po;?> 
    <?php $status = $purchaseorder["PurchaseOrder"]['status'];
    $total_open_po_amount = $total_open_po_amount + $purchaseorder["PurchaseOrder"]['order_total'];
    if($status=='Finished')
    {}
    else
    {
      $open_po=$open_po+1;
      $open_po_amount = $open_po_amount+$purchaseorder["PurchaseOrder"]['order_total'];
    }
    } ?> 


<div class="warper container-fluid" style="margin-bottom:100px;">
	<div class="page-header">
  		<h1>View Vendor Detail
  		<span class="pull-right">
  			<span id="vendor_id" style="display: none;"><?php echo $vendor_id=$Vendor['Vendor']['id']; ?></span>
  			
  			<?php echo $this->Html->link('New Purchase Order',array('controller' => 'purchaseOrders', 'action' => 'add'),array('escape'=>false,'class'=>'btn btn-success'));?>

  			<?php echo $this->Html->link('Edit',array('controller' => 'Vendors', 'action' => 'vendoredit',$vendor_id),array('escape'=>false,'class'=>'btn btn-primary'));?>
		
  			<?php echo $this->Html->link('<i class="fa fa-arrow-left"></i> Back',array('controller' => 'Vendors', 'action' => 'vendorlist'),array('escape'=>false,'class'=>'btn btn-default'));?>	
  		</span>
  		</h1>
  	</div>
  	<div class="row">
		<div class="col-xs-12 col-sm-12">
		  	<div class="col-md-6">
		    	<div class="panel panel-white">
		      	<div class="panel-body customer">
		        	<h4>Open / Total Purchase Orders</h4>
		        	<span style="font-size: 50px; bold;"><?php echo $open_po.' / '.$total_open_po;?></span>
		      	</div>
		    	</div>
		  	</div>
		  	<div class="col-md-6">
			 	<div class="panel panel-white">
			    <div class="panel-body customer">
			     	<h4>Open / Total Purchased</h4>
			      	<span style="font-size: 50px; bold;"><?php echo $open_po_amount.'.00 / '.$total_open_po_amount.'.00';?></span>
			    </div>
			  	</div>  
		  	</div>
		</div>
	</div><br/>

	<!-- Vendor information panel -->
  	<div class="panel panel-default">
    <div class="panel-heading"> Vendor Info</div>
    <div class="panel-body">
	<!-- /.box-header -->
      	<div class="tab-pane active" id="user">
        <div class="box-body">
        <div class="row">
        	<div class="col-lg-4 col-md-4"> <br>
		   		<p><b>Name: </b>	<?php echo $Vendor['Vendor']['name'];?></p>
	           	<p><b>Rep first name: </b> <?php echo $Vendor['Vendor']['rep_first_name'];?> </p>
	           	<p><b>Rep last name: </b><?php echo $Vendor['Vendor']['rep_last_name'];?> </p>
	       		<p><b>Email: </b><?php echo $Vendor['Vendor']['email'];?></p>
	           	<p><b>Account number: </b> <?php echo $Vendor['Vendor']['account_number'];?> </p>
	           	<p><b>Phone: </b>  <?php echo $Vendor['Vendor']['phone'];?> </p>
	        </div>
	   		<div class="col-lg-4 col-md-4"> <br>
	   			<p><b>Address: </b>	<?php echo $Vendor['Vendor']['address'];?></p>
	           	<p><b>City: </b> <?php echo $Vendor['Vendor']['city'];?> </p>
	           	<p><b>State: </b><?php echo $Vendor['Vendor']['state_country'];?> </p>
	       		<p><b>Zip: </b><?php echo $Vendor['Vendor']['zip'];?></p>
	           	<p><b>Website: </b> <?php echo $Vendor['Vendor']['website'];?> </p>
	           	<p><b>Notes: </b>  <?php echo $Vendor['Vendor']['notes'];?> </p>
	           	<p><b>Invoice Term: </b>  <?php echo $Vendor['Vendor']['invoice_terms'];?></p>
			</div><br>
			<b>Add Log:</b>
			<div class="col-lg-4 col-md-4"> <br>
				              
                <?php echo $this->Form->create('Vendors',array('controller'=>'Vendors','action'=>'communication_log','class'=>'validator-form')); ?>

                	<?php echo $this->Form->input('CommunicationLog.vendor_id', array('type'=>'hidden','div'=>false,'class'=>'form-control','value'=>$vendor_id)); ?>

                	<?php echo $this->Form->input('CommunicationLog.type', array('options' => array('Email' => 'Email', 'Phone' => 'Phone','Other' => 'Other'),'class'=>'form-control','label'=>'Communication type')); ?>

                	<?php echo $this->Form->input('CommunicationLog.notes', array('type'=>'textarea', 'placeholder'=>"Message here...", 'class'=>'form-control','label'=>false,'style'=>'margin:10px 0px 10px;height: 70px;')); ?>


                	<?php echo $this->Form->button('Add Log', array('class' => 'btn btn-success right')); ?>


				<?php echo $this->Form->end(); ?>	
			</div>
		</div>
		</div><!-- /.box-body -->
	  	</div>
    </div>
  	</div>


	<div class="row">

		

		<!-- Purchase Order -->
		<div class="col-md-6 col-lg-6 col-sm-6">
		<div class="panel panel-default purchaseorder">
	    <div class="panel-heading clearfix">
	        
	        <h4 class="panel-title">   Purchase Orders  &nbsp;&nbsp;   </h4>
	            
			
	    </div>
	    <div class="panel-body">
	    	<div class="table-responsive">
	        <table class="table table-hover table-bordered">
	            <thead>
	                <tr>
	                    <th>Number</th>
						<th>Status</th>
						<th>Order date</th>
						<th>Total</th>
						
	                </tr>
	            </thead>
	            <tbody>
	            <?php foreach ($PurchaseOrder as $purchaseorder) {
				?>
				<tr>
					<td><?php $number = $purchaseorder["PurchaseOrder"]['number'];
							  $po_id  = $purchaseorder["PurchaseOrder"]['id']; ?>
						<?php echo $this->Html->link($number,array('controller' => 'PurchaseOrders', 'action' => 'purchaseorderdetails',$po_id),array('escape'=>false));?>
					</td>
					<td><?php echo $purchaseorder["PurchaseOrder"]['status']; ?></td>
					<td><?php echo $purchaseorder["PurchaseOrder"]['order_date']; ?></td>
					<td><?php echo $purchaseorder["PurchaseOrder"]['order_total'].'.0'; ?></td>
				</tr>
				<?php }?>
				<tr><td colspan="4"><?php echo $this->Html->link("More",array('controller' => 'PurchaseOrders', 'action' => 'purchaseorderlist'),array('escape'=>false));?></td></tr>

	            </tbody>
	        </table>
	        </div>
	    </div>
		</div>
		</div>

		<!-- Contacts -->
		<div class="col-md-6 col-lg-6 col-sm-6">
		<div class="panel panel-default contacts">
	    <div class="panel-heading clearfix">
	        <div class="panel-title">
	        <h4><i class="fa fa-user"></i>     Contacts &nbsp;&nbsp;
	         <a href="#" class="glyphicon glyphicon-plus" id="addnewcontact"></a></h4>
	       	</div>
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
						<?php echo $this->Html->link('<i class="btn btn-danger btn-sm fa fa-times"></i>',array('action'=>'Vendors','action'=>'deletecontact',$contact_id,$vendor_id),array('escape'=>false,'confirm' => 'Are you sure?'));?>
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
		</div>



		<!-- Communication Log -->
		<div class="col-md-6 col-lg-6 col-sm-6">
		<div class="panel panel-default communication_log">
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
	            <?php foreach ($CommunicationLog as $comm) {
				?>
				<tr>
					<td><?php $date = $comm['CommunicationLog']['created'];
								echo date('D d-m-Y g:i A',strtotime($date));
						?></td>

					<td><?php echo $comm['CommunicationLog']['type']?></td>

					<td><?php echo $comm['CommunicationLog']['notes']?></td>
				</tr>

				<?php } ?>
				<tr><td colspan="4"><?php echo $this->Html->link("More",array('controller' => 'users', 'action' => 'communicationlog_list'),array('escape'=>false));?></td></tr>
	            </tbody>
	        </table>
	       	</div>
	    </div>
		</div>
		</div>
	
		<!-- Change History  -->
		<!-- <div class="panel panel-default col-md-6 changehistory">
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
                        }

                       ?>

					</td>
					

					
				</tr>

				<?php }?>
	            </tbody>
	        </table>
	        </div>
	    </div>
		</div> -->
	</div>
</div>


<!-- Add New Contact -->

<script>
$(document).ready(function() {
	$('#addnewcontact').click(function(){		
		var vendor_id = $("#vendor_id").text();
		//alert(vendor_id);die();
		$.ajax({
 			type: "POST",
 			url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/Vendors/addnewcontact/",
 			data: { vendor_id : vendor_id },
			
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
		   		url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/Vendors/updatecontactname/",
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
 			   	url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/Vendors/updatecontactphone/",
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
 			   	url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/Vendors/updatecontactmobile/",
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
 			   	url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/Vendors/updatecontactemail/",
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
 			   	url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/Vendors/updatecontactaddress/",
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
 			   	url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/Vendors/updatecontactaddress2/",
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
 			   	url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/Vendors/updatecontactcity/",
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
 			   	url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/Vendors/updatecontactstate/",
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
 			   	url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/Vendors/updatecontactzip/",
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
 			   	url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/Vendors/updatecontactnotes/",
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