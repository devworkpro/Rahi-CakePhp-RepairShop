
<section>
    <div class="signup_main">
    <div class="signup_main_right">
      <div class="signup_main_form">  
      <h2 class="pull-left">Business Settings<hr></h2>
      
      <?php echo $this->Form->create('User',array('action' => 'business_setting' , 'id'=>"wizardForm")); ?>

      <div class="row">
      <div class="col-xs-6">
        <div class="ml20">

          <div class="form-group boolean optional quick_start_business_services_A Storefront">
          <label class="checkbox">
          <input class="boolean optional" value="1" name="BusinessSetting[storefront]" type="checkbox"> A Storefront
          </label>
          </div>

        </div>
      </div>
      <div class="col-xs-6">
        <div class="ml20">
          <div class="form-group boolean optional quick_start_business_services_Onsite Service"><label class="checkbox"><input class="boolean optional" name="BusinessSetting[onsite_service]" value="1" type="checkbox"> Onsite Service</label></div>
        </div>
      </div>
      <div class="col-xs-6">
        <div class="ml20">
          <div class="form-group boolean optional quick_start_business_services_Remote Support"><label class="checkbox"><input class="boolean optional" value="1" name="BusinessSetting[remote_support]" value="1" type="checkbox"> Remote Support</label></div>
        </div>
      </div>
      <div class="col-xs-6">
        <div class="ml20">
          <div class="form-group boolean optional quick_start_business_services_Retail"><label class="checkbox"><input class="boolean optional" value="1" name="BusinessSetting[retail]" type="checkbox"> Retail</label></div>
        </div>
      </div>
      <div class="col-xs-6">
        <div class="ml20">
          <div class="form-group boolean optional quick_start_business_services_E-Commerce"><label class="checkbox"><input class="boolean optional" value="1" name="BusinessSetting[e_commerce]" type="checkbox"> E-Commerce</label></div>
        </div>
      </div>
      <div class="col-xs-6">
        <div class="ml20">
          <div class="form-group boolean optional quick_start_business_services_Wholesale"><label class="checkbox"><input class="boolean optional" value="1" name="BusinessSetting[wholesale]" type="checkbox"> Wholesale</label></div>
        </div>
      </div>
      <div class="col-xs-6">
        <div class="ml20">
          <div class="form-group boolean optional quick_start_business_services_None of these"><label class="checkbox"><input class="boolean optional" value="1" name="BusinessSetting[none]" type="checkbox"> None of these</label></div>
        </div>
      </div>
      </div>
      <hr>
      <p><strong>My Business Supports:</strong></p>
      <div class="row">

      <div class="col-xs-6">

      <div class="form-group select required quick_start_primary_category"><label class="select required" for="quick_start_primary_category"><abbr title="required"></abbr> Primary category</label><select style="max-width: 200px;" class="select required form-control bhv-switchPrimaryCategory" name="BusinessSetting[primary_category]" data-validation="required">
      <option value="">None of these</option>
      <option selected="selected" value="Computer Repair">Computer Repair</option>
      <option value="Cell Phone Repair">Cell Phone Repair</option>
      <option value="IT / Managed Services">IT / Managed Services</option>
      <option value="Plumbing">Plumbing</option>
      <option value="Electrician">Electrician</option>
      <option value="Appliance Repair">Appliance Repair</option>
      <option value="ATV Repair">ATV Repair</option>
      <option value="Auto Repair">Auto Repair</option>
      <option value="AV Repair">AV Repair</option>
      <option value="Bicycle Repair">Bicycle Repair</option>
      <option value="Boat Repair">Boat Repair</option>
      <option value="Camera Repair">Camera Repair</option>
      <option value="Drone Repair">Drone Repair</option>
      <option value="Electronics Repair">Electronics Repair</option>
      <option value="HVAC Repair">HVAC Repair</option>
      <option value="Jewelry Repair">Jewelry Repair</option>
      <option value="Lawn Mower Repair">Lawn Mower Repair</option>
      <option value="Motorcycle Repair">Motorcycle Repair</option>
      <option value="Musical Instrument Repair">Musical Instrument Repair</option>
      <option value="SCUBA Service/Repair">SCUBA Service/Repair</option>
      <option value="Sewing Machine Repair">Sewing Machine Repair</option>
      <option value="Small Engine Repair">Small Engine Repair</option>
      <option value="Watch Repair">Watch Repair</option></select></div>
      </div>

      <div class="col-xs-6 bhv-showOther">
        <div class="form-group string required quick_start_other_typed"><label class="string required" for="quick_start_other_typed"><abbr title="required">*</abbr> Other</label><input class="string required form-control bhv-otherCategory" style="max-width: 200px;" name="BusinessSetting[other_categories]" data-validation="required", type="text"></div>
      </div>



      </div>  
      <hr>
      <div class="row">
        <div class="col-xs-6">
        <div class="form-group select optional quick_start_locale_code"><label class="select optional" for="quick_start_locale_code">Locale Region</label>
        <select style="width: 200px" class="select optional form-control" name="BusinessSetting[locale_region]" data-validation="required",>
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
        <option selected="selected" value="en">USA</option>
        <option value="ug">Uganda</option>
        <option value="uk-UA">Ukraine</option>
        <option value="en-AE">United Arab Emirates</option>
        <option value="en-GB">United Kingdom</option>
        <option value="es-UY">Uruguay</option>
        <option value="es-VE">Venezuela</option>
        <option value="en-ZM">Zambia</option>
        <option value="en-ZW">Zimbabwe</option>
        </select>
        </div>
        </div>
        
      </div>
      <hr>
      <label class="control-label" for="inputPassword" style="width: 170px;">Time Zone</label>
      <select name="BusinessSetting[time_zone]" class="select optional form-control" data-validation="required",>
      <option value="American Samoa">(GMT-11:00) American Samoa</option>
      <option value="International Date Line West">(GMT-11:00) International Date Line West</option>
      <option value="Midway Island">(GMT-11:00) Midway Island</option>
      <option value="Hawaii">(GMT-10:00) Hawaii</option>
      <option value="Alaska">(GMT-09:00) Alaska</option>
      <option selected="selected" value="Pacific Time (US &amp; Canada)">(GMT-08:00) Pacific Time (US &amp; Canada)</option>
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

      <hr>
      <div class="form-group string optional quick_start_tax_rate"><label class="string optional" for="quick_start_tax_rate">Tax Rate (0 to disable)</label><input value="9.5" class="string optional form-control " style="width: 70px;" name="BusinessSetting[tax_rate]" type="text"></div>
      <hr>
      <div class="form-group">
        <button class="vc_btn3-style-modern vc_general vc_btn3 vc_btn3-size-md pull-right">NEXT</button>
        
      </div><br><br><br>
      <?php echo $this->Form->end(); ?> 
         
      </div><!-- signup_main_form -->
      
      
    </div><!-- signup_main_right -->
  </div><!-- signup_main -->
</section>
<style type="text/css">
  .checkbox {
    padding-left: 22px;
}
</style>

<script>
  $.validate({
   
   
  });
</script>