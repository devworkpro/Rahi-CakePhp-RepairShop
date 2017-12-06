<?php echo $this->Flash->render('positive'); ?>
 <?php $counter=0;$i=0;$j=0;?>
  <?php foreach($Tickets as $tic) {?>
    <?php  ++$counter;//echo "<pre>";print_r($Tickets);die();
    $diagnosed= $tic['tickets']['diagnosed'];
    if($diagnosed=='on')
    {
    	++$i;
    }
    ?> 
    
  <?php } ?> 
  <?php $count=0;?>
  <?php foreach($Resolved as $rec) {?>
    <?php  ++$count;//echo "<pre>";print_r($rec);
    ?> 
     
  <?php } ?>
<title>Ticket Dashboard</title> 
<body style="background: black !important;">
<div class="nav navbar">
	<div class="navbar-inner">
	<div class="container">
		<a class="btn navbar-btn" data-toggle="collapse" data-target=".nav-collapse">
		<p class="navbar-brand header-nme"> Ticket Dashboard </p>
		<div class="navbar-collapse"> </div>
	</div>
	</div>
</div>
<div class="main">
<div class="row">
	<div class="col-lg-3 col-md-3">
		<div class="section">
			Open Tickets
			<div class="value"><?php echo $counter;?></div>
		</div>
	</div>

	<div class="col-lg-3 col-md-3">
		<div class="section">
			Tickets Resolved Last MTD/This MTD
			<div class="value"><?php echo $count;?></div>
		</div>
	</div>

	<div class="col-lg-3 col-md-3">
		<div class="section">
	Current Hours to Diagnose
	<div class="value"><?php echo $i;?></div>
		</div>
	</div>

	<div class="col-lg-3 col-md-3">
		<div class="section">
	Hours to Close Last MTD/This MTD
	<div class="value"><?php echo $j.'/'.$j;?></div>
		</div>
	</div>
	<div class="clearfix"></div><br><br>

</div>

