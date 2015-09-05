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
    	<p class="bg-primary" style="margin-right: 5px;margin-left: 5px;font-size: 30px;color:white;font-family: tahoma;text-align: center;border-radius:5px;padding-bottom: 5px;"> <b>Quản lý Bài viết/Bản tin</b> </p>
    </div>
    <div class="row">
    	<!-- Chèn giao diện để quản lý User -->	
        <div class="col-md-3">
        	<form name="frmLoc" method="post">
                <select class="form-control" name="slDanhMuc">
                	<option value='0'> Tất cả</option>
                    <?php	
                        require_once("../PHP/ConnectDB.php");
                        $conn = ConnectDB::connect();							
                        $sqlDM = "SELECT DISTINCT ID, TenDanhMuc FROM danhmuc";
                        $resutDM = mysqli_query($conn, $sqlDM);
                        if($resutDM->num_rows >0)
                        {
                            while ($rowMD = $resutDM->fetch_assoc())
                            {
								if(array_key_exists('slDanhMuc',$_POST))
								{
									if($_POST['slDanhMuc'] == $rowMD['ID'])
									{
										echo "<option value='".$rowMD['ID']."' selected> ".$rowMD['TenDanhMuc']."</option>";
									}
									else
									{
										echo "<option value='".$rowMD['ID']."'> ".$rowMD['TenDanhMuc']."</option>";
									}
								}
								else
								{
									 echo "<option value='".$rowMD['ID']."'> ".$rowMD['TenDanhMuc']."</option>";
								}
                            }
                        }
                         ConnectDB::disconnect();
                    ?>
                </select>
		</div>
		<div class="col-md-2">
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
                	<button type="submit" class="btn btn-info" name="submit">Lọc Bài viết</button>
                </div>
            </form>
        <div class="col-md-4" align="right">
        <p><a href="BaiViet_Tao.php"><input type="button" value="Đăng bài viết/Bản tin mới"/></a> </p>
        </div>
	</div>
    <div class="row col-lg-8" align="left" style="margin-bottom:15px">
       	<form name="frmTimKiem" method="post">
	        <div class="input-group">
            	<?php
					if(array_key_exists('txtTimKiem',$_POST))
					{
						echo "<input type='text' class='form-control' placeholder='Tìm kiếm theo tiêu đề hoặc nội dung' name='txtTimKiem' value='".$_POST['txtTimKiem']."'>";
					}
					else
						echo "<input type='text' class='form-control' placeholder='Tìm kiếm theo tiêu đề hoặc nội dung' name='txtTimKiem'>";
					
				?>
				<!--<input type="text" class="form-control" placeholder="Tìm kiếm theo tiêu đề" name="txtTimKiem">-->
                <span class="input-group-btn">
                    <button class="btn btn-default" type="submit" name="TimKiem">Tìm kiếm!</button>
                </span>
			</div>
		</form>
    </div>
	<div class="row" align="center">
        <table class="table table-condensed">
        <tr>
            <th class="info" >ID</th>
            <th class="info" >Tiêu đề</th>
			<th class="info" >Tóm tắt</th>
            <th class="info" >Hình ảnh</th>
            <th class="info" >Người đăng</th>
			<th class="info" >Danh mục</th>
            <th class="info" >Kiểm duyệt</th>
            <th class="info" >Ngày dăng</th>
            <th class="info" >Tác vụ</th>
        </tr>
        <?php
            require_once("../PHP/ConnectDB.php");
            $conn = ConnectDB::connect();
        
            $sql = "SELECT A.ID, TieuDe, TomTat, HinhAnh, TenDN, TenDanhMuc, KiemDuyet, NgayDang FROM baiviet AS A INNER JOIN DanhMuc AS B ON A.IDDanhMuc = B.ID ORDER BY A.ID DESC";

			if(array_key_exists('slDanhMuc', $_POST) && array_key_exists('slKiemDuyet',$_POST))
			{
				//Truong hop chi co Danh muc
				if($_POST['slDanhMuc']!='0' && $_POST['slKiemDuyet'] == '2')
				{
					$sql = "SELECT A.ID, TieuDe, TomTat, HinhAnh, TenDN, TenDanhMuc, KiemDuyet, NgayDang FROM baiviet AS A INNER JOIN DanhMuc AS B ON A.IDDanhMuc = B.ID WHERE A.IDDanhMuc = ". $_POST['slDanhMuc']." ORDER BY A.ID DESC";
				}
				//Truong hop chi co Kiem duyet
				else if ($_POST['slDanhMuc'] == '0' && $_POST['slKiemDuyet'] != '2')
				{
					$sql = "SELECT A.ID, TieuDe, TomTat, HinhAnh, TenDN, TenDanhMuc, KiemDuyet, NgayDang FROM baiviet AS A INNER JOIN DanhMuc AS B ON A.IDDanhMuc = B.ID WHERE KiemDuyet = ". $_POST['slKiemDuyet']." ORDER BY A.ID DESC";

				}
				//Truong hop co Danh muc va Kiem duyet
				else
				{
					$sql = "SELECT A.ID, TieuDe, TomTat, HinhAnh, TenDN, TenDanhMuc, KiemDuyet, NgayDang FROM baiviet AS A INNER JOIN DanhMuc AS B ON A.IDDanhMuc = B.ID WHERE A.IDDanhMuc = ". $_POST['slDanhMuc'] ." AND KiemDuyet = ". $_POST['slKiemDuyet']." ORDER BY A.ID DESC";
				}
				//Truong hop khong co Danh muc va Kiem duyet
				if($_POST['slDanhMuc']=='0' && $_POST['slKiemDuyet'] == '2')
				{
					$sql = "SELECT A.ID, TieuDe, TomTat, HinhAnh, TenDN, TenDanhMuc, KiemDuyet, NgayDang FROM baiviet AS A INNER JOIN DanhMuc AS B ON A.IDDanhMuc = B.ID ORDER BY A.ID DESC";
				}
			}
			$ChuoiTimKiem = "%";
			if(array_key_exists('txtTimKiem', $_POST))
			{
				$Arr =explode(' ',$_POST['txtTimKiem']);
				$i = 0;
				while($i < count($Arr))
				{
					$ChuoiTimKiem .=$Arr[$i]."%";
					$i++;
				}
				$sql = "SELECT A.ID, TieuDe, TomTat, HinhAnh, TenDN, TenDanhMuc, KiemDuyet, NgayDang FROM baiviet AS A INNER JOIN DanhMuc AS B ON A.IDDanhMuc = B.ID WHERE TieuDe like '".$_POST['txtTimKiem']."' UNION 
						SELECT A.ID, TieuDe, TomTat, HinhAnh, TenDN, TenDanhMuc, KiemDuyet, NgayDang FROM baiviet AS A INNER JOIN DanhMuc AS B ON A.IDDanhMuc = B.ID WHERE TieuDe like '%".$_POST['txtTimKiem']."%' UNION 
						SELECT A.ID, TieuDe, TomTat, HinhAnh, TenDN, TenDanhMuc, KiemDuyet, NgayDang FROM baiviet AS A INNER JOIN DanhMuc AS B ON A.IDDanhMuc = B.ID WHERE TieuDe like '".$ChuoiTimKiem."' UNION 
						SELECT A.ID, TieuDe, TomTat, HinhAnh, TenDN, TenDanhMuc, KiemDuyet, NgayDang FROM baiviet AS A INNER JOIN DanhMuc AS B ON A.IDDanhMuc = B.ID WHERE NoiDung like '".$_POST['txtTimKiem']."' UNION 
						SELECT A.ID, TieuDe, TomTat, HinhAnh, TenDN, TenDanhMuc, KiemDuyet, NgayDang FROM baiviet AS A INNER JOIN DanhMuc AS B ON A.IDDanhMuc = B.ID WHERE NoiDung like '%".$_POST['txtTimKiem']."%' UNION 
						SELECT A.ID, TieuDe, TomTat, HinhAnh, TenDN, TenDanhMuc, KiemDuyet, NgayDang FROM baiviet AS A INNER JOIN DanhMuc AS B ON A.IDDanhMuc = B.ID WHERE NoiDung like '".$ChuoiTimKiem."' "; 
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
						echo "<td>". $row['TomTat'] ."</td>";
						echo "<td><img class='imgSlide' src='".BASE_URL."img/". $row['HinhAnh'] ."'></td>";
						echo "<td>". $row['TenDN'] ."</td>";
						echo "<td>". $row['TenDanhMuc'] ."</td>";
						echo "<td>". $row['KiemDuyet'] ."</td>";
						echo "<td>". $row['NgayDang'] ."</td>";
                        echo "<td>
							<a href='BaiViet_Doc.php?ID=".$row['ID']."'><input type='button' value='Xem' class='btn btn-default'/></a>
							<a href='BaiViet_Sua.php?ID=".$row['ID']."'><input type='button' value='Sửa' class='btn btn-success'/></a>
							<a href='BaiViet_Xoa.php?ID=".$row['ID']."'> <input type='button' value='Xóa' class='btn btn-danger'/> </a>";
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
				if ($page_cr!=$i) echo "<a href='QLBaiViet.php?start=".$row_per_page*($i-1)."'><button type='button' class='btn btn-success'>".$i."</button></a>";
		 else echo "<button type='button' class='btn btn-success'>".$i."</button>";
			
			} 
		?>
    </div>
    
</div>
</body>
</html>
