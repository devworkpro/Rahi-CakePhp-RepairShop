
<section id="dashboard">

<div class="container">
<div class="top_panel">
<h3> <span>Courses near you this week and next</span>  </h3>
<div class="panel_slider"><img alt="image" src="../img/dashboard_slide.png"></div> <!-- panel_slider -->
<h3> <span>Your feed</span>  </h3>
</div><!-- top_panel -->

<div class="mdl_panel">
<div class="col-sm-8">
<div class="left_panel">
	<?php foreach($courses as $course) { 

		$lat=$course['courses']['latitude'];
		$lon=$course['courses']['longitude'];
		$type=$course['courses']['type2'];
		$activity_with=json_decode($course['Gpx']['activity_with']);
		//$with=print_r( $activity_with);

		?>
<div class="dashboard_feed">
<div class="col-sm-2">
<div class="dashboard_feed_image">

<?php echo $this->Html->image('user_image/'.$image,array('alt' => 'CakePHP','class'=>'user-image'));?><br><span><?php echo $name; ?></span>
</div><!-- dashboard_feed_image -->
</div>

<div class="col-sm-7">
	<div class="dashboard_feed_map">
			<h4> <?php echo $course['Gpx']['activity_name']; ?>  <span class="pull-right">  <?php echo $course['Gpx']['created_at']; ?></span></h4>
			<p><!-- <img src="img/dashboard_map.png" alt="img"> -->


				<?php echo $this->Html->image('https://maps.googleapis.com/maps/api/staticmap?center='.$lat.','.$lon.'&size=461x272&zoom=16&maptype=roadmap&markers=icon:'.SITEURL.'img/strt.png|color:red|'.$lat.','.$lon);?>


				<span class="text-center"><?php echo $course['courses']['Name']; ?></span>
				
			</p>
			
			<button class="btn btn-primary kudos"><i class="fa fa-thumbs-up" aria-hidden="true"></i> 456    </button>
		<div class="dshbrd_comment">
			
			<p>Comments: </p>
			<?php foreach ($course['Comment'] as $comment) { ?>
			<?php if($course['users']['id']==$course['Gpx']['user_id']) { ?>

			<h4 class="comments_list"><span class="user_pic" style="width:45px;"><?php echo $this->Html->image('user_image/small/'.$course['users']['profile_pic']);?></li></span> 
				
					
				
				 <span class="user_cmnt">
				 	
				 	<small> <?php echo $course['users']['first_name'].' '.$course['users']['surname']; ?> : </small>
				 	<?php } ?>

				 	 <?php echo $comment['comment']; ?> .</span> 
			<br>   <span class="time">1 hour ago</span>  </h4>  <?php }?>
			<h4 class="comments_blck"><span class="user_pic" style="width:45px;"><?php echo $this->Html->image('user_image/small/'.$image,array('alt' => 'CakePHP','class'=>'user-image'));?></span> <span class="user_cmnt"><input class="form-control" placeholder="comments..."></span><button class="btn btn-primary">Send</button></h4>
		</div><!-- dshbrd_comment -->
	</div><!-- dashboard_feed_map -->
</div>

<div class="col-sm-3">
<div class="dashboard_feed_table">
	<ul>
		<li><span>Time:	</span>	     <?php echo $course['leaderboards']['time']; ?></li>

		<?php if($type==1) { ?>

			<li><span>Score: </span><?php echo $course['leaderboards']['score']; ?></li>

		<?php } ?>

		<li><span>Distance:  </span> <?php echo $course['leaderboards']['distance']; ?> </li>
		<li><span>With:	</span><?php print_r( $activity_with[0]); ?></li>
		<li><span>Type:	</span><?php echo $course['Gpx']['activity_type']; ?></li>
	</ul>
	
		<p><a href="#">Blog Link	</a></p>
</div><!-- dashboard_feed_table -->

</div>

</div> 
<?php } ?>
<!-- dashboard_feed -->
<!-- <div class="dashboard_feed">
<div class="col-sm-2">
<div class="dashboard_feed_image">
<img alt="img" src="img/dashboard_frnd.png"><br><span>loram ipsum </span>
</div>
</div>

<div class="col-sm-7">
	<div class="dashboard_feed_map">
			<h4>UPLOAD TITLE &gt; <span class="pull-right"> 6/18/2016 13:06</span></h4>
			<p><img src="img/dashboard_map.png" alt="img"><span class="text-center">Alpha Score-BRyce</span></p>
			<button class="btn btn-primary kudos"><i class="fa fa-thumbs-up" aria-hidden="true"></i> 456    </button>
		<div class="dshbrd_comment">
			<p>Comments: </p>
			<h4 class="comments_list"><span class="user_pic"><img alt="img" src="img/user_cmnt.png"></span> <span class="user_cmnt"><small>Loram ipsum : </small> Lorem Ipsum is simply dummy t is a long established .</span>
			<br>   <span class="time">1 hour ago</span>  </h4>
			<h4 class="comments_blck"><span class="user_pic"><img alt="img" src="img/user_cmnt.png"></span> <span class="user_cmnt"><input class="form-control" placeholder="comments..."></span><button class="btn btn-primary">Send</button></h4>
		</div>
	</div>
