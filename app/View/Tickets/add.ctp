<?php echo $this->Flash->render('positive'); ?>
<div class="yolobar-container yolobar-slide-down">
  <div class="yolobar">
    <span class="btn" style="font-size: 18px; cursor: default;">Upgrade your account to unlock this feature!</span>
     <?php echo $this->Html->link('<i class="fa fa-bolt"></i> Upgrade Account!',array('controller'=>'Payments','action'=>'plans'),array('escape'=>false,'class'=>'btn btn-success btn-sm'));?>
      <span class="btn btn-link yolobar-close pull-right">
        <i class="fa fa-times"></i>
      </span>
  </div>
</div>
<?php
if(!empty($Package))
{
	if(!empty($PackageDateDiffernce))
	{
		?><div class="package_info" style="display: none;"><?php echo $PackageDateDiffernce;?></div>
		<?php
	}
}
?>
<?php
if(!empty($totalTicket_count))
{
	?>
	<div class="totalTicket_count" style="display: none;"><?php echo $totalTicket_count;?></div>
	<?php
}
?>
<div class="warper container-fluid">
        	
    <div class="page-header"><h1>New Ticket<span><?php echo $this->Html->link('<i class="fa fa-arrow-left"></i> Back',array('controller' => 'Tickets', 'action' => 'ticketlist'),array('escape'=>false,'class'=>'btn btn-default pull-right'));?></span></h1></div>
            
            
        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">
                
               <div class="panel panel-default">
                   <div class="panel-heading">New Ticket</div>
                   <div class="panel-body">
 
					<?php echo $this->Form->create('Ticket',array('controller'=>'Tickets','action'=>'add','class'=>'validator-form')); ?>
					<?php $a=$this->Session->read('Auth.User.email');?>
					
					<div class="row">                 
                    <div class="col-xs-12 col-sm-12">
						<div class="form-group"><br>
						<label>Enter the customer name (or enter a new customer to quickly create one)<label> 
						
						</div>
                    </div>
                	</div>
					          
				
					<div class="row">                 
	                    <div class="col-xs-12 col-sm-12">
							<div class="form-group">
							<label>Customer</label>
	                 		<?php echo $this->Form->input('Ticket.name', array('div'=>false,'class'=>'form-control','placeholder' => "Start typing the customer's name",'id'=>'get_data','required'=>'required')); ?>
	                 		<div id="result"></div>
							</div>
	                    </div>
	               </div>

				
					<div class="row">                 
						<div class="col-xs-12 col-sm-12">
						<hr class="dotted">	
							<div class="btn-group">
								<?php echo $this->Form->button('<i class="fa fa-plus"></i>Create Ticket', array('class' => 'btn btn-success pull-left')); ?>
							</div>
						</div>
					</div>		
					<?php echo $this->Form->end(); ?>	
					</div>
				
				</div>


			</div>
			<div class="col-md-2">
			</div>
		</div>
</div>

<script type="text/javascript">
$(document).ready(function(){
	$("#result").click(function(){
		$(this).hide();
	});
	$('#get_data').keyup(function(){

		var searchid = $(this).val();
		var dataString = searchid;
		//alert(dataString);
		$("#result").show();
		if(searchid!='')
		{
 			   $.ajax({
 			   type: "POST",
 			   url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/Tickets/ticket/",

 			  // url: "search.php",
 			   data: { search : dataString },
			
 			   success: function(data)
 			   {
  				  $("#result").html(jQuery(data).find('.result').html()); 
  				//  $('#newDiv').html(jQuery(data).find('.result').html()); 
  			  }
  			  });
		}return false;    

	});
});
</script>


<script type="text/javascript">
  $(document).ready(function() {
  		var datediff = $(".package_info").text();
  		var totalTicket_count = $(".totalTicket_count").text();
  		//alert(totalTicket_count);
  		if(datediff > 0)
  		{
  			
  		}
  		else{

  			if(totalTicket_count < 10)
  			{

  			}
  			else{
  				$('.yolobar-container').slideDown(1000);
		 		$('.warper').fadeOut(1700,function(){
	            	$('.warper').remove();
	        	}); 
  			}     
  		}
  		if(datediff == '')
	    {
	        if(totalTicket_count < 10)
	        {

	        }
	        else{ 
	          $('.yolobar-container').slideDown(1000);
	          $('.warper').fadeOut(1700,function(){
	                $('.warper').remove();
	            }); 

	        }
	    }

        $(".yolobar-close").click(function(){
          $('.yolobar-container').slideUp(1000);
        });

     });
</script>


