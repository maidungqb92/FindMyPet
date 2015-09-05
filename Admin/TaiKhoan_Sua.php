<?php
	session_start();
	include_once(realpath(dirname(__DIR__))."/PHP/define.php");
	if(array_key_exists('TenDN',$_SESSION) && array_key_exists('MaPhanQuyen',$_SESSION))
	{
		if($_SESSION['MaPhanQuyen'] != NHOM_QUAN_TRI)
		{
			header('Location: ../PHP/Login.php');
		}
	}
	else
	{
		header('Location: ../PHP/Login.php');
	}
	
	require_once("../PHP/ConnectDB.php");
	$conn = ConnectDB::connect();
		
	if(isset($_POST['submit']))
	{
		// Insert co so du lieu
		$sql = "UPDATE User SET MatKhau='".$_POST['txtMatKhau']."', MaPhanQuyen=".$_POST['slPhanQuyen'].", Ho = '".$_POST['txtHo']."', Ten = '".$_POST['txtTen']."', Email='".$_POST['txtEmail']."', DiaChi='".$_POST['txtDiaChi']."', SoDienThoai='".$_POST['txtSoDienThoai']."' WHERE TenDN = '".$_GET['TenDN']."'";
		if($conn->query($sql) === TRUE)
		{
			echo "Nhap du lieu thanh cong";
			ConnectDB::disconnect();
			header('Location: QLTaiKhoan.php');
		}
		else
		{
			echo "Nhap du lieu Loi";
		}
		ConnectDB::disconnect();
	}
	
?>
<html>
<head>
	<title>Find My Pet</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!-- Meta Responsive -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Bootstrap core CSS -->
	<script src="../asset/js/jquery-1.11.3.min.js"> </script>
	<script src="../asset/js/jquery.min.js"></script>
	<script src="../asset/js/ie-emulation-modes-warning.js"></script>
    <link href="../asset/Bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/menu.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="../css/style.css" media="screen" />
    <script src="../asset/js/bootstrap.min.js"></script>
    <!-- Chen Validation -->
    <script src="../asset/js/jquery.validate.js"></script>
</head>
<body style="background-color: lightgrey;min-height:100%;">
	<?php
        include("menu_Admin.php");
    ?>
<div class="container" style="background-color: whitesmoke;width:980px; border-radius: 5px;">
	<div class="row" style="background-color: whitesmoke;padding-top: 5px;">
    	<p class="bg-primary" style="margin-right: 5px;margin-left: 5px;font-size: 30px;color:white;font-family: tahoma;text-align: center;border-radius:5px;padding-bottom: 5px;"> <b>Cập nhật thông tin tài khoản</b> </p>
    </div>
    <div class="row">
    	<!-- Chèn form để xem thông tin tài khoản -->
        <?php
			require_once("../PHP/ConnectDB.php");
			$conn = ConnectDB::connect();
			$sql = "SELECT * FROM User WHERE TenDN = '".$_GET['TenDN']."'";
	
			$resut = mysqli_query($conn, $sql);
			if($resut->num_rows>0)
			{
				$row = $resut->fetch_assoc();
			}
		?>
        <form class="form-horizontal" name="frmSuaTaiKhoan" method="post" enctype="multipart/form-data">
                <div class="form-group">
	                <label for="txtTenDN" class="col-sm-2 control-label">Tên đăng nhập: </label>
    				<div class="col-sm-5">
      					<input type="text" disabled class="form-control" name="txtTenDN" value="<?php echo $_GET['TenDN']?>">
    				</div>
  				</div>
                <div class="form-group">
    				<label for="txtMatKhau" class="col-sm-2 control-label">Mật khẩu: </label>
    				<div class="col-sm-5">
      					<input type="password" class="form-control" name="txtMatKhau" placeholder="Mật khẩu" value="<?php echo $row['MatKhau']; ?>">
    				</div>
  				</div>
                <div class="form-group">
    				<label for="slPhanQuyen" class="col-sm-2 control-label">Phân quyền: </label>
    				<div class="col-sm-5">
                    	<select class="form-control" name="slPhanQuyen">
                        	<?php	
								require_once("../PHP/ConnectDB.php");
								$conn = ConnectDB::connect();							
								$sqlDM = "SELECT MaPhanQuyen, MoTa FROM PhanQuyen";
								$resutDM = mysqli_query($conn, $sqlDM);
								if($resutDM->num_rows >0)
								{
									while ($rowMD = $resutDM->fetch_assoc())
									{
										if($row['MaPhanQuyen'] == $rowMD['MaPhanQuyen'])
										{
											echo "<option value='".$rowMD['MaPhanQuyen']."' selected> ".$rowMD['MoTa']."</option>";	
										}
										else
										{
											echo "<option value='".$rowMD['MaPhanQuyen']."'> ".$rowMD['MoTa']."</option>";										
										}
									}
								}
							?>
                        </select>
    				</div>
  				</div>
                <div class="form-group">
    				<label for="txtHo" class="col-sm-2 control-label">Họ: </label>
    				<div class="col-sm-5">
      					<input type="text" class="form-control" name="txtHo" placeholder="Họ lót" value="<?php echo $row['Ho']; ?>">
    				</div>
  				</div>
                <div class="form-group">
    				<label for="txtTen" class="col-sm-2 control-label">Tên: </label>
    				<div class="col-sm-5">
      					<input type="text" class="form-control" name="txtTen" placeholder="Tên" value="<?php echo $row['Ten']; ?>">
    				</div>
  				</div>
                <div class="form-group">
    				<label for="txtEmail" class="col-sm-2 control-label">Email: </label>
    				<div class="col-sm-5">
      					<input type="email" class="form-control" name="txtEmail" placeholder="Email@gmail.com" value="<?php echo $row['Email']; ?>" required>
    				</div>
  				</div>
                <div class="form-group">
    				<label for="txtDiaChi" class="col-sm-2 control-label">Địa chỉ: </label>
    				<div class="col-sm-5">
      					<input type="text" class="form-control" name="txtDiaChi" placeholder="Địa chỉ" value="<?php echo $row['DiaChi']; ?>">
    				</div>
  				</div>
                <div class="form-group">
    				<label for="txtSoDienThoai" class="col-sm-2 control-label">Số điện thoại: </label>
    				<div class="col-sm-5">
      					<input type="number" class="form-control" name="txtSoDienThoai" placeholder="Số điện thoại" value="<?php echo $row['SoDienThoai']; ?>" required>
    				</div>
  				</div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-success" name="submit">Sửa</button>
                      <a href="QLTaiKhoan.php"><button type="button" class="btn btn-default">Trở về</button></a>
                    </div>
              	</div>
    		</form>
</div>
</body>
</html>
