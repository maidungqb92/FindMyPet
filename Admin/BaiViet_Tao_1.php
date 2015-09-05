<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html" />
	<meta name="author" content="GallerySoft.info" />
    <script lang="javascript" src="../asset/ckeditor/ckeditor.js" type="text/javascript"></script>
	<title>Untitled 1</title>
</head>

<body>
<?php
        include("menu_Admin.php");
    ?>
<form method="post" action="" enctype="multipart/form-data">
    <textarea id="txt" name="content"></textarea>
</form>
<script lang="text/javascrip">CKEDITOR.replace("txt");</script>

</body>
</html>