<?php
	
    if(!isset($_SESSION))
	{
		session_start();
	} 

	include_once(realpath(dirname(__DIR__))."/PHP/define.php");
	if(array_key_exists('TenDN',$_SESSION) && array_key_exists('MaPhanQuyen',$_SESSION))
	{
		if($_SESSION['MaPhanQuyen'] != NHOM_THANH_VIEN)
		{
			header('Location: ../PHP/Login.php');
		}
	}
	else
	{
		header('Location: ../PHP/Login.php');
	}
	
	require_once("../PHP/ConnectDB.php");
	$conn = ConnectDB::connect();
	$date = date('Y-m-d H:i:s',time());
		
	if(isset($_POST['submit']))
	{
		$target_file = '';
		$store_url = '';
		if($_POST['txtTieuDe'] !="")
		{
			//Upload anh
			
			if($_FILES['imgFile']['name'] != "")
			{
				$target_dir = "../img/";
				
				$target_file = $target_dir . basename($_FILES['imgFile']['name']);
				$uploadOk = 1;
				$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

				// Check if image file is a actual image or fake image
				if(isset($_POST["submit"])) {
					$check = getimagesize($_FILES["imgFile"]["tmp_name"]);
					if($check !== false) {
						echo "File is an image - " . $check["mime"] . ".";
						$uploadOk = 1;
					} else {
						echo "File is not an image.";
						$uploadOk = 0;
					}
				}
				// Check if file already exists
				if (file_exists($target_file)) {
					echo "Sorry, file already exists.";
					//Neu file da ton tai thi lay link file da ton tai do
					$store_url =$_FILES['imgFile']['name'];
					$uploadOk = 0;
				}
				// Check file size
				if ($_FILES["imgFile"]["size"] > 500000) {
					echo "Sorry, your file is too large.";
					$uploadOk = 0;
				}
				// Allow certain file formats
				if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
				&& $imageFileType != "gif" ) {
					echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed."; 
					$uploadOk = 0;
				}
				// Check if $uploadOk is set to 0 by an error
				if ($uploadOk == 0) {
					echo "Sorry, your file was not uploaded.";
					
				// if everything is ok, try to upload file
				} else {
					if (move_uploaded_file($_FILES["imgFile"]["tmp_name"], $target_file)) {
						echo "The file ". basename( $_FILES["imgFile"]["name"]). " has been uploaded.";
						$store_url = $_FILES['imgFile']['name'];
					} else {
						echo "Sorry, there was an error uploading your file."; 
					}
				}
			}
			if($store_url == '')
			{
				$store_url = $_POST['linkImg'];
			}
	
		$Tuoi = 0;
		if($_POST['txtTuoi'] != "")
			$Tuoi = $_POST['txtTuoi'];
		if($store_url == "")
			$store_url = 'logo.gif';
			
		// Insert co so du lieu
		$sqlInsert = "INSERT INTO baiviet(TieuDe, TomTat, NoiDung, HinhAnh, TenDN, IDDanhMuc, KiemDuyet, NgayDang, Loai, Giong, DacDiem, TinhCach, KhaNang, NguonGoc, TieuChuan, Ten, Mau, Tuoi, DacDiemNhanDang) VALUES ('".$_POST['txtTieuDe']."', '".$_POST['txtTomTat']."', '".$_POST['txtNoiDung']."', '".$store_url."', '".$_SESSION['TenDN']."', ".$_POST['slDanhMuc'].", ".CHUA_KIEM_DUYET.", '".$date."', '".$_POST['txtLoai']."', '".$_POST['txtGiong']."', '".$_POST['txtDacDiem']."', '".$_POST['txtTinhCach']."', '".$_POST['txtKhaNang']."', '".$_POST['txtNguonGoc']."', '".$_POST['txtTieuChuan']."', '".$_POST['txtTen']."', '".$_POST['txtMau']."', ".$Tuoi.", '".$_POST['txtDacDiemNhanDang']."')";
				
		if(mysqli_query($conn,$sqlInsert) === TRUE)
			{
				echo "Chen du lieu thanh cong";
				header('Location: ../Index.php');
				ConnectDB::disconnect();
			}
			else
			{
				echo "Cap nhat du lieu Loi";
			}
		}
		ConnectDB::disconnect();
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
	<!-- Thẻ ckeditor-->
	<script src="../asset/ckeditor/ckeditor.js" type="text/javascript"></script>
	<link rel="stylesheet" type="text/css" href="../css/style.css" media="screen" />
    <script src="../asset/js/bootstrap.min.js"></script>
    <!-- Chen Validation -->
    <script src="../asset/js/jquery.validate.js"></script>
