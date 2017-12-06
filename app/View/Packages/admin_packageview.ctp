<?php echo $this->Flash->render('positive'); ?>
<div class="warper container-fluid" style="margin-bottom: 70px;">
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box">
                <div class="page-header">
					<h3 class="box-title">Package View <span><?php echo $this->Html->link('<i class="fa fa-arrow-left"></i> Back',array('controller' => 'Packages', 'action' => 'packagelist'),array('escape'=>false,'class'=>'btn btn-default pull-right'));?></span></h3>
					
                </div><!-- /.box-header -->
                <div class="box-body">

					<table class="table table-bordered table-striped dataTable no-footer">      
    
						<tr><th>Package</th>
							<td><?php echo ucfirst($Package['Package']['title']); ?></td></tr>
						<tr><th>Package Price</th>
							<td><?php echo '$'.$Package['Package']['price'].'.00'; ?></td></tr>
						<tr><th>Package Status</th>
							<td><?php echo $Package['Package']['status']; ?></td></tr>
						<tr><th>Feature 1</th>
							<td><?php echo $Package['Package']['feature_1']; ?></td></tr>
						<tr><th>Feature 2</th>
							<td><?php echo $Package['Package']['feature_2']; ?></td></tr>
						<tr><th>Feature 3</th>
							<td><?php echo $Package['Package']['feature_3']; ?></td></tr>
						<tr><th>Feature 4</th>
							<td><?php echo $Package['Package']['feature_4']; ?></td></tr>
						<tr><th>Feature 5</th>
							<td><?php echo $Package['Package']['feature_5']; ?></td></tr>
						<tr><th>Feature 6</th>
							<td><?php echo $Package['Package']['feature_6']; ?></td></tr>
						
   
						<tr><td colspan="2">
						<?php echo $this->Html->link('Edit',array('controller'=>'packages','action'=>'packageedit',$Package['Package']['id']),array('escape'=>false,'class'=>'btn btn-primary'));?>
						
						</td> 
						</tr>    

					</table>
				</div><!-- /.box-body -->
			</div><!-- /.box -->
		</div>
	</div>
  </section>
</div>  