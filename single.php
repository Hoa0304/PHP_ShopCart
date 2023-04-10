<?php 
session_start();
include_once("model/giay.php"); ?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Free Adidas Website Template | Single :: w3layouts</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/form.css" rel="stylesheet" type="text/css" media="all" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$(".dropdown img.flag").addClass("flagvisibility");

			$(".dropdown dt a").click(function() {
				$(".dropdown dd ul").toggle();
			});

			$(".dropdown dd ul li a").click(function() {
				var text = $(this).html();
				$(".dropdown dt a span").html(text);
				$(".dropdown dd ul").hide();
				$("#result").html("Selected value is: " + getSelectedValue("sample"));
			});

			function getSelectedValue(id) {
				return $("#" + id).find("dt a span.value").html();
			}

			$(document).bind('click', function(e) {
				var $clicked = $(e.target);
				if (! $clicked.parents().hasClass("dropdown"))
					$(".dropdown dd ul").hide();
			});


			$("#flagSwitcher").click(function() {
				$(".dropdown img.flag").toggleClass("flagvisibility");
			});
		});
	</script>
	<!-- start menu -->     
	<link href="css/megamenu.css" rel="stylesheet" type="text/css" media="all" />
	<script type="text/javascript" src="js/megamenu.js"></script>
	<script>$(document).ready(function(){$(".megamenu").megamenu();});</script>
	<!-- end menu -->
	<script type="text/javascript" src="js/jquery.jscrollpane.min.js"></script>
	<script type="text/javascript" id="sourcecode">
		$(function()
		{
			$('.scroll-pane').jScrollPane();
		});
	</script>
	<!----details-product-slider--->
	<!-- Include the Etalage files -->
	<link rel="stylesheet" href="css/etalage.css">
	<script src="js/jquery.etalage.min.js"></script>
	<!-- Include the Etalage files -->
	<script>
		jQuery(document).ready(function($){
			
			$('#etalage').etalage({
					thumb_image_width: 300,
					thumb_image_height: 400,

				show_hint: true,
				click_callback: function(image_anchor, instance_id){
					alert('Callback example:\nYou clicked on an image with the anchor: "'+image_anchor+'"\n(in Etalage instance: "'+instance_id+'")');
				}
			});
							// This is for the dropdown list example:
							$('.dropdownlist').change(function(){
								etalage_show( $(this).find('option:selected').attr('class') );
							});

						});
					</script>
					<!----//details-product-slider--->	
					<!-- top scrolling -->
					<script type="text/javascript" src="js/move-top.js"></script>
					<script type="text/javascript" src="js/easing.js"></script>
					<script type="text/javascript">
						jQuery(document).ready(function($) {
							$(".scroll").click(function(event){		
								event.preventDefault();
								$('html,body').animate({scrollTop:$(this.hash).offset().top},1200);
							});
						});
					</script>					
				</head>
				<body>
					<?php 
					if (isset($_REQUEST['mg'])) {
						$mg   = $_REQUEST['mg'];
					}
					?>
					<?php 
					include_once("menu.php"); ?>
					<div class="single">
						<div class="wrap">
							<div class="rsidebar span_1_of_left">
								<section  class="sky-form">
									<h4>Category</h4>
									<div class="row row1 scroll-pane">
										<div class="col col-4">
											<label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i></i>Adidas Fast</label>
										</div>
										<div class="col col-4">
											<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Athletic Shoes</label>
											<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Moden Shoes</label>
											<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Heels</label>
											<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Other</label>
										</div>
									</div>
									
								</section>	
							</div>
							<?php $lsGiay = giay::getListDB(); 
							foreach ($lsGiay as $giay) {
								if($mg==$giay->IDGiay){
									?>
									<div class="cont span_2_of_3">
										<div class="labout span_1_of_a1">
											<!-- start product_slider -->

											<ul id="etalage">
												<?php $lsImg = giay::getListImg($mg);
												foreach ($lsImg as $value) {
													?>
													<li>
														<img class="etalage_thumb_image" src="img/<?php echo $value; ?>" />
														<img class="etalage_source_image" src="img/<?php echo $value; ?>" />
													</li>
													<?php 
												} ?>
											</ul>

											<!-- end product_slider -->
										</div>
										<div class="cont1 span_2_of_a1">
											<h3 class="m_3"><?php echo $giay->tenGIay; ?></h3>

											<div class="price_single">
												<span class="reducedfrom">$<?php echo $giay->giaAo; ?></span>
												<span class="actual">$<?php echo $giay->giaThuc; ?></span>
											</div>
											<div class="btn_form">
												<a href="checkout.php?mg=<?php echo $giay->IDGiay; ?>" title="">
												
													<input type="submit" value="buy now" title="">
												
												</a>
											</div>
											<p class="m_desc"><?php echo $giay->productDetails; ?></p>

											<div class="social_single">	
												<ul>	
													<li class="fb"><a href="#"><span> </span></a></li>
													<li class="tw"><a href="#"><span> </span></a></li>
													<li class="g_plus"><a href="#"><span> </span></a></li>
													<li class="rss"><a href="#"><span> </span></a></li>		
												</ul>
											</div>
										</div>
										<div class="clear"></div>
										<ul id="flexiselDemo3">
											<?php $lsGiay2 = giay::getListDB(); 
											foreach ($lsGiay2 as $giay2) { ?>
												<li><a href="single.php?mg=<?php  echo $giay2->IDGiay; ?>" title=""><img src="img/<?php echo $giay2->anhDemo ?>" /><div class="grid-flex"><a href="single.php?mg=<?php  echo $giay2->IDGiay; ?>"><?php echo $giay2->tenGIay; ?></a><p><?php echo $giay2->giaThuc; ?></p></div></a></li>

											<?php } ?>
										</ul>
										<script type="text/javascript">
											$(window).load(function() {
												$("#flexiselDemo1").flexisel();
												$("#flexiselDemo2").flexisel({
													enableResponsiveBreakpoints: true,
													responsiveBreakpoints: { 
														portrait: { 
															changePoint:480,
															visibleItems: 1
														}, 
														landscape: { 
															changePoint:640,
															visibleItems: 2
														},
														tablet: { 
															changePoint:768,
															visibleItems: 3
														}
													}
												});

												$("#flexiselDemo3").flexisel({
													visibleItems: 5,
													animationSpeed: 1000,
													autoPlay: true,
													autoPlaySpeed: 3000,    		
													pauseOnHover: true,
													enableResponsiveBreakpoints: true,
													responsiveBreakpoints: { 
														portrait: { 
															changePoint:480,
															visibleItems: 1
														}, 
														landscape: { 
															changePoint:640,
															visibleItems: 2
														},
														tablet: { 
															changePoint:768,
															visibleItems: 3
														}
													}
												});

											});
										</script>
										<script type="text/javascript" src="js/jquery.flexisel.js"></script>
									</div>
								<?php } }?>
								<div class="clear"></div>
							</div>
						</div>
						<?php include_once("footer.php");  ?>