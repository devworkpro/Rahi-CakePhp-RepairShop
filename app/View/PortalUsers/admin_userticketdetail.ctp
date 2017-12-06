
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

<!-- Modal Pdf for Ticket Detail  -->

<div class="modal fade" id="myModalTicketDetail" role="dialog">
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
		     
		        <label for="">
		        <?php echo $user['User']['first_name']." ".$user['User']['last_name']; ?>		        	

		        </label><br>
		        <label for=""> <?php echo $user['User']['address'].'<br>'.$user['User']['city'].' '.$user['User']['state_country'].' '.$user['User']['zip']; ?></label>
		        
		       	</div>
		       	<div class="text-right" style="margin-top:-65px;">
		       
		        <label for="">
					Ticket #&nbsp;&nbsp;&nbsp;&nbsp;<span> <?php echo  $ticket['Ticket']['id'];?></span><br>
					 </label><br>
		        <label for=""> 
					Ticket Date &nbsp;&nbsp;&nbsp;&nbsp;<span><?php echo date('D d-m-Y g:i A',strtotime( $ticket['Ticket']['created']));?></span><br>
					 </label><br>

				 <label for="">
					Subject &nbsp;&nbsp;&nbsp;&nbsp;<span><b> <?php echo $ticket['Ticket']['title'];?></b></span><br>
					 </label><br>
		              
		       	</div>
		      	</div><br>
      
      
     			<h4 class="ui top attached header">Comment History</h4>
		      	<div class="ui bottom attached segment">     
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
			                </thead>
							<tbody>

							<?php foreach($comment as $comm) {?>
							<?php $status=$comm['Comment']['status'];?>

							<?php if($status=='private')
							{?>
							
							<?php }
							else
								{?>
							<tr>
								<td>
									<?php echo $comm['Comment']['by'];?><br>
									<?php echo date('D d-m-Y g:i A',strtotime($comm['Comment']['created_at']));?><br>
									<?php echo $comm['Comment']['subject'];?>
									
								</td>
								
								<td class="comment-body-13346644">
									<p><?php echo $comm['Comment']['comment'];?></p>
								</td>
							</tr>
							<?php }?>
							
   						
							<?php }?>
							</tbody>
							</table>
								
							</div>
							</div>


						</div>
					</div>
							          
		       	</div>



		       	<h4 class="ui top attached header">Assets</h4>
		      	<div class="ui bottom attached segment">     
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
							<tbody>

							<?php foreach($AssetValue as $Asset) {?>
							
							<tr>
								<td>
		                          	<?php echo $Asset['AssetFieldValue']['name'];?>
		                      	</td>
								
								<td>
		                        	<?php echo $Asset['AssetFieldValue']['serial_number'];?>
		                     	</td>
		                      	<td>
		                          	<?php echo $Asset['AssetFieldValue']['type'];?>
		                      	</td>
		                     	<td>
		                          	<?php $property =$Asset['AssetFieldValue']['properties'];
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
							</tr>
							
							<?php }?>
							</tbody>
							</table>
								
							</div>
							</div>


						</div>

						<div class="row">  
							<div class="col-xs-12 col-sm-12">
							<div class="form-group">
								
							<table class="table table-striped table-bordered ticket-table">
							
							<thead>
			                <tr>    
			                  <th>Custom Fields</th>
			                  
			                </tr>
			                </thead>
							<tbody>

							<?php $count=1;
            					foreach($CustomFieldValue as $customfield)
            					{
           						    $name = $customfield['CustomFieldValue']['name'];
           							$value = $customfield['CustomFieldValue']['value'];
           							?>
           							<tr>
	           							<td>
		           						<div class="row">  
											<div class="col-xs-12 col-sm-12">
											<b>Name <?php echo $name;?>:   </b>
											<?php  echo $value;?>
											</div>
										</div>
										</td>
									</tr>
            					<?php }?>
							</tbody>
							</table>
								
							</div>
							</div>


						</div>



					</div>
		          	

		          	<tr class="print-hide">
						<td colspan="3">
						<b style="font-size:20px;">Disclaimer</b><br>
						</td>
						
					</tr>

		       	</div>

		       	</form>
     		</div>
       		</div>
		</div>
    </div>
</div>


