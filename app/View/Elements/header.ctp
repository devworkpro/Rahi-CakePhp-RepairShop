<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Home</title>
<!-- Latest compiled and minified CSS -->

<?= $this->Html->assets->css('bootstrap/bootstrap.css'); ?>
<!-- Calendar Styling  -->

<link rel="stylesheet" href="<?php echo $this->Html->css('assets/css/plugins/calendar/calendar.css');?>" /> 

<!-- Date picker  -->
<link rel="stylesheet" href="<?php echo $this->Html->css('webroot/Plugins/datepicker/datepicker3.css');?>" /> 

<link rel="stylesheet" type="text/css" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

<!-- Date Time picker  -->
<link rel="stylesheet" href="<?php echo $this->Html->css('bootstrap-datetimepicker/bootstrap-datetimepicker.css');?>" />
<link rel="stylesheet" href="<?php echo $this->Html->css('bootstrap-datetimepicker/bootstrap-datetimepicker.min.css');?>" />
 <!-- pdf  -->



 <!-- Fonts  -->
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,500,600,700,300' rel='stylesheet' type='text/css'>
<!-- jQuery library -->
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>  
<!-- Latest compiled JavaScript -->
<!-- Base Styling  -->

    <link rel="stylesheet" href="<?= $this->Html->assets('css/app/app.v1.css') ?>"/>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<?php echo $this->Html->css('font-awesome.min'); ?>
<?php echo $this->Html->css('style1'); ?>
<link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>

</head>
<body>
<header>
<div class="head_one">
<div class="container">
<div class="col-xs-12 col-sm-4 col-md-4">
<div class="h_lft">
    <ul>
    <li>
      <?php 
      
       echo $this->Html->image("h1.png", array(

        "alt" => "logo1",
          'url' => array('controller' => 'pages', 'action' => 'display')
      ));
      ?>
      
    </li>
     <li>
      <?php 
      
       echo $this->Html->image("h2.png", array(

        "alt" => "logo2",
          'url' => array('controller' => 'pages', 'action' => 'display')
      ));
      ?>
      
    </li>
    <li>
      <?php 
      
       echo $this->Html->image("h3.png", array(

        "alt" => "logo3",
          'url' => array('controller' => 'pages', 'action' => 'display')
      ));
      ?>
      
    </li>
    </ul>
  </div><!--h_lft-->
</div><!--col-xs-12 col-sm-4 col-md-4--->
<div class="col-xs-12 col-sm-8 col-md-8">
<div class="h_ryt">
  <div class="col-xs-12 col-sm-8 col-md-8">
      <div class="l_lft">
        <?php 
       echo $this->Html->link(
    ' <h1>Somaiya Sports Academy</h1>',
    array('controller'=>'pages', 'action'=>'display'),
    array('escape' => FALSE)
);
                ?>
      </div>
  </div>
  <div class="col-xs-12 col-sm-4 col-md-4">
    <div class="l_ryt">
      <div class="social_icn">
        <ul>
        <li><a href="#">
        <i class="fa fa-facebook"></i>
        </a></li>
        
        <li><a href="#">
        <i class="fa fa-youtube"></i>
        </a></li>
        <li><a href="#">
        <i class="fa fa-instagram"></i>
        </a></li>
        </ul>
        <h1>Call Us  022 23203949</h1>
      </div>
      <div class="trst">
       
      <?php 
      
       echo $this->Html->image("logo.png", array(

        "alt" => "logo",
          'url' => array('controller' => 'pages', 'action' => 'display')
      ));
      ?>
      
  
      </div>
    </div><!--l_ryt-->
  </div><!--col-xs-12 col-sm-4 col-md-4--->
</div><!--h_ryt-->
</div><!--col-xs-12 col-sm-8 col-md-8-->

</div><!--container-->
</div><!--head_one-->
</header>