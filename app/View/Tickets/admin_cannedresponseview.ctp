<div class="warper container-fluid" style="margin-bottom:50px;">            
    <div class="row" style="margin-top:50px;">
	    <div class="col-md-1">
	    </div>
        <div class="col-md-10">
        	<p>
				<b>Title:</b>
				<?php echo $CannedResponse['CannedResponse']['title'];?>
			</p>
			<p>
				<b>Body:</b>
				<?php echo $CannedResponse['CannedResponse']['body'];?>
			</p>
		</div>
        <div class="col-md-1">
        </div>
	</div>
	<div class="row" style="margin-top:50px;">
	    <div class="col-md-1">
	    </div>
        <div class="col-md-10">
        	<?php echo $this->Html->link('Edit',array('controller' => 'Tickets', 'action' => 'cannedresponseedit',$CannedResponse['CannedResponse']['id']),array('escape'=>false));?>|
        	<?php echo $this->Html->link('Back',array('controller' => 'Tickets', 'action' => 'cannedresponses'),array('escape'=>false));?>
		</div>
        <div class="col-md-1">
        </div>
	</div>
</div>
