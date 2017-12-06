<!DOCTYPE html>
<html>
	<?php echo $this->element('frontenduser/head'); ?>
    
    <body class="page-header-fixed compact-menu page-horizontal-bar">
       

        <main class="page-content content-wrap">

        	
        	<?php 
        	$role = $this->Session->read('Auth.User.role');
        	if($role == 'staff')
        	{
        		echo $this->element('frontenduser/stafftopnavbar'); 
        		echo $this->element('frontenduser/staffmenubar'); 
        	}
        	else{
        		echo $this->element('frontenduser/topnavbar'); 
        		echo $this->element('frontenduser/menubar'); 
       		}?>
            
            <?php echo $this->fetch('content'); ?>
           
                
         <?php echo $this->element('frontenduser/footer'); ?>  
      