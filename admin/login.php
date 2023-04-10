<?php include_once("../model/giay.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<!------ Include the above in your HEAD tag ---------->
	<script src="https://code.jquery.com/jquery-2.1.0.min.js" ></script>
	<style type="text/css" media="screen">
		body{
			/* background: url(http://www.timurtek.com/wp-content/uploads/2014/10/form-bg.jpg) no-repeat center center fixed;  */
			-webkit-background-size: cover;
			-moz-background-size: cover;
			-o-background-size: cover;
			background-size: cover;
			font-family:'HelveticaNeue','Arial', sans-serif;

		}
		a{color:#58bff6;text-decoration: none;}
		a:hover{color:#aaa; }
		.pull-right{float: right;}
		.pull-left{float: left;}
		.clear-fix{clear:both;}
		div.logo{text-align: center; margin: 20px 20px 30px 20px; fill: #566375;}
		.head{padding:40px 0px; 10px 0}
		.logo-active{fill: #44aacc !important;}
		#formWrapper{ 
			width:100%; 
			height:100%; 
			position: absolute; 
			top:0; 
			left:0;
			transition:all .3s ease;
			background: url(img/adorable-animal-animal-photography-big-eyes-225406.jpg);
			background-size: 100%;
			background-position: center;
			background-repeat: no-repeat;
		}
		.darken-bg{background: rgba(0,0,0,.1) !important; transition:all .3s ease;}

		div#form{
			position: absolute;
			width:360px;
			height:320px;
			height:auto;
			background-color: #fff;
			margin:auto;
			border-radius: 5px;
			padding:20px;
			left:50%;
			top:50%;
			margin-left:-180px;
			margin-top:-200px;
		}
		div.form-item{position: relative; display: block; margin-bottom: 40px;}
		input{transition: all .2s ease;}
		input.form-style{
			color:#8a8a8a;
			display: block;
			width: 90%;
			height: 44px;
			padding: 5px 5%;
			border:1px solid #ccc;
			-moz-border-radius: 27px;
			-webkit-border-radius: 27px;
			border-radius: 27px;
			-moz-background-clip: padding;
			-webkit-background-clip: padding-box;
			background-clip: padding-box;
			background-color: #fff;
			font-family:'HelveticaNeue','Arial', sans-serif;
			font-size: 105%;
			letter-spacing: .8px;
		}
		div.form-item .form-style:focus{outline: none; border:1px solid #58bff6; color:#58bff6; }
		div.form-item p.formLabel {
			position: absolute;
			left:26px;
			top:10px;
			transition:all .4s ease;
			color:#bbb;}
			.formTop{top:-22px !important; left:26px; background-color: #fff; padding:0 5px; font-size: 14px; color:#58bff6 !important;}
			.formStatus{color:#8a8a8a !important;}
			input[type="submit"].login{
				float:right;
				width: 112px;
				height: 37px;
				-moz-border-radius: 19px;
				-webkit-border-radius: 19px;
				border-radius: 19px;
				-moz-background-clip: padding;
				-webkit-background-clip: padding-box;
				background-clip: padding-box;
				background-color: #55b1df;
				border:1px solid #55b1df;
				border:none;
				color: #fff;
				font-weight: bold;
			}
			input[type="submit"].login:hover{background-color: #fff; border:1px solid #55b1df; color:#55b1df; cursor:pointer;}
			input[type="submit"].login:focus{outline: none;}

		</style>
	</head>
	<?php if (isset($_REQUEST['submit'])) {
		if (!empty($_SESSION["login"])) {
			header('Location: index.php');
		}
		else{

			$email = $_REQUEST["email"];
			$password = $_REQUEST["password"];
			$con =tin::connect();
			if ($email == '' or $password == '') {
				header("location: login.php");
			}
			else{
				$sql = "SELECT * FROM `users` WHERE user_name='$email' ";
				$row = mysqli_fetch_array($con->query($sql));
				
				if($row['user_password']!= $password){
					header('Location: login.php');
					// exit();
				}else{
					$_SESSION["login"] = $email;
					header('Location: index.php');
				}
			}
		}
	}
	elseif(isset($_SESSION["login"])){
		header('Location: index.php');
	} 
	if (isset($_REQUEST["logout"])) {
		unset($_SESSION["login"]);
	}
	?>
	
	<body>
		<div id="formWrapper">

			<div id="form">
				<form action="" method="get" accept-charset="utf-8">
					
					<div class="logo">
						<h1 class="text-center head">Login</h1>
					</div>
					<div class="form-item">
						<p class="formLabel">Email</p>
						<input type="text" name="email" id="email" class="form-style" />
					</div>
					<div class="form-item">
						<p class="formLabel">Password</p>
						<input type="password" name="password" id="password" class="form-style" />
						<!-- <div class="pw-view"><i class="fa fa-eye"></i></div> -->
						<p><a href="#" ><small>Forgot Password ?</small></a></p>	
					</div>
					<div class="form-item">
						<input type="submit" class="login pull-right" value="Log In" name="submit">
						<div class="clear-fix"></div>
					</div>
				</form>
			</div>
		</div>
		<script type="text/javascript">
			$(document).ready(function(){
				var formInputs = $('input[type="text"],input[type="password"]');
				formInputs.focus(function() {
					$(this).parent().children('p.formLabel').addClass('formTop');
					$('div#formWrapper').addClass('darken-bg');
					$('div.logo').addClass('logo-active');
				});
				formInputs.focusout(function() {
					if ($.trim($(this).val()).length == 0){
						$(this).parent().children('p.formLabel').removeClass('formTop');
					}
					$('div#formWrapper').removeClass('darken-bg');
					$('div.logo').removeClass('logo-active');
				});
				$('p.formLabel').click(function(){
					$(this).parent().children('.form-style').focus();
				});
			});
		</script>
	</body>
	</html>