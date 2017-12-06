<?php echo $this->Flash->render('positive'); ?>
<div class="warper container-fluid" style="margin-bottom:50px;">
	<div class="page-header">
	<h1>New payment<br>
	Customer: <?php echo $User['User']['first_name'].' '.$User['User']['last_name'].' ';?>
	,Amount:
	<?php 
		foreach($Invoices as $Inv)
		{ 
			if($inv_id == $Inv['Invoice']['id'])
			{
				$total_pay_amount   = $Inv['Invoice']['total'];
				$total_paid_amount  = $Inv['Invoice']['paid_amount'];
				$pay_amount = $total_pay_amount-$total_paid_amount;
				echo '$'.$pay_amount;
			}
		}
	?>
	<span id="payment_amount" style="display: none;"><?php echo $pay_amount;?></span>

	</h1>
	</div>
		
	<!-- Open Invoice Iist Items Panel -->

	<div class="row">  
		<div class="col-xs-12 col-sm-12">
			<div class="form-group">
				
				<div class="panel panel-default">
					<div class="panel-heading">  Open Invoices
					</div>
					<div class="panel-body">
						<div class="row">  
						<div class="col-xs-12 col-sm-12">
							<div class="form-group">
								
							<table cellpadding="0" cellspacing="0" border="0" class="table table-striped custom-table-code table-bordered table-responsive" id="basic-datatable">
       						<thead>
        					<tr>	 
         					<th>#</th>
				        	<th>Invoice Number</th>
         					<th>Invoice Date</th>
					        <th>Invoice Balance Due</th>
					        <th>Amount to Apply</th>
          					                 
			         		</tr>
		          			</thead>
		          			<tbody class="userdata">
        					<?php $counter=0;$total=0;$tax=0;$string=''; ?>
          					<?php foreach($Invoices as $Inv) {
          						//pr($Inv);
          						$row_id =  ++$counter;
          						$invoice_id = $Inv['Invoice']['id'];
          						$total = $total + $Inv['Invoice']['total'];

          					if($inv_id != $invoice_id)
          					{
          					?>


          					<tr>
          						<td><?php echo $row_id;?> </td>
	             				<td>
	             					<?php echo $this->Html->link($Inv['Invoice']['inv_number']." (new window)",array('controller'=>'Invoices','action'=>'invoicedetails',$invoice_id),array('escape'=>false));?>
								</td>           				
	             				<td>
	             					<?php echo date('D d-m-Y g:i A',strtotime($Inv['Invoice']['created']));?>
								</td>
	             				<td>
	             				<?php 
	             					$invoice_total = $Inv['Invoice']['total'];
	             					$paid_amount   = $Inv['Invoice']['paid_amount'];
	             					$unpaid_amount = $invoice_total-$paid_amount;
	             					?>
	             					<?php echo '$'.$unpaid_amount;?>
	             				</td>
	             				<td>Amount to Apply<br>
	             				<input type="text" name="amount_to_pay" class="pay_<?php echo $row_id;?> amount_to_pay" id="<?php echo $row_id;?>" data-invoiceid="<?php echo $Inv['Invoice']['id'];?>" style="width: 100px;">
	             				
	             				</td>
             				</tr> 

  							<?php }else{
  								?>


          					<tr>
          						<td><?php echo $row_id;?> </td>
	             				<td>
	             					<?php echo $this->Html->link($Inv['Invoice']['inv_number']." (new window)",array('controller'=>'Invoices','action'=>'invoicedetails',$invoice_id),array('escape'=>false));?>
								</td>           				
	             				<td>
	             					<?php echo date('D d-m-Y g:i A',strtotime($Inv['Invoice']['created']));?>
								</td>
	             				<td>
	             					<?php $invoice_total = $Inv['Invoice']['total'];
	             					$paid_amount   = $Inv['Invoice']['paid_amount'];
	             					$unpaid_amount = $invoice_total-$paid_amount;
	             					?>
	             					<?php echo '$'.$unpaid_amount;?>
	             				</td>
	             				<td>Amount to Apply<br>
	             				<input type="text" name="amount_to_pay" class="pay_<?php echo $row_id;?> amount_to_pay" id="<?php echo $row_id;?>" value="<?php echo $unpaid_amount;?>" data-invoiceid="<?php echo $Inv['Invoice']['id'];?>" style="width: 100px;">
	             				</td>
             				</tr>
             				<?php
  							}
  							} ?> 

  							<tr class="print-hide">
								<td colspan="3">
									<span class="pull-right"><b>Total:</b></span>
	  							</td>
  								<td><b><?php echo '$'.$total;?></b></td>
  								<td><b>$<span id="paymentsTotal"></span></b></td>
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
		
	<!-- Related Ticket Panel -->
		
	<div class="row" >
		<div class="col-md-12">
			<div class="panel panel-white">
			
           		<div class="panel-body">
				<?php echo $this->Form->create('Invoice',array('controller'=>'Invoices','action'=>'addpayment')); ?> 
					<?php $a=$this->Session->read('Auth.User.email');?>
				<div class="panel-body">
				
					<div class="row">  
						<div class="col-xs-12 col-sm-5">
							<div class="form-group">
								
                  				<div class='form-group'>
                      			<?php echo $this->Form->input('InvoicePayment.payment_date', array('class'=>'form-control date date-picker','label'=>'Payment Date','required'=>'required')); ?>

                      			<?php echo $this->Form->input('InvoicePayment.user_id', array('class'=>'form-control','type'=>'hidden','required'=>'required','value'=>$User['User']['id'])); ?>
                      			
                  				</div>
                  				<div class="form-group">

								<?php echo $this->Form->input('InvoicePayment.payment_method', array('options' => array('cash' => 'Cash', 'creditcart' => 'Credit Cart','ckeck' => 'Ckeck','offlinecc' => 'offline cc','quick' => 'Quick','other' => 'Other','new' => 'New','storecredit' => 'store Credit'),'class'=>'form-control','label'=>'Payment Method')); ?>

								</div>
								<div class="form-group">

								<?php echo $this->Form->input('InvoicePayment.reference_number', array('div'=>false,'class'=>'form-control','label'=>'Check Number/Reference Number')); ?>

								<?php echo $this->Form->input('InvoicePayment.invoices', array('type'=>'hidden','class'=>'form-control','id'=>'Invoices_ids','value'=>$inv_id)); ?>

								</div>

								<div class="form-group">
								<?php echo $this->Form->input('InvoicePayment.payment_amount', array('div'=>false,'class'=>'form-control payment_amount_value','label'=>'Payment Amount','value'=>$pay_amount,'onkeypress'=>'return isNumber(event)','label'=>'Payment Amount')); ?>
								</div>

								<div class="form-group">

									<div class="cashOnly" style="background-color: lightgoldenrodyellow; padding: 18px; width: 240px; margin-left: 20px;">
										<div class="form-group string optional tenderedAmount">
											<div class="controls">
												<?php echo $this->Form->input('Invoice.amount_provided', array('type'=>'text','div'=>false,'class'=>'form-control', 'id'=>'tender','required'=>'required','label'=>'Amount Tendered (To calculate change)','value'=>$pay_amount,'placeholder'=>"eg, 20.00", 'onkeypress'=>'return isNumber(event)')); ?>
											</div>
										</div>
										<h3>Change:&nbsp;<span class="changer"></span></h3>
									</div>

								</div>

							</div>
                    	</div>
					
					
						<div class="col-xs-12 col-sm-5">
							<div class="form-group">
								
								<?php echo $this->Form->input('Payment.first_name', array('div'=>false,'class'=>'form-control','label'=>'First Name','value'=>$User['User']['first_name'])); ?>
								
							</div>
							<div class="form-group">
								
								<?php echo $this->Form->input('Payment.last_name', array('div'=>false,'class'=>'form-control','label'=>'Last Name','value'=>$User['User']['last_name'])); ?>

							</div>
							<div class="form-group">
								
								<?php echo $this->Form->input('Payment.Address_street_name', array('div'=>false,'class'=>'form-control','label'=>'Address Street','value'=>$User['User']['address'])); ?>
								
							</div>
							<div class="form-group">
								
								<?php echo $this->Form->input('Payment.city', array('div'=>false,'class'=>'form-control','label'=>'City','value'=>$User['User']['city'])); ?>

							</div>
							<div class="form-group">
								
								<?php echo $this->Form->input('Payment.state_county', array('div'=>false,'class'=>'form-control','label'=>'State/County','value'=>$User['User']['state_country'])); ?>
								
							</div>
							<div class="form-group">
								
								<?php echo $this->Form->input('Payment.zip', array('div'=>false,'class'=>'form-control','label'=>'Zip/Postal Code','value'=>$User['User']['zip'])); ?>

							</div>
							<div class="form-group">
								<p class="btn btn-success pull-left take_payment">Take Payment</p>
								<span style="display: none"><?php echo $this->Form->input('Take Payment', array('type'=>'button','class'=>'btn btn-success pull-left take_payment_form_btn')); ?></span>
								
								

							</div>
                   		</div>

                   		<div class="col-xs-12 col-sm-2">
							<div class="form-group">
								<i class="fa fa-money fa fa-3x alert alert-success"></i>
							</div>
							<div class="form-group">
								<p>Browser communication protected by strong SSL</p>
							</div>
                   		</div>

					</div>







					
				</div>
					
							
				

				<?php echo $this->Form->end(); ?> 
				</div>
				
			</div>
		</div>
	</div>

	

