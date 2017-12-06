<?php echo $this->Flash->render('positive'); ?>
<div class="warper container-fluid" style="margin-bottom:100px;">
	<div class="page-header"><h1>Editing warranty<span><?php echo $this->Html->link('<i class="fa fa-arrow-left"></i> Back',array('controller' => 'Warranties', 'action' => 'warrantylist'),array('escape'=>false,'class'=>'btn btn-default pull-right'));?></span></h1></div>
	<div class="row">
      	<div class="col-md-1">
      	</div>
		<div class="col-md-10">
            <!-- form start -->
			<?php echo $this->Form->create('Warranty', array('controller'=>'Warranties','action'=>'warrantyedit','class'=>"validator-form",'id'=>"wizardForm")); ?>

			<?php $warranty_id=$Warranty['Warranty']['id'];;?>
			<div class="box-body">                   
				<div class="row">

					<div class="col-xs-12 col-sm-12">
						<div class="form-group">
							<?php echo $this->Form->input('Warranty.name', array('div'=>false,'class'=>'form-control','required'=>'required','label'=>'Name')); ?>
						</div>
					</div>
				</div>
									
				<div class="row">                 
					<div class="col-xs-12 col-sm-12">
						<div class="form-group">
							<?php echo $this->Form->input('Warranty.warranty_information', array('div'=>false,'class'=>'form-control','required'=>'required','label'=>'Warranty Information')); ?>
						</div>
					</div>
				</div>

				<div class="row">                 
					<div class="col-xs-12 col-sm-12">
						<div class="form-group">
							<?php echo $this->Form->input('Warranty.expiration_date', array('div'=>false,'class'=>'form-control date-picker','required'=>'required','label'=>'Expiration Date')); ?>
						</div>
					</div>
				</div>

				<div class="row">                 
					<div class="col-xs-12 col-sm-12">
						<div class="form-group">
							<?php echo $this->Form->input('Warranty.certificate_num', array('div'=>false,'class'=>'form-control','required'=>'required','label'=>'Certificate Num')); ?>
						</div>
					</div>
				</div>
                
				<hr class="dotted">
							
				<div class="row">                 
					<div class="col-xs-12 col-sm-12">
						<div class="btn-group">
							<?php echo $this->Form->button('Update Warranty', array('class' => 'btn btn-success pull-left')); ?>
						</div>
					</div>
				</div><br>
				<div class="row">                 
					<div class="col-xs-12 col-sm-12">
						<div class="btn-group">
							<?php echo $this->Html->link('Show',array('controller' => 'Warranties', 'action' => 'warrantyview',$warranty_id),array('escape'=>false));?> |
	   						<?php echo $this->Html->link('Back',array('controller' => 'Warranties', 'action' => 'warrantylist'),array('escape'=>false));?>
						</div>
					</div>
				</div>
				
					
			</div>
			<?php echo $this->Form->end(); ?>
        </div><!-- /.box -->
        <div class="col-md-1">
      	</div>
    </div>
</div>