<?php echo $this->Flash->render('positive'); 
	
$comment_history = '<div class="panel panel-default">
					<div class="panel-heading">Comment History</div>
					<div class="panel-body">
					<div class="row">  
					<div class="col-xs-12 col-sm-12">
						<div class="form-group">
						<table class="table table-striped table-bordered ticket-table">
						<thead>
		                <tr>    
		                  <th>Date</th>
		                  <th>Comment</th>
		              	</tr>
		                </thead><tbody>
					';
  				foreach($comment as $comm) 
				{?>
				<?php $status=$comm['Comment']['status'];
					$comment_history .='' ;
					 if($status!='private')
						{
							$comment_history .= '<tr style="background-color:#FFFF99;">
												<td>'.$comm['Comment']['subject'].'<br>'.$comm['Comment']['created_at'].'<br>'.$comm['Comment']['by']
												.'</td>
												<td>
												<p>'.$comm['Comment']['comment'].'</p>
												</td>
												</tr>' ;
						}
						else
						{
							$comment_history .= '<tr><td>'.
												$comm['Comment']['subject'].'<br>'
												.$comm['Comment']['created_at'].'<br>'
												.$comm['Comment']['by'].
												'</td>
												<td>
													<p>'.$comm['Comment']['comment'].
													'</p>
												</td></tr>' ;											
					    }
					   
                   	}
            $comment_history .= '</tbody></table>
											</div>
											</div>
									</div></div></div>';
?>
<?php
$every_ticket_assets = 	'<div class="panel panel-default">
						<div class="panel-heading">Assets</div>
						<div class="panel-body">
						<div class="row">  
						<div class="col-xs-12 col-sm-12">
						<div class="form-group">
						<table class="table table-striped table-bordered ticket-table">
						<thead>
		                <tr>    
		                  <th>Asset Name</th>
		                  <th>Asset Serial Number</th>
		                  <th>Type</th>
		                  <th>Properties</th>
		              	</tr>
		                </thead>
		                <tbody>';	
					 $counter=0;
					 foreach($AssetValue as $Asset) { 
					 $row_id = ++$counter; 
					 $asset_id = $Asset["asset_field_values"]["id"];
					 $user_id = $Asset["asset_field_values"]["user_id"];
					 $every_ticket_assets .= "<tr>
						                      <td>".$Asset['asset_field_values']['name']."
						                      </td>
						                      <td>".$Asset['asset_field_values']['serial_number']."
						                      </td>
						                      <td>".$Asset['asset_field_values']['type']."
						                      </td>
						                      <td>";
						                          //pr($property);
						                            if($Asset['asset_field_values']['properties']!='')
						                            {
						                              $json = json_decode($Asset['asset_field_values']['properties'], true);
						                              $count= count($json['name']);
						                              if($count==1)
						                              {
						                    $every_ticket_assets .='<p><b>'.$json['name'][1].': </b>'.$json['value'][1].'</p>';
						                              }
						                              else{
						                                for($i=1;$i<=$count;$i++)
						                                {         
						                    $every_ticket_assets .='<p><b>'.$json['name'][$i].': </b>'.$json['value'][$i].'</p>';
						                                } 
						                              }
						                              
						                            }
						                      "</td>
						                      
						                    </tr>";  
					}
$every_ticket_assets .=	'</tbody></table></div></div></div></div></div>';	


$every_ticket_custom_fields = '<div class="panel panel-default">
						<div class="panel-heading">Custom Fields</div>
						<div class="panel-body">
						<div class="row">  
						<div class="col-xs-12 col-sm-12">
						<div class="form-group">
						<table class="table table-striped table-bordered ticket-table">
		                <tbody>';
		                $count=1;
            					foreach($CustomFieldValue as $customfield)
            					{
	    $every_ticket_custom_fields .=	"<div class='row'>  
										<div class='col-xs-12 col-sm-12'>
										<b>Name ".$customfield['custom_field_values']['name'].":   </b>".$customfield['custom_field_values']['value'];"</div>
									</div>";
 							}
$every_ticket_custom_fields .=	'</tbody></table></div></div></div></div></div>';	

?>
<style type="text/css">
	pre {
    background-color: #f5f5f5;
    border: 1px solid #cccccc;
    border-radius: 4px;
    color: #333333;
    display: block;
    font-size: 13px;
    line-height: 1.42857;
    margin: 0 0 10px;
    padding: 9.5px;
    word-break: break-all;
    word-wrap: break-word;
    
}
</style>


<div class="warper container-uid" id="container-w" style="margin-bottom:50px;">
<?php foreach($Tickets as $Inv) {?>
<div class="page-header">
<div class="row">  			
	
	<div class="col-xs-12 col-sm-8">
		<div class="form-group">
			<h2>Ticket Details - <?php echo $Inv['title'];?></h2>
		</div>
	</div>

	<div class="col-xs-12 col-sm-4 ">
		<div class="form-group"><h4>
	      	<span class="btn-group">
	        <a class="btn btn-default btn-sm dropdown-toggle" href="#" data-toggle="dropdown">Actions<span class="caret"></span></a>
	        <ul class="dropdown-menu"><?php  $id=$Inv['id'];?>
	          <li><?php echo $this->Html->link('<p class="menu-default">Resolve</p>',array('controller'=>'Tickets','action'=>'TicketResolve',$id),array('escape'=>false));?></li>
	          <li><?php echo $this->Html->link('<p class="menu-default">Delete</p>',array('controller'=>'Tickets','action'=>'deleteTicket',$id),array('escape'=>false,'confirm' => 'Are you sure you wish to delete this Ticket?'));?></li>
	        </ul>
	      	</span>

	      	<span class="btn-group">
	        <a class="btn btn-default btn-sm dropdown-toggle" href="#" data-toggle="dropdown">PDF's<span class="caret"></span></a>
	        <ul class="dropdown-menu">
	          <li><?php echo $this->Html->link('<p class="menu-default">Intake Form</p>',array('controller'=>'Tickets','action'=>'#'),array('escape'=>false,'data-toggle'=>"modal", 'data-target'=>"#myModal_Intake_Form"));?></li>

	          <li><?php echo $this->Html->link('<p class="menu-default">Large Ticket</p>',array('controller'=>'Tickets','action'=>'#'),array('escape'=>false,'data-toggle'=>"modal", 'data-target'=>"#myModal_Large_Ticket"));?></li>

	          <li><?php echo $this->Html->link('<p class="menu-default">Ticket Receipt</p>',array('controller'=>'Tickets','action'=>'#'),array('escape'=>false,'data-toggle'=>"modal", 'data-target'=>"#myModal_Ticket_Receipt"));?></li>

	          <li><?php echo $this->Html->link('<p class="menu-default">Ticket Label</p>',array('controller'=>'Tickets','action'=>'#'),array('escape'=>false,'data-toggle'=>"modal", 'data-target'=>"#myModal_Ticket_Label"));?></li>

	          <li><?php echo $this->Html->link('<p class="menu-default">Customer Label</p>',array('controller'=>'Tickets','action'=>'#'),array('escape'=>false,'data-toggle'=>"modal", 'data-target'=>"#myModal_Customer_Label"));?></li>
	        </ul>
	      	</span>
      		</h4>
    	</div> 
    </div>


</div>
</div>
<?php } ?> 




<!-- Modal Pdf for myModal_Intake_Form -->

