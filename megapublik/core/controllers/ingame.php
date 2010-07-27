<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ingame extends Controller {

	function Ingame()
	{
		parent::Controller();	
	}
	
	function index()
	{
		if($this->user->is_checked())
		{
			$this->lang->load('ingame');
			$user_id			= $this->user->id();
			$data['user']		= $this->user->data($user_id);
			$data['country']	= $this->user->data($data['user']->location, 'countries');
			$this->load->view('ingame', $data);
		}
		else
		{
			redirect('/');
		}
	}
}

/* End of file ingame.php */
/* Location: ./system/application/controllers/ingame.php */