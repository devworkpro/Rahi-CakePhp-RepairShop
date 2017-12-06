
  <section>
    <?php $user_id = $this->Session->read('Auth.User.id');

    if($user_id!='')
    {?>
    <nav class="navbar navbar-inverse" role="navigation">

        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
              <span class="sr-only">Toggle navigation</span>
              <i class="fa fa-gear"></i>
            </button>
            <?php echo $this->Html->link($this->Session->read('Auth.User.admin_name'),array('controller'=>'pages','action'=>'dashboard'),array('escape'=>false,'class'=>'navbar-brand'));?>
           
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse xs-usernav" id="user-menu-partial">
                <div class="user-menu-notifications" style="min-width: 150px; float: left;">    <ul class="nav navbar-nav pull-right">
                  <li class="dropdown">
                    
                    <?php $reminder_counter=0; foreach ($User_Reminder as $reminder) {
                        $reminder_counter = $reminder_counter+1;
                        //pr($reminder);
                      }
                      
                    ?>
                     <?php echo $this->Html->link('<i class="fa fa-clock-o"></i> '.$reminder_counter.' reminders',array('controller'=>'Reminders','action'=>'reminderlist'),array('escape'=>false));?>

                  </li>
                </ul>

                <ul class="nav navbar-nav pull-right">
                  <li class="dropdown">
                    <?php echo $this->Html->link('<i class="fa fa-bolt"></i> Upgrade Account!',array('controller'=>'Payments','action'=>'plans'),array('escape'=>false));?>
                  </li>
                  

                </ul>
                </div>

                <ul class="nav navbar-nav navbar-right user-menu">
                    <li></li>
                    <!--user navigations/menus are rendering here-->
                    <li class="dropdown">
                    <a href="javscript:;" class="dropdown-toggle rscolr" data-toggle="dropdown">
                        <i class="fa fa-user"></i>
                        <?php echo $this->Session->read('Auth.User.first_name');?>
                  
                  
                    <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                      <!-- <li><a href="/settings/general">Settings</a></li> -->
                      <!-- <li><a class="timeclockr" href="/timelogs/punch?current_user=36548">Time Clock</a></li> -->
                      <li>
                       <?php echo $this->Html->link('Internal Wiki',array('controller'=>'Wikis','action'=>'wikilist'),array('escape'=>false));?>
                      </li>
                      <!--  <li>
                        <a href="/messages">
                          Messages 
                        </a>
                      </li> -->
                      <li>
                      <?php echo $this->Html->link('My Calendars',array('controller'=>'Calendars','action'=>'add'),array('escape'=>false));?>
                      </li>
                      <li>
                      <?php echo $this->Html->link('Appointments',array('controller'=>'Appointments','action'=>'appointmentlist'),array('escape'=>false));?>
                      </li>
                      
                      <li>
                      <?php echo $this->Html->link('<i class="fa fa-clock-o"></i> Reminder',array('controller'=>'Reminders','action'=>'reminderlist'),array('escape'=>false));?>
                      </li>
                      
                      <li>                      
                        <?php echo $this->Html->link('Profile/Password',array('controller'=>'users','action'=>'change_password'),array('escape'=>false));?>
                      </li>
                      <!-- <li><a href="/users/authorizations">OpenID Authorizations</a></li> -->
                      
                      <li class="divider"></li>
                      <li>
                        
                        <?php echo $this->Html->link('Switch User/Lock',array('controller'=>'users','action'=>'logout'),array('escape'=>false,'data-toggle'=>"modal", 'data-target'=>"#LockModal", 'data-backdrop'=>"static" , 'data-keyboard'=>"false"));?>
                      </li>
                      <li>
                          <?php echo $this->Html->link('Sign Out',array('controller'=>'users','action'=>'logout'),array('escape'=>false));?>
                      </li>
                    </ul>
                    </li>
                </ul>



                <!--search form (working condition)-->
                <!---->
            </div><!-- /.navbar-collapse -->
        </div> <!-- /.container -->
    </nav>

     <!-- Modal -->
    <div class="modal fade" id="LockModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel">Unlock Screen</h4>
          </div>
          <div class="modal-body">
          </div>
          <div class="modal-footer">
          </div>
        </div>
      </div>
    </div>

    <div class="subnavbar">

    <div class="subnavbar-inner">

    <div class="container">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>

       <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="mainnav">
          <!--When we have custom navs, we'll be able to:-->
            <!-- Tabs for full size screen -->
              <!-- Render all tabs, hide extra tabs on fullsize screen -->
              <li id="customer-nav" class=" nav-tab-fullsize">
                <?php echo $this->Html->link('<i class="fa fa-user"></i><span>Customers</span>',array('controller'=>'users','action'=>'index'),array('escape'=>false));?>
              </li>


              <!-- Render all tabs, hide extra tabs on fullsize screen -->
              <li id="assets-nav" class=" nav-tab-fullsize">
                <?php echo $this->Html->link('<i class="fa fa-desktop"></i><span>Assets</span>',array('controller'=>'Assets','action'=>'customerassets'),array('escape'=>false));?>
                
              </li>


              <!-- Render all tabs, hide extra tabs on fullsize screen -->
              <li id="contracts-nav" class=" nav-tab-fullsize">
                <?php echo $this->Html->link('<i class="fa fa-file-text-o"></i><span>Contracts</span>',array('controller'=>'Contracts','action'=>'contractlist'),array('escape'=>false));?>
                
              </li>


              <!-- Render all tabs, hide extra tabs on fullsize screen -->
              <li id="invoice-nav" class="  nav-tab-fullsize">
                <?php echo $this->Html->link('<i class="fa fa-shopping-cart"></i><span>Invoices</span>',array('controller'=>'Invoices','action'=>'invoicelist'),array('escape'=>false));?>
              </li>


              <!-- Render all tabs, hide extra tabs on fullsize screen -->
              <li id="customer-purchases-nav" class=" nav-tab-fullsize">
                <?php echo $this->Html->link('<i class="fa fa-mobile"></i><span>Customer<br>Purchases</span>',array('controller'=>'Orders','action'=>'orderlist'),array('escape'=>false));?>
              </li>


              <!-- Render all tabs, hide extra tabs on fullsize screen -->
              <li id="refurb-nav" class=" nav-tab-fullsize">
                <a href="/refurbs">
                  <i class="fa fa-wrench"></i>
                    <span>Refurbs</span>
                </a>
              </li>


              <!-- Render all tabs, hide extra tabs on fullsize screen -->
              <li id="estimate-nav" class=" nav-tab-fullsize">
                <?php echo $this->Html->link('<i class="fa fa-clock-o"></i><span>Estimates</span>',array('controller'=>'Estimates','action'=>'estimatelist'),array('escape'=>false));?>
              </li>


              <!-- Render all tabs, hide extra tabs on fullsize screen -->
              <li id="ticket-nav" class="   nav-tab-fullsize">
                <?php echo $this->Html->link('<i class="fa fa-check-square-o"></i><span>Tickets</span>',array('controller'=>'Tickets','action'=>'ticketlist'),array('escape'=>false));?>
              </li>


              <!-- Render all tabs, hide extra tabs on fullsize screen -->
              <li id="parts-nav" class="  nav-tab-fullsize">
                <?php echo $this->Html->link('<i class="fa fa-plane"></i><span>Parts</span>',array('controller'=>'Parts','action'=>'partlist'),array('escape'=>false));?>
              </li>


              <!-- Render all tabs, hide extra tabs on fullsize screen -->
              <li id="inventory-nav" class=" nav-tab-fullsize">
                <?php echo $this->Html->link('<i class="fa fa-barcode"></i><span>Inventory</span>',array('controller'=>'products','action'=>'productlist'),array('escape'=>false));?>
              </li>


              <!-- Render all tabs, hide extra tabs on fullsize screen -->
              <li id="purchase-orders-nav" class=" nav-tab-fullsize">
                <?php echo $this->Html->link('<i class="fa fa-truck"></i><span>Purchase<br> Orders</span>',array('controller'=>'PurchaseOrders','action'=>'purchaseorderlist'),array('escape'=>false));?>
                
              </li>

              <li class="dropdown sub-nav-tab-more">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                  <i class="fa fa-plus"></i>
                  <span>More</span>
                </a>

                <ul class="dropdown-menu" role="menu">
                  
                  <li id="field-job-nav" class=" ">
                    <?php echo $this->Html->link('<i class="fa fa-calendar"></i><span>Calendar</span>',array('controller'=>'Calendars','action'=>'add'),array('escape'=>false));?>
                    
                    
                  </li>


                  <li id="pos-nav" class="  ">
                  <?php
                      if(!empty($walkin_user_id)){
                          $walkin_user_id = $walkin_user_id['User']['id'];
                          echo $this->Html->link('<i class="fa fa-money"></i><span>POS</span>',array('controller'=>'sales','action'=>'saleview',$walkin_user_id,0),array('escape'=>false));
                      }else{
                  ?>
                    <?php echo $this->Html->link('<i class="fa fa-money"></i><span>POS</span>',array('controller'=>'sales','action'=>'saleview',0,0),array('escape'=>false));
                    }?>
                   
                  </li>


                                    
                  <li id="lead-nav" class="  ">
                    <?php echo $this->Html->link('<i class="fa fa-user"></i><span>Leads</span>',array('controller'=>'Leads','action'=>'leadlist'),array('escape'=>false));
                    ?>
                    
                  </li>


                  <li id="domo-nav" class="  ">
                    <a href="/domo" style="color: #99ccff;">
                      <i class="fa fa-line-chart"></i>
                      <span>Domo</span>
                    </a>
                  </li>


                  <li id="marketr-nav" class=" admins  " style="display: list-item;">
                    <div class="lock-wrapper">
                      <span class="notification-number"></span>
                    </div>
                    <a href="/marketr" style="color: #38C043;">
                      <i class="fa fa-rocket"></i>
                      <span>Marketr</span>
                    </a>
                  </li>


                  <li id="reports-nav" class=" ">
                    <a href="/reports">
                      <i class="fa fa-bar-chart"></i>
                      <span>Reports</span>
                    </a>
                  </li>


                  <li id="wiki-nav" class=" ">
                    <?php echo $this->Html->link('<i class="fa fa-pencil-square-o"></i><span>Wiki</span>',array('controller'=>'Wikis','action'=>'wikilist'),array('escape'=>false));
                    ?>
                  </li>


                  <li id="app-center-nav" class=" ">
                    <a href="/apps">
                      <i class="fa fa-bolt"></i>
                      <span>App Center</span>
                    </a>
                  </li>


                  <!-- <li id="administration-nav" class=" admins  " style="display: list-item;">
                    <a href="/administration">
                      <i class="fa fa-cog"></i>
                      <span>Admin</span>
                    </a>
                  </li> -->


                </ul>
              </li>
        </ul>

      </div>
        <!-- /.subnav-collapse -->
    </div>
        <!-- /container -->

    </div>
        <!-- /subnavbar-inner -->
  
    </div>

    <?php }else{
        ?>

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

    <?php }?>




 </section>