<div class="modal fade" id="myModal_Intake_Form" role="dialog">
    <div class="modal-dialog">
		<!-- Modal content-->
      	<div class="modal-content">

        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"></h4><div class="btn btn-default btn-sm" id="create_pdf">Save PDF</div>
        </div>

    		<div class="modal-body">
       		<div class="segment" id="pdfdiv1" >
     
     			<div class="divider"></div>
    
     			<form class="ui form">

    	      	<div class="two fields" style="margin-top:10px;">
		       	<div class="text-left" >
		       		<label for=""><?php echo $user['User']['first_name']." "; ?><?php echo $user['User']['last_name']; ?></label><br>
					<?php 
				 	if(empty($Location))
				    {
				    ?>			    
		        		<label for=""> <?php echo $user['User']['address'].'<br>'.$user['User']['city'].' '.$user['User']['state_country'].' '.$user['User']['zip']; ?></label>
				    <?php
					}
					else{
					?>
		        		<label for=""> <?php echo $Location['Multilocation']['address'].'<br>'.$Location['Multilocation']['city'].' '.$Location['Multilocation']['state_country'].' '.$Location['Multilocation']['zip']; ?></label>
					<?php
					}?>
		        
		       	</div>
		       	<div class="text-right" style="margin-top:-50px;">
		       
		        <label for=""><?php foreach($Tickets as $tic) {?>
					Ticket #&nbsp;&nbsp;&nbsp;&nbsp;<span> <?php echo ' '.$tic['id'];?></span><br>
					<?php } ?> </label><br>
		        <label for=""> <?php foreach($Tickets as $tic) {?>
					Ticket Date &nbsp;&nbsp;&nbsp;&nbsp;<span><?php echo date('D d-m-Y g:i A',strtotime($tic['created']));?></span><br>
					<?php } ?> </label><br>

				 <label for=""> <?php foreach($Tickets as $tic) {?>
					Subject &nbsp;&nbsp;&nbsp;&nbsp;<span><b> <?php echo ''.$tic['title'];?></b></span><br>
					<?php } ?> </label><br>
		              
		       	</div>
		      	</div>
      
      
     			<h4 class="ui top attached header">Custom Fields</h4>
		      	<div class="ui bottom attached segment">     
		       	<div class="panel-heading">Ticket Problem</div>
					<div class="panel-body" id="html_utho">

										<?php foreach($comment as $comm) {?>
											<?php $status=$comm['Comment']['status'];?>
										<div class="row">  
											<div class="col-xs-12 col-sm-12">
											<div class="form-group">
												
											<table class="table table-striped table-bordered ticket-table">
											<tbody>
											<?php if($status=='private')
											{?>
											<tr>
												<td style="background-color: #FFFF99;">
												<b>Comment Made At:</b>
													<?php echo $comm['Comment']['created_at']?>
												</td>
												<td style="background-color: #FFFF99;">
													<b>Update by:</b>
													<?php echo $comm['Comment']['by']?>
												</td>
												<td style="background-color: #FFFF99;">
													<b>Subject:</b>
													<?php echo $comm['Comment']['subject']?>
													<?php $comment_id=$comm['Comment']['id']?>
												</td>
												
											</tr>
											<tr>
												<td class="comment-body-13346644" style="background-color: #FFFF99;word-break: break-word;" colspan="4">
												<p><?php echo $comm['Comment']['comment']?></p>
												</td>
											</tr>
											<?php }
											else
												{?>
													<tr>
												<td>
												<b>Comment Made At:</b>
												<?php echo $comm['Comment']['created_at']?>
												</td>
												<td>
													<b>Update by:</b>
													<?php echo $comm['Comment']['by']?>
												</td>
												<td>
													<b>Subject:</b>
													<?php echo $comm['Comment']['subject']?>
													<?php $comment_id=$comm['Comment']['id']?>
													
												</td>
												
											</tr>
											<tr>
												<td class="comment-body-13346644" style="word-break: break-word;" colspan="4">
												<p><?php echo $comm['Comment']['comment']?></p>
												</td>
											</tr>
											<?php }?>
											</tbody>
											</table>
												
											</div>
											</div>


										</div>
                   						
										<?php }?>
					</div>
					
					<tr class="print-hide">
						<td colspan="3">
						<b style="font-size:20px;">Intake Form Disclaimer 	</b><br>
						<b style="font-size:10px;">Put some terms and conditions here 	</b><br>
						</td>
						
					</tr>
					</tbody>
		        </table>    
		       	</div>
      


				<div class="two fields" style="margin-top:100px;">
			        <div class="text-left" >
			        <label for=""> Signed : </label><label><hr></label>
			        
			        </div>
			        <div class="text-right" style="margin-top:-25px;">
			         	<label for=""> 
						Date </label>
					<label for=""> <?php foreach($Tickets as $tic) {?>
						<span><?php echo date('D d-m-Y g:i A',strtotime($tic['created']));?></span><br>
						<?php } ?> </label>
					</div>
				</div>
				</form>
     		</div>
       		</div>
		</div>
    </div>
</div>
  
<!-- Modal Pdf  for myModal_Intake_Form -->

<!-- Modal Pdf for myModal_Large_Ticket -->

<div class="modal fade" id="myModal_Large_Ticket" role="dialog">
    <div class="modal-dialog">
		<!-- Modal content-->
      	<div class="modal-content">

        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"></h4><div class="btn btn-default btn-sm" id="create_pdf1">Save PDF</div>
        </div>

    		<div class="modal-body">
       		<div class="segment" id="pdfdiv1" >
     
     			<div class="divider"></div>
    
     			<form class="ui form1">
     			
    	      	<div class="fields">
     			<?php if(!empty($tickettemplate))
				{
				  $template_data = $tickettemplate['Template']['ticket_template'];
				  
				  $find          = array('{{account_address}}','{{account_city}}', '{{account_state}}',' {{account_zip}}','{{account_phone}}','{{account_email}}','{{account_fullname}}','{{account_logo}}','{{customer_fullname}}','{{ticket_address}}','{{ticket_city}}','{{ticket_state}}','{{ticket_zip}}','{{ticket_number}}','{{ticket_date}}','{{ticket_subject}}','{{every_comment_history}}','{{every_assets}}','{{every_custom_fields}}','{{ticket_disclaimer_template}}');
				  //pr($Disclaimer);die();
				  
				  if(!empty($Login_user) AND !empty($Tickets) AND !empty($user) AND !empty($Disclaimer))
				  {
				    $first_name       = $Login_user['User']['first_name'];
				    $last_name        = $Login_user['User']['last_name'];
				    $account_fullname = $first_name.' '.$last_name;

				    $logo_name        = $Login_user['User']['logo'];
				    $logo_full_path   = $this->webroot.'img/logo/'.$logo_name;
				    $account_logo     = '<img src="'.$logo_full_path.'" alt="Cover"  width="100" height="100">';
				    if(empty($Location))
				    {
				    $account_address  = $Login_user['User']['address'];
				    $account_city     = $Login_user['User']['city'];
				    $account_state    = $Login_user['User']['state_country'];
				    $account_zip      = $Login_user['User']['zip'];
				    $account_phone    = $Login_user['User']['phone_number'];
				    $account_email    = $Login_user['User']['email'];
					}
					else{
					$account_address  = $Location['Multilocation']['address'];
				    $account_city     = $Location['Multilocation']['city'];
				    $account_state    = $Location['Multilocation']['state_country'];
				    $account_zip      = $Location['Multilocation']['zip'];
				    $account_phone    = $Location['Multilocation']['phone_number'];
				    $account_email    = $Location['Multilocation']['email'];
					}
				    $customer_fullname= $user['User']['first_name'].' '.$user['User']['last_name'];
				    $ticket_address   = $user['User']['address'];
				    $ticket_city      = $user['User']['city'];
				    $ticket_state     = $user['User']['state_country'];
				    $ticket_zip       = $user['User']['zip'];

				    $ticket_number    = $Tickets['Ticket']['id'];
				    $ticket_date      = date('D d-m-Y g:i A',strtotime($Tickets['Ticket']['created']));
				    $ticket_subject   = $Tickets['Ticket']['title'];

				    $ticket_disclaimer_template = $Disclaimer['Disclaimer']['ticket_disclaimer'];

				    $every_comment_history = $comment_history;

				    $every_assets = $every_ticket_assets;

				    $every_custom_fields = $every_ticket_custom_fields;
				    //$replace        = array($first_name,$logo,'state','zip');
				    $replace          = array($account_address,$account_city,$account_state,$account_zip,$account_phone,$account_email,$account_fullname,$account_logo,$customer_fullname,$ticket_address,$ticket_city,$ticket_state,$ticket_zip,$ticket_number,$ticket_date,$ticket_subject,$every_comment_history,$every_assets,$every_custom_fields,$ticket_disclaimer_template);
				    //pr($replace);die();
				    $result = str_replace($find,$replace,$template_data);
				  	echo $result;	
				  }
				}   
				?>
     			</div>
				</form>
     		</div>
       		</div>
		</div>
    </div>
</div>
  
<!-- Modal Pdf  for myModal_Large_Ticket  -->


<!-- Modal Pdf for myModal_Ticket_Receipt -->

<div class="modal fade" id="myModal_Ticket_Receipt" role="dialog">
    <div class="modal-dialog">
		<!-- Modal content-->
      	<div class="modal-content">

        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"></h4><div class="btn btn-default btn-sm" id="create_pdf2">Save PDF</div>
        </div>

    		<div class="modal-body">
       		<div class="segment" id="pdfdiv1" >
     
     			<div class="divider"></div>
    
     			<form class="ui form2">

    	      	<div class="two fields" style="margin-top:10px;">
    	      	<div class="text-center">
		     
		        <label for=""><?php foreach($Tickets as $tic) {?>
					<b style="font-size:50px;"><?php echo '#'.$tic['id'];?></b><br>
					<p style="margin-top:20px;"><?php echo date('D d-m-Y g:i A',strtotime($tic['created']));?></p>
					<?php } ?> </label><br>

		        
		       	</div>
		       	<div class="text-left" >
		     
		        <label for=""><?php echo $user['User']['first_name']." "; ?><?php echo $user['User']['last_name']; ?></label><br>
		        <label for=""> <?php echo $user['User']['address'].'<br>'.$user['User']['city'].'<br>'.$user['User']['state_country'].'<br>'.$user['User']['zip']; ?></label><br>
		        <label for=""><b style="font-size:25px;">Ticket Summary</b></label><br><br>
		        <label style="font-size:20px;"><?php foreach($Tickets as $tic) {?><?php echo $tic['title'];?>
					<?php } ?> </label><br>
				<label style="font-size:20px;">Approved: 
				<?php foreach($Tickets as $tic) {?><?php $app= $tic['approved'];
											if($app=="on"){
												echo "approved";
											}else {
												echo "not yet";
											}?>
					<?php } ?> </label><br>
				<label style="font-size:15px;">Issue Type:  
				<?php foreach($Tickets as $tic) {?><?php echo $tic['type'];}?></label><br>
		       	</div>
		       
		      	</div>
      
      		</form>
     		</div>
       		</div>
		</div>
    </div>
