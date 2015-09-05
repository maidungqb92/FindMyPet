
<html>
<head>
	<title>Find My Pet</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!-- Meta Responsive -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Bootstrap core CSS -->
	<script src="asset/js/jquery-1.11.3.min.js" type="text/javascript"> </script>
	<!--<script src="js/jquery.min.js"></script>
	<script src="./js/ie-emulation-modes-warning.js"></script>-->
    <link href="asset/Bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/menu.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="css/style.css" media="screen" />
    <!--<script src="js/custom.js"></script>-->
    <!--<script src="js/bootstrap.min.js" type="text/javascript"></script>-->
   
    <!-- Slick slide -->
	<link rel="stylesheet" type="text/css" href="asset/slick/slick.css"/>
	<link rel="stylesheet" type="text/css" href="asset/slick/slick-theme.css"/>
	<script type="text/javascript" src="asset/js/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" src="asset/slick/jquery-migrate-1.2.1.min.js"></script>
	<script type="text/javascript" src="asset/slick/slick.min.js"></script>
</head>
<body style="background-color: lightgrey;">
	<?php
		include("Khach/menu_Khach.php");
        include_once("PHP/define.php");
    ?>
        
<div class="container" style="background-color: whitesmoke;width:1050px; border-radius: 5px;padding-bottom: 20px;">
    <img class="img-thumbnail" src="img/banner.jpg" alt="banner" style="width:100%; height: 270px;margin-top: 10px;margin-bottom:5px;">  
    <br>
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
										echo "<li class='findlost'><a href='".BASE_URL."/Khach/Lost.php?ID=".$row['ID']."'>".$row['TieuDe']."</a></li>";
									}
								}
								ConnectDB::disconnect();
							
							?>
                        </ul>
                    </div>
                    <div style="text-align:right;">
                        <a class="button" href="Khach/indexlost.php">Xem thêm</a>
                    </div>
                </div>
        	</div>
    	</div>
        <div class="col-xs-8"  style="background-color:lightblue; height: 180px;width:684px; border-radius:5px;">
            <!-- chèn slide ảnh chó bị mất-->
            <?php
				include ("Khach/slidelost.php");
			?>
            <!-- Kết thúc chèn slide -->
        </div>
	</div>    
    <div class="row">
		<div class="col-xs-4">
			<div class="panel panel-primary">
				<div class="panel-heading" style="text-align: center; font-family: time new roman; font-size:17px;"><b>TIN TÌM CHỦ</b></div>
				<div class="panel-body" style="height:130px;">
                	<div style="position:relative;right:20px;">
                        <ul>
                            <!-- chèn tin tìm chủ -->
                            <?php
								require_once(BASE_PATH . "/PHP/ConnectDB.php");
								$conn = ConnectDB::connect();
								
								$sql = "SELECT ID,TieuDe FROM BaiViet WHERE IDDanhMuc = ".TIN_TIM." AND KiemDuyet = ".DA_KIEM_DUYET." ORDER BY ID DESC LIMIT 3";
						
								$result = mysqli_query($conn, $sql);
										
								if($result->num_rows > 0)
								{
									while($row = $result->fetch_assoc())
									{
										echo "<li class='findlost'><a href='".BASE_URL."/Khach/Find.php?ID=".$row['ID']."'>".$row['TieuDe']."</a></li>";
									}
								}
								ConnectDB::disconnect();
							
							?>
                        </ul>
                    </div>
                    <div style="text-align:right;">
                        <a class="button" href="Khach/indexfind.php">Xem thêm</a>
                    </div>
				</div>
			</div>
		</div>
		<div class="col-xs-8" style="background-color:lightblue; height: 180px;width:684px; border-radius:5px;">
			<!-- chèn slide ảnh tìm chủ-->
            <?php
				include ("Khach/slidefind.php");
			?>
            <!-- Kết thúc chèn slide -->
		</div>
    </div>
    
	<div class="row">
		<div class="col-xs-9" style="background-color: whitesmoke;padding-top: 5px; height:535px;">
			<div class="row">
				<p class="bg-primary" style="margin-right: 5px;margin-left: 15px;font-size: 30px;color:white;font-family: tahoma;text-align: center;border-radius:5px;padding-bottom: 5px;"> <b>Những kiến thức cơ bản về thú cưng</b> </p>
			</div>
            <!-- Chen bai viet -->
			<?php
				require_once(BASE_PATH . "/PHP/ConnectDB.php");
				$conn = ConnectDB::connect();
				
				$sql = "SELECT ID,TieuDe, TomTat,HinhAnh FROM BaiViet WHERE IDDanhMuc = ".BAI_VIET." AND KiemDuyet = ".DA_KIEM_DUYET." ORDER BY ID DESC LIMIT 3";
		
				$result = mysqli_query($conn, $sql);
						
				if($result->num_rows > 0)
				{
					while($row = $result->fetch_assoc())
					{
						echo '<div class="row" style="height:145px;">';
							echo '<div class="col-xs-4" style="height:145px;">';
								echo "<a href='".BASE_URL."/Khach/knowledgepage.php?ID=".$row['ID']."'><img class='img-thumbnail' src='".BASE_URL."img/".$row['HinhAnh']."' style='height: 140px;width:200px;'></a>";
							echo '</div>';
							echo '<div class="col-xs-8" style="height:145px;margin-left:-40px;margin-top:-15px;">';
								echo "<a href='".BASE_URL."/Khach/knowledgepage.php?ID=".$row['ID']."'><h3>".$row['TieuDe']."</h3></a>";
								echo "<p align='justify'>".$row['TomTat']."</p>";
							echo '</div>';
						echo "</div>";
						
					}
				}
				ConnectDB::disconnect();
			
			?>
            <!--           
            <div class="row" style="height:145px;">
                <div class="col-xs-4" style="height:145px;">
                    <a href="#"><img class="img-thumbnail" src="img/Dog3.jpeg" style="height: 140px;width:200px;"></a>
                </div>
                <div class="col-xs-8" style="height:145px;">
                    <a href="#"><h3>Tiêu đề 3</h3></a>
                    <p>Tóm tắt nội dung bên trong</p>
                </div>
            </div>-->
            <div style="text-align:right;">
                <a class="btn btn-success btn-xs" href="Khach/knowledge.php">Xem thêm</a>
            </div>
        </div>
        <div class="col-xs-3" style="border: 2px solid lightblue;border-radius:5px;width:240px;  margin-left:7px;">
            <div class="row" style="height:75px"><img style="width:230px; height:70px;margin-top: 3px;margin-left: 3px;" src="img/news.gif"></div>
                 <?php
					require_once(BASE_PATH . "/PHP/ConnectDB.php");
					$conn = ConnectDB::connect();
					
					$sql = "SELECT ID, TieuDe, IDDanhMuc FROM BaiViet WHERE KiemDuyet = ".DA_KIEM_DUYET." ORDER BY ID DESC LIMIT 6";
			
					$result = mysqli_query($conn, $sql);
							
					if($result->num_rows > 0)
					{
						while($row = $result->fetch_assoc())
						{
							echo "<div class='row' style='height:70px;'>";
								echo "<h4 style='margin-left: 10px;'>";
									switch ($row['IDDanhMuc'])
									{
										case BAI_VIET:
											echo "<a href='".BASE_URL."/Khach/knowledgepage.php?ID=".$row['ID']."'>".$row['TieuDe']."</a>";
											break;
										case TIN_MAT:
											echo "<a href='".BASE_URL."/Khach/Lost.php?ID=".$row['ID']."'>".$row['TieuDe']."</a>";
											break;
										case TIN_TIM:
											echo "<a href='".BASE_URL."/Khach/Find.php?ID=".$row['ID']."'>".$row['TieuDe']."</a>";
											break;
									}
								echo "</h4>";
							echo "</div>";
						}
					}
					ConnectDB::disconnect();
				
				?>
            <div style="text-align:right;">
                <a style="margin-bottom: 4px;"class="btn btn-success btn-xs" href="Khach/news.php">Xem thêm</a>
            </div>
        </div>   
    </div>
    
    <?php
		include("Khach/footer.php");
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
