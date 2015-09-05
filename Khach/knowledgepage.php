<html>
<head>
	<title>Find My Pet</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!-- Meta Responsive -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Bootstrap core CSS -->
	<script src="../asset/js/jquery-1.11.3.min.js" type="text/javascript"> </script>
	<!--<script src="js/jquery.min.js"></script>
	<script src="./js/ie-emulation-modes-warning.js"></script>-->
    <link href="../asset/Bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/menu.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="../css/style.css" media="screen" />
    <!--<script src="js/custom.js"></script>-->
    <!--<script src="js/bootstrap.min.js" type="text/javascript"></script>-->
</head>
<body style="background-color: lightgrey;">
	<?php
        include("menu_Khach.php");
		include_once(realpath(dirname(__DIR__))."/PHP/define.php");
    ?> 
<div class="container" style="background-color: whitesmoke;width:1050px; border-radius: 5px;padding-bottom: 20px;">
	<img class="img-thumbnail" src="../img/banner.jpg" alt="banner" style="width:100%; height: 270px;margin-top: 10px;margin-bottom:5px;">  
	<br>
    <div class="row">
		<div class="col-xs-9" style="background-color: whitesmoke;padding-top: 5px;">
			<div class="row">
            	<p class="bg-primary" style="margin-right: 5px;margin-left: 5px;font-size: 30px;color:white;font-family: tahoma;text-align: center;border-radius:5px;padding-bottom: 5px;"> <b>Kiến thức về thú cưng</b> </p>
            </div>
			<div class="row" style="padding-left:5px">
				<?php
				require_once(BASE_PATH . "/PHP/ConnectDB.php");
				$conn = ConnectDB::connect();
				
				$sql = "SELECT * FROM BaiViet WHERE ID= " .$_GET['ID'];
		
				$result = mysqli_query($conn, $sql);
						
				if($result->num_rows > 0)
				{
					while($row = $result->fetch_assoc())
					{
						echo '<div class="row">';
							echo '<div class="col-xs-3">';
							echo "<img src='../img/logo.gif' style='height:70px;width:130px; margin-left:5px;margin-top:3px;'>";
							echo '</div>';
							echo '<div class="col-xs-9">';
								echo "<p align='justify'> <h4>Được đăng bởi: ".$row['TenDN']." </h4></p>";
								echo "<p align='justify'> <h4>Đăng ngày: ".date('d/m/Y',strtotime($row['NgayDang']))." <h4></p>";
								echo '</div>';
						echo '</div>';
						echo "<hr>";
						echo " <h3> <p align='center'>".$row['TieuDe']." </h3></p>";
						echo "<div align='justify' style='margin-left:10px;margin-right:10px'><p>".$row['TomTat']."</p></div>";
						
						
						echo "<img class='img-thumbnail' id='anhtrong' src='".BASE_URL."img/".$row['HinhAnh']."' align='center'>";
						echo "<div align='justify' style='margin-left:10px;margin-right:10px'><p>".$row['NoiDung']."</p></div>";
						if($row['DacDiem'] != "")
							echo "<div align='justify' style='margin-left:10px;margin-right:10px'><p><h4>Đặc điểm:</h4> ".$row['DacDiem']."</p></div>";
						if($row['TinhCach'] != "")
							echo "<div align='justify' style='margin-left:10px;margin-right:10px'><p><h4>Tính cách:</h4> ".$row['TinhCach']."</p></div>";
						if($row['KhaNang'] != "")
							echo "<div align='justify' style='margin-left:10px;margin-right:10px'><p><h4>Khả năng:</h4> ".$row['KhaNang']."</p></div>";
						if($row['NguonGoc'] != "")
							echo "<div align='justify' style='margin-left:10px;margin-right:10px'><p><h4>Nguồn gốc:</h4> ".$row['NguonGoc']."</p></div>";
						if($row['TieuChuan'] != "")
							echo "<div align='justify' style='margin-left:10px;margin-right:10px'><p><h4>Tiêu chuẩn:</h4> ".$row['TieuChuan']."</p></div>";
						}
				}
				ConnectDB::disconnect();
			?>
			</div>
            <div class="row" style="border:1px solid blueviolet;border-radius:4px;margin-top:15px;"> 
				<h4 style="margin-left:30px;"> >>> Bài viết có liên quan <<< </h4>
                <!-- Chen cac bai viet lien quan -->
                <?php
					require_once(BASE_PATH . "/PHP/ConnectDB.php");
					$conn = ConnectDB::connect();
				
					$sqlLQ = "SELECT ID, TieuDe FROM Baiviet WHERE (Loai like '%".$row['Loai']."%' OR Giong like '%".$row['Giong']."%' OR Mau like '%".$row['Mau']."%' OR DacDiemNhanDang like '%".$row['DacDiemNhanDang']."%') AND IDDanhMuc = ".BAI_VIET." AND KiemDuyet = ".DA_KIEM_DUYET." ORDER BY ID DESC";
			
					$resultLQ = mysqli_query($conn, $sqlLQ);
							
					if($resultLQ->num_rows > 0)
					{
						while($rowLQ= $resultLQ->fetch_assoc())
						{
							echo "<a href='".BASE_URL."/Khach/Knowledgepage.php?ID=".$rowLQ['ID']."'>".$rowLQ['TieuDe']."</a></li>  &nbsp;";
						}
					}
					ConnectDB::disconnect();
				?>
			</div>
		</div>