</div>
  
<!-- Modal Pdf for myModal_Ticket_Receipt -->

<!-- Modal Pdf for myModal_Ticket_Label -->

<div class="modal fade" id="myModal_Ticket_Label" role="dialog">
    <div class="modal-dialog">
		<!-- Modal content-->
      	<div class="modal-content">

        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"></h4><div class="btn btn-default btn-sm" id="create_pdf3">Save PDF</div>
        </div>

    		<div class="modal-body">
       		<div class="segment" id="pdfdiv1" >
     
     			<div class="divider"></div>
    
     			<form class="ui form3">

    	      	<div class="two fields" style="margin-top:10px;">
    	      	<div class="text-center">
		     
		        <label for=""><?php foreach($Tickets as $tic) {?>
					<b style="font-size:25px;"><?php echo '# '.$tic['id'];?></b><br>
					
					<?php } ?> </label><br>

		        
		       	</div>
		       	<div class="text-left" >
		     
		        <label for="" style="font-size:20px;"><?php foreach($Tickets as $tic) {?><?php echo $tic['type'];}?></label><br>
		        <label for="" style="font-size:20px;"><?php foreach($Tickets as $tic) {?><?php echo $tic['title'];}?></label><br>
		        
		       	</div>
		       	<div class="text-right" style="margin-right: 50px; margin-top:-55px; ">
		     
		        <label for=""><?php echo $user['User']['first_name']." "; ?><?php echo $user['User']['last_name']; ?></label><br>
		        <label for=""> <?php echo $user['User']['address'].'<br>'.$user['User']['city'].'<br>'.$user['User']['state_country'].'<br>'.$user['User']['zip']; ?></label><br>

		        <label for=""> <?php echo $user['User']['email'];?></label><br>
		        
		       	</div>

		       	<div class="text-center">
		     
		        <label for=""><?php echo $user_first_name.' - -';?> </label><br>

		        
		       	</div>
		       
		      	</div>
      
      			</form>
     		</div>
       		</div>
		</div>
    </div>
</div>
  
<!-- Modal Pdf  for myModal_Ticket_Label -->


<!-- Modal Pdf for myModal_Customer_Label -->

<div class="modal fade" id="myModal_Customer_Label" role="dialog">
    <div class="modal-dialog">
		<!-- Modal content-->
      	<div class="modal-content">

        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"></h4><div class="btn btn-default btn-sm" id="create_pdf4">Save PDF</div>
        </div>

    		<div class="modal-body">
       		<div class="segment" id="pdfdiv1" >
     
     			<div class="divider"></div>
    
     			<form class="ui form4">

    	      	<div class="two fields" style="margin-top:10px;">
    	      	<div class="text-center">
		     
		        <label for=""><b style="font-size:15px;"><?php echo $user_first_name;?></b></label><br><br>
		        <label for=""><?php echo $user['User']['first_name']." "; ?><?php echo $user['User']['last_name']." | ".$user['User']['phone_number']; ?></label><br>
		        <label for=""><?php echo $user['User']['email']; ?></label><br>
		        
		       	</div>
		       	
		       
		      	</div>
      
      			</form>
     		</div>
       		</div>
		</div>
    </div>
</div>
  
