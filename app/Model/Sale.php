<?php
App::uses('AppModel', 'Model');
class Sale extends AppModel {
	
 var $name = 'Sale';
 /*var $hasMany = 'Blogsetting';*/
 //var $hasMany = array('CourseUnlocked');
// var $hasOne = array('SalePlan');

 					
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
				'required' => true,
				'message' => 'Please enter a valid email address.'
			),
			'isUnique' => array(
				'rule' => array('isUnique', 'email'),
				'message' => 'This email is already in use.'
			)
		),

 	'phone_number' => array(
			'too_short' => array(
				'rule' => array('minLength', '10'),
				'message' => 'The password must have at least 10 characters.'
			),
			),


'first_name' => array(
			
			'alpha' => array(
				'rule' => array('alphaNumeric'),
				'message' => 'The Salename must be alphanumeric.'
			),
			'unique_Salename' => array(
				'rule' => array('isUnique', 'Salename'),
				'message' => 'This Salename is already in use.'
			),
			'Salename_min' => array(
				'rule' => array('minLength', '3'),
				'message' => 'The Salename must have at least 3 characters.'
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
            //'message' => 'Veuillez choisir un projet',
            'allowEmpty' => false
        ),
    ),

  'city' => array(
        'notEmpty' => array(
            'rule' => array('notBlank'),
            //'message' => 'Veuillez choisir un projet',
            'allowEmpty' => false
        ),
    ),


	'zip' => array(
        'notEmpty' => array(
            'rule' => array('notBlank'),
            //'message' => 'Veuillez choisir un projet',
            'allowEmpty' => false
        )
    )
       
 );
/*
   public $hasMany = array(
    'SocialProfile' => array(
        'className' => 'SocialProfile',
    )
	);*/

	public function allSales(){
				//return $this->find('all');
				return $this->find('all');
	}
	
	public function findSalebyId($id){
		return $this->find('first',array('conditions'=>array('Sale.id'=>$id)));
	}
	
	// public function findSalebyUserId($id){
	// 	return $this->find('all',array('conditions'=>array('Sale.user_id'=>$id)));
	// }

	public function findSalebyInvoiceId($id){
		return $this->find('all',array('conditions'=>array('Sale.invoice_id'=>$id)));
	}


	public function findByEmail($email){
		return $this->find('first',array('conditions'=>array('Sale.email'=>$email)));
	}


	
	
	public function editSalebyId($data,$id){
		$this->id = $id;
		return $this->save($data);
	}

	public function addSaleAdmin($data){
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

	public function findNewSales(){
		return $this->find('all',array('limit'=>'8','order'=>'Sale.id DESC'));
	}

	public function deleteSale($id){
		$this->id = $id;
		$this->delete(array('Sale.id'=>$id));
	}

	public function SalewithCourses($Saleid){
		return $this->find('all', array(
    	'joins' => array(
        array(
            'table' => 'course_unlockeds',
            'alias' => 'course_unlockeds',
            'type' => 'INNER',
            'conditions' => array(
                'Sale.id = course_unlockeds.Sale_id' 
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
        'Sale.id' => $Saleid
    ),
    'fields'=>array('courses.*','course_unlockeds.*'),
));
	}
	
	public function SaleComment($id){
		return $this->query("select Sales.* , comments.* , comments.comment from Sales inner join comments on Sales.id=comments.Sale_id where comments.Sale_id=$id");


		}

}
?>