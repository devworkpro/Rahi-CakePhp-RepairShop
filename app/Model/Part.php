<?php App::uses('AppModel', 'Model');
class Part extends AppModel {
	
 var $name = 'Part';
 /*var $hasMany = 'Blogsetting';*/
// var $hasMany = array('CourseUnlocked');
// var $hasOne = array('PartPlan');

 					
//////////////////////////////////////////////////

 /*
   public $hasMany = array(
    'SocialProfile' => array(
        'className' => 'SocialProfile',
    )
	);*/

	public function allParts(){
				return $this->find('all');
	}

	public function findPartbyDecline(){
			//	return $this->find('all');
				return $this->find('all', array('conditions' => array('Part.decline !=' => '1')));
				
	}
	
	public function findPartbyId($id){
		return $this->find('first',array('conditions'=>array('Part.id'=>$id)));
	}

	public function findPartbyLoginId($id){
		return $this->find('all',array('conditions'=>array('Part.login_id'=>$id)));
	}
	
	public function findByEmail($email){
		return $this->find('first',array('conditions'=>array('Part.email'=>$email)));
	}


	public function editPartbyId($data,$id){
		$this->id = $id;
		return $this->save($data);
	}

	public function addPartAdmin($data){
		
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

	public function findNewParts(){
		return $this->find('all',array('limit'=>'8','order'=>'Part.id DESC'));
	}

	public function deletePart($id){
		$this->id = $id;
		$this->delete(array('Part.id'=>$id));
	}

	public function PartwithCourses($Partid){
		return $this->find('all', array(
    	'joins' => array(
        array(
            'table' => 'course_unlockeds',
            'alias' => 'course_unlockeds',
            'type' => 'INNER',
            'conditions' => array(
                'Part.id = course_unlockeds.Part_id' 
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
        'Part.id' => $Partid
    ),
    'fields'=>array('courses.*','course_unlockeds.*'),
));
	}
	
	public function PartComment($id){
		return $this->query("select Parts.* , comments.* , comments.comment from Parts inner join comments on Parts.id=comments.Part_id where comments.Part_id=$id");


		}

}
?>