<!-- Modal Pdf  for myModal_Customer_Label -->




		<div class="panel panel-default">
            <div class="panel-body">
				<div class="row">  			
					<div class="col-xs-12 col-sm-4">
						<div class="form-group">
								
								<div class="panel panel-default" id="ticket_info">
									<div class="panel-heading"><i class="fa fa-tag"></i>Ticket Info     
									
									<?php echo $this->Html->link('<i class="fa fa-edit"></i>',array('controller'=>'Tickets','action'=>'ticketedit',$Tickets['Ticket']['id']),array('escape'=>false));?>

									</div>
            						<div class="panel-body">

            						  	<div class="row">  
											<div class="col-xs-12 col-sm-12">
											<div class="form-group">
											
											<div id="ticket_id" style="display:none;">
											<?php echo $ticket_id = $Tickets['Ticket']['id'];?>
											</div><br>
											<input type="hidden" id="get_ticket_id" value="<?php echo $Tickets['Ticket']['id'];?>">

											<b>Status: </b>

											<span class="status">
	                             				<?php $status = $Tickets['Ticket']['status']; ?>
	                             				<?php if($status!=''){
												?>
												
												<span class="status_edit best_in_place">
													<?php echo $status;?>
	                             				</span>
	                             				
												<?php
												}else
												{ 
												?>	
													<span class="status_edit best_in_place" style="color: #d3d3d3;border: medium none;font-style: italic;">
														<?php echo 'click to add';?>
	                             					</span>
	                             					
											<?php } ?>
	                            			
	                             			</span>

			                                <span style="display:none;" class="best_in_place status_form">
		                                      <form class="place" action="javascript:void(0);">
		                                        <select class="form-control status_select" >
		                                          <option>New</option>
		                                          <option>In Progress</option>
		                                          <option>Resolved</option>
		                                          <option>Invoices</option>
		                                          <option>Waiting for Parts</option>
		                                          <option>Waiting on Customers</option>
		                                          <option>Scheduled</option>
		                                          <option>Customer Reply</option>
		                                        </select>
		                                     		                                        
		                                      </form>
                                     		</span>  

											<br><br>



																					
											<b>Number:  </b><span><?php echo $tic['id'];?>
											</span><br><br>

											<b>Issue Type: </b>


											<span class="type">
	                             				<?php $type = $Tickets['Ticket']['type']; ?>
	                             				<?php if($type!=''){
												?>
												
												<span class="type_edit best_in_place">
													<?php echo $type;?>
	                             				</span>
	                             				
												<?php
												}else
												{ 
												?>	
													<span class="type_edit best_in_place" style="color: #d3d3d3;border: medium none;font-style: italic;">
														<?php echo 'click to add';?>
	                             					</span>
	                             					
											<?php } ?>
	                            			
	                             			</span>

			                                <span style="display:none;" class="best_in_place type_form">
		                                      <form class="place" action="javascript:void(0);">
		                                        
		                                     	<?php if(!empty($TicketCategory))
												{
													?>
												
													<select class="form-control type_select">
														<?php
														foreach ($TicketCategory as $key => $value) {
															if($value == $type){

															?><option value="<?php echo $value;?>" selected><?php echo $value;?></option><?php	
															}
															else{
															?><option value="<?php echo $value;?>" ><?php echo $value;?></option><?php	
															}
														}
														?>
													</select>
													<?php
												}else{	  ?>
												<select class="form-control type_select" >
		                                          <option> Virus </option>
		                                          <option>TuneUp</option>
		                                          <option>Software</option>
		                                          <option>Other</option>
		                                        </select>
		                                        <?php } ?>                                      
		                                      </form>
                                     		</span>  

											<br><br>
												
											<b>created:  </b><?php echo date('D d-m-Y g:i A',strtotime($Tickets['Ticket']['created']));?><br><br>
											
											


			                             
											<b>Contract: </b>
											<span class="contract">
			                                <?php
			                                	if(!empty($Contract))
			                                   	{
			                                   		$contract_name = $Contract['Contract']['contract_name'];
			                                   	?>
			                                   		<span class="contract_edit best_in_place">
														<?php echo $contract_name;?>
	                             					</span>
	                             				<?php
												} 
												else
			                                   	{
			                                   	?>	
													<span class="contract_edit best_in_place" style="color: #d3d3d3;border: medium none;font-style: italic;">
														<?php echo 'click to add';?>
	                             					</span>
	                             					
												<?php 
			                                   	}?>

			                                </span> 
	                             				
				                             
											<span style="display:none;" class="best_in_place contract_form">
			                                    <form class="place" action="javascript:void(0);">
			                                        <select class="form-control contract_select" >

			                                          	<?php foreach($ContractByUser as $con){ 
			                                          		$name=$con['Contract']['contract_name'];
			                                          		$id=$con['Contract']['id'];
			                                          	?>

														<option value='<?php echo $id;?>'>
														<?php echo $name;?> 
														</option> 
														<?php } ?>
			                                        </select>
			                                     		                                        
			                                    </form>
	                                     	</span> 
	                                     	<br><br>

	                                     	<b>SLA: </b>
											<span class="sla">
			                                <?php
			                                  	if(!empty($SlaById))
			                                   	{
		                                   			$sla_name = $SlaById['Sla']['name'];
		                                   	 		?>
														<span class="sla_edit best_in_place">
															<?php echo $sla_name;?>
	                             						</span>
	                             					<?php
	                             					
	                             				}
			                                   	else
			                                   	{
			                                   	?>	
													<span class="sla_edit best_in_place" style="color: #d3d3d3;border: medium none;font-style: italic;">
														<?php echo 'click to add';?>
	                             					</span>
	                             					
													<?php

			                                   	}?>

			                                </span> 
	                             				
				                             
											<span style="display:none;" class="best_in_place sla_form">
										
			                                    <form class="place" action="javascript:void(0);">
			                                        <select class="form-control sla_select" >

			                                          	<?php foreach($Sla as $key=>$sla){ 
			                                          		
			                                          	?>

														<option value='<?php echo $key;?>'>
														<?php echo $sla;?> 
														</option> 
														<?php } ?>
			                                        </select>
			                                     		                                        
			                                    </form>
	                                     	</span> 
	                                     	<br><br>


											<b>Pre-Approved: </b><?php $app= $tic['approved'];
											if($app=="on"){
												echo "APPROVED";
											}else {
												echo "NO";
											}?><br><br>

											<b>Creator: </b><?php echo $Tickets['Ticket']['creator'];?><br>
											
											

											</div>
                   							</div>
					
										</div>
	

									</div>
								</div>



						</div>
                    </div>


                    <div class="col-xs-12 col-sm-4">
						<div class="form-group">
							
								<div class="panel panel-default">
									<div class="panel-heading"><i class="fa fa-signal"></i>   Progress 
									</div>
            						<div class="panel-body">

										<div class="row">  
											<div class="col-xs-12 col-sm-12">
											<div class="form-group">
												<?php 	
													$approved    = $tic['approved'];
													$diagnosed   = $tic['diagnosed'];
													$invoice_id  = $tic['invoice_id'];
													$estimate_id = $tic['estimate_id'];
													$completed   = $tic['completed'];
												?>
											<?php	
											if($diagnosed=="on")
											{?><br>
												<div class="alert alert-success mvs">
												<b>1.<a class="tooltipper alert-success"  title="" data-placement="right" data-toggle="tooltip" href="#">Diagnostic:</a>
												</b>Yes
												</div>
											<?php }
											else
											{	?><br>						
												<div class="alert alert-danger mvs">
												<b>1.
												<a class="tooltipper alert-danger" data-original-title="Put a comment on the ticket with the subject Diagnosis to trigger this" title="" data-placement="right" data-toggle="tooltip" href="#">Diagnostic:</a>
												</b>No
												</div>
											<?php }	
											if($approved=="on")
											{?>

												<div class="alert alert-success mvs">
												<b>2.
												<a class="tooltipper alert-success" title="" data-placement="right" data-toggle="tooltip" href="#">Work Approved:</a>
												</b>
												Yes
												<span class="right mhs"> </span>
												</div>
											<?php }
											else
											{	
												?>
												<div class="alert alert-danger mvs">
												<b>2.
												<a class="tooltipper alert-danger" data-original-title="Check the approved box or put a comment on the ticket with the subject Approved to trigger this" title="" data-placement="right" data-toggle="tooltip" href="#">Work Approved:</a>
												</b>No
												<span class="right mhs"> </span>
												</div>
											<?php }	
											if($invoice_id!="")
											{?>

												<div class="alert alert-success mvs">
												<b>3.
												<a class="tooltipper alert-success" title="" data-placement="right" data-toggle="tooltip" href="#">Invoiced:</a>
												</b>Yes
												<span class="pull-right"><?php echo $this->Html->link($invoice_id,array('controller'=>'Invoices','action'=>'invoicedetails',$invoice_id),array('escape'=>false));?></span>
												</div>
											<?php }
												else
												{
												?>	
												<div class="alert alert-danger mvs">
												<b>3.
												<a class="tooltipper alert-danger" data-original-title="Click the Make Invoice button above to trigger this" title="" data-placement="right" data-toggle="tooltip" href="#">Invoiced:</a>
												</b>No
												</div>
											<?php }
											if($estimate_id!="")
											{?>

												<div class="alert alert-success mvs">
												<b>3.
												<a class="tooltipper alert-success" title="" data-placement="right" data-toggle="tooltip" href="#">Estimated:</a>
												</b>Yes
												<span class="pull-right"><?php echo $this->Html->link($estimate_id,array('controller'=>'Estimates','action'=>'estimatedetails',$user['User']['id'],$estimate_id),array('escape'=>false));?></span>
												</div>
											<?php }
												else
												{
												?>	
												<div class="alert alert-danger mvs">
												<b>3.
												<a class="tooltipper alert-danger" data-original-title="Click the Make Invoice button above to trigger this" title="" data-placement="right" data-toggle="tooltip" href="#">Estimated:</a>
												</b>No
												</div>
											<?php } 
											if ($completed=="on") {
												?>
												<div class="alert alert-success mvs">
												<b>4.
												<a class="tooltipper alert-success" title="" data-placement="right" data-toggle="tooltip" href="#">Work Completed:</a>
												</b>Yes
												</div>
											<?php }else{?>
												<div class="alert alert-danger mvs">
												<b>4.
												<a class="tooltipper alert-danger" data-original-title="Put a comment on the ticket with the subject Completed to trigger this" title="" data-placement="right" data-toggle="tooltip" href="#">Work Completed:</a>
												</b>No
												</div>
												
											<?php }?>


											</div>
											</div>


										</div>
                   						
					
									</div>
									</div>
							</div>
					</div>




                    <div class="col-xs-12 col-sm-4">
						<div class="form-group">
							
								<div class="panel panel-default">
									<div class="panel-heading"><i class="fa fa-user"></i>   Customer
									</div>
            						<div class="panel-body">

										<div class="panel-body">

										<div class="row">  
											<div class="col-xs-12 col-sm-12">
											<div class="form-group">
												<?php $user_id= $user['User']['id'];?>

												<b>Customer: </b> 
												<?php $customer_name = $user['User']['first_name'].' '.$user['User']['last_name'];
													echo $this->Html->link(ucfirst($customer_name),array('controller' => 'users', 'action' => 'userdetail',$user_id),array('escape'=>false,));?>	
												<br><br>
												
												<b>Email: </b><?php echo $user['User']['email']; ?><br><br>
												
												<b>Office: </b>
												<?php 
												if(!empty($phone)){
													foreach ($phone as $ph) {
														$phone_type	= $ph['Phone']['phone_type'];
														
														if($phone_type=='Office')
														{
															echo $ph['Phone']['phone_number'];
														}
													}
													
												}

												?><br><br>

												<b>Primary Address: </b>

												<?php 
													$address = $user['User']['address'].' '.$user['User']['city'].' '.$user['User']['state_country'].' '.$user['User']['zip'];
												?>
												<a target="_blank" href="https://maps.google.fr/maps?q=<?php echo $address;?>"> <?php echo ' '.$address;?>
		                            			</a><br><br>

												
												
												

												<strong>Ticket Address: </strong>

												<span class="address">
		                             				<?php $address = $Tickets['Ticket']['address']; ?>
		                             				<?php if($address!=''){
													?>
													
													<span class="address_edit best_in_place">
														<?php echo $address;?>
		                             				</span>
		                             				
													<?php
													}else
													{ 
													?>	
														<span class="address_edit best_in_place" style="color: #d3d3d3;border: medium none;font-style: italic;">
															<?php echo 'click to add';?>
		                             					</span>
		                             					
												<?php } ?>
	                            			
	                             				</span>
	                             				
				                                <span style="display:none;" class="best_in_place address_form">
			                                      <form class="place" action="javascript:void(0);">
			                                        <select class="form-control address_select" >

			                                          	<?php foreach($Address as $add){ 
			                                          		$name=$add['Address']['name'].' '.$add['Address']['type'].' '.$add['Address']['address'].' '.$add['Address']['city'];
			                                          	?>

														<option value='<?php echo $name;?>'>
														<?php echo $name;?> 
														</option> 
														<?php }?>
			                                        </select>
			                                     		                                        
			                                      </form>
	                                     		</span>  

												<br><br>
												
												<strong>SMS Service: </strong><?php $sms= $user['User']['sms_service'];
												if($sms==1){echo "Enabled";}else{ echo "Disabled";} ?>
												
											</div>
											</div>


										</div>
                   						</div>
					
									</div>
									</div>
							</div>
					</div>



				</div>
			
			<?php if(!empty($Appointment))
			{
			?>
			<div class="row">  
				<div class="col-xs-4 col-sm-4">
					<div class="form-group">
						<?php foreach($Appointment as $app) {?>
							<div class="panel panel-default">
								<div class="panel-heading"><i class="fa fa-calendar"></i>   Appointment Info
								</div>
        						<div class="panel-body">
									<div class="row">  
										<div class="col-xs-12 col-sm-12">
										<div class="form-group">
											<i class="fa fa-calendar"></i>
											<?php $app_id= $app['id'];?>
											<?php $owner= "Apt Owner: ".$app['owner'];?>
											<?php $start_at= "Appointment: ".date('D d-m-Y g:i A',strtotime($app['start_at']));?>


											<?php echo $this->Html->link($start_at,array('controller'=>'Appointments','action'=>'appointmentdetails',$app_id),array('data-toggle'=>'tooltip','data-placement'=>'top','title'=>$owner,'escape'=>false));?>

											 <?php echo $this->Html->link('<i class="btn-danger btn-xs pull-right fa fa-times"></i>',array('controller'=>'Appointments','action'=>'deleteAppointment',$app_id),array('escape'=>false,'confirm' => 'Are you sure you wish to delete this Appointment?'));?>

                    						<?php echo $this->Html->link('<i class="btn-warning btn-xs pull-right mrs fa fa-check-square-o"></i>',array('controller'=>'Appointments','action'=>'appointmentedit',$app_id),array('escape'=>false));?>

                   												
										</div>
										</div>


									</div>
               				<?php } ?> 			
				
								</div>
							</div>
					</div>
				</div>

				<div class="col-xs-8 col-sm-8">
					<div class="form-group">
					</div>
				</div>

			</div>
			<?php } ?>


			<div class="row">  
				<div class="col-xs-12 col-sm-12">
					<div class="form-group">
						<div class="panel panel-default">
							<div class="panel-heading"><i class="fa fa-book"></i>     Additional Information</div>
            				<div class="panel-body">
            					<hr class="dotted">
            					<a class="btn btn-default btn-sm pull-right" href="#fieldModal" role="button" data-toggle="modal">Edit Custom Fields</a>	<h4>Custom Fields </h4>
            					<?php $count=1;
            					foreach($CustomFieldValue as $customfield)
            					{
           						    $name = $customfield['custom_field_values']['name'];
           							$value = $customfield['custom_field_values']['value'];
           							?>
	           						<div class="row">  
										<div class="col-xs-12 col-sm-12">
										<b>Name <?php echo $name;?>:   </b>
										<?php  echo $value;?>
										</div>
									</div>

            					<?php }?>
            					

            					<hr class="dotted">
            					<!-- Modal Custom Fields -->
            					<div class="modal fade" id="fieldModal" role="dialog">
                          		<div class="modal-dialog">
                          
                            		<!-- Modal content-->
                            		<div class="modal-content">
		                              <div class="modal-header" style="height: 60px;">
		                                <button type="button" class="close" data-dismiss="modal">&times;</button>

		                               

		                                <div class="pull-left"><h4>Custom Fields </h4></div>
		                                <div class="pull-right">
		                                <?php echo $this->Html->link('Manage Custom Fields',array('controller' => 'Tickets', 'action' => 'customfields'),array('escape'=>false,'class'=>'btn btn-default pull-right', 'target'=>'_blank','style'=>"margin-right:20px; "));?>
		                                	
		                                </div>
		                                
		                                
		                              </div>
		                              
		                              <div class="modal-body">
		                                <label>Custom Field Type  </label> 
										 <?php echo $this->Form->create('Ticket',array('controller'=>'Tickets','action'=>'ticketeditbycustomfield')); ?>
											
											<?php  echo $this->Form->select('Ticket.custom_field_id',$CustomFieldName,array("escape"=>false,"type"=>"select",	"id"=>"CustomFieldName"," "=>" " ,'class'=>'form-control')); ?>

											
											<?php foreach($Tickets as $Inv) {?>
												<?php echo $this->Form->input('CustomFieldValue.tic_id', array('type'=>'hidden','class'=>'form-control ticketid','value'=>$Inv['id'])); ?>
											<?php }?>
											
											<div id="CustomFieldType_Data">
												<span id='loading' style="margin-left: 30px; margin-top: 30px;display: none;">
													<?php echo $this->Html->image('../images/reload.gif', array('width' => '20px'));?><br>
												</span>
											</div>

											<span id="CustomFieldTypeWithValue"><?php
									
				 $count=1; foreach($CustomFieldValue as $customfield) {
		if(!empty($customfield)){
		//pr($customfield);
			$custom_field_id = $customfield['custom_field_values']['custom_field_id'];
			$custom_field_type_id = $customfield['custom_field_values']['custom_field_type_id'];
			$name = $customfield['custom_field_values']['name'];
			$field_type = $customfield['custom_field_values']['field_type'];
			$value = $customfield['custom_field_values']['value'];
			$id = $customfield['custom_field_values']['id'];

			echo $this->Form->input('CustomFieldValue.tickettext', array('type'=>'hidden','class'=>'form-control','value'=>2,'name'=>'CustomFieldValue[tickettext]'));

			if($field_type=='text')
			{
			echo $this->Form->input('CustomFieldValue.value', array('type'=>$field_type,'class'=>'form-control','id'=>'get_data','label'=>$name,'name'=>'CustomFieldValue[value]['.$count.']','value'=>$value));

			echo $this->Form->input('CustomFieldValue.name', array('type'=>'hidden','class'=>'form-control','id'=>'get_data','name'=>'CustomFieldValue[name]['.$count.']','value'=>$name));

			echo $this->Form->input('CustomFieldValue.custom_field_type_id', array('type'=>'hidden','class'=>'form-control','value'=>$custom_field_type_id,'name'=>'CustomFieldValue[custom_field_type_id]['.$count.']'));

			echo $this->Form->input('CustomFieldValue.field_type', array('type'=>'hidden','class'=>'form-control','value'=>$field_type,'name'=>'CustomFieldValue[field_type]['.$count.']'));

			echo $this->Form->input('CustomFieldValue.custom_field_id', array('type'=>'hidden','class'=>'form-control','value'=>$custom_field_id ,'name'=>'CustomFieldValue[custom_field_id]['.$count.']'));
			echo $this->Form->input('CustomFieldValue.id', array('type'=>'hidden','class'=>'form-control','value'=>$id ,'name'=>'CustomFieldValue[id]['.$count.']'));
				
			
			$count++;
			}
			elseif($field_type=="date")
			{
				?>

				<label><?php echo $name?></label>
                   	<div class='input-group date' id="datetimepicker1" >
                  	<?php echo $this->Form->input('CustomFieldValue.name', array('class'=>'form-control date-picker','div'=>false, 'label'=>false,'name'=>'CustomFieldValue[value]['.$count.']','value'=>$value)); ?>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                   	</div>
                <?php
                echo $this->Form->input('CustomFieldValue.custom_field_type_id', array('type'=>'hidden','class'=>'form-control','value'=>$custom_field_type_id,'name'=>'CustomFieldValue[custom_field_type_id]['.$count.']'));

                echo $this->Form->input('CustomFieldValue.name', array('type'=>'hidden','class'=>'form-control','id'=>'get_data','name'=>'CustomFieldValue[name]['.$count.']','value'=>$name));

				echo $this->Form->input('CustomFieldValue.field_type', array('type'=>'hidden','class'=>'form-control','value'=>$field_type,'name'=>'CustomFieldValue[field_type]['.$count.']'));
			
				echo $this->Form->input('CustomFieldValue.custom_field_id', array('type'=>'hidden','class'=>'form-control','value'=>$custom_field_id ,'name'=>'CustomFieldValue[custom_field_id]['.$count.']'));
				echo $this->Form->input('CustomFieldValue.id', array('type'=>'hidden','class'=>'form-control','value'=>$id ,'name'=>'CustomFieldValue[id]['.$count.']'));
				
				
				
				$count++;
			}
			elseif($field_type=="checkbox")
			{
				?><input type="checkbox" name="CustomFieldValue[value][<?php echo $count;?>]"><label>&nbsp;<?php echo $name;?></label>
                <?php
                echo $this->Form->input('CustomFieldValue.custom_field_type_id', array('type'=>'hidden','class'=>'form-control','value'=>$custom_field_type_id,'name'=>'CustomFieldValue[custom_field_type_id]['.$count.']'));

                echo $this->Form->input('CustomFieldValue.name', array('type'=>'hidden','class'=>'form-control','id'=>'get_data','name'=>'CustomFieldValue[name]['.$count.']','value'=>$name));

				echo $this->Form->input('CustomFieldValue.field_type', array('type'=>'hidden','class'=>'form-control','value'=>$field_type,'name'=>'CustomFieldValue[field_type]['.$count.']'));
			
				echo $this->Form->input('CustomFieldValue.custom_field_id', array('type'=>'hidden','class'=>'form-control','value'=>$custom_field_id ,'name'=>'CustomFieldValue[custom_field_id]['.$count.']'));

				echo $this->Form->input('CustomFieldValue.id', array('type'=>'hidden','class'=>'form-control','value'=>$id ,'name'=>'CustomFieldValue[id]['.$count.']'));
				
				$count++;
			}
		}
	}




									?></span>
									
		                              </div>
		                              <div class="modal-footer">
		                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancle</button>

		                                <button type="sumbit" class="btn btn-success">Save</button>

		                              </div>
		                            <?php echo $this->Form->end(); ?>
                            		</div>
                            
                          		</div>
                          		</div>



                          		<!-- Assets Data -->
                          		<div class="row">  
									<div class="col-xs-12 col-sm-12">
									<h4>Assets for this Ticket</h4>
									
									<div class="table-responsive">
						              <table id="example" class="display table  table-hover table-bordered">
						                <thead>
						                <tr>    
						                  <th>Name</th>
						                  <th>Customer</th>
						                  <th>Contact</th>
						                  <th>Asset Serial Number</th>
						                  <th>Type</th>
						                  <th>Properties</th>
						                  <th></th>
						                </tr>
						                </thead>
						                <tbody>
						                    <?php $counter=0;?>
						                    <?php foreach($AssetValue as $Asset) { ?>
						                    <?php $row_id = ++$counter; ?>
						                    <?php $asset_id = $Asset['asset_field_values']['id'];
						                          $user_id = $Asset['asset_field_values']['user_id'];
						                    ?>
						                    <tr>
						                      <td>
						                          <?php $name = $Asset['asset_field_values']['name'];
													echo $this->Html->link($name,array('controller'=>'Assets','action'=>'assetdetails',$asset_id),array('escape'=>false));
												  ?>
						                      </td>
						                      <td>
						                          <?php echo $this->Html->link($Asset['users']['first_name'].' '.$Asset['users']['last_name'],array('controller' => 'users', 'action' => 'userdetail',$user_id));?>
						                      </td>
						                      <td>
						                          <?php echo "N/A"; ?>
						                      </td>
						                      <td>
						                          <?php echo $Asset['asset_field_values']['serial_number'];?>
						                      </td>
						                      <td>
						                          <?php echo $Asset['asset_field_values']['type'];?>
						                      </td>
						                      <td>
						                          <?php $property =$Asset['asset_field_values']['properties'];
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
						                              
						                            }?>
						                      </td>
						                      <td>
						                          <?php echo $this->Html->link('<i class="btn btn-default fa fa-check-square-o"></i>',array('controller'=>'Assets','action'=>'assetfieldvalueedit','?' => array('asset_id' => $asset_id)),array('escape'=>false));?>

						                      </td>
						                    </tr>  
						                  <?php }?>      
						                </tbody>
						              </table>  
						            </div>
									</div>
								</div>



							</div>
						</div>
					</div>
				</div>
			</div>








				

			<div class="row">  
				<div class="col-xs-12 col-sm-7">
					<div class="form-group">
						<div class="panel panel-default">
							<div class="panel-heading"><i class="fa fa-tag"></i> New Ticket Comment</div>
							<div class="panel-body">
							<div class="row">  
								<div class="col-xs-12 col-sm-12">
									<div class="form-group">
										<div class="panel-body">
															 
										<?php echo $this->Form->create('Comment',array('controller'=>'comments','action'=>'addcomment')); ?>
																			
										<div class="row">                 
										<div class="col-xs-12 col-sm-12">
										<div class="form-group">
											<?php echo $this->Form->input('Comment.to', array('class'=>'form-control','label'=>'To','required'=>'required','value'=>$user['User']['email'],'Disabled'=>'Disabled')); ?>
											<input type="hidden" name="Comment[to]" value=<?php echo $user['User']['email'];?> class="form-control"  >

											<input type='hidden' name="Comment[user_id]" class="form-control" value="<?php echo $user['User']['id'];  ?>"/>

											<input type='hidden' name="Comment[ticket_id]" class="form-control" value="<?php echo $ticket_id;  ?>"/>

											<input type='hidden' name="Comment[status]" class="form-control" value="public"/>


											<input type='hidden' name="Comment[by]" class="by form-control" value="<?php echo $user_first_name?>"/>
															   																    													    
										</div>
										</div>
										</div>

										<div class="row">                 
										<div class="col-xs-12 col-sm-12">
										<div class="form-group">
															
											<?php echo $this->Form->input('Comment.subject', array('options' => array('issue' => 'Issue', 'diagnosis' => 'Diagnosis','contacted' => 'Contacted','approval' => 'Approval','parts order' => 'Parts Order','parts arrival' => 'Parts Arrival','update' => 'Update','upgrade' => 'Upgrade','completed' => 'Completed','other' => 'Other'),'class'=>'form-control')); ?>
										</div>
										</div>
										</div>

										<div class="row">  
										<div class="col-xs-12 col-sm-12">
										<div class="form-group">
											<input type="checkbox" name="Comment[email]"><label>Don't Email</label>	<br>		

										</div>
                    					</div>
										</div>
														
										<div class="row">                 
										<div class="col-xs-12 col-sm-12">
										<div class="form-group">
											<?php echo $this->Form->input('Comment.comment', array('div'=>false,'type'=>'textarea','class'=>'form-control','label'=>"Body",'required'=>'required')); ?>
															    													    
										</div>
										</div>
										</div>
																	
										<div class="row">                 
										<div class="col-xs-12 col-sm-12">
											<hr class="dotted">	
										<div class="btn-group">
											<?php echo $this->Form->button('Send Ticket Update', array('class' => 'btn btn-success pull-right')); ?>
										</div>
										</div>
										</div>		
										<?php echo $this->Form->end(); ?>	
										</div>
									</div>
								</div>
							</div>
						</div>
						</div>
					</div>
				</div>
					
	


				<div class="col-xs-12 col-sm-5">
					<div class="form-group">
					<div class="panel panel-default">
						<div class="panel-heading"><i class="fa fa-tag"></i> Private Comment</div>
						<div class="panel-body">
						<div class="row">  
						<div class="col-xs-12 col-sm-12">
						<div class="form-group">
							<div class="panel-body">
															 
								<?php echo $this->Form->create('Comment',array('controller'=>'comments','action'=>'addcomment')); ?>							
							<div class="row">                 
							<div class="col-xs-12 col-sm-12">
								<div class="form-group">
								<div id="session_id" style="display:none;"><?php echo $session_id = $this->Session->read('User_id');?>
								</div>
								
													
								<?php echo $this->Form->input('Comment.to', array('div'=>false,'class'=>'form-control session_email2 to','label'=>'To','required'=>'required','Disabled'=>'Disabled','value'=>$email)); ?>
								<input type="hidden" name="Comment[to]" value=<?php echo $email;?> class="form-control to"  >

								<input type='hidden' name="Comment[user_id]" class="form-control" value="<?php echo $user['User']['id'];  ?>"/>

								<input type='hidden' name="Comment[ticket_id]" class="form-control" value="<?php echo $ticket_id;  ?>"/>

								<input type='hidden' name="Comment[status]" class="form-control" value="private"/>


								<input type='hidden' name="Comment[by]" class="by form-control" value="<?php echo $user_first_name;?>"/>   						
			    				</div>
							</div>
							</div>

							<div class="row">                 
							<div class="col-xs-12 col-sm-12">
							<div class="form-group">
								<?php echo $this->Form->input('Comment.subject', array('options' => array('issue' => 'Issue', 'diagnosis' => 'Diagnosis','contacted' => 'Contacted','approval' => 'Approval','parts order' => 'Parts Order','parts arrival' => 'Parts Arrival','update' => 'Update','upgrade' => 'Upgrade','completed' => 'Completed','other' => 'Other'),'class'=>'form-control')); ?>
							</div>
							</div>
							</div>

																										
							<div class="row">                 
							<div class="col-xs-12 col-sm-12">
							<div class="form-group">
								<?php echo $this->Form->input('Comment.comment', array('div'=>false,'type'=>'textarea','class'=>'form-control','id'=>'textbody', 'label'=>"Body",'required'=>'required')); ?>
															    													    
							</div>
							</div>
							</div>
																		
							<div class="row">                 
							<div class="col-xs-12 col-sm-12">
							<hr class="dotted">	
							<div class="btn-group">

								<?php echo $this->Form->button('Save Hidden Tech Comment', array('class' => 'btn btn-warning pull-right')); ?>
							</div>
							</div>
							</div>		
							<?php echo $this->Form->end(); ?>	
						</div>
						</div>
						</div>
						</div>
						</div>
					</div>
					</div>
				</div>

			</div>

			<div class="row">  
			<div class="col-xs-12 col-sm-12">
			<div class="form-group">
				<div class="panel panel-default">
				<div class="panel-heading"><i class="fa fa-tag"></i>   Ticket Comments
				</div>
            	<div class="panel-body">
					<?php foreach($comment as $comm) {?>
					<?php $status=$comm['Comment']['status'];?>
					<div class="row">  
					<div class="col-xs-12 col-sm-12">
					<div class="form-group">
												
						<table class="table table-striped table-bordered ticket-table">
						<tbody>
						<?php if($status=='private')
						{?>
						<tr>
							<td style="background-color: #FFFF99;">
							<b>Comment Made At:</b>
								<?php echo $comm['Comment']['created_at']?>
							</td>
							<td style="background-color: #FFFF99;">
								<b>Update by:</b>
								<?php echo $comm['Comment']['by']?>
							</td>
							<td style="background-color: #FFFF99;">
								<b>Subject:</b>
								<?php echo $comm['Comment']['subject']?>
								<?php $comment_id=$comm['Comment']['id']?>
							</td>
							<td style="background-color: #FFFF99;">
								<?php echo $this->Html->link('<i class="btn-danger btn btn-sm fa fa-times"></i>',array('controller'=>'Comments','action'=>'deletecomment',$comment_id,$ticket_id),array('escape'=>false,'confirm' => 'Are you sure you wish to delete this Comment?'));?>
								</a>
							</td>
						</tr>
						<tr>
							<td class="comment-body-13346644" style="background-color: #FFFF99;word-break: break-word;" colspan="4">
							<p><?php echo $comm['Comment']['comment']?></p>
							</td>
						</tr>
						<?php }
						else
							{?>
								<tr>
							<td>
							<b>Comment Made At:</b>
							<?php echo $comm['Comment']['created_at']?>
							</td>
							<td>
								<b>Update by:</b>
								<?php echo $comm['Comment']['by']?>
							</td>
							<td>
								<b>Subject:</b>
								<?php echo $comm['Comment']['subject']?>
								<?php $comment_id=$comm['Comment']['id']?>
								
							</td>
							<td>
								
								<?php echo $this->Html->link('<i class="btn-danger btn btn-sm fa fa-times"></i>',array('controller'=>'Comments','action'=>'deletecomment',$comment_id,$ticket_id),array('escape'=>false,'confirm' => 'Are you sure you wish to delete this Comment?'));?>
							</a>
							</td>
						</tr>
						<tr>
							<td class="comment-body-13346644" style="word-break: break-word;" colspan="4">
							<p><?php echo $comm['Comment']['comment']?></p>
							</td>
						</tr>
						<?php }?>
						</tbody>
						</table>
												
					</div>
					</div>
					</div>
                   	<?php }?>
				</div>
				</div>
			</div>
			</div>
			</div>

			<!-- Change History Panel -->
			<div class="row">  
			<div class="panel panel-default col-md-12">
			    <div class="panel-heading clearfix">
			        
			        <h4 class="panel-title"> <i class="fa fa-tags"></i>       Change History (admin only)&nbsp;&nbsp;   </h4>

			      
			    </div>
			    <div class="panel-body">
			    	<div class="table-responsive">
			        <table class="table table-hover table-bordered">
			            <thead>
			                <tr>
			                    <th>Date</th>
								<th>Employee</th>
								<th>Changes</th>
								
			                </tr>
			            </thead>
			            <tbody>
			            <?php foreach ($logs as $log) {
			            	
						?>
						<tr>
							<td style="vertical-align: middle;"><?php echo date('D d-m-Y g:i A',strtotime($log['Log']['created']));?></td>
							<td style="vertical-align: middle;"><?php echo $log['Log']['employee'];?></td>
							<td>
							<?php $property = $log['Log']['changes'];
		                       		
		                        if($property!='')
		                        {
		                           	$json = json_decode($property, true);
		                           	$edit = $log['Log']['edit'];
		                           
		                           	if($edit!="")
		                           	{
									   	echo '<p><b>customer_id to: </b>'.$Tickets['Ticket']['user_id'].'</p>';
									   	echo '<p><b>number to : </b>'.$Tickets['Ticket']['id'].'</p>';
									   	echo '<p><b>title to : </b>'.$json['Ticket']['title'].'</p>';
									   	echo '<p><b>status to : </b>'.$json['Ticket']['status'].'</p>';
									   	echo '<p><b>type to : </b>'.$json['Ticket']['type'].'</p>';
									   	echo '<p><b>date to : </b>'.date('D d-m-Y g:i A',strtotime($log['Log']['created'])).'</p>';
									   	
										
									}
									else
									{
										echo '<p><b>customer_id to: </b>'.$Tickets['Ticket']['user_id'].'</p>';
									   	echo '<p><b>number to : </b>'.$Tickets['Ticket']['id'].'</p>';
									   	echo '<p><b>title to : </b>'.$json['Ticket']['title'].'</p>';
									   	echo '<p><b>status to : </b>'.$json['Ticket']['status'].'</p>';
									   	echo '<p><b>type to : </b>'.$json['Ticket']['type'].'</p>';
									   	echo '<p><b>description to : </b>'.$json['Ticket']['description'].'</p>';
									   	echo '<p><b>date to : </b>'.date('D d-m-Y g:i A',strtotime($log['Log']['created'])).'</p>';								   
										
									}
		                       	}

		                       ?>

							</td>
							

							
						</tr>

						<?php }?>
			            </tbody>
			        </table>
			        </div>
			    </div>
			</div>
			</div>



		</div>
	</div>
