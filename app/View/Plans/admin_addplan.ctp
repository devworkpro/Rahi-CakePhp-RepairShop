    <section class="content">
      <div class="row">
      <div class="col-md-12">
         <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Add Subscription Plan</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <?php echo $this->Form->create('Plan', array('method' => 'post','action'=>'addplan')); ?>
                  <div class="box-body">                   
                    <div class="form-group">
                      <?php echo $this->Form->input('Plan.title', array('div'=>false,'class'=>'form-control')); ?>
                    </div>
					  <div class="form-group">
                      <?php echo $this->Form->input('Plan.description', array('div'=>false,'class'=>'form-control')); ?>
                    </div>
					 <div class="form-group">
                      <?php echo $this->Form->input('Plan.price', array('div'=>false,'class'=>'form-control','label'=>'Price($)')); ?>
                    </div>
                    <div class="form-group">
                      <?php echo $this->Form->input('Plan.duration', array('options' => array('1'=>'1 Month','3'=>'3 Months','6'=>'6 Months','12'=>'1 Year'),'empty' => '(choose one)','class'=>'form-control','label'=>'Select Duration','required')); ?>
					  </div>
                   
                  <div class="box-footer">
                  <?php echo $this->form->Submit("Submit",array('class'=>'btn btn-primary')); ?>                
                  </div>
               <?php echo $this->Form->end(); ?>
              </div><!-- /.box -->
        </div>
        </div>
		</div>
   </section>

  
