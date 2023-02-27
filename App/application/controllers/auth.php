<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller {
	
	public function index()
	{			
		if ($this->input->method() == 'post') {
			/* Form validation */
			$this->form_validation->set_rules('email','e-mail',"trim|required|email");
			$this->form_validation->set_rules('password','password',"trim|required|min_length[6]|max_length[60]");

			if ($this->form_validation->run() == TRUE) {
				$auth = array(
					'email' => $this->input->post('email'),
					'password' => $this->input->post('password')
				);

				$authorization = ($auth['email'] == 'test@test.com') && ($auth['password'] == '123456');

				if ($authorization == false)  {
					$this->session->set_flashdata('errors','<div class="alert alert-danger" role="alert">E-mail and/or password is invalid.</div>');

					redirect('/auth','refresh');
				} else {		
					// Save session data
					$this->session->set_userdata($auth);

					redirect('/home','refresh');
				}
			}
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