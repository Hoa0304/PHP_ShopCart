<?php  include_once("model/giay.php");
include_once("heade.php"); ?>
<!-- Slide gallery -->

<div class="jumbotron" style="padding: 0 ;overflow: hidden;"> 
	<div class="container">
		<div class="col-xs-12">
			<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
				<!-- Indicators -->
				<ol class="carousel-indicators">
					<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
					<li data-target="#carousel-example-generic" data-slide-to="1"></li>
					<li data-target="#carousel-example-generic" data-slide-to="2"></li>
				</ol>
				<!-- Wrapper for slides -->
				<div class="carousel-inner">
					<div class="item active">
						<img src="img/carousel1.jpg" alt="">
						<div class="carousel-caption">
						</div>
					</div>
					<div class="item">
						<img src="img/carousel2.jpg" alt="">
						<div class="carousel-caption">
						</div>
					</div>
					<div class="item">
						<img src="img/carousel3.jpg" alt="">
						<div class="carousel-caption">
						</div>
					</div>
				</div>
				<!-- Controls -->
				<a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
					<span class="glyphicon glyphicon-chevron-left"></span>
				</a>
				<a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
					<span class="glyphicon glyphicon-chevron-right"></span>
				</a>
			</div>
		</div>
	</div><!-- End Slide gallery -->
</div>

<!-- Thumbnails -->
<div class="container thumbs">
	<?php $lstin = tin::getListDB();
	foreach ($lstin as $value) {
		?>
		<div class="col-sm-6 col-md-4" style="overflow: hidden">
			<div class="thumbnail thumbnailpost">
				<div style="width: 100%;
				height: 300px;
				transition: all 0.3s;
				display: flex;
				justify-content: center;
				align-items: center;
				background: aqua;">
				<img style="    margin: 0 auto;" src="admin/img_upload/<?php echo $value->AnhTin; ?>" alt="" class="img-responsive">
			</div>
			<div class="caption">
				<h3 class="" style="font-size: 20px;
				color: brown;
				font-weight: 700;
				height: 55px;
			}"><?php echo $value->TenTin; ?></h3>
			<p style="font-size: 82%;
			color: chocolate"><?php echo $value->NgayDang; ?></p>
			<p style="    height: 100px;
			overflow: hidden;"><?php echo $value->TomTat; ?></p>
			<div class="btn-toolbar text-center">
				<a href="singlepost.php?maSingle=<?php echo $value->MaTin ?>" role="button" class="btn btn-primary pull-right" style="padding: 3% 4%; border: 0; margin: 0 auto" >Details</a>
			</div>
		</div>
	</div>
</div>
<?php 	} ?>

<!-- Content -->

<!-- Footer -->

<script src="js/jquery.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
<script src="js/bootshape.js"></script>
</body>
</html>
