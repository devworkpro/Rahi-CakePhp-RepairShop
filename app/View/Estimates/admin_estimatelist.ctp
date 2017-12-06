<?php echo $this->Flash->render('positive'); ?>
<style type="text/css">
  .estimate{
    text-align: center;
    background: #F1F1F1;
  }
</style>
 <?php $counter=0;$i=0;$j=0;$k=0;$l=0; $app_total=0;$un_total=0;?>
  <?php foreach($Estimates as $Estimate) {?>
    <?php  ++$counter;?>
    <?php $status = $Estimate['Estimate']['status'];
    if($status=='1')
    {
    $i=$i+1;
    $app_total = $app_total + $Estimate['Estimate']['total'];
    }
    else
    {
    $j=$j+1;
    $un_total = $un_total + $Estimate['Estimate']['total'];
    }
    ?>
    <?php $decline = $Estimate['Estimate']['decline'];
    if($decline=='1')
    {
    $k=$k+1;
    }
    else
    {
    $l=$l+1;
    }
    ?>
  <?php } ?>


<div class="warper container-fluid" style="margin-bottom:50px; margin-top:10px;"> 
<h4><span> Estimate List   <?php echo $this->Html->link('Add New Estimate',array('controller'=>'Estimates','action'=>'add'),array('escape'=>false, 'class'=>'btn btn-success pull-right'));?>     
</span></h4><br>

<div class="row">
<div class="col-xs-12 col-sm-12">


  <div class="col-md-3">
    <div class="panel panel-white">
      <div class="panel-body estimate">
        <h4>Pending Estimates</h4>
        <span style="font-size: 50px; bold;"><?php echo $j;?></span>
      </div>
    </div>
  </div>
  <div class="col-md-3">
  <div class="panel panel-white">
    <div class="panel-body estimate">
      <h4>Projected Value</h4>
      <span style="font-size: 50px; bold;"><?php echo '$'.$un_total;?></span>
    </div>
  </div>  
  </div>
  <div class="col-md-3">
    <div class="panel panel-white">
      <div class="panel-body estimate">
        <h4>Approved</h4>
        <span style="font-size: 50px; bold;"><?php echo $i;?></span>
      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="panel panel-white">
      <div class="panel-body estimate">
        <h4>Declined</h4>
        <span style="font-size: 50px; bold;"><?php echo $k;?></span>
      </div>
    </div>  
  </div>
  

</div>
</div><br/>





    <div class="panel panel-white" >
        <div class="panel-heading clearfix">
            <h4 class="panel-title"><i class="fa fa-money"></i>   Estimates</h4>
            
          
        </div>

        <div class="panel-body">
            
            <div class="table-responsive">
            <table id="example" class="display table" style="width: 100%; cellspacing: 0; ">
                <thead>
                <tr>    
                          <th>Number</th>
                          <th>Name</th>
                          <th>Status</th>
                          <th>Items</th>
                          <th>Date</th>
                          <th>Total</th>
                          <th>Action</th>    
                </tr>
                </thead>
                <tfoot>
                    <tr>    
                          <th>Number</th>
                          <th>Name</th>
                          <th>Status</th>
                          <th>Items</th>
                          <th>Date</th>
                          <th>Total</th>
                          <th>Action</th>    
                
                    </tr>
                </tfoot>
                <tbody>
                    <?php $counter=0;?>
                          <?php foreach($Estimates as $Estimate) {?>
                          <?php $decline = $Estimate['Estimate']['decline'];
                          if($decline!='1')
                          {
                          ?>     
                          
                          <tr>
                          <?php $Estimate_id= $Estimate['Estimate']['id'];?>
                          <?php $user_id= $Estimate['Estimate']['user_id'];?>
                             <td><?php $est_number = $Estimate['Estimate']['est_number'];?>
                               <?php echo $this->Html->link($est_number,array('controller'=>'Estimates','action'=>'estimatedetails',$user_id,$Estimate_id),array('escape'=>false));?>
                             </td>
                             <td><?php $est_name = $Estimate['Estimate']['name'];?>
                               
                                <?php echo $this->Html->link(ucfirst($est_name),array('controller'=>'Estimates','action'=>'estimatedetails',$user_id,$Estimate_id),array('escape'=>false));?>

                             </td> 
                             <td><?php  $status = $Estimate['Estimate']['status'];
                             if($status=='1')
                             {
                              echo $this->Html->image('check_mark_green.gif', array('alt' => 'Image','width'=>'15', 'height'=>'15'));
                             }
                             else
                             {
                              
                             }


                             ?> 



                             </td>
                            <td><?php echo $Estimate['Estimate']['item'];?></td>                        
                             <td><?php echo date('D d-m-Y g:i A',strtotime($Estimate['Estimate']['created']));?></td>
                             <td><?php echo '$'.$Estimate['Estimate']['total'];?></td>



                        <td>
                        <?php echo $this->Html->link('<i class="btn btn-primary btn-sm fa fa-edit"></i>',array('controller'=>'Estimates','action'=>'editingestimate',$Estimate['Estimate']['id']),array('escape'=>false));?>
                        <?php echo $this->Html->link('<i class="btn btn-danger btn-sm fa fa-remove"></i>',array('controller' => 'Estimates', 'action' => 'deleteestimate',$Estimate['Estimate']['id']),array('escape'=>false,'confirm' => 'Are you sure you wish to delete this Estimate?'));?>

                        <?php echo $this->Html->link('<i class="btn btn-success btn-sm fa fa-eye"></i>',array('controller'=>'Estimates','action'=>'estimatedetails',$user_id,$Estimate_id),array('escape'=>false));?>
                       
            
                        </td>
                      </tr> 

                   <?php } } ?>  
                </tbody>
            </table>  
            </div>
        </div>
    </div>
</div>            