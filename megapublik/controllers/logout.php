<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logout extends Controller {

	function Logout()
	{
		parent::Controller();	
	}
	
	function index()
	{
		if($this->session->userdata('logged_in'))
		{
			$this->session->sess_destroy();
		}
		redirect('/');
	}
}

/* End of file logout.php */
/* Location: ./system/application/controllers/logout.php */