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
   
    <!-- Slick slide -->
	<link rel="stylesheet" type="text/css" href="../asset/slick/slick.css"/>
	<link rel="stylesheet" type="text/css" href="../asset/slick/slick-theme.css"/>
	<script type="text/javascript" src="../asset/js/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" src="../asset/slick/jquery-migrate-1.2.1.min.js"></script>
	<script type="text/javascript" src="../asset/slick/slick.min.js"></script>
</head>
<body style="background-color: lightgrey;">
	<?php
        include("menu_Khach.php");
		include_once(realpath(dirname(__DIR__))."/PHP/define.php");
    ?>
<div class="container" style="background-color: whitesmoke;width:1050px; border-radius: 5px;padding-bottom: 20px;">
    <img class="img-thumbnail" src="../img/chobannerfind.jpg" alt="banner" style="width:100%; height: 270px;margin-top: 10px;margin-bottom:5px;">
	<br>
    <div class="row" style="margin-bottom: 10px;">
		<div class="col-xs-12" style="padding-top: 5px;">
			<div class="row">
            	<p class="bg-primary" style="margin-right: 5px;margin-left: 5px;font-size: 30px;color:white;font-family: tahoma;text-align: center;border-radius:5px;padding-bottom: 5px;"> <b>Tin tìm chủ</b> </p>
            </div>
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
                <div class="col-xs-7">
                    <?php
						echo "<img class='thumbnail' src='".BASE_URL."img/".$row['HinhAnh']."' style='width:500px;height:350px;margin-top: 15px; margin-left: 30px;'>";
					?>
                    <!--<img class="thumbnail" src="../img/3.jpg" style="width:500px;height:350px;margin-top: 15px; margin-left: 30px;">-->
                </div>
			<div class="col-xs-5">
            	<div style="border: 2px solid blueviolet; border-radius:5px;width:380px;height: 350px; margin-top:15px;">
                	<div style="text-align: center;font-size: 30px;margin-top:5px;">
						Đặc điểm thú cưng
					</div>
                    <?php
						echo "<p style='text-align: left;font-size: 20px;margin-left:10px;'>Loài: ".$row['Loai']."</p>";
						echo "<p style='text-align: left;font-size: 20px;margin-left:10px;'>Giống: ".$row['Giong']."</p>";
						echo "<p style='text-align: left;font-size: 20px;margin-left:10px;'>Tên: ".$row['Ten']."</p>";
						echo "<p style='text-align: left;font-size: 20px;margin-left:10px;'>Màu: ".$row['Mau']."</p>";
						echo "<p style='text-align: left;font-size: 20px;margin-left:10px;'>Tuổi: ".$row['Tuoi']."</p>";	
						echo "<p style='text-align: left;font-size: 20px;margin-left:10px;'>Đặc điểm nhận dạng: ".$row['DacDiemNhanDang']."</p>";
					?>
                    <!-- Loai, Giong, Ten, Mau, Tuoi, DacdiemNhanDang-->
				</div>
			</div>
			<div class="col-xs-12">
				<div style="border: 2px solid gray; border-radius:5px;height: 200px; margin-top:15px;">
					<div style="text-align: center;font-size: 30px;margin-top:5px;">
                    	Mô tả về thú cưng
					</div>
                    <?php
						echo "<div style='text-align: left;font-size: 20px;margin-left:10px;'>".$row['NoiDung']."</div>";
					?>
                    <!-- Noi dung -->
				</div> 
			</div>
			<div class="col-xs-12">
            	<div style="border: 2px solid green; border-radius:5px;min-height:100%; margin-top:15px;">
					<div style="text-align:left;font-size: 30px;margin-top:5px;margin-left:15px;">
						Bình luận
					</div>
                    <div>
                    	<?php
							include("BinhLuan.php");
						?>
                    </div>
				</div> 
			</div>
		</div>
	</div>
