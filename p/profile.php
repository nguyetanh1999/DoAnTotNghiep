<?php 
session_start();
require_once "config.php";
$NhapMSSV=$_POST['mssv'];
$lop = $_POST['lop2'];
$sql5 = "SELECT * FROM hoctap WHERE MSSV='".$NhapMSSV."'";
$sql6 = "SELECT * FROM renluyen WHERE MSSV='".$NhapMSSV."'";
if($_SESSION["type"] =='GV') 
		{$sql8 = "SELECT * FROM sinhvien WHERE MSSV='".$NhapMSSV."' AND Lop='".$lop."'";} 
else if($_SESSION["type"] =='Admin') 
		{$sql8 = "SELECT * FROM sinhvien WHERE MSSV='".$NhapMSSV."'";}	
$kq5 = mysqli_query($link, $sql5);
$kq6 = mysqli_query($link, $sql6);
$kq8 = mysqli_query($link, $sql8);
$dong8=mysqli_num_rows($kq8);
if(!empty($NhapMSSV)&&isset($NhapMSSV)&&($dong8>0)){
	include('pftrue.php');
}


else if(!empty($NhapMSSV)&&isset($NhapMSSV)&&($dong8==0)){
		echo '
Không có sinh viên mã '.$NhapMSSV.' trong lớp.
			';
	
}

?>