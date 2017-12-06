<?php App::uses('AppModel', 'Model');
class Comment extends AppModel {
	
 var $name = 'Comment';
 public $belongsTo = array('User'=>array(
 						'fields'=>array(
 							'User.first_name','User.surname','User.profile_pic')
 					));

 public function findCommentsbyCourse($courseId){
 	return $this->find('all',array('conditions'=>array('Comment.course_id'=>$courseId),'order'=>array('Comment.id DESC'),'limit'=>8));
 }
 
 public function loadComment($input){
	return $this->find('all',array('conditions'=>array('Comment.course_id '=>$input['course_id'],'Comment.id <'=>$input['lid']),'limit'=>8,'order'=>'Comment.id DESC'));
	
	}

 public function addCommentAdmin($data){
		//pr($data);die();
		return $this->save($data);	
	}	

 public function findCommentbyTicketId($id){
 		//echo $id;die();
		return $this->find('all',array('conditions'=>array('Comment.ticket_id'=>$id)));
	}
 
 public function findCommentbyOrderId($id){
 		//echo $id;die();
		return $this->find('all',array('conditions'=>array('Comment.order_id'=>$id)));
	}

 public function deleteCommant($id){
		$this->id = $id;
		$this->delete(array('Comment.id'=>$id));
	}

}
?>