</div>
<div style="border:1px solid blueviolet;border-radius:4px;"> 
	<h4 style="margin-left:30px;"> >>> Bài viết có liên quan <<< </h4>
    <!--- Chen tieu de cac tin mat thu co the lien quan -->
    <?php
		require_once(BASE_PATH . "/PHP/ConnectDB.php");
		$conn = ConnectDB::connect();
		
		//$sql = "SELECT ID,TieuDe FROM BaiViet WHERE IDDanhMuc = ".TIN_TIM." AND KiemDuyet = ".DA_KIEM_DUYET." ORDER BY ID DESC LIMIT 3";
		$sqlLQ = "SELECT ID, TieuDe FROM Baiviet WHERE (Loai like '%".$row['Loai']."%' OR Giong like '%".$row['Giong']."%' OR Mau like '%".$row['Mau']."%' OR DacDiemNhanDang like '%".$row['DacDiemNhanDang']."%') AND IDDanhMuc = ".TIN_MAT." AND KiemDuyet = ".DA_KIEM_DUYET." ORDER BY ID DESC";

		/*if(trim($row['Loai']))
		{
			$sqlLQ .= "( Loai like '%".$row['Loai']."%' " ;
		}
		if(trim($row['Giong'])) 
		{
			$sqlLQ .= " OR Giong like '%".$row['Giong']."%' " ;
		}
		if(trim($row['DacDiemNhanDang'])) 
		{
			$sqlLQ .= " OR DacDiemNhanDang like '%".$row['DacDiemNhanDang']."%') " ;
		}
		$sqlLQ .= " AND IDDanhMuc = ".TIN_MAT." AND KiemDuyet = ".DA_KIEM_DUYET." ORDER BY ID DESC";

		die($sqlLQ);*/
		$resultLQ = mysqli_query($conn, $sqlLQ);
				
		if($resultLQ->num_rows > 0)
		{
			while($rowLQ= $resultLQ->fetch_assoc())
			{
				echo "<a href='".BASE_URL."/Khach/Lost.php?ID=".$rowLQ['ID']."'>".$rowLQ['TieuDe']."</a></li>  &nbsp;";
			}
		}
		ConnectDB::disconnect();
	?>
</div>
<hr>
<div class="row">
	<div class="col-xs-4">
            <div class="panel panel-primary">
                <div class="panel-heading" style="text-align: center; font-family: time new roman; font-size:17px;"><b>TIN MẤT THÚ CƯNG</b></div>
                <div class="panel-body" style="height:130px;">
                    <div style="position:relative;right:20px;">
                        <ul>
                            <!-- chèn tin mất chó -->
                            <?php
								require_once(BASE_PATH . "/PHP/ConnectDB.php");
								$conn = ConnectDB::connect();
								
								$sql = "SELECT ID,TieuDe FROM BaiViet WHERE IDDanhMuc = ".TIN_MAT." AND KiemDuyet = ".DA_KIEM_DUYET." ORDER BY ID DESC LIMIT 3";
						
								$result = mysqli_query($conn, $sql);
										
								if($result->num_rows > 0)
								{
									while($row = $result->fetch_assoc())
									{
										echo "<li class='findlost'><a href='".BASE_URL."Khach/Lost.php?ID=".$row['ID']."'>".$row['TieuDe']."</a></li>";
									}
								}
								ConnectDB::disconnect();
							
							?>
                        </ul>
                    </div>
                    <div style="text-align:right;">
                        <a class="button" href="indexlost.php">Xem thêm</a>
                    </div>
                </div>
        	</div>
    	</div>
	
	<div class="col-xs-8"  style="background-color:lightblue; height: 177px;width:684px; border-radius: 5px;">
		<!-- chèn slide ảnh chó bị mất-->
        <?php
			include("slidelost.php");
		?>
	</div>
</div>    

    
<?php
	include("footer.php");
?>
</div>
<script type="text/javascript">
	$(document).ready(function(){
  		$("#SlideLostPet").slick({
			slidesToShow: 4,
			slideToScroll : 4,
			autoplay: true,
			autoplaySpeed: 2000,
  		});
		$("#SlideFindOwner").slick({
			slidesToShow: 4,
			slideToScroll : 4,
			autoplay: true,
			autoplaySpeed: 2000,
  		});
	});
</script>
</body>
</html>
