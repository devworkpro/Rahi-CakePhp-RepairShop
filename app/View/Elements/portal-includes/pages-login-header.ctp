<?php //echo '<pre>';print_r($userLoggedDetail);?>
<header>
  <div class="head">
    <div class="container">
      <div class="col-xs-12 col-sm-4">
        <div class="head_logo">
          <h1><a href="/runningportal"><?php echo $this->Html->image('portal-images/logo2.png'); ?></a></h1>
          </div><!--head_nav-->
        </div>
        <div class="col-xs-12 col-sm-8">
          <div class="head_nav">
            <nav class="navbar navbar-inverse">
              <div class="container-fluid">
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  </button>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                  <ul class="nav navbar-nav">
                  <li> <?php echo $this->Html->link('ABOUT US',array('controller'=>'pages','action'=>'page','about-us')); ?></li>
                  <li> <?php echo $this->Html->link('HOW IT WORKS',array('controller'=>'pages','action'=>'page','howitworks')); ?></li>
                  <li> <?php echo $this->Html->link('COURSES',array('controller'=>'courses','action'=>'index')); ?></li>
                    <li>
                    <?php if($userLoggedDetail['User']['username']){
                  echo $this->Html->link($userLoggedDetail['User']['username'],array('controller'=>'users','action'=>'profile'));
                  }else{
                    echo $this->Html->link($userLoggedDetail['User']['first_name'],array('controller'=>'users','action'=>'profile'));
                    } ?>
                    </li>
                    <li>
                   <?php echo $this->Html->link('LOGOUT',array('controller'=>'users','action'=>'logout')); ?>
                    </li>
                </ul>
              </div>
            </div>
          </nav>
          </div><!--head_nav-->
        </div>
      </div>
      </div><!--head-->
    </header>