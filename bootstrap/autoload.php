<?php
	
	/**
	 *	autoload function for registration with spl_autoload_register
	 *
	 *	@param string $className The fully-qualified class name.
	 *
	 *	@return void
	 */
	spl_autoload_register( function ($className) 
	{
		$lastNsPos = strrpos($className, '\\');
		$namespace = substr($className, 0, $lastNsPos);
		$className = substr($className, $lastNsPos + 1);
		$fileName  = strtolower($namespace).'/'.$className.'.php';
		$file      = str_replace(['\\', '/'], DIRECTORY_SEPARATOR, ROOT.$fileName);

		if (file_exists($file) && is_file($file))
		{
			require ($file);
		}

	});

?>