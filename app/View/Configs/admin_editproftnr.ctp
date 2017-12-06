    
	<section class="content">
      <div class="row">
      <div class="col-md-12">
         <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Edit Professional User</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <?php echo $this->Form->create('Bundle',array('action'=>'editproftnr')); ?>
                  <div class="box-body">                   
                    <div class="form-group">
                      <?php echo $this->Form->input('title', array('div'=>false,'class'=>'form-control')); ?>
                    </div>
					<div class="form-group">
					<?php echo $this->Form->input('description', array('div'=>false,'class'=>'form-control')); ?>
                    </div>
					<div class="form-group">
					<?php echo $this->Form->input('price', array('div'=>false,'class'=>'form-control')); ?>
                    </div>
					<div class="form-group">
					<?php echo $this->Form->input('no of events', array('div'=>false,'class'=>'form-control')); ?>
                    </div>
                    <div class="form-group">
                      <?php echo $this->Form->input('duration', array('div'=>false,'class'=>'form-control')); ?>
					  </div>
                    <div class="box-footer">
                  <?php echo $this->form->Submit("save",array('class'=>'btn btn-primary')); ?>
                 
				  </div>
               <?php echo $this->Form->end(); ?>
			   </div>
              </div><!-- /.box -->
        </div>
		</div>
		</div>
       
   </section>

  
