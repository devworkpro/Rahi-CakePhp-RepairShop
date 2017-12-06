<div class="forgot-box">
      <div class="login-logo">
  
      </div><!-- /.login-logo -->
      <div class="forgot-box-body">
      <?php echo $this->Flash->render('positive'); ?>   
        <p class="login-box-msg">Forgot Password</p>
        <?php echo $this->Form->create('User'); ?>
        
          <div class="form-group has-feedback">
          <?php echo $this->Form->input('User.email', array('placeholder'=>'Enter Your Email','class'=>'form-control','label'=>false)); ?>
          <?php echo $this->Form->submit('Send',array('class'=>'button')); ?>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->