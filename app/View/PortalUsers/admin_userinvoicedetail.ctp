<!-- Modal Pdf-->

<div class="modal fade" id="myModalInvoiceDetail" role="dialog">
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
					 $status = $invoice['Invoice']['status'];
					           							

					 if($status=='1')
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
		     
		        <label for=""><?php echo $user['User']['first_name']." "; ?><?php echo $user['User']['last_name']; ?></label><br>
		        <label for=""> <?php echo $user['User']['address'].' '.$user['User']['city'].' '.$user['User']['state_country'].' '.$user['User']['zip']; ?></label>
		        
		       	</div>
		       	<div class="text-right" style="margin-top:-50px;">
		       
		         	<label for="">
					Invoice #         <span> <?php echo ''.$invoice['Invoice']['inv_number'];?></span><br>
					 </label><br>
		        	<label for="">
					Invoice Date  <span><?php echo ''.date('D d-m-Y g:i A',strtotime($invoice['Invoice']['created']));?></span><br></label><br>

				 	<label for="">
					Total <span> <?php echo '$'.$invoice['Invoice']['total'].".00";?></span><br> </label><br>
		              
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
						<?php foreach($sale as $Inv) {
		                $row_id =  ++$counter; ?>
		                <tr>
							<td><?php echo $row_id;?> </td>
		                    <td><?php echo $item= $Inv['Sale']['item'];?></td>
		                    <div id="itemstring" style="display:none;"><?php echo $string .= $item.',';;?></div>
		                    <td><?php echo $des= $Inv['Sale']['description'];?></td> 
		                    <td>
		                    	<div class="quantity_<?php echo $row_id; ?>" >
		                        <?php echo $qty=$Inv['Sale']['quantity'];?>
		                        </div>
							</td>
		                    <td><?php echo '$'.$rate= $Inv['Sale']['rate'];  ?></td>
		                    <?php $tax_rate= $Inv['Sale']['tax_rate'];  ?>
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
						<b style="font-size:20px;">	</b><br>
						<b style="font-size:20px;">Disclaimer</b><br>
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
								<td align="left" ><strong>Invoice Total:</strong></td>
								<td align="left"><strong><?php echo '$'.$count.'.00';?></strong></td>
							</tr>
							<tr><?php  $amount_provided=$invoice['Invoice']['amount_provided']?>
								<td align="left" > Payments: </td>
								<td align="left"><?php echo '$'.$amount_provided.".00";?></td>
							</tr>
							<tr>
									<?php $due=$count-$amount_provided; 

									if($due>0)
									{
									?>
									<td align="left" >Balance Due:</td>
									<td align="left"><?php echo '$'.$due.".00";?></td>
									<?php
									}
									else{
										?>
										<td align="left" >Balance Due:</td>
										<td align="left"><?php echo '$'.'0'.".00";
									}
									?></td>


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
						<?php $signature = $invoice['Invoice']['signature'];?>
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


			       	<div class="text-right" style="margin-top:-20px;" >
			         

			          	<label for=""> Date </label>


			        	<label for=""> 
						<span><?php echo ''.date('D d-m-Y g:i A',strtotime($invoice['Invoice']['created']));?></span><br>
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
  	<div class="col-lg-1 col-md-1">
  	</div>
  	<div class="col-lg-10 col-md-10">
	<div class="warper container-uid" id="container-w" style="margin-bottom:50px;margin-top:60px;">
		<?php echo $this->Flash->render('positive'); ?>
		<div class="page-header">
		<div class="row">  			
			
			<div class="col-xs-12 col-sm-8">
				<div class="form-group">
					<h2>Invoice Detail</h2>
				</div>
			</div>

			<div class="col-xs-12 col-sm-4 ">
				<div class="form-group pull-right" style="margin-top: 15px;" >
					<a href="#myModalInvoiceDetail" class="btn btn-default" data-toggle="modal"> PDF </a>
					<?php echo $this->Html->link('Back',array('controller' => 'PortalUsers', 'action' => 'myprofile'),array('escape'=>false,'class'=>'btn btn-default'));?>
					
		    	</div> 
		    </div>


		</div>
		</div>


		<div class="row">  		

			


            <div class="col-xs-12 col-sm-6">
				<div class="form-group">
					<div class="panel panel-default">
						<div class="panel-heading"><i class="fa fa-user"></i>   Customer
						</div>
						<div class="panel-body">

							<div class="panel-body">

							<div class="row">  
								<div class="col-xs-12 col-sm-12">
								<div class="form-group">
									<?php $user_id= $user['User']['id'];?>

									<b>Customer: </b> 
									<?php echo $customer_name = $user['User']['first_name'].' '.$user['User']['last_name'];
									?>
									<br><br>
									
									<b>Email: </b><?php echo $user['User']['email']; ?><br><br>
									
									<b>Primary Address: </b>

									<?php 
										$address = $user['User']['address'].' '.$user['User']['city'].' '.$user['User']['state_country'].' '.$user['User']['zip'];
									?>
									<a href="http://maps.google.com/maps?<?php echo $address?>"><?php echo $address;?></a>
									<br><br>

									<b>Office: </b>
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
								</div>


							</div>
       						</div>
		
						</div>
					</div>
				</div>
			</div>


			<div class="col-xs-12 col-sm-6">
				<div class="form-group">
						
					<div class="panel panel-default" id="ticket_info">
						<div class="panel-heading"><i class="fa fa-money"></i>    Invoice Details
						</div>
						<div class="panel-body">

						  	<div class="row">  
								<div class="col-xs-12 col-sm-12">
								<div class="form-group">
								

								<div class="row">  
									<div class="col-xs-12 col-sm-12">
									<div class="form-group">
									<br>
									<b>Invoice Number: </b><?php echo $invoice['Invoice']['inv_number'];?><br><br>
									<b>Created By: </b><?php echo $invoice['Invoice']['created_by'];?><br><br>
										
									<b>Invoice Date:  </b>
									<?php echo date('D d-m-Y g:i A',strtotime($invoice['Invoice']['created']));
									?><br><br>

									<b>Is Paid:</b><td>
									<?php  $status = $invoice['Invoice']['status'];
                     				if($status=='1')
                   					{
                     					echo 'yes';
                     				}
                     				else
                     				{
                      					echo 'Not yet ';
                     				}
                     				?> 
                     				</td><br><br>
									<b>Date Received: </b><?php echo $invoice['Invoice']['paid_date'];?><br><br>
									<b>Tax Rate: </b><?php echo $invoice['Invoice']['tax_rate'];?><br><br>	
									
									
									<b>Sub Total: </b><?php echo '$'.$invoice['Invoice']['total'];?><br><br>
									<b>Total: </b><?php echo '$'.$invoice['Invoice']['total'];?><br><br>
									<b>Ref Number: </b><?php echo $invoice['Invoice']['ref_number'];?><br><br>
									<b>Tech Notes: </b><?php echo $invoice['Invoice']['tech_notes'];?>

										
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
	<div class="col-lg-1 col-md-1">
	</div>
</div>



<!-- PDF -->
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
     $('#myModalInvoiceDetail').hide();


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