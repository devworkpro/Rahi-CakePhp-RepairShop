<?php
App::uses('AppModel', 'Model');
class Gpx extends AppModel {
	
var $name = 'Gpx';
public $useTable = 'gpx';
public $hasMany  = array('Comment','Like');
		public function saveGpx($cid,$filename,$userid,$otherdata){
			$data['Gpx']['activity_name'] = $otherdata['GPX']['activity_name'];
			$data['Gpx']['activity_type'] = $otherdata['GPX']['activity_type'];
			$data['Gpx']['viewable'] = $otherdata['GPX']['viewable'];
			$data['Gpx']['activity_with'] = json_encode($otherdata['GPX']['activity_with']);
			$data['Gpx']['privacy_setting'] = $otherdata['GPX']['privacy_setting'];
			$data['Gpx']['blog_commentary'] = $otherdata['GPX']['blog_commentary'];
			$data['Gpx']['user_id'] = $userid;
			$data['Gpx']['course_id'] = $cid;
			$data['Gpx']['gpx_file'] = $filename.'.gpx';
            $data['Gpx']['locations'] = $otherdata['locations'];
			return $this->save($data);
		}



	public function  profileData($user_id){
		return $this->find('all', array(
    	'joins' => array(
        array(
            'table' => 'courses',
            'alias' => 'courses',
            'type' => 'INNER',
            'conditions' => array(
                'courses.id = Gpx.course_id' 
            )
        ),
         array(
            'table' => 'leaderboards',
            'alias' => 'leaderboards',
            'type' => 'INNER',
            'conditions' => array(
                'leaderboards.gpx_id = Gpx.id' 
            )
        ),

          array(
            'table' => 'users',
            'alias' => 'users',
            'type' => 'INNER',
            'conditions' => array(
                'Gpx.user_id = users.id' 
            )
        )
          
    ),
    'conditions' => array(
        'Gpx.user_id' => $user_id
    ),
    
    'fields'=>array('Gpx.*','courses.*','leaderboards.*','users.*'),
    'group'=>'Gpx.id DESC','orderby'=>'comments.id','limit'=>5
));
		
}

public function weeks_profileData($user_id){

    return $this->query("SELECT gpx.* , leaderboards.*, courses.*,users.* from gpx inner join leaderboards on gpx.course_id=leaderboards.course_id inner join courses on courses.id=gpx.course_id inner join users on users.id=gpx.user_id where gpx.user_id=$user_id and gpx.created_at>=CURDATE()-28 group by gpx.id");
}

public function year_profileData($user_id){

    return $this->query("SELECT gpx.* , leaderboards.*, courses.*,users.* from gpx inner join leaderboards on gpx.course_id=leaderboards.course_id inner join courses on courses.id=gpx.course_id inner join users on users.id=gpx.user_id where gpx.user_id=$user_id and YEAR(gpx.created_at) = YEAR(CURDATE()) group by gpx.id");

}

public function life_profileData($user_id){

    return $this->query("SELECT gpx.* , leaderboards.*, courses.*,users.* from gpx inner join leaderboards on gpx.course_id=leaderboards.course_id inner join courses on courses.id=gpx.course_id inner join users on users.id=gpx.user_id where gpx.user_id=$user_id  group by gpx.id");
}

public function loadGPx($loadmore){

    return $this->find('all', array(
        'joins' => array(
        array(
            'table' => 'courses',
            'alias' => 'courses',
            'type' => 'INNER',
            'conditions' => array(
                'courses.id = Gpx.course_id' 
            )
        ),
         array(
            'table' => 'leaderboards',
            'alias' => 'leaderboards',
            'type' => 'INNER',
            'conditions' => array(
                'leaderboards.course_id = Gpx.course_id' 
            )
        ),

          array(
            'table' => 'users',
            'alias' => 'users',
            'type' => 'INNER',
            'conditions' => array(
                'Gpx.user_id = users.id' 
            )
        )
          
    ),
    'conditions' => array(
        'Gpx.user_id' => $loadmore['user_id'],'Gpx.id <'=>$loadmore['id']
    ),
    
    'fields'=>array('Gpx.*','courses.*','leaderboards.*','users.*'),
    'group'=>'Gpx.id DESC','orderby'=>'comments.id','limit'=>3
));

}

}
?>