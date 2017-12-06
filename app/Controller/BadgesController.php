<?php
App::uses('AppController', 'Controller');

class BadgesController extends AppController {


	public function admin_add(){
		$this->set('title','Add Badges');
		$this->loadModel('Badge');
		
		if($this->request->is('post')){
		$this->Badge->set($this->request->data);
		
		if($this->Badge->validates())
		{
			//echo "<pre>";print_r($this->request->data); die();
			$this->Img = $this->Components->load('Img');
			if($this->data['Badge']['image']['name']){
				        $ext = $this->Img->ext($this->request->data['User']['profile_pic']['name']); 
		    				$newName = strtotime(date("Y-m-d h:i:s"));
							$origFile = $newName . '.' . $ext;
							$dst = $newName . '.jpg';
							$targetdir = WWW_ROOT .'img/badge_images/';
							$upload = $this->Img->upload($this->request->data['Badge']['image']['tmp_name'], $targetdir, $origFile);
							if($upload == 'Success') 
							{
								$this->Img->resampleGD($targetdir . DS . $origFile, WWW_ROOT . 'img/badge_images/', $dst, 160, 160, 1, 0);
								
								$this->request->data['Badge']['image'] = $dst;
							}

			}
			$this->Badge->savebadge($this->request->data);
			$this->Flash->success('successfully added', array('key' => 'positive'));	
			return $this->redirect(array('controller'=>'Badges','action'=>'list'));
		}else{
			$this->Badge->validationErrors;     
			}
	}

	}



	public function admin_list(){
		$this->set('title','All badges');
		$allBadges = $this->Badge->find('all');
		$this->set(compact('allBadges',$allBadges));
	
	}

	public function admin_delete($id){
		$this->loadModel('Badge');
		$this->Badge->deleteBadges($id);
		$this->Flash->success('Successfully Deleted', array('key' => 'positive'));	
		return $this->redirect(array('controller'=>'Badges','action'=>'list'));
	


	}

	public function admin_edit($id){

		$this->set('title','Edit badges');
		$this->loadModel('Badge');
		$badge = $this->Badge->findById($id);
		//echo "<pre>";print_r($badge);die;
		$this->set('image',$badge['Badge']['image']);
		if($this->request->is('post')){
			$this->Badge->id = $id;
		if($this->Badge->validates($this->request->data))
		{
			//echo "<pre>";print_r($this->request->data); die();
			$this->Img = $this->Components->load('Img');
			if($this->data['Badge']['image']['name']){
				       // $ext = $this->Img->ext($this->request->data['User']['profile_pic']['name']); 
		    				$newName = strtotime(date("Y-m-d h:i:s"));
							$origFile = $newName . '.' . $ext;
							$dst = $newName . '.jpg';
							$targetdir = WWW_ROOT .'img/badge_images/';
							$upload = $this->Img->upload($this->request->data['Badge']['image']['tmp_name'], $targetdir, $origFile);
							if($upload == 'Success') 
							{
								$this->Img->resampleGD($targetdir . DS . $origFile, WWW_ROOT . 'img/badge_images/', $dst, 160, 160, 1, 0);
								
								$this->request->data['Badge']['image'] = $dst;

							}

			}else{

				$this->request->data['Badge']['image'] = $badge['Badge']['image'];

			}
			$this->Flash->success('successfully Edited', array('key' => 'positive'));
			$this->Badge->savebadge($this->request->data);	

			return $this->redirect(array('controller'=>'Badges','action'=>'list'));   
		}
	}

  	$this->data = $badge;


	}


	
}
