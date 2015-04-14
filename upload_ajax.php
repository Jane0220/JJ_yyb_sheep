<?php
//include_once('session.php');
if( isset($_POST['folder_name']) && $_POST['folder_name'] ){
	$folder_name = $_POST['folder_name'];
}else{
	$data['code'] = 0;
	$data['data'] = "folder_name is null, bad_request";
	echo json_encode($data);
	exit;
}
$file = $_FILES['file'];
$file_name = $_FILES['file']['name'];
$file_folder = "images/".$folder_name;
if(!file_exists($file_folder)){
	$result = mkdir($file_folder,0777);
}
$path = 'images/'.$folder_name."/".$file_name;
$result = move_uploaded_file($file,$path);
if($result){
	$data['code'] = 1;
	$data['data'] = $folder_name."/".$file_name;
}else{
	$data['code'] = 0;
	$data['data'] = '';
}
?>