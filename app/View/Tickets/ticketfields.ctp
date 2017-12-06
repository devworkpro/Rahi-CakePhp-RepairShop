<?php echo $this->Flash->render('positive'); ?>
<div class="warper container-fluid" style="margin-bottom: 50px;">
        	
<div class="row">  			
	<div class="col-xs-12 col-sm-1">
	</div>
	<div class="col-xs-12 col-sm-10">
		<div class="form-group">
			<h3><?php echo $this->Html->link('New Custom Field Type',array('controller' => 'Tickets', 'action' => 'fieldtype'));?> > 
				<?php foreach($name as $nm){
					$field_id = $nm['CustomField']['id'];
					echo ucfirst($nm['CustomField']['name']);
				}?> > Custom Field Type - Fields
			</h3>
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
			<?php echo $this->Html->link('New Field',array('controller' => 'Tickets', 'action' => 'newfield',$field_id),array('escape'=>false,'class'=>'btn btn-default'));?>
    	</div> 
    </div>


</div>



            
    <div class="row">
	    <div class="col-md-1">
	    </div>
        <div class="col-md-10">
        	
			<div class="panel panel-default" >
        		<div class="panel-heading clearfix">
            		<h4 class="panel-title"><i class="fa fa-gear"></i>          Fields</h4>            
          
        		</div>

        		<div class="panel-body">
            
            		<div class="table-responsive">
            		<table id="example1" class="display table" style="width: 100%; cellspacing: 0; ">
                	<thead>
		                <tr>    
		                        <th>Name</th>
		                        <th>Type</th>
		                        <th>Required</th>
		                        <th>Hidden</th>
		                        <th></th>
		                        <th></th>
		                        <th></th>
		                </tr>
                	</thead>
	                <tfoot>
	                    <tr>    
	                        	<th>Name</th>
		                        <th>Type</th>
		                        <th>Required</th>
		                        <th>Hidden</th>
		                        <th></th>
		                        <th></th>
		                        <th></th>
	                    </tr>
	                </tfoot>
	                <tbody >
	                		<?php $counter=0; ?>
	                        <?php foreach($CustomFieldType as $custom) { ?>
	                        <?php $row_id =  ++$counter; ?>
	                   		<?php $CustomFieldType_id = $custom['CustomFieldType']['id'];
	                   			  $custom_field_id = $custom['CustomFieldType']['custom_field_id'];
	                   		?>
	                             
	                    <tr>

							<td>
								<div class="name_<?php echo $row_id; ?>">
                             		<?php $name = $custom['CustomFieldType']['name'];?>
                             		<span id="<?php echo $row_id; ?>" class="name rec_<?php echo $row_id; ?> best_in_place"><?php echo $name;?>
                             		</span>
                             						
                             	</div>
                             	<div style="display:none;" class="name_edit_<?php echo $row_id;?>" id="<?php echo $row_id; ?>" >
                             		<form class="place" action="javascript:void(0);">
										<input type="text" name="name" id="name_<?php echo $row_id;?>" value="<?php echo $name;?>" class="form-control" required>
										<input type="hidden"  id="id_<?php echo $row_id;?>" value="<?php echo $custom['CustomFieldType']['id'];?>">
										<input class="submitname btn btn-success" type="button" value="Save" id="<?php echo $row_id; ?>">
										<input class="canclename btn btn-default" type="button" value="Cancel" id="<?php echo $row_id; ?>">
									</form>
								</div>
							</td>                 
	                        <td>
								<?php echo $custom['CustomFieldType']['field_type']?>
	                        </td>
	                        <td>
	                        	<?php $required = $custom['CustomFieldType']['required'];
	                        	if($required =='')
	                        	{
	                        		echo "false";
	                        	}else{
	                        		echo "true";
	                        	}

	                        	?>
	                        </td>
	                        <td>
	                        	<?php echo $hidden = $custom['CustomFieldType']['hidden'];?>
	                        	
	                        </td>
	                        <td>
	                        
	                        	<?php echo $this->Html->link('Edit',array('controller'=>'Tickets','action'=>'ticketfieldsedit',$CustomFieldType_id),array('escape'=>false));?>
	                        </td>
	                        <td>
	                        
	                        	<?php echo $this->Html->link('Delete',array('controller'=>'Tickets','action'=>'ticketfieldsdelete',$CustomFieldType_id,$custom_field_id),array('escape'=>false,'confirm' => 'Are you sure you want to delete this ticket type?'));?>
	                        </td>
	                        <td>
	                        	<span class="handle">
									<i class="fa fa-reorder"></i>
								</span>
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
		// alert(id);die();
		
		if(name!='')
		{
 			   $.ajax({
 			   type: "POST",
 			   url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/admin/Tickets/updateticketfieldtypename/",

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