</div>

<!-- Status Update -->

<script>
$(document).ready(function() {
  
$(".status").click(function(){
 
$(".status_form").show();
$(this).hide();

});

$('.status_form').focusout(function(){
		$(this).hide();
		$(".status").show();
	});

      
$('.status_select').change(function() {
var status=$(this).val();
var tic_id = document.getElementById('get_ticket_id').value; 
     //alert(status);alert(tic_id);die();
    if(status!='')
    {
	    $.ajax({
	    	type: "POST",
	     	url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/Tickets/statusupdate/",

	     	data: { status : status , tic_id:tic_id},
	  
		    success: function(data)
	     	{
		     	$(".status_form").hide();
		        $(".status_edit").empty();
		        $(".status_edit").append(status);
		        $(".status").show();
		      
	      	}
	    });
    }return false;    

  });


});

<!--// Type Update -->

$(document).ready(function() {
  
$(".type").click(function(){
 	$(".type_form").show();
	$(this).hide();
});

$('.type_form').focusout(function(){
		$(this).hide();
		$(".type").show();
});
    
$('.type_select').change(function() {
var type=$(this).val();
var tic_id = document.getElementById('get_ticket_id').value; 
//alert(tic_id); alert(type);die();
      
    if(type!='')
    {
        $.ajax({
	        type: "POST",
	        url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/Tickets/typeupdate/",
	        data: { type : type , tic_id:tic_id},
	      
	        success: function(data)
	        {
		       	$(".type_form").hide();
	            $(".type_edit").empty();
	            $(".type_edit").append(type);
	            $(".type").show();
	        }
        });
    }return false;    

  });


});



