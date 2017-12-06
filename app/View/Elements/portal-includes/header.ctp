<header>
  <div class="head">
    <div class="container">
      <div class="col-xs-12 col-sm-5">
        <div class="head_logo">
          <h1><a href=""><?php echo $this->Html->image('portal-images/logo2.png'); ?></a></h1>
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
                      
                      <!--<a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a>-->
                      <button type="button" class="btn btn-primary btn-lg register_pop_btn" data-toggle="modal" data-target="#myModal">
                      <span class="glyphicon glyphicon-user"></span> Sign Up
                      </button>
                      
                      
                    </li>
                    <li><!--<a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a>-->
                    
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
      <div class="slider">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
          <!-- Indicators -->
          <ol class="carousel-indicators">
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
          </ol>
          <!-- Wrapper for slides -->
          <div class="carousel-inner" role="listbox">
            <?php $i =0; foreach ($sliders as $slider) { $image = $slider['Slider']['slider_image']; $source=$slider['Slider']['created']; $date= new DateTime($source);
            ?>
            <div class="item <?php if($i ==0){ echo 'active';}?>">
              <?php echo $this->Html->image('slider_image/large/'.$image); ?>
              <div class="carousel-caption">
                <div class="slider_content">
                  <h4 class="text-center"><?php echo $slider['Slider']['title'];?> <span class="clearfix"></span>  </h4>
                  <hr class="blck_line"></hr>
                  <p class="text-center"><?php echo $slider['Slider']['description'];?></p>
                  </div><!--slider_content-->
                </div>
              </div>
              <?php $i++;} ?>
            </div>
            <!-- Controls -->
            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
              <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
              <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
          </div><!--slider-->
        </header>