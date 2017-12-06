<?php //echo '<pre>';print_r($allCourses); die; ?>
<?php foreach ($allCourses as $courses) {?>
Name : <?php echo $courses['Course']['Name']; ?>
Location : <?php echo $courses['Course']['location']; ?>
Type : <?php if($courses['Course']['type1'] == 0){ echo 'Free';}else{echo 'Paid';}?>
<?php echo $this->Html->link('Join',array('controller' => 'courses', 'action' => 'join', $courses['Course']['id']));?>
<?php } ?>
