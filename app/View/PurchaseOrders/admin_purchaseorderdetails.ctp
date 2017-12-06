<?php echo $this->Flash->render('positive'); ?>

<div class="warper container-fluid" style="margin-bottom:60px;">
	<div class="page-header"><h1>Purchase Order Detail
	
		<span class="pull-right">
		<div class="btn btn-success btn-sm" data-toggle="modal" data-target="#myModal" >PDF</div>
		<div class="btn-group">
		    <a class="btn btn-default btn-sm dropdown-toggle" href="#" data-toggle="dropdown">Action <span class="caret"></span></a>
            <ul class="dropdown-menu">
                <li><?php echo $this->Html->link('<p class="menu-default">Delete</p>',array('controller'=>'PurchaseOrders','action'=>'deletePurchaseOrder',$PurchaseOrder['PurchaseOrder']['id']),array('escape'=>false));?></li>
            </ul>
        </div>
		<?php echo $this->Html->link('Back',array('controller' => 'PurchaseOrders', 'action' => 'purchaseorderlist'),array('escape'=>false,'class'=>'btn btn-default'));?>

		
		</span>

		</h1>
		<p>From here you can view/edit the purchase order, add items to it, or check the products in.</p>
		<p>Change the status to activate different menus and links.</p>
	</div>


	<!-- Modal Pdf-->

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

			        	<label for=""><?php echo $Vendor['Vendor']['name']; ?></label><br>
			        	<label for=""> <?php echo $Vendor['Vendor']['address'].'<br>'.$Vendor['Vendor']['city'].' '.$Vendor['Vendor']['state_country'].' '.$Vendor['Vendor']['zip']; ?></label><br>

			       	</div>
			       	<div class="text-right" style="margin-top:-68px;">
			       
				        <label for="">
							P.O. #         <span> <?php echo $PurchaseOrder['PurchaseOrder']['number'];?></span><br>
						</label><br>

				        <label for=""> 
							Purchase Date  <span>
							<?php $order_date = $PurchaseOrder['PurchaseOrder']['order_date'];
							if($order_date!='')
							{
							 	echo $order_date;
							}
							?></span><br>
						</label><br>

						<label for="">
						<pre1>
							Total: <span> <?php echo '<b>$'.$PurchaseOrder['PurchaseOrder']['order_total'].".00</b>";?></span><br>
						</pre1>
						</label><br>
			              
			       	</div>
			    </div>
		      
		      	<h4 class="ui top attached header"></h4>
		      	<div class="ui bottom attached segment">     
		        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped custom-table-code table-responsive">
		            <thead style="background-color;#A9A9A9;">
		                <tr>	 
		              	<th>Item</th>
		                <th>Description</th>
		                <th>UPC</th>
		                <th>Unit Cost</th>
						<th>Quantity</th>
						<th>Line Total</th>        
						</tr>
					</thead>
					<tbody class="userdata">
            			<?php $counter=0;$total=0;$tax=0;$string=''; ?>
              			<?php foreach($Purchase as $purchaseitem) {
              				$row_id =  ++$counter; 
              				$product_id = $purchaseitem['Purchase']['product_id']; ?>
              			<tr>
              				<td>
              					<?php echo $purchaseitem['Purchase']['item'];?> 
              				</td>

             				<td>
             					<?php echo $purchaseitem['Purchase']['description'];?>
             				</td>

             				<td>
             					<?php echo $purchaseitem['Purchase']['upc_code'];?>
             				</td>

         					<td>
								<?php echo '$'.$price= $purchaseitem['Purchase']['cost'];?>
								
							</td>
								
             				<td>
             					<?php echo $quantity= $purchaseitem['Purchase']['quantity'];?> 
							</td>
          					<?php $cost=$quantity*$price;  
                             	$total=$total+$cost;
                            ?>
							<td>
             					<?php echo '$'.$cost;?> 
							</td>
						</tr>
      					<?php } ?> 
      					
						<tr>
						
							<td  colspan="5">
							<strong class="text-left">Thank you</strong>
							<strong class="pull-right">Total</strong>
							</td>
							<td>
							<strong><?php echo '$'.$total.'.00';?></strong>
							</td>
						
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
  
	<!-- Modal Pdf-->

		

	<div class="row"> 
		<div class="col-xs-6 col-sm-6">
			<div class="form-group">
			<div class="panel panel-default">
				<div class="panel-heading"><i class="fa fa-user"></i>   PO Details</div>
				<div class="panel-body">
					<div class="panel-body customer_info">
					<div class="row">  
						<div class="col-xs-12 col-sm-12">
							<div class="form-group">

								<span id="po_id" style="display: none;"><?php echo $po_id = $PurchaseOrder['PurchaseOrder']['id'];?></span>

								<b>Order Total: </b>
									<?php $order_total = $PurchaseOrder['PurchaseOrder']['order_total'];
									if($order_total!=''){ echo '$'.$order_total.'.00';}else{echo " $0.00 ";}
									?>
								<br><br>
								
								
								<b>Order date: </b>
								
								<span class="order_date">
                     				<?php $order_date = $PurchaseOrder['PurchaseOrder']['order_date'];?>

                     				<?php if($order_date!=''){
									?>
									
									<span class="order_date_edit best_in_place"><?php echo $order_date;?>
                     				</span>
                     				
									<?php
									}else
									{ 
									?>	
										<span class="order_date_edit best_in_place" style="color: #d3d3d3;border: medium none;font-style: italic;"><?php echo 'click to add';?>
                     					</span>
                     					
								<?php } ?>

                    			</span>
                     			<span style="display:none;" class="order_date_form">
             						<form class="place" action="javascript:void(0);">
									<input class="form-control date-picker" type="text" id="order_date" value="<?php echo $order_date;?>">
									<input type="hidden" id="id" value="<?php echo $po_id;?>">
									<input class="submit_order_date btn btn-success" type="button" value="Save" >
									<input class="cancle_order_date btn btn-default" type="button" value="Cancel" >
									</form>
								</span>                   					
								<br><br>

								<b>Expected date: </b>
								<?php echo $expected_date = $PurchaseOrder['PurchaseOrder']['expected_date'];?>   <br><br>     
									
								<b>Due date: </b>
								   
								<span class="due_date">
                     				<?php $due_date = $PurchaseOrder['PurchaseOrder']['due_date'];?>

                     				<?php if($due_date!=''){
									?>
									
									<span class="due_date_edit best_in_place"><?php echo $due_date;?>
                     				</span>
                     				
									<?php
									}else
									{ 
									?>	
										<span class="due_date_edit best_in_place" style="color: #d3d3d3;border: medium none;font-style: italic;"><?php echo 'click to add';?>
                     					</span>
                     					
								<?php } ?>

                    			</span>
                     			<span style="display:none;" class="due_date_form">
             						<form class="place" action="javascript:void(0);">
									<input class="form-control date-picker" type="text" id="due_date" value="<?php echo $due_date;?>">
									<input type="hidden" id="id" value="<?php echo $po_id;?>">
									<input class="submit_due_date btn btn-success" type="button" value="Save" >
									<input class="cancle_due_date btn btn-default" type="button" value="Cancel" >
									</form>
								</span>
								<br><br>     
									
								<b>Date paid: </b>
								 
								<span class="paid_date">
                     				<?php $paid_date = $PurchaseOrder['PurchaseOrder']['paid_date'];?> 

                     				<?php if($paid_date!=''){
									?>
									
									<span class="paid_date_edit best_in_place"><?php echo $paid_date;?>
                     				</span>
                     				
									<?php
									}else
									{ 
									?>	
										<span class="paid_date_edit best_in_place" style="color: #d3d3d3;border: medium none;font-style: italic;"><?php echo 'click to add';?>
                     					</span>
                     					
								<?php } ?>

                    			</span>
                     			<span style="display:none;" class="paid_date_form">
             						<form class="place" action="javascript:void(0);">
									<input class="form-control date-picker" type="text" id="paid_date" value="<?php echo $paid_date;?>">
									<input type="hidden" id="id" value="<?php echo $po_id;?>">
									<input class="submit_paid_date btn btn-success" type="button" value="Save" >
									<input class="cancle_paid_date btn btn-default" type="button" value="Cancel" >
									</form>
								</span>
								<br><br>     
									
								<b>Number: </b>
								
								<span class="number">
                     				<?php $number = $PurchaseOrder['PurchaseOrder']['number'];?>    

                     				<?php if($number!=''){
									?>
									
									<span class="number_edit best_in_place"><?php echo $number;?>
                     				</span>
                     				
									<?php
									}else
									{ 
									?>	
										<span class="number_edit best_in_place" style="color: #d3d3d3;border: medium none;font-style: italic;"><?php echo 'click to add';?>
                     					</span>
                     					
								<?php } ?>

                    			</span>
                     			<span style="display:none;" class="number_form">
             						<form class="place" action="javascript:void(0);">
									<input class="form-control" type="text" id="number" value="<?php echo $number;?>">
									<input type="hidden" id="id" value="<?php echo $po_id;?>">
									<input class="submit_number btn btn-success" type="button" value="Save" >
									<input class="cancle_number btn btn-default" type="button" value="Cancel" >
									</form>
								</span>
								<br><br>     
									
								<b>Delivery tracking: </b>
								
								<span class="tracking">
                     				<?php $tracking = $PurchaseOrder['PurchaseOrder']['delivery_tracking'];?>    

                     				<?php if($tracking!=''){
									?>
									
									<span class="tracking_edit best_in_place"><?php echo $tracking;?>
                     				</span>
                     				
									<?php
									}else
									{ 
									?>	
										<span class="tracking_edit best_in_place"><?php echo ' - ';?>
                     					</span>
                     					
								<?php } ?>

                    			</span>
                     			<span style="display:none;" class="tracking_form">
             						<form class="place" action="javascript:void(0);">
									<input class="form-control" type="text" id="tracking" value="<?php echo $tracking;?>">
									<input type="hidden" id="id" value="<?php echo $po_id;?>">
									<input class="submit_tracking btn btn-success" type="button" value="Save" >
									<input class="cancle_tracking btn btn-default" type="button" value="Cancel" >
									</form>
								</span>
								<br><br>     
								<b>Status:</b>
								<span class="status_">
                     				<span data-bip-skip-blur="true" class="best_in_place status rec_"> <?php echo $status = $PurchaseOrder['PurchaseOrder']['status'];?>
                        			</span>                                      
                    			</span>
		                        <span style="display:none;" class="status_edit_">
		                          	<form action="javascript:void(0);">
		                            	<select class="select_ form-control">
				                            <option>Open</option>
				                            <option>Ordered</option>
				                            <option>Check-In</option>
				                            <option>Finished</option>
				                            
		                            	</select>
		                            	<input type="hidden"  id="id_" value="<?php echo $po_id;?>">
		                            </form>
		                        </span>


								<br><br>

								<b>Shipping notes:</b>
								<span class="shipping_notes">
                     				<?php $shipping_notes = $PurchaseOrder['PurchaseOrder']['shipping_notes'];?>
                     				<?php if($shipping_notes!=''){
									?>
									<span class="shipping_notes_edit best_in_place"><?php echo $shipping_notes;?>
                     				</span>
                     				
									<?php
									}else
									{ 
									?>	
										<span class="shipping_notes_edit best_in_place" ><?php echo ' - ';?>
                     					</span>
                     					
								<?php } ?>
                    			</span>
                     			
                     			<span style="display:none;" class="shipping_notes_form">
             						<form class="place" action="javascript:void(0);">
									<textarea style="height: 74px;" type='textarea' class="form-control" id="shipping_notes" required="required"><?php echo $shipping_notes;?></textarea> 
									<input type="hidden" id="id" value="<?php echo $po_id;?>">
									<input class="shipping_notes_submit btn btn-success" type="button" value="Save" >
									<input class="shipping_notes_cancle btn btn-default" type="button" value="Cancel" >
									</form>
									
								</span>
								<br><br>


								<b>General Notes:</b><br>

								<span class="general_notes">
                     				<?php $general_notes = $PurchaseOrder['PurchaseOrder']['general_notes'];?>
                     				<?php if($general_notes!=''){
									?>
									<pre1>
									<span class="general_notes_edit best_in_place"><?php echo $general_notes;?>
                     				</span>
                     				</pre1>
									<?php
									}else
									{ 
									?>	<pre1>
										<span class="general_notes_edit best_in_place" style="color: #d3d3d3;border: medium none;font-style: italic;"><?php echo 'click to add';?>
                     					</span>
                     					</pre1>
								<?php } ?>
                    			
                     			</span>
                     			
                     			<span style="display:none;" class="general_notes_form">
             						<pre1>
             						<form class="place" action="javascript:void(0);">
             						<textarea class="form-control" id="general_notes" required="required"><?php echo $general_notes;?></textarea>
									<input type="hidden" id="id" value="<?php echo $po_id;?>">
									<input class="general_notes_submit btn btn-success" type="button" value="Save" >
									<input class="general_notes_cancle btn btn-default" type="button" value="Cancel" >
									</form>
									</pre1>
								</span>
								<br>

								<b>Shipping Price: </b>
								 
								<span class="shipping_price">
                     				<?php $shipping_price = $PurchaseOrder['PurchaseOrder']['shipping_price'];?>     

                     				<?php if($shipping_price!=''){
									?>
									
									<span class="shipping_price_edit best_in_place"><?php echo '$'.$shipping_price.'.00';?>
                     				</span>
                     				
									<?php
									}else
									{ 
									?>	
										<span class="shipping_price_edit best_in_place"><?php echo " $0.00 ";?>
                     					</span>
                     					
								<?php } ?>

                    			</span>
                     			<span style="display:none;" class="shipping_price_form">
             						<form class="place" action="javascript:void(0);">
									<input class="form-control" type="text" id="shipping_price" onkeypress='return isNumber(event)' value="<?php echo $shipping_price;?>">
									<input type="hidden" id="id" value="<?php echo $po_id;?>">
									<input class="submit_shipping_price btn btn-success" type="button" value="Save" >
									<input class="cancle_shipping_price btn btn-default" type="button" value="Cancel" >
									</form>
								</span>
								<br><br>     
																	

								<b>Other Charges: </b>
								  
								<span class="other_charges">
                     				<?php $other_charges = $PurchaseOrder['PurchaseOrder']['other_charges'];?> 

                     				<?php if($other_charges!=''){
									?>
									
									<span class="other_charges_edit best_in_place"><?php echo $other_charges.'.0';?>
                     				</span>
                     				
									<?php
									}else
									{ 
									?>	
										<span class="other_charges_edit best_in_place"><?php echo " 0.0 ";?>
                     					</span>
                     					
								<?php } ?>

                    			</span>
                     			<span style="display:none;" class="other_charges_form">
             						<form class="place" action="javascript:void(0);">
									<input class="form-control" type="text" id="other_charges" onkeypress='return isNumber(event)' value="<?php echo $other_charges;?>">
									<input type="hidden" id="id" value="<?php echo $po_id;?>">
									<input class="submit_other_charges btn btn-success" type="button" value="Save" >
									<input class="cancle_other_charges btn btn-default" type="button" value="Cancel" >
									</form>
								</span>
								<br><br>


								<b>Discount percent: </b>
								   
								<span class="discount_percent">
                     				<?php $discount_percent = $PurchaseOrder['PurchaseOrder']['discount_percent'];?> 

                     				<?php if($discount_percent!=''){
									?>
									
									<span class="discount_percent_edit best_in_place"><?php echo $discount_percent;?>
                     				</span>
                     				
									<?php
									}else
									{ 
									?>	
										<span class="discount_percent_edit best_in_place"><?php echo " - ";?>
                     					</span>
                     					
								<?php } ?>

                    			</span>
                     			<span style="display:none;" class="discount_percent_form">
             						<form class="place" action="javascript:void(0);">
									<input class="form-control" type="text" id="discount_percent" onkeypress='return isNumber(event)' value="<?php echo $discount_percent;?>">
									<input type="hidden" id="id" value="<?php echo $po_id;?>">
									<input class="submit_discount_percent btn btn-success" type="button" value="Save" >
									<input class="cancle_discount_percent btn btn-default" type="button" value="Cancel" >
									</form>
								</span>
								<br><br>

								<b>User: </b>
								   
								<span class="user">
									<span id="user" class="best_in_place user_edit rec_"> <?php echo $user = $PurchaseOrder['PurchaseOrder']['user'];?></span>
                                </span>
                                <span style="display:none;" class="user_form">
                                 			
                                    <select  id="" class="select_user form-control" >
                                       	<option><?php echo $this->Session->read('Auth.User.first_name');?></option>
		                            </select>
                                    <input type="hidden"  id="id" value="<?php echo $po_id;?>">
											
                                </span>
		                        <br><br>			
							</div>
						</div>
					</div>
       				</div>
				</div>
			</div>
			</div>
		</div>
		<div class="col-xs-6 col-sm-6">
			<div class="panel panel-default">
				<div class="panel-heading"><i class="fa fa-user"></i>   Vendor Info 
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					Change: 
					<span class="vendor" style="color:#5f5f5f;">
                    <?php
                    	if(!empty($Vendor))
                       	{
                       		$name = $Vendor['Vendor']['name'];
                       	?>
                       		<span class="vendor_edit best_in_place" style="color:#5f5f5f;">
								<?php echo $name;?>
         					</span>
         				<?php
						} 
						else
                       	{
                       	?>	
							<span class="vendor_edit best_in_place" style="color:#5f5f5f;">
								<?php echo '-';?>
         					</span>
         					
						<?php 
                       	}?>

                    </span> 
         				                     
					<span style="display:none;" class="best_in_place vendor_form">
                        <form class="place" action="javascript:void(0);">
                            <select class="form-control vendor_select" >

                              	<?php foreach($vendorname as $key => $vendor){ ?>
								<option value='<?php echo $key;?>'>
								<?php echo $vendor;?> 
								</option> 
								<?php } ?>
                            </select>
                         		                                        
                        </form>
                 	</span> 
                 	&nbsp;&nbsp;&nbsp;
					<?php echo $this->Html->link('Manage Vendors',array('controller' => 'Vendors', 'action' => 'vendorlist'),array('escape'=>false,'target'=>"_blank"));?>

				</div>
				<div class="panel-body">
					<div class="panel-body customer_info">
					<div class="row">  
						<div class="col-xs-12 col-sm-12">
							<div class="form-group">  
								<?php if(!empty($Vendor))
								{									
									?>
									<p><?php echo $this->Html->link($Vendor['Vendor']['name'],array('controller' => 'Vendors', 'action' => 'vendorlist'),array('escape'=>false,'target'=>"_blank"));?></p>
									<p>Account # <?php echo $Vendor['Vendor']['account_number']?></p>
									<p><?php echo $Vendor['Vendor']['phone']?></p>
									<p>Rep <?php echo $Vendor['Vendor']['rep_first_name'].' '.$Vendor['Vendor']['rep_last_name']?></p>
									<p><?php echo $Vendor['Vendor']['email']?></p>
									 

									<?php
								}
								else
								{
									?>
									<p>Not attached to a vendor</p>
									<?php
								}?>											
							</div>
						</div>
					</div>
       				</div>
				</div>
			</div>
			
		</div>
	</div>


		

	<div class="purchaseform">
		

		<div class="row">  
			<div class="col-xs-6 col-sm-6">
				<div class="form-group">
				<div class="panel panel-default">
					<div class="panel-heading"><i class="fa fa-cog"></i>   Add 'Maintain Stock' Product from Inventory</div>
					<div class="panel-body">
						<div class="row">  
							<div class="col-xs-12 col-sm-12">
								<?php echo $this->Form->create('PurchaseOrder',array('controller'=>'PurchaseOrders','action'=>'addpurchaseitem','class'=>"validator-form",'id'=>"wizardForm")); ?>
								
								<div class="row" style="margin-top: 15px;">                 
									<div class="col-xs-12 col-sm-12">
										<div class="form-group">
															
											<?php echo $this->Form->input('Purchase.item', array('div'=>false,'class'=>'form-control','placeholder' => "Start typing the product's name",'required'=>'required','label'=>'Name','id'=>'product_name','required'=>'required')); ?>
										    <div id="product_found"></div>
										</div>
									</div>
								</div>

								
								<div class="row">                 
					                <div class="col-xs-12 col-sm-12">
										<div class="form-group">
										
											<?php echo $this->Form->input('Purchase.purchaseorder_id', array('type'=>'hidden', 'class'=>'form-control','value'=> $po_id)); ?>
											<?php echo $this->Form->input('Purchase.quantity', array('type'=>'text', 'class'=>'form-control','value'=> '1','onkeypress'=>'return isNumber(event)')); ?>  
										    
										</div>
									</div>
								</div>
																									
								<div class="row">                 
									<div class="col-xs-12 col-sm-12">
										<hr class="dotted">	
										<div class="btn-group">
											<?php echo $this->Form->button('Add Item', array('class' => 'btn btn-success pull-left')); ?>
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
		  
			<div class="col-xs-6 col-sm-6">
				<div class="form-group">
				<div class="panel panel-default">
					<div class="panel-heading"><i class="fa fa-cog"></i>  Add from UPC</div>
    				<div class="panel-body">
						<div class="row">  
							<div class="col-xs-12 col-sm-12">
								<?php echo $this->Form->create('PurchaseOrder',array('controller'=>'PurchaseOrders','action'=>'addpurchaseitembyupc','class'=>"validator-form",'id'=>"wizardForm")); ?>
								
								<div class="row" style="margin-top: 15px;">                 
									<div class="col-xs-12 col-sm-12">
										<div class="form-group">
															
											<?php echo $this->Form->input('Purchase.upc_code', array('div'=>false,'class'=>'form-control','required'=>'required','label'=>'Upc code')); ?>
										</div>
									</div>
								</div>


								<div class="row">                 
					                <div class="col-xs-12 col-sm-12">
										<div class="form-group">   
											<?php echo $this->Form->input('Purchase.quantity', array('type'=>'text','class'=>'form-control','label'=>'Quantity','value'=> '1','onkeypress'=>'return isNumber(event)')); ?> 
								
										</div>
									</div>
								</div>
								
								
								
								<div class="row">                 
					                <div class="col-xs-12 col-sm-12">
										<div class="form-group">
											
											<?php echo $this->Form->input('Purchase.purchaseorder_id', array('type'=>'hidden', 'class'=>'form-control','value'=> $po_id)); ?>
																					    
										</div>
									</div>
								</div>
																									
								<div class="row">                 
									<div class="col-xs-12 col-sm-12">
										<hr class="dotted">	
										<div class="btn-group">
											<?php echo $this->Form->button('Add Item', array('class' => 'btn btn-success pull-left')); ?>
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


	<div class="row">  
		<div class="col-xs-12 col-sm-12">
			<div class="form-group">
				<div class="panel panel-default">
					
        			<div class="panel-body">
						<div class="row">  
							<div class="col-xs-12 col-sm-12">
							<div class="form-group">
								
							<table cellpadding="0" cellspacing="0" border="0" class="table table-hover table-bordered custom-table-code table-responsive" id="basic-datatable">
       						<thead>
        					<tr>	 
	         					<th>Number</th>
					        	<th>Item</th>
	         					<th>UPC</th>
						        <th>Vendor SKU</th>
						        <th>Retail Price</th>
	          					<th>Order Qty.</th>
	          					<th>Cost</th>
	          					<th>Total</th>
	          					<th>Received Qty.</th>
	          					<th></th>
					        </tr>
		          			</thead>
					        
		          			<tbody class="userdata">
        					<?php $counter=0;$total=0;$tax=0;$string=''; ?>
          					<?php foreach($Purchase as $purchaseitem) {
          						$row_id =  ++$counter; 
          						$product_id = $purchaseitem['Purchase']['product_id']; ?> 
          					<tr>
          					<td><?php echo $row_id;?></td>
          					<td>
          						<?php $name= $purchaseitem['Purchase']['item'];
          						if($product_id!='0'){
          							echo $this->Html->link(ucfirst($name),array('controller' => 'products', 'action' => 'productedit',$product_id),array('escape'=>false,));
          						}
          						else{
          							echo $name;
          						}

          						?>
          					</td>

             				<td>
             					<?php echo $upc_code= $purchaseitem['Purchase']['upc_code'];?>
             				</td>
         					<td>
             					
							</td>
							<td>
             					<?php echo $rate= $purchaseitem['Purchase']['rate'].'.0';?>  
							</td>
             				<td>
             					<?php echo $quantity= $purchaseitem['Purchase']['quantity'];?>  
							</td>

							<td>
								<?php $price = $purchaseitem['Purchase']['cost'];?> 
								<div class="cost_<?php echo $row_id; ?>">
             						<?php $price = $purchaseitem['Purchase']['cost']?>
             						<span id="<?php echo $row_id; ?>" class="cost cost_edit_<?php echo $row_id; ?> best_in_place"><?php echo $price;?>
             						</span>
             						
             					</div>
             					<div style="display:none;" class="cost_form_<?php echo $row_id;?>" id="<?php echo $row_id; ?>" >
             						<form class="place" action="javascript:void(0);">
									<input type="text" class="form-control" name="price" id="cost_<?php echo $row_id;?>" value="<?php echo $price;?>" required>
									<input type="hidden"  id="id_<?php echo $row_id;?>" value="<?php echo $purchaseitem['Purchase']['id'];?>">
									<input class="submit_cost submitrt_<?php echo $row_id; ?> btn btn-success" type="button" value="Save" id="<?php echo $row_id; ?>">
									<input class="cancle_cost btn btn-default" type="button" value="Cancel" id="<?php echo $row_id; ?>">
									</form>
								</div>
							</td>
							<?php $cost=$quantity*$price;  
                         		$total=$total+$cost;
                         		
                         	?>

							<td><?php echo '$'.$cost.'.00';?></td>
							<td><?php echo '0';?></td>
							<td><?php echo $this->Html->link('<i class="btn btn-danger btn-sm fa fa-times"></i>',array('controller' => 'PurchaseOrders', 'action' => 'deletePurchaseitem',$purchaseitem['Purchase']['id'],$po_id),array('escape'=>false,'confirm' => 'Are you sure you wish to delete this Item?'));?>	</td>
      						</tr>  

      						
  							<?php } ?>  
  							<span class="total" style="display: none;"><?php echo $total;?></span>
    						</tbody>
    						<tfoot>
								<tr style="background-color: #ffffcc;">
									<th>Totals:</th>
									<th></th>
									<th></th>
									<th></th>
									<th></th>
									<th></th>
									<th></th>
									<th><?php echo '$'.$total.'.00';?></th>
									<th></th>
								</tr>
							</tfoot>

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
			
					
			

