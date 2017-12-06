<?php

class CoursesController extends AppController{

  
	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->deny();
		$menu=$this->Page->find('all',array('conditions'=>array('Page.is_rule' => 0)));
        $this->set(compact('menu'));
	}

	
	/* Main All Courses Page */
			public function index(){
					$this->title('Courses');
					$this->layout = 'pages';
					$date = new DateTime();
					$userLongitude = $this->Auth->user('long');
					$userLatutide = $this->Auth->user('lat');
					
				if($userLongitude && $userLatutide){
					$allCourses = $this->Course->findByDistance($userLongitude,$userLatutide);
					$this->set('enablePosition',true);
				}else{
					$allCourses = $this->Course->find('all',array('limit'=>32));
					$this->set('enablePosition',false);
				}

					$this->set(compact('allCourses'));
				}


		    public function search(){		    	
				if($this->request->query){
					$event['Courses'] = ($this->request->query);
					$userLongitude = $this->Auth->user('long');
					$userLatutide = $this->Auth->user('lat');
					//pr($event);
					$this->data = $event;
					$data = $event['Courses']['keyword'];
					$allCourses = $this->Course->find('all', array(
						'conditions' => array(
											'OR' => array(
														array('Course.Name LIKE' => '%'.$data.'%'),
													)
												)
						));
					$this->set(compact('allCourses'));
					$this->title('Search Result');
					$this -> render('index');
				}
	
			}



			public function coursefront(){
				$this->layout = 'pages';
				$course = $this->params['id'];
				$date = new DateTime();
				$upcoming = $date->getTimestamp();

				switch ($course) {
					case 'scatter':
						$this->title('Scatter Courses');
						$id = 2;
						break;

					case 'line':
						$this->title('Line Courses');
						$id = 0;
						break;

					case 'score':
						$this->title('Score Courses');
						$id = 1;
						break;
					
					default:
						//$id=1;
						break;
				}
				
				$allCourses=$this->Course->find('all', array('conditions' =>
															array('Course.type2'=>$id,'AND' => array(
															array('unix_timestamp(str_to_date(Course.start_time,"%d/%m/%Y")) >' => $upcoming),
													))));
				$this->set('allCourses',$allCourses);
				$this->set('cid',$id);
			}
			

			public function searchcourse($id){
				    $this->layout = 'pages';
				    $this->title('Search Result');
					$this->set('cid',$id);

					if($this->request->query){
					$event['Courses'] = ($this->request->query);
					$this->data = $event;
					$keyword = $event['Courses']['keyword'];
					$location = $event['Courses']['location'];
					$type = $event['Courses']['type'];
					$date = new DateTime();
					switch ($type) {
						case 1: // upcoming courses
							$type = $date->getTimestamp(); 
							$allCourses = $this->Course->find('all', array(
												'conditions' => array('type2'=>$id,
														'AND' => array(
														array('Course.Name LIKE' => '%'.$keyword.'%'),
														array('Course.location LIKE' => '%'.$location.'%'),
														array('unix_timestamp(str_to_date(Course.start_time,"%d/%m/%Y")) >' => $type),
													)
												)
										));
							break;
						case 2: // Current courses
							$type = $date->getTimestamp(); 
							$allCourses = $this->Course->find('all', array(
												'conditions' => array('type2'=>$id,
														'AND' => array(
														array('Course.Name LIKE' => '%'.$keyword.'%'),
														array('Course.location LIKE' => '%'.$location.'%'),
														array('unix_timestamp(str_to_date(Course.start_time,"%d/%m/%Y")) <' => $type),
														array('unix_timestamp(str_to_date(Course.end_time,"%d/%m/%Y")) >' => $type),
													)
												)
										));
							break;

						case 3: // expired courses
							$type = $date->getTimestamp(); 
							$allCourses = $this->Course->find('all', array(
												'conditions' => array('type2'=>$id,
														'AND' => array(
														array('Course.Name LIKE' => '%'.$keyword.'%'),
														array('Course.location LIKE' => '%'.$location.'%'),
														array('unix_timestamp(str_to_date(Course.end_time,"%d/%m/%Y")) <' => $type),
													)
												)
										));
							break;
						
						default:
							$type= 0;
							break;
					}


					


					//pr($allCourses);
					
					$this->set(compact('allCourses'));
						$this -> render('coursefront');

					//die;
				}

			}

	public function ajaxSearch(){

		$courseType = $this->params->query['type'];
		$courseStatus = $this->params->query['status'];
		$courseText = $this->params->query['searchText'];
		$freePaid = $this->params->query['freepaid'];
		$inKM = $this->params->query['inKM'];
		$courseLocation = $this->params->query['location'];
		$userLongitude = $this->Auth->user('long');
		$userLatutide = $this->Auth->user('lat');
		$searchDate = $this->params->query['date'];
 		 //For Course Type
		if($courseType == 'all'){
			$typeCondition = array();
		}else{
			$typeCondition = array('Course.type2' => $courseType);
		}

		// For Course Status
		if($courseStatus == 'all'){
			$statusCondition = array();
			$statusCondition1=array();
		}else{
			$date = new DateTime();
			$updatedDate = $date->getTimestamp(); 
					switch ($courseStatus) {
						case 0: // upcoming courses
							$statusCondition=array('unix_timestamp(str_to_date(Course.start_time,"%d/%m/%Y")) >' => $updatedDate);
							$statusCondition1=array();
												
							break;
						case 1: // Current courses,
							$statusCondition=array('unix_timestamp(str_to_date(Course.start_time,"%d/%m/%Y")) <' => $updatedDate);
							$statusCondition1=array('unix_timestamp(str_to_date(Course.end_time,"%d/%m/%Y")) >' => $updatedDate);
											
							break;

						case 2: // expired courses
								$statusCondition=array('unix_timestamp(str_to_date(Course.end_time,"%d/%m/%Y")) <' => $updatedDate);
								$statusCondition1=array();
							break;
					}
		}

		// For Free or Paid

		if($freePaid == 'all'){
			$freePaidCondition = array();
		}else{
			$freePaidCondition = array('Course.type1' => $freePaid);
		}

		if($searchDate){
			$searchDate = explode('-', $searchDate);
			$startDate = $searchDate[0];
			$endDate = $searchDate[1];
			$startTime = strtotime(str_replace('/', '-', $startDate));
            $endTime = strtotime(str_replace('/', '-', $endDate));
            if(!$userLatutide && !$userLongitude && !$inKM){ // User not set location
            $dateCondition=array('ConTime HAVING Course.start_time >'.$startTime.' OR '.'Course.start_time <'.$endTime);
	        }else{
	        	$dateCondition = true;
	        }
		}else{
			$dateCondition ='';
		}

		if(!$userLatutide && !$userLongitude && !$inKM){ // User not set location

			$courses = $this->Course->find('all',array('conditions'=>array(
        											'AND' => array(
														array('Course.Name LIKE' => '%'.$courseText.'%'),
														array('Course.location LIKE' => '%'.$courseLocation.'%'),
														$typeCondition,$statusCondition,$statusCondition1,$freePaidCondition
													)

        											),
													'fields'=>array('Course.*','Page.key','unix_timestamp(str_to_date(start_time,"%d/%m/%Y")) as ConTime'),
													'group'=>$dateCondition));

		}else{  //User set location
			//pr($dateCondition); die;
			if($inKM == ''){
				$inKM = 10000; // Default Value
			}
			if($dateCondition){
				$inKMCondition = array("distance HAVING distance <= $inKM - 1 and startDatabase > $startTime or endDatabase < $endTime");
			}else{
				$inKMCondition = array("distance HAVING distance <= $inKM - 1");
			}
			
			$userLongitude = $this->Auth->user('long');
			$userLatutide = $this->Auth->user('lat');
			$courses = $this->Course->find('all',array('conditions'=>array(
        												'AND' => array(
														array('Course.Name LIKE' => '%'.$courseText.'%'),
														array('Course.location LIKE' => '%'.$courseLocation.'%'),
														$typeCondition,$statusCondition,$statusCondition1,$freePaidCondition
													)),
												'fields'=>array('3956 * 2 * ASIN(SQRT( POWER(SIN(('.$userLatutide.' -Course.latitude) * pi()/180 / 2), 2) +COS('.$userLatutide.' * pi()/180) * COS(Course.latitude * pi()/180) *POWER(SIN(('.$userLongitude.' -Course.longitude) * pi()/180 / 2), 2) )) as distance','unix_timestamp(str_to_date(start_time,"%d/%m/%Y")) as startDatabase','unix_timestamp(str_to_date(end_time,"%d/%m/%Y")) as endDatabase','Course.*','Page.key'),
												'group'=> $inKMCondition
												)
												);

		}





			//echo '<pre>';print_r($courses);
        
		$this->autoRender= false;
		$this->layout= false;
		//echo '<pre>'; print_r($dateCondition);
		echo json_encode($courses);

	}


	public function admin_create($type = null){
		
		error_reporting(0);
		$scriptgoogle = '<script src="https://maps.googleapis.com/maps/api/js?sensor=false&libraries=geometry,places&ext=.js"></script>';
		if($this->request->is('post')){
			$input = $this->request->data;	
			$parts = explode('-', $input['Course']['date_time']);
			$start_time =   $parts[0];
			$end_time 	= 	$parts[1];
			$input['Course']['start_time'] = $start_time;
			$input['Course']['end_time'] = $end_time;
			unset($input['Course']['date_time']);
			$input['Course']['slug'] = Inflector::slug($input['Course']['Name'],'_');
			$saveCourse = $this->Course->save($input);		
			if($saveCourse){				
				$this->Flash->success('Successfully Created Course', array('key' => 'positive'));
				return $this->redirect(array('controller'=>'courses','action'=>'detailPDF',$saveCourse['Course']['id']));

			}else{
				$this->Flash->error(
                	__('The Location could not be saved. Please, try again.')
            	);
			}

		}
		$this->loadModel('Page');
		$rulepages = $this->Page->findRulePage();
		$this->set('scripts',$scriptgoogle);
		$this->set(compact('rulepages'));

		switch ($type) {
			case 'scatter':
			    $this->set('title','Create Scatter Course');
				$this -> render('/Courses/admin_create');
				break;

			case 'line':
			    $this->set('title','Create Line Course');
				$this -> render('/Courses/admin_line');
				break;

			case 'score':
			    $this->set('title','Create Score Course');
				$this -> render('/Courses/admin_score');
				break;
			
			default:
				# code...
				break;
		}




	}


	public function admin_index(){
		$this->set('title', 'All Courses');
		$data = $this->Course->findAll();
		//echo '<pre>';print_r($data);die;
		$this->set(compact('data'));

	}

	public function admin_delete($courseId){
		$this->Course->delete($courseId);
		$this->Flash->success('Successfully Deleted Course', array('key' => 'positive'));	
		return $this->redirect(array('controller'=>'courses','action'=>'index'));
	}

	public function admin_edit($courseId){
		$scriptgoogle = '<script src="https://maps.googleapis.com/maps/api/js?sensor=false&libraries=geometry,places&ext=.js"></script>';

			if($this->request->data){
			$input = $this->request->data;
			$parts = explode('-', $input['Course']['date_time']);
			$start_time = $parts[0];
			$end_time = $parts[1];
			$input['Course']['start_time'] = $start_time;
			$input['Course']['end_time'] = $end_time;
			unset($input['Course']['date_time']);
			$input['Course']['slug'] = Inflector::slug($input['Course']['Name'],'_');
			$this->Course->id = $courseId;
			if($this->Course->save($input)){
				$this->Flash->success('Course Edited Successfully.', array('key' => 'positive'));
				return $this->redirect(array('controller'=>'courses','action'=>'detailPDF',$courseId));
			}
			
			//echo '<script>window.open("'.SITEURL.'admin/courses/detailPDF/'.$courseId.'")</script>';
		}

		$course = $this->Course->findCoursebyID($courseId);
		$this->data = $course;
		$rulepages = $this->Page->findRulePage();
		$this->set(compact('course','rulepages'));
		$this->set('scripts',$scriptgoogle);		
    	//$this->requestAction(array('controller'=>'courses','action'=>'detaifclPDF',$courseId));
		switch ($course['Course']['type2']) {
			case '2':
				$this->set('title','Edit Scatter Course');
				$this -> render('/Courses/admin_edit');
				break;

			case '0':
				$this->set('title','Edit Line Course');
				$this -> render('/Courses/admin_lineedit');
				break;

			case '1':
				$this->set('title','Edit Score Course');
				$this -> render('/Courses/admin_scoreedit');
				break;
			
			default:
				# code...
				break;
		}

	}

	/*
	@param int courseId 
	*/
	public function join($courseId){		
		$this->loadModel('User');
		$this->loadModel('CourseUnlocked');
		$this->loadModel('UserPlan');
		$this->loadModel('Plan');
		$userid  = $this->Auth->user('id');	
		$courseDetail = $this->Course->findCoursebyID($courseId);	
		if($this->Auth->user('role') == 'admin' || $courseDetail['Course']['type1'] == 0){ // free or admin
			$unlockCourse = $this->CourseUnlocked->unlockCourse($courseId,$userid); // Unlock Course For Admin
			if($unlockCourse){
				return $this->redirect($this->referer());
			}
		}else{

			$userInfo = $this->User->findUserbyId($userid);
			if($userInfo['UserPlan']['type'] == 1){ // Check if user has credit plan
				if($userInfo['UserPlan']['credits'] > 0){ // Check if user has credits
						$unlockCourse = $this->CourseUnlocked->unlockCourse($courseId,$userid); // unlock Course for User
						if($unlockCourse){
							$this->UserPlan->minusCredit($userid,$userInfo['UserPlan']['credits'],$userInfo['UserPlan']['id']); // Minus Credit by 1
							return $this->redirect($this->referer());
						}
				}
				else{
					return $this->redirect(array('controller'=>'plans','action'=>'subscription'));
				}
			}else if($userInfo['UserPlan']['type'] == 2){ // Check if user has Subscription Plan
				$planDuration = $this->Plan->findDuration($userInfo['UserPlan']['plan_id']);
				//echo '<pre>';print_r($planDuration);
				$userTime = strtotime($userInfo['UserPlan']['created_at']);
				$minustime= time();
				$monthDone =  date('m', $minustime) - date('m', $userTime);
				if($planDuration['Plan']['duration'] > $monthDone){
						$unlockCourse = $this->CourseUnlocked->unlockCourse($courseId,$userid);
						//$this->UserPlan->minusCredit($userid,$userInfo['UserPlan']['credits'],$userInfo['UserPlan']['id']); // Minus Credit by 1
						return $this->redirect($this->referer());

				}else{
					return $this->redirect(array('controller'=>'plans','action'=>'subscription'));
				}


				/*if($userInfo['UserPlan']['credits'] > 0 && ){

				}*/

			}

		}
		$this->autoRender = false;
		

	}

	public function requestCourse(){
		App::uses('CakeEmail', 'Network/Email');
		$this->layout = 'pages';
		$user_id = $this->Auth->user('id');
		$this->loadModel('RequestCourse');
		$user_email = $this->Auth->user('email');

		$this->title('Request Course');
		if($this->request->is('post')){
			$input = $this->request->data;
			$input['RequestCourse']['user_id'] = $user_id;
			$input['RequestCourse']['email'] = $user_email;
			if($this->RequestCourse->save($input)){
				$Email = new CakeEmail();
				$Email->from($input['RequestCourse']['email']);
				$Email->to('chhabeg.rex@gmail.com');
				$Email->subject('Request Course');
				$Email->send('My message');
				
				$this->Flash->success('Successfull', array('key' => 'positive'));
				return $this->redirect(array('controller'=>'Courses','action'=>'requestCourse'));

			}else{

				$errors = $this->RequestCourse->validationErrors;   
				//echo '<pre>';print_r($errors); die;
			}

		}
	

	}

		
	public function admin_requestCourse(){
		$this->loadModel('RequestCourse');
		$this->set('title', 'RequestCourse');
		$data = $this->RequestCourse->find('all', array('group' => 'RequestCourse.user_id'));
		//echo '<pre>';print_r($data);die;
		$this->set(compact('data'));
	
			         
	}

		
		public function admin_deleterequest($id){
			$this->loadModel('RequestCourse');
			$this->set('title','RequestCourse');
			$this->RequestCourse->delete($id);
			$this->Flash->success('Successfully Deleted ', array('key' => 'positive'));	
			return $this->redirect(array('controller'=>'courses','action'=>'requestCourse'));
		}
		
     public function admin_read($id)
     {
 
     	$this->loadModel('RequestCourse');
     	$this->set('title', 'RequestCourse');
     	$this->set('rid',$id);
		
     	if($this->request->is('post')){
		$data = $this->request->data;
		//pr($data); die;
		$data['RequestCourse']['parent_id'] = $id;
		$data['RequestCourse']['email'] = $this->Auth->user('email');
	
		$data['RequestCourse']['subject']="dsfd";
     	if($this->RequestCourse->save($data)){
     	$this->Flash->success('Successfully submitted',array('key'=>'positive'));	
		     }
     	
     	}

     	$data = $this->RequestCourse->find('all', array('conditions' => array('RequestCourse.user_id'=>$id)));
     	$this->set(compact('data'));

     }


