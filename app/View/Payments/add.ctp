<?php echo $this->Flash->render('positive'); ?>
<div class="warper container-fluid">
	<div ><h2> New payment <br>
		 	Customer:  <span id="customer"></span>
		 	Invoice:  <span id="invoice"></span>
		 	Amount:   <span id="amount"></span>
		  </h2>
	</div>
	<div class="row" style="margin-top:20px;">
		<div class="col-md-12">
			<div class="panel panel-default">
			
           		<div class="panel-body">
					
				<?php echo $this->Form->create('Payment',array('controller'=>'Payments','action'=>'add')); ?>
					
				<div class="panel-body">
				
					<div class="row">  
						<div class="col-xs-12 col-sm-6">
							<div class="form-group">
								<?php echo $this->Form->input('Product.payment_date', array('div'=>false,'class'=>'form-control')); ?>
							</div>
                    	</div>
					
					
						<div class="col-xs-12 col-sm-6">
							<div class="form-group">
								
								<?php echo $this->Form->input('Product.first_name', array('div'=>false,'class'=>'form-control')); ?>
								
							</div>
                   		</div>

					</div>

					<div class="row">  
						<div class="col-xs-12 col-sm-6">
							<div class="form-group">
								<?php echo $this->Form->input('Product.payment_method', array('options' => array('NULL' => 'Default', 'Hardware' => 'Hardware','iphone' => 'iphone','Labor' => 'Labor'),'class'=>'form-control')); ?>
							</div>
                    	</div>
					
					
						<div class="col-xs-12 col-sm-6">
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
				
				
   






