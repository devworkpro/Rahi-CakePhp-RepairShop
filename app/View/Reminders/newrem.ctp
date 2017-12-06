<?php echo $this->Flash->render('positive'); ?>
<div class="warper container-fluid" style="margin-bottom:50px; margin-top:10px;">
	<div class="row">
	<div class="col-md-2">
	</div>
	<div class="col-md-8">
	<h2>New Reminder for <?php echo $name=$user['User']['first_name'].' '.$user['User']['last_name'].'-'.$user['User']['business_name'];?>
	</h2><?php $user_id=$user['User']['id']; ?>
	</div>
	<div class="col-md-2">
	<h2>
		<?php echo $this->Html->link('<i class="fa fa-arrow-left"></i> Back',array('controller' => 'Reminders', 'action' => 'reminderlist'),array('escape'=>false,'class'=>'btn btn-default'));?>
	</h2>	
	</div>
	</div>
		
		


	<div class="row">
		<div class="col-md-2">
        </div>
		<div class="col-md-8">
			<div class="panel panel-default">
                <div class="panel-body">
						
				<?php echo $this->Form->create('Reminder',array('controller'=>'Reminders','action'=>'addnew', 'id'=>"wizardForm")); ?>
				  
				<div class="row">                 
				<div class="col-xs-12 col-sm-12">
				<div class="form-group">
					<p>Customer: <?php echo ucfirst($user['User']['first_name'])." ".ucfirst($user['User']['last_name']); ?></p>
					<?php echo $this->Form->input('Reminder.customer', array('type'=>'hidden','div'=>false,'class'=>'form-control','label'=>'Customer','value'=>$user['User']['first_name']." ".$user['User']['last_name'])); ?>
					<?php echo $this->Form->input('Reminder.user_id', array('type'=>'hidden','div'=>false,'class'=>'form-control','value'=>$user['User']['id'])); ?>
				</div>
				</div>
				</div>
			   	<div class="row">                 
				<div class="col-xs-12 col-sm-12">
				<div class="form-group">
						<label></label>
	            	<div style="z-index:'10';" class='input-group date' id="datetimepicker1" >
	                <?php echo $this->Form->input('Reminder.at', array('class'=>'form-control','div'=>false, 'label'=>false)); ?>
	                	<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
	            	</div>
				</div>
				</div>
				</div>
				<div class="row">                 
				<div class="col-xs-12 col-sm-12">
				<div class="form-group">
						<?php echo $this->Form->input('Reminder.notes', array('type'=>'textarea','class'=>'form-control','label'=>'','placeholder'=>'Notes...')); ?>
				</div>
				</div>  
				</div>
				
				
				<div class="row">  
					<div class="col-xs-12 col-sm-12">
						<div class="form-group">
						
						<label>For Tech</label><br>	
							<input type='hidden' name="Reminder[tech]" id="owner" value="<?php echo $this->Session->read('Auth.User.first_name');?>"/>

							<select  class="select optional form-control" >
								<option class="session_email" selected="selected"><?php echo $this->Session->read('Auth.User.first_name').' '.$this->Session->read('Auth.User.email');?></option>
							</select>
						</div>
	            	</div>
				</div>
				

				<div class="row">  
				<hr class="dotted">	
					<div class="col-xs-2 col-sm-2">
					</div>
	               	<div class="col-xs-3 col-sm-3">
						<div class="form-group">
							<?php echo $this->Form->button("Save", array('class' => 'btn btn-success pull-left')); ?>
						</div>
	               	</div>
	               	<div class="col-xs-2 col-sm-2">
					</div>
	               	<div class="col-xs-3 col-sm-3">
					<div class="btn-group">
						<?php echo $this->Html->link('All Reminders',array('controller' => 'Reminders', 'action' => 'reminderlist'),array('escape'=>false,'class'=>'btn btn-default m-b-sm'));?>

					</div>
					</div>
					<div class="col-xs-2 col-sm-2">
					</div>
				</div>
				
				<?php echo $this->Form->end(); ?>
				</div>
			</div>
				
		</div>
	</div>
</div>




<script src="<?php echo $this->webroot.'js/jquery/jquery-1.9.1.min.js'?>"></script>
<script type="text/javascript">

$(function() {
    $("#datetimepicker1").datetimepicker();
    $("#datetimepicker2").datetimepicker();
});


</script>
