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
	<link href="css/preview.css" rel="stylesheet">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	  <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>

<body>

<?php include_once('common_header.php'); ?>

<div class="myarea clearfix">
	<div class="preview_area" id="J_preview_area">
	</div>
	
	<div class="content_area">
		<form class="form-post" action="demo.php" type="POST">
			<ul>
				<li>
					<p>标题</p>
					<input type="text" class="form-control" id="J_title_input" value="" autocomplete="off" required autofocus />
				</li>
				<li>
					<p>作者</p>
					<input type="text" class="form-control" id="J_author_input" value="大象册" required />
				</li>
				<li>
					<p>内容</p>
					<textarea class="form-control" id="J_content_input" autocomplete="off" required></textarea>
				</li>
			</ul>
			<div class="btn_box">
				<a class="btn btn-default" href="upload.php" role="button">回到传文件</a>
				<a class="btn btn-default" href="javascript:;" role="button" id="J_preview_btn">查看</a>
				<button class="btn btn-primary" type="submit" id="J_submit_btn">提交</button>
			</div>
		</form>
	</div>
</div>
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="http://libs.baidu.com/jquery/1.9.0/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/core.js"></script>
<script>
$('#J_preview_btn').click(function(){
	$('#J_preview_area').html($('#J_content_input').val());
});
</script>
</body>
</html>
