<?php echo $this->Flash->render('positive'); ?>
<div class="warper container-fluid" style="margin-bottom:50px; margin-top:10px;"> 

<div class="page-header">
    <h2>Menus
        <span class="pull-right"><?php echo $this->Html->link('New',array('controller'=>'Menus','action'=>'add'),array('escape'=>false, 'class'=>'btn btn-success'));?> 

        </span>
    </h2>
</div>
<br>
    <div class="panel panel-white" >
        <div class="panel-heading clearfix">
            <h4 class="panel-title"> Menus</h4>
        </div>

        <div class="panel-body">
            
            <div class="table-responsive">
            <table id="example" class="display table table-hover table-bordered" style="width: 100%;">
                <thead>
                <tr>    
                    <th>Name</th>
                    <th>Order</th>
                    <th>Link</th>
                    <th>Icon</th>
                    <th></th>
                    
                </tr>
                </thead>
                
                <tbody>
                    <?php $counter=0;?>
                        <?php foreach($Menus as $Menu) {
                            $id = $Menu['Menu']['id'];
                        ?>

                        <tr>
                            <td>
                                <?php $name = $Menu['Menu']['name']; 
                                echo $this->Html->link($name,array('controller'=>'Menus','action'=>'menuedit',$id),array('escape'=>false));
                                ?>
                            </td>
                            <td>
                                <?php echo $Menu['Menu']['menu_order']; ?>
                            </td>
                            <td>
                                <?php echo $Menu['Menu']['link']; ?>
                            </td>
                            <td>
                                <?php echo $Menu['Menu']['icon']; ?>
                            </td>                            
                            <td>
                                <?php echo $this->Html->link('<i class="btn btn-success btn-sm fa fa-pencil"></i>',array('controller' => 'Menus', 'action' => 'menuedit',$id),array('escape'=>false));?>                           
                                <?php echo $this->Html->link('<i class="btn btn-danger btn-sm fa fa-remove"></i>',array('controller' => 'Menus', 'action' => 'deleteMenu',$id),array('escape'=>false,'confirm' => 'Are you sure?'));?>
                            </td>
                        </tr> 

                        <?php } ?>  
                </tbody>
            </table>  
            </div>
        </div>
    </div>
</div>            