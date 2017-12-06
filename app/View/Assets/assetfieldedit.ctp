<?php echo $this->Flash->render('positive'); ?>
<div class="warper container-fluid">
        	
<div class="row">  			
	<div class="col-xs-12 col-sm-2">
	</div>
	<div class="col-xs-12 col-sm-8">
		<div class="form-group">
			<h3>Edit Asset Field for <?php foreach($name as $nm){
					$asset_id = $nm['Asset']['id'];
					echo ucfirst($nm['Asset']['name']);
				}?></h3>

		</div>
	</div>
	<div class="col-xs-12 col-sm-2">
	</div>
</div>
<div class="row" style="margin-bottom: 50px;">
	
	<div class="col-xs-12 col-sm-12">
		<?php echo $this->Form->create('Assets',array('controller'=>'Assets','action'=>'editnewfield','class'=>'validator-form')); ?>
					
					
		<div class="row">  
			<div class="col-xs-12 col-sm-2">  
			</div>             
        	<div class="col-xs-12 col-sm-8">
				<div class="form-group">
			 		<?php echo $this->Form->input('AssetField.name', array('div'=>false,'class'=>'form-control','placeholder' => "eg. Virus, Recovery",'id'=>'get_data','required'=>'required','label'=>'Name','value'=>$AssetField['0']['AssetField']['name'])); ?>

			 		<?php echo $this->Form->input('AssetField.id', array('type'=>'hidden', 'div'=>false,'class'=>'form-control','value'=>$AssetField['0']['AssetField']['id'])); ?>

			 		<?php echo $this->Form->input('AssetField.asset_id', array('type'=>'hidden', 'div'=>false,'class'=>'form-control','value'=>$asset_id)); ?>

					
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
			 		<?php echo $this->Form->input('AssetField.field_type', array('options' => array('text' => 'Text Field', 'checkbox' => 'Check Box','date' => 'Date Field'),'class'=>'form-control','label'=>'Field type','value'=>$AssetField['0']['AssetField']['field_type'])); ?>
				
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
				
			 		<input type="checkbox" name="AssetField[required]" >
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
				<div class="btn-group">
					<?php echo $this->Form->button('Update Asset Field', array('class' => 'btn btn-success')); ?>
				</div>
			</div>
			<div class="col-xs-12 col-sm-2">  
			</div>
		</div>		
		<?php echo $this->Form->end(); ?>
            
	</div>
	 

</div>


</div>