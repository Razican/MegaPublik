<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Error extends Controller {

	function Error()
	{
		parent::Controller();	
	}

	function _remap($error = 0)
	{
		if (($error == 0) OR (!is_numeric($error)) OR ($error > 9))
		{
			redirect('/');
		}
		else
		{
			$this->lang->load('errors');
			show_error(lang('errors.'.$error), 400, lang('errors.error'));
		}
	}
}

/* End of file error.php */
/* Location: ./system/application/controllers/error.php */