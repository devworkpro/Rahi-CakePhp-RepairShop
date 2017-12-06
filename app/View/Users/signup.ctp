<!-- Modal -->
<div class="fade login_pop register_pop" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="opacity:1;display:block !important;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center" id="myModalLabel">REGISTER</h4>
      </div>
      <div class="modal-body">
        <span class="message"></span>
       <?php echo $this->Form->create('User', array('action' => 'register')); ?>
        <div class="form-group">
     <?php echo $this->Form->hidden('User.status',array('class'=>'form-control status','value'=>1,'label'=>false,'div'=>false)); ?>   
    </div>

     <div class="form-group">
     <?php echo $this->Form->input('User.first_name',array('placeholder'=>'First Name','class'=>'form-control name','label'=>false,'div'=>false)); ?>   
    </div>
  <div class="form-group">
   <?php echo $this->Form->input('User.surname',array('placeholder'=>'Last Name','class'=>'form-control name','label'=>false,'div'=>false)); ?>
  </div>
  <div class="form-group">
    <?php echo $this->Form->input('User.email', array('div' => false, 'class' => "form-control email", 'placeholder' => 'Email', 'label' => false,'autocomplete' => 'off')); ?>
    <span class="email_error"></span>
  </div>
  <div class="form-group">
    <?php echo $this->Form->input('User.password', array('div' => false, 'class' => "form-control pwd", 'placeholder' => 'Password', 'label' => false,'autocomplete' => 'off' )); ?>
  </div>
  <div class="checkbox">
    <label><input name="agree" type="checkbox"> I have read and agree to the <?php echo $this->Html->link('Terms',array('controller'=>'pages','action'=>'page','terms')); ?> of use and <?php echo $this->Html->link('Privacy Policy',array('controller'=>'pages','action'=>'page','privacy')); ?> </label>
  </div>
  <button type="submit" class="btn btn-default login_btn hvr-sweep-to-right" id="btn">Register</button>
</form>
      </div>
      <div class="modal-footer">
    <p class="text-center">OR<br>Sign Up with </p>
    <h6 class="social_icon">
    <span class="pull-left">
   <?php echo $this->Html->link(
    '<i class="fa fa-facebook" aria-hidden="true"></i> Facebook',
    array(
        'controller' => 'users',
        'action' => 'social_login',
        'Facebook'
    ),
    array('escape'=>false)
); ?>
</span>
    <span class="pull-right"> 
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

<script src="<?php echo $this->webroot.'js/front/register-validation.js';?>"></script>
