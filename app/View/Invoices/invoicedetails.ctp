<?php echo $this->Flash->render('positive'); ?>
<?php  
$result = ""; 
$Line_Items = '<div class="panel panel-default">
          <div class="panel-body">
          <div class="row">  
          <div class="col-xs-12 col-sm-12">
            <div class="form-group">
            <table class="table table-striped table-bordered ticket-table">
            <thead>
                    <tr>    
                      <th>Item</th>
                      <th>Description</th>
                      <th>Unit Cost</th>
                      <th>Quantity</th>
                      <th>Line Total</th>
                    </tr>
                    </thead>
            <tbody>
          ';
          $counter=0;$total=0;$tax=0;$string='';
          foreach($sale as $Inv) {
			$row_id =  ++$counter; 
			$rate= $Inv['Sale']['rate'];
			$qty = $Inv['Sale']['quantity'];
			$tax_rate= $Inv['Sale']['tax_rate']; 
			$price=$qty*$rate;  
            $total=$price+$total;
            $tax=$tax_rate+$tax;
            
			$Line_Items .= '<tr>
								<td>'.$row_id.'</td>
			                    <td>'.$Inv['Sale']['item'].'</td>
			                    <td>'.$Inv['Sale']['description'].'</td> 
			                    <td>'.$Inv['Sale']['quantity'].'</td>
			                    <td>$'.$price.'</td>   
							</tr>';
							} 


$Line_Items .= '</tbody>
                      </table>
                      </div>
                      </div>
                  </div></div></div>';

$User_Signature = '';
                if($Invoices['Invoice']['signature']!=''){
$User_Signature .='<div class="pdfsigPadValue" style="width:400px;">  
                   <canvas height="110" width="398"></canvas>
                </div>' ;                     
                }
$User_Signature .='<label for=""> Signed : </label>';                   

