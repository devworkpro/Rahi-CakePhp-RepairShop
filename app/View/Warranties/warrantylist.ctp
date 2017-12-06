<?php echo $this->Flash->render('positive'); ?>
<div class="warper container-fluid" style="margin-bottom:50px; margin-top:10px;"> 
    <div class="page-header">
        <h1>Warranty Listing</h1>
    </div>
     
    <div class="panel panel-white" >
        <div class="panel-heading clearfix">
            <h4 class="panel-title">Warranties</h4>
            
          
        </div>

        <div class="panel-body">
            
            <div class="table-responsive">
            <table id="example" class="display table" style="width: 100%; cellspacing: 0; ">
                <thead>
                  <tr>    
                        <th>Name</th> 
                        <th>Warranty information</th>
                        <th>Expiration date</th>
                        <th> Certificate num</th>
                        <th>Invoice</th>
                        <th>Customer</th>
                        <th></th>
                        <th></th>
                  </tr>
                </thead>
                <tbody>
                 <?php $counter=0;?>
                    <?php foreach($Warranty as $warranty) {?>
                      <tr><?php $warranty_id = $warranty['warranties']['id'];
                                $user_id = $warranty['warranties']['user_id'];
                        ?>
                        <td><?php echo $warranty['warranties']['name'];?></td>
                        <td><?php $info = $warranty['warranties']['warranty_information']; 
                        echo substr($info,0,50)."....";?></td>
                        <?php $expiration_date = $warranty['warranties']['expiration_date'];
                        //$run = $schedule['Schedule']['run_next_at'];
                        $current_date = date('m/d/Y', time());
                        $date1=date_create($current_date);
                        $date2=date_create($expiration_date);
                        $diff=date_diff($date1,$date2);
                        $days = $diff->format("%R%a days");
                        if($days>0){
                            ?> <td class="alert alert-success"><?php echo $expiration_date;?></td><?php
                        }else{
                           ?> <td><?php echo $expiration_date;?></td><?php
                        }
                        ?>
                        <td><?php echo $warranty['warranties']['certificate_num'];?></td>
                        <td><?php $invoice_id = $warranty['warranties']['invoice_id'];?>
                            <?php echo $this->Html->link($invoice_id,array('controller'=>'Invoices','action'=>'invoicedetails',$invoice_id),array('escape'=>false));?>
                        </td>
                        <td><?php $user_name = ucfirst($warranty['users']['first_name'].' '.$warranty['users']['last_name']);
                           ?>                         
                            <?php echo $this->Html->link($user_name,array('controller'=>'users','action'=>'userdetail',$user_id),array('escape'=>false));?>

                        </td> 
                        <td><?php echo $this->Html->link('view',array('controller'=>'Warranties','action'=>'warrantyview',$warranty_id),array('escape'=>false));?></td>
                                               
                        <td>
                                             
                        
                        <?php echo $this->Html->link('Destroy',array('controller' => 'Warranties', 'action' => 'deleteWarranty',$warranty_id),array('escape'=>false,'confirm' => 'Are you sure you wish to delete this Warranty?'));?>

                       
            
                        </td>
                      </tr>    
                   <?php } ?>    
        
                </tbody>
            </table>  
            </div>
        </div>
    </div>
</div>    