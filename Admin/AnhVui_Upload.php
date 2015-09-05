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
	<script src="../asset/js/jquery.min.js"></script>
	<script src="../asset/js/ie-emulation-modes-warning.js"></script>
    <link href="../asset/Bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/menu.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="../css/style.css" media="screen" />
    <script src="../asset/js/bootstrap.min.js"></script>
</head>
<body style="background-color: lightgrey;min-height:100%;">
	<?php
        include("menu_Admin.php");
    ?>
<div class="container" style="background-color: whitesmoke;width:980px; border-radius: 5px;">
	<div class="row" style="background-color: whitesmoke;padding-top: 5px;">
    	<p class="bg-primary" style="margin-right: 5px;margin-left: 5px;font-size: 30px;color:white;font-family: tahoma;text-align: center;border-radius:5px;padding-bottom: 5px;"> <b>Upload ảnh vui thú cưng</b> </p>
    </div>
    <div class="row">
    	<form method="post">
Enter your Image: <input type="text" name="txtnum" value="1" size="10"/>
		<input type="submit" name="ok_num" value="Accept" />
		</form>
		<?php
			if(isset($_POST['ok_num']))
			{
            	$num=$_POST['txtnum'];
	            echo "<hr />";
     			echo "Ban dang chon $num file upload<br />";
				echo "<form action='AnhVui_Upload.php?file=$num' method='post' enctype='multipart/form-data'>";
				for($i=1; $i <= $num; $i++)
				{
					 echo "<input type='file' name='img[]' /><br />";
				}
				echo "<button type='submit' class='btn btn-primary' name='ok_upload'>Upload</button>";
				echo "</form>";
			}
			
			require_once("../PHP/ConnectDB.php");
			$conn = ConnectDB::connect();
				
			if(isset($_POST['ok_upload']))
			{
				$num=$_GET['file'];
				
				//mysql_select_db("slider",$conn);
				for($i=0; $i< $num; $i++)
				{
					move_uploaded_file($_FILES['img']['tmp_name'][$i],"../img/AnhVui/".$_FILES['img']['name'][$i]);
					$url="../img/AnhVui/".$_FILES['img']['name'][$i];
					$name=$_FILES['img']['name'][$i];
					$sql="insert into slider(TenFile) values('$name')";
					
					if($conn->query($sql) === TRUE)
					{
						echo "Upload Thanh cong file <b>$name</b><br />";
						echo "<img src='$url' width='120' /><br />";
						echo "Images URL: <input type='text' name='link' value='$url' size='35' /><br />";
					}
					else
					{
						echo "Nhap du lieu Loi";
					}
				}
				ConnectDB::disconnect();
			}
		?>
    </div>
</div>
</body>
</html>
