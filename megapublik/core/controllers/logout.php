<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logout extends Controller {

	function Logout()
	{
		parent::Controller();	
	}
	
	function index()
	{
		if($this->user->is_checked())
		{
			$this->load->helper('cookie');
			delete_cookie('MegaPublik', 'localhost', '/megapublik');
		}
		redirect('/');
	}
}

/* End of file logout.php */
/* Location: ./system/application/controllers/logout.php */