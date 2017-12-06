<?php App::uses('AppModel', 'Model');
class Payment extends AppModel {
	
 var $name = 'Payment'; 
 // var $hasMany = array( 'Dealership' );


   public $validate = array(


'Payment_name' => array(
			
			'alpha' => array(
				'rule' => array('alphaNumeric'),
				'message' => 'The username must be alphanumeric.'
			),
			'unique_username' => array(
				'rule' => array('isUnique', 'username'),
				'message' => 'This username is already in use.'
			),
			'username_min' => array(
				'rule' => array('minLength', '3'),
				'message' => 'The username must have at least 3 characters.'
			),
		), 


  'physical_location' => array(
        'notEmpty' => array(
            'rule' => array('notBlank'),
            //'message' => 'Veuillez choisir un projet',
            'allowEmpty' => false
        ),
    ),


	'upc_code' => array(
        'notEmpty' => array(
            'rule' => array('notBlank'),
            //'message' => 'Veuillez choisir un projet',
            'allowEmpty' => false
        )
    )
       
 );
 
   public function addPaymentAdmin($data){
		//pr($data);die();
		return $this->save($data);

	}

	
    public function editPaymentbyId($data,$id){
		$this->id = $id;
	 	return $this->save($data);
	}

	public function allPayments(){
		return $this->find('all');
	}

	public function findPaymentbyId($id){
		return $this->find('first',array('conditions'=>array('Payment.id'=>$id)));
	}
	

	public function allUsersPayments(){
		return $this->find('all',array('conditions' => array('Payment.invoice_id' => 0 ),'order'=>array('Payment.id'=>'desc')));

		
	}

	public function findPaymentbyUserId($user_id){
		return $this->find('all',array('conditions'=>array('Payment.user_id'=>$user_id)));
	}


	public function deletePayment($id){
		$this->id = $id;
		$this->delete(array('Payment.id'=>$id));
	}
     


}
?>