</div>

<div class="col-sm-3">
<div class="dashboard_feed_table">
	<ul>
		<li><span>Time	</span>	     5:37</li>
		<li><span>Score	    </span>          70</li>
		<li><span>Distance  </span>               0.75km</li>
		<li><span>With	</span></li>
		<li><span>Type	</span>                       Walk</li>
	</ul>
	
		<p><a href="#">Blog Link	</a></p>
</div>

</div>
</div>

<div class="dashboard_feed">
<div class="col-sm-2">
<div class="dashboard_feed_image">
<img alt="img" src="img/dashboard_frnd.png"><br><span>loram ipsum </span>
</div>
</div>

<div class="col-sm-7">
	<div class="dashboard_feed_map">
			<h4>UPLOAD TITLE &gt; <span class="pull-right"> 6/18/2016 13:06</span></h4>
			<p><img src="img/dashboard_map.png" alt="img"><span class="text-center">Alpha Score-BRyce</span></p>
			<button class="btn btn-primary kudos"><i class="fa fa-thumbs-up" aria-hidden="true"></i> 456    </button>
		<div class="dshbrd_comment">
			<p>Comments: </p>
			<h4 class="comments_list"><span class="user_pic"><img alt="img" src="img/user_cmnt.png"></span> <span class="user_cmnt"><small>Loram ipsum : </small> Lorem Ipsum is simply dummy t is a long established .</span>
			<br>   <span class="time">1 hour ago</span>  </h4>
			<h4 class="comments_blck"><span class="user_pic"><img alt="img" src="img/user_cmnt.png"></span> <span class="user_cmnt"><input class="form-control" placeholder="comments..."></span><button class="btn btn-primary">Send</button></h4>
		</div>
	</div>
</div>

<div class="col-sm-3">
<div class="dashboard_feed_table">
	<ul>
		<li><span>Time	</span>	     5:37</li>
		<li><span>Score	    </span>          70</li>
		<li><span>Distance  </span>               0.75km</li>
		<li><span>With	</span></li>
		<li><span>Type	</span>                       Walk</li>
	</ul>
	
		<p><a href="#">Blog Link	</a></p>
</div>

</div>
</div>

<div class="dashboard_feed">
<div class="col-sm-2">
<div class="dashboard_feed_image">
<img alt="img" src="img/dashboard_frnd.png"><br><span>loram ipsum </span>
</div>
</div>

<div class="col-sm-7">
	<div class="dashboard_feed_map">
			<h4>UPLOAD TITLE &gt; <span class="pull-right"> 6/18/2016 13:06</span></h4>
			<p><img src="img/dashboard_map.png" alt="img"><span class="text-center">Alpha Score-BRyce</span></p>
			<button class="btn btn-primary kudos"><i class="fa fa-thumbs-up" aria-hidden="true"></i> 456    </button>
		<div class="dshbrd_comment">
			<p>Comments: </p>
			<h4 class="comments_list"><span class="user_pic"><img alt="img" src="img/user_cmnt.png"></span> <span class="user_cmnt"><small>Loram ipsum : </small> Lorem Ipsum is simply dummy t is a long established .</span>
			<br>   <span class="time">1 hour ago</span>  </h4>
			<h4 class="comments_blck"><span class="user_pic"><img alt="img" src="img/user_cmnt.png"></span> <span class="user_cmnt"><input class="form-control" placeholder="comments..."></span><button class="btn btn-primary">Send</button></h4>
		</div>
	</div>
</div>

<div class="col-sm-3">
<div class="dashboard_feed_table">
	<ul>
		<li><span>Time	</span>	     5:37</li>
		<li><span>Score	    </span>          70</li>
		<li><span>Distance  </span>               0.75km</li>
		<li><span>With	</span></li>
		<li><span>Type	</span>                       Walk</li>
	</ul>
	
		<p><a href="#">Blog Link	</a></p>
</div>

</div>
</div>

<div class="dashboard_feed">
<div class="col-sm-2">
<div class="dashboard_feed_image">
<img alt="img" src="img/dashboard_frnd.png"><br><span>loram ipsum </span>
</div>
</div>

