<header>
<div class="blue_bg">
	<div class="container">
		<div class="row">
			<div class="col-md-3 col-sm-4 col-xs-12"> 
			    <a href="#">
			    <?php echo $this->Html->image('../images/frontend/logo.png', array('class'=>"logo",'alt' => 'The Repair'));?>
			    </a>

			</div>
			<div class="col-md-9 col-sm-8 col-xs-12"> 
			<div class="navbar navbar-default navi">
				<div class="collapse navbar-collapse pull-right" id="responsive-menu">
			    <ul class="nav navbar-nav nav-list">
				<li><a href="#">Home <i class="fa fa-chevron-down" aria-hidden="true"></i></a></li>
				<li><a href="#">Blog <i class="fa fa-chevron-down" aria-hidden="true"></i></a></li>
				<li><!-- <a href="#">Features <i class="fa fa-chevron-down" aria-hidden="true"></i></a> -->
				<?php echo $this->Html->link('Features',array('controller'=>'users','action'=>'feature'),array('escape'=>false));?>

				</li>
				<li>
				<?php echo $this->Html->link('Pricing',array('controller'=>'users','action'=>'pricing'),array('escape'=>false));?>
				</li>
				<li><a href="#">Services <i class="fa fa-chevron-down" aria-hidden="true"></i></a></li>
				<li><a href="#">Contacts</a></li>
			   	</ul>
				   </div>
				</div>
			</div>
		</div><!-- row -->
	</div><!-- container  -->
</div><!-- blue_bg -->
</header>