<?php
App::uses('AppController', 'Controller');
class BlogsettingsController extends AppController{

	var $uses=array('Blogsetting','User');
    public function admin_blogsetting($data=null, $id=null){
		$prof=$this->User->find('all',array('conditions'=>array('User.role'=>'professional')));
		$this->set('allprof',$prof);
		if($this->request->is('ajax')){			
			$allData['user_id'] = $_GET['id'];
			$allData['status'] = $_GET['data'];
          if($allData['status'] == 'false'){
			$this->Blogsetting->save($allData);	
			}
            else{
		   $this->Blogsetting->enableBlog($_GET['id']);
            }			
				
		}
	}
}
