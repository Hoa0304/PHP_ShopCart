<?php include_once("../model/giay.php");
include_once("header.php");
if(isset($_REQUEST['create'])){
	
	$post_title     = str_replace("'","\'",$_REQUEST['post_title']);
	$post_author    = str_replace("'","\'",$_REQUEST['post_author']);
	$post_image     = $_FILES['post_image']['name'];
	$post_image_tmp = $_FILES['post_image']['tmp_name'];
	$post_content   = str_replace("'","\'",$_REQUEST['editable1']);
	$tomtat         = str_replace("'","\'",$_REQUEST['tomtat']);
	$date           = date("Y/m/d");
	$IDcat = $_REQUEST['IDcat'];
	if($post_title=='' OR $post_author==''  OR $post_image=='' OR $post_content=='' OR $tomtat =='' OR $IDcat== ''){
		echo "<script>alert('Vui lòng điền đầy đủ thông tin')</script>";
		exit();
	}
	else {
		move_uploaded_file($post_image_tmp,"img_upload/$post_image");
		$conn = tin::connect();
		$sql = "INSERT INTO news (MaTin, TenTin, NoiDungTin, AnhTin, TacGia, NgayDang, TomTat,IDcat) VALUES (NULL, '$post_title', '$post_content','$post_image', '$post_author', '$date', '$tomtat','$IDcat')";
		if ($conn->query($sql) === TRUE) {
			header("location: index.php");
		} else {
			header("location: insert.php");
		}
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
</style>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<form method="post" enctype="multipart/form-data" id="theForm" action="insert.php"> 

				<table class="table__center" width="100%" bgcolor="#FFFFFF">

					<tr>
						<td colspan="6" align="center">
							<h1 class="py-3">Insert post</h1>
						</td>
					</tr>

					<tr>
						<td><strong>Tiêu đề : </strong></td>
						<td><input class="form-control" type="text" name="post_title" /></td>
					</tr>

					<tr>
						<td><strong>Tác giả : </strong></td>
						<td><input class="form-control" type="text" name="post_author"/></td>
					</tr>
					<tr>
						<td><strong>Ảnh : </strong></td>
						<td>
							<div class="d-flex align-items-center">
								<input style="padding: 3px 5px;" class="form-control mr-5" type="file" name="post_image"  multiple /> 
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
									<option value="<?= $id ?>"><?= $name ?></option>
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
						<input class="form-control mr-5" type="text" name="tomtat"  multiple /> 
					</div>
				</td>
			</tr>
			<tr>
				<td><strong>Nội dung: </strong></td>

				<td>
					<textarea id="textarea-1" name="editable1">
					</textarea>
				</td>
			</tr>
			<tr>
				<td colspan="6" align="center">
					<button class="btn btn-success mt-3" type="submit" name="create">Create post</button>
				</td>
			</tr>

		</table>

	</form>
</div>
</div>
</div>
<style type="text/css" media="screen">
	div#cke_1_contents {
		height: 330px !important;
	}
</style>
<?php include_once "footer.php"; ?>