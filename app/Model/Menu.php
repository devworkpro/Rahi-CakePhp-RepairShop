<?php //use lib\Cake\Network\Email\CakeEmail;
App::uses('CakeEmail', 'Lib/Network/Email');
App::uses('AppModel', 'Model');
class Menu extends AppModel {

 var $name = 'Menu';
 
    public function addMenuAdmin($data){
        
        return $this->save($data);
        
        //pr($data);die();
    }


    public function editMenubyId($data,$id){
        $this->id = $id;
        return $this->save($data);
    }

    public function allMenus(){
        return $this->find('all') ;
    }

    public function findallMenusByLoginId($id){
        return $this->find('all',array('conditions'=>array('Menu.login_id'=>$id)));
    }

    public function findMenubyId($id){
        return $this->find('first',array('conditions'=>array('Menu.id'=>$id)));
    }

    public function findAllMenubyMenuOrder(){
        return $this->find('all', array('order' =>array('Menu.menu_order'=>'asc'),'recursive'=>1));
    }

    public function findallMenuName(){
        return $this->find('list',array('fields'=>array('name')));
    }

    public function findallMenuNameByLoginId($id){
        return $this->find('list',array('fields'=>array('name'),'conditions'=>array('Menu.login_id'=>$id)));
    }
    
    public function findallMenuNameById($id){
        return $this->find('first',array('fields'=>array('name'),'conditions'=>array('Menu.id'=>$id)));
    }


    public function deleteMenu($id){
        $this->id = $id;
        return $this->delete(array('Menu.id'=>$id));
       // echo "hello";die();
    }

    


//////////////////////////////////////////////////

}
?>