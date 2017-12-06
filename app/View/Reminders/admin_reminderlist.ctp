<?php echo $this->Flash->render('positive'); ?>
<div class="warper container-fluid" style="margin-bottom:50px; margin-top:10px;"> 
    <span class="text-right" ><h4>

       <?php echo $this->Html->link('New Reminder',array('controller' => 'Reminders', 'action' => 'add'),array('escape'=>false,'class'=>'btn btn-success m-b-sm'));?>


        </h4>
    </span> 
    <div class="panel panel-white" >
        <div class="panel-heading clearfix">
            <h4 class="panel-title">Reminders List</h4>
            
          
        </div> 

        <div class="panel-body">
            
            <div class="table-responsive">
            <table id="example" class="display table" style="width: 100%; cellspacing: 0; ">
                <thead>
                <tr>    
                          <th>Time</th>
                          <th>Message</th>
                          <th>Tech</th>
                          <th>Customer</th>
                          <th></th>
                          <th></th>
                          <th></th>
                </tr>
                </thead>
                <tbody>
                    <?php $counter=0;?>
                          <?php foreach($Reminders as $reminder) {
                            $row_id =  ++$counter;?>
                          <tr>
                          <?php $id= $reminder['Reminder']['id'];
                          $status = $reminder['Reminder']['status'];?>
                          <?php $user_id= $reminder['Reminder']['user_id'];?>
                             <td><?php echo $reminder_at= $reminder['Reminder']['at'];?></td>
                             <td><?php echo $reminder['Reminder']['notes'];?></td>
                             <td><?php echo $reminder['Reminder']['tech'];?></td> 
                             <td><?php echo $reminder['Reminder']['customer'];?></td>
                             <td>
                              <?php echo $this->Html->link('Snooze 1 day',array('controller' => 'Reminders', 'action' => 'updatereminder',$id),array('escape'=>false));?>
                             </td> 
                             <th>
                             <?php if($status==1)
                             {?>

                               <span style="font-weight: normal;" id="<?php echo $row_id; ?>" class="best_in_place status status_<?php echo $row_id; ?>"><?php echo "Reactive";?></span>

                             <?php 
                              }
                             else{
                              ?>
                                <span style="font-weight: normal;" id="<?php echo $row_id; ?>" class="best_in_place status status_<?php echo $row_id; ?>">Clear</span>
                              <?php }?>
                              <input type="hidden" value="<?php echo $id?>" id="id_<?php echo $row_id; ?>">

                              <span style="font-weight: normal; display: none;" id="<?php echo $row_id; ?>" class="best_in_place status reactive_status_<?php echo $row_id; ?>">Reactive</span>

                              <span style="font-weight: normal; display: none;" id="<?php echo $row_id; ?>" class="best_in_place status clear_status_<?php echo $row_id; ?>">Clear</span>

                             </th>                      
                             <td>
                                
                              <?php echo $this->Html->link('<i class="btn btn-danger btn-sm fa fa-times"></i>',array('controller' => 'Reminders', 'action' => 'deletereminder',$id),array('escape'=>false,'confirm' => 'Are you sure you wish to delete this Reminder?'));?>

                             </td>
                             
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
        var status = $(this).text();
        var rem_id = $("#id_"+id).val();
        //alert(rem_id);die();
        if(status=="Reactive")
        {
          $(this).hide();
          
          $.ajax({
                  type: "POST",
                  url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/admin/Reminders/statusupdate/",

                  data: { status : status , rem_id:rem_id},
      
                  success: function(data)
                  {
                    $(".clear_status_"+id).show();
                  }
          });
        }
        else
        {
          $(this).hide();          
          $.ajax({
                  type: "POST",
                  url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/admin/Reminders/statusupdate/",

                  data: { status : status , rem_id:rem_id},
      
                  success: function(data)
                  {
                    $(".reactive_status_"+id).show();
                  }
          });
        }
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