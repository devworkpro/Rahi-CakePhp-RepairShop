<?php echo $this->Flash->render('positive'); ?>
<div class="warper container-fluid" style="margin-bottom:100px;">
        	
<div class="row">  			
	<div class="col-xs-12 col-sm-2">
	</div>
	<div class="col-xs-12 col-sm-8">
		<div class="form-group">
			<h3>Edit <?php 
			$type = $Assets[0]['asset_field_values']['type'];
			echo ucfirst($type);?> Asset </h3>
		</div>
	</div>
	<div class="col-xs-12 col-sm-2">
	</div>
</div>
<div class="row">
	
	<div class="col-xs-12 col-sm-12">
		<?php echo $this->Form->create('Assets',array('controller'=>'Assets','action'=>'assetfieldvalueedit','class'=>'validator-form','id'=>"wizardForm")); ?>
					
					
		<div class="row">  
			<div class="col-xs-12 col-sm-2">  
			</div>             
        	<div class="col-xs-12 col-sm-8">
				<div class="form-group">
			 		<?php echo $this->Form->input('AssetFieldValue.user', array('div'=>false,'class'=>'form-control','required'=>'required','label'=>'Customer Name','value'=>$Assets[0]['users']['first_name'].' '.$Assets[0]['users']['last_name'],'readonly' => 'readonly')); ?>


			 		<?php echo $this->Form->input('AssetFieldValue.id', array('type'=>'hidden', 'div'=>false,'class'=>'form-control','value'=>$Assets[0]['asset_field_values']['id'])); ?>

			 		<?php echo $this->Form->input('AssetFieldValue.type', array('type'=>'hidden', 'div'=>false,'class'=>'form-control','value'=>$type)); ?>

			 		<?php echo $this->Form->input('AssetFieldValue.asset_id', array('type'=>'hidden', 'div'=>false,'class'=>'form-control','value'=>$Assets[0]['asset_field_values']['asset_id'])); ?>

					<?php echo $this->Form->input('AssetFieldValue.user_id', array('type'=>'hidden', 'div'=>false,'class'=>'form-control','value'=>$Assets[0]['asset_field_values']['user_id'])); ?>

					<?php echo $this->Form->input('AssetFieldValue.text', array('type'=>'hidden', 'div'=>false,'class'=>'form-control','value'=>'1')); ?>

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
			 		<?php echo $this->Form->input('AssetFieldValue.name', array('div'=>false,'class'=>'form-control','required'=>'required','label'=>'Asset Name','value'=>$Assets[0]['asset_field_values']['name'])); ?>
				
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
			 		<?php echo $this->Form->input('AssetFieldValue.serial_number', array('div'=>false,'class'=>'form-control','required'=>'required','label'=>'Asset Serial Number (unique identifier)','value'=>$Assets[0]['asset_field_values']['serial_number'])); ?>
				
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
    	<?php $property =$Assets[0]['asset_field_values']['properties'];
      	//pr($property);
        if($property!='')
        {
        	echo $this->Form->input('AssetFieldValue.text', array('type'=>'hidden', 'div'=>false,'class'=>'form-control','value'=>'2'));
          $json = json_decode($property, true);
          $count= count($json['name']);
          if($count==1)
          {
          	$value = $json['value'][1];
          	$name = $json['name'][1];
          	$asset_field_id = $json['asset_field_id'][1];
          	$field_type = $json['field_type'][1];
            //echo '<p><b>'.$json['name'][1].': </b>'.$json['value'][1].'</p>';

          	if($field_type=='text')
			{
			echo $this->Form->input('Assets.name', array('type'=>$field_type,'class'=>'form-control','label'=>$name,'name'=>'AssetFieldValue[properties][value]['.$count.']','value'=>$value));
			echo $this->Form->input('Assets.asset_field_id', array('type'=>'hidden','class'=>'form-control','value'=>$asset_field_id,'name'=>'AssetFieldValue[properties][asset_field_id]['.$count.']'));

			echo $this->Form->input('Assets.field_type', array('type'=>'hidden','class'=>'form-control','value'=>$field_type,'name'=>'AssetFieldValue[properties][field_type]['.$count.']'));
			echo $this->Form->input('Assets.name', array('type'=>'hidden','class'=>'form-control','value'=>$name,'name'=>'AssetFieldValue[properties][name]['.$count.']'));

			}
			elseif($field_type=="date")
			{
				?>

				<label><?php echo $name?></label>
                  	<input type="text" name="AssetFieldValue[properties][value][<?php echo $count;?>]" value=<?php echo $value;?> class="form-control date-picker" >
                    
                <?php


				echo $this->Form->input('Assets.asset_field_id', array('type'=>'hidden','class'=>'form-control','value'=>$asset_field_id,'name'=>'AssetFieldValue[properties][asset_field_id]['.$count.']'));

				echo $this->Form->input('Assets.field_type', array('type'=>'hidden','class'=>'form-control','value'=>$field_type,'name'=>'AssetFieldValue[properties][field_type]['.$count.']'));
				echo $this->Form->input('Assets.name', array('type'=>'hidden','class'=>'form-control','value'=>$name,'name'=>'AssetFieldValue[properties][name]['.$count.']'));

				
			}
			elseif($field_type=="checkbox")
			{
				?><input type="checkbox" name="AssetFieldValue[properties][value][<?php echo $count;?>]" value=<?php echo $value; ?>><label>&nbsp;<?php echo $name;?></label>
                <?php


				echo $this->Form->input('Assets.asset_field_id', array('type'=>'hidden','class'=>'form-control','value'=>$asset_field_id , 'name'=>'AssetFieldValue[properties][asset_field_id]['.$count.']'));
				echo $this->Form->input('Assets.field_type', array('type'=>'hidden','class'=>'form-control','value'=>$field_type,'name'=>'AssetFieldValue[properties][field_type]['.$count.']'));
				echo $this->Form->input('Assets.name', array('type'=>'hidden','class'=>'form-control','value'=>$name,'name'=>'AssetFieldValue[properties][name]['.$count.']'));
				
			}



          	?>
      			
      	<?php
          }
          else{
            for($i=1;$i<=$count;$i++)
            {     

            $value = $json['value'][$i];
          	$name = $json['name'][$i];
          	$asset_field_id = $json['asset_field_id'][$i];
          	$field_type = $json['field_type'][$i];

          //echo '<p><b>'.$json['name'][$i].': </b>'.$json['value'][$i].'</p>';
          	
			if($field_type=='text')
			{
			echo $this->Form->input('Assets.name', array('type'=>$field_type,'class'=>'form-control','id'=>'get_data','label'=>$name,'name'=>'AssetFieldValue[properties][value]['.$i.']','value'=>$value));
			echo $this->Form->input('Assets.asset_field_id', array('type'=>'hidden','class'=>'form-control','value'=>$asset_field_id,'name'=>'AssetFieldValue[properties][asset_field_id]['.$i.']'));

			echo $this->Form->input('Assets.field_type', array('type'=>'hidden','class'=>'form-control','value'=>$field_type,'name'=>'AssetFieldValue[properties][field_type]['.$i.']'));
			echo $this->Form->input('Assets.name', array('type'=>'hidden','class'=>'form-control','value'=>$name,'name'=>'AssetFieldValue[properties][name]['.$i.']'));

			
			}
			elseif($field_type=="date")
			{
				?>

				<label><?php echo $name?></label>
                   	                   
                    <input type="text" name="AssetFieldValue[properties][value][<?php echo $i; ?>]" value=<?php echo $value;?> class="form-control date-picker" >
                <?php


				echo $this->Form->input('Assets.asset_field_id', array('type'=>'hidden','class'=>'form-control','value'=>$asset_field_id,'name'=>'AssetFieldValue[properties][asset_field_id]['.$i.']'));

				echo $this->Form->input('Assets.field_type', array('type'=>'hidden','class'=>'form-control','value'=>$field_type,'name'=>'AssetFieldValue[properties][field_type]['.$i.']'));
				echo $this->Form->input('Assets.name', array('type'=>'hidden','class'=>'form-control','value'=>$name,'name'=>'AssetFieldValue[properties][name]['.$i.']'));

				
			}
			elseif($field_type=="checkbox")
			{
				?><input type="checkbox" name="AssetFieldValue[properties][value][<?php echo $i;?>]" value=<?php echo $value;?>><label>&nbsp;<?php echo $name;?></label>
                <?php


				echo $this->Form->input('Assets.asset_field_id', array('type'=>'hidden','class'=>'form-control','value'=>$asset_field_id , 'name'=>'AssetFieldValue[properties][asset_field_id]['.$i.']'));
				echo $this->Form->input('Assets.field_type', array('type'=>'hidden','class'=>'form-control','value'=>$field_type,'name'=>'AssetFieldValue[properties][field_type]['.$i.']'));
				echo $this->Form->input('Assets.name', array('type'=>'hidden','class'=>'form-control','value'=>$name,'name'=>'AssetFieldValue[properties][name]['.$i.']'));
				
			}
            } 
          }
          
        }?>
    	
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
					<?php echo $this->Form->button('Update Asset', array('class' => 'btn btn-success')); ?>
				</div>
			</div>
			<div class="col-xs-12 col-sm-2">  
			</div>
		</div>		
		<?php echo $this->Form->end(); ?>
            
	</div>
	 

</div>


</div>

