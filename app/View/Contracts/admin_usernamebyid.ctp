<div class="result">
				<div class="row">                 
                    <div class="col-xs-12 col-sm-12">
						<div class="form-group">
						
						<div class="get_result">
							<?php echo $user['User']['first_name'];?>
							<?php echo $user['User']['last_name'];?>
							<?php echo $user['User']['business_name'];?>
							<?php echo $user['User']['email'];?>
						</div>
						 
						</div>
					</div>
                 </div>  
<script type="text/javascript">
$(document).ready(function(){
	var a=  $('.get_result').text();
	var b= a.replace(/\s+/g, " ").trim()
	$('#get_data').val(b);
});
</script> 

</div>











                           