/***Course Detail Page ****/
     public function course_detail(){
     	$scriptgoogle = '<script src="https://maps.googleapis.com/maps/api/js?sensor=false&libraries=geometry,places&ext=.js"></script>';
     	$this->loadModel('Comment');
     	$this->loadModel('CourseUnlocked');
     	$this->loadModel('Leaderboard');
     	$slug          = $this->request->params['slug'];  // @params Slug
     	$courseId      = $this->request->params['id'];    // @params courseID
     	$type          = $this->request->params['type'];  // @params courseType
     	$user_id 	   = $this->Auth->user('id');        // Logged in ID
     	$courseDetail  = $this->Course->findCoursebyIDandSlug($courseId,$slug); 	// Course Page Detail
     	$comments	   = $this->Comment->findCommentsbyCourse($courseId); 			// Comments on Course
     	$alreadyJoined = $this->CourseUnlocked->checkifJoined($user_id,$courseId);  //Check User Joined
     	$this->title($courseDetail['Course']['Name']);
     	//$unlock=$this->CourseUnlocked->unlockCourse($courseId,$user_id);  
     	//echo "<pre>";print_r($unlock) ;die();	
     	$this->set(compact('courseDetail','comments','alreadyJoined'));
     	$this->set('scripts',$scriptgoogle);
		$scriptScatter= '<script src="'.SITEURL.'js/front/upcoming.js"></script>';
     	$this->set('courseScript',$scriptScatter);
     	

     	 $startTime = strtotime(str_replace('/', '-', $courseDetail["Course"]["start_time"]));
                     $endTime = strtotime(str_replace('/', '-', $courseDetail["Course"]["end_time"]));
                     $currentTime = time();
                     $seconds = $startTime - $currentTime;
                    if($seconds < 0){
                     $seconds =   $endTime - $currentTime;
                     $minutes = (int)($seconds / 60);
                     $hours = (int)($minutes / 60);
                     $days = (int)($hours / 24);
                     if($days > 0){ // Current
                          $label = "<font>$days</font> days remaining";
                          $this->set('type','Current');
                          $this->set('leaderboard',true);
                     }else{ // Expired
                      $label = "Expired";
                      $this->set('type','Expired');
                      $this->set('leaderboard',true);
                     }
                     
                   	}else{ // upcoming
                    $minutes = (int)($seconds / 60);
                     $hours = (int)($minutes / 60);
                     $days = (int)($hours / 24);
                      $label = "Start in <font>$days</font> days";
                      $this->set('type','Upcoming');
                      $scriptUpcoming= '<script src="'.SITEURL.'js/front/upcoming.js"></script>';
                      $this->set('upcomingScript',$scriptUpcoming);

                   }


     	switch ($courseDetail['Course']['type2']) {
     		case 0: // Line course
     			$this->set('courseType','Line');
     			$this->set('courseLabel','');
     			$this->set('labelValue','');
     			$this->set('courseLabel1','');
     			$this->set('labelValue1','');
     			$leaderboard = $this->Leaderboard->leaderboardByLine($courseId); 
     			//echo "<pre>";print_r($leaderboard);die();
     			$userRank = $this->Leaderboard->rankByIDLine($this->Auth->user('id'),$courseId);
    			$userAttempts = $this->Leaderboard->userAttemptsbyLine($this->Auth->user('id'),$courseId); 
     			break;
     		case 1: // Score course
     			$this->set('courseType','Score');
     			$this->set('courseLabel','Max Score:');
     			$this->set('labelValue',$courseDetail['Course']['max_score'].' points');
     			$this->set('courseLabel1','Time Limit:');
     			$this->set('labelValue1',$courseDetail['Course']['time_limit'].' minutes');
     			$leaderboard = $this->Leaderboard->leaderboardByScore($courseId);
     			$userRank = $this->Leaderboard->rankByIDScore($this->Auth->user('id'),$courseId); 
     			$userAttempts = $this->Leaderboard->userAttemptsbyScore($this->Auth->user('id'),$courseId);  
     			break;
     		case 2: // Scatter course
     				$maxControl =0;
						$positionsArray = json_decode($courseDetail['Course']['positions']);
						for($i = 0; $i< count($positionsArray);$i++){
								if($positionsArray[$i]->type == 'c'){
									$maxControl++; // Calculate Total Controls
								}
							} 
     			$this->set('courseType','Scatter');
     			$this->set('courseLabel','Required Controls:');
     			$this->set('labelValue',$courseDetail['Course']['required_control'].' of '.$maxControl.' controls');
     			$this->set('courseLabel1','');
     			$this->set('labelValue1','');
     			$leaderboard = $this->Leaderboard->leaderboardByLine($courseId);
     			$userRank = $this->Leaderboard->rankByIDScatter($this->Auth->user('id'),$courseId);
     			$userAttempts = $this->Leaderboard->userAttemptsbyScatter($this->Auth->user('id'),$courseId);   
     			break;
     		
     		default:
     			# code...
     			break;
     	}
     	$type2 = $courseDetail['Course']['type2'];
     	switch(true)
    	{
	      case (($alreadyJoined == 1 && $type2 == 1) || ($days > 0 && $type2 == 1) ): // joined,score
	        $joinedScript = '<script src="'.SITEURL.'js/front/score_joined.js"></script>';
     		$this->set('joinedScript',$joinedScript);
	        break;
	      case ($alreadyJoined == 1 && $type2 == 2): // joined,scatter
	        $joinedScript = '<script src="'.SITEURL.'js/front/scatter_joined.js"></script>';
     		$this->set('joinedScript',$joinedScript);
	        break;
	      case ( ($alreadyJoined == 1 && $type2 == 0) || ($days >0 && $type2 == 0)): // joined,line
	        $joinedScript = '<script src="'.SITEURL.'js/front/line_joined.js"></script>';
     		$this->set('joinedScript',$joinedScript);
	        break;
    	}
 		//echo '<pre>';print_r($userRank);die;
    	$usersWhoUnlocked = $this->CourseUnlocked->usersWhoUnlocked($courseId);
    	//echo '<pre>';print_r($usersWhoUnlocked);die;
     	$this->set(compact('courseDetail','usersWhoUnlocked','leaderboard','userRank','userAttempts','userUnlocked'));
     	
     }
	
