<div class="navbar">
                <div class="navbar-inner container">
                    <div class="sidebar-pusher">
                        <a href="javascript:void(0);" class="waves-effect waves-button waves-classic push-sidebar">
                            <i class="fa fa-bars"></i>
                        </a>
                    </div>
                    <div class="logo-box">
                        
                        <?php 
                        $admin_name = $this->Session->read('Auth.User.admin_name');
                        if($admin_name!='')
                        {
                            echo $this->Html->link(ucfirst($admin_name),array('controller'=>'pages','action'=>'dashboard'),array('escape'=>false,'class'=>'logo-text'));
                        }
                        else{
                            echo $this->Html->link("Repair Shop",array('controller'=>'pages','action'=>'dashboard'),array('escape'=>false,'class'=>'logo-text'));
                        }
                        ?>
                    </div><!-- Logo Box -->
                    <div class="search-button">
                        <a href="javascript:void(0);" class="waves-effect waves-button waves-classic show-search"><i class="fa fa-search"></i></a>
                    </div>
                    <div class="topmenu-outer">
                        <div class="top-menu">
                            <ul class="nav navbar-nav navbar-left">
                                <li>        
                                    <a href="javascript:void(0);" class="waves-effect waves-button waves-classic sidebar-toggle"><i class="fa fa-bars"></i></a>
                                </li>
                                <li>
                                    <a href="#cd-nav" class="waves-effect waves-button waves-classic cd-nav-trigger"><i class="fa fa-diamond"></i></a>
                                </li>
                                <li>        
                                    <a href="javascript:void(0);" class="waves-effect waves-button waves-classic toggle-fullscreen"><i class="fa fa-expand"></i></a>
                                </li>
                                <li>        
                                   <?php echo $this->Html->link('<i class="fa fa-bolt"></i> Upgrade Account!',array('controller'=>'Payments','action'=>'plans'),array('escape'=>false));?>
                                </li>
                                <li>
                                    <?php $reminder_counter=0; 
                                    foreach ($User_Reminder as $reminder) {
                                        $reminder_counter = $reminder_counter+1;
                                        //pr($reminder);
                                      }
                      
                                    ?>
                                    <?php echo $this->Html->link('<i class="fa fa-clock-o"></i> '.$reminder_counter.' reminders',array('controller'=>'Reminders','action'=>'reminderlist'),array('escape'=>false));?>
                                </li>
                                
                            </ul>
                            <ul class="nav navbar-nav navbar-right">
                                
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle waves-effect waves-button waves-classic" data-toggle="dropdown">
                                        <span class="user-name"><i class="fa fa-plus"></i></span>
                                    </a>
                                    <ul class="dropdown-menu fonts/glyphicons-halflings-regular.woff2-list" role="menu">
                                        <li role="presentation">
                                        <?php echo $this->Html->link('<i class="glyphicon glyphicon-plus"></i> New Customer',array('controller'=>'Users','action'=>'add'),array('escape'=>false));?>

                                        </li>
                                       
                                        <li role="presentation">
                                        <?php echo $this->Html->link('<i class="glyphicon glyphicon-plus"></i> New Ticket',array('controller'=>'Tickets','action'=>'add'),array('escape'=>false));?>
                                            
                                        </li>
                                        <li role="presentation">
                                            <?php echo $this->Html->link('<i class="glyphicon glyphicon-plus"></i> New Inventory',array('controller'=>'products','action'=>'add'),array('escape'=>false));?>
                                            
                                        </li>
                                        <li role="presentation">
                                            <?php echo $this->Html->link('<i class="glyphicon glyphicon-plus"></i> New Invoice',array('controller'=>'Invoices','action'=>'add'),array('escape'=>false));?>
                                            
                                        </li>
                                        <li role="presentation">
                                            <?php echo $this->Html->link('<i class="glyphicon glyphicon-plus"></i> New Estimate',array('controller'=>'Estimates','action'=>'add'),array('escape'=>false));?>
                                            
                                        </li>
                                        
                                    </ul>
                                </li>
                                    
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle waves-effect waves-button waves-classic" data-toggle="dropdown">
                                    	<span class="user-name"><i class="fa fa-user"></i>   <?php echo ucfirst($this->Session->read('Auth.User.first_name'));?><i class="fa fa-angle-down"></i></span>
                                        <?php $profile = $this->Session->read('Auth.User.profile_pic');?>
                                        <img class="img-circle avatar" src="<?php echo $this->webroot.'img/user_image/'.$profile?>" width="40" height="40" alt="">

                                    </a>
                                    

                                    <ul  class="dropdown-menu fonts/glyphicons-halflings-regular.woff2-list" role="menu">
                                      <li>
                                      <?php echo $this->Html->link('<i class="fa fa-cog"></i>Settings',array('controller'=>'Administrations','action'=>'general'),array('escape'=>false));?>
                                      </li>
                                      <!-- <li><a class="timeclockr" href="/timelogs/punch?current_user=36548">Time Clock</a></li> -->
                                      <li>
                                       <?php echo $this->Html->link('<i class="fa fa-edit"></i>Internal Wiki',array('controller'=>'Wikis','action'=>'wikilist'),array('escape'=>false));?>
                                      </li>
                                      <!--  <li>
                                        <a href="/messages">
                                          Messages 
                                        </a>
                                      </li> -->
                                      <li>
                                      <?php echo $this->Html->link('<i class="glyphicon glyphicon-calendar"></i> My Calendars',array('controller'=>'Calendars','action'=>'add'),array('escape'=>false));?>
                                      </li>
                                      <li>
                                      <?php echo $this->Html->link('<i class="fa fa-book"></i>Appointments',array('controller'=>'Appointments','action'=>'appointmentlist'),array('escape'=>false));?>
                                      </li>
                                      
                                      <li>
                                      <?php echo $this->Html->link('<i class="fa fa-clock-o"></i> Reminder',array('controller'=>'Reminders','action'=>'reminderlist'),array('escape'=>false));?>
                                      </li>
                                      
                                      <li>                      
                                        <?php echo $this->Html->link('<i class="fa fa-user"></i>Profile/Password',array('controller'=>'users','action'=>'change_password'),array('escape'=>false));?>
                                      </li>
                                      <!-- <li><a href="/users/authorizations">OpenID Authorizations</a></li> -->
                                      
                                      <li class="divider"></li>
                                      <li>
                                        
                                        <?php echo $this->Html->link('<i class="fa fa-cog"></i>Admin',array('controller'=>'Administrations','action'=>'index'),array('escape'=>false));?>
                                      </li>

                                      <li>
                                        
                                        <?php echo $this->Html->link('<i class="fa fa-lock"></i>Lock screen',array('controller'=>'users','action'=>'logout'),array('escape'=>false,'data-toggle'=>"modal", 'data-target'=>"#LockModal", 'data-backdrop'=>"static" , 'data-keyboard'=>"false"));?>
                                      </li>
                                      <li>
                                          <?php echo $this->Html->link('<i class="fa fa-sign-out m-r-xs" role="presentation"></i>Sign Out',array('controller'=>'users','action'=>'logout'),array('escape'=>false));?>
                                      </li>
                                    </ul>
                                </li>


                                
                                
                            </ul><!-- Nav -->
                        </div><!-- Top Menu -->
                    </div>
                </div>
            </div><!-- Navbar -->
<!-- Lock Modal -->
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
