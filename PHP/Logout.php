<?php
	session_start();
	if(array_key_exists('TenDN',$_SESSION))
	{
		$_SESSION['TenDN'] = null;
		$_SESSION['MatKhau'] = null;
		$_SESSION['MaPhanQuyen'] = null;

		session_destroy();
		header('Location: ../Index.php');
	}
?>