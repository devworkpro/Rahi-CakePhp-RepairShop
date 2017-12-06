<?php echo $this->Flash->render('positive'); ?>
<div class="warper container-fluid" style="margin-bottom: 50px;">
       	
    <div class="page-header"><h1>PayPal Account Setting <?php echo $this->Html->link('<i class="fa fa-arrow-left"></i> Back',array('controller' => 'Packages', 'action' => 'packagelist'),array('escape'=>false,'class'=>'btn btn-default pull-right'));?></h1></div>          
            
        <div class="row">
          	<div class="col-md-2">
          	</div>
			<div class="col-md-8">             
               <div class="panel panel-default">
                   <div class="panel-heading">PayPal Account Setting</div>
                   <div class="panel-body">
						<!-- form start -->
						<?php echo $this->Form->create('Package', array('enctype' => 'multipart/form-data','method' => 'post','action'=>'admin_paypalsetting','class'=>"validator-form" ,'id'=>"wizardForm")); ?>

							<div class="box-body">
							<div class="row">                 
							<div class="col-xs-12 col-sm-12">
							<div class="form-group">   <br>
								<?php echo $this->Form->input('PaypalAccount.account', array('div'=>false,'class'=>'form-control','required'=>'required','label'=>'Paypal Account')); ?>                       
							</div>	
							</div>
							</div>	

							<div class="row">                 
							<div class="col-xs-12 col-sm-12">
							<div class="form-group">   <br>
								<?php echo $this->Form->button('Update Account', array('class' => 'btn btn-success')); ?>                       
							</div>	
							</div>
							</div>	

							</div><!-- /.box-body -->

						<?php echo $this->Form->end(); ?>

				  </div><!-- /.box -->
				</div>
			</div>
		</div>
	</div>
</div>
</div>
				