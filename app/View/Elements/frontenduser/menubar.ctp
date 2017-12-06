<div class="page-sidebar sidebar horizontal-bar">
    <div class="page-sidebar-inner"  id="menu">
        <ul class="menu accordion-menu">
            <li class="nav-heading"><span>Navigation</span></li>
            
            <?php 
            if(!empty($Menu_order['User']['menu_order']))
            {
                //pr($Menu_order);                
                $Menu_order = $Menu_order['User']['menu_order'];
                $json = json_decode($Menu_order);
                foreach ( $json as $output ) {   
                    //pr($output);
                echo $id = $output->id;
                $metch = 0;
                $not_metch = 0;
                    foreach ( $User_menu as $menu ) { 
                        // pr($menu);
                        $menu_id = $menu['UserMenu']['menu_id'];
                        if($menu_id == $id)
                        {
                          $metch++;
                        }
                        else
                        {                        
                          $not_metch++;
                        }
                    }
                    if($metch == '1')
                    {

                    }
                    else{
                ?>
                    <li class="droplink home">
                        <a href="<?php echo $output->link;?>"><i class="<?php echo $output->iconName;?>"></i></a>
                        
                    </li>
                <?php
                }}
            }
            else
            {
            ?>
                    
            <li class="droplink home"><?php echo $this->Html->link('<i class="glyphicon glyphicon-user"></i>',array('controller'=>'Users','action'=>'index'),array('escape'=>false));?>
                <ul class="sub-menu">
                    <li><?= $this->Html->link('Customers',['controller'=>'users','action'=>'index']); ?></li>
                    <li><?= $this->Html->link('New Customer',['controller'=>'users','action'=>'add']); ?></li>
                   
                </ul>
            </li>

            <li class="droplink home"><?php echo $this->Html->link('<i class="fa fa-users"></i>',array('controller'=>'staffs','action'=>'index'),array('escape'=>false));?>
                <ul class="sub-menu">
                    <li><?= $this->Html->link('Staffs',['controller'=>'staffs','action'=>'index']); ?></li>
                    <li><?= $this->Html->link('New Staff',['controller'=>'staffs','action'=>'add']); ?></li>
                   
                </ul>
            </li>

            <li class="droplink home"><?php echo $this->Html->link('<i class="fa fa-desktop"></i>',array('controller'=>'Assets','action'=>'customerassets'),array('escape'=>false));?>
                <ul class="sub-menu">
                    <li><?= $this->Html->link('Assets',['controller'=>'Assets','action'=>'customerassets']); ?>All Users</li>
                    <li><?= $this->Html->link('New Asset',['controller'=>'Assets','action'=>'add']); ?></li>
                   
                </ul>
            </li>
            
            <li class="droplink home"><?php echo $this->Html->link('<i class="fa fa-file-text-o"></i>',array('controller'=>'Contracts','action'=>'contractlist'),array('escape'=>false));?>
                <ul class="sub-menu">
                    <li><?= $this->Html->link('Contracts',['controller'=>'Contracts','action'=>'contractlist']); ?>All Users</li>
                    <li><?= $this->Html->link('New Contract',['controller'=>'Contracts','action'=>'add']); ?></li>
                   
                </ul>
            </li>

            <li class="droplink home"><?php echo $this->Html->link('<i class="fa fa-shopping-cart"></i>',array('controller'=>'Invoices','action'=>'invoicelist'),array('escape'=>false));?>
                <ul class="sub-menu">
                    <li><?= $this->Html->link('Invoices',['controller'=>'Invoices','action'=>'invoicelist']); ?></li>
                    <li><?= $this->Html->link(' New Invoice',['controller'=>'Invoices','action'=>'add']); ?></li>
                   
                </ul>
            </li>


            <li class="droplink home"><?php echo $this->Html->link('<i class="fa fa-mobile"></i>',array('controller'=>'Orders','action'=>'orderlist'),array('escape'=>false));?>
                <ul class="sub-menu">
                    <li><?= $this->Html->link('Customer Purchases',['controller'=>'Orders','action'=>'orderlist']); ?></li>
                    <li><?= $this->Html->link('New Purchase',['controller'=>'Orders','action'=>'add']); ?></li>
                   
                </ul>
            </li>

            <li class="droplink home"><?php echo $this->Html->link('<i class="fa fa-clock-o"></i>',array('controller'=>'Estimates','action'=>'estimatelist'),array('escape'=>false));?>
                <ul class="sub-menu">
                    <li><?= $this->Html->link('Estimates',['controller'=>'Estimates','action'=>'estimatelist']); ?></li>
                    <li><?= $this->Html->link('New Estimate',['controller'=>'Estimates','action'=>'add']); ?></li>
                   
                </ul>
            </li>

            <li class="droplink home"><?php echo $this->Html->link('<i class="fa fa-check-square-o"></i>',array('controller'=>'Tickets','action'=>'ticketlist'),array('escape'=>false));?>
                <ul class="sub-menu">
                    <li><?= $this->Html->link('Tickets',['controller'=>'Tickets','action'=>'ticketlist']); ?></li>
                    <li><?= $this->Html->link(' Add Ticket',['controller'=>'Tickets','action'=>'add']); ?></li>
                   
                </ul>
            </li>

            <li class="droplink home"><?php echo $this->Html->link('<i class="fa fa-plane"></i>',array('controller'=>'Parts','action'=>'partlist'),array('escape'=>false));?>
                <ul class="sub-menu">
                    <li><?= $this->Html->link('Parts',['controller'=>'Parts','action'=>'partlist']); ?></li>
                    <li><?= $this->Html->link(' Add Part',['controller'=>'Parts','action'=>'add']); ?></li>
                   
                </ul>
            </li>


            <li class="droplink home"><?php echo $this->Html->link('<i class="fa fa-barcode"></i>',array('controller'=>'Products','action'=>'productlist'),array('escape'=>false));?>
                <ul class="sub-menu">
                    <li><?= $this->Html->link('Products',['controller'=>'Products','action'=>'productlist']); ?></li>
                    <li><?= $this->Html->link('New Product',['controller'=>'Products','action'=>'add']); ?></li>
                   
                </ul>
            </li>

            <li class="droplink home"><?php echo $this->Html->link('<i class="fa fa-truck"></i>',array('controller'=>'PurchaseOrders','action'=>'purchaseorderlist'),array('escape'=>false));?>
                <ul class="sub-menu">
                    <li><?= $this->Html->link('Purchase Orders',['controller'=>'PurchaseOrders','action'=>'purchaseorderlist']); ?></li>
                    <li><?= $this->Html->link('New Purchase Order',['controller'=>'PurchaseOrders','action'=>'add']); ?></li>
                   
                </ul>
            </li>

            <li class="droplink home"><?php echo $this->Html->link('<i class="glyphicon glyphicon-calendar"></i>',array('controller'=>'Calendars','action'=>'add'),array('escape'=>false));?>
                <ul class="sub-menu">
                    <li><?= $this->Html->link('Calendar',['controller'=>'Calendars','action'=>'add']); ?></li>
                                                 
                </ul>
            </li>

            <li class="droplink home"><?php echo $this->Html->link('<i class="fa fa-money"></i>',array('controller'=>'sales','action'=>'saleview',0),array('escape'=>false));?>
                <ul class="sub-menu">
                    <li><?= $this->Html->link('POS',['controller'=>'sales','action'=>'saleview',0,0]); ?></li>
                    
                </ul>
            </li>


            <li class="droplink home"><?php echo $this->Html->link('<i class="glyphicon glyphicon-user"></i>',array('controller'=>'Leads','action'=>'leadlist'),array('escape'=>false));?>
                <ul class="sub-menu">
                    <li><?= $this->Html->link('Leads',['controller'=>'Leads','action'=>'leadlist']); ?></li>
                    <li><?= $this->Html->link(' Add Lead',['controller'=>'Leads','action'=>'add']); ?></li>
                   
                </ul>
            </li>

            <li class="droplink home"><?php echo $this->Html->link('<i class="glyphicon glyphicon-edit"></i>',array('controller'=>'Wikis','action'=>'wikilist'),array('escape'=>false));?>
                <ul class="sub-menu">
                    <li><?= $this->Html->link('wikis',['controller'=>'Wikis','action'=>'wikilist']); ?></li>
                    <li><?= $this->Html->link(' Add Wiki',['controller'=>'Wikis','action'=>'add']); ?></li>
                                                 
                </ul>
            </li>
            <?php }?>
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