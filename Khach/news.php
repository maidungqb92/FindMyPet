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
    <script src="../asset/js/custom.js"></script>
    <script src="../asset/js/bootstrap.min.js"></script>
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
        <div class="col-xs-9" style="background-color: whitesmoke;padding-top: 5px; height:1000px;">
            <div class="row">
            	<p class="bg-primary" style="margin-right: 5px;margin-left: 5px;font-size: 30px;color:white;font-family: tahoma;text-align: center;border-radius:5px;padding-bottom: 5px;"> <b>Thông tin mới nhất về thú cưng</b> </p>
            </div>
            <!-- Chen bai viet -->
			<?php
				require_once(BASE_PATH . "/PHP/ConnectDB.php");
				$conn = ConnectDB::connect();
				
				$sql = "SELECT ID,TieuDe, TomTat,HinhAnh FROM BaiViet WHERE IDDanhMuc = ".BAI_VIET." AND KiemDuyet = ".DA_KIEM_DUYET." ORDER BY ID DESC LIMIT 6";
		
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
            <!--<div class="row" style="height:145px;">
                <div class="col-xs-4" style="height:145px;">
                    <a href="#"><img class="img-thumbnail" src="../img/3.jpg" style="height: 140px;width:200px;"></a>
                </div>
                <div class="col-xs-8" style="height:145px;">
                    <a href="knowledgepage.php"><h3>Tiêu đề 1</h3></a>
                    <p>Tóm tắt nội dung bên trong</p>
            	</div>
            </div>
            <div class="row" style="height:145px;">
                <div class="col-xs-4" style="height:145px;">
                    <a href="#"><img class="img-thumbnail" src="../img/Animals___Birds_Bird_Hummingbird_041609_.jpg" style="height: 140px;width:200px;"></a>
                </div>
                <div class="col-xs-8" style="height:145px;">
                    <a href="#"><h3>Tiêu đề 2</h3></a>
                    <p>Tóm tắt nội dung bên trong</p>
            	</div>
            </div>
            <div class="row" style="height:145px;">
                <div class="col-xs-4" style="height:145px;">
                    <a href="#"><img class="img-thumbnail" src="../img/Dog3.jpeg" style="height: 140px;width:200px;"></a>
                </div>
                <div class="col-xs-8" style="height:145px;">
                    <a href="#"><h3>Tiêu đề 3</h3></a>
                    <p>Tóm tắt nội dung bên trong</p>
            	</div>
            </div>
            <div class="row" style="height:145px;">
                <div class="col-xs-4" style="height:145px;">
                    <a href="#"><img class="img-thumbnail" src="../img/3.jpg" style="height: 140px;width:200px;"></a>
                </div>
                <div class="col-xs-8" style="height:145px;">
                    <a href="#"><h3>Tiêu đề 4</h3></a>
                    <p>Tóm tắt nội dung bên trong</p>
                </div>
            </div>
            <div class="row" style="height:145px;">
                <div class="col-xs-4" style="height:145px;">
                    <a href="#"><img class="img-thumbnail" src="../img/Animals___Birds_Bird_Hummingbird_041609_.jpg" style="height: 140px;width:200px;"></a>
                </div>
                <div class="col-xs-8" style="height:145px;">
                    <a href="#"><h3>Tiêu đề 5</h3></a>
                    <p>Tóm tắt nội dung bên trong</p>
            	</div>
            </div>
           	<div class="row" style="height:145px;">
                <div class="col-xs-4" style="height:145px;">
                    <a href="#"><img class="img-thumbnail" src="../img/Dog3.jpeg" style="height: 140px;width:200px;"></a>
                </div>
                <div class="col-xs-8" style="height:145px;">
                    <a href="#"><h3>Tiêu đề 6</h3></a>
                    <p>Tóm tắt nội dung bên trong</p>
                
                </div>
            </div>-->
		<!--<nav style="margin-top: -15px;">
            	<ul class="pager">
					<li class="previous"><a href="#"><span aria-hidden="true">&larr;</span>Tin mới hơn</a></li>
                    <li class="next"><a href="#">Tin cũ hơn <span aria-hidden="true">&rarr;</span></a></li>
				</ul>
			</nav>-->
        </div>
        <div class="col-xs-3" style="width:260px;height:1015px; margin-top:5px;">
			<div class="panel panel-primary">
				<div class="panel-heading" style="text-align: center; font-family: time new roman; font-size:17px;"><b>TIN TÌM CHỦ MỚI</b></div>
				
                <div class="panel-body" style="height:430px; margin-left:10px;">
        		<!-- chèn tin tìm chủ -->
					<?php
                        require_once(BASE_PATH . "/PHP/ConnectDB.php");
                        $conn = ConnectDB::connect();
                        
                        $sql = "SELECT ID,TieuDe,HinhAnh FROM BaiViet WHERE IDDanhMuc = ".TIN_TIM." AND KiemDuyet = ".DA_KIEM_DUYET." ORDER BY ID DESC LIMIT 2";
                
                        $result = mysqli_query($conn, $sql);
                                
                        if($result->num_rows > 0)
                        {
                            while($row = $result->fetch_assoc())
                            {
                                //echo "<li class='findlost'><a href='".BASE_URL."/Khach/Find.php?ID=".$row['ID']."'>".$row['TieuDe']."</a></li>";
								echo '<div class="row" style="width:210px;">';
									echo '<div class="row" style="height:140px;">';
										echo "<a href='".BASE_URL."/Khach/Find.php?ID=".$row['ID']."'><img class='img-thumbnail' src='".BASE_URL."img/".$row['HinhAnh']."' style='height: 135px;width:205px;margin-left: 17px;margin-top: 3px;'></a>";
									echo "</div>";
									echo '<div class="row" style="height:50px;">';
										echo "<h5 style='margin-left: 20px;'><a href='".BASE_URL."/Khach/Find.php?ID=".$row['ID']."'>".$row['TieuDe']."</a></h5>";
									echo "</div>";
								echo "</div>";
                            }
                        }
                        ConnectDB::disconnect();
                    
                    ?>
                <!--	<div class="row" style="width:210px;">
					<div class="row" style="height:140px;">
                    	<a href="#"><img class="img-thumbnail" src="../img/dogs1.jpg" style="height: 135px;width:205px;margin-left: 17px;margin-top: 3px;"></a>
                    </div>
                <div class="row" style="height:50px;">
                	<h5 style="margin-left: 20px;"><a href="#">Tiêu đề Xumali</a></h5>
				</div>
			</div>
            <div class="row" style="width:210px;">
                <div class="row" style="height:140px;">
                	<a href="#"><img class="img-thumbnail" src="../img/Guide-Dogs_025-11.jpg" style="height: 135px;width:205px;margin-left: 17px;margin-top: 3px;"></a>
                </div>
                <div class="row" style="height:50px;">
                	<h5 style="margin-left: 20px;"><a href="#">Tiêu đề Xumali</a></h5>
                </div>
			</div>-->
            <div style="text-align:right;margin-top: 15px;">
				<a class="button" href="indexfind.php">Xem thêm</a>
			</div>
		</div>
	</div>
	<div class="panel panel-primary">
		<div class="panel-heading" style="text-align: center; font-family: time new roman; font-size:17px;"><b>TIN MẤT THÚ MỚI</b></div>
		<div class="panel-body" style="height:430px;margin-left:10px;">
        	<!-- chèn tin mất thú -->
			<?php
				require_once(BASE_PATH . "/PHP/ConnectDB.php");
				$conn = ConnectDB::connect();
				
				$sql = "SELECT ID,TieuDe,HinhAnh FROM BaiViet WHERE IDDanhMuc = ".TIN_MAT." AND KiemDuyet = ".DA_KIEM_DUYET." ORDER BY ID DESC LIMIT 2";
		
				$result = mysqli_query($conn, $sql);
						
				if($result->num_rows > 0)
				{
					while($row = $result->fetch_assoc())
					{
						//echo "<li class='findlost'><a href='".BASE_URL."/Khach/Find.php?ID=".$row['ID']."'>".$row['TieuDe']."</a></li>";
						echo '<div class="row" style="width:210px;">';
							echo '<div class="row" style="height:140px;">';
								echo "<a href='".BASE_URL."/Khach/Lost.php?ID=".$row['ID']."'><img class='img-thumbnail' src='".BASE_URL."img/".$row['HinhAnh']."' style='height: 135px;width:205px;margin-left: 17px;margin-top: 3px;'></a>";
							echo "</div>";
							echo '<div class="row" style="height:50px;">';
								echo "<h5 style='margin-left: 20px;'><a href='".BASE_URL."/Khach/Lost.php?ID=".$row['ID']."'>".$row['TieuDe']."</a></h5>";
							echo "</div>";
						echo "</div>";
					}
				}
				ConnectDB::disconnect();
			
			?>
            <!--<div class="row" style="width:210px;">
				<div class="row" style="height:140px;">
                	<a href="#"><img class="img-thumbnail" src="../img/dogs1.jpg" style="height: 135px;width:205px;margin-left: 17px;margin-top: 3px;"></a>
				</div>
                <div class="row" style="height:50px;">
                	<h5 style="margin-left: 20px;"><a href="#">Tiêu đề Xumali</a></h5>
                </div>
            </div>
			<div class="row" style="width:210px;">
                <div class="row" style="height:140px;">
					<a href="#"><img class="img-thumbnail" src="../img/Guide-Dogs_025-11.jpg" style="height: 135px;width:205px;margin-left: 17px;margin-top: 3px;"></a>
                </div>
                <div class="row" style="height:50px;">
                	<h5 style="margin-left: 20px;"><a href="#">Tiêu đề Xumali</a></h5>
				</div>
			</div>-->
            <div style="text-align:right;margin-top: 15px;">
                        <a class="button" href="indexlost.php">Xem thêm</a>
                    </div>
		</div>
	</div>
</div>   
</div>
<?php
	include("footer.php");
?>
</body>
</html>
