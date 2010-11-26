<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class State {

	function language()
	{		
		$CI			=& get_instance();

		$language	= $CI->session->userdata('language');
		if($language != $CI->lang->lang())
		{
			$CI->session->set_userdata('language', $CI->lang->lang());
		}
	}
}