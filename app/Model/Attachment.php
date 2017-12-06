<?php App::uses('AppModel', 'Model'); 
class Attachment extends AppModel {
	
 var $name = 'Attachment';
 /*var $hasMany = 'Blogsetting';*/
// var $hasMany = array('CourseUnlocked');
// var $hasOne = array('AttachmentPlan');

 					
//////////////////////////////////////////////////

 /*
   public $hasMany = array(
    'SocialProfile' => array(
        'className' => 'SocialProfile',
    )
	);*/

	public function allAttachments(){
				return $this->find('all');
	}

	public function findAttachmentbyDecline(){
			//	return $this->find('all');
				return $this->find('all', array('conditions' => array('Attachment.decline !=' => '1')));
				
	}
	
	public function findAttachmentbyId($id){
		return $this->find('first',array('conditions'=>array('Attachment.id'=>$id)));
	}

	public function findAttachmentbyTicketId($id){
		return $this->find('all',array('conditions'=>array('Attachment.ticket_id'=>$id)));
	}

	public function findAttachmentbyLeadId($id){
		return $this->find('all',array('conditions'=>array('Attachment.lead_id'=>$id)));
	}

	public function findAttachmentbyContractId($id){
		return $this->find('all',array('conditions'=>array('Attachment.contract_id'=>$id)));
	}

	public function findAttachmentbyUserId($id){
		return $this->find('all',array('conditions'=>array('Attachment.user_id'=>$id)));
	}

	
	
	public function findByEmail($email){
		return $this->find('first',array('conditions'=>array('Attachment.email'=>$email)));
	}


	public function editAttachmentbyId($data,$id){
		$this->id = $id;
		return $this->save($data);
	}

	public function addAttachmentAdmin($data){
		
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

	public function findNewAttachments(){
		return $this->find('all',array('limit'=>'8','order'=>'Attachment.id DESC'));
	}

	public function deleteAttachment($id){
		$this->id = $id;
		//echo $id;die();
		$this->delete(array('Attachment.id'=>$id));
	}

	
	public function AttachmentComment($id){
		return $this->query("select Attachments.* , comments.* , comments.comment from Attachments inner join comments on Attachments.id=comments.Attachment_id where comments.Attachment_id=$id");


		}

}

?>