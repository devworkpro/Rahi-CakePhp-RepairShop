<section class="content">
    <div class="row">
      <div class="col-md-12">



      <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Request Courses</h3>
                </div><!-- /.box-header -->
                <div class="box-body">

  
<table id="courseTable" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Location</th>      
                        <th>Messages</th> 
                        <th>Action</th>                   
                      </tr>
                    </thead>
                    <tbody class="userdata">
                    <?php //echo '<pre>';print_r($data);die ?>
                    <?php foreach($data as $courses) {?>
                      <tr>
                      <td class="mailbox-name">

                        <?php echo $this->Html->link($courses['User']['first_name'].' '.$courses['User']['surname'], array('controller' =>'courses' , 'action'=>'read', $courses['RequestCourse']['user_id'])); ?>


                        <!--?php if($courses['User']['first_name']){echo $courses['User']['first_name'].' '.$courses['User']['surname'];}else{echo 'Unregistered user';} ?--></td>


                      <td class="mailbox-subject">  

                        <?php echo $this->Html->link($courses['RequestCourse']['location'],array('controller' =>'courses' , 'action'=>'read', $courses['RequestCourse']['user_id'])); ?>
<!--?php echo $courses['RequestCourse']['location']; ?-->
                      </td-->        
                      

                      <td>
                        <?php echo $this->Html->link($courses['RequestCourse']['message'],array('controller' =>'courses' , 'action'=>'read', $courses['RequestCourse']['user_id'])); ?>
                        <!--?php echo $courses['RequestCourse']['about']; ?-->

                      </td>
                      <td><!--button email="<!?php echo $courses['RequestCourse']['email']; ?>" type="button" class="reply">
                        
  Reply
</button-->
                      <?php echo $this->Html->link( '<i class="fa fa-trash-o"></i>' , array('controller' => 'courses', 'action' => 'deleterequest',$courses['RequestCourse']['id']),array('escape'=>false, 'confirm' => 'Are you sure you want to delete this ?') ); ?></td>
                      </tr>    
                   <?php } ?>                 
                    </tbody>
                  </table>

          
                
                </div><!-- /.box-body -->
              </div><!-- /.box -->
      </div>
    </div>
  </section>
 <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <?php echo $this->Form->create('RequestCourse', array('method' => 'post','action'=>'send')); ?>
      <div class="modal-body">
        <h4 class="modal-title" id="myModalLabel">Message</h4>
       
        <input type="hidden" name="email" id="myModal.email" value="">
        <?php echo $this->Form->textarea('myModal.Message');?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="btn">Save changes</button>
      </div>

       <?php echo $this->Form->end(); ?>

    </div>
  </div>
</div>
   <script src="<?php echo $this->webroot.'Plugins/datatables/jquery.dataTables.min.js';?>"></script>
  <script src="<?php echo $this->webroot.'Plugins/datatables/dataTables.bootstrap.min.js';?>"></script>
   <link rel="stylesheet" href="<?php echo $this->webroot.'Plugins/datatables/dataTables.bootstrap.css';?>">
<script>
      $(function () {
        $('#courseTable').DataTable();
      });
    </script>

<script>
 $('#btn').click(function(event) {
       form = $("#RequestCourseSendForm").serialize();

     $.ajax({
       type: "POST",
           data: form,

       success: function(data){
           $('.modal').modal('hide');
           $(".success").fadeIn(500).delay(2000).fadeOut(500);
           $("#RequestCourseSendForm")[0].reset();
           //Unterminated String constant fixed
       }

     });
     event.preventDefault();
     return false;  //stop the actual form post !important!

  });


 $('.reply').click(function(){
$('#myModal').modal('show'); 
console.log($(this).attr('email'));


 });
  
  
</script>




 <style>
#myModalMessage{
  width: 570px; height: 105px;
}
</style>