    <section class="content">
		<div class="row">
			<div class="col-md-12">

			<div class="box">
                <div class="box-header">
                  <h3 class="box-title">All CMS pages</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Title</th>
                        <th>Page Key</th>
                        <th>Action</th>                         
                      </tr>
                    </thead>
                    <tbody>
                    <?php foreach($pages as $page) {?>
                      <tr>
                        <td><?php echo $this->Html->link($page['Page']['title'],array('controller'=>'pages','action'=>'page',$page['Page']['key'],'admin'=>false),array('escape'=>false));?></td>
                        <td><?php echo $page['Page']['key'];?></td>
                        <td><?php echo $this->Html->link('<i class="fa fa-edit"></i>',array('controller'=>'pages','action'=>'editpage',$page['Page']['id']),array('escape'=>false));?>
                        <?php echo $this->Html->link('<i class="fa fa-remove"></i>',array('controller' => 'pages', 'action' => 'deletepage',$page['Page']['id']),array('escape'=>false,'confirm' => 'Are you sure you want to delete the CMS page?'));?>
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