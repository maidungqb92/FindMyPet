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

    <link rel="stylesheet" type="text/css" href="../css/style.css" media="screen" />
    <script src="../asset/js/bootstrap.min.js"></script>
</head>

<body style="background-color: lightgrey;min-height:100%;">
	<?php
        include("menu_Admin.php");
    ?>
   <div class="container" style="background-color: whitesmoke;width:980px; border-radius: 5px;">
	<div class="row" style="background-color: whitesmoke;padding-top: 5px;">
    	<p class="bg-primary" style="margin-right: 5px;margin-left: 5px;font-size: 30px;color:white;font-family: tahoma;text-align: center;border-radius:5px;padding-bottom: 5px;"> <b>Chi tiết Bài viết</b> </p>
    </div>
    <div class="row">
    	<!-- Chèn form để xem thông tin bài viết -->
		<?php	
			require_once("../PHP/ConnectDB.php");
			$conn = ConnectDB::connect();
			$sql = "SELECT * FROM BaiViet WHERE ID = ".$_GET['ID'];

			$resut = mysqli_query($conn, $sql);
			if($resut->num_rows>0)
			{
				$row = $resut->fetch_assoc();
			}
			ConnectDB::disconnect();
		?>
        <div class="row">
        	<div class="col-md-2 control-label" align="right">
            	<label>- Tiêu đề:</label>
            </div>
            <div class="col-md-9" align="left">
            	<p align="justify"><?php echo $row['TieuDe']; ?></p>
            </div>
        </div>
        <div class="row">
        	<div class="col-md-2 control-label" align="right">
            	<label>- Tóm tắt:</label>
            </div>
            <div class="col-md-9" align="left">
            	<p align="justify"><?php echo $row['TomTat']; ?></p>
            </div>
        </div>
        <div class="row">
        	<div class="col-md-2 control-label" align="right">
            	<label>- Nội dung:</label>
            </div>
            <div class="col-md-9" align="left">
            	<p align="justify"><?php echo $row['NoiDung']; ?></p>
            </div>
        </div>
        <div class="row">
        	<div class="col-md-2 control-label" align="right">
            	<label>- Hình Ảnh:</label>
            </div>
            <div class="col-md-9" align="left">
            	<p align="justify"><?php echo "<img class='imgSlide' src='".BASE_URL."img/". $row['HinhAnh'] ."'>"; ?></p>
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
            	<label>- Danh mục:</label>
            </div>
            <div class="col-md-9" align="left">
            	<p align="justify">
					<?php 
						$connDM = ConnectDB::connect();
						$sqlDM = "SELECT * FROM DanhMuc WHERE ID = ".$row['IDDanhMuc'];
			
						$resutDM = mysqli_query($connDM, $sqlDM);
						if($resutDM->num_rows>0)
						{
							$rowDM = $resutDM->fetch_assoc();
							echo $rowDM['TenDanhMuc']." - <strong>Mô tả:</strong> ".$rowDM['MoTa'];
						}
						ConnectDB::disconnect();
					?>
                </p>
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
            	<label>- Ngày đăng:</label>
            </div>
            <div class="col-md-9" align="left">
            	<p align="justify"><?php echo $row['NgayDang']; ?></p>
            </div>
        </div>
        <div class="row">
        	<div class="col-md-2 control-label" align="right">
            	<label>- Loài thú cưng:</label>
            </div>
            <div class="col-md-9" align="left">
            	<p align="justify"><?php echo $row['Loai']; ?></p>
            </div>
        </div>
        <div class="row">
        	<div class="col-md-2 control-label" align="right">
            	<label>- Giống thú cưng:</label>
            </div>
            <div class="col-md-9" align="left">
            	<p align="justify"><?php echo $row['Giong']; ?></p>
            </div>
        </div>
        <div class="row">
        	<div class="col-md-2 control-label" align="right">
            	<label>- Đặc điểm:</label>
            </div>
            <div class="col-md-9" align="left">
            	<p align="justify"><?php echo $row['DacDiem']; ?></p>
            </div>
        </div>
        <div class="row">
        	<div class="col-md-2 control-label" align="right">
            	<label>- Tính cách:</label>
            </div>
            <div class="col-md-9" align="left">
            	<p align="justify"><?php echo $row['TinhCach']; ?></p>
            </div>
        </div>
        <div class="row">
        	<div class="col-md-2 control-label" align="right">
            	<label>- Khả năng:</label>
            </div>
            <div class="col-md-9" align="left">
            	<p align="justify"><?php echo $row['KhaNang']; ?></p>
            </div>
        </div>
        <div class="row">
        	<div class="col-md-2 control-label" align="right">
            	<label>- Nguồn gốc:</label>
            </div>
            <div class="col-md-9" align="left">
            	<p align="justify"><?php echo $row['NguonGoc']; ?></p>
            </div>
        </div>
        <div class="row">
        	<div class="col-md-2 control-label" align="right">
            	<label>- Tiêu chuẩn:</label>
            </div>
            <div class="col-md-9" align="left">
            	<p align="justify"><?php echo $row['TieuChuan']; ?></p>
            </div>
        </div>
        <div class="row">
        	<div class="col-md-2 control-label" align="right">
            	<label>- Tên của thú cưng:</label>
            </div>
            <div class="col-md-9" align="left">
            	<p align="justify"><?php echo $row['Ten']; ?></p>
            </div>
        </div>
        <div class="row">
        	<div class="col-md-2 control-label" align="right">
            	<label>- Màu của thú cưng:</label>
            </div>
            <div class="col-md-9" align="left">
            	<p align="justify"><?php echo $row['Mau']; ?></p>
            </div>
        </div>
        <div class="row">
        	<div class="col-md-2 control-label" align="right">
            	<label>- Tuổi của thú cưng:</label>
            </div>
            <div class="col-md-9" align="left">
            	<p align="justify"><?php echo $row['Tuoi']; ?></p>
            </div>
        </div>
        <div class="row">
        	<div class="col-md-2 control-label" align="right">
            	<label>- Đặc điểm nhận dạng của thú cưng:</label>
            </div>
            <div class="col-md-9" align="left">
            	<p align="justify"><?php echo $row['DacDiemNhanDang']; ?></p>
            </div>
        </div>
        
        <div class="row" align="center">
        	<a href='BaiViet_Duyet.php?ID=<?php echo $row['ID']?>'><input type='button' value='Duyệt bài viết/tin' class='btn btn-success'/></a>
        	<a href='BaiViet_Sua.php?ID=<?php echo $row['ID']?>'><input type='button' value='Sửa' class='btn btn-warning'/></a>
			<a href='BaiViet_Xoa.php?ID=<?php echo $row['ID']?>'> <input type='button' value='Xóa' class='btn btn-danger'/> </a>
            <a href="QLBaiViet.php"><button type="button" class="btn btn-default">Trở về</button></a>
        </div>
	</div>
	</div> <!-- /container -->
</body>
</html>