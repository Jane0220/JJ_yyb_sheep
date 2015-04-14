<?php
include_once('session.php');
session_start();
$session_array = $_SESSION;
session_write_close();
var_dump($session_array);
exit;
if(isset($session_array['yyb_backend_admin'])){
	include_once('upload_view.php');
	// echo 1111111;
}else{
	header("location: login.php");
}
?>