<!-- Vendor Update    -->

<script type="text/javascript">
$(document).ready(function() {
	  
	$(".vendor").click(function(){
		$(".vendor_form").show();
		$(this).hide();
	});
	$('.vendor_form').focusout(function(){
		$(this).hide();
		$(".vendor").show();
	});
    
	$('.vendor_select').change(function() {
		var vendor = $(this).val();
		var vendor_value = $(".vendor_select option:selected").text();

		var po_id = $("#po_id").text(); 

		//alert(vendor_value);alert(po_id); alert(vendor);die();
      
	    if(vendor!='')
	    {
	         $.ajax({
	         type: "POST",
	         url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/admin/PurchaseOrders/vendorupdate/",

	        // url: "search.php",
	         data: { vendor : vendor , po_id:po_id},
	      
	         success: function(data)
	         {
	          	window.location.reload();
	         }
	        });
	    }return false;    

  	});
});

</script>

<!-- Order Date Update -->

<script>
$(document).ready(function() {
  
$(".order_date_edit").click(function(){
$(".order_date_form").show();
$(".order_date").hide();
});

    
$(".cancle_order_date").click(function(){

$(".order_date").show();
$(".order_date_form").hide();
});   

$('.submit_order_date').click(function(){
		var order_date = $('#order_date').val();
		var po_id = $('#id').val();
		//alert(order_date);alert(po_id);die();		
		if(order_date!='')
		{
 			   $.ajax({
 			   type: "POST",
 			   url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/admin/PurchaseOrders/updateorderdate/",

 			  // url: "search.php",
 			   data: { order_date : order_date , po_id:po_id},
			
 			   success: function(data)
 			   {
  				 //window.location.reload();
  				 $(".order_date_form").hide();
            	 $(".order_date_edit").empty();
            	 $(".order_date_edit").append(order_date);
            	 $(".order_date_edit").removeAttr("style");
            	 $(".order_date").show();
  				//  $('#newDiv').html(jQuery(data).find('.result').html()); 
  			  }
  			  });
		}return false;    

	});


});
</script>


