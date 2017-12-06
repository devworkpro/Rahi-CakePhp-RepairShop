<style type="text/css">
    .btn_link{
        font-size: 3em;
        height: 51px;
        line-height: 25px;
        width: 58px;
        border-radius: 5px;
    }
    .big-button{
        font-size: 24px;
        height: 55px;
        line-height: 27px;
        padding: 13px;
        width: 265px;
        border-radius: 5px;
        text-align: left;
    }
    .summary{
        font-size: 18px;
    }
    strong{
        font-size:14px;
    }
</style>


 <?php $total_ticket=0;$open_ticket=0; $my_ticket=0;?>
  <?php foreach($ticket as $tic) {?>
    <td><?php  ++$total_ticket;?> </td>
    <td><?php $status = $tic['Ticket']['status'];
             
    if($status=='Resolved')
    {
      $my_ticket=$my_ticket+1;
    }
    else
    {
      $open_ticket=$open_ticket+1;
    }
    ?> 
    </td>
  <?php } ?> 


<?php echo $this->Flash->render('positive'); ?>
<?php $counter = count($latlngusers);  // pr($latlngusers); ?>

<div class="page-inner">
    <div class="page-title">
        <div class="container">
            <h1>Welcome!</h1>
        </div>
    </div>
    <div id="main-wrapper" class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-6">
                <div class="panel panel-white">
                    <div class="panel-title">
                        <h2 style="text-align: center; font-weight:bold; ">Get Started</h2>
                    </div>
                    <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-2 col-md-2">
                            <?php echo $this->Html->link('<i class="fa hidden-phone fa-user"></i>',array('controller'=>'Users','action'=>'add'),array('escape'=>false,"class"=>'btn btn-default btn_link'));?>
                        </div>
                        <div class="col-lg-9 col-md-9">
                            <?php echo $this->Html->link('<i class="fa fa-plus"></i>  New Customer',array('controller'=>'Users','action'=>'add'),array('escape'=>false,"class"=>'btn btn-success big-button'));?>
                        </div>  
                    </div><br>
                    <div class="row">
                        <div class="col-lg-2 col-md-2">
                            <?php echo $this->Html->link('<i class="fa fa-check-square-o"></i>',array('controller'=>'Tickets','action'=>'add'),array('escape'=>false,"class"=>'btn btn-default btn_link'));?>
                        </div>
                        <div class="col-lg-9 col-md-9">
                            <?php echo $this->Html->link('<i class="fa fa-plus"></i>  New Ticket',array('controller'=>'Tickets','action'=>'add'),array('escape'=>false,"class"=>'btn btn-success big-button'));?>
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-lg-2 col-md-2">
                            <?php echo $this->Html->link('<i class="fa fa-barcode"></i>   ',array('controller'=>'products','action'=>'add'),array('escape'=>false,"class"=>'btn btn-default btn_link'));?>
                        </div>
                        <div class="col-lg-9 col-md-9">
                            <?php echo $this->Html->link('<i class="fa fa-plus"></i> New Inventory',array('controller'=>'products','action'=>'add'),array('escape'=>false,"class"=>'btn btn-success big-button'));?>
                        </div>
                    </div><br>
                    <!-- <div class="row">
                        <div class="col-lg-2 col-md-2">
                            <?php echo $this->Html->link('<i class="fa fa-mobile-phone"></i>',array('controller'=>'#','action'=>'add'),array('escape'=>false,"class"=>'btn btn-default btn_link'));?>
                        </div>
                        <div class="col-lg-9 col-md-9">
                            <?php echo $this->Html->link('<i class="fa fa-plus"></i> New Check In',array('controller'=>'#','action'=>'add'),array('escape'=>false,"class"=>'btn btn-success big-button'));?>
                        </div>
                    </div><br> -->
                    <div class="row">
                        <div class="col-lg-2 col-md-2">
                            <?php echo $this->Html->link('<i class="fa fa-shopping-cart"></i>',array('controller'=>'Invoices','action'=>'add'),array('escape'=>false,"class"=>'btn btn-default btn_link'));?>
                        </div>
                        <div class="col-lg-9 col-md-9">
                            <?php echo $this->Html->link('<i class="fa fa-plus"></i>  New Invoice',array('controller'=>'Invoices','action'=>'add'),array('escape'=>false,"class"=>'btn btn-success big-button'));?>
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-lg-2 col-md-2">
                            <?php echo $this->Html->link('<i class="fa fa-clock-o"></i>',array('controller'=>'Estimates','action'=>'add'),array('escape'=>false,"class"=>'btn btn-default btn_link'));?>
                        </div>
                        <div class="col-lg-9 col-md-9">
                            <?php echo $this->Html->link('<i class="fa fa-plus"></i>   New Estimate',array('controller'=>'Estimates','action'=>'add'),array('escape'=>false,"class"=>'btn btn-success big-button'));?>
                        </div>
                    </div><br>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6">
            <!-- Reminters -->

            <div class="panel panel-default reminder">
                <div class="panel-heading clearfix">
                    <h4 class="panel-title"><i class="fa fa-clock-o"></i>  <?php echo $this->Html->link('Reminders',array('controller' => 'Reminders', 'action' => 'reminderlist'),array('escape'=>false));?>    &nbsp;&nbsp;   </h4>
                    
                    <p>
                        <a href="#myReminderModal" data-toggle="modal" style="font-size:15px;">
                            <span class="glyphicon glyphicon-plus"></span>
                        </a>
                    </p>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>Time</th>
                                <th>Message</th>
                                <th>For Tech</th>
                                <th>Status </th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($reminder as $rem) {
                           // $at = $rem['Reminder']['at'];
                        ?>
                        <tr>
                            <td><?php echo date('D d-m-Y g:i A',strtotime($rem['Reminder']['at']));?></td>

                            <td><?php echo $rem['Reminder']['notes'];?></td>

                            <td><?php echo $rem['Reminder']['tech'];?></td>
                            <td><?php echo $rem['Reminder']['customer'];?></td>
                            <td>
                                
                            <?php echo $this->Html->link('Snooze 1 day',array('controller' => 'pages', 'action' => 'updatereminder',$rem['Reminder']['id']),array('escape'=>false));?>
                                

                            </td>
                        </tr>

                        <?php }?>

                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
            </div>

            <!-- Reminder Modal -->   
            <div class="modal fade" id="myReminderModal" role="dialog">
            <div class="modal-dialog">
            <!-- Modal content-->
                <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Set a new reminder</h4>
                </div>
                <div class="modal-body">
                <div id="appointment" > 
                <?php echo $this->Form->create('Pages',array('controller'=>'pages','action'=>'addnewreminder')); ?> 
                    <div class="row">                 
                    <div class="col-xs-12 col-sm-12">
                    <div class="form-group">
                        <p>Customer: <?php echo ucfirst($userDetail['User']['first_name'])." ".ucfirst($userDetail['User']['last_name']); ?></p>
                        <?php echo $this->Form->input('Reminder.customer', array('type'=>'hidden','div'=>false,'class'=>'form-control','label'=>'Customer','value'=>$userDetail['User']['first_name']." ".$userDetail['User']['last_name'])); ?>
                        <?php echo $this->Form->input('Reminder.user_id', array('type'=>'hidden','div'=>false,'class'=>'form-control','value'=>$userDetail['User']['id'])); ?>
                    </div>
                    </div>
                    </div>
                    <div class="row">                 
                    <div class="col-xs-12 col-sm-12">
                    <div class="form-group">

                        <input type='text' class="" name="Reminder[at]" id="datetimepicker3" style="width: 100%;" />

                    </div>
                    </div>
                    </div>
                    <div class="row">                 
                    <div class="col-xs-12 col-sm-12">
                    <div class="form-group">
                            <?php echo $this->Form->input('Reminder.notes', array('type'=>'textarea','class'=>'form-control','label'=>'','placeholder'=>'Notes...')); ?>
                    </div>
                    </div>  
                    </div>
                    
                    
                    <div class="row">  
                        <div class="col-xs-12 col-sm-12">
                            <div class="form-group">
                                                
                            <label>For Tech</label><br> 
                                <input type='hidden' name="Reminder[tech]" value="<?php echo $this->Session->read('Auth.User.first_name')?>"/>

                                <select  class="select optional form-control" >
                                    <option selected="selected">                            <?php
                                        echo $this->Session->read('Auth.User.first_name').' '.$this->Session->read('Auth.User.email');
                                        ?>
                                    </option>
                                </select>
                            </div>
                        </div>
                    </div>
                    

                    <div class="row">  
                    <hr class="dotted"> 
                        <div class="col-xs-2 col-sm-2">
                        </div>
                        <div class="col-xs-3 col-sm-3">
                            <div class="form-group">
                                <?php echo $this->Form->button("Save", array('class' => 'btn btn-success pull-left')); ?>
                            </div>
                        </div>
                        <div class="col-xs-2 col-sm-2">
                        </div>
                        <div class="col-xs-3 col-sm-3">
                        <div class="btn-group">
                            <?php echo $this->Html->link('All Reminders',array('controller' => 'Reminders', 'action' => 'reminderlist'),array('escape'=>false,'class'=>'btn btn-default m-b-sm'));?>

                        </div>
                        </div>
                        <div class="col-xs-2 col-sm-2">
                        </div>
                    </div>

                                            
                    <?php echo $this->Form->end(); ?>
                </div>
                </div>
                </div>
                      
            </div>
            </div> 
        </div><!-- Row -->
        <div class="row">
            <div class="col-xs-12 col-sm-12">
                <div class="panel panel-white">
                    <div class="panel-heading">
                        <h4 class="panel-title">Map of Customers</h4>
                    </div>
                    <div class="panel-body">
                            <p>Get a sense of where your base is physically located! </p>
                        <div id="flotchart1" style="display: none;"></div>
                        <div id="map" style="width:auto;height:500px;"></div>
                    </div>                                   
                </div>
            </div>
            <div class="col-xs-12 col-sm-6">
                <div class="panel panel-white" style="height: 100%;">
                    <div class="panel-title">
                        <h2  style="font-weight:bold; margin-left: 15px;">What's New?</h2>
                    </div>
                    <div class="panel-body">
                        
                       
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6">
                <div class="panel panel-white">
                    <div>
                        <h2 style="text-align: center;font-weight:bold;">
                        Summary<span style="font-size: 14px;">(Month to Date)</span>
                        </h2>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-6 col-sm-6">
                                <p class="summary"><b>My Activity</b></p><br>
                                <strong>Open Tickets:    </strong><?php echo $open_ticket ;?><br>
                                <strong>My Tickets:    </strong><?php echo $my_ticket ;?><br>
                                <strong>My Upcoming Appointments:</strong>0<br><br>
                                <p class="mtm summary">
                                <b>Sales Activity (admins only)</b>
                                </p>
                                <strong>Gross Sales:</strong><br>
                                <strong>Net Sales:</strong><br>
                            </div>
                            <div class="col-xs-6 col-sm-6">
                                <p class="summary"><b>My Activity</b></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-xs-12 col-sm-12 col-lg-12 col-md-12">
                <div class="panel panel-white">
                    <div class="panel-title">
                        <h2 style="margin-left: 15px;font-weight:bold;">Month to Date Stats</h2>
                    </div>
                    <div class="panel-body">
                        
                    </div>
                </div>
            </div>
        </div>
    </div><!-- Main Wrapper -->