<div class="row">
<?php foreach($Tickets as $tic) {?>

	<?php $invoiced= $tic['tickets']['invoiced'];
	$status= $tic['tickets']['status'];
	$diagnosed= $tic['tickets']['diagnosed'];
	$invoiced= $tic['tickets']['invoiced'];
	$Ticket_id= $tic['tickets']['id'];
	$completed_time= date("Y-m-d H:i:s");  
	$assigned_time =  $tic['tickets']['modified'];
    $d1 = new DateTime($assigned_time);
    $d2 = new DateTime($completed_time);
    $interval = $d2->diff($d1);
    $interval->format('%M month,%D days,%H hours, %I minutes');
    $minuts = $interval->format('%I');
    $hours = $interval->format('%H');
    $days = $interval->format('%D');
    $month = $interval->format('%M');
    $minuts_ago = $interval->format('%I minutes ago');
    $hours_ago = $interval->format('%H hours ago');
    $days_ago = $interval->format('%D days ago');
    $month_ago = $interval->format('%M month ago');

    if($month!=00)
	          {
	            ?>
	            <div class="section1 red">
			<span class="ticket_id"><?php echo $this->Html->link( $Ticket_id,array('controller'=>'Tickets','action'=>'ticketdetails',$Ticket_id),array('escape'=>false));?></span><br>
			<span class="ticket_time"><?php
			if($month_ago!=00)
	          {
	            echo $month_ago;
	          }
	          elseif ($days_ago!=00) {
	            echo $days_ago; 
	          }
	          elseif ($hours_ago!=00) {
	            echo $hours_ago; 
	          }
	          elseif ($minuts_ago!=00) {
	            echo  $minuts_ago; 
	          }
	          
	          
	          ?>
	        </span><br>
			<?php echo $name= $tic['users']['first_name'].' '.$tic['users']['last_name'];?><br>
			<?php echo $name= $tic['users']['email'];?><br>
			<?php echo $status= $tic['tickets']['status'];?><br>
		</div>
	            <?php
	          }
	          elseif ($days!=00) {
	            ?>
	            <div class="section1 green">
			<span class="ticket_id"><?php echo $this->Html->link( $Ticket_id,array('controller'=>'Tickets','action'=>'ticketdetails',$Ticket_id),array('escape'=>false));?></span><br>
			<span class="ticket_time"><?php
			if($month_ago!=00)
	          {
	            echo $month_ago;
	          }
	          elseif ($days_ago!=00) {
	            echo $days_ago; 
	          }
	          elseif ($hours_ago!=00) {
	            echo $hours_ago; 
	          }
	          elseif ($minuts_ago!=00) {
	            echo  $minuts_ago; 
	          }
	          
	          
	          ?>
	        </span><br>
			<?php echo $name= $tic['users']['first_name'].' '.$tic['users']['last_name'];?><br>
			<?php echo $name= $tic['users']['email'];?><br>
			<?php echo $status= $tic['tickets']['status'];?><br>
		</div>
		<?php
	          }
	          elseif ($hours!=00) {
	            ?>
	            <div class="section1 yellow">

			<span class="ticket_id"><?php echo $this->Html->link( $Ticket_id,array('controller'=>'Tickets','action'=>'ticketdetails',$Ticket_id),array('escape'=>false));?></span><br>
			<span class="ticket_time"><?php
			if($month_ago!=00)
	          {
	            echo $month_ago;
	          }
	          elseif ($days_ago!=00) {
	            echo $days_ago; 
	          }
	          elseif ($hours_ago!=00) {
	            echo $hours_ago; 
	          }
	          elseif ($minuts_ago!=00) {
	            echo  $minuts_ago; 
	          }
	          
	          
	          ?>
	        </span><br>
			<?php echo $name= $tic['users']['first_name'].' '.$tic['users']['last_name'];?><br>
			<?php echo $name= $tic['users']['email'];?><br>
			<?php echo $status= $tic['tickets']['status'];?><br>
		</div>
		<?php
	          }
	         elseif ($minuts!=00) {
	            ?>
	            <div class="section1 white">
	            <i class="fa fa-wrench"></i>
			<span class="ticket_id"><?php echo $this->Html->link( $Ticket_id,array('controller'=>'Tickets','action'=>'ticketdetails',$Ticket_id),array('escape'=>false));?></span><br>
			<span class="ticket_time"><?php
			if($month_ago!=00)
	          {
	            echo $month_ago;
	          }
	          elseif ($days_ago!=00) {
	            echo $days_ago; 
	          }
	          elseif ($hours_ago!=00) {
	            echo $hours_ago; 
	          }
	          elseif ($minuts_ago!=00) {
	            echo  $minuts_ago; 
	          }
	          
	          
	          ?>
	        </span><br>
			<?php echo $name= $tic['users']['first_name'].' '.$tic['users']['last_name'];?><br>
			<?php echo $name= $tic['users']['email'];?><br>
			<?php echo $status= $tic['tickets']['status'];?><br>
		</div><?php

	          }
   
	if($invoiced=='on'){?>
	<div class="col-xs-3">
		<div class="section1 green">
			<span class="ticket_id"><?php echo $this->Html->link( $Ticket_id,array('controller'=>'Tickets','action'=>'ticketdetails',$Ticket_id),array('escape'=>false));?></span><br>
			<span class="ticket_time"><?php
			if($month_ago!=00)
	          {
	            echo $month_ago;
	          }
	          elseif ($days_ago!=00) {
	            echo $days_ago; 
	          }
	          elseif ($hours_ago!=00) {
	            echo $hours_ago; 
	          }
	          elseif ($minuts_ago!=00) {
	            echo  $minuts_ago; 
	          }
	          
	          
	          ?>
	        </span><br>
			<?php echo $name= $tic['users']['first_name'].' '.$tic['users']['last_name'];?><br>
			<?php echo $name= $tic['users']['email'];?><br>
			<?php echo $status= $tic['tickets']['status'];?><br>
		</div>
	</div>
	<?php }
	if($diagnosed!='on'){
		?>
		<div class="col-xs-3">
		<div class="section1 purple">
			<span class="ticket_id"><?php echo $this->Html->link( $Ticket_id,array('controller'=>'Tickets','action'=>'ticketdetails',$Ticket_id),array('escape'=>false));?></span><br>
			<span class="ticket_time"><?php
			if($month_ago!=00)
	          {
	            echo $month_ago;
	          }
	          elseif ($days_ago!=00) {
	            echo $days_ago; 
	          }
	          elseif ($hours_ago!=00) {
	            echo $hours_ago; 
	          }
	          elseif ($minuts_ago!=00) {
	            echo  $minuts_ago; 
	          }
	          
	          
	          ?>
	        </span><br>
			<?php echo $name= $tic['users']['first_name'].' '.$tic['users']['last_name'];?><br>
			<?php echo $name= $tic['users']['email'];?><br>
			<?php echo $status= $tic['tickets']['status'];?><br>
		</div>
	</div>
	<?php
	}
	} ?> 

</div>



</div>
</body>
<style type="text/css">
	.navbar-inner {
    background: #292929 none repeat scroll 0 0;
    border-bottom: 1px solid #121212;
    border-radius: 0;
    padding: 10px 0;
}
.section {
  background-color: white;
  border-radius: 5px;
  float: left;
  height: 185px;
  margin: 10px;
  padding: 20px 15px 15px;
  width: 185px;
  text-align: center;
}
.header-nme{
    color: rgb(255, 255, 255);
    font-size: 25px;
    font-weight: bold;
    line-height: 0;
    margin-left: 30px;
    padding: 0;

}
.section1 {
    float: left;
    height: 120px;
    margin: 50px 20px;
    text-align: center;
    width: 160px;
}
.main{
	background: black; padding: 25px; height:auto;
}
.value{
 	color: #333;
    font-size: 100px;
    font-weight: bold;
    line-height: 1.5em;
}
.green{
	background-color: #2ecc71;
	color: black;
}
.yellow{
	background-color: yellow;
	color:black;
}
.purple{
	background-color: purple;
	color:white;
}
.ticket_id{
	font-size: 30px;
}
.ticket_time{
	font-size: 10px;
	text-align: right;
}
.red{
	background-color: #e74c3c;
	color:white;
}
.white{
	background-color: white;
	color:black;
}
.ticket_id > a {
    text-decoration: none;
}
</style>