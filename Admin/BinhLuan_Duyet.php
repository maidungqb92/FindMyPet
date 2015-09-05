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
	if(array_key_exists('ID',$_GET))
	{
		require_once("../PHP/ConnectDB.php");
		$conn = ConnectDB::connect();
	
		// Insert co so du lieu
		$sql = "UPDATE BinhLuan SET KiemDuyet=".DA_KIEM_DUYET." WHERE ID = ".$_GET['ID'];
		if($conn->query($sql) === TRUE)
		{
			echo "Nhap du lieu thanh cong";
			ConnectDB::disconnect();
			header('Location: QLBinhLuan.php');
		}
		else
		{
			echo "Nhap du lieu Loi";
		}
		ConnectDB::disconnect();
	}

?>