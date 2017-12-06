<?php
App::uses('AppModel', 'Model');
class RequestCourse extends AppModel {
	
 var $name = 'RequestCourse';
 public $useTable = 'RequestCourse';

 public $validate = array(
			   
	    'location' => array(
	    	'rule' => array('maxLength', 50),
        	'message' => 'Please Enter Location',
	        'required' => true
	    ),
	    'about' => array(
	    	'rule' => array('maxLength', 50),
        	'message' => 'Enter about',
	        'required' => true
	    )
    );

}

 ?>
