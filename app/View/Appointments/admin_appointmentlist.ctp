<?php echo $this->Flash->render('positive'); ?>
<div class="warper container-fluid" style="margin-bottom:50px; margin-top:10px;"> 
      
    <div class="panel panel-white" >
        <div class="panel-heading clearfix">
            <h4 class="panel-title">Appointment List</h4>
            
          
        </div> 

        <div class="panel-body">
            
            <div class="table-responsive">
            <table id="example" class="display table" style="width: 100%; cellspacing: 0; ">
                <thead>
                <tr>    
                          <th>#</th>
                          <th>Summary</th>
                          <th>Start At</th>
                          <th>Location</th>
                          <th>Creator</th>
                          <th></th>
                </tr>
                </thead>
                <tfoot>
                    <tr>       
                          <th>#</th>
                          <th>Summary</th>
                          <th>Start At</th>
                          <th>Location</th>
                          <th>Creator</th>
                          <th></th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php $counter=0;?>
                          <?php foreach($Appointments as $Appointment) {?>
                          <tr>
                          <?php $Appointment_id= $Appointment['Appointment']['id'];?>
                          <?php $user_id= $Appointment['Appointment']['user_id'];?>
                             <td><?php echo ++$counter;?> </td>
                             <td><?php $summary= $Appointment['Appointment']['summary'];
                                echo $this->Html->link($summary,array('controller'=>'Appointments','action'=>'appointmentdetails',$Appointment_id),array('escape'=>false));
                             ?></td>
                             <td><?php echo $Appointment['Appointment']['start_at'];?></td> 
                             <td><?php echo $Appointment['Appointment']['address'];?></td>                       
                             <td><?php echo $Appointment['Appointment']['owner'];?></td>
                            

                        <td>
                        <?php echo $this->Html->link('<i class="btn btn-primary fa fa-edit"></i>',array('controller'=>'Appointments','action'=>'appointmentedit',$Appointment['Appointment']['id']),array('escape'=>false));?>
                        <?php echo $this->Html->link('<i class="btn btn-danger fa fa-remove"></i>',array('controller' => 'Appointments', 'action' => 'deleteAppointment',$Appointment['Appointment']['id']),array('escape'=>false,'confirm' => 'Are you sure you wish to delete this Appointment?'));?>

                        <?php echo $this->Html->link('<i class="btn btn-success fa fa-eye"></i>',array('controller'=>'Appointments','action'=>'appointmentdetails',$Appointment_id),array('escape'=>false));?>
                       
            
                        </td>
                      </tr>    
                   <?php } ?>         
                </tbody>
            </table>  
            </div>
        </div>
    </div>
</div>