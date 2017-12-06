<?php echo $this->Flash->render('positive'); ?>
<div class="warper container-fluid" style="margin-bottom:50px; margin-top:10px;"> 
    <span class="text-right" ><h4>
      <?php echo $this->Html->link('<p class="btn btn-success btn-sm">New Item</p>',array('controller'=>'Parts','action'=>'add'),array('escape'=>false));?>

      
      <button class="btn btn-primary btn-sm viewcomplete"> View Completed </button>
      <button class="btn btn-primary btn-sm viewuncomplete"> Vew Pending </button>
<div class="btn-group">
<a class="btn btn-default btn-sm dropdown-toggle" href="#" data-toggle="dropdown">Part Order Modules<span class="caret"></span></a>
<ul class="dropdown-menu">
 <li><?php echo $this->Html->link('<p class="menu-default">RMA Center</p>',array('controller'=>'Rmas','action'=>'rmalist'),array('escape'=>false));?></li>
</ul>
</div></h4>
    </span>  
    <div class="panel panel-white" >
        <div class="panel-heading clearfix">
            <h4 class="panel-title">Parts Order Tracker</h4>
            
          
        </div>
  
        <div class="panel-body">
            
            <div class="table-responsive">
            <table id="example" class="display table" style="width: 100%; cellspacing: 0; ">
                <thead>
                <tr>    
                          <th>ID</th>
                          <th>Entered</th>
                          <th>Tickt#</th>
                          <th>Customer</th>
                          <th>Description</th>
                          <th>Price</th>
                          <th>Qty</th> 
                          <th>Store</th> 
                          <th>Ordered</th> 
                          <th>Tracking</th>     
                          <th>Arrived</th> 
                          <th></th>  
                </tr>
                </thead>
                <tfoot>
                    <tr>    
                          <th>ID</th>
                          <th>Entered</th>
                          <th>Tickt#</th>
                          <th>Customer</th>
                          <th>Description</th>
                          <th>Price</th>
                          <th>Qty</th> 
                          <th>Store</th> 
                          <th>Ordered</th> 
                          <th>Tracking</th>     
                          <th>Arrived</th> 
                          <th></th>  
                    </tr>
                </tfoot>
                <tbody>
                   <?php $counter=0;?>
                        <?php foreach($Part as $Parts) {
                          $received = $Parts['parts']['received'];
                          $today = date('m/d/Y H:i A');
                          if($received > $today){
                            //echo "greater";
                            $row_id =  ++$counter;?>
                          <tr class="Greater">
                          <?php  $Part_id= $Parts['parts']['id'];?>
                          <?php  $user_id= $Parts['parts']['user_id'];?>
                            <td><?php echo $this->Html->link( $Part_id,array('controller'=>'Parts','action'=>'partedit',$Part_id),array('escape'=>false));?></td>

                            <td><?php echo  $created = date('d-m-Y',strtotime($Parts['parts']['created'])); ?></td>

                            <td><?php $ticket_id = $Parts['parts']['ticket_id'];echo $this->Html->link($ticket_id,array('controller'=>'Tickets','action'=>'ticketdetails',$ticket_id),array('escape'=>false));?></td>

                            <td><?php echo ucfirst($Parts['users']['first_name'].' '.$Parts['users']['last_name']);?></td>

                            <?php $url= $Parts['parts']['part_url'];?>

                            <td><?php echo $this->Html->link('(external URL)', 'http://'.$url,array('target'=>"_blank",'data-toggle'=>'tooltip','data-placement'=>'top','title'=>$url)).' '.$Parts['parts']['description'];?></td>                 

                            <td><?php echo '$'.$Parts['parts']['retail'];?></td>
                            <td><?php echo $Parts['parts']['quantity'];?></td>                         
                            <td><?php echo $Parts['parts']['store'];?></td>

                            <td><?php echo  $orderd = date('d-m-Y',strtotime($Parts['parts']['orderd'])); ?></td>

                            <td>
                            <?php $tracking_number = $Parts['parts']['tracking_number']; ?>

                            <a target="_blank" href="http://www.google.com/search?&q=<?php echo $tracking_number;?>"> <?php echo $tracking_number;?>
                            </a>
                            
                            </td>
                             

                            <td style="background-color:gray" ><?php echo  $received = date('d-m-Y',strtotime($Parts['parts']['received'])); ?></td>



                            <td>
                            <?php echo $this->Html->link('<i class="btn btn-warning btn-sm fa fa-pencil"></i>',array('controller'=>'Parts','action'=>'partedit',$Parts['parts']['id']),array('escape'=>false));?>

                            <?php echo $this->Html->link('<i class="btn btn-danger btn-sm fa fa-times"></i>',array('controller' => 'Parts', 'action' => 'deletePart',$Parts['parts']['id']),array('escape'=>false,'confirm' => 'Are you sure you wish to delete this Part?'));?>
                        
                
                            </td>
                          </tr> <?php
                          }else{
                            $row_id =  ++$counter;?>
                          <tr class="Lesser">
                          <?php  $Part_id= $Parts['parts']['id'];?>
                          <?php  $user_id= $Parts['parts']['user_id'];?>
                            <td><?php echo $this->Html->link( $Part_id,array('controller'=>'Parts','action'=>'partedit',$Part_id),array('escape'=>false));?></td>

                            <td><?php echo  $created = date('d-m-Y',strtotime($Parts['parts']['created'])); ?></td>

                            <td><?php $ticket_id = $Parts['parts']['ticket_id'];echo $this->Html->link($ticket_id,array('controller'=>'Tickets','action'=>'ticketdetails',$ticket_id),array('escape'=>false));?></td>

                            <td><?php echo ucfirst($Parts['users']['first_name'].' '.$Parts['users']['last_name']);?></td>

                            <?php $url= $Parts['parts']['part_url'];?>

                            <td><?php echo $this->Html->link('(external URL)', 'http://'.$url,array('target'=>"_blank",'data-toggle'=>'tooltip','data-placement'=>'top','title'=>$url)).' '.$Parts['parts']['description'];?></td>                 

                            <td><?php echo '$'.$Parts['parts']['retail'];?></td>
                            <td><?php echo $Parts['parts']['quantity'];?></td>                         
                            <td><?php echo $Parts['parts']['store'];?></td>

                            <td><?php echo  $orderd = date('d-m-Y',strtotime($Parts['parts']['orderd'])); ?></td>

                            <td>
                            <?php $tracking_number = $Parts['parts']['tracking_number']; ?>

                            <a target="_blank" href="http://www.google.com/search?&q=<?php echo $tracking_number;?>"> <?php echo $tracking_number;?>
                            </a>
                            
                            </td>
                             

                            <td style="background-color:gray" ><?php echo  $received = date('d-m-Y',strtotime($Parts['parts']['received'])); ?></td>



                            <td>
                            <?php echo $this->Html->link('<i class="btn btn-warning btn-sm fa fa-pencil"></i>',array('controller'=>'Parts','action'=>'partedit',$Parts['parts']['id']),array('escape'=>false));?>

                            <?php echo $this->Html->link('<i class="btn btn-danger btn-sm fa fa-times"></i>',array('controller' => 'Parts', 'action' => 'deletePart',$Parts['parts']['id']),array('escape'=>false,'confirm' => 'Are you sure you wish to delete this Part?'));?>
                        
                
                            </td>
                          </tr> 
                          <?php } ?>
                          
                             
                   <?php } ?>     
        
                </tbody>
            </table>  
            </div>
        </div>
    </div>
</div> 

<script type="text/javascript">
  $(document).ready(function(){
    $('.viewcomplete').click(function(){
      $(".Lesser").show();
      $(".Greater").hide();
      $(".viewcomplete").hide();
      $(".viewuncomplete").show();
    });
    
    $('.viewuncomplete').click(function(){
      $(".Greater").show();
      $(".Lesser").hide();
      $(".viewuncomplete").hide();
      $(".viewcomplete").show();
    });
    $('.viewuncomplete').trigger('click');
  });
 
</script>