</head>

<body style="background-color: lightgrey;min-height:100%;">
	<?php
        include("menu_Khach.php");
		include_once(realpath(dirname(__DIR__))."/PHP/define.php");
    ?>
<div class="container" style="background-color: whitesmoke;width:980px; border-radius: 5px;">
	<div class="row" style="background-color: whitesmoke;padding-top: 5px;">
    	<p class="bg-primary" style="margin-right: 5px;margin-left: 5px;font-size: 30px;color:white;font-family: tahoma;text-align: center;border-radius:5px;padding-bottom: 5px;"> <b>Đăng Bài viết/Bản tin</b> </p>
    </div>
    <div class="row">
    	<!-- Chèn form để xem thông tin tài khoản -->
        <form class="form-horizontal" name="frmSuaTaiKhoan" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="slPhanQuyen" class="col-sm-2 control-label">Danh mục: </label>
                <div class="col-sm-5">
                    <select class="form-control" name="slDanhMuc" id="slDanhMuc">
                        <?php								
                            $sqlDM = "SELECT * FROM DanhMuc";
                            $resutDM = mysqli_query($conn, $sqlDM);
                            if($resutDM->num_rows >0)
                            {
                                while ($rowMD = $resutDM->fetch_assoc())
                                {
                                    echo "<option value='".$rowMD['ID']."'> ".$rowMD['TenDanhMuc']." - ".$rowMD['MoTa']."</option>";										
                                }
                            }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group" >
                <label for="txtTieuDe" class="col-sm-2 control-label">Tiêu đề: </label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="txtTieuDe" placeholder="Tiêu đề" required>
                </div>
            </div>
            <div class="form-group" >
                <label for="txtNoiDung" class="col-sm-2 control-label">Tóm tắt: </label>
                <div class="col-sm-9">
                    <textarea class="form-control" name="txtTomTat" placeholder="Tóm tắt" required></textarea>
                </div>
            </div>
            <div class="form-group" >
                <label for="txtNoiDung" class="col-sm-2 control-label">Nội dung: </label>
                <div class="col-sm-9">
                    <!--<textarea class="form-control" name="txtNoiDung" placeholder="Nội dung"></textarea>-->
                    <!--Thẻ CKEDITOR-->
                    <textarea id="txtNoiDung" class="ckeditor" name="txtNoiDung" placeholder="Nội dung" required></textarea>
                </div>
            </div>
            <!-- Chưa xử lý tải file ảnh-->
            <div class="form-group">
                <label for="imgFile" class="col-sm-2 control-label">Hình ảnh: </label>
                <div class="col-sm-5">
                    <input type="file" name="imgFile" id="imgFile">
                </div>
            </div>
            <div class="form-group">
                <label for="txtLoai" class="col-sm-2 control-label">Loài thú cưng: </label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="txtLoai" placeholder="Loài thú cưng">
                </div>
            </div>
            <div class="form-group">
                <label for="txtGiong" class="col-sm-2 control-label">Giống thú cưng: </label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="txtGiong" placeholder="Giống thú cưng">
                </div>
            </div>
            
            <div class="form-group" id="DacDiem">
                <label for="txtDacDiem" class="col-sm-2 control-label">Đặc điểm: </label>
                <div class="col-sm-9">
                    <textarea class="form-control" name="txtDacDiem" placeholder="Đặc điểm"></textarea>
                </div>
            </div>
            <div class="form-group" id="TinhCach">
                <label for="txtTinhCach" class="col-sm-2 control-label">Tính cách: </label>
                <div class="col-sm-9">
                    <textarea class="form-control" name="txtTinhCach" placeholder="Tính cách"></textarea>
                </div>
            </div>
            <div class="form-group" id="KhaNang">
                <label for="txtKhaNang" class="col-sm-2 control-label">Khả năng: </label>
                <div class="col-sm-9">
                    <textarea class="form-control" name="txtKhaNang" placeholder="Khả năng"></textarea>
                </div>
            </div>
            <div class="form-group" id="NguonGoc">
                <label for="txtNguonGoc" class="col-sm-2 control-label">Nguồn gốc: </label>
                <div class="col-sm-9">
                    <textarea class="form-control" name="txtNguonGoc" placeholder="Nguồn gốc"></textarea>
                </div>
            </div>
            <div class="form-group" id="TieuChuan">
                <label for="txtTieuChuan" class="col-sm-2 control-label">Tiêu chuẩn: </label>
                <div class="col-sm-9">
                    <textarea class="form-control" name="txtTieuChuan" placeholder="Tiêu chuẩn"></textarea>
                </div>
            </div>
            <!-- -->
            <div class="form-group" id="Ten">
                <label for="txtTen" class="col-sm-2 control-label">Tên của thú cưng: </label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="txtTen" placeholder="Tên của thú cưng">
                </div>
            </div>
            <div class="form-group" id="Mau">
                <label for="txtMau" class="col-sm-2 control-label">Màu của thú cưng: </label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="txtMau" placeholder="Màu của thú cưng">
                </div>
            </div>
            <div class="form-group" id="Tuoi">
                <label for="txtTuoi" class="col-sm-2 control-label">Tuổi của thú cưng: </label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="txtTuoi" placeholder="Tuổi của thú cưng" value="0">
                </div>
            </div>
            <div class="form-group" id="DacDiemNhanDang">
                <label for="txtDacDiemNhanDang" class="col-sm-2 control-label">Đặc điểm nhận dạng của thú cưng: </label>
                <div class="col-sm-9">
                    <textarea class="form-control" name="txtDacDiemNhanDang" placeholder="Đặc điểm nhận dạng của thú cưng"></textarea>
                </div>
            </div>
            
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-success" name="submit">Đăng bài</button>
                  <a href="../Index.php"><button type="button" class="btn btn-default">Trở về</button></a>
                </div>
            </div>
        </form>
</div>
<script type="text/javascript">
$(document).ready(function(){
	//Mặc định sẽ ẩn các phần của đăng tin
	$("#Ten").hide();
	$("#Mau").hide();
	$("#Tuoi").hide();
	$("#DacDiemNhanDang").hide();
	$("#slDanhMuc").change(function(){
		//Lựa chọn bài viết
		if($("#slDanhMuc").select().val() == 1){
			$("#DacDiem").show();
			$("#TinhCach").show();
			$("#KhaNang").show();
			$("#NguonGoc").show();
			$("#TieuChuan").show();
			
			$("#Ten").hide();
			$("#Mau").hide();
			$("#Tuoi").hide();
			$("#DacDiemNhanDang").hide();
		}
		//Lựa chọn đăng tin
		else {
			$("#DacDiem").hide();
			$("#TinhCach").hide();
			$("#KhaNang").hide();
			$("#NguonGoc").hide();
			$("#TieuChuan").hide();
			
			$("#Ten").show();
			$("#Mau").show();
			$("#Tuoi").show();
			$("#DacDiemNhanDang").show();
		}
	});
});
</script>
</body>
</html>
