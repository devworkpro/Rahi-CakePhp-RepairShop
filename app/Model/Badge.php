<?php App::uses('AppModel', 'Model');
class Badge extends AppModel {
	
 var $name = 'Badge';

 	public $validate = array(
      
        'name' => array(
        	'rule' =>  array('minLength', '4'),
        	'message' => 'required field',
        	'required' => true,
        	'on' => 'create'
        	
        	)
    );

 	public function savebadge($data){
 		return $this->save($data);
 	}

 	 public function deleteBadges($id){
	 	$query = "DELETE From badges WHERE id = $id";
    	return $this->query($query);
	 }


 	public function findById($id){
	 	return $this->find('first',array('conditions'=>array('Badge.id'=>$id)));
	 }

}
?>