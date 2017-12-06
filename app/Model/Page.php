<?php App::uses('AppModel', 'Model');
class Page extends AppModel {
	
 var $name = 'Page';
 

 	public $validate = array(
       /* 'title' => array(
            'message' => 'Please Enter Title',
            'required' => true
        ),*/
        'key' => array(
        	'rule' => 'isUnique',
        	'message' => 'This key is already exist',
        	'required' => true,
        	'on'	=> 'create'
        	)
    );

 	public function savePage($data){
 		return $this->save($data);
 	}

 	public function allCmsPages(){
 		return $this->find('all');
 	}

 	public function getPagebyKey($key){
 		return $this->find('first',array('conditions'=>array('Page.key'=>$key)));
 	}

 	public function findPagebyId($id){
 		return $this->find('first',array('conditions'=>array('Page.id'=>$id)));
 	}

 	public function editCmsPage($id,$data){
 		$this->id = $id;
 		return $this->save($data);
 	}

 	public function deletePagebyId($id){
 		return $this->delete(array('Page.id'=>$id));
 	}

    public function custom($in){
        return $this->query($in);
    }

    public function findRulePage(){
        return $this->find('all',array('conditions'=>array('Page.is_rule'=>1)));
    }

}