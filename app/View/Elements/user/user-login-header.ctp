
  <section>
   
        <nav class="navbar navbar-inverse" role="navigation">

        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
              <span class="sr-only">Toggle navigation</span>
              <i class="fa fa-gear"></i>
            </button>
            <a class="navbar-brand" href="/">
                Repair shop
            </a>
            </div>

            <ul class="nav navbar-nav navbar-right user-menu">
                 <li>
                          <?php echo $this->Html->link('Sign in',array('controller'=>'users','action'=>'login'),array('escape'=>false));?>
                      </li>
            </ul>
        </div> <!-- /.container -->
        </nav>

 </section>