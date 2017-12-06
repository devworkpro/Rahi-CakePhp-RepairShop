<section class="home_sec current">
	<div class="course_type">
		<div class="container">
			<div class="row">
				<div class="col-sm-8 col-md-8">
					<div class="crs_hd">
						<input type="hidden" id="user" attr-user="<?php echo $this->Session->read('User_id')?>">
						<h2><?php echo $courseDetail['Course']['Name']; ?></h2>
					</div>
					<div class="lft_crs_type">
						<?php echo $this->Form->hidden('positions',array('id'=>'CoursePositions','value'=>$courseDetail['Course']['positions'])); ?>

						<div style="height:475px;width:835px;" id="map"></div>
					</div>
					<div class="profile_picture_strip "> <!-- Unlocked Strip -->
						<div class="crs_hd">
							<h2 class="clearfix"><span>Connections who have unlocked this course</span></h2></div>
							<?php foreach($usersWhoUnlocked as $users){?>
							<div class="col-xs-3 col-sm-3 col-md-2">
								<div class="strip">
									<p class="text-center"><?php echo $this->Html->image('user_image/'.$users['User']['profile_pic']);?></p>
									<p class="text-center"><?php echo $users['User']['first_name']; ?></p>
								</div>
							</div>
							<?php } ?>
							
							
						</div>
						<?php if($alreadyJoined && $type != 'Upcoming'){ ?>
					<?php if(isset($leaderboard)){?>
						
						<?php echo $this->element('portal-includes/leaderboard'); ?>
							
						<?php  } ?>
						<?php } ?>
												
						</div>

						<?php echo $this->element('portal-includes/courseDetail-right'); ?>
			
								
								<div class="col-sm-8">
								<div class="comment_section">
							<div class="crs_hd">
								<h2>Comments</h2>
							</div>
							<div class="re_view">
								<ul>
									<li class="commenttext">
										<div class="user_img">
											<?php echo $this->Html->image('user_image/'.$this->Session->read('User_pic')); ?>
										</div>
										<form id="commentadd" action="javascript: void(0)" attr-id="<?php echo $courseDetail['Course']['id']; ?>" date="<?php echo date('d-M-Y');?>" >
											<div class="comnt_area">
												<p>Join The Discussion...</p>
												<span>
												<textarea autocomplete="off" type="text" id="comment-text" required></textarea>
												<!-- <input type="text" id="comment-text" required> -->
												<button class="btn btn-default comment_btn">submit</button>
												</span>
											</div>
										</form>
									</li>
								</ul>
								<ul class="commentclass">
									
									<?php //echo '<pre>';print_r($comments);?>
										<?php foreach($comments as $comment){?>
										<li class="commennt_li cmt_<?php echo $comment['Comment']['id'];?>" attr-id="<?php echo $comment['Comment']['id'];?>" attr-cid="<?php echo $comment['Comment']['course_id'] ?>" >
											<div class="user_img">
												<?php echo $this->Html->image('user_image/'.$comment['User']['profile_pic']); ?>
											</div>
											<div class="comnt_info">
												<h3><?php echo $comment['User']['first_name'].' '.$comment['User']['surname']; ?><span><?php $date = strtotime($comment['Comment']['created_at']); echo date('d-M-Y H:i',$date);?></span><h3>
												<p> 
													<?php echo $comment['Comment']['comment'];?>
												</p>
												
											<?php
											$sid = $this->Session->read('User_id');
											$cid = $comment['Comment']['user_id'];
											
											if($sid==$cid){
												 
										 ?>
											<i id="<?php echo $comment['Comment']['id'];?>" class="fa fa-trash-o"></i>
											<?php }
											?>
										
											</div>
											
										</li>
										<?php } ?>
										
									</ul>
								</div>

							</div>
								<p>
									<button class="load_more" >Load More Comments</buttton>
								</p>
								</div>
							</div>
						</div>
					</div>
				<!-- Modal -->
<div id="uploadModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->

    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Upload GPX</h4>
      </div>
      <?php echo $this->Form->create('Course',array('action'=>'UploadGPX','type' => 'file','id'=>'uploadfile','class'=>'fileUpload btn btn-default'));?>
      <div class="modal-body">
      <div class="form-group">
		<span class="upload_btn"><i class="fa fa-upload" aria-hidden="true"></i><span id="uploadText"> Click to select activity to upload</span> 
		<input type="file" value="Upload GPX" name="UploadGPX" id="UploadGPX" class="upload"></span> 
		 
		<input type="hidden" id="cid" value="<?php echo $courseDetail['Course']['id'];?>" name="cid"> 
	  </div>
	  <div class="form-group">
		<?php echo $this->form->input('GPX.activity_name',array('type'=>'text','div'=>false)); ?>
	  </div>
	  <div class="form-group">
		<?php echo $this->Form->input('GPX.activity_type', array('options' => array('Walk'=>'Walk','Jog'=>'Jog','Run'=>'Run','Wheelchair'=>'Wheelchair'),'div'=>false)) ?>
	  </div>
	  <div class="form-group">

		<?php echo $this->Form->input('GPX.activity_with', array( 'type' => 'select','multiple' => 'checkbox','options' => array('Dog' => 'Dog','Wheelchair' => 'Wheelchair','Pram'=>'Pram')));?>
	  </div>
	   <div class="form-group">
       <?php echo $this->Form->input('GPX.viewable', array('options' => array('1'=>'Yes','0'=>'No'),
     'div'=>false,'label'=>'Viewable before expiry', 'default'=>'yes')); ?>    
    </div>
	  <div class="form-group">
       <?php echo $this->Form->input('GPX.privacy_setting', array('options' => array('Public'=>'Public','Private'=>'Private','Connections'=>'Connections','Friends'=>'Friends'),
     'div'=>false)); ?>    
    </div>


     <div class="form-group">
       <?php echo $this->Form->input('GPX.blog_commentary', array('type' => 'textarea','div'=>false)); ?>    
    </div>
	  <div class="form-group">
		<?php echo $this->form->submit('Upload',array('id'=>'uploadG' , 'class'=>'btn btn-default work_btn hvr-sweep-to-right')); ?>
	  </div>

											
      </div>
    	<?php echo $this->Form->end();?>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<span style="display: none;" class="error_message"><?php echo $this->Flash->render('invalid'); ?></span>
				</section>
				<script src="<?php echo $this->webroot.'js/front/sweetalert.min.js';?>"></script>
				<link rel="stylesheet" href="<?php echo $this->webroot.'css/front/sweetalert.css';?>">
				<script src="<?php echo $this->webroot.'js/front/course_detail.js';?>"></script>
				<?php
				if(isset($upcomingScript)){ // For upcoming
					echo $upcomingScript;
				}else{
					if(isset($joinedScript)){ // if joined
					echo $joinedScript;
					}else{
					echo $courseScript; // if not joined
					}
			}
				?>
				<script src="<?php echo $this->webroot.'js/backend/MarkerWithLabel.js';?>"></script>
			<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-551d25384beaf9e1"></script>


				
				<style>
				.gmnoprint{overflow: unset !important; opacity: 1 !important;}
				.labels {
				    color: red;
				    font-family: "Lucida Grande","Arial",sans-serif;
				    font-size: 15px;
				    text-align: center;
				    white-space: nowrap;
				    width: 55px;
				}
				.score {
				    font-size: 10px;
				}
				.comnt_info p {
    white-space: pre-wrap;
}
				</style>

				

				
				
