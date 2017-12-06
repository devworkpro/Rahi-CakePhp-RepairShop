<?php  App::uses('AppModel', 'Model');
class Inventory extends AppModel {
	
 var $name = 'Inventory';
 /*var $hasMany = 'Blogsetting';*/
// var $hasMany = array('CourseUnlocked');
// var $hasOne = array('InventoryPlan');

 					
//////////////////////////////////////////////////

 /*
   public $hasMany = array(
    'SocialProfile' => array(
        'className' => 'SocialProfile',
    )
	);*/

	public function allInventorys(){
				return $this->find('all');
	}
	
	public function findInventorybyId($id){
		return $this->find('first',array('conditions'=>array('Inventory.id'=>$id)));
	}

	public function findInventorybyEstimateId($id){
		return $this->find('all',array('conditions'=>array('Inventory.estimate_id'=>$id)));
	}

	public function findInventorybyScheduleId($id){
		return $this->find('all',array('conditions'=>array('Inventory.schedule_id'=>$id)));
	}
	
	public function findByEmail($email){
		return $this->find('first',array('conditions'=>array('Inventory.email'=>$email)));
	}


	public function editInventorybyId($data,$id){
		$this->id = $id;
		return $this->save($data);
	}

	public function addInventoryAdmin($data){
		
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

	public function findNewInventorys(){
		return $this->find('all',array('limit'=>'8','order'=>'Inventory.id DESC'));
	}

	public function deleteInventory($id){
		$this->id = $id;
		$this->delete(array('Inventory.id'=>$id));
	}

	
	public function InventoryComment($id){
		return $this->query("select Inventorys.* , comments.* , comments.comment from Inventorys inner join comments on Inventorys.id=comments.Inventory_id where comments.Inventory_id=$id");


		}

}
?>