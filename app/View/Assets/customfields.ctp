<?php echo $this->Flash->render('positive'); ?>
<div class="result">


<div class="warper container-fluid">
        	
<div class="row"> 
	<div class="col-xs-12 col-sm-12">
		<div class="form-group"> 		
		<?php 
			echo $this->Form->input('Assets.name', array('type'=>'text','class'=>'form-control','name'=>'AssetFieldValue[name]','label'=>'Asset Name'));

			echo $this->Form->input('Assets.serial_number', array('type'=>'text','class'=>'form-control','name'=>'AssetFieldValue[serial_number]','label'=>'Asset Serial Number (unique identifier)'));	?>
			<?php echo $this->Form->input('Assets.asset', array('type'=>'hidden','class'=>'form-control','value'=>"asset1",'name'=>'AssetFieldValue[asset]')); ?>

	<?php $count=1; foreach($AssetCustomField as $customfield) {
		//pr($customfield);die();
		if(!empty($customfield)){
			$id = $customfield['AssetField']['id'];
			$name = $customfield['AssetField']['name'];
			$field_type = $customfield['AssetField']['field_type'];
			$required = $customfield['AssetField']['required'];
			
			echo $this->Form->input('Assets.text', array('type'=>'hidden','class'=>'form-control','value'=>2,'name'=>'AssetFieldValue[text]'));

		



			if($field_type=='text')
			{
			echo $this->Form->input('Assets.name', array('type'=>$field_type,'class'=>'form-control','id'=>'get_data','label'=>$name,'name'=>'AssetFieldValue[properties][value]['.$count.']'));
			echo $this->Form->input('Assets.asset_field_id', array('type'=>'hidden','class'=>'form-control','value'=>$id,'name'=>'AssetFieldValue[properties][asset_field_id]['.$count.']'));

			echo $this->Form->input('Assets.field_type', array('type'=>'hidden','class'=>'form-control','value'=>$field_type,'name'=>'AssetFieldValue[properties][field_type]['.$count.']'));
			echo $this->Form->input('Assets.name', array('type'=>'hidden','class'=>'form-control','value'=>$name,'name'=>'AssetFieldValue[properties][name]['.$count.']'));

			
			$count++;
			}
			elseif($field_type=="date")
			{
				?>

				<label><?php echo $name?></label>
                   	<div class='input-group date' id="datetimepicker3" >
                  	<?php echo $this->Form->input('Assets.name', array('class'=>'form-control date-picker','div'=>false, 'label'=>false,'name'=>'AssetFieldValue[properties][value]['.$count.']')); ?>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                   	</div>
                <?php


				echo $this->Form->input('Assets.asset_field_id', array('type'=>'hidden','class'=>'form-control','value'=>$id,'name'=>'AssetFieldValue[properties][asset_field_id]['.$count.']'));

				echo $this->Form->input('Assets.field_type', array('type'=>'hidden','class'=>'form-control','value'=>$field_type,'name'=>'AssetFieldValue[properties][field_type]['.$count.']'));
				echo $this->Form->input('Assets.name', array('type'=>'hidden','class'=>'form-control','value'=>$name,'name'=>'AssetFieldValue[properties][name]['.$count.']'));

				
				$count++;
			}
			elseif($field_type=="checkbox")
			{
				?><input type="checkbox" name="AssetFieldValue[properties][value][<?php echo $count;?>]"><label>&nbsp;<?php echo $name;?></label>
                <?php


				echo $this->Form->input('Assets.asset_field_id', array('type'=>'hidden','class'=>'form-control','value'=>$id , 'name'=>'AssetFieldValue[properties][asset_field_id]['.$count.']'));
				echo $this->Form->input('Assets.field_type', array('type'=>'hidden','class'=>'form-control','value'=>$field_type,'name'=>'AssetFieldValue[properties][field_type]['.$count.']'));
				echo $this->Form->input('Assets.name', array('type'=>'hidden','class'=>'form-control','value'=>$name,'name'=>'AssetFieldValue[properties][name]['.$count.']'));
				
				$count++;
			}
		}
	}?>
		</div>	
	</div>
	
</div>
    
</div>
<script type="text/javascript">
	$("#datetimepicker3").datetimepicker();
</script>
</div>
