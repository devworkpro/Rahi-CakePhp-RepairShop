<div class="result">
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
		       	<div class="text-right" style="margin-top:-65px;">
		       
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