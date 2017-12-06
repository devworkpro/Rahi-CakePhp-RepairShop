<div id="result">
             <?php foreach($email as $session_email) {?>
				<div class="get_result">
					<?php //print_r($session_email);
					echo $session_email['users']['first_name'];?>
					<?php echo $session_email['users']['email'];?>
				</div>
				<div class="get_result1">
					<?php //print_r($session_email);
					echo $session_email['users']['first_name'];?>
					
				</div>
				<div class="get_result2">
					<?php //print_r($session_email);
					echo $session_email['users']['email'];?>
					
				</div>
			<?php } ?>  
</div>