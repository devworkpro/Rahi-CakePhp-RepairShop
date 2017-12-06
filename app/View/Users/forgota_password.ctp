<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Repair Shop | Forgot Password</title>
    <?php //echo $this->Html->css(array('bootstrap.min','AdminLTE.min.css')); ?>
   <!--  <link rel="stylesheet" href="<?php echo $this->webroot.'Plugins/iCheck/square/blue.css';?>"> -->

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Font Awesome -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css"> -->
    <!-- Ionicons -->
    <!-- <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"> -->
    <!-- iCheck -->

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
<?php echo $this->element('latestfrontend/login-head'); ?>
  <main class="page-content">
  
  <div class="page-inner">
    <div id="main-wrapper" >
      <?php echo $this->Flash->render('positive'); ?> 
      <div class="row">
        <div class="col-md-3 center" style="margin-top: 90px !important;">
          <div class="login-box"> 
            <a href="http://112.196.42.180/projects/repairshopsaas/repairshopsaas/" class="logo-name text-lg text-center">Repair Shoppe</a>
              <p class="text-center m-t-md">Forgot Password</p>
                <?php echo $this->Form->create('User'); ?>
                
                  <div class="form-group has-feedback">
                  <?php echo $this->Form->input('User.email', array('placeholder'=>'Enter Your Email','class'=>'form-control','label'=>false)); ?>
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                  </div>
              
          </div><!-- /.login-box -->
        </div>
      </div>
    </div>
  </div>
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
  </main>
  
</html>
<?php echo $this->element('latestfrontend/login-footer'); ?>