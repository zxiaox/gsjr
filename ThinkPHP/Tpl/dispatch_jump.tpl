<!DOCTYPE html><!--Yes,I do!-->
<html>
<head>
<meta charset="utf8" />
<meta name="baidu-site-verification" content="d3YbKlTePv" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" type="image/x-icon" href="{$url}favicon.ico">
<title>跳转提示_APP留有益_APP推荐_app621.com</title>
<meta name="keywords" content="app留有益 最新app app推荐 app排行2015 发现新app"/>
<meta name="description" content="app留有益是一个app共享社区，在这里你可以分享你的app，也可以发现其他精彩app。一切尽在app621.com">
<link rel="stylesheet" type="text/css" href="{$url}Common/c/app621.css" />
<link rel="stylesheet" type="text/css" href="{$url}Common/c/app621ani.css" /> 
<style type="text/css">
*{ padding: 0; margin: 0; }
body{ background: #fff; font-family: '微软雅黑'; color: #333; font-size: 16px; }
.system-message{ padding: 24px 48px; }
.system-message h1{ font-size: 100px; font-weight: normal; line-height: 120px; margin-bottom: 12px; }
.system-message .jump{ padding-top: 10px}
.system-message .jump a{ color: #333;}
.system-message .success,.system-message .error{ line-height: 1.8em; font-size: 36px }
.system-message .detail{ font-size: 12px; line-height: 20px; margin-top: 12px; display:none}
</style>
</head>
<body>
<div style="display:none;">
<img src="{$url}Common/i/wx621.png" />
</div>

<div id="header">
	<div class="wrapper">
		<a class="app621root" href="/">app621.com</a>
		<a class="app621desc">APP留有益</a>
		<div class="logo pacman">
			<div></div>
			<div></div>
			<div>A</div>
			<div>P</div>
			<div>P</div>
		</div>
	</div>
</div>

<div class="system-message">
<present name="message">

<p class="success"><?php echo($message); ?></p>
<else/>

<p class="error"><?php echo($error); ?></p>
</present>
<p class="detail"></p>
<p class="jump">
页面自动 <a id="href" href="<?php echo($jumpUrl); ?>">跳转</a> 等待时间： <b id="wait"><?php echo($waitSecond); ?></b>
</p>
</div>
<script type="text/javascript">
(function(){
var wait = document.getElementById('wait'),href = document.getElementById('href').href;
var interval = setInterval(function(){
	var time = --wait.innerHTML;
	if(time <= 0) {
		location.href = href;
		clearInterval(interval);
	};
}, 1000);
})();
</script>
<div id="foot">
	<div class="declare">APP留有益(app621.com)专业APP推荐,精选最有价值的APP应用,欢迎下载。<br />
应用作品版权归原作者享有，如无意之中侵犯了您的版权，请联系我们，APP621将应您的要求删除。<br /><br />粤ICP备15112697号</div>
	<div id="copyright">Copyright © 2015 - 2016 app621.com</div>
</div>
</body>
</html>