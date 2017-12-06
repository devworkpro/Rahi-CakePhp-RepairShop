<?php error_reporting(0);?>
<?php echo $this->Flash->render('positive'); ?>
<div class="warper container-fluid">
<div class="page-header"><h1><small></small></h1></div>
<div class="panel panel-default">
    <div class="panel-heading">POS (Point of Sale) System</div>
    <div class="panel-body">

    	<div class="row">  
			<div class="col-xs-12 col-sm-7">
				<div class="form-group">
					
					<div class="col-xs-12 col-sm-12">
						<div class="form-group">
							
							<div class="row">  
								<div class="col-xs-12 col-sm-12">
									<div class="form-group">
										
									<div class="panel-body">

									<?php echo $this->Form->create('Sales',array('controller'=>'sales','action'=>'addsalesbyupc')); ?>
		
									<div class="col-xs-4 col-sm-4">
									
         							<?php echo $this->Form->input('Sales.upc_code', array('div'=>false,'class'=>'form-control simple_form','id'=>'get_data1','required'=>'required','label'=>'Upc code')); ?>

         							<?php echo $this->Form->input('Sales.user_id', array('type'=>'hidden', 'class'=>'form-control','value'=> $userid )); ?>

         							<?php echo $this->Form->input('Sales.sale_id', array('type'=>'hidden', 'class'=>'form-control','value'=> $salesid )); ?>

			   						</div>
			   						<div class="col-xs-12 col-sm-4">
									<?php echo $this->Form->input('Sales.quantity', array('type'=>'number','id'=>'qty','class'=>'form-control simple_form','label'=>'Quantity')); ?>
				
									</div>
									<div class="col-xs-12 col-sm-4" style="margin-top: 23px;">
									<?php echo $this->Form->button('Scan UPC', array('class' => 'btn btn-default form-control simple_form')); ?>
									</div>
									<?php echo $this->Form->end(); ?>	
									</div>

									</div>
									</div>
							</div>


            
            				<ul role="tablist" class="nav nav-tabs" id="myTab">
              					<li class="active"><a data-toggle="tab" role="tab" href="#home">Main(1-20)</a></li>
              					<li><a data-toggle="tab" role="tab" href="#home1">Page2(21-50)</a></li>
             					<li><a data-toggle="tab" role="tab" href="#home2">Page3(51-100)</a></li>
              					<li><a data-toggle="tab" role="tab" href="#home3">Forms</a></li>
              
            				</ul>
            				<div class="tab-content" id="myTabContent">
             					<div id="home" class="tab-pane tabs-up fade in active panel panel-default">
              						<div class="panel-body"><?php $counter=0;?>
              							<?php foreach($products as $pro) {?>
										<?php ++$counter;?>
										<?php if($counter<='20')
										{?>
										<a class="button-wrapper btn btn-default btn-sm mvs mhs pos-button col-xs-6 col-sm-6 item" id="<?php echo $counter;?>" style=" color: #000000; height: 65px; width: 180px; display: block; text-decoration: none; margin-top: 15px; margin-left: 25px; background-repeat: repeat-x;border-color: #ccc;text-shadow: 0 1px 0 #fff; padding:10px;border-radius: 3px;font-size: 12px; line-height: 1.5;"><?php echo ucfirst($pro['Product']['product_name']);	?>

											<input type="hidden" class="pro_id_<?php echo $counter;?> " value="<?php echo $pro_id=$pro['Product']['id'];	?>" >
              							</a>
              							<?php
										}
										else
										{
												
										}

										?>
              							<?php } ?> 
               
               						 </div>
              					</div>
			                    <div id="home1" class="tab-pane tabs-up fade panel panel-default">
			                      	<div class="panel-body">
			                      	<?php $counter=0;?>
			                      	<?php foreach($products as $pro) {?>
										<?php ++$counter;?>
										<?php if($counter<='20')
										{

										}
										elseif($counter<='50')
										{?>
											<a class="button-wrapper btn btn-default btn-sm mvs mhs pos-button col-xs-6 col-sm-6 item" id="<?php echo $counter;?>" style=" color: #000000; height: 65px; width: 180px; display: block; text-decoration: none; margin-top: 15px; margin-left: 25px; background-repeat: repeat-x;  border-color: #ccc;text-shadow: 0 1px 0 #fff; padding:10px;border-radius: 3px;font-size: 12px; line-height: 1.5;"><?php echo ucfirst($pro['Product']['product_name']);	?>
											<input type="hidden" class="pro_id_<?php echo $counter;?> " value="<?php echo $pro_id=$pro['Product']['id'];	?>" >
			                      		</a>
			                      		<?php
										}
										{
											
										}

										?>
			                      		

			                      		


									<?php } ?> 
			                       
			                        </div>
			                    </div>
			                    <div id="home2" class="tab-pane tabs-up fade panel panel-default">
			                      	<div class="panel-body">
			                        	<?php $counter=0;?>
			                      	<?php foreach($products as $pro) {?>
										<?php ++$counter;?>
										<?php if($counter<='50')
										{

										}
										elseif($counter<='50')
										{
											?><a class="button-wrapper btn btn-default btn-sm mvs mhs pos-button col-xs-6 col-sm-6 item" id="<?php echo $counter;?>" style="color: #000000; height: 65px; width: 180px; display: block; text-decoration: none; margin-top: 15px; margin-left: 25px; background-repeat: repeat-x; border-color: #ccc;text-shadow: 0 1px 0 #fff; padding:10px;border-radius: 3px;font-size: 12px; line-height: 1.5;  "><?php echo ucfirst($pro['Product']['product_name']);	?>
												<input type="hidden" class="pro_id_<?php echo $counter;?> " value="<?php echo $pro_id=$pro['Product']['id'];	?>" >
			                      		</a>
			                      		<?php
										}
										} 
									?> 
			                       
			                        
			                        </div>
			                    </div>
			                    <div id="home3" class="tab-pane tabs-up fade panel panel-default">
			                      	<div class="panel-body">
			                        
										<div class="row">  
										<div class="col-xs-12 col-sm-12">
										<div class="form-group">
													
											<div class="panel panel-default">
												<div class="panel-heading"><i class="fa fa-cog"></i>   Add From Inventory
												</div>
						            			<div class="panel-body">
												<div class="row">  
													<div class="col-xs-12 col-sm-12">
													<div class="form-group">
																									
													<div class="panel-body">
													 
													<?php echo $this->Form->create('Sale',array('controller'=>'sales','action'=>'addsale')); ?>
																	
													<div class="row">                 
													    <div class="col-xs-12 col-sm-12">
														<div class="form-group">
																		
													    <?php echo $this->Form->input('Sale.item', array('div'=>false,'class'=>'form-control','placeholder' => "Start typing the product's name",'required'=>'required','label'=>'Item','id'=>'product_name','required'=>'required')); ?>
													    <div id="product_found"></div>
         												<?php echo $this->Form->input('Sale.user_id', array('type'=>'hidden', 'class'=>'form-control','id'=>'userid','value'=> $userid )); ?>
         												<?php echo $this->Form->input('Sale.sales_id', array('type'=>'hidden', 'class'=>'form-control','value'=> $salesid )); ?>

													    
														</div>
													    </div>
													</div>
													<div class="row">                 
													    <div class="col-xs-12 col-sm-12">
														<div class="form-group">
																			      
														<?php echo $this->Form->input('Sale.quantity', array('type'=>'number','id'=>'qty','class'=>'form-control','label'=>'Quantity','required'=>'required')); ?>
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




								<div class="row">  
								<div class="col-xs-12 col-sm-12">
								<div class="form-group">
									<div class="panel panel-default">
									<div class="panel-heading"><i class="fa fa-cog"></i>   Add Manual Item
									</div>
					            	<div class="panel-body">
										<div class="row">  
											<div class="col-xs-12 col-sm-12">
											<div class="form-group">
											<div class="panel-body">
					 
											<?php echo $this->Form->create('Sale',array('controller'=>'sales','action'=>'addsalemanualy')); ?>
									
												<div class="row">                 
													<div class="col-xs-12 col-sm-12">
													<div class="form-group">
													<?php echo $this->Form->input('Sale.item', array('div'=>false,'class'=>'form-control','required'=>'required','label'=>'Item','options' => array('NULL' => 'Default', 'Hardware' => 'Hardware','iphone' => 'iphone','Labor' => 'Labor','required'=>'required'))); ?>
													<?php echo $this->Form->input('Sale.user_id', array('type'=>'hidden', 'class'=>'form-control','value'=> $userid )); ?>
         												<?php echo $this->Form->input('Sale.sales_id', array('type'=>'hidden', 'class'=>'form-control','value'=> $salesid )); ?>
													    <?php echo $this->Form->input('Sale.text', array('type'=>'hidden', 'class'=>'form-control','value'=> 'saleview' )); ?>        

													</div>
													</div>
												</div>
												<div class="row">                 
													<div class="col-xs-12 col-sm-12">
													<div class="form-group">
														<?php echo $this->Form->input('Sale.description', array('type'=>'text','class'=>'form-control','label'=>'Name','required'=>'required')); ?>
													</div>
													</div>
												</div>

													               
												<div class="row">                 
													<div class="col-xs-12 col-sm-12">
													<div class="form-group">
																			      
													<?php echo $this->Form->input('Sale.cost', array('type'=>'number','class'=>'form-control','label'=>'Cost')); ?>
													</div>
													</div>
												</div>

												<div class="row">                 
													<div class="col-xs-12 col-sm-12">
													<div class="form-group">
													<?php echo $this->Form->input('Sale.rate', array('type'=>'number','class'=>'form-control','label'=>'Price')); ?>
													</div>
													</div>
												</div>
																	
												<div class="row">                 
													<div class="col-xs-12 col-sm-12">
													<div class="form-group">
													  
													<?php echo $this->Form->input('Sale.quantity', array('type'=>'number','id'=>'qty','class'=>'form-control','label'=>'Quantity','required'=>'required')); ?>
																					
													</div>
													</div>
												</div>

												<div class="row">                 
													<div class="col-xs-12 col-sm-12">
													<div class="form-group">
													<?php echo $this->Form->input('Sale.tax', array('div'=>false,'type'=>'checkbox','label'=>'Taxable')); ?>
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
			                    </div>
              
            				</div>
            

						</div>
					</div>
				</div>
			</div>

					<div class="col-xs-12 col-sm-5" >
						<div class="form-group">
							<div>
								<p style="margin: 8px 0; display: block;">
								Customer: <a class="walkin"><?php
								
									echo ucfirst($username['User']['first_name']).' '.ucfirst($username['User']['last_name']);
								
									?></a>  <a class="customer"></a>
									<a class="pull-right btn btn-default btn-sm" data-toggle="modal" href="#myModal">Add/change</a>
								</p>
							</div>
						</div>
						<div id="myModal" class="modal fade" aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" style="display: none; margin-top: 0px;">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
									<button class="close" aria-hidden="true" data-dismiss="modal" type="button">×</button>
									<h3 id="myModalLabel">Attach transaction to a different customer</h3>
									</div><br>
									<div class="modal-body">
										<div id="accordion" class="panel-group">
											<div class="panel panel-default">
											<div class="panel-heading">
											<h4 class="panel-title">
											<a href="#collapseOne" data-parent="#accordion" data-toggle="collapse">Find an existing customer</a>
											</h4>
											</div>
											<div id="collapseOne" class="panel-collapse collapse in">
											<div class="panel-body">
											<?php echo $this->Form->create('Sales',array('controller'=>'Sales','action'=>'add','class'=>'simple_form horizontal')); ?>
											
											
											<div class="form-group string optional invoice_customer_name">

											
											<?php echo $this->Form->input('Sales.name', array('div'=>false,'class'=>'form-control','type'=>'text', 'placeholder' => 'Attach to existing customer..' ,'id'=>'get_data_customer','autofocus','label'=>'Customer Name','required'=>'required')); ?>
											<div class="result"></div>

											<?php echo $this->Form->input('Sales.user_id', array('div'=>false,'class'=>'form-control result1','type'=>'hidden' ,'value'=>$userid)); ?>
		
											
											</div>
											<div class="form-actions">
											<?php echo $this->Form->button('Attach it', array('class' => 'btn btn-primary pull-left','id'=>'submit')); ?>
											
											</div>
											
											<?php echo $this->Form->end(); ?>
											</div>
											</div>
											</div>
											<div class="panel panel-default">
												<div class="panel-heading">
													<h4 class="panel-title">
													<a href="#collapseTwo" data-parent="#accordion" data-toggle="collapse">
													Create a new one
													<i class="fa fa-plus mlx" style="color: #428bca"></i>
													</a>
													</h4>
												</div>
											<div id="collapseTwo" class="panel-collapse collapse">
												<div class="panel-body">
													<div id="new_customer_form">
													<?php echo $this->Form->create('User',array('controller'=>'users','action'=>'add')); ?>

														<table style="width: 100%; padding: 0">
															<tbody>
															<tr>
															<td style="padding: 2px">
															<div class="form-group string optional customer_firstname ">
															<?php echo $this->Form->input('User.first_name', array('div'=>false,'class'=>'form-control', 'placeholder' => 'First Name' ,'id'=>'first_name','autofocus','label'=>'First Name')); ?>
															<?php echo $this->Form->input('User.text', array('div'=>false,'class'=>'form-control','type'=>'hidden', 'placeholder' => 'First Name' ,'id'=>'text','autofocus','value'=>'text2')); ?>
															<?php echo $this->Form->input('User.yes', array('div'=>false,'class'=>'form-control','type'=>'hidden','value'=>'0')); ?>

																
															</div>
															</td>
															<td>
															<div class="form-group string optional customer_lastname ">

															<?php echo $this->Form->input('User.last_name', array('div'=>false,'class'=>'form-control', 'placeholder' => 'Lastname','label'=>'Last Name','id'=>'last_name')); ?>
															</div>
															</td>
															</tr>
															<tr>
															<td style="padding: 2px">
																<div class="form-group email optional customer_email">
																<?php echo $this->Form->input('User.email', array('div'=>false,'class'=>'form-control','placeholder'=>'Email','autocomplete' => 'off','label'=>'Email')); ?>  
																
																</div>
															</td>
															<td>
																<div class="fields">
																<div class="row">
																	<div style="margin: 0 15px">
																		<div class="form-group select optional customer_phones_label col-sm-3" style="padding-left: 0">
																		<?php echo $this->Form->input('User.phone_type',array('options' => array('Phone' => 'Phone', 	'Mobile' => 'Mobile','Office' => 'Office','Home' => 'Home','Fax' => 'Fax','Other' => 'Other'),'class'=>'form-control','name'=>'data[phone][0][type]', 'label'=>'Type' )); ?>
																			
																		</div>
																		<div class="form-group string optional customer_phones_number col-sm-5" style="padding: 0">
																		<?php echo $this->Form->input('User.phone_number', array('div'=>false,'type'=>'number','class'=>'form-control', 'placeholder' => 'Number, Mobile required for SMS','name'=>'data[phone][0][number]','label'=>'Phone Number'));?>
																		
																		</div>
																		<div class="form-group string optional customer_phones_extension col-sm-3">
																		<?php echo $this->Form->input('User.extension', array('div'=>false,'class'=>'form-control', 'placeholder' => '1000','name'=>'data[phone][0][extension]','label'=>'Extension')); ?>
																	
																		</div>
																		
																	</div>
																</div>
																</div>
															</td>
															</tr>
															</tbody>
														</table>
														
														<div class="form-actions">
														<?php echo $this->Form->button('<i class="fa fa-plus"></i>Create and attach it', array('class' => 'btn btn-primary pull-left','id'=>'attach_new_customer')); ?>
															
														</div>
													<?php echo $this->Form->end(); ?>
													</div>
												</div>
											</div>
											</div>
									</div>
									</div>
						<div class="modal-footer">
						<button class="btn" aria-hidden="true" data-dismiss="modal">Cancel</button>
						</div>
						</div>
						</div>
						</div>

						<div>
						
							<div class="panel panel-default" style="margin-top:60px;">
								<div class="panel-heading"><i class="fa fa-money"></i></div>
            						<div class="panel-body">

										<div class="panel-body">

											<div class="row">  
												<div class="col-xs-12 col-sm-12">
												<div class="form-group">
												
												<div class="newDiv"></div>


										
											<table cellpadding="0" cellspacing="0" border="0" id="example1" class="display table" >
                       						
						          			<tbody>
                        						<?php $counter=0;$total=0;$tax=0;$string=''; ?>
                          						<?php foreach($sale as $Inv) {
                          							$row_id =  ++$counter; ?>
                          				
                             					<td><?php echo $item= $Inv['Sale']['item'];?></td>
                             					<td>
                             						<div class="quantity_<?php echo $row_id; ?>">

                             							<?php $qty=$Inv['Sale']['quantity'];?>

                             							<span id="<?php echo $row_id; ?> " class="qty rec_<?php echo $row_id; ?> best_in_place"><?php echo $qty;?>
	                             						</span>
                             						
    	                         					</div>
                             						<div style="display:none;" class="qty_edit_<?php echo $row_id;?>" id="<?php echo $row_id; ?>" >
                             							<form class="place" action="javascript:void(0);">
														<input class="form-control" type="text" name="price" id="qty_<?php echo $row_id;?>" value="<?php echo $qty;?>" required>
														<input type="hidden"  id="id_<?php echo $row_id;?>" value="<?php echo $Inv['Sale']['id'];?>">
														<input class="submit btn btn-success" type="button" value="Save" id="<?php echo $row_id; ?>">
														<input class="cancle btn btn-default" type="button" value="Cancel" id="<?php echo $row_id; ?>">
														</form>
													</div>
												</td>
                             				
                             				
                                            
                             				
												<td><?php echo '@ '.'$'.$item= $Inv['Sale']['rate'];?></td>

												<?php 	$cost=$Inv['Sale']['rate'];
                             							$price=$qty*$cost;
                             							$total=$price+$total;
                             							$tax=$tax_rate+$tax;
                             					?>
                             					
                             					<?php $tax_rate= $Inv['Sale']['tax_rate'];  ?>

												<td><?php echo $this->Html->link('<i class="btn btn-danger btn-sm fa fa-trash-o"></i>',array('controller' => 'sales', 'action' => 'deletesale',$Inv['Sale']['id'],$userid,$salesid),array('escape'=>false,'confirm' => 'Are you sure you wish to delete this Item?'));?></td>
												
                      							</tr>  



                  							 <?php } ?> 

                             					
                             				</div>

                    						</tbody>
                    				
                  							</table>    
															
									
												<div class="widget-content" style="margin-top:30px;">
											
												<div>
													<table class="totals right" style="text-align: left; width: 100%;">
														<tbody>
															<tr><td><h2>Subtotal:</h2></td><td><h2><?php echo '$'.$total.'.00';?>
													<?php $subtotal=$total;?></h2></td></tr>
															<tr><td><h2>Tax:</h2></td><td><h2><?php echo '$'.$tax.'.00';?><?php $ta=$tax;?>
													<?php $count= $ta+$subtotal;?></h2></td></tr>
															<tr><td><h2>Total:</h2></td><td><h2><?php echo '$'.$count.'.00';?></h2></td></tr>
														</tbody>
													</table>
												</div>
												<div class="col-lg-4 col-md-4 center" style="width: 100%;margin-left: 20px; margin-top:30px">
												


													<?php echo $this->Html->link("Cash", array('controller' => 'sales','action'=> 'transaction',$userid,cash), array( 'class' => 'btn btn-sm btn-success'));?>

													<?php echo $this->Html->link("Credit Card", array('controller' => 'sales','action'=> 'transaction',$userid,creditcard), array( 'class' => 'btn btn-sm btn-success'));?>

													<?php echo $this->Html->link("Check", array('controller' => 'sales','action'=> 'transaction',$userid,check), array( 'class' => 'btn btn-sm btn-success'));?><br>

													<div style="margin-left:1px; margin-top:6px;">
													
													<?php echo $this->Html->link("Offline CC", array('controller' => 'sales','action'=> 'transaction',$userid,offlinecc), array( 'class' => 'btn btn-sm btn-success'));?>

													<?php echo $this->Html->link("Quick", array('controller' => 'sales','action'=> 'transaction',$userid,quick), array( 'class' => 'btn btn-sm btn-success'));?>

													<?php echo $this->Html->link("Other", array('controller' => 'sales','action'=> 'transaction',$userid,other), array( 'class' => 'btn btn-sm btn-success'));?><br>
													</div>
													<div style="margin-left:32px; margin-top:6px;">
													<?php echo $this->Html->link("New", array('controller' => 'sales','action'=> 'transaction',$userid,new1), array('class' => 'btn btn-sm btn-success'));?>

													<?php echo $this->Html->link("Store Credit", array('controller' => 'sales','action'=> 'transaction',$userid,storecredit), array( 'class' => 'btn btn-sm btn-success'));?><br>
													</div>

													<div style="margin-left:40px; margin-top:6px;">
													<?php echo $this->Html->link("Multiple Payments", array('controller' => 'sales','action'=> 'payment',$userid,multiplepayments), array( 'class' => 'btn btn-sm btn-success'));?><br>
													</div>


													
													<div class="mvs" style="margin-left:130px; margin-top:10px;">								
														<a class="btn btn-sm btn-danger mvs right mrm clear">clear</a>
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
					</div>

		</div>

	
					
	</div><!-- /.box-body -->
