<?php echo $this->Flash->render('positive'); ?>
<div class="warper container-fluid" style="margin-bottom: 40px;">
	<div class="row"> 
		<div class="col-md-12">
            <div class="panel-body">
                
                <div class="row">
                <div class="col-md-9">
                	<h2>Calendar</h2>
					<div class="panel panel-white">
                    <div class="panel-body">
                        <div id="calendar"></div>  
                    </div>
                	</div>
				</div>
				<div class="col-md-3">
					<h2>Schedule Appointment</h2>
					<div class="panel panel-white">
                    <div class="panel-body">
                        <label>Select a ticket to schedule or re-schedule</label> 
						
							
						
								<div id="appointment" > 
									<?php echo $this->Form->create('Calendars',array('controller'=>'Calendars','action'=>'appointment')); ?> 

										<div class="row">                 
	                    				<div class="col-xs-12 col-sm-12">
										<div class="form-group">
	                   						<?php  echo $this->Form->select('Calendars.id',$Summary,array("escape"=>false,"type"=>"select",	"id"=>"get_data",'class'=>'form-control','name'=>'Appointment[id]')); ?>
							
										</div>
	                    				</div>
	                					</div>

	                					<div class="row">                 
	                    				<div class="col-xs-12 col-sm-12">
										<div class="form-group">
	                   						<?php echo $this->Form->input('Calendars.summary', array('div'=>false,'class'=>'form-control','placeholder' => "Subject",'label'=>'Subject','id'=>'summary','name'=>'Appointment[summary]','required'=>'required')); ?>
	                   						<?php echo $this->Form->input('Calendars.login_id', array('type'=>'hidden','class'=>'form-control','name'=>'Appointment[login_id]','value'=>$this->Session->read('Auth.User.id'))); ?>
										</div>
	                    				</div>
	                					</div>
	                					<div class="row">                 
	                    				<div class="col-xs-12 col-sm-12">
										<div class="form-group">
	                   						<?php echo $this->Form->input('Calendars.description', array('type'=>'textarea','class'=>'form-control','label'=>'Description','id'=>'description','name'=>'Appointment[description]')); ?>
										</div>
	                    				</div>  
	                					</div>
	                					<div class="row">                 
	                    				<div class="col-xs-12 col-sm-12">
										<div class="form-group">
	                   						<?php echo $this->Form->input('Calendars.type', array('options' => array('NULL' => '', 'In Shop' => 'In Shop','Onsite' => 'Onsite','Phone Call' => 'Phone Call'),'class'=>'form-control','label'=>'Appointment type','name'=>'Appointment[type]')); ?>
										</div>
	                    				</div>
	                					</div>
	                					<div class="row">                 
	                    				<div class="col-xs-12 col-sm-12">
										<div class="form-group">
	                   						<?php echo $this->Form->input('Calendars.address', array('div'=>false,'class'=>'form-control','placeholder'=>"Leave blank to autofill the address",'label'=>'Location','required'=>'required','id'=>'address','name'=>'Appointment[address]')); ?>
	                   						
										</div>
	                    				</div>
	                					</div>
										<div class="row">  
										<div class="col-xs-12 col-sm-12">
											<div class="form-group">
												<label>Appointment Starting Time</label>
						                    	<div class='input-group date' id="datetimepicker1" >
						                        <?php echo $this->Form->input('Calendars.start_at', array('class'=>'form-control','div'=>false, 'label'=>false,'name'=>'Appointment[start_at]','required'=>'required')); ?>
						                        	<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
						                    	</div>
                            				</div>
                						</div>
										</div>
										<div class="row">  
										<div class="col-xs-12 col-sm-12">
											<div class="form-group">
												<label>Appointment Ending Time</label>
                      							<div class='input-group date' id="datetimepicker2" >
                          						<?php echo $this->Form->input('Calendars.end_at', array('class'=>'form-control','div'=>false, 'label'=>false,'name'=>'Appointment[end_at]','required'=>'required')); ?>
                          							<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                      							</div>
											</div>
					                    </div>
										</div>
										<div class="row">  
											<div class="col-xs-12 col-sm-12">
												<div class="form-group">
												<label>Attendees</label>					
												<input type='hidden' name="Appointment[attendees]" id="attendees" value=""/>
												<select class="form-control select optional" >
													<option class="session_email1" selected="selected"></option>
												</select>			

  
					                    		</div>
					                    	</div>
																				
										</div>
										<div class="row">  
											<div class="col-xs-12 col-sm-12">
												<div class="form-group">
												<div id="session_id" style="display: none;"><?php echo $session_id = $this->Session->read('User_id');?>
												</div>
												
												<label>Appointment Owner</label><br>	
													<input type='hidden' name="Appointment[owner]" id="owner" value=""/>

													<select  class="select optional form-control" >
														<option class="session_email" selected="selected"></option>
													</select>
												</div>
					                    	</div>
										</div>
										
				  
										<div class="row">  
										<hr class="dotted">	
											
						                   	<div class="col-xs-12 col-sm-12">
											
											<div class="btn-group">
												<?php echo $this->Form->button("Create Appointment", array('class' => 'btn btn-success pull-left')); ?>
											</div>
											</div>
										</div>

										                		
				    					<?php echo $this->Form->end(); ?>
								</div>


					</div> 
                    </div>
                	</div>
				</div>
				</div>              	
			</div>
		</div>		
	</div>
