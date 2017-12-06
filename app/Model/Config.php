<?php App::uses('AppModel', 'Model');
class Config extends AppModel {
	  var $name = 'Config';
	  
    public function getConfig(){
	return $this->find('first',array('conditions' =>array('Config.key'=>'slider_autoscroll')));
	 }  
}
?>