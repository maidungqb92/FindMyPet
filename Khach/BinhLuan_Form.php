<?php
    include('../PHP/ConnectDB.php');
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $IDBinhLuan = $_POST['IDBinhLuan'];
        mysql_query("INSERT INTO binhluan SET IDBinhLuan = '$IDBinhLuan',
                            NoiDung = '".mysql_escape_string($_POST['NoiDung'])."',
                            TenDN = '".mysql_escape_string($_POST['TenDN'])."',
                            Ho = '".mysql_escape_string($_POST['Ho'])."',
                            Ten = '".mysql_escape_string($_POST['Ten'])."',
                            Email = '".mysql_escape_string($_POST['Email'])."',
                            SoDienThoai = '".mysql_escape_string($_POST['SoDienThoai'])."',
                            NgayBinhLuan = NOW()"                       
                            );
        header("location:".$_SERVER['PHP_SELF']."?IDBinhLuan = $IDBinhLuan");
        exit;
    }
    else
    {
        $IDBinhLuan = $_GET['IDBinhLuan'];
    }
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html" />
	<meta name="author" content="lolkittens" />

	<title>Untitled 1</title>
</head>
<style type="text/css">
<!--
	.commentbox header h1 {
	float: left;
	height: 30px;
	margin-right: 5px;
	text-transform: uppercase;
	}

	.commentbox .form {
		float: left;
		width: 50%;
		padding: 0 0;
		border: 1px solid #dadada;
		border-top: 2px solid #888;
		box-shadow: 0 2px 0px #f7f7f7;
	}

	.commentbox .form p {
		float: left;
		width: 60%;
		padding: 10px 10px;
		border-bottom: 1px solid #eee;
		width: 50%;
	}


	.commentbox .form p.content {
		width: 90%;
		border: 0;
		position: relative;
	}
	.commentbox .form p.content label strong {
		color: #009CCE;
	}
	.commentbox .form label {
		display: inline-block;
		font-family: 'Roboto Condensed', sans-serif;
		text-transform: uppercase;
		color: #555;
		margin-right: 10px;
		font-size: 1.1em;
	}

	.commentbox .form textarea,
	.commentbox > form input {
		width: 70%;
		border: 1px solid #aaa;
		border-radius: 3px;
		padding: 5px 5px;
		display: inline-block;
		font-family: Arial, Helvetica, sans-serif;
	}

	.commentbox .form textarea {
		width: 100%;
		height: 100px;
		margin-top: 10px;
	}
	.commentbox .form .note {
		display: block;
		float: none;
		width: 100%;
		margin-top: 10px;
		padding: 10px;
		margin-bottom: 10px;
		line-height: 15px;
	}

	.commentbox .form .note span {
		display: inline-block;
		margin: 0 10px;
		opacity: 0.5;
		line-height: 15px;
	}

	.commentbox .form .note span:before {
		content: ' ';
		background: #ccc;
		color: #fff;
		text-align: center;
		display: inline-block;
		width: 8px;
		height: 8px;
		line-height: 15px;
		margin-right: 5px;
	}
	.commentbox .form .btnSubmit {
		display: block;
		float: left;
		border: 1px solid #aaa;
		border-radius: 5px;
		box-shadow: 0 2px 0px #f7f7f7;
		padding: 5px 10px;
		margin: 0 10px 10px;
		cursor: pointer;
		background: -webkit-gradient(linear, left top, left bottom, from(#ffffff), to(#f5f5f5));
		background: -moz-linear-gradient(top, #ffffff, #f5f5f5);
		background: -ms-linear-gradient(top, #ffffff, #f5f5f5);
		background: -o-linear-gradient(top, #ffffff, #f5f5f5);
		background: linear-gradient(top, #ffffff, #f5f5f5);
	}

-->
</style>
<body>
<div class="commentbox">  
    <head>
        <h1>Bình luận</h1>
    </head>
    <div class="form">
        <p class="content">
            <label>Nội dung</label>
            <textarea title="Nội dung bình luận của bạn..." placeholder="Nội dung bình luận của bạn..."></textarea>
        </p>
        <p class="note">
            <span class="length">Tối thiểu 10 chữ</span> 
            <span class="vietnamese">Tiếng Việt có dấu</span> 
            <span class="link">Không chứa liên kết</span> 
        </p>
        <input class="btnSubmit disabled" type="submit" name="submit" value="Gửi bình luận"/>
    </div>
</div>  
</body>
</html>