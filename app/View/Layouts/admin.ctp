<!DOCTYPE html>
<html>
	<?php echo $this->element('admin-head'); ?>
    
    <body class="page-header-fixed compact-menu page-horizontal-bar">
       

        <main class="page-content content-wrap">

        	<?php echo $this->element('admin-topnavbar'); ?>

        	<?php echo $this->element('admin-menubar'); ?>

            
            <?php echo $this->fetch('content'); ?>
           
                
         <?php echo $this->element('admin-footer'); ?>  
      