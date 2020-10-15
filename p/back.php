<?php
require_once "config.php";
if (!$link) {
    die('Lỗi kết nối: ' . mysql_error());
}
if(isset($_SESSION["Lop"])&&isset($_SESSION["step"])){
	$Lop=$_SESSION["Lop"];
	$s=$_SESSION["step"];	
	if($s=='all'){
		if(isset($Lop)){
		$query = "DELETE FROM hoctap WHERE MSSV in (SELECT a.MSSV FROM hoctap a JOIN sinhvien b ON a.MSSV=b.MSSV WHERE b.Lop='".$Lop."')";	
		$kqquery=mysqli_query($link, $query);
		
		$query1 = "DELETE FROM renluyen WHERE MSSV in (SELECT a.MSSV FROM renluyen a JOIN sinhvien b ON a.MSSV=b.MSSV WHERE b.Lop='".$Lop."')";	
		$kqquery1=mysqli_query($link, $query1);
		
		$query2 = "DELETE FROM hoatdong WHERE MSSV in (SELECT a.MSSV FROM hoatdong a JOIN sinhvien b ON a.MSSV=b.MSSV WHERE b.Lop='".$Lop."')";	
		$kqquery2=mysqli_query($link, $query2);
		
		$query3 = "DELETE FROM sinhvien WHERE Lop='".$Lop."'";	
		$kqquery3=mysqli_query($link, $query3);
		
		$query4 = "DELETE FROM lop WHERE TenLop='".$Lop."'";	
		$kqquery4=mysqli_query($link, $query4);
		unset($Lop);
		header("location: ../index.php");
		}
		else{
		header("location: ../index.php");
		}
	}
	else if($s==1){
		$query4 = "DELETE FROM lop WHERE TenLop='".$Lop."'";	
		$kqquery4=mysqli_query($link, $query4);	
		unset($Lop);
		header("location: addclass.php?step=1");
	}
	else if($s==2){
		$query3 = "DELETE FROM sinhvien WHERE Lop='".$Lop."'";	
		$kqquery3=mysqli_query($link, $query3);
		header("location: addclass.php?step=2");
	}
	else if($s==3){
		$query = "DELETE FROM hoctap WHERE MSSV in (SELECT a.MSSV FROM hoctap a JOIN sinhvien b ON a.MSSV=b.MSSV WHERE b.Lop='".$Lop."')";	
		$kqquery=mysqli_query($link, $query);
		header("location: addclass.php?step=3");
	}
}
else if (!isset($_SESSION["Lop"])&&!isset($_SESSION["step"])&&empty($_SESSION["Lop"])&&empty($_SESSION["step"])){
header("location: ../index.php");	
}
?>