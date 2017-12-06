<?php echo $this->Flash->render('positive'); ?>
<div class="warper container-fluid" style="margin-bottom:50px;">
	<div class="page-header"><h1>Category Details <span><?php echo $this->Html->link('<i class="fa fa-arrow-left"></i> Back',array('controller' => 'categories', 'action' => 'categorylist'),array('escape'=>false,'class'=>'btn btn-default pull-right'));?></span></h1></div>
	<div class="panel panel-default">
        <div class="panel-heading">Category View</div>
        <div class="panel-body">

			<table class="table table-bordered table-striped dataTable no-footer">      
			    <tr><th>Category</th>
					<td><?php echo $category['Category']['category']; ?></td></tr>
				<tr><th>Sub Category </th>
					<td><?php echo $category['Category']['category_type']; ?></td></tr>
				<tr><th>Category Description</th>
					<td><?php echo $category['Category']['description']; ?></td></tr>
				<tr><td colspan="2">
					<?php echo $this->Html->link('Edit',array('controller'=>'categories','action'=>'categoryedit',$category['Category']['id']),array('escape'=>false,'class'=>'btn btn-primary'));?>&nbsp;&nbsp;
					<?php echo $this->Html->link('Back',array('controller' => 'categories', 'action' => 'categorylist'),array('escape'=>false,'class'=>'btn btn-default'));?>
					</td> 
				</tr> 
			</table>
		</div><!-- /.box-body -->
  	</div><!-- /.box -->
</div>
 
  