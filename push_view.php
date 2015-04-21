<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
	<meta name="description" content="">
	<meta name="author" content="">
	<!--    <link rel="icon" href="../../favicon.ico">-->

	<title>应用宝推送后台</title>

	<!-- Bootstrap core CSS -->
	<link href="css/bootstrap.min.css" rel="stylesheet">

	<!-- Custom styles for this template -->
	<link href="css/base.css" rel="stylesheet">
	<link href="css/preview2.css" rel="stylesheet">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	  <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>

<body>

<?php include_once('common_header.php'); ?>

<div class="container-fluid">
	<div class="row" id="J_wrap">
		<div class="col-sm-3 col-md-2 sidebar">
			<ul class="nav nav-sidebar">
				<li><a href="upload.php">上传文件</a></li>
				<li class="active"><a href="push.php">发推送</a></li>
			</ul>
		</div>
		
		<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
			<p class="visible-xs fixed_nav_switch">
				<button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">菜单</button>
			</p>
			
			<div class="section section1" id="J_push_step1">
				<h1>Step1</h1>
				<ul>
					<li>
						<p>标题</p>
						<input type="text" class="form-control" id="J_title_input" value="" autocomplete="off" required autofocus />
					</li>
					<li>
						<p>作者</p>
						<input type="text" class="form-control" id="J_author_input" value="大象册" required />
					</li>
					<li class="thumb_li">
						<p>封面</p>
						<input type="text" class="form-control" id="J_thumb_input" value="" autocomplete="off" required autofocus />
					</li>
					<li>
						<p>内容</p>
						<textarea class="form-control" id="J_content_input" autocomplete="off" required></textarea>
					</li>
				</ul>
				<div class="btn_box">
					<a class="btn btn-default" href="javascript:;" role="button" id="J_preview_btn">查看</a>
				</div>
			</div>
			
			<div class="section section2 myhide" id="J_push_step2">
				<h1>Step2</h1>
				<div class="thumb_box">
					<p>封面图：</p>
					<img id="J_thumb_show" src="" />
				</div>
				<div class="preview_area" id="J_preview_area">
<!--					<div class="content">
						<h1>一句话证明你不是亲生的</h1>
						<p> 某群组发起了用一句话证明自己不是亲生的活动。<br>
						来看看网友们“狠心”的爸妈都说了什么。 </p>
						<img src="http://game.ppickup.com/smallgame/web/yyb/images/yyb1/1.jpg" />
						<p>哈哈哈哈，你确定狗粮可以吃吗？ </p>
						<img src="http://game.ppickup.com/smallgame/web/yyb/images/yyb1/2.jpg" />
						<img src="http://game.ppickup.com/smallgame/web/yyb/images/yyb1/3.jpg" />
						<img src="http://game.ppickup.com/smallgame/web/yyb/images/yyb1/4.jpg" />
						<p>这个网友的爸爸还真是喜欢开玩笑呢，呵呵！ </p>
						<img src="http://game.ppickup.com/smallgame/web/yyb/images/yyb1/5.jpg" />
						<img src="http://game.ppickup.com/smallgame/web/yyb/images/yyb1/6.jpg" />
						<img src="http://game.ppickup.com/smallgame/web/yyb/images/yyb1/7.jpg" />
						<p>这个百分之百不是亲妈吧。。。</p>
						<img src="http://game.ppickup.com/smallgame/web/yyb/images/yyb1/8.jpg" />
						<img src="http://game.ppickup.com/smallgame/web/yyb/images/yyb1/9.jpg" />
						<p> 哈哈哈，孩子怎么来的三大回答：1.厕所里生的 2.垃圾堆捡的 3.充话费送的<br><br>
						更多逗比照片，请下载大象册，加入逗比集中营（邀请码233233）查看~ </p>
					</div>-->
				</div>
				<div class="btn_box">
					<a class="btn btn-default" href="javascript:;" role="button" id="J_back_btn">修改</a>
					<a class="btn btn-default" href="javascript:;" role="button" id="J_push_btn">推送</a>
				</div>
			</div>
			
			<div class="section section3 myhide" id="J_push_result">
				<h1>Result
					<a class="btn btn-default" href="javascript:;" role="button" id="J_again_btn">推送更多</a>
				</h1>
				<p>
				</p>
			</div>
		</div>
	</div>
</div>
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="http://libs.baidu.com/jquery/1.9.0/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/core.js"></script>
<script>
// var thumb_domain = 'http://game.ppickup.com/smallgame/web/yyb/images/';
var thumb_domain = 'images/';
function reset(){
	$('#J_title_input').val('');
	$('#J_thumb_input').val('');
	$('#J_content_input').val('');
	$('#J_thumb_show').attr('src','');
	$('#J_preview_area').html('');
	$('#J_push_result p').html('');
}
$('#J_preview_btn').click(function(){
	if($.trim($('#J_title_input').val()).length == 0){
		showAlert('请填写标题！');
		setTimeout(hideAlert,2000);
	}else if($.trim($('#J_author_input').val()).length == 0){
		showAlert('请填写作者！');
		setTimeout(hideAlert,2000);
	}else if($.trim($('#J_thumb_input').val()).length == 0){
		showAlert('请填写封面地址！');
		setTimeout(hideAlert,2000);
	}else if($.trim($('#J_content_input').val()).length == 0){
		showAlert('请填写内容！');
		setTimeout(hideAlert,2000);
	}else{
		$('#J_thumb_show').attr('src',thumb_domain+$.trim($('#J_thumb_input').val()));
		$('#J_preview_area').html($.trim($('#J_content_input').val()));
		$('#J_push_step1').hide();
		$('#J_push_step2').show();
	}
});
$('#J_back_btn').click(function(){
	$('#J_push_step1').show();
	$('#J_push_step2').hide();
});
$('#J_push_btn').click(function(){
	showLoading();
	$.ajax({
		type: 'POST',
		url: 'demo.php',
		data: {title:$.trim($('#J_title_input').val()),thumb:$.trim($('#J_thumb_input').val()),author:$.trim($('#J_author_input').val()),content:$.trim($('#J_content_input').val())},
		dataType: "html",
		success:function(data){
			hideLoading();
			$('#J_push_result p').html(data);
			$('#J_push_result').show();
			$('#J_push_step2').hide();
		},
		error:function(){
			hideLoading();
			showAlert('未知故障，请联系开发人员！');
			setTimeout(hideAlert,2000);
		}
	});
});
$('#J_again_btn').click(function(){
	reset();
	$('#J_push_result').hide();
	$('#J_push_step1').show();
});
</script>
</body>
</html>
