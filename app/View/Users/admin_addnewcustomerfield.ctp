<?php echo $this->Flash->render('positive'); ?>
<div class="warper container-fluid">
        	

<div class="row">  	
	<div class="col-xs-2 col-sm-2">
	</div>		
	<div class="col-xs-8 col-sm-8">

		<div class="page-header">
			<h1>New Customer Field<small></small>
			<span class="pull-right">
			<?php echo $this->Html->link('<p class="btn btn-default btn-sm"><i class="fa fa-arrow-left"></i> Back</p>',array('controller' => 'users', 'action' => 'customerfields'),array('escape'=>false));?>
			</span>
			</h1>
		</div>
	</div>
	<div class="col-xs-2 col-sm-2">
	</div>
	
</div>
         
<div class="row">
	
	<div class="col-xs-12 col-sm-12">
		<?php echo $this->Form->create('users',array('controller'=>'Users','action'=>'addnewcustomerfield','class'=>'validator-form')); ?>
					
					
		<div class="row">  
			<div class="col-xs-12 col-sm-2">  
			</div>             
        	<div class="col-xs-12 col-sm-8">
				<div class="form-group">
			 		<?php echo $this->Form->input('CustomerField.name', array('div'=>false,'class'=>'form-control','placeholder' => "eg. Virus, Recovery",'id'=>'get_data','required'=>'required','label'=>'Name')); ?>
				
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
			 		<?php echo $this->Form->input('CustomerField.field_type', array('options' => array('text' => 'Text Field','textarea' => 'Text Area','checkbox' => 'Check Box','date' => 'Date Field','weblink' => 'Web Link'),'class'=>'form-control','label'=>'Field type')); ?>
				
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
					<?php echo $this->Form->button('Create Customer Field', array('class' => 'btn btn-success')); ?>
				</div>
			</div>
			<div class="col-xs-12 col-sm-2">  
			</div>
		</div>		
		<?php echo $this->Form->end(); ?>
            
	</div>
	 

</div>


</div>