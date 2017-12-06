<?php App::uses('AppModel', 'Model');
/**
 * Connection Model
 *
 */
class Friend extends AppModel {

	var $name = 'Friend';
public $belongsTo =array('User');


  public function friends($user_id){
        
  	return $this->query("SELECT friends.user2, users.first_name ,users.profile_pic FROM friends INNER JOIN users ON friends.user2 = users.id WHERE friends.User1 = $user_id

		UNION

		SELECT friends.User1 , users.first_name ,users.profile_pic FROM friends INNER JOIN users  ON friends.User1 = users.id WHERE friends.User2 = $user_id");
    }

    public function suggestion($user_id){
    	return $this->query("SELECT users.id,users.first_name,users.surname,users.profile_pic from users where id NOT IN (SELECT friends.user1 and friends.user2 from friends) and  id !=$user_id and id not in(SELECT user2 from friends)");
    }


    public function search_friend($search_name){
    	return $this->query("SELECT users.id,users.first_name,users.surname,users.profile_pic from users where users.first_name  LIKE '%$search_name%' and id NOT IN (SELECT friends.user1 and friends.user2 from friends) and  id !=26 and id not in(SELECT user2 from friends)");

    }

}
?>