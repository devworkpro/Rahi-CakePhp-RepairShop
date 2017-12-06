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

<?php $user = $data['User']; ?>
<section>

	<div class="container">
		<div class="banner_image">
			<img src="<?php echo $this->webroot . 'img/user_image/userbanners/'.$user['banner_image']; ?>" alt="banner image" />
		</div><!--banner_image-->
		
		<div class="user_profile_sec">
			<div class="col-xs-12 col-sm-12 col-md-3">
				<div class="left_side_bar">
					<div class="profile_image">
						<img src="<?php echo $this->webroot . 'img/user_image/small/'.$user['profile_pic']; ?>" alt="profile image" />
					</div><!-- profile_image -->
					<div class="user_name">
						<span><?php echo $user['first_name'].' '.$user['surname']; ?></span>
					</div>
					<div class="user_address">
						<span><?php echo $user['address']; ?></span>
					</div>
					<div class="button user_profile_edit_btn">
						
         <?php echo $this->Html->link('Edit Profile', array('controller' => 'users', 'action' => 'editprofile', 'user'=>true), array('class' => 'btn btn-primary edit_btn')); ?> 
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
					<div class="event_calender" id="k_event_calender">

					<!--	<img class="event_calender_img" src="<?php echo $this->webroot?>images/event_calender.png" alt="calender image" /> -->
					</div><!-- event_calender -->
				</div><!-- right_side_bar -->
			</div>
			
		</div><!-- user_profile_sec -->
	</div><!-- container -->
	
	
</section>
<script>
$(document).ready(function() {
	
var pathname = $(location).attr('href');
pathname = pathname.replace('/users/profile', '/events/event/')

    $('#k_event_calender').fullCalendar({
      
    	events: [
        	<?php echo $calender_data; ?>
    	],

       
    eventClick: function(event) {
        if (event.url) {
        	window.location.href = (pathname + event.url);
            return false;
        }
    }

    });

});
</script>