<?php
App::uses('AppModel', 'Model');
class UserPlan extends AppModel {
	
 var $name = 'UserPlan';

 	public function giveUserCredit($userid){ // On Sign up give 3 credits
 		$data['UserPlan']['user_id'] = $userid;
 		$data['UserPlan']['credits'] = '3';
 		$data['UserPlan']['type'] = '1';
 		$data['UserPlan']['plan_id'] = '0';
 		return $this->save($data);
 	}


 	public function minusCredit($userid,$credits,$userPlanId){
 		$data['UserPlan']['credits'] = $credits - 1;
 		$this->id = $userPlanId;
 		return $this->save($data);
 	}

 	

}
?>