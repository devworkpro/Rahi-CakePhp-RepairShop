<?php
error_reporting(0);
App::uses('AppModel', 'Model');
class Package extends AppModel {

 var $name = 'Package';
 // var $hasMany = array( 'Dealership' );
	public $validate = array(

  /*	'title' => array(
		            'required' => true,
		                'message' => 'Please fill title '
		        ),

		'price' => array(
		            'alphaNumeric' => array(
		                'rule' => 'alphaNumeric',
		                'required' => true,
		                'message' => 'numbers only'
		            ),
		        )  

    */ );
    
 public function editPackagebyId($data,$id){
		$this->id = $id;
	 	return $this->save($data);
	 }

	 public function allPackages(){
	return $this->find('all');
	}

	public function findPackagebyId($id){
		return $this->find('first',array('conditions'=>array('Package.id'=>$id)));
	}

	public function deletePackage($id){
		$this->id = $id;
		$this->delete(array('Package.id'=>$id));
	}

	
    /*   public $validate = array(


     'title' => array(
		            'required' => true,
		                'message' => 'Please fill title '
		        ),

		        'price' => array(
		            'alphaNumeric' => array(
		                'rule' => 'alphaNumeric',
		                'required' => true,
		                'message' => 'numbers only'
		            )
		        )

		        ); */

	}
?>