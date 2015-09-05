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
    	<p class="bg-primary" style="margin-right: 5px;margin-left: 5px;font-size: 30px;color:white;font-family: tahoma;text-align: center;border-radius:5px;padding-bottom: 5px;"> <b>Quản trị Video Clip</b> </p>
    </div>
    <div class="row">
    	<!-- Chèn giao diện để quản lý User -->	
        <div class="col-md-3">
        	<p><a href="Video_Tao.php"><input type="button" value="Chèn Video Clip"/></a> </p>
        </div>        
	</div>
	<div class="row" align="center">
        <table class="table table-condensed" width="50%">
        <tr>
            <th class="info">ID</th>
            <th class="info">Link</th>
            <th class="info">Tác vụ</th>
        </tr>
        <?php
            require_once("../PHP/ConnectDB.php");
            $conn = ConnectDB::connect();
						
            $sql = "SELECT * FROM Video ORDER BY ID DESC";
			
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
                        echo "<th>". $row['ID'] ."</th>";
                        echo "<td>". $row['Link'] ."</td>";
                        echo "<td> 
                            <a href='Video_Xoa.php?ID=".$row['ID']."'> <input type='button' value='Xóa' class='btn btn-danger'/> </a>
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
		 if ($page_cr!=$i) echo "<a href='QLVideoClip.php?start=".$row_per_page*($i-1)."'><button type='button' class='btn btn-success'>".$i."</button></a>";
		 else echo "<button type='button' class='btn btn-success'>".$i."</button>";
		
		} 
		?>
    </div> 
</div>
</body>
</html>
