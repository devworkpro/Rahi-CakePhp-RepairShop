<?php echo $this->Flash->render('positive'); ?>
<div class="col-xs-12 col-sm-12"  style="margin-top:50px;">

		<div class="col-xs-2 col-sm-2">
			<div class="form-group">
				
			</div>
		</div>


		<div class="col-xs-8 col-sm-8">
			<div class="form-group">
				<div class="panel panel-default">
					<div class="panel-heading"><h4><i class="fa fa-money"></i>Transaction</h4></div>
            		<div class="panel-body">

							<div class="panel-body">

								<div class="row">  
									<div class="col-xs-12 col-sm-12">


										<table  class="table table-striped table-bordered" >
                       						<thead>
                        					<tr>	 
                         					
								        		<th>Item</th>
									        	<th>Quantity</th>
									       		<th>Price</th>
                          					</tr>
						          			</thead>
						          			<tbody>
                        						<?php $counter=0;$total=0;$tax=0;$string='';$tax_rate=0; ?>
                          						<?php foreach($sale as $Inv) {
                          							$row_id =  ++$counter; ?>
                          							
                          							<tr>
                             							<td><?php echo $item= $Inv['SaleProduct']['item'];?></td>
                             							<td><?php echo $qty=$Inv['SaleProduct']['quantity'];?></td>
                             							<td><?php echo '$'.$item= $Inv['SaleProduct']['rate'];?></td>

                      								</tr>  
                      								<?php 	$cost=$Inv['SaleProduct']['rate'];
                             							$price=$qty*$cost;
                             							$total=$price+$total;
                             							$tax=$tax_rate+$tax;
                             						?>
                             						<?php $tax_rate= $Inv['SaleProduct']['tax_rate'];  ?>

                  							 <?php } ?> 
                  							<div id="totalamount" style="display:none"><?php echo $total;?></div>
                  							<tr>
                  							<td style="text-align: right;" colspan="2">Subtotal</td>
												<td><?php echo '$'.$total.'.00';?>
													<?php $subtotal=$total;?></td>
											</tr>
											<tr>
											<td style="text-align: right;" colspan="2">Tax</td>
												<td><?php echo '$'.$tax.'.00';?><?php $ta=$tax;?>
													<?php $count= $ta+$subtotal;?></td>
											</tr>
											<tr>
											<td style="text-align: right;" colspan="2">Total</td>
											<td>
											<span id="sale-total"><?php echo '$'.$count.'.00';?></span>
											</td>
											</tr>

                             					
                             				

                    						</tbody>
                    						
                  						</table>  

                  						<div style="text-align: center;margin-top:50px;">
											<span class="large mvl">
												<h3 style="color: green;">
													Change:&nbsp;<span id="change-calculation"></span>
												</h3>
											</span>
										

											<?php echo $this->Form->create('Invoice',array('controller'=>'invoices','action'=>'addtender')); ?>
												<?php $a=$this->Session->read('Auth.User.email');?>
												<div class="col-xs-3 col-sm-3">
													<div class="form-group">
				
													</div>
												</div>
              
							                    
											
											<div class="row" style="text-align: center;margin-top:20px;">                 
							                    <div class="col-xs-6 col-sm-6">
													<div class="form-group">
													<?php echo $this->Form->input('Invoice.inv_number', array('type'=>'hidden','div'=>false,'class'=>'form-control','value'=>rand(10,10000))); ?>
													<?php echo $this->Form->input('Invoice.created_by', array('type'=>'hidden','div'=>false,'class'=>'form-control','value'=>$a)); ?>
													<?php echo $this->Form->input('Invoice.user_id', array('type'=>'hidden','div'=>false,'class'=>'form-control','value'=>$userid)); ?>
													<!--<?php echo $this->Form->input('Invoice.item', array('type'=>'hidden','div'=>false,'class'=>'form-control','value'=>$item)); ?>-->
													
													<?php echo $this->Form->input('Invoice.total', array('type'=>'hidden','div'=>false,'class'=>'form-control','value'=>$count)); ?>
													<?php echo $this->Form->input('Invoice.status', array('type'=>'hidden','div'=>false,'class'=>'form-control','value'=>1)); ?>
													<?php echo $this->Form->input('Invoice.payment_method', array('type'=>'hidden','div'=>false,'class'=>'form-control','value'=>$method)); ?>
													<?php echo $this->Form->input('Invoice.amount_provided', array('type'=>'number','div'=>false,'class'=>'form-control', 'id'=>'tender','required'=>'required','label'=>'Amount Provided:' )); ?>
													<div class="btn-group" style="text-align: center;margin-top:10px;">
														<?php echo $this->Form->button('Tender Sale', array('class' => 'btn btn-success pull-left')); ?>
													</div>
													</div>
							                    </div>
							               </div>

											
											<div class="row">                 
												<div class="col-xs-3 col-sm-3">
														<div class="btn-group">
														
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

		<div class="col-xs-2 col-sm-2">
			<div class="form-group">
				
			</div>
		</div>
</div>



<script type="text/javascript">
$(document).ready(function(){
	$('#tender').keyup(function(){

		var total = $(this).val();
		var oldtotal = $('#totalamount').text();
		var cal= total-oldtotal;
		var calculator=(cal.toFixed(2));	
		$('#change-calculation').html(calculator);


	//	alert(total);alert(oldtotal);die();
		 

	});
	
});
</script>