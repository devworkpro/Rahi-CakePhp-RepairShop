<?php //use lib\Cake\Network\Email\CakeEmail;
App::uses('CakeEmail', 'Lib/Network/Email');
App::uses('AppModel', 'Model');
class StaffMenu extends AppModel {

 var $name = 'StaffMenu';
 
    public function addStaffMenuAdmin($data){
        
        return $this->save($data);
        
        //pr($data);die();
    }


    public function editStaffMenubyStaffId($data,$id){
        $this->staff_id = $id;
       // pr($data);die();
        return $this->save($data);
    }

    public function allStaffMenus(){
        return $this->find('all') ;
    }

    public function findallStaffMenusByLoginId($id){
        return $this->find('all',array('conditions'=>array('StaffMenu.login_id'=>$id)));
    }

    public function findStaffMenubyStaffId($id){
        return $this->find('first',array('conditions'=>array('StaffMenu.staff_id'=>$id)));
    }

    public function findallStaffMenuName(){
        return $this->find('list',array('fields'=>array('name')));
    }

    public function findallStaffMenuNameByLoginId($id){
        return $this->find('list',array('fields'=>array('name'),'conditions'=>array('StaffMenu.login_id'=>$id)));
    }
    
    public function findallStaffMenuNameById($id){
        return $this->find('first',array('fields'=>array('name'),'conditions'=>array('StaffMenu.id'=>$id)));
    }


    public function deleteStaffMenu($id){
        $this->id = $id;
        return $this->delete(array('StaffMenu.id'=>$id));
       // echo "hello";die();
    }

    


//////////////////////////////////////////////////

}
?>