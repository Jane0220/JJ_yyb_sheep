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
	<link href="css/upload.css" rel="stylesheet">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	  <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>

<body>

<?php include_once('common_header'); ?>

<div class="uploadarea">
	<a class="btn btn-default" href="push.php" role="button">直接去推送</a>
	<div class="clearfix">
		<div class="folder_wrap">
			<p>已存在的文件夹</p>
			<ul id="J_folder_list">
<!--				<li>11111111111111111111111111111111111111</li>
				<li>2</li>
				<li>3</li>
				<li>4</li>
				<li>5</li>-->
			</ul>
		</div>
		<div class="upload_wrap">
			<div id="J_select_upload">
				<form class="form-post">
					<ul>
						<li>
							<label>新建文件夹的名字：（请不要与现有文件夹名字重复）</label>
							<input type="text" class="form-control" id="J_title_input" value="" autocomplete="off" required autofocus />
						</li>
						<li>
							<label>请选择文件：</label>
							<div class="upload_box">
								<a class="btn btn-default">选择文件</a>
								<input type="file" accept="image/*" multiple="multiple" id="J_file_input" />
							</div>
						</li>
					</ul>
					<button class="btn btn-primary" type="submit" id="J_submit_btn">上传</button>
				</form>
			</div>
			<div class="hide" id="J_upload_result">
				<div class="thumb_box">
<!--					<img src="temp/1.png" />
					<img src="temp/2.png" />
					<img src="temp/3.png" />
					<img src="temp/4.png" />
					<img src="temp/5.png" />
					<img src="temp/6.gif" />
					<img src="temp/7.gif" />
					<img src="temp/8.gif" />
					<img src="temp/9.jpg" />-->
				</div>
				<label>图片地址如下：</label>
				<div class="thumb_url">
<!--					12/1.png<br>
					12/2.png<br>
					12/3.png<br>
					12/4.png<br>
					12/5.png<br>
					12/6.gif<br>
					12/7.gif<br>
					12/8.gif<br>
					12/9.jpg-->
				</div>
				<div class="btn_box">
					<a class="btn btn-default" href="push.php" role="button">去推送</a>
					<a class="btn btn-default" href="javascript:;" role="button">再次上传</a>
				</div>
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
function get_folder_list(){
	showLoading('正在加载中，请稍候...');
	$.ajax({
		type: 'POST',
		url: 'list_exist_folder.php',
		dataType: "json",
		success:function(data){
			hideLoading();
			if(data.code == 1 || data.code == '1'){
				for(var data_i in data.data){
					$('#J_folder_list').append('<li>'+data.data[data_i]+'</li>');
				}
			}else{
				showAlert('获取现有文件夹列表失败，请重试！');
				setTimeout(hideAlert,2000);
			}
		},
		error:function(){
			hideLoading();
			showAlert('获取现有文件夹列表失败，请重试！');
			setTimeout(hideAlert,2000);
		}
	});
}
$(document).ready(function(){
	get_folder_list();
});
</script>
</body>
</html>
