<?php

function parseHost($httpurl)  {  
	$variable  = explode('.', $httpurl);
    $host = $variable[count($variable)-2].'.'.$variable[count($variable)-1];
    return $host;
}  

function get_rand( $length = 8 ) { 
	// 密码字符集，可任意添加你需要的字符 
	$chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'; 
	$password = ''; 
	for ( $i = 0; $i < $length; $i++ ) { 
		$password .= $chars[ mt_rand(0, strlen($chars) - 1) ]; 
	} 
	return $password; 
} 

?>