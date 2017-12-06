<?php echo $this->Flash->render('positive'); ?>
<div class="warper container-fluid" style="margin-bottom:50px; margin-top:10px;"> 

<div class="page-header">
    <h2>Service Level Agreements (SLAs)  
        <span class="pull-right"><?php echo $this->Html->link('New',array('controller'=>'Slas','action'=>'add'),array('escape'=>false, 'class'=>'btn btn-success'));?> 

        <?php echo $this->Html->link('Contracts',array('controller'=>'Contracts','action'=>'contractlist'),array('escape'=>false, 'class'=>'btn btn-default'));?> 
            
        </span>
    </h2>
</div>
<br>
    <div class="panel panel-white" >
        <div class="panel-heading clearfix">
            <h4 class="panel-title"> SLAs</h4>
        </div>

        <div class="panel-body">
            
            <div class="table-responsive">
            <table id="example" class="display table table-hover table-bordered" style="width: 100%;">
                <thead>
                <tr>    
                    <th>Name</th>
                    <th>Description</th>
                    <th>Time</th>
                    <th>Assignee</th>
                    <th></th>
                    
                </tr>
                </thead>
                
                <tbody>
                    <?php $counter=0;?>
                        <?php foreach($Slas as $sla) {
                            $id = $sla['Sla']['id'];
                        ?>

                        <tr>
                            <td>
                                <?php $name = $sla['Sla']['name']; 
                                echo $this->Html->link($name,array('controller'=>'Slas','action'=>'slaedit',$id),array('escape'=>false));
                                ?>
                            </td>
                            <td>
                                <?php echo $sla['Sla']['description']; ?>
                            </td>
                            <td>
                                
                            </td>
                            <td>
                                <?php echo $sla['Sla']['assign']; ?>
                            </td>                            
                            <td>
                                <?php echo $this->Html->link('Edit',array('controller' => 'Slas', 'action' => 'slaedit',$id),array('escape'=>false,'class'=>"btn btn-sm btn-default"));?>                           
                                <?php echo $this->Html->link('<i class="btn btn-danger btn-sm fa fa-remove"></i>',array('controller' => 'Slas', 'action' => 'deleteSla',$id),array('escape'=>false,'confirm' => 'Are you sure?'));?>
                            </td>
                        </tr> 

                        <?php } ?>  
                </tbody>
            </table>  
            </div>
        </div>
    </div>
</div>            