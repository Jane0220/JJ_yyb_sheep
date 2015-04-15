<?php
$config_flag = 0;
switch($config_flag){
	case 0:
		$config = array(
			'db'	=> array(
				'host'		=> '10.32.1.6',
				'user'		=> 'root',
				'pass'		=> 'root',
				'dns'		=> 'mysql:dbname=yyb_backend;host=10.32.1.6',
				'database'	=> 'yyb_backend'
			),
			'memcache_path'		=> "tcp://127.0.0.1:11211",
			'session_domain'	=> ".pppick.com"
		);
		break;
	case 1:
		$config = array(
			'db'	=> array(
				'host'		=> '10.66.103.87',
				'user'		=> 'root',
				'pass'		=> '6TYep9BQ',
				'dns'		=> 'mysql:dbname=yyb_backend;host=10.66.103.87',
				'database'	=> 'yyb_backend'
			),
			'memcache_path'		=> "tcp://10.249.161.174:11211",
			'session_domain'	=> ".ppick.com"
		);
		break;
}
?>