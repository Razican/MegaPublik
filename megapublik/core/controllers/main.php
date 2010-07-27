<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends Controller {

	function Main()
	{
		parent::Controller();	
	}
	
	function index()
	{
		if($this->user->is_checked())
		{
			exit(redirect('ingame'));
		}
		
		$this->lang->load('login');
		$this->load->view('login');
	}
	
	function error($error = 0)
	{
		if (($error == 0) OR (!is_numeric($error)) OR ($error > 9))
		{
			redirect('/');
		}
		else
		{
			$this->lang->load('errors');
			show_error(lang('errors.error'), lang('errors.'.$error), 400);
		}

	}
}

/* End of file main.php */
/* Location: ./system/application/controllers/main.php */