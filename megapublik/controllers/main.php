<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	function __construct()
	{
		parent::__construct();	
	}
	
	function index()
	{
		if($this->uri->segment(2))
		{
			redirect('/');
		}
		if($this->session->userdata('logged_in'))
		{
			define ('INGAME', TRUE);

			$this->output->enable_profiler($this->config->item('debug'));			

			$this->lang->load('ingame');

			$user				= $this->user->data($this->session->userdata('user_id'));
			$country			= $this->user->data($user->location, 'countries');

			$panel['avatar']	= avatar($user, $this->lang->lang());
			$panel['user']		= $user;
			$panel['exp_prcnt']	= exp_percent($user);
			$panel['l18n']		= l18n($this->lang->lang());
			$panel['country']	= $country;

			$head['help']		= lang('ingame.help');
			$head['menu']		= $this->load->view('menu_ingame', '', TRUE);
			$head['panel']		= $this->load->view('panel', $panel, TRUE);

			$data['user']		= $user;
			$data['head']		= $this->load->view('head', $head, TRUE);
			$data['footer']		= $this->load->view('footer', '', TRUE);
			$data['country']	= $country;

			$this->load->view('ingame', $data);
		}
		else
		{
			$this->output->enable_profiler($this->config->item('debug'));			
			
			$this->lang->load('login');

			$head['menu']		= $this->load->view('menu_outgame', '', TRUE);

			$data['head']		= $this->load->view('head', $head, TRUE);
			$data['footer']		= $this->load->view('footer', '', TRUE);

			$this->load->view('login', $data);	
		}
	}
}

/* End of file main.php */
/* Location: ./application/controllers/main.php */