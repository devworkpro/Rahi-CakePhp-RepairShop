<?php //use lib\Cake\Network\Email\CakeEmail;
App::uses('CakeEmail', 'Lib/Network/Email');
App::uses('AppModel', 'Model');
class Schedule extends AppModel {

 var $name = 'Schedule';
 
    public function addScheduleAdmin($data){
        
        return $this->save($data);
        
        //pr($data);die();
    }


    public function editSchedulebyId($data,$id){
        $this->id = $id;
        return $this->save($data);
    }

    public function allSchedules(){
    return $this->find('all') ;
    }

    public function findSchedulebyId($id){
        return $this->find('first',array('conditions'=>array('Schedule.id'=>$id)));
    }

    public function deleteSchedule($id){
        $this->id = $id;
        return $this->delete(array('Schedule.id'=>$id));
       // echo "hello";die();
    }

    public function findSchedulebyUserId($uid){
         return $this->find('all',array('conditions'=>array('Schedule.user_id'=>$uid)));
    }

    public function changePrice($fieldName,$id,$price){
        $this->id = $id;
        return $this->save(array($fieldName=>$price));

    }
/*******************************************************************************************/
    public function findProductbyProductId($pid)
    {
        return $this->find('all',array('conditions'=>array('Product.product_id'=>$pid)));
    }
    

/******************************************************************************************/

    public function findQuantitybyProductId($pid)
    {
        return $this->find('all',array('conditions'=>array('Product.quantity'=>$pid)));
    }
    


    public function ScheduleVerificationMail(){
       
       // $emailObj = new CakeEmail('default');
     //   $Email = new CakeEmail();
        $Email = new CakeEmail('default');
        $Email->from('vishvakarma.rexweb@gmail.com');
        $Email->to('vishvakarma.rexweb@gmail.com');
        $Email->subject('About');
        $Email->send('My message');
        echo "sfnkdsnfds";die();
   
        
       
    }

//////////////////////////////////////////////////

}
?>