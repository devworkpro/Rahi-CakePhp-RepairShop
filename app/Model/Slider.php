<?php
App::uses('AppModel', 'Model');
class Slider extends AppModel {
	
 var $name = 'Slider';

 public $validate = array(
        'slider_image' => array(
        'extension' => array(
            'rule' => array('extension', array('jpeg', 'jpg', 'gif', 'png')),
            'message' => 'You must supply a GIF, PNG, or JPG file.',
            'required' => false,
            'on' => 'add'
        ),
        'extension2' => array(
            'rule' => array('extension', array('jpeg', 'jpg', 'gif', 'png')),
            'message' => 'You must supply a GIF, PNG, or JPG file.',
            'required' => true,
            'on' => 'create'
        ),
    )

    );

	 public function addSlider($data){
	 	return $this->save($data);
	 }

	 public function allSlides(){
	 	return $this->find('all',array('conditions'=>array('Slider.status'=>'1')));
	 }

	 public function findSlidebyId($id){
	 	return $this->find('first',array('conditions'=>array('Slider.id'=>$id)));
	 }

	 public function getConfig(){
	 	return $this->find('first',array('conditions' =>array('Config.key'=>'slider_autoscroll')));
	 }

	 public function deleteSlider($sid){
	 	$query = "DELETE From sliders WHERE id = $sid";
    	return $this->query($query);
	 }

}
?>