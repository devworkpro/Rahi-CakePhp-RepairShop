<footer>
<div class="footer_block"><div class="arrow">
<span class="pull-left">
<?php echo $this->Html->image('portal-images/pic1.png'); ?>
</span> <span class="pull-right"><?php echo $this->Html->image('portal-images/pic2.png'); ?>
</span></div>
<div class="container">
<div class="col-xs-12 col-sm-3">
<div class="foot_lft">
<a href="#"><?php echo $this->Html->image('portal-images/logo.png'); ?>
</a>
</div>
  
</div><!--foot-->


<div class="col-xs-12 col-sm-3">
<div class="foot">
<h4>ABOUT</h4>
<ul>
<li> <?php echo $this->Html->link('About Us',array('controller'=>'pages','action'=>'page','about-us')); ?></li>
<li> <?php echo $this->Html->link('How It Works',array('controller'=>'pages','action'=>'page','howitworks')); ?><a href="#"></a></li>
<li> <?php echo $this->Html->link('Privacy Policy',array('controller'=>'pages','action'=>'page','privacy')); ?></li>
<li> <?php echo $this->Html->link('Terms and Conditions',array('controller'=>'pages','action'=>'page','terms')); ?></li>
</ul>

</div><!--foot-->
</div>
<div class="col-xs-12 col-sm-3">
<div class="foot">
<h4>MORE</h4>
<ul>
<?php if(!$this->Session->read('User_id')){ ?>
<li><!--a href="javascript:void(0)" data-toggle="modal" data-target="#myModal">Sign Up</a--></li>
<li><?php echo $this->Html->link('Sign up',array('controller'=>'users','action'=>'register')); ?></li>
<li> <?php echo $this->Html->link('Login',array('controller'=>'users','action'=>'login')); ?></li>
<?php } ?>
<li><?php echo $this->Html->link('Courses',array('controller'=>'courses','action'=>'index')); ?></li>
<li> <?php echo $this->Html->link('Request a course',array('controller'=>'courses','action'=>'requestCourse')); ?></li>
<li> <a href="#">Contact Us  </a></li>
</ul>
</div><!--foot-->
</div>
<div class="col-xs-12 col-sm-3">
<div class="foot">
<h4>FOLLOW US</h4>


<a target="_blank" href=""><?php echo $this->Html->image('portal-images/f.png',array('class'=>'hvr-grow')); ?></a>
<a target="_blank" href=""><?php echo $this->Html->image('portal-images/g.png',array('class'=>'hvr-grow')); ?></a>
<a href="#"><?php echo $this->Html->image('portal-images/t.png',array('class'=>'hvr-grow')); ?></a>
</div><!--foot-->
</div>

</div><!--container-->
</div><!-- footer_block -->

<input type="hidden" value="http://112.196.42.180:4134/repairshopsaas/" id="siteurl">

</footer>