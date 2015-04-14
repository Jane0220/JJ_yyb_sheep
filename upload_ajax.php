<?php
//include_once('session.php');
if( isset($_POST['fold_name']) && $_POST['fold_name'] ){
	$fold_name = $_POST['fold_name'];
}else{
	$data['code'] = 0;
	$data['data'] = "fold_name is null, bad_request";
	echo json_encode($data);
	exit;
}
$file = $_FILES['file'];
$file_name = $_FILES['file']['name'];
$file_folder = "images/".$fold_name;
if(!file_exists($file_folder)){
	$result = mkdir($file_folder,0777);
}
$path = 'images/'.$fold_name."/".$file_name;
$result = move_uploaded_file($file,$path);
if($result){
	$data['code'] = 1;
	$data['data'] = $fold_name."/".$file_name;
}else{
	$data['code'] = 0;
	$data['data'] = '';
}
?>