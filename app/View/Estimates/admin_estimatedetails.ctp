<?php echo $this->Flash->render('positive'); ?>
<div class="warper container-fluid" style="margin-bottom:60px;">
	<div class="page-header"><h1>Estimate Details
		<span class="pull-right">
	        
		<?php foreach($Estimates as $Inv) {?>
		<?php  	$status = $Inv['status'];
				$decline = $Inv['decline'];

		?>
		<input type="hidden" value="<?php echo $status;?>" id="app">
		<input type="hidden" value="<?php echo $decline;?>" id="dec">

		<?php 
	    if($status=='1' && $decline == '1')
	    {
	    ?>
	    	<?php echo $this->Html->link('Convert to Invoice', array('controller' => 'Invoices', 'action' => 'add','?' => array('user_id' => $Inv['user_id'])),array('escape' => FALSE,'class'=>"btn btn-success btn-sm" )); ?>
	    	<?php echo $this->Html->link('New Ticket', array('controller' => 'Tickets', 'action' => 'new',$Inv['user_id']),array('escape' => FALSE,'class'=>"btn btn-success btn-sm" )); ?>
			<a class="btn btn-default btn-sm" id="undodecline" data-method="put" rel="nofollow">Undo Declined</a>
			<span class="btn-group">
		        <a class="btn btn-default btn-sm dropdown-toggle" href="#" data-toggle="dropdown">Actions<span class="caret"></span></a>
		        <ul class="dropdown-menu"><?php  $id=$Inv['id'];?>
		          <li><?php echo $this->Html->link('<p class="menu-default">Delete</p>',array('controller'=>'Estimates','action'=>'deleteestimate',$id),array('escape'=>false,'confirm' => 'Are you sure you wish to delete this Estimate?'));?></li>
		        </ul>
			</span>
			<div class="btn btn-default btn-sm" data-toggle="modal" data-target="#myModal">PDF</div>
			<a class="btn btn-sm btn-warning " href="#" target="_blank">FAQ</a>
	    <?php 
	    }
	    elseif($status=='1' && $decline == '0')
	    {
	    ?>
	    	<?php echo $this->Html->link('Convert to Invoice', array('controller' => 'Invoices', 'action' => 'add','?' => array('user_id' => $Inv['user_id'])),array('escape' => FALSE,'class'=>"btn btn-success btn-sm" )); ?>
	    	<?php echo $this->Html->link('New Ticket', array('controller' => 'Tickets', 'action' => 'new',$Inv['user_id']),array('escape' => FALSE,'class'=>"btn btn-success btn-sm" )); ?>

			<a class="btn btn-default btn-sm" id="unapprove" data-method="put" rel="nofollow">Undo Approved</a>
			<span class="btn-group">
		        <a class="btn btn-default btn-sm dropdown-toggle" href="#" data-toggle="dropdown">Actions<span class="caret"></span></a>
		        <ul class="dropdown-menu"><?php  $id=$Inv['id'];?>
		          <li><?php echo $this->Html->link('<p class="menu-default">Delete</p>',array('controller'=>'Estimates','action'=>'deleteestimate',$id),array('escape'=>false,'confirm' => 'Are you sure you wish to delete this Estimate?'));?></li>
		        </ul>
	      	</span>
			<div class="btn btn-default btn-sm" data-toggle="modal" data-target="#myModal">PDF</div>
			<a class="btn btn-sm btn-warning " href="#" target="_blank">FAQ</a>
	    <?php 
	    }
	    elseif($status=='0' && $decline == '1')
	    {
	    ?>
	    	<?php echo $this->Html->link('Convert to Invoice', array('controller' => 'Invoices', 'action' => 'add','?' => array('user_id' => $Inv['user_id'])),array('escape' => FALSE,'class'=>"btn btn-success btn-sm" )); ?>
	    	<?php echo $this->Html->link('New Ticket', array('controller' => 'Tickets', 'action' => 'new',$Inv['user_id']),array('escape' => FALSE,'class'=>"btn btn-success btn-sm" )); ?>
	    
			<a class="btn btn-default btn-sm" id="undodecline" data-method="put" rel="nofollow">Undo Declined</a>
			<span class="btn-group">
		        <a class="btn btn-default btn-sm dropdown-toggle" href="#" data-toggle="dropdown">Actions<span class="caret"></span></a>
		        <ul class="dropdown-menu"><?php  $id=$Inv['id'];?>
		          
		          <li><?php echo $this->Html->link('<p class="menu-default">Delete</p>',array('controller'=>'Estimates','action'=>'deleteestimate',$id),array('escape'=>false,'confirm' => 'Are you sure you wish to delete this Estimate?'));?></li>
		        </ul>
	      	</span>
			<div class="btn btn-default btn-sm"  data-toggle="modal" data-target="#myModal">PDF</div>
			<a class="btn btn-sm btn-warning " href="#" target="_blank">FAQ</a>
	    <?php 
	    }
	    else
	    {
	    ?>
	    	<?php echo $this->Html->link('Convert to Invoice', array('controller' => 'Invoices', 'action' => 'add','?' => array('user_id' => $Inv['user_id'])),array('escape' => FALSE,'class'=>"btn btn-success btn-sm" )); ?>
	    	<?php echo $this->Html->link('New Ticket', array('controller' => 'Tickets', 'action' => 'new',$Inv['user_id']),array('escape' => FALSE,'class'=>"btn btn-success btn-sm" )); ?>
	    
			<a class="btn btn-success btn-sm" id="approve" data-method="put" rel="nofollow">Approve</a>
			<a class="btn btn-warning btn-sm" id="decline" data-method="put" rel="nofollow">Decline</a>
	 		<span class="btn-group">
		        <a class="btn btn-default btn-sm dropdown-toggle" href="#" data-toggle="dropdown">Actions<span class="caret"></span></a>
		        <ul class="dropdown-menu"><?php  $id=$Inv['id'];?>
		          
		          <li><?php echo $this->Html->link('<p class="menu-default">Delete</p>',array('controller'=>'Estimates','action'=>'deleteestimate',$id),array('escape'=>false,'confirm' => 'Are you sure you wish to delete this Estimate?'));?></li>
		        </ul>
	      	</span>
			<div class="btn btn-default btn-sm"  data-toggle="modal" data-target="#myModal" >PDF</div>
			<a class="btn btn-sm btn-warning " href="#" target="_blank">FAQ</a>
		<?php 
	   	}
	   	?>
		<?php } ?> 
      	</span></h1>
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
							<?php foreach($Estimates as $Inv) {
								 $status = $Inv['status'];

								 if($status=='1')
								 {
								 	?>
								 	<label>
						      <div id="approved">
								<?php echo $this->Html->image('approved.png', array('alt' => 'Image','width'=>'250', 'height'=>'50')); ?>
							   </div></label>
								<?php } 
								 }
							?>
						      


						    <div class="two fields" style="margin-top:10px;">
						       	<div class="text-left" >
						     
							        <label for=""><?php echo $user['User']['first_name']." "; ?><?php echo $user['User']['last_name']; ?></label><br>
							        <label for=""> <?php echo $user['User']['address'].'<br>'.$user['User']['city'].' '.$user['User']['state_country'].' '.$user['User']['zip']; ?></label>
						        
						       	</div>
						       	<div class="text-right" style="margin-top:-50px;">
						       
						         <label for=""><?php foreach($Estimates as $Inv) {?>
									Estimate #         <span> <?php echo ''.$Inv['est_number'];?></span><br>
									<?php } ?> </label><br>
						        <label for=""> <?php foreach($Estimates as $Inv) {?>
									Estimate Date  <span><?php echo ''.date('D d-m-Y g:i A',strtotime($Inv['created']));?></span><br>
									<?php } ?> </label><br>

								 <label for=""> <?php foreach($Estimates as $Inv) {?>
									Total <span> <?php echo '$'.$Inv['total'].".00";?></span><br>
									<?php } ?> </label><br>
						              
						       	</div>
						    </div>
						    <h4 class="ui top attached header">Line Items</h4>
						    <div class="ui bottom attached segment">     
						        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped custom-table-code table-bordered table-responsive">
						            <thead style="background-color;#A9A9A9;">
						                <tr >	 
						                <th>#</th>
										<th>Item</th>
						                <th>Description</th>
										<th>Qty</th>
										<th>Rate</th>
						                <th>Unit Extended</th>        
										</tr>
									</thead>
									<tbody class="userdata"><?php $counter=0;$total=0;$tax=0;$string=''; ?>
										<?php foreach($Inventory as $Inv) {
						                $row_id =  ++$counter; ?>
						                <tr>
											<td><?php echo $row_id;?> </td>
						                    <td><?php echo $item= $Inv['Inventory']['item'];?></td>
						                    <div id="itemstring" style="display:none;"><?php echo $string .= $item.',';;?></div>
						                    <td><?php echo $des= $Inv['Inventory']['description'];?></td> 
						                    <td>
						                    	<div class="quantity_<?php echo $row_id; ?>" >
						                        <?php echo $qty=$Inv['Inventory']['quantity'];?>
						                        </div>
											</td>
						                    <td><?php echo '$'.$rate= $Inv['Inventory']['rate'];  ?></td>
						                    <?php $tax_rate= $Inv['Inventory']['tax_rate'];  ?>
						                    <?php $price=$qty*$rate;  
						                    $total=$price+$total;
						                    $tax=$tax_rate+$tax;
						                    ?>
											<td><?php echo '$'.$price;  ?></td>
										</tr>  
										<?php } ?> 
									</tbody>
									<tbody>
									<tr class="print-hide">
										<td colspan="3">
										<b style="font-size:20px;">THIS IS AN ESTIMATE 	</b><br>
										<b style="font-size:10px;">Disclaimer 	</b><br>
										</td>
										<td style="padding: 0px;" colspan="3">
										<table class="table" width="100%">
										<tbody>
											<tr>
												<td align="left">Subtotal:</td>
												<td align="left"><?php echo '$'.$total.'.00';?></td>
												<?php $subtotal=$total;?>
											</tr>
											<tr>
												<td align="left"> Tax:</td>
												<td align="left"><?php echo '$'.$tax.'.00';?></td>
													<?php $ta=$tax;?>
													<?php $count= $ta+$subtotal;?>
											</tr>
											<tr>
												<td align="left" > Total:</td>
												<td align="left"><strong><?php echo '$'.$count.'.00';?></strong></td>
											</tr>
										</tbody>
										</table>
										</td>
									</tr>
									</tbody>
						        </table>    
						    </div>
						    <div class="two fields" style="margin-top:100px;">
						       	
						       	<div class="text-left" >
									<?php $signature = $Estimates['Estimate']['signature'];?>
									<?php
										if($signature!=''){
										?>
								        <div class="pdfsigPadValue"  style="width:400px;margin-top: 20px;">		
											<canvas height="110" width="398"></canvas>
										</div>
													
										<?php
										}
										?>
							    	<label for=""> Signed : </label>
								</div>

						       	<div class="text-right" style="margin-top:-20px;">
						         

						          <label for=""> 
									Date </label>


						        <label for=""> <?php foreach($Estimates as $Inv) {?>
									 <span><?php echo ''.date('D d-m-Y g:i A',strtotime($Inv['created']));?></span><br>
									<?php } ?> </label>					            
						       	</div>
						    </div>

						</form>
			    	</div>
			    </div>
			</div>
        </div>
    </div>
  
