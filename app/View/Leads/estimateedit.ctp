
  <div class="warper container-fluid">
  <div class="page-header"><h1><?php echo $this->Html->link('Edit Invoice', array('controller' => 'Invoices', 'action' => 'add', 'admin' => true),array('escape' => FALSE)); ?></h1></div>
        <div class="row">
          
            <div class="col-md-9">
                
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Invoice</div>
                <div class="panel-body">
        
          <?php echo $this->Form->create('Invoice',array('controller'=>'invoices','action'=>'add')); ?>
          
          
          <div class="row">                 
            <div class="col-xs-12 col-sm-12">
            <div class="form-group">
             
            <?php echo $this->Form->input('Invoice.inv_number', array('div'=>false,'class'=>'form-control')); ?>
                   
            </div>
            </div>
          </div>
                    
        
        <div class="row">                 
            <div class="col-xs-12 col-sm-12">
            <div class="form-group">
            <label>Customer</label>
                    <?php echo $this->Form->input('Invoice.name', array('div'=>false,'class'=>'form-control','placeholder' => 'Start typing the customers name')); ?>
            </div>
            </div>
       </div>

       <div class="row">                 
            <div class="col-xs-12 col-sm-12">
            <div class="form-group">
      
                    <?php echo $this->Form->input('Invoice.status', array('div'=>false,'class'=>'form-control',)); ?>
            </div>
            </div>
       </div>

       <div class="row">                 
            <div class="col-xs-12 col-sm-12">
            <div class="form-group">
     
                    <?php echo $this->Form->input('Invoice.total', array('div'=>false,'class'=>'form-control')); ?>
            </div>
            </div>
       </div>

        
        <div class="row">                 
          <div class="col-xs-12 col-sm-12">
            
          
          <hr class="dotted">
            

            <div class="btn-group">
              <?php echo $this->Form->button('<i class="fa fa-plus"></i>Update Invoice', array('class' => 'btn btn-success pull-left')); ?>
            </div>
          </div>
        </div>
              
         </div>   
        <?php echo $this->Form->end(); ?>

      
          
        
               
      </div>
        
    </div>
</div>
</div>
        <!-- Page Plugins --> 


<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>


<script>
$(document).ready( function (){

$('select#get_data').on('change', function() {

var content = $('#get_data option:selected').text();
  //alert(content); 
 $('#get').val(content);
}); 
});
</script>
<!--<script>
$(document).ready(function(){
   $('#get_data').change(function(){
      var prd_id = $(this).val();
      //url: "/<?php $parentparentdir=basename(dirname(dirname(dirname(dirname(__FILE__)))));?>"
      //alert(url);
      var siteurl = '<?php echo SITEURL; ?>';
      //  alert(siteurl);
      //alert(siteurl);
            url= siteurl+'Invoices/Invoice';
          //  alert(url);
            $.post(url,
            {
                id: prd_id
            });
            success: function (data){
                $("#newDiv").html(data);}
         });
});
</script>



<script type="text/javascript">
  $(document).ready(function(){
    $('#get_data').change(function(){
      var prd_id = $(this).val();
      //alert(prd_id);
      $.ajax({
  
              type: "POST",
                url: "/<?php $parentparentdir=basename(dirname(dirname(dirname(dirname(__FILE__)))));
                    echo $parentparentdir; ?>/admin/Invoices/Invoice/",

                data: {"id": prd_id,

              success: function(data){
                    console.log(data);
                  $a=7000;
                    $("#newDiv").html($a);
                    

                    }
                }
          }); 

    });
  });



</script>>
-->


<script type="text/javascript">
$(document).ready(function(){
  $('#get_data').change(function(){
    var prd_id = $(this).val();
      //alert(prd_id);
      $.ajax({
            type: 'POST',
            url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/admin/Invoices/Invoice/",

         
            data: { id: prd_id },
          success: function(data) {
           $('#newDiv').html(jQuery(data).find('.result').html()); 
            //   alert("Success: " + data);
        //    $('#newDiv').html(data);    
           

          
           }
      });
  });
});



</script>


