<?php App::uses('AppModel', 'Model');
class Multilocation extends AppModel {
	var $name = 'Multilocation';

/************************************************/
	public function addNewMultilocation($data){
		return $this->save($data);
	}

	public function editMultilocationbyId($data,$id){
        $this->id = $id;
        return $this->save($data);
    }

	public function findMultilocationByUserId($id){
		return $this->find('all',array('conditions'=>array('Multilocation.user_id'=>$id)));
	}

	public function findMultilocationByUserIdAndName($user_id,$name){
		return $this->find('first',array('conditions'=>array('Multilocation.user_id'=>$user_id,'Multilocation.name'=>$name)));
	}

	public function findMultilocationNameByUserId($id){
		return $this->find('list',array('conditions'=>array('Multilocation.user_id'=>$id),'fields'=>array('name')));
	}

	public function findMultilocationById($id){
		return $this->find('first',array('conditions'=>array('Multilocation.id'=>$id)));
	}

	public function deleteMultiLocation($id){
		$this->id = $id;
		$this->delete(array('Multilocation.id'=>$id));
	}

}
?>