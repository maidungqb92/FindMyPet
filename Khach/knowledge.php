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
		<div class="col-xs-9" style="background-color: whitesmoke;padding-top: 5px; height:1015px;">
			<div class="row">
            	<p class="bg-primary" style="margin-right: 5px;margin-left: 5px;font-size: 30px;color:white;font-family: tahoma;text-align: center;border-radius:5px;padding-bottom: 5px;"> <b>Những kiến thức cơ bản về thú cưng</b> </p>
            </div>
			<ul class="nav nav-tabs">
            	
				 <?php
                    require_once(BASE_PATH . "/PHP/ConnectDB.php");
                    $conn = ConnectDB::connect();
                    
                    $sql = "SELECT DISTINCT Loai FROM BaiViet WHERE KiemDuyet = ".DA_KIEM_DUYET;

                    $result = mysqli_query($conn, $sql);
                    echo "<li role='presentation'><a href='knowledge.php'>Tất cả</a></li>";
                    if($result->num_rows > 0)
                    {
                        while($row = $result->fetch_assoc())
                        {
							if(array_key_exists('Loai',$_GET))
							{
								if($row['Loai'] == $_GET['Loai'])
									echo "<li role='presentation' class='active'><a href='knowledge.php?Loai=".$row['Loai']."'>".$row['Loai']."</a></li>";
								else
									echo "<li role='presentation' ><a href='knowledge.php?Loai=".$row['Loai']."'>".$row['Loai']."</a></li>";		
							}
							else
							{
								
								echo "<li role='presentation' ><a href='knowledge.php?Loai=".$row['Loai']."'>".$row['Loai']."</a></li>";
							}
                        }
                    }
                    ConnectDB::disconnect();
                
                ?>
                    <!--<li role="presentation" class="active"><a href="knowledge.php">Tất cả</a></li>
                    <li role="presentation"><a href="knowledgecho.php">Chóa</a></li>
                    <li role="presentation"><a href="knowledgemeo.php">Meo meo</a></li>
                    <li role="presentation"><a href="knowledgechim.php">Trym</a></li>
                    <li role="presentation"><a href="knowledgetho.php">Thỏ</a></li>
                    <li role="presentation"><a href="knowledgekhac.php">Khác</a></li>-->
			</ul>
				 <?php
				require_once(BASE_PATH . "/PHP/ConnectDB.php");
				$conn = ConnectDB::connect();
				$sql = "SELECT ID,TieuDe, TomTat,HinhAnh FROM BaiViet WHERE IDDanhMuc = ".BAI_VIET." AND KiemDuyet = ".DA_KIEM_DUYET." ORDER BY ID DESC";
				if(array_key_exists('Loai',$_GET))
					$sql = "SELECT ID,TieuDe, TomTat,HinhAnh FROM BaiViet WHERE IDDanhMuc = ".BAI_VIET." AND KiemDuyet = ".DA_KIEM_DUYET." AND Loai = '".$_GET['Loai']."' ORDER BY ID DESC";
					
				//Code phan trang
				$row_per_page=5; // Số dòng trên mỗi trang
							
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
						echo '<div class="row" style="height:145px;">';
							echo '<div class="col-xs-4" style="height:145px;">';
								echo "<a href='".BASE_URL."Khach/knowledgepage.php?ID=".$row['ID']."'><img class='img-thumbnail' src='".BASE_URL."img/".$row['HinhAnh']."' style='height: 140px;width:200px;'></a>";
							echo '</div>';
							echo '<div class="col-xs-8" style="height:145px;fon">';
								echo "<a href='".BASE_URL."Khach/knowledgepage.php?ID=".$row['ID']."'><h3>".$row['TieuDe']."</h3></a>";
								echo "<p align='justify'>".$row['TomTat']."</p>";
							echo '</div>';
						echo "</div>";
						
					}
				}
				ConnectDB::disconnect();
			
			?>
			<nav style="margin-top: 15px;">
            	<ul class="pager">
                <?php
					//bắt đầu phân trang
					$page_cr=($start/$row_per_page)+1;
					echo "<h4><span class='bg-primary'>". $page_cr."</span></h4>";
					for($i=1;$i<=$page;$i++)
					{
						if ($page_cr!=$i) echo "<a href='Knowledge.php?start=".$row_per_page*($i-1)."'><button type='button' class='btn btn-success'>".$i."</button></a>";
					 else echo "<button type='button' class='btn btn-success'>".$i."</button>";
					
					} 
				?>
					<!--<li class="previous"><a href="#"><span aria-hidden="true">&larr;</span>Tin mới hơn</a></li>
                    <li class="next"><a href="#">Tin cũ hơn <span aria-hidden="true">&rarr;</span></a></li>-->
				</ul>
			</nav>
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
								echo "<a href='".BASE_URL."Khach/find.php?ID=".$row['ID']."'><img class='img-thumbnail' src='".BASE_URL."img/".$row['HinhAnh']."' style='height: 135px;width:205px; margin-top:10px;'></a>";
							echo '</div>';
								echo "<a href='".BASE_URL."Khach/find.php?ID=".$row['ID']."'>".$row['TieuDe']."</a>";
						
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
								echo "<a href='".BASE_URL."Khach/lost.php?ID=".$row['ID']."'><img class='img-thumbnail' src='".BASE_URL."img/".$row['HinhAnh']."' style='height: 135px;width:205px; margin-top:10px;'></a>";
							echo '</div>';
								echo "<a href='".BASE_URL."Khach/lost.php?ID=".$row['ID']."'>".$row['TieuDe']."</a>";
						
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