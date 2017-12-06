<?php echo $this->Flash->render('positive'); ?>
<div class="warper container-fluid" style="margin-bottom:50px; margin-top:10px;"> 
    <div class="page-header">
    <h2>Customer List 
        <span class="pull-right"><?php echo $this->Html->link('<p class="btn btn-success btn-sm">New Customer</p>',array('controller'=>'users','action'=>'add'),array('escape'=>false));?> 
            <div class="btn-group">
                <a class="btn btn-default btn-sm dropdown-toggle" href="#" data-toggle="dropdown">Customer Modules <span class="caret"></span></a>
                <ul class="dropdown-menu">
                   <li><?php echo $this->Html->link('<p class="menu-default">Assets Manager</p>',array('controller'=>'assets','action'=>'customerassets'),array('escape'=>false));?></li>
                   <li><?php echo $this->Html->link('<p class="menu-default">Contract Manager</p>',array('controller'=>'Contracts','action'=>'contractlist'),array('escape'=>false));?></li>

                </ul>
            </div>
        </span>
    </h2>
   
    
    </div> 
    
    <div class="panel panel-white" >
        <div class="panel-heading clearfix">
            <h4 class="panel-title">Customers</h4>
            
          
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
                        $name = $user['User']['first_name'].' '.$user['User']['last_name'].' ,'.$user['User']['business_name'];
                        $user_id = $user['User']['id'];
                    ?>

                    <tr class="odd gradeX">
                        <td><?php echo ++$counter;?> </td>
                        <td>
                        	<?php echo $this->Html->link(ucfirst($name),array('controller'=>'users','action'=>'userdetail',$user_id),array('escape'=>false));?>


                        </td>
                        <td><?php $email = $user['User']['email']; 
                            echo $this->Html->link($email,array('controller'=>'users','action'=>'userdetail',$user_id),array('escape'=>false));?></td>
                        <td><?php 
                            if(!empty($user["phone"])){
                                foreach ($user["phone"] as $ph) {
                                    $phone = explode("*", $ph);
                                    echo "<b>".$phone['0'].'</b> '.$phone['1'].' ';

                                }
                            }
                        ?></td>
                        <td><?php echo date('D d-m-Y g:i A',strtotime($user['User']['created']));?></td>
                        <td><?php echo $this->Html->link('<i class="btn btn-primary fa fa-edit"></i>',array('controller'=>'users','action'=>'useredit',$user['User']['id']),array('escape'=>false));?>
                        <?php echo $this->Html->link('<i class="btn btn-danger fa fa-remove"></i>',array('controller' => 'users', 'action' => 'deleteuser',$user['User']['id']),array('escape'=>false,'confirm' => 'Are you sure you wish to delete this user?'));?>
                        <?php echo $this->Html->link('<i class="btn btn-success fa fa-eye"></i>',array('controller'=>'users','action'=>'userview',$user['User']['id']),array('escape'=>false));?>

                        </td>
                    </tr>
                    <?php } ?>   
        
                </tbody>
            </table>  
            </div>
        </div>
    </div>
</div>