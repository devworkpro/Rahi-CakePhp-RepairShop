<?php

    echo $this->Html->script("http://maps.google.com/maps/api/js?sensor=false&libraries=places");     
    echo $this->Html->script(array("upload", "ajaxupload"));     

  // Override any of the following default options to customize your map
      $map_options = array(
        "id"         => "map_canvas",
        "width"      => "100%",
        "height"     => "350px",
        "localize"   => false,
        'type'       => 'ROADMAP',
        "zoom"       => 7,
        "address"    => "Chandigarh, NY",
        "marker"     => true,
        "infoWindow" => true
      );
  
?>

  <link rel="stylesheet" href="<?php echo $this->webroot.'Plugins/timepicker/bootstrap-timepicker.min.css';?>">
  <script src="<?php echo $this->webroot.'Plugins/timepicker/bootstrap-timepicker.min.js';?>"></script>

  <script src="<?php echo $this->webroot.'Plugins/input-mask/jquery.inputmask.js';?>"></script>
  <script src="<?php echo $this->webroot.'Plugins/input-mask/jquery.inputmask.date.extensions.js';?>"></script>


<?php

  echo $this->Html->css(array('fullcalendar.min'));
  echo $this->Html->script(array('moment.min', 'fullcalendar.min'));
  
  for($i = 0; $i< count($events); $i++){
    $events[$i]['Event']['start_time'] = date('Y-m-d', intval($events[$i]['Event']['start_time']));
    $events[$i]['Event']['end_time'] = date('Y-m-d', intval($events[$i]['Event']['end_time']));
  }

  $calender_data = "";
  foreach($events as $event){
    $event = $event['Event'];
    $calender_data .= '{ url : \''.$event['id'].'\',  title  : \''.$event['title'].'\', start  : \''.$event['start_time'].'\',  end  : \''.$event['end_time'].'\' },';
  }
  $calender_data = chop($calender_data, ",");

?>

<?php $user = $data['User'];
      $status = intval($status);
 ?>


<?php if($isLogined){ ?>

<?php  } ?>   



<?php

