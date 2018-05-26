<?php
  include_once 'dbclass.php';
  $domian = $_SERVER['SERVER_NAME'];
  $db = new db();
  $sid = $db->yuming($domian);
  $home_url = $db->home_url();
  $keyword = $db->keyword($sid);
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=0.5, maximum-scale=2.0, user-scalable=yes">
<title><?php echo $keyword;?></title>
<meta name="keywords" content="<?php echo $keyword;?>" />
<meta name="description" content="<?php echo $keyword;?>" />
<meta http-equiv="Cache-Control" content="no-transform" />
<meta http-equiv="Cache-Control" content="no-siteapp">
<link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
<script>
var _hmt = window._hmt || [];
   (function(){
var hm = document.createElement("script");
hm.src = "https://hm.baidu.com/hm.js?92a844e2f874e66e209e3fbf177e776f";
var s = document.getElementsByTagName("script")[0]; 
s.parentNode.insertBefore(hm, s);
 var bp = document.createElement('script');
var curProtocol = window.location.protocol.split(':')[0];
if (curProtocol === 'https') {
 bp.src = 'https://zz.bdstatic.com/linksubmit/push.js';
        }
else {
 bp.src = ' http://push.zhanzhang.baidu.com/push.js ';
}
var s = document.getElementsByTagName("script")[0];
s.parentNode.insertBefore(bp, s);
       var canonicalURL, curProtocol;
       //Get protocol
       if (!canonicalURL){
           curProtocol = window.location.protocol.split(':')[0];
       }
       else{
           curProtocol = canonicalURL.split(':')[0];
       }
       //Get current URL if the canonical URL does not exist
       if (!canonicalURL) canonicalURL = window.location.href;
       //Assign script content. Replace current URL with the canonical URL
       !function(){var e=/([http|https]:\/\/[a-zA-Z0-9_.]+.baidu.com)/gi,r=canonicalURL,t=document.referrer;if(!e.test(r)){var n=(String(curProtocol).toLowerCase() === 'https')?"https://sp0.baidu.com/9_Q4simg2RQJ8t7jm9iCKT-xh_/s.gif":"//api.share.baidu.com/s.gif";t?(n+="?r="+encodeURIComponent(document.referrer),r&&(n+="&l="+r)):r&&(n+="?l="+r);var i=new Image;i.src=n}}(window);})();
</script>
<style type="text/css">
body {
	background-color: #333;
	text-align: center;
	color: #FF0;
}
</style>
<script> 
document.oncontextmenu=new Function("return false") 
document.onselectstart=new Function("return false") 
</script> 
<script src="/home.js"></script>
</head>
<body>
請狼友們記住新域名：<?php echo $domian;?><br />緊急通知：本站老域名全部失效，請用戶記下新域名訪問本站，拿筆記好。。


<p align="center">
  <a href="<?php echo $home_url;?>" target="_blank">
    <img border="0" width="160" src="http://xiaozhiping.cn/images/<?php echo rand(1,254); ?>.jpg"> 
    <img border="0" width="160" src="http://xiaozhiping.cn/images/<?php echo rand(1,254); ?>.jpg"> 
    <img border="0" width="160" src="http://xiaozhiping.cn/images/<?php echo rand(1,254); ?>.jpg"> 
    <img border="0" width="160" src="http://xiaozhiping.cn/images/<?php echo rand(1,254); ?>.jpg">
  </a>
</p>
<p align="center">
  <a href="<?php echo $home_url;?>" target="_blank">
    <img src="/images/01.png" width="198" height="45"  alt="">
  </a>
  <a href="<?php echo $home_url;?>" target="_blank">
    <img src="/images/02.png" width="198" height="45"  alt="">
  </a>
</p><br>
<p align="center">请记住地址发布站</p>
<div style="display:none">
</div>
<p align="center">
The content of this website may be offensive; can not be the content of the<br>site A circulated for sale, rental, or lent to persons under the age of 18 show, broadcast or broadcast.

</p>
<p align="center">
<br>
友情链接：
<a href="http://<?php echo $domian;?>"/><?php echo $keyword;?></a>&nbsp;&nbsp;
</p>

<div style='display:none'>
<script src="/tj.js"></script>
</div>
</body>
</html>