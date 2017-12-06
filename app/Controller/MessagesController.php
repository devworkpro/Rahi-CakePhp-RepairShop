<?php

class MessagesController extends AppController {

public $uses = array('Comment');

	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->deny();
	}

	public function addComment(){
		if($this->request->is('ajax')){
			$this->loadModel('Comment');
			$this->loadModel('User');
			$this->autoRender = false;
			$input = $this->request->data;
			$input['user_id'] = $this->Auth->user('id');
			$saveComment  = $this->Comment->save($input);
			
			if($saveComment){
			$comment_id = $saveComment['Comment']['id'];
			$userinfo = $this->User->findUserbyId($this->Auth->user('id'));
			$userinfo['comment_id'] = $comment_id;
			echo json_encode($userinfo);
			}
		}
	}	
		
	public function loadmore(){
			if($this->request->is('ajax')){
			$this->loadModel('Comment');	
			$this->autoRender = false;
			$this->layout = false;
			$input = $this->request->data;
			//echo '<pre>';print_r($input);
			$loadComment  = $this->Comment->loadComment($input);
				if($loadComment){
					echo json_encode($loadComment);
					}	
			}				
	}
	
		public function deleteComment(){
			
			$id = $this->request->data['lid']; 
			$this->Comment->id = $id;
			$result =  $this->Comment->delete($id);
			if($result){
					$success = 1;
				//echo json_encode($result);
			}
			else{
						$success = 0;
				}
				echo $success ;
			die();

	}


	public function loadmore_courses(){
			if($this->request->is('ajax')){
			$this->loadModel('Course');	
			$this->autoRender = false;
			$this->layout = false;
			$userLongitude = $this->Auth->user('long');
			$userLatutide = $this->Auth->user('lat');
			$result = $this->request->data;
			//echo '<pre>';print_r($result);

			if($userLongitude && $userLatutide){

					$loadCourse= $this->Course->find('all',array(
												'fields'=>array('3956 * 2 * ASIN(SQRT( POWER(SIN(('.$userLatutide.' -Course.latitude) * pi()/180 / 2), 2) +COS('.$userLatutide.' * pi()/180) * COS(Course.latitude * pi()/180) *POWER(SIN(('.$userLongitude.' -Course.longitude) * pi()/180 / 2), 2) )) as distance','Course.*','Page.key'),'group'=>array(
													        'distance HAVING distance >'.$result['distance'] 
													    ),'order'=>'distance','limit'=>16
												
												)
												);
			
		}
		else{

			$loadCourse= $this->Course->find('all',array(
												'fields'=>array('3956 * 2 * ASIN(SQRT( POWER(SIN(('.$userLatutide.' -Course.latitude) * pi()/180 / 2), 2) +COS('.$userLatutide.' * pi()/180) * COS(Course.latitude * pi()/180) *POWER(SIN(('.$userLongitude.' -Course.longitude) * pi()/180 / 2), 2) )) as distance','Course.*','Page.key'),'group'=>array(
													         'longitude HAVING longitude <'=>$result['distance']
													    ),'order'=>'distance','limit'=>16
												
												)
												);
			

		}
			//echo '<pre>';print_r($loadCourse);die;
				if($loadCourse){
					echo json_encode($loadCourse);
					}	
			}				
	}
		



}