/*   Address Update   */

$(document).ready(function() {
  
$(".address").click(function(){
	$(".address_form").show();
	$(this).hide();
});
$('.address_form').focusout(function(){
		$(this).hide();
		$(".address").show();
});
    
$('.address_select').change(function() {
var address=$(this).val();
var tic_id = document.getElementById('get_ticket_id').value; 

//alert(tic_id); alert(address);die();
      
    if(address!='')
    {
         $.ajax({
         type: "POST",
         url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/Tickets/addressupdate/",

        // url: "search.php",
         data: { address : address , tic_id:tic_id},
      
         success: function(data)
         {

         	$(".address_form").hide();
            $(".address_edit").empty();
            $(".address_edit").append(address);
            $(".address").show();

          // window.location.reload();

          //  $('#newDiv').html(jQuery(data).find('.result').html()); 
          }
          });
    }return false;    

  });


});



/*   Contract Update   */

$(document).ready(function() {
  
$(".contract").click(function(){
	$(".contract_form").show();
	$(this).hide();
});
$('.contract_form').focusout(function(){
		$(this).hide();
		$(".contract").show();
});
    
$('.contract_select').change(function() {
var contract = $(this).val();
var contract_value = $(".contract_select option:selected").text();

var tic_id = document.getElementById('get_ticket_id').value; 

//alert(contract_value);alert(tic_id); alert(contract);die();
      
    if(contract!='')
    {
         $.ajax({
         type: "POST",
         url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/Tickets/contractupdate/",

        // url: "search.php",
         data: { contract : contract , tic_id:tic_id},
      
         success: function(data)
         {

         	$(".contract_form").hide();
            $(".contract_edit").empty();
            $(".contract_edit").append(contract_value);
            $(".contract").show();

          // window.location.reload();

          //  $('#newDiv').html(jQuery(data).find('.result').html()); 
          }
          });
    }return false;    

  });


});





