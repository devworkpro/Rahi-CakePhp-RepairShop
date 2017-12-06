<?php echo $this->Flash->render('positive'); ?>
<div class="warper container-fluid" style="margin-bottom:50px; margin-top:10px;"> 

<div class="page-header">
    <h2>Wiki! 
        <span class="pull-right"><?php echo $this->Html->link('New Page',array('controller'=>'Wikis','action'=>'add'),array('escape'=>false, 'class'=>'btn btn-success'));?>             
        </span>
    </h2>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="usercontent mtm">
            <h2> <b>Welcome to The Wiki!</b></h2>
            <p>This is where you can look for internal documentation.</p>
            <h4><b> Example Second level header </b></h4>
            <p>If you want a left navigation (menu) on the wiki pages, just create an article with the name 'left-nav' and it will stick on the left on all pages</p>
        </div> 
    </div>
</div>
<br>
    <div class="panel panel-white" >
        <div class="panel-heading clearfix">
            <h4 class="panel-title"> Wikis</h4>
        </div>

        <div class="panel-body">
            
            <div class="table-responsive">
            <table id="example" class="display table table-hover" style="width: 100%;">
                <thead>
                <tr>    
                    <th>Name</th>
                    <th>Last modified</th>
                    <th></th>
                    <th></th>
                    
                </tr>
                </thead>
                
                <tbody>
                    <?php $counter=0;?>
                        <?php foreach($Wikis as $wiki) {
                            //pr($wiki);
                            $id = $wiki['Wiki']['id'];
                        ?>

                        <tr>
                            <td>
                                <?php $name = $wiki['Wiki']['name']; 
                                echo $this->Html->link($name,array('controller'=>'Wikis','action'=>'wikidetails',$id),array('escape'=>false));
                                ?>
                            </td>
                            <td>
                                <?php echo date('D d-m-Y g:i A',strtotime($wiki['Wiki']['modified']));?>
                            </td>
                                                       
                            <td>
                                <?php echo $this->Html->link('<i class="btn btn-warning btn-sm fa fa-pencil"></i>',array('controller' => 'Wikis', 'action' => 'wikiedit',$id),array('escape'=>false));?>
                            </td>
                            <td>
                                <?php echo $this->Html->link('<i class="btn btn-danger btn-sm fa fa-remove"></i>',array('controller' => 'Wikis', 'action' => 'deleteWiki',$id),array('escape'=>false,'confirm' => 'Are you sure?'));?>
                            </td>
                        </tr> 

                        <?php } ?>  
                </tbody>
            </table>  
            </div>
        </div>
    </div>
</div>            