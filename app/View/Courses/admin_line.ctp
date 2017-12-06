<script src="<?php echo $this->webroot.'js/backend/MarkerWithLabel.js';?>"></script>
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Create Line Course</h3>
          </div><!-- /.box-header -->
          <!-- form start -->
          <?php echo $this->Form->create('Course', array('method' => 'post','action'=>'create')); ?>
          <div class="box-body">
            <div class="form-group">
              <?php echo $this->Form->input('Course.Name', array('div'=>false,'class'=>'form-control', 'placeholder' => 'Enter Course Name')); ?>
            </div>
            <div class="form-group">
              <label>Date:</label>
              <div class="input-group">
                <div class="input-group-addon">
                  <i class="fa fa-clock-o"></i>
                </div>
                <?php echo $this->Form->input('Course.date_time', array('div'=>false,'class'=>'form-control','placeholder' => 'Enter Date', 'label' => false , 'autocomplete'=>false)); ?>
              </div>
            </div>
            <div class="form-group">
              <?php echo $this->Form->input('Course.type1', array('options' => array('Free','Paid'),'class'=>'form-control','label'=>'Free or Paid')); ?>
            </div>
            <div class="form-group">
              <?php echo $this->Form->hidden('Course.type2', array('value'=>0)); ?>
            </div>
            
            <div class="form-group">
              <?php echo $this->Form->input('Course.location', array('div'=>false,'class'=>'form-control a_l_vald_key a_r_key', 'id' => 'pac-input', 'label' =>'Start location:', 'placeholder' => 'Enter your location')); ?>
              <div class="error a_l_vald_val" maxlength="1500"></div>  <br>
            </div>
            <?php echo $this->Form->hidden('Course.positions'); ?>
            <?php echo $this->Form->hidden('Course.longitude'); ?>
            <?php echo $this->Form->hidden('Course.latitude'); ?>
            
            
            <div class="form-group">
              <div class="col-md-4 col-sm-4 controls">
                <button type="button" class="score-control active" id="startButton">Start</button>
                <button type="button" class="score-control" id="controlButton">Control</button>
                <button type="button" class="score-control" id="finishButton">Finish</button>
                <button type="button" id="createLine">Generate Line</button>
                <input type="hidden" id="check_control" value="startButton"/>
                <table id="info-score" style="width:100%; margin-top: 8px;">
                  <tr>
                    <th>Control</th>
                    <th>Action</th>
                  </tr>
                </table>
                <label>Total Controls: </label>
                <span id="totalControls"></span>
              </div>
              <div class="col-md-8 col-sm-8">
                <div id="map"></div>
              </div>
            </div>
            
            <div class="form-group">
              <?php echo $this->Form->input('Course.objective', array('div'=>false,'class'=>'form-control', 'type' => 'textarea', 'placeholder' => 'Requirement/Objective')); ?>
            </div>
            <div class="form-group">
              <label>Select Rule Page</label>
              <select name="data[Course][rules_page]">
                <option value="0">Select Rule Page</option>
                <?php foreach($rulepages as $pages){ ?>
                <option value="<?php echo $pages['Page']['id'];?>"><?php echo $pages['Page']['title'];?></option>
                <?php }?>
              </select>
            </div>
            
            
            
          </div>
          
          <!-- /.box-body -->
          <div class="box-footer">
            <?php echo $this->form->Submit("Save",array('class'=>'btn btn-primary')); ?>
          </div>

          <div class="box-footer">
           <button class='btn btn-primary' onclick="window.location.href='<?php echo Router::url(array('controller'=>'courses', 'action'=>'index'))?>'" >Exit</button>
          </div>
          <?php echo $this->Form->end(); ?>
          </div><!-- /.box -->
        </div>
      </div>
    </section>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Enter Control ID</h4>
          </div>
          <form id="controlform" action="#">
            <div class="modal-body">
              
              <input name="controlid" id="controlid" type="text" placeholder="Enter Control Id" autocomplete="off" required/>
              
            </div>
            <span class="control_error" style="color:red"></span>
            <div class="modal-footer">
              <button type="button" id="closeScore" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Set</button>
            </div>
          </form>
        </div>
      </div>
    </div>
      <script>
    $(function() {
      var newDate = '';
    $('#CourseDateTime').datepicker({
    
      multidate: 2,
      multidateSeparator:' - ',
      format:"dd/mm/yyyy"
    
  
    }).on('changeDate', function(e) {
       if(e.dates.length == 2){
        if(e.dates[0] > e.dates[1]){
          var preDate = $('#CourseDateTime').val().split('-')
          newDate = preDate[1]+' - '+preDate[0];
          $('#CourseDateTime').val(newDate);
        }
       }
    }).on('hide',function(e){
      if(newDate != ''){
     $('#CourseDateTime').val(newDate);
   }
    });
    });
    </script>
    <script src="<?php echo $this->webroot.'js/front/jquery.validate.min.js';?>"></script>
    <script src="<?php echo $this->webroot.'js/backend/create_course_line.js';?>"></script>
    <style>
    .controls td , .controls tr {
    border: 1px solid;
    text-align: center;
    }
    .fa-remove{
    cursor: pointer;
    }
    </style>
