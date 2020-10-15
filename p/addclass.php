<?php 
require_once "config.php";
session_start();
if (!empty($_POST)){
	//Lấy id đang đăng nhập
	$id=$_SESSION["id"];
}
	$step=$_GET['step'];
?>
<!doctype html>
<html><!-- InstanceBegin template="/Templates/child.dwt.php" codeOutsideHTMLIsLocked="false" --><head>
<meta charset="utf-8">

<!-- InstanceBeginEditable name="EditRegion1" -->

<title>Thêm lớp</title>
<link rel="stylesheet" type="text/css" href="../css/addclass.css"/>
<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
<script src="../js/class.js"></script>
<!-- InstanceEndEditable -->

<link rel="icon" type="image/png" href="../images/icons/1.ico"/>
<link rel="stylesheet" type="text/css" href="../css/index.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href='https://fonts.googleapis.com/css?family=Raleway:400,500,300' rel='stylesheet' type='text/css'>
<script src='https://kit.fontawesome.com/a076d05399.js'></script>

<!-- InstanceBeginEditable name="EditRegion2" -->

<!-- InstanceEndEditable -->

</head>
<body>
<div class="all">
	<div class="lisbanner">
    	<div class="lislogo">
      		<a href="../index.php" title="Trang chủ"><img id="lislogoimg" src="../images/LIS_COLOR.png"/></a>
    		<p style="font-family:Logo; font-size:60px; margin-top:30px; color:#003D59">LIS</br></br></br></br></br></p>
            <ul>
              <li><a href="about.html">Giới thiệu</a></li>
              <li><a href="guide.html">Hướng dẫn</a></li>
              <li><a href="contact.html">Liên hệ</a></li>
            </ul>
    	</div>
<!-- InstanceBeginEditable name="EditRegion3" -->       
<div class="TaoLop">
<a href="import.php?t=back&s=all" class="cancelbtn" title="Hủy"><i class="far fa-times-circle"></i></a>
  <p style="width:100%; font-size:30px;text-align:center;font-family:Nabila;color:#003D59; margin-bottom:0; line-height:60px;">Tạo lớp</p></br>
  <?php
	if($step==1){
	echo '<p style="color:#B6B6B6; font-family:Arial; font-size:16px; margin-left:140px;">
  <span style="color:#FE6625; font-weight:bold;">1) Đặt tên lớp</span></br>
  2) Thêm thông tin sinh viên</br>
  3) Thêm bảng điểm học tập</br>
  4) Thêm bảng điểm rèn luyện
  </p>
  <form action="import.php" method="post">
    <input type="text" name="TenLop" placeholder="Tên lớp" required/></br>
	<input type="submit" value="Tiếp theo" />
  </form>';
}
	else if($step==2){
		echo'<p style="color:#B6B6B6; font-family:Arial; font-size:16px; margin-left:140px;">
  1) Đặt tên lớp</br>
  <span style="color:#FE6625; font-weight:bold;">2) Thêm thông tin sinh viên</span></br>
  3) Thêm bảng điểm học tập</br>
  4) Thêm bảng điểm rèn luyện
  </p>
  <form action="import.php" method="post" enctype="multipart/form-data">
  <p style="font-family:Ubuntu-Regular; font-size:17px; font-weight:bold;">Nhúng dữ liệu từ file Excel:&nbsp; &nbsp;<a href="../file/MauThongTinSinhVien.xlsx" title="Tải file mẫu" download><i class="fas fa-download" style="font-size:20px"></i></a></p>
    <input type="file" name="excel" accept=".xls,.xlsx,.csv" required/></br>
	<input type="hidden" name="step" value="2"/></br>
	<a href="import.php?t=back&s=1" class="backbutton">Trở lại</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="submit" name="import" value="Nhúng file" />
  </form>';
	}
	else if($step==3){
		echo'<p style="color:#B6B6B6; font-family:Arial; font-size:16px; margin-left:140px;">
  1) Đặt tên lớp</br>
  2) Thêm thông tin sinh viên</br>
  <span style="color:#FE6625; font-weight:bold;">3) Thêm bảng điểm học tập</span></br>
  4) Thêm bảng điểm rèn luyện
  </p>
  <form action="import.php" method="post" enctype="multipart/form-data">
  <p style="font-family:Ubuntu-Regular; font-size:17px; font-weight:bold;">Nhúng dữ liệu từ file Excel:&nbsp; &nbsp;<a href="../file/MauDiemHocTap.xlsx" title="Tải file mẫu" download><i class="fas fa-download"  style="font-size:20px"></i></a></p>
    <input type="file" name="excel" accept=".xls,.xlsx,.csv" required/></br>
	<input type="hidden" name="step" value="3"/></br>
	<a href="import.php?t=back&s=2" class="backbutton">Trở lại</a>
	<input type="submit" name="import" value="Nhúng file" />
	<a href="addclass.php?step=4" class="ignorebutton">Bỏ qua</a>
  </form>';
	}
	else if($step==4){
		echo'<p style="color:#B6B6B6; font-family:Arial; font-size:16px; margin-left:140px;">
  1) Đặt tên lớp</br>
  2) Thêm thông tin sinh viên</br>
  3) Thêm bảng điểm học tập</br>
  <span style="color:#FE6625; font-weight:bold;">4) Thêm bảng điểm rèn luyện</span>
  </p>
  <form action="import.php" method="post" enctype="multipart/form-data">
  <p style="font-family:Ubuntu-Regular; font-size:17px; font-weight:bold;">Nhúng dữ liệu từ file Excel:&nbsp; &nbsp;<a href="../file/MauDiemRenLuyen.xlsx" title="Tải file mẫu" download><i class="fas fa-download"  style="font-size:20px"></i></a></p>
    <input type="file" name="excel" accept=".xls,.xlsx,.csv" required/></br>
	<input type="hidden" name="step" value="4"/></br>
	<a href="import.php?t=back&s=3" class="backbutton">Trở lại</a>
	<input type="submit" name="import" value="Nhúng file" />
	<a onclick="alertAddclass();" class="ignorebutton">Bỏ qua</a>
  </form>';
	}
  ?>
  
  

  
  
  
  
</div>
<!-- InstanceEndEditable -->

 
  	
    </div>
    
<!-- InstanceBeginEditable name="EditRegion4" -->
<!-- InstanceEndEditable -->



</div>
    <div class="footer">
    </br></br>Đại học Quốc gia Thành phố Hồ Chí Minh</br>
    Trường Đại học Khoa học Xã hội và Nhân văn</br>
    Khoa Thư viện - Thông tin học
    </div>
</body>
<!-- InstanceEnd --></html>