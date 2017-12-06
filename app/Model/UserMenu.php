<?php //use lib\Cake\Network\Email\CakeEmail;
App::uses('CakeEmail', 'Lib/Network/Email');
App::uses('AppModel', 'Model');
class UserMenu extends AppModel {

 var $name = 'UserMenu';
 
    public function addUserMenuAdmin($data){
        
        return $this->save($data);
        
        //pr($data);die();
    }


    public function editUserMenubyId($data,$id){
        $this->id = $id;
        return $this->save($data);
    }

    public function allUserMenus(){
        return $this->find('all') ;
    }

    public function findUserMenuByUserId($id){
        return $this->find('all',array('conditions'=>array('UserMenu.user_id'=>$id)));
    }

    public function findUserMenubyId($id){
        return $this->find('first',array('conditions'=>array('UserMenu.id'=>$id)));
    }

    public function findAllUserMenubyUserMenuOrder(){
        return $this->find('all', array('order' =>array('UserMenu.UserMenu_order'=>'asc'),'recursive'=>1));
    }

    public function findallUserMenuName(){
        return $this->find('list',array('fields'=>array('name')));
    }

    public function findallUserMenuNameByLoginId($id){
        return $this->find('list',array('fields'=>array('name'),'conditions'=>array('UserMenu.login_id'=>$id)));
    }
    
    public function findallUserMenuNameById($id){
        return $this->find('first',array('fields'=>array('name'),'conditions'=>array('UserMenu.id'=>$id)));
    }


    public function deleteUserMenu($id){
        $this->id = $id;
        return $this->delete(array('UserMenu.id'=>$id));
       // echo "hello";die();
    }

    


//////////////////////////////////////////////////

}
?>