<input type= "hidden" value="http://112.196.42.180:4134/repairshopsaas/" id="baseurl">
<input type= "hidden" value="http://112.196.42.180:4134/repairshopsaas/" id="siteurl">
<script src="<?php echo $this->webroot.'Plugins/jQuery/jQuery-2.1.4.min.js';?>"></script>
<?php echo $scripts;?>
<section class="home_sec current">
	<div class="course_type" style="opacity:1">
		<div class="container">
			<div class="row">
			<?php echo $joinedScript;?>
			<div style="height:1200px;width:100%;" id="map"></div>
					
					<div style="width:461px;height:272px;" id="map1"></div>
				<?php echo $this->Form->hidden('positions',array('id'=>'CoursePositions','value'=>$courseDetail['Course']['positions']));?>
				
			</div>
		</div>
	</div>
</section>
  <div  class="loading_img">
<img src="<?php echo $this->webroot.'img/downloading.gif';?>">
Saving PDF
</div> 
            <style type="text/css">
              .loading_img {
                  float: none;
                  left: 0;
                  margin: 0 auto;
                  position: absolute;
                  right: 0;
                  text-align: center;
                  top: 200px;
                  width: 100%;
                  z-index: 999;
                }

                .gmnoprint {
    opacity: 1 !important;
    overflow: unset !important;
}
 .labels {
  color: red;
  font-family: "Lucida Grande", "Arial", sans-serif;
  font-size: 15px;
  text-align: center;
  width: 55px;
  white-space: nowrap;
}
.start , .finish {
  color: red;
  font-family: "Lucida Grande", "Arial", sans-serif;
  font-size: 15px;
  text-align: center;
  white-space: nowrap;
}
.score {
    font-size: 10px;
}
                </style>


<script src="<?php echo $this->webroot.'js/backend/MarkerWithLabel.js';?>"></script>
<script src="<?php echo $this->webroot.'js/backend/html2canvas.js';?>"></script>
<script src="<?php echo $this->webroot.'js/front/canvas2image.js';?>"></script>
<script>
var cid = '<?php echo $courseDetail["Course"]["id"]?>';
function explode(){
  var transform = $("#map .gm-style>div:first>div").css("transform")
    var comp = transform.split(",") //split up the transform matrix
    var mapleft = parseFloat(comp[4]) //get left value
    var maptop = parseFloat(comp[5]) //get top value
    $("#map .gm-style>div:first>div").css({ //get the map container. not sure if stable
        "transform": "none",
        "left": mapleft,
        "top": maptop,
    })
    html2canvas($('#map'), {
        useCORS: true,
        onrendered: function(canvas) {

            var siteurl = $('#siteurl').val();
            var dataUrl = canvas.toDataURL('image/png', 1.0);
            $.ajax({
                url: siteurl + 'courses/create_courseImage/',
                type: 'POST',
                data: {
                    basecode: dataUrl.split(',')[1],
                    courseID: cid
                },
            })
                .done(function(cid) {
                 //   window.location = siteurl + 'courses/create_coursePDF/' + cid;
                });
        }
    });
   
}

function explode1(){
  var transform = $("#map1 .gm-style>div:first>div").css("transform")
    var comp = transform.split(",") //split up the transform matrix
    var mapleft = parseFloat(comp[4]) //get left value
    var maptop = parseFloat(comp[5]) //get top value
    $("#map1 .gm-style>div:first>div").css({ //get the map container. not sure if stable
        "transform": "none",
        "left": mapleft,
        "top": maptop,
    })
    html2canvas($('#map1'), {
        useCORS: true,
        onrendered: function(canvas) {

            var siteurl = $('#siteurl').val();
            var dataUrl = canvas.toDataURL('image/png', 1.0);
            $.ajax({
                url: siteurl + 'courses/create_courseImageE/',
                type: 'POST',
                data: {
                    basecode: dataUrl.split(',')[1],
                    courseID: cid
                },
            })
                .done(function(cid) {
                  //  window.location = siteurl + 'courses/create_coursePDF/' + cid;
                });
        }
    });
   
}
setTimeout(explode1, 5000);
setTimeout(explode, 5000);
</script>
