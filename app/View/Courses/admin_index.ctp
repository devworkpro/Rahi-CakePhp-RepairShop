    <section class="content">
    <div class="row">
      <div class="col-md-12">



      <div class="box">
                <div class="box-header">
                  <h3 class="box-title">All Courses</h3>
                </div><!-- /.box-header -->
                <div class="box-body">

  
<table id="courseTable" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Location</th>
                        <th>Type</th>      
                        <th>Actions</th>                  
                      </tr>
                    </thead>
                    <tbody class="userdata">
<?php //echo '<pre>';print_r($data);die; ?>
                    <?php $i = 1; foreach($data as $courses) {?>

                    <?php $type = $courses['Course']['type2']; ?>
                      <tr>
                      <td><?php echo $courses['Course']['Name']; ?></td>
                      <td><?php echo $courses['Course']['location']; ?></td> 
                      <td><?php if($type == 0){ echo 'Line';}else if($type == 1){echo 'Score';}else{ echo 'Scatter';} ?></td>        
                      <td><?php echo $this->Html->link('<i class="fa fa-edit"></i>',array('controller'=>'courses','action'=>'edit',$courses['Course']['id']),array('escape'=>false));?>
                        <?php echo $this->Html->link('<i class="fa fa-remove"></i>',array('controller' => 'courses', 'action' => 'delete',$courses['Course']['id']),array('escape'=>false,'confirm' => 'Are you sure you wish to delete this Course?'));?>
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


  <script src="<?php echo $this->webroot.'Plugins/datatables/jquery.dataTables.min.js';?>"></script>
  <script src="<?php echo $this->webroot.'Plugins/datatables/dataTables.bootstrap.min.js';?>"></script>
   <link rel="stylesheet" href="<?php echo $this->webroot.'Plugins/datatables/dataTables.bootstrap.css';?>">
  <script>
      $(function () {
        $('#courseTable').DataTable();
      });
    </script>