<div class="result">
				<div class="row">                 
                    <div class="col-xs-12 col-sm-12">
						<div class="form-group">
						 <?php foreach($user as $users) {?>
						<div class="get_result" style="cursor: pointer;">
							<?php echo $users['products']['product_name'];?>
							
						</div>
						<?php } ?>  
						</div>
					</div>
                 </div>  
<script type="text/javascript">
$(document).ready(function(){
	$('.get_result').click(function(){
		var a=  $(this).text();
		var b= a.replace(/\s+/g, " ").trim()
		$('#get_data').val(b);
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