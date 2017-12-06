<?php echo $this->Flash->render('positive'); ?>
<div class="warper container-fluid" style="margin-bottom: 50px;">
<div class="page-header">
    <h2>Packages Details 
        <span class="pull-right">
          <?php echo $this->Html->link('Paypal Account Settings',array('controller'=>'Packages','action'=>'paypalsetting'),array('escape'=>false, 'class'=>'btn btn-primary'));?> 

        <?php echo $this->Html->link('New',array('controller'=>'Packages','action'=>'add'),array('escape'=>false, 'class'=>'btn btn-success'));?> 

        </span>
    </h2>
</div>

<div class="row">
  <div class="col-md-12">
    <div class="widget big-stats-container">
      <div class="widget-content">
                    
        <div class="tab-content">
            <div class="tab-pane active" id="annual">

            <div id="big_stats" class="cf">
              <?php foreach($Packages as $package) { ?>
              <?php $status = $package['Package']['status'];
              $price = $package['Package']['price'];
              if($status == "new")
                {
                  ?>
              <div class="stat cd-pricing-features" >
                
                <span class="value"></span>
                <li><h2><?php $title=$package['Package']['title']; echo ucfirst($title);?></h2></li>
                <li  class="btn-success">
                      <?php 
                      if($price=='0')
                      {
                        echo "Free";
                      }
                      else
                      {
                        echo "Upgrade @ $",$package['Package']['price'].'.00 / month';  
                      }
                      ?> 
                </li>
                <li class="lead"><?php echo $package['Package']['feature_1'];?></li>
                <li class="lead"><?php echo $package['Package']['feature_2'];?></li>
                <li class="lead"><?php echo $package['Package']['feature_3'];?></li>
                <hr>
                <li><?php echo $package['Package']['feature_4'];?></li>
                <footer class="cd-pricing-footer">
                  <?php $package_id = $package['Package']['id'];?>
                  <?php echo $this->Html->link('<i class="fa fa-edit fa-2x"></i>',array('controller'=>'packages','action'=>'packageedit',$package_id),array('escape'=>false,'class'=>'cd-select'));?>
                  <?php echo $this->Html->link('<i class="fa fa-eye fa-2x"></i>',array('controller'=>'packages','action'=>'packageview',$package_id),array('escape'=>false,'class'=>'cd-select'));?>      
                  <?php echo $this->Html->link('<i class="fa fa-remove fa-2x"></i>',array('controller'=>'packages','action'=>'deletePackage',$package_id),array('escape'=>false,'class'=>'cd-select','confirm' => 'Are you sure?'));?>               
                </footer>
              </div>  
              
              <?php }
              
              }?>
              
            </div>

            </div>

        </div>


      </div>
    </div>
  </div>
</div>


<!-- <div class="row">
  <div class="col-md-12">
    <div class="widget big-stats-container">
      <div class="widget-content">
        <div class="col-md-5"></div>
        <ul class="col-md-7 nav nav-pills" style="margin-bottom:0.5cm;margin-top: 60px;">
              <li class="active">
                <a href="#annual" data-toggle="tab">Yearly (10% off)</a>
              </li>
              <li class="">
                <a href="#monthly" data-toggle="tab">Monthly</a>
              </li>
        </ul>
             
        <div class="tab-content">
            <div class="tab-pane active" id="annual">

            <div id="big_stats" class="cf">
              <?php foreach($Packages as $package) {?>
              <?php $status = $package['Package']['status'];
              if($status == "yearly")
                {
                  ?>
              <div class="stat cd-pricing-features" >
                
                <span class="value"></span>
                <li><h2><?php $title=$package['Package']['title']; echo ucfirst($title);?></h2></li>
                <li  class="btn-success">
                      <?php echo "Upgrade @ $",$package['Package']['price'].'.00 / year';?> 
                </li>
                <li class="lead"><?php echo $package['Package']['feature_1'];?></li>
                <li class="lead"><?php echo $package['Package']['feature_2'];?></li>
                <li class="lead"><?php echo $package['Package']['feature_3'];?></li>
                <hr>
                <li><?php echo $package['Package']['feature_4'];?></li>
                <li><?php echo $package['Package']['feature_5'];?></li>
                <li><?php echo $package['Package']['feature_6'];?> <i class="fa fa-check-square-o"></i></li>
                <footer class="cd-pricing-footer">
                  <?php $package_id = $package['Package']['id'];?>
                  <?php echo $this->Html->link('<i class="fa fa-edit fa-2x"></i>',array('controller'=>'packages','action'=>'packageedit',$package_id),array('escape'=>false,'class'=>'cd-select'));?>
                  <?php echo $this->Html->link('<i class="fa fa-eye fa-2x"></i>',array('controller'=>'packages','action'=>'packageview',$package_id),array('escape'=>false,'class'=>'cd-select'));?>      
                  <?php echo $this->Html->link('<i class="fa fa-remove fa-2x"></i>',array('controller'=>'packages','action'=>'deletePackage',$package_id),array('escape'=>false,'class'=>'cd-select','confirm' => 'Are you sure?'));?>               
                </footer>
              </div>  
              
              <?php }
              
              }?>
              
            </div>

            </div>

            <div class="tab-pane" id="monthly" >

            <div id="big_stats" class="cf">
              <?php foreach($Packages as $package) {?>
              <?php $status = $package['Package']['status'];
              if($status == "monthly")
                {?>
              <div class="stat cd-pricing-features" >
                
                <span class="value"></span>
                <li><h2><?php $title=$package['Package']['title']; echo ucfirst($title);?></h2></li>
                <li  class="btn-warning">
                      <?php echo "Upgrade @ $",$package['Package']['price'].'.00 / month';?> 
                </li>
                <li class="lead"><?php echo $package['Package']['feature_1'];?></li>
                <li class="lead"><?php echo $package['Package']['feature_2'];?></li>
                <li class="lead"><?php echo $package['Package']['feature_3'];?></li>
                <hr>
                <li><?php echo $package['Package']['feature_4'];?></li>
                <li><?php echo $package['Package']['feature_5'];?></li>
                <li><?php echo $package['Package']['feature_6'];?> <i class="fa fa-check-square-o"></i></li>
                <footer class="cd-pricing-footer">
                  <?php $package_id = $package['Package']['id'];?>
                  <?php echo $this->Html->link('<i class="fa fa-edit fa-2x"></i>',array('controller'=>'packages','action'=>'packageedit',$package_id),array('escape'=>false,'class'=>'cd-select'));?>
                  <?php echo $this->Html->link('<i class="fa fa-eye fa-2x"></i>',array('controller'=>'packages','action'=>'packageview',$package_id),array('escape'=>false,'class'=>'cd-select'));?>
                  <?php echo $this->Html->link('<i class="fa fa-remove fa-2x"></i>',array('controller'=>'packages','action'=>'deletePackage',$package_id),array('escape'=>false,'class'=>'cd-select','confirm' => 'Are you sure?'));?>        
                       
                </footer>
              </div> 
              
              <?php }
              
              }?>
              
            </div>

            </div>
        </div>


      </div>
    </div>
  </div>