if(($user['role'] != 'user') && $status != 2){ ?>

<section>

  <div class="container">
    <div class="banner_image">
<?php if($isLogined){ ?>

  <div class="upload-banner">
        <form action="" name="imageUpload" id="imageUpload" method="post" enctype="multipart/form-data">
          <label>Select Your Image</label><br/>
          <input type="file" name="file" id="banner_file" required />
        </form>
      </div>

<?php  } ?>   
      
      <img class="update_banner_ajax" src="<?php echo $this->webroot . 'img/user_image/userbanners/'.$user['banner_image']; ?>" alt="banner image" />
    </div><!--banner_image-->
    
    <div class="trainer_sec">
      <div class="col-xs-12 col-sm-12 col-md-9">
        <div class="left_side_bar">
          <div class="triner_info">

            <div class="profile_image">

<?php if($isLogined){ ?>

 <div class="upload-profile">
        <form action="" name="imageUpload" id="imageUpload" method="post" enctype="multipart/form-data">
          <label>Select Your Image</label><br/>
          <input type="file" name="file" id="profile_file" required />
        </form>
      </div>

<?php  } ?> 
            
              <img class="update_profile_ajax" src="<?php echo $this->webroot . 'img/user_image/small/'.$user['profile_pic']; ?>" alt="profile image" />
            </div><!-- profile_image -->
            <div class="trainer_info_right">

<?php if($isLogined){ ?>

            <div class="user_name">
                <span><?php echo $user['first_name'].' '.$user['surname']; ?></span>
              </div>
              <div class="user_tag">
                <span>(Health Trainer)</span>
              </div>
              <div class="user_address">
                <span><?php echo $user['address']; ?></span>
              </div>
              <div class="button user_profile_edit_btn">
              
         <?php echo $this->Html->link('Edit Profile', array('controller' => 'users', 'action' => 'editprofile', 'user'=>true), array('class' => 'btn btn-primary edit_btn')); ?>  

<?php  }else{ ?>

   <div class="user_name">
      <span>ALIAS</span>
   </div>
 <div class="button user_profile_edit_btn">
<?php  } ?>   

<?php 
      if($anylogged ){
        if(!$isLogined){

          if($status === 3){
           echo $this->Html->link('Send Request', array('controller' => 'users', 'action' => 'sendrequest', $user['id'], 'user'=>true), array('class' => 'btn btn-primary edit_btn')); 
          } else if($status === 0){
            echo $this->Html->link('Cancel Request', array('controller' => 'users', 'action' => 'cancelrequest', $user['id'], 'user'=>true), array('class' => 'btn btn-primary edit_btn')); 
          } else if($status === 1){
            echo $this->Html->link('Friends', array('controller' => 'users', 'action' => 'unfriend', $user['id'], 'user'=>true), array('class' => 'btn btn-primary edit_btn')); 
          }

        }
      }
?>           

         <?php $this->Html->link('Blog', array('controller' => 'blogs', 'action' => 'index')); ?>       
                <button class="btn btn-primary">blog</button>
              </div>
              <div class="triner_box_part">
                <a href="javascript:void(0)">
                  <span>
                    Events<br/>
                    <?php  echo count($events); ?>
                  </span>
                </a>
                <a href="javascript:void(0)">
                  <span>
                    Friends<br/>
                    15
                  </span>
                </a>
                <a class="blue" href="javascript:void(0)">
                  <span>
                    <img src="<?php echo $this->webroot?>images/send_msg_icon.png" alt="message icon" /><br/>
                    Email
                  </span>
                </a>
                <a class="blue" href="javascript:void(0)">
                  <span>
                    <img src="<?php echo $this->webroot?>images/notification_icon.png" alt="message icon" /><br/>
                    Notification
                  </span>
                </a>
                <div class="clearfix"></div>
              </div><!-- triner_box_part  -->
              <div class="trainer_des">
                <span>Lorem ipsum dolor sit amet, eos at labores accusam torquatos, te odio vocibus</span> 
                <span class="toggle_image"><a href="javascript:viod(0)"><img src="<?php echo $this->webroot?>images/toggle_icon.png" alt="toggle image" /></a></span>
              </div>
            </div><!-- trainer_info_right -->
          </div><!-- triner_info -->  
          
         

<?php if($isLogined){ ?>
  <div class="event_calender" id="k_event_calender"> </div>
<?php  }else { ?>
  <div class="event_calender k_event_calender_dummy"> </div>
<?php } ?>   

          <!-- COMMENT SECTION -->
          <div class="comment">
            <strong>Comments: </strong>
            <div class="cmnt_list">
            <p class="blog5_img"><strong>30. Mike</strong>Lorem Ipsum is simply dummy text </p>
            <p class="blog6_img"><strong>27. John</strong>Lorem Ipsum is simply dummy text</p>
            <p class="blog7_img"><strong>01. Anon</strong>Lorem Ipsum is simply dummy text </p>
            </div>
            <strong>Your Comments: </strong>
            <textarea rows="7" class="form-control" placeholder="Write your Comment here..."></textarea>
            
            <div class="blg_btn">
            <!--<a href="#" class="btn_lft">Return To Blog Page</a><a href="#" class="btn_ryt">SEND</a>-->
            <button type="button" class="btn btn-primary btn_ryt">POST</button>
            <div class="clearfix"></div>
            </div>
            
            
          </div>
          <!-- COMMENT SECTION ENDS HERE -->
          
        </div><!-- left_side_bar -->
      </div>
      
      <div class="col-xs-12 col-sm-12 col-md-3 pull-right">
        <div class="right_side_bar">
          <div class="frind_list">
            <h3>Social Media</h3>
            <!--    SOCIAL MEDIA ICONS   -->
            <div class="social_links">
              <a href="javascript:void(0)"><i class="icon-facebook"></i></a>
              <a href="javascript:void(0)"><i class="icon-twitter"></i></a>
              <a href="javascript:void(0)"><i class="icon-google-plus"></i></a>
            </div><!--social_links-->
            <div class="clearfix"></div>
          </div>
          
          <div class="frind_list">
            <h3>Friend list</h3>
            <div class="frind_list_img">
              <span><a href="javascript:void(0)"><img src="<?php echo $this->webroot?>images/frnd_img1.png" alt="user image" /></a></span>
              <span><a href="javascript:void(0)"><img src="<?php echo $this->webroot?>images/frnd_img2.png" alt="user image" /></a></span>
              <span><a href="javascript:void(0)"><img src="<?php echo $this->webroot?>images/frnd_img3.png" alt="user image" /></a></span>
              <span><a href="javascript:void(0)"><img src="<?php echo $this->webroot?>images/frnd_img4.png" alt="user image" /></a></span>
              <span><a href="javascript:void(0)"><img src="<?php echo $this->webroot?>images/frnd_img5.png" alt="user image" /></a></span>
              <span><a href="javascript:void(0)"><img src="<?php echo $this->webroot?>images/frnd_img6.png" alt="user image" /></a></span>
              <span><a href="javascript:void(0)"><img src="<?php echo $this->webroot?>images/frnd_img7.png" alt="user image" /></a></span>
              <span><a href="javascript:void(0)"><img src="<?php echo $this->webroot?>images/frnd_img8.png" alt="user image" /></a></span>
              <span><a href="javascript:void(0)"><img src="<?php echo $this->webroot?>images/frnd_img9.png" alt="user image" /></a></span>
            </div>
            <a class="view_all_link" href="javascript:void(0)">View all friends</a>
            <div class="clearfix"></div>
            
            <div class="invite_btn">
            <a class="btn" href="javascript:void(0)">Invite friends</a>
            </div>
          </div><!-- frind_list -->
          
          <div class="frind_list blog_list">
            <h3>Recent Blog Posts</h3>
            <ul>
              <li><a href="javascript:void(0)">Lorem ipsum dummy text</a></li>
              <li><a href="javascript:void(0)">Lorem ipsum dummy text</a></li>
              <li><a href="javascript:void(0)">Lorem ipsum dummy text</a></li>
              <li><a href="javascript:void(0)">Lorem ipsum dummy text</a></li>
              <li><a href="javascript:void(0)">Lorem ipsum dummy text</a></li>
              <li><a href="javascript:void(0)">Lorem ipsum dummy text</a></li>
              <li><a href="javascript:void(0)">Lorem ipsum dummy text</a></li>
            </ul>
          </div><!-- frind_list -->
          
          
        </div><!-- right_side_bar -->
      </div>
      
    </div><!-- user_profile_sec -->
  </div><!-- container -->
  
  
</section>



<?php }else if($status != 2){ ?>



<section>

  <div class="container">
    <div class="banner_image">

<?php if($isLogined){ ?>

  <div class="upload-banner">
        <form action="" name="imageUpload" id="imageUpload" method="post" enctype="multipart/form-data">
          <label>Select Your Image</label><br/>
          <input type="file" name="file" id="banner_file" required />
        </form>
      </div>

<?php  } ?>  


      <img class="update_banner_ajax" src="<?php echo $this->webroot . 'img/user_image/userbanners/'.$user['banner_image']; ?>" alt="banner image" />
    </div><!--banner_image-->
    
    <div class="user_profile_sec">
      <div class="col-xs-12 col-sm-12 col-md-3">
        <div class="left_side_bar">
          <div class="profile_image">


<?php if($isLogined){ ?>

 <div class="upload-profile">
        <form action="" name="imageUpload" id="imageUpload" method="post" enctype="multipart/form-data">
          <label>Select Your Image</label><br/>
          <input type="file" name="file" id="profile_file" required />
        </form>
      </div>

<?php  } ?> 


            <img class="update_profile_ajax" src="<?php echo $this->webroot . 'img/user_image/small/'.$user['profile_pic']; ?>" alt="profile image" />
          </div><!-- profile_image -->

<?php if($isLogined){ ?>
    <div class="user_name">
            <span><?php echo $user['first_name'].' '.$user['surname']; ?></span>
          </div>
          <div class="user_address">
            <span><?php echo $user['address']; ?></span>
          </div>
          <div class="button user_profile_edit_btn">
            
         <?php echo $this->Html->link('Edit Profile', array('controller' => 'users', 'action' => 'editprofile', 'user'=>true), array('class' => 'btn btn-primary edit_btn')); ?> 
          </div>
<?php  }else { ?>
<div class="button user_profile_edit_btn">
  <?php 
      if($anylogged){
        if($status === 3){
         echo $this->Html->link('Send Request', array('controller' => 'users', 'action' => 'sendrequest', $user['id'], 'user'=>true), array('class' => 'btn btn-primary edit_btn')); 
        } else if($status === 0){
          echo $this->Html->link('Cancel Request', array('controller' => 'users', 'action' => 'cancelrequest', $user['id'], 'user'=>true), array('class' => 'btn btn-primary edit_btn')); 
        } else if($status === 1){
          echo $this->Html->link('Friends', array('controller' => 'users', 'action' => 'unfriend', $user['id'], 'user'=>true), array('class' => 'btn btn-primary edit_btn')); 
        }

      }
?>  
</div>

   <div class="user_name">
    <span>ALIAS</span>
  </div>
<?php } ?>   

          
          <div class="frind_list">
            <h3>Friend list</h3>
            <div class="frind_list_img">
              <span><a href="javascript:void(0)"><img src="<?php echo $this->webroot?>images/frnd_img1.png" alt="user image" /></a></span>
              <span><a href="javascript:void(0)"><img src="<?php echo $this->webroot?>images/frnd_img2.png" alt="user image" /></a></span>
              <span><a href="javascript:void(0)"><img src="<?php echo $this->webroot?>images/frnd_img3.png" alt="user image" /></a></span>
              <span><a href="javascript:void(0)"><img src="<?php echo $this->webroot?>images/frnd_img4.png" alt="user image" /></a></span>
              <span><a href="javascript:void(0)"><img src="<?php echo $this->webroot?>images/frnd_img5.png" alt="user image" /></a></span>
              <span><a href="javascript:void(0)"><img src="<?php echo $this->webroot?>images/frnd_img6.png" alt="user image" /></a></span>
              <span><a href="javascript:void(0)"><img src="<?php echo $this->webroot?>images/frnd_img7.png" alt="user image" /></a></span>
              <span><a href="javascript:void(0)"><img src="<?php echo $this->webroot?>images/frnd_img8.png" alt="user image" /></a></span>
              <span><a href="javascript:void(0)"><img src="<?php echo $this->webroot?>images/frnd_img9.png" alt="user image" /></a></span>
            </div>
            <a class="view_all_link" href="javascript:void(0)">View all friends</a>
            <div class="clearfix"></div>
          </div><!-- frind_list -->
          
          <div class="invite_btn">
            <a class="btn" href="javascript:void(0)">Invite friends</a>
          </div>
          
        </div><!-- left_side_bar -->
      </div>
      
      <div class="col-xs-12 col-sm-12 col-md-9">
        <div class="right_side_bar">
          <div class="triner_box_part user_box_part">
            <a href="javascript:void(0)">
              <span>Events<br/><?php  echo count($events); ?></span>
            </a>
            <a href="javascript:void(0)">
              <span>Friends<br/>15</span>
            </a>
            <a class="blue" href="javascript:void(0)">
              <span><img src="<?php echo $this->webroot?>images/send_msg_icon.png" alt="message icon" /><br/>Email</span>
            </a>
            <a class="blue" href="javascript:void(0)">
              <span><img src="<?php echo $this->webroot?>images/notification_icon.png" alt="message icon" /><br/>Notification</span>
            </a>

            <div class="clearfix"></div>
          </div><!-- triner_box_part  -->
            <div id="friend_requests">
                <ul>
                  <li>d</li>
                  <li>d</li>
                  <li>d</li>
                </ul>
              </div>
         
<?php if($isLogined){ ?>
  <div class="event_calender" id="k_event_calender"> </div>
<?php  }else { ?>
  <div class="event_calender k_event_calender_dummy"> </div>
<?php } ?>   



        </div><!-- right_side_bar -->
      </div>
      
    </div><!-- user_profile_sec -->
  </div><!-- container -->
  
  
</section>


<?php }else{

    echo 'Blocked From Access...';

  }  ?>



