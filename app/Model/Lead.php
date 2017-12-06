<?php App::uses('AppModel', 'Model');
class Lead extends AppModel {
	
 var $name = 'Lead';
 /*var $hasMany = 'Blogsetting';*/
// var $hasMany = array('CourseUnlocked');
// var $hasOne = array('LeadPlan');

 					
//////////////////////////////////////////////////

 /*
   public $hasMany = array(
    'SocialProfile' => array(
        'className' => 'SocialProfile',
    )
	);*/

	public function allLeads(){
				return $this->find('all');
	}


	public function findallLeadbyLoginId($id){
		//	return $this->find('all');
		//echo $id;die(); 
		return $this->find('all', array('conditions' => array('Lead.login_id' => $id)));
				
	}

	public function findLeadbyDecline(){
			//	return $this->find('all');
				return $this->find('all', array('conditions' => array('Lead.decline !=' => '1')));
				
	}
	
	public function findLeadbyId($id){
		return $this->find('first',array('conditions'=>array('Lead.id'=>$id)));
	}

	public function findLeadbyUserId($id){
		return $this->find('all',array('conditions'=>array('Lead.user_id'=>$id)));
	}
	
	public function findByEmail($email){
		return $this->find('first',array('conditions'=>array('Lead.email'=>$email)));
	}


	public function editLeadbyId($data,$id){
		$this->id = $id;
		return $this->save($data);
	}

	public function addLeadAdmin($data){
		
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

	public function findNewLeads(){
		return $this->find('all',array('limit'=>'8','order'=>'Lead.id DESC'));
	}

	public function deleteLead($id){
		$this->id = $id;
		$this->delete(array('Lead.id'=>$id));
	}

	public function LeadwithCourses($Leadid){
		return $this->find('all', array(
    	'joins' => array(
        array(
            'table' => 'course_unlockeds',
            'alias' => 'course_unlockeds',
            'type' => 'INNER',
            'conditions' => array(
                'Lead.id = course_unlockeds.Lead_id' 
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
        'Lead.id' => $Leadid
    ),
    'fields'=>array('courses.*','course_unlockeds.*'),
));
	}
	
	public function LeadComment($id){
		return $this->query("select Leads.* , comments.* , comments.comment from Leads inner join comments on Leads.id=comments.Lead_id where comments.Lead_id=$id");


		}

}
?>