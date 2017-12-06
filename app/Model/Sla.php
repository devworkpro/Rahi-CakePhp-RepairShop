<?php //use lib\Cake\Network\Email\CakeEmail;
App::uses('CakeEmail', 'Lib/Network/Email');
App::uses('AppModel', 'Model');
class Sla extends AppModel {

 var $name = 'Sla';
 
    public function addSlaAdmin($data){
        
        return $this->save($data);
        
        //pr($data);die();
    }


    public function editSlabyId($data,$id){
        $this->id = $id;
        return $this->save($data);
    }

    public function allSlas(){
        return $this->find('all') ;
    }

    public function findallSlasByLoginId($id){
        return $this->find('all',array('conditions'=>array('Sla.login_id'=>$id)));
    }

    public function findSlabyId($id){
        return $this->find('first',array('conditions'=>array('Sla.id'=>$id)));
    }

    public function findallSlaName(){
        return $this->find('list',array('fields'=>array('name')));
    }

    public function findallSlaNameByLoginId($id){
        return $this->find('list',array('fields'=>array('name'),'conditions'=>array('Sla.login_id'=>$id)));
    }
    
    public function findallSlaNameById($id){
        return $this->find('first',array('fields'=>array('name'),'conditions'=>array('Sla.id'=>$id)));
    }


    public function deleteSla($id){
        $this->id = $id;
        return $this->delete(array('Sla.id'=>$id));
       // echo "hello";die();
    }

    


//////////////////////////////////////////////////

}
?>