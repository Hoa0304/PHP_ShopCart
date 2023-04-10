<?php session_start();
ob_start();
class giay
{
	var $IDGiay;
	var $tenGIay;
	var $giaAo;
	var $giaThuc;
	var $productDetails;
	var $anhDemo;
	function __construct($IDGiay,$tenGIay,$giaAo,$giaThuc,$productDetails,$anhDemo) {
		$this->IDGiay         = $IDGiay;
		$this->tenGIay        = $tenGIay;
		$this->giaAo          = $giaAo;
		$this->giaThuc        = $giaThuc;
		$this->productDetails = $productDetails;
		$this->anhDemo        = $anhDemo;
	}
	static function connect(){
		$con = new mysqli("localhost","root","","shopcart");
		$con->set_charset("utf8");
		if ($con->connect_error) {
			die("ket noi that bai" .$con->connect_error);
		}
		return $con;
	}
	static function getListDB(){
		$con = giay::connect();
		$sql = "SELECT * FROM `giay`";
		$result = $con->query($sql);
		$lsGiay = array();
		if($result->num_rows >=0){
			while ($row = $result->fetch_assoc()) {
				$single = new giay($row["IDGiay"],$row["TenGiay"],$row["GiaAo"],$row["GiaThuc"],$row["ProductDetails"],$row["anhDemo"]);
				array_push($lsGiay, $single);
			}
		}
		$con->close();
		return $lsGiay;
	}
	static function getListImg($idmg){
		$con = giay::connect();
		$sql ="SELECT * FROM `images` WHERE IDgiay=$idmg";
		$result = $con->query($sql);
		$listImg= array();
		if($result->num_rows >=0){
			while ($row = $result->fetch_assoc()) {
				$single = $row["UrlImg"];
				array_push($listImg, $single);
			}
		}
		$con->close();
		return $listImg;
	}
	static function getGiay($mg){
		$con = giay::connect();
		$sql ="SELECT * FROM `giay` WHERE IDGiay=$mg";
		$result = $con->query($sql);
		if ($result->num_rows >=0) {
			while ($row = $result->fetch_assoc()) {
				$single = new giay($row["IDGiay"],$row["TenGiay"],$row["GiaAo"],$row["GiaThuc"],$row["ProductDetails"],$row["anhDemo"]);
			}
		}
		$con->close();
		return $single;
	}
	
}


class bag
{
	var $IDGiay;
	var $soLuong;
	var $sl;
	function __construct($IDGiay,$soLuong,$sl) {
		$this->IDGiay  = $IDGiay;
		$this->soLuong = $soLuong;
		$this->sl = $sl;
	}
	static function addBag($mg){
		$listBagnew= array();
		$con = giay::connect();
		$sql ="SELECT * FROM `giay` WHERE IDGiay=$mg";
		$result = $con->query($sql);
		while ($row = $result->fetch_assoc()) {
			$single = $row["SL"];
		}
		if (empty($_SESSION["bag"])) {
			$gh=new bag($mg,1,$single);
			array_push($listBagnew, $gh);
			$_SESSION["bag"]=$listBagnew;
		}
		else {
			$listBag = $_SESSION["bag"];
			$test = 0; 
			foreach ($listBag as $value) {
				if ($mg == $value->IDGiay) {
					$value->soLuong++;
					$test=1;
				}
				array_push($listBagnew, $value);
			}
			if ($test != 1) {
				$gh=new bag($mg,1,$single);
				array_push($listBagnew, $gh);
			}
			$_SESSION["bag"] = $listBagnew;

		}
	}
	static function editSL($mgEdit, $editSL)
	{
		$listBagnew= array();
		$listBag = $_SESSION["bag"];
		foreach ($listBag as $value) {
			if ($mgEdit == $value->IDGiay) {
				$value->soLuong= $editSL;
			}
			array_push($listBagnew, $value);
		}
		$_SESSION["bag"]=$listBagnew;
	}
	static function delete($mc){
		$listBagnew= array();
		$listBag = $_SESSION["bag"];
		foreach ($listBag as $value) {
			if ($mc != $value->IDGiay) {
				array_push($listBagnew, $value);
			}
		}
		$_SESSION["bag"]=$listBagnew;
	}
	
}

