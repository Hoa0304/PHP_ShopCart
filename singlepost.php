<?php  include_once("model/giay.php");
include_once("heade.php"); 
if (isset($_REQUEST['maSingle'])) {
	$maSingle   = $_REQUEST['maSingle'];
	$single= tin::getSingle($maSingle);
}
?>
<div class="container-fluid">
	<div class="pt-2 pb-3" >
		<div>
			<h2 style="   font-size: 30px;
			font-weight: 600;
			color: brown;
			text-align: center;
			"><?php echo $single->TenTin; ?></h2>
			<p style="    text-align: center;
			font-size: 13px;"> <b style=" color: blueviolet;
			font-style: italic;"><?php echo  $single->TacGia; ?></b> Ngày đăng: <span style="color: brown;
			font-style: italic;"><?php echo $single->NgayDang; ?> </span></p>
		</div>
	</div>
	<hr style="width: 40%;">
	<div class="row">
		<div class="col-2">
			<h2 class="titleend">Cùng danh mục</h2>
			<?php $lstin = tin::getListDB();
			foreach ($lstin as $value) {
				if ($value->IDcat == $single->IDcat && $value->MaTin !=$single->MaTin ) {
					?>
					<div class="" style="overflow: hidden ">
						<div class="thumbnail thumbnailpost" style="    border-radius: 10px;;height: 320px; position: relative">
							<div style="width: 100%;
							height: 150px;
							transition: all 0.3s;
							display: flex;
							justify-content: center;
							align-items: center;
							background: aqua;">
							<img style=" margin: 0 auto; height: 100%;width: 100%;object-fit: cover" src="admin/img_upload/<?php echo $value->AnhTin; ?>" alt="" class="img-responsive">
						</div>
						<div class="caption">
							<h3 class="" style="font-size: 20px;
							color: brown;
							font-weight: 700;
							height: 55px;
						}"><?php echo $value->TenTin; ?></h3>

						<div class="btn-toolbar text-center">
							<a href="singlepost.php?maSingle=<?php echo $value->MaTin ?>" role="button" class="btn btn-primary pull-right" style="padding: 3% 4%;
							border: 0;
							margin: 0 auto;
							position: absolute;
							bottom: 8px;
							left: 30%;" >Details</a>
						</div>
					</div>
				</div>
			</div>
			<?php }  	} ?></div>			
			<div class="col-8" style="border-left: 1px solid powderblue;
			border-right: 1px solid powderblue;">
			<p align="left" class="content "><?php echo $single->NoiDungTin ?>	
		</div>
		<div class="col-2">
			<h2 class="titleend">Tin mới</h2>
			<?php $lstin = tin::getListDB();
			foreach ($lstin as $value) {
				if ( $value->MaTin !=$single->MaTin ) {
					?>
					<div class="" style="overflow: hidden">
						<div class="thumbnail thumbnailpost"  style="    border-radius: 10px;    border-radius: 10px;height: 320px; position: relative">
							<div style="width: 100%;
							height: 150px;
							transition: all 0.3s;
							display: flex;
							justify-content: center;
							align-items: center;
							background: aqua;">
							<img style="margin: 0 auto; height: 100%;width: 100%; object-fit: cover;" src="admin/img_upload/<?php echo $value->AnhTin; ?>" alt="" class="">
						</div>
						<div class="caption">
							<h3 class="" style="font-size: 20px;
							color: brown;
							font-weight: 700;
							height: 55px;
						}"><?php echo $value->TenTin; ?></h3>

						<div class="btn-toolbar text-center">
							<a href="singlepost.php?maSingle=<?php echo $value->MaTin ?>" role="button" class="btn btn-primary pull-right" style="padding: 3% 4%;
							border: 0;
							margin: 0 auto;
							position: absolute;
							bottom: 8px;
							left: 30%;	" >Details</a>
						</div>
					</div>
				</div>
			</div>
			<?php }	} ?></div>	
		</div>

	</p>

</div>
<style type="text/css" media="screen">
	h2.titleend {
		font-size: 25px;
		text-align: center;
		padding-bottom: 16px;
		color: chocolate;
		text-transform: capitalize;
	}
</style>
