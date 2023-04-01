<?php
	define ('DS', DIRECTORY_SEPARATOR);
	define ('ROOT', __DIR__ . DS);

	require (ROOT.'helpers'.DS.'helpers.php');
	require (ROOT.'vendor'.DS.'autoload.php');
	require (ROOT.'bootstrap'.DS.'autoload.php');
	require (ROOT.'config'.DS.'ini.php');
	require (ROOT.'routes'.DS.'web.php');
?>