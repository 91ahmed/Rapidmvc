<?php
	
	return  [

		// App
		'app_url' => 'http://localhost:8080/Rapidmvc/',
		'app_dir' => 'Rapidmvc',

		// Session
		'session_name' => 'sess',
		'session_domain' => '',
		'session_lifetime' => 2678400,
		'session_path' => '/',
		'session_ssl' => false,
		'session_http' => true,
		'session_save_path' => 'storage/sessions',
		'session_regenerate_id' => false,

		// Database
		'db_driver' => 'mysql',
		'db_host' => 'localhost',
		'db_name' => 'test',
		'db_user' => 'root',
		'db_password' => '',
		'db_port' => 3306,
		'db_charset' => 'utf8',
		'db_sslmode' => 'disable' // disable - require
	];
?>