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

<?php include_once('common_header.php'); ?>

<div class="uploadarea">
	<a class="btn btn-default" href="push.php" role="button">直接去推送</a>
	<div class="clearfix">
		<div class="folder_wrap">
			<p>已存在的文件夹</p>
			<ul id="J_folder_list">
			</ul>
		</div>
		<div class="upload_wrap">
			<div id="J_select_upload">
				<form class="form-post">
					<ul>
						<li>
							<label>新建文件夹的名字：（请不要与现有文件夹名字重复）</label>
							<input type="text" class="form-control" id="J_folder_input" value="" autocomplete="off" required autofocus />
						</li>
						<li>
							<label>请选择文件：</label>
							<div class="upload_box">
								<a class="btn btn-default">选择文件</a>
								<input type="file" accept="image/*" multiple="multiple" id="J_file_input" autocomplete="off" required />
							</div>
						</li>
					</ul>
					<a class="btn btn-primary" href="javascript:;" role="button" id="J_submit_btn">上传</a>
				</form>
			</div>
			<div id="J_upload_waiting" class="my_hide">
				<p><span class="result"></span>，请等待服务器同步（同步时间1分钟）。还有<span class="time">60</span>秒。</p>
			</div>
			<div id="J_upload_result" class="my_hide">
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
					<a class="btn btn-default" href="javascript:;" role="button" id="J_upload_again">再次上传</a>
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
	$('#J_folder_list').html('');
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
var clock_time = 60000;
var result_thumb_url = [];
var result_thumb_images = [];
function alarm_clock(){
	clock_time = clock_time - 1000;
	if(clock_time > 0){
		$('#J_upload_waiting .time').text(clock_time/1000);
		setTimeout(alarm_clock,1000);
	}else if(clock_time == 0){
		$('#J_upload_waiting').hide();
		$('#J_upload_result .thumb_url').html(result_thumb_url.join('<br>'));
		$('#J_upload_result').show();
		$('#J_upload_result .thumb_box').html(result_thumb_images.join(''));
	}
}
function upload_images(){
	var files = document.getElementById('J_file_input').files;
	var folder = $('#J_folder_input').val();
	
	result_thumb_url = [];
	result_thumb_images = [];
	
	var files_total = files.length;	
	var files_num = 0;
	
	var xmlhttp;
	var file;
	var formdata;
		
	showLoading('正在上传中，请稍候...');
	
	for(var file_i = 0;file_i <= files_total - 1; file_i++){
		file = files[file_i];
		if (window.XMLHttpRequest) {
			//IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp = new XMLHttpRequest;
			
			//针对某些特定版本的mozillar浏览器的bug进行修正
			if (xmlhttp.overrideMimeType) {
				xmlhttp.overrideMimeType('text/xml');
			};
		} else if (window.ActiveXObject){
			//IE6, IE5
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		};
		
		if(xmlhttp.upload){
			//2.回调函数
			xmlhttp.onreadystatechange = function(e){
				if(xmlhttp.readyState==4){
					hideLoading();
					if(xmlhttp.status==200){
						var json = eval('(' + xmlhttp.responseText + ')');
						if(json.code == 1){
							files_num++;
							result_thumb_url.push(json.data);
							result_thumb_images.push('<img src="images/'+json.data+'" />');
						}				
					}else{
						showAlert('未知故障，请联系开发人员！');
						setTimeout(hideAlert,2000);
						file_i = files_total + 1;
					}
				}
			};
			
			//3.设置连接信息
			xmlhttp.open("POST","upload_ajax.php",false);
			
			//4.发送数据，开始和服务器进行交互
			formdata = new FormData();
			formdata.append("file", file);
			formdata.append("folder_name", folder);
			xmlhttp.send(formdata);
		}
	}
	
	if(files_num == files_total){
		$('#J_upload_waiting .result').text('上传成功');
	}else if(files_num > 0){
		$('#J_upload_waiting .result').text('部分图片上传失败');
	}
	if(files_num > 0){
		clock_time = 60000;
		$('#J_upload_waiting .time').text(clock_time/1000);
		setTimeout(alarm_clock,1000);
		$('#J_upload_waiting').show();
		$('#J_select_upload').hide();
		$('#J_folder_input').val('');
		$('#J_file_input').val('');
	}
	get_folder_list();
}
$('#J_submit_btn').click(function(){
	if($('#J_folder_input').val().length == 0){
		showAlert('请填写文件夹！');
		setTimeout(hideAlert,2000);
	}else if($('#J_file_input').val().length == 0){
		showAlert('请选择文件！');
		setTimeout(hideAlert,2000);
	}else{
		upload_images();
	}
});
$('#J_upload_again').click(function(){
	$('#J_upload_result').hide();
	$('#J_select_upload').show();
});
$(document).ready(function(){
	get_folder_list();
});
</script>
</body>
</html>
