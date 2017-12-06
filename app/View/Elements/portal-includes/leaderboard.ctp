<?php $locations = json_decode($courseDetail['Course']['positions']);
$i = 0;
foreach ($locations as $location) {
	if($location->type != 's' && $location->type != 'f'){
		$i++;
	}
}
?>
<div class="leader_brd">
	<div class="wrapper">
		<div class="row">
			<div class="container">
				<div>
					<!-- Nav tabs -->
					<ul class="nav nav-tabs" role="tablist">
						<li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Overall Leaderboard</a></li>
						<li role="presentation"><a href="#attempts" aria-controls="attempts" role="tab" data-toggle="tab">My Attempts</a></li>
					</ul>
					<!-- Tab panes -->
					<div class="tab-content">
						<div role="tabpanel" class="tab-pane active" id="home">
							<h2>My overall rank <span><?php if(isset($userRank[0]['rank'])){echo $userRank[0]['rank']['rank'];}else{echo '0';}?> </span> of <?php echo count($leaderboard);?></h2>
							<h5 align="right">Course active: <?php echo $courseDetail["Course"]["start_time"];?> to <?php echo $courseDetail["Course"]["end_time"];?></h5>
							
							<div class="leaderboard_filter">
								<div class="f_list1">  <p>By Connections To The User</p>  </div>
								<div class="f_list1">
									<p><select class="leadFilter" id="gender_filter">
										<option value="">By Gender</option>
										<option value="M">Male</option>
										<option value="F">Female </option>
									</select>
								</p>
							</div>
							<div class="f_list1">
								<p><select class="leadFilter" id="age_filter">
									<option value="">By Age Range</option>
									<option value="0">20 and under</option>
									<option value="1">21 to 30 </option>
									<option value="2">31 to 40</option>
									<option value="3">41 to 50</option>
									<option value="4">51 to 60</option>
									<option value="5">61 to 70</option>
									<option value="6">70 and above</option>
								</select>
							</p>
						</div>
						<div class="f_list1">
							<p><select class="leadFilter" id="activityWith_filter">
								<option value="0">By Activity With</option>
								<option value="Dog">Dog</option>
								<option value="Pram">Pram</option>
								<option value="Wheelchair">Wheelchair</option>
							</select>
						</p>
					</div>
					<div class="f_list1">
						<p><select class="leadFilter" id="activityType_filter">
							<option value="0">By Activity Type</option>
							<option value="Jog">Jog </option>
							<option value="Run"> Run </option>
							<option value="Walk"> Walk </option>
							<option value="Wheelchair">Wheelchair  </option>
							
						</select>
					</p>
				</div>
				
				
				</div> <!-- leaderboard_filter -->
				
				
				
				<div class="table-responsive l_board_table">
					<table class="table">
						<thead>
							<tr>
								<th>Rank</th>
								<th>Name</th>
								<th>Date</th>
								<?php if($courseType != 'Score'){echo '<th>Controls</th>';} ?>
								<th>Attempts</th>
								<th>Time</th>
								<?php if($courseType == 'Score'){ echo '<th>Score</th>'; } ?>
							</tr>
						</thead>
						
						<tbody class="leader-filter">
							<?php foreach($leaderboard as $leader){
							?>
							<tr class="plotMap" id="<?php echo $leader['User']['id'].'-'.$leader['Leaderboard']['gpx_id'];?>">
								<td><?php echo $leader[0]['rank'];?></td>
								<td><p class="borad_img">
									<span class="l_user_name">
										<?php if($leader['User']['username']){
											echo $leader['User']['username'];
										}else{
											echo $leader['User']['first_name'].' '.$leader['User']['surname'];
										}?>
									</span></p></td>
									<td><?php echo date('d-F-Y H:i', $leader['Leaderboard']['run_date']);?></td>
									
									<?php if($courseType == 'Scatter'){?><td>
										<?php if($leader['Leaderboard']['controls'] >= $courseDetail["Course"]["required_control"]) {
											echo $leader['Leaderboard']['controls'];}
									else{ echo 'DNF';}?></td> <?php }?>
									<?php if($courseType == 'Line'){?><td>
										<?php if($leader['Leaderboard']['controls'] == $i) {
											echo $leader['Leaderboard']['controls'];}
									else{ echo 'DNF';}?></td> <?php }?>
									
									<td><?php echo $leader['Leaderboard']['attempts'];?></td>
									<td><?php echo $leader['Leaderboard']['time'];?></td>
									<?php if($courseType == 'Score'){
										echo '<td>';
											$exceedLimit = (int)$courseDetail["Course"]["time_limit"] + 10;
										if($exceedLimit >= ceil((float)str_replace(":",".",$leader['Leaderboard']['time']))){
																	echo $leader['Leaderboard']['score'];
										}else{
											echo 'DNF';
										}
											
									echo '</td>'; } ?>
								</tr>
								<?php } ?>
								
							</tbody>
						</table>
						<div style="display: none;" class="loading_leaderboard">
							<img src="<?php echo $this->webroot.'img/ajax-loader.gif';?>">
						</div>
						<!--  <div class="table_btn">
								<div class="container">
								<button type="button" class="btn_tabl green_b">Prev</button>
								<button type="button" class="btn_tabl yel_b">Next</button>
							</div>
						</div> -->
					</div>
					
					
				</div>
				<div role="tabpanel" class="tab-pane" id="attempts">
					<h2>My overall rank <span><?php if(isset($userRank[0]['rank'])){echo $userRank[0]['rank']['rank'];}else{echo '0';}?> </span> of <?php echo count($leaderboard);?></h2>
					<h5 align="right">Attempts: <?php echo count($userAttempts);?></h5>
					<div class="table-responsive l_board_table">
						<table class="table">
							<thead>
								<tr>
									<th>Rank</th>
									<th>Date</th>
									<?php if($courseType != 'Score'){?> <th>Controls</th><?php }?>
									<th>Time</th>
									<th>Distance</th>
									<?php if($courseType == 'Score'){ echo '<th>Score</th>'; } ?>
								</tr>
							</thead>
							
							<tbody>
								<?php foreach($userAttempts as $userAttempts){ ?>
								<tr class="plotMap" id="<?php echo $userAttempts['User']['id'].'-'.$userAttempts['Leaderboard']['gpx_id'];?>">
									<td><?php echo $userAttempts[0]['myrank'];?></td>
									<td><?php echo date('d-F-Y H:i', $userAttempts['Leaderboard']['run_date']);?></td>
									<?php if($courseType == 'Scatter'){?><td>
										<?php if($userAttempts['Leaderboard']['controls'] >= $courseDetail["Course"]["required_control"]) {
											echo $userAttempts['Leaderboard']['controls'];}
									else{ echo 'DNF';}?></td> <?php }?>
									<?php if($courseType == 'Line'){?><td>
										<?php if($userAttempts['Leaderboard']['controls'] == $i) {
											echo $userAttempts['Leaderboard']['controls'];}
									else{ echo 'DNF';}?></td> <?php }?>
									<td><?php echo $userAttempts['Leaderboard']['time'];?></td>
									<td><span><?php echo round($userAttempts['Leaderboard']['distance'],3); ?></span> KM</td>
									
									<?php if($courseType == 'Score'){
										echo '<td>';
										$exceedLimit = (int)$courseDetail["Course"]["time_limit"] + 10;
										if($exceedLimit >= ceil((float)str_replace(":",".",$userAttempts['Leaderboard']['time']))){
																	echo $userAttempts['Leaderboard']['score'];
										}else{
											echo 'DNF';
										}
											
									echo '</td>'; } ?>
								</tr>
								<?php } ?>
								
							</tbody>
						</table>
						<!--  <div class="table_btn">
								<div class="container">
								<button type="button" class="btn_tabl green_b">Prev</button>
								<button type="button" class="btn_tabl yel_b">Next</button>
							</div>
						</div> -->
					</div>
				</div>
				
			</div>
		</div>
		
		
	</div>
</div>
</div>
</div>
<script src="<?php echo $this->webroot.'Plugins/daterangepicker/moment.min.js';?>"></script>