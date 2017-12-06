<?php App::uses('AppModel', 'Model');
class CourseUnlocked extends AppModel {
	
 var $name = 'CourseUnlocked';
 public $belongsTo = array('User');

 	public function checkifJoined($userid,$courseid){
 		return $this->find('count',array('conditions'=>array('CourseUnlocked.user_id'=>$userid,'CourseUnlocked.course_id'=>$courseid)));
 	}

 	public function unlockCourse($courseid,$userid){
 		$data['CourseUnlocked']['user_id'] = $userid;
 		$data['CourseUnlocked']['course_id'] = $courseid;
 		return $this->save($data);
 	}

 	public function usersWhoUnlocked($cid){
 		return $this->find('all',array('conditions'=>array('CourseUnlocked.course_id'=>$cid)));
 	}

 	public function usersUnlocked($cid,$userid){
 		return $this->find('all',array('conditions'=>array('CourseUnlocked.course_id'=>$cid,'CourseUnlocked.user_id'=>$userid)));
 	}

 	public function weeks_courseUnlocked($userid){
 		$courses_count =  $this->query("SELECT count(`id`) as courses FROM `course_unlockeds` WHERE created_at >= CURDATE()-28 && user_id = $userid");
 		return $courses_count[0][0]['courses'];
 	}

 	public function year_CourseUnlocked($userid){
 		$courses_count =  $this->query("SELECT count(`id`) as courses FROM `course_unlockeds` WHERE YEAR(created_at) = YEAR(CURDATE()) && user_id = $userid");
 		return $courses_count[0][0]['courses'];
 	}

 	public function allCoursesCount($userid){
 		$courses_count =  $this->query("SELECT count(`id`) as courses FROM `course_unlockeds` WHERE user_id = $userid");
 		return $courses_count[0][0]['courses'];
 	}

}
?>