<div class="row">           
  	<div class="col-lg-1 col-md-1">
  	</div>
  	<div class="col-lg-10 col-md-10">
	<div class="warper container-uid" id="container-w" style="margin-bottom:50px;margin-top:60px;">
		<?php echo $this->Flash->render('positive'); ?>
		<div class="page-header">
		<div class="row">  			
			
			<div class="col-xs-12 col-sm-8">
				<div class="form-group">
					<h2>Ticket Details - <?php echo $ticket['Ticket']['title'];?></h2>
				</div>
			</div>

			<div class="col-xs-12 col-sm-4 ">
				<div class="form-group pull-right" style="margin-top: 15px;" >
					<a href="#myModalTicketDetail" class="btn btn-default" data-toggle="modal"> PDF </a>
					<?php echo $this->Html->link('Back',array('controller' => 'PortalUsers', 'action' => 'myprofile'),array('escape'=>false,'class'=>'btn btn-default'));?>
					
		    	</div> 
		    </div>


		</div>
		</div>


		<div class="row">  		

			<div class="col-xs-12 col-sm-4">
				<div class="form-group">
						
					<div class="panel panel-default" id="ticket_info">
						<div class="panel-heading"><i class="fa fa-tag"></i>Ticket Info
						</div>
						<div class="panel-body">

						  	<div class="row">  
								<div class="col-xs-12 col-sm-12">
								<div class="form-group">
								
								<div id="ticket_id" style="display:none;">
								<?php echo $ticket_id = $ticket['Ticket']['id'];?>
								</div><br>
								<input type="hidden" id="get_ticket_id" value="<?php echo $ticket['Ticket']['id'];?>">

								<b>Status: </b>
                     			<?php echo $status = $ticket['Ticket']['status']; ?>
                     			<br><br>
																		
								<b>Number:  </b><?php echo $ticket['Ticket']['id'];?>
								<br><br>

								<b>Issue Type: </b>
                     				<?php echo $type = $ticket['Ticket']['type']; ?>
                     				
								<br><br>
									
								<b>created:  </b><?php echo date('D d-m-Y g:i A',strtotime($ticket['Ticket']['created']));?><br><br>
								
								<b>Pre-Approved: </b><?php $app= $ticket['Ticket']['approved'];
								if($app=="on"){
									echo "APPROVED";
								}else {
									echo "NO";
								}?><br><br>
							

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
								<?php 	$approved=$ticket['Ticket']['approved'];
										$diagnosed=$ticket['Ticket']['diagnosed'];
									 	$invoiced=$ticket['Ticket']['invoiced'];
										$completed=$ticket['Ticket']['completed'];
								?>
								<br>
								<b>1.Diagnostic:</b>
								<?php	
								if($diagnosed=="on")
								{ echo "Yes";} else { echo "No"; }
								?><br><br>
								<b>2.Work Approved:</b>
								<?php
								if($approved=="on")
								{ echo "Yes"; } else { echo "No"; }
								?><br><br>
								<b>3.Invoiced:</b>
								<?php 
								if($invoiced=="on")
								{ echo "Yes"; }else{ echo "No"; }
								?><br><br>
								<b>4.Work Completed:
								</b>
								<?php
								if ($completed=="on") 
								{ echo "yes"; }else{ echo "No"; }
								?>
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
									<?php echo $customer_name = $user['User']['first_name'].' '.$user['User']['last_name'];
									?>
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
										echo $address = $user['User']['address'].' '.$user['User']['city'].' '.$user['User']['state_country'].' '.$user['User']['zip'];
									?>
									<br><br>

									<strong>Ticket Address: </strong>

                         				<?php echo $address = $ticket['Ticket']['address']; ?>
									<br><br>
									
									
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
						<div class="panel-heading"><i class="fa fa-book"></i>     Additional Information</div>
        				<div class="panel-body">
        					<!-- Attachments  -->
        				<?php if(!empty($attachment)){
        				?>	
						<h4>Attachments</h4>
					 	
					    	<div class="table-responsive">
					        <table class="table table-hover table-bordered">
					            <thead>
					                <tr>
					                    <th>Created</th>
										<th>File</th>
										<th>Private/Public</th>
										
					                </tr>
					            </thead>
					            <tbody>
									<?php $path = "attachment/";	?> 
									<?php foreach($attachment as $att) {
										$file_name= $att['Attachment']['file'];
										$img = "$path"."$file_name";
									?>
									<tr>
										<td>
										<?php $att_id= $att['Attachment']['id'];?>
										<?php echo $start_at= date('D d-m-Y g:i A',strtotime($att['Attachment']['created']));?>
										</td>
										<td>
											<?php echo $this->Html->image($img, array('alt' => 'Image','width'=>'80px','height'=>'60px',"style"=>"border:2px solid #CCCCCC")); ?>
										
											<a target="_blank" href="http://112.196.42.180/projects/repairshopsaas/repairshopsaas/img/attachment/<?php echo $file_name;?>"><?php echo $file_name= $att['Attachment']['file'];?></a>
													
													
										</td>
										<td><?php echo $att['Attachment']['status'];?></td>
										
									</tr>
									<?php } ?> 			
								</tbody>
					            
					        </table>

					       	</div>
					    <?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>



		<div class="row">
			<div class="col-xs-12">
			<div class="form-group">
				<a href="#myAttachmentModal" class="btn btn-default" data-toggle="modal"> Attach File </a>
			</div>
			</div>
		</div>



		<!-- myAttachment Modal -->   
		<div class="modal fade" id="myAttachmentModal" role="dialog">
			<div class="modal-dialog">
			<!-- Modal content-->
				<div class="modal-content">
				<div class="modal-header">
				    <button type="button" class="close" data-dismiss="modal">&times;</button>
				    <h4 class="modal-title">Upload File</h4>
				</div>
				<div class="modal-body">
				
				<div id="main-wrapper" class="container">
				

	            <?php echo $this->Form->create('PortalUsers',array('controller'=>'PortalUsers','action'=>'attachment','class'=>'validator-form','enctype' => 'multipart/form-data')); ?>

	            
	                
	            <div class="row">  
	                   
	            <div class="col-xs-12 col-sm-12">
					<div class="input-group">
							
							<span class="col-xs-5 col-sm-5">
					
							<label>Select one file:</label>&nbsp;&nbsp;&nbsp;
							</span>
							<span class="col-xs-1 col-sm-1"></span>

							<span class="btn btn-primary col-xs-6 col-sm-6">
	                   		
	                   		
	                    		<?php echo $this->Form->input('attachment.file', array('type'=>'file','class'=>'form-control','label'=>'Choose File','required'=>'required','style'=>"display: none;")); ?> 

	                    		<?php echo $this->Form->input('attachment.ticket_id', array('type'=>'hidden','class'=>'form-control','value'=>$ticket_id)); ?>


								<?php echo $this->Form->input('attachment.status', array('type'=>'hidden','class'=>'form-control','value'=>'Private')); ?>	
	                    		
	                    	</span>&nbsp;&nbsp;&nbsp;

	                    	<span class="col-xs-12 col-sm-12"></span>
	                    	<span class="col-xs-12 col-sm-12" style="padding-right: 0;">
	                    	<?php echo $this->Form->submit('Upload', array('class' => 'btn btn-success pull-right')); ?>
	                    	</span>
	                </div>
	            	
				</div>
				  
				
				<?php echo $this->Form->end(); ?> 



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
						<div class="panel-heading"><i class="fa fa-tag"></i> New Ticket Comment</div>
						<div class="panel-body">
						<div class="row">  
							<div class="col-xs-12 col-sm-12">
								<div class="form-group">
									<div class="panel-body">
														 
									<?php echo $this->Form->create('Comment',array('controller'=>'comments','action'=>'adduserticketcomment')); ?>
																		
									<div class="row">                 
									<div class="col-xs-12 col-sm-12">
									<div class="form-group">

										
										<input type="hidden" name="Comment[to]" value=<?php echo $user['User']['email'];?> class="form-control"  >

										<input type='hidden' name="Comment[user_id]" class="form-control" value="<?php echo $user['User']['id'];  ?>"/>

										<input type='hidden' name="Comment[ticket_id]" class="form-control" value="<?php echo $ticket_id;  ?>"/>

										<input type='hidden' name="Comment[status]" class="form-control" value="public"/>


										<input type='hidden' name="Comment[by]" class="by form-control" value="<?php echo $customer_name?>"/>

										<input type='hidden' name="Comment[subject]" class="by form-control" value="Customer Reply"/>
														   																    													    
									</div>
									</div>
									</div>
													
									<div class="row">                 
									<div class="col-xs-12 col-sm-12">
									<div class="form-group">
										<?php echo $this->Form->input('Comment.comment', array('div'=>false,'type'=>'textarea','class'=>'form-control','label'=>"Message",'required'=>'required')); ?>
														    													    
									</div>
									</div>
									</div>
																
									<div class="row">                 
									<div class="col-xs-12 col-sm-12">
										<hr class="dotted">	
									<div class="btn-group">
										<?php echo $this->Form->button('Add Note to Ticket', array('class' => 'btn btn-success pull-right')); ?>
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
			</div>
		</div>
		</div>
		</div>



	</div>
	</div>
	<div class="col-lg-1 col-md-1">
	</div>
</div>



<!-- PDF -->
<!-- scripts -->
    <script type="text/javascript" src="//cdn.rawgit.com/MrRio/jsPDF/master/dist/jspdf.min.js"></script> 

    <script type="text/javascript" src="//cdn.rawgit.com/niklasvh/html2canvas/0.5.0-alpha2/dist/html2canvas.min.js"></script>




     <script type="text/javascript" >    (function(){
    var 
     form = $('.form'),
     cache_width = form.width(),
     a4  =[ 595.28,  841.89];  // for a4 size paper width and height
     
    $('#create_pdf').on('click',function(){
     $('body').scrollTop(0);
     createPDF();
     $('#myModalTicketDetail').hide();


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