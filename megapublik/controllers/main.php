<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	function __construct()
	{
		parent::__construct();	
	}
	
	function index()
	{
		if($this->session->userdata('logged_in'))
		{
			$this->output->enable_profiler($this->config->item('debug'));
			$this->lang->load('ingame');
			define ('INGAME', TRUE);
			$user				= $this->user->data($this->session->userdata('user_id'));
			$head['help']		= lang('ingame.help');
			$data['user']		= $user;
			$panel['avatar']	= avatar($user);
			$panel['user']		= $user;
			$panel['exp']		= experience($user);
			$head['menu']		= $this->load->view('menu_ingame', '', TRUE);
			$head['panel']		= $this->load->view('panel', $panel, TRUE);
			$data['head']		= $this->load->view('head', $head, TRUE);
			$data['footer']		= $this->load->view('footer', '', TRUE);
			$data['country']	= $this->user->data($user->location, 'countries');
			$this->load->view('ingame', $data);
		}
		else
		{
			$this->output->enable_profiler($this->config->item('debug'));
			$head['menu']		= $this->load->view('menu_outgame', '', TRUE);
			$data['head']		= $this->load->view('head', $head, TRUE);
			$data['footer']		= $this->load->view('footer', '', TRUE);
			$this->lang->load('login');
			$this->load->view('login', $data);	
		}
	}
}

/* End of file main.php */
/* Location: ./application/controllers/main.php */