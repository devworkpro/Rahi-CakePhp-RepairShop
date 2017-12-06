<?php echo $this->Flash->render('positive'); ?>
<div class="warper container-fluid" style="margin-bottom: 50px;">
          
	<div class="row">       
	  <div class="col-xs-12 col-sm-1">
	  </div>
	  <div class="col-xs-12 col-sm-10">
	    <div class="form-group">
	      <h3><?php echo $this->Html->link('Assets',array('controller' => 'Assets', 'action' => 'customerassets'));?> > 
	        <?php
	        if(!empty($name))
	        {
	          $asset_id = $name['Asset']['id'];
	         echo $name = ucfirst($name['Asset']['name']);
	        }?>
	         > Asset Details
	      </h3>
	    </div>
	  </div>
	  <div class="col-xs-12 col-sm-1">
	  </div>
	</div>
	<div class="row">
		<div class="col-xs-1 col-sm-1">
		</div>
		<div class="col-xs-10 col-sm-10">
		   	<div class="panel panel-white">
	            <div class="panel-body">
	 				<div class="row">                 
						<div class="col-xs-12 col-sm-12">
							<div class="col-xs-6 col-sm-6">
							<?php 
							$count=0;
							foreach($Assets as $ass){
								$assetfieldvalueid = $ass['asset_field_values']['id'];
								echo '<h1>'.$ass['asset_field_values']['name'].'</h1>';
								$user_id = $ass['asset_field_values']['user_id'];
								//echo '<h3>'.'Customer :  '.$ass['users']['first_name'].' '.$ass['users']['last_name'].'</h3>';

								echo '<h3>'.'Customer :  '.$this->Html->link($ass['users']['first_name'].' '.$ass['users']['last_name'],array('controller' => 'users', 'action' => 'userdetail',$user_id)).'</h3>';

								echo '<h4>'.'Asset Serial Number:   '.$ass['asset_field_values']['serial_number'].'</h4>';
								 
								$property =$ass['asset_field_values']['properties'];
								//pr($property);
                                if($property!='')
                                {
								    $json = json_decode($property, true);
								   	$count= count($json['name']);
								   	if($count==1)
								   	{
								   		echo '<p><b>'.$json['name'][1].': </b>'.$json['value'][1].'</p>';
								   	}
								   	else{
								   		for($i=1;$i<=$count;$i++)
								   		{					
										echo '<p><b>'.$json['name'][$i].': </b>'.$json['value'][$i].'</p>';
								   		} 
								   	}
								   	
								}
							}?>

							</div>
							<div class="col-xs-6 col-sm-6">
								<?php echo $this->Html->link('Edit',array('controller'=>'Assets','action'=>'assetfieldvalueedit','?' => array('asset_id' => $assetfieldvalueid)),array('escape'=>false,'class'=>'btn btn-default pull-right'));?>
							</div>
						</div>
						
					</div>	


				</div>	
			</div>
		</div>
		<div class="col-xs-1 col-sm-1">
		</div>
	</div>

	<?php if(!empty($Ticket)) 
	{ ?>
	<div class="row">
		<div class="col-xs-1 col-sm-1">
		</div>
		<div class="col-xs-10 col-sm-10">
		   	<div class="panel panel-default" >
	          <div class="panel-heading clearfix">
	            <h4 class="panel-title">  Asset Log </h4>
	          </div>
	          <div class="panel-body">
	            <div class="table-responsive">
	              <table class="display table  table-hover table-bordered">
	                <thead>
	                <tr>    
	                  <th>Type</th>
	                  <th>Number</th>
	                  <th>Date</th>
	                  <th>Subject</th>
	                  <th>Initial Issue</th>
	                  
	                </tr>
	                </thead>
	                <tbody>
	                    <?php $counter=0;?>
	                    <?php foreach($Ticket as $ticket) { ?>
	                    <?php $row_id = ++$counter; ?>
	                    <?php $ticket_id = $ticket['id']; ?>
	                    <tr>
	                      <td>
	                          <?php echo "Ticket";?>
	                      </td>
	                      <td>
	                          <?php echo $this->Html->link($ticket_id,array('controller' => 'Tickets', 'action' => 'ticketdetails',$ticket_id));?>
	                      </td>
	                      <td>
	                          <?php echo date('D d-m-Y g:i A',strtotime($ticket['created']));?>
	                      </td>
	                      <td>
	                          <?php echo $ticket['title'];?>
	                      </td>
	                      <td>
	                          <?php echo $ticket['type'];?>
	                      </td>
	                      
	                    </tr>  
	                  <?php }?>      
	                </tbody>
	              </table>  
	            </div>
	          </div>
      		</div>
		</div>
		<div class="col-xs-1 col-sm-1">
		</div>
	</div>
	<?php }?>

</div>