<div class="warper container-fluid">
	<div class="page-header"><h1><?php echo $this->Html->link('Estimate Details', array('controller' => 'Estimates', 'action' => 'add', 'admin' => true),array('escape' => FALSE)); ?></h1></div>
		<div class="panel panel-default">
			<div class="panel-heading">Estimate Details

<?php foreach($Estimates as $Inv) {?>
<?php  $status = $Inv['status'];
		$decline = $Inv['decline'];

	?>
	<input type="hidden" value="<?php echo $status;?>" id="app">
	<input type="hidden" value="<?php echo $decline;?>" id="dec">

	<?php 
    if($status=='1' && $decline == '1')
    {
    ?><a class="btn btn-success btn-sm" href="#">Convert to Invoice</a>
<a class="btn btn-success btn-sm" href="#" data-disable-with="Processing...">New Ticket</a>
<a class="btn btn-default btn-sm" id="undodecline" data-method="put" rel="nofollow">Undo Declined</a>

<div class="btn btn-default btn-sm" data-toggle="modal" data-target="#myModal">PDF</div>
<a class="btn btn-sm btn-warning " href="#" target="_blank">FAQ</a>
    <?php 
    }
    elseif($status=='1' && $decline == '0')
    {
    ?><a class="btn btn-success btn-sm" href="#">Convert to Invoice</a>
<a class="btn btn-success btn-sm" href="#" data-disable-with="Processing...">New Ticket</a>
<a class="btn btn-default btn-sm" id="unapprove" data-method="put" rel="nofollow">Undo Approved</a>
<div class="btn btn-default btn-sm" data-toggle="modal" data-target="#myModal">PDF</div>
<a class="btn btn-sm btn-warning " href="#" target="_blank">FAQ</a>
    <?php 
    }
    elseif($status=='0' && $decline == '1')
    {
    ?><a class="btn btn-success btn-sm" href="#">Convert to Invoice</a>
<a class="btn btn-success btn-sm" href="#" data-disable-with="Processing...">New Ticket</a>
<a class="btn btn-default btn-sm" id="undodecline" data-method="put" rel="nofollow">Undo Declined</a>
<div class="btn btn-default btn-sm"  data-toggle="modal" data-target="#myModal">PDF</div>
<a class="btn btn-sm btn-warning " href="#" target="_blank">FAQ</a>
    <?php 
    }
    else
    {
    ?><a class="btn btn-success btn-sm" href="#">Convert to Invoice</a>
<a class="btn btn-success btn-sm" href="#" data-disable-with="Processing...">New Ticket</a>
<a class="btn btn-success btn-sm" id="approve" data-method="put" rel="nofollow">Approve</a>
<a class="btn btn-warning btn-sm" id="decline" data-method="put" rel="nofollow">Decline</a>
<div class="btn btn-default btn-sm"  data-toggle="modal" data-target="#myModal" >PDF</div>
<a class="btn btn-sm btn-warning " href="#" target="_blank">FAQ</a>
	<?php 
   	}
   	?>
<?php } ?> 
					


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
       <div class="field" >
     
        <label for=""><?php echo $user['User']['first_name']." "; ?><?php echo $user['User']['last_name']; ?></label>
        <label for=""> <?php echo $user['User']['address'].' '.$user['User']['city'].' '.$user['User']['state_country'].' '.$user['User']['zip']; ?></label>
        
       </div>
       <div class="field">
       
         <label for=""><?php foreach($Estimates as $Inv) {?>
			Estimate #         <span> <?php echo ''.$Inv['est_number'];?></span><br>
			<?php } ?> </label>
        <label for=""> <?php foreach($Estimates as $Inv) {?>
			Estimate Date  <span><?php echo ''.$Inv['created'];?></span><br>
			<?php } ?> </label>

		 <label for=""> <?php foreach($Estimates as $Inv) {?>
			Total <span> <?php echo '$'.$Inv['total'].".00";?></span><br>
			<?php } ?> </label>
              
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
       <div class="field" >
        <label for=""> Signed : </label><label><hr></label>
        
       </div>
       <div class="field" >
         

          <label for=""> 
			Date </label>


        <label for=""> <?php foreach($Estimates as $Inv) {?>
			 <span><?php echo ''.$Inv['created'];?></span><br>
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
												<?php $user_id=$user['User']['id'];?>
												<b>Business Name:<span><?php echo $user['User']['business_name'];?></span></b><br>
												<b>Name: </b><?php echo $user['User']['first_name']; ?><br>
												<b>Email: </b><?php echo $user['User']['email']; ?><br>
												<b>Estimate Email: </b>
													<span><?php echo $user['User']['email']; ?></span><br>
												<b>Address: </b><?php echo $user['User']['address'].' '.$user['User']['city'].' '.$user['User']['state_country'].' '.$user['User']['zip']; ?><br>
												<strong>Office: </strong><br>
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

								<?php foreach($Estimates as $Inv) {?>
								<div class="panel panel-default">
									<div class="panel-heading"><i class="fa fa-money"></i>    Estimate Details
									
									<?php echo $this->Html->link('<i class="fa fa-edit"></i>',array('controller'=>'Estimates','action'=>'editingestimate',$Inv['id']),array('escape'=>false));?>

									</div>
            						<div class="panel-body est">


            							<?php  $status = $Inv['status'];
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

                             			<?php  $decline = $Inv['decline'];
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
											<div id="est_id" style="display:none;"><?php echo $est_id = $Inv['id'];?></div>
											<b>Estimate Number:  </b><span><?php echo $Inv['est_number'];?></span><br>
											<b>Estimate Date:  </b><?php echo $Inv['created'];?><br>

											<b>Tax Rate: </b><select name="select">
            													<option value="opt1">Tax</option>
        												  </select><br>	
											<b>Linked Ticket:</b><br>	
											<b>Linked Invoice:</b><br>	
											<b>Created By: </b><?php echo $Inv['created_by'];?><br>
											<b>Tax: </b><?php echo $Inv['tax'];?><br>	
											<b>Sub Total: </b><?php echo '$'.$Inv['total'].".00";?><br>
											<b>Total: </b><?php echo '$'.$Inv['total'].".00";?><br>
											
											<b>Tech Notes: </b><?php echo $Inv['tech_notes'];?><br>

												<?php } ?> 


										
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
                             				<td><?php echo $item= $Inv['Inventory']['item'];?></td>
                             			<div id="itemstring" style="display:none;"><?php echo $string .= $item.',';;?>
                             					
                             				</div>
                             				
                             				<td><?php echo $des= $Inv['Inventory']['description'];?></td> 
                             				<td>
                             					<div class="quantity_<?php echo $row_id; ?>">
                             						<?php echo $qty=$Inv['Inventory']['quantity'];?>
                             						<span id="<?php echo $row_id; ?>" class="qty rec_<?php echo $row_id; ?>"><i class="fa fa-edit "></i>
                             						</span>
                             						
                             					</div>
                             					<div style="display:none;" class="qty_edit_<?php echo $row_id;?>" id="<?php echo $row_id; ?>" >
                             						<form class="place" action="javascript:void(0);">
													<input type="text" name="price" id="qty_<?php echo $row_id;?>" value="<?php echo $qty;?>" required>
													<input type="hidden"  id="id_<?php echo $row_id;?>" value="<?php echo $Inv['Inventory']['id'];?>">
													<input class="submit" type="button" value="Save" id="<?php echo $row_id; ?>">
													<input class="cancle" type="button" value="Cancel" id="<?php echo $row_id; ?>">
													</form>
												</div>
											</td>
                             				
                             				
                                            <td><?php echo '$'.$rate= $Inv['Inventory']['rate'];  ?></td></div>
                                           
                                            <?php $tax_rate= $Inv['Inventory']['tax_rate'];  ?>
                                           <td> <?php  $tx= $Inv['Inventory']['tax'];  
                                            if ($tx=='1') {
                                             	echo "Yes";
                                             }
                                             else{
                                             	echo "No";
                                             } ?></td>
                             				
                             				<?php $price=$qty*$rate;  
                             				$total=$price+$total;
                             				$tax=$tax_rate+$tax;
                             				?>
											<td><?php echo '$'.$price;  ?></td>
											<td><?php echo $this->Html->link('<i class="fa fa-remove"></i>',array('controller' => 'Inventories', 'action' => 'deleteInventory',$Inv['Inventory']['id']),array('escape'=>false,'confirm' => 'Are you sure you wish to delete this Item?'));?></td>
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
				</div>










				<div class="row">  
					<div class="col-xs-12 col-sm-12">
						<div class="form-group">
							
								<div class="panel panel-default">
									<div class="panel-heading"><i class="fa fa-cog"></i>   Add From Barcode
									</div>
            						<div class="panel-body">

										

										<div class="row">  
											<div class="col-xs-12 col-sm-12">
											<div class="form-group">
												
												<div class="panel-body">
 
				<?php echo $this->Form->create('Inventory',array('controller'=>'inventories','action'=>'addinventorybyupc')); ?>
				
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
 
				<?php echo $this->Form->create('Inventory',array('controller'=>'inventories','action'=>'addinventorymanualy')); ?>
				
				<div class="row">                 
                    <div class="col-xs-12 col-sm-12">
						<div class="form-group">
					
                 		<?php echo $this->Form->input('Inventory.item', array('div'=>false,'class'=>'form-control','required'=>'required','label'=>'Item','options' => array('NULL' => 'Default', 'Hardware' => 'Hardware','iphone' => 'iphone','Labor' => 'Labor'))); ?>
                 		

                 		<?php echo $this->Form->input('Inventory.estimate_id', array('type'=>'hidden', 'class'=>'form-control','value'=> $est_id )); ?>
                 		<?php echo $this->Form->input('Inventory.user_id', array('type'=>'hidden', 'class'=>'form-control','value'=> $user_id )); ?>

						</div>
                    </div>
               </div>
               <div class="row">                 
                    <div class="col-xs-12 col-sm-12">
						<div class="form-group">
						      
							<?php echo $this->Form->input('Inventory.description', array('type'=>'text','class'=>'form-control','label'=>'Name')); ?>
						</div>
                    </div>
                </div>

               
                <div class="row">                 
                    <div class="col-xs-12 col-sm-12">
						<div class="form-group">
						      
							<?php echo $this->Form->input('Inventory.cost', array('type'=>'number','class'=>'form-control','label'=>'Cost')); ?>
						</div>
                    </div>
                </div>

               <div class="row">                 
                    <div class="col-xs-12 col-sm-12">
						<div class="form-group">
						      
							<?php echo $this->Form->input('Inventory.rate', array('type'=>'number','class'=>'form-control','label'=>'Price')); ?>
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
						<div class="form-group">
						      
								<?php echo $this->Form->input('Inventory.tax', array('div'=>false,
									'type'=>'checkbox','label'=>'Taxable')); ?>
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
	$('#get_data').keyup(function(){

		var searchid = $(this).val();
		var dataString = searchid;
		//alert(dataString);
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
		var qty = $('#qty_'+id).val();
		var inv_id = $('#id_'+id).val();
		//alert(qty);
		//alert(inv_id);
		
		if(qty!='')
		{
 			   $.ajax({
 			   type: "POST",
 			   url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/admin/Estimates/inventoryupdate/",

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


<script type="text/javascript" src="https://parall.ax/parallax/js/jspdf.js"></script>
<script>
var doc = new jsPDF();
var specialElementHandlers = {
    '#editor': function (element, renderer) {
        return true;
 }
};

$('#pdf').click(function () {
    doc.fromHTML($('#pdfdiv').html(), 15, 15, {
             'width': 170,
             'elementHandlers': specialElementHandlers
});
doc.save('sample-file.pdf');
});
</script>


     <!-- scripts -->
     <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
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