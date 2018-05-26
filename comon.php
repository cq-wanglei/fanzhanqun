<?php

include_once 'dbclass.php';
$db = new db();
$domian = $_SERVER['SERVER_NAME'];

$sid = $db->yuming($domian);
if ($sid > 0) {
	$cen = explode('/', $_SERVER['REQUEST_URI']);
	if (isset($cen[1]) && $cen[1] !== '') {
		$keyword = urldecode($cen[1]);

	}else{
		$keyword = $db->keyword($sid);
	}

	if ($keyword == "images" || $keyword == "css" || $keyword == "js" || strstr($keyword, '.')) {
		header('HTTP/1.0 404 Not Found');die();
	}

	$lanmu = $db->get_lanmu($keyword);
	$lanmu_arr = explode('----', $lanmu);

	//检查文章，如果不存在 ，创建文章，如果存在 ，取出文章
	$res = $db->check($keyword);
	$content = $res['contents'];
	$left = $res['left'];
	$right = $res['right'];
	$list = $res['relation'];
}else{
	//404页面
	header('HTTP/1.0 404 Not Found');
	//echo $domian;
}





?>