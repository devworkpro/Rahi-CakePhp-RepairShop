<?php echo $this->Flash->render('positive'); ?>
<link href="<?php echo $this->webroot.'Plugins/select2/css/select2.min.css'?>" rel="stylesheet"/>
<script src="<?php echo $this->webroot.'Plugins/select2/js/select2.min.js'?>"></script>
<script src="<?php echo $this->webroot.'js/pages/form-select2.js'?>"></script>

<div class="warper container-fluid" style="margin-bottom:100px;">
        	
    <div class="page-header"><h1>New Recurring Invoice
    <?php echo $this->Html->link('<i class="fa fa-arrow-left"></i> Back',array('controller' => 'Schedules', 'action' => 'schedulelist'),array('escape'=>false,'class'=>'btn btn-default pull-right'));?></h1></div>
            
            
        <div class="row">
            <div class="col-md-1">
            
            </div>
            <div class="col-md-10">
            <?php echo $this->Form->create('Schedule',array('controller'=>'Schedules','action'=>'add','class'=>"validator-form",'id'=>"wizardForm")); ?>
            	
                <div class="row">
                <div class="form-group">
					<h4 class="no-m m-b-sm">Customer name</h4>
	                    <select name="Schedule[user_id]" class="js-states form-control" tabindex="-1" placeholder="Select an Option" style="display: none; width: 100%">
	                        <?php foreach ($users as $user) {
	                        	?>
	                        		<option value="<?php echo $user['User']['id'];?>"><?php echo $user['User']['first_name'].' '.$user['User']['last_name'];?></option>
	                        	<?php
	                        } ?>
	                           
	                    </select>
	            </div>
	            </div>

			    <div class="row">
			    <div class="form-group">
	                <?php echo $this->Form->button('Start Recurring Template', array('class' => 'btn btn-success pull-left')); ?>
	            </div>
				</div>

            <?php echo $this->Form->end(); ?>
			</div>
			<div class="col-md-1">
		    </div>
		</div>
</div>

