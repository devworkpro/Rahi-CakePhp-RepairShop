<div class="page-sidebar sidebar horizontal-bar">
                <div class="page-sidebar-inner"  id="menu">
                    <ul class="menu accordion-menu">
                        <li class="nav-heading"><span>Navigation</span></li>
                        
                        <li class="home"><?php echo $this->Html->link(' <i class="menu-icon icon-speedometer"></i> Dashboard',array('controller'=>'pages','action'=>'dashboard'),array('escape'=>false));?>
                           
                        </li>


                        <li class="droplink home"><?php echo $this->Html->link('<i class="glyphicon glyphicon-user"></i> Customer',array('controller'=>'Users','action'=>'index'),array('escape'=>false));?>
                            <ul class="sub-menu">
                                <li><?= $this->Html->link('Customers',['controller'=>'users','action'=>'index']); ?>All Users</li>
                                <li><?= $this->Html->link('Add Customer',['controller'=>'users','action'=>'add']); ?></li>
                               
                            </ul>
                        </li>

                        <li class="droplink home"><?php echo $this->Html->link('<i class="fa fa-users"></i> Staff',array('controller'=>'Staffs','action'=>'index'),array('escape'=>false));?>
                            <ul class="sub-menu">
                                <li><?= $this->Html->link('Staffs',['controller'=>'Staffs','action'=>'index']); ?>All Users</li>
                                <li><?= $this->Html->link('Add Staff',['controller'=>'Staffs','action'=>'add']); ?></li>
                               
                            </ul>
                        </li>


                        <li class="droplink home"><?php echo $this->Html->link('<i class="fa fa-barcode"></i>  Products',array('controller'=>'Products','action'=>'productlist'),array('escape'=>false));?>
                            <ul class="sub-menu">
                                <li><?= $this->Html->link('Products',['controller'=>'Products','action'=>'productlist']); ?></li>
                                <li><?= $this->Html->link('New Product',['controller'=>'Products','action'=>'add']); ?></li>
                               
                            </ul>
                        </li>


                        <li class="droplink home"><?php echo $this->Html->link('<i class="fa fa-file-text-o"></i> Pricing',array('controller'=>'Packages','action'=>'packagelist'),array('escape'=>false));?>
                            <ul class="sub-menu">
                                <li><?= $this->Html->link('Packages',['controller'=>'Packages','action'=>'packagelist']); ?></li>
                               
                            </ul>
                        </li>

                        <li class="droplink home"><?php echo $this->Html->link('<i class="fa fa-list-alt"></i> Category',array('controller'=>'Categories','action'=>'categorylist'),array('escape'=>false));?>
                            <ul class="sub-menu" style="">
                                <li><?= $this->Html->link('Categories',['controller'=>'Categories','action'=>'categorylist']); ?></li>
                                <li><?= $this->Html->link(' Add Category',['controller'=>'Categories','action'=>'add']); ?></li>
                               
                            </ul>
                        </li>

                        <li class="droplink home"><?php echo $this->Html->link('<i class="fa fa-reorder"></i> Orders',array('controller'=>'Orders','action'=>'orderlist'),array('escape'=>false));?>
                            <ul class="sub-menu">
                                <li><?= $this->Html->link('Orders',['controller'=>'Orders','action'=>'orderlist']); ?></li>
                                <li><?= $this->Html->link(' Add Order',['controller'=>'Orders','action'=>'add']); ?></li>
                               
                            </ul>
                        </li>

                        <li class="droplink home"><?php echo $this->Html->link('<i class="fa fa-list-alt"></i> Payment',array('controller'=>'payments','action'=>'paymentlist'),array('escape'=>false));?>
                            <ul class="sub-menu">
                                <li><?= $this->Html->link('Payments',['controller'=>'payments','action'=>'paymentlist']); ?></li>
                              
                            </ul>
                        </li>


                        <li class="droplink home"><?php echo $this->Html->link('<i class="fa fa-shopping-cart"></i> Invoice',array('controller'=>'Invoices','action'=>'invoicelist'),array('escape'=>false));?>
                            <ul class="sub-menu">
                                <li><?= $this->Html->link('Invoice',['controller'=>'Invoices','action'=>'invoicelist']); ?></li>
                                <li><?= $this->Html->link(' Add Invoice',['controller'=>'Invoices','action'=>'add']); ?></li>
                               
                            </ul>
                        </li>


                        <li class="droplink home"><?php echo $this->Html->link('<i class="fa fa-clock-o"></i> Estimate',array('controller'=>'Estimates','action'=>'estimatelist'),array('escape'=>false));?>
                            <ul class="sub-menu">
                                <li><?= $this->Html->link('Estimate',['controller'=>'Estimates','action'=>'estimatelist']); ?></li>
                                <li><?= $this->Html->link(' Add Estimate',['controller'=>'Estimates','action'=>'add']); ?></li>
                               
                            </ul>
                        </li>



                        <li class="droplink home"><?php echo $this->Html->link('<i class="fa fa-money"></i> POS',array('controller'=>'sales','action'=>'saleview',0,0),array('escape'=>false));?>
                            <ul class="sub-menu">
                                <li><?= $this->Html->link('POS',['controller'=>'sales','action'=>'saleview',0,0]); ?></li>
                                
                            </ul>
                        </li>
                        

                        <li class="droplink home"><?php echo $this->Html->link('<i class="fa fa-check-square-o"></i> Ticket',array('controller'=>'Tickets','action'=>'ticketlist'),array('escape'=>false));?>
                            <ul class="sub-menu">
                                <li><?= $this->Html->link('Ticket',['controller'=>'Tickets','action'=>'ticketlist']); ?></li>
                                <li><?= $this->Html->link(' Add Ticket',['controller'=>'Tickets','action'=>'add']); ?></li>
                               
                            </ul>
                        </li>



                        <li class="droplink home"><?php echo $this->Html->link('<i class="fa fa-plane"></i> Parts',array('controller'=>'Parts','action'=>'partlist'),array('escape'=>false));?>
                            <ul class="sub-menu">
                                <li><?= $this->Html->link('Parts',['controller'=>'Parts','action'=>'partlist']); ?></li>
                                <li><?= $this->Html->link(' Add Part',['controller'=>'Parts','action'=>'add']); ?></li>
                               
                            </ul>
                        </li>

                        <li class="droplink home"><?php echo $this->Html->link('<i class="glyphicon glyphicon-user"></i> Leads',array('controller'=>'Leads','action'=>'leadlist'),array('escape'=>false));?>
                            <ul class="sub-menu">
                                <li><?= $this->Html->link('Leads',['controller'=>'Leads','action'=>'leadlist']); ?></li>
                                <li><?= $this->Html->link(' Add Lead',['controller'=>'Leads','action'=>'add']); ?></li>
                               
                            </ul>
                        </li>

                        <li class="droplink home"><?php echo $this->Html->link('<i class="glyphicon glyphicon-calendar"></i> Calendar',array('controller'=>'Calendars','action'=>'add'),array('escape'=>false));?>
                            <ul class="sub-menu">
                                <li><?= $this->Html->link('Calendar',['controller'=>'Calendars','action'=>'add']); ?></li>
                                                             
                            </ul>
                        </li>

                        <li class="droplink home"><?php echo $this->Html->link('<i class="glyphicon glyphicon-edit"></i> Wiki',array('controller'=>'Wikis','action'=>'wikilist'),array('escape'=>false));?>
                            <ul class="sub-menu">
                                <li><?= $this->Html->link('wikis',['controller'=>'Wikis','action'=>'wikilist']); ?></li>
                                <li><?= $this->Html->link(' Add Wiki',['controller'=>'Wikis','action'=>'add']); ?></li>
                                                             
                            </ul>
                        </li>

                        <li class="droplink home"><?php echo $this->Html->link('<i class="fa fa-bars"></i> Menu',array('controller'=>'Menus','action'=>'menulist'),array('escape'=>false));?>
                            <ul class="sub-menu">
                                <li><?= $this->Html->link('Menus',['controller'=>'Menus','action'=>'menulist']); ?></li>
                                <li><?= $this->Html->link(' Add Menu',['controller'=>'Menus','action'=>'add']); ?></li>
                                                             
                            </ul>
                        </li>

                        <li class="droplink home"><?php echo $this->Html->link('<i class="fa fa-file-text-o"></i> Contact Us',array('controller'=>'users','action'=>'contactuslist'),array('escape'=>false));?>
                            <ul class="sub-menu">
                                <li><?= $this->Html->link('Contact Us',['controller'=>'users','action'=>'contactuslist']); ?></li>
                            </ul>
                        </li>


                    </ul>
                </div><!-- Page Sidebar Inner -->
            </div><!-- Page Sidebar -->

<script>
   var url = window.location.pathname, 
    urlRegExp = new RegExp(url.replace(/\/$/,'') + "$"); // create regexp to match current url pathname and remove trailing slash if present as it could collide with the link in navigation in case trailing slash wasn't present there
    // now grab every link from the navigation
    $('.menu a').each(function(){
      console.log(this.href);
        // and test its normalized href against the url pathname regexp
        if(urlRegExp.test(this.href.replace(/\/$/,''))){
            $(this).addClass('active');
            $(this).parent('li').addClass('active');
        }
    });
</script>