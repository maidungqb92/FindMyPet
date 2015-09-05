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
    	<p class="bg-primary" style="margin-right: 5px;margin-left: 5px;font-size: 30px;color:white;font-family: tahoma;text-align: center;border-radius:5px;padding-bottom: 5px;"> <b>Quản lý Bình luận</b> </p>
    </div>
    <div class="row">
    	<!-- Chèn giao diện để quản lý Bình luận -->	
        <div class="col-md-3">
        	<form name="frmLoc" method="post">
				<select class="form-control" name="slKiemDuyet">
                	<option value='2'> Tất cả</option>
					<?php
						if(array_key_exists('slKiemDuyet',$_POST))
						{
							if($_POST['slKiemDuyet'] == DA_KIEM_DUYET)
							{
								echo "<option value='1' selected> Đã kiểm duyệt </option>";
								echo "<option value='0'>Chưa kiểm duyệt </option>";
							}
							else if($_POST['slKiemDuyet'] == CHUA_KIEM_DUYET)
							{
								echo "<option value='1'> Đã kiểm duyệt </option>";
								echo "<option value='0' selected>Chưa kiểm duyệt </option>";
							}
							else
							{
								echo "<option value='1'> Đã kiểm duyệt </option>";
								echo "<option value='0'>Chưa kiểm duyệt </option>";
							}
						}
						else
							{
								echo "<option value='1'> Đã kiểm duyệt </option>";
								echo "<option value='0'>Chưa kiểm duyệt </option>";
							}
					?>
				</select>
		</div>
                <div class="col-md-3" align="left">
                	<button type="submit" class="btn btn-info" name="submit">Lọc Bình luận</button>
                </div>
            </form>
	</div>
	<div class="row" align="center">
        <table class="table table-condensed">
        <tr>
            <th class="info" >ID</th>
            <th class="info" >Tiêu đề Bài viết được bình luận</th>
			<th class="info" >Nội dung</th>
            <th class="info" >Người đăng</th>
			<th class="info" >Kiểm duyệt</th>
            <th class="info" >Ngày dăng</th>
            <th class="info" width="183" >Tác vụ</th>
        </tr>
        <?php
            require_once("../PHP/ConnectDB.php");
            $conn = ConnectDB::connect();
        	
            $sql = "SELECT A.ID, B.TieuDe, A.NoiDung, A.TenDN, A.KiemDuyet, A.NgayBinhLuan FROM BinhLuan AS A INNER JOIN BaiViet AS B ON A.IDBinhLuan = B.ID ORDER BY A.ID DESC";
			if(array_key_exists('slKiemDuyet',$_POST))
			{
				if ($_POST['slKiemDuyet'] != '2')
				{
					$sql = "SELECT A.ID, B.TieuDe, A.NoiDung, A.TenDN, A.KiemDuyet, A.NgayBinhLuan FROM BinhLuan AS A INNER JOIN BaiViet AS B ON A.IDBinhLuan = B.ID WHERE A.KiemDuyet = ". $_POST['slKiemDuyet']." ORDER BY A.ID DESC";
				}
			}
		
			//Code phan trang
			$row_per_page=10; // Số dòng trên mỗi trang
						
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
                    echo "<tr>";
                        echo "<td>". $row['ID'] ."</td>";
                        echo "<th>". $row['TieuDe'] ."</th>";
						echo "<td>". $row['NoiDung'] ."</td>";
						echo "<td>". $row['TenDN'] ."</td>";
						echo "<td>". $row['KiemDuyet'] ."</td>";
						echo "<td>". $row['NgayBinhLuan'] ."</td>";
                        echo "<td>
							<a href='BinhLuan_Doc.php?ID=".$row['ID']."'><input type='button' value='Xem' class='btn btn-default'/></a>
							<a href='BinhLuan_Sua.php?ID=".$row['ID']."'><input type='button' value='Sửa' class='btn btn-success'/></a>
							<a href='BinhLuan_Xoa.php?ID=".$row['ID']."'> <input type='button' value='Xóa' class='btn btn-danger'/> </a>";
					   	echo "</td>";
                    echo "</tr>";
                }
            }
            ConnectDB::disconnect();
        ?>
		</table>
         <?php
		
			//bắt đầu phân trang
			$page_cr=($start/$row_per_page)+1;
			echo "<h4><span class='bg-primary'>". $page_cr."</span></h4>";
			for($i=1;$i<=$page;$i++)
			{
				if ($page_cr!=$i) echo "<a href='QLBinhLuan.php?start=".$row_per_page*($i-1)."'><button type='button' class='btn btn-success'>".$i."</button></a>";
		 else echo "<button type='button' class='btn btn-success'>".$i."</button>";
			
			} 
		?>
    </div>
    
</div>
</body>
</html>
