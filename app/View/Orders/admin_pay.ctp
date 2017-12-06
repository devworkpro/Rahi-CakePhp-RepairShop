<?php echo $this->Flash->render('positive'); ?>
<div class="warper container-fluid" style="margin-bottom:50px;">
    <div class="row" style="margin:50px 0px 30px 0px;">
        <div class="col-md-3">
        </div>
        <div class="col-md-6">
        	<h3>Pay for Customer Purchase</h3>
        </div>
        <div class="col-md-3">
        </div>
    </div>
            
        <div class="row">
            <div class="col-md-3">
            </div>
            <div class="col-md-6">
            <div class="well">

				<div class="row">
					<div class="col-md-1">
        			</div>
            		<div class="col-md-11">
						<h3><b>Payment Amount: <?php echo '$'.$order['Order']['total'].'.00' ;?></b></h3>
					</div>	
				</div>
				<hr class="dotted">
				<div class="row">
					<?php echo $this->Form->create('Order',array('controller'=>'orders','action'=>'pay','class'=>"validator-form",'id'=>"wizardForm")); ?>
            		
					<div class="col-md-6">
	                	<div class="form-group">
							<?php echo $this->Form->input('Order.payment_method', array('div'=>false,'class'=>'form-control','required'=>'required','label'=>'Payment Method','options' => array('Cash'=>'Cash','Credit Card' => 'Credit Card', 'Check' => 'Check','Offline CC' => 'Offline CC','Quick' => 'Quick','Other' => 'Other','New' => 'New'))); ?>
		                </div>
		                <div class="form-group">
		                	<?php echo $this->Form->input('Order.ref_num', array('type'=>'text','div'=>false,'class'=>'form-control','label'=>'Ref Number')); ?>
		                </div>
		               
					</div>
					<div class="col-md-6">
	                	<div class="form-group">
		                <?php echo $this->Form->input('Order.message', array('type'=>'textarea','div'=>false,'class'=>'form-control','label'=>"Message")); ?>
		                </div>
		                <?php echo $this->Form->button('Record Payment', array('class' => 'btn btn-success pull-right')); ?>
					</div>

					<?php echo $this->Form->input('Order.order_id', array('type'=>'hidden','div'=>false,'class'=>'form-control','value'=>$order['Order']['id'])); ?>	
                
                	<?php echo $this->Form->input('Order.pay_date', array('type'=>'hidden','div'=>false,'class'=>'form-control','value'=>date("D d-m-Y g:i A"))); ?>	
                 
				  	<?php echo $this->Form->input('Order.paid', array('type'=>'hidden','div'=>false,'class'=>'form-control','value'=>'1')); ?>
            	
            		<?php echo $this->Form->end(); ?>
				</div>
			</div>
            
			</div>
		
			<div class="col-md-3">
		    </div>
		</div>
</div>