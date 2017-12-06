<?php echo $this->Flash->render('positive'); ?>
<div class="warper container-fluid" style="margin-bottom:50px; margin-top:10px;"> 
    <span class="text-right" ><h4><?php echo $this->Html->link('Add New Category',array('controller'=>'Categories','action'=>'add'),array('escape'=>false , 'class'=>'btn btn-success m-b-sm'));?>

        </h4>
    </span>  
    <div class="panel panel-white" >
        <div class="panel-heading clearfix">
            <h4 class="panel-title">All Categories</h4>
            
          
        </div>

        <div class="panel-body">
            
            <div class="table-responsive">
            <table id="example" class="display table" style="width: 100%; cellspacing: 0; ">
                <thead>
                  <tr>    
                        <th>#</th> 
                        <th>Category</th>
                        <th>Sub Category </th>
                        <th> Category Description</th>
                        <th>Action</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>    
                        <th>#</th> 
                        <th>Category</th>
                        <th>Sub Category </th>
                        <th> Category Description</th>
                        <th>Action</th>
                  </tr>
                </tfoot>
                <tbody>
                 <?php $counter=0;?>
                    <?php foreach($categories as $cat) {?>
                      <tr>
                        <td><?php echo ++$counter;?> </td>
                        <td><?php $category = $cat['Category']['category'];?>
                            
                            <?php echo $this->Html->link(ucfirst($category),array('controller'=>'categories','action'=>'categoryview',$cat['Category']['id']),array('escape'=>false));?>

                        </td>
                        <td><?php echo $cat['Category']['category_type'];?></td>
                        <td><?php echo $cat['Category']['description']; ?></td>
                      
                        <td>
                        <?php echo $this->Html->link('<i class="btn btn-primary fa fa-edit"></i>',array('controller'=>'categories','action'=>'categoryedit',$cat['Category']['id']),array('escape'=>false));?>
                          
                        
                        

                        <?php echo $this->Html->link('<i class="btn btn-danger fa fa-remove"></i>',array('controller' => 'categories', 'action' => 'deletecategory',$cat['Category']['id']),array('escape'=>false,'confirm' => 'Are you sure you wish to delete this category?'));?>

                        <?php echo $this->Html->link('<i class="btn btn-success fa fa-eye"></i>',array('controller'=>'categories','action'=>'categoryview',$cat['Category']['id']),array('escape'=>false));?>
            
                        </td>
                      </tr>    
                   <?php } ?>    
        
                </tbody>
            </table>  
            </div>
        </div>
    </div>
</div>    