<!-- Modal -->
<div class="modal fade" id="professionalModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        <div class="box box-primary">

                    <?php echo $this->Form->create('Event'); ?>
                  <div class="box-body">                   
                    <div class="form-group">
                      <?php echo $this->Form->input('Event.title', array('div'=>false,'class'=>'form-control', 'placeholder' => 'Enter your Title: ')); ?>
                    </div>
                    <div class="form-group">
                      <?php echo $this->Form->input('Event.search', array('div'=>false,'class'=>'form-control', 'id' => 'pac-input', 'label' =>'Enter Event Location', 'placeholder' => 'Enter your location: ')); ?>
                    </div>
                    <div class="form-group">
                      <?php  echo $this->GoogleMap->map($map_options); ?>
                    </div>

                    <div class="form-group">
                      <label>Date range:</label>
                    
                       <span class="date2">From 
                            <input name="data[Event][startdate]" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask type="text" id="EventStartdate" placeholder="dd/mm/yyyy" />
                       </span>
                        <span class="date2 last">To 
                            <input name="data[Event][enddate]" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask type="text" id="EventEnddate" placeholder="dd/mm/yyyy" />
                        </span>

                    </div>

                    <div class="form-group">
                     <label>Time range:</label>
                      
                      <div class="bootstrap-timepicker">
                        <span class="time">From
                        <?php echo $this->Form->input('Event.starttime', array('div' => false ,'type' => 'text', 'class' => 'form-control timepicker', 'label' => false)) ?>
                      </span>
                    </div> 
                      <div class="bootstrap-timepicker">
                        <span class="time last">To 
                        <?php echo $this->Form->input('Event.endtime', array('div' => false ,'type' => 'text', 'class' => 'form-control timepicker', 'label' => false)) ?>
                      </span>
                    </div>

                    </div>



                    <div class="form-group">
                      <?php echo $this->Form->input('Event.description', array('div'=>false,'class'=>'form-control', 'type' => 'textarea', 'placeholder' => 'Add Description: ')); ?>
                    </div>
                    <div class="form-group">
                      <?php echo $this->Form->input('Event.members', array('div'=>false,'class'=>'form-control', 'placeholder' => 'No. of Members: ')); ?>
                    </div>
                    <div class="form-group">
                      <?php echo $this->Form->input('Event.price', array('div'=>false,'class'=>'form-control', 'placeholder' => 'Online Price: ')); ?>
                    </div>
                    <div class="form-group">
                      <?php echo $this->Form->input('Event.day_price', array('div'=>false,'class'=>'form-control', 'placeholder' => 'On the day Price: ')); ?>
                    </div>
                    <?php echo $this->Form->input('Event.latitude', array('div'=>false, 'type' => 'hidden')); ?>
                    <?php echo $this->Form->input('Event.longitude', array('div'=>false, 'type' => 'hidden')); ?>
                    <?php echo $this->Form->input('Event.g_address', array('div'=>false, 'type' => 'hidden'));
                     ?>
                         

                    <div class="form-group">
                      <?php echo $this->Form->input('Event.status', array('options' => array('1' => 'Enable', '0' =>'Disable'),'class'=>'form-control')); ?>
                    </div>               
                    
                  </div>



        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <?php echo $this->Form->Submit("Create Event",array('class'=>'btn btn-primary', 'div' => false)); ?> 
        <?php echo $this->Form->end(); ?>
      </div>
    </div>
  </div>
   
