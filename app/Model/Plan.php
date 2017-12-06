<?php
class Plan extends AppModel {
	var $name = 'Plan';

	public $validate = array(
	    'title' => array(
			    'rule' => array('minLength', 5),
			    'message'=>'Please Enter atleast 5 characters'
		),
		'description' => array(
			    'rule' => array('minLength', 1),
			    'message'=>'Please Enter Description'
		),
		'price' => array(
			    'rule' => 'numeric',
			    'message'=>'Please Enter Numeric Value',
			    'allowEmpty' => false,
			    'required'=>true
		),
		'courses' => array(
			    'rule' => 'numeric',
			    'message'=>'Please Enter Numeric Value',
		)
	);

	public function editPlanbyId($data,$id){
		$this->id = $id;
		return $this->save($data);
	}
	
	public function findPlanbyId($id){
		return $this->find('first',array('conditions'=>array('Plan.id'=>$id)));
	}

	public function subsPlans(){		
		return $this->find('all',array('conditions'=>array('Plan.plan_type'=>2)));
	}

	public function creditPlans(){
		return $this->find('all',array('conditions'=>array('Plan.plan_type'=>1)));
	}

	public function findDuration($planId){
 		return $this->find('first',array('conditions'=>array('Plan.id' => $planId)));
 	}



}
?>


