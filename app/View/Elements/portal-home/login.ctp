<!-- Modal -->
<div class="modal fade login_pop" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center" id="myModalLabel">LOGIN</h4>
      </div>
      <div class="modal-body">
        <form id="LoginForm" action="#">
        <div class="error invalid"></div>
  <div class="form-group">
    <?php echo $this->Form->input('User.email', array('placeholder'=>'Email','class'=>'form-control email','label'=>false)); ?>
  </div>
  <div class="form-group">
     <?php echo $this->Form->input('User.password', array('class'=>'form-control pwd','placeholder'=>'Password','label'=>false)); ?>
  </div>
  <div class="checkbox">
    <label><input name="loggedin" type="checkbox"> Keep me logged in <span class="forgt_pass"><?php echo $this->Html->link('Forgot Password?',array('controller'=>'users','action'=>'forgot_password')); ?></span></label>
  </div>
  <button type="submit" class="btn btn-default login_btn hvr-sweep-to-right" id="login">Log In</button>
</form>
      </div>
      <div class="modal-footer">
    <p class="text-center">OR<br>Log in with </p>
    <h6 class="social_icon">
    <span class="pull-left"> <?php echo $this->Html->link(
    '<i class="fa fa-facebook" aria-hidden="true"></i> Facebook',
    array(
        'controller' => 'users',
        'action' => 'social_login',
        'Facebook'
    ),
    array('escape'=>false)
); ?></span>  <span class="pull-right"> 
<?php echo $this->Html->link(
    '<i class="fa fa-google" aria-hidden="true"></i> Google',
    array(
        'controller' => 'users',
        'action' => 'social_login',
        'Google'
    ),
    array('escape'=>false)
); ?>
</span> </h6>
      </div>
    </div>
  </div><!--modal-dialog-->
</div><!--modal fade login_pop-->

<script src="<?php echo $this->webroot.'js/front/jquery.validate.min.js';?>"></script>
<script src="<?php echo $this->webroot.'js/front/login-validation.js';?>"></script>
<script src="<?php echo $this->webroot.'js/front/header_login.js';?>"></script>