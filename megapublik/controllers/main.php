<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	public function index()
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

			$panel['user']		= $this->user;
			$panel['exp']		= experience($this->user->level);
			$panel['l18n']		= l18n($this->lang->lang());
			$panel['currency']	= $this->user->currency;

			$head['help']		= lang('ingame.help');
			$head['menu']		= $this->load->view('menu_ingame', '', TRUE);
			$head['panel']		= $this->load->view('panel', $panel, TRUE);

			$data['user']		= $this->user;
			$data['head']		= $this->load->view('head', $head, TRUE);
			$data['footer']		= $this->load->view('footer', '', TRUE);

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
/* Location: ./megapublik/controllers/main.php */