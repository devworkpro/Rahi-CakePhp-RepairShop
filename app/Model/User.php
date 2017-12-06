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
		'isValid' => array(
				'rule' => 'email',
				
				'message' => 'Please Enter Valid Email Address.'
			),
		
		),

 	'phone_number' => array(
		'too_short' => array(
				'rule' => array('minLength', '10'),
				'message' => 'The Phone Number Must Have At Least 10 Digits.'
			),
		),


	'first_name' => array(
			
		'alpha' => array(
				'rule' => array('alphaNumeric'),
				'message' => 'The Username Must Be Alphanumeric.'
			),
			
	'username_min' => array(
				'rule' => array('minLength', '3'),
				'message' => 'The Username Must Have At Least 3 Characters.'
			),
		), 



 	/*

 	'first_name' => array(

        'notEmpty' => array(
            'rule' => array('notBlank'),
            //'message' => 'Veuillez choisir un projet',
            'allowEmpty' => false
        ),
      ),

       */

    'state_country' => array(
        'notEmpty' => array(
            'rule' => array('notBlank'),
            'message' => 'Please Enter State And Country Name',
            'allowEmpty' => false
        ),
    ),

	'city' => array(
        'notEmpty' => array(
            'rule' => array('notBlank'),
            'message' => 'Please Enter City Name',
            'allowEmpty' => false
        ),
    ),


	
       
 );
/*
   public $hasMany = array(
    'SocialProfile' => array(
        'className' => 'SocialProfile',
    )
	);*/

	public function allUsers(){
		return $this->find('all', array('conditions' => array('User.role !=' => 'admin')));
	}


	public function allUsersBysessionId($session_id){
		return $this->find('all', array('conditions' => array('User.role !=' => array('admin','staff'), array('User.login_id ' => $session_id))));
		/*$this->set('object', $this->Model->find('all', array('conditions' =>              array('Model.field between ? and ?', 
                          array($value1, $value2)), 
                          array('Model.field2 between ? and ?', 
                          array($value3, $value4))));*/
	}

	public function allALLStaffs(){
		return $this->find('all', array('conditions' => array('User.role' => 'staff'
			, )));
	}

	public function allStaffsBysessionId($session_id){
		return $this->find('all', array('conditions' => array('User.role' => 'staff'
			, array('User.login_id ' => $session_id))));
	}

	public function findWalkinUserIdBysessionId($session_id){
		return $this->find('first', array('conditions' => array('User.first_name' => 'Walkin', array('User.login_id ' => $session_id)),'fields'=>'User.id'));
		
	}

	public function findMenuOrderBysessionId($session_id){
		return $this->find('first', array('conditions' => array('User.id' => $session_id),'fields'=>'User.menu_order'));
		
	}

	public function CountUsersBysessionId($session_id){
		return $this->find('count', array('conditions' => array('User.id' => $session_id)));
	}

	public function CountStaffBysessionId($session_id){
		return $this->find('count', array('conditions' => array('User.login_id' => $session_id,'User.role'=> 'staff')));
	}

	
	public function findBusinessEmailByUserId($session_id){
		return $this->find('first', array('conditions' => array('User.id' => $session_id),'fields'=>'User.business_email'));
		
	}

	public function findUserPasswordById($id){
		return $this->find('first',array('conditions'=>array('User.id'=>$id),'fields'=>'User.password'));
	}

	public function findUserbyId($id){
		return $this->find('first',array('conditions'=>array('User.id'=>$id)));
	}
	
	public function findByEmail($email){
		return $this->find('first',array('conditions'=>array('User.email'=>$email)));
	}

	public function findUserByDomain($domain){
		return $this->find('first',array('conditions'=>array('User.domain_name'=>$domain)));
	}

	public function findAllUsersLatLng(){
		return $this->find('all',array('conditions'=>array('User.role !=' => 'admin'),'fields'=>'User.latitude,User.longitude,User.first_name,User.last_name,User.business_name,User.email,User.address,User.city,User.state_country,User.zip'));
	}

	public function findUserbyId_e($id){
		
	}


	public function findUserNamebyUserId($id){
		return $this->find('first',array('conditions'=>array('User.id'=>$id),'fields' => array('User.first_name','User.last_name')));
	}

	public function findUserLogobyUserId($id){
		return $this->find('first',array('conditions'=>array('User.id'=>$id),'fields' => array('User.logo')));
	}
	public function findUserCalendarEntryColorbyId($id){
		return $this->find('first',array('conditions'=>array('User.id'=>$id),'fields' => array('User.calendar_entry_color')));
	}

	public function editUserbyId($data,$id){
		$this->id = $id;
		return $this->save($data);
	}

	public function addUserAdmin($data){
		//pr($data);die();
		return $this->save($data);

	}

	public function addPhoneAdmin($data){
		//pr($data);die();
		return $this->save($data);

	}

	public function addAddressAdmin($data){
		//pr($data);die();
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



	/*user section*/


	public function findAllUsersLatLngByLoginId($id){
		return $this->find('all',array('conditions'=>array('User.role !=' => 'admin','User.login_id' => $id,'User.latitude !=' =>'','User.longitude !=' =>''),'fields'=>'User.latitude,User.longitude,User.first_name,User.last_name,User.business_name,User.email,User.address,User.city,User.state_country,User.zip'));
	
	}

}
?>