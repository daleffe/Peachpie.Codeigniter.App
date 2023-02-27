<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthenticationHook {
	protected $CI;

	public function __construct() 
	{
		$this->CI = get_instance();
	}

	public function check()
	{
		// If first segment is API, don't check authentication
		// because this will be handled by another class/lib
		if (mb_strtolower($this->CI->uri->segment(1)) != 'api')
		{
			// Default routing
			$controller = $this->CI->router->fetch_class();
			//$method = $this->CI->router->fetch_method();			

			$email = $this->CI->session->userdata('email');
			$password = $this->CI->session->userdata('password'); // Don't do this, I just did it for testing.	
			
			// Here we can check permissions, groups, etc.

			if ($controller != 'auth')
			{								
				if ($email == false || $password == false)
				{
					redirect('auth','refresh');
				}
			}
			else
			{
				if ($email !== false && $password !== false)
				{
					redirect('/home','refresh');
				}
			}
		}
	}
}