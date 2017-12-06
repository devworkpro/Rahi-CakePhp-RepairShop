<meta charset="UTF-8">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php echo $title; ?></title>
<?php echo $this->Html->css(array('bootstrap.min')); ?>
<script src="<?php echo $this->webroot.'Plugins/jQuery/jQuery-2.1.4.min.js';?>"></script>
<?php echo $this->Html->script(array('bootstrap.min')); ?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<link href="<?php echo $this->webroot.'css/front/hover.css';?>" rel="stylesheet" type="text/css" />
<link href="<?php echo $this->webroot.'css/front/style.css';?>" rel="stylesheet" type="text/css" />
 <?php  if(isset($scripts)){echo $scripts;} ?>