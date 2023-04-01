<?php
	/**
	 *	Generate random characters
	 *	
	 *	@param integer $length, default 10
	 *	@return string
	 */
	function generate_char (int $length = 10) 
	{
		$char = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$char = str_shuffle($char);
		$charLength = strlen($char);
		$random = null;

		for ($i = 0; $i < $length; $i++) {
			$random .= $char[rand(0, $charLength - 1)];
		}

		return $random;
	}

	/**
	 *	Generate random integer
	 *	
	 *	@param integer $length, default 10
	 *	@return integer
	 */
	function generate_int (int $length = 10) 
	{
		$char = '0123456789';
		$char = str_shuffle($char);
		$charLength = strlen($char);
		$random = null;

		for ($i = 0; $i < $length; $i++) {
			$random .= $char[rand(0, $charLength - 1)];
		}

		return $random;
	}

	/**
	 *	Generate random string
	 *	
	 *	@param integer $length, default 10
	 *	@return string
	 */
	function generate_str (int $length = 10) 
	{
		$char = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$char = str_shuffle($char);
		$charLength = strlen($char);
		$random = null;

		for ($i = 0; $i < $length; $i++) {
			$random .= $char[rand(0, $charLength - 1)];
		}

		return $random;
	}
?>