<div class="warper container-fluid">
<div class="page-header"><h1>Mambers Details<small></small></h1>
<div class="page-header text-right"><h4><?php echo $this->Html->link('<i class="fa fa-user-plus"></i> Add New Order',array('controller'=>'Mambers','action'=>'add'),array('escape'=>false));?> 
</h4></div>
</div>
<div class="panel panel-default">
                    <div class="panel-heading">All Mambers</div>
                    <div class="panel-body">
                    
                        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="basic-datatable">
                            <thead>
                                <tr>	 
                  <th>#</th>
									<th> Product Name</th>
									<th>Quantity<i class="icon-large icon-sort-down pull-right"></i></th>
									<th>Amount<i class="icon-large icon-sort-down pull-right"></i></th>
                  <th>Total Amount<i class="icon-large icon-sort-down pull-right"></i></th>
									<th>Action<i class="icon-large icon-sort-down pull-right"></i></th>                         
								</tr>
							</thead>
						<tbody class="userdata">
            <?php $counter=0;?>
                    <?php foreach($orders as $order) {?>
                      <tr>
                        <td><?php echo ++$counter;?> </td>
                        <td><?php echo $order['Order']['product_name'];?></td>
                        <?php $quantity= $order['Order']['quantity']; ?>
                        <td><?php echo $quantity; ?></td>


                        <?php $amount=$order['Order']['amount']; ?>
                        <td><?php echo $amount; ?></td>


                        <td><?php echo $quantity*$amount; ?></td>
                        

                        <td>
                        <?php echo $this->Html->link('<i class="fa fa-edit"></i>',array('controller'=>'orders','action'=>'orderedit',$order['Order']['id']),array('escape'=>false));?>
                          
                        
                        

                        <?php echo $this->Html->link('<i class="fa fa-remove"></i>',array('controller' => 'orders', 'action' => 'deleteorder',$order['Order']['id']),array('escape'=>false,'confirm' => 'Are you sure you wish to delete this order?'));?>

            <?php echo $this->Html->link('<i class="fa fa-eye"></i>',array('controller'=>'orders','action'=>'orderview',$order['Order']['id']),array('escape'=>false));?>
            
                        </td>
                      </tr>    
                   <?php } ?>                 
                    </tbody>
                  </table>



                
                </div><!-- /.box-body -->
              </div><!-- /.box -->
      </div>
  



           