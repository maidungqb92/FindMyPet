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
    	<p class="bg-primary" style="margin-right: 5px;margin-left: 5px;font-size: 30px;color:white;font-family: tahoma;text-align: center;border-radius:5px;padding-bottom: 5px;"> <b>Quản trị Tài khoản</b> </p>
    </div>
    <div class="row">
    	<!-- Chèn giao diện để quản lý User -->	
        <div class="col-md-3">
        	<form name="frmLoc" method="post">
                <select class="form-control" name="slPhanQuyen">
                	<option value='0'> Tất cả</option>;
                    <?php	
                        require_once("../PHP/ConnectDB.php");
                        $conn = ConnectDB::connect();							
                        $sqlDM = "SELECT MaPhanQuyen, MoTa FROM PhanQuyen";
                        $resutDM = mysqli_query($conn, $sqlDM);
                        if($resutDM->num_rows >0)
                        {
                            while ($rowMD = $resutDM->fetch_assoc())
                            {
								if(array_key_exists('slPhanQuyen',$_POST))
								{
									if($_POST['slPhanQuyen'] == $rowMD['MaPhanQuyen'])
									{
										echo "<option value='".$rowMD['MaPhanQuyen']."' selected> ".$rowMD['MoTa']."</option>";
									}
									else
									{
										echo "<option value='".$rowMD['MaPhanQuyen']."'> ".$rowMD['MoTa']."</option>";
									}
								}
								else
								{
									 echo "<option value='".$rowMD['MaPhanQuyen']."'> ".$rowMD['MoTa']."</option>";
								}
                            }
                        }
                         ConnectDB::disconnect();
                    ?>
                </select>
		</div>
                <div class="col-md-3" align="left">
                	<button type="submit" class="btn btn-info" name="submit">Lọc tài khoản</button>
                </div>
            </form>
        
        <div class="col-md-6" align="right">
        <p><a href="TaiKhoan_Tao.php"><input type="button" value="Tạo tài khoản mới"/></a> </p>
        </div>
	</div>
     <div class="row col-lg-8" align="left" style="margin-bottom:15px">
       	<form name="frmTimKiem" method="post">
	        <div class="input-group">
            	<?php
					if(array_key_exists('txtTimKiem',$_POST))
					{
						echo "<input type='text' class='form-control' placeholder='Tìm kiếm theo tên tài khoản' name='txtTimKiem' value='".$_POST['txtTimKiem']."'>";
					}
					else
						echo "<input type='text' class='form-control' placeholder='Tìm kiếm theo tên tài khoản' name='txtTimKiem'>";
					
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
            <th class="info" >Tên đăng nhập</th>
            <th class="info" >Phân quyền</th>
			<th class="info" >Họ</th>
            <th class="info" >Tên</th>
            <th class="info" >Email</th>
            <th class="info" >Địa chỉ</th>
            <th class="info" >Số điện thoại</th>
            <th class="info" >Tác vụ</th>
        </tr>
        <?php
            require_once("../PHP/ConnectDB.php");
            $conn = ConnectDB::connect();
			
            $sql = "SELECT TenDN, MoTa, Ho, Ten, Email, DiaChi, SoDienThoai FROM User AS A INNER JOIN PhanQuyen AS B ON A.MaPhanQuyen = B.MaPhanQuyen ORDER BY TenDN ASC";
			if(array_key_exists('slPhanQuyen', $_POST))
			{
				if($_POST['slPhanQuyen'] != 0)
				{
					$sql = "SELECT TenDN, MoTa, Ho, Ten, Email, DiaChi, SoDienThoai FROM User AS A INNER JOIN PhanQuyen AS B ON A.MaPhanQuyen = B.MaPhanQuyen WHERE A.MaPhanQuyen = ". $_POST['slPhanQuyen'] ." ORDER BY TenDN ASC";
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
				$sql = "SELECT TenDN, MoTa, Ho, Ten, Email, DiaChi, SoDienThoai FROM User AS A INNER JOIN PhanQuyen AS B ON A.MaPhanQuyen = B.MaPhanQuyen WHERE TenDN like '".$_POST['txtTimKiem']."' UNION 
						SELECT TenDN, MoTa, Ho, Ten, Email, DiaChi, SoDienThoai FROM User AS A INNER JOIN PhanQuyen AS B ON A.MaPhanQuyen = B.MaPhanQuyen WHERE TenDN like '%".$_POST['txtTimKiem']."%' UNION 
						SELECT TenDN, MoTa, Ho, Ten, Email, DiaChi, SoDienThoai FROM User AS A INNER JOIN PhanQuyen AS B ON A.MaPhanQuyen = B.MaPhanQuyen WHERE TenDN like '".$ChuoiTimKiem."'"; 
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
                        echo "<th>". $row['TenDN'] ."</th>";
                        echo "<td>". $row['MoTa'] ."</td>";
						echo "<td>". $row['Ho'] ."</td>";
						echo "<td>". $row['Ten'] ."</td>";
						echo "<td>". $row['Email'] ."</td>";
						echo "<td>". $row['DiaChi'] ."</td>";
						echo "<td>". $row['SoDienThoai'] ."</td>";
                        echo "<td> 
                            <a href='TaiKhoan_Sua.php?TenDN=".$row['TenDN']."'><input type='button' value='Sửa' class='btn btn-success'/></a>
                            <a href='TaiKhoan_Xoa.php?TenDN=".$row['TenDN']."'> <input type='button' value='Xóa' class='btn btn-danger'/> </a>
                            </td>";
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
		 if ($page_cr!=$i) echo "<a href='QLTaiKhoan.php?start=".$row_per_page*($i-1)."'><button type='button' class='btn btn-success'>".$i."</button></a>";
		 else echo "<button type='button' class='btn btn-success'>".$i."</button>";
		
		} 
		?>
    </div> 
</div>
</body>
</html>
