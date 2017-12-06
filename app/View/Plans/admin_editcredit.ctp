    <section class="content">
      <div class="row">
      <div class="col-md-12">
         <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Edit Credit Plan</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <?php echo $this->Form->create('Plan', array('method' => 'post','action'=>'editcredit')); ?>
                  <div class="box-body">                   
                   
            <div class="form-group">
                      <?php echo $this->Form->input('Plan.courses', array('div'=>false,'class'=>'form-control')); ?>
                    </div>
					 <div class="form-group">
                      <?php echo $this->Form->input('Plan.price', array('div'=>false,'class'=>'form-control','label'=>'Price($)')); ?>
                    </div> 
                  <div class="box-footer">
                  <?php echo $this->form->Submit("Edit",array('class'=>'btn btn-primary')); ?>                
                  </div>
               <?php echo $this->Form->end(); ?>
              </div><!-- /.box -->
        </div>
        </div>
		</div>
   </section>

  