</div>
 <?php $calendar_entry_color = $Entrycolor['User']['calendar_entry_color']; ?>

<script src="<?php echo $this->webroot.'js/jquery/jquery-1.9.1.min.js'?>"></script>
<link href="<?php echo $this->webroot.'Plugins/fullcalendar/fullcalendar.min.css'?>" rel="stylesheet" type="text/css"/>
<!-- <script src='http://fullcalendar.io/js/fullcalendar-2.1.1/lib/moment.min.js'></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<!-- <script src='http://fullcalendar.io/js/fullcalendar-2.1.1/lib/jquery.min.js'></script>
 -->
<!-- <script src='http://fullcalendar.io/js/fullcalendar-2.1.1/fullcalendar.min.js'></script> -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.1.1/fullcalendar.min.js'></script>

<script type="text/javascript">
	$(document).ready(function() {
        
    var date = new Date();
    var day = date.getDate();
    var month = date.getMonth();
    var year = date.getFullYear();
    
    $('#calendar').fullCalendar({
      
			header: {
				left: 'prev,next, today',
				center: 'title',
				right: 'month,agendaWeek,agendaDay'
			},
            editable: true,
            droppable: true, // this allows things to be dropped onto the calendar
			eventLimit: true, // allow "more" link when too many events
			events: [
			<?php foreach($Appointments as $App){  ?>	
				{
					color: '<?php if($calendar_entry_color!=''){ echo $calendar_entry_color;}else{ echo "green";}?>',
					title: '<?php  echo $App['Appointment']['summary'];?>',
					start: '<?php  echo $App['Appointment']['start_at'];?>',
					end: '<?php  echo $App['Appointment']['end_at'];?>',
					url: 'http://112.196.42.180/projects/repairshopsaas/repairshopsaas/Appointments/appointmentdetails/<?php echo $App['Appointment']['id'];?>'
				},
			<?php } ?>	
				
			]
		});

});
</script>

<script>
$(document).ready(function() {


var id=$('#session_id').text();

//alert(id);
		if(id!='')
		{
 			   $.ajax({
 			   type: "POST",
 			   url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/Tickets/email/",

 			  // url: "search.php",
 			   data: { id : id },
			
 			   success: function(data)
 			   {
  				  	//$(".ssss").html(jQuery(data).find('#result').html()); 
  				  	//$('.session_email').html(data);
  				  		$('.session_email').html(jQuery(data).find('.get_result').html()); 
  				        $('.session_email1').html(jQuery(data).find('.get_result1').html()); 
  						
  						var owner = jQuery(data).find('.get_result').html(); 
  						$('#owner').val(owner.trim()); 

  						var att = jQuery(data).find('.get_result1').html();
  						$('#attendees').val(att.trim()); 
  						$('.attendees').val(att.trim()); 
  						 
  						var email = jQuery(data).find('.get_result2').html();
  						$('#email').val(email.trim());
  						
  					
  			   }
  			  });
		}return false; 
		
});

$('#get_data').change(function() {
var app_id=$(this).val();
    if(app_id!='')
    {
        $.ajax({
        type: "POST",
        url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/Calendars/schedule/",
        data: { app_id : app_id},
        success: function(data)
        {
          	var name = jQuery(data).find('.app_summary').html(); 
  			$('#summary').val(name.trim()); 

  			var address = jQuery(data).find('.app_address').html();
  			$('#address').val(address.trim()); 

  			var description = jQuery(data).find('.app_description').html();
  			$('#description').val(description.trim()); 
  		}
        });
    }return false;    
});
</script>

<script type="text/javascript">

$(function() {
    $("#datetimepicker1").datetimepicker();
    $("#datetimepicker2").datetimepicker();
});


</script>