<?php echo $this->Flash->render('positive'); ?>
<div class="warper container-fluid">
           
        <div class="row" style="margin-bottom: 50px;">
            <div class="col-md-12">
            	<?php echo $this->Form->create('Ticket',array('controller'=>'Tickets','action'=>'fieldtype','class'=>'validator-form')); ?>
					
					
					<div class="row">  
						<div class="col-xs-12 col-sm-1">  
						</div>             
                    	<div class="col-xs-12 col-sm-10">
							<div class="form-group">
						 		<?php echo $this->Form->input('CustomField.name', array('div'=>false,'class'=>'form-control','placeholder' => "eg. Virus, Recovery",'id'=>'get_data','required'=>'required','label'=>'Custom Field Type Name')); ?>
								<?php echo $this->Form->input('CustomField.login_id', array('type'=>'hidden','class'=>'form-control','value'=>$this->Session->read('Auth.User.id'))); ?>
							</div>
                    	</div>
                    	<div class="col-xs-12 col-sm-1">  
						</div>
                	</div>

				
					<div class="row"> 
						<div class="col-xs-12 col-sm-1"> 
						</div>               
						<div class="col-xs-12 col-sm-10">
							<div class="btn-group">
								<?php echo $this->Form->button('Create Ticket Type', array('class' => 'btn btn-success pull-left')); ?>
							</div>
						</div>
						<div class="col-xs-12 col-sm-1">  
						</div>
					</div>		
				<?php echo $this->Form->end(); ?>
            </div>
            	
		</div>
</div>