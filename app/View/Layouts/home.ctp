<!DOCTYPE html>
<html>
<head>
<?php echo $this->element('portal-includes/head'); ?>

</head>
<body>
 <input type="hidden" value="/repairshopsaas/" id="baseurl"/>

<?php echo $this->element('portal-includes/header'); ?>
<?php echo $this->fetch('content'); ?>
<?php echo $this->element('portal-includes/footer'); ?>
<?php echo $this->element('portal-home/register'); ?>
<?php echo $this->element('portal-home/login'); ?>
</body>
</html>