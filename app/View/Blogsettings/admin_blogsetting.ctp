<?php
//pr($allprof);die();
?>
<section class="content">
    <div class="row">
      <div class="col-md-12">
       <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Blog Settings</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Professional Trainers</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
					<?php //echo '<pre>';print_r($allprof); die; ?>
                  <?php foreach($allprof as $prof){?>
                  <tr>
                  <td><?php echo $prof['User']['username'];?></td>
                  <td><input <?php if(empty($prof['Blogsetting'])){ echo 'checked';}?> data-toggle="toggle" type="checkbox" class="save1" id="<?php echo $prof['User']['id'];?>"></td> 
                   </tr>				  
                   <?php } ?>                
                    </tbody>
                  </table>
				  </div><!-- /.box-body -->
              </div><!-- /.box -->
			</div>
		</div>
	</section>
   <link href="<?php echo $this->webroot.'css/bootstrap-toggle.min.css';?>" rel="stylesheet">
  <script src="<?php echo $this->webroot.'js/bootstrap-toggle.min.js';?>"></script>

  <script>
  $(function () {
     $('.save1').change(function() {
        var val = $(this).prop('checked');
		var id = $(this).attr('id');
        $.ajax({                    
         url:"http://112.196.42.180:4098/timmurigu/admin/blogsettings/blogsetting?data="+val+"&id="+id,
		 type:"GET" 
       });
    });
  });
</script>
	
				 