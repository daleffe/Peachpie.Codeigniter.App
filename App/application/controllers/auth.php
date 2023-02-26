<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller {
	
	public function index()
	{
		if ($this->input->method() == 'post') {
			var_dump($this->input->post('email'));
			var_dump($this->input->post('password'));
		}

		$this->load->view('layout', array('title' => 'Auth'));
	}

	public function logout()
	{
		// Remove session data
		$this->session->sess_destroy();

		// Redirect to Auth form
		redirect('/auth','refresh');
	}
}