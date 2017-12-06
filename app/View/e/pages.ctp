<!DOCTYPE html>
<html>
<head>
<?php echo $this->element('portal-includes/head'); ?>

</head>
<body>
 <input type="hidden" value="/runningportal/" id="baseurl"/>
 <input type="hidden" value="<?php echo $this->Session->read('User_id'); ?>" id="userid"/>
  <input type="hidden" value="http://112.196.42.180:4134/repairshopsaas/" id="siteurl"/>
 <?php if($this->Session->read('User_id')){
    echo $this->element('portal-includes/pages-login-header');
    }else{
	echo $this->element('portal-includes/pages-header');
    }
 ?>
<?php echo $this->fetch('content'); ?>
<?php echo $this->element('portal-includes/footer'); ?>
<?php echo $this->element('portal-home/register'); ?>
<?php echo $this->element('portal-home/login'); ?>


</body>
</html>