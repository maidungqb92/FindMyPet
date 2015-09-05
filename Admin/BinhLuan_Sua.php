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
	$date = date('Y-m-d H:i:s',time());
		
	if(isset($_POST['submit']))
	{
					
		// Insert co so du lieu
		$sqlUpdate = "UPDATE BinhLuan SET NoiDung='".$_POST['txtNoiDung']."' WHERE ID = ".$_GET['ID'];
		
		if(mysqli_query($conn,$sqlUpdate) === TRUE)
			{
				echo "Cap nhat du lieu thanh cong";
				header('Location: QLBinhLuan.php');
				ConnectDB::disconnect();
			}
			else
			{
				echo "Cap nhat du lieu Loi";
			}
		
		ConnectDB::disconnect();
	}
?>

<!DOCTYPE html>
<html lang="en">
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
	<script src="../asset/ckeditor/ckeditor.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="../css/style.css" media="screen" />
    <script src="../asset/js/bootstrap.min.js"></script>
</head>

<body style="background-color: lightgrey;min-height:100%;">
	<?php
        include("menu_Admin.php");
    ?>
   <div class="container" style="background-color: whitesmoke;width:980px; border-radius: 5px;">
	<div class="row" style="background-color: whitesmoke;padding-top: 5px;">
    	<p class="bg-primary" style="margin-right: 5px;margin-left: 5px;font-size: 30px;color:white;font-family: tahoma;text-align: center;border-radius:5px;padding-bottom: 5px;"> <b>Cập nhật Bình luận</b> </p>
    </div>
    <div class="row">
    	<!-- Chèn form để xem thông tin tài khoản -->
			<?php	
			require_once("../PHP/ConnectDB.php");
			$conn = ConnectDB::connect();
			$sql = "SELECT A.ID, B.ID as IDBaiViet, B.TieuDe, A.NoiDung, A.TenDN, A.Ho, A.Ten, A.Email, A.SoDienThoai, A.KiemDuyet, A.NgayBinhLuan FROM BinhLuan AS A INNER JOIN BaiViet AS B ON A.IDBinhLuan = B.ID WHERE A.ID = ".$_GET['ID'];

			$resut = mysqli_query($conn, $sql);
			if($resut->num_rows>0)
			{
				$row = $resut->fetch_assoc();
			}
			ConnectDB::disconnect();
		?>
        
        <div class="row">
        	<div class="col-md-2 control-label" align="right">
            	<label>- Tiêu đề bài viết bình luận:</label>
                
            </div>
            <div class="col-md-9" align="left">
            	<p align="justify" style="font-style:italic">
					"<?php echo $row['TieuDe'];?>"
                    <a href='BaiViet_Doc.php?ID=<?php echo $row['IDBaiViet']; ?>' >Chi tiết...</a>
                </p>
            </div>
        </div>
        <form class="form-horizontal" name="frmSuaTaiKhoan" method="post">
             <div class="row">
                <div class="col-md-2 control-label" align="right">
                    <label>- Nội dung:</label>
                </div>
                <div class="col-md-9" align="left">
                    <textarea class="ckeditor" class="form-control" name="txtNoiDung" placeholder="Nội dung bình luận"><?php echo $row['NoiDung']; ?></textarea>
                </div>
            </div>
        <div class="row">
        	<div class="col-md-2 control-label" align="right">
            	<label>- Người đăng:</label>
            </div>
            <div class="col-md-9" align="left">
            	<p align="justify"><?php echo $row['TenDN']; ?></p>
            </div>
        </div>
        <div class="row">
        	<div class="col-md-2 control-label" align="right">
            	<label>- Họ:</label>
            </div>
            <div class="col-md-9" align="left">
            	<p align="justify"><?php echo $row['Ho']; ?></p>
            </div>
        </div>
        <div class="row">
        	<div class="col-md-2 control-label" align="right">
            	<label>- Tên:</label>
            </div>
            <div class="col-md-9" align="left">
            	<p align="justify"><?php echo $row['Ten']; ?></p>
            </div>
        </div>
        <div class="row">
        	<div class="col-md-2 control-label" align="right">
            	<label>- Email:</label>
            </div>
            <div class="col-md-9" align="left">
            	<p align="justify"><?php echo $row['Email']; ?></p>
            </div>
        </div>
        <div class="row">
        	<div class="col-md-2 control-label" align="right">
            	<label>- Số điện thoại:</label>
            </div>
            <div class="col-md-9" align="left">
            	<p align="justify"><?php echo $row['SoDienThoai']; ?></p>
            </div>
        </div>
        <div class="row">
        	<div class="col-md-2 control-label" align="right">
            	<label>- Kiểm duyệt:</label>
            </div>
            <div class="col-md-9" align="left">
            	<p align="justify"><?php if($row['KiemDuyet']==DA_KIEM_DUYET) echo "Đã kiểm duyệt"; else echo "Chưa kiểm duyệt";?></p>
            </div>
        </div>
        <div class="row">
        	<div class="col-md-2 control-label" align="right">
            	<label>- Ngày bình luận:</label>
            </div>
            <div class="col-md-9" align="left">
            	<p align="justify"><?php echo $row['NgayBinhLuan']; ?></p>
            </div>
        </div>
        <div class="row" align="center">
            	<a href='BinhLuan_Duyet.php?ID=<?php echo $row['ID']?>'><input type='button' value='Duyệt bình luận' class='btn btn-success'/></a>
				<button type="submit" class="btn btn-warning" name="submit">Sửa</button>
				<a href="QLBinhLuan.php"><button type="button" class="btn btn-default">Trở về</button></a>
        </div>
    </form>
	</div> <!-- /container -->
</body>
</html>