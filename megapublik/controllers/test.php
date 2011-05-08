<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Test extends CI_Controller {

	public function index()
	{
		if($this->uri->segment(3))
		{
			redirect('test');
		}

		$this->output->enable_profiler($this->config->item('debug'));

		$this->load->library('user');

		$this->user->set_data(1);

		echo $this->user->username .'<br />';
		echo $this->user->timezone .'<br />';
		echo date('d/m/Y - H:i:s', $this->user->time()) .'<br />';
		echo date('d/m/Y - H:i:s', time());

	}
}


/* End of file test.php */
/* Location: ./megapublik/controllers/test.php */