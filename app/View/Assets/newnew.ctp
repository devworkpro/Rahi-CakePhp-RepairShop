<?php echo $this->Flash->render('positive'); ?>
<div class="warper container-fluid" style="margin-top:30px;">
    <div class="row">
    	<div class="col-md-2">
    	</div>
        <div class="col-md-8">
            <div class="panel panel-default">
             <div class="panel-heading"></div>
                <div class="panel-body">
 					<?php echo $this->Form->create('Assets',array('controller'=>'Assets','action'=>'newnew')); ?>
					
					<div class="row" style="margin-top:20px;">                 
                    <div class="col-xs-12 col-sm-12">
						<div class="form-group">
						
                   			<?php echo $this->Form->input('Asset.name', array('type'=>'text','div'=>false,'class'=>'form-control','label'=>'Asset Type Name','placeholder'=>'eg. Computer')); ?>

                   			<?php echo $this->Form->input('Asset.login_id', array('type'=>'hidden','div'=>false,'class'=>'form-control','value'=>$this->Session->read('Auth.User.id'))); ?>

						</div>
                    </div>
                	</div>
					    

				
				<div class="row">                 
					<div class="col-xs-12 col-sm-12">
						<div class="btn-group">
							<?php echo $this->Form->button('Create Assets Type', array('class' => 'btn btn-success pull-left')); ?>
						</div>
					</div>
				</div>		
				<?php echo $this->Form->end(); ?>	
			</div>
				
		</div>


	</div>
	<div class="col-md-2">
    </div>
</div>
</div>