<section class="content">
		<div class="row">
			<div class="col-md-12">

			<div class="box">
                <div class="box-header">
                  <h3 class="box-title">All Badges</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <?php foreach($allBadges as $value) {

                       $status=$value['Badge']['status'];
                      ?>

                    <tbody>
                      <td><?php echo $value['Badge']['name'];?></td>
                      <td><?php echo $this->Html->image('badge_images/'.$value['Badge']['image'],array('alt' => 'CakePHP','class'=>'user-image'));?></td>
                      <td> <?php if($status == 0){ echo 'Deactivate';}else{ echo 'Activate';} ?></td>
                      <td><?php echo $this->Html->link('<i class="fa fa-edit"></i>',array('controller'=>'Badges','action'=>'edit',$value['Badge']['id']),array('escape'=>false));?>
                      <?php echo $this->Html->link('<i class="fa fa-remove"></i>',array('controller' => 'Badges', 'action' => 'delete',$value['Badge']['id']),array('escape'=>false,'confirm' => 'Are you sure you wish to delete this badge?'));?>
                    </td>
                    </tbody>
                    <?php }?>
                  </table>
                </div>
      </div>
    </div>
  </div>
</section>
