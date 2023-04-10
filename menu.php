<?php include_once("model/giay.php"); 
if (isset($_POST['search'])) {
	$search= $_POST['search'];
	$kqa=tin::liveSearch($search);
	echo $kqa;
} ?>

<div class="header-top">
	<div class="wrap"> 
		<div class="logo">
			<a href="index.php"><img src="images/logo.png" alt=""/></a>
		</div>
		<div class="cssmenu">
			<ul>
				<li >
					<div class="d-flex" style="border: 1px solid aquamarine;
    border-radius: 10px;
    height: 30px;
    z-index: 1000;
    padding: 2px 18px;">
					<i class="fas fa-search" aria-hidden="true"></i>
					<input style="height: 20px;
					border: 0;" class="form-control form-control-sm ml-3 w-75" id="search_live" type="text" placeholder="Search">
				</div>

				<div class="result">
				</div>
			</li>
			<li class="active"><a href="post.php">Post</a></li> 
			<li><a href="shop.php">Store Locator</a></li> 
			<li><a href="login.php">My Account</a></li> 
			<li><a href="checkout.php"><i class="fas fa-cart-plus"></i> Bag <span class="text-danger">(<?php if (isset($_SESSION["bag"]) &&count($_SESSION["bag"])!=0) {
				$listbag=$_SESSION["bag"]; echo count($listbag);
			}else{echo 'empty';}  ?>)</span></a></li> 
			
		</ul>
	</div>
	<div class="clear"></div>
</div>
</div>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
<script>
	$(document).ready(function(){
		$(window).scroll(function(event) {
			var height = $(window).scrollTop();
			// console.log(height);
			if (height >120) {
				$(".header-top").addClass('sticky');
			}
			else {
				$(".header-top").removeClass('sticky');
			}
		});
		var flaq=0;
		$('#search_live').keyup(function() {
			$('.result').addClass('d-block');
			var text= $(this).val();
			if (text !='') {
				$.ajax({
					url: 'menu.php',
					type: 'post',
					dataType: 'text',
					data: {search: text},
					success:function(data){
						$('.result').html(data);
					}
				})
			}
		}).focus(function() {
			$('.result').addClass('d-block');
		}).click(function(event) {
			flaq=1;
		});
		$('.result li.d-block').click(function() {
			flaq=1;
		});

		$('body').click(function() {
			if (flaq != 1) {
				$('.result').removeClass('d-block');
			}
			flaq=0
		});
	});
</script>
<style >
	.dark-mode{
		background: #987474;
		color: #FFF;
	}
	.result {
		position: absolute;
		z-index: 1000;
		padding: 10px;
		background: #ffffff;
		border-radius: 9px;
		border: 1px solid #dadada;
		left: 41%;
		width: 30%;
		color: dimgrey;
		margin-top: 6px;
		display: none;
		box-shadow: 4px 6px 9px #dadada;
	}
	.result .header-top {
		display: none;
	}
	.d-block{
		display: block !important;
	}
	input#search_live {
		border: none;
	}
	input#search_live:focus{
		outline: none;
	}
	.result:before{
		content: "";
		position: absolute;
		width: 0;
		height: 0;
		border-bottom: 10px solid transparent;
		border-top: 10px solid transparent;
		border-left: 10px solid #dadada;
		top: -15px;
		transform: rotate(-90deg);
		left: 3%;;
	}
	li.d-block.search_live a {
		color: brown;
		padding: 5px 0;
		text-transform: none;
		font-size: 14px;
	}
	li.d-block.search_live:hover {
		margin-left: 10px;
		transition: 0.3s;
	}
	li.d-block.search_live:hover  a{
		font-size: 15px;
	}
	.switch {
		position: relative;
		display: inline-block;
		width: 60px;
		height: 34px;
	}

	.switch input { 
		opacity: 0;
		width: 0;
		height: 0;
	}

	.slider {
		position: absolute;
		cursor: pointer;
		top: 0;
		left: 0;
		right: 0;
		bottom: 0;
		background-color: #ccc;
		-webkit-transition: .4s;
		transition: .4s;
	}

	.slider:before {
		position: absolute;
		content: "";
		height: 26px;
		width: 26px;
		left: 4px;
		bottom: 4px;
		background-color: white;
		-webkit-transition: .4s;
		transition: .4s;
	}

	input:checked + .slider {
		background-color: #000;
	}

	input:focus + .slider {
		box-shadow: 0 0 1px #2196F3;
	}

	input:checked + .slider:before {
		-webkit-transform: translateX(26px);
		-ms-transform: translateX(26px);
		transform: translateX(26px);
	}

	/* Rounded sliders */
	.slider.round {
		border-radius: 34px;
	}

	.slider.round:before {
		border-radius: 50%;
	}
</style>
