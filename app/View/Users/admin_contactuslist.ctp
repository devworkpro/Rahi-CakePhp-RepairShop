<?php echo $this->Flash->render('positive'); ?>
<div class="warper container-fluid" style="margin-bottom:50px; margin-top:10px;"> 
    <div class="page-header">
    <h2>Contactus List 
    </h2>
   
    
    </div> 
    
    <div class="panel panel-white" >
        <div class="panel-heading clearfix">
            <h4 class="panel-title">Contact Us</h4>
            
          
        </div>

        <div class="panel-body">
            
            <div class="table-responsive">
            <table id="example" class="display table" style="width: 100%; cellspacing: 0; ">
                <thead>
                <tr>    
                    <th>#</th>                              
                    <th>Name</th>
                    <th>Email</th>
                    <th>Subject</th>
                    <th>Message</th>
                    <th>ACTION</th>
                </tr>
                </thead>
                <tfoot>
                    <tr>    
                    <th>#</th>                              
                    <th>Name</th>
                    <th>Email</th>
                    <th>Subject</th>
                    <th>Message</th>
                    <th>ACTION</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php $counter=0;
                    //pr($contactus);?>
                    <?php foreach($contactus as $contact) {
                        $Contactus_id = $contact['Contactus']['id'];
                    ?>

                    <tr class="odd gradeX">
                        <td><?php echo ++$counter;?> </td>
                        <td>
                        	<?php echo ucfirst($contact['Contactus']['name']);?>
                        </td>
                        <td>
                            <?php echo $contact['Contactus']['email'];?>
                        </td>
                        <td><?php echo $contact['Contactus']['subject'];?></td>
                        <td><?php echo $contact['Contactus']['message'];?></td>
                        <td>
                        <?php echo $this->Html->link('<i class="btn btn-danger fa fa-remove"></i>',array('controller' => 'users', 'action' => 'admin_deletecontactus',$Contactus_id),array('escape'=>false,'confirm' => 'Are you sure?'));?>
                        </td>
                    </tr>
                    <?php } ?>   
        
                </tbody>
            </table>  
            </div>
        </div>
    </div>
</div>