?>
<div class="warper container-fluid" style="margin-bottom:50px;">
	<div class="page-header">
	<h1>Invoice Details
		<span class="pull-right">
	        
			<?php foreach($Invoices as $Inv) {?>
				<?php  $status = $Inv['status'];
					

				?>
				<input type="hidden" value="<?php echo $status;?>" id="paid">

				<?php 
			    if($status=='1')
			    {
			    ?>
				<span class="btn-group">
					<a class="btn btn-default btn-sm dropdown-toggle" href="#" data-toggle="dropdown">Actions<span class="caret"></span></a>
			        <ul class="dropdown-menu"><?php  $id=$Inv['id'];?>
			          <li><?php echo $this->Html->link('<p class="menu-default">Delete</p>',array('controller'=>'Invoices','action'=>'deleteinvoice',$id),array('escape'=>false,'confirm' => 'Are you sure you wish to delete this Invoice?'));?></li>
			        </ul>
				</span>
				<div class="btn btn-default btn-sm" data-toggle="modal" data-target="#myModal">PDF</div>
				<a class="btn btn-sm btn-warning " href="#" target="_blank">FAQ</a>
			    <?php 
			    }
			    else
			    {
			    ?>
			    <?php echo $this->Html->link('Take Payment',array('controller'=>'Invoices','action'=>'payment_form',$user['User']['id'],$Inv['id']),array('escape'=>false,'class'=>'btn btn-success'));?>
			    <span class="btn-group">
			       <a class="btn btn-default btn-sm dropdown-toggle" href="#" data-toggle="dropdown">Actions<span class="caret"></span></a>
			        <ul class="dropdown-menu"><?php  $id=$Inv['id'];?>
			          <li><?php echo $this->Html->link('<p class="menu-default">Delete</p>',array('controller'=>'Invoices','action'=>'deleteinvoice',$id),array('escape'=>false,'confirm' => 'Are you sure you wish to delete this Invoice?'));?></li>
			        </ul>
				</span>
				<div class="btn btn-default btn-sm"  data-toggle="modal" data-target="#myModal" >PDF</div>
				<a class="btn btn-sm btn-warning " href="#" target="_blank">FAQ</a>
				<?php 
			   	}
			   	?>
			<?php } ?> 
			
      	</span>

	</h1>
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
			    
			    <?php if(!empty($Invoice_Template))
				{
				  $template_data = $Invoice_Template['Template']['invoice_template'];
				  
  $find          = array('{{account_address}}','{{account_city}}', '{{account_state}}',' {{account_zip}}','{{account_phone}}','{{account_email}}','{{account_fullname}}','{{account_logo}}','{{customer_fullname}}','{{customer_billing_address}}','{{customer_billing_city}}','{{customer_billing_state}}','{{customer_billing_zip}}','{{invoice_number}}','{{invoice_date}}','{{invoice_balance_due}}','{{invoice_subtotal}}','{{invoice_tax}}','{{invoice_total}}','{{invoice_payments_amount}}','{{invoice_paid_stamp}}','{{every_invoice_line_items}}','{{invoice_disclaimer}}','{{signature}}');
    
  if(!empty($Login_user) AND !empty($Invoices) AND !empty($user) AND !empty($Disclaimer))
  {
    $first_name       = $Login_user['User']['first_name'];
    $last_name        = $Login_user['User']['last_name'];
    $account_fullname = $first_name.' '.$last_name;

    $logo_name        = $Login_user['User']['logo'];
    $logo_full_path   = $this->webroot.'img/logo/'.$logo_name;
    $account_logo     = '<img src="'.$logo_full_path.'" alt="Cover"  width="100" height="100">';

    
    if(empty($Location))
    {
    $account_address  = $Login_user['User']['address'];
    $account_city     = $Login_user['User']['city'];
    $account_state    = $Login_user['User']['state_country'];
    $account_zip      = $Login_user['User']['zip'];
    $account_phone    = $Login_user['User']['phone_number'];
    $account_email    = $Login_user['User']['email'];
	}
	else{
	$account_address  = $Location['Multilocation']['address'];
    $account_city     = $Location['Multilocation']['city'];
    $account_state    = $Location['Multilocation']['state_country'];
    $account_zip      = $Location['Multilocation']['zip'];
    $account_phone    = $Location['Multilocation']['phone_number'];
    $account_email    = $Location['Multilocation']['email'];
	}

    $customer_fullname= $user['User']['first_name'].' '.$user['User']['last_name'];
    $customer_billing_address   = $user['User']['address'];
    $customer_billing_city      = $user['User']['city'];
    $customer_billing_state     = $user['User']['state_country'];
    $customer_billing_zip       = $user['User']['zip'];

    $invoice_number    = $Invoices['Invoice']['inv_number'];
    $invoice_date      = date('D d-m-Y g:i A',strtotime($Invoices['Invoice']['created']));
    $invoice_balance_due   = $Invoices['Invoice']['total']-$Invoices['Invoice']['paid_amount'];

    $paid_stamp_full_path   = $this->webroot.'img/paid.png';
    $unpaid_stamp_full_path = $this->webroot.'img/unpaid.png';

    if( $Invoices['Invoice']['status'] == '1')
    {
    	$invoice_paid_stamp = '<img src="'.$paid_stamp_full_path.'" alt="Cover"  width="250" height="50">';
    }
    else{
    	$invoice_paid_stamp = '<img src="'.$unpaid_stamp_full_path.'" alt="Cover"  width="250" height="50">';
    }

    $invoice_subtotal = $Invoices['Invoice']['total'];

    $invoice_tax = $Invoices['Invoice']['tax_rate'];
    
    $invoice_total = $invoice_subtotal + $invoice_tax;

    $invoice_payments_amount = $Invoices['Invoice']['paid_amount'];

    $invoice_balance_due   = $invoice_total-$invoice_payments_amount;

    $every_invoice_line_items = $Line_Items;
    $invoice_disclaimer_template = $Disclaimer['Disclaimer']['invoice_disclaimer'];

    
    
    $signature = $User_Signature;
    
    //$replace        = array($first_name,$logo,'state','zip');
    $replace          = array($account_address,$account_city,$account_state,$account_zip,$account_phone,$account_email,$account_fullname,$account_logo,$customer_fullname,$customer_billing_address,$customer_billing_city,$customer_billing_state,$customer_billing_zip,$invoice_number,$invoice_date,'$'.$invoice_balance_due,'$'.$invoice_subtotal,'$'.$invoice_tax,'$'.$invoice_total,'$'.$invoice_payments_amount,$invoice_paid_stamp,$every_invoice_line_items,$invoice_disclaimer_template,$signature);
    //pr($replace);die();
    $result         = str_replace($find,$replace,$template_data);

				  	echo $result;	
				  }
				}   
				?>
			    </form>

	    		</div>
	       		</div>
			</div>
	    </div>  
	</div>
  
	<!-- Modal Pdf-->




	<div class="row">  
		<!--  Bill To Customer Panel --> 
		<div class="col-xs-12 col-sm-6">
			<div class="form-group">
				
				<div class="panel panel-default">
					<div class="panel-heading"><i class="fa fa-user"></i>    Bill To Customer
					</div>
					<div class="panel-body">

						<div class="panel-body">

						<div class="row">  
							<div class="col-xs-12 col-sm-12">
							<div class="form-group">
								<?php $user_id= $user['User']['id'];?>
								<div class="row">  
									<div class="col-xs-5 col-sm-5">
									<b>Business Name: </b> 
									</div>
									<div class="col-xs-7 col-sm-7">
									<?php echo ucfirst($user['User']['business_name']);?>
									</div>
								</div><br>
								<div class="row">  
									<div class="col-xs-5 col-sm-5">
									<b>Name: </b>
									</div>
									<div class="col-xs-7 col-sm-7">
									<?php $user_name=$user['User']['first_name'].' '.$user['User']['last_name']; 
								echo $this->Html->link(ucfirst($user_name),array('controller' => 'users', 'action' => 'userdetail',$user_id),array('escape'=>false,));?>
									</div>
								</div><br>
								<div class="row">  
									<div class="col-xs-5 col-sm-5">
									<b>Email: </b>
									</div>
									<div class="col-xs-7 col-sm-7">
									<?php echo $user['User']['email']; ?>
									</div>
								</div><br>
								<div class="row">  
									<div class="col-xs-5 col-sm-5">
									<b>Invoice Email: </b>
									</div>
									<div class="col-xs-7 col-sm-7">
									<span><?php echo $user['User']['email']; ?></span></div>
								</div><br>
								<div class="row">  
									<div class="col-xs-5 col-sm-5">
									<b>Address: </b>
									</div>
									<div class="col-xs-7 col-sm-7">
									<?php $address = $user['User']['address'].' '.$user['User']['city'].' '.$user['User']['state_country'].' '.$user['User']['zip']; ?>
								<a target="_blank" href="https://maps.google.fr/maps?q=<?php echo $address;?>"> <?php echo ' '.$address;?>
            					</a>
            						</div>
            					</div><br>
            					<div class="row">  
									<div class="col-xs-5 col-sm-5">
										<strong>Office: </strong>
									</div>
									<div class="col-xs-7 col-sm-7">
									<?php
								if(!empty($phone)){
									foreach ($phone as $ph) {
										$phone_type	= $ph['Phone']['phone_type'];

										if($phone_type=='Office')
										{
											echo $ph['Phone']['phone_number'];
										}
									}
									
								}
								?>	
									</div>
								</div><br>
								<div class="row">  
									<div class="col-xs-5 col-sm-5">
										<strong>Get SMS: </strong>
									</div>
									<div class="col-xs-7 col-sm-7">
									<?php $sms= $user['User']['sms_service'];
								if($sms==1){echo "True";}else{ echo "No";} ?>
									</div>
								</div><br>
							</div>
							</div>


						</div>
   						</div>
	
					</div>
				</div>
			</div>
		</div>



		<!-- Invoice Details Panel-->
			
		<div class="col-xs-12 col-sm-6">
			<div class="form-group">
					<?php foreach($Invoices as $Inv) {?>
					<div class="panel panel-default">
						<div class="panel-heading"><i class="fa fa-money"></i>    Invoice Details
						
						<?php echo $this->Html->link('<i class="fa fa-edit"></i>',array('controller'=>'Invoices','action'=>'editinginvoice',$Inv['id']),array('escape'=>false));?>

						</div>
						<div class="panel-body">

						<?php  $status = $Inv['status'];
                 				if($status=='1')
               					{
                 					echo $this->Html->image('paid.png', array('alt' => 'Image','width'=>'250', 'height'=>'40'));
                 				}
                 				else
                 				{
                  					echo $this->Html->image('unpaid.png', array('alt' => 'Image','width'=>'250', 'height'=>'40'));
                 				}
                 		?> 
							

							<div class="row">  
								<div class="col-xs-12 col-sm-12">
								<div class="form-group">
								
								<div id="invoice_id" style="display:none;">
								<?php echo $invoice_id = $Inv['id'];?></div>
								<div class="row">  
									<div class="col-xs-5 col-sm-5">
									<b>Invoice Number:  </b>
									</div>
									<div class="col-xs-7 col-sm-7">
									<span><?php echo $Inv['inv_number'];?>
									</span>
									</div>
								</div>
								<br>
								<div class="row">  
									<div class="col-xs-5 col-sm-5">
									<b>Linked Ticket: </b>
									</div>
									<div class="col-xs-7 col-sm-7">
									<?php $ticket_id=$Inv['ticket_id'];
								if($ticket_id!='0')
								{
									echo $this->Html->link($ticket_id,array('controller'=>'Tickets','action'=>'ticketdetails',$ticket_id),array('escape'=>false));
								}
								else
								{
									echo "";
								}
								?></div>
								</div>
								<br>
								<div class="row">  
									<div class="col-xs-5 col-sm-5">
									<b>Linked Estimate: </b>
									</div>
									<div class="col-xs-7 col-sm-7">
									<?php $estimate_id=$Inv['estimate_id'];
								if($estimate_id!='0')
								{
									echo $this->Html->link($estimate_id,array('controller'=>'Estimates','action'=>'estimatedetails',$user_id,$estimate_id),array('escape'=>false));
								}
								else
								{
									echo "";
								}
								?>
									</div>
								</div>
								<br>
								<div class="row">  
									<div class="col-xs-5 col-sm-5">
									<b>Created By: </b>
									</div>
									<div class="col-xs-7 col-sm-7">
									<?php echo $Inv['created_by'];?>
									</div>
								</div><br>
									
								<div class="row">  
									<div class="col-xs-5 col-sm-5">
									<b>Invoice Date:  </b>
									</div>
									<div class="col-xs-7 col-sm-7">
									<?php echo date('D d-m-Y g:i A',strtotime($Inv['created']));?>
									</div>
								</div><br>
								<div class="row">  
									<div class="col-xs-5 col-sm-5">
									<b>Due Date: </b>
									</div>
									<div class="col-xs-7 col-sm-7">
									<?php echo $Inv['due_date'];?>
									</div>
								</div><br>
								<div class="row">  
									<div class="col-xs-5 col-sm-5">
									<b>Po Number: </b>
									</div>
									<div class="col-xs-7 col-sm-7">
									<span class="ponumber">
                 						<?php $no = $Inv['po_number'];
                 						if($no!=''){
                 						?>
                     						<span id="po" class="ponumberedit best_in_place"><?php echo $Inv['po_number'];?>
                     						</span>
                 						<?php
										}else
										{ 
										?>
											<span class="ponumberedit best_in_place" style="color: #d3d3d3;border: medium none;font-style: italic;">
												<?php echo 'click to add';?>
                     						</span>
                 					
									<?php } ?>
                 					</span>
                 					<span style="display:none;" class="poform" id="" >
                 						<form class="place" action="javascript:void(0);">
										<input class="form-control" type="text" id="po_number" value="<?php echo $Inv['po_number'];?>">
										<input type="hidden" id="id" value="<?php echo $invoice_id = $Inv['id'];?>">
										<input class="submit btn btn-success" type="button" value="Save" >
										<input class="cancle btn btn-default" type="button" value="Cancel" >
										</form>
									</span>
									</div>
								</div>
								<br>
								<div class="row">  
									<div class="col-xs-5 col-sm-5">
									<b>Tax Rate: </b>
									</div>
									<div class="col-xs-7 col-sm-7">
									<?php echo $Inv['tax_rate'];?>
									</div>
								</div><br>
								<div class="row">  
									<div class="col-xs-5 col-sm-5">

									<b>Paid:</b>
									</div>
									<div class="col-xs-7 col-sm-7"><td>
								<?php  $status = $Inv['status'];
                 				if($status=='1')
               					{
                 					echo 'yes';
                 				}
                 				else
                 				{
                  					echo 'Not yet ';
                 				}
                 				?> 
                 				</td>
                 				</div>
                 				</div><br>
                 				<div class="row">  
									<div class="col-xs-5 col-sm-5">
									<b>Date Paid: </b>
									</div>
									<div class="col-xs-7 col-sm-7">
										<?php echo $Inv['paid_date'];?>
									</div>
								</div><br>
								<div class="row">  
									<div class="col-xs-5 col-sm-5">
									<b>Sub Total: </b>
									</div>
									<div class="col-xs-7 col-sm-7">
									<?php echo '$'.$Inv['total'];?>
									</div>
								</div><br>
								<div class="row">  
									<div class="col-xs-5 col-sm-5">
									<b>Total: </b>
									</div>
									<div class="col-xs-7 col-sm-7">
										<?php echo '$'.$Inv['total'];?>
									</div>
								</div><br>
								<div class="row">  
									<div class="col-xs-5 col-sm-5">
									<b>Ref Number: </b>
									</div>
									<div class="col-xs-7 col-sm-7">
									<?php echo $Inv['ref_number'];?>
									</div>
								</div><br>
								<div class="row">  
									<div class="col-xs-5 col-sm-5">
									<b>Tech Notes: </b>
									</div>
									<div class="col-xs-7 col-sm-7">
									<?php echo $Inv['tech_notes'];?>
									</div>
								</div><br>

									<?php } ?> 

								</div>
       							</div>
		
							</div>


						</div>
					</div>



			</div>
        </div>





        <!-- Line Items Panel -->
 
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
          					<?php foreach($sale as $Inv) {
          						$row_id =  ++$counter; ?>
          					<tr>
          					<td><?php echo $row_id;?> </td>
             				<td>
             					<div class="itemname itemname_<?php echo $row_id; ?>">
             						<?php $item= $Inv['Sale']['item'];?>
             						<span id="<?php echo $row_id; ?>" class="item item_name_<?php echo $row_id; ?> best_in_place"><?php echo $item;?>
             						</span>
             						
             					</div>
             					<div style="display:none;" class="item_edit_<?php echo $row_id;?>" id="<?php echo $row_id; ?>" >
             						<form class="place" action="javascript:void(0);">
									<input type="text" name="price" id="item_<?php echo $row_id;?>" value="<?php echo $item;?>" class="form-control" required>
									<input type="hidden"  id="id_<?php echo $row_id;?>" value="<?php echo $Inv['Sale']['id'];?>">
									<input class="submititem btn btn-success" type="button" value="Save" id="<?php echo $row_id; ?>">
									<input class="cancleitem btn btn-default" type="button" value="Cancel" id="<?php echo $row_id; ?>">
									</form>
								</div>
							</td>

             				<div id="itemstring" style="display:none;"><?php echo $string .= $item.',';;?>
             					
             				</div>
             				
             				
             				<td>
             					<div class="description description_<?php echo $row_id; ?>">
             						<?php $des= $Inv['Sale']['description'];?>
             						<span id="<?php echo $row_id; ?>" class="des description_data_<?php echo $row_id; ?> best_in_place"><?php echo $des;?>
             						</span>
             						
             					</div>
             					<div style="display:none;" class="des_edit_<?php echo $row_id;?>" id="<?php echo $row_id; ?>" >
             						<form class="place" action="javascript:void(0);">
									<input type="text" name="price" id="des_<?php echo $row_id;?>" value="<?php echo $des;?>" class="form-control" required>
									<input type="hidden"  id="id_<?php echo $row_id;?>" value="<?php echo $Inv['Sale']['id'];?>">
									<input class="submitdes btn btn-success" type="button" value="Save" id="<?php echo $row_id; ?>">
									<input class="cancledes btn btn-default" type="button" value="Cancel" id="<?php echo $row_id; ?>">
									</form>
								</div>
							</td>



             				<td>
             					<div class="quantity_<?php echo $row_id; ?>">
             						<?php $qty=$Inv['Sale']['quantity'];?>
             						<span id="<?php echo $row_id; ?>" class="qty rec_<?php echo $row_id; ?> best_in_place"><?php echo $qty;?>
             						</span>
             						
             					</div>
             					<div style="display:none;" class="qty_edit_<?php echo $row_id;?>" id="<?php echo $row_id; ?>" >
             						<form class="place" action="javascript:void(0);">
									<input type="number" class="form-control" name="price" id="qty_<?php echo $row_id;?>" value="<?php echo $qty;?>" required>
									<input type="hidden"  id="id_<?php echo $row_id;?>" value="<?php echo $Inv['Sale']['id'];?>">
									<input class="submitqty submitqty_<?php echo $row_id; ?> btn btn-success" type="button" value="Save" id="<?php echo $row_id; ?>">
									<input class="cancle btn btn-default" type="button" value="Cancel" id="<?php echo $row_id; ?>">
									</form>
								</div>
							</td>
             				
             				
             				<td>
             					<div class="rate_<?php echo $row_id; ?>">
             						<?php $rt=$Inv['Sale']['rate'];?>
             						<span id="<?php echo $row_id; ?>" class="rt rec_<?php echo $rt; ?> best_in_place"><?php echo '$'.$rt;?>
             						</span>
             						
             					</div>
             					<div style="display:none;" class="rt_edit_<?php echo $row_id;?>" id="<?php echo $row_id; ?>" >
             						<form class="place" action="javascript:void(0);">
									<input type="number" class="form-control" name="price" id="rt_<?php echo $row_id;?>" value="<?php echo $rt;?>" required>
									<input type="hidden"  id="id_<?php echo $row_id;?>" value="<?php echo $Inv['Sale']['id'];?>">
									<input class="submitrt submitrt_<?php echo $row_id; ?> btn btn-success" type="button" value="Save" id="<?php echo $row_id; ?>">
									<input class="canclert btn btn-default" type="button" value="Cancel" id="<?php echo $row_id; ?>">
									</form>
								</div>
							</td>

                            </div>
                           
                            <?php $tax_rate= $Inv['Sale']['tax_rate'];  ?>
                           <td> <?php  $tx= $Inv['Sale']['tax'];  
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
							<td><?php echo $this->Html->link('<i class="btn btn-danger btn-sm fa fa-times"></i>',array('controller' => 'sales', 'action' => 'deletesaleitem',$Inv['Sale']['id'],$invoice_id),array('escape'=>false,'confirm' => 'Are you sure you wish to delete this Item?'));?></td>
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
		

		<div class="lineitem">
			<div class="row">  
				<div class="col-xs-12 col-sm-12">

					<div class="row">  
					<div class="col-xs-6 col-sm-6">
					<div class="form-group">
														
						<div class="panel panel-default">
						<div class="panel-heading"><i class="fa fa-cog"></i> Add From Inventory </div>
							<div class="panel-body">
								<div class="row">  
								<div class="col-xs-12 col-sm-12">
								<div class="form-group">
									<div class="panel-body">
										<?php echo $this->Form->create('Sale',array('controller'=>'sales','action'=>'addsaleinvoice','class'=>"validator-form")); ?>
										<div class="row">                 
											<div class="col-xs-12 col-sm-12">
												<div class="form-group">
																	
												    <?php echo $this->Form->input('Sale.item', array('div'=>false,'class'=>'form-control','placeholder' => "Start typing the product's name",'required'=>'required','label'=>'Item','id'=>'product_name','required'=>'required')); ?>
												    <div id="product_found"></div>
     												<?php echo $this->Form->input('Sale.user_id', array('type'=>'hidden', 'class'=>'form-control','id'=>'userid','value'=> $user_id )); ?>
     												<?php echo $this->Form->input('Sale.invoice_id', array('type'=>'hidden', 'class'=>'form-control','value'=> $invoice_id )); ?>
     												  
												    
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

					<div class="form-group">
					<div class="panel panel-default">
						<div class="panel-heading"><i class="fa fa-cog"></i>   Add From Barcode
						</div>
						<div class="panel-body">

							

							<div class="row">  
								<div class="col-xs-12 col-sm-12">
								<div class="form-group">
									
								<div class="panel-body">


								<?php echo $this->Form->create('Sales',array('controller'=>'sales','action'=>'addsalesinvoicebyupc','class'=>"validator-form")); ?>
	

								<div class="row">                 
				                    <div class="col-xs-12 col-sm-12">
										<div class="form-group">
									
				                 		<?php echo $this->Form->input('Sales.upc_code', array('div'=>false,'class'=>'form-control ','required'=>'required','label'=>'Upc code')); ?>

				                 		<?php echo $this->Form->input('Sales.invoice_id', array('type'=>'hidden', 'class'=>'form-control','value'=> $invoice_id )); ?>
				                 		<?php echo $this->Form->input('Sales.user_id', array('type'=>'hidden', 'class'=>'form-control','value'=> $user_id )); ?>

										</div>
				                    </div>
				               </div>
				               <div class="row">                 
				                    <div class="col-xs-12 col-sm-12">
										<div class="form-group">
										      
											<?php echo $this->Form->input('Sales.quantity', array('type'=>'number','id'=>'qty','class'=>'form-control','required'=>'required','label'=>'Quantity')); ?>
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
							<div class="panel-heading"><i class="fa fa-cog"></i>   Add Manual Item  </div>
						    <div class="panel-body">
									<div class="row">  
										<div class="col-xs-12 col-sm-12">
											<div class="form-group">
												<div class="panel-body">
						 
												<?php echo $this->Form->create('Sale',array('controller'=>'sales','action'=>'addsalemanualy','class'=>"validator-form")); ?>
										
													<div class="row">                 
														<div class="col-xs-12 col-sm-12">
														<div class="form-group">
														<?php echo $this->Form->input('Sale.item', array('div'=>false,'class'=>'form-control','required'=>'required','label'=>'Item','options' => array('Default' => 'Default', 'Hardware' => 'Hardware','iphone' => 'iphone','Labor' => 'Labor'))); ?>
														<?php echo $this->Form->input('Sale.user_id', array('type'=>'hidden', 'class'=>'form-control','value'=> $user_id )); ?>
             												
														<?php echo $this->Form->input('Sale.invoice_id', array('type'=>'hidden', 'class'=>'form-control','value'=> $invoice_id )); ?> 

														<?php echo $this->Form->input('Sale.text', array('type'=>'hidden', 'class'=>'form-control','value'=> 'invoice' )); ?>  

														</div>
														</div>
													</div>
													<div class="row">                 
														<div class="col-xs-12 col-sm-12">
														<div class="form-group">
															<?php echo $this->Form->input('Sale.description', array('type'=>'text','class'=>'form-control','required'=>'required','label'=>'Name')); ?>
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
														<?php echo $this->Form->input('Sale.rate', array('type'=>'number','class'=>'form-control','label'=>'Price','required'=>'required')); ?>
														</div>
														</div>
													</div>
																		
													<div class="row">                 
														<div class="col-xs-12 col-sm-12">
														<div class="form-group">
														  
														<?php echo $this->Form->input('Sale.quantity', array('type'=>'number','id'=>'qty','class'=>'form-control','required'=>'required','label'=>'Quantity')); ?>
																						
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

		<!-- Signature Panel-->

		<div class="row"> 
			
			<div class="col-xs-6 col-sm-6">
			<?php //pr($Invoices);?>
			<?php //pr($user);?>
				<div class="form-group">
					<div class="panel panel-default">
						<div class="panel-heading"><i class="fa fa-user"></i>     Signature
						<?php $inv_id = $Invoices['Invoice']['id']?>
						<?php echo $this->Html->link('Clear',array('controller' => 'Invoices', 'action' => 'clearsignature',$inv_id),array('class'=>'pull-right','escape'=>false,));?>

						</div>
						<div class="panel-body">
						<div class="signature" style="display: none;"><?php echo $signature = $Invoices['Invoice']['signature'];?></div>
						<?php if($signature=='')
						{?>

							<div class="row">  
								<div class="col-xs-12 col-sm-12">
									<?php echo $this->Form->create('Invoice',array('controller'=>'Invoices','action'=>'addsignature','class'=>"validator-form")); ?>

										<div class="sigPad" id="smoothed" style="width:400px;margin-top: 20px;">

											<label for="name">Print your name</label>
												<input id="name" class="name form-control" type="text" value="<?php echo $user_name;?>" disable="disable">
												<input class="form-control" type="hidden" value="<?php echo $inv_id;?>" name='invoice[invoice_id]'>
												<input class="form-control" type="hidden" value="<?php echo $user_id;?>" name='invoice[user_id]'>

											<p class="drawItDesc" style="display: block;">Draw your signature</p>
										<ul class="sigNav">
											<li class="drawIt"><a href="#draw-it" >Sign Here</a></li>
											<li class="clearButton"><a href="#clear">Clear</a></li>
										</ul>
										<div class="sig sigWrapper" style="height:auto;">
											<div class="typed"></div>
											<canvas class="pad" height="110" width="398"></canvas>
											<input type="hidden" name="invoice[signature]" class="output">
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
			<div class="col-xs-6 col-sm-6">
			</div>
		</div>



		<!-- Related Ticket Panel -->

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
	                  					echo $this->Html->link($id,array('controller'=>'Tickets','action'=>'ticketdetails',$id),array('escape'=>false));?></td>
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
														<?php echo date('D d-m-Y g:i A',strtotime($comm['Comment']['created_at']));?>
														
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
													<?php echo date('D d-m-Y g:i A',strtotime($comm['Comment']['created_at']));?>
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




		<!-- Warranty Information Panel -->
		<?php 
		if(!empty($Warranty))
		 	{ ?>
		<div class="row">  
		<div class="col-md-12">
		<div class="panel panel-default">
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
						<td>
							<?php echo $this->Html->link('view',array('controller'=>'Warranties','action'=>'warrantyview',$warranty_id),array('escape'=>false));?> |
							<?php echo $this->Html->link('Remove',array('controller' => 'Warranties', 'action' => 'deleteInvoiceWarranty',$warranty_id,$inv_id),array('escape'=>false,'confirm' => 'Are you sure?'));?>

						</td>
					</tr>
					<?php }?>
		            </tbody>
		        </table>
		        </div>
		    </div>
		</div>
		</div>
		</div>
		<?php } ?>


		<!-- Change History Panel -->
		<div class="row">  
		<div class="col-md-12">  
		<div class="panel panel-default">
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
								   	echo '<p><b>customer_id to: </b>'.$Invoices['Invoice']['id'].'</p>';
								   	echo '<p><b>number to : </b>'.$json['Invoice']['inv_number'].'</p>';
								   	echo '<p><b>paid_date to : </b>'.$json['Invoice']['paid_date'].'</p>';
								   	echo '<p><b>date to : </b>'.date('D d-m-Y g:i A',strtotime($json['Invoice']['created'])).'</p>';
								   	echo '<p><b>status to: </b>'.$json['Invoice']['status'].'</p>';
									echo '<p><b>tech_notes to: </b>'.$json['Invoice']['tech_notes'].'</p>';
									echo '<p><b>payer_name to: </b>'.$json['Invoice']['payer_name'].'</p>';
									echo '<p><b>payment_method to: </b>'.$json['Invoice']['payment_method'].'</p>';
									echo '<p><b>ref_number to: </b>'.$json['Invoice']['ref_number'].'</p>';
								}
								else
								{
									echo '<p><b>customer_id to: </b>'.$Invoices['Invoice']['id'].'</p>';
								   	echo '<p><b>number to : </b>'.$json['Invoice']['inv_number'].'</p>';
								   	echo '<p><b>date to : </b>'.date('D d-m-Y g:i A',strtotime($Invoices['Invoice']['created'])).'</p>';								   
									echo '<p><b>due_date to: </b>'.date('D d-m-Y g:i A',strtotime($Invoices['Invoice']['due_date'])).'</p>';
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
		</div>
	

		</div>

			
							



<script>
$(document).ready(function() {
  
$(".ponumberedit").click(function(){
$(".poform").show();
$(".ponumber").hide();
});

    
$(".cancle").click(function(){

$(".ponumber").show();
$(".poform").hide();
});   

$('.submit').click(function(){
		var po_number = $('#po_number').val();
		var inv_id = $('#id').val();
				
		if(po_number!='')
		{
 			   $.ajax({
 			   type: "POST",
 			   url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/Invoices/invoiceupdate/",

 			  // url: "search.php",
 			   data: { po_number : po_number , inv_id:inv_id},
			
 			   success: function(data)
 			   {
  				 //window.location.reload();
  				 $(".poform").hide();
            	 $(".ponumberedit").empty();
            	 $(".ponumberedit").append(po_number);
            	 $(".ponumber").show();
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
var invoice_id =$("#invoice_id").text();
//alert(total);alert(invoice_id);die();
		if(total!='')
		{
 			   $.ajax({
 			   type: "POST",
 			   url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/Invoices/updateinvoice/",

 			  // url: "search.php",
 			   data: { total : total , invoice_id:invoice_id},
			
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
$('#pdfdiv2').hide();
var item =$("#string").text();
var invoice_id =$("#invoice_id").text();
//alert(item);alert(invoice_id);die();

		if(item!='')
		{
 			   $.ajax({
 			   type: "POST",
 			   url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/Invoices/updateinvoiceitem/",

 			  // url: "search.php",
 			   data: { item : item , invoice_id:invoice_id},
			
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
$('#pdfdiv2').hide();
var paid =$("#paid").val();
if(paid =="1"){
	$(".lineitem").hide();

}
else
{
	$(".lineitem").show();
}
		
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
		//alert(dataString);die();
		$("#product_found").show();
		if(searchid!='')
		{
 			   $.ajax({
 			   type: "POST",
 			   url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/Invoices/inventory/",

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

$('.submitqty').click(function(){
		id = $(this).attr('id');
		$(".submitqty_"+id).val("Working....");
		var qty = $('#qty_'+id).val();
		var sale_id = $('#id_'+id).val();
		//alert(qty);
		//alert(sale_id);die();
		
		if(qty!='')
		{
 			   $.ajax({
 			   type: "POST",
 			   url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/Invoices/saleinvoiceupdateqty/",

 			  // url: "search.php",
 			   data: { qty : qty , sale_id:sale_id},
			
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
		var sale_id = $('#id_'+id).val();
		//alert(des);
		//alert(sale_id);die();
		
		if(des!='')
		{
 			   $.ajax({
 			   type: "POST",
 			   url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/Invoices/saleinvoiceupdatedes/",

 			  // url: "search.php",
 			   data: { des : des , sale_id:sale_id},
			
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
		var sale_id = $('#id_'+id).val();
		//alert(des);
		//alert(sale_id);die();
		
		if(item!='')
		{
 			   $.ajax({
 			   type: "POST",
 			   url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/Invoices/saleinvoiceupdateitem/",

 			  // url: "search.php",
 			   data: { item : item , sale_id:sale_id},
			
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
		$(".submitrt_"+id).val("Working....");
	
		var rt = $('#rt_'+id).val();
		var sale_id = $('#id_'+id).val();
		//alert(rt);
		//alert(sale_id);die();
		
		if(rt!='')
		{
 			   $.ajax({
 			   type: "POST",
 			   url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/Invoices/saleinvoiceupdaterate/",

 			  // url: "search.php",
 			   data: { rt : rt , sale_id:sale_id},
			
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










     <!-- scripts -->
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
            doc.save('Invoice details pdf.pdf');
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