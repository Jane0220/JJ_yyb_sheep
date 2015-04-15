<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
	<meta name="description" content="">
	<meta name="author" content="">
<!--	<link rel="icon" href="../../favicon.ico">-->

	<title>应用宝推送后台</title>

	<!-- Bootstrap core CSS -->
	<link href="css/bootstrap.min.css" rel="stylesheet">

	<!-- Custom styles for this template -->
	<link href="css/base.css" rel="stylesheet">
	<link href="css/signin.css" rel="stylesheet">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	  <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>

<body>
	<div class="container">
		<form class="form-signin">
			<h2 class="form-signin-heading">请登录</h2>
			<label for="J_name_input" class="sr-only">用户名</label>
			<input type="text" id="J_name_input" class="form-control" placeholder="用户名" required autofocus>
			<label for="J_passwd_input" class="sr-only">密码</label>
			<input type="password" id="J_passwd_input" class="form-control" placeholder="密码" required>
			<!--
			<div class="checkbox">
				<label>
					<input type="checkbox" value="remember-me">记住密码
				</label>
			</div>
			-->
			<a class="btn btn-lg btn-primary btn-block" href="javascript:;" role="button" id="J_login_btn">登录</a>
		</form>
	</div>
<script src="http://libs.baidu.com/jquery/1.9.0/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/core.js"></script>
<script>
$('#J_login_btn').click(function(){
	if($('#J_name_input').val().length == 0){
		showAlert('请填写用户名！');
		setTimeout(hideAlert,2000);
	}else if($('#J_passwd_input').val().length == 0){
		showAlert('请填写密码！');
		setTimeout(hideAlert,2000);
	}else{
		showLoading('正在登录，请稍候...');
		$.ajax({
			type: 'POST',
			url: 'login_ajax.php',
			data: 'user_name='+$('#J_name_input').val() + '&password='+$('#J_passwd_input').val(),
			dataType: "json",
			success:function(data){
				hideLoading();
				if(data.code == 1 || data.code == '1'){
					window.location = 'upload.php';
				}else{
					showAlert('用户名或密码错误，请重试！');
					setTimeout(hideAlert,2000);
				}
			},
			error:function(){
				hideLoading();
				showAlert('系统故障，请联系开发人员！');
				setTimeout(hideAlert,2000);
			}
		});
	}
});
</script>
</body>
</html>
