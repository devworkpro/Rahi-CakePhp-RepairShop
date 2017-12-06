<?php echo $this->Flash->render('positive'); ?>
<div class="warper container-fluid" style="margin-bottom: 40px;">
	<div class="page-header"><h1>Wiki Details

	<span class="pull-right">
		<?php echo $this->Html->link('Edit',array('controller' => 'Wikis', 'action' => 'wikiedit',$Wiki['Wiki']['id']),array('escape'=>false,'class'=>'btn btn-default'));?>
	
	</span>
	</h1>
	</div>

	<div class="row">
          <div class="col-md-1">
          
          </div>
          <div class="col-md-10">
            <div class="panel panel-default">
              	
                <div class="panel-body"><br>
                <div class="row">                 
					<div class="col-xs-12 col-sm-12">
						<div class="form-group">
	                	<?php echo $this->Html->link('Main Wiki Page',array('controller' => 'Wikis', 'action' => 'wikilist'),array('escape'=>false,'class'=>'btn btn-default','style'=>'margin-left:20px;'));?>
	                	<?php echo $this->Html->link('View',array('controller' => 'Wikis', 'action' => 'wikidetails',$Wiki['Wiki']['id']),array('escape'=>false,'class'=>'btn btn-default','style'=>'margin-left:20px;'));?>
	                	<?php echo $this->Html->link('Edit',array('controller' => 'Wikis', 'action' => 'wikiedit',$Wiki['Wiki']['id']),array('escape'=>false,'style'=>'margin-left:20px;'));?>
	                	<?php echo $this->Html->link('Delete',array('controller' => 'Wikis', 'action' => 'deleteWiki',$Wiki['Wiki']['id']),array('escape'=>false,'class'=>'btn btn-danger','style'=>'margin-left:20px;'));?>
	                  	</div>
	                  	<hr>
	                </div>
	            </div>
	            <div class="row">                 
					<div class="col-xs-12 col-sm-12">
						<div class="form-group">
							<h2><?php echo '<b>'.ucfirst($Wiki['Wiki']['name']).'</b>';?></h2>
						</div>
						<div class="form-group">
							<?php echo $Wiki['Wiki']['body'];?>
						</div>
						<hr>
					</div>
				</div>
                </div>
                <div class="row">                 
					<div class="col-xs-12 col-sm-12">
						<div class="form-group">
	                	<?php echo $this->Html->link('Main Wiki Page',array('controller' => 'Wikis', 'action' => 'wikilist'),array('escape'=>false,'class'=>'btn btn-default','style'=>'margin-left:20px;'));?>
	                	<?php echo $this->Html->link('View',array('controller' => 'Wikis', 'action' => 'wikidetails',$Wiki['Wiki']['id']),array('escape'=>false,'class'=>'btn btn-default','style'=>'margin-left:20px;'));?>
	                	<?php echo $this->Html->link('Edit',array('controller' => 'Wikis', 'action' => 'wikiedit',$Wiki['Wiki']['id']),array('escape'=>false,'style'=>'margin-left:20px;'));?>
	                	<?php echo $this->Html->link('Delete',array('controller' => 'Wikis', 'action' => 'deleteWiki',$Wiki['Wiki']['id']),array('escape'=>false,'class'=>'btn btn-danger','style'=>'margin-left:20px;'));?>
	                  	</div>
	                  	
	                </div>
	            </div>
            </div>
          </div>

          <div class="col-md-1">
          </div>
      </div>
</div>
	
	

