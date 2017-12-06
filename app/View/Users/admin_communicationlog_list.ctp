<div class="warper container-fluid" style="margin-bottom:50px; margin-top:10px;"> 
  
    <div class="panel panel-white" >
        <div class="panel-heading clearfix">
            <h4 class="panel-title">Communication Log</h4>
            
          
        </div>

        <div class="panel-body">
            
            <div class="table-responsive">
            <table id="example" class="display table" style="width: 100%; cellspacing: 0; ">
                <thead>
                <tr>    
                    <th>Date</th>                              
                    <th>Type</th>
                    <th>Notes</th>
                    <th></th>
                    
                </tr>
                </thead>
                <tfoot>
                <tr>    
                    <th>Date</th>                              
                    <th>Type</th>
                    <th>Notes</th>
                    <th></th>
                </tr>
                </tfoot>
                <tbody>
                    <?php $counter=0;?>
                    <?php foreach($log as $logs) {
                      $log_id = $logs['CommunicationLog']['id'];
                    ?>

                    <tr>
                        <td><?php echo date('D d-m-Y g:i A',strtotime($logs['CommunicationLog']['created']));?></td>    
                        <td><?php echo $logs['CommunicationLog']['type']; ?></td>  
                        <td><?php echo $logs['CommunicationLog']['notes']; ?></td>  
                        <td>
                            <?php echo $this->Html->link('<i class="btn btn-danger btn-sm fa fa-times"></i>',array('controller' => 'users', 'action' => 'delete_communicationlog',$log_id),array('escape'=>false,'confirm' => 'Are you sure you wish to delete this Communication Log?'));?>
                            
                        </td>
                   </tr>
                    <?php } ?>   
        
                </tbody>
            </table>  
            </div>
        </div>
    </div>
</div>