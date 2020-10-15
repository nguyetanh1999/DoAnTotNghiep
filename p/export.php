<?php 
session_start();
include_once('config.php'); include('../PHPExcel.php');
if (!$link) {
    die('Lỗi kết nối: ' . mysql_error());
}
if(isset($_GET["t"])&&isset($_GET["l"])){
	$_SESSION["Lop"]=$_GET["l"];
	$Lop=$_SESSION["Lop"];
	$table=$_GET["t"];
}
if($table=='hocbong'){
	$hocki=$_GET["hk"];
	$dht=$_GET["dht"];
	$drl=$_GET["drl"];

}
$objPHPExcel    =   new PHPExcel();
//////////////////////////////////////////////////////////////SINH VIÊN//////////////////////////////////////////////////
if($table=='sinhvien'){
$result         =   $link->query("SELECT * FROM sinhvien WHERE MSSV in (SELECT a.MSSV FROM ".$table." a JOIN sinhvien b ON a.MSSV=b.MSSV WHERE b.Lop='".$Lop."')") or die(mysql_error());

$objPHPExcel->setActiveSheetIndex(0);
$objPHPExcel->getActiveSheet()->SetCellValue('A1', 'STT');
$objPHPExcel->getActiveSheet()->SetCellValue('B1', 'MSSV');
$objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Họ & Tên');
$objPHPExcel->getActiveSheet()->SetCellValue('D1', 'Giới tính');
$objPHPExcel->getActiveSheet()->SetCellValue('E1', 'Ngày sinh');
$objPHPExcel->getActiveSheet()->SetCellValue('F1', 'Email');
$objPHPExcel->getActiveSheet()->SetCellValue('G1', 'SĐT');
$objPHPExcel->getActiveSheet()->SetCellValue('H1', 'Địa chỉ');
$objPHPExcel->getActiveSheet()->SetCellValue('I1', 'Quê quán');
$objPHPExcel->getActiveSheet()->SetCellValue('J1', 'Dân tộc');
$objPHPExcel->getActiveSheet()->SetCellValue('K1', 'Người thân');
 
$objPHPExcel->getActiveSheet()->getStyle("A1:K1")->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle("A:K")->getFont()->setName('Times New Roman');

$rowCount   =   2;
	while($row  =   $result->fetch_assoc()){
		$objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, $row['STT']);
		$objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, $row['MSSV']);
		$objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, $row['Ten']);
		$objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, $row['GioiTinh']);
		$objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, $row['NgaySinh']);
		$objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, $row['Email']);
		$objPHPExcel->getActiveSheet()->SetCellValue('G'.$rowCount, $row['SDT']);
		$objPHPExcel->getActiveSheet()->SetCellValue('H'.$rowCount, $row['DiaChi']);
		$objPHPExcel->getActiveSheet()->SetCellValue('I'.$rowCount, $row['QueQuan']);
		$objPHPExcel->getActiveSheet()->SetCellValue('J'.$rowCount, $row['DanToc']);
		$objPHPExcel->getActiveSheet()->SetCellValue('K'.$rowCount, $row['NguoiThan']);
		$rowCount++;
	}
}
////////////////////////////////////////////////////HỌC BỔNG/////////////////////////////////////////////////////////
else if($table=='hocbong'){
$result         =   $link->query("SELECT a.Ten Ten, a.MSSV MSSV, b.HK".$hocki." DHT, c.HK".$hocki." DRL FROM sinhvien a join hoctap b ON a.MSSV=b.MSSV JOIN renluyen c ON a.MSSV=c.MSSV WHERE a.Lop='".$Lop."' AND b.HK".$hocki.">=".$dht." AND c.HK".$hocki.">=".$drl."") or die(mysql_error());

$objPHPExcel->setActiveSheetIndex(0);
$objPHPExcel->getActiveSheet()->SetCellValue('A1', 'STT');
$objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Họ & Tên');
$objPHPExcel->getActiveSheet()->SetCellValue('C1', 'MSSV');
$objPHPExcel->getActiveSheet()->SetCellValue('D1', 'Điểm học tập');
$objPHPExcel->getActiveSheet()->SetCellValue('E1', 'Điểm rèn luyện');
 
$objPHPExcel->getActiveSheet()->getStyle("A1:E1")->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle("A:E")->getFont()->setName('Times New Roman');
$rowCount   =   2;
		$stt=1;
	while($row  =   $result->fetch_assoc()){
		$objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, $stt);
		$objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, $row['Ten']);
		$objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, $row['MSSV']);
		$objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, $row['DHT']);
		$objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, $row['DRL']);
		$rowCount++;
		$stt++;
	}	
}
////////////////////////////////////////////////////////HOẠT ĐỘNG////////////////////////////////////////////////////
else if($table=='hoatdong'){
	$tenhd=$_GET['tenhd'];
	if($tenhd=='all'){
		$result = $link->query("SELECT a.Ten TenHD, b.Ten Ten, a.MSSV, a.GhiChu FROM hoatdong a JOIN sinhvien b ON a.MSSV=b.MSSV WHERE b.Lop='".$Lop."' ORDER BY a.Ten") or die(mysql_error());
			$objPHPExcel->setActiveSheetIndex(0);
			$objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Hoạt động');
			$objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Họ và tên');
			$objPHPExcel->getActiveSheet()->SetCellValue('C1', 'MSSV');
			$objPHPExcel->getActiveSheet()->SetCellValue('D1', 'Ghi chú');
			 
			$objPHPExcel->getActiveSheet()->getStyle("A1:D1")->getFont()->setBold(true);
			$objPHPExcel->getActiveSheet()->getStyle("A:D")->getFont()->setName('Times New Roman');
			$rowCount   =   2;
				while($row  =   $result->fetch_assoc()){
					$objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, $row['TenHD']);
					$objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, $row['Ten']);
					$objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, $row['MSSV']);
					$objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, $row['GhiChu']);
					$rowCount++;
				}	

	}
	$result         =   $link->query("SELECT b.Ten, a.MSSV, a.GhiChu FROM hoatdong a JOIN sinhvien b ON a.MSSV=b.MSSV WHERE b.Lop='".$Lop."' AND a.Ten='".$tenhd."'") or die(mysql_error());
	
	$objPHPExcel->setActiveSheetIndex(0);
	$objPHPExcel->getActiveSheet()->SetCellValue('A1', $tenhd);
	$objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Họ và tên');
	$objPHPExcel->getActiveSheet()->SetCellValue('C1', 'MSSV');
	$objPHPExcel->getActiveSheet()->SetCellValue('D1', 'Ghi chú');
	 
	$objPHPExcel->getActiveSheet()->getStyle("A1:D1")->getFont()->setBold(true);
	$objPHPExcel->getActiveSheet()->getStyle("A:D")->getFont()->setName('Times New Roman');
	$rowCount   =   2;
		while($row  =   $result->fetch_assoc()){
			$objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, $row['Ten']);
			$objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, $row['MSSV']);
			$objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, $row['GhiChu']);
			$rowCount++;
		}	
	
}
//////////////////////////////////////////////// ĐIỂM HỌC TẬP & RÈN LUYỆN////////////////////////////////////////////////
else {  
$result         =   $link->query("SELECT * FROM ".$table." WHERE MSSV in (SELECT a.MSSV FROM ".$table." a JOIN sinhvien b ON a.MSSV=b.MSSV WHERE b.Lop='".$Lop."')") or die(mysql_error());

$objPHPExcel->setActiveSheetIndex(0);
$objPHPExcel->getActiveSheet()->SetCellValue('A1', 'STT');
$objPHPExcel->getActiveSheet()->SetCellValue('B1', 'MSSV');
$objPHPExcel->getActiveSheet()->SetCellValue('C1', 'HK1');
$objPHPExcel->getActiveSheet()->SetCellValue('D1', 'HK2');
$objPHPExcel->getActiveSheet()->SetCellValue('E1', 'HK3');
$objPHPExcel->getActiveSheet()->SetCellValue('F1', 'HK4');
$objPHPExcel->getActiveSheet()->SetCellValue('G1', 'HK5');
$objPHPExcel->getActiveSheet()->SetCellValue('H1', 'HK6');
$objPHPExcel->getActiveSheet()->SetCellValue('I1', 'HK7');
 
$objPHPExcel->getActiveSheet()->getStyle("A1:I1")->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle("A:I")->getFont()->setName('Times New Roman');
$rowCount   =   2;
	while($row  =   $result->fetch_assoc()){
		$objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, $row['STT']);
		$objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, $row['MSSV']);
		$objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, $row['HK1']);
		$objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, $row['HK2']);
		$objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, $row['HK3']);
		$objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, $row['HK4']);
		$objPHPExcel->getActiveSheet()->SetCellValue('G'.$rowCount, $row['HK5']);
		$objPHPExcel->getActiveSheet()->SetCellValue('H'.$rowCount, $row['HK6']);
		$objPHPExcel->getActiveSheet()->SetCellValue('I'.$rowCount, $row['HK7']);

		$rowCount++;
	}
} 
$objWriter  =   new PHPExcel_Writer_Excel2007($objPHPExcel);
 
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

header('Content-Type: application/vnd.ms-excel'); //mime type
header('Content-Disposition: attachment;filename="'.$table.$Lop.'.xlsx"'); //tell browser what's the file name
if($table=='hocbong'){
header('Content-Disposition: attachment;filename="'.$table.$Lop.'-HK'.$hocki.'.xlsx"'); //tell browser what's the file name	
}
if($table=='hoatdong'){
header('Content-Disposition: attachment;filename="'.$table.$Lop.'-'.$tenhd.'.xlsx"'); //tell browser what's the file name	
}
header('Cache-Control: max-age=0'); //no cache
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');  
$objWriter->save('php://output');
?>