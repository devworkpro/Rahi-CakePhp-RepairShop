<?php App::uses('AppModel', 'Model');
/**
 * Leaderboard Model
 *
 */
class Leaderboard extends AppModel {

	public $belongsTo =array('User');

   public function saveData($data){
   	return $this->save($data);
   }

   public function checkPrevious($rundate,$user_id,$courseid){
    return $this->find('count',array('conditions'=>array('Leaderboard.run_date'=>$rundate,'Leaderboard.user_id'=>$user_id,'Leaderboard.course_id'=>$courseid)));
   }

   public function leaderboardByCourse($courseId){
   	 return $this->find('all',array('conditions'=>array('Leaderboard.course_id'=>$courseId),'order'=>'Leaderboard.controls DESC'));
   }

    public function leaderboardByScatter($courseId){
          return $this->query("SELECT User.*,Leaderboard.*,@rownum:=@rownum+1 rank from(SELECT count(user_id) as attempts,my_table_tmp.* from (SELECT leaderboards.*,@curRank := @curRank + 1 AS myrank FROM leaderboards, (SELECT @curRank := 0) r where course_id = $courseId ORDER BY controls DESC,`time` ASC) as my_table_tmp group by user_id) as Leaderboard INNER JOIN users as User on User.id = Leaderboard.user_id,(SELECT @rownum:=0) r ORDER BY myrank");
   }

    public function rankByIDScatter($userid,$courseId){

        return $this->query("SELECT rank.rank from(SELECT UserAttempt.* from (Select Leaderboard.*,@rownum:=@rownum+1 rank from(SELECT my_table_tmp.* from (SELECT leaderboards.*,@curRank := @curRank + 1 AS myrank FROM leaderboards, (SELECT @curRank := 0) r where course_id = $courseId ORDER BY controls DESC,`time` ASC) as my_table_tmp group by user_id) as Leaderboard,(SELECT @rownum:=0) r ORDER BY myrank) as UserAttempt INNER JOIN users as User on User.id = UserAttempt.user_id) as rank where rank.user_id = $userid");

   }

    public function userAttemptsbyScatter($userid,$courseId){

       return $this->query("SELECT Leaderboard.*,User.*,@curRank := @curRank + 1 AS myrank FROM leaderboards Leaderboard INNER JOIN users as User on User.id = Leaderboard.user_id, (SELECT @curRank := 0) r  where course_id = $courseId and user_id = $userid ORDER BY controls DESC,`time` ASC");

   }

    public function leaderboardByLine($courseId){
       return $this->query("SELECT User.*,Leaderboard.*,@rownum:=@rownum+1 rank from(SELECT count(user_id) as attempts,my_table_tmp.* from (SELECT leaderboards.*,@curRank := @curRank + 1 AS myrank FROM leaderboards, (SELECT @curRank := 0) r where course_id = $courseId ORDER BY controls DESC,`time` ASC) as my_table_tmp group by user_id) as Leaderboard INNER JOIN users as User on User.id = Leaderboard.user_id,(SELECT @rownum:=0) r ORDER BY myrank" );
   }

    public function rankByIDLine($userid,$courseId){

    return $this->query("SELECT rank.rank from(SELECT UserAttempt.* from (Select Leaderboard.*,@rownum:=@rownum+1 rank from(SELECT my_table_tmp.* from (SELECT leaderboards.*,@curRank := @curRank + 1 AS myrank FROM leaderboards, (SELECT @curRank := 0) r where course_id = $courseId ORDER BY controls DESC,`time` ASC) as my_table_tmp group by user_id) as Leaderboard,(SELECT @rownum:=0) r ORDER BY myrank) as UserAttempt INNER JOIN users as User on User.id = UserAttempt.user_id) as rank where rank.user_id = $userid");

   }

    public function userAttemptsbyLine($userid,$courseId){

        return $this->query("SELECT Leaderboard.*,User.*,@curRank := @curRank + 1 AS myrank FROM leaderboards Leaderboard INNER JOIN users as User on User.id = Leaderboard.user_id, (SELECT @curRank := 0) r  where course_id = $courseId and user_id = $userid ORDER BY controls DESC,`time` ASC");

   }

