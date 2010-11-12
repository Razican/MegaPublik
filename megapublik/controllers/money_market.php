<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Money_market extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();	
	}
	
	function index()
	{
		if($this->session->userdata('logged_in'))
		{
			$this->output->enable_profiler($this->config->item('debug'));
			$this->lang->load('money_market');
		}
		else
		{
			log_message('error', 'User with IP '.$this->input->ip_address().' has tried to enter /money_market without loggin in.');
			redirect('/');
		}
	}
}

/* End of file money-market.php */
/* Location: ./application/controllers/money-market.php */