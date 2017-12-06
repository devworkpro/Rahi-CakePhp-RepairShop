<?php echo $this->Html->script("http://maps.google.com/maps/api/js?sensor=false&libraries=places");
	

   $map_options = array(
        "id"         => "map_canvas",
        "width"      => "100%",
        "height"     => "350px",
        "localize"   => false,
        'type'       => 'ROADMAP',
        "zoom"       => 14,
        "address"    => "Chandigarh, NY",
        "marker"     => true,
        "infoWindow" => true,
        'latitude' 	 => $event['Event']['latitude'],
    	'longitude'  => $event['Event']['longitude'],
      );

?>

<section class="edit_event">
<?php
	if( intval(date('dmY', $event['Event']['start_time'])) === intval(date('dmY', $event['Event']['end_time']))  ){
		$date = date('d M Y', intval($event['Event']['start_time']));
	}else{
		$date = date('d M Y', intval($event['Event']['start_time'])).' - '.date('d M Y', intval($event['Event']['end_time']));
	}

	$time = date('h:i A', intval($event['Event']['start_time'])).' - '.date('h:i A', intval($event['Event']['end_time']));
?>

	<div class="edit_block">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<h3><strong>Event Title : </strong> <?php echo $event['Event']['title'];?></h3>	
					<h3><strong>Location :  </strong> <?php echo $event['Event']['search'];?></h3>		
				</div>
			</div>
		</div><!--conatainer-->
		<?php echo $this->GoogleMap->map($map_options); ?>
		<?php // echo '<img src="'.$this->webroot.'img/map.png/small/" alt="banner image">'; ?> 
	</div><!--edit_block-->

	<div class="edit_block">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<h3><strong>Created By:</strong> <?php echo $event['User']['first_name'];?></h3>
					<h3><strong>Date:</strong> <?php echo $date; ?></h3>
					<h3><strong>Time:</strong> <?php echo $time; ?></h3>
					<h3><strong>Location:</strong> <?php echo $event['Event']['g_address'];?>	</h3>
					<h3><strong>Description:</strong> </h3>
					<p> <?php echo $event['Event']['description'];?></p>
					
					<h3><strong>No. of Members :</strong> <?php echo $event['Event']['members'];?></h3>
					<h3><strong>Online Price :</strong> <?php echo $event['Event']['price'];?></h3>
					<h3><strong>On the Day Price :</strong> <?php echo $event['Event']['day_price'];?></h3>
					<h4><button type="button" class="btn btn-primary edit">EDIT</button>
					<button type="button" class="btn btn-primary cncl_evnt">CANCEL EVENT</button> </h4>
				</div>
			</div>
		</div><!--conatainer-->
		
	</div><!--edit_block-->
	
</section>
