<?php include_once("../model/giay.php");
include_once("header.php"); 
if (!isset($_SESSION["login"])) {
  header("location: login.php");
}
if (isset($_REQUEST["delete_post"])) {
  $delete_post= $_REQUEST["delete_post"];
  tin::delete($delete_post);
  header("location: index.php");
}
?>
<!-- End of Topbar -->
<!-- Begin Page Content -->
<div class="container-fluid">
  <h1 class="h3 mb-2 text-gray-800">Posts</h1>
  <div class="card shadow mb-4">
    <div class="card-body">
      <div class="table-responsive table-hover">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>ID</th>
              <th>Tiêu đề</th>
              <th>Tác giả</th>
              <th>Tóm tắt</th>
              <th>Ảnh</th>
              <th style="text-align: center;">Thao tác</th>
            </tr>
          </thead>
          <tbody>
            <?php $lstin= tin::getlistDB();
              foreach ($lstin as $value) {
               ?>
           <tr>
            <td class="text-center"><?php echo $value->MaTin ?></td>
            <td><?php echo $value->TenTin; ?></td>
            <td><?php echo $value->TacGia  ?></td>
            <td><?php echo $value->TomTat  ?></td>
            <td><img src="img_upload/<?php echo $value->AnhTin ?>" alt="image" style="width: 65px; height: 65px;    object-fit: cover;"></td>
            
            <td style="text-align: center;">
              <div class="d-flex justify-content-center align-items-center">
                <a href="edit.php?edit_post=<?php echo $value->MaTin ?>" class="btn btn-success mr-3">Sửa</a>
                <a onclick="return confirm('Bạn có thực sự muốn xóa nó ?');" href="index.php?delete_post=<?php echo $value->MaTin; ?>" class="btn btn-danger">Xóa</a>
              </div>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Footer -->
<?php include_once "footer.php"; ?>