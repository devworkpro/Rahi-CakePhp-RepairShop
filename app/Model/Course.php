<?php App::uses('AppModel', 'Model');
App::uses('AppModel', 'CourseUnlocked');
class Course extends AppModel {
	
 var $name = 'Course';
 var $hasMany = array('CourseUnlocked','Gpx');
 public $belongsTo  = array('Page'=>array('className' => 'Page','foreignKey'=>'rules_page'));

 	public $validate = array(
		'Name' => array(
			'rule' => array('minLength', 1),
        	'message' => 'Title Should be of Actual length.',
	        'required' => true
	    ),
	    'date_time' => array(
	        'required' => true,
	    )

    );


    public function findAll(){
    	return $this->find('all');
    }

    public function deleteCourse($id){
    	$query = "DELETE From courses WHERE id = $id";
    //	die($query);
    	return $this->query($query);
	}

	public function findCoursebyID($cid){
		return $this->find('first',array('conditions'=>array('Course.id'=>$cid)));
	}

	public function findCoursebyIDandSlug($cid,$slug){
		return $this->find('first',array('conditions'=>array('Course.id'=>$cid,'Course.slug'=>$slug)));
	}

	public function findByDistance($long,$lat){
		return $this->find('all',array('limit'=>16,'fields'=>array('3956 * 2 * ASIN(SQRT( POWER(SIN(('.$lat.' -Course.latitude) * pi()/180 / 2), 2) +COS('.$lat.' * pi()/180) * COS(Course.latitude * pi()/180) *POWER(SIN(('.$long.' -Course.longitude) * pi()/180 / 2), 2) )) as distance','Course.*','Page.key',
									),
				'order'=>'distance'));
	}

	public function findCourseType($cid){
		return $this->find('first',array('conditions'=>array('Course.id'=>$cid),'fields'=>array('Course.type2','Course.positions','Course.time_limit','Course.required_control')));

	}

	public function findByDistancetop($long,$lat){
		return $this->find('all',array('fields'=>array('3956 * 2 * ASIN(SQRT( POWER(SIN(('.$lat.' -Course.latitude) * pi()/180 / 2), 2) +COS('.$lat.' * pi()/180) * COS(Course.latitude * pi()/180) *POWER(SIN(('.$long.' -Course.longitude) * pi()/180 / 2), 2) )) as distance','Course.*','Page.key',
									),
				'order'=>'distance','limit'=>8));
	}

	public function findByWithoutDistance(){
		return $this->find('all',array('fields'=>array('Course.*','Page.key'),'limit'=>8));
	}


	/*public function loadMore_course($long,$lat,$result){
		return $this->find('all',array('fields'=>array('3956 * 2 * ASIN(SQRT( POWER(SIN(('.$lat.' -Course.latitude) * pi()/180 / 2), 2) +COS('.$lat.' * pi()/180) * COS(Course.latitude * pi()/180) *POWER(SIN(('.$long.' -Course.longitude) * pi()/180 / 2), 2) )) as distance','Course.*','Page.key',),
				'order'=>'distance','group'=>array('distance HAVING distance > 5020')));
	}*/
}
?>