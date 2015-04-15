<?php
include_once('config.php');
ini_set("session.save_handler", "memcache");  
ini_set("session.save_path", $config['memcache_path']);
session_set_cookie_params(3600*24*30,'/',$config['session_domain']);
?>