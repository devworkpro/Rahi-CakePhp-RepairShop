        <footer class="container-fluid footer">
        	
            <a href="#" class="pull-right scrollToTop"><i class="fa fa-chevron-up"></i></a>
        </footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>	

    <!-- Include Date Range Picker -->
<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>

	<!--datepicker-->
	 <script src="<?php echo $this->webroot.'Plugins/datepicker/bootstrap-datepicker.js';?>"></script>
<!--datetimepicker-->

	 <script src="<?php echo $this->webroot.'js/plugins/bootstrap-datetimepicker/bootstrap-datetimepicker.js';?>"></script>


	<!--djfkdjifo-->	 

	 <script src="<?php echo $this->webroot.'New-intergrated-files/js/bootstrap.min.js';?>"></script>

	<!--  <script src="<?php echo $this->webroot.'New-intergrated-files/js/demo-charts.js';?>"></script> -->

	<!--  <script src="<?php echo $this->webroot.'New-intergrated-files/js/demo-vectorMap.js';?>"></script> -->

	<!--  <script src="<?php echo $this->webroot.'New-intergrated-files/js/dx.chartjs.js';?>"></script> --> 

	 <script src="<?php echo $this->webroot.'New-intergrated-files/js/globalize.min.js';?>"></script>
	 
	 <script src="<?php echo $this->webroot.'New-intergrated-files/js/jquery.nicescroll.min.js';?>"></script>
	 
	<!--  <script src="<?php echo $this->webroot.'New-intergrated-files/js/jquery.sparkline.min.js';?>"></script> -->

	 <script src="<?php echo $this->webroot.'New-intergrated-files/js/todo.js';?>"></script>

	 <script src="<?php echo $this->webroot.'New-intergrated-files/js/underscore-min.js';?>"></script>

	<!--  <script src="<?php echo $this->webroot.'New-intergrated-files/js/world.js';?>"></script> -->

	<!-- <script src="<?php echo $this->webroot.'New-intergrated-files/js/jquery.validate.min.js';?>"></script> -->
	 <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.0-beta.14/angular.min.js"></script>
	 
	 <!-- Calendar JS -->
	<!--<script src="<?php echo $this->webroot.'New-intergrated-files/js/calendar.js';?>"></script> -->

    <!-- Calendar Conf -->
	<!--<script src="<?php echo $this->webroot.'New-intergrated-files/js/calendar-conf.js';?>"></script> -->

	
    
    
    <!-- Custom JQuery -->
	
	<script src="<?php echo $this->webroot.'New-intergrated-files/js/custom.js';?>"></script>



<script src="<?php echo $this->webroot.'Plugins/datatables/jquery.dataTables.min.js';?>"></script>
<script src="<?php echo $this->webroot.'Plugins/datatables/dataTables.bootstrap.min.js';?>"></script>



	<!-- Bootstrap Validator -->
	<?php echo $this->Html->script('plugins/bootstrap-validator/bootstrapValidator.min.js'); ?>	
	<?php echo $this->Html->script('plugins/bootstrap-validator/bootstrapValidator-conf.js'); ?>



  <script>
      $(function () {
        $('#k_userlist').DataTable();
      });
    </script>

	


<script src="https://use.fontawesome.com/64526f9cfb.js"></script>
    
    
	<!-- Data Table -->
    <script src="<?php echo $this->webroot.'assets/js/plugins/datatables/jquery.dataTables.js';?>"></script>
    <script src="<?php echo $this->webroot.'assets/js/plugins/datatables/DT_bootstrap.js';?>"></script>
    <script src="<?php echo $this->webroot.'assets/js/plugins/datatables/jquery.dataTables-conf.js';?>"></script>
    
    <!-- TagsInput -->
	<?php echo $this->Html->script('plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js'); ?>	
   
	 
	 <!--foijoifjoisfjsjfsifois-->
	 <!--foijoifjoisfjsjfsifois-->
	 <!--foijoifjoisfjsjfsifois-->
	 
	 <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
    
    ga('create', 'UA-56821827-1', 'auto');
    ga('send', 'pageview');
    
    </script>

		
		
		
<?php /* ?>
<footer class="hm_pg">
	<div class="container">
		<div class="col-xs-12 col-sm-12 col-lg-12">
			<div class="col-sm-12 col-sm-12 col-md-6">
				<div class="ftr_lft">
					<ul>
					<li><a href="#">Privacy Policy</a></li>
					<li><a href="#">Disclaimer</a></li>
					<li><a href="#">Terms and conditions</a></li>
					</ul>
				</div><!--ftr_lft-->
			</div><!--col-sm-12 col-sm-12 col-md-6-->
			<div class="col-sm-12 col-sm-12 col-md-6">
				<div class="ftr_ryt">
					<ul>
					
					</ul>
				</div><!--ftr_ryt-->
			</div><!--col-sm-12 col-sm-12 col-md-6-->
		</div><!--col-sm-12 col-sm-12 col-md-12-->
	</div><!--container-->
</footer>
<?php */ ?>


<script>
	
  $(document).ready(function() {
  
  $('#show').click(function() {
  var th = $(this).parent('.slide-out');
 th.toggleClass('ease_it');
  th.children('.tbbr').toggleClass('hide_it');
});

/*
	$('#show').toggle(function () {
		$(this).parent('.slide-out').animate({width: '250px'}, "slow");
	},function () {
		$(this).parent('.slide-out').animate({width: '50px'}, "slow");
	});
*/	
/*
       $("#hide").click(function(){
         // $(".tbbr").hide( "slide",    { direction: "right"  }, 500 );
					   $('.slide-out').animate({width: '50px'}, "slow");
       });

       $("#show").click(function(){
          //$(".tbbr").show( "slide", {direction: "right" }, 500 );
					   $('.slide-out').animate({width: '250px'}, "slow");
       });
*/
    });
    </script>


	<script>
	
  $(document).ready(function() {
  
  $('#show_cnt').click(function() {
  var th = $(this).parent('.slide-out2');
 th.toggleClass('ease_it');
  th.children('.tbbr').toggleClass('hide_it');
});

/*
	$('#show').toggle(function () {
		$(this).parent('.slide-out').animate({width: '250px'}, "slow");
	},function () {
		$(this).parent('.slide-out').animate({width: '50px'}, "slow");
	});
*/	
/*
       $("#hide").click(function(){
         // $(".tbbr").hide( "slide",    { direction: "right"  }, 500 );
					   $('.slide-out').animate({width: '50px'}, "slow");
       });

       $("#show").click(function(){
          //$(".tbbr").show( "slide", {direction: "right" }, 500 );
					   $('.slide-out').animate({width: '250px'}, "slow");
       });
*/
    });
    </script>



<script type="text/javascript">
$(document).ready(function(){
var m=$(window).height() - $("header").height() - $("footer").height() - 35;
$(".option_two").height(m) ;

$( window ).resize(function () {
var m=$(window).height() - $("header").height() - $("footer").height() - 35;
$(".option_two").height(m) ;
});

});
</script>


<!--pdf creating files-->

  <?php echo $this->Html->css('pdf/semantic.min.css'); ?>


  


<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</body>
</html>