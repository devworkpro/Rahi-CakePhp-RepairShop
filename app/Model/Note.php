<?php App::uses('AppModel', 'Model');
class Note extends AppModel {
	
 var $name = 'Note';
 
 

 public function addNoteAdmin($data){
		//pr($data);die();
		return $this->save($data);	
	}	

 public function findNotebyContractId($id){
 		//echo $id;die();
		return $this->find('all',array('conditions'=>array('Note.contract_id'=>$id)));
	}
 
 public function deleteNote($id){
		$this->id = $id;
		$this->delete(array('Note.id'=>$id));
	}

}
?>