/****Generate Map Image **/
public function create_courseImage(){
	 $courseId = $this->request->data['courseID'];
	 $courseDetail = $this->Course->findCoursebyID($courseId);
	 $img_name = $courseDetail['Course']['id'].'-'.$courseDetail['Course']['Name'];
     $this->loadModel('CourseUnlocked');
     $user_id 	   = $this->Auth->user('id');        // Logged in ID 
			$unencoded = base64_decode($this->request->data['basecode']);
			$fp = fopen(WWW_ROOT.'img/map_image/'.$img_name.'.png', 'w');
    		fwrite($fp, $unencoded);
    		fclose($fp);
    		echo $courseId;
    		$this->autoRender = false;
     		$this->layout = false;

}
public function create_courseImageE(){
	 $courseId = $this->request->data['courseID'];
	 $courseDetail = $this->Course->findCoursebyID($courseId);
	 $img_name = $courseDetail['Course']['id'].'-'.$courseDetail['Course']['Name'];
     $this->loadModel('CourseUnlocked');
     $user_id 	   = $this->Auth->user('id');        // Logged in ID 
			$unencoded = base64_decode($this->request->data['basecode']);
			$fp = fopen(WWW_ROOT.'img/map_image1/'.$img_name.'.png', 'w');
    		fwrite($fp, $unencoded);
    		fclose($fp);
    		echo $courseId;
    		$this->autoRender = false;
     		$this->layout = false;

}
/****Generate PDF **/
public function create_coursePDF($cid){
	//$courseId = $this->request->data['courseID'];
     App::import('Vendor','tcpdf/xtcpdf');
     $this->loadModel('Page');
     $user_id 	   = $this->Auth->user('id');        // Logged in ID     
     $courseDetail  = $this->Course->findCoursebyID($cid); 	// Course Page Detail

     switch ($courseDetail['Course']['type2']) {
     		case 0: // Line course
     			$this->set('courseType','Line');
     			$this->set('courseLabel','');
     			$this->set('labelValue','');
     			$this->set('courseLabel1','');
     			$this->set('labelValue1','');
     			break;
     		case 1: // Score course
     			$this->set('courseType','Score');
     			$this->set('courseLabel','Max Score:');
     			$this->set('labelValue',$courseDetail['Course']['max_score'].' points');
     			$this->set('courseLabel1','Time Limit:');
     			$this->set('labelValue1',$courseDetail['Course']['time_limit'].' minutes');  
     			break;
     		case 2: // Scatter course
     				$maxControl =0;
						$positionsArray = json_decode($courseDetail['Course']['positions']);
						for($i = 0; $i< count($positionsArray);$i++){
								if($positionsArray[$i]->type == 'c'){
									$maxControl++; // Calculate Total Controls
								}
							} 
     			$this->set('courseType','Scatter');
     			$this->set('courseLabel','Required Controls:');
     			$this->set('labelValue',$courseDetail['Course']['required_control'].' of '.$maxControl.' controls');
     			$this->set('courseLabel1','');
     			$this->set('labelValue1','');   
     			break;
     	}
     $rule = $this->Page->find('first',array('conditions'=>array('Page.id'=>$courseDetail['Course']['rules_page'])));		 
		    $this->layout = false;
		    $this->set('rules',$rule['Page']['content']); 
		    $this->set(compact('courseDetail'));
		    $this->render('/Pdf/my_pdf_view');
}

