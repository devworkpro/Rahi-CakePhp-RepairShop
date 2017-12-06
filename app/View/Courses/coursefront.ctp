<?php if(isset($_GET['type']))
{
	$type = $_GET['type'];
}
else{
	$type=1;
	}?>
<section class="home_sec course">
	<div class="courses_mn">
		<div class="container">
			<div class="search_section">
				<div class="srch_hd">
					<h1>SEARCH COURSES</h1>
				</div>
				
				<div class="serch_field">
					<div class="srch_bar">
					
					<input type="search" id="keyword" autocomplete="off" class="srch_1" placeholder="Search Here" name="data[keyword]">											
						<span class="srch_btn">
							<button type="submit" id="srch_pg"></button>
							</span>
					</div>
				</div><!--serch_field-->
			</div><!--search_section-->
			<div class="courses_list">
					<div class="crs_hd">
						<h2>Courses</h2>
					</div>
					
					
			</div><!--courses_list-->
			
			<div class="filter_list">
<div class="f_list1">  <p>Proximity By X <span><input type="text">KM</span></p>   </div>
<div class="f_list1 filter_search filter_date  ">  <p><input type="text" placeholder="By Date Range"></p>
</p>   </div>
<div class="f_list1 filter_search">  <p><input type="text" placeholder="Search location"></p> </div>
<div class="f_list1">  <p>By Course Type <img src="/runningportal/img/portal-images/arrow.png" alt=""></p>   </div>
<div class="f_list1">  <p>By Course Status<img src="/runningportal/img/portal-images/arrow.png" alt=""></p>   </div>
<div class="f_list1">  <p>By Connections To The User</p>  </div>  
<div class="f_list1">  <p>By Free/Paid<img src="/runningportal/img/portal-images/arrow.png" alt=""></p>   </div>
</div><!--filter list-->

		<?php $i = 0; ?>
	<?php foreach($allCourses as $courses){
		$lat = $courses['Course']['latitude'];
		$lon = $courses['Course']['longitude'];
	 ?>
			   <?php if($i %3 ==  0){ ?>
			   <div class="location_map">
				<div class="row">
				<?php } ?>
					<div class="col-xs-12 col-sm-4 col-md-4 ">
						<div class="map1">
							<div class="map_lc">
							<?php echo $this->Html->image('https://maps.googleapis.com/maps/api/staticmap?center='.$lat.','.$lon.'&size=461x272&zoom=8&maptype=roadmap&markers=color:red|'.$lat.','.$lon);?>
							</div>
							<div class="cours_info yellow">
								<h2><?php echo $courses['Course']['Name'];?></h2>
								<p><?php echo $courses['Course']['objective'];?> </p>
								<?php echo $this->Html->link('SEE MORE',"/course/".$courses['Course']['id']."-".$courses['Course']['slug']."-".$type."",array('class'=>'btn btn-default work_btn hvr-sweep-to-right')); ?>
								<div class="btm_info">
									<span class="lft_info">
										<?php
										$test1 = new DateTime(date('d/m-Y'));
										$test2 = new DateTime($courses["Course"]["start_time"]);
										$datetime1 = date_create(date_format($test1,'d/m/Y'));
										$datetime2 = date_create(date_format($test2,'d/m/Y'));
										$interval = date_diff($datetime1, $datetime2);
										$days = $interval->format('%R%a');
										?>

									<?php if($days > 0){?>Start in <font><?php echo $days;?></font> days <?php }else{echo 'Expired Course';} ?>
									</span>
									<span class="ryt_info">
									 <font>Participant </font>: <?php echo count($courses['CourseUnlocked']);?>
									</span>
								</div>	
							</div>
						</div><!--map1-->
					</div><!--col-xs-12 col-sm-4 col-md-4 -->
					<?php   if($i %3 == 2){ ?>
					</div><!--row-->	
					</div><!--location_map-->
				<?php }$i++;} ?>
			<?php} ?>
		</div>
	</div><!--courses_mn-->

</section>
<?php 
    echo $this->Form->create("Courses", array(   "action" => "searchcourse/".$cid, "id" => "searchForm",'type'=>'GET'));

   

    echo $this->Form->end(); 
?>
