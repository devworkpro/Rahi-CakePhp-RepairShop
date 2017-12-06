<div class="row">
    <div class="col-xs-3">
            
        <div class="panel panel-white">
            <div class="panel-heading">
                <h3 class="panel-title">Administration</h3>
            </div>
            <div class="panel-body">
                <div class="tabs-left">
                    <ul class="nav">
                        <li class="active">
                        <?php echo $this->Html->link('Home',array('controller'=>'Administrations','action'=>'index'),array('escape'=>false));?>
                        
                        </li>
                        <li>
                        <?php echo $this->Html->link('General Preferences',array('controller'=>'Administrations','action'=>'general'),array('escape'=>false));?>
                        </li>
                        <li>
                            <?php echo $this->Html->link('Tabs Customization',array('controller'=>'Administrations','action'=>'tabs'),array('escape'=>false));?>
                        </li>
                        <li>
                            <?php echo $this->Html->link('Account Profile',array('controller'=>'Users','action'=>'account_profile'),array('escape'=>false));?>
                        </li>
                        <li>
                            <?php echo $this->Html->link('Users',array('controller'=>'Administrations','action'=>'users'),array('escape'=>false));?>
                        </li>
                        <li>
                            <?php echo $this->Html->link('Templates',array('controller'=>'Administrations','action'=>'templates'),array('escape'=>false));?>
                        </li>
                        <br>

                        <li class="nav-header panel-group admin-nav">Customers</li>
                            <li><?php echo $this->Html->link('Preferences',array('controller'=>'Administrations','action'=>'customer'),array('escape'=>false));?></li>
                            <li><?php echo $this->Html->link('Customer Custom Fields',array('controller'=>'users','action'=>'customerfields'),array('escape'=>false));?></li>
                            <li><?php echo $this->Html->link('Asset Custom Fields',array('controller'=>'assets','action'=>'customerassets'),array('escape'=>false));?></li><br>
                            
                        <li class="nav-header panel-group admin-nav">Invoices</li>
                            <li><?php echo $this->Html->link('Preferences',array('controller'=>'Administrations','action'=>'invoice'),array('escape'=>false));?></li>
                            <li><?php echo $this->Html->link('Recurring Invoices',array('controller'=>'Schedules','action'=>'schedulelist'),array('escape'=>false));?></li>
                            <li><?php echo $this->Html->link('Templates',array('controller'=>'Administrations','action'=>'invoicetemplate'),array('escape'=>false));?></li><br>
                      
                        <li class="nav-header panel-group admin-nav">Estimates</li>
                            <li><?php echo $this->Html->link('Preferences',array('controller'=>'Administrations','action'=>'estimates'),array('escape'=>false));?></li>
                            <li><?php echo $this->Html->link('Templates',array('controller'=>'Administrations','action'=>'estimatetemplate'),array('escape'=>false));?></li><br>
                      

                        <li class="nav-header panel-group admin-nav">Tickets</li>
                            <li><?php echo $this->Html->link('Preferences',array('controller'=>'Administrations','action'=>'tickets'),array('escape'=>false));?></li>
                            <li><?php echo $this->Html->link('Canned Responses',array('controller'=>'Tickets','action'=>'cannedresponses'),array('escape'=>false));?></li>
                            <li><?php echo $this->Html->link('Ticket Custom Fields',array('controller'=>'Tickets','action'=>'customfields'),array('escape'=>false));?></li>
                            <li><?php echo $this->Html->link('Service Level Agreements',array('controller'=>'Slas','action'=>'slalist'),array('escape'=>false));?></li>
                            <li><?php echo $this->Html->link('Templates',array('controller'=>'Administrations','action'=>'tickettemplate'),array('escape'=>false));?></li><br>
                      
                        <li class="nav-header panel-group admin-nav">Parts</li>
                            <li><?php echo $this->Html->link('Preferences',array('controller'=>'Administrations','action'=>'parts'),array('escape'=>false));?></li><br>

                        <li class="nav-header panel-group admin-nav">Inventory</li>
                            <li><?php echo $this->Html->link('Preferences',array('controller'=>'Administrations','action'=>'inventory'),array('escape'=>false));?></li>
                            <li><?php echo $this->Html->link('Purchase Orders',array('controller'=>'PurchaseOrders','action'=>'purchaseorderlist'),array('escape'=>false));?></li>
                            <li><?php echo $this->Html->link('Vendors',array('controller'=>'Vendors','action'=>'vendorlist'),array('escape'=>false));?></li><br>
                      

                        <li class="nav-header panel-group admin-nav">POS</li>
                            <li><?php echo $this->Html->link('Preferences',array('controller'=>'Administrations','action'=>'pos'),array('escape'=>false));?>
                            </li><br>
                          
                        <li class="nav-header panel-group admin-nav">Leads</li>
                            <li><?php echo $this->Html->link('Preferences',array('controller'=>'Administrations','action'=>'leads'),array('escape'=>false));?>
                            </li><br>
    
                    </ul>

    
                </div><!-- /tabbable -->
            </div>
        </div>
            
    </div>
