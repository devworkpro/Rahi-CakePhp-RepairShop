<div class="result1">
				<div class="row">                 
                    <div class="col-xs-12 col-sm-12">
						<div class="form-group">
						 <?php foreach($user as $users) {?>
						<div class="getresult" style="cursor: pointer;">
							<?php echo $users['products']['product_name'];?>
							
						</div>
						<?php } ?>  
						</div>
					</div>
                </div>  
<script type="text/javascript">
$(document).ready(function(){
	$('.getresult').click(function(){
		//alert("dddd");
		var a=  $(this).text();
		var b= a.replace(/\s+/g, " ").trim()
		$('#product_name').val(b);
		$(this).hide();
	});
});
</script> 
<script type="text/javascript">
    $(document).ready(function() {
        $('.getresult').bind("mouseover", function(){
            var color  = $(this).css("background-color");
            $(this).css("background", "#D3D3D3");
            $(this).bind("mouseout", function(){
                $(this).css("background", color);
            })    
        })    
    })
</script>



</div>