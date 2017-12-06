<?php echo $this->Flash->render('positive'); ?>
<style type="text/css">
  .customer{
    text-align: center;
    background: #F1F1F1;
  }
</style>

<div class="warper container-fluid" style="margin-bottom:50px;">
	<div class="page-header">
  		<h1>Staff Details
  		<span class="pull-right">
  			<?php $user_id=$userDetail['User']['id']; ?>			
  			
  			<?php echo $this->Html->link('Edit',array('controller' => 'staffs', 'action' => 'staffedit',$user_id),array('escape'=>false,'class'=>'btn btn-primary'));?>

  			<span class="btn-group">
	        	<a class="btn btn-default btn-sm dropdown-toggle" href="#" data-toggle="dropdown">Actions<span class="caret"></span></a>
		        <ul class="dropdown-menu">
		            <li><?php echo $this->Html->link('<p class="menu-default">Delete</p>',array('controller'=>'staffs','action'=>'deletestaff',$user_id),array('escape'=>false,'confirm' => 'Are you sure?'));?></li>
		        </ul>
	      	</span>

			<?php echo $this->Html->link('<i class="fa fa-arrow-left"></i> Back',array('controller' => 'staffs', 'action' => 'index'),array('escape'=>false,'class'=>'btn btn-default'));?>	
  		</span>
  		</h1>
  	</div>
  	

	<!-- Customer information panel -->
  	<div class="panel panel-default">
    	<div class="panel-heading"><i class="fa fa-user"></i>       Staff Info</div>
	    <div class="panel-body">
		<!-- /.box-header -->
	      	
        	<div class="row">
        		<div class="col-lg-6 col-md-6">
         		<h1>
         		<?php echo ucfirst($userDetail['User']['first_name'])." ".ucfirst($userDetail['User']['last_name']); ?>
                 | 
                 <?php echo $this->Html->link(ucfirst($userDetail['User']['business_name']),array('controller' => 'users', 'action' => 'userdetail',$user_id),array('escape'=>false,));?>	
            	</h1>
            	         	

            	
        		</div>
        		<div class="col-lg-6 col-md-6"> 
        			<h3 class="pull-right">Added on: 
        			<?php $date=date_create($userDetail['User']['created']);
           					 echo date_format($date,"d-M-Y"); ?> 
           			</h3>
        		</div>
        	</div>

        	<div class="row">
        		<div class="col-lg-6 col-md-6">
        			<div class="col-lg-3 col-md-3">
        			<b>Email:</b> 
        			</div>
        			<div class="col-lg-9 col-md-9">
        				<?php echo $userDetail['User']['email'];?>
        			</div><br>
        			<div class="col-lg-3 col-md-3">
        			<b>Phone Number:</b>
        			</div>
        			<div class="col-lg-9 col-md-9">
        				<?php echo $userDetail['User']['phone_number'];?>
					</div><br><br>
        		</div>
        		<div class="col-lg-6 col-md-6">
        			<div class="col-lg-3 col-md-3">
        			<b>Address:</b> 
        			</div>
        			<div class="col-lg-9 col-md-9">
        			<?php $address = $userDetail['User']['address'].' '.$userDetail['User']['city'].' '.$userDetail['User']['state_country'].' '.$userDetail['User']['zip'];?>
        			 <a target="_blank" href="https://maps.google.fr/maps?q=<?php echo $address;?>"> <?php echo ' '.$address;?>
                             </a>
        			</div><br>
        			<div class="col-lg-3 col-md-3">
        			<b>Address2:</b> 
        			</div>
        			<div class="col-lg-9 col-md-9">
        			<?php $address2 = $userDetail['User']['address2'];?>
        			 <a target="_blank" href="https://maps.google.fr/maps?q=<?php echo $address;?>"> <?php echo ' '.$address2;?>
                             </a>
        			</div>
           		</div>
        	</div>
        	<?php 
        	if(!empty($StaffMenu))
        	{
        		?>
        	<div class="row">
	        	<div class="col-lg-12 col-md-12">
		  	 		<h2>Permissions</h2>

		  	 		<?php
		  	 		if($StaffMenu['StaffMenu']['customers']==1)
		  	 		{
		  	 			?>
		  	 			<div class="col-xs-4 col-sm-4">            
              				<span><h3><i class="fa fa-user"></i>&nbsp;&nbsp;Customer Module</h3></span>
              			</div>
              			<?php
		  	 		}
		  	 		
		  	 		if($StaffMenu['StaffMenu']['contracts']==1)
		  	 		{
		  	 			?>
		  	 			<div class="col-xs-4 col-sm-4">            
              				<span><h3><i class="fa fa-file-text-o "></i>&nbsp;&nbsp;Contract Module</h3></span>
              			</div>
              			<?php
		  	 		}
		  	 		
		  	 		if($StaffMenu['StaffMenu']['customer_purchases']==1)
		  	 		{
		  	 			?>
		  	 			<div class="col-xs-4 col-sm-4">            
              				<span><h3><i class="fa fa-mobile"></i>&nbsp;&nbsp;Customer Purchase Module</span>
              			</div>
              			<?php
		  	 		}
		  	 		
		  	 		if($StaffMenu['StaffMenu']['invoices']==1)
		  	 		{
		  	 			?>
		  	 			<div class="col-xs-4 col-sm-4">            
              				<span><h3><i class="fa fa-shopping-cart "></i>&nbsp;&nbsp;Invoice Module</h3></span>
              			</div>
              			<?php
		  	 		}
		  	 		
		  	 		if($StaffMenu['StaffMenu']['assets']==1)
		  	 		{
		  	 			?>
		  	 			<div class="col-xs-4 col-sm-4">            
              				<span><h3><i class="fa fa-desktop"></i>&nbsp;&nbsp;Assets Module</h3></span>
              			</div>
              			<?php
		  	 		}
		  	 		
		  	 		if($StaffMenu['StaffMenu']['refurbs']==1)
		  	 		{
		  	 			?>
		  	 			<div class="col-xs-4 col-sm-4">            
              				<span><h3><i class="fa fa-wrench "></i>&nbsp;&nbsp;Refurb Module</h3></span>
              			</div>
              			<?php
		  	 		}
		  	 		
		  	 		if($StaffMenu['StaffMenu']['estimates']==1)
		  	 		{
		  	 			?> 
		  	 			<div class="col-xs-4 col-sm-4">            
              				<span><h3><i class=" fa fa-clock-o "></i>&nbsp;&nbsp;Estimate Module</h3></span>
              			</div>
              			<?php
		  	 		}
		  	 		
		  	 		if($StaffMenu['StaffMenu']['tickets']==1)
		  	 		{
		  	 			?>
		  	 			<div class="col-xs-4 col-sm-4">            
              				<span><h3><i class=" fa fa-check-square-o "></i>&nbsp;&nbsp;Ticket Module</h3></span>
              			</div>
              			<?php
		  	 		}
		  	 		
		  	 		if($StaffMenu['StaffMenu']['parts']==1)
		  	 		{
		  	 			?>
		  	 			<div class="col-xs-4 col-sm-4">            
              				<span><h3><i class="fa fa-plane "></i>&nbsp;&nbsp;Part Module</h3></span>
              			</div>
              			<?php
		  	 		}
		  	 		
		  	 		if($StaffMenu['StaffMenu']['inventory']==1)
		  	 		{
		  	 			?>
		  	 			<div class="col-xs-4 col-sm-4">            
              				<span><h3><i class="fa fa-barcode"></i>&nbsp;&nbsp;Inventory Module</h3></span>
              			</div>
              			<?php
		  	 		}
		  	 		
		  	 		if($StaffMenu['StaffMenu']['purchase_orders']==1)
		  	 		{
		  	 			?> 
		  	 			<div class="col-xs-4 col-sm-4">            
              				<span><h3><i class=" fa fa-truck "></i>&nbsp;&nbsp;Purchase Order Module</span>
              			</div>
              			<?php
		  	 		}
		  	 		
		  	 		if($StaffMenu['StaffMenu']['calendar']==1)
		  	 		{
		  	 			?> 
		  	 			<div class="col-xs-4 col-sm-4">            
              				<span><h3><i class="fa fa-calendar"></i>&nbsp;&nbsp;Calendar Module</span>
              			</div>
              			<?php
		  	 		}
		  	 		
		  	 		if($StaffMenu['StaffMenu']['pos']==1)
		  	 		{
		  	 			?> 
		  	 			<div class="col-xs-4 col-sm-4">            
              				<span><h3><i class="fa fa-money"></i>&nbsp;&nbsp;POS Module</span>
              			</div>
              			<?php
		  	 		}
		  	 		
		  	 		if($StaffMenu['StaffMenu']['leads']==1)
		  	 		{
		  	 			?> 
		  	 			<div class="col-xs-4 col-sm-4">            
              				<span><h3><i class=" fa fa-user "></i>&nbsp;&nbsp;Leads Module</span>
              			</div>
              			<?php
		  	 		}
		  	 		
		  	 		if($StaffMenu['StaffMenu']['domo']==1)
		  	 		{
		  	 			?> 
		  	 			<div class="col-xs-4 col-sm-4">            
              				<span><h3><i class="fa fa-line-chart"></i>&nbsp;&nbsp;Domo Module</span>
              			</div>
              			<?php
		  	 		}
		  	 		
		  	 		if($StaffMenu['StaffMenu']['market']==1)
		  	 		{
		  	 			?> 
		  	 			<div class="col-xs-4 col-sm-4">            
              				<span><h3><i class=" fa fa-rocket "></i>&nbsp;&nbsp;Market Module</span>
              			</div>
              			<?php
		  	 		}
		  	 		
		  	 		if($StaffMenu['StaffMenu']['reports']==1)
		  	 		{
		  	 			?> 
		  	 			<div class="col-xs-4 col-sm-4">            
              				<span><h3><i class="fa fa-bar-chart "></i>&nbsp;&nbsp;Report Module</span>
              			</div>
              			<?php
		  	 		}
		  	 		
		  	 		if($StaffMenu['StaffMenu']['wiki']==1)
		  	 		{
		  	 			?>
		  	 			<div class="col-xs-4 col-sm-4">            
              				<span><h3><i class="fa fa-pencil-square-o "></i>&nbsp;&nbsp;Wiki Module</span>
              			</div>
              			<?php
		  	 		}
		  	 		?>
				</div>
		  	</div><br><br>
		  	<?php } ?>
	        <div class="row">
	        	<div class="col-lg-12 col-md-12">
		  	 		<div id="map" style="width:100%;height:470px;"></div>
		  	 		<?php echo $this->Form->input('latitude', array('type'=>'hidden','class'=>'form-control lat', 'id' => 'lat','value'=>$userDetail['User']['latitude'])); ?> 
					<?php echo $this->Form->input('longitude', array('type'=>'hidden','class'=>'form-control lng','id' => 'lng','value'=>$userDetail['User']['longitude'])); ?>
		  	 	</div>
		  	</div>

		  	
	    </div>
  	</div>
