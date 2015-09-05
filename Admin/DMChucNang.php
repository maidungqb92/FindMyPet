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

        <link rel="stylesheet" type="text/css" href="../css/demo.css" />
        <link rel="stylesheet" type="text/css" href="../css/style6.css" />
        <link href='http://fonts.googleapis.com/css?family=Terminal+Dosis' rel='stylesheet' type='text/css' />
    
    
    
</head>
<body style="background-color: lightgrey;min-height:100%;">
	<?php
        include("menu_Admin.php");
    ?>
<div class="container" style="background-color: whitesmoke;width:980px; border-radius: 5px;">
	<div class="row" style="background-color: whitesmoke;padding-top: 5px;">
    	<p class="bg-primary" style="margin-right: 5px;margin-left: 5px;font-size: 30px;color:white;font-family: tahoma;text-align: center;border-radius:5px;padding-bottom: 5px;"> <b>Danh mục chức năng</b> </p>
    </div>
    <div class="row" style="height:230px;">
    	 <div>
			<ul class="ca-menu">
                    <li style="margin-left: 100px; border-radius:20px;">
                        <a href="QLBaiViet.php">
                            <span class="ca-icon">&#68;</span>
                            <div class="ca-content">
                                <h2 class="ca-main">Quản trị bài viết</h2>
                                
                            </div>
                        </a>
                    </li>
                    <li style="margin-left: 80px; border-radius:20px;">
                        <a href="QLBinhLuan.php">
                            <span class="ca-icon">&#101;</span>
                            <div class="ca-content">
                                <h2 class="ca-main">Quản trị bình luận</h2>
                                
                            </div>
                        </a>
                    </li>
                    <li style="margin-left: 80px; border-radius:20px;">
                        <a href="QLTaiKhoan.php">
                            <span class="ca-icon">&#85;</span>
                            <div class="ca-content">
                                <h2 class="ca-main">Quản trị tài khoản</h2>
                                
                            </div>
                        </a>
                    </li>
                    
                </ul>
            </div><!-- content -->
    </div>
    
    <div class="row" style="height:230px;">
    	 <div class="content">
			<ul class="ca-menu">
                    <li style="margin-left: 80px; border-radius:20px;">
                        <a href="QLAnhVuiThuCung.php">
                            <span class="ca-icon">&#73;</span>
                            <div class="ca-content">
                                <h2 class="ca-main">Quản trị Ảnh vui</h2>
                                
                            </div>
                        </a>
                    </li>
                    <li style="margin-left: 80px; border-radius:20px;">
                        <a href="QLVideoClip.php">
                            <span class="ca-icon">&#77;</span>
                            <div class="ca-content">
                                <h2 class="ca-main">Quản trị Video Clip</h2>
                                
                            </div>
                        </a>
                    </li>
                    
                </ul>
            </div><!-- content -->
    </div>
    
</div>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
</body>
</html>
