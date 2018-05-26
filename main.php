<?php

include_once 'functions.php';
include_once 'comon.php';


?>
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title><?php echo $keyword; ?></title>
<meta name="robots" content="all">
<meta name="keywords" content="<?php echo $keyword; ?>">
<meta name="description" content="请狼友们记住新域名:<?php echo $domian; ?>!<?php echo $keyword; ?>紧急通知:本站老域名全部失效,请用户记下新域名访问本站,拿笔记好。浏览器如果没有自动进入本站-点击这里进入本站">
<link type="text/css" rel="stylesheet" href="http://<?php echo $domian; ?>/index/style.css" tppabs="css/style.css">
<!-- <script src="js/fc.js" tppabs="http://<?php echo $domian; ?>/js/fc.js"></script> -->
</head>
<body>

<div class="nav_bar">

	<div class="wrap">
		<span class="domain">
			<div id="logo"><?php echo $domian; ?></div>
		</span>
		
		
		<div class="nav_bar_r">
			<font color="#ffffff" size="4"><?php echo $keyword; ?></font>
			<font size="4" color="#ffffff">转发给您的好友</font>&nbsp;&nbsp;|&nbsp;&nbsp;<font size="4">請使用Ctrl+D進行收藏本站</font>&nbsp;&nbsp;
		</div>
	</div>
	
</div>
<div id="top_box">
<div style="width: 80%;height: 50px;">
	<nav class="lanmu">
	<?php 
		foreach ($lanmu_arr as $key => $value) {
			echo '<h2><a href="'.$value.'"></a></h2>
			'; 
		}
	?>
	</nav>

</div>

<div class="wrap mt20">
	<div class="box cat_pos clearfix">
		<span class="cat_pos_l">您的位置：<a href="http://<?php echo $domian; ?>/" tppabs="http://<?php echo $domian; ?>/">首页</a>&nbsp;&nbsp;&#187;&nbsp;&nbsp;<a href="" tppabs="http://<?php echo $domian; ?>/<?php echo $keyword; ?>"><?php echo $keyword; ?></a></span></div>
</div>
<div class="wrap mt20">
	<div class="box pic_text">  
		<div class="page_title"><?php echo $keyword; ?></div>
		<div class="content">
		<center>	
		<div id="postmessage" class="t_msgfont">	

		<p class="b_snippet">  
		<?php
			echo $content;
		?>

		</center>
		</div>
		<div id="pic_text_bottom">
			<div class="pic_text_box">

			</div>
		</div>
			
		<ul><span><em>上一篇: <a href="<?php echo $left; ?>" tppabs="http://<?php echo $domian; ?>/<?php echo $left; ?>" target="_blank"><?php echo $left; ?></a></em> </span> <span><em>下一篇:<a href="<?php echo $right; ?>" tppabs="http://<?php echo $domian; ?>/<?php echo $right; ?>" target="_blank"><?php echo $right; ?></a></em> </span></ul>
	</div>
</div>
<div id="top_box">


<div class="wrap mt20 clearfix">
	<div class="box top_box">
			<ul>

			<?php

			foreach ($list as $key => $value) {

				if ($key < count($list) - 3) {
					echo '
					<li>
						<a href="'.$value.'" tppabs="http://'.$domian.'/'.$value.'" target="_blank">'.$value.'</a>
					</li>
					';
				}else{
					echo '<li>
						<a href="http://'.get_rand(rand(3,5)).'.'.parseHost($domian).'/'.$value.'" tppabs="http://'.get_rand(rand(3,5)).'.'.parseHost($domian).'/'.$value.'" target="_blank">'.$value.'</a>
					</li>';
				}
				
			}

			?>
	
</ul>
				
		</div>
	</div>
</div>
<div id="footer_box">
	<div class="wrap">
      <p align="center">收藏本站永久网址:<font color="#ff0000"><?php echo $domian; ?></font>请使用Ctrl+D进行收藏。</p>
      <p>友情提示：请勿长时间观看影视，注意保护视力并预防近视，合理安排时间，享受健康生活。</p>
      <p>版权声明：本网站为非赢利性站点，本网站所有内容均来源于互联网相关站点自动搜索采集信息，相关链接已经注明来源。</p>
      <p>激情综合站：<?php echo $keyword; ?>  为海外华人服务,提供综合信息，免费的综合精彩内容。</p>
      <p>站点申明：本站内容均收集于互联网，网站在美国进行维护，受美国法律保护。本站无意侵犯任何国家的宪法，如果当地法令禁止进入，请马上离开！</p>
	</div>
</div>


</div></body></html>