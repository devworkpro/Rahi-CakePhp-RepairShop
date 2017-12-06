<?php echo $this->Flash->render('positive'); ?>
<div class="warper container-fluid" style="margin-bottom:100px;">
	<div class="btn btn-default btn-sm" id="create_pdf">Save PDF</div>
	 <div class="row form">
 		<div class="col-xs-1">
 		</div>
		<!-- <div class="col-xs-10 col-sm-10" style="background-image: url(/projects/repairshopsaas/repairshopsaas/img/certificate/certificate_background.gif); width: 100%; height: 100%; padding: 50px;"> -->
		<div class="col-xs-10 col-sm-10">
			<div style="padding:20px; border: 10px solid #787878;">

				<div style="padding:20px; border: 5px solid #787878;text-align:center;">

					<span class="pull-left" style="font-weight:bold">Date of Issuance: <?php echo $Warranty['0']['warranties']['created'];?></span>
					<span class="pull-right" style="font-weight:bold">Certificate Number:  <?php echo $Warranty['0']['warranties']['certificate_num'];?><br>
						Date of Expiration: <?php echo $Warranty['0']['warranties']['expiration_date'];?>
					</span>
					<br><br>
					<span style="font-size:50px;" class="pull-middle"><?php echo $Warranty['0']['warranties']['name'];?></span>
					       <br>
					<span style="font-size:50px; text-align:center;"><?php echo $Warranty['0']['users']['first_name'].' '.$Warranty['0']['users']['last_name'];?></span>
					<br><br>

					<i style=" padding:10px;"><?php echo $Warranty['0']['warranties']['warranty_information'];?></i>

					<br><br>
					<span class="pull-left"><?php echo $this->Session->read('Auth.User.business_name');?></span>
					<span class="pull-right">Signed,</span><br>
					<span class="pull-right" style="font-size:20px; font-weight:bold"><?php echo $this->Session->read('Auth.User.first_name');?></span><br>
					
				</div>
			</div>
		</div>
		<div class="col-xs-1">
 		</div>
    </div> 
</div>


<!-- PDF scripts -->

<script type="text/javascript" src="//cdn.rawgit.com/MrRio/jsPDF/master/dist/jspdf.min.js"></script> 

<script type="text/javascript" src="//cdn.rawgit.com/niklasvh/html2canvas/0.5.0-alpha2/dist/html2canvas.min.js"></script>

<script type="text/javascript" >    (function(){
    var 
     form = $('.form'),
     cache_width = form.width(),
     a4  =[ 595.28,  841.89];  // for a4 size paper width and height
     
    $('#create_pdf').on('click',function(){
     //$('body').scrollTop(0);
     createPDF();
     //$('#myModal').hide();


    });
    //create pdf
    function createPDF(){
     getCanvas().then(function(canvas){
      var 
      img = canvas.toDataURL("image/png"),
      doc = new jsPDF({
              unit:'px', 
              format:'a4'
            });     
            doc.addImage(img, 'JPEG', 20, 20);
            doc.save('certificate.pdf');
            form.width(cache_width);
            location.reload();
     });
    }
     
    // create canvas object
    function getCanvas(){
     form.width((a4[0]*1.33333) -80).css('max-width','none');
     return html2canvas(form,{
         imageTimeout:2000,
         removeContainer:true
        }); 
    }
     
    }());

</script>
