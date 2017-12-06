<?php echo $this->Flash->render('positive'); ?>

<?php
//Set useful variables for paypal form
$paypalURL = 'https://www.sandbox.paypal.com/cgi-bin/webscr'; //Test PayPal API URL

$paypalID = ''; //Business Email

if(!empty($PaypalAccount))
{
  $paypalID = $PaypalAccount['PaypalAccount']['account'];
}

?>
<?php $siteURL = Router::fullbaseUrl().$this->webroot;?>

<div class="container">
  <div class="row">
        <div class="col-md-12">
            <div class="widget big-stats-container">
                <div class="widget-content">

                <!-- moving nav-pills closer to center & giving them some vertical space -->
                <div class="row">
                  <div class="col-md-12" style="margin-bottom:0.5cm;margin-top: 60px;">
                    <button class="btn btn-success" id="btn_activeplan">Active Plan</button>
                    <button class="btn btn-primary" id="btn_prevoiusplan" style="display: none;">Previous Plan</button>
                  </div>
                </div>
                
                <!-- <form method="post" action="https://www.sandbox.paypal.com/cgi-bin/webscr">
  <input type="hidden" value="_xclick" name="cmd">
  <input type="hidden" value="onlinestore@thegreekmerchant.com" name="business">
  <input type="hidden" name="undefined_quantity" value="1" />
  <input type="hidden" value="Order at The Greek Merchant:<br>Goldfish Flock BLG&lt;br /&gt;" name="item_name">
  <input type="hidden" value="NA" name="item_number">
  <input type="hidden" value="22.16" name="amount"> 
  <input type="hidden" value="5.17" name="shipping">
  <input type="hidden" value="0" name="discount_amount">        
  <input type="hidden" value="0" name="no_shipping">
  <input type="hidden" value="No comments" name="cn">
  <input type="hidden" value="USD" name="currency_code">
  <input type='hidden' name='cancel_return' value='<?php echo $siteURL?>Payments/cancel'>
  <input type='hidden' name='return' value='<?php echo $siteURL?>Payments/success'>
  <input type="hidden" value="2" name="rm">      
  <input type="hidden" value="11255XXX" name="invoice">
  <input type="hidden" value="US" name="lc">
  <input type="hidden" value="PP-BuyNowBF" name="bn">
  <input type="submit" value="Place Order!" name="finalizeOrder" id="finalizeOrder" class="submitButton">
