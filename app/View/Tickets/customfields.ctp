<?php echo $this->Flash->render('positive'); ?>
<div class="warper container-fluid" style="margin-bottom:50px;">
        	
<div class="row">  			
	<div class="col-xs-12 col-sm-1">
	</div>
	<div class="col-xs-12 col-sm-10">
		<div class="form-group">
			<h3>Ticket Custom Field Types</h3>
<p>Ticket types are like groups of custom fields. Think of them like you might have a Ticket Type for Computer Repair, and iPhone Repair. These types of jobs might work better with a totally different set of custom fields.</p>
<p>It might make sense for a lot of shops to just have one type, called 'Standard' and you won't have to select a type on the new ticket screen.</p>
		</div>
	</div>
	<div class="col-xs-12 col-sm-1">
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-sm-8">
	</div>
	<div class="col-xs-12 col-sm-4">
		<div class="form-group">
			<?php echo $this->Html->link('New Custom Field Type',array('controller' => 'Tickets', 'action' => 'fieldtype'),array('escape'=>false,'class'=>'btn btn-default'));?>
    	</div> 
    </div>


</div>



            
    <div class="row">
	    <div class="col-md-1">
	    </div>
        <div class="col-md-10">
        	
			<div class="panel panel-default" >
        		<div class="panel-heading clearfix">
            		<h4 class="panel-title"><i class="fa fa-gear"></i>      Custom Field Types</h4>            
          
        		</div>

        		<div class="panel-body">
            
            		<div class="table-responsive">
            		<table id="example1" class="display table">
                	<thead>
		                <tr>    
		                        <th>Name</th>
		                        <th>Manage</th>
		                        <th></th>
		                        
		                </tr>
                	</thead>
	                <tfoot>
	                    <tr>    
	                        	<th>Name</th>
		                        <th>Manage</th>
		                        <th></th> 
	                    </tr>
	                </tfoot>
	                <tbody>
	                	<?php $counter=0; ?>
	                    <?php foreach($CustomField as $custom) { ?>
	                    <?php $row_id =  ++$counter; ?>
	                    <?php $custom_field_id = $custom['CustomField']['id'];?>
	                    <tr>

							<td>
								<div class="name_<?php echo $row_id; ?>">
                             		<?php $name = $custom['CustomField']['name'];?>
                             		<span id="<?php echo $row_id; ?>" class="name rec_<?php echo $row_id; ?> best_in_place"><?php echo $name;?>
                             		</span>
                             						
                             	</div>
                             	<div style="display:none;" class="name_edit_<?php echo $row_id;?>" id="<?php echo $row_id; ?>" >
                             		<form class="place" action="javascript:void(0);">
										<input type="text" name="name" id="name_<?php echo $row_id;?>" value="<?php echo $name;?>" class="form-control" required>
										<input type="hidden"  id="id_<?php echo $row_id;?>" value="<?php echo $custom['CustomField']['id'];?>">
										<input class="submitname btn btn-success" type="button" value="Save" id="<?php echo $row_id; ?>">
										<input class="canclename btn btn-default" type="button" value="Cancel" id="<?php echo $row_id; ?>">
									</form>
								</div>
							</td>


	                        <td>
	                        	<?php echo $this->Html->link('Manage Fields',array('controller'=>'Tickets','action'=>'ticketfields',$custom_field_id),array('escape'=>false));?>
								
	                        </td>
	                        <td>
	                        	<?php echo $this->Html->link('Disable',array('controller'=>'Tickets','action'=>'disableticketfield',$custom_field_id),array('escape'=>false,'confirm' => 'Are you sure you want to disable this ticket type?'));?>
	                        	
	                        </td>
	                    </tr>  
	                    <?php }?>      
	                </tbody>
            		</table>  
           			</div>
        		</div>
    		</div>
		</div>
        <div class="col-md-1">
        </div>
	</div>
</div>

<script>
$(document).ready(function() {
  
$(".name").click(function(){
  id = $(this).attr('id');
$(".name_edit_"+id).show();
$(".name_"+id).hide();
});

    
$(".canclename").click(function(){
//var id = $(".cancle").closest("div").prop("id");
id = $(this).attr('id');
		//alert(id);
$(".name_edit_"+id).hide();
$(".name_"+id).show(); 
});   

$('.submitname').click(function(){
		row_id = $(this).attr('id');
		var name = $('#name_'+row_id).val();
		var id = $('#id_'+row_id).val();
		//alert(id);
		//alert(name);die();
		
		if(name!='')
		{
 			   $.ajax({
 			   type: "POST",
 			   url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/admin/Tickets/updateticketfieldname/",

 			   // url: "search.php",
 			   data: { name : name , id:id},
			
 			   success: function(data)
 			   {
  				 //window.location.reload();
  				//  $('#newDiv').html(jQuery(data).find('.result').html()); 
  				$(".name_edit_"+row_id).hide();
            	$(".name_"+row_id).empty();
            	$(".name_"+row_id).append(name);
            	$(".name_"+row_id).show();
  			  }
  			  });
		}return false;    

	});


});
</script>