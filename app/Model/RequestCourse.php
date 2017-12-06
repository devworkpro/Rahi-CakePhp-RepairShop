<?php
App::uses('AppModel', 'Model');
class RequestCourse extends AppModel {
	
 var $name = 'RequestCourse';
 public $useTable = 'RequestCourse';
 public $belongsTo = array('User'=>array('fields'=>array('User.id','User.first_name','User.surname','User.email')));

 public $validate = array(
			   
	   /*'location' => array(
	    	'rule' => array('maxLength', 50),
        	'message' => 'Please Enter Location',
	        'required' => true
	    ),*/
	    'message' => array(
	    	'rule' => array('maxLength', 50),
        	'message' => 'Enter about',
	        'required' => true
	    ),
	    /*'email' => array(
	        'rule' => 'email',
	        'message' => 'Enter a valid Email address.',
	        'required' => true
	    )*/
    );


 	public function findAll(){
    	return $this->find('all');
    }
   
}

?>