</form>
 -->
                <!-- Active Plan -->
                <div id="activeplan" style="display: none;">
                  <?php if(!empty($UserPackage)){?>
                  <?php 
                      $item_name    = $UserPackage['UserPackage']['item_name'];
                      $amount       = $UserPackage['UserPackage']['amount'];
                      $payment_date = $UserPackage['UserPackage']['payment_date'];
                    

                    foreach($Packages as $package) {

                      $status = $package['Package']['status'];

                      if($status == "yearly")
                      {
                          if($item_name==$package['Package']['title'])
                          {
                            ?>
                            <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                              <h2>Active Plan</h2>
                              <div class="alert alert-info">
                                Your plan ended at <?php 
                                echo $date = date('Y-m-d', strtotime($payment_date . ' +1 year'));
                                ?>
                              </div>
                              <div class="package_stat" style="border: 1px solid #1db198;">
                              
                              <h2><?php echo $package['Package']['title'];?></h2>
                              <p><input type="button" name="submit"  class="btn btn-lg btn-success mvs" value="<?php echo "Upgrade @ $",$package['Package']['price'].'.00 / year';?>">
                              </p>
                              <p class="lead"><?php echo $package['Package']['feature_1'];?></p>
                              <p class="lead"><?php echo $package['Package']['feature_2'];?></p>
                              <p class="lead"><?php echo $package['Package']['feature_3'];?></p>
                              <hr>
                              <p><?php echo $package['Package']['feature_4'];?></p>
                              <p><?php echo $package['Package']['feature_5'];?></p>
                              <p><?php echo $package['Package']['feature_6'];?><i class="fa fa-check-square-o"></i></p>
                              </div>

                            </div>
                            <div class="col-md-2"></div>
                            </div>
                          <?php 
                          }
                      }
                      elseif ($status == "monthly") {
                          if($item_name==$package['Package']['title'])
                          {
                            ?>
                            <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                              <h2>Active Plan</h2>
                              <div class="alert alert-info">
                                Your plan ended at <?php 
                                echo $date = date('Y-m-d', strtotime($payment_date . ' +30 days'));
                                ?>
                              </div>
                              <div class="package_stat" style="border: 1px solid #e8bf40;">
                              
                              <h2><?php echo $package['Package']['title'];?></h2>
                              <p><input type="button" name="submit"  class="btn btn-lg btn-warning mvs" value="<?php echo "Upgrade @ $",$package['Package']['price'].'.00 / month';?>">
                              </p>
                              <p class="lead"><?php echo $package['Package']['feature_1'];?></p>
                              <p class="lead"><?php echo $package['Package']['feature_2'];?></p>
                              <p class="lead"><?php echo $package['Package']['feature_3'];?></p>
                              <hr>
                              <p><?php echo $package['Package']['feature_4'];?></p>
                              <p><?php echo $package['Package']['feature_5'];?></p>
                              <p><?php echo $package['Package']['feature_6'];?><i class="fa fa-check-square-o"></i></p>
                              </div>

                            </div>
                            <div class="col-md-2"></div>
                            </div>
                          <?php 
                          }
                      }
                      elseif ($status == "new") {
                          if($item_name==$package['Package']['title'])
                          {
                            ?>
                            <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                              <h2>Active Plan</h2>
                              <div class="alert alert-info">
                                Your plan ended at <?php 
                                echo $date = date('Y-m-d', strtotime($payment_date . ' +30 days'));
                                ?>
                              </div>
                              <div class="package_stat" style="border: 1px solid #e8bf40;">
                              
                              <h2><?php echo $package['Package']['title'];?></h2>
                              <p><input type="button" name="submit"  class="btn btn-lg btn-warning mvs" value="<?php echo "Upgrade @ $",$package['Package']['price'].'.00 / month';?>">
                              </p>
                              <p class="lead"><?php echo $package['Package']['feature_1'];?></p>
                              <p class="lead"><?php echo $package['Package']['feature_2'];?></p>
                              <p class="lead"><?php echo $package['Package']['feature_3'];?></p>
                              <hr>
                              <p><?php echo $package['Package']['feature_4'];?></p>
                              <p><?php echo $package['Package']['feature_5'];?></p>
                              <p><?php echo $package['Package']['feature_6'];?><i class="fa fa-check-square-o"></i></p>
                              </div>

                            </div>
                            <div class="col-md-2"></div>
                            </div>
                          <?php 
                          }
                      }
                      else{

                      }
                    }
                  }else{?>
                    <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                      <div class="alert alert-info">
                        <strong>Info!</strong> There is No Plan Activated at this time Please Select Any Plan First..!!
                      </div>
                    </div>
                    <div class="col-md-2"></div>
                    </div>
                  <?php }?>
                </div>

                <!-- Previous Plan -->
                <div id="previousplan" style="display: none;">
                  <?php if(!empty($UserPackage)){?>
                  <?php 
                      $item_name    = $UserPackage['UserPackage']['previous_item_name'];
                      $amount       = $UserPackage['UserPackage']['amount'];
                      $payment_date = $UserPackage['UserPackage']['previous_payment_date'];
                    

                    foreach($Packages as $package) {

                      $status = $package['Package']['status'];

                      if($status == "yearly")
                      {
                          if($item_name==$package['Package']['title'])
                          {
                            ?>
                            <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                              <h2>Previous Plan</h2>
                              <div class="alert alert-info" style="margin-top: 5px;">
                                Your plan ended at <?php 
                                echo $date = date('Y-m-d', strtotime($payment_date . ' +1 year'));
                                ?>
                              </div>
                              <div class="package_stat" style="border: 1px solid #1db198;">
                              
                              <h2><?php echo $package['Package']['title'];?></h2>
                              <p><input type="button" name="submit"  class="btn btn-lg btn-success mvs" value="<?php echo "Upgrade @ $",$package['Package']['price'].'.00 / year';?>">
                              </p>
                              <p class="lead"><?php echo $package['Package']['feature_1'];?></p>
                              <p class="lead"><?php echo $package['Package']['feature_2'];?></p>
                              <p class="lead"><?php echo $package['Package']['feature_3'];?></p>
                              <hr>
                              <p><?php echo $package['Package']['feature_4'];?></p>
                              <p><?php echo $package['Package']['feature_5'];?></p>
                              <p><?php echo $package['Package']['feature_6'];?><i class="fa fa-check-square-o"></i></p>
                              </div>

                            </div>
                            <div class="col-md-2"></div>
                            </div>
                          <?php 
                          }
                      }
                      elseif ($status == "monthly") {
                          if($item_name==$package['Package']['title'])
                          {
                            ?>
                            <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                              <h2>Previous Plan</h2>
                              <div class="alert alert-info">
                                Your plan ended at <?php 
                                echo $date = date('Y-m-d', strtotime($payment_date . ' +30 days'));
                                ?>
                              </div>
                              <div class="package_stat" style="border: 1px solid #e8bf40;">
                              
                              <h2><?php echo $package['Package']['title'];?></h2>
                              <p><input type="button" name="submit"  class="btn btn-lg btn-warning mvs" value="<?php echo "Upgrade @ $",$package['Package']['price'].'.00 / month';?>">
                              </p>
                              <p class="lead"><?php echo $package['Package']['feature_1'];?></p>
                              <p class="lead"><?php echo $package['Package']['feature_2'];?></p>
                              <p class="lead"><?php echo $package['Package']['feature_3'];?></p>
                              <hr>
                              <p><?php echo $package['Package']['feature_4'];?></p>
                              <p><?php echo $package['Package']['feature_5'];?></p>
                              <p><?php echo $package['Package']['feature_6'];?><i class="fa fa-check-square-o"></i></p>
                              </div>

                            </div>
                            <div class="col-md-2"></div>
                            </div>
                          <?php 
                          }
                      }
                      elseif ($status == "new") {
                          if($item_name==$package['Package']['title'])
                          {
                            ?>
                            <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                              <h2>Active Plan</h2>
                              <div class="alert alert-info">
                                Your plan ended at <?php 
                                echo $date = date('Y-m-d', strtotime($payment_date . ' +30 days'));
                                ?>
                              </div>
                              <div class="package_stat" style="border: 1px solid #e8bf40;">
                              
                              <h2><?php echo $package['Package']['title'];?></h2>
                              <p><input type="button" name="submit"  class="btn btn-lg btn-warning mvs" value="<?php echo "Upgrade @ $",$package['Package']['price'].'.00 / month';?>">
                              </p>
                              <p class="lead"><?php echo $package['Package']['feature_1'];?></p>
                              <p class="lead"><?php echo $package['Package']['feature_2'];?></p>
                              <p class="lead"><?php echo $package['Package']['feature_3'];?></p>
                              <hr>
                              <p><?php echo $package['Package']['feature_4'];?></p>
                              <p><?php echo $package['Package']['feature_5'];?></p>
                              <p><?php echo $package['Package']['feature_6'];?><i class="fa fa-check-square-o"></i></p>
                              </div>

                            </div>
                            <div class="col-md-2"></div>
                            </div>
                          <?php 
                          }
                      }else{

                      }
                    }
                  }else{?>
                    <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                      <div class="alert alert-info">
                        <strong>Info!</strong> There is No Plan Activated at this time Please Select Any Plan First..!!
                      </div>
                    </div>
                    <div class="col-md-2"></div>
                    </div>
                  <?php }?>
                </div>

                <!-- <div class="col-md-5"></div>
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

                    <?php foreach($Packages as $package) {

                    $status = $package['Package']['status'];
                    if($status == "yearly")
                    {
                      ?>
                      <div class="stat cd-pricing-features" >
                        <form action="<?php echo $paypalURL; ?>" method="post">
                        <span class="value"></span>
                        <li><h2><?php $title=$package['Package']['title']; echo ucfirst($title);?></h2></li>
                        <li class="btn-success">
                            <input type="submit" name="Submit" value="<?php echo "Upgrade @ $",$package['Package']['price'].'.00 / year';?>" class="btn-success">
                        </li>
                        <li class="lead"><?php echo $package['Package']['feature_1'];?></li>
                        <li class="lead"><?php echo $package['Package']['feature_2'];?></li>
                        <li class="lead"><?php echo $package['Package']['feature_3'];?></li>
                        <hr>
                        <li><?php echo $package['Package']['feature_4'];?></li>
                        <li><?php echo $package['Package']['feature_5'];?></li>
                        <li><?php echo $package['Package']['feature_6'];?> <i class="fa fa-check-square-o"></i></li>


                        <input type="hidden" name="business" value="<?php echo $paypalID; ?>">
                    
                        
                        <input type="hidden" name="cmd" value="_xclick">
                        
                        
                        <input type="hidden" name="item_name" value="<?php echo $title;?>">
                        <input type="hidden" name="item_number" value="<?php echo $package['Package']['id'];?>"> -->
                        <!-- <input type="hidden" name="amount" value="<?php echo $package['Package']['price'];?>"> -->

                        <!-- <input type="hidden" name="currency_code" value="USD">
                        <input type="hidden" name="rm" value="2" /> 
                        
                        <input type='hidden' name='cancel_return' value='<?php echo $siteURL?>Payments/cancel'>
                        <input type='hidden' name='return' value='<?php echo $siteURL?>Payments/success'>
                              
                              
                              
                              
                          </form> 
                          
                          
                          
                      </div> 
              
                      <?php 
                    }
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
                        <form action="<?php echo $paypalURL; ?>" method="post">
                        <span class="value"></span>
                        <li><h2><?php $title=$package['Package']['title']; echo ucfirst($title);?></h2></li>
                        <li  class="btn-warning">
                          <input type="submit" name="submit" value="<?php echo "Upgrade @ $",$package['Package']['price'].'.00 / month';?>" class="btn-warning">
                               
                        </li>
                        <li class="lead"><?php echo $package['Package']['feature_1'];?></li>
                        <li class="lead"><?php echo $package['Package']['feature_2'];?></li>
                        <li class="lead"><?php echo $package['Package']['feature_3'];?></li>
                        <hr>
                        <li><?php echo $package['Package']['feature_4'];?></li>
                        <li><?php echo $package['Package']['feature_5'];?></li>
                        <li><?php echo $package['Package']['feature_6'];?> <i class="fa fa-check-square-o"></i></li>
                         <input type="hidden" name="business" value="<?php echo $paypalID; ?>">
                          
                        
                          <input type="hidden" name="cmd" value="_xclick">
                          
                        
                          <input type="hidden" name="item_name" value="<?php echo $title?>">
                          <input type="hidden" name="item_number" value="<?php echo $package['Package']['id']?>"> -->
                          <!-- <input type="hidden" name="amount" value="<?php echo $package['Package']['price'];?>"> -->
                          <!-- <input type="hidden" name="currency_code" value="USD">
                          <input type="hidden" name="rm" value="2" /> 
                          <input type="hidden" name="no_note" value="1" /> 
                        
                          <input type='hidden' name='cancel_return' value='<?php echo $siteURL?>Payments/cancel'>
                          <input type='hidden' name='return' value='<?php echo $siteURL?>Payments/success'>
                        </form>
                        
                      </div> 
                      
                      <?php }
                      
                      }?>
                          
                    </div>
                    </div>
                </div> -->
                   
                  <!-- New -->

                   <div class="tab-content">
                  
                    <div class="tab-pane active" id="annual">

                    <div id="big_stats" class="cf">

                    <?php foreach($Packages as $package) {

                    $status = $package['Package']['status'];
                    if($status == "new")
                    {
                      ?>
                      <div class="stat cd-pricing-features" >
                        <form action="<?php echo $paypalURL; ?>" method="post">
                        <span class="value"></span>
                        <li><h2><?php $title=$package['Package']['title']; echo ucfirst($title);?></h2></li>
                        <li class="btn-success">
                            <input type="submit" name="Submit" value="<?php echo "Upgrade @ $",$package['Package']['price'].'.00 / month';?>" class="btn-success">
                        </li>
                        <li class="lead"><?php echo $package['Package']['feature_1'];?></li>
                        <li class="lead"><?php echo $package['Package']['feature_2'];?></li>
                        <li class="lead"><?php echo $package['Package']['feature_3'];?></li>
                        <hr>
                        <li><?php echo $package['Package']['feature_4'];?></li>
                        


                        <input type="hidden" name="business" value="<?php echo $paypalID; ?>">
                    
                        
                        <input type="hidden" name="cmd" value="_xclick">
                        
                        
                        <input type="hidden" name="item_name" value="<?php echo $title;?>">
                        <input type="hidden" name="item_number" value="<?php echo $package['Package']['id'];?>"> 
                        <!-- <input type="hidden" name="amount" value="<?php echo $package['Package']['price'];?>"> -->

                        <input type="hidden" name="currency_code" value="USD">
                        <input type="hidden" name="rm" value="2" /> 
                        
                        <input type='hidden' name='cancel_return' value='<?php echo $siteURL?>Payments/cancel'>
                        <input type='hidden' name='return' value='<?php echo $siteURL?>Payments/success'>
                              
                              
                              
                              
                          </form> 
                          
                          
                          
                      </div> 
              
                      <?php 
                    }
                    }?>
              
                    </div>

                    </div>
                </div> <!-- /widget -->
            </div> <!-- /big-stats-container -->
        </div> <!-- /widget-content -->
    </div>
</div>




<div class="row well" style="text-align: center;">
<hr>
<p class="lead"> All Plans include invoicing and inventory management. </p><br><br>
</div>

 <!--togle area end-->
<style type="text/css">
  .stat{
    float: left;
    padding: 5px;
    width: 370px;
  }
  .package_stat{
    padding: 5px;
    text-align: center;
  }
</style>

<script>
$(document).ready(function(){
    $("#btn_activeplan").click(function(){
        $("#activeplan").toggle();
        $("#btn_prevoiusplan").toggle();
    });
    $("#btn_prevoiusplan").click(function(){
        $("#previousplan").toggle();
    });
    
});
</script>