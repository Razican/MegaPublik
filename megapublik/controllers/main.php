<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends Controller {

	function Main()
	{
		parent::Controller();	
	}
	
	function index()
	{
		if($this->session->userdata('logged_in'))
		{
			$this->output->enable_profiler(TRUE);
			$this->lang->load('ingame');
			define ('INGAME', TRUE);
			$head['help']		= lang('ingame.help');
			$data['head']		= $this->load->view('head', $head, TRUE);
			$data['footer']		= $this->load->view('footer', '', TRUE);
			$data['user']		= $this->user->data($this->session->userdata('user_id'));
			$data['country']	= $this->user->data($data['user']->location, 'countries');
			$this->load->view('ingame', $data);
		}
		else
		{
			$this->output->enable_profiler(TRUE);
			$data['head']		= $this->load->view('head', '', TRUE);
			$data['footer']		= $this->load->view('footer', '', TRUE);
			$this->lang->load('login');
			$this->load->view('login', $data);	
		}
	}
}

/* End of file main.php */
/* Location: ./system/application/controllers/main.php */