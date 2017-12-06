<div class="navbar navbar-inverse navbar-fixed-top" style="background-color: #292929; position : fixed;"  >

<div class="container">
<?php 
if($this->Session->read('Auth.User.id')!='')
{
?>
<p class="navbar-brand" style="color:#fff; font-weight:bold;" > <?php echo $this->Session->read('Auth.User.first_name').' '.$this->Session->read('Auth.User.last_name');?> </p>
<?php 
}
else{
?>
<p class="navbar-brand" style="color:#fff; font-weight:bold;" > Repair Shoppe </p>
<?php
}
?>
</div>
</div>