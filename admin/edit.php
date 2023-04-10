<?php include_once("../model/giay.php");
include_once("header.php");
if(isset($_POST['upload'])){
	$edit_title     = str_replace("'","\'",$_POST['edit_title']);
	$edit_author    = str_replace("'","\'",$_POST['edit_author']);
	$edit_image     = $_FILES['edit_img']['name'];
	$edit_image_tmp = $_FILES['edit_img']['tmp_name'];
	$edit_noidung   = str_replace("'","\'",$_POST['edit_noidung']);
	$edit_tomtat    = str_replace("'","\'",$_POST['edit_tomtat']);
	$id_edit    = $_POST['id_edit'];
	$IDcat = $_REQUEST['IDcat'];
	echo $edit_image;
	if($edit_title=='' OR $edit_author==''  OR $edit_noidung=='' or $edit_tomtat =='' or $IDcat==''){

		echo "<script>alert('Vui lòng điền đầy đủ thông tin')</script>";
		exit();
	}
	else {
		if ($edit_image =='') {
			tin::edit_no_img($id_edit,$edit_title,$edit_author,$edit_noidung,$edit_tomtat,$IDcat);
		}else{
			move_uploaded_file($edit_image_tmp,"img_upload/$edit_image");
			tin::edit($id_edit,$edit_title,$edit_author,$edit_image,$edit_noidung,$edit_tomtat,$IDcat);
		}
		
		header("location: index.php");
	}	
}
?>

<style type="text/css">
	body{
		font-family: sans-serif;
		font-size: .9em;
	}
	#textarea-1{
		width: 700px;
		height: 200px;
		padding: 10px;
		border: 2px solid #ddd;
	}
	div#cke_1_contents {
		height: 330px !important;
	}
</style>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<form method="post" enctype="multipart/form-data" id="theForm" action="edit.php"> 
				<?php
				if (isset($_REQUEST["edit_post"])) {
					$edit_post=$_REQUEST["edit_post"];

					$gestingle = tin::getSingle($edit_post); ?>
					<table class="table__center" width="100%" bgcolor="#FFFFFF">
						<input type="hidden" name="id_edit" value="<?php echo $edit_post; ?>">
						<tr>
							<td colspan="6" align="center">
								<h1 class="py-3">Update post</h1>
							</td>
						</tr>

						<tr>
							<td><strong>Tiêu đề : </strong></td>
							<td><input class="form-control" type="text" name="edit_title" value="<?php echo $gestingle->TenTin; ?>" /></td>
						</tr>

						<tr>
							<td><strong>Tác giả : </strong></td>
							<td><input class="form-control" type="text" name="edit_author" value="<?php echo $gestingle->TacGia; ?>"/></td>
						</tr>
						<tr>
							<td><strong>Ảnh : </strong></td>
							<td class="d-flex">
								<img width="100px" height="100px;" src="img_upload/<?php echo $gestingle->AnhTin; ?>" alt="">
								<p class="d-flex align-items-center pt-3 pr-3">Thay đổi:</p>
								<div class="d-flex align-items-center">
									<input style="padding: 3px 5px;" class="form-control mr-5" type="file" name="edit_img"  multiple /> 
								</div>
							</td>
						</tr>
						<tr>
							<td><strong>Danh mục : </strong></td>
							<td>
								<div class="d-flex align-items-center">
									<select name="IDcat" style="padding: 5px;
									border: 1px solid #d1d3e2;
									border-radius: 6px;
								}">
								<?php 
								$con= tin::connect();
								$sql= "SELECT * FROM cat";
								$result = $con->query($sql);
								if($result->num_rows >=0){
									while ($row = $result->fetch_assoc()) {
										$id= $row["IDcat"];
										$name = $row["TenCat"];

										?>
										<option <?php if ($id == $gestingle->IDcat){echo "selected";}  ?> value="<?= $id ?>"><?= $name ?></option>
									<?php }
								} ?>
							</select>
						</div>
					</td>
				</tr>
				<tr>
					<td><strong>Tóm tắt: </strong></td>
					<td>
						<div class="d-flex align-items-center">
							<input class="form-control mr-5" type="text" name="edit_tomtat"  multiple value="<?php echo $gestingle->TomTat; ?>" /> 
						</div>
					</td>
				</tr>
				<tr>
					<td><strong>Post Content : </strong></td>

					<td class="tesa">

						<textarea class="quilljs-textarea" id="textarea-1" name="edit_noidung">
							<?php echo $gestingle->NoiDungTin; ?>
						</textarea>
					</td>
				</tr>
				<tr>
					<td colspan="6" align="center">
						<button class="btn btn-success mt-3" type="submit" name="upload">Upload</button>
					</td>
				</tr>

			</table>
		<?php } ?>
	</form>
</div>
</div>
</div>
<?php include_once "footer.php"; ?>