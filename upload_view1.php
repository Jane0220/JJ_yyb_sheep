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
	<link href="css/upload2.css" rel="stylesheet">

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
				<li class="active"><a href="upload.php">上传文件</a></li>
				<li><a href="push.php">发推送</a></li>
			</ul>
		</div>
		
		<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
			<p class="visible-xs fixed_nav_switch">
				<button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">菜单</button>
			</p>
			
			<div class="section section1" id="J_upload_step1">
				<h1>Step1</h1>
				<p>选择文件夹</p>
				<ul id="J_folder_list">
<!--					<li><a href="javascript:;">1</a></li>
					<li><a href="javascript:;">2</a></li>
					<li><a href="javascript:;">3</a></li>
					<li><a href="javascript:;">4</a></li>
					<li><a href="javascript:;">5</a></li>-->
				</ul>
				<p>或新建文件夹</p>
				<div>
					<input type="text" id="J_folder_input" class="form-control" value="" autocomplete="off" required />
					<a class="btn btn-default" href="javascript:;" role="button" id="J_new_folder">新建</a>
				</div>
			</div>
			
			<ul class="section section2 myhide" id="J_upload_step2">
				<h1>Step2</h1>
				<li>
					<label>文件夹</label>
					<span id="J_selected_folder"></span>
				</li>
				<li>
					<label>请选择文件：</label>
					<div class="upload_box">
						<a class="btn btn-default">选择文件</a>
						<input type="file" accept="image/*" multiple="multiple" id="J_file_input" autocomplete="off" required />
					</div>
				</li>
				<li>
					<a class="btn btn-default" href="javascript:;" role="button" id="J_submit_btn">上传文件</a>
				</li>
			</ul>
			
			<div class="section section3 myhide" id="J_upload_waiting">
				<h1>Waiting...</h1>
				<p><span class="result"></span>，请等待服务器同步</p>
				<p>还有<span class="time">60</span>秒</p>
			</div>
			
			<div class="section section4 myhide" id="J_upload_result">
				<h1>Result
					<a class="btn btn-default" href="javascript:;" role="button" id="J_again_btn">再传一次</a>
				</h1>
				<ul class="clearfix">
<!--					<li>
						<img src="temp/1.png" />
						<p>12/1.png</p>
					</li>
					<li>
						<img src="temp/2.png" />
						<p>12/2.png</p>
					</li>
					<li>
						<img src="temp/3.png" />
						<p>12/3.png</p>
					</li>
					<li>
						<img src="temp/4.png" />
						<p>12/4.png</p>
					</li>
					<li>
						<img src="temp/5.png" />
						<p>12/5.png</p>
					</li>
					<li>
						<img src="temp/6.gif" />
						<p>12/6.gif</p>
					</li>
					<li>
						<img src="temp/7.gif" />
						<p>12/7.gif</p>
					</li>
					<li>
						<img src="temp/8.gif" />
						<p>12/8.gif</p>
					</li>
					<li>
						<img src="temp/9.jpg" />
						<p>12/9.jpg</p>
					</li>-->
				</ul>
			</div>
		</div>
	</div>
</div>
<!--
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
				</div>
				<label>图片地址如下：</label>
				<div class="thumb_url">
				</div>
				<div class="btn_box">
					<a class="btn btn-default" href="push.php" role="button">去推送</a>
					<a class="btn btn-default" href="javascript:;" role="button" id="J_upload_again">再次上传</a>
				</div>
			</div>
		</div>
	</div>
</div>
-->
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="http://libs.baidu.com/jquery/1.9.0/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/core.js"></script>
<script>
// var img_domain = 'http://game.ppickup.com/yyb/';
var img_domain = '';
var global = {
	folder : '',
	time : 60000,
	result_img : []
}
function reset_global(){
	global.folder = '';
	global.time = 60000;
	global.result_img = [];
	
	$('#J_selected_folder').text('');
	$('#J_file_input').val('');
	$('#J_upload_waiting .result').text('');
	$('#J_upload_waiting .time').text('60');
	$('#J_upload_result ul').html('');
	$('#J_folder_list').html('');
}
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
					$('#J_folder_list').append('<li><a href="javascript:;">'+data.data[data_i]+'</a></li>');
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
$('#J_folder_list').off().on('click','a',function(){
	global.folder = $(this).text();
	$('#J_selected_folder').text(global.folder);
	$('#J_upload_step1').hide();
	$('#J_upload_step2').show();
});
$('#J_new_folder').click(function(){
	if($.trim($('#J_folder_input').val()).length > 0){
		global.folder = $.trim($('#J_folder_input').val());
		$('#J_selected_folder').text(global.folder);
		$('#J_upload_step1').hide();
		$('#J_upload_step2').show();
	}else{
		showAlert('请填写文件夹名字！');
		setTimeout(hideAlert,2000);
	}
});

function alarm_clock(){
	global.time = global.time - 1000;
	if(global.time > 0){
		$('#J_upload_waiting .time').text(global.time/1000);
		setTimeout(alarm_clock,1000);
	}else if(global.time == 0){
		$('#J_upload_waiting').hide();
		$('#J_upload_result').show();
		$('#J_upload_result ul').html(global.result_img.join(''));
	}
}

function upload_images(){
	var files = document.getElementById('J_file_input').files;
	
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
							global.result_img.push('<li><img src="'+img_domain+'images/'+json.data+'" /><p>'+json.data+'</p></li>');
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
			formdata.append("folder_name", global.folder);
			xmlhttp.send(formdata);
		}
	}
	
	if(files_num == files_total){
		$('#J_upload_waiting .result').text('上传成功');
	}else if(files_num > 0){
		$('#J_upload_waiting .result').text('部分图片上传失败');
	}
	if(files_num > 0){
		$('#J_upload_step2').hide();
		$('#J_upload_waiting').show();
		setTimeout(alarm_clock,1000);
	}
}
$('#J_submit_btn').click(function(){
	if($('#J_file_input').val().length > 0){
		upload_images();
	}else{
		showAlert('请选择文件！');
		setTimeout(hideAlert,2000);
	}
});

$('#J_again_btn').click(function(){
	$('#J_upload_result').hide();
	reset_global();
	get_folder_list();
	$('#J_upload_step1').show();
});
$(document).ready(function(){
	get_folder_list();
	
	$('[data-toggle="offcanvas"]').click(function () {
		$('#J_wrap').toggleClass('show_nav')
	});
});
/*
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
							result_thumb_images.push('<img src="'+img_domain+'images/'+json.data+'" />');
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
*/
</script>
</body>
</html>
