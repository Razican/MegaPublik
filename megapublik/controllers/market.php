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
			$panel['avatar']	= avatar($user);
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
	function request($type='food', $from=0, $to=20)
	{
		if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH']==="XMLHttpRequest")
		{
			sleep(2);

			$this->lang->load('market');
			$this->load->model('market_m');

			$user			= $this->user->data($this->session->userdata('user_id'));
			$user_country	= $this->user->data($user->location, 'countries');
			$country		= $user_country->id;
			$content		= $this->market_m->get_market($type, $from, $to, $country);

			if ($content->num_rows() > 0)
			{
				$data['rows']	= NULL;

				foreach ($content->result() as $content)
				{
					$row['price']		= $content->price;
					$company			= $this->user->data($content->company_id, 'companies');
					$row['company']		= $company->name;
					$row['amount']		= $content->amount;

					$data['rows']		.= $this->load->view('market/market_table_row', $row, TRUE);
				}
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