</div>

<!-- Tender value change -->

<script type="text/javascript">
$(document).ready(function(){
	$('#tender').keyup(function(){

		var total = $(this).val();
		var oldtotal = $('#paymentsTotal').text();
		var cal= total-oldtotal;
		var calculator=(cal.toFixed(2));	
		$('.changer').html(calculator);


	//	alert(total);alert(oldtotal);die();
		 

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

<!-- Sum all the amount to apply and count total -->

<script type="text/javascript">
$(document).ready(function(){
	$('#paymentsTotal').html($('#payment_amount').text());
	$('.amount_to_pay').keyup(function(){

		var payment_amount = $('#payment_amount').text();
		
		var inputs    = $(".amount_to_pay");
		var Invoices_id_val =new Array();
		var sum = 0;
  			$(inputs).each(function(){
     			if($(this).val() !==''){

        			sum +=parseInt($(this).val());
        			var invoiceid = $(this).attr('data-invoiceid');
  					Invoices_id_val.push(invoiceid);
      			}
			});
  			$('#Invoices_ids').val(Invoices_id_val);
		$('#paymentsTotal').html(sum);
		$('#PaymentPaymentAmount').val(sum);
		$('#tender').val(sum);
		$('.payment_amount_value').val(sum);
		//alert(sum);

	//	alert(total);alert(oldtotal);die();
		 

	});
	
});
</script>

<!-- Update payment amount into Invoice -->

<script type="text/javascript">
$(document).ready(function(){
	
	$('.take_payment').click(function(){

		var payment_amount = $('#payment_amount').text();
		
		var inputs    = $(".amount_to_pay");
		
		var sum = 0;
		//var Invoices_id_val =new Array();
		if(inputs!='')
		{
  			$(inputs).each(function(){
  				var amount_to_pay = $(this).val();
  				var invoiceid = $(this).attr('data-invoiceid');
  				//Invoices_id_val.push(invoiceid);
  				//alert(amount_to_pay);alert(invoiceid);
  				if(amount_to_pay!='')
  				{
	     			$.ajax({
		                type: "POST",
		                url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/Invoices/updateinvoicebypayment/",
		                data: { amount_to_pay : amount_to_pay, invoiceid : invoiceid },
		            
		                success: function(data)
		                {
		                      // location.reload();
		                                
		                }
	            	});
	            }

			});
			$('.take_payment_form_btn').trigger('click');
		}
			
  			//$('#Invoices_ids').val(Invoices_id_val);
		
	});
	
});
</script>