/*   Sla Update   */

$(document).ready(function() {
  
$(".sla").click(function(){
	$(".sla_form").show();
	$(this).hide();
});
$('.sla_form').focusout(function(){
		$(this).hide();
		$(".sla").show();
});
    
$('.sla_select').change(function() {
var sla = $(this).val();
var sla_value = $(".sla_select option:selected").text();

var tic_id = document.getElementById('get_ticket_id').value; 

//alert(sla_value);alert(tic_id); alert(sla);die();
      
    if(sla!='')
    {
         $.ajax({
         type: "POST",
         url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/Tickets/slaupdate/",

        // url: "search.php",
         data: { sla : sla , tic_id:tic_id},
      
         success: function(data)
         {

         	$(".sla_form").hide();
            $(".sla_edit").empty();
            $(".sla_edit").append(sla_value);
            $(".sla").show();

          // window.location.reload();

          //  $('#newDiv').html(jQuery(data).find('.result').html()); 
          }
          });
    }return false;    

  });


});





/* TextBody */

$(document).ready(function(){
    var box = document.getElementById('textbody');

	document.getElementById('container-w').addEventListener('click', function (evt) {
    var target = evt.target;

    if (target.id === 'textbody') {
        box.style.backgroundColor = '#FFFF99';
    } else if (target.id === 'no') {
        box.style.backgroundColor = 'white';
    } else {
        box.style.backgroundColor = 'white';
    }
	}, false);

});
</script>

