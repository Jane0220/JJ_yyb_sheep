<?php
include_once('session.php');
session_start();
unset($_SESSION['yyb_backend_admin']);
session_write_close();
header("location: login.php");
?>