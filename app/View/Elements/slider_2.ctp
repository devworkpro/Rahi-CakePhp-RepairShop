<section>
	<div class="banner">
    <div class="bnr_text">
  <div class="container">
  <?php if(isset($bannerText))
      echo $bannerText;
   ?>
  </div>
  </div>
      <img src="<?php echo $this->webroot?>images/<?php echo $banner;?>" alt="banner" />
				<div class="nav_main">
					<div class="container">
						<div class="navigation">
							<nav class="navbar navbar-default">
 								 <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
      <?php 
       echo $this->Html->link(
            $this->Html->tag('span', '', array('class' => 'fa fa-home')),
            array('controller' => 'pages', 'action' => 'display'),
             array('class' => 'some other  classes', 'escape' => false)
              );
      ?>

         <li> <?php 
                echo $this->Html->link(
            $this->Html->tag('span', '', array('class' => 'sr-only">(current)')) . "VIDYAVIHAR",
            array('controller' => 'pages', 'action' => 'slot_1'),
             array('class' => 'some other  classes', 'escape' => false)
              );
              ?>
                </li>
                 <li> <?php 
                echo $this->Html->link(
                    'AYURVIHAR',
                    array(
                        'controller' => 'pages',
                        'action' => 'slot_1'
                    )
                );
                ?>

                </li>
                 
		</ul>	
    </div><!-- /.navbar-collapse -->

  </div><!-- /.container-fluid -->
							</nav><!-- /navbar navbar-defaul -->
						</div><!--navigation-->
			        </div><!--container-->
				</div><!--nav-main-->
					<div class="slide-out">
						<span id="show" class="vericaltext"> Contact</span>
						<div class="tbbr hide_it">


    <ul>
      <li>
    	<input type="text" placeholder="Name">
      </li>
      <li>
    	<input type="text" placeholder="Email">
      </li>
      <li>
   			<textarea name="" cols="" placeholder="Write your message" rows=""></textarea>
      </li>
      <li class="tb_btn">
    	<button type="button">SEND</button>
      </li>
    </ul>

</div>
					</div>
					<div class="slide-out2">
						<span id=show_cnt class="vericaltext">Events</span>
						<div class="tbbr hide_it">


    <ul>
      <li>
    	<input type="text" placeholder="Name">
      </li>
      <li>
    	<input type="text" placeholder="Email">
      </li>
      <li>
   			<textarea name="" placeholder="Write your message" cols="" rows=""></textarea>
      </li>
      <li class="tb_btn">
    	<button type="button">SEND</button>
      </li>
    </ul>

</div>
					</div>
	</div><!--banner-->
</section>