<?php echo $this->Flash->render('positive'); ?>

<div class="warper container-fluid" style="margin-bottom:100px;">
        	
    <div class="page-header"><h1>New SLA
    <?php echo $this->Html->link('<i class="fa fa-arrow-left"></i> Back',array('controller' => 'Slas', 'action' => 'slalist'),array('escape'=>false,'class'=>'btn btn-default pull-right'));?></h1></div>
            
            
        <div class="row">
            <div class="col-md-1">
            
            </div>
            <div class="col-md-6">
            	<div class="panel panel-default">
                    <div class="panel-heading">New SLA</div>
                    <div class="panel-body"><br>
        				<?php echo $this->Form->create('Sla',array('controller'=>'Slas','action'=>'add','class'=>"validator-form",'id'=>"wizardForm")); ?>
        	
            		<div class="row">                 
						<div class="col-xs-12 col-sm-12">
							<div class="form-group">
								<?php echo $this->Form->input('Sla.name', array('div'=>false,'class'=>'form-control','required'=>'required','label'=>'Name')); ?>
               
							</div>
						</div>
					</div>
					<div class="row">                 
						<div class="col-xs-12 col-sm-12">
							<div class="form-group">
								<?php echo $this->Form->input('Sla.description', array('type'=>'textarea','class'=>'form-control','required'=>'required','label'=>'Description','style'=>'height: 70px;')); ?>
               
							</div>
						</div>
					</div>


					<div class="row">                 
						<div class="col-xs-12 col-sm-12">
							<div class="form-group">
								<?php echo $this->Form->input('Sla.response', array('type'=>'number','class'=>'form-control','required'=>'required','label'=>'Minutes until Response')); ?>
               
							</div>
						</div>
					</div>


					<div class="row">                 
						<div class="col-xs-12 col-sm-12">
							<div class="form-group">
								<?php echo $this->Form->input('Sla.resolution', array('type'=>'number','class'=>'form-control','required'=>'required','label'=>'Minutes until Resolution (due date)')); ?>
               
							</div>
						</div>
					</div>

					<div class="row">                 
						<div class="col-xs-12 col-sm-12">
							<div class="form-group">
								<?php echo $this->Form->input('Sla.assign', array('options' => array(""=>"",$this->Session->read('Auth.User.first_name')=> $this->Session->read('Auth.User.first_name')),'class'=>'form-control','label'=>'Auto-Assign to Tech')); ?>
							</div>
						</div>
					</div>

					<div class="row">                 
						<div class="col-xs-12 col-sm-12">
							<div class="form-group">
								<?php echo $this->Form->input('Sla.re_assign', array('options' => array(""=>"",$this->Session->read('Auth.User.first_name')=> $this->Session->read('Auth.User.first_name')),'class'=>'form-control','label'=>'Re-Assign to Tech if breached')); ?>
							</div>
						</div>
					</div>

					<div class="row">
				    	<div class="col-xs-12 col-sm-12">
				    	<div class="form-group">
		                	<?php echo $this->Form->button('Save', array('class' => 'btn btn-success pull-left')); ?>
		            	</div>
		            	</div>
					</div>

        			<?php echo $this->Form->end(); ?>
					</div>
				</div>
			</div>

			<div class="col-md-5">
		    </div>
		</div>
</div>