<div class="col-xs-3" style="width:260px;height:1015px; margin-top:5px;">
			<div class="panel panel-primary">
				<div class="panel-heading" style="text-align: center; font-family: time new roman; font-size:17px;"><b>TIN TÌM CHỦ MỚI</b></div>
				<div class="panel-body" style="height:430px; margin-left:10px;">
        			<?php
				require_once(BASE_PATH . "/PHP/ConnectDB.php");
				$conn = ConnectDB::connect();
				
				$sql = "SELECT ID,TieuDe,HinhAnh FROM BaiViet WHERE IDDanhMuc = ".TIN_TIM." AND KiemDuyet = ".DA_KIEM_DUYET." ORDER BY ID DESC LIMIT 2";
		
				$result = mysqli_query($conn, $sql);
						
				if($result->num_rows > 0)
				{
					while($row = $result->fetch_assoc())
					{
						echo '<div class="row" style="height:145px;">';
								echo "<a href='".BASE_URL."/Khach/find.php?ID=".$row['ID']."'><img class='img-thumbnail' src='".BASE_URL."img/".$row['HinhAnh']."' style='height: 135px;width:205px; margin-top:10px;'></a>";
							echo '</div>';
								echo "<a href='".BASE_URL."/Khach/find.php?ID=".$row['ID']."'>".$row['TieuDe']."</a>";
						
					}
				}
				ConnectDB::disconnect();
			?>
            <div style="text-align:right;margin-top: 15px;">
                        <a class="button" href="indexfind.php">Xem thêm</a>
                    </div>
		</div>
                        </div>
	<div class="panel panel-primary" style="margin-top: 57px;">
		<div class="panel-heading" style="text-align: center; font-family: time new roman; font-size:17px;"><b>TIN MẤT CHÓ MỚI</b></div>
		<div class="panel-body" style="height:430px;margin-left:10px;">
		<?php
				require_once(BASE_PATH . "/PHP/ConnectDB.php");
				$conn = ConnectDB::connect();
				
				$sql = "SELECT ID,TieuDe,HinhAnh FROM BaiViet WHERE IDDanhMuc = ".TIN_MAT." AND KiemDuyet = ".DA_KIEM_DUYET." ORDER BY ID DESC LIMIT 2";
		
				$result = mysqli_query($conn, $sql);
						
				if($result->num_rows > 0)
				{
					while($row = $result->fetch_assoc())
					{
						echo '<div class="row" style="height:145px;">';
								echo "<a href='".BASE_URL."/Khach/lost.php?ID=".$row['ID']."'><img class='img-thumbnail' src='".BASE_URL."img/".$row['HinhAnh']."' style='height: 135px;width:205px; margin-top:10px;'></a>";
							echo '</div>';
								echo "<a href='".BASE_URL."/Khach/lost.php?ID=".$row['ID']."'>".$row['TieuDe']."</a>";
						
					}
				}
				ConnectDB::disconnect();
			?>
            <div style="text-align:right;margin-top: 15px;">
                        <a class="button" href="indexlost.php">Xem thêm</a>
                    </div>
		</div>
	</div>
</div>      
</div>
<?php
include ("footer.php");
?>

</body>
</html>
