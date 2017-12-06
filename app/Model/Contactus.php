<?php //use lib\Cake\Network\Email\CakeEmail;
App::uses('CakeEmail', 'Lib/Network/Email');
App::uses('AppModel', 'Model');
class Contactus extends AppModel {

 var $name = 'Contactus';
 
    public function addContactusAdmin($data){
        
        return $this->save($data);
        
        //pr($data);die();
    }


    public function editContactusbyId($data,$id){
        $this->id = $id;
        return $this->save($data);
    }

    public function allContactus(){
        return $this->find('all') ;
    }

    public function findContactusbyId($id){
        return $this->find('first',array('conditions'=>array('Contactus.id'=>$id)));
    }

    
    public function deleteContactus($id){
        $this->id = $id;
        return $this->delete(array('Contactus.id'=>$id));
       // echo "hello";die();
    }

   
//////////////////////////////////////////////////

}
?>