<?php App::uses('AppModel', 'Model');
class ProductCategory extends AppModel {
	var $name = 'ProductCategory';



/************************************************/
	public function addProductCategories($data){
		//pr($data);die();
		return $this->save($data);

	}
	
	public function findProductCategoriesByUserId($id){
		return $this->find('all',array('conditions'=>array('ProductCategory.user_id'=>$id))) ;
	}

	public function findProductCategoryByUserId($id){
		return $this->find('list',array('conditions'=>array('ProductCategory.user_id'=>$id),'fields'=>array('ProductCategory.category')));
	}

	// public $actsAs = array(
	// 	'Tree'
	// );


}
?>