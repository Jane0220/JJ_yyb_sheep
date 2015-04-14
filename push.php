<?php
include_once('session.php');
session_start();
$session_array = $_SESSION;
session_write_close();
if(isset($session_array['yyb_backend_admin'])){
	include_once('push_view.php');
}else{
	header("location: login.php");
}
?>