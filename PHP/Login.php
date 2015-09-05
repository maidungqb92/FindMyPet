<?php
	//Khoi tao bien Session
	session_start();

	$_SESSION['TenDN'] = "";
	$_SESSION['MatKhau'] = "";
	$_SESSION['MaPhanQuyen'] = "";
	$_SESSION['Ho'] = "";
	$_SESSION['Ten'] = "";
	$_SESSION['Email'] = "";
	$_SESSION['SoDienThoai'] = "";

	if(isset($_POST['submit']))
	{
		$rootURL = 'http://localhost:8084/FindMyPet/';
		if($_POST['TenDN'] != "" && $_POST['MatKhau'] != "")
		{
			require_once("ConnectDB.php");
			$conn = ConnectDB::connect();
		
			$sql = "SELECT * FROM User WHERE TenDN = '".$_POST['TenDN']."' AND MatKhau = '".$_POST['MatKhau']."'";
			$Result = mysqli_query($conn, $sql);
			if($Result->num_rows >0)
			{
				$row = $Result->fetch_assoc();
				$_SESSION['TenDN'] = $row['TenDN'];
				$_SESSION['MatKhau'] = $row['MatKhau'];
				$_SESSION['MaPhanQuyen'] = $row['MaPhanQuyen'];
				$_SESSION['Ho'] = $row['Ho'];
				$_SESSION['Ten'] = $row['Ten'];
				$_SESSION['Email'] = $row['Email'];
				$_SESSION['SoDienThoai'] = $row['SoDienThoai'];
				if($row['MaPhanQuyen'] == 1)
				{
					ConnectDB::disconnect();
					header('Location: ../Admin/DMChucNang.php');
				}
				else
				{
					ConnectDB::disconnect();
					header('Location: ../Index.php');
				}
			}
		}
	}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Find My Pet</title>
<link rel="stylesheet" href="../css/styleLogin.css">
</head>

<body>
  <section class="container">
    <div class="login">
      <h1>Form đăng nhập</h1>
      <form method="post" name="main-form">
        <p><input type="text" name="TenDN" value="" placeholder="Tên đăng nhập"></p>
        <p><input type="password" name="MatKhau" value="" placeholder="Mật khẩu"></p>
        <p class="remember_me">
          <label>
            <input type="checkbox" name="remember_me" id="remember_me">
            Duy trì đăng nhập
          </label>
        </p>
        <p class="submit"><input type="submit" name="submit" value="Đăng nhập"></p>
      </form>
    </div>
    <div class="login-help">
        <a href="../Khach/DangKy.php">Đăng ký thành viên</a>
    </div>
    <div class="login-help">
        <a href="../index.php">Trở về Trang chủ</a>
    </div>
  </section>
</body>
</html>