<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Stock extends CI_Controller {

	public function index()
	{
		echo 'Bolsa de valores';
	}

	public function process_orders()
	{
		if($this->input->is_cli_request())
		{
			echo 'Todas las órdenes anteriores a las '.date('H:i', now()-1800).' han sido procesadas el '.date(DATE_RFC822, time()).'.'.PHP_EOL;
		}
		else
		{
			log_message('error', 'User with IP '.$this->input->ip_address().' has tried to enter /stock/process_orders without doing a CLI request.');
			redirect('stock');
		}
	}

	public function open_stock()
	{
		if($this->input->is_cli_request())
		{
			echo 'Se ha abierto la bolsa el '.date(DATE_RFC822, now()).'.'.PHP_EOL;
		}
		else
		{
			log_message('error', 'User with IP '.$this->input->ip_address().' has tried to enter /stock/open_stock without doing a CLI request.');
			redirect('stock');
		}
	}

	public function close_stock()
	{
		if($this->input->is_cli_request())
		{
			echo 'Se ha cerrado la bolsa el '.date(DATE_RFC822, now()).'.'.PHP_EOL;
		}
		else
		{
			log_message('error', 'User with IP '.$this->input->ip_address().' has tried to enter /stock/close_stock without doing a CLI request.');
			redirect('stock');
		}
	}
}
