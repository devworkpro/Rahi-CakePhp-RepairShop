<?php echo $this->Flash->render('positive'); ?>
<style type="text/css">
  .stat{
    text-align: center;
  }
  .stat:first-child{
    border-right: 1px solid #cccccc;
   
  }
  .stat:last-child{
     border-left: 1px solid #cccccc;
  }
  .stat > span{
    font-size: 50px;
  }
</style>
<link  rel="stylesheet" href="<?php echo $this->webroot.'Plugins/morris/morris.css';?>"/>


<div class="warper container-fluid" style="margin-bottom:50px; margin-top:40px;"> 

    <?php echo $this->element('frontenduser/sidebar2'); ?>            
    <div class="col-xs-9">
        <div class="col-xs-12 col-sm-12">
        <div class="panel panel-white">
            <div class="panel-body">
                 
                <div class="row">                 
                    <div class="col-xs-4 col-sm-4 stat">
                        <h4>Payments Last Month</h4>
                        <span>$0</span>
                    </div>
                    <div class="col-xs-4 col-sm-4 stat">
                        <h4>Open Tickets</h4>
                        <span><?php echo $Total_ticket;?></span>
                    </div>
                    <div class="col-xs-4 col-sm-4 stat">
                        <h4>Payments MTD</h4>
                        <span>$0</span>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <div class="col-xs-12 col-sm-12">
        <div class="panel panel-white">

            <div class="panel-body">
                 
                <div class="row">                 
                    <div class="col-xs-4 col-sm-4 stat">
                        <h4>Last Month NET</h4>
                        <span>$0</span>
                    </div>
                    <div class="col-xs-4 col-sm-4 stat">
                        <h4>Last Month Tickets</h4>
                        <span>0</span>
                    </div>
                    <div class="col-xs-4 col-sm-4 stat">
                        <h4>This Date Last Month</h4>
                        <span>$0</span>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <div class="col-xs-12 col-sm-12">
        <div class="panel panel-white">
            <div class="panel-body">
                 
                <div class="row">                 
                    <div class="col-xs-4 col-sm-4 stat">
                        <h4>Tickets Resolved Last Month</h4>
                        <span>0</span>
                    </div>
                    <div class="col-xs-4 col-sm-4 stat">
                        <h4>Invoices Last Month</h4>
                        <span><?php echo $Total_invoice;?></span>
                    </div>
                    <div class="col-xs-4 col-sm-4 stat">
                        <h4>Invoices MTD</h4>
                        <span>0</span>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <div class="col-xs-12 col-sm-12">
        <div class="panel panel-white">
            <div class="panel-body">
                 
                <div class="row">                 
                    <div class="col-xs-4 col-sm-4 stat">
                        <h4>Invoiced Today</h4>
                        <span>$0</span>
                    </div>
                    <div class="col-xs-4 col-sm-4 stat">
                        <h4>Invoiced last 7 days</h4>
                        <span>$0</span>
                    </div>
                    <div class="col-xs-4 col-sm-4 stat">
                        <h4>Tickets Today</h4>
                        <span>0</span>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <div class="col-xs-12 col-sm-12">
        <div class="panel panel-white">
            <div class="panel-body">
                                 
                    <div class="col-xs-4 col-sm-4 stat">
                        <h4>Email Sent MTD</h4>
                        <span>0</span>
                    </div>
                    <div class="col-xs-4 col-sm-4 stat">
                        <h4>Last Month Email Sent</h4>
                        <span>0</span>
                    </div>
                    <div class="col-xs-4 col-sm-4 stat">
                        <h4>Tickets Resolved MTD</h4>
                        <span>0</span>
                    </div>
                
            </div>
        </div>
        </div>
    </div>
    <div class="col-xs-9">
        <div class="col-xs-12 col-sm-12">
        <div class="panel panel-white">
            <div class="panel-body">
                <div class="row">  
                    <div class="col-md-12" style="margin-top: -20px;">
                        <b><h2>Account Usage</h2></b>
                    </div>
                    <div class="col-md-4" style="margin-bottom: -50px;margin-top: -10px;">
                        <div id="morris"></div>
                    </div>
                    <div class="col-md-4" style="margin-bottom: -50px;margin-top: -10px;">
                        <div id="morris1"></div>
                    </div> 
                    <div class="col-md-4" style="margin-bottom: -50px;margin-top: -10px;">
                        <div id="morris2"></div>
                    </div> 
                    <div class="col-md-4" style="margin-bottom: -50px;margin-top: -10px;">
                        <div id="morris3"></div>
                    </div>  
                    <div class="col-md-4" style="margin-bottom: -50px;margin-top: -10px;">
                        <div id="morris4"></div>
                    </div> 

                  
                  
                </div><br>

            </div>
        </div>
        </div>
    </div>
</div>           




 <script src="<?php echo $this->webroot.'Plugins/morris/raphael.min.js'?>"></script>
         
 <script src="<?php echo $this->webroot.'Plugins/morris/morris.min.js'?>"></script>
<script type="text/javascript">
$( document ).ready(function() {         
    Morris.Donut({
        element: 'morris',
        data: [
            {label: 'Tickets Remaining %', value: <?php echo 100-$Total_ticket;?> },
            {label: 'Tickets %', value: <?php echo $Total_ticket;?> }
        ],
        resize: true,
        colors: ['#74e4d1', '#44cbb4'],
    });
    Morris.Donut({
        element: 'morris1',
        data: [
            {label: 'Invoices Remaining %', value: <?php echo 100-$Total_invoice;?> },
            {label: 'Invoices %', value: <?php echo $Total_invoice;?> }
        ],
        resize: true,
        colors: ['#74e4d1', '#44cbb4'],
    });
    Morris.Donut({
        element: 'morris2',
        data: [
            {label: 'Email Remaining %', value: 92 },
            {label: 'Email %', value: 8 }
        ],
        resize: true,
        colors: ['#74e4d1', '#44cbb4'],
    });
    Morris.Donut({
        element: 'morris3',
        data: [
            {label: 'SMS Remaining %', value: 99 },
            {label: 'SMS %', value: 1 }
        ],
        resize: true,
        colors: ['#74e4d1', '#44cbb4'],
    });
    Morris.Donut({
        element: 'morris4',
        data: [
            {label: 'Users Remaining %', value: <?php echo 100-$Total_user;?> },
            {label: 'Users %', value: <?php echo $Total_user;?> }
        ],
        resize: true,
        colors: ['#74e4d1', '#44cbb4'],
    });
});
</script>