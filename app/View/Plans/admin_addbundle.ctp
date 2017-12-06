    <section class="content">
      <div class="row">
      <div class="col-md-12">
         <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Add Bundles</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <?php echo $this->Form->create('Config', array('method' => 'post','action'=>'addbundle')); ?>
                  <div class="box-body">                   
                    <div class="form-group">
                      <?php echo $this->Form->input('Bundle.name', array('div'=>false,'class'=>'form-control')); ?>
                    </div>
                    <div class="form-group">
                      <?php echo $this->Form->input('Bundle.price', array('div'=>false,'class'=>'form-control')); ?>
                    <div class="box-footer">
                  <?php echo $this->form->Submit("Submit",array('class'=>'btn btn-primary')); ?>                
                  </div>
               <?php echo $this->Form->end(); ?>
              </div><!-- /.box -->
        </div>
        </div>
   </section>

  
