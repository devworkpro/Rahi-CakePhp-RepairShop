<?php App::uses('Appmodel', 'model');
class Blog extends Appmodel{

	public function findBlogById($userid){
		return $this->find('all',array('conditions'=>array('Blog.user_id'=>$userid)));
	}

}
?>
