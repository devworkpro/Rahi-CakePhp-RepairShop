<?php echo $this->Flash->render('positive'); ?>
<div class="warper container-fluid" style="margin-bottom:50px;">
	<div class="page-header">
	
	</div>
	<?php
	$invoices_id = $InvoicePayment['InvoicePayment']['invoices'];
	$myinvoice_id = explode(',', $invoices_id);
	for($i=0;$i<count($myinvoice_id);$i++)
	{
	    $last_invoice_id = $myinvoice_id[$i];
	}
	?>
		
	<!-- Related Ticket Panel -->		
	<div class="row" >
		<div class="col-md-12">
			<div class="row">  
				<div class="col-xs-12 col-sm-5">
					
				</div>
				<div class="col-xs-12 col-sm-7">
					<?php echo $this->Html->link('continue',array('controller' => 'Invoices', 'action' => 'invoicedetails',$last_invoice_id),array('escape'=>false,'class'=>'btn btn-success'));?>
				</div>
			</div><br>
		</div>
	</div>

	<div class="row" >
		<div class="col-md-12">
			<div class="row">  
				<div class="col-xs-12 col-sm-5">
					<div class="panel panel-white">
						<div class="panel-body">
						<p>
						<i class="fa fa-money fa fa-3x alert alert-success"> Cash</i>
						</p>
						<p>
						<b>Customer:</b><?php echo $User['User']['first_name'].' '.$User['User']['last_name'] ?>
						</p>
						<p>
						<b>Invoice:</b><?php echo $invids = $InvoicePayment['InvoicePayment']['invoices']; 
						?>
						</p>
						<p>
						<b>Amount:</b><?php echo $InvoicePayment['InvoicePayment']['payment_amount']; ?>
						</p>
						<p>
						<b>First name:</b><?php echo $User['User']['first_name'];?>
						</p>
						<p>
						<b>Last name:</b><?php echo $User['User']['last_name']; ?>
						</p>
						<p>
						<b>Address street:</b><?php echo $User['User']['address']; ?>
						</p>
						<p>
						<b>Address city:</b><?php echo $User['User']['city']; ?>
						</p>
						<p>
						<b>Address State/County:</b><?php echo $User['User']['state_country']; ?>
						</p>
						<p>
						<b>Address Zip/Postal Code:</b><?php echo $User['User']['zip'] ?>
						</p>
						<p>
						<b> Transaction response:</b>
						</p>
						<p>
						<b>Payment method:</b><?php echo $InvoicePayment['InvoicePayment']['payment_method']; ?>
						</p>
						<p>
						<b> Ref:</b><?php echo $InvoicePayment['InvoicePayment']['reference_number']; ?>
						</p>
						<p>
						<b>Success:</b>  true
						</p>

						
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-7">
					<div class="panel panel-white">
						<!-- Signature Panel-->
						<div class="panel-heading"><i class="fa fa-user"></i>     Signature
						<?php $invpayment_id = $InvoicePayment['InvoicePayment']['id'];
						
						?>
						
						</div>
						<div class="panel-body">
						<div class="signature" style="display: none;"><?php echo $signature = $InvoicePayment['InvoicePayment']['signature'];?></div>
						<?php if($signature=='')
						{?>

							<div class="row">  
								<div class="col-xs-12 col-sm-12">
									<?php echo $this->Form->create('Invoice',array('controller'=>'Invoices','action'=>'addinvoicepaymentsignature','class'=>"validator-form")); ?>

										<div class="sigPad" id="smoothed" style="width:400px;margin-top: 20px;">

											<label for="name">Print your name</label>
												<input id="name" class="name form-control" type="text" value="<?php echo $User['User']['first_name'].' '.$User['User']['last_name'];?>" disable="disable">
												<input class="form-control" type="hidden" value="<?php echo $invpayment_id;?>" name='InvoicePayment[payment_invoice_id]'>
												<input class="form-control" type="hidden" value="<?php echo $invoices_id;?>" name='InvoicePayment[invoice_id]'>
												

											<p class="drawItDesc" style="display: block;">Draw your signature</p>
										<ul class="sigNav">
											<li class="drawIt"><a href="#draw-it" >Sign Here</a></li>
											<li class="clearButton"><a href="#clear">Clear</a></li>
										</ul>
										<div class="sig sigWrapper" style="height:auto;">
											<div class="typed"></div>
											<canvas class="pad" height="110" width="398"></canvas>
											<input type="hidden" name="InvoicePayment[signature]" class="output">
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
					
				
		</div>
	</div>

	

</div>


			
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