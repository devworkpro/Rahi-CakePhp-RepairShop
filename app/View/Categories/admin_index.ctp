<?php echo $this->Flash->render('positive'); ?>
<section class="content">
    <div class="row">
      <div class="col-md-12">

      <div class="box">
                <div class="box-header">
                  <h3 class="box-title">All Category</h3>
                </div><!-- /.box-header -->
                <div class="box-body">


<table id="k_userlist" class="table table-bordered table-striped">
                   <thead>
                      <tr>
                        <th>Title</th>
                        <th>Images</th>
                        <th>Order</th>
                        <th>status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php foreach($allCategory as $category) {?>
                      <tr>
                        <td><?php echo $category['Category']['title'];?></td>
                        <td><?php echo $this->Html->image('category_image/small/'.$category['Category']['image'],array('alt' => 'CakePHP','class'=>'user-image'));?></td>
                         <td><?php echo $category['Category']['order'];?></td>
                         <td>
                          <?php if($category['Category']['status'] == 'true'){$check = 'checked';}else{$check='';}?>
                          <?php
                          echo $this->Form->checkbox('status', array('hiddenField' => false,'data-toggle' => 'toggle', 'data-on'=>'Enabled','data-off'=>'Disabled','data-onstyle'=>'warning','class'=>'status_checks','data' =>  $category['Category']['id'],$check));
                          ?>
                        </td>  
                        <td>
                         <?php echo $this->Html->link('<i class="fa fa-eye"></i>',array('controller'=>'Categories','action'=>'view',$category['Category']['id']),array('escape'=>false));?>
                        <?php echo $this->Html->link('<i class="fa fa-edit"></i>',array('controller'=>'Categories','action'=>'edit',$category['Category']['id']),array('escape'=>false));?>
                        <?php echo $this->Html->link('<i class="fa fa-remove"></i>',array('controller' => 'Categories', 'action' => 'delete',$category['Category']['id']),array('escape'=>false,'confirm' => 'Are you sure you wish to delete this Image?'));?>
                        </td>
                      </tr>    
                   <?php } ?>                 
                    </tbody>
                  </table>



                
                </div><!-- /.box-body -->
              </div><!-- /.box -->
      </div>
    </div>
  </section>
 <script type="text/javascript">
      $('#status').change(function(){
       url = "/svv/Categories/status";
       var val = $(this).prop('checked');
       var id = $(this).attr('data');
       $.ajax({
        type:"GET",
        url: url,
        data: {id:id,status:val},
        success: function(data)
        {   
          console.log(data);
          
        }
      });

     });
   </script>
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
  <script src="<?php echo $this->webroot.'Plugins/datatables/jquery.dataTables.min.js';?>"></script>
  <script src="<?php echo $this->webroot.'Plugins/datatables/dataTables.bootstrap.min.js';?>"></script>
   <link rel="stylesheet" href="<?php echo $this->webroot.'Plugins/datatables/dataTables.bootstrap.css';?>">
  <script>
      $(function () {
        $('#k_userlist').DataTable();
      });
    </script>
   