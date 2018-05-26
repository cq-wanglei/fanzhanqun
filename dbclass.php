<?php

/**
* 
*/
class db{
	//链接数据库句柄
	private $con;
	/*
		初始化链接数据库
	*/
	public function __construct(){
		$this->con = mysqli_connect('127.0.0.1','root','root','fanzhan') or die("连接失败！！") ;
		$sql = "set names utf8";
		$res = mysqli_query($this->con,$sql);
	}
	/*
		执行数据库
	*/
	public function my_exec($sql){
		$res = mysqli_query($this->con,$sql);
		return $res;
	}
	/*
		查询域名是否存在
	*/
	public function yuming($domian){
		$domian = addslashes($domian);
		$sql = "select id from domian where domian = '$domian'";
		$res = $this->my_exec($sql);
		if ($res->num_rows > 0) {
			$row = mysqli_fetch_row($res);
			return $row[0];
		}else{
			return 0;
		}
	}
	
	/*
		获取关键词
	*/
	public function keyword($k){
		$sql = "select keyword from domian where id = $k";
		$res = $this->my_exec($sql);
		if ($res->num_rows > 0) {
			$row = mysqli_fetch_row($res);
			return $row[0];
		}else{
			return '';
		}
	}
	/*
		如果文章存在，取出文章！如果文章不存在，创建文章
	*/
	public function check($keyword){
		$keyword = addslashes($keyword);
		$sql = "select contents,relation,page_left,page_right from page where keyword = '$keyword'";
		$res = $this->my_exec($sql); 
		if ($res->num_rows > 0) {
			//文章存在
			$temps = mysqli_fetch_row($res);
			$data = array();
			$data['contents'] = $temps[0];
			$data['relation'] = json_decode($temps[1]);
			$data['left'] = $temps[2];
			$data['right'] = $temps[3];
			return $data;
		}else{
			//文章不存在
			$sql1 = "select content from contents order by rand() limit 10";
			$res1 = $this->my_exec($sql1);
			$juzi = array();
			while ($row = mysqli_fetch_row($res1)) {
				$temp = preg_split("/。|，|,|!/", $row[0]);
				foreach ($temp as $key => $value) {
					if ($value !== '') {
						array_push($juzi, $value);
					}
				}
			}
			$wenzhang = '';
			$shu = rand(20,100);
			for($i = 0 ;$i < $shu ;$i++){
				if ($wenzhang == '') {
					$wenzhang = $juzi[rand(0,count($juzi) - 1)];
				}else{
					$wenzhang = $wenzhang . '，'.$juzi[rand(0,count($juzi) - 1)];
				}
				
			}
			$domian = $_SERVER['SERVER_NAME'];
			$rand1 = rand(1,254);
			$rand2 = rand(1,254);
			$images = '<img src="http://xiaozhiping.cn/images/'.$rand1.'.jpg" tppabs="http://'.$domian.'/images/'.$rand1.'.jpg" alt="'.$keyword.'" >';
			$images = $images . '<img src="http://xiaozhiping.cn/images/'.$rand2.'.jpg" tppabs="http://'.$domian.'/images/'.$rand2.'.jpg" alt="'.$keyword.'" >';
			$wenzhang = $images.$wenzhang;
			$sql1 = "select gjc from gjc order by rand() limit 10";
			$res1 = $this->my_exec($sql1);
			$relation = array();
			while ($row = mysqli_fetch_row($res1)) {
				array_push($relation, $row[0]);
			}
			$left = $relation[rand(0,count($relation)-1)];
			$right = $relation[rand(0,count($relation)-1)];
			$relation = json_encode($relation,JSON_UNESCAPED_UNICODE);
			$sql = "insert into page(domian,keyword,contents,times,relation,page_left,page_right) values('$domian','$keyword','$wenzhang',date('Y-m-d H:i:s'),'$relation','$left','$right')";
			$res = $this->my_exec($sql);
			$data['contents'] = $wenzhang;
			$data['relation'] = json_decode($relation);
			$data['left'] = $left;
			$data['right'] = $right;
			return $data;
			
		}
	}
	/*
		首页随机链接
	*/
	public function home_url(){
		$sql = "select gjc from gjc order by rand() limit 1";
		$res = $this->my_exec($sql);
		$s = mysqli_fetch_row($res);
		return $s[0];
	}

	/*
		添加域名
	*/
	public function add_domian($all){
		echo $all;
		$fenge = explode("\r\n", $all);
		foreach ($fenge as $key => $value) {
			$fenge2 = explode("----", $value);
			$sql = "insert into domian(domian,keyword) values('$fenge2[0]','$fenge2[1]')";
			$res = $this->my_exec($sql);
			print_r($res);
		}
		
	}
	/*
		添加关键词
	*/
	public function add_key($keys){
		echo $keys;
		$fenge = explode("\r\n", $keys);
		foreach ($fenge as $key => $value) {
			$sql = "insert into gjc(gjc) values('$value')";
			$this->my_exec($sql);
		}
	}
	/*
		获取栏目
	*/
	public function get_lanmu($keyword){
		$keyword = addslashes($keyword);
		$sql = "select lanmu from gjc where gjc = '$keyword'";
		$res = $this->my_exec($sql);
		if ($res->num_rows > 0) {
			$row = mysqli_fetch_row($res);
			return $row[0];
		}else{
			$res = $this->baidu($keyword);
			$all = '';
			foreach ($res as $key => $value) {
				if ($key == count($res) - 1) {
					$all = $all . $value;
				}else{
					$all = $all . $value . '----';
				}
			}
			$sql = "insert into gjc(gjc,lanmu) values('$keyword','$all')";
			$this->my_exec($sql);
			return $all;
		}
	}
	/*
		百度搜索
	*/
	private	function baidu($word){
        $url = "http://www.baidu.com/s?wd=".$word;
        // 构造包头，模拟浏览器请求
        $header = array (
            "Host:www.baidu.com",
            "Content-Type:application/x-www-form-urlencoded",//post请求
            "Connection: keep-alive",
            'Referer:http://www.baidu.com',
            'User-Agent: Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.1; WOW64; Trident/5.0; BIDUBrowser 2.6)'
        );
        $ch = curl_init ();
        curl_setopt ( $ch, CURLOPT_URL, $url );
        curl_setopt ( $ch, CURLOPT_HTTPHEADER, $header );
        curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
        $content = curl_exec ( $ch );
        if ($content == FALSE) {
        echo "error:" . curl_error ( $ch );
        }
        curl_close ( $ch );
		$reg = "/<th><a href=\".*?\">(.*?)<\/a><\/th>/";
		preg_match_all($reg, $content, $res);
		$lanmu = $res[1];
        return $lanmu;
	}
	
	/*
		结束断开数据库
	*/
	public function _destruct(){
		mysqli_close($con);
	}


}









?>