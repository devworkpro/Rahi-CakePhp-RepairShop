				<div class="page-footer"  style="background-color: #292929; position: fixed;">
                    <div class="container"  style="color: #fff;">
                        <p class="no-s">
                        <span>
                        <?php 
                        if($this->Session->read('Auth.User.id')!='')
                        {   
                         echo '- '.$this->Session->read('Auth.User.first_name').' '.$this->Session->read('Auth.User.last_name').' - '.$this->Session->read('Auth.User.address').', '.$this->Session->read('Auth.User.city').' '.$this->Session->read('Auth.User.state_country').' '.$this->Session->read('Auth.User.zip');
                        }
                        else{
                        ?>   
                            <p class="text-center no-s">2017 &copy; Repair Shoppe.</p>
                        <?php
                        }
                        ?> 
                        </span>
                        </p>
                    </div>
                </div><!-- Page Inner -->
        		
        <!-- Javascripts -->
        <script src="<?php echo $this->webroot.'Plugins/jquery-ui/jquery-ui.min.js'?>"></script>

        <script src="<?php echo $this->webroot.'Plugins/pace-master/pace.min.js'?>"></script>
        <script src="<?php echo $this->webroot.'Plugins/jquery-blockui/jquery.blockui.js'?>"></script>
        <script src="<?php echo $this->webroot.'Plugins/bootstrap/js/bootstrap.min.js'?>"></script>
        <script src="<?php echo $this->webroot.'Plugins/jquery-slimscroll/jquery.slimscroll.min.js'?>"></script>
        <script src="<?php echo $this->webroot.'Plugins/switchery/switchery.min.js'?>"></script>
        <script src="<?php echo $this->webroot.'Plugins/uniform/jquery.uniform.min.js'?>"></script>
        <script src="<?php echo $this->webroot.'Plugins/classie/classie.js'?>"></script>
        <script src="<?php echo $this->webroot.'Plugins/waves/waves.min.js'?>"></script>
        <script src="<?php echo $this->webroot.'Plugins/3d-bold-navigation/js/main.js'?>"></script>
        <script src="<?php echo $this->webroot.'Plugins/waypoints/jquery.waypoints.min.js'?>"></script>
        <script src="<?php echo $this->webroot.'Plugins/jquery-counterup/jquery.counterup.min.js'?>"></script>
        
        <script src="<?php echo $this->webroot.'js/modern.min.js'?>"></script>
        <script src="<?php echo $this->webroot.'Plugins/pricing-tables/js/main.js'?>"></script>    
        <script src="<?php echo $this->webroot.'Plugins/toastr/toastr.min.js'?>"></script>
        <script src="<?php echo $this->webroot.'Plugins/flot/jquery.flot.min.js'?>"></script>
        <script src="<?php echo $this->webroot.'Plugins/flot/jquery.flot.time.min.js'?>"></script>
        <script src="<?php echo $this->webroot.'Plugins/flot/jquery.flot.symbol.min.js'?>"></script>
        <script src="<?php echo $this->webroot.'Plugins/flot/jquery.flot.resize.min.js'?>"></script>
        <script src="<?php echo $this->webroot.'Plugins/flot/jquery.flot.tooltip.min.js'?>"></script>
        <script src="<?php echo $this->webroot.'Plugins/curvedlines/curvedLines.js'?>"></script>
        <script src="<?php echo $this->webroot.'Plugins/metrojs/MetroJs.min.js'?>"></script>
       	<script src="<?php echo $this->webroot.'Plugins/twitter-bootstrap-wizard/jquery.bootstrap.wizard.min.js'?>"></script>
        <script src="<?php echo $this->webroot.'Plugins/jquery-validation/jquery.validate.min.js'?>"></script>
        <script src="<?php echo $this->webroot.'js/pages/form-wizard.js'?>?>"></script>

        <script src="<?php echo $this->webroot.'js/dashboard.js'?>"></script>

        <script src="<?php echo $this->webroot.'Plugins/summernote-master/summernote.min.js'?>"></script>
        <!--datepicker-->
        <script src="<?php echo $this->webroot.'Plugins/bootstrap-datetimepicker/bootstrap-datetimepicker.js';?>"></script> 

        <script src="<?php echo $this->webroot.'Plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js'?>"></script>
        

        <script src="<?php echo $this->webroot.'Plugins/pricing-tables/js/main.js'?>"></script>

        
           

    </body>
</html>