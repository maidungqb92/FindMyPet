<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
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

</head>

<body>
	<nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="background-color:#00008B;">
		<div class="container" >
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar" >
					<span class="sr-only">Đây là menu mobile</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="../index.php">FindMyPet</a>
			</div>
			<div id="navbar" class="navbar-collapse collapse" aria-expanded="false" style="height: 1px;  ">
				<ul class="nav navbar-nav">
					
                    <li class="active"><a href="DMChucNang.php">Danh mục chức năng </a></li>
					<li class="active"><a href="QLBaiViet.php">Quản trị Bài viết</a></li>
                    <li class="active"><a href="QLBinhLuan.php">Quản trị Bình luận</a></li>
					<!--<li class="active"><a href="QLThuCung.php">Quản trị Thú cưng</a></li>-->
					<li class="active"><a href="QLTaiKhoan.php">Quản trị Tài khoản</a></li>
                    <li class="active"><a href="QLAnhVuiThuCung.php">Quản trị ảnh vui</a></li>
                    <li class="active"><a href="QLVideoClip.php">Quản trị Video Clip</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
                	<?php
						include_once(realpath(dirname(__DIR__))."/PHP/define.php");	
                        require_once("../PHP/ConnectDB.php");
                        $conn = ConnectDB::connect();							
                        $sqlBV = "SELECT count(ID) FROM BaiViet WHERE KiemDuyet = ".CHUA_KIEM_DUYET;
                        $resutBV = mysqli_query($conn, $sqlBV);
						$countBV = $resutBV->fetch_row();

						if($countBV[0] != 0)
						{
							echo "<li class='active' ><a href='QLBaiViet.php' style='color:red;font-size:14px'><span class='glyphicon glyphicon-book'>".$countBV[0]."</span></a></li>";
						}
						
						$sqlBL = "SELECT count(ID) FROM BinhLuan WHERE KiemDuyet = ".CHUA_KIEM_DUYET;
                        $resutBL = mysqli_query($conn, $sqlBL);
						$countBL = $resutBL->fetch_row();

						if($countBL[0] != 0)
						{
							echo "<li class='active' ><a href='QLBinhLuan.php' style='color:red;font-size:14px'><span class='glyphicon glyphicon-envelope'>".$countBL[0]."</span></a></li>";
						}
						ConnectDB::disconnect();
                    ?>
					<li class="active"><a href="../PHP/Logout.php"><span class="glyphicon glyphicon-log-out"></span> Đăng xuất</a></li>
					<!--<li class="active"><a href="#"><span class="glyphicon glyphicon-log-in"></span> Đăng kí</a></li>-->
      			</ul>
			</div><!--/.nav-collapse -->
		</div>
	</nav>
</body>
</html>