</div>


<!-- Address Map -->

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCJDYJ4asKNDhR0xamrDfYUfLyUlzZuUTI&libraries=places&callback=initAutocomplete"></script>
<script>
	var lat = $('#lat').val();
	var lng = $('#lng').val();
	if(lat!="" && lng!="")
	{
		function initMap() {
		    var map;
		    var bounds = new google.maps.LatLngBounds();
		    var mapOptions = {
		        mapTypeId: 'roadmap'
		    };
		                    
		    // Display a map on the web page
		    map = new google.maps.Map(document.getElementById("map"), mapOptions);
		    map.setTilt(50);
		        
		    // Multiple markers location, latitude, and longitude
		    var markers = [['<?php echo $userDetail['User']['first_name'];?> <?php echo $userDetail['User']['last_name'];?>,<?php echo $userDetail['User']['email'];?>', <?php echo $userDetail['User']['latitude'];?>, <?php echo $userDetail['User']['longitude']?>]];

		    
		    // Info window content
		    var infoWindowContent = [['<div class="info_content">' +
		        '<h3><?php echo $userDetail['User']['first_name']." ".$userDetail['User']['last_name']." ".$userDetail['User']['business_name'];?></h3>' +
		        '<p><?php echo $userDetail['User']['address']." ".$userDetail['User']['city']." ".$userDetail['User']['state_country']." ".$userDetail['User']['zip'];?>.</p>' + '</div>']];

		   
		    // Add multiple markers to map
		    var infoWindow = new google.maps.InfoWindow(), marker, i;
		    
		    // Place each marker on the map  
		    for( i = 0; i < markers.length; i++ ) {
		        var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
		        bounds.extend(position);
		        marker = new google.maps.Marker({
		            position: position,
		            map: map,
		            title: markers[i][0]
		        });
		        
		        // Add info window to marker    
		        google.maps.event.addListener(marker, 'click', (function(marker, i) {
		            return function() {
		                infoWindow.setContent(infoWindowContent[i][0]);
		                infoWindow.open(map, marker);
		            }
		        })(marker, i));

		        // Center the map to fit all markers on the screen
		        map.fitBounds(bounds);
		    }

		    // Set zoom level
		    var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function(event) {
		        this.setZoom(14);
		        google.maps.event.removeListener(boundsListener);
		    });
	    
		}
		// Load initialize function
		google.maps.event.addDomListener(window, 'load', initMap);
	}
	else
	{
		//initialize();
		function initialize(lat,lng) {
	        var myLocation = new google.maps.LatLng(36.084621,-96.921387);
	   		var mapOptions = {
	        	zoom : 7,
	        	center : myLocation,
	        	mapTypeId : google.maps.MapTypeId.ROADMAP
	      	};
	    	map = new google.maps.Map(document.getElementById('map'), mapOptions);
	      	// add marker
	    }
	   	google.maps.event.addDomListener(window, 'load', initialize);
	}
</script>