<?php
include_once('session.php');
session_start();
$session_array = $_SESSION;
session_write_close();
if(isset($session_array['yyb_backend_admin'])){
	include_once('upload_view.php');
}else{
	include_once('login_view.php');
}
?>