<?php echo $this->Flash->render('positive'); ?>
<div class="warper container-fluid" style="margin-bottom:50px; margin-top:10px;"> 
    <div class="page-header">
    <h2>Staff List 
        <span class="pull-right"><?php echo $this->Html->link('<p class="btn btn-success btn-sm">New Staff</p>',array('controller'=>'Staffs','action'=>'add'),array('escape'=>false));?> 
            
        </span>
    </h2>
   
    
    </div> 
    
    <div class="panel panel-white" >
        <div class="panel-heading clearfix">
            <h4 class="panel-title">Staffs</h4>
            
          
        </div>

        <div class="panel-body">
            
            <div class="table-responsive">
            <table id="example" class="display table" style="width: 100%; cellspacing: 0; ">
                <thead>
                <tr>    
                    <th>#</th>                              
                    <th>NAME/BUSINESS</th>
                    <th>EMAIL</th>
                    <th>PHONE</th>
                    <th>CREATED</th>
                    <th>ACTION</th>
                </tr>
                </thead>
                <tfoot>
                    <tr>    
                    <th>#</th>                              
                    <th>NAME/BUSINESS</th>
                    <th>EMAIL</th>
                    <th>PHONE</th>
                    <th>CREATED</th>
                    <th>ACTION</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php $counter=0;
                    //pr($users);?>
                    <?php foreach($users as $user) {
                        //pr($user);
                        $name = $user['User']['first_name'].' '.$user['User']['last_name'].', '.$user['User']['business_name'];
                        $user_id = $user['User']['id'];
                    ?>

                    <tr class="odd gradeX">
                        <td><?php echo ++$counter;?> </td>
                        <td>
                        	<?php echo $this->Html->link(ucfirst($name),array('controller'=>'staffs','action'=>'staffdetail',$user_id),array('escape'=>false));?>


                        </td>
                        <td><?php $email = $user['User']['email']; 
                            echo $this->Html->link($email,array('controller'=>'staffs','action'=>'staffdetail',$user_id),array('escape'=>false));?></td>
                        <td><?php echo $user['User']['phone_number']; ?></td>
                        <td><?php echo date('D d-m-Y g:i A',strtotime($user['User']['created']));?></td>
                        <td><?php echo $this->Html->link('<i class="btn btn-primary fa fa-edit"></i>',array('controller'=>'staffs','action'=>'staffedit',$user_id),array('escape'=>false));?>
                        <?php echo $this->Html->link('<i class="btn btn-danger fa fa-remove"></i>',array('controller' => 'staffs', 'action' => 'deletestaff',$user_id),array('escape'=>false,'confirm' => 'Are you sure you wish to delete this Staff?'));?>
                        <?php echo $this->Html->link('<i class="btn btn-success fa fa-eye"></i>',array('controller'=>'staffs','action'=>'staffdetail',$user_id),array('escape'=>false));?>

                        </td>
                    </tr>
                    <?php } ?>   
        
                </tbody>
            </table>  
            </div>
        </div>
    </div>
</div>