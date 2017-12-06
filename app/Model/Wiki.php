<?php //use lib\Cake\Network\Email\CakeEmail;
App::uses('CakeEmail', 'Lib/Network/Email');
App::uses('AppModel', 'Model');
class Wiki extends AppModel {

 var $name = 'Wiki';
 
    public function addWikiAdmin($data){
        
        return $this->save($data);
        
        //pr($data);die();
    }


    public function editWikibyId($data,$id){
        $this->id = $id;
        return $this->save($data);
    }

    public function allWikis(){
        return $this->find('all') ;
    }

    public function findallWikisByLoginId($id){
        return $this->find('all',array('conditions'=>array('Wiki.login_id'=>$id)));
    }

    public function findWikibyId($id){
        return $this->find('first',array('conditions'=>array('Wiki.id'=>$id)));
    }

    public function findallWikiName(){
        return $this->find('list',array('fields'=>array('name')));
    }

    public function findallWikiNameByLoginId($id){
        return $this->find('list',array('fields'=>array('name'),'conditions'=>array('Wiki.login_id'=>$id)));
    }
    
    public function findallWikiNameById($id){
        return $this->find('first',array('fields'=>array('name'),'conditions'=>array('Wiki.id'=>$id)));
    }


    public function deleteWiki($id){
        $this->id = $id;
        return $this->delete(array('Wiki.id'=>$id));
       // echo "hello";die();
    }

    


//////////////////////////////////////////////////

}
?>