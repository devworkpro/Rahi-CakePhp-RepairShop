<div class="warper container-fluid" style="margin-bottom:50px;">
        	
	<div class="row">  			
		<div class="col-xs-12 col-sm-1">
		</div>
		<div class="col-xs-12 col-sm-10">
			<div class="form-group">
				<h3>Canned Responses</h3>
				<p>(click the text to modify it)</p>
			</div>
		</div>
		<div class="col-xs-12 col-sm-1">
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12 col-sm-9">
		</div>
		<div class="col-xs-12 col-sm-3">
			<div class="form-group">
				<?php echo $this->Html->link('New Canned Response',array('controller' => 'Tickets', 'action' => 'addcannedresponse'),array('escape'=>false,'class'=>'btn btn-success'));?>
	    	</div> 
	    </div>
	</div>



            
    <div class="row">
	    <div class="col-md-1">
	    </div>
        <div class="col-md-10">
        	
			<div class="panel panel-white" >
        		<div class="panel-heading clearfix">
            		<h4 class="panel-title"></h4>            
           		</div>

        		<div class="panel-body">
            
            		<div class="table-responsive">
            		<table id="example1" class="display table">
                	<thead>
		                <tr>    
	                        <th>Title</th>
	                        <th>Body</th>
	                        <th></th>
		                </tr>
                	</thead>
	                
	                <tbody>
	                	<?php $counter=0; ?>
	                    <?php foreach($CannedResponse as $canned) { ?>
	                    <?php $row_id =  ++$counter; ?>
	                    <?php $canned_id = $canned['CannedResponse']['id'];?>
	                    <tr>

							<td>
								
								<div class="title_<?php echo $row_id; ?>">
                             		<?php $title = $canned['CannedResponse']['title'];?>
                             		<span id="<?php echo $row_id;?>" class="title title_edit_<?php echo $row_id; ?> best_in_place"><?php echo $title;?>
                             		</span>
                             		<?php echo $this->Html->link('Edit',array('controller'=>'Tickets','action'=>'cannedresponseedit',$canned_id),array('class'=>'btn btn-default','escape'=>false));?>				
                             	</div>
                             	<div style="display:none;" class="title_form_<?php echo $row_id;?>" id="<?php echo $row_id; ?>" >
                             		<form class="place" action="javascript:void(0);">
										<input type="text" name="title" id="title_<?php echo $row_id;?>" value="<?php echo $title;?>" class="form-control" required>
										<input type="hidden"  id="id_<?php echo $row_id;?>" value="<?php echo $canned_id;?>">
										<input class="submittitle btn btn-success" type="button" value="Save" id="<?php echo $row_id; ?>">
										<input class="cancletitle btn btn-default" type="button" value="Cancel" id="<?php echo $row_id; ?>">
									</form>
								</div>
							</td>

							<td>
	                        	<div class="body_<?php echo $row_id; ?>">
                             		<?php $body = $canned['CannedResponse']['body'];?>
                             		<pre1>
                             		<span id="<?php echo $row_id;?>" class="body body_edit_<?php echo $row_id; ?> best_in_place"><?php echo $body;?>
                             		</span>
                             		</pre1>				
                             	</div>
                             	<div style="display:none;" class="body_form_<?php echo $row_id;?>" id="<?php echo $row_id; ?>" >
                             		<pre1>
                             		<form class="place" action="javascript:void(0);">
										<input type="text" name="body" id="body_<?php echo $row_id;?>" value="<?php echo $body;?>" class="form-control" required>
										<input type="hidden"  id="id_<?php echo $row_id;?>" value="<?php echo $canned_id;?>">
										<input class="submitbody btn btn-success" type="button" value="Save" id="<?php echo $row_id; ?>">
										<input class="canclebody btn btn-default" type="button" value="Cancel" id="<?php echo $row_id; ?>">
									</form>
									</pre1>
								</div>
	                        	
	                        </td>

	                        <td>
	                        	<?php echo $this->Html->link('<i class="btn btn-danger fa fa-times"></i>',array('controller'=>'Tickets','action'=>'deletecannedresponse',$canned_id),array('escape'=>false,'confirm' => 'Are you sure?'));?>
	                        	
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


<!-- Update Canned Response Title   -->

<script>
$(document).ready(function() {
  
$(".title").click(function(){
  id = $(this).attr('id');
$(".title_form_"+id).show();
$(".title_edit_"+id).hide();
});

    
$(".cancletitle").click(function(){
//var id = $(".cancle").closest("div").prop("id");
id = $(this).attr('id');
		//alert(id);
$(".title_form_"+id).hide();
$(".title_edit_"+id).show(); 
});   

$('.submittitle').click(function(){
		row_id = $(this).attr('id');
		var title = $('#title_'+row_id).val();
		var id = $('#id_'+row_id).val();
		//alert(id);alert(title);die();
		
		if(title!='')
		{
 			   $.ajax({
 			   type: "POST",
 			   url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/admin/Tickets/updatecannedresponsetitle/",

 			   // url: "search.php",
 			   data: { title : title , id:id},
			
 			   success: function(data)
 			   {
  				$(".title_form_"+row_id).hide();
            	$(".title_edit_"+row_id).empty();
            	$(".title_edit_"+row_id).append(title);
            	$(".title_edit_"+row_id).show();
            	//$(".title_"+row_id).show();
  			  	}
  			  });
		}return false;    

	});


});
</script>



<!-- Update Canned Response Body   -->
<script>
$(document).ready(function() {
  
$(".body").click(function(){
  id = $(this).attr('id');
$(".body_form_"+id).show();
$(".body_"+id).hide();
});

    
$(".canclebody").click(function(){
//var id = $(".cancle").closest("div").prop("id");
id = $(this).attr('id');
		//alert(id);
$(".body_form_"+id).hide();
$(".body_"+id).show(); 
});   

$('.submitbody').click(function(){
		row_id = $(this).attr('id');
		var body = $('#body_'+row_id).val();
		var id = $('#id_'+row_id).val();
		//alert(id);alert(body);die();
		
		if(body!='')
		{
 			   $.ajax({
 			   type: "POST",
 			   url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/admin/Tickets/updatecannedresponsebody/",

 			   // url: "search.php",
 			   data: { body : body , id:id},
			
 			   success: function(data)
 			   {
  				 //window.location.reload();
  				//  $('#newDiv').html(jQuery(data).find('.result').html()); 
  				$(".body_form_"+row_id).hide();
            	$(".body_edit_"+row_id).empty();
            	$(".body_edit_"+row_id).append(body);
            	$(".body_"+row_id).show();
  			  }
  			  });
		}return false;    

	});


});
</script>