<body>
<div id="wrapper">

<section class="blog">
<div class="container">
<div class="blg_content">
<h3>Blogs </h3>

<?php foreach($daata as $data) { ?>
<div class="blg">
<div class="col-xs-12 col-sm-3">
<div class="blg_lft">

<img src="<?php echo $this->webroot . 'img/blog_image/small/'.$data['Blog']['image']; ?>" alt="blog image" />
</div><!-- blg_lft -->
</div>

<div class="col-xs-12 col-sm-9">
<div class="blg_ryt">
<strong> <?php echo $data['Blog']['title']; ?> </strong>
<p> <?php echo $data['Blog']['description']; ?> <a href="#"> Read More >></a></p>
</div><!-- blg_ryt -->
</div>
</div>



<?php  }  ?>
</body>
</html>
