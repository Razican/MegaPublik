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
			$this->output->enable_profiler($this->config->item('debug'));
			$this->lang->load('ingame');
			define ('INGAME', TRUE);
			$head['help']		= lang('ingame.help');
			$data['user']		= $this->user->data($this->session->userdata('user_id'));
			$panel['avatar']	= avatar($data['user']);
			$panel['user']		= $data['user'];
			$panel['exp']		= experience($data['user']);
			$head['menu']		= $this->load->view('menu_ingame', '', TRUE);
			$head['panel']		= $this->load->view('panel', $panel, TRUE);
			$data['head']		= $this->load->view('head', $head, TRUE);
			$data['footer']		= $this->load->view('footer', '', TRUE);
			$data['country']	= $this->user->data($data['user']->location, 'countries');
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