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
	<!--<script src="../js/ie-emulation-modes-warning.js"></script>-->
    <link href="../asset/Bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/menu.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="../css/style.css" media="screen" />
    <!--<script src="js/custom.js"></script>-->
    <script src="../asset/js/bootstrap.min.js"></script>
        <!-- Slick slide -->
	<link rel="stylesheet" type="text/css" href="../asset/slick/slick.css"/>
	<link rel="stylesheet" type="text/css" href="../asset/slick/slick-theme.css"/>
	<script type="text/javascript" src="../asset/js/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" src="../asset/slick/jquery-migrate-1.2.1.min.js"></script>
	<script type="text/javascript" src="../asset/slick/slick.min.js"></script>
</head>

<body>
<div class="row" style="height: 360px;margin-top:12px;margin-bottom:3px;">
    <div class="col-xs-6" style="height: 360px; border: 1px solid grey;border-radius:5px;padding-bottom: 5px;">
        <div class="row" style="height: 60px;padding-top: 2px;">
        	<?php
				include_once(realpath(dirname(__DIR__))."/PHP/define.php");
				echo "<img class='img-thumbnail' src='".BASE_URL."img/bannervui.jpg' style='width:480px;height:55px;margin-left:23px;'>";
		?>
            <!--<img class="img-thumbnail" src="../img/bannervui.jpg" style="width:480px;height:55px;margin-left:5px;">-->
        </div>
        <div class="row" style="height:295px;width:473px;margin-left:10px;">
            <div id="SlideFooter" align="center" style="margin-top:0px;">
                <?php
                    require_once(BASE_PATH . "/PHP/ConnectDB.php");
                    $conn = ConnectDB::connect();
                    
                    $sql = "SELECT * FROM Slider ORDER BY ID ASC";
                    $result = mysqli_query($conn, $sql);
                    
                    if($result->num_rows > 0)
                    {
                        while($row = $result->fetch_assoc())
                        {
                            echo "<div><img src='".BASE_URL."img/AnhVui/".$row['TenFile']."' style='height:295px; width:470px;'></div>";
                        }
                    }
                    ConnectDB::disconnect();
                ?>
            </div>
        </div>
    </div>   

    <div class="col-xs-6" style="height: 360px;border: 1px solid grey;border-radius:5px;">
        <div class="row" style="height: 60px;padding-top: 2px;">
        	<?php
				echo "<img class='img-thumbnail' src='".BASE_URL."img/bannervui2.jpg' style='width:480px;height:55px;margin-left:23px;'>";
			?>
            <!--<img class="img-thumbnail" src="../img/bannervui2.jpg" style="width:480px;height:55px;margin-left:5px;">-->
        </div>
        <div class="row" style="height:255px;width:480px;margin-left:10px;">
            <!-- Chèn clip vui -->
             <?php
                    require_once(BASE_PATH . "/PHP/ConnectDB.php");
                    $conn = ConnectDB::connect();
                    //$sqlV = "SELECT * FROM Video ORDER BY ID DESC LIMIT 1";                    
					
					$sql = "SELECT * FROM Video ORDER BY ID DESC";
			
					//Dem so mau tin de sinh ID ngau nhien
					$resultAll = mysqli_query($conn, $sql);
					$IDVideo = rand(1, $resultAll->num_rows - 1);				
					$sqlV = "SELECT * FROM Video WHERE ID = ".$IDVideo;
						
                    $resultV = mysqli_query($conn, $sqlV);
                    
					//Truong hop ID khong ton tai
					while($resultV->num_rows == 0)
					{
						$IDVideo = rand(1, $resultAll->num_rows - 1);				
						$sqlV = "SELECT * FROM Video WHERE ID = ".$IDVideo;
                    	$resultV = mysqli_query($conn, $sqlV);
					}
					
                    if($resultV->num_rows > 0)
                    {
                        while($rowV = $resultV->fetch_assoc())
                        {
							echo "<iframe height='255' width='480' src='".$rowV['Link']."' frameborder='0' allowfullscreen></iframe>";
                        }
                    }
                    ConnectDB::disconnect();
                ?>
        </div>
        <div class="btn-group" role="group" aria-label="..." style="margin-top: 5px;" align="center">
        	<!-- Hiện số nút = số video -->
            <!--<button type="button" class="btn btn-success">1</button>
            <button type="button" class="btn btn-success">2</button>
            <button type="button" class="btn btn-success">3</button>
            <button type="button" class="btn btn-success">4</button>
            <button type="button" class="btn btn-success">5</button>-->
        </div>
    </div>
</div>      
<hr>	
<div class="row" style="width:880px;margin:30px 0px 0px 70px; padding-bottom:20px; border: 2px solid grey;border-radius:5px;">
	<div class="col-xs-2">
    	<?php
			echo "<img class='img-thumbnail' src='".BASE_URL."img/logo.gif' style='width:130px;height:70; margin-top: 50px;'>";
		?>
		<!--<img src="./img/logo.gif" style="width:130px;height:70; margin-top: 50px;">-->
	</div>
	<div class="col-xs-4" >
		<h3>GIỚI THIỆU</h3>
        <p align="justify">
		FindMyPet là nơi mọi người cùng chia sẻ, giúp đỡ những bé thú cưng thất lạc tìm về được với chủ của mình. Và cũng là nơi để cộng đồng yêu thú giao lưu, trao đổi kinh nghiệm với nhau. <br>
		Những bài viết có nội dung không lành mạnh sẽ bị ban quản trị xóa. <br>
        Những thành viên đăng các nội dung không phù hợp với tiêu chí của trang sẽ được nhắc nhở và xóa tài khoản nếu còn tái phạm. <br>
		Chúng tôi không chịu trách nhiệm về các bài đăng của thành viên.
		</p>
	</div>    
	<div class="col-xs-3">
		<h3>LIÊN KẾT</h3>
        <a href="http://baovecho.org">Liên minh bảo vệ chó châu Á (ACPA)</a>
        <br>
		<a href="http://thucung.vn">Thế giới thú cưng</a>
        <br>
		<a href=" http://www.yeuthucung.com">Diễn đàn thú cưng</a>
	</div>    
	<div class="col-xs-3">
		<h3>FindMyPet</h3>
		<ul style="list-style-type:none;">
					<li><a href="<?php echo BASE_URL . "Index.php"; ?>">Trang chủ</a></li>
					<li><a href="<?php echo BASE_URL . "Khach/IndexLost.php"; ?>">Tin mất thú</a></li>
					<li ><a href="<?php echo BASE_URL . "Khach/IndexFind.php"; ?>">Tin tìm chủ</a></li>
					<li><a href="<?php echo BASE_URL . "Khach/Knowledge.php"; ?>">Kiến thức cơ bản</a></li>
					<li><a href="<?php echo BASE_URL . "Khach/News.php"; ?>">Tin mới</a></li>
		</ul>
	</div>    
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$("#SlideFooter").slick({
			slidesToShow: 1,
			slideToScroll : 1,
			autoplay: true,
			autoplaySpeed: 1500,
  		});
	});
</script>  
</body>
</html>






