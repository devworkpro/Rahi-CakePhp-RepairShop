<div class="result">
				<div class="row">                 
                    <div class="col-xs-12 col-sm-12">
						<div class="form-group">
						 <?php foreach($user as $product) {
						 	//pr($product);
						 	?>
						<div class="get_result" style="cursor: pointer;">
							<?php echo $product['products']['product_name'];?>
							
						</div>
						<div class="get_price" style="display: none;">
							<?php echo $product['products']['price_retail'];?>
							
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
		$('#product_name').val(b);
		
		if(b!='')
	    {
	        $.ajax({
	        type: "POST",
	        url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/Contracts/productprice/",
	        // url: "search.php",
	        data: { b : b},
	      
	        success: function(data)
	        {
	        	$('#price').val(data);       
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