public function admin_detailPDF($cid){
	$this->layout = false;
	$this->title('Downloading PDF');
	$scriptgoogle = '<script src="https://maps.googleapis.com/maps/api/js?sensor=false&libraries=geometry,places&ext=.js"></script>';
	$courseDetail = $this->Course->findCoursebyID($cid);
	$this->set('courseDetail',$courseDetail);
	$user_id 	   = $this->Auth->user('id');        // Logged in ID

	switch ($courseDetail['Course']['type2']) {
     		case 0: // Line course
				$joinedScript = '<script src="'.SITEURL.'js/front/line_joinedpdf.js"></script>';
     			break;
     		case 1: // Score course
 				$joinedScript = '<script src="'.SITEURL.'js/front/scorepdf_joined.js"></script>';
     			break;
     		case 2: // Scatter course
     			$joinedScript = '<script src="'.SITEURL.'js/front/scatterpdf_joined.js"></script>';
     			break;
     		
     		default:
     			# code...
     			break;
     	}
 
    $this->set(compact('courseDetail','joinedScript'));
    $this->set('scripts',$scriptgoogle);
	$this->render('/Pdf/course_pdf');
}

 // loadPlottedMap 
public function plotMap(){
	$this->layout = false;
	$this->autoRender = false;
	$this->loadModel('Gpx');
	$data = explode('-', $this->request->data['ids']);
	$userid  = $data[0];
	$gpxId  = $data[1];
	$gpxFile = $this->Gpx->find('first',array('conditions'=>array('Gpx.id'=>$gpxId)));
	if($gpxFile['Gpx']['privacy_setting'] == 'Private' && $this->Auth->user('id') != $userid){
		return false;
	}
	$locations = $gpxFile['Gpx']['locations'];
	echo json_encode($locations);
	//$this->set(compact('gpxFileName'));

}


