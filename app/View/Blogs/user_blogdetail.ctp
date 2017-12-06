<body>
<div id="wrapper">
<div class="container">
</div>
<section class="blog_detail">
<div class="container">
<div class="blg_content">

<h3>Blog Detail: </h3>

<div class="blg">
<div class="col-xs-12 col-sm-3">
<div class="blg_lft">
<img src="images/blog1.png" alt="blog image">
</div>
</div>

<div class="col-xs-12 col-sm-9">
<div class="blg_ryt">
<strong><?php echo $data['Blog']['title']; ?> </strong>

<p><?php echo $data['Blog']['description']; ?></p>
</div>
</div>

</div>




</div>

<div class="comment">
<strong>Comments: </strong>
<div class="cmnt_list">
<p class="blog5_img"><strong>30. Mike</strong>Lorem Ipsum is simply dummy text </p>
<p class="blog6_img"><strong>27. John</strong>Lorem Ipsum is simply dummy text</p>
<p class="blog7_img"><strong>01. Anon</strong>Lorem Ipsum is simply dummy text </p>
</div>
<strong>Your Comments: </strong>
<textarea rows="7" class="form-control" placeholder="Write your Comment here..."></textarea>

<div class="blg_btn">
<!--<a href="#" class="btn_lft">Return To Blog Page</a><a href="#" class="btn_ryt">SEND</a>-->
<button type="button" class="btn btn-primary btn_lft">Return To Blog Page</button>
<button type="button" class="btn btn-primary btn_ryt">SEND</button>
</div>


</div>
	
	
	
	
	
	
	
	
	
	
	
	
	
</section>