<!-- Order Date Update -->

<script>
$(document).ready(function() {
  
$(".due_date_edit").click(function(){
$(".due_date_form").show();
$(".due_date").hide();
});

    
$(".cancle_due_date").click(function(){

$(".due_date").show();
$(".due_date_form").hide();
});   

$('.submit_due_date').click(function(){
		var due_date = $('#due_date').val();
		var po_id = $('#id').val();
		//alert(due_date);alert(po_id);die();		
		if(due_date!='')
		{
 			   $.ajax({
 			   type: "POST",
 			   url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/admin/PurchaseOrders/updateduedate/",

 			  // url: "search.php",
 			   data: { due_date : due_date , po_id:po_id},
			
 			   success: function(data)
 			   {
  				 //window.location.reload();
  				 $(".due_date_form").hide();
            	 $(".due_date_edit").empty();
            	 $(".due_date_edit").append(due_date);
            	 $(".due_date_edit").removeAttr("style");
            	 $(".due_date").show();
  				//  $('#newDiv').html(jQuery(data).find('.result').html()); 
  			  }
  			  });
		}return false;    

	});


});
</script>


<!-- Paid Date Update -->

<script>
$(document).ready(function() {
  
	$(".paid_date_edit").click(function(){
		$(".paid_date_form").show();
		$(".paid_date").hide();
	});

    
	$(".cancle_paid_date").click(function(){
		$(".paid_date").show();
		$(".paid_date_form").hide();
	});   

	$('.submit_paid_date').click(function(){
		var paid_date = $('#paid_date').val();
		var po_id = $('#id').val();
		//alert(paid_date);alert(po_id);die();		
		if(paid_date!='')
		{
	 		$.ajax({
	 			type: "POST",
	 			url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/admin/PurchaseOrders/updatepaiddate/",
				data: { paid_date : paid_date , po_id:po_id},
				success: function(data)
	 			   	{
		  				$(".paid_date_form").hide();
		            	$(".paid_date_edit").empty();
		             	$(".paid_date_edit").append(paid_date);
		            	$(".paid_date_edit").removeAttr("style");
		            	$(".paid_date").show();
		  				//  $('#newDiv').html(jQuery(data).find('.result').html()); 
	  			  	}
	  		});
		}return false; 
	});
});
</script>