public function UploadGPX(){

	App::uses('GPXIngest', 'Vendor');
	$this->layout = false;
	$this->autoRender = false;
	$this->loadModel('Leaderboard');
	$gpx = new GPXIngest();
	$this->loadModel('CourseUnlocked');
	$this->loadModel('Gpx');
	$courseId = $this->data['cid'];
	$inRange = 21;
	$bug = false;
	
	$alreadyJoined = $this->CourseUnlocked->checkifJoined($this->Auth->user('id'),$courseId);
	if($alreadyJoined){

	 $errors= array();
      $file_name = $_FILES['UploadGPX']['name'];
      $file_size =$_FILES['UploadGPX']['size'];
      $file_tmp =$_FILES['UploadGPX']['tmp_name'];
      $file_type=$_FILES['UploadGPX']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['UploadGPX']['name'])));
      $expensions= array("gpx");
      
      if(in_array($file_ext,$expensions)=== false){
         $errors[]="extension not allowed, please choose a gpx";
      }
      
      if($file_size > 2097152){
         $errors[]='File size must be excately 2 MB';
      }
      $filename = $this->Auth->user('first_name').time();
      if(empty($errors)==true){
         if(move_uploaded_file($file_tmp,WWW_ROOT.'gpx/'.$filename.'.gpx')){          	
         	// Calculate Score

				$gpx->loadFile(WWW_ROOT.'gpx/'.$filename.'.gpx');
				$gpx->ingest();
				$json = $gpx->getJSON();
				$gpx->loadJSON($json);
				$array = json_decode($json); // user_location

				$journeyStates = $gpx->getJourneyStats();
				$numberTrackPoints = $journeyStates->trackpoints - 1;
				$points = $gpx->getTrack('journey0')->segments->seg0->points;

				$courseType = $this->Course->findCourseType($courseId);
				$coursePositions = json_decode($courseType['Course']['positions']);
				$updatedPoints = array();
				$startLat = $coursePositions[0]->lat;
				$startLon = $coursePositions[0]->lon;

				$k = 0;
				$j = 0;
				foreach ($points as $poi) {
							$latPo = $poi->lat;
							$lonPo = $poi->lon;
							$distance  = (int) $this->distance($startLat,$startLon,$latPo,$lonPo,"m");
							if($distance < $inRange && $k == 0){	// Check In range		
									     	 $j++;
									     	 $realStart = $poi;									       	 
									       	 continue;
							}else if($j != 0){
								$k = $j;
								$updatedPoints[] = $poi;									  
							}

				}
				array_unshift($updatedPoints,$realStart);
				if(empty($updatedPoints)) // No start found
					{
						$this->Flash->invalid('Your GPS trace did not pass through the start - Your GPS has not been submitted and no attempt has been recorded', array('key' => 'invalid'));
						return $this->redirect($this->referer());
                      
					}
						
				$start = 0;							         		
				$checkFinish = false;
					foreach ($coursePositions as $finish) {  // Check if start or start/finish
						
						  if($finish->type == 'f'){
						    $checkFinish = true;
						    $finishData[] = $finish;

						  }elseif($finish->type == 's'){
						    $checkFinish = false;

						  }

					  }
								
				$updatedPointsReverse = array_reverse($updatedPoints); // reverse to get latest finish point
				$finalPoints = array();	
				$k = 0;
				$j = 0;		
				if($checkFinish == true){ // has seperate finish in course
					$finishLat = $finishData[0]->lat;
					$finishLon = $finishData[0]->lon;
					foreach ($updatedPointsReverse as $poi) {
									$latPo = $poi->lat;
									$lonPo = $poi->lon;
									$distance  = (int) $this->distance($finishLat,$finishLon,$latPo,$lonPo,"m");
									if($distance < $inRange && $k == 0){	// Check In range		
											     	 $j++;
											     	 $realFinish = $poi;							       	 
											       	 continue;
									}else if($j != 0){
										$k = $j;
										$finalPoints[] = $poi;									  
									}
						}

				}

				if($checkFinish == false){ // check if start is finish
					
					foreach ($updatedPointsReverse as $poi) {
							$latPo = $poi->lat;
							$lonPo = $poi->lon;
							$distance  = (int) $this->distance($startLat,$startLon,$latPo,$lonPo,"m");
							if($distance < $inRange && $k == 0){	// Check In range		
											     	 $j++;
											     	 $realFinish = $poi;							       	 
											       	 continue;
							}else if($j != 0){
										$k = $j;
										$finalPoints[] = $poi;									  
							}
					}

				}

				array_unshift($finalPoints,$realFinish);
				if(empty($finalPoints)){
					$this->Flash->invalid('Your GPS trace did not pass through the finish - Your GPS has not been submitted and no attempt has been recorded', array('key' => 'invalid'));
					return $this->redirect($this->referer());
				}

				

				$finalPoints = array_reverse($finalPoints);

				$last_key = end($finalPoints);
 				$number_track = count($finalPoints)-1;			
				$totalDistance =0;
				for($i =0;$i<$number_track;$i++){ // Calculate Total Distance
						  $endi = $i+1;
						  $startlat = $finalPoints[$i]->lat;
						  $startlon = $finalPoints[$i]->lon;
					 	  $endlat =   $finalPoints[$endi]->lat;
						  $endlon =   $finalPoints[$endi]->lon;
						  $distancesingle = $this->distance($startlat,$startlon,$endlat,$endlon,"k");
						  $totalDistance = $totalDistance+$distancesingle;			

				}

				$startTime = $finalPoints[$start]->time;
				$endTime   = $last_key->time;
				$totalTime = $endTime - $startTime;
				$totalTime = gmdate("i:s", $totalTime);
				$checkTime = (float)str_replace(":",".",$totalTime);
					if($checkTime == 0){
						$this->Flash->invalid('Your GPS trace did not pass through the finish - Your GPS has not been submitted and no attempt has been recorded', array('key' => 'invalid'));
						return $this->redirect($this->referer());
					}
				
				
				switch ($courseType['Course']['type2']) {
					case '2': //scatter	
									$control = 0; 
									foreach ($coursePositions as $positions) {
									$lat = $positions->lat;
									$lon = $positions->lon;
									$controlID = $positions->controlid;
									  foreach ($finalPoints as $poi) {
									    $latPo = $poi->lat;
									    $lonPo = $poi->lon;
									    $distance  =(int) $this->distance($lat,$lon,$latPo,$lonPo,"m");
									  
									    if($distance < $inRange && $controlID != 110 && $controlID != 111){
									    	  echo $distance.'<br>';
									       $control++;
									      break;
									    }
									  }
									}
									//die;
								 
								$requiredControls = (int) $courseType['Course']['required_control'];
								if($requiredControls > $control){
									$this->Flash->invalid('You did not collect required number of controls as such your attempt will be recorded as a DNF', array('key' => 'invalid'));
									$bug = true;
								}			 
								$data['score'] = 0;
						break;

					case '1': //score
				
									$score = 0;
									$control = 0;
									foreach ($coursePositions as $positions) {
									$lat = $positions->lat;
									$lon = $positions->lon;
									$controlID = $positions->controlid;
									  foreach ($finalPoints as $poi) {
										
									    $latPo = $poi->lat;
									    $lonPo = $poi->lon;
									    $distance  = $this->distance($lat,$lon,$latPo,$lonPo,"m");
									    if($distance < $inRange && $controlID != 110 && $controlID != 111){ // Check In range									     
										  $control++;
									      $score = $score + $positions->score;
									       break;
									    }
										
									  }

									}
								 	
									$penality = 0;

									if(ceil((float)str_replace(":",".",$totalTime)) > (int)$courseType['Course']['time_limit']){ // Penality on time
										$checkTotalTime = ceil((float)str_replace(":",".",$totalTime));
										$courseType['Course']['time_limit'];
										$negativeMinutes = $checkTotalTime - $courseType['Course']['time_limit'];
										$penality = $negativeMinutes * 10; 
										
									}
								
									
									if($penality){
										  $data['score'] = $score - $penality;
										  $bug = true;
										  if($negativeMinutes >= 10){									  	
										  	$this->Flash->invalid('You finished past the maximum overtime allowance and as such your attempt will be recorded as a DNF', array('key' => 'invalid'));
										  }else{
										  	$this->Flash->invalid('You have lost '.$penality.' points for finishing after the alotted time', array('key' => 'invalid'));
										  }
										  										  										
									}else{
									 $data['score'] = $score;									
									}
									if($data['score'] < 0){
										$data['score'] = 0;
									}
							 break;

					case '0': //line
								
									$sequence = 0;
									$control = 0;
									$totalControls = 0;
									$foundPoints = array();
									foreach ($coursePositions as $positions) {
									$lat = $positions->lat;
									$lon = $positions->lon;
									$controlID = $positions->controlid;			    
									    if($controlID != 0 && $controlID != 110 && $controlID != 111){ //
									        $foundPoints[] = $positions;
									        $totalControls = $totalControls + 1;								        
									    }
									  
									}

									 foreach ($finalPoints as $poi) {
										
										if($totalControls == $control){
									    	break;
									    }
									    $latPo = $poi->lat;
									    $lonPo = $poi->lon;
									    $seqLat = $foundPoints[$sequence]->lat;
									    $seqLon = $foundPoints[$sequence]->lon;
									    $distance  = $this->distance($seqLat,$seqLon,$latPo,$lonPo,"m");			    
									    if($distance < $inRange){ // Check In range
										         $sequence++;
										         $control++;
												  continue;									        								        
									    }
									  }

									
									if($control != $totalControls){
										$bug = true;
										$this->Flash->invalid('You have not completed the line course in the correct order and as such your attempt will be recorded as a DNF', array('key' => 'invalid'));

									}
									    $data['score'] = 0;
									
									

									
						break;
					
					default:
						# code...
						
						break;
				}
									$data['user_id'] = $this->Auth->user('id');
									$data['course_id'] = $courseType['Course']['id'];
									$data['time'] = $totalTime;
									$data['controls'] = $control;
									$data['distance'] = $totalDistance;										
									$data['run_date'] = $startTime;	
							//pr($data);die;
									
									$checkPrevious = $this->Leaderboard->checkPrevious($data['run_date'],$this->Auth->user('id'),$courseId);
									if($checkPrevious == 0){
									$this->request->data['locations'] = json_encode($finalPoints);							
										$gpxData = $this->Gpx->saveGpx($courseId,$filename,$this->Auth->user('id'),$this->request->data);									
										$data['gpx_id'] = $gpxData['Gpx']['id'];
									
									$this->Leaderboard->saveData($data);
										
									}else{
										$this->Flash->invalid('Duplicate upload - your GPS has not been submitted and no attempt has been record', array('key' => 'invalid'));
										return $this->redirect($this->referer());

									}
			if($bug == false){
				$this->Flash->invalid('Upload Successful', array('key' => 'invalid'));
			}	           
			return $this->redirect($this->referer());
         }
      }else{
         print_r($errors);
      }

}else{
	echo 'Not Joined';
}




}