<div class="col-sm-7">
	<div class="dashboard_feed_map">
			<h4>UPLOAD TITLE &gt; <span class="pull-right"> 6/18/2016 13:06</span></h4>
			<p><img src="img/dashboard_map.png" alt="img"><span class="text-center">Alpha Score-BRyce</span></p>
			<button class="btn btn-primary kudos"><i class="fa fa-thumbs-up" aria-hidden="true"></i> 456    </button>
		<div class="dshbrd_comment">
			<p>Comments: </p>
			<h4 class="comments_list"><span class="user_pic"><img alt="img" src="img/user_cmnt.png"></span> <span class="user_cmnt"><small>Loram ipsum : </small> Lorem Ipsum is simply dummy t is a long established .</span>
			<br>   <span class="time">1 hour ago</span>  </h4>
			<h4 class="comments_blck"><span class="user_pic"><img alt="img" src="img/user_cmnt.png"></span> <span class="user_cmnt"><input class="form-control" placeholder="comments..."></span><button class="btn btn-primary">Send</button></h4>
		</div>
	</div>
</div>

<div class="col-sm-3">
<div class="dashboard_feed_table">
	<ul>
		<li><span>Time	</span>	     5:37</li>
		<li><span>Score	    </span>          70</li>
		<li><span>Distance  </span>               0.75km</li>
		<li><span>With	</span></li>
		<li><span>Type	</span>                       Walk</li>
	</ul>
	
		<p><a href="#">Blog Link	</a></p>
</div>

</div>
</div>

<div class="dashboard_feed">
<div class="col-sm-2">
<div class="dashboard_feed_image">
<img alt="img" src="img/dashboard_frnd.png"><br><span>loram ipsum </span>
</div>
</div>

<div class="col-sm-7">
	<div class="dashboard_feed_map">
			<h4>UPLOAD TITLE &gt; <span class="pull-right"> 6/18/2016 13:06</span></h4>
			<p><img src="img/dashboard_map.png" alt="img"><span class="text-center">Alpha Score-BRyce</span></p>
			<button class="btn btn-primary kudos"><i class="fa fa-thumbs-up" aria-hidden="true"></i> 456    </button>
		<div class="dshbrd_comment">
			<p>Comments: </p>
			<h4 class="comments_list"><span class="user_pic"><img alt="img" src="img/user_cmnt.png"></span> <span class="user_cmnt"><small>Loram ipsum : </small> Lorem Ipsum is simply dummy t is a long established .</span>
			<br>   <span class="time">1 hour ago</span>  </h4>
			<h4 class="comments_blck"><span class="user_pic"><img alt="img" src="img/user_cmnt.png"></span> <span class="user_cmnt"><input class="form-control" placeholder="comments..."></span><button class="btn btn-primary">Send</button></h4>
		</div>
	</div>
</div>

<div class="col-sm-3">
<div class="dashboard_feed_table">
	<ul>
		<li><span>Time	</span>	     5:37</li>
		<li><span>Score	    </span>          70</li>
		<li><span>Distance  </span>               0.75km</li>
		<li><span>With	</span></li>
		<li><span>Type	</span>                       Walk</li>
	</ul>
	
		<p><a href="#">Blog Link	</a></p>
</div>

</div>
</div> -->

<p class="text-center load_more"> <button class="btn btn-default" type="button">LORAM IPSUM</button></p>





</div><!-- left_panel -->
</div>
<div class="col-sm-4">
<div class="right_panel">
<div class="YourStatistics ">
<h2>Your Statistics</h2>
<div class="statistics_info">
<ul>
<strong>Life to date</strong>
	<li>Number of courses: <?php echo $total_courses; ?></li>
	<li>Distance: <?php echo $total_distance[0][0]['total_distance']; ?></li>
	<li>Climb</li>
	<li>Ave HR</li>
	<li>Ave Speed: <?php echo $avg_speed; ?></li>
	<li>Score total: <?php echo $total_score[0][0]['total_score']?></li>
	<li>Score of best attempts: <?php echo $max_score[0][0]['max_score']?></li>
	<li>Checkpoints collected total: <?php echo $total_points[0][0]['total_points']?></li>
	<li>Checkpoints collected best attempts: <?php echo $max_point[0][0]['Max_point']?></li>
</ul>
<ul>
<strong>This Year</strong>
	<li>Same metrics</li>
</ul>

<ul>
<strong>Last 4 weeks</strong>
	<li>Same metrics</li>
</ul>

</div><!-- statistics_info -->

</div><!-- YourStatistics -->

<div class="YourStatistics ">
<h2>Your Connections</h2>
<div class="statistics_info dashboard_friends">



