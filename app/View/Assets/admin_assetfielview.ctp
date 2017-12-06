<?php echo $this->Flash->render('positive'); ?>
<div class="warper container-fluid" style="margin-bottom: 10px;">
	
			<div class="row">  
				<div class="col-xs-3 col-sm-3">
				</div>
				<div class="col-xs-6 col-sm-6" style="margin-top:80px;">
					<div class="form-group">
						<h2>Custom Field for Asset</h2>
						<?php foreach($name as $nm){
         				echo $name = ucfirst($nm['Asset']['name']);
          				}?>
					</div>
				</div>
				<div class="col-xs-3 col-sm-3">
				</div>
			</div>
		
</div>	
			