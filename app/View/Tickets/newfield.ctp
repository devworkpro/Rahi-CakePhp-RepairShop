<?php echo $this->Flash->render('positive'); ?>
<div class="warper container-fluid">
        	
<div class="row">  			
	<div class="col-xs-12 col-sm-2">
	</div>
	<div class="col-xs-12 col-sm-8">
		<div class="form-group">
			<h3>New Ticket Field for <?php foreach($name as $nm){
					$field_id = $nm['CustomField']['id'];
					echo ucfirst($nm['CustomField']['name']);
				}?></h3>

		</div>
	</div>
	<div class="col-xs-12 col-sm-2">
	</div>
</div>
<div class="row" style="margin-bottom: 50px;">
	
	<div class="col-xs-12 col-sm-12">
		<?php echo $this->Form->create('Ticket',array('controller'=>'Tickets','action'=>'addnewfield','class'=>'validator-form')); ?>
					
					
		<div class="row">  
			<div class="col-xs-12 col-sm-2">  
			</div>             
        	<div class="col-xs-12 col-sm-8">
				<div class="form-group">
			 		<?php echo $this->Form->input('CustomFieldType.name', array('div'=>false,'class'=>'form-control','placeholder' => "eg. Virus, Recovery",'id'=>'get_data','required'=>'required','label'=>'Name')); ?>

			 		<?php echo $this->Form->input('CustomFieldType.custom_field_id', array('type'=>'hidden', 'div'=>false,'class'=>'form-control','value'=>$custom_field_id)); ?>
				
				</div>
        	</div>
        	<div class="col-xs-12 col-sm-2">  
			</div>
    	</div>

    	<div class="row">  
			<div class="col-xs-12 col-sm-2">  
			</div>             
        	<div class="col-xs-12 col-sm-8">
				<div class="form-group">
			 		<?php echo $this->Form->input('CustomFieldType.field_type', array('options' => array('text' => 'Text Field', 'checkbox' => 'Check Box','date' => 'Date Field'),'class'=>'form-control','label'=>'Field type')); ?>
				
				</div>
        	</div>
        	<div class="col-xs-12 col-sm-2">  
			</div>
    	</div>

    	<div class="row">  
			<div class="col-xs-12 col-sm-2"> 
				
			</div>             
        	<div class="col-xs-12 col-sm-8">
				<div class="form-group">
				
			 		<input type="checkbox" name="CustomFieldType[required]">
			 		<label>      Required</label>
				
				</div>
        	</div>
        	<div class="col-xs-12 col-sm-2">  
			</div>
    	</div>

    	<div class="row">  
			<div class="col-xs-12 col-sm-2"> 
				
			</div>             
        	<div class="col-xs-12 col-sm-8">
				<div class="form-group">
				
			 		<input type="checkbox" name="CustomFieldType[hidden]">
			 		<label>      Hidden</label>
				
				</div>
        	</div>
        	<div class="col-xs-12 col-sm-2">  
			</div>
    	</div>
    	
				
		<div class="row"> 
			<div class="col-xs-12 col-sm-2"> 
			</div>               
			<div class="col-xs-12 col-sm-8">
				<div class="btn-group">
					<?php echo $this->Form->button('Create Ticket Field', array('class' => 'btn btn-success')); ?>
				</div>
			</div>
			<div class="col-xs-12 col-sm-2">  
			</div>
		</div>		
		<?php echo $this->Form->end(); ?>
            
	</div>
	 

</div>


</div>