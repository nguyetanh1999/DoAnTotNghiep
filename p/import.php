<?php
session_start();
require_once "config.php";
if (!$link) {
    die('Lỗi kết nối: ' . mysql_error());
}
//Nếu POST nhận biến TenLop thì lấy $Lop
if(isset($_POST["TenLop"])){
	$_SESSION["Lop"]=$_POST["TenLop"];
	$Lop=$_SESSION["Lop"];
	$id=$_SESSION["id"];
}
if(isset($_POST["step"])){
	$step=$_POST["step"];
}
if(isset($_GET['t'])){
	if ($_GET['t']=='back'){
		$_SESSION["step"]=$_GET['s'];
		include('back.php');
	}
}
if(isset($Lop)){
		$taolop = "INSERT INTO lop(TenLop, NguoiTao) VALUES ('".$Lop."', '".$id."')";
		$kqtaolop=mysqli_query($link, $taolop);
		if($kqtaolop){
			header("location: addclass.php?step=2");
		}
		else {
			echo "<script>alert('Trùng tên lớp'); window.location='addclass.php?step=1'</script>";
		}
}
if(isset($_POST["import"])) //CÓ IMPORT FILE
{ 
	if($step==2){
	 $tmp = explode(".", $_FILES["excel"]["name"]);
	 $extension = end($tmp);
	 // Lấy đuôi file
	 $allowed_extension = array("xls", "xlsx", "csv"); //đuôi file được chấp nhận
		 if(in_array($extension, $allowed_extension)) //kiểm tra file có hợp lệ k
		 {
		  $file = $_FILES["excel"]["tmp_name"]; // getting temporary source of excel file
		  include("../PHPExcel/IOFactory.php"); // Add PHPExcel Library in this code
		  $objPHPExcel = PHPExcel_IOFactory::load($file); // create object of PHPExcel library by using load() method and in load method define path of selected file

			  foreach ($objPHPExcel->getWorksheetIterator() as $worksheet)
			  {
			   $highestRow = $worksheet->getHighestRow();
				   for($row=2; $row<=$highestRow; $row++)
				   {
					$STT = mysqli_real_escape_string($link, $worksheet->getCellByColumnAndRow(0, $row)->getValue());
					$MSSV = mysqli_real_escape_string($link, $worksheet->getCellByColumnAndRow(1, $row)->getValue());
					$Ten = mysqli_real_escape_string($link, $worksheet->getCellByColumnAndRow(2, $row)->getValue());
					$GioiTinh = mysqli_real_escape_string($link, $worksheet->getCellByColumnAndRow(3, $row)->getValue());
					$NgaySinh = mysqli_real_escape_string($link, $worksheet->getCellByColumnAndRow(4, $row)->getValue());
					$Email = mysqli_real_escape_string($link, $worksheet->getCellByColumnAndRow(5, $row)->getValue());
					$SDT = mysqli_real_escape_string($link, $worksheet->getCellByColumnAndRow(6, $row)->getValue());
					$DiaChi = mysqli_real_escape_string($link, $worksheet->getCellByColumnAndRow(7, $row)->getValue());
					$QueQuan = mysqli_real_escape_string($link, $worksheet->getCellByColumnAndRow(8, $row)->getValue());
					$DanToc = mysqli_real_escape_string($link, $worksheet->getCellByColumnAndRow(9, $row)->getValue());
					$NguoiThan = mysqli_real_escape_string($link, $worksheet->getCellByColumnAndRow(10, $row)->getValue());
					$Lop=$_SESSION["Lop"];
					$query = "INSERT INTO sinhvien(Lop, STT, MSSV, Ten, GioiTinh, NgaySinh, Email, SDT, DiaChi, QueQuan, DanToc, NguoiThan) VALUES ('".$Lop."', ".$STT.", '".$MSSV."', '".$Ten."', ".$GioiTinh.", '".$NgaySinh."', '".$Email."', '".$SDT."', '".$DiaChi."', '".$QueQuan."', '".$DanToc."', '".$NguoiThan."')";
					$kqquery=mysqli_query($link, $query);
				   }
			  }
		}

		$id=$_SESSION["id"];
		$sql1 = "UPDATE sinhvien SET NgaySinhfix=STR_TO_DATE(NgaySinh, '%d/%m/%Y') WHERE Lop='".$Lop."'";
		$sql2 = "UPDATE sinhvien SET NgaySinh=DATE_FORMAT(NgaySinhfix, '%d/%m/%Y') WHERE Lop='".$Lop."'";
		$sql3 = "UPDATE lop SET SoLuong = (SELECT COUNT(MSSV) FROM sinhvien WHERE lop.TenLop=sinhvien.Lop) WHERE TenLop='".$Lop."'";
		$deleteclass = "DELETE FROM lop WHERE TenLop='".$Lop."'";
		$kqsql1=mysqli_query($link, $sql1);
		$kqsql2=mysqli_query($link, $sql2);
		$kqsql3=mysqli_query($link, $sql3);
		if($kqquery){
				if($kqsql1){
					if($kqsql2){
						if($kqsql3){
								header("location: addclass.php?step=3");
						}
						else{
							echo "<script>alert('Có lỗi xảy ra. (Kiểm tra lại db)'); window.location='addclass.php?step=2'</script>";
						}
					}
					else{
						echo "<script>alert('Có lỗi xảy ra. (Kiểm tra lại file Excel: NgaySinh)'); window.location='addclass.php?step=2'</script>";
					}
				}
				else{
					echo "<script>alert('Có lỗi xảy ra. (Kiểm tra lại file Excel: NgaySinh)'); window.location='addclass.php?step=2'</script>";
				}
		} 
		else {
			echo "<script>alert('Có lỗi xảy ra. (Trùng MSSV ở lớp khác)'); window.location='addclass.php?step=1'</script>";
			mysqli_query($link, $deleteclass);
		}
	}
	else if($step==3){
	 $tmp = explode(".", $_FILES["excel"]["name"]);
	 $extension = end($tmp);
	 // Lấy đuôi file
	 $allowed_extension = array("xls", "xlsx", "csv"); //đuôi file được chấp nhận
		 if(in_array($extension, $allowed_extension)) //kiểm tra file có hợp lệ k
		 {
		  $file = $_FILES["excel"]["tmp_name"]; // getting temporary source of excel file
		  include("../PHPExcel/IOFactory.php"); // Add PHPExcel Library in this code
		  $objPHPExcel = PHPExcel_IOFactory::load($file); // create object of PHPExcel library by using load() method and in load method define path of selected file

			  foreach ($objPHPExcel->getWorksheetIterator() as $worksheet)
			  {
			   $highestRow = $worksheet->getHighestRow();
				   for($row=2; $row<=$highestRow; $row++)
				   {
					$STT = mysqli_real_escape_string($link, $worksheet->getCellByColumnAndRow(0, $row)->getValue());
					$MSSV = mysqli_real_escape_string($link, $worksheet->getCellByColumnAndRow(1, $row)->getValue());
					$HK1 = mysqli_real_escape_string($link, $worksheet->getCellByColumnAndRow(2, $row)->getValue());
					if($HK1==''){$HK1=10.1;}
					$HK2 = mysqli_real_escape_string($link, $worksheet->getCellByColumnAndRow(3, $row)->getValue());
					if($HK2==''){$HK2=10.1;}
					$HK3 = mysqli_real_escape_string($link, $worksheet->getCellByColumnAndRow(4, $row)->getValue());
					if($HK3==''){$HK3=10.1;}
					$HK4 = mysqli_real_escape_string($link, $worksheet->getCellByColumnAndRow(5, $row)->getValue());
					if($HK4==''){$HK4=10.1;}
					$HK5 = mysqli_real_escape_string($link, $worksheet->getCellByColumnAndRow(6, $row)->getValue());
					if($HK5==''){$HK5=10.1;}
					$HK6 = mysqli_real_escape_string($link, $worksheet->getCellByColumnAndRow(7, $row)->getValue());
					if($HK6==''){$HK6=10.1;}
					$HK7 = mysqli_real_escape_string($link, $worksheet->getCellByColumnAndRow(8, $row)->getValue());
					if($HK7==''){$HK7=10.1;}
					$query = "INSERT INTO hoctap(STT, MSSV, HK1, HK2, HK3, HK4, HK5, HK6, HK7) VALUES (".$STT.", '".$MSSV."', IF(".$HK1."=10.1,NULL,".$HK1."), IF(".$HK2."=10.1,NULL,".$HK2."), IF(".$HK3."=10.1,NULL,".$HK3."), IF(".$HK4."=10.1,NULL,".$HK4."), IF(".$HK5."=10.1,NULL,".$HK5."), IF(".$HK6."=10.1,NULL,".$HK6."), IF(".$HK7."=10.1,NULL,".$HK7."))";
					$kqquery=mysqli_query($link, $query);
						if($kqquery){
							header("location: addclass.php?step=4");
						}
						else {
							echo "<script>alert('Lỗi thực thi truy vấn cơ sở dữ liệu.'); window.location='addclass.php?step=3'</script>";
						}
				   }
			  }
		  }
					
	}
	else if($step==4){
	 $tmp = explode(".", $_FILES["excel"]["name"]);
	 $extension = end($tmp);
	 // For getting Extension of selected file
	 $allowed_extension = array("xls", "xlsx", "csv"); //allowed extension
		 if(in_array($extension, $allowed_extension)) //check selected file extension is present in allowed extension array
		 {
		  $file = $_FILES["excel"]["tmp_name"]; // getting temporary source of excel file
		  include("../PHPExcel/IOFactory.php"); // Add PHPExcel Library in this code
		  $objPHPExcel = PHPExcel_IOFactory::load($file); // create object of PHPExcel library by using load() method and in load method define path of selected file

			  foreach ($objPHPExcel->getWorksheetIterator() as $worksheet)
			  {
			   $highestRow = $worksheet->getHighestRow();
				   for($row=2; $row<=$highestRow; $row++)
				   {
					$STT = mysqli_real_escape_string($link, $worksheet->getCellByColumnAndRow(0, $row)->getValue());
					$MSSV = mysqli_real_escape_string($link, $worksheet->getCellByColumnAndRow(1, $row)->getValue());
					$HK1 = mysqli_real_escape_string($link, $worksheet->getCellByColumnAndRow(2, $row)->getValue());
					if($HK1==''){$HK1=10.1;}
					$HK2 = mysqli_real_escape_string($link, $worksheet->getCellByColumnAndRow(3, $row)->getValue());
					if($HK2==''){$HK2=10.1;}
					$HK3 = mysqli_real_escape_string($link, $worksheet->getCellByColumnAndRow(4, $row)->getValue());
					if($HK3==''){$HK3=10.1;}
					$HK4 = mysqli_real_escape_string($link, $worksheet->getCellByColumnAndRow(5, $row)->getValue());
					if($HK4==''){$HK4=10.1;}
					$HK5 = mysqli_real_escape_string($link, $worksheet->getCellByColumnAndRow(6, $row)->getValue());
					if($HK5==''){$HK5=10.1;}
					$HK6 = mysqli_real_escape_string($link, $worksheet->getCellByColumnAndRow(7, $row)->getValue());
					if($HK6==''){$HK6=10.1;}
					$HK7 = mysqli_real_escape_string($link, $worksheet->getCellByColumnAndRow(8, $row)->getValue());
					if($HK7==''){$HK7=10.1;}
					$query = "INSERT INTO renluyen(STT, MSSV, HK1, HK2, HK3, HK4, HK5, HK6, HK7) VALUES (".$STT.", '".$MSSV."', IF(".$HK1."=10.1,NULL,".$HK1."), IF(".$HK2."=10.1,NULL,".$HK2."), IF(".$HK3."=10.1,NULL,".$HK3."), IF(".$HK4."=10.1,NULL,".$HK4."), IF(".$HK5."=10.1,NULL,".$HK5."), IF(".$HK6."=10.1,NULL,".$HK6."), IF(".$HK7."=10.1,NULL,".$HK7."))";
					$kqquery=mysqli_query($link, $query);
					$Lop=$_SESSION["Lop"];
						if($kqquery){
							echo "<script>alert('Tạo lớp mới ".$Lop." thành công!'); window.location='../index.php?t=GV'
							   		</script>";
						}
						else {
							echo "<script>alert('Lỗi thực thi truy vấn cơ sở dữ liệu.'); window.location='addclass.php?step=4'</script>";
						}
					}
			  }
		 }
	}
}

?>