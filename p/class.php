<?php
// Initialize the session
session_start();
require_once "config.php";
$name=$_GET['name'];
if(isset($_POST['Nhap'])){
        $NhapMSSV = $_POST["NhapMSSV"];
    }
else {$NhapMSSV=0;}
$sql1 = "SELECT * FROM sinhvien WHERE Lop='".$name."' ORDER BY sinhvien.STT";
$sql2 = "SELECT * FROM hoctap JOIN sinhvien ON hoctap.MSSV=sinhvien.MSSV WHERE Lop='".$name."' ORDER BY hoctap.STT";
$sql3 = "SELECT * FROM renluyen JOIN sinhvien ON renluyen.MSSV=sinhvien.MSSV WHERE Lop='".$name."' ORDER BY renluyen.STT";
$sql4 = "SELECT * FROM sinhvien JOIN hoctap ON sinhvien.MSSV=hoctap.MSSV WHERE sinhvien.MSSV='".$NhapMSSV."'";
$sql5 = "SELECT * FROM hoctap WHERE MSSV='".$NhapMSSV."'";
$sql6 = "SELECT * FROM renluyen WHERE MSSV='".$NhapMSSV."'";
$sql7 = "SELECT FORMAT((IF(HK1 IS NULL,0,HK1)+IF(HK2 IS NULL,0,HK2)+IF(HK3 IS NULL,0,HK3)+IF(HK4 IS NULL,0,HK4)+IF(HK5 IS NULL,0,HK5)+IF(HK6 IS NULL,0,HK6)+IF(HK7 IS NULL,0,HK7))/(IF(HK1 IS NULL,0,1)+IF(HK2 IS NULL,0,1)+IF(HK3 IS NULL,0,1)+IF(HK4 IS NULL,0,1)+IF(HK5 IS NULL,0,1)+IF(HK6 IS NULL,0,1)+IF(HK7 IS NULL,0,1)),2) as DTB FROM hoctap WHERE MSSV='".$NhapMSSV."'";

$kq1 = mysqli_query($link, $sql1);
$kq2 = mysqli_query($link, $sql2);
$kq3 = mysqli_query($link, $sql3);
$kq4 = mysqli_query($link, $sql4);
$kq5 = mysqli_query($link, $sql5);
$kq6 = mysqli_query($link, $sql6);
$kq7 = mysqli_query($link, $sql7);
$dong7 = mysqli_fetch_array($kq7, MYSQLI_ASSOC);


?>
<!doctype html>
<html><!-- InstanceBegin template="/Templates/child.dwt.php" codeOutsideHTMLIsLocked="false" --><head>
<meta charset="utf-8">

<!-- InstanceBeginEditable name="EditRegion1" -->

<title><?php echo $name; ?></title>

<!-- InstanceEndEditable -->

<link rel="icon" type="image/png" href="../images/icons/1.ico"/>
<link rel="stylesheet" type="text/css" href="../css/index.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href='https://fonts.googleapis.com/css?family=Raleway:400,500,300' rel='stylesheet' type='text/css'>
<script src='https://kit.fontawesome.com/a076d05399.js'></script>

<!-- InstanceBeginEditable name="EditRegion2" -->
<link rel="stylesheet" type="text/css" href="../css/class.css"/>
<link rel="stylesheet" type="text/css" href="../fontawesome-free-5.12.0-web/css/all.min.css"/>
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
			<script type="text/javascript" src="../dist/jquery.tabledit.js"></script>
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

<!-- InstanceEndEditable -->

 
  	
    </div>
    
<!-- InstanceBeginEditable name="EditRegion4" -->
<div style="max-width:500px; background-image:url(../images/wp.jpeg); margin:80px auto 0px auto; background-position:center; background-size:cover; vertical-align: middle; font-size:30px;text-align:center;font-family:Fester;color:white; padding: 14px 0px;">
    <?php echo $name; ?>&nbsp;&nbsp;<a href="ud-delete.php?t=all&l=<?php echo $name; ?>" onclick="return confirm('Xác nhận xóa tất cả dữ liệu của lớp này?')" style="color:white; font-size:30px;"><i class='fas fa-trash-alt' style='font-size:24px'></i></a>
    
</div>

<div class="container">	
		<div class="tab-wrap">
		
			<input type="radio" id="tab4" name="tabGroup2" class="tab" checked>
			<label for="tab4">Hồ sơ sinh viên</label>

			<input type="radio" id="tab5" name="tabGroup2" class="tab">
			<label for="tab5">Thông tin chung</label>

			<input type="radio" id="tab6" name="tabGroup2" class="tab">
			<label for="tab6">Điểm học tập</label>
			
			<input type="radio" id="tab7" name="tabGroup2" class="tab">
			<label for="tab7">Điểm rèn luyện</label>
            
            <input type="radio" id="tab8" name="tabGroup2" class="tab">
			<label for="tab8">Học bổng</label>
            
            <input type="radio" id="tab9" name="tabGroup2" class="tab">
			<label for="tab9">Hoạt động ngoại khóa</label>
			
           	<div class="tab__content">
				<?php include('classtab1.php');?>
			</div>

			<div class="tab__content">
				<?php include('classtab2.php');?>
            </div>

			<div class="tab__content">
            	<?php include('classtab3.php');?>
			</div>

			<div class="tab__content">
            	<?php include('classtab4.php');?>
			</div>
            
            <div class="tab__content">
            	<?php include('classtab5.php');?>
            </div>
            
            <div class="tab__content">
            	<?php include('classtab6.php');?>
            </div>
    </div>
</div>
            


<!--===============================================================================================-->	
	<script src="../vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/bootstrap/js/popper.js"></script>
	<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script>
		$('.js-pscroll').each(function(){
			var ps = new PerfectScrollbar(this);

			$(window).on('resize', function(){
				ps.update();
			})

			$(this).on('ps-x-reach-start', function(){
				$(this).parent().find('.table100-firstcol').removeClass('shadow-table100-firstcol');
			});

			$(this).on('ps-scroll-x', function(){
				$(this).parent().find('.table100-firstcol').addClass('shadow-table100-firstcol');
			});

		});

		
		
		
	</script>
<!--===============================================================================================-->
	<script src="../js/class.js"></script>
<!-- InstanceEndEditable -->



</div>
    <div class="footer">
    </br></br>Đại học Quốc gia Thành phố Hồ Chí Minh</br>
    Trường Đại học Khoa học Xã hội và Nhân văn</br>
    Khoa Thư viện - Thông tin học
    </div>
</body>
<!-- InstanceEnd --></html>