class tin
{
	var $MaTin;
	var $TenTin;
	var $NoiDungTin;
	var $AnhTin;
	var $TacGia;
	var $NgayDang;
	var $TomTat;
	var $IDcat;
	function __construct($MaTin,$TenTin,$NoiDungTin,$AnhTin,$TacGia,$NgayDang,$TomTat,$IDcat){
		$this->MaTin = $MaTin;
		$this->TenTin = $TenTin;
		$this->NoiDungTin = $NoiDungTin;
		$this->AnhTin = $AnhTin;
		$this->TacGia = $TacGia;
		$this->NgayDang = $NgayDang;
		$this->TomTat = $TomTat;
		$this->IDcat = $IDcat;
	}
	static function connect(){
		$con = new mysqli("localhost","root","","CMS");
		$con->set_charset("utf8");
		if ($con->connect_error) {
			die("ket noi that bai" .$con->connect_error);
		}
		return $con;
	}
	static function getListDB(){
		$con = tin::connect();
		$sql = "SELECT * FROM `news`";
		$result = $con->query($sql);
		$lsTin = array();
		if($result->num_rows >=0){
			while ($row = $result->fetch_assoc()) {
				$single = new tin($row["MaTin"],$row["TenTin"],$row["NoiDungTin"],$row["AnhTin"],$row["TacGia"],$row["NgayDang"],$row["TomTat"],$row["IDcat"]);
				array_push($lsTin, $single);
			}
		}
		$con->close();
		return $lsTin;
	}
	static function getSingle($maSingle){
		$lsTin = tin::getListDB();
		foreach ($lsTin as $value) {
			if ($value->MaTin == $maSingle) {
				return $value;
			}
		}
	}
	static function delete($idPost){
		$con = tin::connect();
		$sql = "DELETE FROM `news` WHERE `news`.`MaTin` = $idPost";
		$con->query($sql);
		$con->close();
	}
	static function edit_no_img($id_edit,$edit_title,$edit_author,$edit_noidung,$edit_tomtat,$IDcat){
		$con = tin::connect();
		$sql="UPDATE news SET TenTin='$edit_title', TacGia='$edit_author', NoiDungTin='$edit_noidung', TomTat='$edit_tomtat', IDcat = '$IDcat' WHERE MaTin='$id_edit'";
		if ($con->query($sql) === TRUE) {

			header("location: index.php");
		} else {
			echo "Error updating record: " . $con->error;
		}
		$con->close();
	}
	static function edit($id_edit,$edit_title,$edit_author,$edit_image,$edit_noidung,$edit_tomtat,$IDcat){
		$con = tin::connect();
		$sql="UPDATE news SET TenTin='$edit_title', TacGia='$edit_author', NoiDungTin='$edit_noidung', AnhTin='$edit_image' , TomTat='$edit_tomtat', IDcat = '$IDcat' WHERE MaTin='$id_edit'";
		if ($con->query($sql) === TRUE) {
			header("location: index.php");
		} else {
			header("location: edit.php");
		}
		$con->close();
	}
	static function liveSearch($search){
		$con=giay::connect();
		$conn= tin::connect();
		$sql= "SELECT * FROM giay WHERE TenGiay LIKE '%$search%'";
		$sqll = "SELECT * FROM news WHERE TenTin LIKE '%$search%' OR NoiDungTin LIKE '%$search%'";
		$result = $con->query($sql);
		$resultt= $conn->query($sqll);
		if ($result->num_rows >0 AND $resultt->num_rows >0 ) {
			$kqa= '<ul>';
			while ($row= $result->fetch_assoc()) {
				$kqa.='<li class="d-block search_live"><a  href="single.php?mg='.$row["IDGiay"].'">'.$row["TenGiay"].'</a></li>';
			}
			while ($row= $resultt->fetch_assoc()) {
				$kqa.='<li class="d-block search_live"><a  href="singlepost.php?maSingle='.$row["MaTin"].'">'.$row["TenTin"].'</a></li>';
			}
			$kqa.='</ul>';
		}
		elseif ($result->num_rows >0)  {
			$kqa= '<ul>';
			while ($row= $result->fetch_assoc()) {
				$kqa.='<li class="d-block search_live"><a  href="single.php?mg='.$row["IDGiay"].'">'.$row["TenGiay"].'</a></li>';
			}
			$kqa.='</ul>';
		}
		elseif ($resultt->num_rows >0)  {
			$kqa= '<ul>';
			while ($row= $resultt->fetch_assoc()) {
				$kqa.='<li class="d-block search_live"><a  href="singlepost.php?maSingle='.$row["MaTin"].'">'.$row["TenTin"].'</a></li>';
			}
			$kqa.='</ul>';
		} else{
			$kqa = "find empty";
		}
		return $kqa;
	}
}
?>