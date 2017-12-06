<!doctype html>
<html>
	<?php echo $this->element('user/user-head'); ?>
    
    <body>
       

        <main class="page-content content-wrap">

        	<?php echo $this->element('user/user-header'); ?>

        	
            <?php echo $this->fetch('content'); ?>
           
                
         <?php echo $this->element('user/user-footer'); ?>  
      