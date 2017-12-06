<div class="result">
				<div class="row">                 
                    <div class="col-xs-12 col-sm-12">
						<div class="form-group">
						 <?php foreach($data as $pro) { ?>
						<div class="get_result" style="cursor: pointer;">
							<?php echo $pro['products']['product_name'];?>
						</div>
						<?php } ?>  
						</div>
					</div>
                 </div>  
<script type="text/javascript">
$(document).ready(function(){
	$('.get_result').click(function(){
		var a =  $(this).text();
		var b = a.replace(/\s+/g, " ").trim();
		$('#get_data').val(b);

		if(b!='')
	    {
	        $.ajax({
	        type: "POST",
	        url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/admin/Schedules/inventoryitem/",
	        // url: "search.php",
	        data: { b : b},
	      
	        success: function(data)
	        {
	        	var description = jQuery(data).find('.get_description').html();
	        	$("#description").val(description.trim());
	        	var cost = jQuery(data).find('.get_cost').html();
	        	$("#cost").val(cost.trim());
	        	var rate = jQuery(data).find('.get_retail').html();
	        	$("#rate").val(rate.trim());
	        	var upc = jQuery(data).find('.get_upc_code').html();
	        	$("#upc_code").val(upc.trim());
	        	var id = jQuery(data).find('.get_id').html();
	        	$("#product_id").val(id.trim());
	        }
	        
			
			});
	    }


		$(this).hide();
	});
});
</script> 
<script type="text/javascript">
    $(document).ready(function() {
        $('.get_result').bind("mouseover", function(){
            var color  = $(this).css("background-color");
            $(this).css("background", "#D3D3D3");
            $(this).bind("mouseout", function(){
                $(this).css("background", color);
            })    
        })    
    })
</script>

</div>