<?php echo $this->Flash->render('positive'); ?> 
 <?php $counter=0;$i=0;$j=0;?>
  <?php foreach($Tickets as $tic) {?>
    <td><?php  ++$counter;?> </td>
    
  <?php } ?> 

 <div class="warper container-fluid" style="margin-bottom:50px; margin-top:10px;"> 
    <div class="page-header">
    <h2>Ticket List
    <span class="pull-right">
      <?php echo $this->Html->link('<p class="btn btn-success btn-sm">Add New Ticket</p>',array('controller'=>'Tickets','action'=>'add'),array('escape'=>false));?> 
      <div class="btn-group">
        <a class="btn btn-default btn-sm dropdown-toggle" href="#" data-toggle="dropdown">Tickets Modules<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><?php echo $this->Html->link('<p class="menu-default">Open Dashboard</p>',array('controller'=>'Tickets','action'=>'dashboard'),array('escape'=>false,'target'=>'_blank'));?></li>
        </ul>
      </div>
    </span> 
    </h2>
    </div>
    
    <div class="panel panel-white" >
        <div class="panel-heading clearfix">
            <h4 class="panel-title"><i class="fa fa-tags"></i>  Tickets</h4><span class="pull-right"><?php echo $counter;?></span>
            
          
        </div>

        <div class="panel-body">
            
            <div class="table-responsive">
            <table id="example" class="display table" style="width: 100%; cellspacing: 0; ">
                <thead>
                <tr>    
                        <th>#</th>
                        <th>Customers</th>
                        <th>Subject</th>
                        <th>Created</th>
                        <th>Status</th>
                        <th>Issue Type</th>
                        <th>Last Updated</th>  
                </tr>
                </thead>
                <tfoot>
                    <tr>    
                        <th>#</th>
                        <th>Customers</th>
                        <th>Subject</th>
                        <th>Created</th>
                        <th>Status</th>
                        <th>Issue Type</th>
                        <th>Last Updated</th>  
                    </tr>
                </tfoot>
                <tbody>
                                          
                                          
                          <?php $counter=0;$total=0;$tax=0;$string=''; ?>
                          <?php foreach($Tickets as $tic) {
                            $row_id =  ++$counter; ?>
                          <tr>
                          <?php $Ticket_id= $tic['Ticket']['id'];?>
                          <?php $user_id= $tic['Ticket']['user_id'];?>

                         <td> <?php echo $this->Html->link( $Ticket_id,array('controller'=>'Tickets','action'=>'ticketdetails',$Ticket_id),array('escape'=>false));?></td>
                                  
                              <?php $name= $tic['Ticket']['name'];?>
                             <td><?php echo $this->Html->link(ucfirst($name),array('controller'=>'Tickets','action'=>'ticketdetails',$Ticket_id),array('escape'=>false));?></td>
                             <?php $title= $tic['Ticket']['title'];?>
                             <td><?php echo $this->Html->link(ucfirst($title),array('controller'=>'Tickets','action'=>'ticketdetails',$Ticket_id),array('escape'=>false));?></td> 
                             <td><?php 
                              echo  $date = date('d-m-Y',strtotime($tic['Ticket']['created']));

                             ?></td> 
                             <td>
                                <div class="Status status_<?php echo $row_id; ?>">
                                 
                                  <span data-bip-skip-blur="true" id="<?php echo $row_id; ?>" class="best_in_place status rec_<?php echo $row_id; ?>"> <?php echo $status = $tic['Ticket']['status'];?>
                                  </span>                                      
                                </div>
                                <div style="display:none;" class="statusedit status_edit_<?php echo $row_id;?>" id="<?php echo $row_id; ?>" >
                                <form class="place" action="javascript:void(0);">
                                  <select  id="<?php echo $row_id; ?>" class="select_ form-control" >
                                    <option> New </option>
                                    <option>In Progress</option>
                                    <option>Resolved</option>
                                    <option>Invoices</option>
                                    <option>Waiting for Parts</option>
                                    <option>Waiting on Customers</option>
                                    <option>Scheduled</option>
                                    <option>Customer Reply</option>
                                  </select>
                                  <input type="hidden"  id="id_<?php echo $row_id;?>" value="<?php echo $tic['Ticket']['id'];?>">
                                  
                                </form>
                                </div>
                             </td>
                             <td>
                                  
                                <?php echo $tic['Ticket']['type'];?></td>
                                <div class="last_update<?php echo $row_id; ?>">
                                <?php $completed_time= date("Y-m-d H:i:s");  

                                  $assigned_time =  $tic['Ticket']['modified'];
                                  $d1 = new DateTime($assigned_time);
                                  $d2 = new DateTime($completed_time);
                                  $interval = $d2->diff($d1);
                                  $interval->format('%M month,%D days,%H hours, %I minutes %S seconds');
                                  $minuts = $interval->format('%I minutes');
                                  $hours = $interval->format('%H hours');
                                  $days = $interval->format('%D days');
                                  $month = $interval->format('%M month');
                                  $seconds = $interval->format('%S seconds');
                                 
                                  
                                 if($month!=00)
                                  {
                                    echo '<td style="background-color:#0FC0F7;color:white;" class="last_update_<?php echo $row_id; ?>">'.$month.'</td>';
                                  }
                                  elseif ($days!=00) {
                                    echo '<td style="background-color:#D38DC1;color:white;" class="last_update_<?php echo $row_id; ?>">'.$days.'</td>'; 
                                  }
                                  elseif ($hours!=00) {
                                    echo '<td style="background-color:#5BB75B;color:white;" class="last_update_<?php echo $row_id; ?>">'.$hours.'</td>'; 
                                  }
                                  elseif ($minuts!=00) {
                                    echo  '<td style="background-color:#DA4F49;color:white;" class="last_update_<?php echo $row_id; ?>">'.$minuts.'</td>'; 
                                  }
                                  elseif ($seconds!=00) {
                                    echo '<td style="background-color:#C06702;color:white;" class="last_update_<?php echo $row_id; ?>">'.$seconds.'</td>'; 
                                  }
                                  else
                                    echo '<td style="background-color:#FAA732;color:white;" class="last_update_<?php echo $row_id; ?>">'.'less than a second '.'</td>'; 
                                  
                                  ?>
                                  </div>                        
                             
                      </tr>    
                   <?php } ?> 
                </tbody>
            </table>  
            </div>
        </div>
    </div>
