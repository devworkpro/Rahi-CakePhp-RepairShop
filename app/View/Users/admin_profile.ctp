  <section class="content">
	<div class="row">
	<div class="col-md-12">
         <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Edit Profile</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <?php echo $this->Form->create('User', array('enctype' => 'multipart/form-data','method' => 'post','action'=>'profile')); ?>
                  <div class="box-body">
                    <div class="form-group">
                    <?php echo $this->Form->input('User.email', array('div'=>false,'class'=>'form-control')); ?>                       
                    </div>
                    <div class="form-group">
                      <?php echo $this->Form->input('User.first_name', array('div'=>false,'class'=>'form-control')); ?>
                    </div>
                    <div class="form-group">
                      <?php echo $this->Form->input('User.middle_name', array('div'=>false,'class'=>'form-control')); ?>
                    </div>
                    <div class="form-group">
                      <?php echo $this->Form->input('User.surname', array('div'=>false,'class'=>'form-control')); ?>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputFile">Profile Picture</label>
                     <?php echo $this->Form->file('User.profile_pic'); ?>
                      <p class="help-block">Profile Picture</p>
                      <?php echo $this->Html->image('user_image/small/'.$userLoggedDetail['User']['profile_pic'], array('alt' => 'CakePHP','class'=>'user-image')); ?>
                    </div>
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                  <?php echo $this->form->Submit("Submit",array('class'=>'btn btn-primary')); ?>          	
                  </div>
                  <div class="box-footer">
                  <?php echo $this->Html->link('Change Password',array('controller'=>'users','action'=>'change_password'),array('class'=>'btn btn-primary')); ?>    
                  </div>
               <?php echo $this->Form->end(); ?>
              </div><!-- /.box -->
    </div>
    </div>
   </section>