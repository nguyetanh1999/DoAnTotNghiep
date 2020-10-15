<?php
require_once "config.php";
        $lop = $_POST['lop'];
		$mssv = $_POST['MSSVdelete'];
	$sql12="DELETE FROM hoctap WHERE MSSV in (SELECT a.MSSV FROM hoctap a JOIN sinhvien b ON a.MSSV=b.MSSV WHERE b.Lop='".$lop."' AND b.MSSV='".$mssv."')";
	$kq12 = mysqli_query($link, $sql12);
	$sql13="DELETE FROM renluyen WHERE MSSV in (SELECT a.MSSV FROM renluyen a JOIN sinhvien b ON a.MSSV=b.MSSV WHERE b.Lop='".$lop."' AND b.MSSV='".$mssv."')";
	$kq13 = mysqli_query($link, $sql13);
	$sql14="DELETE FROM hoatdong WHERE MSSV in (SELECT a.MSSV FROM hoatdong a JOIN sinhvien b ON a.MSSV=b.MSSV WHERE b.Lop='".$lop."' AND b.MSSV='".$mssv."')";
	$kq14 = mysqli_query($link, $sql14);
	$sql15="DELETE FROM sinhvien WHERE Lop='".$lop."' AND MSSV='".$mssv."'";
	$kq15 = mysqli_query($link, $sql15);
	echo "<script>alert('Đã xóa.'); window.location='edit.php?name=".$lop."'</script>";
?>