</div>




<script>
$(document).ready(function() {
  
  $(document).on('click', '.status', function() {  
      id = $(this).attr('id');
      $(".status_edit_"+id).show();
      $(".status_"+id).hide();
  });

  $(document).on('focusout', '.statusedit', function() {
      $(".statusedit").hide();
      $(".Status").show();
  });


    
  $(document).on('change', '.select_', function() {
      var status=$(this).val();
      id = $(this).attr('id');
      var tic_id = $('#id_'+id).val();
      
      if(status!='')
      {
         $.ajax({
         type: "POST",
         url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/admin/Tickets/statusupdate/",

        // url: "search.php",
         data: { status : status , tic_id:tic_id},
      
         success: function(data)
         {
            $(".status_edit_"+id).hide();
            $(".rec_"+id).empty();
            $(".rec_"+id).append(status);
            $(".rec_"+id).show();
            $(".status_"+id).show();
            $(".last_update_"+id).empty();
            $(".last_update_"+id).append("less than a second");
            $(".last_update_"+id).show();
          // window.location.reload();
          //  $('#newDiv').html(jQuery(data).find('.result').html()); 
          }
          });
      }return false;    
  });
});
</script>
<style type="text/css">
.best_in_place {
    background-color: white;
    border: 1px solid #ddd9d9;
    color: black;
    display: inline-block;
    line-height: 1.8;
    padding: 2px 3px;
}
</style>