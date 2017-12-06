<!-- Modal -->

<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?libraries=places&sensor=false"></script>

<div class="fade login_pop register_pop" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="opacity:1;display:block !important;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title text-center" id="myModalLabel">Request Course</h4>
      </div>
      <div class="modal-body">
        <span class="message"></span>
       <?php echo $this->Form->create('RequestCourse'); ?>

     <div class="form-group">
     <!--?php echo $this->Form->input('RequestCourse.location' , array('required' =>true,'placeholder'=>'Location','class'=>'form-control name','label'=>false,'div'=>false)); ?-->
     <input type="text" id="pac-input" class="form-control">
    </div>
  <div class="form-group">
   <?php echo $this->Form->input('RequestCourse.message',array('placeholder'=>'Message','class'=>'form-control name','label'=>false,'div'=>false)); ?>
  </div>
  <div class="form-group">
                          <?php echo $this->Form->input('RequestCourse.course_type', array('options' => array('Line','Score','Scatter'),'class'=>'form-control','label'=>false,'div'=>false)); ?>
                        </div>
  <button type="submit" class="btn btn-default login_btn hvr-sweep-to-right" id="btn">Request</button>
  	<?php echo $this->Form->end(); ?>
  	<div class="modal-footer">
  	</div>
      </div>
    </div>
  </div><!--modal-dialog-->
</div><!--modal fade login_pop-->

<script>
   
    function initMap() {
    
var input = document.getElementById('pac-input');
var autocomplete = new google.maps.places.Autocomplete(input);

}

google.maps.event.addDomListener(window, 'load', initMap);
 </script>