</div>



<script>

$(document).ready(function() {

var pathname = (window.location.protocol + "//" + window.location.host + "/" + "timmurigu/events/event/");

$('#professionalModal').hide();
  $('#myModal').modal('show');
  
    $('#k_event_calender').fullCalendar({
      
      events: [
          <?php echo $calender_data; ?>
      ],

       
    eventClick: function(event) {
        if (event.url) {
          window.location.href = (pathname + event.url);
            //window.open("/" + (pathname + event.url));
            return false;
        }
    },
       dayClick: function(date, jsEvent, view) {

        $('#professionalModal').modal('show');
        $('#professionalModal #EventStartdate').val(date.format());

    }

    });

    $('.k_event_calender_dummy').fullCalendar({
      
      events: [
          <?php echo $calender_data; ?>
      ],

       
    eventClick: function(event) {
        if (event.url) {
          window.location.href = (pathname + event.url);
            //window.open("/" + (pathname + event.url));
            return false;
        }
    }

    });

   
   
});
</script>

<script>

var infowindow = new google.maps.InfoWindow();
  var marker = new google.maps.Marker({
    map: map_canvas,
    anchorPoint: new google.maps.Point(0, -29)
  });

var componentForm = {
  street_number: 'short_name',
  route: 'long_name',
  locality: 'long_name',
  administrative_area_level_1: 'short_name',
  country: 'long_name',
  postal_code: 'short_name'
};


  var searchBox = new google.maps.places.SearchBox(document.getElementById('pac-input'));