</div><!-- /.box -->
</div>
	



<script type="text/javascript">
$(document).ready(function(){
	$('.item').click(function(){
		id = $(this).attr('id');
	//alert(id);
		var pro_id = $('.pro_id_'+id).val(); 
		//alert(pro_id);die();
		var userid = $('#userid').val();

		
		if(pro_id!='')
		{
 			   $.ajax({
 			   type: "POST",
 			   url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/admin/Sales/lineitem/",

 			  // url: "search.php",
 			   data: { pro_id : pro_id , userid : userid},
			
 			   success: function(data)
 			   {
 			   window.location.reload();
  				 // $(".newDiv").html(data); 
  				
  				//  $('#newDiv').html(jQuery(data).find('.result').html()); 
  			  }
  			  });
		}return false;    

	});
});
</script>



<script type="text/javascript">
$(document).ready(function(){
	$(".result").click(function(){
		$(this).hide();
	});
	$('#get_data_customer').keyup(function(){

		var searchid = $(this).val();
		var dataString = searchid;
		//alert(dataString);die();
		$(".result").show();
		if(searchid!='')
		{
 			   $.ajax({
 			   type: "POST",
 			   url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/admin/Sales/customer/",

 			  // url: "search.php",
 			   data: { search : dataString },
			
 			   success: function(data)
 			   {
  				 // $(".result").html(data); 
  				  $(".result").html(jQuery(data).find('.result').html()); 
	  				//  $('#newDiv').html(jQuery(data).find('.result').html()); 
  			   }
  			  });
		}return false;    

	});
});
</script>



