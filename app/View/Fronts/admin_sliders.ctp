<?php 
//pr($auto);die();
?>
<section class="content">
		<div class="row">
			<div class="col-md-12">

			<div class="box">
                <div class="box-header">
                  <h3 class="box-title">All Sliders</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Title</th>
                        <th>Thumbnail</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php foreach($allSlides as $slides) {?>
                      <tr>
					             <td><?php echo $slides['Slider']['title'];?></td>
                        <td><?php echo $this->Html->image('slider_image/small/'.$slides['Slider']['slider_image'],array('alt' => 'CakePHP','class'=>'user-image'));?></td>
                        <td><?php echo $this->Html->link('<i class="fa fa-edit"></i>',array('controller'=>'fronts','action'=>'slideredit',$slides['Slider']['id']),array('escape'=>false));?>
                        <?php echo $this->Html->link('<i class="fa fa-remove"></i>',array('controller' => 'fronts', 'action' => 'deleteslider',$slides['Slider']['id']),array('escape'=>false,'confirm' => 'Are you sure you wish to delete this Image?'));?>
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
 
	