<!-- Modal Pdf-->


	<div class="panel-body">
		<div class="panel-body">

			<div id="pdfdiv">
				<div class="row">  
					<div class="col-xs-12 col-sm-6">
						<div class="form-group">
							
						<div class="panel panel-default">
							<div class="panel-heading"><i class="fa fa-user"></i>    Bill To Customer
							</div>
    						<div class="panel-body">
								<div class="row">  
									<div class="col-xs-12 col-sm-12">
									<div class="form-group">
										<?php $user_id=$user['User']['id'];?><br><br>
										<b>Business Name:  <span><?php echo $user['User']['business_name'];?></span></b><br><br>
										<b>Name: </b><?php $user_name = $user['User']['first_name'].' '.$user['User']['last_name']; 
											echo $this->Html->link(ucfirst($user_name),array('controller' => 'users', 'action' => 'userdetail',$user_id),array('escape'=>false,));
											?>
										<br><br>
										<b>Email: </b><?php echo $user['User']['email']; ?><br><br>
										
										<b>Address: </b><?php $address= $user['User']['address'].' '.$user['User']['city'].' '.$user['User']['state_country'].' '.$user['User']['zip']; 
										?>
										<a target="_blank" href="https://maps.google.fr/maps?q=<?php echo $address;?>"> <?php echo ' '.$address;?>
                            			</a><br><br>
										<strong>Office: </strong><?php
										if(!empty($phone)){
											foreach ($phone as $ph) {
												$phone_type	= $ph['Phone']['phone_type'];

												if($phone_type=='Office')
												{
													echo $ph['Phone']['phone_number'];
												}
											}
											
										}
										?><br><br>
										<strong>Get SMS: </strong><?php $sms= $user['User']['sms_service'];
										if($sms==1){echo "True";} ?>
										
									</div>
									</div>
								</div>
           					</div>
						</div>
						</div>
					</div>

					<div class="col-xs-12 col-sm-6" id="estimate">
						<div class="form-group">
							<div class="panel panel-default">
								<div class="panel-heading"><i class="fa fa-money"></i>    Estimate Details
								
									<?php  echo $this->Html->link('<i class="fa fa-edit"></i>',array('controller'=>'Estimates','action'=>'editingestimate',$Estimates['Estimate']['id']),array('escape'=>false));?>

								</div>
        						<div class="panel-body est">
        							<?php  $status = $Estimates['Estimate']['status'];
                         				if($status=='1')
                       					{
                         					?><div id="approved">
											<?php echo $this->Html->image('approved.png', array('alt' => 'Image','width'=>'250', 'height'=>'50')); ?>
											</div><?php 
                         				}
                         				else
                         				{
                          					
                         				}
                         			?> 

                         			<?php  $decline = $Estimates['Estimate']['decline'];
                         				if($decline=='1')
                       					{
                         					?><div id="decline">
											<?php echo $this->Html->image('declined.png', array('alt' => 'Image','width'=>'250', 'height'=>'50')); ?>
											</div><?php 
                         				}
                         				else
                         				{
                          					 
                         				}
                         			?>
        							<div class="row">  
										<div class="col-xs-12 col-sm-12"> 
										<div class="form-group" >
										<div id="est_id" style="display:none;"><?php echo $est_id = $Estimates['Estimate']['id'];?></div>
										<br><br>
										<b>Estimate Number:  </b><span><?php echo $Estimates['Estimate']['est_number'];?></span><br><br>
										<b>Estimate Date:  </b><?php echo date('D d-m-Y g:i A',strtotime($Estimates['Estimate']['created']));?><br><br>

										<b>Linked Ticket:</b><?php $ticket_id=$Estimates['Estimate']['ticket_id'];
										if($ticket_id!='0')
										{
											echo " ".$this->Html->link($ticket_id,array('controller'=>'Tickets','action'=>'ticketdetails',$ticket_id),array('escape'=>false));
										}
										else
										{
											echo "";
										}
										?><br>	<br>
										<b>Linked Invoice:</b><?php $invoice_id=$Estimates['Estimate']['invoice_id'];
										if($invoice_id!='0')
										{
											echo " ".$this->Html->link($invoice_id,array('controller'=>'Invoices','action'=>'invoicedetails',$invoice_id),array('escape'=>false));
										}
										else
										{
											echo "";
										}
										?><br>	<br>
										<b>Created By: </b><?php echo $Estimates['Estimate']['created_by'];?><br><br>
										
										<p>Non-Taxable Estimate </p><br>
										<b>Tax: </b><?php echo $Estimates['Estimate']['tax'];?><br><br>	
										<b>Sub Total: </b><?php echo '$'.$Estimates['Estimate']['total'].".00";?><br><br>
										<b>Total: </b><?php echo '$'.$Estimates['Estimate']['total'].".00";?><br><br>
										
										<b>Tech Notes: </b><?php echo $Estimates['Estimate']['tech_notes'];?><br><br>

											
									
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
									<div class="panel-heading"><i class="fa fa-money"></i>    Line Items
									</div>
            						<div class="panel-body">

										

										<div class="row">  
											<div class="col-xs-12 col-sm-12">
											<div class="form-group">
												
											<table cellpadding="0" cellspacing="0" border="0" class="table table-striped custom-table-code table-bordered table-responsive" id="basic-datatable">
                       						<thead>
                        					<tr>	 
                         					<th>#</th>
								        	<th>Item</th>
                         					<th>Description</th>
									        <th>Qty</th>
									        <th>Rate</th>
                          					<th>Tax</th>
									        <th>Unit Extended</th>        
									        <th></th>                  
							         		</tr>
						          			</thead>
						          			<tbody class="userdata">
                        					<?php $counter=0;$total=0;$tax=0;$string=''; ?>
                          					<?php foreach($Inventory as $Inv) {
                          						$row_id =  ++$counter; ?>
                          					<tr>
                          					<td><?php echo $row_id;?> </td>
                             				<td>
                             					<div class="itemname itemname_<?php echo $row_id; ?>">
                             						<?php $item= $Inv['Inventory']['item'];?>
                             						<span id="<?php echo $row_id; ?>" class="item item_name_<?php echo $row_id; ?> best_in_place"><?php echo $item;?>
                             						</span>
                             						
                             					</div>
                             					<div style="display:none;" class="item_edit_<?php echo $row_id;?>" id="<?php echo $row_id; ?>" >
                             						<form class="place" action="javascript:void(0);">
													<input type="text" name="price" id="item_<?php echo $row_id;?>" value="<?php echo $item;?>" class="form-control" required>
													<input type="hidden"  id="id_<?php echo $row_id;?>" value="<?php echo $Inv['Inventory']['id'];?>">
													<input class="submititem btn btn-success" type="button" value="Save" id="<?php echo $row_id; ?>">
													<input class="cancleitem btn btn-default" type="button" value="Cancel" id="<?php echo $row_id; ?>">
													</form>
												</div>
											</td>
                             			<div id="itemstring" style="display:none;"><?php echo $string .= $item.',';;?>
                             					
                             				</div>
                             				
                             				
                             				<td>
                             					<div class="description description_<?php echo $row_id; ?>">
                             						<?php $des= $Inv['Inventory']['description'];?>
                             						<span id="<?php echo $row_id; ?>" class="des description_data_<?php echo $row_id; ?> best_in_place"><?php echo $des;?>
                             						</span>
                             						
                             					</div>
                             					<div style="display:none;" class="des_edit_<?php echo $row_id;?>" id="<?php echo $row_id; ?>" >
                             						<form class="place" action="javascript:void(0);">
													<input type="text" name="price" id="des_<?php echo $row_id;?>" value="<?php echo $des;?>" class="form-control" required>
													<input type="hidden"  id="id_<?php echo $row_id;?>" value="<?php echo $Inv['Inventory']['id'];?>">
													<input class="submitdes btn btn-success" type="button" value="Save" id="<?php echo $row_id; ?>">
													<input class="cancledes btn btn-default" type="button" value="Cancel" id="<?php echo $row_id; ?>">
													</form>
												</div>
											</td>



                             				<td>
                             					<div class="quantity_<?php echo $row_id; ?>">
                             						<?php $qty=$Inv['Inventory']['quantity'];?>
                             						<span id="<?php echo $row_id; ?>" class="qty rec_<?php echo $row_id; ?> best_in_place"><?php echo $qty?>
                             						
                             					</div>
                             					<div style="display:none;" class="qty_edit_<?php echo $row_id;?>" id="<?php echo $row_id; ?>" >
                             						<form class="place" action="javascript:void(0);">
													<input type="number" class="form-control" name="price" id="qty_<?php echo $row_id;?>" value="<?php echo $qty;?>" required>
													<input type="hidden"  id="id_<?php echo $row_id;?>" value="<?php echo $Inv['Inventory']['id'];?>">
													<input class="submit submitqty_<?php echo $row_id; ?> btn btn-success" type="button" value="Save" id="<?php echo $row_id; ?>">
													<input class="cancle btn btn-default" type="button" value="Cancel" id="<?php echo $row_id; ?>">
													</form>
												</div>
											</td>
                             				
                             				<td>
                             					<div class="rate_<?php echo $row_id; ?>">
                             						<?php $rt=$Inv['Inventory']['rate'];?>
                             						<span id="<?php echo $row_id; ?>" class="rt rec_<?php echo $rt; ?>  best_in_place"><?php echo '$'.$rt;?>
                             						</span>
                             						
                             					</div>
                             					<div style="display:none;" class="rt_edit_<?php echo $row_id;?>" id="<?php echo $row_id; ?>" >
                             						<form class="place" action="javascript:void(0);">
													<input type="number" class="form-control" name="price" id="rt_<?php echo $row_id;?>" value="<?php echo $rt;?>" required>
													<input type="hidden"  id="id_<?php echo $row_id;?>" value="<?php echo $Inv['Inventory']['id'];?>">
													<input class="submitrt btn btn-success submitrate_<?php echo $row_id; ?>" type="button" value="Save" id="<?php echo $row_id; ?>">
													<input class="canclert btn btn-default" type="button" value="Cancel" id="<?php echo $row_id; ?>">
													</form>
												</div>
											</td>
                                            </div>
                                           
                                            <?php $tax_rate= $Inv['Inventory']['tax_rate'];  ?>
                                           <td> <?php  $tx= $Inv['Inventory']['tax'];  
                                            if ($tx=='1') {
                                             	echo "Yes";
                                             }
                                             else{
                                             	echo "No";
                                             } ?></td>
                             				
                             				<?php $price=$qty*$rt;  
                             				$total=$price+$total;
                             				$tax=$tax_rate+$tax;
                             				?>
											<td><?php echo '$'.$price;  ?></td>
											<td><?php echo $this->Html->link('<i class="btn btn-danger btn-sm fa fa-times"></i>',array('controller' => 'Inventories', 'action' => 'deleteInventory',$Inv['Inventory']['id']),array('escape'=>false,'confirm' => 'Are you sure you wish to delete this Item?'));?></td>
                      						</tr>  




                  							 <?php } ?> 


                  							 <div id="string" style="display:none;"><?php echo $string1=$string; ;?>
                             					
                             				</div>

                    						</tbody>
                    						<tbody>
											<tr class="print-hide">
												<td colspan="6"> </td>
												<td style="padding: 0px;" colspan="2">
												<table class="table-bordered" width="100%">
												<tbody>
												<tr>
													<td align="left">Subtotal:</td>
													
													<td align="left"><?php echo '$'.$total.'.00';?></td>
													<?php $subtotal=$total;?>
												</tr>
												<tr>
													<td align="left"> Tax:</td>

													<td align="left"><?php echo '$'.$tax.'.00';?></td>
													<?php $ta=$tax;?>
													<?php $count= $ta+$subtotal;?>
												</tr>
												<tr>
												<td align="left"> Total:</td>
												<div id="total" style="display:none;"><?php echo $count;?></div>
												<td align="left"><strong><?php echo '$'.$count.'.00';?></strong></td>
												</tr>
												</tbody>
												</table>
												</td>
											</tr>
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
	<div class="lineitem">
		<div class="row">  
			<div class="col-xs-6 col-sm-6">
				<div class="form-group">
							
				<div class="panel panel-default">
				<div class="panel-heading"><i class="fa fa-cog"></i>   Add From Inventory</div>
            	<div class="panel-body">
				<div class="row">  
				<div class="col-xs-12 col-sm-12">
				<div class="form-group">
				<div class="panel-body">
 
				<?php echo $this->Form->create('Inventory',array('controller'=>'inventories','action'=>'addinventory')); ?>
				
				<div class="row">                 
                    <div class="col-xs-12 col-sm-12">
						<div class="form-group">
					
                 		<?php echo $this->Form->input('Inventory.item', array('div'=>false,'class'=>'form-control','placeholder' => "Start typing the product's name",'id'=>'get_data','required'=>'required','label'=>'Item')); ?>

                 		<?php echo $this->Form->input('Inventory.estimate_id', array('type'=>'hidden', 'class'=>'form-control','value'=> $est_id )); ?>
                 		<?php echo $this->Form->input('Inventory.user_id', array('type'=>'hidden', 'class'=>'form-control','value'=> $user_id )); ?>

                 		<div id="result"></div>
						</div>
                    </div>
               </div>
               <div class="row">                 
                    <div class="col-xs-12 col-sm-12">
						<div class="form-group">
						      
							<?php echo $this->Form->input('Inventory.quantity', array('type'=>'number','id'=>'qty','class'=>'form-control','label'=>'Quantity','required'=>'required')); ?>
						</div>
                    </div>
                </div>
				
				<div class="row">                 
					<div class="col-xs-12 col-sm-12">
					<hr class="dotted">	
						<div class="btn-group">
							<?php echo $this->Form->button('<i class="fa fa-plus"></i>Create Line item', array('class' => 'btn btn-success pull-left')); ?>
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
			
				<div class="form-group">
				<div class="panel panel-default">
				<div class="panel-heading"><i class="fa fa-cog"></i>   Add From Barcode
				</div>
            	<div class="panel-body">
				<div class="row">  
				<div class="col-xs-12 col-sm-12">
				<div class="form-group">
				<div class="panel-body">
 
				<?php echo $this->Form->create('Inventory',array('controller'=>'inventories','action'=>'addinventorybyupc','class'=>'validator-form')); ?>
				
				<div class="row">                 
                    <div class="col-xs-12 col-sm-12">
						<div class="form-group">
					
                 		<?php echo $this->Form->input('Inventory.upc_code', array('div'=>false,'class'=>'form-control','id'=>'get_data1','required'=>'required','label'=>'Upc code')); ?>

                 		<?php echo $this->Form->input('Inventory.estimate_id', array('type'=>'hidden', 'class'=>'form-control','value'=> $est_id )); ?>
                 		<?php echo $this->Form->input('Inventory.user_id', array('type'=>'hidden', 'class'=>'form-control','value'=> $user_id )); ?>

						</div>
                    </div>
               	</div>
               	<div class="row">                 
                    <div class="col-xs-12 col-sm-12">
						<div class="form-group">
						      
							<?php echo $this->Form->input('Inventory.quantity', array('type'=>'number','id'=>'qty','class'=>'form-control','label'=>'Quantity')); ?>
						</div>
                    </div>
                </div>
				
				<div class="row">                 
					<div class="col-xs-12 col-sm-12">
					<hr class="dotted">	
						<div class="btn-group">
							<?php echo $this->Form->button('<i class="fa fa-plus"></i>Create Line item', array('class' => 'btn btn-success pull-left')); ?>
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


			<div class="col-xs-6 col-sm-6">
				<div class="form-group">
							
					<div class="panel panel-default">
						<div class="panel-heading"><i class="fa fa-cog"></i>   Add Manual Item </div>
            			<div class="panel-body">
							<div class="row">  
								<div class="col-xs-12 col-sm-12">
								<div class="form-group">
								<div class="panel-body">
 
								<?php echo $this->Form->create('Inventory',array('controller'=>'inventories','action'=>'addinventorymanualy','class'=>'validator-form')); ?>
				
								<div class="row">                 
				                    <div class="col-xs-12 col-sm-12">
										<div class="form-group">
									
				                 		<?php echo $this->Form->input('Inventory.item', array('div'=>false,'class'=>'form-control','required'=>'required','label'=>'Item','options' => array('Default' => 'Default', 'Hardware' => 'Hardware','iphone' => 'iphone','Labor' => 'Labor'))); ?>
				                 		

				                 		<?php echo $this->Form->input('Inventory.estimate_id', array('type'=>'hidden', 'class'=>'form-control','value'=> $est_id )); ?>
				                 		<?php echo $this->Form->input('Inventory.user_id', array('type'=>'hidden', 'class'=>'form-control','value'=> $user_id )); ?>

										</div>
				                    </div>
				               </div>
				               <div class="row">                 
				                    <div class="col-xs-12 col-sm-12">
										<div class="form-group">
										      
											<?php echo $this->Form->input('Inventory.description', array('type'=>'text','class'=>'form-control','label'=>'Name','required'=>'required')); ?>
										</div>
				                    </div>
				                </div>

				               
				                <div class="row">                 
				                    <div class="col-xs-12 col-sm-12">
										<div class="form-group">
										      
											<?php echo $this->Form->input('Inventory.cost', array('type'=>'number','class'=>'form-control','label'=>'Cost','required'=>'required')); ?>
										</div>
				                    </div>
				                </div>

					            <div class="row">                 
					                <div class="col-xs-12 col-sm-12">
										<div class="form-group">
									      
											<?php echo $this->Form->input('Inventory.rate', array('type'=>'number','class'=>'form-control','label'=>'Price','required'=>'required')); ?>
										</div>
					                </div>
					            </div>
									
								<div class="row">                 
				                    <div class="col-xs-12 col-sm-12">
										<div class="form-group">
										      
											<?php echo $this->Form->input('Inventory.quantity', array('type'=>'number','id'=>'qty','class'=>'form-control','label'=>'Quantity','required'=>'required')); ?>
												
										</div>
				                    </div>
				                </div>

				                <div class="row">                 
				                    <div class="col-xs-12 col-sm-12">
										<div class="form-group">
										      
												<?php echo $this->Form->input('Inventory.tax', array('div'=>false,
													'type'=>'checkbox','label'=>'Taxable','required'=>'required')); ?>
										</div>
				                    </div>
				                </div>

								<div class="row">                 
									<div class="col-xs-12 col-sm-12">
									<hr class="dotted">	
										<div class="btn-group">
											<?php echo $this->Form->button('<i class="fa fa-plus"></i>Create Line item', array('class' => 'btn btn-success pull-left')); ?>
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
	</div>


	<?php 
	if(!empty($Ticket))
	 	{ ?>
	 	<div class="row">  
			<div class="col-xs-12 col-sm-12">
				<div class="form-group">
						
					<div class="panel panel-default">
						<div class="panel-heading"><i class="fa fa-tags"></i>    Related Ticket
						</div>
        				<div class="panel-body">
							<div class="row">  
								<div class="col-xs-12 col-sm-12">
								<div class="form-group">
									
								<table cellpadding="0" cellspacing="0" border="0" class="table table-striped custom-table-code table-bordered table-responsive" id="basic-datatable">
           						<thead>
            					<tr>	 
                 					<th>ID</th>
						        	<th>Created</th>
                 					<th>Subject</th>
							        <th>Location</th>
							        <th>Issue Type</th>
              					</tr>
			          			</thead>
			          			<tbody class="userdata">
            					<?php $counter=0;$total=0;$tax=0;$string=''; ?>
              					<?php  foreach($Ticket as $ticket) {
              						$row_id =  ++$counter;?>
              					<tr>
                  					<td><?php $id = $ticket['id']; 
                  					echo $this->Html->link($id,array('controller'=>'Tickets','action'=>'ticketdetails',$id),array('escape'=>false));
                  					?></td>
                     				<td><?php echo date('D d-m-Y g:i A',strtotime($ticket['created']));?></td>
                     				<td><?php echo $ticket['title'];?></td>
									<td><?php echo $ticket['address'];?></td>
                     				<td><?php echo $ticket['type'];?></td>
                                <?php } ?> 
								</tr>
      							</tbody>
      							</table>    
									
      							<?php if(!empty($comment)){

      							foreach($comment as $comm) {?>
											<?php $status=$comm['Comment']['status'];?>
										<div class="row">  
											<div class="col-xs-12 col-sm-12">
											<div class="form-group">
												
											<table class="table table-striped table-bordered ticket-table">
											<tbody>
											<?php if($status=='private')
											{?>
											<tr>
												<td style="background-color: #FFFF99;">
												<b>Comment Made At:</b>
													<?php echo $comm['Comment']['created_at']?>
												</td>
												<td style="background-color: #FFFF99;">
													<b>Update by:</b>
													<?php echo $comm['Comment']['by']?>
												</td>
												<td style="background-color: #FFFF99;">
													<b>Subject:</b>
													<?php echo $comm['Comment']['subject']?>
													<?php $comment_id=$comm['Comment']['id']?>
												</td>
												<td style="background-color: #FFFF99;">
													<?php echo $this->Html->link('<i class="btn-danger btn btn-sm fa fa-times"></i>',array('controller'=>'Comments','action'=>'deletecomment',$comment_id,$ticket_id),array('escape'=>false,'confirm' => 'Are you sure you wish to delete this Comment?'));?>
													</a>
												</td>
											</tr>
											<tr>
												<td class="comment-body-13346644" style="background-color: #FFFF99;word-break: break-word;" colspan="4">
												<p><?php echo $comm['Comment']['comment']?></p>
												</td>
											</tr>
											<?php }
											else
												{?>
													<tr>
												<td>
												<b>Comment Made At:</b>
												<?php echo $comm['Comment']['created_at']?>
												</td>
												<td>
													<b>Update by:</b>
													<?php echo $comm['Comment']['by']?>
												</td>
												<td>
													<b>Subject:</b>
													<?php echo $comm['Comment']['subject']?>
													<?php $comment_id=$comm['Comment']['id']?>
													
												</td>
												<td>
													
													<?php echo $this->Html->link('<i class="btn-danger btn btn-sm fa fa-times"></i>',array('controller'=>'Comments','action'=>'deletecomment',$comment_id,$ticket_id),array('escape'=>false,'confirm' => 'Are you sure you wish to delete this Comment?'));?>
												</a>
												</td>
											</tr>
											<tr>
												<td class="comment-body-13346644" style="word-break: break-word;" colspan="4">
												<p><?php echo $comm['Comment']['comment']?></p>
												</td>
											</tr>
											<?php }?>
											</tbody>
											</table>
												
											</div>
											</div>


										</div>
                   						
									<?php } } ?>


								</div>
								</div>
							</div>
               			</div>
					</div>
				</div>
			</div>
		</div>
	<?php } ?>


	<!-- Change History Panel -->
	<div class="row">  
	<div class="panel panel-default col-md-12">
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
					<td style="vertical-align: middle;"><?php echo $log['Log']['employee'];?></td>
					<td>
					<?php $property = $log['Log']['changes'];
                       		
                        if($property!='')
                        {
                           	$json = json_decode($property, true);
                           	
                           	$edit = $log['Log']['edit'];
                           
                           	if($edit!="")
                           	{
							   	echo '<p><b>customer_id to: </b>'.$Estimates['Estimate']['id'].'</p>';
							   	echo '<p><b>number to : </b>'.$json['Estimate']['est_number'].'</p>';
							   	echo '<p><b>date to : </b>'.date('D d-m-Y g:i A',strtotime($Estimates['Estimate']['created'])).'</p>';
							   	echo '<p><b>tax_rate to: </b>'.$json['Estimate']['tax_rate'].'</p>';
								echo '<p><b>ticket_id to: </b>'.$json['Estimate']['ticket_id'].'</p>';
								echo '<p><b>invoice_id to: </b>'.$json['Estimate']['invoice_id'].'</p>';
								echo '<p><b>tech_notes to: </b>'.$json['Estimate']['tech_notes'].'</p>';
								
							}
							else
							{
								echo '<p><b>customer_id to: </b>'.$Estimates['Estimate']['id'].'</p>';
							   	echo '<p><b>number to : </b>'.$json['Estimate']['est_number'].'</p>';
							   	echo '<p><b>date to : </b>'.date('D d-m-Y g:i A',strtotime($Estimates['Estimate']['created'])).'</p>';								   
								
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



	<div class="row"> 
		<div class="col-xs-3 col-sm-3">
		</div> 
		<div class="col-xs-6 col-sm-6">
		<?php //pr($Estimates);?>
		<?php //pr($user);?>
			<div class="form-group">
				<div class="panel panel-default">
					<div class="panel-heading"><i class="fa fa-user"></i>     Signature
					<?php $estimate_id = $Estimates['Estimate']['id']?>
					<?php echo $this->Html->link('Clear',array('controller' => 'Estimates', 'action' => 'clearsignature',$user_id,$estimate_id),array('class'=>'pull-right','escape'=>false,));?>

					</div>
					<div class="panel-body">
					<div class="signature" style="display: none;"><?php echo $signature = $Estimates['Estimate']['signature'];?></div>
					<?php if($signature=='')
					{?>

						<div class="row">  
							<div class="col-xs-12 col-sm-12">
								<?php echo $this->Form->create('Estimate',array('controller'=>'Estimates','action'=>'addsignature','class'=>"validator-form")); ?>

									<div class="sigPad" id="smoothed" style="width:400px;margin-top: 20px;">

										<label for="name">Print your name</label>
											<input id="name" class="name form-control" type="text" value="<?php echo $user_name;?>" disable="disable">
											<input class="form-control" type="hidden" value="<?php echo $estimate_id;?>" name='estimate[estimate_id]'>
											<input class="form-control" type="hidden" value="<?php echo $user_id;?>" name='estimate[user_id]'>

										<p class="drawItDesc" style="display: block;">Draw your signature</p>
									<ul class="sigNav">
										<li class="drawIt"><a href="#draw-it" >Sign Here</a></li>
										<li class="clearButton"><a href="#clear">Clear</a></li>
									</ul>
									<div class="sig sigWrapper" style="height:auto;">
										<div class="typed"></div>
										<canvas class="pad" height="110" width="398"></canvas>
										<input type="hidden" name="estimate[signature]" class="output">
									</div>
									<button type="submit">I accept the terms.</button>
									</div>

									
								<?php echo $this->Form->end(); ?>	
								
							</div>
						</div>
					<?php
					}
					else{
					?>		
						
						<div class="sigPadValue" style="width:400px;margin-top: 20px;">
							<canvas height="110" width="398"></canvas>
						</div>

					<?php	} ?>


					</div>
				</div>
			</div>
		</div>
		<div class="col-xs-3 col-sm-3">
		</div>
	</div>

</div>
</div>
</div>	

<script src="<?php echo $this->webroot.'js/jquery/jquery-1.9.1.min.js'?>"></script>
<script type="text/javascript">
$(document).ready(function(){
//$('#fresh').show();
//$('#approved').hide();

$('#approve').click(function(){

	//$('#fresh').hide();
	//$('#approved').show();
	$('#approve').hide();
	$('#decline').hide();
	$('#unapprove').show();

	});

$('#unapprove').click(function(){
	//$('#fresh').show();
	//$('#approved').hide();
	$('#approve').show();
	$('#decline').show();
	$('#unapprove').hide();
	

	});

$('#decline').click(function(){
	//$('#fresh').show();
	//$('#approved').hide();
	
	//$('#fresh').hide();
	//$('#approved').show();
	$('#approve').hide();
	$('#decline').hide();
	$('#Undodecline').show();



	});

$('#undodecline').click(function(){
	//$('#fresh').show();
	//$('#approved').hide();
	$('#approve').show();
	$('#decline').show();
	$('#unapprove').hide();


	});
});
</script>

<script type="text/javascript">
$(document).ready(function(){
	$('#approve').click(function(){

		var id =$('#est_id').text();
		//alert("sada");
		//alert(id);
		$("#estimate").load();
		if(id!='')
		{
 			   $.ajax({
 			   type: "POST",
 			   url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/admin/Estimates/approve/",

 			  // url: "search.php",
 			   data: { id : id },
			
 			   success: function(data)
 			   {
 			   	location.reload();
  				  //$("#result").html(jQuery(data).find('.result').html()); 
  				//  $('#newDiv').html(jQuery(data).find('.result').html()); 
  			  }
  			  });
		}return false;    

	});
});
</script>

<script type="text/javascript">
$(document).ready(function(){
	$('#unapprove').click(function(){

		var id =$('#est_id').text();
		$("#estimate").load();
		if(id!='')
		{
 			   $.ajax({
 			   type: "POST",
 			   url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/admin/Estimates/unapprove/",

 			  // url: "search.php",
 			   data: { id : id },
			
 			   success: function(data)
 			   {
 			   	location.reload();
  				  //$("#result").html(jQuery(data).find('.result').html()); 
  				//  $('#newDiv').html(jQuery(data).find('.result').html()); 
  			  }
  			  });
		}return false;    

	});
});
</script>

<script type="text/javascript">
$(document).ready(function(){
	$('#decline').click(function(){

		var id =$('#est_id').text();
		$("#estimate").load();
		if(id!='')
		{
 			   $.ajax({
 			   type: "POST",
 			   url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/admin/Estimates/decline/",

 			  // url: "search.php",
 			   data: { id : id },
			
 			   success: function(data)
 			   {
 			   	location.reload();
  				  //$("#result").html(jQuery(data).find('.result').html()); 
  				//  $('#newDiv').html(jQuery(data).find('.result').html()); 
  			  }
  			  });
		}return false;    

	});
});
</script>

<script type="text/javascript">
$(document).ready(function(){
	$('#undodecline').click(function(){

		var id =$('#est_id').text();
		$("#estimate").load();
		if(id!='')
		{
 			   $.ajax({
 			   type: "POST",
 			   url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/admin/Estimates/undodecline/",

 			  // url: "search.php",
 			   data: { id : id },
			
 			   success: function(data)
 			   {
 			   window.location.reload();
  				  //$("#result").html(jQuery(data).find('.result').html()); 
  				//  $('#newDiv').html(jQuery(data).find('.result').html()); 
  			  }
  			  });
		}return false;    

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
 			   url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/admin/Estimates/inventory/",

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
  
$(".qty").click(function(){
  id = $(this).attr('id');
$(".qty_edit_"+id).show();
$(".quantity_"+id).hide();
});

    
$(".cancle").click(function(){
//var id = $(".cancle").closest("div").prop("id");
id = $(this).attr('id');
		//alert(id);
$(".qty_edit_"+id).hide();
$(".quantity_"+id).show(); 
});   

$('.submit').click(function(){
id = $(this).attr('id');
$(".submitqty_"+id).val("Working....");
		var qty = $('#qty_'+id).val();
		var inv_id = $('#id_'+id).val();
		//alert(qty);
		//alert(inv_id);
		
		if(qty!='')
		{
 			   $.ajax({
 			   type: "POST",
 			   url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/admin/Estimates/inventoryupdateqty/",

 			  // url: "search.php",
 			   data: { qty : qty , inv_id:inv_id},
			
 			   success: function(data)
 			   {
  				 window.location.reload();
  				//  $('#newDiv').html(jQuery(data).find('.result').html()); 
  			  }
  			  });
		}return false;    

	});


});
</script>

<script>
$(document).ready(function() {
  
$(".des").click(function(){
  id = $(this).attr('id');
$(".des_edit_"+id).show();
$(".description_"+id).hide();
});

    
$(".cancledes").click(function(){
//var id = $(".cancle").closest("div").prop("id");
id = $(this).attr('id');
		//alert(id);
$(".des_edit_"+id).hide();
$(".description_"+id).show(); 
});   

$('.submitdes').click(function(){
id = $(this).attr('id');
		var des = $('#des_'+id).val();
		var inv_id = $('#id_'+id).val();
		//alert(des);
		//alert(sale_id);die();
		
		if(des!='')
		{
 			   $.ajax({
 			   type: "POST",
 			   url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/admin/Estimates/inventoryupdatedes/",

 			  // url: "search.php",
 			   data: { des : des , inv_id:inv_id},
			
 			   success: function(data)
 			   {
  				 //window.location.reload();
  				//  $('#newDiv').html(jQuery(data).find('.result').html()); 
  				$(".des_edit_"+id).hide();
            	$(".description_data_"+id).empty();
            	$(".description_data_"+id).append(des);
            	$(".description").show();
  			  }
  			  });
		}return false;    

	});


});
</script>

<script>
$(document).ready(function() {
  
$(".rt").click(function(){
  id = $(this).attr('id');
$(".rt_edit_"+id).show();
$(".rate_"+id).hide();
});

    
$(".canclert").click(function(){
//var id = $(".cancle").closest("div").prop("id");
id = $(this).attr('id');
		//alert(id);
$(".rt_edit_"+id).hide();
$(".rate_"+id).show(); 
});   

$('.submitrt').click(function(){
	
	id = $(this).attr('id');
	$(".submitrate_"+id).val("Working....");
		var rt = $('#rt_'+id).val();
		var inv_id = $('#id_'+id).val();
		//alert(rt);
		//alert(inv_id);die();
		
		if(rt!='')
		{
 			   $.ajax({
 			   type: "POST",
 			   url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/admin/Estimates/inventoryupdaterate/",

 			  // url: "search.php",
 			   data: { rt : rt , inv_id:inv_id},
			
 			   success: function(data)
 			   {
  				 window.location.reload();
  				//  $('#newDiv').html(jQuery(data).find('.result').html()); 
  				//$(".des_edit_"+id).hide();
            	//$(".description_"+id).empty();
            	//$(".description_"+id).append(des);
            	//$(".description_"+id).show();
  			  }
  			  });
		}return false;    

	});


});
</script>

<script>
$(document).ready(function() {
  
$(".item").click(function(){
  id = $(this).attr('id');
$(".item_edit_"+id).show();
$(".itemname_"+id).hide();
});

    
$(".cancleitem").click(function(){
//var id = $(".cancle").closest("div").prop("id");
id = $(this).attr('id');
		//alert(id);
$(".item_edit_"+id).hide();
$(".itemname_"+id).show(); 
});   

$('.submititem').click(function(){
id = $(this).attr('id');
		var item = $('#item_'+id).val();
		var inv_id = $('#id_'+id).val();
		//alert(item);
		//alert(inv_id);die();
		
		if(item!='')
		{
 			   $.ajax({
 			   type: "POST",
 			   url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/admin/Estimates/inventoryupdateitem/",

 			  // url: "search.php",
 			   data: { item : item , inv_id:inv_id},
			
 			   success: function(data)
 			   {
  				 //window.location.reload();
  				//  $('#newDiv').html(jQuery(data).find('.result').html()); 
  				$(".item_edit_"+id).hide();
            	$(".item_name_"+id).empty();
            	$(".item_name_"+id).append(item);
            	$(".itemname").show();
  			  }
  			  });
		}return false;    

	});


});
</script>


<script>
$(document).ready(function() {


var total=$("#total").text();
var est_id =$("#est_id").text();
		if(total!='')
		{
 			   $.ajax({
 			   type: "POST",
 			   url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/admin/Estimates/updateestimate/",

 			  // url: "search.php",
 			   data: { total : total , est_id:est_id},
			
 			   success: function(data)
 			   {
  				 // window.location.reload();
  				//  $('#newDiv').html(jQuery(data).find('.result').html()); 
  			  }
  			  });
		}return false; 
});
</script>

<script>
$(document).ready(function() {

var item =$("#string").text();
var est_id =$("#est_id").text();
		if(item!='')
		{
 			   $.ajax({
 			   type: "POST",
 			   url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/admin/Estimates/updateestimateitem/",

 			  // url: "search.php",
 			   data: { item : item , est_id:est_id},
			
 			   success: function(data)
 			   {
  				  //window.location.reload();
  				//  $('#newDiv').html(jQuery(data).find('.result').html()); 
  			  }
  			  });
		}return false; 
});
</script>

<script>
$(document).ready(function() {

var app =$("#app").val();
var dec =$("#dec").val();
if(app=="1" || dec=="1"){
	$(".lineitem").hide();

}
else
{
	$(".lineitem").show();
}
		
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
            doc.save('Estimate details pdf.pdf');
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



<!-- Signature Pad -->

<link href="<?php echo $this->webroot.'signature_pad/jquery.signaturepad.css'?>" rel="stylesheet"/>
<script src="<?php echo $this->webroot.'signature_pad/numeric-1.2.6.min.js'?>"></script>

<script src="<?php echo $this->webroot.'signature_pad/bezier.js'?>"></script>

<script src="<?php echo $this->webroot.'signature_pad/jquery.signaturepad.js'?>"></script>

<script src="<?php echo $this->webroot.'signature_pad/json2.min.js'?>"></script>
<script>
    $(document).ready(function() {
      $('#linear').signaturePad({drawOnly:true, lineTop:200});
      $('#smoothed').signaturePad({drawOnly:true, drawBezierCurves:true, lineTop:200});
      $('#smoothed-variableStrokeWidth').signaturePad({drawOnly:true, drawBezierCurves:true, variableStrokeWidth:true, lineTop:200});
    });

    var sig = $('.signature').text();
   	$(document).ready(function () {
   		if(sig!='')
   		{
	  		$('.sigPadValue').signaturePad({displayOnly:true}).regenerate(sig);
	  		$('.pdfsigPadValue').signaturePad({displayOnly:true}).regenerate(sig);
	  	}
	});
</script> 