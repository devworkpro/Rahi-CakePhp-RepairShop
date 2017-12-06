<section class="content">
      <div class="row">
      <div class="col-md-12">
         <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Change Password</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <?php echo $this->Form->create('User'); ?>
                  <div class="box-body">                   
                    <div class="form-group">
                      <?php echo $this->Form->input('User.password', array('div'=>false,'class'=>'form-control')); ?>
                    </div>
                     <div class="form-group">
                    <div class="form-group">
                      <?php echo $this->Form->input('User.password2', array('div'=>false,'class'=>'form-control','label'=>'Confirm Password','autocomplete'=>false,'type'=>'password')); ?>
                    </div>
                  </div>                
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                  <?php echo $this->form->Submit("Change Password",array('class'=>'btn btn-primary')); ?>                
                  </div>
               <?php echo $this->Form->end(); ?>
              </div><!-- /.box -->
        </div>
        </div>
   </section>
<script src="<?php echo $this->webroot.'js/front/jquery.validate.min.js';?>"></script>
<script>

  $().ready(function() {
 
    // validate signup form on keyup and submit
    $("#UserAdminChangePasswordForm").validate({
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