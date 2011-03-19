<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logout extends CI_Controller {

	public function index()
	{
		if($this->session->userdata('logged_in'))
		{
			$this->session->sess_destroy();
		}
		else
		{
			log_message('error', 'User with IP '.$this->input->ip_address().' has tried to enter /logout without loggin in.');
		}
		redirect('/');
	}
}


/* End of file logout.php */
/* Location: ./application/controllers/logout.php */