    public function leaderboardByScore($courseId){
          return $this->query("SELECT User.*,Leaderboard.*,@rownum:=@rownum+1 rank from(SELECT count(user_id) as attempts,my_table_tmp.* from (SELECT leaderboards.*,@curRank := @curRank + 1 AS myrank FROM leaderboards, (SELECT @curRank := 0) r where course_id = $courseId ORDER BY score DESC,`time` ASC) as my_table_tmp group by user_id) as Leaderboard INNER JOIN users as User on User.id = Leaderboard.user_id,(SELECT @rownum:=0) r ORDER BY myrank");
   }


   public function rankByIDScore($userid,$courseId){

    return $this->query("SELECT rank.rank from(SELECT UserAttempt.* from (Select Leaderboard.*,@rownum:=@rownum+1 rank from(SELECT my_table_tmp.* from (SELECT leaderboards.*,@curRank := @curRank + 1 AS myrank FROM leaderboards, (SELECT @curRank := 0) r where course_id = $courseId ORDER BY score DESC,`time` ASC) as my_table_tmp group by user_id) as Leaderboard,(SELECT @rownum:=0) r ORDER BY myrank) as UserAttempt INNER JOIN users as User on User.id = UserAttempt.user_id) as rank where rank.user_id = $userid");

   }

    public function userAttemptsbyScore($userid,$courseId){
        return $this->query("SELECT Leaderboard.*,User.*,@curRank := @curRank + 1 AS myrank FROM leaderboards Leaderboard INNER JOIN users as User on User.id = Leaderboard.user_id, (SELECT @curRank := 0) r  where course_id = $courseId and user_id = $userid ORDER BY score DESC,`time` ASC");

   }


   public function searchFilter($gender,$age,$courseId,$type){


    switch ($type) {
      case '0': //line
        # code...
      return $this->query("SELECT User.*,Leaderboard.*,@rownum:=@rownum+1 rank from(SELECT count(user_id) as attempts,my_table_tmp.* from (SELECT leaderboards.*,@curRank := @curRank + 1 AS myrank FROM leaderboards, (SELECT @curRank := 0) r where course_id = $courseId ORDER BY controls DESC,`time` ASC) as my_table_tmp group by user_id) as Leaderboard INNER JOIN users as User on User.id = Leaderboard.user_id,(SELECT @rownum:=0) r where User.gender LIKE '%$gender%' AND Leaderboard.age_range LIKE '%$age%' ORDER BY myrank");
        break;

      case '1': //score
        # code...
   

      return $this->query("SELECT User.*,Leaderboard.*,@rownum:=@rownum+1 rank from(SELECT count(user_id) as attempts,my_table_tmp.* from (SELECT leaderboards.*,@curRank := @curRank + 1 AS myrank FROM leaderboards, (SELECT @curRank := 0) r where course_id = $courseId ORDER BY score DESC,`time` ASC) as my_table_tmp group by user_id) as Leaderboard INNER JOIN users as User on User.id = Leaderboard.user_id,(SELECT @rownum:=0) r where User.gender LIKE '%$gender%' AND Leaderboard.age_range LIKE '%$age%' ORDER BY myrank");
        break;

      case '2': //scatter
        # code...
      return $this->query("SELECT User.*,Leaderboard.*,@rownum:=@rownum+1 rank from(SELECT count(user_id) as attempts,my_table_tmp.* from (SELECT leaderboards.*,@curRank := @curRank + 1 AS myrank FROM leaderboards, (SELECT @curRank := 0) r where course_id = $courseId ORDER BY controls DESC,`time` ASC) as my_table_tmp group by user_id) as Leaderboard INNER JOIN users as User on User.id = Leaderboard.user_id,(SELECT @rownum:=0) r where User.gender LIKE '%$gender%' AND Leaderboard.age_range LIKE '%$age%' ORDER BY myrank");
        break;
    }


         
   }


   public function total_distance($user_id){
   
        return $this->find('all',array('fields' => array('sum(Leaderboard.distance) AS total_distance'),'conditions' => array('user_id' => $user_id)));

    }

