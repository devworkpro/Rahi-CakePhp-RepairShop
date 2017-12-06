<?php echo $this->Flash->render('positive'); ?>
<div class="col-xs-12 col-sm-12"  style="margin-top:50px; margin-bottom: 10px;">
	<div class="col-xs-12 col-sm-12">
	<div class="form-group">
	<div class="panel panel-default">
	<div class="panel-heading"><h4><i class="fa fa-money"></i>Transaction</h4></div>
    <div class="panel-body">

	<table  class="table table-striped table-bordered" style="">
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
					<td><?php echo $item= $Inv['Sale']['item'];?></td>
					<td><?php echo $qty=$Inv['Sale']['quantity'];?></td>
					<td><?php echo '$'.$item= $Inv['Sale']['rate'];?></td>

				</tr>  
				<?php 	$cost=$Inv['Sale']['rate'];
					$price=$qty*$cost;
					$total=$price+$total;
					$tax=$tax_rate+$tax;
				?>
				<?php $tax_rate= $Inv['Sale']['tax_rate'];  ?>

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

		<?php $inv_numner=rand(10,10000); ?>
		

		</tbody>
	</table>
	</div>
	</div>
	</div>
	</div>  



<div class="warper container-fluid">
<?php foreach($user as $users) {?>
		<div ><h2> New payment <br>
		 	Customer:  <span id="customer"><?php echo $first_name = $users['users']['first_name'];?>
							<?php echo $last_name=$users['users']['last_name'];?>
						</span>,
		 	Invoice:  <span id="invoice"><?php echo $inv_numner;?></span>,
		 	Amount:   <span id="amount"><?php echo '$'.$count;?></span>
		  </h2>
	</div>				
							

<?php } ?> 






	
	<div class="row" style="margin-top:20px;">
		<div class="col-md-12">
			<div class="panel panel-default">
			
           		<div class="panel-body">
					
				<?php echo $this->Form->create('Payment',array('controller'=>'Payments','action'=>'addpayment')); ?>
					<?php $a=$this->Session->read('Auth.User.email');?>
				<div class="panel-body">
				
					<div class="row">  
						<div class="col-xs-12 col-sm-5">
							<div class="form-group">
								
								<label>Payment Date</label>
                  				<div class='input-group date' id="datetimepicker2" >
                      				<?php echo $this->Form->input('Payment.payment_date', array('class'=>'form-control','div'=>false, 'label'=>false,'required'=>'required')); ?>
                      			<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                  				</div>
								


								<?php echo $this->Form->input('Invoice.inv_number', array('type'=>'hidden','class'=>'form-control','value'=>$inv_numner)); ?>
								<?php echo $this->Form->input('Invoice.created_by', array('type'=>'hidden','class'=>'form-control','value'=>$a)); ?>
								<?php echo $this->Form->input('Invoice.user_id', array('type'=>'hidden','class'=>'form-control','value'=>$userid)); ?>
								<?php echo $this->Form->input('Invoice.total', array('type'=>'hidden','class'=>'form-control','value'=>$count)); ?>
								<?php echo $this->Form->input('Invoice.status', array('type'=>'hidden','div'=>false,'class'=>'form-control','value'=>1)); ?>
								<?php echo $this->Form->input('Invoice.payment_method', array('type'=>'hidden','class'=>'form-control','value'=>$method)); ?>



							</div>
                    	</div>
					
					
						<div class="col-xs-12 col-sm-5">
							<div class="form-group">
								
								<?php echo $this->Form->input('Payment.first_name', array('div'=>false,'class'=>'form-control')); ?>
								
							</div>
                   		</div>

                   		<div class="col-xs-12 col-sm-2">
							<div class="form-group">
								
								<i class="fa fa-money fa fa-3x alert alert-success"></i>
							</div>
                   		</div>

					</div>

					<div class="row">  
						<div class="col-xs-12 col-sm-5">
							<div class="form-group">
								<?php echo $this->Form->input('Payment.payment_method', array('options' => array('cash' => 'Cash', 'creditcart' => 'Credit Cart','ckeck' => 'Ckeck','offlinecc' => 'offline cc','quick' => 'Quick','other' => 'Other','new' => 'New','storecredit' => 'store Credit'),'class'=>'form-control')); ?>
							</div>
                    	</div>
					
					
						<div class="col-xs-12 col-sm-5">
							<div class="form-group">
								
								<?php echo $this->Form->input('Payment.last_name', array('div'=>false,'class'=>'form-control')); ?>

							</div>
                   		</div>

                   		<div class="col-xs-12 col-sm-2">
							<div class="form-group">
								<p>Browser communication protected by strong SSL</p>
							</div>
                   		</div>

					</div>


					<div class="row">  
						<div class="col-xs-12 col-sm-5">
							<div class="form-group">
								<?php echo $this->Form->input('Payment.Check Number/Reference Number', array('div'=>false,'class'=>'form-control')); ?>
							</div>
                    	</div>
					
					
						<div class="col-xs-12 col-sm-5">
							<div class="form-group">
								
								<?php echo $this->Form->input('Payment.Address_street_name', array('div'=>false,'class'=>'form-control')); ?>
								
							</div>
                   		</div>

                   		<div class="col-xs-12 col-sm-2">
							<div class="form-group">
								
								
							</div>
                   		</div>

					</div>

					<div class="row">  
						<div class="col-xs-12 col-sm-5">
							<div class="form-group">
								<?php echo $this->Form->input('Payment.Payment amount', array('div'=>false,'class'=>'form-control')); ?>
							</div>
                    	</div>
					
					
						<div class="col-xs-12 col-sm-5">
							<div class="form-group">
								
								<?php echo $this->Form->input('Payment.city', array('div'=>false,'class'=>'form-control')); ?>

							</div>
                   		</div>

                   		<div class="col-xs-12 col-sm-2">
							<div class="form-group">
								
							</div>
                   		</div>

					</div>


					<div class="row">  
						<div class="col-xs-12 col-sm-5">
							<div class="form-group">

								<div class="cashOnly" style="background-color: lightgoldenrodyellow; padding: 18px; width: 240px; margin-left: 20px;">
									<div class="form-group string optional tenderedAmount">
										<div class="controls">
											<?php echo $this->Form->input('Invoice.amount_provided', array('type'=>'number','div'=>false,'class'=>'form-control', 'id'=>'tender','required'=>'required','label'=>'Amount Tendered (To calculate change)','value'=>$count,'placeholder'=>"eg, 20.00" )); ?>
										</div>
									</div>
									<h3>Change:&nbsp;<span class="changer"></span></h3>
								</div>

							</div>
                    	</div>
					
					
						<div class="col-xs-12 col-sm-5">
							<div class="form-group">
								
								<?php echo $this->Form->input('Payment.State/County', array('div'=>false,'class'=>'form-control')); ?>
								
							</div>
                   		</div>

                   		<div class="col-xs-12 col-sm-2">
							<div class="form-group">
								
								
							</div>
                   		</div>

					</div>

					<div class="row">  
						<div class="col-xs-12 col-sm-5">
							<div class="form-group">


							</div>
                    	</div>
					
					
						<div class="col-xs-12 col-sm-5">
							<div class="form-group">
								
								<?php echo $this->Form->input('Payment.Zip/Postal Code', array('div'=>false,'class'=>'form-control')); ?>

							</div>
                   		</div>

                   		<div class="col-xs-12 col-sm-2">
							<div class="form-group">
								
								
							</div>
                   		</div>

					</div>

					<div class="row">  
						<div class="col-xs-12 col-sm-5">
							<div class="form-group">
									
							</div>
                    	</div>
					
					
						<div class="col-xs-12 col-sm-5">
							<div class="form-group">
								
								<?php echo $this->Form->button('Take Payment', array('class' => 'btn btn-success pull-left')); ?>

							</div>
                   		</div>

                   		<div class="col-xs-12 col-sm-2">
							<div class="form-group">
								
								
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
</div>				
	


<script type="text/javascript">
$(document).ready(function(){
	$('#tender').keyup(function(){

		var total = $(this).val();
		var oldtotal = $('#totalamount').text();
		var cal= total-oldtotal;
		var calculator=(cal.toFixed(2));	
		$('.changer').html(calculator);


	//	alert(total);alert(oldtotal);die();
		 

	});
	
});
</script>			
   

<script src="<?php echo $this->webroot.'js/jquery/jquery-1.9.1.min.js'?>"></script>
<script type="text/javascript">

$(function() {
    $("#datetimepicker1").datetimepicker();
    $("#datetimepicker2").datetimepicker();
});


</script>




