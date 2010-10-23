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
			$this->lang->load('ingame');
			define ('INGAME', TRUE);
			$head['help']		= lang('ingame.help');
			$data['head']		= $this->load->view('head', $head, TRUE);
			$data['footer']		= $this->load->view('footer', '', TRUE);
			$user_id			= $this->user->id();
			$data['user']		= $this->user->data($user_id);
			$data['country']	= $this->user->data($data['user']->location, 'countries');
			$this->load->view('ingame', $data);
		}
		else
		{
			$data['head']		= $this->load->view('head', '', TRUE);
			$data['footer']		= $this->load->view('footer', '', TRUE);
			$this->lang->load('login');
			$this->load->view('login', $data);	
		}
	}
}

/* End of file main.php */
/* Location: ./system/application/controllers/main.php */