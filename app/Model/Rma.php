<?php App::uses('AppModel', 'Model');
class Rma extends AppModel {
	
 var $name = 'Rma';
 /*var $hasMany = 'Blogsetting';*/
// var $hasMany = array('CourseUnlocked');
// var $hasOne = array('RmaPlan');

 					
//////////////////////////////////////////////////

 /*
   public $hasMany = array(
    'SocialProfile' => array(
        'className' => 'SocialProfile',
    )
	);*/

	public function allRmas(){
				return $this->find('all');
	}

	public function findRmabyDecline(){
			//	return $this->find('all');
				return $this->find('all', array('conditions' => array('Rma.decline !=' => '1')));
				
	}
	
	public function findRmabyId($id){
		return $this->find('first',array('conditions'=>array('Rma.id'=>$id)));
	}

	public function findRmabyPartId($id){
		return $this->find('first',array('conditions'=>array('Rma.part_id'=>$id)));
	}

	public function findallRmabyLoginId($id){
		return $this->find('all',array('conditions'=>array('Rma.login_id'=>$id)));
	}
	
	public function findByEmail($email){
		return $this->find('first',array('conditions'=>array('Rma.email'=>$email)));
	}


	public function editRmabyId($data,$id){
		$this->id = $id;
		return $this->save($data);
	}

	public function addRmaAdmin($data){
		
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

	public function findNewRmas(){
		return $this->find('all',array('limit'=>'8','order'=>'Rma.id DESC'));
	}

	public function deleteRma($id){
		$this->id = $id;
		$this->delete(array('Rma.id'=>$id));
	}

	public function RmawithCourses($Rmaid){
		return $this->find('all', array(
    	'joins' => array(
        array(
            'table' => 'course_unlockeds',
            'alias' => 'course_unlockeds',
            'type' => 'INNER',
            'conditions' => array(
                'Rma.id = course_unlockeds.Rma_id' 
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
        'Rma.id' => $Rmaid
    ),
    'fields'=>array('courses.*','course_unlockeds.*'),
));
	}
	
	public function RmaComment($id){
		return $this->query("select Rmas.* , comments.* , comments.comment from Rmas inner join comments on Rmas.id=comments.Rma_id where comments.Rma_id=$id");


		}

}
?>