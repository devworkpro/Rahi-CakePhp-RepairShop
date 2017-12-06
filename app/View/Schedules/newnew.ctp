<?php echo $this->Flash->render('positive'); ?>
<div class="warper container-fluid" style="margin-bottom:100px;">
        	
     <div class="page-header"><h1>New Recurring Invoice
    <?php echo $this->Html->link('<i class="fa fa-arrow-left"></i> Back',array('controller' => 'Schedules', 'action' => 'schedulelist'),array('escape'=>false,'class'=>'btn btn-default pull-right'));?></h1></div>
            
        <div class="row">
            <div class="col-md-1">
            </div>
            <div class="col-md-10">
            <?php echo $this->Form->create('Schedule',array('controller'=>'Schedules','action'=>'newnew','class'=>"validator-form",'id'=>"wizardForm")); ?>
            	
				<?php echo $this->Form->input('Schedule.user_id', array('type'=>'hidden','div'=>false,'class'=>'form-control','value'=>$_GET['user_id'])); ?>	
                <?php echo $this->Form->input('Schedule.status', array('type'=>'hidden','div'=>false,'class'=>'form-control','value'=>'Paused')); ?>	
                <?php echo $this->Form->input('Schedule.type', array('type'=>'hidden','div'=>false,'class'=>'form-control','value'=>'Invoice')); ?>	

                <div class="row">
                <div class="form-group">
					<?php echo $this->Form->input('Schedule.name', array('div'=>false,'class'=>'form-control','required'=>'required','label'=>'Name')); ?>
					<?php echo $this->Form->input('Schedule.login_id', array('type'=>'hidden','class'=>'form-control','value'=>$this->Session->read('Auth.User.id'))); ?>
	                
	            </div>
	            </div>

	            <div class="row">
	            <div class="form-group">

					<?php echo $this->Form->input('Schedule.employee', array('options' => array('' => '',$this->Session->read('Auth.User.first_name')=>$this->Session->read('Auth.User.first_name')),'class'=>'form-control','label'=>'Employee (for commission)','required'=>'required')); ?>

	            </div>    
	            </div>

	            <div class="row">
	            <div class="form-group">
					
					<?php echo $this->Form->input('Schedule.frequency', array('options' => array('' => '','Monthly'=>'Monthly','Weekly'=>'Weekly','Biweekly'=>'Biweekly','Quarterly'=>'Quarterly','Semi-Annually'=>'Semi-Annually','Annually'=>'Annually','Biannually'=>'Biannually','Triannually'=>'Triannually'),'class'=>'form-control','label'=>'Frequency','required'=>'required')); ?>

				</div>	
	            </div>

	            <div class="row">
	            <div class="form-group">
					
					<?php echo $this->Form->input('Schedule.period_mode', array('options' => array('' => '','In Arrears'=>'In Arrears','In Advance'=>'In Advance'),'class'=>'form-control','label'=>'Period Mode','required'=>'required')); ?>

				</div>	
	            </div>

 				<div class="row">
	            <div class="form-group">
					
					<?php echo $this->Form->input('Schedule.recurring_type', array('options' => array('' => '','Recurring Invoice'=>'Recurring Invoice','General Subscription'=>'General Subscription','Asset/RMM Subscription'=>'Asset/RMM Subscription'),'class'=>'form-control','label'=>'Recurring Type','required'=>'required')); ?>

				</div>	
	            </div>

	            <div class="row">
	            <div class="form-group">
					<?php echo $this->Form->input('Schedule.run_next_at', array('div'=>false,'class'=>'form-control date-picker','required'=>'required','label'=>'Run Next At')); ?>
	            </div>    
	            </div>

	            <div class="row">
	            <div class="form-group">
					<?php echo $this->Form->input('Schedule.email_customer', array('div'=>false,'type'=>'checkbox','label'=>'&nbsp; Email customer the PDF')); ?>
				</div>	
			    </div>

			    <div class="row">
	            <div class="form-group">
					<?php echo $this->Form->input('Schedule.physical_invoice', array('div'=>false,'type'=>'checkbox','label'=>'&nbsp; Mail Physical Invoice (costs money)')); ?>
				</div>	
			    </div>

			    <div class="row">
	            <div class="form-group">
					<?php echo $this->Form->input('Schedule.pending_ticket', array('div'=>false,'type'=>'checkbox','label'=>'&nbsp; Add any pending Ticket charges (from shopping cart)')); ?>
				</div>	
			    </div>

			    <div class="row">
	            <div class="form-group">
					<?php echo $this->Form->input('Schedule.recurring_invoice', array('div'=>false,'type'=>'checkbox','label'=>'&nbsp; Pause this recurring Invoice')); ?>
				</div>	
			    </div>

			    <div class="row">
			    <hr class="dotted">
			    <div class="form-group">
	                <?php echo $this->Form->button('Create Schedule', array('class' => 'btn btn-success pull-left')); ?>
	            </div>
				</div>

            <?php echo $this->Form->end(); ?>
			</div>
			<div class="col-md-1">
		    </div>
		</div>
</div>