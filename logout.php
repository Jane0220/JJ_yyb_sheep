<?php
include_once('session.php');
session_start();
unset($_SESSION['admin_token']);
session_write_close();
header("location: login.php");
?>