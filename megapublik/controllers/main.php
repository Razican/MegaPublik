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

			$this->load->entity('country');
			$country			= new Country($user->country);

			$this->config->set_item('time_reference', $this->user->timezone);

			$panel['user']		= $this->user;
			$panel['exp_prcnt']	= exp_percent($this->user);
			$panel['l18n']		= l18n($this->lang->lang());
			$panel['currency']	= $country->currency;

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
/* Location: ./megapublik/controllers/main.php */