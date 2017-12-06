<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class FrontsController extends AppController {

/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array('Slider','Config');
	public $components = array('RequestHandler');
 

	public function admin_addslider(){

		//error_reporting(0);
		$this->set('title','Add Slider');
		//echo print_r($this->request->data);
		$this->Slider->set($this->request->data);
		if($this->request->is('post')){
			
		
		if($this->Slider->validates()){
			//echo '<pre>';print_r($this->request->data);die;
			$this->Img = $this->Components->load('Img');
			if($this->data['Slider']['slider_image']['name']){
				        $ext = $this->Img->ext($this->request->data['User']['profile_pic']['name']); 
		    				$newName = strtotime(date("Y-m-d h:i:s"));
							$origFile = $newName . '.' . $ext;
							$dst = $newName . '.jpg';
							$targetdir = WWW_ROOT .'img/slider_image/';
							$upload = $this->Img->upload($this->request->data['Slider']['slider_image']['tmp_name'], $targetdir, $origFile);
							if($upload == 'Success') 
							{
								$this->Img->resampleGD($targetdir . DS . $origFile, WWW_ROOT . 'img/slider_image/large/', $dst, 1920, 791, 1, 0);
								$this->Img->resampleGD($targetdir . DS . $origFile, WWW_ROOT . 'img/slider_image/small/', $dst, 160, 160, 1, 0);
								$this->request->data['Slider']['slider_image'] = $dst;
								

										
								

							}

			}
			
		$this->Flash->success('Added Slider Image Successfully', array('key' => 'positive'));
		$this->Slider->addSlider($this->request->data);
		return $this->redirect(array('controller'=>'fronts','action'=>'addslider'));

		}else{
			//$errors = 
			$errors = $this->Slider->validationErrors;     
			$this->Flash->failure($errors);
			}
	}
	}

	public function admin_deleteslider($sid){
		$this->Slider->deleteSlider($sid);
		$this->Flash->success('Successfully Deleted Slider', array('key' => 'positive'));	
		return $this->redirect(array('controller'=>'fronts','action'=>'sliders'));
	}


	public function admin_sliders(){
		$this->set('title','All Slider Images');
		$allSlides = $this->Slider->find('all');
		$slider_config = $this->Config->getConfig();
		$this->set(compact('allSlides','slider_config'));
		$auto=$this->Config->find('first',array('conditions'=>array('Config.key'=>'slider_auto')));
		//pr($auto);die();
		$this->set('auto',$auto);
	}

	public function admin_slideredit($id){
		//error_reporting(0);
		$this->set('title','Edit Slide');
		$slide  = $this->Slider->findSlidebyId($id);

		$this->set('sliderimage',$slide['Slider']['slider_image']);
		if($this->request->is('post')){
			$this->Slider->id = $id;
			if($this->Slider->validates($this->request->data)){

				$this->Img = $this->Components->load('Img');
				if($this->data['Slider']['slider_image']['name']){
				        //$ext = $this->Img->ext($this->request->data['User']['profile_pic']['name']); 
		    				$newName = strtotime(date("Y-m-d h:i:s"));
							$origFile = $newName . '.' . $ext;
							$dst = $newName . '.jpg';
							$targetdir = WWW_ROOT .'img/slider_image/';
							$upload = $this->Img->upload($this->request->data['Slider']['slider_image']['tmp_name'], $targetdir, $origFile);
							if($upload == 'Success') 
							{
								$this->Img->resampleGD($targetdir . DS . $origFile, WWW_ROOT . 'img/slider_image/large/', $dst, 1920, 791, 1, 0);
								$this->Img->resampleGD($targetdir . DS . $origFile, WWW_ROOT . 'img/slider_image/small/', $dst, 160, 160, 1, 0);
								$this->request->data['Slider']['slider_image'] = $dst;
								
										
								

							}

			}else{
				$this->request->data['Slider']['slider_image'] = $slide['Slider']['slider_image'];
			}
				$this->Flash->success('Added Slider Image Successfully', array('key' => 'positive'));
				$this->Slider->addSlider($this->request->data);
				return $this->redirect(array('controller'=>'fronts','action'=>'sliders'));

			}
		}
		$this->data = $slide;
	}
	function admin_setting($id=null){
		$this->render(false);		
		if($this->request->is('ajax')){
			$data = $_GET['data'];
			$this->Config->id= 6;			
			$this->Config->saveField('value',$data);						
			}
	}

	function admin_speed(){
		$this->layout = null;
		if($this->request->is('post')){
			$data = ($this->request->data);
			$data = intval($data['val']);
			$data = ($data === 0)?"slow":(($data === 1)?"med":"fast");
			$this->Config->id = 7;
			$this->Config->saveField("value", $data);
		}
	}


   }
   
   
