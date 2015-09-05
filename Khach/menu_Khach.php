<?php
	if(!isset($_SESSION))
	{
		session_start();
	} 
?>
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
                <?php
					include_once(realpath(dirname(__DIR__))."/PHP/define.php");
					echo "<a class='navbar-brand' href='".BASE_URL."Index.php'>FindMyPet</a>";
				?>
				<!--<a class="navbar-brand" href="./index.php">FindMyPet</a>-->
			</div>
			<div id="navbar" class="navbar-collapse collapse" aria-expanded="false" style="height: 10px;  ">
                <ul class="nav navbar-nav">
                	<?php
						echo "<li class='active'><a href='".BASE_URL."Index.php'>Trang chủ</a></li>";
						echo "<li class='active'><a href='".BASE_URL."Khach/IndexLost.php'>Tin mất thú</a></li>";
						echo "<li class='active'><a href='".BASE_URL."Khach/IndexFind.php'>Tin tìm chủ</a></li>";
						echo "<li class='active'><a href='".BASE_URL."Khach/Knowledge.php'>Kiến thức cơ bản</a></li>";
						echo "<li class='active'><a href='".BASE_URL."Khach/News.php'>Tin mới</a></li>";
					?>
					<!--<li class="active"><a href="./index.php">Trang chủ</a></li>
					<li class="active"><a href="indexlost.php">Tin mất thú</a></li>
					<li class="active"><a href="indexfind.php">Tin tìm chủ</a></li>
					<li class="active"><a href="knowledge.php">Kiến thức cơ bản</a></li>
					<li class="active"><a href="news.php">Tin tức</a></li>		-->
				</ul>
				<ul class="nav navbar-nav navbar-right">
                <?php
					
					if(array_key_exists('TenDN',$_SESSION) && array_key_exists('MatKhau',$_SESSION) && array_key_exists('MaPhanQuyen',$_SESSION))
					{
						
						if($_SESSION['MaPhanQuyen'] == NHOM_QUAN_TRI)
						{
							echo "<li class='active'><a href='".BASE_URL."Admin/BaiViet_Tao.php'><span class='glyphicon glyphicon-file'></span> Đăng bài viết/bản tin</a></li>";
							echo "<li class='active'><a href='".BASE_URL."Admin/DMChucNang.php'><span class='glyphicon glyphicon-cog'></span> Danh mục chức năng</a></li>";
							echo "<li class='active'><a href='".BASE_URL."PHP/Logout.php'><span class='glyphicon glyphicon-log-out'></span> Đăng xuất</a></li>";
						}
						else if($_SESSION['MaPhanQuyen'] == NHOM_THANH_VIEN)
						{
							echo "<li class='active'><a href='".BASE_URL."Khach/DangBai.php'><span class='glyphicon glyphicon-file'></span> Đăng bài viết/bản tin</a></li>";
							echo "<li class='active'><a href='".BASE_URL."Khach/ThongTinCaNhan.php'><span class='glyphicon glyphicon-log-out'></span>Thông tin cá nhân</a></li>";
							echo "<li class='active'><a href='".BASE_URL."PHP/Logout.php'><span class='glyphicon glyphicon-log-out'></span> Đăng xuất</a></li>";
						}
						else
						{
							echo "<li class='active'><a href='".BASE_URL."PHP/Login.php'><span class='glyphicon glyphicon-log-in'></span> Đăng nhập</a></li>";
							echo "<li class='active'><a href='".BASE_URL."Khach/DangKy.php'><span class='glyphicon glyphicon-user'></span> Đăng ký</a></li>";
						}
					}
					else
					{
						echo "<li class='active'><a href='".BASE_URL."PHP/Login.php'><span class='glyphicon glyphicon-log-in'></span> Đăng nhập</a></li>";
						echo "<li class='active'><a href='".BASE_URL."Khach/DangKy.php'><span class='glyphicon glyphicon-user'></span> Đăng ký</a></li>";
					}
				?>
      			</ul>
			</div><!--/.nav-collapse -->
		</div>
	</nav>
</body>
</html>