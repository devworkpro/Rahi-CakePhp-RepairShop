<?php App::uses('AppModel', 'Model'); 
class Email extends AppModel {
	
 var $name = 'Email';
 /*var $hasMany = 'Blogsetting';*/
// var $hasMany = array('CourseUnlocked');
// var $hasOne = array('EmailPlan');

 					
//////////////////////////////////////////////////

 /*
   public $hasMany = array(
    'SocialProfile' => array(
        'className' => 'SocialProfile',
    )
	);*/

	public function allEmails(){
				return $this->find('all');
	}

	public function findEmailbyDecline(){
			//	return $this->find('all');
				return $this->find('all', array('conditions' => array('Email.decline !=' => '1')));
				
	}
	
	public function findEmailbyId($id){
		return $this->find('first',array('conditions'=>array('Email.id'=>$id)));
	}

	public function findEmailbyTicketId($id){
		return $this->find('first',array('conditions'=>array('Email.ticket_id'=>$id)));
	}

	public function findEmailbyLeadId($id){
		return $this->find('all',array('conditions'=>array('Email.lead_id'=>$id),'order'=>'Email.id DESC'));
		
	}
	
	public function findEmailbyContractId($id){
		return $this->find('all',array('conditions'=>array('Email.contract_id'=>$id),'order'=>'Email.id DESC'));
		
	}

	public function findEmailbyUserId($id){
		return $this->find('all',array('conditions'=>array('Email.user_id'=>$id),'order'=>'Email.id DESC'));
		
	}


	public function findByEmail($email){
		return $this->find('first',array('conditions'=>array('Email.email'=>$email)));
	}


	public function editEmailbyId($data,$id){
		$this->id = $id;
		return $this->save($data);
	}

	public function addEmailAdmin($data){
		
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

	public function findNewEmails(){
		return $this->find('all',array('limit'=>'8','order'=>'Email.id DESC'));
	}

	public function deleteEmail($id){
		$this->id = $id;
		//echo $id;die();
		$this->delete(array('Email.id'=>$id));
	}

	
	public function EmailComment($id){
		return $this->query("select Emails.* , comments.* , comments.comment from Emails inner join comments on Emails.id=comments.Email_id where comments.Email_id=$id");


		}

}

?>