<style type="text/css">

.color {
    background-color: #FFFF99;
}

</style>



<!-- CustomFieldName -->
<!-- scripts -->

<script type="text/javascript">
$(document).ready(function(){

	$('#CustomFieldName').change(function(){
	 	var CustomFieldId = $(this).val();
	 		$('#loading').show();
			$.ajax({
       			type: 'POST',
      			url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/Tickets/customfieldtypemodel/",

     	   
       			data: { CustomFieldId: CustomFieldId },
     			success: function(data) {
     				$("#datetimepicker1").datetimepicker();
     				$("#CustomFieldTypeWithValue").hide();
     				$("#CustomFieldTypeWithValue :input").attr("disabled", true);
					$('#CustomFieldType_Data').html(jQuery(data).find('.result').html()); 
     				//   alert("Success: " + data);
				//	  $('#newDiv').html(data);    
					 

					
 		       }
   		});
	});
});
</script>




<script src="<?php echo $this->webroot.'js/jquery/jquery-1.9.1.min.js'?>"></script>
<script type="text/javascript">

$(function() {
    $("#datetimepicker1").datetimepicker();
    $("#datetimepicker2").datetimepicker();
});


</script>





<!-- PDF -->
<!-- scripts -->
<script src="<?php echo $this->webroot.'jspdf/html2canvas.min.js'?>"></script>
<script src="<?php echo $this->webroot.'jspdf/jspdf.min.js'?>"></script>
    <!-- <script type="text/javascript" src="//cdn.rawgit.com/MrRio/jsPDF/master/dist/jspdf.min.js"></script> 

    <script type="text/javascript" src="//cdn.rawgit.com/niklasvh/html2canvas/0.5.0-alpha2/dist/html2canvas.min.js"></script> -->




     <script type="text/javascript" >    (function(){
    var 
     form = $('.form'),
     cache_width = form.width(),
     a4  =[ 595.28,  841.89];  // for a4 size paper width and height
     
    $('#create_pdf').on('click',function(){
     $('body').scrollTop(0);
     createPDF();
     $('#myModal_Intake_Form').hide();


    });
    //create pdf
    function createPDF(){
     getCanvas().then(function(canvas){
      var 
      img = canvas.toDataURL("image/png"),
      doc = new jsPDF({
              unit:'px', 
              format:'a4'
            });     
            doc.addImage(img, 'JPEG', 20, 20);
            doc.save('Ticket details pdf.pdf');
            form.width(cache_width);
            location.reload();
     });
    }
     
    // create canvas object
    function getCanvas(){
     form.width((a4[0]*1.33333) -80).css('max-width','none');
     return html2canvas(form,{
         imageTimeout:2000,
         removeContainer:true
        }); 
    }
     
    }());</script>




     <script type="text/javascript" >    (function(){
    var 
     form = $('.form1'),
     cache_width = form.width(),
     a4  =[ 595.28,  990.89];  // for a4 size paper width and height
     //a4 = [595.28, 990.89];

var canvasImage,
    winHeight = a4[1],
    formHeight = form.height(),
    formWidth  = form.width();

var imagePieces = [];

    $('#create_pdf1').on('click',function(){
     $('body').scrollTop(0);
     createPDF();
     $('#myModal_Large_Ticket').hide();


    });
    //create pdf
    function createPDF(){
     getCanvas().then(function(canvas){
      var 
      img = canvas.toDataURL("image/png"),
      doc = new jsPDF({
              unit:'pt', 
              format:'a4'
            });     
            doc.addImage(img, 'JPEG', 20, 20);
            doc.save('Ticket details pdf.pdf');
            form.width(cache_width);
            location.reload();
     });
    }
     
    // create canvas object
    function getCanvas(){
     form.width((a4[0]*1.33333) -80).css('max-width','none');
     return html2canvas(form,{
         imageTimeout:2000,
         removeContainer:true
        }); 
    }
     
    }());</script>




     <script type="text/javascript" >    (function(){
    var 
     form = $('.form2'),
     cache_width = form.width(),
     a4  =[ 595.28,  841.89];  // for a4 size paper width and height
     
    $('#create_pdf2').on('click',function(){
     $('body').scrollTop(0);
     createPDF();
     $('#myModal_Ticket_Receipt').hide();


    });
    //create pdf
    function createPDF(){
     getCanvas().then(function(canvas){
      var 
      img = canvas.toDataURL("image/png"),
      doc = new jsPDF({
              unit:'px', 
              format:'a4'
            });     
            doc.addImage(img, 'JPEG', 20, 20);
            doc.save('Ticket details pdf.pdf');
            form.width(cache_width);
            location.reload();
     });
    }
     
    // create canvas object
    function getCanvas(){
     form.width((a4[0]*1.33333) -80).css('max-width','none');
     return html2canvas(form,{
         imageTimeout:2000,
         removeContainer:true
        }); 
    }
     
    }());</script>




     <script type="text/javascript" >    (function(){
    var 
     form = $('.form3'),
     cache_width = form.width(),
     a4  =[ 595.28,  841.89];  // for a4 size paper width and height
     
    $('#create_pdf3').on('click',function(){
     $('body').scrollTop(0);
     createPDF();
     $('#myModal_Ticket_Label').hide();


    });
    //create pdf
    function createPDF(){
     getCanvas().then(function(canvas){
      var 
      img = canvas.toDataURL("image/png"),
      doc = new jsPDF({
              unit:'px', 
              format:'a4'
            });     
            doc.addImage(img, 'JPEG', 20, 20);
            doc.save('Ticket details pdf.pdf');
            form.width(cache_width);
            location.reload();
     });
    }
     
    // create canvas object
    function getCanvas(){
     form.width((a4[0]*1.33333) -80).css('max-width','none');
     return html2canvas(form,{
         imageTimeout:2000,
         removeContainer:true
        }); 
    }
     
    }());</script>



     <script type="text/javascript" >    (function(){
    var 
     form = $('.form4'),
     cache_width = form.width(),
     a4  =[ 595.28,  841.89];  // for a4 size paper width and height
     
    $('#create_pdf4').on('click',function(){
     $('body').scrollTop(0);
     createPDF();
     $('#myModal_Customer_Label').hide();


    });
    //create pdf
    function createPDF(){
     getCanvas().then(function(canvas){
      var 
      img = canvas.toDataURL("image/png"),
      doc = new jsPDF({
              unit:'px', 
              format:'a4'
            });     
            doc.addImage(img, 'JPEG', 20, 20);
            doc.save('Ticket details pdf.pdf');
            form.width(cache_width);
            location.reload();
     });
    }
     
    // create canvas object
    function getCanvas(){
     form.width((a4[0]*1.33333) -80).css('max-width','none');
     return html2canvas(form,{
         imageTimeout:2000,
         removeContainer:true
        }); 
    }
     
    }());</script>

