<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Market extends CI_Controller {

	function __construct()
	{
		parent::__construct();	
	}
	
	function index()
	{
		if($this->session->userdata('logged_in'))
		{
			define ('INGAME', TRUE);
			define ('AJAX', TRUE);

			$this->output->enable_profiler($this->config->item('debug'));			

			$this->lang->load('market');
			$this->lang->load('ingame');

			$user				= $this->user->data($this->session->userdata('user_id'));
			$country			= $this->user->data($user->location, 'countries');

			$panel['user']		= $user;
			$panel['avatar']	= avatar($user, $this->lang->lang());
			$panel['exp_prcnt']	= exp_percent($user);
			$panel['l18n']		= l18n($this->lang->lang());
			$panel['country']	= $country;
			
			$script['img']		= loading(lang('market.loading'));

			$head['panel']		= $this->load->view('panel', $panel, TRUE);
			$head['help']		= lang('ingame.help');
			$head['menu']		= $this->load->view('menu_ingame', '', TRUE);
			$head['script']		= $this->load->view('market/market_ajax', $script, TRUE);

			$data['head']		= $this->load->view('head', $head, TRUE);
			$data['footer']		= $this->load->view('footer', '', TRUE);
			$data['is_society']	= $this->user->has_company();

			$this->load->view('market/market', $data);
		}
		else
		{
			log_message('error', 'User with IP '.$this->input->ip_address().' has tried to enter /market without loggin in.');
			redirect('/');
		}
	}
	function request($type='food', $page=0)
	{		
		if ($this->input->is_ajax_request())
		{
			sleep(1);

			$this->lang->load('market');
			$this->load->model('market_m');

			$user			= $this->user->data($this->session->userdata('user_id'));
			$user_country	= $this->user->data($user->location, 'countries');
			$country		= $user_country->id;
			$from			= ($page)*20;
			$to				= ($page+1)*20;
			$content		= $this->market_m->get_market($type, $from, $to, $country);
			$market			= $this->market_m->get_market($type, 0, 0, $country);
			$num_rows		= $market->num_rows();

			if ($num_rows > 0)
			{
				$data['content']	=& $content;
				$data['user']		=& $this->user;
				$data['img']		= loading(lang('market.loading'));

				$this->load->library('pagination');
				
				$config['base_url']		= site_url("market/request/".$type."/");
				$config['total_rows']	= $num_rows;
				$config['per_page']		= '20';
				$config['uri_segment']	= 5;
				$config['first_link']	= lang('overal.first');
				$config['last_link']	= lang('overal.last');

				$this->pagination->initialize($config);
				$data['pagination']		= $this->pagination->create_links();

				$this->load->view('market/market_table', $data);
			}
			else
			{
				$this->load->view('market/market_nodata');
			}
		}
		else
		{
			log_message('error', 'User with IP '.$this->input->ip_address().' has tried to enter /market/request without doing a XMLHttpRequest.');
			redirect('market');
		}
	}
}

/* End of file market.php */
/* Location: ./application/controllers/market.php */