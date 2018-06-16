<?php
include_once 'dbclass.php';
header('Content-type: text/html; charset=utf-8');
set_time_limit(0);
session_write_close();
for($i = 0 ; $i < 10000 ;$i ++){
	$ss = file_get_contents('http://api.jisuapi.com/news/get?channel=头条&start='.$i.'&num=1&appkey=979330f4d34cfc55');
	$ss = json_decode($ss);
	$s1 = $ss->result;
	$s2 = $s1->list;
	$s3 = $s2[0]->content;
	$s4 = rep($s3);
	$db = new db();
	$res = $db->insert_page($s4);
	echo $res;
}

function rep($str){
	$str = preg_replace("/<.*?>/", '', $str);
	return $str;
}
?>