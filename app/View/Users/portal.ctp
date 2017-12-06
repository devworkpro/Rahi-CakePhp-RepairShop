<title>Repair shoppe | Log in</title>
<?php echo $this->element('latestfrontend/login-head'); ?>
<main class="page-content">
  <div class="page-inner">
    <div id="main-wrapper" >
      <div class="row">
        <div class="col-md-3 center" style="margin-top: 90px !important;">
          <div class="login-box"> 
            <a href="http://112.196.42.180/projects/repairshopsaas/repairshopsaas/" class="logo-name text-lg text-center">Repair Shoppe</a>
            <p class="text-center m-t-md">Please login into your Shoppe's Account</p>
        
            <?php echo $this->Form->create('User'); ?>
        
            <div class="form-group has-feedback">
              <?php echo $this->Form->input('User.email', array('placeholder'=>'Email','class'=>'form-control','label'=>false)); ?>
              <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
              <?php echo $this->Form->input('User.password', array('class'=>'form-control','placeholder'=>'Password','label'=>false)); ?>
              <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            
            <?php echo $this->Flash->render('positive'); ?><br>
            <?php echo $this->Form->Submit("SIGN IN",array('class'=>'btn btn-success btn-block')); ?>
            <?php echo $this->Form->end(); ?>
            <?php //echo $this->Html->link('Forgot Password?',array('controller'=>'users','action'=>'forgota_password','admin'=>false)); ?>
            <p class="text-center m-t-xs text-sm"> 2017 &copy;  Repair Shoppe.</p>
          </div><!-- /.login-box-body -->
        </div>
      </div><!-- Row -->
    </div><!-- Main Wrapper -->
  </div><!-- Page Inner -->
</main><!-- Page Content -->
      

<script src="<?php echo $this->webroot.'Plugins/jQuery/jQuery-2.1.4.min.js';?>"></script>
<?php echo $this->Html->script(array('bootstrap.min')); ?>

<script src="<?php echo $this->webroot.'Plugins/iCheck/icheck.min.js';?>"></script>

<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
<?php echo $this->element('latestfrontend/login-footer'); ?>