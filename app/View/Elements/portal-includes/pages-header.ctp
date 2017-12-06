<header>
  <div class="head">
    <div class="container">
      <div class="col-xs-12 col-sm-5">
        <div class="head_logo">
          <h1><a href="/runningportal"><?php echo $this->Html->image('portal-images/logo2.png'); ?></a></h1>
          </div><!--head_nav-->
        </div>
        <div class="col-xs-12 col-sm-7">
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
                    <li>
                      <button type="button" class="btn btn-primary btn-lg register_pop_btn" data-toggle="modal" data-target="#myModal">
                      <span class="glyphicon glyphicon-user"></span> Sign Up
                      </button>                    
                    </li>
                    <li>
                    <button type="button" class="btn btn-primary btn-lg login_pop_btn register_pop_btn" data-toggle="modal" data-target="#myModal2">
                    <span class="glyphicon glyphicon-log-in"></span> Login
                    </button>
                    <!-- model end -->
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