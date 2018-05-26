<?php

if (isset($_POST['d']) || isset($_POST['k'])) {
	include_once 'dbclass.php';
	$db = new db();
	if (isset($_POST['d'])) {
		$db->add_domian($_POST['d']);
	}
	if (isset($_POST['k'])) {
		$db->add_key($_POST['k']);
	}
}else{
	echo 1;
}


?>


<!DOCTYPE html>
<html>
<head>
	<title>上传</title>
	<meta charset="utf-8">
</head>
<body>
<form action="" method="post">
	<b>上传域名</b><p>上传格式 ：  域名----关键词</p><br />
	<textarea name="d" style="width: 400px;height: 200px;"></textarea>
	<button type="submit">提交</button>
</form>
<form action="" method="post"><br />
	<b>上传关键词</b><p>上传格式：一行一个，以换行符分开</p>
	<textarea name="k" style="width: 400px;height: 200px;"></textarea>
	<button type="submit">提交</button>
</form>
</body>
</html>