public function leaderboardSearch(){
	$this->loadModel('Leaderboard');
	$this->autoRender = false;
	$this->layout = false;
	$gender      	= $this->params->query['gender'];
	$age       		= $this->params->query['age'];
	/*$activityWith 	= $this->params->query['ActivityWith'];
	$activityType 	= $this->params->query['ActivityType'];*/
	$courseId     = $this->params->query['cid'];
	$type = $this->Course->findCoursebyID($courseId);
	$type = $type['Course']['type2'];
	$data = $this->Leaderboard->searchFilter($gender,$age,$courseId,$type);
	echo json_encode($data);

}

public function downloadPDF($cid){
	$this->loadModel('CourseUnlocked');
	$course = explode('-',$cid);
	$courseId = $course[1];
	$filename = $course[0];
    $alreadyJoined = $this->CourseUnlocked->checkifJoined($this->Auth->user('id'),$courseId); // check if joined
    $courseDetail = $this->Course->findCoursebyID($courseId);

if($alreadyJoined){
     $this->viewClass = 'Media';
     
      $filename = $courseDetail['Course']['id'].'-'.$courseDetail['Course']['Name'];
      $params = array(
            'id'        => $filename.'.pdf',
            'name'      => $filename,
            'download'  => true,
            'extension' => 'pdf',
            'path'      => WWW_ROOT.'pdf_subrub_courses/'
        );
        
     $data  = $this->set($params);

 }
}


public function downloadImage($cid){
	$this->loadModel('CourseUnlocked');
	$course = explode('-',$cid);
	$courseId = $course[1];
	$filename = $course[0];
    $alreadyJoined = $this->CourseUnlocked->checkifJoined($this->Auth->user('id'),$courseId); // check if joined
    $courseDetail = $this->Course->findCoursebyID($courseId);

if($alreadyJoined){
     $this->viewClass = 'Media';
     
      $filename = $courseDetail['Course']['id'].'-'.$courseDetail['Course']['Name'];
      $params = array(
            'id'        => $filename.'.png',
            'name'      => $filename,
            'download'  => true,
            'extension' => 'png',
            'path'      => WWW_ROOT.'img/map_image/'
        );
        
     $data  = $this->set($params);

 }
}


public function distance($lat1, $lon1, $lat2, $lon2, $unit){

  $theta = $lon1 - $lon2;
   $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
  $dist = acos($dist);
   $dist = rad2deg($dist);
  $miles = $dist * 60 * 1.1515;
  $unit = strtoupper($unit);

  if ($unit == "K") {
    return ($miles * 1.609344);
  } else if ($unit == "M") {
      return ($miles * 1.609344 * 1000);
   } else {
        return $miles;
      };
  

}

    
}