<?php App::uses('AppModel', 'Model');
/**
 * Connection Model
 *
 */
class Connection extends AppModel {
var $name='Connection';
	public function findConnectionsById($userid){

		return $this->find('all', array(
			    	'joins' => array(
			        array(
			            'table' => 'users',
			            'alias' => 'User',
			            'type' => 'INNER',
			            'conditions' => array(			                
			                'Connection.follower='.$userid,
			                'User.id = Connection.following'
			            )
			        ),
			    ),
			    	 'fields'=>array('User.*'),
			));
	}


	 public function following($user_id){
	 	
        return $this->query("SELECT connections.following , users.profile_pic, users.username from connections INNER JOIN users on connections.following = users.id where follower=$user_id");

    }

    public function follower($user_id){
        return $this->query("SELECT connections.follower , users.profile_pic , users.username from connections inner join users on connections.follower = users.id where following=$user_id");
    }

}
?>