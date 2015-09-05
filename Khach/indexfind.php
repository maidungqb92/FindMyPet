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
    <div class="row">
		<div class="col-xs-12" style="background-color: whitesmoke;padding-top: 5px;min-height:100%">
			<div class="row">
            	<p class="bg-primary" style="margin-right: 5px;margin-left: 5px;font-size: 30px;color:white;font-family: tahoma;text-align: center;border-radius:5px;padding-bottom: 5px;"> <b>Tin tìm chủ</b> </p>
            </div>
            <?php
				require_once(BASE_PATH . "/PHP/ConnectDB.php");
				$conn = ConnectDB::connect();
				
				$sql = "SELECT ID,TieuDe, TomTat,HinhAnh FROM BaiViet WHERE IDDanhMuc = ".TIN_TIM." AND KiemDuyet = ".DA_KIEM_DUYET." ORDER BY ID DESC";
				
				//Code phan trang
				$row_per_page=9; // Số dòng trên mỗi trang
							
				$resultAll = mysqli_query($conn, $sql);
				
				$rows = $resultAll->num_rows;//Số dòng cần hiển thị
				//Tính số trang cần hiển thị
				if ($rows>$row_per_page) $page=ceil($rows/$row_per_page); 
				else $page=1; //nếu số dòng trong CSDL nhỏ hơn hoặc bằng số dòng trên 1 trang thì chỉ có 1 trang để hiển thị
				//Tính số dòng để lấy từ CSDL
				if(array_key_exists('start',$_GET))
				{
					$start = $_GET['start'];
				}
				else
					$start = 0;
					
				$sql .= " LIMIT ".$start.",".$row_per_page;
				
				$result = mysqli_query($conn, $sql);
				
				if($result->num_rows > 0)
				{
					while($row = $result->fetch_assoc())
					{
						echo "<div class='col-xs-4' align='center' style='height:300px;'>";
							echo "<div class='row' style='height:190px;'><a href='".BASE_URL."Khach/Find.php?ID=".$row['ID']."'><img class='thumbnail' src='".BASE_URL."img/".$row['HinhAnh']."' style='height:180px;width:250px;margin-top:5px;margin-left: 34px;'></a>";
							echo "</div>";
							echo "<div class='row' style='margin-left: 18px;width:250px;height:100px;'>";
								echo "<a href='".BASE_URL."Khach/Find.php?ID=".$row['ID']."'><h3>".$row['TieuDe']."</h3></a>";
								echo "<p align='justify'>".$row['TomTat']."</p>";
							echo "</div>";
						echo "</div>";
					}
				}
				ConnectDB::disconnect();	
			?>
		</div>
	</div>
    <div class="row" align="center">
		<?php
			//bắt đầu phân trang
			$page_cr=($start/$row_per_page)+1;
			echo "<h4><span class='bg-primary'>". $page_cr."</span></h4>";
			for($i=1;$i<=$page;$i++)
			{
				if ($page_cr!=$i) echo "<a href='IndexFind.php?start=".$row_per_page*($i-1)."'><button type='button' class='btn btn-success'>".$i."</button></a>";
		 else echo "<button type='button' class='btn btn-success'>".$i."</button>";
			
			} 
		?>
	</div>
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
	<div class="col-xs-8" style="background-color:lightblue; height: 180px;width:684px;">
		<!-- chèn slide ảnh tìm chủ-->
        <?php
			include("slidelost.php");
		?>
    </div>    
</div>    

<?php
	include("footer.php");
?>  

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
