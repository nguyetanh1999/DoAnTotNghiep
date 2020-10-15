<?php
// Initialize the session
session_start();
require_once "p/config.php";
 
// Kiểm tra user chưa đăng nhập, nếu chưa thì chuyển tới trang đăng nhập
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
	header("location: p/login.php");
    exit;
}


$sql="SELECT * from lop WHERE NguoiTao='".$_SESSION["id"]."'";
$kq = mysqli_query($link, $sql);

$sql11="SELECT * from lop WHERE Lop=''";
$kq11 = mysqli_query($link, $sql);
?>
<!doctype html>
<html><!-- InstanceBegin template="/Templates/index.dwt.php" codeOutsideHTMLIsLocked="false" --><head>
<meta charset="utf-8">
<!-- InstanceBeginEditable name="EditRegion1" -->
<title>Quản lý Hồ sơ Sinh viên</title>

<!-- InstanceEndEditable -->
<link rel="icon" type="image/png" href="images/icons/1.ico"/>
<link rel="stylesheet" type="text/css" href="css/index.css"/>
<link href='https://fonts.googleapis.com/css?family=Raleway:400,500,300' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="fontawesome-free-5.12.0-web/css/all.min.css"/>
<!-- InstanceBeginEditable name="EditRegion2" -->
<!-- InstanceEndEditable -->
</head>
<body>
<div class="all">
	<div class="lisbanner">
    	<div class="lislogo">
      		<img id="lislogoimg" src="images/LIS_COLOR.png"/>
    		<p style="font-family:Logo; font-size:60px; margin-top:30px; color:#003D59">LIS</br></br></br></br></br></p>
            <ul>
              <li><a href="p/about.html">Giới thiệu</a></li>
              <li><a href="p/guide.html">Hướng dẫn</a></li>
              <li><a href="p/contact.html">Liên hệ</a></li>
            </ul>
    	</div>
        
<!-- InstanceBeginEditable name="EditRegion4" -->
        
      <img src="images/wp.jpeg" style="	height:400px;
                                        min-width:100%;
                                        object-fit: cover;
                                        vertical-align: middle;
                                        padding-top:18px;
                                        position:absolute;"/>
      <img src="images/ava.png" style="position:relative; 
      width:200px; 
      height:200px;
      top: 200px;
      left: 50%;
      transform: translate(-50%, -50%);"/>
  <div class="name">
      <div class="un"><a href=""><i class='fas fa-user-circle' style='font-size:24px'></i>&nbsp;
                          <?php echo $_SESSION["username"]; ?></a> </div>
      <div class="logout"><a href="p/logout.php"><i class='fas fa-sign-out-alt' style='font-size:24px'></i>&nbsp;
                          <?php echo "Đăng xuất"; ?></a>  </div>  
  </div>  

<!-- InstanceEndEditable -->  
  	
    </div>
    
<!-- InstanceBeginEditable name="EditRegion5" -->
<?php
if($_SESSION["type"]=='GV'){
	echo '	<div class="content">
		<div class="left">
			 <p style="width:100%; font-size:30px;text-align:center;font-family:Nabila;color:#003D59; margin-bottom:0">Lớp đang quản lý:</p></br></br>';
			 if(mysqli_num_rows($kq)>0){
				 echo '			 <div class= "TieuDe">        
				<p class="TieuDeLop">Lớp
				</p>
				<p class="TieuDeSL">Số SV
				</p >
			</div>';
			 }
			 else {
				 echo 'Chưa có lớp nào được tạo.';
			 }

	 while ($dong = mysqli_fetch_array($kq, MYSQLI_ASSOC))
	{ echo '
	<form method="post" action="p/maintabs.php" class="inline">
		<input type="hidden" name="TenLop" value="'.$dong["TenLop"].'">
  		<button id = "Lop" type="submit" name="submit_param" value="submit_value">
			<div class="Ten">'.$dong["TenLop"].'
				</div>
				<div class="SL">'.$dong["SoLuong"].'
				</div>
		</button>
	</form>	
';
	}

	echo '		</div>
		<div class="Right">
			<a class="ThemLop" href="p/addclass.php?step=1" title="Thêm Lớp">
			 +
		   </a>
		</div>
	</div>';
}
else if($_SESSION["type"] =='SV'){
	
	echo '	<div class="content">
		<div class="center">
			 <p style="width:100%; font-size:30px;text-align:center;font-family:Nabila;color:#003D59; margin-bottom:0">Thông tin sinh viên</p></br></br> </div> </div>';
	require_once "p/hssv.php";		 


}
else if($_SESSION["type"] =='Admin'){
	

		echo '	<div class="content">
		<div class="left">
			 <p style="width:100%; font-size:30px;text-align:center;font-family:Nabila;color:#003D59; margin-bottom:0">Các lớp hiện đang có:</p></br></br>';
			 if(mysqli_num_rows($kq11)>0){
				 echo '			 <div class= "TieuDe">        
				<p class="TieuDeLop">Lớp
				</p>
				<p class="TieuDeSL">Số SV
				</p >
			</div>';
			 }
			 else {
				 echo 'Chưa có lớp nào được tạo.';
			 }

	 while ($dong = mysqli_fetch_array($kq11, MYSQLI_ASSOC))
	{ echo '
	<form method="post" action="p/maintabs.php" class="inline">
		<input id="Lop" type="hidden" name="TenLop" value="'.$dong["TenLop"].'">
  		<button id="Lop" type="submit" name="submit_param" value="submit_value" class="link-button">
			<div class="Ten">'.$dong["TenLop"].'
				</div>
				<div class="SL">'.$dong["SoLuong"].'
				</div>
		</button>
	</form>	
			
';
	}

	echo '		</div>
		<div class="Right">
			<a class="ThemLop" href="p/addclass.php?step=1" title="Thêm Lớp">
			 +
		   </a>
		</div>
	</div>';	
	
	echo '		</div>
		<div class="Right">
			<a class="ThemLop" href="p/maintabs.php" title="Maintabs">
			 +
		   </a>
		</div>
	</div>';


}
?>

<!-- InstanceEndEditable -->  

</div>
    <div class="footer">
    </br></br>Đại học Quốc gia Thành phố Hồ Chí Minh</br>
    Trường Đại học Khoa học Xã hội và Nhân văn</br>
    Khoa Thư viện - Thông tin học
    </div>
</body>
<!-- InstanceEnd --></html>
