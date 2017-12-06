<?php App::uses('AppModel', 'Model');
class Estimate extends AppModel {
	
 var $name = 'Estimate';
 /*var $hasMany = 'Blogsetting';*/
// var $hasMany = array('CourseUnlocked');
// var $hasOne = array('EstimatePlan');

 					
//////////////////////////////////////////////////

 /*
   public $hasMany = array(
    'SocialProfile' => array(
        'className' => 'SocialProfile',
    )
	);*/

	public function allEstimates(){
				return $this->find('all');
	}

	public function findEstimatebyDecline(){
			//	return $this->find('all');
				return $this->find('all', array('conditions' => array('Estimate.decline !=' => '1')));
				
	}

	public function findAllEstimatesByLoginID($id){
		//	return $this->find('all');
		return $this->find('all', array('conditions' => array('Estimate.login_id' => $id)));
				
	}

	public function findLastEstimateByLoginId($id){
		return $this->find('first',array('conditions'=>array('Estimate.login_id'=>$id),'order' => array('Estimate.id DESC'),'limit' => 1));
	}

	
	public function findEstimatebyId($id){
		return $this->find('first',array('conditions'=>array('Estimate.id'=>$id)));
	}
	
	public function findEstimateIdbyUserId($user_id){
		return $this->find('list',array('conditions'=>array('Estimate.user_id'=>$user_id),'fields'=>array('Estimate.id')));
	}

	public function findEstimatebyUserId($user_id){
		return $this->find('all',array('conditions'=>array('Estimate.user_id'=>$user_id)));
	}

	
	public function findByEmail($email){
		return $this->find('first',array('conditions'=>array('Estimate.email'=>$email)));
	}


	public function editEstimatebyId($data,$id){
		$this->id = $id;
		return $this->save($data);
	}

	public function addEstimateAdmin($data){
		
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

	public function findNewEstimates(){
		return $this->find('all',array('limit'=>'8','order'=>'Estimate.id DESC'));
	}

	public function deleteEstimate($id){
		$this->id = $id;
		$this->delete(array('Estimate.id'=>$id));
	}

	public function EstimatewithCourses($Estimateid){
		return $this->find('all', array(
    	'joins' => array(
        array(
            'table' => 'course_unlockeds',
            'alias' => 'course_unlockeds',
            'type' => 'INNER',
            'conditions' => array(
                'Estimate.id = course_unlockeds.Estimate_id' 
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
        'Estimate.id' => $Estimateid
    ),
    'fields'=>array('courses.*','course_unlockeds.*'),
));
	}
	
	public function EstimateComment($id){
		return $this->query("select Estimates.* , comments.* , comments.comment from Estimates inner join comments on Estimates.id=comments.Estimate_id where comments.Estimate_id=$id");


		}

}
?>