var place
  google.maps.event.addListener(searchBox, 'places_changed', function() {
    place = searchBox.getPlaces()[0];

for (var i = 0; i < place.address_components.length; i++) {
    var addressType = place.address_components[i].types[0];
    if (componentForm[addressType]) {
      var val = place.address_components[i][componentForm[addressType]];
      
      /* ************************* location Related Values are in below alert box *********************** */
     // alert(addressType+" >>  "+val);

    }
  }

    if (!place.geometry) return;

    if (place.geometry.viewport) {
      map_canvas.fitBounds(place.geometry.viewport);
    } else {
      map_canvas.setCenter(place.geometry.location);
      map_canvas.setZoom(16);
    }



     marker.setIcon(/** @type {google.maps.Icon} */({
      url: place.icon,
      size: new google.maps.Size(71, 71),
      origin: new google.maps.Point(0, 0),
      anchor: new google.maps.Point(17, 34),
      scaledSize: new google.maps.Size(35, 35)
    }));
    marker.setPosition(place.geometry.location);
    marker.setVisible(true);

    var address = '';
    if (place.address_components) {
      address = [
        (place.address_components[0] && place.address_components[0].short_name || ''),
        (place.address_components[1] && place.address_components[1].short_name || ''),
        (place.address_components[2] && place.address_components[2].short_name || '')
      ].join(' ');
    }

    infowindow.setContent('<div><strong>' + place.name + '</strong><br>' + address);
    infowindow.open(map_canvas, marker);

   //alert(place.geometry.location);
 
     var geocoder = new google.maps.Geocoder();
                     geocoder.geocode({
                         "latLng":place.geometry.location
                     }, function (results, status) {
                         console.log(results, status);
                         if (status == google.maps.GeocoderStatus.OK) {
                             console.log(results);
                             var lat = results[0].geometry.location.lat(),
                                 lng = results[0].geometry.location.lng(),
                                 placeName = results[0].address_components[0].long_name,
                                 latlng = new google.maps.LatLng(lat, lng);

                                $('#EventLatitude').val(lat);
                                $('#EventLongitude').val(lng);
                                $('#EventGAddress').val(results[0].formatted_address);
                                
                             //alert("\nlat ="+lat+"\n lng ="+lng+"\nplace2 ="+results[0].formatted_address);
                            
                         }
                     });

  });



</script> 

<script>

  $(".timepicker").timepicker({
      showInputs: false
    });

    $(function () {
      $("[data-mask]").inputmask();
    });
 </script> 