<!doctype html>
<html><!-- InstanceBegin template="/Templates/child.dwt.php" codeOutsideHTMLIsLocked="false" --><head>
<meta charset="utf-8">

<!-- InstanceBeginEditable name="EditRegion1" -->

<title>Quản lý Hồ sơ Sinh viên</title>

<!-- InstanceEndEditable -->

<link rel="icon" type="image/png" href="../images/icons/1.ico"/>
<link rel="stylesheet" type="text/css" href="../css/index.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href='https://fonts.googleapis.com/css?family=Raleway:400,500,300' rel='stylesheet' type='text/css'>
<script src='https://kit.fontawesome.com/a076d05399.js'></script>

<!-- InstanceBeginEditable name="EditRegion2" -->
<link rel="stylesheet" type="text/css" href="../css/edit.css"/>
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
<?php 
include_once("config.php"); 
$lop=$_GET["name"];
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript" src="dist/jquery.tabledit.js"></script>
<script type="text/javascript" src="custom_table_edit.js"></script>	
				<div class="zui-wrapper">
				  <div class="zui-scroller">
	<table id="data_table" class="edit-table">
		<thead>
			<tr>
				<th>Tên</th>
                <th>MSSV</th>
				<th>Giới tính</th>
				<th>Ngày sinh</th>
				<th>Email</th>
				<th>Điện thoại</th>
				<th>Địa chỉ</th>
				<th>Quê quán</th>
				<th>Dân tộc</th>
				<th>Người thân</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			$sql_query = "SELECT * FROM sinhvien WHERE Lop='".$lop."'";
			$resultset = mysqli_query($link, $sql_query) or die("database error:". mysqli_error($link));
			while( $dong = mysqli_fetch_assoc($resultset) ) {
			?>
			   <tr id="<?php echo $dong ['MSSV']; ?>">
			   <td><?php echo $dong ['Ten']; ?></td>
               <td><?php echo $dong ['MSSV']; ?></td>
			   <td><?php echo $dong ['GioiTinh']; ?></td>
			   <td><?php echo $dong ['NgaySinh']; ?></td>
			   <td><?php echo $dong ['Email']; ?></td>
			   <td><?php echo $dong ['SDT']; ?></td>
			   <td><?php echo $dong ['DiaChi']; ?></td>
			   <td><?php echo $dong ['QueQuan']; ?></td>
			   <td><?php echo $dong ['DanToc']; ?></td>
			   <td><?php echo $dong ['NguoiThan']; ?></td>   
			   </tr>
			<?php } ?>
		</tbody>
    </table>	
</div>
</div>
</br>
<a class="Updatebtn1" href="class.php?name=<?php echo $lop;?>"><i class="far fa-arrow-alt-circle-left"></i>&nbsp;Xong</a>
<form class="slsform" action="MSSVdelete.php" method="post">
<input type="hidden" name="lop" value="<?php echo $lop; ?>"/>
<input type="number" name="MSSVdelete" placeholder="Mã số sinh viên" required/>
<button class="Editbtn" name="import" onclick="return confirm('Xóa tất cả dữ liệu của sinh viên này?');">Xóa</button>
</form>
                                                                                                       
<!-- InstanceEndEditable -->



</div>
    <div class="footer">
    </br></br>Đại học Quốc gia Thành phố Hồ Chí Minh</br>
    Trường Đại học Khoa học Xã hội và Nhân văn</br>
    Khoa Thư viện - Thông tin học
    </div>
</body>
<!-- InstanceEnd --></html>