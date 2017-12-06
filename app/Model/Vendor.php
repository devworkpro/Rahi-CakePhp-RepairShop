<?php //use lib\Cake\Network\Email\CakeEmail;
App::uses('CakeEmail', 'Lib/Network/Email');
App::uses('AppModel', 'Model');
class Vendor extends AppModel {

 var $name = 'Vendor';
 
    public function addVendorAdmin($data){
        
        return $this->save($data);
        
        //pr($data);die();
    }


    public function editVendorbyId($data,$id){
        $this->id = $id;
        return $this->save($data);
    }

    public function allVendors(){
        return $this->find('all') ;
    }

    public function findVendorbyId($id){
        return $this->find('first',array('conditions'=>array('Vendor.id'=>$id)));
    }
    
    public function findallVendorsByLoginId($id){
        return $this->find('all',array('conditions'=>array('Vendor.login_id'=>$id)));
    }
    
    public function findallVendorNameByLoginId($id){
        return $this->find('list',array('conditions'=>array('Vendor.login_id'=>$id)));
    }


    public function findallVendorName(){
        return $this->find('list',array('fields'=>array('name')));
    }

    
    public function findallVendorNameById($id){
        return $this->find('first',array('fields'=>array('name'),'conditions'=>array('Vendor.id'=>$id)));
    }


    public function deleteVendor($id){
        $this->id = $id;
        return $this->delete(array('Vendor.id'=>$id));
       // echo "hello";die();
    }

    


//////////////////////////////////////////////////

}
?>