<ul>
<strong>Friends</strong>
<?php foreach($friends as $value){?>
	<li><?php echo $this->Html->image('user_image/small/'.$value['0']['profile_pic']);?></li>
<!-- <li><img src="img/dashboard_frnd.png" alt="img"></li>
<li><img src="img/dashboard_frnd.png" alt="img"></li>
<li><img src="img/dashboard_frnd.png" alt="img"></li>
<li><img src="img/dashboard_frnd.png" alt="img"></li> -->
<?php } ?>
<p class="text-center"><a href="/runningportal/course/57-Alpha_Score_Bryce-1" class="btn btn-default dashboard_btn">LOAD more</a></p>
</ul>
<ul>
<strong>Following</strong>
<?php foreach($following as $value){?>
	<li><?php echo $this->Html->image('user_image/small/'.$value['users']['profile_pic']);?></li>
<!-- <li><img alt="img" src="img/dashboard_frnd.png"></li>
<li><img alt="img" src="img/dashboard_frnd.png"></li>
<li><img alt="img" src="img/dashboard_frnd.png"></li>
<li><img alt="img" src="img/dashboard_frnd.png"></li> -->
<?php } ?>
<p class="text-center"><a href="/runningportal/course/57-Alpha_Score_Bryce-1" class="btn btn-default dashboard_btn">LOAD more</a></p>
</ul>
<ul>
<strong>Followers
</strong>
<?php foreach($follower as $value){?>
	<li><?php echo $this->Html->image('user_image/small/'.$value['users']['profile_pic']);?></li>
<!-- <li><img alt="img" src="img/dashboard_frnd.png"></li>
<li><img alt="img" src="img/dashboard_frnd.png"></li>
<li><img alt="img" src="img/dashboard_frnd.png"></li>
<li><img alt="img" src="img/dashboard_frnd.png"></li> -->
<?php } ?>
<p class="text-center"><a href="/runningportal/course/57-Alpha_Score_Bryce-1" class="btn btn-default dashboard_btn">LOAD more</a></p>
</ul>

</div><!-- statistics_info dashboard_friends-->
</div><!-- YourStatistics -->


<div class="YourStatistics ">
<h2>Search For friends</h2>
<div class="statistics_info Search_frnd">
<input type="text" class="form-control" id="Serchfrnd" placeholder="Search here...">
<button class="btn btn-default"><i class="fa fa-search" aria-hidden="true"></i></button>
</div><!-- statistics_info Search_frnd -->
</div><!-- YourStatistics -->

<div class="YourStatistics ">
<h2>Search For friends</h2>
<div class="statistics_info invite_frnd ">
<p class="text-center"><button class="btn btn-default">Invite Your Friends </button></p>
<ul>
<strong>Suggested friends/following</strong>
<li><img alt="img" src="img/dashboard_frnd.png"><br><span>loram ipsum </sppan></li>
<li><img alt="img" src="img/dashboard_frnd.png"><br><span>loram ipsum </sppan></li>
<li><img alt="img" src="img/dashboard_frnd.png"><br><span>loram ipsum </sppan></li>
<li><img alt="img" src="img/dashboard_frnd.png"><br><span>loram ipsum </sppan></li>

</ul>
</div><!-- statistics_info invite_frnd -->
</div><!-- YourStatistics -->
<div class="YourStatistics ">
<h2>Your Badges/Awards</h2>
<div class="statistics_info dashboard_friends Awards">




<ul>
<strong>Acheieved</strong>
	<li><img src="img/award.png" alt="img"></li>
	<li><img src="img/award.png" alt="img"></li>
	<li><img src="img/award.png" alt="img"></li>
	<li><img src="img/award.png" alt="img"></li>
<p class="text-center"><a class="btn btn-default dashboard_btn" href="/runningportal/course/57-Alpha_Score_Bryce-1">see more</a></p>
</ul>
<ul>
<strong>In Progress</strong>
	<li><img src="img/award.png" alt="img"></li>
	<li><img src="img/award.png" alt="img"></li>
	<li><img src="img/award.png" alt="img"></li>
	<li><img src="img/award.png" alt="img"></li>
<p class="text-center"><a class="btn btn-default dashboard_btn" href="/runningportal/course/57-Alpha_Score_Bryce-1">see more</a></p>
</ul>


</div><!-- statistics_info dashboard_friends-->
</div><!-- YourStatistics -->

</div>
</div><!-- right_panel -->
</div><!-- mdl_panel -->

<div class="top_panel btm_panel">
<h3> <span>Your courses that have closed recently</span>  </h3>
<div class="panel_slider"><img alt="image" src="../img/dashboard_slide.png"></div> <!-- panel_slider -->

</div><!-- top_panel -->

</div><!-- container -->

</div> 
</section>
