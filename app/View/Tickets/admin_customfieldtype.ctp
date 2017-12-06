<?php echo $this->Flash->render('positive'); ?>
<div class="result">
<!-- Date Time Picker -->

    <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2017.1.118/styles/kendo.common-material.min.css" />
    <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2017.1.118/styles/kendo.material.min.css" />
    <script src="https://kendo.cdn.telerik.com/2017.1.118/js/kendo.all.min.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
    // create DateTimePicker from input HTML element
    $("#datetimepicker3").kendoDateTimePicker({
    value:new Date()
    });

    $("#datetimepicker4").kendoDateTimePicker({
    value:new Date()
    });
});
</script>

<div class="warper container-fluid">
        	
<div class="row"> 
	<div class="col-xs-12 col-sm-12">
		<div class="form-group"> 			
	<?php $count=1; foreach($CustomFieldTypes as $customfield) {
		if(!empty($customfield)){
			$id = $customfield['CustomFieldType']['id'];
			$name = $customfield['CustomFieldType']['name'];
			$field_type = $customfield['CustomFieldType']['field_type'];
			$required = $customfield['CustomFieldType']['required'];
			$hidden = $customfield['CustomFieldType']['hidden'];
			echo $this->Form->input('CustomFieldValue.tickettext', array('type'=>'hidden','class'=>'form-control','value'=>1,'name'=>'CustomFieldValue[tickettext]'));

			if($field_type=='text')
			{
			echo $this->Form->input('CustomFieldValue.name', array('type'=>$field_type,'class'=>'form-control','id'=>'get_data','label'=>$name,'name'=>'CustomFieldValue[value]['.$count.']'));
			echo $this->Form->input('CustomFieldValue.custom_field_type_id', array('type'=>'hidden','class'=>'form-control','value'=>$id,'name'=>'CustomFieldValue[custom_field_type_id]['.$count.']'));

			echo $this->Form->input('CustomFieldValue.field_type', array('type'=>'hidden','class'=>'form-control','value'=>$field_type,'name'=>'CustomFieldValue[field_type]['.$count.']'));
			echo $this->Form->input('CustomFieldValue.name', array('type'=>'hidden','class'=>'form-control','value'=>$name,'name'=>'CustomFieldValue[name]['.$count.']'));

			
			$count++;
			}
			elseif($field_type=="date")
			{
				?>

				<label><?php echo $name?></label>
					<input type='text' class="" name="CustomFieldValue[value][<?php echo $count;?>]" id="datetimepicker3" style="width: 100%;" />

                <?php


				echo $this->Form->input('CustomFieldValue.custom_field_type_id', array('type'=>'hidden','class'=>'form-control','value'=>$id,'name'=>'CustomFieldValue[custom_field_type_id]['.$count.']'));

				echo $this->Form->input('CustomFieldValue.field_type', array('type'=>'hidden','class'=>'form-control','value'=>$field_type,'name'=>'CustomFieldValue[field_type]['.$count.']'));
				echo $this->Form->input('CustomFieldValue.name', array('type'=>'hidden','class'=>'form-control','value'=>$name,'name'=>'CustomFieldValue[name]['.$count.']'));

				
				$count++;
			}
			elseif($field_type=="checkbox")
			{
				?><input type="checkbox" name="CustomFieldValue[value][<?php echo $count;?>]"><label>&nbsp;<?php echo $name;?></label>
                <?php


				echo $this->Form->input('CustomFieldValue.custom_field_type_id', array('type'=>'hidden','class'=>'form-control','value'=>$id , 'name'=>'CustomFieldValue[custom_field_type_id]['.$count.']'));
				echo $this->Form->input('CustomFieldValue.field_type', array('type'=>'hidden','class'=>'form-control','value'=>$field_type,'name'=>'CustomFieldValue[field_type]['.$count.']'));
				echo $this->Form->input('CustomFieldValue.name', array('type'=>'hidden','class'=>'form-control','value'=>$name,'name'=>'CustomFieldValue[name]['.$count.']'));
				
				$count++;
			}
		}
	}?>
		</div>	
	</div>
	
</div>
    
</div>


</div>