</div> -->
  <!-- <div class="panel panel-white">
    <div class="panel-body">
      <div class="row"> 
        <?php foreach($Packages as $package) {?>
        <div class="col-xs-12 col-sm-3">
          <div class="panel panel-white">
            <div class="panel-body">
              <ul class="cd-pricing-wrapper">
                <li class="is-visible is-ended">
                  <header class="cd-pricing-header">
                    <h2><?php echo $title=$package['Package']['title'];?></h2>
                      <div class="cd-price">
                        <span class="cd-currency">$</span>
                        <span style="font-size: 50px; bold;"><?php echo $package['Package']['price'];?></span>
                      </div>
                  </header>
                  <div class="cd-pricing-body">
                    <ul class="cd-pricing-features">
                      <li><?php $title=$package['Package']['title']; echo ucfirst($title);?></li>
                      <li><?php echo '$',$package['Package']['price'].'.00';?></li>
                      <li><?php echo $package['Package']['status'];?></li>
                      <li><?php echo $package['Package']['feature_1'];?></li>
                      <li><?php echo $package['Package']['feature_2'];?></li>
                      <li><?php echo $package['Package']['feature_3'];?></li>
                      <li><?php echo $package['Package']['feature_4'];?></li>
                      <li><?php echo $package['Package']['feature_5'];?></li>
                      <li><?php echo $package['Package']['feature_6'];?></li>
                      <li><?php echo $package['Package']['feature_7'];?></li>
                      <li><?php echo $package['Package']['feature_8'];?></li>
                      <li><?php echo $package['Package']['feature_9'];?></li>
                      <li><?php echo $package['Package']['feature_10'];?></li>
                      <li><?php echo $package['Package']['feature_11'];?></li>
                      <li><?php echo $package['Package']['feature_12'];?></li>
                      <li><?php echo $package['Package']['feature_13'];?></li>
                      <li><?php echo $package['Package']['feature_14'];?></li>
                      <li><?php echo $package['Package']['feature_15'];?></li>
                      <li><?php echo $package['Package']['feature_16'];?></li>
                      <li><?php echo $package['Package']['feature_17'];?></li>
                      <li><?php echo $package['Package']['feature_18'];?></li>
                      <li><?php echo $package['Package']['feature_19'];?></li>
                      <li><?php echo $package['Package']['feature_20'];?></li>
                    </ul>
                  </div>

                  <footer class="cd-pricing-footer">
                  <?php $package_id = $package['Package']['id'];?>
                  <?php echo $this->Html->link('<i class="fa fa-edit fa-2x"></i>',array('controller'=>'packages','action'=>'packageedit',$package_id),array('escape'=>false,'class'=>'cd-select'));?>
                  <?php echo $this->Html->link('<i class="fa fa-eye fa-2x"></i>',array('controller'=>'packages','action'=>'packageview',$package_id),array('escape'=>false,'class'=>'cd-select'));?>                   
                  </footer>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <?php } ?>
      </div>
    </div>
  </div> -->
  
</div>


 <!--togle area end-->
<style type="text/css">
  .stat{
    float: left;
    padding: 5px;
    width: 450px;
  }
  .package_stat{
    padding: 5px;
    text-align: center;
  }
</style>