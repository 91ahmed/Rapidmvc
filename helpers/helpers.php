<?php
	
	/**
	 *	Render the application views using blade template engine.
	 *	
	 *	@param string $view
	 *	@param array $data
	 *
	 *	@return void
	 */
	function view (string $view, array $data = []) 
	{
		$blade = new \Jenssegers\Blade\Blade(
			ROOT.'app'.DS.'view',
			ROOT.'cache'.DS.'blade'
		);

		echo $blade->render($view, $data);
	}

	/**
	 *	Translate the text to different languages using GoogleTranslate.
	 *	
	 *	@param string $text
	 *
	 *	@return string
	 */
	function trans (string $text) 
	{
		$result = $text;

		$trans = new \Statickidz\GoogleTranslate();
		$result = $trans->translate('en', 'ar', $text);

		return $result;
	}

	/**
	 *	Get the data from configuration file.
	 *	
	 *	@param string $key
	 *
	 *	@return string
	 */
	function config (string $key) 
	{
		$data = require (ROOT.'config'.DS.'app.php');
		return $data[$key];
			
		return $data;
	}
?>