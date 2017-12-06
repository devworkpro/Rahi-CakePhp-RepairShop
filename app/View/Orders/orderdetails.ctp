<?php echo $this->Flash->render('positive'); ?>

<div class="warper container-fluid" style="margin-bottom:60px;">
	<div class="page-header"><h1>Purchase Details
	<span class="pull-right">
	<div class="btn btn-success btn-sm" data-toggle="modal" data-target="#myModal" >PDF</div>
	<?php echo $this->Html->link('Back',array('controller' => 'orders', 'action' => 'orderlist'),array('escape'=>false,'class'=>'btn btn-default'));?>
	</div>
	</span>
	</h1>
	

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
			    <?php 
					$paid = $order['Order']['paid'];
					if($paid=='1')
					 {
					 	?>
					 	<label>
			      		<div id="approved">
						<?php 
							echo $this->Html->image('paid.png', array('alt' => 'Image','width'=>'250', 'height'=>'50'));
					 	?>
				   		</div></label>
					<?php 
					}
					else
			        {
			           	echo $this->Html->image('unpaid.png', array('alt' => 'Image','width'=>'250', 'height'=>'40'));
			        }
			 
				?>
		      
			    <div class="two fields" style="margin-top:10px;">
			    	<div class="text-left" >
			    		
			        	<label for=""><?php echo $user['User']['first_name']." ".$user['User']['last_name']; ?></label><br>

			        	<label for=""> <?php echo $user['User']['address'].'<br>'.$user['User']['city'].' '.$user['User']['state_country'].' '.$user['User']['zip']; ?></label><br>

			        	<label for="">Identification: <?php echo ''.$order['Order']['identification'];?></label>
			        
			       	</div>
			       	<div class="text-right" style="margin-top:-90px;">
			       
				        <label for="">
							Purchase #         <span> <?php echo ''.$order['Order']['id']?></span><br>
						</label><br>

				        <label for=""> 
							Purchase Date  <span><?php echo ''.date('D d-m-Y g:i A',strtotime($order['Order']['created']));?></span><br>
						</label><br>

						<label for="">
							Paid Date  <span>
							<?php $pay_date = $order['Order']['pay_date'];
							if($pay_date !='') 
							{
							echo ''.date('D d-m-Y g:i A',strtotime($pay_date));
							} ?></span><br>
						</label><br>

						<label for="">
						<pre1>
							Amount Paid <span> <?php echo '<b>$'.$order['Order']['total'].".00</b>";?></span><br>
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
		                <th>Unit Cost</th>
						<th>Quantity</th>
						<th>Line Total</th>        
						</tr>
					</thead>
					<tbody class="userdata">
            			<?php $counter=0;$total=0;$tax=0;$string=''; ?>
              			<?php foreach($purchase as $purchaseitem) {
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
								<?php echo '$'.$price= $purchaseitem['Purchase']['price'];?>
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
      					<div class="total" style="display: none;"><?php echo $total;?></div>
						<tr>
						
							<td class="text-right" colspan="4">
							<strong>Total</strong>
							</td>
							<td>
							<strong><?php echo '$'.$total.'.00';?></strong>
							</td>
						
						</tr>
						<tr>
						
							<td colspan="3">
							<strong><h3>Thank you for your business!</h3></strong>
							</td>
							<td colspan="2">
							</td>						
						</tr>

      							
        			</tbody>
        		</table>
				</div>
		      


				<div class="two fields" style="margin-top:100px;">
				    <div class="text-left" >
				    <?php $signature = $order['Order']['signature'];?>
				    <?php
				        if($signature!=''){
				        ?>
				        <div class="pdfsigPadValue"  style="width:400px;margin-top: 20px;">		
							<canvas height="110" width="398"></canvas>
						</div>
							
				        <?php }
				    ?>
				    <label for=""> Signed : </label>
				        
				    </div>
				    <div class="text-right" style="margin-top:-20px;" >
				        <label for=""> Date </label>
				        <label for="">
							<span><?php echo ''.date('D d-m-Y g:i A',strtotime($order['Order']['created']));?></span><br>
						</label>


				            
				    </div>
				</div>
			</form>
     		</div>
       		</div>
		</div>
    </div>
</div>
  
<!-- Modal Pdf-->

		

		<div class="row"> 
			<div class="col-xs-1 col-sm-1">
			</div> 
			<div class="col-xs-5 col-sm-5">
				<div class="form-group">
					<div class="panel panel-default">
						<div class="panel-heading"> Customer Information </div>
        				<div class="panel-body">
							<div class="panel-body customer_info">
							<div class="row">  
								<div class="col-xs-12 col-sm-12">
									<div class="form-group">
										<span id="user_id" style="display: none;"><?php echo $user_id= $user['User']['id'];?></span>
										<span id="order_id"  style="display: none;"><?php echo $order_id = $order['Order']['id']; ?></span>
										<b>Customer:</b>
										<?php $customer_name = $user['User']['first_name'].' '.$user['User']['last_name'];
										echo $this->Html->link(ucfirst($customer_name),array('controller' => 'users', 'action' => 'userdetail',$user_id),array('escape'=>false,));?>	


										<br><br>
										<div id="paid" style="display: none;"><?php echo $order['Order']['paid'];?></div>
										<?php 
											$paid = $order['Order']['paid'];
											if($paid=='1')
											{
											?>
											 	<div class="alert alert-success">
													<b>Paid on:</b>
														<?php echo $order['Order']['pay_date']?>
													<p>
													<b>Amount:</b>
														<?php echo '$'.$order['Order']['total'].'.00'?>
													</p>
													<p>
													
													<?php echo $this->Html->link('Undo Payment',array('controller' => 'Orders', 'action' => 'undopayment',$order_id),array('class'=>'btn btn-danger btn-sm', 'escape'=>false,'confirm' => 'Are you sure?'));?>

													</p>										
												</div>
											<?php 
											}
											else
									        {
									        }
			 
										?>


										<b>Identification: </b>


										<span class="identification">
                             				<?php $identification = $order['Order']['identification'];?>

                             				<?php if($identification!=''){
											?>
											
											<span class="identificationedit best_in_place"><?php echo $identification;?>
                             				</span>
                             				
											<?php
											}else
											{ 
											?>	
												<span class="identificationedit best_in_place" style="color: #d3d3d3;border: medium none;font-style: italic;"><?php echo 'click to add';?>
                             					</span>
                             					
										<?php } ?>

                            			</span>
                             			<span style="display:none;" class="identificationform">
                     						<form class="place" action="javascript:void(0);">
											<input class="form-control" type="text" id="identification" value="<?php echo $identification;?>">
											<input type="hidden" id="id" value="<?php echo $order['Order']['id'];?>">
											<input class="submit btn btn-success" type="button" value="Save" >
											<input class="cancle btn btn-default" type="button" value="Cancel" >
											</form>
										</span>
										                             					
										<br><br>




										<b>Status:</b>
										<span class="status_">
	                         				<span data-bip-skip-blur="true" class="best_in_place status rec_"> <?php echo $status = $order['Order']['status'];?>
	                            			</span>                                      
	                        			</span>
				                        <span style="display:none;" class="status_edit_">
				                          	<form action="javascript:void(0);">
				                            	<select class="select_ form-control">
						                            <option> Estimate </option>
						                            <option>Waiting on Refurb</option>
						                            <option>Waiting on Restock</option>
						                            <option>Added to Inventory</option>
						                            <option>Completed</option>
						                            
				                            	</select>
				                            	<input type="hidden"  id="id_" value="<?php echo $order['Order']['id'];?>">
				                            </form>
				                        </span>


										<br><br>
										<b>General Notes:</b><br>

										<span class="general_notes">
                             				<?php $general_notes = $order['Order']['general_notes'];?>
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
											<input type='textarea' class="form-control" id="general_notes" required="required" value="<?php echo $general_notes;?>" >
											<input type="hidden" id="id" value="<?php echo $order['Order']['id'];?>">
											<input class="general_notes_submit btn btn-success" type="button" value="Save" >
											<input class="general_notes_cancle btn btn-default" type="button" value="Cancel" >
											</form>
											</pre1>
										</span>
										
										        
																						
									</div>
								</div>
							</div>
               				</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-5 col-sm-5">
			</div>
			<div class="col-xs-1 col-sm-1">
			</div>
		</div>


		<div class="row">  
			<div class="col-xs-1 col-sm-1">
			</div>
			<div class="col-xs-10 col-sm-10">
				<div class="form-group">
					<div class="panel panel-default">
						<div class="panel-heading"><i class="fa fa-desktop"></i>    Purchases
						</div>
            			<div class="panel-body">
							<div class="row">  
								<div class="col-xs-12 col-sm-12">
								<div class="form-group">
									
								<table cellpadding="0" cellspacing="0" border="0" class="table table-hover table-bordered custom-table-code table-responsive" id="basic-datatable">
           						<thead>
            					<tr>	 
             					<th>Name</th>
					        	<th>Description</th>
             					<th>Condition</th>
						        <th>Unique ID</th>
						        <th>Quantity</th>
              					<th>Cost</th>
						        </tr>
			          			</thead>
						        
			          			<tbody class="userdata">
            					<?php $counter=0;$total=0;$tax=0;$string=''; ?>
              					<?php foreach($purchase as $purchaseitem) {
              						$row_id =  ++$counter; 
              						$product_id = $purchaseitem['Purchase']['product_id']; ?>
              					<tr>
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

              					<div id="itemstring" style="display:none;"><?php echo $string .= $name.',';?>
                             	</div>

                 				<td>
                 					<?php echo $description= $purchaseitem['Purchase']['description'];?>
                 				</td>
             					<td>
                 					<?php echo $condition= $purchaseitem['Purchase']['condition'];?> 
								</td>
								<td>
                 					<?php echo $unique_id= $purchaseitem['Purchase']['unique_id'];?> 
								</td>
                 				<td>
                 					<?php echo $quantity= $purchaseitem['Purchase']['quantity'];?> 
								</td>

								<td>
									<?php echo '$'.$price= $purchaseitem['Purchase']['price'];?>
								</td>
								
								<td><?php echo $this->Html->link('<i class="btn btn-danger btn-sm fa fa-times"></i>',array('controller' => 'Purchases', 'action' => 'deletePurchaseitem',$purchaseitem['Purchase']['id'],$order_id),array('escape'=>false,'confirm' => 'Are you sure you wish to delete this Item?'));?></td>
          						</tr>  

          						<?php $cost=$quantity*$price;  
                             		$total=$total+$cost;
                             		
                             	?>


      							<?php } ?> 
      							<tr>
      								<td class="text-right" colspan="5">
										<strong>Total</strong>
									</td>
									<td>
									<strong><?php echo '$'.$total.'.00';?></strong>
									</td>
									<td colspan="1"> </td>
      							</tr>
      							
								
      							 <div id="string" style="display: none;"><?php echo $string1 = $string; ?>
                 					
                 				</div>

        						</tbody>
        						

      							</table>    
									
								</div>

								<?php echo $this->Html->link('Pay Out',array('controller' => 'orders', 'action' => 'pay',$order_id),array('escape'=>false,'class'=>'btn btn-success payout  pull-right'));?>
								</div>


							</div>
           				</div>
					</div>
				</div>
			</div>
		</div>

	









	<div class="purchaseform">


		<div class="row">  
			<div class="col-xs-1 col-sm-1">
			</div>
			<div class="col-xs-5 col-sm-5">
				<div class="form-group">
				<div class="panel panel-default">
					<div class="panel-heading">Add Item to the Purchase (Serialized Inventory Item)</div>
					<div class="panel-body">
						<div class="row">  
							<div class="col-xs-12 col-sm-12">
								<?php echo $this->Form->create('Purchase',array('controller'=>'Purchases','action'=>'addpurchaseitem','class'=>"validator-form",'id'=>"wizardForm")); ?>
								
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
											<?php echo $this->Form->input('Purchase.unique_id', array('div'=>false,'type'=>'text','class'=>'form-control','label'=>'Unique Identifier (Serial Number or IMEI)')); ?>
										</div>
									</div>
								</div>
								<div class="row">                 
					                <div class="col-xs-12 col-sm-12">
										<div class="form-group">
											<?php echo $this->Form->input('Purchase.condition', array('type'=>'text', 'class'=>'form-control','label'=>'Item Condition')); ?>
										</div>
									</div>
								</div>
								<div class="row">                 
					                <div class="col-xs-12 col-sm-12">
										<div class="form-group">
											<?php echo $this->Form->input('Purchase.price', array('type'=>'text', 'class'=>'form-control','label'=>'Price','placeholder' => "00.0",'onkeypress'=>'return isNumber(event)')); ?>
											<?php echo $this->Form->input('Purchase.order_id', array('type'=>'hidden', 'class'=>'form-control','value'=> $order_id)); ?>
											<?php echo $this->Form->input('Purchase.quantity', array('type'=>'hidden', 'class'=>'form-control','value'=> '1')); ?>  
										    
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
		  
			<div class="col-xs-5 col-sm-5">
				<div class="form-group">
				<div class="panel panel-default">
					<div class="panel-heading">Add Item to the Purchase (Manual New Inventory Item)</div>
    				<div class="panel-body">
						<div class="row">  
							<div class="col-xs-12 col-sm-12">
								<?php echo $this->Form->create('Purchase',array('controller'=>'Purchases','action'=>'addPurchasemanualy','class'=>"validator-form",'id'=>"wizardForm")); ?>
								
								<div class="row" style="margin-top: 15px;">                 
									<div class="col-xs-12 col-sm-12">
										<div class="form-group">
															
											<?php echo $this->Form->input('Purchase.item', array('div'=>false,'class'=>'form-control','required'=>'required','label'=>'Name','required'=>'required')); ?>
										</div>
									</div>
								</div>

								<div class="row">                 
					                <div class="col-xs-12 col-sm-12">
										<div class="form-group">   
											<?php echo $this->Form->input('Purchase.description', array('div'=>false,'type'=>'textarea','class'=>'form-control','label'=>'Description','required'=>'required')); ?>
										</div>
									</div>
								</div>

								<div class="row">                 
					                <div class="col-xs-12 col-sm-12">
										<div class="form-group">   
											<?php echo $this->Form->input('Purchase.category', array('div'=>false,'class'=>'form-control','required'=>'required','label'=>'Product category','options' => array(''=>'','Default' => 'Default', 'Hardware' => 'Hardware','iphone' => 'iphone','Labor' => 'Labor'))); ?>
										</div>
									</div>
								</div>
								<div class="row">                 
					                <div class="col-xs-12 col-sm-12">
										<div class="form-group">   
											<?php echo $this->Form->input('Purchase.quantity', array('class'=>'form-control','value'=> '1')); ?> 
								
										</div>
									</div>
								</div>
								
								<div class="row">                 
					                <div class="col-xs-12 col-sm-12">
										<div class="form-group">   
											<?php echo $this->Form->input('Purchase.unique_id', array('div'=>false,'type'=>'text','class'=>'form-control','label'=>'Unique Identifier (Serial Number or IMEI)')); ?>
										</div>
									</div>
								</div>
								<div class="row">                 
					                <div class="col-xs-12 col-sm-12">
										<div class="form-group">
											<?php echo $this->Form->input('Purchase.condition', array('type'=>'text', 'class'=>'form-control','label'=>'Item Condition')); ?>
										</div>
									</div>
								</div>
								<div class="row">                 
					                <div class="col-xs-12 col-sm-12">
										<div class="form-group">
											<?php echo $this->Form->input('Purchase.price', array('type'=>'text', 'class'=>'form-control','label'=>'Price','placeholder' => "00.0",'onkeypress'=>'return isNumber(event)')); ?>
											<?php echo $this->Form->input('Purchase.order_id', array('type'=>'hidden', 'class'=>'form-control','value'=> $order_id)); ?>
																					    
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
			<div class="col-xs-1 col-sm-1">
			</div>
		</div>

	</div>

		<div class="row"> 
			<div class="col-xs-1 col-sm-1">
			</div> 
			<div class="col-xs-10 col-sm-10">
				<div class="form-group">
					<div class="panel panel-default">
						<div class="panel-heading">Comments/Notes</div>
						<div class="panel-body">
							<div class="row">  
								<div class="col-xs-6 col-sm-6">
									<div class="form-group">
										<?php echo $this->Form->create('Comment',array('controller'=>'Purchases','action'=>'addcommentbyorder','class'=>"validator-form")); ?>
											<div class="row" style="margin-top: 20px;">    
											<div class="col-xs-12 col-sm-12">
													<div class="form-group">
														<?php echo $this->Form->input('Comment.comment', array('type'=>'textarea','class'=>'form-control','required'=>'required','label'=>'Add Comment/Note')); ?>
														<?php echo $this->Form->input('Comment.order_id', array('type'=>'hidden', 'class'=>'form-control','value'=> $order_id)); ?>
														<?php $a=$this->Session->read('Auth.User.first_name');?>
														<?php echo $this->Form->input('Comment.by', array('type'=>'hidden', 'class'=>'form-control','value'=> $a)); ?>
															  
													</div>
												</div>
											</div>
														

												               
											<div class="row">                 
												<div class="col-xs-12 col-sm-12">
												<div class="btn-group">
												<?php echo $this->Form->button('Add Comment', array('class' => 'btn btn-success pull-left')); ?>
												</div>
												</div>
											</div>		
										<?php echo $this->Form->end(); ?>	
													
									</div>
								</div>
								<div class="col-xs-6 col-sm-6">
								<div class="row" style="margin-top: 20px;">                 
									<div class="col-xs-12 col-sm-12"><h4>Log</h4></div>
								</div>
								
								<?php foreach($comment as $comm) {?>
								<hr class="dotted">
									<div class="row">  
										<div class="col-xs-12 col-sm-12">
											<div class="form-group">
												
											<table class="table table-striped table-bordered ticket-table">
											<tbody>
											<tr>
												<div class="row">                 
												<div class="col-xs-10 col-sm-10">
												<p>
												<?php echo 'by: '.$comm['Comment']['by'].' on '.date('D d-m-Y g:i A',strtotime($comm['Comment']['created_at']));?>
												</p>
												</div>
												<div class="col-xs-2 col-sm-2">
												<?php echo $this->Html->link('<i class="btn btn-danger btn-sm fa fa-times pull-right"></i>',array('controller' => 'Orders', 'action' => 'deletecomment',$comm['Comment']['id'],$order_id),array('escape'=>false,'confirm' => 'Are you sure you wish to delete this Comment?'));?>
												</div>
												</div>
												<div class="row">                 
												<div class="col-xs-12 col-sm-12">
													<pre><?php echo $comm['Comment']['comment']?></pre>
												</div>
												</div>
											</tr>
											
											</tbody>
											</table>
												
											</div>
										</div>
									</div>
                   						
								<?php }?>
									
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-1 col-sm-1">
			</div>
		</div>


		<div class="row"> 
			<div class="col-xs-3 col-sm-3">
			</div> 
			<div class="col-xs-6 col-sm-6">
				<div class="form-group">
					<div class="panel panel-default">
						<div class="panel-heading"><i class="fa fa-tag"></i>     Signed

						<?php echo $this->Html->link('Clear',array('controller' => 'orders', 'action' => 'clearsignature',$order_id),array('class'=>'pull-right','escape'=>false,));?>

						</div>
						<div class="panel-body">
						<div class="signature" style="display: none;"><?php echo $signature = $order['Order']['signature'];?></div>
						<?php if($signature=='')
						{?>

							<div class="row">  
								<div class="col-xs-12 col-sm-12">
									<?php echo $this->Form->create('Order',array('controller'=>'orders','action'=>'addsignature','class'=>"validator-form")); ?>

										<div class="sigPad" id="smoothed" style="width:400px;margin-top: 20px;">

											<label for="name">Print your name</label>
												<input id="name" class="name form-control" type="text" value="<?php echo $customer_name;?>" disable="disable">
												<input class="form-control" type="hidden" value="<?php echo $order_id;?>" name='order[order_id]'>

											<p class="drawItDesc" style="display: block;">Draw your signature</p>
										<ul class="sigNav">
											<li class="drawIt"><a href="#draw-it" >Sign Here</a></li>
											<li class="clearButton"><a href="#clear">Clear</a></li>
										</ul>
										<div class="sig sigWrapper" style="height:auto;">
											<div class="typed"></div>
											<canvas class="pad" height="110" width="398"></canvas>
											<input type="hidden" name="order[signature]" class="output">
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
			
					
									

<!-- Identification Update -->

<script>
$(document).ready(function() {
  
$(".identificationedit").click(function(){
$(".identificationform").show();
$(".identification").hide();
});

    
$(".cancle").click(function(){

$(".identification").show();
$(".identificationform").hide();
});   

$('.submit').click(function(){
		var identification = $('#identification').val();
		var order_id = $('#id').val();
		//alert(identification);alert(order_id);die();		
		if(identification!='')
		{
 			   $.ajax({
 			   type: "POST",
 			   url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/Orders/identificationupdate/",

 			  // url: "search.php",
 			   data: { identification : identification , order_id:order_id},
			
 			   success: function(data)
 			   {
  				 //window.location.reload();
  				 $(".identificationform").hide();
            	 $(".identificationedit").empty();
            	 $(".identificationedit").append(identification);
            	 $(".identification").show();
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
		var order_id = $('#id').val();
		//alert(general_notes);alert(order_id);die();		
		if(general_notes!='')
		{
 			   $.ajax({
 			   type: "POST",
 			   url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/Orders/generalnotesupdate/",

 			  // url: "search.php",
 			   data: { general_notes : general_notes , order_id:order_id},
			
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






<!-- Purchase Total Update -->

<script>
$(document).ready(function() {


var total=$(".total").text();
var order_id =$("#order_id").text();
//alert(total);alert(order_id);die();
		if(total!='')
		{
 			   $.ajax({
 			   type: "POST",
 			   url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/Orders/updatepurchasetotal/",

 			  // url: "search.php",
 			   data: { total : total , order_id:order_id},
			
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
 				url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/Orders/updatepurchaseitem/",
				data: { item : item , order_id:order_id},
				success: function(data)
 				{
  				}
  			});
		}return false; 
});
</script>

<!-- Purchase form show or hide check paid or not -->

<script>
$(document).ready(function() {

var paid =$("#paid").text();
if(paid == "1"){
	$(".purchaseform").hide();
	$(".payout").hide();
}
else
{
	$(".purchaseform").show();
	$(".payout").show()
}
		
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
	    var order_id = $('#id_').val();
	   	//alert(status);alert(order_id);die();
	    if(status!='')
	    {
	        $.ajax({
	        type: "POST",
	        url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/Orders/statusupdate/",
	        // url: "search.php",
	        data: { status : status , order_id:order_id},
	      
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
 			   url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/Orders/product/",
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