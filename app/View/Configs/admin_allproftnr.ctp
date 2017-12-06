   <section class="content">
		<div class="row">
			<div class="col-md-12">

			<div class="box">
                <div class="box-header">
                  <h3 class="box-title">All Professional Plans</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Title</th>
                        <th>Description</th>
						 <th>Price</th>
                        <th>No of Events</th>
						
                      </tr>
                    </thead>
                    <tbody>
                    <?php foreach($bundle as $bnd) {?>
                      <tr>
                     <td><?php echo $bnd['Bundle']['title'];?></td>
                        <td><?php echo $bnd['Bundle']['description']; ?></td>
						 <td><?php echo $bnd['Bundle']['price'];?></td>
                        <td><?php echo $bnd['Bundle']['no_of_events']; ?></td>
                        <td><?php echo $this->Html->link('<i class="fa fa-edit"></i>',array('action'=>'editproftnr',$bnd['Bundle']['id']),array('escape'=>false));?>
                        <?php echo $this->Html->link('<i class="fa fa-remove"></i>',array('action' => 'deleteproftnr',$bnd['Bundle']['id']),array('escape'=>false,'confirm' => 'Are you sure you want to delete this user?'));?>
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
        $('#example1').DataTable();
      });
    </script>
