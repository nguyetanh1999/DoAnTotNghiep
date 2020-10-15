<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";

$username = $_POST['username'];
$password = $_POST['password'];

    
    // Validate credentials
		$sql = "SELECT * FROM taikhoan WHERE TenDangNhap='$username' AND MatKhau='$password'";
		$result = mysqli_query($link, $sql);
		$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
		$active = $row['active'];
      	$count = mysqli_num_rows($result);

 						 if ($count == 1) {
							
   							session_start();
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $row['ID'];
                            $_SESSION["username"] = $row['TenDangNhap'];
							$_SESSION["type"] = $row['LoaiTK'];                       
                            
                            // Redirect user to welcome page
                            header('location: ../index.php');
							} 
 							else {
 							   echo "<script>alert('Tên đăng nhập hoặc mật khẩu không chính xác. Vui lòng thử lại.'); window.location='login.php'
							   		</script>";
								  }
								      
    // Close connection
    mysqli_close($link);

?>
