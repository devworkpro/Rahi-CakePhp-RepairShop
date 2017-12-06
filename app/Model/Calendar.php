<?php App::uses('AppModel', 'Model');
class Calendar extends AppModel {
	
 var $name = 'Calendar';
 /*var $hasMany = 'Blogsetting';*/
// var $hasMany = array('CourseUnlocked');
// var $hasOne = array('CalendarPlan');

 					
//////////////////////////////////////////////////

 /*
   public $hasMany = array(
    'SocialProfile' => array(
        'className' => 'SocialProfile',
    )
	);*/

	public function allCalendars(){
				return $this->find('all');
	}

	public function findCalendarbyDecline(){
			//	return $this->find('all');
				return $this->find('all', array('conditions' => array('Calendar.decline !=' => '1')));
				
	}
	
	public function findCalendarbyId($id){
		return $this->find('first',array('conditions'=>array('Calendar.id'=>$id)));
	}
	
	public function findByEmail($email){
		return $this->find('first',array('conditions'=>array('Calendar.email'=>$email)));
	}


	public function editCalendarbyId($data,$id){
		$this->id = $id;
		return $this->save($data);
	}

	public function addCalendarAdmin($data){
		
		return $this->save($data);
		
		//pr($data);die();
	}

	public function addPhoneAdmin($data){
		//pr($data);die();
		return $this->save($data);

	}
	public function addAddressAdmin($data){
		//pr($data);die();
		return $this->save($data);

	}

	public function findNewCalendars(){
		return $this->find('all',array('limit'=>'8','order'=>'Calendar.id DESC'));
	}

	public function deleteCalendar($id){
		$this->id = $id;
		$this->delete(array('Calendar.id'=>$id));
	}

	public function CalendarwithCourses($Calendarid){
		return $this->find('all', array(
    	'joins' => array(
        array(
            'table' => 'course_unlockeds',
            'alias' => 'course_unlockeds',
            'type' => 'INNER',
            'conditions' => array(
                'Calendar.id = course_unlockeds.Calendar_id' 
            )
        ),
         array(
            'table' => 'courses',
            'alias' => 'courses',
            'type' => 'INNER',
            'conditions' => array(
                'course_unlockeds.course_id = courses.id' 
            )
        )
    ),
    'conditions' => array(
        'Calendar.id' => $Calendarid
    ),
    'fields'=>array('courses.*','course_unlockeds.*'),
));
	}
	
	public function CalendarComment($id){
		return $this->query("select Calendars.* , comments.* , comments.comment from Calendars inner join comments on Calendars.id=comments.Calendar_id where comments.Calendar_id=$id");


		}

}
?>