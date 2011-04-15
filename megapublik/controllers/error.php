<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Error extends CI_Controller {

	public function _remap($error = 0)
	{
		if (($error <= 0) OR ( ! is_numeric($error)) OR ($error > 10))
		{
			redirect('/');
		}
		else
		{
			$this->output->enable_profiler($this->config->item('debug'));

			$this->lang->load('errors');

			show_error(lang('errors.'.$error), 400, lang('errors.error'));
		}
	}
}


/* End of file error.php */
/* Location: ./application/controllers/error.php */