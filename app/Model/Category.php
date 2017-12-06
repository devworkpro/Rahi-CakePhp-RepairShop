<?php App::uses('AppModel', 'Model');
class Category extends AppModel {
	var $name = 'Category';



/************************************************/

	 public function editCategorybyId($data,$id){
		$this->id = $id;
	 	return $this->save($data);
	 }

	 public function allCategories(){
	return $this->find('all');
	}

	public function findCategoriesByUserId(){
		return $this->find('all',array('conditions'=>array('Category.user_id'=>$id))) ;
	}

	public function findCategoriesByCategoryType($id){
		return $this->find('all',array('conditions'=>array(array('Category.category_type !='=>''),array('Category.user_id'=>$id))));
	
	}

	public function findCategorybyId($id){
		return $this->find('first',array('conditions'=>array('Category.id'=>$id)));
	}

	public function deleteCategory($id){
		$this->id = $id;
		return $this->delete(array('Category.id'=>$id));
	}
	// public $actsAs = array(
	// 	'Tree'
	// );
}
?>