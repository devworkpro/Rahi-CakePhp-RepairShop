<div class="result">
				<div class="row">                 
                    <div class="col-xs-12 col-sm-12">
						<div class="form-group">
						 <?php foreach($user as $users) {?>
						<div class="get_Div" style="cursor: pointer;">
							<?php echo $users['users']['first_name'];?>
							<?php echo $users['users']['last_name'];?>
							<?php echo $users['users']['business_name'];?>
							<?php echo $users['users']['email'];?>

						</div>
						<?php } ?>  
						</div>
					</div>
                 </div>  
<script type="text/javascript">
$(document).ready(function(){
	$(".get_Div").click(function(){
		var a=  $(this).text();
		//alert(a);
		var b= a.replace(/\s+/g, " ").trim();
		$("#get_data_customer").val(b);
		$(this).hide();
	});
	$(".get_Div").bind("mouseover", function(){
    
        var color  = $(this).css("background-color");
        $(this).css("background", "#D3D3D3");
        $(this).bind("mouseout", function(){
           $(this).css("background", color);
        });    
    });    
});
</script> 

</div>











                           