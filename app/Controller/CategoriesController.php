<?php
App::uses('AppController', 'Controller');
class CategoriesController extends AppController {

public $uses = array('Category');

public function admin_add() 
{
	$this->layout="portaluser";
	//$users = $this->User->find('list', array('conditions'=>array('User.id'=>1)));
	$cat=$this->Category->find('list',array('fields'=>array('category'),'conditions'=>array('parent_id'=>0,'user_id'=>$this->Auth->user('id')))); 
	
	//$catname=$this->Category->find('category',array('fields'=>array('category'),'conditions'=>array('id'=>0)));
		
	$this->set('title','Add Category');
	//pr($this->request->data);die();
	$this->Category->set($this->request->data);
	if($this->request->is('post')){
		//pr($this->request->data); die();
		if ($this->Category->validates()) {
		if($this->Category->save($this->request->data))
		{
			
			$this->Flash->success('category added Successfully', array('key' => 'positive'));
			 $this->redirect(array('action'=>'categorylist'));
		}
	}
	}
	  $this->set(compact('cat'));
}


public function admin_categoryedit($id){
	$this->set('title','Edit Category');

	$category= $this->Category->findCategorybyId($id); // Get User Detail from id
	

	$cat=$this->Category->find('list',array('fields'=>array('category'),'conditions'=>array('parent_id'=>0,'user_id'=>$this->Auth->user('id')))); 
	if($this->request->is('post'))
	{ 
		if ($this->Category->validates()) {		
		//pr($this->request->data); die();
		
		$this->Category->editCategorybyId($this->request->data,$id);
		$this->Flash->success('Successfully Edited category', array('key' => 'positive'));		
		return $this->redirect(array('controller'=>'categories','action'=>'categorylist'));
	}
	}
	$this->data = $category ;
	$this->set(compact('category'));
	
	$this->set(compact('cat'));

}

////////////////////////////////////////

public function admin_deletecategory($id){
	$this->Category->deleteCategory($id);
	$this->Flash->success('category Deleted Successfully', array('key' => 'positive'));	
	return $this->redirect(array('controller'=>'categories','action'=>'categorylist'));
}






// /////////////////////////////////////////////////////////

public function admin_categorylist()
{
	$this->set('title','Category List');
    

	$categories = $this->Category->findCategoriesByCategoryType($this->Auth->user('id'));

	$this->set('categories', $categories);
	//print_r('products');



}
	

///////////////////////////////////////////////////
public function admin_categoryview($id){
$this->set('title','Profile');
	$category = $this->Category->findCategorybyId($id);
	
	if($this->request->is('post'))
	{  
		$this->Flash->success('Successfully Edited', array('key' => 'positive'));
		$this->Category->editCategorybyId($this->request->data,$id);
		return $this->redirect(array('controller'=>'categories','action'=>'categoryview'));
    }
	$this->data = $category ; 
	$this->set(compact('category'));
}


/////////////////////////////////////////////////



public function admin_wpshow(){
$this->set('title','Profile');
	
}
public function admin_show(){
$this->set('title','Profile');
	
}
/////////////////////////////////////////////////


}
