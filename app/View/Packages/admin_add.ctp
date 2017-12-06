<?php echo $this->Flash->render('positive'); ?>
<div class="warper container-fluid" style="margin-bottom: 50px;">
       	
    <div class="page-header"><h1>Add New Package<?php echo $this->Html->link('<i class="fa fa-arrow-left"></i> Back',array('controller' => 'Packages', 'action' => 'packagelist'),array('escape'=>false,'class'=>'btn btn-default pull-right'));?></h1></div>          
            
        <div class="row">
          	<div class="col-md-2">
          	</div>
			<div class="col-md-8">             
               <div class="panel panel-default">
                   <div class="panel-heading">Add New Package</div>
                   <div class="panel-body">
						<!-- form start -->
						<?php echo $this->Form->create('Package', array('enctype' => 'multipart/form-data','method' => 'post','action'=>'admin_add','class'=>"validator-form" ,'id'=>"wizardForm")); ?>
						<div class="box-body">
							<div class="row">                 
							<div class="col-xs-12 col-sm-12">
							<div class="form-group">   
								<?php echo $this->Form->input('Package.title', array('div'=>false,'class'=>'form-control','required'=>'required')); ?>                       
							</div>	
							</div>
							</div>		           

							<div class="row">                 
							<div class="col-xs-12 col-sm-12">
							<div class="form-group">
								<?php echo $this->Form->input('Package.price', array('div'=>false,'type'=>'number','class'=>'form-control','required'=>'required')); ?>
							</div>
							</div>
							</div>	
							
							<div class="row">                 
							<div class="col-xs-12 col-sm-12">
							<div class="form-group">
								<?php //echo $this->Form->input('Package.status', array('options' => array('monthly' => 'monthly', 'yearly' => 'yearly'),'class'=>'form-control','label'=>'Duration')); ?>

								<?php echo $this->Form->input('Package.status', array('type'=>'hidden','class'=>'form-control','label'=>'Duration', 'value'=>'new')); ?>
							</div>
							</div>
							</div>
							
							<div class="row">                 
							<div class="col-xs-12 col-sm-12">
							<div class="form-group">   
								<?php echo $this->Form->input('Package.feature_1', array('div'=>false,'class'=>'form-control')); ?>                       
							</div>
							</div>
							</div>

							<div class="row">                 
							<div class="col-xs-12 col-sm-12">
							<div class="form-group">   
								<?php echo $this->Form->input('Package.feature_2', array('div'=>false,'class'=>'form-control')); ?>                       
							</div>
							</div>
							</div>

							<div class="row">                 
							<div class="col-xs-12 col-sm-12">
							<div class="form-group">    
								<?php echo $this->Form->input('Package.feature_3', array('div'=>false,'class'=>'form-control')); ?>                       
							</div>
							</div>
							</div>

							<div class="row">                 
							<div class="col-xs-12 col-sm-12">
							<div class="form-group"> 
								<?php echo $this->Form->input('Package.feature_4', array('div'=>false,'class'=>'form-control')); ?>                       
							</div>
							</div>
							</div>

							<!-- <div class="row">                 
							<div class="col-xs-12 col-sm-12">
							<div class="form-group">    
								<?php echo $this->Form->input('Package.feature_5', array('div'=>false,'class'=>'form-control')); ?>                       
							</div>
							</div>
							</div>

							<div class="row">                 
							<div class="col-xs-12 col-sm-12">
							<div class="form-group">  
								<?php echo $this->Form->input('Package.feature_6', array('div'=>false,'class'=>'form-control')); ?>                       
							</div>
							</div>
							</div> -->

							                  
						</div><!-- /.box-body -->

						<div class="box-footer"class="input-group col-md-6" style="margin-left:50px;">
							<div class="btn-group">
								<?php echo $this->Form->button('<i class="fa fa-plus"></i> Save', array('class' => 'btn btn-success pull-left')); ?>
								
							</div>
							<div class="btn-group">
								<?php echo $this->Form->button('<i class="fa fa-times"></i> Reset', array('class' => 'btn btn-default pull-left','type'=>'reset')); ?>
							</div>             
						</div>
						<?php echo $this->Form->end(); ?>

				  </div><!-- /.box -->
				</div>
			</div>
		</div>
	</div>
</div>
</div>
				