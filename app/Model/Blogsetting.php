<?php App::uses('AppModel', 'Model');
class Blogsetting extends AppModel {
	
 var $name = 'Blogsetting';
 
 public function enableBlog($userid){
	 $blog = $this->find('first',array('conditions'=>array('Blogsetting.user_id'=>$userid)));
	 $id = $blog['Blogsetting']['id'];
	 $this->id = $blog['Blogsetting']['id'];
	 $this->delete(array('Blogsetting.id'=>$id));
 }

}
?>