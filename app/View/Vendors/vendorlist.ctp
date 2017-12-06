<?php echo $this->Flash->render('positive'); ?>
<div class="warper container-fluid" style="margin-bottom:50px; margin-top:10px;"> 

<div class="page-header">
    <h2>Vendors
        <span class="pull-right"><?php echo $this->Html->link('New Vendor',array('controller'=>'Vendors','action'=>'add'),array('escape'=>false, 'class'=>'btn btn-success'));?> 
        </span>
    </h2>
</div>
<br>
    <div class="panel panel-white" >
        <div class="panel-heading clearfix">
            <h4 class="panel-title"> Vendors</h4>
        </div>

        <div class="panel-body">
            
            <div class="table-responsive">
            <table id="example" class="display table table-hover table-bordered" style="width: 100%;">
                <thead>
                <tr>    
                    <th>Name</th>
                    <th>Rep first name</th>
                    <th>Rep last name</th>
                    <th>Email</th>
                    <th>Account number</th>
                    <th>Phone</th>
                    <th></th>
                    
                </tr>
                </thead>
                
                <tbody>
                    <?php $counter=0;?>
                        <?php foreach($Vendors as $vendor) {
                            $id = $vendor['Vendor']['id'];
                            //pr($vendor);
                        ?>

                        <tr>
                            <td>
                                <?php $name = $vendor['Vendor']['name']; 
                                echo $this->Html->link($name,array('controller'=>'Vendors','action'=>'vendordetails',$id),array('escape'=>false));
                                ?>
                            </td>
                            <td>
                                <?php echo $vendor['Vendor']['rep_first_name']; ?>
                            </td>
                            <td>
                                <?php echo $vendor['Vendor']['rep_last_name']; ?>
                            </td>
                            <td>
                                <?php echo $vendor['Vendor']['email']; ?>
                            </td>   
                            <td>
                                <?php echo $vendor['Vendor']['account_number']; ?>
                            </td>   
                            <td>
                                <?php echo $vendor['Vendor']['phone']; ?>
                            </td>                       
                            <td>
                                <?php echo $this->Html->link('<i class="btn btn-warning btn-sm fa fa-pencil"></i>',array('controller' => 'Vendors', 'action' => 'vendoredit',$id),array('escape'=>false));?>                           
                                <?php echo $this->Html->link('<i class="btn btn-danger btn-sm fa fa-remove"></i>',array('controller' => 'Vendors', 'action' => 'deletevendor',$id),array('escape'=>false,'confirm' => 'Are you sure?'));?>
                            </td>
                        </tr> 

                        <?php } ?>  
                </tbody>
            </table>  
            </div>
        </div>
    </div>
</div>            