    public function total_time($user_id){
        return $this->find('all',array('fields' => array('Leaderboard.time AS total_time'),'conditions' => array('user_id' => $user_id)));
    }

    public function min_time($user_id){
        return $this->find('all',array('fields' => array('min(Leaderboard.time) AS minimum_time'),'conditions' => array('user_id' => $user_id)));
    }

    public function total_score($user_id){

        return $this->find('all',array('fields' => array('sum(Leaderboard.score) AS total_score'),'conditions' => array('user_id' => $user_id)));
    }

    public function max_score($user_id){
        return $this->find('all',array('fields' => array('max(Leaderboard.score) AS max_score'),'conditions' => array('user_id' => $user_id)));

    }

    public function total_point($user_id){
       // return $this->find('all',array('fields' => array('sum(Leaderboard.controls) AS total_points'),'conditions' => array('user_id' => $user_id)));
      return $this->find('all',array('fields' => array('count(Leaderboard.user_id) AS total_points'),'conditions' => array('user_id' => $user_id)));

    }

    public function max_point($user_id){
        return $this->find('all',array('fields' => array('max(Leaderboard.controls) AS Max_point'),'conditions' => array('user_id' => $user_id)));
    }

    // last 4 weeks result

     public function t_distance($user_id){
      return $this->query("SELECT sum(distance) AS total_distance FROM leaderboards where user_id=$user_id and created_at>=CURDATE()-28");

    }
	
	
    public function t_time($user_id){
        return $this->query("SELECT `time` AS total_time  FROM leaderboards where user_id=$user_id and created_at>=CURDATE()-28");
    }

    public function t_min_time($user_id){
        return $this->query("SELECT min(time) AS minimum_time  FROM leaderboards where user_id=$user_id and created_at>=CURDATE()-28");
    }


    public function t_score($user_id){

        return $this->query("SELECT sum(score) AS total_score FROM leaderboards where user_id=$user_id and created_at>=CURDATE()-28");
    }

     public function maximum_score($user_id){

        return $this->query("SELECT max(score) AS maximum_score FROM leaderboards where user_id=$user_id and created_at>=CURDATE()-28");

    }

    public function t_point($user_id){

       return $this->query("SELECT count(user_id) AS total_points FROM leaderboards where user_id=$user_id and created_at>=CURDATE()-28");
    }

      public function maximum_point($user_id){
        return $this->query("SELECT max(controls) AS maximum_points FROM leaderboards where user_id=$user_id and created_at>=CURDATE()-28");
    }

    // this year result

    public function distance_year($user_id){
      return $this->query("SELECT sum(distance) AS total_distance from leaderboards where user_id=$user_id and YEAR(created_at) = YEAR(CURDATE())");

    }

     public function time_year($user_id){
      return $this->query("SELECT `time` AS total_time from leaderboards where user_id=$user_id and YEAR(created_at) = YEAR(CURDATE())");

    }

    public function time_min_year($user_id){
      return $this->query("SELECT min(time) AS minimum_time from leaderboards where user_id=$user_id and YEAR(created_at) = YEAR(CURDATE())");

    }

     public function score_year($user_id){
      return $this->query("SELECT sum(score) AS total_score from leaderboards where user_id=$user_id and YEAR(created_at) = YEAR(CURDATE())");

    }

    public function max_score_year($user_id){
      return $this->query("SELECT max(score) AS maximum_score from leaderboards where user_id=$user_id and YEAR(created_at) = YEAR(CURDATE())");

    }

    public function points_year($user_id){
    //  return $this->query("SELECT sum(controls) AS total_points from leaderboards where user_id=$user_id and YEAR(created_at) = YEAR(CURDATE())");
 return $this->query("SELECT count(user_id) AS total_points from leaderboards where user_id=$user_id and YEAR(created_at) = YEAR(CURDATE())");
    }

    public function max_points_year($user_id){
      return $this->query("SELECT max(controls) AS maximum_points from leaderboards where user_id=$user_id and YEAR(created_at) = YEAR(CURDATE())");

    }

   

}
?>