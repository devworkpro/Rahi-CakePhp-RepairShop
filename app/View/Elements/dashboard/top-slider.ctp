<ul class="bxslider">
  <?php foreach($new_courses as $courses) { ?>
  <li><?php echo $this->Html->image('https://maps.googleapis.com/maps/api/staticmap?center='.$courses['Course']['latitude'].','.$courses['Course']['longitude'].'&size=461x272&zoom=16&maptype=roadmap&markers=icon:'.SITEURL.'img/strt.png|color:red|'.$courses['Course']['latitude'].','.$courses['Course']['longitude']);?></li>

  <!-- <li><img src="https://maps.googleapis.com/maps/api/staticmap?center=-31.95997254828075,115.81237826496363&size=461x272&zoom=16&maptype=roadmap&markers=icon:http://112.196.42.180:4118/runningportal/img/s.png|color:red|-31.95997254828075,115.81237826496363" /></li>
  <li><img src="https://maps.googleapis.com/maps/api/staticmap?center=-31.95997254828075,115.81237826496363&size=461x272&zoom=16&maptype=roadmap&markers=icon:http://112.196.42.180:4118/runningportal/img/s.png|color:red|-31.95997254828075,115.81237826496363" /></li>
  <li><img src="https://maps.googleapis.com/maps/api/staticmap?center=-31.95997254828075,115.81237826496363&size=461x272&zoom=16&maptype=roadmap&markers=icon:http://112.196.42.180:4118/runningportal/img/s.png|color:red|-31.95997254828075,115.81237826496363" /></li> -->
  <?php } ?>
</ul>
<script src="<?php echo $this->webroot.'js/jquery.bxslider.min.js';?>"></script>
<link rel="stylesheet" href="<?php echo $this->webroot.'css/jquery.bxslider.min.css';?>"></link>
<script>
$(document).ready(function(){
  $('.bxslider').bxSlider({
  	slideWidth: 250,
  	 minSlides: 1,
      maxSlides: 4,
     slideMargin: 20

  });
});
</script>