<!-- Number Update -->

<script>
$(document).ready(function() {
  
	$(".number_edit").click(function(){
		$(".number_form").show();
		$(".number").hide();
	});

    
	$(".cancle_number").click(function(){
		$(".number").show();
		$(".number_form").hide();
	});   

	$('.submit_number').click(function(){
		var number = $('#number').val();
		var po_id = $('#id').val();
		//alert(number);alert(po_id);die();		
		if(number!='')
		{
	 		$.ajax({
	 			type: "POST",
	 			url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/admin/PurchaseOrders/updatenumber/",
				data: { number : number , po_id:po_id},
				success: function(data)
	 			   	{
		  				$(".number_form").hide();
		            	$(".number_edit").empty();
		             	$(".number_edit").append(number);
		            	$(".number_edit").removeAttr("style");
		            	$(".number").show();
		  				//  $('#newDiv').html(jQuery(data).find('.result').html()); 
	  			  	}
	  		});
		}return false; 
	});
});
</script>



<!-- Delivery Tracking Update -->

<script>
$(document).ready(function() {
  
	$(".tracking_edit").click(function(){
		$(".tracking_form").show();
		$(".tracking").hide();
	});

    
	$(".cancle_tracking").click(function(){
		$(".tracking").show();
		$(".tracking_form").hide();
	});   

	$('.submit_tracking').click(function(){
		var tracking = $('#tracking').val();
		var po_id = $('#id').val();
		//alert(tracking);alert(po_id);die();		
		if(tracking!='')
		{
	 		$.ajax({
	 			type: "POST",
	 			url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/admin/PurchaseOrders/updatedeliverytracking/",
				data: { tracking : tracking , po_id:po_id},
				success: function(data)
	 			   	{
		  				$(".tracking_form").hide();
		            	$(".tracking_edit").empty();
		             	$(".tracking_edit").append(tracking);
		            	$(".tracking_edit").removeAttr("style");
		            	$(".tracking").show();
		  				//  $('#newDiv').html(jQuery(data).find('.result').html()); 
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
		$(".status_edit_").show();
		$(".status_").hide();
	});


	$('.status_edit_').focusout(function(){
		$(".status_edit_").hide();
		$(".status_").show();
	});
    
	$('.select_').change(function() {
		var status=$(this).val();
	    var po_id = $('#id_').val();
	   	//alert(status);alert(po_id);die();
	    if(status!='')
	    {
	        $.ajax({
	        type: "POST",
	        url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/admin/PurchaseOrders/statusupdate/",
	        // url: "search.php",
	        data: { status : status , po_id:po_id},
	      
	        success: function(data)
	        {
	            $(".status_edit_").hide();
	            $(".rec_").empty();
	            $(".rec_").append(status);
	            $(".rec_").show();
	            $(".status_").show();
	           
	          // window.location.reload();
	          //  $('#newDiv').html(jQuery(data).find('.result').html()); 
	        }
	        });
	    }return false;    
	});
});
</script>




<!-- Shipping Notes Update -->

<script>
$(document).ready(function() {
  
$(".shipping_notes_edit").click(function(){
$(".shipping_notes_form").show();
$(".shipping_notes").hide();
});

    
$(".shipping_notes_cancle").click(function(){

$(".shipping_notes").show();
$(".shipping_notes_form").hide();
});   

$('.shipping_notes_submit').click(function(){
		var shipping_notes = $('#shipping_notes').val();
		var po_id = $('#id').val();
		//alert(shipping_notes);alert(po_id);die();		
		if(shipping_notes!='')
		{
 			   $.ajax({
 			   type: "POST",
 			   url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/admin/PurchaseOrders/shippingnotesupdate/",

 			  // url: "search.php",
 			   data: { shipping_notes : shipping_notes , po_id:po_id},
			
 			   success: function(data)
 			   {
  				 //window.location.reload();
  				 $(".shipping_notes_form").hide();
            	 $(".shipping_notes_edit").empty();
            	 $(".shipping_notes_edit").append(shipping_notes);
            	 $(".shipping_notes_edit").removeAttr("style");
            	 $(".shipping_notes").show();
  				//  $('#newDiv').html(jQuery(data).find('.result').html()); 
  			  }
  			  });
		}return false;    

	});


});
</script>

<!-- General Notes Update -->

<script>
$(document).ready(function() {
  
$(".general_notes_edit").click(function(){
$(".general_notes_form").show();
$(".general_notes").hide();
});

    
$(".general_notes_cancle").click(function(){

$(".general_notes").show();
$(".general_notes_form").hide();
});   

$('.general_notes_submit').click(function(){
		var general_notes = $('#general_notes').val();
		var po_id = $('#id').val();
		//alert(general_notes);alert(po_id);die();		
		if(general_notes!='')
		{
 			   $.ajax({
 			   type: "POST",
 			   url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/admin/PurchaseOrders/generalnotesupdate/",

 			  // url: "search.php",
 			   data: { general_notes : general_notes , po_id:po_id},
			
 			   success: function(data)
 			   {
  				 //window.location.reload();
  				 $(".general_notes_form").hide();
            	 $(".general_notes_edit").empty();
            	 $(".general_notes_edit").append(general_notes);
            	 $(".general_notes_edit").removeAttr("style");
            	 $(".general_notes").show();
  				//  $('#newDiv').html(jQuery(data).find('.result').html()); 
  			  }
  			  });
		}return false;    

	});


});
</script>



<!-- Shipping Price Update -->

<script>
$(document).ready(function() {
  
	$(".shipping_price_edit").click(function(){
		$(".shipping_price_form").show();
		$(".shipping_price").hide();
	});

    
	$(".cancle_shipping_price").click(function(){
		$(".shipping_price").show();
		$(".shipping_price_form").hide();
	});   

	$('.submit_shipping_price').click(function(){
		var shipping_price = $('#shipping_price').val();
		var po_id = $('#id').val();
		//alert(shipping_price);alert(po_id);die();		
		if(shipping_price!='')
		{
	 		$.ajax({
	 			type: "POST",
	 			url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/admin/PurchaseOrders/updateshippingprice/",
				data: { shipping_price : shipping_price , po_id:po_id},
				success: function(data)
	 			   	{
		  				$(".shipping_price_form").hide();
		            	$(".shipping_price_edit").empty();
		             	$(".shipping_price_edit").append('$'+shipping_price+'.00');
		            	$(".shipping_price_edit").removeAttr("style");
		            	$(".shipping_price").show();
		  				//  $('#newDiv').html(jQuery(data).find('.result').html()); 
	  			  	}
	  		});
		}return false; 
	});
});
</script>


<!-- Other Charges Update -->

<script>
$(document).ready(function() {
  
	$(".other_charges_edit").click(function(){
		$(".other_charges_form").show();
		$(".other_charges").hide();
	});

    
	$(".cancle_other_charges").click(function(){
		$(".other_charges").show();
		$(".other_charges_form").hide();
	});   

	$('.submit_other_charges').click(function(){
		var other_charges = $('#other_charges').val();
		var po_id = $('#id').val();
		//alert(other_charges);alert(po_id);die();		
		if(other_charges!='')
		{
	 		$.ajax({
	 			type: "POST",
	 			url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/admin/PurchaseOrders/updateothercharges/",
				data: { other_charges : other_charges , po_id:po_id},
				success: function(data)
	 			   	{
		  				$(".other_charges_form").hide();
		            	$(".other_charges_edit").empty();
		             	$(".other_charges_edit").append(other_charges+'.0');
		            	$(".other_charges_edit").removeAttr("style");
		            	$(".other_charges").show();
		  				//  $('#newDiv').html(jQuery(data).find('.result').html()); 
	  			  	}
	  		});
		}return false; 
	});
});
</script>


<!-- Discount Percent Update -->

<script>
$(document).ready(function() {
  
	$(".discount_percent_edit").click(function(){
		$(".discount_percent_form").show();
		$(".discount_percent").hide();
	});

    
	$(".cancle_discount_percent").click(function(){
		$(".discount_percent").show();
		$(".discount_percent_form").hide();
	});   

	$('.submit_discount_percent').click(function(){
		var discount_percent = $('#discount_percent').val();
		var po_id = $('#id').val();
		//alert(discount_percent);alert(po_id);die();		
		if(discount_percent!='')
		{
	 		$.ajax({
	 			type: "POST",
	 			url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/admin/PurchaseOrders/updatediscountpercent/",
				data: { discount_percent : discount_percent , po_id:po_id},
				success: function(data)
	 			   	{
		  				$(".discount_percent_form").hide();
		            	$(".discount_percent_edit").empty();
		             	$(".discount_percent_edit").append(discount_percent);
		            	$(".discount_percent_edit").removeAttr("style");
		            	$(".discount_percent").show();
		  				//  $('#newDiv').html(jQuery(data).find('.result').html()); 
	  			  	}
	  		});
		}return false; 
	});
});
</script>


<!-- User Update -->

<script>

$(document).ready(function() {
  
	$(".user_edit").click(function(){
		$(".user_form").show();
		$(".user").hide();
	});


	$('.user_form').focusout(function(){
		$(".user_form").hide();
		$(".user").show();
	});
    
	$('.select_user').change(function() {
		var user=$(this).val();
	    var po_id = $('#id_').val();
	   	//alert(user);alert(po_id);die();
	    if(user!='')
	    {
	        $.ajax({
	        type: "POST",
	        url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/admin/PurchaseOrders/userupdate/",
	        // url: "search.php",
	        data: { user : user , po_id:po_id},
	      
	        success: function(data)
	        {
	            $(".user_form").hide();
	            $(".user_edit").empty();
	            $(".user_edit").append(user);
	            $(".user_edit").show();
	            $(".user").show();
	           
	          // window.location.reload();
	          //  $('#newDiv').html(jQuery(data).find('.result').html()); 
	        }
	        });
	    }return false;    
	});
});
</script>




<!-- Line Item Cost Update -->

<script>

$(document).ready(function() {
  
	$(".cost").click(function(){
		id = $(this).attr('id');
		$(".cost_form_"+id).show();
		$(".cost_"+id).hide();
	});


	    
	$(".cancle_cost").click(function(){
		id = $(this).attr('id');
		$(".cost_form_"+id).hide();
		$(".cost_"+id).show(); 
	});   

	$('.submit_cost').click(function(){
		id = $(this).attr('id');
		var cost = $('#cost_'+id).val();
		var purchase_id = $('#id_'+id).val();
		//alert(cost);		alert(purchase_id);die();
		
		if(cost!='')
		{
 			   $.ajax({
 			   type: "POST",
 			   url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/admin/PurchaseOrders/updatepurchaseitemcost/",

 			  // url: "search.php",
 			   data: { cost : cost , purchase_id:purchase_id},
			
 			   success: function(data)
 			   {
  				 //window.location.reload();
  				//  $('#newDiv').html(jQuery(data).find('.result').html()); 
  				$(".cost_form_"+id).hide();
            	$(".cost_edit_"+id).empty();
            	$(".cost_edit_"+id).append(cost);
            	$(".cost_"+id).show();
  			  }
  			  });
		}return false;    

	});
});
</script>



<!-- Purchase Total Update -->

<script>
$(document).ready(function() {


var total=$(".total").text();
var po_id =$("#po_id").text();
//alert(total);alert(po_id);die();
		if(total!='')
		{
 			   $.ajax({
 			   type: "POST",
 			   url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/admin/PurchaseOrders/updatepurchasetotal/",

 			  // url: "search.php",
 			   data: { total : total , po_id:po_id},
			
 			   success: function(data)
 			   {
  				 // window.location.reload();
  				//  $('#newDiv').html(jQuery(data).find('.result').html()); 
  			  }
  			  });
		}return false; 
});
</script>


<!-- Purchase Item Update -->

<script>
$(document).ready(function() {

var item =$("#string").text();
var order_id =$("#order_id").text();
//alert(item);alert(order_id);die();
	if(item!='')
	{
	   $.ajax({
		   		type: "POST",
 				url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/admin/Orders/updatepurchaseitem/",
				data: { item : item , order_id:order_id},
				success: function(data)
 				{
  				}
  			});
		}return false; 
});
</script>



<!-- Product Name -->

<script type="text/javascript">
$(document).ready(function(){
	$("#product_found").click(function(){
		$(this).hide();
	});
	$('#product_name').keyup(function(){

		var searchid = $(this).val();
		var dataString = searchid;
		//alert(dataString);die();
		$("#product_found").show();
		if(searchid!='')
		{
 			   $.ajax({
 			   type: "POST",
 			   url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/admin/Orders/product/",
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
            doc.save('Purchase details pdf.pdf');
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
     
    }());</script>

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