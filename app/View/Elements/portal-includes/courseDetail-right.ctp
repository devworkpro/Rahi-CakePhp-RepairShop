<div class="col-sm-4 col-md-4">
							<div class="ryt_crs_type">
								
								<div class="abt_courses">
									<div class="corse_blok">
										<h2>COURSE INFORMATION</h2>
										<div class="crs_innr_info">
											<div class="cors_type">
												<h2><?php echo $courseDetail['Course']['Name']; ?></h2></div>
												<span><span class="course_info">Course type: </span><?php echo $courseType; ?> Course</span>
												<span><span class="course_info">Course status: </span><?php echo $type; ?> Course</span>
												<p>
													<span><span class="course_info">Date: </span>
												<?php echo $courseDetail['Course']['start_time'];?> - <?php echo $courseDetail['Course']['end_time'];?> </span>
											</p>
											<span><span class="course_info">Free/Paid: </span><?php if($courseDetail['Course']['type1'] == 0){ echo 'Free';}else{echo 'Paid';} ?></span>
											<span><span class="course_info"> Start Location: </span> <?php echo $courseDetail['Course']['location'];?></span>
											<?php 
											$startTime = strtotime(str_replace('/', '-', $courseDetail["Course"]["start_time"]));
											$endTime = strtotime(str_replace('/', '-', $courseDetail["Course"]["end_time"]));
						                     $currentTime = time();

						                     $seconds = $startTime - $currentTime;
						                     if($seconds>0){
											$minutes = (int)($seconds / 60);
						                     $hours = (int)($minutes / 60);
						                     $days = (int)($hours / 24);

											echo"<span><span class='course_info'> Course available in: </span>". $days .' '. "days </span>";
										}?>


											<span class="checkFree" style="display: none;"><?php echo $courseDetail['Course']['type1']; ?></span>
											<span class="checkExpired" style="display: none;"><?php echo $courseDetail['Course']['type2']; ?></span>
											
											<?php if($alreadyJoined && $type != 'Upcoming'){ ?>
											<div class="join_cors">
											<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#uploadModal">Upload Activity</button>	
											<?php echo $this->Html->link('Download Rules',array('controller'=>'courses','action'=>'downloadPDF',md5($courseDetail['Course']['id'].$courseDetail['Course']['slug']).'-'.$courseDetail['Course']['id']),array('class'=>'btn btn-default download_pdf ','target'=>'_blank'));?>
											<?php echo $this->Html->link('Download Image',array('controller'=>'courses','action'=>'downloadImage',md5($courseDetail['Course']['id'].$courseDetail['Course']['slug']).'-'.$courseDetail['Course']['id']),array('class'=>'btn btn-default download_pdf ','target'=>'_blank'));?>
											</div>
											<?php }/*else if($type == 'Expired'){}*/else{ ?>
											
											<div class="join_cors">
												<?php if(!$alreadyJoined){ ?>
												<?php echo $this->Html->link('Unlock',array('controller'=>'courses','action'=>'join',$courseDetail['Course']['id']),array('class'=>'btn btn-default unlock_btn hvr-sweep-to-right','id'=>'unlockCourse')); }?>
											</div>
											
											<?php } ?>
										</div>
										
									</div>
									
									<div class="corse_blok">
										<?php if($courseDetail['Course']['objective'] || $courseLabel && $labelValue || $courseLabel1 && $labelValue1 || $courseDetail['Page']['key']){ ?>
										<h2>REQUIREMENT / DESCRIPTION</h2>
										<div class="crs_innr_info requit">
											<p><?php echo $courseDetail['Course']['objective']; ?>
											</p>
										
										<?php if($courseType != 'Line'){ ?>
										
											<span><?php echo '<strong>'.$courseLabel.'</strong> '.$labelValue;?><br>
											<?php echo '<strong>'.$courseLabel1.'</strong> '.$labelValue1;?></span>
										
										<?php } ?>
										
										
											<?php if($courseDetail['Page']['key']){
											echo $this->Html->link('Rules',array('controller'=>'pages','action'=>'page',$courseDetail['Page']['key']),array('target'=>'_blank','class'=>'rules_page')); }?>
										</div>
										<?php } ?>
										
									</div> 
									<div class="corse_blok">
										<h2>SHARE YOUR COURSES WITH FRIENDS</h2>
										<div class="crs_innr_info link_share">
											<div class="share_fb">
										
<li style="list-style: none;"><a class="addthis_button_facebook"><i class="fa fa-facebook"><span> Facebook </span></i></a></li>
											
												<i class="fa fa-map-marker" aria-hidden="true"> </i>
											</div>
											<div class="upld_link">
												<span class="lft_upld_link">
													<input type="text" placeholder="Upload Link">
												</span>
												<span class="ryt_sbmy_btn"> 
													<button type="submit">SUBMIT</button>
												</span>
											</div>
										</div>
										
									</div>
								
<div id="load_map_div" style="height:300px;width:100%;"></div>	
								</div>
								 
								</div><!--ryt_crs_type-->
								</div><!--col-md-4-->


<script>

</script>