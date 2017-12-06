<?php echo $this->Flash->render('positive'); ?>
<section class="content" style="margin-bottom: 50px;">
      <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-6">
         <div class="panel panel-default">
               
                <?php echo $this->Form->create('User',array('id'=>"wizardForm",'class'=>'UserAdminChangePasswordForm')); ?>
                  <div class="panel-body"> 
                    <div class="form-group">
                      <h2>Profile</h2>
                    </div>
                    <div class="form-group">
                      <?php echo $this->Session->read('Auth.User.admin_name');?>
                    </div>

                    <div class="form-group">
                      <?php echo $this->Session->read('Auth.User.email');?>
                    </div>
                    <div class="form-group">
                      <h2> Change Password</h2>
                    </div>

                    <div class="form-group">
                      <?php echo $this->Form->input('User.current_password', array('type'=>'password','div'=>false,'class'=>'form-control','label'=>'Current Password','required'=>'required')); ?>
                    </div> <br>                 
                    <div class="form-group">
                      <?php echo $this->Form->input('User.password', array('div'=>false,'class'=>'form-control')); ?>
                    </div><br>
                    <div class="form-group">
                      <?php echo $this->Form->input('User.password2', array('div'=>false,'class'=>'form-control','label'=>'Password confirmation','autocomplete'=>false,'type'=>'password')); ?>
                    </div><br>
                                
                  </div><!-- /.box-body -->

                  <div class="panel-footer">
                  <?php echo $this->form->Submit("Change Password",array('class'=>'btn btn-primary')); ?>                
                  </div>
               <?php echo $this->Form->end(); ?>
              </div><!-- /.box -->
      </div>
      <div class="col-md-3"></div>
      </div>
</section>
<script src="<?php echo $this->webroot.'js/front/jquery.validate.min.js';?>"></script>
<script>

  $().ready(function() {
 
    // validate signup form on keyup and submit
    $(".UserAdminChangePasswordForm").validate({
      rules: {
        "data[User][password]": {
          required: true,
          minlength: 8
        },
        "data[User][password2]": {
          required: true,
          minlength: 8,
          equalTo: "#UserPassword"
        },
      },
      messages: {
        "data[User][password]": {
          required: "Please provide a password",
          minlength: "Your password must be at least 8 characters long"
        },
        "data[User][password2]": {
          required: "Please provide a password",
          minlength: "Your password must be at least 8 characters long",
          equalTo: "Please enter the same password as above"
        }
      }
    });
  });
  </script>

