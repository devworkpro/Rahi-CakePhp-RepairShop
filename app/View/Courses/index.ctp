<?php //echo '<pre>';print_r($allCourses); ?>
  <section class="home_sec course">
      <div class="courses_mn">
          <div class="container">
         
              <div class="courses_list">
                    <div class="crs_hd">
                        <h2>Courses</h2>
                    </div>
                    <div  class="loading_img">
            <img src="<?php echo $this->webroot.'img/ajax-loader.gif';?>">
          </div> 
          </div><!--courses_list-->
                
                <div class="filter_list">
            <p class="Search_Filter Course"><span>Search / Filter Course</span></p>
            <div class="f_list1">  <p>Proximity By <span><input id="searchKM" type="text" <?php if(!$enablePosition){?> title="You have to set location first" disabled <?php } ?>>KM</span></p>   </div>

                <div class="f_list1 filter_search">  <p><input id="searchLocation" type="text" placeholder="Search location"></p> </div>

                <div class="f_list1 filter_search filter_date">  <p><input id="daterange" type="text" placeholder="By Date Range"> </p>   </div>

                <div class="f_list1">
              <p><select id="typesearch">
                  <option value="all">By Course Type</option>
                  <option value="0">Line Course</option>
                  <option value="1">Score Course </option>
                  <option value="2">Scattered Course </option>
                </select>
             </p> 
           </div>


            <div class="f_list1"> 
            <p><select id="statussearch">
                <option value="all">By Course Status</option>
                <option value="0">Upcoming Course</option>
                <option value="1">Current Course </option>
                <option value="2">Expired Course </option>
              </select>
           </p>    </div>

           <div class="f_list1">  <p>
            <select id="freepaid">
                <option value="all">By Free/Paid</option>
                <option value="0">Free</option>
                <option value="1">Paid </option>
              </select>
           </p>    </div>
            <div class="f_list1">  <input type="search" name="data[keyword]" placeholder="Search By Name" class="srch_1" autocomplete="off" id="keyword">   </div>  
          <div class="f_list1">  <p>By Connections To The User</p>  </div>  
          
        </div>
        <!--filter list-->
        <?php $i = 0; ?>
        <?php foreach($allCourses as $courses){
			//pr($courses);die();
			
            $lat = $courses['Course']['latitude'];
            $lon = $courses['Course']['longitude'];
            $courseType = $courses['Course']['type2'];
			 $courseimgId = $courses['Course']['id'];
			$courseimgName = $courses['Course']['Name'];
			$courseimg = $courseimgId.'-'.$courseimgName;
          
        ?>
        <?php
                            $startTime = strtotime(str_replace('/', '-', $courses["Course"]["start_time"]));
                             $endTime = strtotime(str_replace('/', '-', $courses["Course"]["end_time"]));
                             $currentTime = time();
                             $seconds = $startTime - $currentTime;
                            if($seconds < 0){
                             $seconds =   $endTime - $currentTime;
                             $minutes = (int)($seconds / 60);
                             $hours = (int)($minutes / 60);
                             $days = (int)($hours / 24);
                             if($days > 0){
                                  $label = "Course closes in $days days";
          $class = 'current';
                             }else{
                              $label = "Course has expired";
           $class = 'expired';
                             }
                             
                           }else{ // upcoming
                            $minutes = (int)($seconds / 60);
                             $hours = (int)($minutes / 60);
                             $days = (int)($hours / 24);
                              $label = "Course available in $days days";
           $class = 'upcoming';
                           }
                           
        ?>
        <?php if($i %4 ==  0){ ?>
                 <div class="location_map">
                  <div class="row">
            <?php } ?>

            
            <div class="col-xs-12 col-sm-6 col-md-3 <?php echo $class;?>" attr-cid=<?php if($enablePosition) { echo round($courses[0]['distance']); } else {  echo $lon; } ?>  > 
           
                          <div class="map1">
                              <div class="map_lc">
						
                  <?php 
				//  echo WWW_ROOT.'img/map_image1/'.$courseimg.'.png';
				$fileName = WWW_ROOT . 'img/map_image1/'.$courseimg.'.png';
				
				  if(file_exists($fileName)){
				  echo $this->Html->image(SITEURL.'img/map_image1/'.$courseimg.'.png'); 
		}else{
		 echo $this->Html->image('https://maps.googleapis.com/maps/api/staticmap?center='. $lat.','.$lon.'&size=461x272&zoom=16&maptype=roadmap&markers=icon:'.SITEURL.'img/strt.png|color:red|'.$lat.','.$lon); }?>
                              </div>
                              <div class="cours_info yellow">
                  <h4 class="text-left"><?php
                           if($courseType == 0){
                                echo 'Line';
                           }else if($courseType == 1){
                            echo 'Score';
                           }else if($courseType == 2){
                             echo 'Scatter';
                           }
                  ?> </h4>
                  <h2><?php echo $courses['Course']['Name'];?></h2>
                    <div class="attempts">
                    <?php if($enablePosition){?>    <p class="distance"> Distance from you: <?php echo round($courses[0]['distance']);?> km</p> <?php } ?>
                              <p class="distance"><?php echo $label; ?></p>
                    </div> 
                  <?php echo $this->Html->link('SEE MORE',"/course/".$courses['Course']['id']."-".$courses['Course']['slug']."-1",array('class'=>'btn btn-default work_btn hvr-sweep-to-right')); ?>
                  
                                  <div class="btm_info">
                                     
                                      <span class="ryt_info">
                      <font>Participants</font>: <?php echo count($courses['CourseUnlocked']);?>
                                      </span>
                                  </div> 
                      <div class="lock-unlock">
                        <p class="text-left red">
                      <?php foreach($courses['CourseUnlocked'] as $unlocked){
                      if($unlocked['user_id'] == $this->Session->read('User_id')){ $unlock = true; }}
                      
                      if(isset($unlock)){ unset($unlock);?>

                            <a title="Unlocked"><i aria-hidden="true" class="fa fa-check-circle green_lock"></i></a>
                            <span class="course_download_btn">
                               <?php if($class != 'upcoming'){  ?>
                            <a href="<?php echo SITEURL.'courses/downloadImage/'.md5($courses['Course']['id'].$courses['Course']['slug']).'-'.$courses['Course']['id'];?>" title="Download Course"><i class="fa fa-download" aria-hidden="true"></i></a>
                            </span>
                            <span style="display: none;" id="pdfname"><?php echo md5($courses['Course']['id'].$courses['Course']['slug']);?></span>
							
                           
							<a data-id="<?php echo $courses['Course']['id'];?>" data-toggle="modal" data-target="#uploadModal" class="upload_btn uploadG"><i class="fa fa-upload" aria-hidden="true"></i></a>
							<?php } ?>
                            
                         
                      <?php }else{ ?>
                         <?php echo $this->Html->link('',array('controller'=>'courses','action'=>'join',$courses['Course']['id']),array('class'=>'fa fa-lock red_lock unlockCourse','id'=>'unlockCourse','type'=>$class,'attr-id'=>$courses['Course']['type1'],'rule-key'=>$courses['Page']['key']));?>

                        
                      <?php } ?>
                        </p>
                    </div>
                              </div>
                </div><!--map1-->
                </div><!--col-xs-12 col-sm-6 col-md-3 -->
                <?php   if($i %4 == 3){ ?>
                </div><!--row-->
                </div><!--location_map-->
                <?php }$i++;} ?>
                  </div>
              </div><!--courses_mn-->

              <button class="load_more" >Load More Courses</buttton>
            </section>
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

    <span class="upload_btn"><i class="fa fa-upload" aria-hidden="true"></i> <span id="uploadText">   Click to select activity to upload</span>
	<input type="file" value="Upload GPX" name="UploadGPX" id="UploadGPX" class="upload"></span> 
     
    <input type="hidden" value="<?php echo $courses['Course']['id'];?>" id="cid" name="cid">     
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
     'div'=>false,'label'=>'Viewable before expiry' , 'default'=>'yes')); ?>    
    </div>
    <div class="form-group">
       <?php echo $this->Form->input('GPX.privacy_setting', array('options' => array('Public'=>'Public','Private'=>'Private','Connections'=>'Connections','Friends'=>'Friends'),
     'div'=>false)); ?>    
    </div>
    



     <div class="form-group">
       <?php echo $this->Form->input('GPX.blog_commentary', array('type' => 'textarea','div'=>false)); ?>    
    </div>



      <div class="form-group">
      <?php echo $this->form->submit('Upload',array('id'=>'uploadG','class'=>'btn btn-default work_btn hvr-sweep-to-right')); 
      ?>
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
            <script src="<?php echo $this->webroot.'Plugins/daterangepicker/moment.min.js';?>"></script>
            <script src="<?php echo $this->webroot.'Plugins/datepicker/bootstrap-datepicker.js';?>"></script>
            <link rel="stylesheet" href="<?php echo $this->webroot.'Plugins/datepicker/datepicker3.css';?>">
            <script src="<?php echo $this->webroot.'js/front/search.js';?>"></script>
            <script src="<?php echo $this->webroot.'js/front/sweetalert.min.js';?>"></script>
           <!--  <script src="<?php echo $this->webroot.'js/front/course_detail.js';?>"></script> -->
      
        <link rel="stylesheet" href="<?php echo $this->webroot.'css/front/sweetalert.css';?>">

