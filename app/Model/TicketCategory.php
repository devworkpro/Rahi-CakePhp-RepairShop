<?php App::uses('AppModel', 'Model');
class TicketCategory extends AppModel {
	var $name = 'TicketCategory';



/************************************************/
	public function addTicketCategories($data){
		//pr($data);die();
		return $this->save($data);

	}
	
	public function findTicketCategoriesByUserId($id){
		return $this->find('all',array('conditions'=>array('TicketCategory.user_id'=>$id))) ;
	}

	public function findTicketCategoryByUserId($id){
		return $this->find('list',array('conditions'=>array('TicketCategory.user_id'=>$id),'fields'=>array('TicketCategory.category')));
	}

	// public $actsAs = array(
	// 	'Tree'
	// );


}
?>