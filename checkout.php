<?php include_once("model/giay.php"); ?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Free Adidas Website Template | Checkout :: w3layouts</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
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
	include_once("menu.php"); 
	if (isset($_REQUEST['mg'])) {
		$mg   = $_REQUEST['mg'];
		bag::addBag($mg);
		header('Location: checkout.php');
		// session_destroy();
	}
	if (isset($_REQUEST['mgEdit'])) {
		$mgEdit=$_REQUEST['mgEdit'];
		$editSL=$_REQUEST['editSL'];
		bag::editSL($mgEdit, $editSL);
		header('Location: checkout.php');
	}
	if (isset($_REQUEST['mc'])) {
		$mc=$_REQUEST['mc'];
		bag::delete($mc);
		header('Location: checkout.php');
	}
	if (empty($_SESSION["bag"])) { ?>
		<div class="login">
			<div class="wrap">
				<h4 class="title">Shopping cart is empty</h4>
				<p class="cart">You have no items in your shopping cart.<br>Click<a href="index.php"> here</a> to continue shopping</p>
			</div>
		</div>
		<?php
		
	}else{ $listbag=$_SESSION["bag"];
	?>
	<div class="bag-top col-9">
		<h2 class="text-muted" >Giỏ hàng của bạn : <?php echo count($listbag); ?> mặt hàng</h2>
		<hr class="">
		<?php  foreach ($listbag as $value) {
			$singleGiay= giay::getGiay($value->IDGiay);
			$tongtien= ($value->soLuong*$singleGiay->giaThuc);
			$tongBill= $tongBill+$tongtien;
			?>
			<div class="bag-item row ">
				<img class="bag-item-img col-2" src="img/<?php echo $singleGiay->anhDemo; ?>" alt="<?php echo  $singleGiay->tenGIay; ?>">
				<div class="w-100 col">
					<h3 class="font-weight-bold"><?php echo  $singleGiay->tenGIay; ?></h3>
					<!-- <br> -->
					<div class="d-flex" style="position: relative; padding-top: 25px;">
						<p class="d-flex text-success font-weight-bold">$<?php echo  $singleGiay->giaThuc; ?> </p>
						
						<input type="hidden" name="mgEdit" value="<?php echo $value->IDGiay ?>">
						<select name="editSL"  onchange="location = this.options[this.selectedIndex].value;" style="color: #82a745;
						margin: 0 auto;
						border-radius: 4px;">
						<?php  for ($x = 1; $x <= $value->sl; $x++) { ?>
							<option value="checkout.php?editSL=<?php echo $x; ?>&mgEdit=<?php echo $value->IDGiay ?>" <?php if($value->soLuong == $x){ echo "selected"; } ?>><a href="" title=""><?php echo $x; ?></a></option>
						<?php }  ?>
					</select>
					<!-- <input type="number" name="editSL" value="<?php echo $value->soLuong; ?>"> --> <span class="Sum-item">$<?php echo $tongtien; ?></span>
					

				</div>
				<p>Số lượng còn lại: <?php echo $value->sl; ?></p>
				<a style="font-weight: 600;
				color: #656545;
				text-decoration: none;
				position: absolute;
				bottom: 0;
			}" href="checkout.php?mc=<?php echo $value->IDGiay ?>" title="" ><i class="fas fa-trash-alt"></i> Xóa</a>
		</div>

	</div>
	<hr>
<?php } ?>
<p class="tongBil">Tổng số tiền: $<?php echo $tongBill; ?></p>

</div>
<div class="col-3 Sum-Bil">

</div>

<?php } 
?>
<?php include_once("footer.php");  ?>