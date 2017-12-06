

<div class="warper container-fluid" style="margin-bottom:50px; margin-top:40px;">
    <?php echo $this->element('frontenduser/sidebar1'); ?>
    <div class="col-xs-9">
    <?php echo $this->Flash->render('positive'); ?>
    <div class="panel panel-white">
      
      <div class="panel-body">
        <div class="row">  
          <div class="col-md-9" style="margin-top: -20px;">
              <b><h2><i class="fa fa-gear"></i>    General Settings</h2></b>
          </div>
          <div class="col-md-3">
              <?php echo $this->Html->link('<p class="btn btn-default right">Back to Admin</p>',array('controller'=>'Administrations','action'=>'index'),array('escape'=>false));?> 
          </div>
        </div><br>
        <div class="row">
          <div class="col-xs-12 col-sm-12">
            <?php 
              if(!empty($Package))
              {
                $package_name    = $Package['UserPackage']['item_name'];
                $multilocation   = $Package['UserPackage']['multilocation'];
                ?>
                <div id="multilocationvalue" style="display: none;"><?php echo $multilocation;?></div>
                <?php
                 if($multilocation == 1)
                {
                  if($package_name != "")
                  {
                    echo $this->Form->input('multilocations', array('div'=>false,'type'=>'checkbox','label'=>'&nbsp;&nbsp;Enable Multi Locations','class'=>'multilocations','checked'=>"checked")); 
                  }
                  
                }
                else
                {
                  if($package_name != "")
                  {
                    echo $this->Form->input('multilocations', array('div'=>false,'type'=>'checkbox','label'=>'&nbsp;&nbsp;Enable Multi Locations','class'=>'multilocations')); 
                  }
                }
              }
            ?>
            <div class="Multilocations" style="margin-top: 20px; display: none;">
              <div class="panel panel-white" >
                <div class="panel-heading clearfix">
                  <h4 class="panel-title">Listing Locations</h4>
                </div>

              <div class="panel-body">

                <div class="table-responsive">
                  <table id="example" class="display table" style="width: 100%; cellspacing: 0; ">
                    <thead>
                    <tr>                                  
                      <th>Name</th>
                      <th>Id</th>
                      <th>Address</th>
                      <th>City</th>
                      <th>Phone</th>
                      <th>Edit</th>
                      <th>Destroy</th>    
                    </tr>
                    </thead>
                      
                    <tbody>
                      <?php $counter=0;?>
                      <?php foreach($Multilocations as $Multilocation) {
                        $counter = $counter++;
                        ?>
                          
                              
                      <tr>
                          <?php $Multilocation_id= $Multilocation['Multilocation']['id'];?>
                          <?php $user_id= $Multilocation['Multilocation']['user_id'];?>
                          <td>
                            <?php echo ucfirst($name = $Multilocation['Multilocation']['name']);?>
                          </td>
                          <td>
                            <?php echo $Multilocation_id;?>
                          </td> 
                          <td><?php echo $Multilocation['Multilocation']['address'];?> 
                          </td>
                          <td><?php echo $Multilocation['Multilocation']['city'];?></td>                        
                          <td><?php echo $Multilocation['Multilocation']['phone_number'];?></td>
                          <td><?php echo $this->Html->link('Edit',array('controller'=>'Administrations','action'=>'editingmultilocation',$Multilocation_id),array('escape'=>false));?></td>
                          <td><?php echo $this->Html->link('Destroy',array('controller' => 'Administrations', 'action' => 'deletemultilocation',$Multilocation_id),array('escape'=>false,'confirm' => 'Are you sure you wish to delete this Location?'));?></td>
                      </tr> 

                      <?php  } ?>  
                    </tbody> 
                  </table>  
                </div>
                <br>
                
                <?php echo $this->Html->link('New Location',array('controller'=>'Administrations','action'=>'addnewmultilocation'),array('escape'=>false,'class'=>'btn btn-primary'));?>
                <br>
               
              </div>
              </div>
            </div>
          </div>
        </div>
        <?php echo $this->Form->create('Administrations',array('controller'=>'Administrations','action'=>'general')); ?>
        <div class="row">                 
          <div class="col-xs-12 col-sm-12">
            
            <hr>
            <div class="col-xs-6 col-sm-6">
            
              <div class="row">                 
                <div class="col-xs-12 col-sm-12">
                <div class="form-group">

                

                <?php if(!empty($BusinessSetting))
                      {
                        $time_zone = $BusinessSetting['BusinessSetting']['time_zone'];
                ?>
                <label class="control-label">Time Zone</label>
                <select name="BusinessSetting[time_zone]" class="select optional form-control time_zone" data-validation="required">
                  <option value="American Samoa" <?php if ($time_zone == 'American Samoa') echo ' selected="selected"'; ?> >(GMT-11:00) American Samoa</option>
                  <option value="International Date Line West" <?php if ($time_zone == 'International Date Line West') echo ' selected="selected"'; ?> >(GMT-11:00) International Date Line West</option>
                  <option value="Midway Island" <?php if ($time_zone == 'Midway Island') echo ' selected="selected"'; ?> >(GMT-11:00) Midway Island</option>
                  <option value="Hawaii" <?php if ($time_zone == 'Hawaii') echo ' selected="selected"'; ?> >(GMT-10:00) Hawaii</option>
                  <option value="Alaska" <?php if ($time_zone == 'Alaska') echo ' selected="selected"'; ?> >(GMT-09:00) Alaska</option>
                  <option value="Pacific Time (US &amp; Canada)" <?php if ($time_zone == 'Pacific Time (US &amp; Canada)') echo ' selected="selected"'; ?> >(GMT-08:00) Pacific Time (US &amp; Canada)</option>
                  <option value="Tijuana" <?php if ($time_zone == 'Tijuana') echo ' selected="selected"'; ?> >(GMT-08:00) Tijuana</option>
                  <option value="US/Pacific" <?php if ($time_zone == 'US/Pacific') echo ' selected="selected"'; ?> >(GMT-08:00) US/Pacific</option>
                  <option value="Arizona" <?php if ($time_zone == 'Arizona') echo ' selected="selected"'; ?> >(GMT-07:00) Arizona</option>
                  <option value="Chihuahua" <?php if ($time_zone == 'Chihuahua') echo ' selected="selected"'; ?> >(GMT-07:00) Chihuahua</option>
                  <option value="Mazatlan" <?php if ($time_zone == 'Mazatlan') echo ' selected="selected"'; ?> >(GMT-07:00) Mazatlan</option>
                  <option value="Mountain Time (US &amp; Canada)" <?php if ($time_zone == 'Mountain Time (US &amp; Canada)') echo ' selected="selected"'; ?> >(GMT-07:00) Mountain Time (US &amp; Canada)</option>
                  <option value="Central America" <?php if ($time_zone == 'Central America') echo ' selected="selected"'; ?> >(GMT-06:00) Central America</option>
                  <option value="Central Time (US &amp; Canada)" <?php if ($time_zone == 'Central Time (US &amp; Canada)') echo ' selected="selected"'; ?> >(GMT-06:00) Central Time (US &amp; Canada)</option>
                  <option value="Guadalajara" <?php if ($time_zone == 'Guadalajara') echo ' selected="selected"'; ?> >(GMT-06:00) Guadalajara</option>
                  <option value="Mexico City" <?php if ($time_zone == 'Mexico City') echo ' selected="selected"'; ?> >(GMT-06:00) Mexico City</option>
                  <option value="Monterrey" <?php if ($time_zone == 'Monterrey') echo ' selected="selected"'; ?> >(GMT-06:00) Monterrey</option>
                  <option value="Saskatchewan" <?php if ($time_zone == 'Saskatchewan') echo ' selected="selected"'; ?> >(GMT-06:00) Saskatchewan</option>
                  <option value="Bogota" <?php if ($time_zone == 'Bogota') echo ' selected="selected"'; ?> >(GMT-05:00) Bogota</option>
                  <option value="Eastern Time (US &amp; Canada)"<?php if ($time_zone == 'Eastern Time (US &amp; Canada)') echo ' selected="selected"'; ?> >(GMT-05:00) Eastern Time (US &amp; Canada)</option>
                  <option value="Indiana (East)" <?php if ($time_zone == 'Indiana (East)') echo ' selected="selected"'; ?> >(GMT-05:00) Indiana (East)</option>
                  <option value="Lima" <?php if ($time_zone == 'Lima') echo ' selected="selected"'; ?> >(GMT-05:00) Lima</option>
                  <option value="Quito" <?php if ($time_zone == 'Quito') echo ' selected="selected"'; ?> >(GMT-05:00) Quito</option>
                  <option value="Atlantic Time (Canada)" <?php if ($time_zone == 'Atlantic Time (Canada)') echo ' selected="selected"'; ?> >(GMT-04:00) Atlantic Time (Canada)</option>
                  <option value="Caracas" <?php if ($time_zone == 'Caracas') echo ' selected="selected"'; ?> >(GMT-04:00) Caracas</option>
                  <option value="Georgetown" <?php if ($time_zone == 'Georgetown') echo ' selected="selected"'; ?> >(GMT-04:00) Georgetown</option>
                  <option value="La Paz" <?php if ($time_zone == 'La Paz') echo ' selected="selected"'; ?> >(GMT-04:00) La Paz</option>
                  <option value="Santiago" <?php if ($time_zone == 'Santiago') echo ' selected="selected"'; ?> >(GMT-04:00) Santiago</option>
                  <option value="Newfoundland" <?php if ($time_zone == 'Newfoundland') echo ' selected="selected"'; ?> >(GMT-03:30) Newfoundland</option>
                  <option value="Brasilia" <?php if ($time_zone == 'Brasilia') echo ' selected="selected"'; ?> >(GMT-03:00) Brasilia</option>
                  <option value="Buenos Aires" <?php if ($time_zone == 'Buenos Aires') echo ' selected="selected"'; ?> >(GMT-03:00) Buenos Aires</option>
                  <option value="Greenland" <?php if ($time_zone == 'Greenland') echo ' selected="selected"'; ?> >(GMT-03:00) Greenland</option>
                  <option value="Montevideo" <?php if ($time_zone == 'Montevideo') echo ' selected="selected"'; ?> >(GMT-03:00) Montevideo</option>
                  <option value="Mid-Atlantic" <?php if ($time_zone == 'Mid-Atlantic') echo ' selected="selected"'; ?> >(GMT-02:00) Mid-Atlantic</option>
                  <option value="Azores" <?php if ($time_zone == 'Azores') echo ' selected="selected"'; ?> >(GMT-01:00) Azores</option>
                  <option value="Cape Verde Is." <?php if ($time_zone == 'Cape Verde Is.') echo ' selected="selected"'; ?> >(GMT-01:00) Cape Verde Is.</option>
                  <option value="Casablanca" <?php if ($time_zone == 'Casablanca') echo ' selected="selected"'; ?> >(GMT+00:00) Casablanca</option>
                  <option value="Dublin" <?php if ($time_zone == 'Dublin') echo ' selected="selected"'; ?> >(GMT+00:00) Dublin</option>
                  <option value="Edinburgh" <?php if ($time_zone == 'Edinburgh') echo ' selected="selected"'; ?> >(GMT+00:00) Edinburgh</option>
                  <option value="Lisbon" <?php if ($time_zone == 'Lisbon') echo ' selected="selected"'; ?>>(GMT+00:00) Lisbon</option>
                  <option value="London" <?php if ($time_zone == 'London') echo ' selected="selected"'; ?>>(GMT+00:00) London</option>
                  <option value="Monrovia" <?php if ($time_zone == 'Monrovia') echo ' selected="selected"'; ?>>(GMT+00:00) Monrovia</option>
                  <option value="UTC" <?php if ($time_zone == 'UTC') echo ' selected="selected"'; ?>>(GMT+00:00) UTC</option>
                  <option value="Amsterdam"<?php if ($time_zone == 'Amsterdam') echo ' selected="selected"'; ?>>(GMT+01:00) Amsterdam</Amsterdam>
                  <option value="Belgrade"<?php if ($time_zone == 'Belgrade') echo ' selected="selected"'; ?>>(GMT+01:00) Belgrade</option>
                  <option value="Berlin"<?php if ($time_zone == 'Berlin') echo ' selected="selected"'; ?>>(GMT+01:00) Berlin</option>
                  <option value="Bern"<?php if ($time_zone == 'Bern') echo ' selected="selected"'; ?>>(GMT+01:00) Bern</option>
                  <option value="Bratislava"<?php if ($time_zone == 'Bratislava') echo ' selected="selected"'; ?>>(GMT+01:00) Bratislava</option>
                  <option value="Brussels"<?php if ($time_zone == 'Brussels') echo ' selected="selected"'; ?>>(GMT+01:00) Brussels</option>
                  <option value="Budapest"<?php if ($time_zone == 'Budapest') echo ' selected="selected"'; ?>>(GMT+01:00) Budapest</option>
                  <option value="Copenhagen"<?php if ($time_zone == 'Copenhagen') echo ' selected="selected"'; ?>>(GMT+01:00) Copenhagen</option>
                  <option value="Ljubljana"<?php if ($time_zone == 'Ljubljana') echo ' selected="selected"'; ?>>(GMT+01:00) Ljubljana</option>
                  <option value="Madrid"<?php if ($time_zone == 'Madrid') echo ' selected="selected"'; ?>>(GMT+01:00) Madrid</option>
                  <option value="Paris"<?php if ($time_zone == 'Paris') echo ' selected="selected"'; ?>>(GMT+01:00) Paris</option>
                  <option value="Prague"<?php if ($time_zone == 'Prague') echo ' selected="selected"'; ?>>(GMT+01:00) Prague</option>
                  <option value="Rome"<?php if ($time_zone == 'Rome') echo ' selected="selected"'; ?>>(GMT+01:00) Rome</option>
                  <option value="Sarajevo"<?php if ($time_zone == 'Sarajevo') echo ' selected="selected"'; ?>>(GMT+01:00) Sarajevo</option>
                  <option value="Skopje"<?php if ($time_zone == 'Skopje') echo ' selected="selected"'; ?>>(GMT+01:00) Skopje</option>
                  <option value="Stockholm"<?php if ($time_zone == 'Stockholm') echo ' selected="selected"'; ?>>(GMT+01:00) Stockholm</option>
                  <option value="Vienna"<?php if ($time_zone == 'Vienna') echo ' selected="selected"'; ?>>(GMT+01:00) Vienna</option>
                  <option value="Warsaw"<?php if ($time_zone == 'Warsaw') echo ' selected="selected"'; ?>>(GMT+01:00) Warsaw</option>
                  <option value="West Central Africa"<?php if ($time_zone == 'West Central Africa') echo ' selected="selected"'; ?>>(GMT+01:00) West Central Africa</option>
                  <option value="Zagreb"<?php if ($time_zone == 'Zagreb') echo ' selected="selected"'; ?>>(GMT+01:00) Zagreb</option>
                  <option value="Athens"<?php if ($time_zone == 'Athens') echo ' selected="selected"'; ?>>(GMT+02:00) Athens</option>
                  <option value="Bucharest"<?php if ($time_zone == 'Bucharest') echo ' selected="selected"'; ?>>(GMT+02:00) Bucharest</option>
                  <option value="Cairo"<?php if ($time_zone == 'Cairo') echo ' selected="selected"'; ?>>(GMT+02:00) Cairo</option>
                  <option value="Harare"<?php if ($time_zone == 'Harare') echo ' selected="selected"'; ?>>(GMT+02:00) Harare</option>
                  <option value="Helsinki"<?php if ($time_zone == 'Helsinki') echo ' selected="selected"'; ?>>(GMT+02:00) Helsinki</option>
                  <option value="Jerusalem"<?php if ($time_zone == 'Jerusalem') echo ' selected="selected"'; ?>>(GMT+02:00) Jerusalem</option>
                  <option value="Kaliningrad"<?php if ($time_zone == 'Kaliningrad') echo ' selected="selected"'; ?>>(GMT+02:00) Kaliningrad</option>
                  <option value="Kyiv"<?php if ($time_zone == 'Kyiv') echo ' selected="selected"'; ?>>(GMT+02:00) Kyiv</option>
                  <option value="Pretoria"<?php if ($time_zone == 'Pretoria') echo ' selected="selected"'; ?>>(GMT+02:00) Pretoria</option>
                  <option value="Riga"<?php if ($time_zone == 'Riga') echo ' selected="selected"'; ?>>(GMT+02:00) Riga</option>
                  <option value="Sofia"<?php if ($time_zone == 'Sofia') echo ' selected="selected"'; ?>>(GMT+02:00) Sofia</option>
                  <option value="Tallinn"<?php if ($time_zone == 'Tallinn') echo ' selected="selected"'; ?>>(GMT+02:00) Tallinn</option>
                  <option value="Vilnius"<?php if ($time_zone == 'Vilnius') echo ' selected="selected"'; ?>>(GMT+02:00) Vilnius</option>
                  <option value="Baghdad"<?php if ($time_zone == 'Baghdad') echo ' selected="selected"'; ?>>(GMT+03:00) Baghdad</option>
                  <option value="Istanbul"<?php if ($time_zone == 'Istanbul') echo ' selected="selected"'; ?>>(GMT+03:00) Istanbul</option>
                  <option value="Kuwait"<?php if ($time_zone == 'Kuwait') echo ' selected="selected"'; ?>>(GMT+03:00) Kuwait</option>
                  <option value="Minsk"<?php if ($time_zone == 'Minsk') echo ' selected="selected"'; ?>>(GMT+03:00) Minsk</option>
                  <option value="Moscow"<?php if ($time_zone == 'Moscow') echo ' selected="selected"'; ?>>(GMT+03:00) Moscow</option>
                  <option value="Nairobi"<?php if ($time_zone == 'Nairobi') echo ' selected="selected"'; ?>>(GMT+03:00) Nairobi</option>
                  <option value="Riyadh"<?php if ($time_zone == 'Riyadh') echo ' selected="selected"'; ?>>(GMT+03:00) Riyadh</option>
                  <option value="St. Petersburg"<?php if ($time_zone == 'St. Petersburg') echo ' selected="selected"'; ?>>(GMT+03:00) St. Petersburg</option>
                  <option value="Volgograd"<?php if ($time_zone == 'Volgograd') echo ' selected="selected"'; ?>>(GMT+03:00) Volgograd</option>
                  <option value="Tehran"<?php if ($time_zone == 'Tehran') echo ' selected="selected"'; ?>>(GMT+03:30) Tehran</option>
                  <option value="Abu Dhabi"<?php if ($time_zone == 'Abu Dhabi') echo ' selected="selected"'; ?>>(GMT+04:00) Abu Dhabi</option>
                  <option value="Baku"<?php if ($time_zone == 'Baku') echo ' selected="selected"'; ?>>(GMT+04:00) Baku</option>
                  <option value="Muscat"<?php if ($time_zone == 'Muscat') echo ' selected="selected"'; ?>>(GMT+04:00) Muscat</option>
                  <option value="Samara"<?php if ($time_zone == 'Samara') echo ' selected="selected"'; ?>>(GMT+04:00) Samara</option>
                  <option value="Tbilisi"<?php if ($time_zone == 'Tbilisi') echo ' selected="selected"'; ?>>(GMT+04:00) Tbilisi</option>
                  <option value="Yerevan"<?php if ($time_zone == 'Yerevan') echo ' selected="selected"'; ?>>(GMT+04:00) Yerevan</option>
                  <option value="Kabul"<?php if ($time_zone == 'Kabul') echo ' selected="selected"'; ?>>(GMT+04:30) Kabul</option>
                  <option value="Ekaterinburg"<?php if ($time_zone == 'Ekaterinburg') echo ' selected="selected"'; ?>>(GMT+05:00) Ekaterinburg</option>
                  <option value="Islamabad"<?php if ($time_zone == 'Islamabad') echo ' selected="selected"'; ?>>(GMT+05:00) Islamabad</option>
                  <option value="Karachi"<?php if ($time_zone == 'Karachi') echo ' selected="selected"'; ?>>(GMT+05:00) Karachi</option>
                  <option value="Tashkent"<?php if ($time_zone == 'Tashkent') echo ' selected="selected"'; ?>>(GMT+05:00) Tashkent</option>
                  <option value="Chennai"<?php if ($time_zone == 'Chennai') echo ' selected="selected"'; ?>>(GMT+05:30) Chennai</option>
                  <option value="Kolkata"<?php if ($time_zone == 'Kolkata') echo ' selected="selected"'; ?>>(GMT+05:30) Kolkata</option>
                  <option value="Mumbai"<?php if ($time_zone == 'Mumbai') echo ' selected="selected"'; ?>>(GMT+05:30) Mumbai</option>
                  <option value="New Delhi"<?php if ($time_zone == 'New Delhi') echo ' selected="selected"'; ?>>(GMT+05:30) New Delhi</option>
                  <option value="Sri Jayawardenepura"<?php if ($time_zone == 'Sri Jayawardenepura') echo ' selected="selected"'; ?>>(GMT+05:30) Sri Jayawardenepura</option>
                  <option value="Kathmandu"<?php if ($time_zone == 'Kathmandu') echo ' selected="selected"'; ?>>(GMT+05:45) Kathmandu</option>
                  <option value="Almaty"<?php if ($time_zone == 'Almaty') echo ' selected="selected"'; ?>>(GMT+06:00) Almaty</option>
                  <option value="Astana"<?php if ($time_zone == 'Astana') echo ' selected="selected"'; ?>>(GMT+06:00) Astana</option>
                  <option value="Dhaka"<?php if ($time_zone == 'Dhaka') echo ' selected="selected"'; ?>>(GMT+06:00) Dhaka</option>
                  <option value="Urumqi"<?php if ($time_zone == 'Urumqi') echo ' selected="selected"'; ?>>(GMT+06:00) Urumqi</option>
                  <option value="Rangoon"<?php if ($time_zone == 'Rangoon') echo ' selected="selected"'; ?>>(GMT+06:30) Rangoon</option>
                  <option value="Bangkok"<?php if ($time_zone == 'Bangkok') echo ' selected="selected"'; ?>>(GMT+07:00) Bangkok</option>
                  <option value="Hanoi"<?php if ($time_zone == 'Hanoi') echo ' selected="selected"'; ?>>(GMT+07:00) Hanoi</option>
                  <option value="Jakarta"<?php if ($time_zone == 'Jakarta') echo ' selected="selected"'; ?>>(GMT+07:00) Jakarta</option>
                  <option value="Krasnoyarsk"<?php if ($time_zone == 'Krasnoyarsk') echo ' selected="selected"'; ?>>(GMT+07:00) Krasnoyarsk</option>
                  <option value="Novosibirsk"<?php if ($time_zone == 'Novosibirsk') echo ' selected="selected"'; ?>>(GMT+07:00) Novosibirsk</option>
                  <option value="Beijing"<?php if ($time_zone == 'Beijing') echo ' selected="selected"'; ?>>(GMT+08:00) Beijing</option>
                  <option value="Chongqing"<?php if ($time_zone == 'Chongqing') echo ' selected="selected"'; ?>>(GMT+08:00) Chongqing</option>
                  <option value="Hong Kong"<?php if ($time_zone == 'Hong Kong') echo ' selected="selected"'; ?>>(GMT+08:00) Hong Kong</option>
                  <option value="Irkutsk"<?php if ($time_zone == 'Irkutsk') echo ' selected="selected"'; ?>>(GMT+08:00) Irkutsk</option>
                  <option value="Kuala Lumpur"<?php if ($time_zone == 'Kuala Lumpur') echo ' selected="selected"'; ?>>(GMT+08:00) Kuala Lumpur</option>
                  <option value="Perth"<?php if ($time_zone == 'Perth') echo ' selected="selected"'; ?>>(GMT+08:00) Perth</option>
                  <option value="Singapore"<?php if ($time_zone == 'Singapore') echo ' selected="selected"'; ?>>(GMT+08:00) Singapore</option>
                  <option value="Taipei"<?php if ($time_zone == 'Taipei') echo ' selected="selected"'; ?>>(GMT+08:00) Taipei</option>
                  <option value="Ulaanbaatar"<?php if ($time_zone == 'Ulaanbaatar') echo ' selected="selected"'; ?>>(GMT+08:00) Ulaanbaatar</option>
                  <option value="Osaka"<?php if ($time_zone == 'Osaka') echo ' selected="selected"'; ?>>(GMT+09:00) Osaka</option>
                  <option value="Sapporo"<?php if ($time_zone == 'Sapporo') echo ' selected="selected"'; ?>>(GMT+09:00) Sapporo</option>
                  <option value="Seoul"<?php if ($time_zone == 'Seoul') echo ' selected="selected"'; ?>>(GMT+09:00) Seoul</option>
                  <option value="Tokyo"<?php if ($time_zone == 'Tokyo') echo ' selected="selected"'; ?>>(GMT+09:00) Tokyo</option>
                  <option value="Yakutsk"<?php if ($time_zone == 'Yakutsk') echo ' selected="selected"'; ?>>(GMT+09:00) Yakutsk</option>
                  <option value="Adelaide"<?php if ($time_zone == 'Adelaide') echo ' selected="selected"'; ?>>(GMT+09:30) Adelaide</option>
                  <option value="Darwin"<?php if ($time_zone == 'Darwin') echo ' selected="selected"'; ?>>(GMT+09:30) Darwin</option>
                  <option value="Brisbane"<?php if ($time_zone == 'Brisbane') echo ' selected="selected"'; ?>>(GMT+10:00) Brisbane</option>
                  <option value="Canberra"<?php if ($time_zone == 'Canberra') echo ' selected="selected"'; ?>>(GMT+10:00) Canberra</option>
                  <option value="Guam"<?php if ($time_zone == 'Guam') echo ' selected="selected"'; ?>>(GMT+10:00) Guam</option>
                  <option value="Hobart"<?php if ($time_zone == 'Hobart') echo ' selected="selected"'; ?>>(GMT+10:00) Hobart</option>
                  <option value="Melbourne"<?php if ($time_zone == 'Melbourne') echo ' selected="selected"'; ?>>(GMT+10:00) Melbourne</option>
                  <option value="Port Moresby"<?php if ($time_zone == 'Port Moresby') echo ' selected="selected"'; ?>>(GMT+10:00) Port Moresby</option>
                  <option value="Sydney"<?php if ($time_zone == 'Sydney') echo ' selected="selected"'; ?>>(GMT+10:00) Sydney</option>
                  <option value="Vladivostok"<?php if ($time_zone == 'Vladivostok') echo ' selected="selected"'; ?>>(GMT+10:00) Vladivostok</option>
                  <option value="Magadan"<?php if ($time_zone == 'Magadan') echo ' selected="selected"'; ?>>(GMT+11:00) Magadan</option>
                  <option value="New Caledonia"<?php if ($time_zone == 'New Caledonia') echo ' selected="selected"'; ?>>(GMT+11:00) New Caledonia</option>
                  <option value="Solomon Is."<?php if ($time_zone == 'Solomon Is.') echo ' selected="selected"'; ?>>(GMT+11:00) Solomon Is.</option>
                  <option value="Srednekolymsk"<?php if ($time_zone == 'Srednekolymsk') echo ' selected="selected"'; ?>>(GMT+11:00) Srednekolymsk</option>
                  <option value="Auckland"<?php if ($time_zone == 'Auckland') echo ' selected="selected"'; ?>>(GMT+12:00) Auckland</option>
                  <option value="Fiji"<?php if ($time_zone == 'Fiji') echo ' selected="selected"'; ?>>(GMT+12:00) Fiji</option>
                  <option value="Kamchatka"<?php if ($time_zone == 'Kamchatka') echo ' selected="selected"'; ?>>(GMT+12:00) Kamchatka</option>
                  <option value="Marshall Is."<?php if ($time_zone == 'Marshall Is.') echo ' selected="selected"'; ?>>(GMT+12:00) Marshall Is.</option>
                  <option value="Wellington"<?php if ($time_zone == 'Wellington') echo ' selected="selected"'; ?>>(GMT+12:00) Wellington</option>
                  <option value="Chatham Is."<?php if ($time_zone == 'Chatham Is.') echo ' selected="selected"'; ?>>(GMT+12:45) Chatham Is.</option>
                  <option value="Nuku'alofa"<?php if ($time_zone == "Nuku'alofa") echo ' selected="selected"'; ?>>(GMT+13:00) Nuku'alofa</option>
                  <option value="Samoa"<?php if ($time_zone == 'Samoa') echo ' selected="selected"'; ?>>(GMT+13:00) Samoa</option>
                  <option value="Tokelau Is."<?php if ($time_zone == 'Tokelau Is.') echo ' selected="selected"'; ?>>(GMT+13:00) Tokelau Is.</option>
                </select>
                <?php }else{ ?>
                <label class="control-label">Time Zone</label>
                <select name="BusinessSetting[time_zone]" class="select optional form-control time_zone" data-validation="required">
                  <option value="American Samoa">(GMT-11:00) American Samoa</option>
                  <option value="International Date Line West">(GMT-11:00) International Date Line West</option>
                  <option value="Midway Island">(GMT-11:00) Midway Island</option>
                  <option value="Hawaii">(GMT-10:00) Hawaii</option>
                  <option value="Alaska">(GMT-09:00) Alaska</option>
                  <option value="Pacific Time (US &amp; Canada)" selected="selected">(GMT-08:00) Pacific Time (US &amp; Canada)</option>
                  <option value="Tijuana">(GMT-08:00) Tijuana</option>
                  <option value="US/Pacific">(GMT-08:00) US/Pacific</option>
                  <option value="Arizona">(GMT-07:00) Arizona</option>
                  <option value="Chihuahua">(GMT-07:00) Chihuahua</option>
                  <option value="Mazatlan">(GMT-07:00) Mazatlan</option>
                  <option value="Mountain Time (US &amp; Canada)">(GMT-07:00) Mountain Time (US &amp; Canada)</option>
                  <option value="Central America">(GMT-06:00) Central America</option>
                  <option value="Central Time (US &amp; Canada)">(GMT-06:00) Central Time (US &amp; Canada)</option>
                  <option value="Guadalajara">(GMT-06:00) Guadalajara</option>
                  <option value="Mexico City">(GMT-06:00) Mexico City</option>
                  <option value="Monterrey">(GMT-06:00) Monterrey</option>
                  <option value="Saskatchewan">(GMT-06:00) Saskatchewan</option>
                  <option value="Bogota">(GMT-05:00) Bogota</option>
                  <option value="Eastern Time (US &amp; Canada)">(GMT-05:00) Eastern Time (US &amp; Canada)</option>
                  <option value="Indiana (East)">(GMT-05:00) Indiana (East)</option>
                  <option value="Lima">(GMT-05:00) Lima</option>
                  <option value="Quito">(GMT-05:00) Quito</option>
                  <option value="Atlantic Time (Canada)">(GMT-04:00) Atlantic Time (Canada)</option>
                  <option value="Caracas">(GMT-04:00) Caracas</option>
                  <option value="Georgetown">(GMT-04:00) Georgetown</option>
                  <option value="La Paz">(GMT-04:00) La Paz</option>
                  <option value="Santiago">(GMT-04:00) Santiago</option>
                  <option value="Newfoundland">(GMT-03:30) Newfoundland</option>
                  <option value="Brasilia">(GMT-03:00) Brasilia</option>
                  <option value="Buenos Aires">(GMT-03:00) Buenos Aires</option>
                  <option value="Greenland">(GMT-03:00) Greenland</option>
                  <option value="Montevideo">(GMT-03:00) Montevideo</option>
                  <option value="Mid-Atlantic">(GMT-02:00) Mid-Atlantic</option>
                  <option value="Azores">(GMT-01:00) Azores</option>
                  <option value="Cape Verde Is.">(GMT-01:00) Cape Verde Is.</option>
                  <option value="Casablanca">(GMT+00:00) Casablanca</option>
                  <option value="Dublin">(GMT+00:00) Dublin</option>
                  <option value="Edinburgh">(GMT+00:00) Edinburgh</option>
                  <option value="Lisbon">(GMT+00:00) Lisbon</option>
                  <option value="London">(GMT+00:00) London</option>
                  <option value="Monrovia">(GMT+00:00) Monrovia</option>
                  <option value="UTC">(GMT+00:00) UTC</option>
                  <option value="Amsterdam">(GMT+01:00) Amsterdam</option>
                  <option value="Belgrade">(GMT+01:00) Belgrade</option>
                  <option value="Berlin">(GMT+01:00) Berlin</option>
                  <option value="Bern">(GMT+01:00) Bern</option>
                  <option value="Bratislava">(GMT+01:00) Bratislava</option>
                  <option value="Brussels">(GMT+01:00) Brussels</option>
                  <option value="Budapest">(GMT+01:00) Budapest</option>
                  <option value="Copenhagen">(GMT+01:00) Copenhagen</option>
                  <option value="Ljubljana">(GMT+01:00) Ljubljana</option>
                  <option value="Madrid">(GMT+01:00) Madrid</option>
                  <option value="Paris">(GMT+01:00) Paris</option>
                  <option value="Prague">(GMT+01:00) Prague</option>
                  <option value="Rome">(GMT+01:00) Rome</option>
                  <option value="Sarajevo">(GMT+01:00) Sarajevo</option>
                  <option value="Skopje">(GMT+01:00) Skopje</option>
                  <option value="Stockholm">(GMT+01:00) Stockholm</option>
                  <option value="Vienna">(GMT+01:00) Vienna</option>
                  <option value="Warsaw">(GMT+01:00) Warsaw</option>
                  <option value="West Central Africa">(GMT+01:00) West Central Africa</option>
                  <option value="Zagreb">(GMT+01:00) Zagreb</option>
                  <option value="Athens">(GMT+02:00) Athens</option>
                  <option value="Bucharest">(GMT+02:00) Bucharest</option>
                  <option value="Cairo">(GMT+02:00) Cairo</option>
                  <option value="Harare">(GMT+02:00) Harare</option>
                  <option value="Helsinki">(GMT+02:00) Helsinki</option>
                  <option value="Jerusalem">(GMT+02:00) Jerusalem</option>
                  <option value="Kaliningrad">(GMT+02:00) Kaliningrad</option>
                  <option value="Kyiv">(GMT+02:00) Kyiv</option>
                  <option value="Pretoria">(GMT+02:00) Pretoria</option>
                  <option value="Riga">(GMT+02:00) Riga</option>
                  <option value="Sofia">(GMT+02:00) Sofia</option>
                  <option value="Tallinn">(GMT+02:00) Tallinn</option>
                  <option value="Vilnius">(GMT+02:00) Vilnius</option>
                  <option value="Baghdad">(GMT+03:00) Baghdad</option>
                  <option value="Istanbul">(GMT+03:00) Istanbul</option>
                  <option value="Kuwait">(GMT+03:00) Kuwait</option>
                  <option value="Minsk">(GMT+03:00) Minsk</option>
                  <option value="Moscow">(GMT+03:00) Moscow</option>
                  <option value="Nairobi">(GMT+03:00) Nairobi</option>
                  <option value="Riyadh">(GMT+03:00) Riyadh</option>
                  <option value="St. Petersburg">(GMT+03:00) St. Petersburg</option>
                  <option value="Volgograd">(GMT+03:00) Volgograd</option>
                  <option value="Tehran">(GMT+03:30) Tehran</option>
                  <option value="Abu Dhabi">(GMT+04:00) Abu Dhabi</option>
                  <option value="Baku">(GMT+04:00) Baku</option>
                  <option value="Muscat">(GMT+04:00) Muscat</option>
                  <option value="Samara">(GMT+04:00) Samara</option>
                  <option value="Tbilisi">(GMT+04:00) Tbilisi</option>
                  <option value="Yerevan">(GMT+04:00) Yerevan</option>
                  <option value="Kabul">(GMT+04:30) Kabul</option>
                  <option value="Ekaterinburg">(GMT+05:00) Ekaterinburg</option>
                  <option value="Islamabad">(GMT+05:00) Islamabad</option>
                  <option value="Karachi">(GMT+05:00) Karachi</option>
                  <option value="Tashkent">(GMT+05:00) Tashkent</option>
                  <option value="Chennai">(GMT+05:30) Chennai</option>
                  <option value="Kolkata">(GMT+05:30) Kolkata</option>
                  <option value="Mumbai">(GMT+05:30) Mumbai</option>
                  <option value="New Delhi">(GMT+05:30) New Delhi</option>
                  <option value="Sri Jayawardenepura">(GMT+05:30) Sri Jayawardenepura</option>
                  <option value="Kathmandu">(GMT+05:45) Kathmandu</option>
                  <option value="Almaty">(GMT+06:00) Almaty</option>
                  <option value="Astana">(GMT+06:00) Astana</option>
                  <option value="Dhaka">(GMT+06:00) Dhaka</option>
                  <option value="Urumqi">(GMT+06:00) Urumqi</option>
                  <option value="Rangoon">(GMT+06:30) Rangoon</option>
                  <option value="Bangkok">(GMT+07:00) Bangkok</option>
                  <option value="Hanoi">(GMT+07:00) Hanoi</option>
                  <option value="Jakarta">(GMT+07:00) Jakarta</option>
                  <option value="Krasnoyarsk">(GMT+07:00) Krasnoyarsk</option>
                  <option value="Novosibirsk">(GMT+07:00) Novosibirsk</option>
                  <option value="Beijing">(GMT+08:00) Beijing</option>
                  <option value="Chongqing">(GMT+08:00) Chongqing</option>
                  <option value="Hong Kong">(GMT+08:00) Hong Kong</option>
                  <option value="Irkutsk">(GMT+08:00) Irkutsk</option>
                  <option value="Kuala Lumpur">(GMT+08:00) Kuala Lumpur</option>
                  <option value="Perth">(GMT+08:00) Perth</option>
                  <option value="Singapore">(GMT+08:00) Singapore</option>
                  <option value="Taipei">(GMT+08:00) Taipei</option>
                  <option value="Ulaanbaatar">(GMT+08:00) Ulaanbaatar</option>
                  <option value="Osaka">(GMT+09:00) Osaka</option>
                  <option value="Sapporo">(GMT+09:00) Sapporo</option>
                  <option value="Seoul">(GMT+09:00) Seoul</option>
                  <option value="Tokyo">(GMT+09:00) Tokyo</option>
                  <option value="Yakutsk">(GMT+09:00) Yakutsk</option>
                  <option value="Adelaide">(GMT+09:30) Adelaide</option>
                  <option value="Darwin">(GMT+09:30) Darwin</option>
                  <option value="Brisbane">(GMT+10:00) Brisbane</option>
                  <option value="Canberra">(GMT+10:00) Canberra</option>
                  <option value="Guam">(GMT+10:00) Guam</option>
                  <option value="Hobart">(GMT+10:00) Hobart</option>
                  <option value="Melbourne">(GMT+10:00) Melbourne</option>
                  <option value="Port Moresby">(GMT+10:00) Port Moresby</option>
                  <option value="Sydney">(GMT+10:00) Sydney</option>
                  <option value="Vladivostok">(GMT+10:00) Vladivostok</option>
                  <option value="Magadan">(GMT+11:00) Magadan</option>
                  <option value="New Caledonia">(GMT+11:00) New Caledonia</option>
                  <option value="Solomon Is.">(GMT+11:00) Solomon Is.</option>
                  <option value="Srednekolymsk">(GMT+11:00) Srednekolymsk</option>
                  <option value="Auckland">(GMT+12:00) Auckland</option>
                  <option value="Fiji">(GMT+12:00) Fiji</option>
                  <option value="Kamchatka">(GMT+12:00) Kamchatka</option>
                  <option value="Marshall Is.">(GMT+12:00) Marshall Is.</option>
                  <option value="Wellington">(GMT+12:00) Wellington</option>
                  <option value="Chatham Is.">(GMT+12:45) Chatham Is.</option>
                  <option value="Nuku'alofa">(GMT+13:00) Nuku'alofa</option>
                  <option value="Samoa">(GMT+13:00) Samoa</option>
                  <option value="Tokelau Is.">(GMT+13:00) Tokelau Is.</option>
                </select>
                <?php } ?>
                </div>
                </div>
              </div>
              <div class="row">                 
                <div class="col-xs-12 col-sm-12">
                <div class="form-group">
                <?php if(!empty($BusinessSetting))
                      {
                        $locale_region = $BusinessSetting['BusinessSetting']['locale_region'];
                ?>
                <label class="control-label">Locale Region</label>
                <select class="select optional form-control locale_region" name="BusinessSetting[locale_region]" data-validation="required">
                  <option value="en-AO" <?php if ($locale_region == 'en-AO') echo ' selected="selected"'; ?> >Angola</option>
                  <option value="es-AR" <?php if ($locale_region == 'es-AR') echo ' selected="selected"'; ?> >Argentina</option>
                  <option value="en-AU" <?php if ($locale_region == 'en-AU') echo ' selected="selected"'; ?> >Australia</option>
                  <option value="en-BS"<?php if ($locale_region == 'en-BS') echo ' selected="selected"'; ?> >Bahamas</option>
                  <option value="en-BH"<?php if ($locale_region == 'en-BH') echo ' selected="selected"'; ?> >Bahrain</option>
                  <option value="en-BB"<?php if ($locale_region == 'en-BB') echo ' selected="selected"'; ?> >Barbados</option>
                  <option value="en-BE"<?php if ($locale_region == 'en-BE') echo ' selected="selected"'; ?> >Belgium</option>
                  <option value="en-BJ"<?php if ($locale_region == 'en-BJ') echo ' selected="selected"'; ?> >Benin</option>
                  <option value="en-BM"<?php if ($locale_region == 'en-BM') echo ' selected="selected"'; ?> >Bermuda</option>
                  <option value="en-BR"<?php if ($locale_region == 'en-BR') echo ' selected="selected"'; ?> >Brazil</option>
                  <option value="en-VG"<?php if ($locale_region == 'en-VG') echo ' selected="selected"'; ?> >British Virgin Islands</option>
                  <option value="en-BN"<?php if ($locale_region == 'en-BN') echo ' selected="selected"'; ?> >Brunei</option>
                  <option value="en-BG"<?php if ($locale_region == 'en-BG') echo ' selected="selected"'; ?> >Bulgaria</option>
                  <option value="en-CA"<?php if ($locale_region == 'en-CA') echo ' selected="selected"'; ?> >Canada</option>
                  <option value="fr-CA"<?php if ($locale_region == 'fr-CA') echo ' selected="selected"'; ?> >Canada (French)</option>
                  <option value="en-KY"<?php if ($locale_region == 'en-KY') echo ' selected="selected"'; ?> >Cayman Islands</option>
                  <option value="en-CL"<?php if ($locale_region == 'en-CL') echo ' selected="selected"'; ?> >Chile</option>
                  <option value="es-CO"<?php if ($locale_region == 'es-CO') echo ' selected="selected"'; ?> >Colombia</option>
                  <option value="en-CD"<?php if ($locale_region == 'en-CD') echo ' selected="selected"'; ?> >Congo</option>
                  <option value="es-CR"<?php if ($locale_region == 'es-CR') echo ' selected="selected"'; ?> >Costa Rica</option>
                  <option value="en-HR"<?php if ($locale_region == 'en-HR') echo ' selected="selected"'; ?> >Croatia</option>
                  <option value="en-CY"<?php if ($locale_region == 'en-CY') echo ' selected="selected"'; ?> >Cyprus</option>
                  <option value="cs"<?php if ($locale_region == 'cs') echo ' selected="selected"'; ?> >Czech Republic</option>
                  <option value="en-CZ"<?php if ($locale_region == 'en-CZ') echo ' selected="selected"'; ?> >Czech Republic (English)</option>
                  <option value="da"<?php if ($locale_region == 'da') echo ' selected="selected"'; ?> >Denmark</option>
                  <option value="es-DO"<?php if ($locale_region == 'es-DO') echo ' selected="selected"'; ?> >Dominican Republic</option>
                  <option value="es-EC"<?php if ($locale_region == 'es-EC') echo ' selected="selected"'; ?> >Ecuador</option>
                  <option value="en-EC"<?php if ($locale_region == 'en-EC') echo ' selected="selected"'; ?> >Ecuador (English)</option>
                  <option value="en-EG"<?php if ($locale_region == 'en-EG') echo ' selected="selected"'; ?> >Egypt</option>
                  <option value="es-SV"<?php if ($locale_region == 'es-SV') echo ' selected="selected"'; ?> >El Salvador</option>
                  <option value="en-SV"<?php if ($locale_region == 'en-SV') echo ' selected="selected"'; ?> >El Salvador (English)</option>
                  <option value="en-EE"<?php if ($locale_region == 'en-EE') echo ' selected="selected"'; ?> >Estonia</option>
                  <option value="en-FJ"<?php if ($locale_region == 'en-FJ') echo ' selected="selected"'; ?> >Fiji</option>
                  <option value="fi"<?php if ($locale_region == 'fi') echo ' selected="selected"'; ?> >Finland</option>
                  <option value="fr-FR"<?php if ($locale_region == 'fr-FR') echo ' selected="selected"'; ?> >France</option>
                  <option value="de"<?php if ($locale_region == 'de') echo ' selected="selected"'; ?> >Germany</option>
                  <option value="gh"<?php if ($locale_region == 'gh') echo ' selected="selected"'; ?> >Ghana</option>
                  <option value="el"<?php if ($locale_region == 'el') echo ' selected="selected"'; ?> >Greece</option>
                  <option value="en-GR"<?php if ($locale_region == 'en-GR') echo ' selected="selected"'; ?> >Greece (English)</option>
                  <option value="es-GT"<?php if ($locale_region == 'es-GT') echo ' selected="selected"'; ?> >Guatemala</option>
                  <option value="en-HT"<?php if ($locale_region == 'en-HT') echo ' selected="selected"'; ?> >Haiti</option>
                  <option value="es-HN"<?php if ($locale_region == 'es-HN') echo ' selected="selected"'; ?> >Honduras</option>
                  <option value="en-HK"<?php if ($locale_region == 'en-HK') echo ' selected="selected"'; ?> >Hong Kong</option>
                  <option value="en-HU"<?php if ($locale_region == 'en-HU') echo ' selected="selected"'; ?> >Hungary</option>
                  <option value="en-IS"<?php if ($locale_region == 'en-IS') echo ' selected="selected"'; ?> >Iceland</option>
                  <option value="en-IN"<?php if ($locale_region == 'en-IN') echo ' selected="selected"'; ?> >India</option>
                  <option value="en-ID"<?php if ($locale_region == 'en-ID') echo ' selected="selected"'; ?> >Indonesia</option>
                  <option value="en-IE"<?php if ($locale_region == 'en-IE') echo ' selected="selected"'; ?> >Ireland</option>
                  <option value="en-IM"<?php if ($locale_region == 'en-IM') echo ' selected="selected"'; ?> >Isle of Man</option>
                  <option value="en-IL"<?php if ($locale_region == 'en-IL') echo ' selected="selected"'; ?> >Israel</option>
                  <option value="it"<?php if ($locale_region == 'it') echo ' selected="selected"'; ?> >Italy</option>
                  <option value="en-IT"<?php if ($locale_region == 'es-IT') echo ' selected="selected"'; ?> >Italy (English)</option>
                  <option value="en-JM"<?php if ($locale_region == 'en-JM') echo ' selected="selected"'; ?> >Jamaica</option>
                  <option value="ja-JP"<?php if ($locale_region == 'ja-JP') echo ' selected="selected"'; ?> >Japan</option>
                  <option value="en-JP"<?php if ($locale_region == 'en-JP') echo ' selected="selected"'; ?> >Japan (English)</option>
                  <option value="ke"<?php if ($locale_region == 'ke') echo ' selected="selected"'; ?> >Kenya</option>
                  <option value="en-LV"<?php if ($locale_region == 'en-LV') echo ' selected="selected"'; ?> >Latvia</option>
                  <option value="en-LB"<?php if ($locale_region == 'en-LB') echo ' selected="selected"'; ?> >Lebanon</option>
                  <option value="en-MY"<?php if ($locale_region == 'en-MY') echo ' selected="selected"'; ?> >Malaysia</option>
                  <option value="en-MT"<?php if ($locale_region == 'en-MT') echo ' selected="selected"'; ?> >Malta</option>
                  <option value="en-MU"<?php if ($locale_region == 'en-MU') echo ' selected="selected"'; ?> >Mauritius</option>
                  <option value="es-MX"<?php if ($locale_region == 'es-MX') echo ' selected="selected"'; ?> >Mexico</option>
                  <option value="en-MZ"<?php if ($locale_region == 'en-MZ') echo ' selected="selected"'; ?> >Mozambique</option>
                  <option value="nl"<?php if ($locale_region == 'nl') echo ' selected="selected"'; ?> >Netherlands</option>
                  <option value="en-NZ"<?php if ($locale_region == 'en-NZ') echo ' selected="selected"'; ?> >New Zealand</option>
                  <option value="en-NG"<?php if ($locale_region == 'en-NG') echo ' selected="selected"'; ?> >Nigeria</option>
                  <option value="nn" <?php if ($locale_region == 'nn') echo ' selected="selected"'; ?> >Norway</option>
                  <option value="en-NO" <?php if ($locale_region == 'en-NO') echo ' selected="selected"'; ?> >Norway (English)</option>
                  <option value="en-PK" <?php if ($locale_region == 'en-PK') echo ' selected="selected"'; ?> >Pakistan</option>
                  <option value="es-PA" <?php if ($locale_region == 'es-PA') echo ' selected="selected"'; ?> >Panama</option>
                  <option value="en-PG" <?php if ($locale_region == 'en-PG') echo ' selected="selected"'; ?> >Papua New Guinea</option>
                  <option value="en-PH" <?php if ($locale_region == 'en-PH') echo ' selected="selected"'; ?> >Philippines</option>
                  <option value="en-PL" <?php if ($locale_region == 'en-PL') echo ' selected="selected"'; ?> >Poland</option>
                  <option value="pt" <?php if ($locale_region == 'pt') echo ' selected="selected"'; ?> >Portugal</option>
                  <option value="en-QA" <?php if ($locale_region == 'en-QA') echo ' selected="selected"'; ?> >Qatar</option>
                  <option value="en-RO" <?php if ($locale_region == 'en-RO') echo ' selected="selected"'; ?> >Romania</option>
                  <option value="ru" <?php if ($locale_region == 'ru') echo ' selected="selected"'; ?> >Russia</option>
                  <option value="en-WS" <?php if ($locale_region == 'en-WS') echo ' selected="selected"'; ?> >Samoa</option>
                  <option value="en-SA" <?php if ($locale_region == 'en-SA') echo ' selected="selected"'; ?> >Saudi Arabia</option>
                  <option value="en-RS" <?php if ($locale_region == 'en-RS') echo ' selected="selected"'; ?> >Serbia</option>
                  <option value="sg" <?php if ($locale_region == 'sg') echo ' selected="selected"'; ?> >Singapore</option>
                  <option value="sk-SK" <?php if ($locale_region == 'sk-SK') echo ' selected="selected"'; ?> >Slovakia</option>
                  <option value="en-SK" <?php if ($locale_region == 'en-SK') echo ' selected="selected"'; ?> >Slovakia (English)</option>
                  <option value="en-SI" <?php if ($locale_region == 'en-SI') echo ' selected="selected"'; ?> >Slovenia</option>
                  <option value="en-ZA" <?php if ($locale_region == 'en-ZA') echo ' selected="selected"'; ?> >South Africa</option>
                  <option value="es-ES" <?php if ($locale_region == 'es-ES') echo ' selected="selected"'; ?> >Spain</option>
                  <option value="en-LK" <?php if ($locale_region == 'en-LK') echo ' selected="selected"'; ?> >Sri Lanka</option>
                  <option value="sv-SE" <?php if ($locale_region == 'sv-SE') echo ' selected="selected"'; ?> >Sweden</option>
                  <option value="en-CH" <?php if ($locale_region == 'en-CH') echo ' selected="selected"'; ?> >Switzerland</option>
                  <option value="en-TZ" <?php if ($locale_region == 'en-TZ') echo ' selected="selected"'; ?> >Tanzania</option>
                  <option value="en-TH" <?php if ($locale_region == 'en-TH') echo ' selected="selected"'; ?> >Thailand</option>
                  <option value="to" <?php if ($locale_region == 'to') echo ' selected="selected"'; ?> >Tonga</option>
                  <option value="en-TT" <?php if ($locale_region == 'en-TT') echo ' selected="selected"'; ?> >Trinidad and Tobago</option>
                  <option value="en-TR" <?php if ($locale_region == 'en-TR') echo ' selected="selected"'; ?> >Turkey</option>
                  <option value="en-VI" <?php if ($locale_region == 'en-VI') echo ' selected="selected"'; ?> >US Virgin Islands</option>
                  <option value="en" <?php if ($locale_region == 'en') echo ' selected="selected"'; ?> >USA</option>
                  <option value="ug" <?php if ($locale_region == 'ug') echo ' selected="selected"'; ?> >Uganda</option>
                  <option value="uk-UA" <?php if ($locale_region == 'uk-UA') echo ' selected="selected"'; ?> >Ukraine</option>
                  <option value="en-AE" <?php if ($locale_region == 'en-AE') echo ' selected="selected"'; ?> >United Arab Emirates</option>
                  <option value="en-GB" <?php if ($locale_region == 'en-GB') echo ' selected="selected"'; ?> >United Kingdom</option>
                  <option value="es-UY" <?php if ($locale_region == 'es-UY') echo ' selected="selected"'; ?> >Uruguay</option>
                  <option value="es-VE" <?php if ($locale_region == 'es-VE') echo ' selected="selected"'; ?> >Venezuela</option>
                  <option value="en-ZM" <?php if ($locale_region == 'en-ZM') echo ' selected="selected"'; ?> >Zambia</option>
                  <option value="en-ZW" <?php if ($locale_region == 'en-ZW') echo ' selected="selected"'; ?> >Zimbabwe</option>
                </select>
                <?php }
                else {?>
                <label class="control-label">Locale Region</label>
                <select class="select optional form-control locale_region" name="BusinessSetting[locale_region]" data-validation="required">
                  <option value="en-AO">Angola</option>
                  <option value="es-AR">Argentina</option>
                  <option value="en-AU">Australia</option>
                  <option value="en-BS">Bahamas</option>
                  <option value="en-BH">Bahrain</option>
                  <option value="en-BB">Barbados</option>
                  <option value="en-BE">Belgium</option>
                  <option value="en-BJ">Benin</option>
                  <option value="en-BM">Bermuda</option>
                  <option value="en-BR">Brazil</option>
                  <option value="en-VG">British Virgin Islands</option>
                  <option value="en-BN">Brunei</option>
                  <option value="en-BG">Bulgaria</option>
                  <option value="en-CA">Canada</option>
                  <option value="fr-CA">Canada (French)</option>
                  <option value="en-KY">Cayman Islands</option>
                  <option value="en-CL">Chile</option>
                  <option value="es-CO">Colombia</option>
                  <option value="en-CD">Congo</option>
                  <option value="es-CR">Costa Rica</option>
                  <option value="en-HR">Croatia</option>
                  <option value="en-CY">Cyprus</option>
                  <option value="cs">Czech Republic</option>
                  <option value="en-CZ">Czech Republic (English)</option>
                  <option value="da">Denmark</option>
                  <option value="es-DO">Dominican Republic</option>
                  <option value="es-EC">Ecuador</option>
                  <option value="en-EC">Ecuador (English)</option>
                  <option value="en-EG">Egypt</option>
                  <option value="es-SV">El Salvador</option>
                  <option value="en-SV">El Salvador (English)</option>
                  <option value="en-EE">Estonia</option>
                  <option value="en-FJ">Fiji</option>
                  <option value="fi">Finland</option>
                  <option value="fr-FR">France</option>
                  <option value="de">Germany</option>
                  <option value="gh">Ghana</option>
                  <option value="el">Greece</option>
                  <option value="en-GR">Greece (English)</option>
                  <option value="es-GT">Guatemala</option>
                  <option value="en-HT">Haiti</option>
                  <option value="es-HN">Honduras</option>
                  <option value="en-HK">Hong Kong</option>
                  <option value="en-HU">Hungary</option>
                  <option value="en-IS">Iceland</option>
                  <option value="en-IN">India</option>
                  <option value="en-ID">Indonesia</option>
                  <option value="en-IE">Ireland</option>
                  <option value="en-IM">Isle of Man</option>
                  <option value="en-IL">Israel</option>
                  <option value="it">Italy</option>
                  <option value="en-IT">Italy (English)</option>
                  <option value="en-JM">Jamaica</option>
                  <option value="ja-JP">Japan</option>
                  <option value="en-JP">Japan (English)</option>
                  <option value="ke">Kenya</option>
                  <option value="en-LV">Latvia</option>
                  <option value="en-LB">Lebanon</option>
                  <option value="en-MY">Malaysia</option>
                  <option value="en-MT">Malta</option>
                  <option value="en-MU">Mauritius</option>
                  <option value="es-MX">Mexico</option>
                  <option value="en-MZ">Mozambique</option>
                  <option value="nl">Netherlands</option>
                  <option value="en-NZ">New Zealand</option>
                  <option value="en-NG">Nigeria</option>
                  <option value="nn">Norway</option>
                  <option value="en-NO">Norway (English)</option>
                  <option value="en-PK">Pakistan</option>
                  <option value="es-PA">Panama</option>
                  <option value="en-PG">Papua New Guinea</option>
                  <option value="en-PH">Philippines</option>
                  <option value="en-PL">Poland</option>
                  <option value="pt">Portugal</option>
                  <option value="en-QA">Qatar</option>
                  <option value="en-RO">Romania</option>
                  <option value="ru">Russia</option>
                  <option value="en-WS">Samoa</option>
                  <option value="en-SA">Saudi Arabia</option>
                  <option value="en-RS">Serbia</option>
                  <option value="sg">Singapore</option>
                  <option value="sk-SK">Slovakia</option>
                  <option value="en-SK">Slovakia (English)</option>
                  <option value="en-SI">Slovenia</option>
                  <option value="en-ZA">South Africa</option>
                  <option value="es-ES">Spain</option>
                  <option value="en-LK">Sri Lanka</option>
                  <option value="sv-SE">Sweden</option>
                  <option value="en-CH">Switzerland</option>
                  <option value="en-TZ">Tanzania</option>
                  <option value="en-TH">Thailand</option>
                  <option value="to">Tonga</option>
                  <option value="en-TT">Trinidad and Tobago</option>
                  <option value="en-TR">Turkey</option>
                  <option value="en-VI">US Virgin Islands</option>
                  <option value="en" selected="selected">USA</option>
                  <option value="ug">Uganda</option>
                  <option value="uk-UA">Ukraine</option>
                  <option value="en-AE">United Arab Emirates</option>
                  <option value="en-GB">United Kingdom</option>
                  <option value="es-UY">Uruguay</option>
                  <option value="es-VE">Venezuela</option>
                  <option value="en-ZM">Zambia</option>
                  <option value="en-ZW">Zimbabwe</option>
                </select>
                <?php } ?>
                </div>
                </div>
              </div><br><br>
              <div class="row">                 
                <div class="col-xs-12 col-sm-12">
                <div class="form-group">
                <label class="control-label">Admin Notification Email</label>
                <input class="form-control admin_email" type="email" name="BusinessSetting[business_email]" value="<?php echo $business_email['User']['business_email'];?>">
                </div>
                </div>
              </div>
            </div>
            <div class="col-xs-4 col-sm-4">
            </div>
            <div class="col-xs-2 col-sm-2">
            </div>
          </div>
        </div><br>
        <div class="row">                 
          <div class="col-xs-12 col-sm-12">
            <div class="col-xs-6 col-sm-6">
            </div>
            <div class="col-xs-4 col-sm-4">
                <button type="submit" class="btn btn-success submit pull-right">Save</button><br>
            </div>
            <div class="col-xs-2 col-sm-2">
            </div>
          </div>
        </div><br>
      </div>
      <?php echo $this->Form->end(); ?>
      <div class="panel-footer">
        <div class="row">
          <div class="col-md-11">
            
          </div>
          <div class="col-md-1">
            <?php echo $this->Html->link('Next',array('controller'=>'Administrations','action'=>'tabs'),array('escape'=>false));?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  
  $( document ).ready(function() {

    $(".multilocations").on('change', function() {
      if ($(this).is(':checked')) {
        $(this).attr('value', 'true');
      } else {
        $(this).attr('value', 'false');
      }
      //var id = $(this).attr('id');
      var value = $(this).val();
      
      if(value=="true")
        {
          $.ajax({
                type: "POST",
                url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/Administrations/UpdateMultiLocationInUserPackage/",
                data: { multilocation : 1 },
            
                success: function(data)
                {
                      // location.reload();          
                }
            });
            $(".Multilocations").show();
        }
        else 
        {
          $.ajax({
                type: "POST",
                url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/Administrations/UpdateMultiLocationInUserPackage/",
                data: { multilocation : 0 },
            
                success: function(data)
                {
                      // location.reload();          
                }
            });
            $(".Multilocations").hide();
        }
    });

    var multilocationvalue = $("#multilocationvalue").html();
    if(multilocationvalue == 1)
    {
      $(".Multilocations").show();
    }
    else
    {
      $(".Multilocations").hide();
    }



    
    
  });

</script>