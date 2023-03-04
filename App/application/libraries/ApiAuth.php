<?php defined('BASEPATH') OR exit('No direct script access allowed');

class ApiAuth {
	protected $CI;

	public function __construct()
	{
		$this->CI = get_instance();
	}

	public function check($username, $password)
	{
		// Public Routes
		$publicRoutes = array('pub');

		if (in_array($this->CI->router->fetch_class(),$publicRoutes)) return TRUE;

		if (!is_null($username) && $username != '' && !is_null($password) && $password != '')
		{
			// Private Routes
			if ($username == 'test@test.com' && $password == '123456')
			{
				return TRUE;
			}
		}

		return FALSE;
	}
}