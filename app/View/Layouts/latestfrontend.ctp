<!DOCTYPE html>
<html>

<?php echo $this->element('latestfrontend/head'); ?>



<body data-spy="scroll" data-target="#header">

<?php echo $this->element('latestfrontend/header'); ?>

<?php echo $this->fetch('content'); ?>

<?php echo $this->element('latestfrontend/footer'); ?>
</body>
</html>