<script type="text/javascript">
$(document).ready(function(){
	$("#product_found").click(function(){
		$(this).hide();
	});
	$('#product_name').keyup(function(){

		var searchid = $(this).val();
		var dataString = searchid;
		//alert(dataString);
		$("#product_found").show();
		if(searchid!='')
		{
 			   $.ajax({
 			   type: "POST",
 			   url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/admin/Sales/inventory/",

 			  // url: "search.php",
 			   data: { search : dataString },
			
 			   success: function(data)
 			   {
  				  $("#product_found").html(jQuery(data).find('.result1').html()); 
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
		var qty = $('#qty_'+id).val();
		var inv_id = $('#id_'+id).val();
				
		if(qty!='')
		{
 			   $.ajax({
 			   type: "POST",
 			   url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/admin/Sales/inventoryupdate/",

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


<script type="text/javascript">
	

	$('.clear').click(function(){

		var userid = $('#userid').val();
		//alert(userid);die();
				
		if(userid!='')
		{
 			   $.ajax({
 			   type: "POST",
 			   url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/admin/Sales/deleteinventory/",

 			  // url: "search.php",
 			   data: { userid : userid },
			
 			   success: function(data)
 			   {
  				 window.location.reload();
  				//  $('#newDiv').html(jQuery(data).find('.result').html()); 
  			  }
  			  });
		}return false;    

	});


</script>


