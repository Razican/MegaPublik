<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Test extends CI_Controller {

	public function index()
	{
		if($this->uri->segment(3))
		{
			redirect('/');
		}

		define('INGAME', TRUE);

		$this->output->enable_profiler($this->config->item('debug'));

		$panel['avatar']	= avatar($this->user, $this->lang->lang());
		$panel['user']		=& $this->user;
		$panel['exp_prcnt']	= exp_percent($this->user);
		$panel['l18n']		= l18n($this->lang->lang());
		$panel['currency']	= 'NO CURRENCY';

		$head['help']		= 'HELP BAR';
		$head['menu']		= $this->load->view('menu_ingame', '', TRUE);
		$head['panel']		= $this->load->view('panel', $panel, TRUE);

		$data['user']		= $this->user;
		$data['head']		= $this->load->view('head', $head, TRUE);
		$data['footer']		= 'ONLINE: '.$this->user->online();
		//$data['country']	= $country;

		$this->load->view('test', $data);
	}
}


/* End of file test.php */
/* Location: ./megapublik/controllers/test.php */