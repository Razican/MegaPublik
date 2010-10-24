<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Market extends Controller {

	function Market()
	{
		parent::Controller();	
	}
	
	function index()
	{
		if($this->session->userdata('logged_in'))
		{
			$this->output->enable_profiler($this->config->item('debug'));
			$this->lang->load('market');
		}
		else
		{
			log_message('error', 'User with IP '.$this->input->ip_address().' has tried to enter /market without loggin in.');
			redirect('/');
		}
	}
}

/* End of file market.php */
/* Location: ./application/controllers/market.php */