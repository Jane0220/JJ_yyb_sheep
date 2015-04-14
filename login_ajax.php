<?php
include_once('session.php');
if( isset($_POST['user_name']) && $_POST['user_name'] ){
	$user_name = $_POST['user_name'];
}else{
	$data['code'] = 0;
	$data['data'] = "user_name is null, bad_request";
	echo json_encode($data);
	exit;
}
if( isset($_POST['password']) && $_POST['password'] ){
	$password = $_POST['password'];
}else{
	$data['code'] = 0;
	$data['data'] = "password is null, bad_request";	
	echo json_encode($data);
	exit;
}

// $user_name = 'yyb_admin';
// $password = 'GetBackUp';
$dbh = new PDO($config['db']['dns'],$config['db']['user'],$config['db']['pass']);
$sql = "select * from tbl_yyb_admin where user_name = :user_name and status =1";
$sql_data = array(
	':user_name'			=> $user_name,
);
$sth = $dbh->prepare($sql);
$sth->execute($sql_data);
$result = $sth->fetch(PDO::FETCH_ASSOC);
if($result){
	if(sha1($result['salt'] . sha1($password)) != $result['password']){
		$data['code'] = 0;
		$data['data'] = "not admin";	
		echo json_encode($data);
		exit;
	}else{
		session_start();
		$_SESSION['yyb_backend_admin'] = $user_name;
		session_write_close();
		$data['code'] = 1;
		$data['data'] = "";	
		echo json_encode($data);
		exit;
	}
}else{
	$data['code'] = 0;
	$data['data'] = "not admin";	
	echo json_encode($data);
	exit;
}
?>