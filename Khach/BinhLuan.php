<?php 
	//session_start();
	include_once(realpath(dirname(__DIR__))."/PHP/define.php");
	require_once("../PHP/ConnectDB.php");
	$conn = ConnectDB::connect();
	$date = date('Y-m-d H:i:s',time());
	
	if(isset($_POST['submit']))
	{
		if($_POST['txtNoiDung'] !="")
		{
		// Insert co so du lieu
		
		$TenDN = array_key_exists('TenDN',$_SESSION) ? $_SESSION['TenDN'] : "";
		$Ho = array_key_exists('Ho',$_SESSION) ? $_SESSION['Ho'] : $_POST['txtHo'];
		$Ten = array_key_exists('Ten',$_SESSION) ? $_SESSION['Ten'] : $_POST['txtTen'];
		$Email = array_key_exists('Email',$_SESSION) ? $_SESSION['Email'] : $_POST['txtEmail'];
		$SoDienThoai = array_key_exists('SoDienThoai',$_SESSION) ? $_SESSION['SoDienThoai'] : $_POST['txtSoDienThoai'];
		
		$sqlInsert = "INSERT INTO BinhLuan(IDBinhLuan, NoiDung, TenDN, Ho, Ten, Email, SoDienThoai, KiemDuyet, NgayBinhLuan) VALUES (".$_POST['txtIDBinhLuan'].", '".$_POST['txtNoiDung']."', '".$TenDN."', '".$Ho."','".$Ten."','".$Email."', '".$SoDienThoai."', ".CHUA_KIEM_DUYET.", '".$date."')";
		
		if(mysqli_query($conn,$sqlInsert) === TRUE)
			{
			}
			else
			{
				echo "Cap nhat du lieu Loi";
			}
		}
		ConnectDB::disconnect();
	}
	
?>

<!DOCTYPE html>
<html lang="en">
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
    <!-- Chen Validation -->
    <script src="../asset/js/jquery.validate.js"></script>
</head>

<body style="background-color: lightgrey;min-height:100%;">
<div>  
	<!-- Load cac Binh luan -->
	<div>
    <?php	
		require_once("../PHP/ConnectDB.php");
		$conn = ConnectDB::connect();
		
		$sqlBL = "SELECT Ho, Ten, NgayBinhLuan, NoiDung FROM BinhLuan WHERE KiemDuyet = ".DA_KIEM_DUYET." AND IDBinhLuan = ".$_GET['ID'];
	
		$resultBL = mysqli_query($conn, $sqlBL);
		
		if($resultBL->num_rows > 0)
		{
			while($rowBL = $resultBL->fetch_assoc())
			{
				echo "<p style='margin-left:15px'><strong>".$rowBL['Ho']." ".$rowBL['Ten']."</strong>(".date('d/m/Y',strtotime($rowBL['NgayBinhLuan']))."): <br> ".$rowBL['NoiDung']."</p>";
			}
		}
		ConnectDB::disconnect();
	?>
    </div>
    <div hidden="true" id="ThongTinUser">
		
    	<?php
			if(array_key_exists('TenDN',$_SESSION) && array_key_exists('MaPhanQuyen',$_SESSION))
				echo "<input type='text' id='txtTenDN' name='txtTenDN' value='".$_SESSION['TenDN']."'>";
			else
				echo "<input type='text' id='txtTenDN' name='txtTenDN'>";
		?>
    </div>
	<div>
    <!-- Load form de Binh luan -->
    <form class="form-horizontal" name="frmBinhLuan" method="post">
    	<input type="hidden" class="form-control" name="txtIDBinhLuan" value="<?php echo $_GET['ID']?>">
    	<div class="form-group" id="HoTen">
            <label for="txtHo" class="col-sm-2 control-label">Họ tên: </label>
            <div class="col-sm-3">
            <?php
				if(array_key_exists('TenDN',$_SESSION) && array_key_exists('MaPhanQuyen',$_SESSION))
					echo "<input type='text' class='form-control' name='txtHo' placeholder='Họ lót' value='".$_SESSION['Ho']."'>";
				else
					echo "<input type='text' class='form-control' name='txtHo' placeholder='Họ lót' required>";
			?>
                <!--<input type="text" class="form-control" name="txtHo" placeholder="Họ lót" required>-->
            </div>
            <div class="col-sm-2">
            <?php
				if(array_key_exists('TenDN',$_SESSION) && array_key_exists('MaPhanQuyen',$_SESSION))
					echo "<input type='text' class='form-control' name='txtTen' placeholder='Tên' value='".$_SESSION['Ten']."'>";
				else
					echo "<input type='text' class='form-control' name='txtTen' placeholder='Tên' required>";
			?>
               <!-- <input type="text" class="form-control" name="txtTen" placeholder="Tên" required>-->
            </div>
        </div>
		<div class="form-group" id="Email">
        	<label for="txtEmail" class="col-sm-2 control-label">Email: </label>
            <div class="col-sm-5">
            <?php
				if(array_key_exists('TenDN',$_SESSION) && array_key_exists('MaPhanQuyen',$_SESSION))
					echo "<input type='text' class='form-control' name='txtEmail' placeholder='Địa chỉ Email' value='".$_SESSION['Email']."'>";
				else
					echo "<input type='text' class='form-control' name='txtEmail' placeholder='Địa chỉ Email' required>";
			?>
                <!--<input type="email" class="form-control" name="txtEmail" placeholder="Địa chỉ Email" required>-->
            </div>
        </div>
        <div class="form-group" id="SoDienThoai">
        	<label for="txtSoDienThoai" class="col-sm-2 control-label">Số điện thoại: </label>
            <div class="col-sm-5">
            <?php
				if(array_key_exists('TenDN',$_SESSION) && array_key_exists('MaPhanQuyen',$_SESSION))
					echo "<input type='text' class='form-control' name='txtSoDienThoai' placeholder='Số điện thoại' value='".$_SESSION['SoDienThoai']."'>";
				else
					echo "<input type='text' class='form-control' name='txtSoDienThoai' placeholder='Số điện thoại' required>";
			?>
<!--                <input type="text" class="form-control" name="txtSoDienThoai" placeholder="Số điện thoại" required>-->
            </div>
        </div>
        <div class="form-group">
        	<label for="txtNoiDung" class="col-sm-2 control-label">Nội dung: </label>
            <div class="col-sm-5">
            	<textarea class="form-control" id="txtNoiDung" name="txtNoiDung" placeholder="Nội dung" required></textarea>
            </div>
        </div>
        <div class="form-group" align="center">
			<div class="col-sm-offset-2 col-sm-3">
				<button type="submit" class="btn btn-success" name="submit">Bình luận</button>
            	<button type="reset" class="btn btn-default" name="reset">Xóa</button>
            </div>
        </div>
    </form>
    </div>
</div> <!-- /container -->
<script type="text/javascript">
$(document).ready(function(){
		if($("#txtTenDN").val() != ""){
			$("#HoTen").hide();
			$("#Email").hide();
			$("#SoDienThoai").hide();
		}
		else {
			$("#HoTen").show();
			$("#Email").show();
			$("#SoDienThoai").show();
		}
});
</script>
</body>
</html>