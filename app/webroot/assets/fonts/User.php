<?php
App::uses('AppModel', 'Model');
class User extends AppModel {
	
 var $name = 'User';
 /*var $hasMany = 'Blogsetting';*/
 var $hasMany = array('CourseUnlocked');
 var $hasOne = array('UserPlan');

 					
//////////////////////////////////////////////////

	public function beforeSave($options = array()) {
		if(isset($this->data[$this->name]['password'])) {
			$this->data[$this->name]['password'] = AuthComponent::password($this->data[$this->name]['password']);
		}
		return true;
	}

	public $validate = array(
		
	    'email' => array(
	        'rule' => 'isUnique',
	        'message' => 'Enter a valid Email address.',
	        'required' => true,
	        'on' => 'create'
	    ),
        'password' => array(
            'rule' => array('minLength', '8'),
            'message' => 'Minimum 8 characters long',
            'required' => true,
            'on' => 'create'
        )

 );

  /* public $hasMany = array(
    'SocialProfile' => array(
        'className' => 'SocialProfile',
    )
	);*/

	public function allUsers(){
				return $this->find('all', array('conditions' => array('User.role !=' => 'admin')));
	}
	
	public function findUserbyId($id){
		return $this->find('first',array('conditions'=>array('User.id'=>$id)));
	}
	
	public function findByEmail($email){
		return $this->find('first',array('conditions'=>array('User.email'=>$email)));
	}


	public function findUserbyId_e($id){
		return $this->find('first',array('conditions'=>array('User.id'=>$id), 'fields' => array('email', 'first_name', 'surname') ));
	}
	
	public function editUserbyId($data,$id){
		$this->id = $id;
		return $this->save($data);
	}

	public function addUserAdmin($data){
		return $this->save($data);

	}

	public function findNewUsers(){
		return $this->find('all',array('limit'=>'8','order'=>'User.id DESC'));
	}

	public function deleteUser($id){
		$this->id = $id;
		$this->delete(array('User.id'=>$id));
	}

	public function UserwithCourses($userid){
		return $this->find('all', array(
    	'joins' => array(
        array(
            'table' => 'course_unlockeds',
            'alias' => 'course_unlockeds',
            'type' => 'INNER',
            'conditions' => array(
                'User.id = course_unlockeds.user_id' 
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
        'User.id' => $userid
    ),
    'fields'=>array('courses.*','course_unlockeds.*'),
));
	}
	
	public function userComment($id){
		return $this->query("select users.* , comments.* , comments.comment from users inner join comments on users.id=comments.user_id where comments.user_id=$id");


		}

}
