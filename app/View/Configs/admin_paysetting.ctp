     <section class="content">
      <div class="row">
      <div class="col-md-12">
         <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Paypal Settings</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <?php echo $this->Form->create('Config'); ?>
                  <div class="box-body">                   
                    <div class="form-group">
                      <?php echo $this->Form->input('Config.Paypal_email', array('div'=>false,'class'=>'form-control','value'=>$paypal_email['Config']['value'])); ?>
                    </div>
                   <div class="form-group">
				   <?php echo $this->Form->input('Config.paypal_type', array('options' => array('Sandbox'=>'Sandbox','Developer'=>'Developer'),'selected'=>'Developer','class'=>'form-control','value'=>$paypal_type['Config']['value'])); ?>
                    </div>
                    </div>
                   </div><!-- /.box-body -->

                  <div class="box-footer">
                  <?php echo $this->form->Submit("Edit",array('class'=>'btn btn-primary')); ?>                
                  </div>
               <?php echo $this->Form->end(); ?>
              </div><!-- /.box -->
        </div>
        </div>
   </section>

  
