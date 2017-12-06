<?php echo $this->Flash->render('positive'); ?>
<div class="warper container-fluid" style="margin-bottom:50px; margin-top:10px;"> 
  <span class="text-left"><h2> Assets Manager</h2></span>  
  <span class="text-right">
  <h4>
    <?php echo $this->Html->link('New Asset',array('controller' => 'Assets', 'action' => 'add'),array('escape'=>false,'class'=>'btn btn-success'));?>
    <?php echo $this->Html->link('Manage Types/Fields',array('controller' => 'Assets', 'action' => 'assettypes'),array('escape'=>false,'class'=>'btn btn-default'));?>
  </h4>
  </span> 

  <div class="panel-body">
    <div class="col-md-12">
      <div class="panel panel-default" >
          <div class="panel-heading clearfix">
            <h4 class="panel-title"><i class="fa fa-desktop"></i>      Assets </h4>
          </div>
          <div class="panel-body">
            <div class="table-responsive">
              <table id="example" class="display table  table-hover table-bordered">
                <thead>
                <tr>    
                  <th>Name</th>
                  <th>Customer</th>
                  <th>Contact</th>
                  <th>Asset Serial Number</th>
                  <th>Type</th>
                  <th>Properties</th>
                  <th></th>
                </tr>
                </thead>
                <tbody>
                    <?php $counter=0;?>
                    <?php foreach($Assets as $Asset) { ?>
                    <?php $row_id = ++$counter; ?>
                    <?php $asset_id = $Asset['asset_field_values']['id'];
                          $user_id = $Asset['asset_field_values']['user_id'];
                    ?>
                    <tr>
                      <td>
                          <?php $name = $Asset['asset_field_values']['name'];
                                echo $this->Html->link($name,array('controller'=>'Assets','action'=>'assetdetails',$asset_id),array('escape'=>false));
                          ?>
                      </td>
                      <td>
                          <?php echo $this->Html->link($Asset['users']['first_name'].' '.$Asset['users']['last_name'],array('controller' => 'users', 'action' => 'userdetail',$user_id));?>
                      </td>
                      <td>
                          <?php echo "N/A"; ?>
                      </td>
                      <td>
                          <?php echo $Asset['asset_field_values']['serial_number'];?>
                      </td>
                      <td>
                          <?php echo $Asset['asset_field_values']['type'];?>
                      </td>
                      <td>
                          <?php $property =$Asset['asset_field_values']['properties'];
                          //pr($property);
                            if($property!='')
                            {
                              $json = json_decode($property, true);
                              $count= count($json['name']);
                              if($count==1)
                              {
                                echo '<p><b>'.$json['name'][1].': </b>'.$json['value'][1].'</p>';
                              }
                              else{
                                for($i=1;$i<=$count;$i++)
                                {         
                              echo '<p><b>'.$json['name'][$i].': </b>'.$json['value'][$i].'</p>';
                                } 
                              }
                              
                            }?>
                      </td>
                      <td>
                          <?php echo $this->Html->link('<i class="btn btn-default fa fa-check-square-o"></i>',array('controller'=>'Assets','action'=>'assetfieldvalueedit','?' => array('asset_id' => $asset_id)),array('escape'=>false));?>

                          <?php echo $this->Html->link('<i class="btn btn-danger  fa fa-times"></i>',array('controller' => 'Assets', 'action' => 'assetcustomfieldvaluedelete',$asset_id),array('escape'=>false,'confirm' => 'Are you sure you wish to delete this Asset?'));?>

                      </td>
                    </tr>  
                  <?php }?>      
                </tbody>
              </table>  
            </div>
          </div>
      </div>
    </div>
  </div>
</div>