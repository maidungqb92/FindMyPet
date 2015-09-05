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
<body>
<!-- chèn slide ảnh chó bị mất-->
<div id="SlideLostPet" align="center" style="margin-top:30px">
    <?php
		include_once(realpath(dirname(__DIR__))."/PHP/define.php");
		/*echo "<div><img src='".BASE_URL."img/9.jpg' class='imgSlide'></div>";
		echo "<div><img src='".BASE_URL."img/10.jpg' class='imgSlide'></div>";
		echo "<div><img src='".BASE_URL."img/11.jpg' class='imgSlide'></div>";
		echo "<div><img src='".BASE_URL."img/12.jpg' class='imgSlide'></div>";
		echo "<div><img src='".BASE_URL."img/1.jpg' class='imgSlide'></div>";
		echo "<div><img src='".BASE_URL."img/2.jpg' class='imgSlide'></div>";
		echo "<div><img src='".BASE_URL."img/3.jpg' class='imgSlide'></div>";*/
		
		require_once(BASE_PATH . "/PHP/ConnectDB.php");
		$conn = ConnectDB::connect();
		
		$sql = "SELECT ID,HinhAnh FROM BaiViet WHERE IDDanhMuc = ".TIN_MAT." AND KiemDuyet = ".DA_KIEM_DUYET." ORDER BY ID ASC";
		$result = mysqli_query($conn, $sql);
				
		if($result->num_rows > 0)
		{
			while($row = $result->fetch_assoc())
			{
				echo "<div><a href='".BASE_URL."/Khach/Lost.php?ID=".$row['ID']."'><img src='".BASE_URL."img/".$row['HinhAnh']."' class='imgSlide'></a></div>";
			}
		}
		ConnectDB::disconnect();

	?>
    <!--<div><a href="./img/1.jpg"><img src="./img/1.jpg" class="imgSlide"/></a>
    </div>
    <div><img src="./img/2.jpg" class="imgSlide"/></div>
    <div><img src="./img/3.jpg" class="imgSlide"/></div>
    <div><img src="./img/4.jpg" class="imgSlide"/></div>
    <div><img src="./img/6.jpg" class="imgSlide"/></div>
    <div><img src="./img/2.jpg" class="imgSlide"/></div>-->
</div>
<!-- Kết thúc chèn slide -->
<script type="text/javascript">
	$(document).ready(function(){
  		$("#SlideLostPet").slick({
			slidesToShow: 4,
			slideToScroll : 4,
			autoplay: true,
			autoplaySpeed: 2000,
  		});
	});
</script>
</body>
</html>