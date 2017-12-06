<!DOCTYPE html>
<html>
<head>
<?php echo $this->element('admin-head'); ?>

</head>
<body>
 <input type="hidden" value="/runningportal/" id="baseurl"/>
 <?php if($this->Session->read('User_id')){
    echo $this->element('portal-includes/pages-login-header');
    }else{
	echo $this->element('portal-includes/pages-header');
    }
 ?>
<?php echo $this->fetch('content'); ?>
   	<?php echo $this->element('admin-footer'); ?>
<?php echo $this->element('portal-home/register'); ?>
<?php echo $this->element('portal-home/login'); ?>
</body>
</html>