</div>
  


<!-- Address Map -->

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCJDYJ4asKNDhR0xamrDfYUfLyUlzZuUTI&libraries=places&callback=initAutocomplete"></script>
<script>
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
    var markers = [

        <?php $i=1; 
            foreach ($latlngusers as $key => $value) { ?>
                ['<?php echo $value['User']['first_name'];?> <?php echo $value['User']['last_name'];?>,<?php echo $value['User']['email'];?>', <?php echo $value['User']['latitude'];?>, <?php echo $value['User']['longitude']?>],
            <?php } ?>
        
        ['',35.35300650,-97.56063610]
        
    ];

    
    // Info window content
    var infoWindowContent = [
        <?php $i=1; 
        foreach ($latlngusers as $key => $value) { ?>
        ['<div class="info_content">' +
        '<h3><?php echo $value['User']['first_name']." ".$value['User']['last_name']." ".$value['User']['business_name'];?></h3>' +
        '<p><?php echo $value['User']['address']." ".$value['User']['city']." ".$value['User']['state_country']." ".$value['User']['zip'];?>.</p>' + '</div>'],

        <?php } ?>
        
        ['<div class="info_content">' +
        '<h3>dsfsdfdsfdsfsdfsdo</h3>' +
        '<p>sdfjklkjsdfnkfnsdnfsdknfsdkjsdnfkfdsnksdfnkjsfdfsdjkbsfd</p>' +
        '</div>']
    ];

                        
    /*// Info window content
    var infoWindowContent = [
        ['<div class="info_content">' +
        '<h3>Brooklyn Museum</h3>' +
        '<p>The Brooklyn Museum is an art museum located in the New York City borough of Brooklyn.</p>' + '</div>'],
        ['<div class="info_content">' +
        '<h3>Brooklyn Public Library</h3>' +
        '<p>The Brooklyn Public Library (BPL) is the public library system of the borough of Brooklyn, in New York City.</p>' +
        '</div>'],
        ['<div class="info_content">' +
        '<h3>Prospect Park Zoo</h3>' +
        '<p>The Prospect Park Zoo is a 12-acre (4.9 ha) zoo located off Flatbush Avenue on the eastern side of Prospect Park, Brooklyn, New York City.</p>' +
        '</div>'],
        ['<div class="info_content">' +
        '<h3>dsfsdfdsfdsfsdfsdo</h3>' +
        '<p>sdfjklkjsdfnkfnsdnfsdknfsdkjsdnfkfdsnksdfnkjsfdfsdjkbsfd</p>' +
        '</div>']
    ];*/
        
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
        this.setZoom(2);
        google.maps.event.removeListener(boundsListener);
    });
    
}
// Load initialize function
google.maps.event.addDomListener(window, 'load', initMap);
</script>

<!-- Date Time Picker -->


    <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2017.1.118/styles/kendo.common-material.min.css" />
    <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2017.1.118/styles/kendo.material.min.css" />
    <script src="https://kendo.cdn.telerik.com/2017.1.118/js/kendo.all.min.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
    // create DateTimePicker from input HTML element
    $("#datetimepicker1").kendoDateTimePicker({
    value:new Date()
    });

    $("#datetimepicker2").kendoDateTimePicker({
    value:new Date()
    });

    $("#datetimepicker3").kendoDateTimePicker({
    value:new Date()
    });
});
</script>
