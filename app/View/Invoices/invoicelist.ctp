<?php echo $this->Flash->render('positive'); ?>

  <?php $counter=0;$i=0;$j=0; $opentotal=0;$paidtotal=0;$unpaidtotal=0;?>
  <?php foreach($Invoices as $Invoice) {?>
    <td><?php  ++$counter;?> </td>
    <td><?php $status = $Invoice['Invoice']['status'];
              $opentotal = $opentotal + $Invoice['Invoice']['total'];
    if($status=='1')
    {
      $i=$i+1;
      $paidtotal = $paidtotal+$Invoice['Invoice']['total'];
    }
    else
    {
      $j=$j+1;
      $unpaidtotal = $unpaidtotal+$Invoice['Invoice']['total'];
    }
    ?> 
    </td>
  <?php } ?> 

<div class="warper container-fluid" style="margin-bottom:50px; margin-top:10px;">
  <div class="page-header">
    <h2>Invoice List
        <span class="pull-right"><?php echo $this->Html->link('<p class="btn btn-success btn-sm">Add New Invoice</p>',array('controller'=>'Invoices','action'=>'add'),array('escape'=>false));?> 
            <div class="btn-group">
                <a class="btn btn-default btn-sm dropdown-toggle" href="#" data-toggle="dropdown">Invoice Modules <span class="caret"></span></a>
                <ul class="dropdown-menu">
                   <li><?php echo $this->Html->link('<p class="menu-default">Recurring Invoices</p>',array('controller'=>'Schedules','action'=>'schedulelist'),array('escape'=>false));?></li>
                </ul>
            </div>
        </span>
    </h2>
  </div> 


    <div class="row mb20 quick-filters">
        <div class="col-xs-12 col-sm-12 col-lg-12">
        <div class="btn-group btn-group-justified btn-group-fill-height">
        <a class="btn btn-primary" role="button" href="">
        <strong><?php echo '$'.$opentotal.'.00';?></strong>
        <br>
        <span>
        <small> <?php echo $counter;?> Open Invoices</small>
        </span>
        </a>
        <a class="btn btn-danger" role="button" href="">
        <strong><?php echo '$'.$unpaidtotal.'.00';?></strong>
        <br>
        <span>
        <small> <?php echo $j;?> Overdue</small>
        </span>
        </a>
        <a class="btn btn-success" role="button" href="">
        <strong><?php echo '$'.$paidtotal.'.00';?></strong>
        <br>
        <span>
        <small> <?php echo $i;?> Paid </small>
        </span>
        </a>
        </div>
        </div>
    </div><br/>

    <div class="panel panel-white" >
        <div class="panel-heading clearfix">
            <h4 class="panel-title"><i class="fa fa-money"></i>   Invoices</h4>
            
          
        </div>

        <div class="panel-body">
            
            <div class="table-responsive">
            <table id="example" class="display table" style="width: 100%; cellspacing: 0; ">
                <thead>
                  <tr>    
                    <th>#</th>
                    <th>Inv Number</th>
                    <th>Name</th>
                    <th>Status</th>
                    <th>Took payment</th>
                    <th>Date</th>
                    <th>Items</th>
                    <th>Total</th>
                    <th>Ref number</th>
                    <th>Action</i></th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>    
                    <th>#</th>
                    <th>Inv Number</th>
                    <th>Name</th>
                    <th>Status</th>
                    <th>Took payment</th>
                    <th>Date</th>
                    <th>Items</th>
                    <th>Total</th>
                    <th>Ref number</th>
                    <th>Action</i></th>
                  </tr>
                </tfoot>
                <tbody>
                  <?php $count=0;?>
                          <?php foreach($Invoices as $Invoice) {?>
                          <tr>
                          <?php $invoice_id= $Invoice['Invoice']['id'];?>
                          <?php $user_id= $Invoice['Invoice']['user_id'];?>
                          <?php $ticket_id= $Invoice['Invoice']['ticket_id'];?>
                             <td><?php echo ++$count;?> </td>
                             <td><?php $inv_number = $Invoice['Invoice']['inv_number'];?>
                              <?php echo $this->Html->link($inv_number,array('controller'=>'Invoices','action'=>'invoicedetails',$invoice_id),array('escape'=>false));?>         
                             </td>
                             <td>
                             <?php $name = $Invoice['Invoice']['name'];?>
                              <?php echo $this->Html->link(ucfirst($name),array('controller'=>'Invoices','action'=>'invoicedetails',$invoice_id),array('escape'=>false));?> </td>
                             <td><?php 
                             if($ticket_id!=0){
                             echo $this->Html->image('lock_icon.png', array('alt' => 'Image','width'=>'15', 'height'=>'15','title'=>'Ticket is OPEN'));

                            }else{
                              
                            }

                             ?>
                        

                             </td> 
                             <td><?php  $status = $Invoice['Invoice']['status'];
                             if($status=='1')
                             {
                              $i=$i++; 
                              echo $this->Html->image('check_mark_grey.png', array('alt' => 'Image','width'=>'15', 'height'=>'15','title'=>'Tech took Payment'));?>
                              <?php
                             }
                             else
                             {
                              $j=$j++;?><?php
                             }
                             ?> 
                             </td>
                             <td><?php echo date('D d-m-Y g:i A',strtotime($Invoice['Invoice']['created']));?></td>
                             <td><?php echo $Invoice['Invoice']['item'];?></td>
                             <td><?php echo '$'.$Invoice['Invoice']['total'];?></td>
                             <td><?php echo $Invoice['Invoice']['ref_number'];?></td>
                       <td>
                        <?php echo $this->Html->link('<i class="btn btn-primary fa fa-pencil-square-o"></i>',array('controller'=>'Invoices','action'=>'editinginvoice',$Invoice['Invoice']['id']),array('escape'=>false));?>
                        <?php echo $this->Html->link('<i class="btn btn-danger fa fa-trash-o"></i>',array('controller' => 'Invoices', 'action' => 'deleteinvoice',$Invoice['Invoice']['id']),array('escape'=>false,'confirm' => 'Are you sure you wish to delete this Invoice?'));?>

                        <?php echo $this->Html->link('<i class="btn btn-info fa fa-eye"></i>',array('controller'=>'Invoices','action'=>'invoicedetails',$invoice_id),array('escape'=>false));?>         
                        </td>
                      </tr>    
                   <?php } ?>                 
                </tbody>
            </table>  
            </div>
        </div>
    </div>
</div>    